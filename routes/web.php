<?php

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




Route::get('/', function (){
    return view('/clientes/Home');
})->name('home'); // colocar nombre a la ruta

// Inicio rutas Clientes 

Route::get('/clientes/Home', function (){
    return view('/clientes/Home');
})->name('Clienteshome'); // colocar nombre a la ruta



Route::get('/clientes/Damas', function (){
    return view('/clientes/Damas');
})->name('Damas'); // colocar nombre a la ruta

Route::get('/clientes/Caballeros', function (){
    return view('/clientes/Caballeros');
})->name('Caballeros'); // colocar nombre a la ruta

Route::get('/clientes/Infantil', function (){
    return view('/clientes/Infantil');
})->name('Infantil'); // colocar nombre a la ruta

Route::get('/clientes/Colecciones', function (){
    return view('/clientes/Colecciones');
})->name('Colecciones'); // colocar nombre a la ruta

Route::get('/clientes/Login', function (){
    return view('/clientes/Login');
})->name('Login'); // colocar nombre a la ruta

Route::get('/clientes/LoginRegister', function (){
    return view('/clientes/LoginRegister');
})->name('LoginRegister'); // colocar nombre a la ruta

Route::get('/clientes/Logout', function (){
    return view('home');
})->name('LoginRegister'); // colocar nombre a la ruta


// Fin rutas Clientes

// Inicio Rutas Usuarios logueados (admin y clientes)

Route::get('/dashboard/Homeboard', function (){
    return view('/dashboard/Homeboard');
})->name('Homeboard'); // colocar nombre a la ruta








// Fin Rutas Usuarios logueados (admin y clientes)