<?php

namespace App\Livewire\Finances;

use App\Models\Payment;
use Livewire\Component;

class FinanceAccounts extends Component
{
    public function render()
    {
        return view('livewire.finances.finance-accounts',[
            'payments' => Payment::all(),
        ]);
    }
}
