<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    protected $fillable=[
        'Paper',
        'Status'
    ];
}
