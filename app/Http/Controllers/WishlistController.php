<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// Models
use App\Models\Wishlist;
// Utilities
use Illuminate\Support\Facades\Validator;
class WishlistController extends Controller{
    public function addToWishlist(Request $r){
        // Validate the request
        $Rules = [
            'user_id' => 'required',
            'product_id' => 'required|numeric'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            // Something went wrong
            return response('Something went wrong! Please try again later', 403);
        }else{
            // Make sure the item is not already in the wishlist
            if (!isInUserWishlist($r->user_id, $r->product_id)){
                // All clear!
                Wishlist::create($r->all());
            }else{
                return response('The item is already in your wishlist', 403);
            }
            // No need to return a 200 response as the frontend don't use it in this feature (There is no success message or anything like that)
        }
    }
}
