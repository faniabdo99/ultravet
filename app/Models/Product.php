<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Support\Carbon;
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
    public function Discount(){
        return $this->belongsTo(Discount::class);
    }
    //Custom Attributes & Methods
    public function getImagePathAttribute(){
        return url($this->image);
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
}
