<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'stock',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
