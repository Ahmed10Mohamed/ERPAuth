<?php

namespace App\Http\Middleware;

use Closure;

class Active
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


            if (auth('api')->user( )&&auth('api')->user()->block ) {
                return response()->json(['success' => false, 'active'=>false,'message'=>'This Account Not Active', 'code'=>401]);


            }

        return $next($request);
    }
}
