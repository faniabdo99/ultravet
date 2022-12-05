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
        $LatestArticles = Article::latest()->limit(3)->get();
        return view('index', compact('FeaturedPets' , 'LatestArticles'));
    }
}
