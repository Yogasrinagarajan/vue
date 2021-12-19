<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\controllers\ExampleController;
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




// Route::get('/form', [ExampleController::class,'index'])->name('form');
// Route::post('/add',[ExampleController::class,'store']);
Route::resource('form',ExampleController::class);
// Route::get('add',[ExampleController::class,'add']);
Route::get('formwizard',function(){
	return Inertia::render('formwizard');
});