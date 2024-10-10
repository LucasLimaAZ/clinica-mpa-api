<?php

use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionsController;
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
Route::resource('/patient', PatientController::class)->middleware('auth:sanctum');
Route::resource('/medication', MedicationsController::class)->middleware('auth:sanctum');
Route::resource('/message', MessagesController::class)->middleware('auth:sanctum');
Route::resource('/prescription', PrescriptionsController::class)->middleware('auth:sanctum');
Route::get('/patients/range/{startId}/{endId}', [PatientController::class, 'getPatientsInRange'])->middleware('auth:sanctum');
Route::get('/patients/count', [PatientController::class, 'countPatients'])->middleware('auth:sanctum');
Route::get('/medications/count', [MedicationsController::class, 'countMedications'])->middleware('auth:sanctum');
Route::get('/prescriptions/count', [PrescriptionsController::class, 'countPrescriptions'])->middleware('auth:sanctum');
Route::get('/messages/count', [MessagesController::class, 'countMessages'])->middleware('auth:sanctum');
