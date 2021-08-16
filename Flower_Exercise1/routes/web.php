<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Basic CRUD structure is handle by 'resource' keyword.
Route::get('/flowers', [FlowerController::class, 'index']);

// Route to delete flowers
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy']);

// Route to the form page
Route::get('/create-flower', [FlowerController::class, 'create']);

// Route to add the flower
Route::post('/create-flower', [FlowerController::class, 'store']);

// Update the flower
Route::post('/update-flower/{id}', [FlowerController::class, 'update']);

// Route to edit the flowers
Route::get('/update-flower/{id}', [FlowerController::class, 'edit']);