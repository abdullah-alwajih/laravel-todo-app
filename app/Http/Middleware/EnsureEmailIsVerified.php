<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && is_null($request->user()->email_verified_at)) {
            throw new AccessDeniedHttpException();
        }
        return $next($request);
    }
}
