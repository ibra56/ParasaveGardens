<?php

namespace App\Livewire\Pos;

use Livewire\Component;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderPayment;
use App\Models\Payment;
use Livewire\Attributes\Validate;

class CustomerOrderPaymentsModal extends Component
{
    public $order_id;
    public $order;
    public $isOrderPaymentsModalOpen = false;

    #[Validate('required|numeric|min:1')]
    public $newPaymentAmount;
    #[Validate('required|string|in:cash,card,mobile_money')]
    public $paymentMethod;

    public $balance;

    #[Validate('required|numeric|min:1')]
    public $newPaymentAmountFin;

    public function mount($order_id){
        $this->order_id = $order_id;
        $this->order = CustomerOrder::findOrFail($order_id);
    }
    public function render()
    {
        return view('livewire.pos.customer-order-payments-modal');
    }

    public function openCustomerOrderPaymentsModal(){
        $this->isOrderPaymentsModalOpen = true;
    }

    public function closeCustomerOrderPaymentsModal(){
        $this->isOrderPaymentsModalOpen = false;
    }
    public function savePayment(){
        $this->validate();
        $this->addPayment($this->newPaymentAmountFin);
    }
    public function addPaymentForServed()
    {
        $this->validate();
        $payableAmount = $this->order->total_amount;

        // remove the payments already made
        $payableAmount -= $this->order->payments->sum('amount');
        $this->balance = $this->newPaymentAmount - $payableAmount;

        // $this->addPayment($payableAmount);
    }

    public function addPaymentForOrdered()
    {
        $this->validate();
        $payableAmount = $this->order->total_amount;
        // $this->addPayment($payableAmount);
    }

    private function addPayment($totalAmount)
    {
        $payment = Payment::create([
            'customer_id' => $this->order->customer_id,
            'payment_method' => $this->paymentMethod,
            'amount' => $totalAmount,
            'payment_date' => now(),
        ]);

        CustomerOrderPayment::create([
            'staff_id' => auth()->id(), // assuming you have authentication set up
            'transaction_date' => now(),
            'payment_id' => $payment->id,
            'customer_order_id' => $this->order_id,
        ]);
        noty()->addSuccess('Payment Saved');
        $this->order = CustomerOrder::with('items.product', 'customer', 'servedBy', 'payments.payment')->findOrFail($this->order_id);
        $this->resetPaymentForm();
    }

    public function resetPaymentForm()
    {
        // $this->newPaymentAmount = null;
        $this->paymentMethod = null;
    }

}
