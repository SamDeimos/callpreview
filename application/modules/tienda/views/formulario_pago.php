<br>
<?php


if (isset($pago->id_cliente)) {
    $cobro = 'active show';
    $venta = "";
} elseif (isset($pago->id_venta)) {
    $venta = 'active show';
    $cobro = "";
} else {
    $cobro = 'active show';
    $venta = "";
}

?>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-secondary btn-xs" href="clientes/cliente"><i class="fa fa-user-plus"></i> Nueva cliente</a>
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>tienda/pagos">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="TabPago" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php echo $cobro; ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cobro Directo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $venta; ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pagar Venta</a>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" value="CobroDirecto">
                            <input type="hidden" name="id_pago" id="id_pago" value="<?php echo (isset($pago->id_pago) ? $pago->id_pago : ''); ?>">
                            <div class="form-group">
                                <label for="id_cliente">Selccionar Cliente</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm select_single" name="id_cliente" id="id_cliente" required>
                                        <option <?php echo (isset($pago->id_cliente) ? '' : 'selected'); ?> value=""></option>
                                        <?php foreach ($cedulas as $cedula) { ?>
                                            <option <?php echo ((isset($pago->id_cliente) ? $pago->id_cliente : '') == $cedula->id_cliente) ? "selected" : ""; ?> value="<?php echo $cedula->id_cliente; ?>"><?php echo $cedula->dni; ?> - <?php echo $cedula->nombres; ?> - #<?php echo $cedula->id_cliente; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="id_cliente">Metodo de pago</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_metodopago" id="id_metodopago" required>
                                        <?php foreach ($metodos_pagos as $metodo_pago) { ?>
                                            <option <?php echo ((isset($pago->id_producto) ? $pago->id_producto : '1') == $metodo_pago->id_metodopago) ? "selected" : ""; ?> value="<?php echo $metodo_pago->id_metodopago; ?>"><?php echo $metodo_pago->metodo_pago; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="id_statuspago">Estado</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_statuspago" id="id_statuspago" required>
                                        <?php foreach ($status_pagos as $status_pago) { ?>
                                            <option <?php echo ((isset($pago->id_statuspago) ? $pago->id_statuspago : '1') == $status_pago->id_statuspago) ? "selected" : ""; ?> value="<?php echo $status_pago->id_statuspago; ?>"><?php echo $status_pago->estado; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_cliente">Selccionar Producto</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_producto" id="id_producto" required>
                                        <?php foreach ($productos as $producto) { ?>
                                            <option <?php echo ((isset($pago->id_producto) ? $pago->id_producto : '1') == $producto->id_producto) ? "selected" : ""; ?> value="<?php echo $producto->id_producto; ?>"><?php echo $producto->producto; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($pago) ? "Actualizar" : "Generar pago"); ?>">
                </form>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta soluta doloribus, ullam, ut obcaecati laboriosam eos, officia dolores voluptatum quas impedit placeat cumque animi quos odio quibusdam voluptatibus magnam minima facilis necessitatibus libero! Error velit veritatis veniam ipsa? Reiciendis quas qui neque atque repudiandae quidem incidunt, a consectetur ipsam impedit.</p>
            </div>
        </div>
    </div>
</div>