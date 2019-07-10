<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>usuarios">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_usuario" id="id_usuario" type="hidden" value="<?php echo set_value("id_usuario", (isset($usuario->id_user) ? $usuario->id_user : "")); ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" value="<?php echo set_value("nombre", (isset($usuario->nombres) ? $usuario->nombres : "")); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Contraseña</label>
                        <input class="form-control form-control-sm" name="pass" id="pass" type="password" value="<?php echo set_value("pass", (isset($usuario->pass) ? $usuario->pass : "")); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input class="form-control form-control-sm" name="email" id="email" type="text" value="<?php echo set_value("email", (isset($usuario->email) ? $usuario->email : "")); ?>" required>
                    </div>
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Estado civil</label>
                                <select class="custom-select custom-select-sm" name="estadocivil" id="estadocivil" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($estadosciviles as $estadocivil) { ?>
                                        <option <?php echo ((isset($usuario->id_statuscivil) ? $usuario->id_statuscivil : "") == $estadocivil->id_statuscivil) ? "selected" : ""; ?> value="<?php echo $estadocivil->id_statuscivil; ?>"><?php echo $estadocivil->estado; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Formación academica</label>
                                <select class="custom-select custom-select-sm" name="lvlformacion" id="lvlformacion" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($lvlformaciones as $lvlformacion) { ?>
                                        <option <?php echo ((isset($usuario->id_lvlformacion) ? $usuario->id_lvlformacion : "") == $lvlformacion->id_lvlformacion) ? "selected" : ""; ?> value="<?php echo $lvlformacion->id_lvlformacion; ?>"><?php echo $lvlformacion->formacion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Permisos del sistema</label>
                                <select class="custom-select custom-select-sm" name="permiso" id="permiso" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($permisos as $permiso) { ?>
                                        <option <?php echo ((isset($usuario->id_permiso) ? $usuario->id_permiso : "") == $permiso->id_permiso) ? "selected" : ""; ?> value="<?php echo $permiso->id_permiso; ?>"><?php echo $permiso->perfil; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Género</label><br>
                                <?php foreach ($generos as $genero) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?php echo ((isset($usuario->id_genero) ? $usuario->id_genero : "1") == $genero->id_genero) ? "checked" : ""; ?> id="genero<?php echo $genero->id_genero; ?>" name="genero[]" class="custom-control-input" value="<?php echo $genero->id_genero; ?>">
                                        <label class="custom-control-label" for="genero<?php echo $genero->id_genero; ?>"><?php echo $genero->genero; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="">Estado del usuario</label><br>
                                <?php foreach ($estadousers as $estadouser) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?php echo ((isset($usuario->id_statususer) ? $usuario->id_statususer : "1") == $estadouser->id_statususer) ? "checked" : ""; ?> id="estadosistem<?php echo $estadouser->id_statususer; ?>" name="estadosistem[]" class="custom-control-input" value="<?php echo $estadouser->id_statususer; ?>">
                                        <label class="custom-control-label" for="estadosistem<?php echo $estadouser->id_statususer; ?>"><?php echo $estadouser->estado; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input class="form-control form-control-sm" name="cedula" id="cedula" type="text" value="<?php echo set_value("cedula", (isset($usuario->dni) ? $usuario->dni : "")); ?>">
                    </div>
                    <div class="row form-group">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <label for="tel">Teléfono</label>
                            <input class="form-control form-control-sm" name="tel" id="tel" type="text" value="<?php echo set_value("tel", (isset($usuario->tel) ? $usuario->tel : "")); ?>">
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <label for="fec_nac">Fecha de nacimineto</label>
                            <input class="form-control form-control-sm fec_datepicker" name="fec_nac" id="fec_nac" type="text" value="<?php echo set_value("fec_nac", (isset($usuario->fec_nac) ? $usuario->fec_nac : "")); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control form-control-sm" name="address" id="address" rows="3"><?php echo set_value("address", (isset($usuario->address) ? $usuario->address : "")); ?></textarea>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($usuario) ? "Actualizar" : "Crear"); ?>">
        </form>
    </div>
</div>