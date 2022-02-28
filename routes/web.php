<?php
use App\Http\Controllers\test;  
use Illuminate\Support\Facades\Route;

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

Route::get("/", [test::class, "index"]);
Route::get("/about", [test::class, "about"]);
Route::get("/article/{id}", [test::class, "article"])->where("id","[0-9]+");

Route::get("/nouvelle/chanson", [Test::class, "nouvellechanson"]);
Route::post("/chanson/store", [Test::class, "storechanson"])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/{id}',[Test::class, "users"]) -> where("id", "[0-9]+");

