<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactRequest;
class ContactController extends Controller{
    public function getContact(){
        return view('contact.contact');
    }
    public function postContact(Request $r){
        //Validate the request
        $r->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'message' => 'required|min:15'
        ]);
        //Save the record in DB
        ContactRequest::create($r->all());
        //TODO:Send Email 
        //Redirect back with Success
        return back()->withSuccess('Your email has been sent! Will get back to you as soon as possible');
    }
}
