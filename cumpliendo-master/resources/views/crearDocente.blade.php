@extends('layouts.master')

@section('content')
<section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Agregar lista de docentes</h2>
        </header>
<div class="panel-body">
<div class="card">
        <div class="card-body">
            
            <form action="{{route('importarDocumentoDocente')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {!! csrf_field()!!}
                <div class="form-group">
                        <label for="nombre">Documento en excel</label>
                        <input  type="file" class="form-control" placeholder="import_file" name="import_file" id="import_file" value="{{old('import_file')}}">
                    </div>
<br>
                <button type="submit" class="btn btn-primary">Importar Lista</button>
            </form>
        </div>
    </div>
</div>
    </section>
    <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Agregar un docente</h2>
            </header>
    <div class="panel-body">
                
            <form action="{{route('agregarDocente')}}" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">   
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
           
            
            <div class="" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Agregar Profesor</button>
            </div>
           



           

            
        </form>
    </div>
    </section>
@endsection