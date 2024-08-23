<?php

namespace App\Http\Middleware;

use App\Models\information;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (!Auth::check()) {
            return redirect()->route('login');
        }elseif(information::where('user_id',Auth::user()->id)->first() == null){
             return redirect()->route('information');
        }
            
        return $next($request);
    }
}
