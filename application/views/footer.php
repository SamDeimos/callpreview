<div id="resultado">
</div>
</div>
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright 2019. All right reserved. Developer by <a href="https://github.com/SamDeimos">Santiago Gutierrez</a>.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- offset area end -->
<!-- jquery latest version -->
<script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- moment.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap4-toggle.min.js"></script>

<!-- start DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!--  bootstrap-datepicker  -->
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.es.min.js"></script>

<!-- bootstrap-select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.js"></script>

<!-- daterangepicker.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>assets/js/docs.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script-functions.js"></script>

<!-- Script Usuarios -->
<script src="<?php echo base_url() ?>assets/js/modules/<?php echo $this->uri->segment(1) ?>.js"></script>

<?php

echo "<script>console.log('Memoria usada: " . $this->benchmark->memory_usage() . "')</script>";
echo "<script>console.log('Tiempo de ejecución: " . $this->benchmark->elapsed_time() . "')</script>";

// isset($tarea) ? var_dump($tarea) : '';
// echo "<hr>";
// echo json_encode($this->session->userdata());

?>

</body>

</html>