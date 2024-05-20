<?php

namespace App\Livewire\Pos;

use App\Models\CustomerOrder;
use App\Models\CustomerOrderItem;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddCustomerOrderItems extends Component
{
    public $order_id;
    public $order;

    public $isAddingItemsModalOpen = false;
    public $items = [];

    public $total_amount = 0;
    public $discount = 0;
    public $tax = 0;
    public $tip = 0;

    public function mount($order_id){
        $this->order_id = $order_id;
        $this->order = CustomerOrder::findOrFail($order_id);
        $this->addItem();
    }

    public function addItem()
    {
        $this->items[] = ['product_id' => null, 'quantity' => null, 'special_requests' => null];
    }

    public function addItemsToOrder()
    {
        foreach ($this->items as $item) {
            $menuItem = Product::find($item['product_id']);
            $itp = ProductPrice::where('product_id',$item['product_id'])->first();
            $itemprice =  $itp ? $itp->price : 0;
            CustomerOrderItem::create([
                'customer_order_id' => $this->order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'item_price' =>  $itemprice,
                'special_requests' => $item['special_requests'] ?? null,
                'preparation_status' => 'pending',
            ]);

            $this->total_amount +=  $itemprice  * $item['quantity'];

            Inventory::updateOrCreate(
                ['product_id' =>  $item['product_id']],
                ['quantity' => DB::raw('quantity - ' . $item['quantity'])]
            );

            $this->order->update([
                'total_amount' => DB::raw('total_amount + ' . $this->total_amount)
            ]);
        }

        $this->closeAddItemsModal();
    }

    public function openAddItemsModel()
    {
        $this->isAddingItemsModalOpen = true;
    }

    public function closeAddItemsModal()
    {
        $this->isAddingItemsModalOpen = false;
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function render()
    {
        return view('livewire.pos.add-customer-order-items',[
            'products' => Product::where('is_sellable', true)->get(),
        ]);
    }

    
}
