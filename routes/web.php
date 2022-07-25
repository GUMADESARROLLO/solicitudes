<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

});

//RUTAS MENUS
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuario', 'Admin\usuarioController@index')->name('usuario');
Route::get('/orden-produccion', 'User\orden_produccionController@index')->name('orden-produccion');
Route::get('/configuracion', 'User\configuracionController@index')->name('configuracion');
//Route::get('/turno', 'User\configuracionController@turno')->name('turno');


//RUTAS USUARIO
Route::get('user/nuevo', 'Admin\usuarioController@crear')->name('user/nuevo');
Route::post('usuario/guardar', 'Admin\usuarioController@guardar')->name('usuario/guardar');
Route::get('failed-user', 'Admin\usuarioController@guardarUserFailed')->name('failed-user');
Route::get('success-user', 'Admin\usuarioController@guardarUserSuccess')->name('success-user');
Route::get('user/edit/{id}', 'Admin\usuarioController@editarUser')->name('user/edit/{id}');
Route::post('usuario/actualizar', 'Admin\usuarioController@actualizarUser')->name('usuario/actualizar');
Route::get('user/detalle/{id}', 'Admin\usuarioController@detalleUser')->name('user/detalle/{id}');
Route::get('user/eliminar/{id}', 'Admin\usuarioController@eliminarUser')->name('user/eliminar/{id}');
Route::get('user/activar/{id}', 'Admin\usuarioController@activarUser')->name('user/activar/{id}');


//RUTAS ROLES
Route::get('/rol', 'Admin\RolController@index')->name('rol');
Route::get('rol/crear', 'Admin\RolController@crear')->name('crear_rol');
Route::post('guardar_rol', 'Admin\RolController@guardar')->name('guardar_rol');
Route::get('menu', 'Admin\MenuRolController@index')->name('menu');
Route::get('menu/crear', 'Admin\Menu_controller@index')->name('menu/crear');
Route::get('menu-rol', 'Admin\MenuRolController@index')->name('menu-rol');
Route::post('menu-rol', 'Admin\MenuRolController@guardar')->name('guardar_menu_rol');
Route::post('menu/guardar', 'Admin\menu_controller@guardar')->name('menu/guardar');
Route::post('menu/guardar-orden', 'Admin\menu_controller@guardarOrden')->name('guardar-orden');
Route::get('rol/edit/{id}','Admin\RolController@editar')->name('rol/edit/{id}');
Route::post('rol/actualizar', 'Admin\RolController@actualizar')->name('rol/actualizar');

//Route::resource('turnos','User\TurnoController');

Route::get('pedido', 'HomeController@getData')->name('pedido');
Route::get('articulos_umk', 'HomeController@getArtiUMK')->name('articulos_umk');
Route::get('articulos_gp', 'HomeController@getArtiGP')->name('articulos_gp');
Route::get('laboratorios', 'HomeController@getLab')->name('laboratorios');
Route::get('consignado', 'HomeController@getConsig')->name('consignado');

Route::post('guardar_pedido', 'HomeController@guardar')->name('guardar_pedido');
Route::post('editar_pedido', 'HomeController@editar')->name('editar_pedido');
Route::post('cambiar_estado', 'HomeController@cambiarEstado')->name('cambiar_estado');




// RUTA DE TICKET


Route::get('dashboard', 'TicketsController@dashboard')->name('dashboard');
Route::get('TicketDetalles', 'TicketsController@getTicketDetalles')->name('TicketDetalles');
Route::get('nuevo_ticket', 'TicketsController@Nuevo')->name('nuevo_ticket');
Route::get('tickets', 'TicketsController@getTickets')->name('tickets');
Route::get('categorias', 'TicketsController@getcategorias')->name('categorias');
Route::get('Usuarios', 'TicketsController@getUsuarios')->name('Usuarios');
Route::get('Departamentos', 'TicketsController@getDepartamentos')->name('Departamentos');
Route::get('UnidadNegocio', 'TicketsController@getUnidadNegocio')->name('UnidadNegocio');


Route::get('Catalogo', 'OrdenesController@getCatalogo')->name('Catalogo');
Route::get('Ordenes', 'OrdenesController@getOrdenes')->name('Ordenes');
Route::get('OrdenesDetalles/{id}', 'OrdenesController@getOrdenesDetalles')->name('OrdenesDetalles');
Route::get('DelIngreso/{Ingreso}/{Soli}', 'OrdenesController@Delete_Ingreso')->name('DelIngreso');
Route::get('Clientes', 'OrdenesController@getClientes')->name('Clientes');
Route::get('Carrito', 'OrdenesController@getCarrito')->name('Carrito');
Route::get('Resumen', 'OrdenesController@getResumen')->name('Resumen');


Route::get('getArticulos', 'OrdenesController@getArticulos')->name('getArticulos');
Route::post('guardar_solicitud', 'OrdenesController@getGuardarSolicitud')->name('guardar_solicitud');
Route::post('update_ingreso', 'OrdenesController@getUpdateIngreso')->name('update_ingreso');
Route::post('/Update', 'OrdenesController@Update')->name('/Update');

Route::post('getSolicitudes', 'OrdenesController@getSolicitudes')->name('getSolicitudes');
Route::post('guardar_excel', 'OrdenesController@postGuardarExcel')->name('guardar_excel');
Route::post('AddComment', 'OrdenesController@postGuardarComment')->name('AddComment');
Route::post('getComment', 'OrdenesController@getComment')->name('getComment');
Route::post('DeleteComment', 'OrdenesController@DeleteComment')->name('DeleteComment');


//RUTA PROYECCION MENSUAL
Route::get('getDataCalendar/{mes}/{annio}', 'ProyeccionesController@getDataCalendar')->name('getDataCalendar');
Route::get('getArticuloCalendar/{mes}/{annio}', 'ProyeccionesController@getArticuloCalendar')->name('getArticuloCalendar');
Route::post('insert_evento', 'ProyeccionesController@InsertEvento')->name('insert_evento');
Route::get('Calendario', 'ProyeccionesController@getCalendario')->name('Calendario');
Route::get('proyecciones', 'ProyeccionesController@getProyecciones')->name('proyecciones');
Route::post('guardar_excel_proyecciones', 'ProyeccionesController@postGuardarExcelProyecciones')->name('guardar_excel_proyecciones');
Route::post('dtProyeccion', 'ProyeccionesController@getDataProyeccion')->name('dtProyeccion');
Route::post('dltEvent', 'ProyeccionesController@dltEvent')->name('dltEvent');
Auth::routes();


//RUTAS DE IMPORTACIONES
Route::get('Importacion', 'ImportacionController@getImportacion')->name('Importacion');
Route::get('ImportacionDetalles/{ID}', 'ImportacionController@getDetalles')->name('ImportacionDetalles');

Route::get('Shipto', 'ImportacionController@getShipto')->name('Shipto');
Route::get('Product', 'ImportacionController@getProduct')->name('Product');

//VENDOR
Route::get('Vendor', 'ImportacionController@getVendor')->name('Vendor');
Route::POST('SaveVendor', 'ImportacionController@SaveVendor')->name('SaveVendor');
Route::post('DeleteVendor', 'ImportacionController@DeleteVendor')->name('DeleteVendor');
Route::get('getOneVendor/{ID}', 'ImportacionController@getOneVendor')->name('getOneVendor');


//SHIP TO
Route::get('ShipTo', 'ImportacionController@getShipTo')->name('ShipTo');
Route::post('SaveShipTo', 'ImportacionController@SaveShipTo')->name('SaveShipTo');
Route::post('DeleteShipTo', 'ImportacionController@DeleteShipTo')->name('DeleteShipTo');
Route::get('getOneShipTo/{ID}', 'ImportacionController@getOneShipTo')->name('getOneShipTo');


//RUTAS PARA LAS NUEVAS ORDENES DE COMPRAS
Route::post('SaveNewPO', 'ImportacionController@SaveNewPO')->name('SaveNewPO');
Route::post('DeletePO', 'ImportacionController@DeletePO')->name('DeletePO');
Route::post('getOrdenesRangeDates', 'ImportacionController@getOrdenesRangeDates')->name('getOrdenesRangeDates');
Route::post('SaveProducto', 'ImportacionController@SaveProducto')->name('SaveProducto');
Route::post('DeleteProducto', 'ImportacionController@DeleteProducto')->name('DeleteProducto');
Route::get('getOneProducto/{ID}', 'ImportacionController@getOneProducto')->name('getOneProducto');
Route::post('AddProductPO', 'ImportacionController@AddProductPO')->name('AddProductPO');

Route::post('getInfoLinea', 'ImportacionController@getInfoLinea')->name('getInfoLinea');
Route::post('delInfoLinea', 'ImportacionController@delInfoLinea')->name('delInfoLinea');