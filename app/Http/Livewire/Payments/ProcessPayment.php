<?php

namespace App\Http\Livewire\Payments;

use Livewire\Component;
use App\Payments\Payment;
use App\Billing\BillingGateway;
use App\Payments\PaymentStatus;
use Illuminate\Contracts\Auth\Guard;

class ProcessPayment extends Component
{
    public $payment;
    public $billingToken;

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function process(BillingGateway $billingGateway)
    {
        $charge = $billingGateway->charge($this->payment->amount, $this->billingToken);

        $this->payment->update([
            'status' => PaymentStatus::PAID,
            'billing_charge_id' => $charge->getBillingId()
        ]);
    }

    public function render()
    {
        return view('livewire.payments.process-payment');
    }
}
