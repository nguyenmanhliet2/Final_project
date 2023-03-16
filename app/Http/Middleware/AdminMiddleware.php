<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $admin = Auth::guard('admin')->check();
        if($admin){
            return $next($request);
        }else{
            toastr()->error('You need to login');
            return redirect('/loginAdmin');
        }
    }
}
