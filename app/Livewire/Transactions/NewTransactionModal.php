<?php

namespace App\Livewire\Transactions;

use App\Models\Payment;
use App\Models\Staff;
use App\Models\Transaction;
use Livewire\Component;

class NewTransactionModal extends Component
{

    public $reservation;
    public $newTransactionModal_isOpen = false;
    public $payment_amount;
    public $payment_method;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }
    public function openNewTransactionModal()
    {
        $this->newTransactionModal_isOpen = true;
    }

    public function closeNewTransactionModal()
    {
        $this->newTransactionModal_isOpen = false;
    }

    public function render()
    {
        return view('livewire.transactions.new-transaction-modal');
    }


    public function createTransaction()
    {
        $payment =  Payment::create([
            'customer_id' => $this->reservation->customer_id,
            'payment_method' => $this->payment_method,
            'amount' => $this->payment_amount,
            'payment_date' => now(),
        ]);

        $transaction = Transaction::create([
            'customer_id' => $this->reservation->customer_id,
            'reservation_id' => $this->reservation->id,
            'payment_id' => $payment->id,
            'staff_id' => Staff::where('user_id', auth()->user()->id)->first()->id,
            'transaction_date' => now(),
        ]);

        $this->reset([
            'payment_amount',
            'payment_method',
        ]);

        noty()->addSuccess('Payment saved successfully');

        $this->closeNewTransactionModal();
    }
}
