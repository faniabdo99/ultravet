<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
class Category extends Model {
    use HasFactory, AsSource, Filterable, Attachable;
    protected $guarded = [];
    public function getImagePathAttribute(){
        return url($this->image);
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeParent($query){
        return $query->where('is_parent' , 1);
    }
    public function scopeFeatured($query){
        return $query->where('is_featured' , 1);
    }
}
