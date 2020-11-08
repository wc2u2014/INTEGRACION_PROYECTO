<!DOCTYPE html>
<html class="fixed" lang="{{ app()->getLocale() }}">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		 <title>{{ config('app.name', 'Laravel') }}</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		
		<!-- Vendor CSS -->
		
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />

		<!-- Specific Page Vendor CSS Tables-->
		<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>

	</head>
	<body>
		<div id="app">
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
						
						
                    <a class="navbar-brand" href="{{ route('home') }}">
						
						<img src="assets/images/logoIEDIT.png" height="35" alt="IEDIT RODRIGO DE TRIANA" />
                    </a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
				
			
					<span class="separator"></span>
			
				<!--	<ul class="notifications">

						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<span class="badge">4</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="pull-right label label-default">230</span>
									Messages
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Doe</span>
												<span class="message">Lorem ipsum dolor sit.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Junior</span>
												<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle" />
												</figure>
												<span class="title">Joe Junior</span>
												<span class="message">Lorem ipsum dolor sit.</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
												</figure>
												<span class="title">Joseph Junior</span>
												<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="pull-right label label-default">3</span>
									Alerts
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-thumbs-down bg-danger"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-lock bg-warning"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">15 minutes ago</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fa fa-signal bg-success"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">10/10/2014</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>-->
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<!--<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>-->
							<div class="profile-info" data-lock-name="" data-lock-email="">
                                <span class="name"> {{ Auth::user()->name }}</span>
                              
								<span class="role">administrador</span>
							</div>
							 
                                  
                               
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<!--<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>-->
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													 <i class="fa fa-power-off"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
			<div class="inner-wrapper">
                    <!-- start: sidebar -->
                    <aside id="sidebar-left" class="sidebar-left">
                    
                        <div class="sidebar-header">
                            <div class="sidebar-title">
                                RODIGO DE TRIANA
                            </div>
                            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                            </div>
                        </div>
                    
                        <div class="nano">
                            <div class="nano-content">
                                <nav id="menu" class="nav-main" role="navigation">
                                    <ul class="nav nav-main">
                                        <li class="nav-active">
                                            <a href="{{ route('home') }}">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <!--<li>
                                            <a href="mailbox-folder.html">
                                                <span class="pull-right label label-primary">182</span>
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <span>Mailbox</span>
                                            </a>
                                        </li>-->
                                        
                                        <li class="nav-parent">
                                                <a>
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                    <span>Cursos</span>
                                                </a>
                                                <ul class="nav nav-children">
														<li>
																<a href="{{ route('formularioCurso') }}">
																	 Crear Curso
																</a>
															</li>
                                                    <li>
                                                        <a href="{{ route('ListadoCursos') }}">
															Consultar Cursos
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
											</li>
											<li class="nav-parent">
													<a>
															<i class="fa fa-university" aria-hidden="true"></i>
														<span>Docentes</span>
													</a>
													<ul class="nav nav-children">
														<li>
															<a href="{{ route('crearDocente') }}">
																 Crear Docentes
															</a>
														</li>
														<li>
															<a href="{{ route('verDocentes') }}">
																 Consultar Docentes
															</a>
														</li>
														
													</ul>
												</li>
												<li class="nav-parent">
														<a>
																<i class="fa fa-users" aria-hidden="true"></i>
															<span>Estudiantes</span>
														</a>
														<ul class="nav nav-children">
															<!--<li>
																<a href="{{ route('crearestudiante') }}">
																	 Crear Estudiantes
																</a>
															</li>-->
															<li>
																<a href="{{ route('verEstudiantes') }}">
																	 Consultar estudiantes
																</a>
															</li>
															
														</ul>
													</li>
													<li class="nav-parent">
														<a>
															<i class="fa fa-gavel" aria-hidden="true"></i>
															<span>Calificacion</span>
														</a>
														<ul class="nav nav-children">
															<li>
																<a href="{{ route('formularioCalificacion') }}">
																	 Crear Item calificación
																</a>
															</li>
															
															
														</ul>
													</li>
													<li class="nav-parent">
															<a>
																<i class="fa fa-unlock" aria-hidden="true"></i>
																<span>Recuperar contraseñas</span>
															</a>
															<ul class="nav nav-children">
																<li>
																	<a href="{{ route('contraseñas') }}">
																		 recuperar contraseña
																	</a>
																</li>
																
																
															</ul>
														</li>
                                        
                                    </ul>
                                </nav>
                            </div>
                            </div>
                    
                        
                    
                    </aside>
                    <!-- end: sidebar -->
                    <section role="main" class="content-body">
                        
					<header class="page-header">
                            <h2>Dashboard</h2>
                        
                            <div class="right-wrapper pull-right">
                                <ol class="breadcrumbs">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li><span>Dashboard</span></li>
                                </ol>
                        
                                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                            </div>
                           
                        </header>
                        <div class="row">
                                
                                    
                          
                                
                                        @yield('content')
                          
                                    
                                
                            </div>
                    </section>
            
            </div> <!--inner-->
            <aside id="sidebar-right" class="sidebar-right">
                    <div class="nano">
                        <div class="nano-content">
                            <a href="#" class="mobile-close visible-xs">
                                Collapse <i class="fa fa-chevron-right"></i>
                            </a>
                
                            <div class="sidebar-right-wrapper">
                
                                <div class="sidebar-widget widget-calendar">
                                    <h6>Calendario</h6>
                                    <div data-plugin-datepicker data-plugin-skin="dark" ></div>
                
                                    
                                </div>
                
                                
                
                            </div>
                        </div>
                    </div>
                </aside>
        </section><!--fin BODY-->
			
        </div><!--fin app-->


			<!-- Vendor -->
	
		<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		
		<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		
		<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		
		<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
		
		<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
		
		<script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
		
		<script src="{{asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
		
		<script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
		
		<script src="{{asset('assets/vendor/flot/jquery.flot.categories.js')}}"></script>
		
		<script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
		
		<script src="{{asset('assets/vendor/raphael/raphael.js')}}"></script>
		
		<script src="{{asset('assets/vendor/morris/morris.js')}}"></script>
		
		<script src="{{asset('assets/vendor/gauge/gauge.js')}}"></script>
		
		<script src="{{asset('assets/vendor/snap-svg/snap.svg.js')}}"></script>
		
		<script src="{{asset('assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>
		
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('assets/javascripts/theme.js')}}"></script>
		
		
		<!-- Theme Custom -->
		<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
		
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
		

		<!-- Specific Page Vendor tables-->
		<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
		
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		

		
		<!-- Examples -->
		<script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
			
		
		<!-- Examples Tables-->
		<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
		
		<script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
		
		<script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
		<!-- Examples charts-->
		<script src="{{asset('assets/javascripts/ui-elements/chartMorris.js')}}"></script>

		
		
		</body>
</html>