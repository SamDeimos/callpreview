<div class="main-content-inner">
    <div class="sales-report-area sales-style-two">
        <div class="row">
            <!-- inicio de primer bloque -->
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="ti-layout-grid2"></i>
                                    </div>
                                    <div class="col-8">
                                        Campañas <br>
                                        <small>Activas</small>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo ($campaigns_activas == NULL) ? '0' : $campaigns_activas->campaigns ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="ti-bolt"></i>
                                    </div>
                                    <div class="col-8">
                                        Llamadas <br>
                                        <small>Realizadas</small>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo ($call_realizadas == NULL) ? '0' : $call_realizadas->calls ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="ti-bolt"></i>
                                    </div>
                                    <div class="col-8">
                                        Llamadas <br>
                                        <small>Por realizar</small>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo ($call_por_realizar == NULL) ? '0' : $call_por_realizar->calls ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Timeline -->
    <div class="card mt-4">
        <!-- timeline area start -->
        <div class="card-body">
            <h4 class="header-title">Historial de llamadas</h4>
            <div class="timeline-area">
                <?php foreach ($historial as $reg) : ?>
                    <div class="timeline-task">
                        <a title="<?php echo $reg->estado; ?>">
                            <div class="icon bg<?php echo $reg->id_call_status; ?>">
                                <i class="fa fa-phone"></i>
                            </div>
                        </a>
                        <div class="tm-title">
                            <h4><?php echo $reg->nombres . ' - ' . $reg->dst ?></h4>
                            <span class="time"><i class="ti-time"></i><?php echo ($reg->cdr_calldate == '') ? $reg->reg_calldate : $reg->cdr_calldate ?></span>
                            <span class="time"><i class="ti-time"></i><?php echo seg_to_hours($reg->billsec) ?></span>
                        </div>
                        <div class="row">
                            <?php if ($reg->data != null) : ?>
                                <?php foreach (json_decode($reg->data) as $key => $value) : ?>
                                    <div class="col-4"><strong><?php echo $key ?>: </strong><?php echo $value ?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- timeline area end -->
    </div>
</div>

<!-- notas

Agregar estados a al venta
Reversado -> cuando se anulo la venta
• Competaldo -> cambiar a Autorizado Listo
• Fallido -> Negado 

reprote -> para vendedor y director (sin opcion a exportar)

detalles de la venta
• cedula de cleinte
producto => buscar la forma de incrustar lso detalles de la venta
• importe

directora puede ver lo borradores de sus vendedores
poder cambiar creador de venta solo admin


-->