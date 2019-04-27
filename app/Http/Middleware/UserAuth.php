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
        else{
            if ($_SESSION['user']['user_type_permission'] == "host" && $_SESSION['user']['is_payment_setup'] == 0) {
                return redirect('/user/accountSetting');
            }
         }
         return $next($request);
    }
}
