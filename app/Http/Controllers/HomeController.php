<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Article;
use App\Models\Product;

class HomeController extends Controller{
    public function getHome(){
        $FeaturedPets = Pet::featured()->get();
        $ParentCategories = Category::parent()->featured()->limit(4)->get();
        $LatestArticles = Article::latest()->limit(3)->get();
        $TopProducts = Product::featured()->limit(10)->get();
        return view('index', compact('FeaturedPets' , 'ParentCategories' , 'LatestArticles','TopProducts'));
    }
}
