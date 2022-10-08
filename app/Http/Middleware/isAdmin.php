<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin{
    public function handle(Request $request, Closure $next){
        if(auth()->check()){
            //User is logged in
            if(auth()->user()->role == 2){
                //The user is admin
                return $next($request);
            }else{
                //Abort 404 to never expose the admin url
                abort(404);
            }
        }else{
            //Abort 404 to never expose the admin url
            abort(404);
        }
    }
}
