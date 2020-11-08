@extends('layouts.master')

@section('content')
                <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-primary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-primary">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                    </div>
                                                </div> 
                                                <div class="widget-summary-col">
                                                    <div class="summary">   
                                                        <h4 class="title">Director de Curso</h4>
                                                        <div class="info">
                                                            <p class="">{{$nombreDocente}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        
                                                        <div class="columna col-12 ">
                                                                        
                                                                <a href="#dialogoConfirmacionTabla2{{$idCurso}}" class="text-muted text-uppercase" data-toggle="modal"> Modificar </a>
                                                                <div id="dialogoConfirmacionTabla2{{$idCurso}}" class="modal fade">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="">Cambiar Docente </h5>
                                                                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                        <form action="{{route('elegirDocente')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                                                            {!! csrf_field()!!}
                                                                                            <div class="form-group">
                                                                                                    <label for="">Elija un docente para este curso: </label>
                                                                                                    <select id="idprofesor"  name="idprofesor"  class="form-control">Docente:
                                                                                                            
                                                                                                            @foreach ($lista_maestros as $lista_maestro)
                                                                                                            
                                                                                                            <option value={{$lista_maestro->id}}>{{$lista_maestro->nombre}}</option>    
                                                                                                            
                                                                                                            @endforeach
                                                                                                            
                                                                                                            
                                                                                                    </select>
                                                                                            </div>
                                                                                                <br>
                                                                                                <div class="col d-none">
                                            
                                                                                                        <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$idCurso}}">   
                                                                                                    </div>  
                                                                                                    <br>
                                                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                                                        </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>


                                <div class="col-md-12 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-tertiary">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-tertiary">
                                                                
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Lista Estudiantes</h4>
                                                            <div class="info">
                                                                <strong class="amount">{{$numEstuCurso}}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                                
                
                                                                <div class="columna col-12 ">
                                                                        
                                                                        <a class="text-muted text-uppercase" href="{{ route('formularioEstudiante',['id'=>$idCurso]) }}">Cargar un estudiante</a> &nbsp &nbsp &nbsp &nbsp
                                                                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                                                                                
                                                                        <a href="#dialogoConfirmacionTabla1{{$idCurso}}" class="text-muted text-uppercase" data-toggle="modal"> Subir lista </a>
                                                                        <div id="dialogoConfirmacionTabla1{{$idCurso}}" class="modal fade">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button> 
                                                                                            <h5 class="modal-title" id="">Subir Lista  de estudiantes &nbsp &nbsp  </h5>
                                                                                            
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                                <form action="{{route('importarDocumentoEstudiante')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                                                                    {!! csrf_field()!!}
                                                                                                    <div class="form-group">
                                                                                                            <label for="nombre" style="color:red">Al subir esta lista reiniciara las calificaciones y modificara todos los integrantes de este curso
                                                                                                                    &nbsp &nbsp &nbsp  
                                                                                                            </label>
                                                                                                            <input  type="file" class="form-control" placeholder="import_file" name="import_file" id="import_file" value="{{old('import_file')}}">
                                                                                                        </div>
                                                                                                        <br>
                                                                                                        <div class="col d-none">
                                                    
                                                                                                                <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$idCurso}}">   
                                                                                                            </div>  
                                                                                                            <br>
                                                                                                    <button type="submit" class="btn btn-primary">Importar Lista</button>
                                                                                                </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    
                                                                </div>
                                                                
                                                           
                                                                
                                                               
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-secondary">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-secondary">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </div>
                                                    </div> 
                                                    <div class="widget-summary-col">
                                                        <div class="summary">   
                                                            <h4 class="title">Eliminar Curso</h4>
                                                            <div class="info">
                                                                <h5 class="" >Esta opción eliminara toda la información de este curso</h5>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            
                                                            <div class="columna col-12 ">
                                                                            
                                                                    <a href="#dialogoConfirmacionTabla3{{$idCurso}}" class="text-muted text-uppercase"  data-toggle="modal"> ELIMINAR </a>
                                                                    <div id="dialogoConfirmacionTabla3{{$idCurso}}" class="modal fade">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        
                                                                                        <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        <h5 class="modal-title" id="">ELIMINAR CURSO &nbsp &nbsp &nbsp  </h5> 
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                            <form action="{{route('eliminarCurso')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                                                                {!! csrf_field()!!}
                                                                                                <div class="form-group">
                                                                                                        <label for="" style="color: red">¿Esta seguro de eliminar este curso? &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp&nbsp &nbsp &nbsp </label>
                                                                                                        
                                                                                                </div>
                                                                                                    
                                                                                                
                                                                                                    <div class="col d-none">
                                                
                                                                                                            <input type="hidden" class="form-control" placeholder="id" name="idCurso" id="idCurso" value="{{$idCurso}}">   
                                                                                                        </div>  
                                                                                                        <br>
                                                                                                        <!--<button type="close" class="btn btn-info">NO</button>-->
                                                                                                        <button type="submit" class="btn btn-warning">SI</button>
                                                                                                
                                                                                            </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                        </div>
                        

                </div>
                @if(@isset($estudCurso))
        
                @include('tablaEstudiantes')    
            
           
            @endif

@endsection