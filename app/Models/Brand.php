<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\SoftDeletes;
class Brand extends Model {
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
    protected $guarded = [];
    public function getImagePathAttribute(){
        return url($this->image);
    }

    // Relations
    public function Products(){
        return $this->hasMany(Product::class);
    }

    // Scopes
    public function scopeFeatured($query){
        return $query->where('is_featured' , true);
    }
}
