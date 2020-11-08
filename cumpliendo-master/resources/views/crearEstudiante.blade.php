@extends('layouts.master')

@section('content')

<div class="card">
        <div class="card-body">
            
            <form action="{{route('importarDocumentoEstudiante')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {!! csrf_field()!!}
                <div class="form-group">
                        <label for="nombre">Documento</label>
                        <input  type="file" class="form-control" placeholder="import_file" name="import_file" id="import_file" value="{{old('import_file')}}">
                    </div>

                <button type="submit" class="btn btn-primary">Importar Entregas</button>
            </form>
        </div>
      

    </div>
@endsection