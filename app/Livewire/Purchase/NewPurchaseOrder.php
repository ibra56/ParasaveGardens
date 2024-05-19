<?php

namespace App\Livewire\Purchase;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;

class NewPurchaseOrder extends Component
{
    public $fields = [];
    public $suppliers;
    public $products;  
    
    public $supplier_id;
    public $supplier_reference;
    public $need_by_date;
    
    public $expected_arrival_date;



    public function mount()
    {
        // Initialize the form with one empty field
        $this->addField();
        $this->expected_arrival_date = now()->format('Y-m-d');
        $this->need_by_date = now()->addDays(1)->format('Y-m-d');
    }

    public function addPrdtItem($index, $prtid){
        dd($index, $prtid);
    }

    public function addField()
    {
        $this->fields[] = [
            "product_id" => '',
            "quantity" => '',
            "unit_price" =>  '',
            'amount' => 0,
        ];
    }

    public function updated($propertyName)
    {
        if (str_contains($propertyName, 'fields')) {
            $this->calculateAmounts();
        }
    }

    public function calculateAmounts()
{
    foreach ($this->fields as $index => $field) {
        $quantity = $field['quantity'] ?? '';
        $unit_price = $field['unit_price'] ?? '';
        
        if ($quantity === '' || $unit_price === '') {
            $this->fields[$index]['amount'] = 0;
        } else {
            $this->fields[$index]['amount'] = $quantity * $unit_price;
        }
    }
}


    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }
    public function createNewPurchaseOrder()
    {
        // dd($this->fields);

        $po = PurchaseOrder::create([
            'supplier_id' => $this->supplier_id,
            'supplier_reference' => $this->supplier_reference ?? null,
            'expected_arrival_date' => $this->expected_arrival_date ?? null,
            'order_deadline_date' => $this->need_by_date ?? null,
            'created_by' => auth()->user()->id,
        ]);

        foreach($this->fields as $index => $field ){
            PurchaseOrderItem::create([
                'purchase_order_id' => $po->id,
                'product_id' => $field['product_id'] ,
                'quantity' => $field['quantity'],
                'unit_price' => $field['unit_price'],
                'ammount' => $field['amount'],
            ]);
        }

        noty()->addSuccess('Purchase Order saved');
        $this->reset();
        $this->mount();
        // session()->flash('message', 'Purchase Order created successfully.');
        // return redirect()->route('purchase-order-list');
    }
    public function render()
    {
        $this->suppliers = Supplier::all();
        $this->products = Product::all();
        return view('livewire.purchase.new-purchase-order');
    }
}
