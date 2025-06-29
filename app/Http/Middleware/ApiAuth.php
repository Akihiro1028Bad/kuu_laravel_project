<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //auth()->check() 認証済かどうか
        //auth()->user()->is_admin adminかどうか
        if (Auth::check()) {

            return $next($request);
        }

        //エラーメッセージ
        abort(403, 'This action is unauthorized.');
    }
}
