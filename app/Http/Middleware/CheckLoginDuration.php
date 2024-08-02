<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckLoginDuration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            if (!$user->last_login) {
                $user->last_login = Carbon::now();
                $user->save();
            }

            // Calculate the difference in days between now and the initial login date
            $daysSinceLastLogin = Carbon::parse($user->last_login)->diffInDays(Carbon::now());

            if ($daysSinceLastLogin >= 60) {
                return redirect('user.signinPage');
            }
        }

        return $next($request);
    }
}
