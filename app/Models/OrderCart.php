<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model{
    use HasFactory;
    protected $guarded = [];
    // Relations
    public function Product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function Cart(){
        return $this->belongsTo(Cart::class, 'cart_id');
    }

}
