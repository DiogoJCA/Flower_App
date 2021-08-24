<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsLoggedIn;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home page Route
Route::get('/', function() {
    return view('home');
})->name('home');

// Basic CRUD structure is handle by 'resource' keyword.
Route::get('/flowers', [FlowerController::class, 'index'])->name('flowers');

// Route to the contact page
Route::get('/contact', [FlowerController::class, 'contact'])->middleware(EnsureUserIsLoggedIn::class)->name('contact');

// Route to the add flower form page
Route::get('/create-flower', [FlowerController::class, 'create'])->name('create-flower');

// Route to add the flower
Route::post('/create-flower', [FlowerController::class, 'store'])->name('create-flower-submit');

// Route to edit the flowers
Route::get('/update-flower/{id}', [FlowerController::class, 'edit']);

// Update the flower
Route::post('/update-flower/{id}', [FlowerController::class, 'update']);

// Route to delete flowers
Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy']);

// Route to show the flower
Route::get('/flower-details/{id}', [FlowerController::class, 'show']);

// Route to Add a comment
Route::post('/flower-details/{id}', [FlowerController::class, 'addcomment']);

Route::get('/api/getXflowers/{amount}', [ApiController::class, 'getXflowers']);

Route::get('/api/getFlowers', [ApiController::class,'getFlowers']);

Route::get('/api/getFlower/{id}', [ApiController::class,'getFlower']);

Route::get('/api/getType/{type}', [ApiController::class, 'getType']);

// Route to get the register form
Route::get('/register', [UserController::class, 'getForm'])->name('register');

// Route to post the register form
Route::post('/register', [UserController::class, 'postForm'])->name('register-submit');

// Route to the login page
Route::get('/login', [UserController::class,'getLogin'])->name('login');

Route::post('/login', [UserController::class,'postLogin'])->name('login-submit');
Route::get('/test', [UserController::class,'test'])->name('test');