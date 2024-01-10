<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Route;
use Symfony\Component\ErrorHandler\Exception\FlattenException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }
    public function render($request, Throwable $exception)
    {

        if($this->isHttpException($exception)) {
            $code = FlattenException::create($exception)->getStatusCode($exception);
            switch ($code):

                case 404:
                    if (env('APP_ENV') === 'production') {
                        if(session()->exists('lang')) {
                            $lo = session()->get('lang');
                        } else {
                            $lo = "es";
                        }

                        return redirect()->route('elementoXX',$lo) ;
                    } else {
                        return parent::render($request, $exception);
                    }
                break;
                case 500:
                    dd($request);
                    break;

                default:
                    return parent::render($request, $exception);
                break;
            endswitch;
        }

        return parent::render($request, $exception);


    }



}
