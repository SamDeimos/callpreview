<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-secondary btn-xs" href="clientes/cliente"><i class="fa fa-user-plus"></i> Nueva cliente</a>
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>tienda/ventas">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_venta" id="id_venta" type="hidden" value="<?php echo set_value("id_venta", isset($venta->id_venta) ? $venta->id_venta : ""); ?>">
                    <div class="form-group">
                    <label for="id_cliente">Selccionar Cliente</label>
                        <div class="input-group">
					        <select class="custom-select custom-select-sm select_single" name="id_cliente" id="id_cliente" required>
                                <option <?php echo (isset($venta->id_cliente) ? '' : 'selected'); ?> value=""></option>
                                <?php foreach ($cedulas as $cedula){ ?>
                                <option <?php echo ((isset($venta->id_cliente) ? $venta->id_cliente : '') == $cedula->id_cliente) ? "selected" : ""; ?> value="<?php echo $cedula->id_cliente; ?>"><?php echo $cedula->dni; ?> - <?php echo $cedula->nombres; ?> - #<?php echo $cedula->id_cliente; ?></option>
                                <?php } ?>
                            </select>                
                        </div>
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_statustask">Producto</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_producto" id="id_producto" required>
                                        <?php foreach ($productos as $producto){ ?>
                                        <option <?php echo ((isset($venta->id_producto) ? $venta->id_producto : '1') == $producto->id_producto) ? "selected" : ""; ?> value="<?php echo $producto->id_producto; ?>"><?php echo $producto->producto; ?></option>
                                        <?php } ?>
                                    </select>                
                                </div>
                            </div>
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_statustask">Estado</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_statusventa" id="id_statusventa" required>
                                        <?php foreach ($status_ventas as $status_venta){ ?>
                                        <option <?php echo ((isset($venta->id_statusventa) ? $venta->id_statusventa : '1') == $status_venta->id_statusventa) ? "selected" : ""; ?> value="<?php echo $status_venta->id_statusventa; ?>"><?php echo $status_venta->estado; ?></option>
                                        <?php } ?>
                                    </select>                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($tarea) ? "Actualizar" : "Guardar"); ?>">
        </form>
    </div>
</div>