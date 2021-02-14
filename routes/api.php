<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Empleado;
use GrahamCampbell\ResultType\Result;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('empleados', function(){
    $empleado = Empleado::get();
    return $empleado;
});

//Ruta para crear empleados
Route::post('empleados', function(Request $request){
    $request->validate([
        'nombres'=>'required|max:50',
        'apellidos'=> 'required|max:50',
        'cedula'=> 'required|max:50',
        'email'=> 'required|max:50|unique:empleados',
        'lugar_nacimiento'=> 'required|max:50',
        'sexo'=> 'required|max:50',
        'estado_civil'=> 'required|max:50',
        'telefono'=> 'required|numeric',
    ]);
    $empleado = new Empleado();
    $empleado->nombres= $request->input('nombres');
    $empleado->apellidos= $request->input('apellidos');
    $empleado->cedula= $request->input('cedula');
    $empleado->email= $request->input('email');
    $empleado->lugar_nacimiento= $request->input('lugar_nacimiento');
    $empleado->sexo= $request->input('sexo');
    $empleado->estado_civil= $request->input('estado_civil');
    $empleado->telefono= $request->input('telefono');
    $empleado->save();
    return 'usuario creado';

});

//Actualizar un Empleado
Route::put('empleados/{id}', function(Request $request, $id){
    $request->validate([
        'nombres'=>'required|max:50',
        'apellidos'=> 'required|max:50',
        'cedula'=> 'required|max:50',
        'email'=> 'required|max:50|unique:empleados,email,' .$id,
        'lugar_nacimiento'=> 'required|max:50',
        'sexo'=> 'required|max:50',
        'estado_civil'=> 'required|max:50',
        'telefono'=> 'required|numeric',
    ]);
    $empleado =Empleado::findOrFail($id);

    $empleado->nombres= $request->input('nombres');
    $empleado->apellidos= $request->input('apellidos');
    $empleado->cedula= $request->input('cedula');
    $empleado->email= $request->input('email');
    $empleado->lugar_nacimiento= $request->input('lugar_nacimiento');
    $empleado->sexo= $request->input('sexo');
    $empleado->estado_civil= $request->input('estado_civil');
    $empleado->telefono= $request->input('telefono');
    $empleado->save();
    return 'Actualizado con Exito';

});