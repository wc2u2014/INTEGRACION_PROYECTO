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

                <h2 class="panel-title">Agregar Estudiante al curso {{$curso->curso}}</h2>
            </header>
            <div class="panel-body">
                
                    <form action="{{route('agregarEstudiante')}}" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">   
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
                            <label class="col-md-3 control-label" for="inputTooltip">identificacion: </label>
                            <div class="col-md-6">
                                <input type="text" placeholder="" title="" data-toggle="tooltip" 
                                data-trigger="hover" class="form-control input-rounded" 
                                data-original-title="Agregue la identificacion del estudiante" id="identificacion" name="identificacion">
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputTooltip">Nombre: </label>
                        <div class="col-md-6">
                            <input type="text" placeholder="" title="" data-toggle="tooltip" 
                            data-trigger="hover" class="form-control input-rounded" 
                            data-original-title="Agregue el nombre del estudiante" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="col d-none">
                                                    
                            <input type="hidden" class="form-control" placeholder="id" name="idCurso" id="idCurso" value="{{$idCurso}}">   
                        </div> 
                    
                    <div class="" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
                    </div>
                   



                   

                    
                </form>
            </div>
        </section>
@endsection