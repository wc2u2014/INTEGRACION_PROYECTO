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

        <h2 class="panel-title">Usuarios y profesores</h2>
        
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-details">
            <thead>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Recuperar Contraseña</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($usuarios as $usuario)
                
               
                
                <tr>
                    <td>{{$usuario->identificacion}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>                  
                    <td>
                        
                                                                        
                        <a href="#dialogoConfirmacionTabla2{{$usuario->id}}" class="btn btn-outline-info" data-toggle="modal">Cambiar Contraseña</a>
                        <div id="dialogoConfirmacionTabla2{{$usuario->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Cambiar la contraseña de {{$usuario->name}}</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{route('cambiarContraseña')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    {!! csrf_field()!!}
                                                    <div class="form-group">
                                                            
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="col-md-3 control-label" for="inputTooltip">Nueva contraseña</label>
                                                            <div class="col-md-6">
                                                                <input type="password" placeholder="" title="" data-toggle="tooltip" 
                                                                data-trigger="hover" class="form-control input-rounded" 
                                                                data-original-title="nueva contraseña" id="contraseña" name="contraseña"
                                                                required="obligatorio">
                                                                <hr width="100%" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <label class="col-md-3 control-label" for="inputTooltip">Repetir la contraseña</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" placeholder="" title="" data-toggle="tooltip" 
                                                                    data-trigger="hover" class="form-control input-rounded" 
                                                                    data-original-title="repita la contraseña" id="repetirContraseña" name="repetirContraseña"
                                                                    required="obligatorio">
                                                                    <hr width="100%" />
                                                                </div>
                                                            </div>
                                                            
                                                        <div class="col d-none">
    
                                                                <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$usuario->id}}">   
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