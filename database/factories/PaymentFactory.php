<?php

use App\Payments\Payment;
use App\Payments\PaymentStatus;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'status' => PaymentStatus::NEW,
        'amount' => 2300,
    ];
});
