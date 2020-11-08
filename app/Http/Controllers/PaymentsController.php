<?php

namespace App\Http\Controllers;

use App\Payments\Payment;

class PaymentsController
{
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }
}
