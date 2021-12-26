<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsDosen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role !== 'Dosen') {
            if (Auth::user()->role == 'Kaprodi') {
                return redirect('/kaprodi');
            } else if (Auth::user()->role == 'Mahasiswa') {
                return redirect('/');
            } else if (Auth::user()->role == 'Admin') {
                return redirect('/admin');
            }
        }
        return $next($request);
    }
}
