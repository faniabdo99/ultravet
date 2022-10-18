<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    use HasFactory;
    protected $guarded = [];
    //Relations
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function getTotalPriceAttribute(){
        return $this->Product->final_price * $this->qty;
    }
}
