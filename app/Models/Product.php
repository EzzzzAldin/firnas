<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'services_id',
        'image',
        'dis',
        'questions',
        'slider'
    ];

    public $casts = [
        'questions' => 'array',
        'slider' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }
}
