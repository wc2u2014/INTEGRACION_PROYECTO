<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cumpliendo Ando,voy ganando</title>

        
        <!-- Google Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
       <script src="https://use.fontawesome.com/cfa0d6c573.js"></script>
       <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/portada/bootstrap.min.css') }}"/>
    
    <link rel="stylesheet" href="{{ asset('css/portada/portada.css') }}"/>


    </head>
    <body>
      
        <!-- Header section -->
        <header class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="site-logo">
                            <img src="{{ asset('img/logo.png') }}" alt=""> 
                        </div>
                        <div class="nav-switch">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 ">
                    <!--    <a href="" class="site-btn header-btn">Login</a> -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="https://rodrigodetriana.edu.co/">Colegio</a></li>
                            <!--    <li><a href="{{ route('login') }}">Login</a></li> -->
                                <li><a href="{{ route('registrate') }}">Registro</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section end -->


        <!-- Hero section -->
        <section class="hero-section set-bg img-fluid" data-setbg="{{ asset('img/bg.jpg') }}">
            <div class="container">
                <div class="hero-text text-white">
                    <h2>Cumpliendo Ando,<br>
                    voy ganando</h2>
                    <p>Proyecto institucional de convivencia <br>
                    Colegio Instituto Técnico Rodrigo De Triana IED</p>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                         @if ($errors->has('email'))
                         <div class="text-center mb-3">
                             <strong class="text-danger">{{ $errors->first('email') }}</strong>
                         </div>
                         @endif 

                         @if ($errors->has('password'))
                          
                           <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                   
                         @endif 


                                   
                                
                           
                        <form class="ingreso-form" method="POST" action="{{ route('login') }}">
                             {{ csrf_field() }}
                            <input id="email" type="email" name="email" value="{{ old('email') }}"  placeholder="Correo" required autofocus >
                            
                            <input type="password"  placeholder="Contraseña" class="last-s" name="password" required>

                                
                            <button class="site-btn">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end -->

        <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/portada/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/portada/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/portada/portada.js') }}"></script>

    </body>
</html>
