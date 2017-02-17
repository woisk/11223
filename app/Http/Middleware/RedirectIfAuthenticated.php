<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use DB;
class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      //获取请求的ip地址
      $ip = $request->ip();
      //
      // if($ip == '192.168.160.2' || $ip == '192.168.160.9') {
      //     abort(404);
      // }
      // $str = "[".date('Y-m-d H:i:s')."]".$ip.'---'.$_SERVER['REDIRECT_URL'].'---'.$_SERVER['HTTP_USER_AGENT']."\r\n";

      // file_put_contents('./11.log', $str, FILE_APPEND);
      // $data['time'] = date('Y-m-d H:i:s');
      // $data['ip'] = $ip;
      // @$data['url'] = $_SERVER['REDIRECT_URL'];
      // $data['host'] = $_SERVER['HTTP_USER_AGENT'];
      // $data['method'] = $_SERVER['REQUEST_METHOD'];
      // DB::table('log')->insert($data);

      return $next($request);
    }
}
