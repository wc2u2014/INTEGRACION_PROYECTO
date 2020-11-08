<?php

namespace App\Http\Controllers;


use App\tipo_calificacion;
use App\calificacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class TipoCalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $itemCalificacion= tipo_calificacion::all();
        
        
        return view('formularioCalificacion',array(
            'itemCalificacion'=>$itemCalificacion
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
     * @param  \App\tipo_calificacion  $tipo_calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_calificacion $tipo_calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_calificacion  $tipo_calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo_calificacion $tipo_calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_calificacion  $tipo_calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo_calificacion $tipo_calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_calificacion  $tipo_calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo_calificacion $tipo_calificacion)
    {
        //
    }
    public function agregarItem (Request $request){
       
        $validatedData = $this->validate($request,[
            
            'calificacion'=>'required',
            'puntos'=>'required'
            
        ]);
        

        $calificacion=$request->input('calificacion');
        $puntos=$request->input('puntos');
        
        $nuevoItem = new tipo_calificacion();
        $nuevoItem->calificacion =$calificacion;
        $nuevoItem->puntos =$puntos;
        $nuevoItem->userCreador ='superAdmin';
        $nuevoItem->save();
        $itemCalificacion= tipo_calificacion::all();
        
        
        return view('formularioCalificacion',array(
            'itemCalificacion'=>$itemCalificacion
        ));
    }
    public function eliminarItem(Request $request){
        $user = \Auth::user();
        $validatedData = $this->validate($request,[
            
            'id'=>'required'
            
        ]);
        $id = $request->input('id');
        
        tipo_calificacion::destroy($id);
        
       

        $itemCalificacion= tipo_calificacion::all();
        
        
        return view('formularioCalificacion',array(
            'itemCalificacion'=>$itemCalificacion
        ));
    }
    public function cambiarPuntaje(Request $request){
        $user = \Auth::user();
        $validatedData = $this->validate($request,[
            
            'id'=>'required',
            'puntos'=>'required'
            
        ]);
        $id = $request->input('id');
        $puntos = $request->input('puntos');
        
        $cambiarItem= tipo_calificacion::find($id);
        $cambiarItem->puntos=$puntos;
        $cambiarItem->save();

        $itemCalificacion= tipo_calificacion::all();
        
        
        return view('formularioCalificacion',array(
            'itemCalificacion'=>$itemCalificacion
        ));
    }
}
