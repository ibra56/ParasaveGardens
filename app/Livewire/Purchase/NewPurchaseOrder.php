<?php

namespace App\Livewire\Purchase;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;

class NewPurchaseOrder extends Component
{
    public $fields = [];
    public $suppliers;
    public $products;
    public $quantity;
    public $unit_price;
    public $category_id;
    public $product_id;
    public $supplier_id;
    public $supplier_reference;
    public $need_by_date;
    public $user_id;
    public $expected_arrival_date;



    public function mount()
    {
        // Initialize the form with one empty field
        $this->addField();

    }

    public function addField()
    {
        $this->fields[] = [
            
            'quantity' => $this->quantity,
            'unit' => $this->unit_price,
            'category' => $this->category_id,
            'product' => $this->product_id,
            'supplier' => $this->supplier_id,
            'supplier_reference' => $this->supplier_reference,
            'need_by_date' => $this->need_by_date,
            'expected_arrival_date' => $this->expected_arrival_date

        ];
    }

    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }
    public function createNewPurchaseOrder()
    {
        $this->validate([
            'supplier_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'unit_price' => 'sometimes|nullable',
            'supplier_reference' => 'sometimes|nullable',
            'need_by_date' => 'required',
            'expected_arrival_date' => 'sometimes|nullable',
        ]);

        foreach ($this->fields as $field) {
            Purchase::create([
                'supplier_id' => $this->supplier_id,
                'product_id' => $this->product_id,
                'quantity' => $field['quantity'],
                'unit_price' => $field['unit_price'],
                'supplier_reference' => $this->supplier_reference,
                'need_by_date' => $this->need_by_date,
                'expected_arrival_date' => $this->expected_arrival_date,
                'user_id' => auth()->id(),
            ]);
        }

        session()->flash('message', 'Purchase Order created successfully.');
        return redirect()->route('purchase-order-list');
    }
    public function render()
    {
        $this->suppliers = Supplier::all();
        $this->products = Product::all();
        return view('livewire.purchase.new-purchase-order');
    }
}
