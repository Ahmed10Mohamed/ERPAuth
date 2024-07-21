<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;


class APISettings
{
    public $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api_key = $request->header('x-api-key');

            $locale = $request->header('Content-Language');
            // if the header is missed
            if(!$locale){
                // take the default local language
                $locale = $this->app->config->get('app.locale');
            }


            // check the languages defined is supported
            if (!array_key_exists($locale, $this->app->config->get('languages'))) {
                // respond with error

                return response()->json(['success'=>false, 'code'=>405, 'message'=>'Language Not Supported'], 405);
            }
            // set the local language
            $this->app->setLocale($locale);

            // get the response after the request is done
            $response = $next($request);

            // set Content Languages header in the response
            $response->headers->set('Content-Language', $locale);
             // return the response
            return $response;

    }
}
