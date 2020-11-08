<?php

namespace Tests\Feature\Payments;

use Tests\TestCase;
use Livewire\Livewire;
use App\Payments\Payment;
use App\Billing\BillingGateway;
use App\Payments\PaymentStatus;
use App\Billing\FakeBillingGateway;
use App\Http\Livewire\Payments\ProcessPayment;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProcessPaymentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_successfully_processes_a_payment()
    {
        $fakeBilling = new FakeBillingGateway();
        $this->instance(BillingGateway::class, $fakeBilling);

        $payment = factory(Payment::class)->create([
            'status' => PaymentStatus::NEW,
            'amount' => 1200,
        ]);

        $testable = Livewire::test(ProcessPayment::class, ['payment' => $payment])
            ->set('billingToken', $fakeBilling->generateValidPaymentToken())
            ->call('process');

        $this->assertEquals(1200, $fakeBilling->getTotalChargesAmount());
        $this->assertEquals(1, $fakeBilling->charges()->count());
        $this->assertEquals($fakeBilling->lastCharge()->getBillingId(), $payment->fresh()->billing_charge_id);
        $this->assertEquals(PaymentStatus::PAID, $payment->fresh()->status);
    }
}
