<?php

namespace App\Http\Controllers;

use App\estado;
use App\docentes;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class EstadoController extends Controller
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
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(estado $estado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estado $estado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(estado $estado)
    {
        //
    }
    public function registrate(){
        return view('registro');
    }
    public function registro1(Request $request){
      
        $validateData =$this->validate($request,[
            'identificacion'=>'required',
            'name'=>'required',
            'email'=>'required',
            'pwd'=>'required',            
            'pwd_confirm'=>'required'
            
            
             
          ]);
          $identificacion=$request->input('identificacion');
          $name=$request->input('name');
          $email=$request->input('email');
          $password=$request->input('pwd');
          $passwordConfirmacion=$request->input('pwd_confirm');

          if($password == $passwordConfirmacion){
            if(!is_null($identificacion) &&  !is_null($name) && !is_null($email)   && !is_null($password)){
                $docente= docentes::where('identificacion',$identificacion)->first();
                if($docente==null){
                    $mensajeError = "No eres docente del colegio";
                    return redirect()->route('registrate')->with(array(
                        'message'=>$mensajeError
                    ));

                }else{
                    $user= User::where('identificacion',$identificacion)->first();
                    if($user== null){
                        $role_user = Role::where('name', 'user')->first();
                        $usuario= new User();
                        $usuario->name=$name;
                        $usuario->email=$email;
                        $pass  = bcrypt($password);
                        $usuario->password = $pass;
                        $usuario->identificacion=$identificacion;
                        $usuario->save();
                        
                        $usuario->roles()->attach($role_user);
                        return redirect()->route('home')->with(array(
                        
                     ));
                    }else{
                        $mensajeError = "Este usuario ya se encuentra registrado";
                        return redirect()->route('registrate')->with(array(
                            'message'=>$mensajeError
                        ));
                    }
                  
                }
            }

          }else{
                $mensajeError = "Los password no son iguales";
                return redirect()->route('registrate')->with(array(
                    'message'=>$mensajeError
                ));
            }
         
    }
}
