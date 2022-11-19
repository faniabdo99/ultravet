<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model {
    use HasFactory, AsSource, Filterable, Attachable, SoftDeletes;
    protected $guarded = [];
    protected $appends = ['image_path'];
    //Relations
    public function Category(){
        return $this->belongsTo(Category::class)->withDefault([
            'title' => 'Deleted Category',
            'slug' => 'deleted-category',
        ]);
    }
    public function Brand(){
        return $this->belongsTo(Brand::class)->withDefault([
            'title' => 'Deleted Brand',
            'slug' => 'deleted-brand',
        ]);
    }
    public function Pet(){
        return $this->belongsTo(Pet::class)->withDefault([
            'title' => 'Deleted Pet',
            'slug' => 'deleted-pet',
        ]);
    }
    public function Discount(){
        return $this->belongsTo(Discount::class)->withDefault([
            'title' => 'Deleted Discount',
            'slug' => 'deleted-discount',
        ]);
    }
    public function Variations(){
        return $this->hasMany(ProductVariation::class, 'product_id');
    }
    //Custom Attributes & Methods
    public function getImagePathAttribute(){
        return url($this->image);
    }

    public function Related(){
        // Fetch related products to the current one
        return Product::where('category_id' , $this->category_id)->limit(10)->get();
    }
    /*
     * Below method determines id the product is ready to be added to a cart
     * Product should be in stock (qty > 1)
     * Product should be available (status == 'available')
     * Product should have positive price (price > 0)
     */
    public function getCartReadyAttribute(){
        return ($this->qty > 0 && $this->status == 'available' && $this->price > 0); //This will return true or false
    }
    public function getHasDiscountAttribute(){
        if($this->discount_id){
            $TheDiscount = Discount::find($this->discount_id);
            if($TheDiscount && Carbon::parse($TheDiscount->expire) > Carbon::today()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function getFinalPriceAttribute(){
        if($this->discount_id){
            //Check if there is a discount on this product
            $TheDiscount = Discount::find($this->discount_id);
            if($TheDiscount && Carbon::parse($TheDiscount->expire) > Carbon::today()){
                //Check the type -_-
                if($TheDiscount->type == 'fixed'){
                    $ThePrice = $this->price - $TheDiscount->value;
                }elseif($TheDiscount->type == 'percent'){
                    $TheDiscountAmount = round(($this->price * $TheDiscount->value) / 100);
                    $ThePrice = $this->price - $TheDiscountAmount;
                }
                $returnPrice = $ThePrice;
            }else{
                $returnPrice = $this->price;
            }
        }else{
            $returnPrice = $this->price;
        }
        return $returnPrice;
    }
    //Scopes
    public function scopeFeatured($query){
        return $query->where('is_featured' , 1);
    }

    // Admin panel
    protected $allowedSorts = [
        'title',
        'sku',
        'created_at',
        'updated_at'
    ];
    protected $allowedFilters = [
        'title',
    ];
}
