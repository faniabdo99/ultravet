<?php
namespace App\Http\Controllers;
use App\Models\ProductVariation;
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
        $AllCategories = Category::orderBy('order_num', 'DESC')->get();
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
            $AllProducts = Product::where($FiltersArray)->latest()->paginate(12);
        }else{
            //Default products list
            $AllProducts = Product::latest()->paginate(12);
        }
        $NonPaginatedProducts = Product::latest()->get();
        return view('product.index' , compact('AllProducts','FeaturedProducts', 'AllPets', 'AllCategories', 'AllBrands', 'NonPaginatedProducts'));
    }
    public function getSingle($slug, $id){
        $TheProduct = Product::findOrFail($id);
        return view('product.single' , compact('TheProduct'));
    }

    /**
     * @param Request $r
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response/Models/Product
     */
    public function postSearch(Request $r){
        if(empty($r->search)){
            return response('Please enter a search term!' , 400);
        }else{
             $SearchTerm = $r->search;
             $Products = Product::where('title' , 'LIKE' , "%$SearchTerm%")->with(['Category', 'Brand', 'Pet'])->get();
             return response($Products, 200);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getProductVariationData($id){
        // Find the product variation
        $Variation = ProductVariation::find($id);
        if(!$Variation){
            return response('There is no such variation!', 404);
        }
        return response($Variation->Product, 200);
    }
}
