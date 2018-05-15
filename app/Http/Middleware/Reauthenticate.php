<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;
use Illuminate\Http\Request;
use App\ReauthLimiter;

class Reauthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $reauth = new ReauthLimiter($request);

        if (!$reauth->check()) {
            $request->session()->put('url.intended', $request->url());

            return $this->invalidated($request);
        }

        return $next($request);
    }

    /**
     * Handle invalidated auth.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function invalidated(Request $request)
    {
        return redirect()->route('reauthenticate.show');
    }
}
