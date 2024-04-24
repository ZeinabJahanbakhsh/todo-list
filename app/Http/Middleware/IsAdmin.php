<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function App\Helpers\adminRole;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (adminRole($request->user())) {
            return $next($request);
        }

        return response()->json([
            'message' => __('messages.login_failed'),
        ]);
    }


}
