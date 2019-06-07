<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->uri->segment(1) ?> - Mi Dami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/icon/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slicknav.min.css">
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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css">

    <!-- bootstrap-select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />

    <!--  TableExport  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/tableexport.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">

    <!-- modernizr css -->
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Script adjuntar base_url -->
    <script>
        let baseurl = "<?php echo base_url() ?>";
    </script>


</head>

<body cz-shortcut-listen="true">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-area">
                                <div class="invoice-head">
                                    <div class="row">
                                        <div class="iv-left col-6">
                                            <span>Detalle de venta</span>
                                        </div>
                                        <div class="iv-right col-6 text-md-right">
                                            <span>#001-<?php echo $venta->id_venta; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="invoice-address">
                                            <h3>Detalle de cliente</h3>
                                            <h5><?php echo $venta->nombres; ?></h5>
                                            <p><?php echo $venta->address; ?></p>
                                            <p><?php echo $venta->ciudad; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <button type="button" class="btn btn-outline-success btn-xs" disabled><?php echo $venta->estado; ?></button>
                                        <ul class="invoice-date">
                                            <li>Fecha de venta : <?php echo $venta->fecha_venta; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-table table-responsive mt-5">
                                    <table class="table table-bordered table-hover text-right">
                                        <thead>
                                            <tr class="text-capitalize">
                                                <th class="text-center" style="width: 5%;">id</th>
                                                <th style="width: 45%; min-width: 130px;">description</th>
                                                <th>Precio</th>
                                                <th style="min-width: 100px">Cantidad</th>
                                                <th>total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($detalles)) : ?>
                                                <?php foreach ($detalles as $detalle) : ?>
                                                    <tr>
                                                        <td>#<?php echo $detalle->id_producto ?></td>
                                                        <td><?php echo $detalle->producto ?></td>
                                                        <td><?php echo $detalle->precio ?></td>
                                                        <td><?php echo $detalle->cantidad ?></td>
                                                        <td>
                                                            <p><?php echo $detalle->total ?></p>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">total balance :</td>
                                                <td>$<?php echo $venta->total; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">saldo pendiente :</td>
                                                <td>$<?php echo number_format($venta->total - $venta->importe, '2'); ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-buttons text-right">
                                <a href="https://colorlib.com/polygon/srtdash/invoice.html#" class="invoice-btn">print
                                    invoice</a>
                                <a href="https://colorlib.com/polygon/srtdash/invoice.html#" class="invoice-btn">send
                                    invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>