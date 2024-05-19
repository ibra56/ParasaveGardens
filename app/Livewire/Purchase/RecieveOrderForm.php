<?php

namespace App\Livewire\Purchase;

use App\Models\FinancialExpense;
use App\Models\FinancialExpenseCategory;
use App\Models\FinancialExpenseCategoryItem;
use App\Models\Inventory;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

class RecieveOrderForm extends Component
{
    public $po;
    public $receivedItems = [];


    public function mount($po_id){
        $this->po = PurchaseOrder::withTrashed()->findOrFail($po_id);
        $this->initializeReceivedItems();
    }

    public function render()
    {
        return view('livewire.purchase.recieve-order-form',[
            'po' => $this->po,
        ]);
    }

    public function updatedReceivedItems()
    {
        foreach ($this->receivedItems as $index => $item) {
            $quantity = $item['r_quantity'];
            $unit_price = $item['r_unit_price'];
            if ($quantity !== "" && $unit_price !== "") {
                $this->receivedItems[$index]['r_amount'] = $quantity * $unit_price;
            } else {
                $this->receivedItems[$index]['r_amount'] = 0;
            }
        }
    }

    public function saveReceivedItems()
    {
        $totalAmount = 0;
        
        foreach ($this->receivedItems as $item) {
            $poItem = PurchaseOrderItem::findOrFail($item['id']);
            if($poItem->r_quantity){
                noty()->addWarning('The item ' . $poItem->product->name . ' has already been received and cannot be received again.');
                continue ;
            }


            $poItem->update([
                'r_quantity' => $item['r_quantity'] > 0 ? $item['r_quantity'] : null,
                'r_unit_price' => $item['r_unit_price'] > 0 ? $item['r_unit_price'] : null,
                'r_ammount' => $item['r_amount'] > 0 ? $item['r_amount'] : null,
            ]);

            if($poItem->r_quantity){
                Inventory::updateOrCreate(
                    ['product_id' => $poItem->product_id],
                    ['quantity' => DB::raw('quantity + ' . $item['r_quantity'])]
                );

                $totalAmount += $poItem->r_ammount;
            }
        }


        if($totalAmount){
            $this->po->update([
                'received_date' =>now(),
            ]);
            $category = FinancialExpenseCategory::firstOrCreate(
                ['slug' => 'purchases'],
                ['name' => 'Purchases', 'description' => 'Expenses for purchases', 'created_by' => auth()->user()->id]
            );
            $categoryItem = FinancialExpenseCategoryItem::firstOrCreate(
                ['slug' => 'purchase-order', 'financial_expense_category_id' => $category->id],
                ['name' => 'Purchase Order', 'description' => 'Expenses for purchase orders', 'created_by' => auth()->user()->id]
            );
            FinancialExpense::create([
                'expense_category_item_id' => $categoryItem->id,
                'amount' => $totalAmount,
                'narration' => "Purchase Order " . $this->po->id,
                'date_of_payment' => now(),
                // 'paid_by',
                // 'currency_id',
                // 'rate_id',
                'created_by' => auth()->user()->id,
                // 'approved_by',
            ])->delete();
        }


        noty()->addSuccess('Received items updated successfully.');
    }

    public function initializeReceivedItems()
    {
        foreach ($this->po->purchaseOrderItems as $item) {
            $this->receivedItems[] = [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'amount' => $item->quantity * $item->unit_price,
                'r_quantity' => $item->r_quantity ?? 0,
                'r_unit_price' => $item->r_unit_price ?? 0,
                'r_amount' => $item->r_ammount ?? 0,
            ];
        }
    }
}
