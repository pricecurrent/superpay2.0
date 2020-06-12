<?php

namespace Tests\Feature\Payments;

use App\Http\Livewire\Payments\ProcessPayment;
use App\Payments\Payment;
use App\Payments\PaymentStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class ProcessPaymentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_successfully_processes_a_payment()
    {
        $payment = factory(Payment::class)->create([
            'status' => PaymentStatus::NEW,
            'amount' => 1200,
        ]);

        $testable = Livewire::test(ProcessPayment::class, ['payment' => $payment])
            ->set('billingToken', $billingGateway->generateValidPaymentToken())
            ->call('process');

        $this->assertEquals(PaymentStatus::PAID, $payment->fresh()->status);
        $this->assertEquals(1200, $billingGateway->getTotalChargesAmount());
        $this->assertEquals(1, $billingGateway->charges()->count());
        $this->assertEquals($billingGateway->lastCharge()->id, $payment->billing_charge_id);
    }
}
