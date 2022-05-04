<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

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
        //請求通過條件 前往下一個請求
        // return $next($request);

        // 指定名字來給權限
        // if(Auth::user()->name =='admin'){
        //     return $next($request);
        // }else{
        //     return redirect('/');
        // }

        // 改用身分組判斷 1.管理者 2.一般客戶

        if(Auth::user()->power == 1){
                return $next($request);
            }else{
                return redirect('/');
            }
    }
}
