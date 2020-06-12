<?php

namespace App\Http\Livewire\Payments;

use App\Payments\Payment;
use App\Payments\PaymentStatus;
use Livewire\Component;

class ProcessPayment extends Component
{
    public $payment;
    public $billingToken;

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function process()
    {
        $this->provder->charge($this->billingToken); ///
        $this->payment->update([
            'status' => PaymentStatus::PAID,
        ]);
    }

    public function render()
    {
        return view('livewire.payments.process-payment');
    }
}
