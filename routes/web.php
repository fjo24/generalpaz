<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//HOME
Route::get('/', 'PaginasController@home')->name('inicio');

//BUSCADOR
Route::post('productos/buscar', [
    'uses' => 'PaginasController@buscar',
    'as'   => 'buscar',
]);


//SERVICIOS
Route::get('/servicios', 'PaginasController@servicios')->name('servicios');

//INFO DE PRODUCTO
Route::get('productoinfo/{id}', 'PaginasController@productoinfo')->name('productoinfo');

//PRODUCTOS
Route::get('/productos/{categoria_id}',  'PaginasController@productos')->name('productos');

//CATEGORIAS
Route::get('/categorias', 'PaginasController@categorias');

//EMPRESAS
Route::get('/empresa', 'PaginasController@empresa')->name('empresa');

//CONTACTO
Route::get('/contacto/{producto}', 'PaginasController@contacto')->name('contacto');
Route::post('enviar-mailcontacto', [
    'uses' => 'PaginasController@enviarmailcontacto',
    'as'   => 'enviarmailcontacto',
]);

//TRABAJA CON NOSOTROS
Route::get('/trabaja', 'PaginasController@trabaja')->name('trabaja');
Route::post('enviarcv', [
    'uses' => 'PaginasController@enviarcv',
    'as'   => 'enviarcv',
]);

    //PRESUPUESTO
Route::get('/presupuesto', 'PresupuestoController@index');
Route::post('enviar-presupuesto',[
    'uses'=>'PresupuestoController@enviarMail',
    'as'=>'enviarmail'
]);

//CLIENTES
Route::get('/clientes', 'PaginasController@clientes')->name('clientes');

//CATEGORIA DE OBRAS
Route::get('/categoriaobras', 'PaginasController@categoriaobras')->name('catobras');
//OBRA
Route::get('/obras/{obra_id}', 'PaginasController@obras')->name('obras');
//GALERIA
Route::get('/obragaleria/{obra_id}', 'PaginasController@galeria')->name('obragaleria');


//ADMIN*************->middleware('admin')******************************************************************************************->middleware('auth')
Route::prefix('adm')->group(function () {
    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin');

   /*------------CATEGORIAS DE OBRAS----------------*/
    Route::resource('cat-obras', 'adm\CatObrasController');

    /*------------OBRAS----------------*/
    Route::resource('obras', 'adm\ObrasController');

    /*   /*------------IMAGEN\OBRAS----------------*/
    /*-------imagenes obras----------*/
    Route::get('/obras/imagenes/{obra_id}', 'adm\ObrasController@imagenes')->name('imagenobra'); //index del modulo imagenes obras
    //agregar nuevas imagenes de productos
    Route::post('obras/{id}/imagen/', 'adm\ObrasController@nuevaimagen')->name('nuevaimagen'); //es el store de las imagenes
    Route::delete('imagen_obras/{id}/destroy', [ //eliminar imagenes
        'uses' => 'adm\ObrasController@destroyimg',
        'as'   => 'imgobras.destroy',
    ]);
    /*------------SERVICIOS----------------*/
    Route::resource('servicios', 'adm\ServiciosController');
    /*------------CLIENTES----------------*/
    Route::resource('clientes', 'adm\ClientesController');
    Route::delete('clientes/{id}/destroy', [
        'uses' => 'adm\ClientesController@destroy',
        'as'   => 'clientes.destroy',

    ]);


    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController');

    /*------------DATOS----------------*/
    Route::resource('datos', 'adm\DatosController');

    /*------------DESTACADO HOMES----------------*/
    Route::resource('destacadoshomes', 'Adm\DestacadohomesController');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController');



    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController');

    /*------------NOVEDADES----------------*/
    Route::resource('novedades', 'Adm\NovedadesController');
    /*------------Imagen----------------*/
    Route::get('novedad/{novedad_id}/imagenes/', 'Adm\NovedadesController@imagenes')->name('imgnovedad.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('novedad/nuevaimagen/{id}', 'Adm\NovedadesController@nuevaimagen')->name('imgnovedad.nueva'); //es el store de las imagenes
    Route::delete('imgnovedad/{id}/destroy', [
        'uses' => 'Adm\NovedadesController@destroyimg',
        'as'   => 'imgnovedad.destroy',
    ])->middleware('admin');

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    /*------------MODELOS----------------*/
    Route::resource('modelos', 'adm\ModelosController');
    /*------------TIPOS DE VIDRIO----------------*/
    Route::resource('tiposvidrio', 'adm\TiposvidrioController');
    /*------------VENTAJAS----------------*/
    Route::resource('ventajas', 'adm\VentajasController');

    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);

    /*------------LOCALES----------------*/
    Route::resource('locales', 'Adm\LocalesController');

    /*------------NEWSLETTERS----------------*/
    Route::resource('newsletters', 'Adm\NewslettersController');

    /*------------REDES----------------*/
    Route::resource('redes', 'Adm\RedesController');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController');

    /*------------TEXTO CERTIFICACIONES----------------*/
    Route::resource('certificaciones', 'Adm\CertificacionesController');
    /*------------Imagen----------------*/
    Route::post('imgcertificaciones', 'Adm\CertificacionesController@nuevaimagen')->name('imgcertificaciones'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::delete('imgcertificaciones/{id}/destroy', [
        'uses' => 'Adm\CertificacionesController@destroyimg',
        'as'   => 'imgcertificaciones.destroy',
    ]);



    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'adm\MetadatosController');

});


