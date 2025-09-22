<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $with = ['product', 'user'];

    protected $fillable = [
        'user_id',
        'product_id',
        'start_date',
        'end_date',
        'total_price',
        'no_ktp',
        'foto_ktp',
        'address',
        'phone_number',
        'status',
        'status_payment',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
