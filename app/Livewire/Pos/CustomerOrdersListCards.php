<?php

namespace App\Livewire\Pos;

use App\Models\CustomerOrder;
use App\Models\Inventory;
use Livewire\Component;

class CustomerOrdersListCards extends Component
{
    public function render()
    {
        return view('livewire.pos.customer-orders-list-cards',[
            'customerOrders' => CustomerOrder::all()
        ]);
    }

    public function cancelOrder($orderId)
    {
        $order = CustomerOrder::find($orderId);
        if ($order->servedItems->count() > 0 ){
            noty()->addWarning('Cant cancel sereved order');
            return ;
        }
        if ($order) {
            foreach ($order->items as $item) {
                $inventory = Inventory::where('product_id', $item->product_id)->first();
                if ($inventory) {
                    $inventory->quantity += $item->quantity;
                    $inventory->save();
                }
            }
            $order->status = 'cancelled';
            $order->save();
            $order->delete();
        }
    }

    public function payOrder($orderId)
    {
        // Handle the payment logic here
    }

    public function viewDetails($orderId)
    {
        // Handle viewing the order details logic here
    }

    public function addItems($orderId)
    {
        // Handle adding items to the order logic here
    }

    public function printOrderBill($orderId){
        // print the bill
    }

}
