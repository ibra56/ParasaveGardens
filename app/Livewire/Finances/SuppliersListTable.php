<?php

namespace App\Livewire\Finances;

use App\Models\Supplier;
use Livewire\Component;

class SuppliersListTable extends Component
{
    public function render()
    {
        return view('livewire.finances.suppliers-list-table',[
            'suppliers' => Supplier::all(),
        ]);
    }
}
