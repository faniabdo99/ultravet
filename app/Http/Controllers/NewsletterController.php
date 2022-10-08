<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Sheets;
class NewsletterController extends Controller{
    public function postNew(Request $r){
        $Rules = [
            'email' => 'required|email'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            return response($Validator->errors()->all(), 400);
        }else{
            //Update Google Sheets
            $Sheets = Sheets::spreadsheet(env('POST_SPREADSHEET_ID'))->sheet('Newsletter')->append([['email' => $r->email,'created_at' => now()]]);
            return response('Your email has been added to the newsletter', 200);
        }
    }
}
