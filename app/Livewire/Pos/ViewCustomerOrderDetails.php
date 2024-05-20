<?php

namespace App\Livewire\Pos;

use App\Models\CustomerOrder;
use App\Models\CustomerOrderItem;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewCustomerOrderDetails extends Component
{
    public $order_id;
    public $order;
    public $isOrderDetailsModalOpen = false;

    public function openOrderDetails()
    {
        $this->isOrderDetailsModalOpen = true;
    }

    public function closeOrderDetailsModal()
    {
        $this->isOrderDetailsModalOpen = false;
    }

    public function mount($order_id){
        $this->order_id = $order_id;
        $this->order = CustomerOrder::findOrFail($order_id);
    }

    public function render()
    {
        return view('livewire.pos.view-customer-order-details');
    }

    public function markAsServed($id){
        $item = CustomerOrderItem::find($id);
        if ( $item ) { 
            $item->update([
                'preparation_status' => 'served',
            ]);
            $item->delete();
        } 
    }

    public function cancelItem($id)
    {
        $item = CustomerOrderItem::find($id);
        if ($item) {
            // Calculate the amount to deduct
            $amountToDeduct = $item->quantity * $item->item_price;

            // Update the order's total amount
            $this->order->update([
                'total_amount' => DB::raw('total_amount - ' . $amountToDeduct),
            ]);

            // Update the inventory
            Inventory::where('product_id', $item->product_id)
                ->increment('quantity', $item->quantity);

            // Delete the item
            $item->forcedelete();

            // Reload the order with its items
            $this->order = CustomerOrder::with('items.product', 'customer', 'servedBy')->findOrFail($this->order_id);
        }
    }

}
