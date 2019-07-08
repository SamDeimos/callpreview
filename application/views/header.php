<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo ucfirst($this->uri->segment(1)) ?> - XUDO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Trumbowyg -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.css">

    <!-- Fullcalendar -->
    <link href="<?php echo base_url() ?>assets/js/fullcalendar/packages/core/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/js/fullcalendar/packages/daygrid/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/js/fullcalendar/packages/timegrid/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/js/fullcalendar/packages/list/main.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/fullcalendar/packages/core/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fullcalendar/packages/interaction/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fullcalendar/packages/daygrid/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fullcalendar/packages/timegrid/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fullcalendar/packages/list/main.js"></script>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/icon/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- chart.js css - js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" type="text/css" media="all" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- daterangepicker.js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!--  DataTable  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!--  bootstrap-datepicker3  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css">

    <!-- bootstrap-select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />

    <!--  TableExport  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/tableexport.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">

    <!-- bootstrap4-toggle.js css - js -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- modernizr css -->
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Script adjuntar base_url -->
    <script>
        var baseurl = "<?php echo base_url(); ?>";
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
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <?php foreach ($menu as $main) {
                                if ($main->nivel_up == 0) { ?>
                                    <li class="<?php echo ($this->uri->segment(1) == $main->menu) ? "active" : " " ?>">
                                        <a href="javascript:void(0)" aria-expanded="true"><i class="<?php echo $main->icono ?>"></i><span><?php echo $main->menu ?></span></a>
                                        <?php foreach ($menu as $sub) {
                                            if ($sub->nivel_up == $main->id_menu) { ?>
                                                <ul class="collapse">
                                                    <li class="<?php echo ($this->uri->uri_string() == $sub->url) ? "active" : " " ?>"><a href="<?php echo base_url() . $sub->url ?>"><?php echo $sub->menu ?></a></li>
                                                </ul>
                                            <?php }
                                        } ?>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <!-- <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?php echo $this->session->userdata('perfil') ?></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url() ?>">Home</a></li>
                                <li><span><?php echo $this->uri->segment(1) ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?php echo base_url() ?>assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('name'); ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url() ?>login/Salir">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">