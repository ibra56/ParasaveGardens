<?php

namespace App\Livewire\Finances;

use App\Models\Payment;
use Livewire\Component;

class PaymentsList extends Component
{
    public function render()
    {
        return view('livewire.finances.payments-list',[
            'payments' => Payment::all(),
        ]);
    }
}
