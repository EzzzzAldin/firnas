<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'price',
        'currency',
        'payment_status',
        'payment_transaction_id',
        'payment_method',
        'customer_email',
        'customer_mobile',
        'customer_name',
        'order_reference',
    ];
}
