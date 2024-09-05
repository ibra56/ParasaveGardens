<?php

namespace App\Livewire\Transactions;

use App\Models\Currency;
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
    public $totalPayable;
    public $currency;
    public $payment_date;

    public function mount($reservation)
    {
        $this->reservation = $reservation;
        $this->payment_date = now()->addHours(3)->format('Y-m-d H:i');
        $this->currency = $reservation->currency ? $reservation->currency->code : 'UGX';
        $this->payment_method = 'cash';
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
        return view('livewire.transactions.new-transaction-modal', [
            'currencies' => Currency::all(),
        ]);
    }


    public function createTransaction()
    {
        $this->validate([
            'payment_amount' => 'required|numeric',
            'payment_method' => 'required|in:cash,mobile_money',
            'currency' => 'required|exists:currencies,code',
        ]);
        $payment =  Payment::create([
            'customer_id' => $this->reservation->customer_id,
            'payment_method' => $this->payment_method,
            'amount' => $this->payment_amount,
            'payment_date' => $this->payment_date ?? now(),
            'currency' => $this->currency,
        ]);

        if (!$this->reservation->currency) {
            $this->reservation->update([
                'currency_id' => Currency::where('code', $this->currency)->first()->id
            ]);
        }

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
