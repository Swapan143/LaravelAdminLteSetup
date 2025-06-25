<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Adminauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('admin_details'))
        {
            return $next($request);
        }
        else
        {
            Session::flash('message', 'Please login first'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect('admin');
        }
    }
}
