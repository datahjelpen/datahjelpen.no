<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class FilterDeletedUsers
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

        if ($user->delete) {
            Session::flash('error', 'Denne brukeren er slettet.');
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect()->route('user.deleted');
        }

        return $next($request);
    }
}
