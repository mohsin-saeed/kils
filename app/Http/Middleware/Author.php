<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
class Author {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		
		$user = Auth::user();
		//print_r($user->user_typ);die;
		if($user->user_typ=='author'){
			return $next($request);
		}else{

			return Redirect::back();
		}
		
	}

}
