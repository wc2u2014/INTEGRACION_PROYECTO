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

                <h2 class="panel-title">Agregar Curso</h2>
            </header>
            <div class="panel-body">
                
                    <form action="{{route('agregarCurso')}}" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">   
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
                        <label class="col-md-3 control-label" for="inputTooltip">Curso: </label>
                        <div class="col-md-6">
                            <input type="text" placeholder="" title="" data-toggle="tooltip" 
                            data-trigger="hover" class="form-control input-rounded" 
                            data-original-title="Agregue el numero del curso" id="curso" name="curso">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputTooltip">Jornada: </label>
                        <div class="col-md-6">
                            <select id="idjornada"  name="idjornada"  class="form-control">:
                                    
                                    @foreach ($jornadas as $jornada)
                                    @if($jornada->id!=3)
                                    <option value={{$jornada->id}}>{{$jornada->jornada}}</option>    
                                    @endif
                                    @endforeach
                                    
                                    
                            </select>
                    </div>
                    </div>
                    <div class="" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Agregar Curso</button>
                    </div>
                   



                   

                    
                </form>
            </div>
        </section>
@endsection