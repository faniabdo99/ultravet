<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wishlist extends Model{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    // Relations
    public function Product(){
        return $this->belongsTo(Product::class, 'product_id')->withDefault([
            'id' => 0,
            'slug' => 'deleted-product',
            'title' => 'Deleted Product',
            'price' => 'N/A',
            'image' => url('storage/placeholder.png')
        ]);
    }
}
