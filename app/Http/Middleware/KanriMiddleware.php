<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Kanrimiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->kanri_flag == 1){
              $request->merge(['user' => $user]);
            }else{
                return redirect('login');
            }
        }else{
            return redirect('login');
        }
        return $next($request);
    }
}
