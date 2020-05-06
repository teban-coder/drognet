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

Route::bind('productos', function($Lote){
        return App\productos::where('Lote', $Lote)->first();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Nosotros', function () {
    return view('Nosotros');
});


Auth::routes();

Route::get('/Productos/home', 'HomeController@index')->name('home');

route::get('products','HomeController@products')->name('products.home');
route::get('products/detail-{Id}','HomeController@detail')->name('products.detail');
route::get('opinion','HomeController@opinion')->name('opinion');
route::post('opinion-store','HomeController@opinionStore')->name('opinion.store');

//Rutas para la tabla quejaSugerencia
Route::get('/admin/Contacto/Listar','QuejasugerenciaController@index')->name('quejas.index');
Route::get('/admin/Contacto/Create','QuejasugerenciaController@create')->name('quejas.create');
Route::post('/admin/Contacto/Agregar','QuejasugerenciaController@store')->name('quejas.store');
route::get('/admin/Contacto/editar/{Id}','QuejasugerenciaController@edit')->name('quejas.edit');
route::get('/admin/Contacto/update/{Id}','QuejasugerenciaController@update')->name('quejas.update');
route::get('/admin/Contacto/eliminar/{Id}','QuejasugerenciaController@destroy')->name('quejas.destroy');

//Rutas para la tabla Usuarios
/* Route::get('/admin/Usuarios/Listar','UsuariosController@index')->name('usuarios.index');
 route::get('/admin/Usuarios/Editar/{id}','UsuariosController@edit')->name('usuarios.editar');
route::get('/admin/Usuarios/update/{id}','UsuariosController@update')->name('usuarios.update');
route::get('/admin/Usuarios/eliminar/{id}','UsuariosController@destroy')->name('usuarios.eliminar');*/

//Rutas para la tabla TipoMecicamentos

/*route::get('/admin/Tipomedicamento/Listar','TipomedicamentoController@index')->name('medicamentos.index');
Route::get('/admin/Tipomedicamento/Create','TipoMedicamentoController@create')->name('medicamentos.create');
Route::post('/admin/Tipomedicamento/Agregar','TipoMedicamentoController@store')->name('medicamentos.store');
route::get('/admin/Tipomedicamento/Editar/{Id}','TipoMedicamentoController@edit')->name('medicamentos.edit');
route::get('/admin/Tipomedicamento/update/{Id}','TipoMedicamentoController@update')->name('medicamentos.update');
route::get('/admin/Tipomedicamento/eliminar/{Id}','TipoMedicamentoController@destroy')->name('medicamentos.destroy');*/



//Rutas para el carrito
Route::get('/Carrito/carrito', 'CarritoController@show')->name('carrito.carrito');
Route::get('/Carrito/create/{productos}', 'CarritoController@create')->name('carrito.create');
Route::get('/Carrito/delete/{productos}', 'CarritoController@delete')->name('carrito.delete');
Route::get('/Carrito/eliminar', 'CarritoController@trash')->name('carrito.eliminar');
Route::get('/Carrito/update/{productos}/{cantidad?}', 'CarritoController@update')->name('carrito.update');
Route::get('/Factura/factura','CarritoController@factura')->name('factura.factura')->middleware('auth');

// Rutas para procesar el pedido
Route::get('pedido/procesar', 'PedidoController@procesar')->name('pedido.procesar');

//Rutas para realizar el pago con paypal
//Route::get('/payment', array('PaypalController@postPayment'))->name('payment.payment');
//Route::get('payment/status', array('PaypalController@getPayment'))->name('payment.status');



// Panel de administración
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){

	//Rutas para la tabla Productos
	route::get('products/index','ProductController@index')->name('admin.products.index');
	route::get('products/create','ProductController@create')->name('admin.products.create');
	route::post('products/store','ProductController@store')->name('admin.products.store');
	route::get('products/edit/{Id}','ProductController@edit')->name('admin.products.edit');
	route::post('products/update/{Id}','ProductController@update')->name('admin.products.update');
	route::get('products/delete/{Id}','ProductController@delete')->name('admin.products.delete');

	//Rutas para la tabla Pedidos
	route::get('pedidos/index','PedidoController@index')->name('admin.pedidos.index');
	route::get('pedidos/detail/{Id}','PedidoController@detail')->name('admin.pedidos.detail');
	route::get('pedidos/delete/{Id}','PedidoController@delete')->name('admin.pedidos.delete');

	//Rutas para la tabla Tipos de medicamentos
	route::get('tipos/index','TipoController@index')->name('admin.tipos.index');
	route::get('tipos/create','TipoController@create')->name('admin.tipos.create');
	route::post('tipos/store','TipoController@store')->name('admin.tipos.store');
	route::get('tipos/edit/{Id}','TipoController@edit')->name('admin.tipos.edit');
	route::post('tipos/update/{Id}','TipoController@update')->name('admin.tipos.update');
	route::get('tipos/delete/{Id}','TipoController@delete')->name('admin.tipos.delete');

	//Rutas para la tabla Users
	route::get('users/index','UserController@index')->name('admin.users.index');
	route::get('users/reset/{Id}','UserController@reset')->name('admin.users.reset');
	route::post('users/store-password/{Id}','UserController@storePassword')->name('admin.users.store.password');
	route::get('users/edit/{Id}','UserController@edit')->name('admin.users.edit');
	route::post('users/update/{Id}','UserController@update')->name('admin.users.update');
	route::get('users/delete/{Id}','UserController@delete')->name('admin.users.delete');

	//Rutas para la tabla Opinions (Quejas y Sugerencias)
	route::get('opinions/index','OpinionController@index')->name('admin.opinions.index');
	route::get('opinions/create','OpinionController@create')->name('admin.opinions.create');
	route::post('opinions/store','OpinionController@store')->name('admin.opinions.store');
	route::get('opinions/edit/{Id}','OpinionController@edit')->name('admin.opinions.edit');
	route::post('opinions/update/{Id}','OpinionController@update')->name('admin.opinions.update');
	route::get('opinions/delete/{Id}','OpinionController@delete')->name('admin.opinions.delete');

});
