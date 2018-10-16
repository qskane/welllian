<?php

namespace App\Http\Middleware;

use Closure;

class HtmlOptimize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $html = app('service.view')->optimize($response->content());

        $response->setContent($html);

        return $response;
    }
}
