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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/validarcaptcha','Auth\LoginController@ValidarCaptcha')->name('validarcaptcha');

Route::get('/landing', 'HomeController@landing')->name('landing');

Route::group(['middleware' => ['administrador', 'auth']], function() {
    Route::get('/usuarios', 'AdminController@getAllUserList')->name('listadoUsuarios');
    Route::get('/formulario-registro', 'AdminController@registerForm')->name('formularioRegistro');
    Route::get('/{id}/formulario-actualizacion', 'AdminController@updateForm')->name('formularioActualizacion');
    Route::post('/registrar-usuario', 'AdminController@storeUser')->name('registrarUsuario');
    Route::post('/actualizar-usuario', 'AdminController@updateUser')->name('actualizarUsuario');
});

Route::group(['middleware' => ['bancario', 'auth']], function() {
    Route::get('/solicitudes', 'SolicitudesController@getActiveSolicitudes')->name('solicitudes');
    Route::post('/solicitudes', 'SolicitudesController@getActiveSolicitudes')->name('solicitudesPost');
    Route::get('/procesar-oferta', 'OfertaSolicitudesController@storeOfertaSolicitud')->name('procesarOferta');
    Route::post('/cerrarSolicitud', 'OfertaSolicitudesController@cerrarSolicitud')->name('cerrarSolicitud');
    Route::get('/ofertas', 'OfertaSolicitudesController@getOfertas')->name('ofertas');
    Route::post('/ofertas', 'OfertaSolicitudesController@getOfertas')->name('ofertasPost');
});

Route::group(['middleware' => ['cliente']], function() {
    Route::get('/ofertas-cliente', 'OfertaSolicitudesController@getCurrentOfertasCliente')->name('ofertasCliente');
    Route::get('/ofertas-procesadas-cliente', 'OfertaSolicitudesController@getOfertasProcesadasCliente')->name('ofertasProcesadasCliente');
    Route::post('/procesar-oferta-cliente', 'OfertaSolicitudesController@procesarOfertasCliente')->name('procesarOfertaCliente');
});