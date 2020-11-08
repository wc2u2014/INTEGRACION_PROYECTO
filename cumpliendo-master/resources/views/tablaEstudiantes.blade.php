<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Estudiantes Rodrigo de triana</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-details">
            <thead>
                <tr>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($listaEstudiantes as $listaEstudiante)
                
               
                
                <tr>
                        
                    <td>{{$listaEstudiante->rela_estudiante->identificacion}}</td>
                    <td>{{$listaEstudiante->rela_estudiante->nombre}}</td>
                    <td>{{(isset ($listaEstudiante->rela_estudiante->estudiante_estado->estado))? $listaEstudiante->rela_estudiante->estudiante_estado->estado :'Sin Estado'}}</td>
                   
                    
                    <td><div class="row justify-content-center align-items-center">
            
                                <div class="columna col-12 ">
                                        <a href="#" class="btn btn-outline-warning  btn-block" >  </a>
                                          
                                </div>
                                
                           
                                
                    </div></td>
                </tr>
                
                
                
                @endforeach
            </tbody>
        </table>
    </div>
</section>