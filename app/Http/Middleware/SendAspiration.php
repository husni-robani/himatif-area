<?php

namespace App\Http\Middleware;

use App\Providers\Models\AspirationLink;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendAspiration
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasValidSignature() || !AspirationLink::where('token', $request->token)->exists()) {
            abort(403);
        }

        return $next($request);
    }
}
