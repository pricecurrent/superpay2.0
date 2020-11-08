<?php

namespace App\Billing;

use Illuminate\Support\Str;
use App\Billing\BillingGateway;

class FakeBillingGateway implements BillingGateway
{
    protected $charges = [];

    public function __construct()
    {
        $this->charges = collect();
    }

    public function charge(int $amount, string $token)
    {
        $charge = new Charge([
            'amount' => $amount,
            'id' => Str::random(4),
        ]);

        $this->charges->push($charge);

        return $charge;
    }

    public function generateValidPaymentToken()
    {
        return Str::random(8);
    }

    public function getTotalChargesAmount()
    {
        return $this->charges->map->getAmount()->sum();
    }

    public function charges()
    {
        return $this->charges;
    }

    public function lastCharge()
    {
        return $this->charges->last();
    }
}
