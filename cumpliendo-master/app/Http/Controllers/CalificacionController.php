<?php

namespace App\Http\Controllers;

use App\calificacion;
use Illuminate\Http\Request;
use App\User;
use App\relacion_estudiante_curso;
use App\cursos;
use App\tipo_calificacion;
use App\estudiante;
use ReflectionClass;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(calificacion $calificacion)
    {
        //
    }
    public function calificarItem(Request $request){
        
        $user = \Auth::user();
        $idUser =$user->id;
        $nombreUser = $user->name;
        $validatedData = $this->validate($request,[
            
            'id'=>'required',
            'idCalifiacion'=>'required'
            
        ]);
        $idRelacion=$request->input('id');
        $idCalifiacion=$request->input('idCalifiacion');
        
        $relacionEstuCurso= relacion_estudiante_curso::find($idRelacion);
        $idCurso=$relacionEstuCurso->idCurso;
        $curso=cursos::find($idCurso);
        $calificacion=$curso->cuentaPuntos;
        $tipoCalificacion=tipo_calificacion::find($idCalifiacion);
        $itemDescuento=$tipoCalificacion->puntos;
        
        $califiacionNueva=$calificacion-$itemDescuento;
        
        $agregarCalificacion= new calificacion();
        $agregarCalificacion->idUser=$idUser;
        $agregarCalificacion->idRelacion=$idRelacion;
        $agregarCalificacion->idCalificacion=$idCalifiacion;
        $agregarCalificacion->userCreador=$nombreUser;
        $agregarCalificacion->save();

        $curso->cuentaPuntos=$califiacionNueva;
        $curso-> save();

        return redirect()->route('ListadoCursos')->with(array(
           
        ));
    }
    public function calificarItemGlobal(Request $request){
        
        $user = \Auth::user();
        $idUser =$user->id;
        $nombreUser = $user->name;
        $validatedData = $this->validate($request,[
            
            'id'=>'required',
            'idCalifiacion'=>'required'
            
        ]);
        $idEstudiante=$request->input('id');
        $idCalifiacion=$request->input('idCalifiacion');
        
        $relacionEstuCurso= relacion_estudiante_curso::where('idEstudiante',$idEstudiante)->first();
        $idRelacion=$relacionEstuCurso->id;
        if($idRelacion==NULL){
            $mensajeError = "El estudiante no esta dentro de ningun curso";
            return redirect()->route('verEstudiante')->with(array(
                'message'=>$mensajeError
            ));
        }else{
        $idCurso=$relacionEstuCurso->idCurso;
        $curso=cursos::find($idCurso);
        $calificacion=$curso->cuentaPuntos;
        $tipoCalificacion=tipo_calificacion::find($idCalifiacion);
        $itemDescuento=$tipoCalificacion->puntos;
        
        $califiacionNueva=$calificacion-$itemDescuento;
        
        $agregarCalificacion= new calificacion();
        $agregarCalificacion->idUser=$idUser;
        $agregarCalificacion->idRelacion=$idRelacion;
        $agregarCalificacion->idCalificacion=$idCalifiacion;
        $agregarCalificacion->userCreador=$nombreUser;
        $agregarCalificacion->save();

        $curso->cuentaPuntos=$califiacionNueva;
        $curso-> save();

        return redirect()->route('ListadoCursos')->with(array(
           
        ));
    }
    }
    public function detallePorAlumno($id=null){
        $user = \Auth::user();
        $idUser =$user->identificacion;
        $verCalificaciones=calificacion::where('idRelacion',$id)->get();
        $relacion=relacion_estudiante_curso::find($id);
        $estudiante=estudiante::find($relacion->idEstudiante);
        $nombreEstudiante=$estudiante->nombre;
            if($idUser==null){
                return view ('calificacionPorAlumno',array(
                    'verCalificaciones'=>$verCalificaciones,
                    'nombreEstudiante'=>$nombreEstudiante
                ));
            }else{
                return view ('docentes.detalleAlumno',array(
                    'verCalificaciones'=>$verCalificaciones,
                    'nombreEstudiante'=>$nombreEstudiante
                ));
            }

       
    }
    public function BorrarCalificación(Request $request){
        
        
            $user = \Auth::user();
            $validatedData = $this->validate($request,[
                
                'id'=>'required',
                
            ]);
            
            $id = $request->input('id');
            $relacion=calificacion::find($id);
            $idRelacion=$relacion->idRelacion;
            $idCalifiacion=$relacion->idCalificacion;
            
           
                    
            $tipoCalifiacion=tipo_calificacion::find($idCalifiacion);
            $puntaje=$tipoCalifiacion->puntos;
            $relacionCurso=relacion_estudiante_curso::find($idRelacion);
            $idCurso=$relacionCurso->idCurso;
            $curso=cursos::find($idCurso);
            $puntejeCurso=$curso->cuentaPuntos;
            $totalPuntos=$puntaje+$puntejeCurso;
            
            $curso->cuentaPuntos=$totalPuntos;
            $curso-> save();

            calificacion::destroy($id);
            return redirect()->route('ListadoCursos')->with(array(
                         
            ));
              
    }


}
