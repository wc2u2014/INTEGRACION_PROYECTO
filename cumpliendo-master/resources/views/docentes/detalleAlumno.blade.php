@extends('layouts.masterDocente')

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
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($verCalificaciones as $verCalificacion)
                    
                   
                    
                    <tr>
                        <td>{{$verCalificacion->calificacion_tipo->calificacion}}</td>
                        <td>{{$verCalificacion->calificacion_tipo->puntos}}</td>
                        <td>{{$verCalificacion->calificacion_user->name}}</td>
                        <td>{{$verCalificacion->created_at}}</td>
                        
                       
                        
                       
                    </tr>
                    
                    
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



@endsection