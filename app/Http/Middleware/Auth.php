<?php

namespace App\Http\Middleware;

use App\Auth\AuthUtil;
use Closure;

class Auth
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    AuthUtil::getUser();
    return $next($request);
  }
}
