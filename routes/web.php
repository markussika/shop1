<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/products", [ProductController::class, "index"]);

Route::get("/products/create", [ProductController::class, "create"]);
Route::post("/products", [ProductController::class, "store"]);
Route::get("/products/{id}", [ProductController::class, "show"]);
Route::get("/products/{id}/edit", [ProductController::class, "edit"]);
Route::put("/products/{id}", [ProductController::class, "update"]);
Route::delete("products/{id}", [ProductController::class, "destroy"]);

Route::get("/register", [UserController::class, "create"]);
Route::post("/register", [UserController::class, "store"]);

Route::get("/login", [UserController::class, "login"]);
Route::post("/login", [UserController::class, "signin"]); // Ļoti nepareizi, labāk būtu login2, vēl labāk - uztaisīt atsevišķu Controller

Route::post("/logout",[UserController::class, "logout"]);