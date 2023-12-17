<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (Auth::user()->role != 'customer'){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }
            abort(401,'Anda tidak diizinkan mengakses halaman ini');
        }
        return $next($request);
    }
}
