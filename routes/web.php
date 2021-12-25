<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| */
Route::get('/', function () {
    return view('welcome');
});


Route::get('/localizacion','adminController@localizacion')->name('localizacion');


//clientes
Route::get('/Altaclientes','clienteController@Altaclientes')->name('Altaclientes');
Route::POST('/Guardaclientes','clienteController@Guardaclientes')->name('Guardaclientes');
Route::get('/Reporteclientes','clienteController@Reporteclientes')->name('Reporteclientes');
Route::get('/modificacl/{idcl}','clienteController@modificacl')->name('modificacl');
Route::POST('/editacl','clienteController@editacl')->name('editacl');
Route::get('/eliminacl/{idcl}','clienteController@eliminacl')->name('eliminacl');
Route::get('/restauracl/{idcl}','clienteController@restauracl')->name('restauracl');

//admins
Route::get('/Altaadmins','adminController@Altaadmins')->name('Altaadmins');
Route::POST('/Guardaadmins','adminController@Guardaadmins')->name('Guardaadmins');
Route::get('/Reporteadmins','adminController@Reporteadmins')->name('Reporteadmins');
Route::get('/modificaad/{idad}','adminController@modificaad')->name('modificaad');
Route::POST('/editaad','adminController@editaad')->name('editaad');
Route::get('/eliminaad/{idad}','adminController@eliminaad')->name('eliminaad');
Route::get('/restauraad/{idad}','adminController@restauraad')->name('restauraad');

//colores
Route::get('/Altacolor','coloresController@Altacolor')->name('Altacolor');
Route::POST('/Guardacolor','coloresController@Guardacolor')->name('Guardacolor');
Route::get('/Reportecolor','coloresController@Reportecolor')->name('Reportecolor');
Route::get('/modificacolores/{idcolor}','coloresController@modificacolores')->name('modificacolores');
Route::POST('/editarcolor','coloresController@editarcolor')->name('editarcolor');
Route::get('/eliminacol/{idcolor}','coloresController@eliminacol')->name('eliminacol');
Route::get('/restauracol/{idcolor}','coloresController@restauracol')->name('restauracol');


//categorias
Route::get('/Altacategoria','categoriasController@Altacategoria')->name('Altacategoria');
Route::POST('/Guardacategoria','categoriasController@Guardacategoria')->name('Guardacategoria');
Route::get('/Reportecategoria','categoriasController@Reportecategoria')->name('Reportecategoria');
Route::get('/modificacategorias/{idca}','categoriasController@modificacategorias')->name('modificacategorias');
Route::POST('/editarcategorias','categoriasController@editarcategorias')->name('editarcategorias');
Route::get('/restauraca/{idca}','categoriasController@restauraca')->name('restauraca');
Route::get('/eliminaca/{idca}','categoriasController@eliminaca')->name('eliminaca');

//materiales
Route::get('/Altamaterial','materialController@Altamaterial')->name('Altamaterial');
Route::POST('/Guardamaterial','materialController@Guardamaterial')->name('Guardamaterial');
Route::get('/Reportematerial','materialController@Reportematerial')->name('Reportematerial');
Route::get('/modificarmateriales/{idm}','materialController@modificarmateriales')->name('modificarmateriales');
Route::POST('/editarmateriales','materialController@editarmateriales')->name('editarmateriales');
Route::get('/eliminama/{idm}','materialController@eliminama')->name('eliminama');
Route::get('/restaurama/{idm}','materialController@restaurama')->name('restaurama');

//eventos
Route::get('/Altaeventos','eventoController@Altaeventos')->name('Altaeventos');
Route::POST('/Guardaeventos','eventoController@Guardaeventos')->name('Guardaeventos');
Route::get('/Reporteeventos','eventoController@Reporteeventos')->name('Reporteeventos');
Route::get('/modificaeventos/{idev}','eventoController@modificaeventos')->name('modificaeventos');
Route::POST('/editaeventos','eventoController@editaeventos')->name('editaeventos');
Route::get('/eliminaev/{idev}','eventoController@eliminaev')->name('eliminaev');
Route::get('/restauraev/{idev}','eventoController@restauraev')->name('restauraev');

//rentas
Route::get('/Altarentas','rentaController@Altarentas')->name('Altarentas');
Route::POST('/Guardarentas','rentaController@Guardarentas')->name('Guardarentas');
Route::get('/Reporterentas','rentaController@Reporterentas')->name('Reporterentas');
Route::get('/modificarentas/{idr}','rentaController@modificarentas')->name('modificarentas');
Route::POST('/editarentas','rentaController@editarentas')->name('editarentas');
Route::get('/eliminare/{idr}','rentaController@eliminare')->name('eliminare');
Route::get('/restaurare/{idr}','rentaController@restaurare')->name('restaurare');

//productos
Route::get('/Altaproductos','productosController@Altaproductos')->name('Altaproductos');
Route::POST('/Guardaproductos','productosController@Guardaproductos')->name('Guardaproductos');
Route::get('/Reporteproductos','productosController@Reporteproductos')->name('Reporteproductos');
Route::get('/modificaproductos/{idpr}','productosController@modificaproductos')->name('modificaproductos');
Route::POST('/editarproducto','productosController@editarproducto')->name('editarproducto');
Route::get('/eliminapr/{idpr}','productosController@eliminapr')->name('eliminapr');
Route::get('/restaurapr/{idpr}','productosController@restaurapr')->name('restaurapr');


//Acceso
Route::get('/login','acceso@login')->name('login');
Route::POST('/valida','acceso@valida')->name('valida');
Route::get('/cerrarsesion','acceso@cerrarsesion')->name('cerrarsesion');
Route::get('/principal','acceso@principal')->name('principal');
