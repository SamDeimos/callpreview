<!-- Modal -->
<div class="modal fade" id="pagarModal" tabindex="-1" role="dialog" aria-labelledby="pagarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pagarModalLabel">Registre un pago a esta venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('', 'id="form-pagar"') ?>
            <div class="modal-body">
                <p></p><!-- instrucciones -->
                <div class="row">
                    <div class="col-4">
                        <input name="id_venta" id="id_venta" type="hidden" value="">
                        <div class=" form-group">
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
                    <div class="col-4">
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
                    <div class="col-4">
                        <div class="form-group">
                            <label for="id_statuspago">Valor a pagar</label>
                            <input class="form-control form-control-sm" name="importe" id="importe" type="text" value="" type="number" step="any">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Crear pago" class="btn btn-primary" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>