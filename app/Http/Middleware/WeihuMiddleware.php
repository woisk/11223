<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class WeihuMiddleware
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
        $status = DB::table('config')->value('status');
        if($status==1){
          return $next($request);
        }else{
          return view('errors.503');
        }
    }
}
