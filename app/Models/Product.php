<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'price'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\ProductGroupItem', 'product_id');
    }
}
