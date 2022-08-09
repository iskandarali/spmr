<?php

use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SupplierController;
use App\Models\Menu;
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
    $menus = Menu::orderBy('category_id')->get();

    return view('welcome', compact('menus'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('menu', MenuController::class);

    Route::resource('kategori-makanan', FoodCategoryController::class)->names('foodCategory');

    Route::resource('negeri', StateController::class)->names('state');

    Route::resource('product', ProductController::class)->names(['create' => 'add']);

    Route::resource('supplier', SupplierController::class)->names('supplier');

    Route::resource('manufacturer', ManufacturerController::class)->names('manufacturer');

    Route::resource('order', OrderController::class);

    Route::get('escribeme', function () {
        return "Contactme";
    });

    Route::get('escribeme2', function () {
        $nombre = "Andrés Cruz";
        $array = ['nana' => 'jhajhjaha', 'naasasna' => 'lalalaal'];
        return view('contacto', ["nombre" => $nombre], compact('array'));
    });

    Route::get('contacto', function () {
        return "Ques disfrute mi web";
    });

    Route::get('custom', function () {
        $msj2 = "Main-main la *-*";
        $data = ['msj2' => $msj2, 'edad' => 15];

        return view('custom', $data);
    });
});
