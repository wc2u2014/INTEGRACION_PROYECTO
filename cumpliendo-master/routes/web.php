<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registrate', 'EstadoController@registrate')->name('registrate');

Route::post('/guardar-usuario', array(
    'as'=>'guardarUsuario', //nombre a la ruta
    
    'uses'=>'EstadoController@registro1'

));
Route::post('/eliminar-curso', array(
    'as'=>'eliminarCurso', //nombre a la ruta
    
    'uses'=>'CursosController@eliminarCurso'

));


Route::post('/importarDocumentoEstudiante',array(
    'as'=> 'importarDocumentoEstudiante',
    'middleware'=>'auth', 
    'uses'=> 'EstudianteController@importarDocumentoEstudiante'
));
Route::get('/formulario-curso', array(
    'as'=>'formularioCurso', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'CursosController@index'

));
Route::get('/formulario-estudiante/{id}', array(
    'as'=>'formularioEstudiante', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'EstudianteController@formularioEstudiante'

));

Route::get('/listado-cursos', array(
    'as'=>'ListadoCursos', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'CursosController@listaCursos'

));
Route::get('/detalle-curso/{id}',array(
    'as'=> 'detalleCurso',
    'middleware'=>'auth',
    'uses'=> 'CursosController@detalleCurso'
));
Route::get('/modificar-curso/{id}',array(
    'as'=> 'modificarCurso',
    'middleware'=>'auth',
    'uses'=> 'CursosController@modificarCurso'
));
Route::post('/importarDocumentoDocente',array(
    'as'=> 'importarDocumentoDocente',
    'middleware'=>'auth', 
    'uses'=> 'DocentesController@importarDocumentoDocente'
));
Route::get('/crear-docente', array(
    'as'=>'crearDocente', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'DocentesController@crearDocente'

));
Route::get('/crear-estudiante', array(
    'as'=>'crearestudiante', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'EstudianteController@crearEstudiante'

));
Route::get('/ver-estudiantes', array(
    'as'=>'verEstudiantes', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'EstudianteController@verEstudiantes'

));
Route::get('/ver-docentes', array(
    'as'=>'verDocentes', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'DocentesController@verDocentes'

));
Route::get('/contraseñas', array(
    'as'=>'contraseñas', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'DocentesController@contraseñas'

));
Route::get('/detalle/{id}',array(
    'as'=> 'detalle',
    'middleware'=>'auth',
    'uses'=> 'CursosController@detalle'
));
Route::post('/elegir-docente',array(
    'as'=> 'elegirDocente',
    'middleware'=>'auth',
    'uses'=> 'DocentesController@elegirDocente'
));
Route::post('/cambiar-contraseña',array(
    'as'=> 'cambiarContraseña',
    'middleware'=>'auth',
    'uses'=> 'DocentesController@cambiarContraseña'
));
Route::get('/formulario-calificacion',array(
    'as'=> 'formularioCalificacion',
    'middleware'=>'auth',
    'uses'=> 'TipoCalificacionController@index'
));
Route::post('/agregar-item',array(
    'as'=> 'agregarItem',
    'middleware'=>'auth',
    'uses'=> 'TipoCalificacionController@agregarItem'
));
Route::post('/agregar-curso',array(
    'as'=> 'agregarCurso',
    'middleware'=>'auth',
    'uses'=> 'CursosController@agregarCurso'
));
Route::post('/agregar-estudiante',array(
    'as'=> 'agregarEstudiante',
    'middleware'=>'auth',
    'uses'=> 'EstudianteController@agregarEstudiante'
));
Route::post('/agregar-docente',array(
    'as'=> 'agregarDocente',
    'middleware'=>'auth',
    'uses'=> 'DocentesController@agregarDocente'
));

Route::post('/eliminar-item',array(
    'as'=> 'eliminarItem',
    'middleware'=>'auth',
    'uses'=> 'TipoCalificacionController@eliminarItem'
));
Route::post('/cambiar-puntaje',array(
    'as'=> 'cambiarPuntaje',
    'middleware'=>'auth',
    'uses'=> 'TipoCalificacionController@cambiarPuntaje'
));

Route::post('/calificar-item', array(
    'as'=>'calificarItem', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'CalificacionController@calificarItem'

));
Route::post('/borrar-calificación', array(
    'as'=>'BorrarCalificación', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'CalificacionController@BorrarCalificación'

));

Route::get('/detalle-calificacion/{id}',array(
    'as'=> 'detallePorAlumno',
    'middleware'=>'auth',
    'uses'=> 'CalificacionController@detallePorAlumno'
));
Route::get('/quitar-curso/{id}',array(
    'as'=> 'quitarCurso',
    'middleware'=>'auth',
    'uses'=> 'DocentesController@quitarCurso'
));
Route::post('/calificar-item-global', array(
    'as'=>'calificarItemGlobal', //nombre a la ruta
    'middleware'=>'auth',
    'uses'=>'CalificacionController@calificarItemGlobal'

));





