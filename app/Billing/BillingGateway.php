<?php

namespace App\Billing;

interface BillingGateway
{
    public function charge(int $amount, string $token);
}
