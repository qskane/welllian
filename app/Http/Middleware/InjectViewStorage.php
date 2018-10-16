<?php

namespace App\Http\Middleware;

use Closure;

class InjectViewStorage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->setContent(
            str_replace(
                config('web.view.storage_placeholder'),
                json_encode(viewer()->storage()),
                $response->content()
            )
        );
    }
}
