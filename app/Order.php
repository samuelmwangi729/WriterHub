<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'OrderNumber',
        'Client',
        'Writer',
        'DocType',
        'Spacing',
        'Language',
        'Topic',
        'Level',
        'Deadline',
        'Pages',
        'Subject',
        'Format',
        'Description',
        'Details',
        'Status',
        'Paid'
    ];
}
