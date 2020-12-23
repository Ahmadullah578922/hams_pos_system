<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        if(Auth::check()){
            return $next($request);
           //if(Auth::user()->usertype=='Admin'){
               //dd('Admin');
              // return redirect()->route('admin.dashboard');
           //}//elseif(Auth::user()->usertype=='User'){
            //return redirect()->route('admin.dashboard');
//}
        }else{
            return redirect('/login');
           // return redirect()->back();
        }
    }
}
