<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model {
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
    protected $guarded = [];
    public function getImagePathAttribute(){
        return url($this->image);
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Products(){
        return $this->hasMany(Product::class);
    }

    public function Pet(){
        return $this->belongsTo(Pet::class, 'pet_id');
    }
    public function Children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function scopeParent($query){
        return $query->where('is_parent' , 1);
    }
    public function scopeFeatured($query){
        return $query->where('is_featured' , 1);
    }
}
