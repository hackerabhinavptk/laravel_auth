<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});
//  Route::get('/form', [ContactController::class, 'Form']);

Route::post('/form', [ContactController::class, 'add']);

Route::get('/list', [ContactController::class, 'list']);


Route::get('/delete/{id}', [ContactController::class, 'delete']);


Route::get('/edit/{id}', [ContactController::class, 'edit']);


Route::post('/edit', [ContactController::class, 'edit_contact']);