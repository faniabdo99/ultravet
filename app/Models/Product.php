<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Models\Attachment;
class Product extends Model {
    use HasFactory, AsSource, Filterable, Attachable;
    protected $guarded = [];
    //Relations
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Brand(){
        return $this->belongsTo(Brand::class);
    }
    public function Pet(){
        return $this->belongsTo(Pet::class);
    }
    public function getImagePathAttribute(){
        return url($this->image);
    }
    public function hasDiscount(){
        return !is_null($this->discount_id);
    }
    public function scopeFeatured($query){
        return $query->where('is_featured' , 1);
    }
}
