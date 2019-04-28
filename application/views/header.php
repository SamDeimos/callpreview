<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $control ?> - Mi Dami</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/icon/favicon.png">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/metisMenu.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- amchart css -->
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <!--  DataTable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!--  bootstrap-datepicker3  -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.min.css">

    <!--  TableExport  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/tableexport.min.css">

    <!-- others css -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/default-css.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive.css">

	<!-- modernizr css -->
	<script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<!-- Script adjuntar base_url -->
	<script>
		let baseurl = "<?php echo base_url() ?>";
	</script>


</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
	<div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
	<!-- sidebar menu area start -->
	<div class="sidebar-menu">
			<div class="sidebar-header">
				<div class="logo">
					<a href="<?php echo base_url() ?>"><img src="<?php echo base_url()?>assets/images/icon/logo.png" alt="logo"></a>
				</div>
			</div>
			<div class="main-menu">
				<div class="menu-inner">
					<nav>
						<ul class="metismenu" id="menu">
							<?php
							$lvl = $_SESSION['lvlpermiso'];
							?>
							<li class="<?php
								echo ($control == "Dashboard") ? "active":" ";
								echo " ";
								echo ($lvl < 2) ? "d-none":" ";
								?>">
								<a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
								<ul class="collapse">
									<li class="<?php echo ($control == "Dashboard") ? "active":" ";?>"><a href="<?php echo base_url() ?>Dashboard">Panel Administración</a></li>
								</ul>
							</li>
							<li class="<?php
								echo ($control == "Usuarios" || $control == "Productos") ? "active":" ";
								echo " ";
								echo ($lvl < 9) ? "d-none":" ";
								?>">
								<a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Sistema</span></a>
								<ul class="collapse">
									<li class="<?php echo ($control == "Usuarios") ? "active":" ";?>"><a href="<?php echo base_url() ?>Usuarios">Usuarios</a></li>
									<li class="<?php echo ($control == "Productos") ? "active":" ";?>"><a href="<?php echo base_url() ?>Productos">Productos</a></li>
								</ul>
							</li>
							<li class="<?php
								echo ($control == "Callcenter" || $control == "Clientes") ? "active":" ";
								echo " ";
								echo ($lvl < 2) ? "d-none":" ";
							;?>">
								<a href="javascript:void(0)" aria-expanded="true"><i class="ti-view-list"></i><span>Call Center</span></a>
								<ul class="collapse">
									<li class="<?php echo ($control == "Callcenter") ? "active":" ";?>"><a href="<?php echo base_url() ?>Callcenter">DAMI</a></li>
									<li class="<?php echo ($control == "Clientes") ? "active":" ";?>"><a href="<?php echo base_url() ?>Clientes">Clientes</a></li>
								</ul>
							</li>
							<li class="<?php
							echo ($control == "Reporte") ? "active":" ";
							echo " ";
							echo ($lvl < 4) ? "d-none":" ";
							;?>">
								<a href="javascript:void(0)" aria-expanded="true"><i class="ti-stats-up"></i><span>Reportes</span></a>
								<ul class="collapse">
									<li class="<?php echo ($control == "Reporte") ? "active":" ";?>"><a href="<?php echo base_url() ?>Reporte">Agente</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	<div class="main-content">
		<div class="header-area">
			<div class="row align-items-center">
				<!-- nav and search button -->
				<div class="col-md-6 col-sm-8 clearfix">
					<div class="nav-btn pull-left">
						<span></span>
						<span></span>
						<span></span>
					</div>
<!--					<div id="Buscadorentabla" class="search-box pull-left">-->
<!--							<input id="extendbuscador" type="text" name="search" placeholder="Search...">-->
<!--							<i class="ti-search"></i>-->
<!--					</div>-->
				</div>
			</div>
		</div>
		<div class="page-title-area">
			<div class="row align-items-center">
				<div class="col-sm-6">
					<div class="breadcrumbs-area clearfix">
						<h4 class="page-title pull-left"><?php echo $_SESSION['perfil']?></h4>
						<ul class="breadcrumbs pull-left">
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><span><?php echo $control ?></span></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 clearfix">
					<div class="user-profile pull-right">
						<img class="avatar user-thumb" src="<?php echo base_url()?>assets/images/author/avatar.png" alt="avatar">
						<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $user->nombre ." " .$user->apellido;?> <i class="fa fa-angle-down"></i></h4>
						<span class="d-none" id="lvluser"><?php echo $lvl ?></span>
                        <div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo base_url()?>login/Salir">Cerrar sesión</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content-inner">
