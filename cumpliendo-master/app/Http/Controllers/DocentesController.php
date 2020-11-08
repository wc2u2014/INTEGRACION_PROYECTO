<?php

namespace App\Http\Controllers;

use App\docentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class DocentesController extends Controller
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
     * @param  \App\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function show(docentes $docentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function edit(docentes $docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, docentes $docentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(docentes $docentes)
    {
        //
    }
    public function verDocentes(){
        $user = \Auth::user(); 
        $idUser=$user->id;
        $profesores =docentes::all();
        return view('consultarDocente',array(
            'profesores'=>$profesores
        ));
    }
    public function crearDocente(){
        $user = \Auth::user(); 
        $idUser=$user->id;
              

        return view('crearDocente',array(
            
        ));
    }
    public function elegirDocente(Request $request){
 
        $validatedData = $this->validate($request,[
            
            'idprofesor'=>'required',
            'id'=>'required',
            
        ]);
        $user = \Auth::user(); 
        $idUser=$user->id;
        
        
        $id=$request->input('idprofesor');
        $idCurso=$request->input('id');
        $anteriorMaestro=docentes::where('idCurso','=',$idCurso)->first();
        if($anteriorMaestro==null){
            if ($id=='Ninguno'){
                return redirect()->route('ListadoCursos')->with(array(
                    
                ));        
            }
        $modMaestro = docentes::find($id);
        
        $modMaestro->idCurso=$idCurso;
        
        $modMaestro ->save();
         

              
        return redirect()->route('ListadoCursos')->with(array(
                    
        ));
    }else{
        if ($id=='Ninguno'){
            return redirect()->route('ListadoCursos')->with(array(
                
            ));        
        }
        $anteriorMaestro->idCurso=NULL;
        $anteriorMaestro->save();
        $modMaestro = docentes::find($id);
        
        $modMaestro->idCurso=$idCurso;
        
        $modMaestro ->save();
         

              
        return redirect()->route('ListadoCursos')->with(array(
                    
        ));
    }
    }
    public function importarDocumentoDocente(Request $request){
        try{
            

            $documento = $request->file('import_file');
            if($request->hasFile('import_file')){
               // $path = Input::file('import_file')->getRealPath();
                $documentoPath =$documento->getClientOriginalName();
				\Storage::disk('images')->put($documentoPath,\File::get($documento));
				
				$storagePath  = Storage::disk('images')->getDriver()->getAdapter()->getPathPrefix();
				$ruta = "profesoresjt".'.xlsx';
				$path =  $storagePath. $ruta;
			
                $data = Excel::load($path, function($reader) {
                })->get();
                
                if(!empty($data) && $data->count()){


                    foreach ($data as $key => $value) {
                
                       $docente = docentes::where('identificacion','=', $value->identificacion)->first();
                       if(isset($docente->id)){

                       }else{
                        $insert[] = ['identificacion' => $value->identificacion,
                        'nombre' => $value->nombre,
                        'idEstado' => 1];
                       }
                    }
                    if(!empty($insert)){

                        
                        DB::table('docentes')->insert($insert);

                        docentes::where('identificacion','=',NULL)->delete();


                        $profesores = DB::table('docentes')->select('identificacion','nombre','idEstado')
                        ->where('identificacion','<>',NULL)
                        ->where('idEstado','=',1)
                        ->distinct()->get();
                    
                        

                        return redirect()->route('verDocentes')->with(array(
                            'message'=>'Docentes agregados'
                        ));

                       // dd('Insert Record successfully.');
                    }
                }
            }
        } catch( \Exception $e){
            echo($e->getMessage());
            die();
        }

        return redirect()->route('verDocentes')->with(array(
            'message'=>'Docentes agregados'
        ));
    }
    public function quitarCurso($id=null){
        $profesor=docentes::find($id);
        $profesor->idCurso=NULL;
        $profesor->save();
        return redirect()->route('verDocentes')->with(array(
            
        ));
    }
    public function agregarDocente(Request $request){
        $validatedData = $this->validate($request,[
            
            
            'identificacion'=>'required',
            'nombre'=>'required'
            
        ]);

            $identificacion=$request->input('identificacion');
            $nombre= $request->input('nombre');
            $idCurso= $request->input('idCurso');
            $docente= docentes::where('identificacion','=',$identificacion)->first();
            if(empty($docente->id)){
                $nuevoDocente = new docentes();
                $nuevoDocente->identificacion=$identificacion;
                $nuevoDocente->nombre=$nombre;
                $nuevoDocente->idEstado = 1;
                $nuevoDocente->UserCreador = 'SuperAdmin';
                $nuevoDocente->save();
            }else{

            }
            return redirect()->route('verDocentes')->with(array(
                'message'=>'Lista agregada'
            ));
    }

    public function contraseñas(){
        $usuarios = User::all();
        return view('consultarUsuarios',array(
            'usuarios'=>$usuarios
        ));
    }
    public function cambiarContraseña(Request $request){
 
        $validatedData = $this->validate($request,[
            
            'contraseña'=>'required',
            'repetirContraseña'=>'required',
            'id'=>'required',
            
        ]);
        
        $user = \Auth::user(); 
        $idUser=$user->id;
        
        $id=$request->input('id');
        $contraseña=$request->input('contraseña');
        $repetirContraseña=$request->input('repetirContraseña');

        if($contraseña == $repetirContraseña){
            $usuario=User::where('id','=',$id)->first();
            $pass  = bcrypt($contraseña);
            $usuario->password = $pass;
            $usuario->save();
            return redirect()->route('contraseñas')->with(array(
                    
            ));
        
        }else{
            $mensajeError = "Los password no son iguales";
            return redirect()->route('contraseñas')->with(array(
                'message'=>$mensajeError
            ));
        }
        
        
    }
}
