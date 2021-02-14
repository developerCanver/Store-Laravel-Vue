<?php

use Illuminate\Support\Facades\Route;
use App\Models\Empleado;
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

Route::get('/empleados',function(){
    $empleado= Empleado::get();
    return $empleado;
});

Route::post('empleados', function(){
    return 'guardar Empleado';
})
// Route::get('productos', function(){
//         return 'Lista de productos';
// });

// Route::post('productos', function(){
//     return 'almacenando productos';
// });

// Route::put('productos/{id}', function($id){ //{id} = pasando parametros
//  return 'Actualizando Producto '.$id;
// });
