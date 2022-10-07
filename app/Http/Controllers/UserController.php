<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
class UserController extends Controller{
    public function getSignup(){
        //return signup page view
        return view('auth.signup');
    }
    public function postSignup(Request $r){
        //Validate the request
        $r->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);
         //Save the user
         $UserData = $r->except('token');
         $UserData['password'] = Hash::make($r->password);
         $TheUser = User::create($UserData);
         //  Mail::to($UserData['email'])->send(new WelcomeNewUser($TheUser->id)); TODO: Send a welcome email here
         //Log the user in
         Auth::loginUsingId($TheUser->id);
         //Redirect to the homepage
         return redirect()->route('home')->withSuccess('You have been signed up & logged in successfully!');
    }
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $r){
        //Validate the request
        $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt to login
        if (Auth::attempt($r->except('_token'), $r->has('remember'))) {
            //User is logged in
            return redirect()->route('home')->withSuccess('You have been logged in successfully!');;
        }else{
            //Email or password are incorrect
            return back()->withErrors('This information dose not match our records');
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home')->withSuccess('You have been logged out sucessfully!');
    }
}
