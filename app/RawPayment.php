<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawPayment extends Model
{
    protected $fillable=[
        'CheckOutId',
        'Transaction',
    ];
    protected $casts = [
       'Transaction'
    ];
}
