<?php

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

Route::get('/',  [\App\Http\Controllers\FrontendController::class,'index']);
Route::get('/createuser',  [\App\Http\Controllers\FrontendController::class,'createuser'])->name('create.user');
Route::post('/login',  [\App\Http\Controllers\LoginController::class,'login'])->name('login');


//Route::any('{any}', [\App\Http\Controllers\FrontendController::class,'index'])->name('test');


Route::get('/{vue?}', function() {
    return view('welcome');
})->where('vue', '[\/\w\.-]*');

Route::get('/logout', [\App\Http\Controllers\LoginController::class,'userLogout'])->name('user.logout');

//Route::any('/{any?}', function (){
//    return view('welcome');
//})->where('any','[\/w\.-]*');
