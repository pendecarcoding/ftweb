<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeatherOrder extends Model
{
    protected $table = 'leather_order';

    protected $fillable = [
        'id',
        'invoice',
        'type_car',
        'id_leather',
        'id_coverage',
        'design',
        'color',
        'interior',
        'name',
        'contact_number',
        'email',
        'info',
        'totalprice',
        'priceseat',
        'viewed',
        'payment_status',
        'delivery_status',
        'order_status',
        'created_at',
        'updated_at',
    ];
}
