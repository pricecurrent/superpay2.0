<?php

namespace App\Billing;

class Charge
{
    protected $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getBillingId()
    {
        return $this->parameters['id'];
    }

    public function getAmount()
    {
        return $this->parameters['amount'];
    }
}
