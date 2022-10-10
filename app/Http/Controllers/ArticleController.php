<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller{
    public function getBlog(){
        $AllArticles = Article::latest()->get();
        return view('blog.index', compact('AllArticles'));
    }
    public function getSingle($slug,$id){
        $TheArticle = Article::findOrFail($id);
        return view('blog.single', compact('TheArticle'));
    }
}
