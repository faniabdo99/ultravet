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
        return $this->belongsTo(Product::class, 'product_id');
    }
    protected $allowedFilters = [
        'product_id'
    ];
}
