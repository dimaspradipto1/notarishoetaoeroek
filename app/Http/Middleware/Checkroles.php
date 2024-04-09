<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class Checkroles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->roles == 'ADMIN'){
            return $next($request);
        }elseif(Auth::user() && Auth::user()->roles == 'USER'){
            return $next($request);
        }else{
            Alert::error('Error', 'kamu tidak memiliki akses untuk halaman ini')->autoclose(3000)->toToast();
            return redirect()->route('login');
        }
    }
}
