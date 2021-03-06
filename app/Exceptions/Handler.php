<?php

namespace App\Exceptions;

use Throwable;
use App\Exceptions\WrongCredentialException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (ValidationException $e, $request) {
            return response()->json([
                'status' => 422,
                'message' => $e->validator->errors()->first(),
            ], 422);          
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'status' => 404,
                'message' => $e->getMessage() ? 'Model Not Found' : 'Route Not Found',
            ], 404);          
        });

        $this->renderable(function (WrongCredentialException $e, $request) {
            return response()->json([
                'status' => 403,
                'message' => $e->getMessage(),
            ], 403);          
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'status' => 405,
                'message' => $e->getMessage(),
            ], 405);          
        });
    }
}
