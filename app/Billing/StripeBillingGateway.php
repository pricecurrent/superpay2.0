<?php

namespace App\Billing;

use App\Billing\BillingGateway;

class StripeBillingGateway implements BillingGateway
{
    public function charge(int $amount, string $token)
    {
    }
}
