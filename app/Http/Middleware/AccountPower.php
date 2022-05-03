<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountPower
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //假設這個平台只有兩個使用者 John 跟 Senna
        // John 登入後會到後台(因為他是超級管理者)
        // Senna 登入後只能到前台 (因為她只能管理留言)

        // if (Auth::user()->name == 'John' ){
        //     return $next($request);
        // }else{
        //     return redirect('/');
        // }

        // 改用身分組判斷 1: 管理者, 2:一般客戶
        if (Auth::user()->power == 1 ){
            return $next($request);
        }else{
            return redirect('/');
        }
    }
}
