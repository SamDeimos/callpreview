<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/scripts">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-6 border-right">
                <input id="id_script" type="hidden" value="<?php echo isset($script) ? $script->id_script : '' ?>">
                <div class="form-group">
                    <label for="nombre">Nombre guion</label>
                    <input class="form-control form-control-sm" id="script" type="text" value="<?php echo isset($script) ? $script->script : '' ?>" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <input class="form-control form-control-sm" id="desc_script" type="text" value="<?php echo isset($script) ? $script->descripcion : '' ?>" required>
                </div>
            </div>
        </div>
        <label for="contenido_script">Contenido de guion</label>
        <textarea class="edit_text"><?php echo isset($script) ? $script->contenido_script : '' ?></textarea>
        <button id="save-script" class="btn btn-primary mt-2 float-right">Guardar script</button>
    </div>
</div>