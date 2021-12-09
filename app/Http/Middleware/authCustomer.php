<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class authCustomer
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
        // if(Session::has('custLogremember')){
        //     if(Session::get('custLogrember')){
        //         return $next($request);
        //     }
        //     else{
        //         return redirect()->route('loginCustomer')->with(['error'=>'You Must Login First !']);
        //     }
        // }
        // else{
        //     return redirect()->route('loginCustomer')->with(['error'=>'You Must Login First !']);
        // }
        if(!Session::has('custLog')){
            return redirect()->route('loginCustomer')->with(['error'=>'You Must Login First !']);
        }
        else{
            return $next($request);
        }
        
    }
}
