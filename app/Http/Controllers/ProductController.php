<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller{
    public function getAll(){
        $AllProducts = Product::latest()->get();
        $FeaturedProducts = Product::featured()->latest()->limit(5)->get();
        $AllPets = Pet::latest()->get();
        $AllCategories = Category::latest()->get();
        return view('product.all' , compact('AllProducts','FeaturedProducts', 'AllPets', 'AllCategories'));
    }
    public function getSingle($slug, $id){
        $TheProduct = Product::findOrFail($id);
        return view('product.single' , compact('TheProduct'));
    }
}
