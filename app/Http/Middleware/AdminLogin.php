<?php

namespace App\Http\Middleware;

use App\Admin;
use App\Member;
use Closure;

class AdminLogin
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

        $p = Admin::find(session('id'));
        if($p->isadmin == 1){
            return $next($request);
        }else{
            return redirect('adminindex');
        }
    }
}
