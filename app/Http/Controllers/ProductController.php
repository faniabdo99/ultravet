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
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function getBrand(string $slug){
        // Get all products in brand
        $TheBrand = Brand::where('slug' , $slug)->firstOrFail();
        $AllProducts = Product::where('brand_id', $TheBrand->id)->latest()->paginate(12);
        return view('product.brand' , compact('TheBrand','AllProducts'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function getPet(string $slug){
        // Get all products in brand
        $ThePet = Pet::where('slug' , $slug)->firstOrFail();
        $AllProducts = Product::where('pet_id', $ThePet->id)->latest()->paginate(12);
        return view('product.pet' , compact('ThePet', 'AllProducts'));
    }
    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function getCategory(string $slug){
        // Get all products in brand
        $TheCategory = Category::where('slug' , $slug)->firstOrFail();
        $AllProducts = Product::where('category_id', $TheCategory->id)->latest()->paginate(12);
        return view('product.category' , compact('TheCategory', 'AllProducts'));
    }

    public function getCategoryBrand($CategorySlug, $PetSlug){
        // Get all products that match the category and brand
        $TheCategoryId = Category::where('slug' , $CategorySlug)->firstOrFail()->id;
        $ThePetId = Pet::where('slug' , $PetSlug)->firstOrFail()->id;
        $AllProducts = Product::where([
            ['category_id' , $TheCategoryId],
            ['pet_id' , $ThePetId],
        ])->paginate(12);
        return view('product.filter' , compact('AllProducts'));
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
}
