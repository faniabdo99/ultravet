<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\ResetPassword;
use App\Mail\WelcomeNewUser;
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
         try {
             Mail::to($UserData['email'])->send(new WelcomeNewUser([$TheUser->id, md5($TheUser->id)]));
         } catch(\Exception $e){
            //The error happened here
         }
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
    public function activate($id, $hash){
        //Grab the user
        $TheUser = User::find($id);
        if(!$TheUser){
            //Custom 404 if the user is not found
            return redirect()->route('home')->withErrors('Please follow the exact link was sent to you via email');
        }else{
            if(md5($TheUser->id) == $hash){
                //Activate the user account and redirect him back to homepage
                $TheUser->update(['active' => true]);
                return redirect()->route('home')->withSuccess('Your account has been activated');
            }else{
                return redirect()->route('home')->withErrors('Please follow the exact link was sent to you via email');
            }
        }
    }
    public function redirectToProvider($provider){
        //Redirect the user to the provider (Google)
        return Socialite::driver($provider)->redirect();
    }
    public function providerCallback($driver){
        //Get the user data from the provider response
        $user = Socialite::driver($driver)->user();
        //Check if the user is already registered
        $TheUser = User::where('email' , $user->user['email'])->first();
        if($TheUser){
            //There is a user with this email, login
            Auth::loginUsingId($TheUser->id);
            return redirect()->route('home')->withSuccess('You are now logged in!');
        }else{
            //This is a new user, signup then login
            $UserData = [
                'name' => $user->user['name'],
                'email' => $user->user['email'],
                'password' => 'Social',
                'auth_provider' => 'Google',
                'active' => true,
            ];
            $TheUser = User::create($UserData);
            Auth::loginUsingId($TheUser->id);
            return redirect()->route('home')->withSuccess('You have created a new account! Welcome.');
        }
    }
    public function getReset(){
        //Return the reset password view
        return view('auth.password.reset');
    }
    public function postReset(Request $r){
        //Validate the request
        $r->validate(['email' => 'required|email']);
        //Fetch the user
        $TheUser = User::where('email', $r->email)->first();
        if($TheUser){
            //Send reset email
            try {
                Mail::to($TheUser->email)->send(new ResetPassword($TheUser));
            } catch(\Exception $e){
               //The error happend here
            }
        }
        return redirect()->route('home')->withSuccess('If there is an account with this email, you will receive a reset password link');
    }
    public function getSetPassword($id,$hash){
        $TheUser = User::find($id);
        if(!$TheUser){
            return redirect()->route('home')->withErrors('Please follow the exact link sent to your inbox');
        }else{
            if(md5($TheUser->id) == $hash){
                // Render set password form
                return view('auth.password.set' , compact('TheUser'));
            }else{
                return redirect()->route('home')->withErrors('Please follow the exact link sent to your inbox');
            }
        }
    }
    public function postSetPassword(Request $r, $id, $hash){
        $r->validate(['password' => 'required|confirmed|min:5']);
        // Grab the user
        $TheUser = User::find($id);
        if(!$TheUser){
            return redirect()->route('home')->withError('Please don\'t change the url or the form content!');
        }else{
            if(md5($TheUser->id) == $hash){
                //Update the password
                $TheUser->update(['password' => Hash::make($r->password)]);
                return redirect()->route('user.getLogin')->withSuccess('Your password has been updated!');
            }else{
                return redirect()->route('home')->withError('Please don\'t change the url or the form content!');
            }
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home')->withSuccess('You have been logged out sucessfully!');
    }
}
