<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductVariation extends Model {
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
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
    public function TargetProduct(){
        return $this->belongsTo(Product::class, 'related_product_id')->withDefault([
            'id' => 0,
            'slug' => 'deleted-product',
            'title' => 'Deleted Product',
            'price' => 'N/A',
            'image' => url('storage/placeholder.png')
        ]);
    }
    protected $allowedFilters = [
        'product_id'
    ];
}
