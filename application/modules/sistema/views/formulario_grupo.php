<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>sistema/usuarios/grupos">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_grupo" id="id_grupo" type="hidden" value="<?php echo set_value("id_grupo", (isset($grupo->id_grupo) ? $grupo->id_grupo : "")); ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre de grupo</label>
                        <input class="form-control form-control-sm" name="nombre_g" id="nombre_g" type="text" value="<?php echo set_value("nombre_g", (isset($grupo->grupo) ? $grupo->grupo : "")); ?>">
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_cliente">Propietario de Grupo</label>
                        <div class="input-group">
                            <select class="custom-select custom-select-sm select_single" name="own_g" id="own_g" required <?php echo (isset($venta->id_cliente) ? 'disabled' : ''); ?>>
                                <option <?php echo (isset($grupo->id_grupo) ? '' : 'selected'); ?> value=""></option>
                                <?php foreach ($directores as $director) { ?>
                                    <option <?php echo ((isset($grupo->id_user) ? $grupo->id_user : '') == $director->id_user) ? "selected" : ""; ?> value="<?php echo $director->id_user; ?>"><?php echo $director->id_user; ?> - <?php echo $director->nombres; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <h4 class="mb-2">integrantes del grupo</h4>
                    <?php foreach ($vendedores as $vendedor) :
                        $check = '';
                        if (isset($grupo->belong_user_grupo)) {
                            $belong_grupo = json_decode($grupo->belong_user_grupo);
                            if (in_array($vendedor->id_user, $belong_grupo)) {
                                $check = 'checked';
                            }
                        } ?>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" <?php echo $check ?> class="custom-control-input" name="vendedor[]" value="<?= $vendedor->id_user ?>" id="vendedor<?= $vendedor->id_user ?>">
                            <label class="custom-control-label" for="vendedor<?= $vendedor->id_user ?>"><?= $vendedor->nombres ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($grupos) ? "Actualizar" : "Crear"); ?>">
        </form>
    </div>
</div>