<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


Route::get('hola', function () {
    Mail::to('al221811675@gmail.com')->send(new TestMail('jose'));
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('paises','App\Http\Controllers\ControladorWorld@get_country')->name('paises');
Route::get('eliminar','App\Http\Controllers\ControladorWorld@eliminar')->name('eliminar');
Route::get('modificar','App\Http\Controllers\ControladorWorld@modificar')->name('modificar');
Route::get('modificarp','App\Http\Controllers\ControladorWorld@modificarp')->name('modificarp');
Route::get('subirfoto','App\Http\Controllers\ControladorWorld@subirfoto')->name('subirfoto');
Route::post('subirfoto2','App\Http\Controllers\ControladorWorld@subirfoto2')->name('subirfoto2');
Route::get('consultar','App\Http\Controllers\ControladorWorld@consultar')->name('consultar');
Route::get('consultar2','App\Http\Controllers\ControladorWorld@consultar2')->name('consultar2');


Route::get('ciudades','App\Http\Controllers\ControladorWorld@ciudades')->name('ciudades');

Route::get('buscar/ciudades2','App\Http\Controllers\ControladorWorld@ciudades2')->name('buscar.ciudades2');
Route::get('/encriptar','App\Http\Controllers\ControladorWorld@encriptar')->name('encriptar');
Route::get('/desencriptar','App\Http\Controllers\ControladorWorld@desencriptar')->name('desencriptar');



Route::get('/carrito', 'App\Http\Controllers\ControladorCarrito@productos' );
Route::post('/cart-add', 'App\Http\Controllers\ControladorCart@add')->name('cart.add');
Route::get('/cart-checkout','App\Http\Controllers\ControladorCart@cart')->name('cart.checkout');
Route::post('/cart-clear', 'App\Http\Controllers\ControladorCart@clear')->name('cart.clear');
Route::post('/cart-removeitem', 'App\Http\Controllers\ControladorCart@removeitem')->name('cart.removeitem');
Route::post('/correo', 'App\Http\Controllers\CorreoController@correo')->name('correo');
Route::get('enviar', function () {
    return view('envio');
});
Route::get('/reportes', function () {
    return view('reportes');
});
//
Route::get('/pdf','App\Http\Controllers\ControladorReportes@pdf')->name('pdf');
Route::get('/excel','App\Http\Controllers\ControladorReportes@excel')->name('excel');
Route::get('/word','App\Http\Controllers\ControladorReportes@word')->name('word');
