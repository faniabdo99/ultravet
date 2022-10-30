<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pet extends Model{
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
    protected $guarded = [];
    public function getImagePathAttribute(){
        return url($this->image);
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // Scopes
    public function scopeFeatured($query){
        return $query->where('is_featured' , 1);
    }

    // Relation
    public function Products(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Product::class);
    }
}
