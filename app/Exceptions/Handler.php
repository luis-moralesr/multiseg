<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
            // Aquí puedes agregar lógica para reportar excepciones específicas
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                // Manejar excepciones de modelo no encontrado
                return response()->view('errors.404', [], 404);
            }
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {
            $statusCode = $e->getStatusCode();

            if ($statusCode == 500) {
                return response()->view('errors.500', [], 500);
            }

            if ($statusCode == 400) {
                return response()->view('errors.400', [], 400);
            }

            if ($statusCode == 404) {
                return response()->view('errors.404', [], 404);
            }
        });
    }
}
