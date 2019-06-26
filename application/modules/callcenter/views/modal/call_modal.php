<!-- Modal infomacion call -->
<div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="callModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="callModalLabel">Gestionar llamada</h5>
            </div>
            <?php echo form_open('', 'id="form-calificar"') ?>
            <div class="modal-body">
                <div id="caja_data_attribute" class="row col-12 mb-4">
                </div>

                <div class="row border-top">
                    <div class="col-6 mt-4">
                        <input type="hidden" name="id_registry" id="id_registry">
                        <div class="input-group">
                            <select class="custom-select custom-select-sm" name="id_call_status" id="id_call_status" required>
                                <?php foreach ($calls_status as $call_status) { ?>
                                    <option value="<?php echo $call_status->id_call_status; ?>"><?php echo $call_status->estado; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Guardar" class="btn btn-primary" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Fin Modal infomacion call -->

<!-- Modal selecionar extension -->
<div class="modal fade" id="extModal" tabindex="-1" role="dialog" aria-labelledby="extModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="extModalLabel">Debe selecione una extensión para realizar llamadas</h6>
            </div>
            <?php echo form_open('', 'id="form-ext"') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input class="form-control form-control-sm" name="ext" id="ext" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Seleccionar" class="btn btn-primary" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Fin Modal selecionar extension -->