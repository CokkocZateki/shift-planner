<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class CheckAuthed
{
    /**
     * This middleware only allows access if the visiting user is authenticated and is a member.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public
    function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }
        return Redirect::route('login::form');
    }
}
