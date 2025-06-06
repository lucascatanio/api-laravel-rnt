<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

// Rota RESTful /api/usuarios
Route::apiResource('usuarios', UsuarioController::class);

// GET /api/usuarios → listar usuários
// POST /api/usuarios/→ criar usuário
// GET /api/usuarios/{id} → buscar por ID
// PUT /api/usuarios/{id} → atualizar
// DELETE /api/usuarios/{id} → deletar
