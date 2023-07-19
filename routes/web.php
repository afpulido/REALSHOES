<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/* Rutas invitados*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/colecciones', function () {
    return view('/shop/colecciones');
})->name('gcolecciones');

Route::get('/damas', function () {
    return view('/shop/damas');
})->name('gdamas');

Route::get('/caballeros', function () {
    return view('/shop/caballeros');
})->name('gcaballeros');

Route::get('/infantil', function () {
    return view('/shop/infantil');
})->name('ginfantil');


/*
*Ruta para acceder solo logueado a dashboard
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







/*Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('store');
*/

Route::get('/store', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('store');


Route::get('/colecciones', function () {
    return view('/shop/colecciones');
})->middleware(['auth', 'verified'])->name('colecciones');

Route::get('/damas', function () {
    return view('/shop/damas');
})->middleware(['auth', 'verified'])->name('damas');

Route::get('/caballeros', function () {
    return view('/shop/caballeros');
})->middleware(['auth', 'verified'])->name('caballeros');

Route::get('/infantil', function () {
    return view('/shop/infantil');
})->middleware(['auth', 'verified'])->name('infantil');



Route::get('/users', function () {
    return view('/dashboard/users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/products', function () {
    return view('/dashboard/products');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/inventory', function () {
    return view('/dashboard/inventory');
})->middleware(['auth', 'verified'])->name('inventory');

Route::get('/sales', function () {
    return view('/dashboard/sales');
})->middleware(['auth', 'verified'])->name('sales');

Route::get('/shopping', function () {
    return view('/dashboard/shopping');
})->middleware(['auth', 'verified'])->name('shopping');


require __DIR__.'/auth.php';
