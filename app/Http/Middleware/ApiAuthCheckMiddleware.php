<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use App\Models\Api;
use App\Util\ApiStatus;
use Closure;
use Illuminate\Http\Request;

class ApiAuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws ApiException
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->tokenCan(Api::FRONTEND)) {
            return $next($request);
        }
        throw new ApiException("无权限访问", ApiStatus::ERROR);
    }
}
