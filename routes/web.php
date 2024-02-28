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

Route::get("/products/create", [ProductController::class, "create"])->middleware("auth");
Route::post("/products", [ProductController::class, "store"])->middleware("auth");
Route::get("/products/{id}", [ProductController::class, "show"]);
Route::get("/products/{id}/edit", [ProductController::class, "edit"])->middleware("auth");
Route::put("/products/{id}", [ProductController::class, "update"])->middleware("auth");
Route::delete("products/{id}", [ProductController::class, "destroy"])->middleware("auth");

Route::get("/register", [UserController::class, "create"])->middleware("guest");
Route::post("/register", [UserController::class, "store"])->middleware("guest");

Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");
Route::post("/login", [UserController::class, "signin"])->middleware("guest"); // Ļoti nepareizi, labāk būtu login2, vēl labāk - uztaisīt atsevišķu Controller

Route::post("/logout",[UserController::class, "logout"])->middleware("auth");


