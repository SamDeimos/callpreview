<br>
<div class="card">
    <div class="card-acction">
        <?php
        if (isset($cliente)) { ?>
            <a class="btn btn-primary btn-xs" href="clientes/cliente" target="_blank"><i class="fa fa-user-plus"></i> Nueva cliente</a>
        <?php } ?>
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>clientes">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_cliente" id="id_cliente" type="hidden" value="<?php echo set_value("id_cliente", isset($cliente->id_cliente) ? $cliente->id_cliente : ""); ?>">
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <div class="input-group">
                            <input class="form-control form-control-sm" name="cedula" id="cedula" type="text" aria-label="1777777777" aria-describedby="validar_cedula" value="<?php echo set_value("cedula", isset($cliente->dni) ? $cliente->dni : ""); ?>" <?php echo (isset($cliente)) ? 'readonly' : '' ?> required>
                            <div class="input-group-append">
                                <button class="input-group-text" id="ValidateUser" onclick="ValidateUserSRI(event);" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateDni" class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input class="form-control form-control-sm" name="email" id="email" type="text" required value="<?php echo set_value("email", (isset($cliente->email) ? $cliente->email : "")); ?>">
                    </div>
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Género</label><br>
                                <?php foreach ($generos as $genero) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?php echo ((isset($cliente->id_genero) ? $cliente->id_genero : "1") == $genero->id_genero) ? "checked" : ""; ?> id="genero<?php echo $genero->id_genero; ?>" name="genero[]" class="custom-control-input" value="<?php echo $genero->id_genero; ?>">
                                        <label class="custom-control-label" for="genero<?php echo $genero->id_genero; ?>"><?php echo $genero->genero; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="">Formación academica</label>
                                <select class="custom-select custom-select-sm" name="lvlformacion" id="lvlformacion" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($lvlformaciones as $lvlformacion) { ?>
                                        <option <?php echo ((isset($cliente->id_lvlformacion) ? $cliente->id_lvlformacion : "") == $lvlformacion->id_lvlformacion) ? "selected" : ""; ?> value="<?php echo $lvlformacion->id_lvlformacion; ?>"><?php echo $lvlformacion->formacion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <label for="">Estado civil</label>
                            <select class="custom-select custom-select-sm" name="estadocivil" id="estadocivil" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($estadosciviles as $estadocivil) { ?>
                                    <option <?php echo ((isset($cliente->id_statuscivil) ? $cliente->id_statuscivil : "") == $estadocivil->id_statuscivil) ? "selected" : ""; ?> value="<?php echo $estadocivil->id_statuscivil; ?>"><?php echo $estadocivil->estado; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input class="form-control form-control-sm" name="nombres" id="nombres" type="text" required value="<?php echo set_value("nombres", (isset($cliente->nombres) ? $cliente->nombres : "")); ?>">
                    </div>
                    <div class="row form-group">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <label for="tel">Teléfono</label>
                            <input class="form-control form-control-sm" name="tel" id="tel" type="text" required value="<?php echo set_value("tel", (isset($cliente->tel) ? $cliente->tel : "")); ?>">
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <label for="cel">Celular</label>
                            <input class="form-control form-control-sm" name="cel" id="cel" type="text" required value="<?php echo set_value("cel", (isset($cliente->cel) ? $cliente->cel : "")); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fec_nac">Fecha de nacimiento</label>
                        <input class="form-control form-control-sm" name="fec_nac" id="fec_nac" type="text" required value="<?php echo set_value("fec_nac", (isset($cliente->fec_nac) ? $cliente->fec_nac : "")); ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control form-control-sm" name="address" id="address" rows="3"><?php echo set_value("address", (isset($cliente->address) ? $cliente->address : "")); ?></textarea>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($cliente) ? "Actualizar" : "Crear"); ?>">
        </form>
    </div>
</div>