<?php

namespace App\Livewire\Pos;

use App\Models\Customer;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItem;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class NewCustomerOrderModal extends Component
{
    public $orderItems = [];
    public $customers;
    public $staff;
    public $menuItems;

    public $customer_id;
    public $new_customer_name;
    public $new_customer_email;
    public $new_customer_phone;

    public $table_number;
    public $payment_method;
    public $total_amount = 0;
    public $discount = 0;
    public $tax = 0;
    public $tip = 0;
    public $server_id;

    public $isOpen = false;
    public $isCreatingCustomer = false;


    public function render()
    {
        return view('livewire.pos.new-customer-order-modal');
    }

    public function addOrderItem()
    {
        $this->orderItems[] = ['product_id' => '', 'quantity' => 1, 'special_requests' => ''];
    }
    public function removeOrderItem($index)
    {
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
    }

    public function toggleCreatingCustomer()
    {
        $this->isCreatingCustomer = !$this->isCreatingCustomer;
        if (!$this->isCreatingCustomer) {
            $this->reset('new_customer_name', 'new_customer_email', 'new_customer_phone');
        }
    }

    public function saveOrder()
    {
        // $this->validate([
        //     'customer_id' => 'required|exists:customers,id',
        //     'table_number' => 'required|string|max:255',
        //     'payment_method' => 'required|string|max:255',
        //     'orderItems.*.product_id' => 'required|exists:menu_items,id',
        //     'orderItems.*.quantity' => 'required|integer|min:1',
        // ]);

        $this->validate([
            'table_number' => 'required|string|max:255',
            // 'payment_method' => 'required|string|max:255',
            'orderItems.*.product_id' => 'required|exists:products,id',
            'orderItems.*.quantity' => 'required|integer|min:1',
        ]);

        if ($this->isCreatingCustomer) {
            $this->validate([
                'new_customer_name' => 'required|string|max:255',
                'new_customer_email' => 'nullable|email|max:255',
                'new_customer_phone' => 'nullable|string|max:255',
            ]);

            $customer = Customer::create([
                'name' => $this->new_customer_name,
                'email' => $this->new_customer_email,
                'phone' => $this->new_customer_phone,
            ]);

            $this->customer_id = $customer->id;
        } else {
            $this->validate([
                'customer_id' => 'required|exists:customers,id',
            ]);
        }


        $order = CustomerOrder::create([
            'customer_id' => $this->customer_id,
            'table_number' => $this->table_number,
            'order_date' => now(),
            'status' => 'pending',
            // 'payment_method' => $this->payment_method,
            // 'total_amount' => $this->total_amount,
            // 'discount' => $this->discount,
            // 'tax' => $this->tax,
            'tip' => $this->tip,
            'payment_status' => 'unpaid',
            'server_id' => auth()->user()->id,
        ]);

        foreach ($this->orderItems as $item) {
            $menuItem = Product::find($item['product_id']);
            $itp = ProductPrice::where('product_id',$item['product_id'])->first();
            $itemprice =  $itp ? $itp->price : 0;
            CustomerOrderItem::create([
                'customer_order_id' => $order->id,
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
        }

        $order->update(['total_amount' => $this->total_amount]);

        $this->dispatch('orderSaved');
        noty()->addSuccess('Order saved');
        $this->closeModal();
    }

    public function mount()
    {
        $this->customers = Customer::all();
        $this->staff = Staff::all();
        $this->menuItems = Product::all();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset();
        $this->mount();
    }

}
