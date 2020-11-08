@extends('layouts.master')

@section('content')

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Estudiantes del curso {{$curso}} jornada {{$jornada}}</h2>
        <br>
        <h3 class="panel-title">Puntos del curso: {{$puntosCurso}}</h3>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-details">
            <thead>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Puntos negativos</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($relacion as $relacionCurso)
                
               
                
                <tr>
                    <td>{{$relacionCurso->rela_estudiante->identificacion}}</td>
                    <td>{{$relacionCurso->rela_estudiante->nombre}}</td>
                    <td> <?php
                        $puntosTotales=0;
                        ?>
                        @foreach ($calificaciones as $cuenta)
                           @if($cuenta->idRelacion==$relacionCurso->id)
                               
                            @foreach ($itemCalificador as $item)
                                @if($item->id==$cuenta->idCalificacion)
                                    <?php   
                                        
                                        $puntosTotales=$item->puntos+$puntosTotales;
                                        
                                    ?>
                                @endif
                               
                            @endforeach
                            
                           @endif
                        @endforeach
                        {{$puntosTotales}} &nbsp <a href="{{route('detallePorAlumno',['id'=>$relacionCurso->id])}}" class="" > Ver detalle de puntos</a> 
                                                 
                                          
                                
                    </td>
                   
                    
                    <td>
                        
                                                                        
                        <a href="#dialogoConfirmacionTabla2{{$relacionCurso->id}}" class="btn btn-outline-info" data-toggle="modal">Bajar Puntos</a>
                        <div id="dialogoConfirmacionTabla2{{$relacionCurso->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Restar Puntos al estudiante {{$relacionCurso->rela_estudiante->nombre}}</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{route('calificarItem')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
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
    
                                                                <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$relacionCurso->id}}">   
                                                            </div>  
                                                            <br>
                                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                </td>
                </tr>
                
                
                
                @endforeach
            </tbody>
        </table>
    </div>
</section>



@endsection