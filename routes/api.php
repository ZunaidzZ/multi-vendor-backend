<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Spatie\Permission\Models\Role;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (only authenticated users)
Route::middleware(['auth:sanctum'])->group(function () {

    // User info route (any authenticated user)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Admin-only route
    Route::middleware(['role:admin'])->get('/admin/dashboard', [AdminController::class, 'dashboard']);

    // Other protected routes (e.g., for products, etc.)
    // Route::apiResource('products', ProductController::class);
});

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
// });


// Test route to confirm the API is working
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
