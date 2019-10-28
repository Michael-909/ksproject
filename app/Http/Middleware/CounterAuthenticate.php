<?php

namespace App\Http\Middleware;

use Closure;

class CounterAuthenticate
{

    public function handle($request, Closure $next) {
        $login_user = $request->session()->get(config('ticketing.login_user'));
        
        if ($login_user == NULL) {
            
            return redirect()->route('login');
            
        }
        // if (!($login_user->account_type == config('ticketing.account_type.admin') || $login_user->account_type == config('ticketing.account_type.sub_admin'))) {
        if (!($login_user->account_type == config('ticketing.account_type.counter') )){
            return redirect()->route('login');
        }
        
        return $next($request);
    }

}