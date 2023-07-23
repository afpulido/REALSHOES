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


Route::get('/store', function () {
    return view('welcome');
})->name('store');


Route::get('/store/collections', function () {
    return view('/store/colecciones');
})->name('colecciones');

Route::get('/store/ladies', function () {
    return view('/store/damas');
})->name('damas');

Route::get('/store/gentlemen', function () {
    return view('/store/caballeros');
})->name('caballeros');

Route::get('/store/childish', function () {
    return view('/store/infantil');
})->name('infantil');

// Route::get('/colecciones', function () {
 //    return view('/store/colecciones');
 //})->name('gcolecciones');

// Route::get('/damas', function () {
//     return view('/store/damas');
// })->name('gdamas');

// Route::get('/caballeros', function () {
//     return view('/store/caballeros');
// })->name('gcaballeros');

// Route::get('/infantil', function () {
//     return view('/store/infantil');
// })->name('ginfantil');


/*
*Ruta para acceder solo logueado a dashboard
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ///Route::delete('/profile', [PersonaController::class, 'update'])->name('persona.update');
});







/*Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('store');
*/
/*
Route::get('/store', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('store');


Route::get('/store/collections', function () {
    return view('/store/colecciones');
})->middleware(['auth', 'verified'])->name('colecciones');

Route::get('/store/ladies', function () {
    return view('/store/damas');
})->middleware(['auth', 'verified'])->name('damas');

Route::get('/store/gentlemen', function () {
    return view('/store/caballeros');
})->middleware(['auth', 'verified'])->name('caballeros');

Route::get('/store/childish', function () {
    return view('/store/infantil');
})->middleware(['auth', 'verified'])->name('infantil'); */



Route::get('/dashboard/users', function () {
    return view('/dashboard/users');
})->middleware(['auth', 'verified'])->name('users.index');



Route::get('/dashboard/users/create', function () {
    return view('/dashboard/users/create');
})->middleware(['auth', 'verified'])->name('users.create');

Route::get('/dashboard/users/create', function () {
    return view('/dashboard/users/create');
})->middleware(['auth', 'verified'])->name('users.create');

Route::get('/dashboard/users/create', function () {
    return view('/dashboard/users/create');
})->middleware(['auth', 'verified'])->name('users.store');

Route::get('/dashboard/users/create', function () {
    return view('/dashboard/users/create');
})->middleware(['auth', 'verified'])->name('users.show');

Route::patch('/dashboard/users/create', function () {
    return view('/dashboard/users/create');
})->middleware(['auth', 'verified'])->name('users.update');




Route::get('/dashboard/products', function () {
    return view('/dashboard/products');
})->middleware(['auth', 'verified'])->name('products.index');

Route::get('/dashboard/typedoc', function () {
    return view('/dashboard/typedoc');
})->middleware(['auth', 'verified'])->name('typedoc.index');
Route::get('/dashboard/roles', function () {
    return view('/dashboard/roles');
})->middleware(['auth', 'verified'])->name('roles.index');


Route::get('/dashboard/inventory', function () {
    return view('/dashboard/inventory');
})->middleware(['auth', 'verified'])->name('inventory.index');

Route::get('/dashboard/sales', function () {
    return view('/dashboard/sales');
})->middleware(['auth', 'verified'])->name('sales.index');

Route::get('/dashboard/shopping', function () {
    return view('/dashboard/shopping');
})->middleware(['auth', 'verified'])->name('shopping.index');


Route::get('/dashboard/reports', function () {
    return view('/dashboard/reports');
})->middleware(['auth', 'verified'])->name('reports.index');


require __DIR__.'/auth.php';
