<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    use HasFactory;
    protected $guarded = [];
    //Relations
    public function Product(){
        return $this->belongsTo(Product::class)->withDefault([
            'title' => 'Deleted product',
            'slug' => 'deleted-product',
            'id' => 0,
            'image' => 'https://via.placeholder.com/200x200'
        ]);
    }
    public function getTotalPriceAttribute(){
        return $this->Product->final_price * $this->qty;
    }
    public function getTitleattribute(){
        if($this->product_variations){
            $Variations = "";
            // Construct the cart item title (Product Title & Variations values)
            if($this->product_variations){
                $VariationsArray = unserialize($this->product_variations);
                $i = 0;
                // Remove the default values, all the reset are variations
                unset($VariationsArray['qty'],$VariationsArray['product_id'],$VariationsArray['user_id']);
                $VariationsCount = count($VariationsArray);
                foreach ($VariationsArray as $key => $Variation) {
                    $Variations .= $Variation;
                    if(++$i !== $VariationsCount){
                        $Variations .= '-';
                    }
                }
            }
            return $this->Product->title . '(' .$Variations . ')';
        }else{
            return $this->Product->title;
        }
    }
}
