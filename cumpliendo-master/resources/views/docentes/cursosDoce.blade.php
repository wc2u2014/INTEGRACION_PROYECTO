@extends('layouts.masterDocente')

@section('content')



    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Cursos Rodrigo de triana</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Jornada</th>
                        <th>Responsable</th>
                        <th>Cantidad estudiantes</th>
                        <th>Puntos </th>
                        <th>Ver Curso</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($listaCursos as $listaCurso)
                    
                    @if(($listaCurso->id!=4))
                    
                    <tr>
                        <td>{{$listaCurso->curso}}</td>
                        <td>{{$listaCurso->curso_jornada->jornada}}</td>
                        <td>@foreach($profesores as $profesore)
                            @if(($profesore->idCurso==$listaCurso->id))
                            {{$profesore->nombre}}
                                                     
                            @endif
                            @endforeach
                            
                            </td>
                        <td>{{$listaCurso->total_estudiante}}</td>
                        <td>{{$listaCurso->cuentaPuntos}}</td>
                        
                        <td><div class="row justify-content-center align-items-center">
                
                                <div class="columna col-12 ">
                                        <a href="{{route('detalle',['id'=>$listaCurso->id])}}" class="btn btn-outline-info  btn-block" > Ver Curso </a>
                                          
                                </div>
                                
                           
                                
                            </div></td>
                       
                    </tr>
                    
                    @endif
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



@endsection