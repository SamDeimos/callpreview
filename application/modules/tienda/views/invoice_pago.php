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
                                            <span>INVOICE</span>
                                        </div>
                                        <div class="iv-right col-6 text-md-right">
                                            <span>#34445998</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="invoice-address">
                                            <h3>invoiced to</h3>
                                            <h5>Verdie Hintz</h5>
                                            <p>4494 Weekley Street, San Antonio, 78205 Texas</p>
                                            <p>San Antonio</p>
                                            <p>Somalia</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <ul class="invoice-date">
                                            <li>Invoice Date : sat 18 | 07 | 2018</li>
                                            <li>Due Date : sat 18 | 07 | 2018</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-table table-responsive mt-5">
                                    <table class="table table-bordered table-hover text-right">
                                        <thead>
                                            <tr class="text-capitalize">
                                                <th class="text-center" style="width: 5%;">id</th>
                                                <th class="text-left" style="width: 45%; min-width: 130px;">description
                                                </th>
                                                <th>qty</th>
                                                <th style="min-width: 100px">Unit Cost</th>
                                                <th>total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Crazy Toys</td>
                                                <td>1</td>
                                                <td>$20</td>
                                                <td>$40</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-left">Beautiful flowers</td>
                                                <td>2</td>
                                                <td>$50</td>
                                                <td>$100</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">total balance :</td>
                                                <td>$140</td>
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
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            <p></p>
        </div>
    </footer>
    <!-- footer area end-->
    <!-- jquery latest version -->
    <script src="./Invoice - srtdash_files/jquery-2.2.4.min.js.descarga" type="text/javascript"></script>
    <!-- bootstrap 4 js -->
    <script src="./Invoice - srtdash_files/popper.min.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/bootstrap.min.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/owl.carousel.min.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/metisMenu.min.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/jquery.slimscroll.min.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/jquery.slicknav.min.js.descarga" type="text/javascript"></script>

    <!-- others plugins -->
    <script src="./Invoice - srtdash_files/plugins.js.descarga" type="text/javascript"></script>
    <script src="./Invoice - srtdash_files/scripts.js.descarga" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="./Invoice - srtdash_files/js" type="text/javascript"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>



</body>

</html>