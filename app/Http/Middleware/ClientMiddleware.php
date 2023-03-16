<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $client = Auth::guard('client')->check();
        if($client){
            return $next($request);
        }else{
            toastr()->error('You need to login');
            return redirect('/loginClient');
        }
    }
}
