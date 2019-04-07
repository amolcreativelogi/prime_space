<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
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
        
         if(!isset($_SESSION['user']['is_user_login'])) { 
            return redirect('/');
         }
         return $next($request);
    }
}
