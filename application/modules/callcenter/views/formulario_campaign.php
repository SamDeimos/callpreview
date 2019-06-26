<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/campaigns">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <form action="AddCampaign" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 border-right">
                    <div class="form-group">
                        <label for="nombre">Nombre campaña</label>
                        <input class="form-control form-control-sm" name="campaign" id="campaign" type="text" value="" require>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_user">Selccionar usuario</label>
                        <div class="input-group">
                            <select class="custom-select custom-select-sm select_single" name="id_user" id="id_user" required>
                                <option <?php echo (isset($pago->id_cliente) ? '' : 'selected'); ?> value=""></option>
                                <?php foreach ($vendedores as $vendedor) { ?>
                                    <option <?php echo ((isset($pago->id_cliente) ? $pago->id_cliente : '') == $vendedor->id_user) ? "selected" : ""; ?> value="<?php echo $vendedor->id_user; ?>"><?php echo $vendedor->nombres; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file_csv" id="file_csv" lang="es">
                        <label class="custom-file-label" for="file_csv" data-browse="Buscar archivo">Seleccionar Archivo</label>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="Crear">
        </form>
    </div>
</div>