<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
       // echo $e;
        //return parent::render($request, $e);
        switch ($e) {

            case ($e instanceof ModelNotFoundException):

                return $this->renderException($e);
                break;

            case ($e instanceof FatalErrorException):
               // echo 'fatal exception';
                return $this->renderException($e);
                break;
            case ($e instanceof NotFoundHttpException):

                return $this->renderException($e);
                break;


            default:

                return parent::render($request, $e);

        }


    }

    protected function renderException($e)
    {

        switch ($e) {

            case ($e instanceof ModelNotFoundException):
                return response()->view('errors.503', [], 404);
                break;
            case ($e instanceof FatalErrorException):
                //echo 'response redirect';
                return response()->view('errors.503', [], 404);
                break;
            case ($e instanceof NotFoundHttpException):
                return response()->view('errors.503', [], 404);
                break;

            default:
                return (new SymfonyDisplayer(config('app.debug')))
                    ->createResponse($e);

        }

    }
}
