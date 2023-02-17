<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function getImportPage(){
        return view('import-excel');
    }

    public function postImportPage(Request $r){
        Excel::import(new ProductImport, $r->file('file')->store('temp'));
//        return redirect('/')->with('success', 'All good!');
//        dd($r->all());
    }
}
