<!doctype html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="msapplication-TileColor" content="#0061da">
	<meta name="theme-color" content="#1643a3">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />
	
	<!-- Title -->
	<title>Hotel Mar de sueños</title>

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Dashboard css -->
	<link href="assets/css/style.css" rel="stylesheet" />

	<!-- Custom scroll bar css-->
	<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!-- Sidemenu css -->
	<link href="assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

	<!--Daterangepicker css-->
	<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

	<!-- Sidebar Accordions css -->
	<link href="assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

	<!-- Rightsidebar css -->
	<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

	<!---Font icons css-->
	<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
	<link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
	<link  href="assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

	<!-- Data table css -->
	<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

	<!-- Notifications  css -->
	<link href="assets/plugins/notify/css/jquery.growl.css" rel="stylesheet" />
	<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

	<!--Select2 css -->
	<link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />

	<!---Sweetalert Css-->
	<link href="assets/plugins/sweet-alert/jquery.sweet-modal.min.css" rel="stylesheet" />
	<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />

	<!-- Jquery UI -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Date Picker css-->
	<link href="assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />

</head>

<body class="app sidebar-mini rtl">

	<!--Global-Loader-->
	<div id="global-loader">
		<img src="assets/images/icons/loader.svg" alt="loader">
	</div>

	<div class="page">
		<div class="page-main">

			<!--app-header-->
			<div class="app-header header d-flex">
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand" href="index.php">
							<img src="assets/images/brand/logo.jpeg" class="header-brand-img main-logo" alt="Hoola aqui el logo">
							<img src="assets/images/brand/logo.jpeg" class="header-brand-img icon-logo" alt="Hogo logo">
						</a><!-- logo-->
						<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
						<a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a><!-- search icon -->
						<div class="header-form">
							<form class="form-inline">
								<div class="search-element mr-3">
									<input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
									<span class="Search-icon"><i class="fa fa-search"></i></span>
								</div>
							</form><!-- search-bar -->
						</div>
						<div class="d-flex order-lg-2 ml-auto header-rightmenu">
							<div class="dropdown">
								<a  class="nav-link icon full-screen-link" id="fullscreen-button">
									<i class="fe fe-maximize-2"></i>
								</a>
							</div><!-- full-screen -->
							<div class="dropdown header-notify">
								<a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
									<i class="fe fe-bell "></i>
									<span class="pulse bg-success"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
									<a href="#" class="dropdown-item text-center">4 New Notifications</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg bg-green">
											<i class="fe fe-mail"></i>
										</div>
										<div>
											<strong>Message Sent.</strong>
											<div class="small text-muted">12 mins ago</div>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg bg-pink">
											<i class="fe fe-shopping-cart"></i>
										</div>
										<div>
											<strong>Order Placed</strong>
											<div class="small text-muted">2  hour ago</div>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg bg-blue">
											<i class="fe fe-calendar"></i>
										</div>
										<div>
											<strong> Event Started</strong>
											<div class="small text-muted">1  hour ago</div>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg bg-orange">
											<i class="fe fe-monitor"></i>
										</div>
										<div>
											<strong>Your Admin Lanuch</strong>
											<div class="small text-muted">2  days ago</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item text-center">View all Notifications</a>
								</div>
							</div><!-- notifications -->
							<div class="dropdown header-user">
								<a class="nav-link leading-none siderbar-link"  data-toggle="sidebar-right" data-target=".sidebar-right">
									<span class="mr-3 d-none d-lg-block ">
										<span class="text-gray-white"><span class="ml-2"><?=$_SESSION['Nombre']?></span></span>
									</span>
									<span class='avatar avatar-md brround text-center cover-image' data-image-src='assets/images/users/male/33.png'></span>
								</a>
							</div><!-- profile -->
							<div class="dropdown">
								<a  class="nav-link icon siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
									<i class="fe fe-more-horizontal"></i>
								</a>
							</div><!-- Right-siebar-->
						</div>
					</div>
				</div>
			</div>
			<!--app-header end-->

			<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar">
				<div class="app-sidebar__user pb-0">
					<div class="user-body">
					</div>
					<div class="user-info">
						<a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold"><?=$_SESSION['Nombre']?></span><br>
							<span class="text-dark app-sidebar__user-name text-sm"></span>
						</a>
					</div>
				</div>

				<div class="tab-menu-heading siderbar-tabs border-0 p-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class=""><a href="index.php" class="active"><i class="fa fa-home fs-17"></i></a></li>
							<li><a href="logout.php" title="logout"><i class="fa fa-power-off fs-17"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
					<div class="tab-content">
						<div class="tab-pane active" id="index1">
							<div class="row row-demo-list">
								<div id="parentVerticalTab" class="col-md-12">
									<ul class="resp-tabs-list hor_1">
										<li class="resp-tab-active active"><i class="side-menu__icon typcn typcn-device-desktop"></i></li>
										<li><i class="side-menu__icon typcn typcn-th-large-outline"></i></li>
									</ul>
									<div class="resp-tabs-container hor_1">
										<div class="resp-tab-content-active">
											<div class="row">
												<div class="col-md-12">
													<h4 class="font-weight-semibold">Hotel</h4>
													<a href="?view=Reservas" class="slide-item">Reservas</a>
													<a href="?view=Habitaciones" class="slide-item">Habitaciones</a>
													<a href="#" onclick="Ventas();" class="slide-item">Ventas</a>
												</div>
											</div>
										</div>
										<div>
											<div class="row">
												<div class="col-md-12">
													<h4 class="font-weight-semibold">Configuración</h4>
													<a href="?view=CambiarContra" class="slide-item">Cambiar contraseña</a>
													<a href="?view=Usuarios" class="slide-item">Usuarios</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- col-4 -->
						</div>
					</div>
				</div>
			</aside>
			<!--sidemenu end-->
			<!-- Right-sidebar-->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="tab-menu-heading siderbar-tabs border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class=""><a href="#tab"  class="active" data-toggle="tab">Perfil</a></li>
						</ul>
					</div>
				</div>
				<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
					<div class="tab-content border-top">
						<div class="tab-pane active " id="tab">
							<div class="card-body p-0">
								<div class="header-user text-center mt-4 pb-4">
									<span class='avatar avatar-xxl brround text-center cover-image' data-image-src='assets/images/users/male/33.png'></span>
									<div class="dropdown-item text-center font-weight-semibold user h3 mb-0"><?=$_SESSION['Nombre']?></div>
									<div class="card-body">
									</div>
								</div>
								<a class="dropdown-item  border-top" href="index.php?view=CambiarContra">
									<i class="dropdown-icon mdi mdi-account-outline "></i> Cambia tu contraseña!
								</a>
								<div class="card-body border-top">
									<div class="row">
										<div class="col-6 text-center">
											<a class="" href=""><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
											<div>Configuraciones</div>
										</div>
										<div class="col-6 text-center">
											<a class="" href="logout.php"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
											<div>Salir</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Rightsidebar-->
			<div class="app-content  my-3 my-md-5">
				<div class="side-app">
						<!-- <div class="bg-white p-3 header-secondary row">
							<div class="col col-auto">
								<a class="btn btn-light mt-4 mt-sm-0" href="#"><i class="fe fe-help-circle mr-1 mt-1"></i> Soporte</a>
								<a class="btn btn-success mt-4 mt-sm-0" href="#"><i class="fe fe-plus mr-1 mt-1"></i> Generar Ticket</a>
							</div>
						</div> -->
						<!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="index.php">Hotel</a></li>
								<li class="breadcrumb-item active" aria-current="page">Mar de sueños</li>
							</ol><!-- End breadcrumb -->
						</div>
						<!-- End page-header -->
						<!-- Jquery js-->
						<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>

						<!--Bootstrap.min js-->
						<script src="assets/plugins/bootstrap/popper.min.js"></script>
						<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

						<!--Jquery Sparkline js-->
						<script src="assets/js/vendors/jquery.sparkline.min.js"></script>

						<!-- Chart Circle js-->
						<script src="assets/js/vendors/circle-progress.min.js"></script>

						<!-- Star Rating js-->
						<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

						<!--Moment js-->
						<script src="assets/plugins/moment/moment.min.js"></script>

						<!-- Daterangepicker js-->
						<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

						<!--Side-menu js-->
						<script src="assets/plugins/toggle-sidebar/sidemenu.js"></script>

						<!-- Sidebar Accordions js -->
						<script src="assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

						<!--Time Counter js-->
						<script src="assets/plugins/counters/jquery.missofis-countdown.js"></script>
						<script src="assets/plugins/counters/counter.js"></script>

						<!-- Custom scroll bar js-->
						<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

						<!-- Rightsidebar js -->
						<script src="assets/plugins/sidebar/sidebar.js"></script>

						<!-- Data tables js-->
						<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
						<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
						<script src="assets/plugins/datatable/datatable.js"></script>
						<script src="assets/plugins/datatable/datatable-2.js"></script>
						<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>

						<!-- Datepicker js -->
						<script src="assets/plugins/date-picker/spectrum.js"></script>
						<script src="assets/plugins/date-picker/jquery-ui.js"></script>
						<script src="assets/plugins/input-mask/jquery.maskedinput.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

						<!-- Notifications js -->
						<script src="assets/plugins/notify/js/rainbow.js"></script>
						<script src="assets/plugins/notify/js/sample.js"></script>
						<script src="assets/plugins/notify/js/jquery.growl.js"></script>
						<script src="assets/plugins/notify/js/notifIt.js"></script>

						<!-- Sweet alert js-->
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

						<!-- Custom js-->
						<script src="assets/js/custom.js"></script>

						<script type="text/javascript">
							function Ventas(){
								Swal.fire({
									title: 'Reporte de ventas',
									html: '<input id="FechaInicio" placeholder="Fecha inicio" data-date-format="yyyy-mm-dd" class="swal2-input"><br><input id="FechaFin" placeholder="FechaFin" data-date-format="yyyy-mm-dd" class="swal2-input">',
									customClass: 'swal2-overflow',
									onOpen: function() {
										$('#FechaInicio').datepicker({
											autoclose: true
										});
										$('#FechaFin').datepicker({
											autoclose: true
										});
									},
								}).then(function(result) {
									if(result.value){
										let FechaInicio = $('#FechaInicio').val();
										let FechaFin = $('#FechaFin').val();
										if(FechaInicio!=="" || FechaFin!==""){
											Swal.showLoading()
											$.ajax({
												type:'POST',
												url:'Api/ConsultarVentas.php',
												data:{'FechaInicio': FechaInicio, 'FechaFin':FechaFin},
												dataType: 'json',
												success:function(Response){
													Swal.close();
													if(Response){
														Swal.fire({
															icon: 'success',
															html: '<table class="table table-striped table-bordered"><thead><th>Fecha Inicio</th><th>Fecha Fin</th><th>Venta</th></thead><tbody><tr><td>'+FechaInicio+'</td><td>'+FechaFin+'</td><td>'+Response.Ventas+' COP</td></tr></tbody></table>',
															customClass: 'swal2-overflow',
														})
													}

												}
											});
										}else{
											Swal.fire({
												icon: 'error',
												title: 'Oops...',
												text: "¡Los campos no deben estar vacios!"
											})
										}
									}
								});
							}
						</script>