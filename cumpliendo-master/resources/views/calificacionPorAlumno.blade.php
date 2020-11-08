@extends('layouts.master')

@section('content')



    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Estos son los puntos negativos de {{$nombreEstudiante}}</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                    <tr>
                        <th>Item calificado</th>
                        <th>Puntos</th>
                        <th>Generado por</th>
                        <th>Fecha</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($verCalificaciones as $verCalificacion)
                    
                   
                    
                    <tr>
                        <td>{{$verCalificacion->calificacion_tipo->calificacion}}</td>
                        <td>{{$verCalificacion->calificacion_tipo->puntos}}</td>
                        <td>{{$verCalificacion->calificacion_user->name}}</td>
                        <td>{{$verCalificacion->created_at}}</td>
                        <td>                                                  
                            <a href="#dialogoConfirmacionTabla2{{$verCalificacion->id}}" class="btn btn-outline-info" data-toggle="modal">Eliminar Calificación</a>
                            <div id="dialogoConfirmacionTabla2{{$verCalificacion->id}}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="">Eliminar Calificación</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('BorrarCalificación')}}"  method="post" enctype="multipart/form-data">
                                                    {!! csrf_field()!!}
                                                    <p>¿Seguro quiere eliminar esta califiación?</p>
                                                    <div class="col d-none">
                                                            <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$verCalificacion->id}}">      
                                                    </div>  
                                                    
                                                            
                                                   
                                                    <div class="row justify-content-end">
                                                        <div class="columna col-auto">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>     
                                                            <button type="submit" class="btn btn-danger">Aceptar</button>   
                                                        </div>
                                                    </div>
                                                    
                                                    
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