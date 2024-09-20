<?php

use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }

    $token = $user->createToken('clinica-api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/register', [UserController::class, 'register']);

Route::resource('/patient', PatientController::class)->middleware('auth:sanctum');;
