<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model{
    use HasFactory, AsSource;
    protected $guarded = [];
    // Relations
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Products(){
        return $this->hasMany(OrderCart::class, 'order_id')->withDefault([
            'title' => 'Deleted product',
            'slug' => 'deleted-product',
            'id' => 0,
            'image' => 'https://via.placeholder.com/200x200'
        ]);
    }
}
