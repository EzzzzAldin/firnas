<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'services_id');
    }
}
