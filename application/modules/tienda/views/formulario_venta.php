<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-secondary btn-xs" href="<?php echo base_url(); ?>clientes/cliente"><i class="fa fa-user-plus"></i> Nueva cliente</a>
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>tienda/ventas">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form id="form-add-venta" action="" method="POST">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_venta" id="id_venta" type="hidden" value="<?php echo (isset($venta->id_venta) ? $venta->id_venta : ""); ?>">
                    <div class="form-group">
                        <label for="id_cliente">Selccionar Cliente</label>
                        <div class="input-group">
                            <select class="custom-select custom-select-sm select_single" name="id_cliente" id="id_cliente" required <?php echo (isset($venta->id_cliente) ? 'disabled' : ''); ?>>
                                <option <?php echo (isset($venta->id_cliente) ? '' : 'selected'); ?> value=""></option>
                                <?php foreach ($cedulas as $cedula) { ?>
                                    <option <?php echo ((isset($venta->id_cliente) ? $venta->id_cliente : '') == $cedula->id_cliente) ? "selected" : ""; ?> value="<?php echo $cedula->id_cliente; ?>"><?php echo $cedula->dni; ?> - <?php echo $cedula->nombres; ?> - #<?php echo $cedula->id_cliente; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_statuspago">Estado</label>
                        <div class="input-group">
                            <?php
                            if (isset($venta->id_statusventa)) {
                                $status_venta = $venta->id_statusventa;
                            } else {
                                $status_venta = NULL;
                            }
                            echo mostrar_listado_status_ventas($this->session->userdata('idpermiso'), $status_venta);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="id_statustask">Producto</label>
                        <div class="input-group">
                            <select class="custom-select custom-select-sm" name="id_producto" id="id_producto" <?php echo isset($venta->id_venta) ? 'disabled' : '' ?>>
                                <option value="" selected>Seleccoine</option>
                                <?php foreach ($productos as $producto) { ?>
                                    <option <?php echo ((isset($venta->id_producto) ? $venta->id_producto : '0') == $producto->id_producto) ? "selected" : ""; ?> value="<?php echo $producto->id_producto . "*" . $producto->producto . "*" . $producto->valor; ?>"><?php echo $producto->producto; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button id="btn-agregar" type="button" class="btn btn-primary btn-block btn-xs"><span class="fa fa-plus"></span> Agregar</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tbventas" class="table table-bordered table-striped table-hover">
                    <thead class="text-uppercase bg-primary">
                        <tr class="text-white">
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total $</th>
                            <?php if (!isset($detalles) or $detalles == NULL) : ?>
                                <th></th>
                            <?php endif ?>
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
                </table>
            </div>

            <div class="row justify-content-end">
                <div class="col-3">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Saldo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Saldo pendiente</div>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="saldo_venta" id="saldo_venta" value="<?php echo (isset($venta->total) ? number_format($venta->total - $venta->importe, '2') : "0.00"); ?>" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Total</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Total</div>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="total_venta" id="total_venta" value="<?php echo (isset($venta->total) ? $venta->total : "0.00"); ?>" readonly>
                    </div>
                </div>
            </div>
            <br>
            <?php if (isset($venta->id_venta) && $venta->total != $venta->importe) : ?>
                <a href="#" data-toggle="modal" data-target="#pagarModal" data-idventa="<?php echo $venta->id_venta ?>"><button class="btn btn-secondary">Pagar</button></a>
            <?php endif ?>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($venta) ? "Actualizar" : "Guardar"); ?>">
        </form>
    </div>
</div>
<br>
<?php if (isset($pagos) && $pagos != NULL) : ?>
    <div class="card">
        <div class="card-body">
            <table id="Table_detalle_pago" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
                <thead class="bg-light text-capitalize">
                    <tr>
                        <th>ID</th>
                        <th data-priority="1">Metodo de pago</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pagos as $pago) : ?>
                        <tr>
                            <td>#<?php echo $pago->id_pago ?></td>
                            <td><?php echo $pago->metodo_pago ?></td>
                            <td>
                                <?php if ($pago->estado == 'pendiente') : ?>
                                    <button href="" type="button" class="btn btn-outline-warning btn-xxs" disabled><?php echo $pago->estado ?></button>
                                <?php elseif ($pago->estado == 'aprobado') : ?>
                                    <button href="" type="button" class="btn btn-outline-success btn-xxs" disabled><?php echo $pago->estado ?></button>
                                <?php else : ?>
                                    <button href="" type="button" class="btn btn-outline-danger btn-xxs" disabled><?php echo $pago->estado ?></button>
                                <?php endif ?>
                            </td>
                            <td><?php echo $pago->importe ?></td>
                            <td class="text-center">
                                <?php if (isset($pago->data_pago) && $pago->data_pago != NULL) : ?>
                                    <?php
                                    $data_pago = json_decode($pago->data_pago);
                                    ?>

                                    <a title="Pagar" target="_blank" href="<?php echo $data_pago->shorturl ?>"><i class="far fa-share-square"></i></a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th data-priority="1">Metodo de pago</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endif ?>