<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pet;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller {
    public function getSitemap(){
        $AllBrands = Brand::get();
        $AllCategories = Category::get();
        $AllProducts = Product::where('status','!=','hidden')->get();
        $AllArticles = Article::get();
        $AllPets = Pet::get();
        return response()->view('sitemap' , compact( 'AllBrands'  , 'AllCategories' , 'AllProducts', 'AllArticles', 'AllPets'))->header('Content-Type', 'text/xml');
    }
}
