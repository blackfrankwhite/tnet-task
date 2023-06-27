<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    protected $visible = [
        'user_id',
        'product_id',
        'quantity',
        'price'
    ];

    protected $appends = [
        'price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function getPriceAttribute()
    {
        return $this->product->price ?? null;
    }
}
