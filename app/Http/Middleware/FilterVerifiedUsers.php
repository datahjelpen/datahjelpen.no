<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class FilterVerifiedUsers
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

        if (!$user->verified) {
            Session::flash('error', 'Denne siden/handlingen krever at du har verifisert din e-post.');
            return back()->withInput();
        }

        return $next($request);
    }
}
