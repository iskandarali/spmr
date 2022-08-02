<?php

use App\Http\Controllers\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('menu', MenuController::class);

Route::get('escribeme', function () {
    return "Contactme";
});

Route::get('contacto', function () {
    return "Ques disfrute mi web";
});

Route::get('custom', function () {
    $msj2 = "Main-main la *-*";
    $data = ['msj2' => $msj2, 'edad' => 15];

    return view('custom', $data);
});
