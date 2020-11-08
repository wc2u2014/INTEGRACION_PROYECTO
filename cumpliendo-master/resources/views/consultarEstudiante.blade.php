@extends('layouts.master')

@section('content')
@if(session('message'))
<div class="alert alert-danger">
        {{session('message')}}
</div>
@endif


    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Estudiantes Rodrigo de triana</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                    <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($listaEstudiantes as $listaEstudiante)
                    
                   
                    
                    <tr>
                        <td>{{$listaEstudiante->identificacion}}</td>
                        <td>{{$listaEstudiante->nombre}}</td>
                        <td>{{(isset ($listaEstudiante->estudiante_estado->estado))? $listaEstudiante->estudiante_estado->estado :'Sin Estado'}}</td>
                       
                        
                        <td>
                            <a href="#dialogoConfirmacionTabla2{{$listaEstudiante->id}}" class="btn btn-outline-info" data-toggle="modal">Bajar Puntos</a>
                            <div id="dialogoConfirmacionTabla2{{$listaEstudiante->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="">Restar Puntos al estudiante {{$listaEstudiante->nombre}}</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{route('calificarItemGlobal')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                        {!! csrf_field()!!}
                                                        <div class="form-group">
                                                                <label for="">Elija item a restar: </label>
                                                                <select id="idCalifiacion"  name="idCalifiacion"  class="form-control">
                                                                        
                                                                    @foreach ($itemCalificador as $item)
                                                                    @if($item->id!=1)
                                                                    <option value={{$item->id}}>{{$item->calificacion}}</option>    
                                                                    @endif
                                                                    @endforeach
                                                                        
                                                                        
                                                                </select>
                                                        </div>
                                                            <br>
                                                            <div class="col d-none">
        
                                                                    <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$listaEstudiante->id}}">   
                                                                </div>  
                                                                <br>
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div></td>
                    </tr>
                    
                    
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



@endsection