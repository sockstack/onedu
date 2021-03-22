<?php

namespace App\Exceptions;

use App\Util\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $e) {
            $response = new Response();
            // 自定义返回错误类型
            if($e instanceof NotFoundHttpException) {
                return response()->json($response->setCode($e->getCode())->setMessage($e->getMessage())->toArray(),
                    404);
            }
            if($e instanceof ValidationException) {
                return response()->json($response->setCode($e->getCode())->setMessage($e->getMessage())
                    ->setData($e->errors())->toArray(), $e->status);
            }
        });
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return  response()->json(['message' => $exception->getMessage()], 401);
    }
}
