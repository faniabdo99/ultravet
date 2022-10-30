<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Pet;
use App\Models\Brand;
use App\Models\Product;
class ProductController extends Controller{
    public function getAll(Request $r){
        $FeaturedProducts = Product::featured()->latest()->limit(5)->get();
        $AllPets = Pet::latest()->get();
        $AllBrands = Brand::latest()->get();
        $AllCategories = Category::latest()->get();
        if(count($r->all()) > 0){
            //There are some applied filters
            $FiltersArray = [];
            //Filters
            if($r->has('category_id')){
                $FiltersArray[] = ['category_id', '=', $r->category_id];
            }
            if($r->has('pet_id')){
                $FiltersArray[] = ['pet_id', '=', $r->pet_id];
            }
            if($r->has('brand_id')){
                $FiltersArray[] = ['brand_id', '=', $r->brand_id];
            }
            if($r->has('price')){
                $PriceFilter = explode('-' , str_replace(' ','',str_replace('$' , '' , $r->price)));
                $FiltersArray[] = ['price', '>=' , $PriceFilter[0]];
                $FiltersArray[] = ['price', '<=' , $PriceFilter[1]];
            }
            $AllProducts = Product::where($FiltersArray)->latest()->get();
        }else{
            //Default products list
            $AllProducts = Product::latest()->get();
        }
        return view('product.index' , compact('AllProducts','FeaturedProducts', 'AllPets', 'AllCategories', 'AllBrands'));
    }
    public function getSingle($slug, $id){
        $TheProduct = Product::findOrFail($id);
        return view('product.single' , compact('TheProduct'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function getBrand(string $slug){
        // Get all products in brand
        $TheBrand = Brand::where('slug' , $slug)->firstOrFail();
        return view('product.brand' , compact('TheBrand'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function getPet(string $slug){
        // Get all products in brand
        $ThePet = Pet::where('slug' , $slug)->firstOrFail();
        return view('product.pet' , compact('ThePet'));
    }
}
