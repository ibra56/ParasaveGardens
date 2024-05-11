<?php

namespace App\Livewire\Finances;

use App\Models\Supplier;
use Livewire\Component;

class NewSupplierModal extends Component
{
    public $newSupplierModal_isOpen = false;

    public $name;
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $website;
    public $company_name;


    public function openNewSupplierModal()
    {
        $this->newSupplierModal_isOpen = true;
    }

    public function closeNewSupplierModal()
    {
        $this->newSupplierModal_isOpen = false;
    }

    public function render()
    {
        return view('livewire.finances.new-supplier-modal');
    }

    public function addSupplier()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'sometimes|nullable',
            'phone' => 'required',
            'phone2' => 'sometimes|nullable',
            'address' => 'sometimes|nullable',
            'website' => 'sometimes|nullable',
            'company_name' => 'sometimes|nullable',
        ]);
        Supplier::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'address' => $this->address,
            'website' => $this->website,
            'company' => $this->company_name
        ]);
        noty()->addSuccess('Supplier details saved successfully');
        $this->closeNewSupplierModal();
        $this->reset();
    }
}
