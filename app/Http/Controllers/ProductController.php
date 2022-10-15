<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller{
    public function getSingle($slug, $id){
        $TheProduct = Product::findOrFail($id);
        return view('product.single' , compact('TheProduct'));
    }
}
