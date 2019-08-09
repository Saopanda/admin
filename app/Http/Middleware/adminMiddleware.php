<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        $admin_userid = session('admin_userid');
        if(is_null($admin_userid)){
            return redirect('/login')->with(['mes'=>'请先登录']);
        }else{
            return $next($request);
        }
    }
}
