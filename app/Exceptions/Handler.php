<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson())
        {
            return response()->json(['success' => false, 'errors'=>'قم بالدخول اولا إلى حسابك', 'code'=>405], 405);
        }

        return redirect('Login');
    }
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof AuthenticationException) {
                return errorResponseMessage("Authentication Exception Unauthorized", 401);
            }

            if ($exception instanceof NotFoundHttpException) {
                return errorResponseMessage('Route Not Found', 404);
            }

            // if (exception instanceof AuthorizationException) {
            //     return errorResponseMessage('Route Not Found', 404);
            // }

            if ($exception instanceof ModelNotFoundException) {
                return errorResponseMessage('Model Not Found', 404);
            }
            if ($exception instanceof Exception) {
                return errorResponseMessage($exception->getMessage(), 404);
            }
        }


        return parent::render($request, $exception);
    }
}
