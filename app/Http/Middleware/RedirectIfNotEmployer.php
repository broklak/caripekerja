<?php

namespace App\Http\Middleware;

use App\Helpers\GlobalHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotEmployer
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'employer')
	{
	    if (!Auth::guard($guard)->check()) {
			$message = 'Silahkan masuk sebagai pemilik usaha untuk mengakses';
			return redirect()->guest('login	')
				->withInput(['role' => 'employer'])
				->withErrors([
					'role' => $message,
				]);
	    }

	    return $next($request);
	}
}