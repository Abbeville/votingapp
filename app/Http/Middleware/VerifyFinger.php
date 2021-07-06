<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\BiometricController;

class VerifyFinger
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
        $user = auth()->user();
        if ($user->hasRole('student')) {

            $url_verification   = BiometricController::getVerificationLink($user->id);

            $request->url_verifcation = $url_verification;
        }
        return $next($request);
    }
}
