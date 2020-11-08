<?php

namespace App\Http\Controllers;

use App\estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

use App\relacion_estudiante_curso;
use App\cursos;
use App\User;
use App\tipo_calificacion;
use App\calificacion;

class EstudianteController extends Controller
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
     * @param  \App\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiante $estudiante)
    {
        //
    }
    public function verEstudiantes(){
        $user = \Auth::user(); 
        $idUser=$user->identificacion;

        $listaEstudiantes =estudiante::all();
        $itemCalificador= tipo_calificacion::all();
        if($idUser==null){
            return view('consultarEstudiante',array(
                'listaEstudiantes'=>$listaEstudiantes,
                'itemCalificador'=>$itemCalificador
            ));
        }else{
            return view('docentes.estudiantesDoce',array(
                'listaEstudiantes'=>$listaEstudiantes,
                'itemCalificador'=>$itemCalificador
            ));
        }
        
    }
    
    public function crearEstudiante(){
        $user = \Auth::user(); 
        $idUser=$user->id;
              

        return view('crearEstudiante',array(
            
        ));
    }
    public function importarDocumentoEstudiante(Request $request){
        try{
        $validatedData = $this->validate($request,[
            
            'id'=>'required'
            
        ]);
        
        $idCurso = $request->input('id');
        $documento = $request->file('import_file');
        if($request->hasFile('import_file')){
            $documentoPath =$documento->getClientOriginalName();
            \Storage::disk('images')->put($documentoPath,\File::get($documento));
            $storagePath  = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
            $ruta = "estudiantesRodrigoTriana".'.xlsx';
            $path =  $storagePath. $ruta;
        
            $data2 = Excel::load($path, function($reader) {
            })->get();
            
            if(!empty($data2) && $data2->count()){
               /* $relacion=relacion_estudiante_curso::where('idCurso','=',$idCurso)->get();
                var_dump($relacion);
                die();
                foreach ($relacion as $rela){
                    $idRelacion=$rela->id;
                    echo ($idRelacion);
                    die();
                    calificacion::where('idRelacion','=',$idRelacion)->delete();
                }*/
                
                $relacion=relacion_estudiante_curso::where('idCurso','=',$idCurso)->get();
                foreach ($relacion as $rela){
                    $idRelacion=$rela->id;
                    calificacion::where('idRelacion','=',$idRelacion)->delete();
                }
                relacion_estudiante_curso::where('idCurso','=',$idCurso)->delete();
               // var_dump($data2);
                //die();
                foreach ($data2 as $key => $value) {
                   
                 try{
                  //  var_dump($value);
                 // $nombre=  $value->nombre;
                 if( ($value != null) ){
                    $identificacion=  $value->identificacion;
                    $nombre=  $value->nombre;
                    if( ($nombre != null) ){
                       
                       

                        $estudiante= estudiante::where('identificacion','=',$identificacion)->first();
                        if(is_null($estudiante)){
                       // if(empty($estudiante->id)){
                           
                            $estudiante = new estudiante();
                            $estudiante->identificacion = $identificacion;
                            $estudiante->nombre = $nombre;
                            $estudiante->idEstado = 1;
                            $estudiante->UserCreador = 'SuperAdmin';
                            $estudiante->save();
                           
                        }else{
                           // var_dump('antiguo'); 
                        }
                        $idRelacion2=relacion_estudiante_curso::where('idEstudiante','=',$estudiante->id)->first();
                        if(!is_null($idRelacion2)){
                            calificacion::where('idRelacion','=',$idRelacion2->id)->delete();
                        }
                        relacion_estudiante_curso::where('idEstudiante','=',$estudiante->id)->delete();
                        $relacion = new relacion_estudiante_curso();
                        $relacion->idEstudiante =$estudiante->id;
                        $relacion->idCurso=$idCurso;
                        $relacion->userCreador='SuperAdmin';
                        $relacion ->save();

                    }
                 }
                }catch( \Exception $e){
                    //var_dump($value);
                    var_dump($e->getMessage());
                   die();
                }
                 

                }

            }
            $puntos=tipo_calificacion::find(1);

            $puntosTotales=$puntos->puntos;
            $cantidadEstudiantes=relacion_estudiante_curso::where('idCurso','=',$idCurso)->count();
            $update = cursos::find($idCurso);
            $update->cuentaPuntos =$puntosTotales;
            $update->total_estudiante=$cantidadEstudiantes;
            
            $update ->save();
            return redirect()->route('ListadoCursos')->with(array(
                'message'=>'Lista agregada'
            ));
        }
    }
    catch( \Exception $e){
        echo($e->getMessage());
        die();
    }
    
    }
    
    /*
    public function importarDocumentoEstudiante(Request $request){
        try{
            $validatedData = $this->validate($request,[
            
                'id'=>'required'
                
            ]);
            
            $idCurso = $request->input('id');
            
            $documento = $request->file('import_file');
            if($request->hasFile('import_file')){
               // $path = Input::file('import_file')->getRealPath();
                $documentoPath =$documento->getClientOriginalName();
				\Storage::disk('images')->put($documentoPath,\File::get($documento));
				
				$storagePath  = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
				$ruta = "estudiantesRodrigoTriana".'.xlsx';
				$path =  $storagePath. $ruta;
			
                $data2 = Excel::load($path, function($reader) {
                })->get();
                    
              
                if(!empty($data2) && $data2->count()){
                    relacion_estudiante_curso::where('idCurso','=',$idCurso)->delete();
                    
                    foreach ($data2 as $key => $value) {
                       // var_dump($value->id);
                        //die();
                        $estudiante = estudiante::where('identificacion','=', $value->identificacion)->first();
                       if(isset($estudiante->id)){
  
                        $listEstudiantes = estudiante::all();
                        foreach($listEstudiantes as $listEstudiante){
                            $idEstudiante= $listEstudiante->id;
                            $buscar = relacion_estudiante_curso::where('idEstudiante','=',$idEstudiante)->first();
                            if(isset($buscar->id)){
                                
                            }else{
                                $relacion = new relacion_estudiante_curso();
                            $relacion->idEstudiante =$idEstudiante;
                            $relacion->idCurso=$idCurso;
                            $relacion->userCreador='SuperAdmin';
                            $relacion ->save();
                            }
                            
                        }
                        $cantidadEstudiantes=relacion_estudiante_curso::where('idCurso','=',$idCurso)->count();
                        $update = cursos::find($idCurso);
                        $update->total_estudiante=$cantidadEstudiantes;
                        
                        $update ->save();

                        $listaEstudiantes = DB::table('relacion_estudiante_cursos')->select('idEstudiante','idCurso')
                        ->where('idEstudiante','<>',NULL)
                        ->where('idCurso','=',$idCurso)
                        ->distinct()->get();
                     

                        $estudCurso = relacion_estudiante_curso::where('idCurso','=',$idCurso)
                        ->where('idEstudiante','<>',NULL)->orderBy('id','desc')->get();

                        return view('tablaEstudiantes',array(
                            'listaEstudiantes'=>$listaEstudiantes,
                            'estudCurso'=>$estudCurso,
                            'idCurso'=>$idCurso
                        ));
                       }else{
                        $insert[] = ['identificacion' => $value->identificacion,
                        'nombre' => $value->nombre,
                        'idEstado' => 1,
                        'UserCreador'=> 'SuperAdmin'];
                                                
                       }
                    }
                    if(!empty($insert)){

                        
                        DB::table('estudiantes')->insert($insert);


                        estudiante::where('identificacion','=',NULL)->delete();
                        
                        
                        
                        $listEstudiantes = estudiante::all();
                        foreach($listEstudiantes as $listEstudiante){
                            $idEstudiante= $listEstudiante->id;
                            $buscar = relacion_estudiante_curso::where('idEstudiante','=',$idEstudiante)->first();
                            if(isset($buscar->id)){
                                
                            }else{
                                $relacion = new relacion_estudiante_curso();
                            $relacion->idEstudiante =$idEstudiante;
                            $relacion->idCurso=$idCurso;
                            $relacion->userCreador='SuperAdmin';
                            $relacion ->save();
                            }
                        }
                            
                        $cantidadEstudiantes=relacion_estudiante_curso::where('idCurso','=',$idCurso)->count();
                        $update = cursos::find($idCurso);
                        $update->total_estudiante=$cantidadEstudiantes;
                        
                        $update ->save();

                        $listaEstudiantes = DB::table('relacion_estudiante_cursos')->select('idEstudiante','idCurso')
                        ->where('idEstudiante','<>',NULL)
                        ->where('idCurso','=',$idCurso)
                        ->distinct()->get();
                     

                        $estudCurso = relacion_estudiante_curso::where('idCurso','=',$idCurso)
                        ->where('idEstudiante','<>',NULL)->orderBy('id','desc')->get();

                        return view('tablaEstudiantes',array(
                            'listaEstudiantes'=>$listaEstudiantes,
                            'estudCurso'=>$estudCurso,
                            'idCurso'=>$idCurso
                        ));

                       // dd('Insert Record successfully.');
                    }
                }
            }
        } catch( \Exception $e){
            echo($e->getMessage());
            die();
        }

        return redirect()->route('ListadoCursos')->with(array(
            'message'=>'Programación agregada'
        ));
    }
    */
    public function formularioEstudiante($id=null){
        $curso = cursos::find($id);
        $idCurso = $curso->id;
        return view('formularioEstudiante',array(
           'curso'=>$curso,
           'idCurso'=>$idCurso
        ));
    }
    public function agregarEstudiante(Request $request){
        $validatedData = $this->validate($request,[
            
            'idCurso'=>'required',
            'identificacion'=>'required',
            'nombre'=>'required'
            
        ]);

            $identificacion=$request->input('identificacion');
            $nombre= $request->input('nombre');
            $idCurso= $request->input('idCurso');
            $estudiante= estudiante::where('identificacion','=',$identificacion)->first();
            if(empty($estudiante->id)){
                $nuevoEstudiante = new estudiante();
                $nuevoEstudiante->identificacion=$identificacion;
                $nuevoEstudiante->nombre=$nombre;
                $nuevoEstudiante->idEstado = 1;
                $nuevoEstudiante->UserCreador = 'SuperAdmin';
                $nuevoEstudiante->save();
            }else{

            }
            $estudiante= estudiante::where('identificacion','=',$identificacion)->first();
            $idRelacion2=relacion_estudiante_curso::where('idEstudiante','=',$estudiante->id)->first();
            if(empty($idRelacion2->id)){
                $relacion = new relacion_estudiante_curso();
                $relacion->idEstudiante =$estudiante->id;
                $relacion->idCurso=$idCurso;
                $relacion->userCreador='SuperAdmin';
                $relacion ->save();
            }else{
                calificacion::where('idRelacion','=',$idRelacion2->id)->delete();
                relacion_estudiante_curso::where('idEstudiante','=',$estudiante->id)->delete();
                $relacion = new relacion_estudiante_curso();
                $relacion->idEstudiante =$estudiante->id;
                $relacion->idCurso=$idCurso;
                $relacion->userCreador='SuperAdmin';
                $relacion ->save();
            }
            
            
            return redirect()->route('ListadoCursos')->with(array(
                'message'=>'Lista agregada'
            ));
    }
    
}
