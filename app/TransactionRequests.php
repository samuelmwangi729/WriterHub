<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionRequests extends Model
{
    protected $fillable=[
        'MerchantRequestID',
        'CheckoutRequestID',
        'ResponseCode',
        'ResponseDescription',
        'CustomerMessage',
        'Status',
    ];
}
