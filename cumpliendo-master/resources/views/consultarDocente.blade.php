@extends('layouts.master')

@section('content')



    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Docentes Rodrigo de triana</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Curso</th>
                        <th>Jornada</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($profesores as $listaDocente)
                    
                   
                    
                    <tr>
                        <td>{{$listaDocente->identificacion}}</td>
                        <td>{{$listaDocente->nombre}}</td>
                        <td>{{(isset ($listaDocente->docente_estado->estado))? $listaDocente->docente_estado->estado :'Sin Estado'}}</td>
                        <td>{{(isset ($listaDocente->docente_curso->curso))? $listaDocente->docente_curso->curso :'Sin Curso Asignado'}}</td>
                        <td>{{(isset ($listaDocente->docente_curso->curso_jornada->jornada))? $listaDocente->docente_curso->curso_jornada->jornada :'Sin Jornada'}}</td>
                        <td><div class="row justify-content-center align-items-center">
                
                                    <div class="columna col-12 ">
                                            <a href="{{route('quitarCurso',['id'=>$listaDocente->id])}}" class="btn btn-outline-warning  btn-block" >Quitar Curso</a>
                                             
                                    </div>
                                    
                               
                                    
                        </div></td>
                    </tr>
                    
                    
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endsection