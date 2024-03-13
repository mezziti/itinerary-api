<?php

namespace App\Http\Middleware;

use App\Http\Traits\apiResponseTrait;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminMiddleware
{
    use apiResponseTrait;

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role !== 'admin') {
            return $this->apiErrorResponse('User unauthorized to use admin routes', 401, 'error');
        }
        return $next($request);
    }
}
