<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/campaigns">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 border-right">
                    <input name="id_campaign" id="id_campaign" type="hidden" value="<?php echo isset($campaign) ? $campaign->id_campaign : '' ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre campaña</label>
                        <input class="form-control form-control-sm" name="campaign" id="campaign" type="text" value="<?php echo isset($campaign) ? $campaign->campaign : '' ?>" require>
                    </div>
                    <?php if (!isset($campaign)) : ?>
                        <div class="form-group">
                            <label for="id_user">Selccionar formulario</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm" name="id_form" id="id_form" required>
                                    <?php foreach ($forms as $form) { ?>
                                        <option <?php echo ((isset($campaign->id_form) ? $campaign->id_form : '') == $form->id_form) ? "selected" : ""; ?> value="<?php echo $form->id_form; ?>"><?php echo $form->form; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <?php if (!isset($campaign)) : ?>
                        <div class="form-group">
                            <label for="id_user">Selccionar usuario</label>
                            <div class="input-group">
                                <select class="custom-select custom-select-sm select_single" name="id_user" id="id_user" required>
                                    <option <?php echo (isset($pago->id_cliente) ? '' : 'selected'); ?> value=""></option>
                                    <?php foreach ($vendedores as $vendedor) { ?>
                                        <option <?php echo ((isset($campaign->id_cliente) ? $pago->id_cliente : '') == $vendedor->id_user) ? "selected" : ""; ?> value="<?php echo $vendedor->id_user; ?>"><?php echo $vendedor->nombres; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="id_user">Selccionar guion</label>
                        <div class="input-group">
                            <select class="custom-select custom-select-sm" name="id_script" id="id_script" required>
                                <?php foreach ($scripts as $script) { ?>
                                    <option <?php echo ((isset($campaign->id_script) ? $campaign->id_script : '') == $script->id_script) ? "selected" : ""; ?> value="<?php echo $script->id_script; ?>"><?php echo $script->script; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!isset($campaign)) : ?>
                <div class="row mb-4 mt-2">
                    <div class="col-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_csv" id="file_csv" lang="es" required>
                            <label class="custom-file-label" for="file_csv" data-browse="Buscar archivo">Seleccionar Archivo</label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo isset($campaign) ? 'Editar campaña' : 'Crear campaña' ?>">
        </form>
    </div>
</div>