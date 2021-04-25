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
Route::delete('/hom/{id}', [App\Http\Controllers\SuperHeroController::class, 'destroy2'])->name('heroes.destroy2');
Route::get('/heroes/skills/{id}', [App\Http\Controllers\SuperHeroController::class, 'skill'])->name('create.skills');
Route::post('/heroes/skills2/{id}', [App\Http\Controllers\SuperHeroController::class, 'createskill'])->name('create.skills2');

Route::get('/simulasi', [App\Http\Controllers\SuperHeroController::class, 'simulasi'])->name('simulasi');
Route::post('/simulasi', [App\Http\Controllers\SuperHeroController::class, 'hasilSimulasi'])->name('nikah');
Route::post('/simulasi/export_excel', [App\Http\Controllers\SuperHeroController::class, 'simulasiExport'])->name('export_excel');
Route::post('/simulasi/cetak_pdf', [App\Http\Controllers\SuperHeroController::class, 'simulasiExportPDF'])->name('export_pdf');

Route::get('/skill_index', [App\Http\Controllers\SuperHeroController::class, 'skill_index'])->name('skill_index');
Route::get('/skill_show/{skill}', [App\Http\Controllers\SuperHeroController::class, 'skill_show'])->name('skill.show');
Route::get('/skill/createhero/{skil}', [App\Http\Controllers\SuperHeroController::class, 'createhero'])->name('create.hero');
Route::post('/skill/viewhero', [App\Http\Controllers\SuperHeroController::class, 'view_hero'])->name('view_hero');
Route::delete('/skillheroes/{id}', [App\Http\Controllers\SuperHeroController::class, 'destroy3'])->name('heroes.destroy3');