<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Lista de exceções que não são reportadas.
     */
    protected $dontReport = [
        //
    ];

    /**
     * Inputs que nunca devem ser exibidos em erros.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registrar callbacks para tratamento de exceções.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Tratamento customizado de exceções para API.
     */
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {

            // Erros de validação
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Dados inválidos.',
                    'errors' => $exception->errors(),
                ], 422);
            }

            // Model não encontrado
            if ($exception instanceof ModelNotFoundException) {
                $model = class_basename($exception->getModel());
                return response()->json([
                    'message' => "Registro de {$model} não encontrado."
                ], 404);
            }

            // Erros HTTP (403, 404, 500, etc.)
            if ($exception instanceof HttpException) {
                return response()->json([
                    'message' => $exception->getMessage() ?: 'Erro HTTP',
                ], $exception->getStatusCode());
            }

            // Erros de autenticação
            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'message' => 'Não autenticado.',
                ], 401);
            }

            // Outros erros
            return response()->json([
                'message' => 'Erro interno no servidor.',
                'error' => $exception->getMessage(),
            ], 500);
        }

        return parent::render($request, $exception);
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'message' => 'Os dados fornecidos são inválidos.',
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}
