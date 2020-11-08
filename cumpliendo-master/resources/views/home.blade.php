@extends('layouts.master')

@section('content')


<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Calificaciones</h2>
                <p class="panel-subtitle">Estas son los promedios jornada tarde.</p>
            </header>
            <div class="panel-body">

                <!-- Morris: Bar -->
                <div class="chart chart-md" id="morrisBar"></div>
                <script type="text/javascript">

                    var morrisBarData = [{
                        y: 'sexto',
                        a: {{$curso601T}},
                        b: {{$curso602T}},
                        c: {{$curso603T}}
                    }, {
                        y: 'septimo',
                        a: {{$curso701T}},
                        b: {{$curso702T}},
                        c: {{$curso703T}}
                    }, {
                        y: 'octavo',
                        a: {{$curso801T}},
                        b: {{$curso802T}},
                        c: {{$curso803T}}
                    }, {
                        y: 'noveno',
                        a: {{$curso901T}},
                        b: {{$curso902T}},
                        c: {{$curso903T}}
                    }, {
                        y: 'decimo',
                        a: {{$curso1001T}},
                        b: {{$curso1002T}},
                        c: {{$curso1003T}}
                    }, {
                        y: 'once',
                        a: {{$curso1101T}},
                        b: {{$curso1102T}},
                        c: {{$curso1103T}}
                    }];

                    // See: assets/javascripts/ui-elements/examples.charts.js for more settings.

                </script>

            </div>
        </section>
    </div>
</div>



@endsection
