<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\Http\Controllers\Helpers\FlashMessage;

class CheckIsAdmin
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
        $user = Auth::user();
        if(!$user->isAdmin())
        {
            FlashMessage::danger('You haven`t rights!');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
