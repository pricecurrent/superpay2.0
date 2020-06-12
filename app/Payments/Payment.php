<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * Don't protect against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];
}
