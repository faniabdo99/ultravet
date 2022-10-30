<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model{
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
    protected $guarded = [];
    public function getImagePathAttribute (){
        return url($this->image);
    }
    public function User (){
        return $this->belongsTo(User::class, 'user_id');
    }
}
