<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FAQ;
class PageController extends Controller{
    public function getAbout(){
        return view('static.about');
    }
    public function getFaq(){
        $FAQs = FAQ::latest()->get();
        return view('static.faq', compact('FAQs'));
    }
    public function getToc(){
        return view('static.toc');
    }
}
