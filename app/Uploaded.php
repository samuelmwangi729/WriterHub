<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploaded extends Model
{
    protected $fillable=[
        'OrderId',
        'Writer',
        'Document',
        'Status'
    ];
}
