<?php

namespace App\Exceptions;

use App\CodeResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        BusinessException::class
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
     * Render an exception into an HTTP response.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //validation Exception Unified processing and formatting
        if($exception instanceof ValidationException){
            return response()->json([
                'errno' => CodeResponse::PARAM_VALUE_ILLEGAL[0],
                'errmsg' => CodeResponse::PARAM_VALUE_ILLEGAL[1],
            ]);
        }

        //Business Exception Unified processing and formatting
        if ($exception instanceof BusinessException) {
            return response()->json([
                'errno' => $exception->getCode(),
                'errmsg' => $exception->getMessage()
            ]); //格式化成json
        }
        return parent::render($request, $exception);
    }
}
