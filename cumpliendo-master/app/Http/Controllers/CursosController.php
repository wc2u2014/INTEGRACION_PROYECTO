<?php

namespace App\Http\Controllers;

use App\cursos;
use Illuminate\Http\Request;
use App\relacion_estudiante_curso;
use App\docentes;
use App\User;
use App\tipo_calificacion;
use App\jornada;
use App\calificacion;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jornadas=jornada::all();
        return view('formularioCurso',array(
            'jornadas'=>$jornadas
        ));
    }
    public function eliminarCurso(Request $request){
        $validatedData = $this->validate($request,[
            
            'idCurso'=>'required',
            
            
            
        ]);
        $idCurso=$request->input('idCurso');
        $curso= cursos::find($idCurso);
        
        $relaciones=relacion_estudiante_curso::where('idCurso','=',$idCurso)->get();
        foreach($relaciones as $relacion){
            $idRelacion=$relacion->id;
            calificacion::where('idRelacion',$idRelacion)->delete();
        }

        relacion_estudiante_curso::where('idCurso','=',$idCurso)->delete();
        $docente=docentes::where('idCurso',$idCurso)->first();
        $docente->idCurso=NULL;
        $docente->save();
        cursos::where('id',$idCurso)->delete();
        return redirect()->route('ListadoCursos')->with(array(
           
        ));
        }
    public function agregarCurso(Request $request){
        $validatedData = $this->validate($request,[
            
            'curso'=>'required',
            'idjornada'=>'required'
            
        ]);
        

        $curso=$request->input('curso');
        $idjornada=$request->input('idjornada');
        $puntos=tipo_calificacion::find(1);

        $puntosTotales=$puntos->puntos;
        $cursoExiste = cursos::where('curso','=', $curso)->where('idJornada','=', $idjornada)->first();

        if(isset($cursoExiste->id)){
            
            

        }else{
            $nuevoCurso = new cursos();
        $nuevoCurso->curso =$curso;
        $nuevoCurso->idJornada =$idjornada;
        $nuevoCurso->userCreador ='superAdmin';
        $nuevoCurso->cuentaPuntos =$puntosTotales;
        $nuevoCurso->save();
        }
        
        $listaCursos=Cursos::all();
        $profesores=docentes::all();
        
        $relacion = relacion_estudiante_curso::all();
       

        return view('llenarCurso',array(
            'listaCursos'=>$listaCursos,
            'profesores'=>$profesores
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $puntos=tipo_calificacion::where('id','=',1);
        $puntosTotales=$puntos->puntos;
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
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cursos $cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(cursos $cursos)
    {
        //
    }
    public function listaCursos(){
        $user = \Auth::user(); 
        $idUser=$user->identificacion;
        $listaCursos=Cursos::all();
        $profesores=docentes::all();
        
        $relacion = relacion_estudiante_curso::all();
        foreach($listaCursos as $listaCurso){
            $idCurso= $listaCurso->id;
            $cantidadEstudiantes=relacion_estudiante_curso::where('idCurso','=',$idCurso)->count();
            $update = cursos::find($idCurso);
            $update->total_estudiante=$cantidadEstudiantes;
            
            $update ->save();
        }
       if($idUser==null){
        return view('llenarCurso',array(
            'listaCursos'=>$listaCursos,
            'profesores'=>$profesores
        ));
       }else{
        return view('docentes.cursosDoce',array(
            'listaCursos'=>$listaCursos,
            'profesores'=>$profesores
        ));
       }

        
    }
    public function detalleCurso($id=null){

        $user = \Auth::user();
        $idUser=$user->identificacion;
        $curso = cursos::find($id);
        $idCurso = $curso->id;

         
            return view('prueba',array(
            
            ));
     


        
    }
    public function detalle($id=null){
        $user = \Auth::user();
        $idUser=$user->identificacion;
        
        $relacion= relacion_estudiante_curso::where('idCurso','=',$id)->get();
        //var_dump ($relacion);
        //die();
        $cursos = cursos::find($id);
        $puntosCurso=$cursos->cuentaPuntos;
        $curso = $cursos->curso;
        $jornada =$cursos->curso_jornada->jornada;
        $itemCalificador= tipo_calificacion::all();
        $calificaciones= calificacion::all();
        if($idUser==null){
            return view('detalleCurso',array(
                'curso'=>$curso,
                'jornada'=>$jornada,
                'relacion'=>$relacion,
                'puntosCurso'=>$puntosCurso,
                'itemCalificador'=>$itemCalificador,
                'calificaciones'=>$calificaciones
                
            ));
        }else{
            return view('docentes.detalleCurso',array(
                'curso'=>$curso,
                'jornada'=>$jornada,
                'relacion'=>$relacion,
                'puntosCurso'=>$puntosCurso,
                'itemCalificador'=>$itemCalificador,
                'calificaciones'=>$calificaciones
                
            ));
        }
         
           
        
    }
    public function modificarCurso($id=null){
        $user = \Auth::user();
        $idUser=$user->id;
        $curso = cursos::find($id);
        $idCurso = $curso->id;

        $numEstuCurso = $curso->total_estudiante;
        $lista_maestros =docentes::where('idCurso','=',NULL)->get();
        $docente=docentes::where('idCurso',$idCurso)->first();
        if ($docente==null){
            $nombreDocente="No tiene Director de Curso";
            return view('modificaCurso',array(
                'nombreDocente'=>$nombreDocente,
                'numEstuCurso'=>$numEstuCurso,
                'idCurso'=>$idCurso,
                'lista_maestros'=>$lista_maestros
            ));
        }else{
        $nombreDocente=$docente->nombre;
        return view('modificaCurso',array(
            'nombreDocente'=>$nombreDocente,
            'numEstuCurso'=>$numEstuCurso,
            'idCurso'=>$idCurso,
            'lista_maestros'=>$lista_maestros
        ));
        }
        
 


    
}
}
