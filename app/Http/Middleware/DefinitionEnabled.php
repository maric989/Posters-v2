<?php

namespace App\Http\Middleware;

use Closure;

class DefinitionEnabled
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $config = config('definition.enabled');
        if ($config){
            return $next($request);
        }
        return abort('404');
    }
}
