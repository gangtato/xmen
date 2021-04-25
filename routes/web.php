<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperHeroController;
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

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes();

Route::resource("heroes", SuperHeroController::class);

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");

Route::get('/home', [App\Http\Controllers\SuperHeroController::class, 'index'])->name('home');
Route::get('/heroes/skills/{id}', [App\Http\Controllers\SuperHeroController::class, 'skill'])->name('create.skills');
Route::post('/heroes/skills2/{id}', [App\Http\Controllers\SuperHeroController::class, 'createskill'])->name('create.skills2');
