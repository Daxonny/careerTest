<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class IsLogged
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
        $token = json_decode($request->cookie('token'));
        // dd($token);
		if(!$token) {
			return redirect('admin-login');
		} 
		Cookie::queue('token', $request->cookie('token'), 30*24*60);

		return $next($request);
	}
}