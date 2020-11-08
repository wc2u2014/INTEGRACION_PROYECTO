@extends('layouts.master')

@section('content')

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Agregar item de calificación</h2>
            </header>
            <div class="panel-body">
                
                    <form action="{{route('agregarItem')}}" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">   
                        {!! csrf_field()!!}
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                     <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div> 
                     @endif
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputTooltip">item de calificacion</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="" title="" data-toggle="tooltip" 
                            data-trigger="hover" class="form-control input-rounded" 
                            data-original-title="Agregue el nombre de su item" id="calificacion" name="calificacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputTooltip">puntos</label>
                        <div class="col-md-6">
                            <input type="number" placeholder="" title="" data-toggle="tooltip" 
                            data-trigger="hover" class="form-control input-rounded" 
                            data-original-title="Cantidad de 1 hasta 5" id="puntos" name="puntos"
                            min="1" max="5">
                        </div>
                    </div>
                    <div class="" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Agregar Item</button>
                    </div>
                   



                   

                    
                </form>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
        
                <h2 class="panel-title">Items de calificacion </h2>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-striped mb-none" id="datatable-details">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Puntos</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($itemCalificacion as $itemCalificacions)
                        
                       
                        
                        <tr>
                                
                            <td>{{$itemCalificacions->calificacion}}</td>
                            <td>{{$itemCalificacions->puntos}}</td>
                            
                           
                            
                            <td>
                                    <div class="row justify-content-center align-items-center">
                            
                                            <div class="columna col-12 ">
                                            <a href="#Confirmacion{{$itemCalificacions->id}}" class="btn btn-outline-info  btn-block" data-toggle="modal">Cambiar Puntaje</a>
                                            
                                                <div id="Confirmacion{{$itemCalificacions->id}}" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="">CAMBIAR EL PUNTAJE DEL ITEM {{$itemCalificacions->calificacion}}</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('cambiarPuntaje')}}"  method="post" enctype="multipart/form-data">
                                                                        {!! csrf_field()!!}
                                                                        <p>Ponga nuevo valor para los puntos de el item de {{$itemCalificacions->calificacion}} </p>
                                                                        <br>
                                                                        <div class="col d-none">
                                                                                <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$itemCalificacions->id}}">      
                                                                        </div>
                                                                        @if($itemCalificacions->id!=1)  
                                                                        <div class="form-group">
                                                                                <label class="col-md-3 control-label" for="inputTooltip">puntos</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="number" placeholder="" title="" data-toggle="tooltip" 
                                                                                    data-trigger="hover" class="form-control input-rounded" 
                                                                                    data-original-title="Cantidad de 1 hasta 5" id="puntos" name="puntos"
                                                                                    min="1" max="5" required="obligatorio">
                                                                                    <hr width="100%" />
                                                                                </div>
                                                                            </div>
                                                                            @else
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="inputTooltip">puntos</label>
                                                                            <div class="col-md-6">
                                                                                <input type="number" placeholder="" title="" data-toggle="tooltip" 
                                                                                data-trigger="hover" class="form-control input-rounded" 
                                                                                data-original-title="Cantidad de 1 hasta 10000" id="puntos" name="puntos"
                                                                                min="1" max="10000" required="obligatorio">
                                                                                <hr width="100%" />
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                                
                                                                                
                                                                       
                                                                        <div class="row justify-content-end">
                                                                            <div class="columna col-auto">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>     
                                                                                <button type="submit" class="btn btn-primary">Aceptar</button>   
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                            
                            
                                            
                                             </div>
                                    
                                    
                               
                                        </div>
                            </td>
                            <td>@if($itemCalificacions->id!=1)
                                    <div class="row justify-content-center align-items-center">
                            
                                            <div class="columna col-12 ">
                                            <a href="#eliminarItem{{$itemCalificacions->id}}" class="btn btn-outline-warning  btn-block" data-toggle="modal">Eliminar</a>
                                            
                                                <div id="eliminarItem{{$itemCalificacions->id}}" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="">Eliminar Item de Calificacion {{$itemCalificacions->calificacion}}</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('eliminarItem')}}"  method="post" enctype="multipart/form-data">
                                                                        {!! csrf_field()!!}
                                                                        <p>ESTA SEGURO DE ELIMINAR {{$itemCalificacions->calificacion}} COMO ITEM DE CALIFICACION</p>
                                                                        <div class="col d-none">
                                                                                <input type="hidden" class="form-control" placeholder="id" name="id" id="id" value="{{$itemCalificacions->id}}">      
                                                                        </div>  
                                                                        
                                                                                
                                                                       
                                                                        <div class="row justify-content-end">
                                                                            <div class="columna col-auto">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>     
                                                                                <button type="submit" class="btn btn-primary">Aceptar</button>   
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                            
                            
                                            
                                             </div>
                                    
                                    
                               
                                        </div>
                                
                           @endif
                                
                    </div></td>
                        </tr>
                        
                        
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>


@endsection