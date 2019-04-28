<!-- Modal -->
<div class="modal fade" id="clientModalEdit" tabindex="-1" role="dialog" aria-labelledby="clientModalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalEditLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Clientes/EditClient','id="form-edit-cliente"') ?>
            <div class="modal-body">
                <div class="container">
                    <div class="row"> <!--Información para LOGIN-->
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'name'  => 'clIdedit',
                            'id'    => 'clIdedit',
                            'aria-describedby' => 'inputGroupPrepend'
                        );
                                echo form_input($data); ?>
                        <div class=" col-4 from-group">
                            <?php echo form_label('Cédula', 'clCedulaedit'); ?>
                            <div class="input-group">
                                <?php
                                $data = array(
                                    'name'  => 'clCedulaedit',
                                    'id'    => 'clCedulaedit',
                                    'class' => 'form-control form-control-sm',
                                    'required' => 'required',
                                    'aria-describedby' => 'inputGroupPrepend'
                                );
                                echo form_input($data); ?>
                                <div class="input-group-prepend">
                                    <button class="input-group-text" id="ValidateUser" onclick="ValidateUserSRI();" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateDni" class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class=" col-4 from-group">
                            <?php
                            $data = array(
                                'name'  => 'clNombresedit',
                                'id'    => 'clNombresedit',
                                'class' => 'form-control form-control-sm',
                                'required' => 'required'
                            );
                            echo form_label('Nombres', 'clNombresedit');
                            echo form_input($data); ?>
                        </div>
                        <div class=" col-4 from-group">
                            <?php echo form_label('Correo', 'clEmailedit'); ?>
                            <div class="input-group">
                                <?php
                                $data = array(
                                    'type'  => 'email',
                                    'name'  => 'clEmailedit',
                                    'id'    => 'clEmailedit',
                                    'class' => 'form-control form-control-sm',
                                );
                                echo form_input($data); ?>
                                <div class="input-group-prepend">
                                    <button class="input-group-text" onclick="ValidateUserDebounce();" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateEmail" class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- FIN Información para LOGIN-->
                    <hr>
                    <div class="row"> <!-- Información para Contacto -->
                        <div class=" col-4 from-group">
                            <?php
                            $data = array(
                                'type'  => 'tel',
                                'name'  => 'clTeledit',
                                'id'    => 'clTeledit',
                                'class' => 'form-control form-control-sm',
                            );
                            echo form_label('Teléfono', 'clTeledit');
                            echo form_input($data); ?>
                        </div>
                        <div class=" col-4 from-group">
                            <div id="sandbox-container">
                                <?php
                                $data = array(
                                    'type'  => 'text',
                                    'name'  => 'clFecNacedit',
                                    'id'    => 'clFecNacedit',
                                    'class' => 'form-control form-control-sm',
                                );
                                echo form_label('Fecha de nacimiento', 'clFecNacedit');
                                echo form_input($data); ?>
                            </div>
                        </div>
                        <div class=" col-4 from-group">
                            <label for="clLvlformedit">Nivel de formación</label>
                            <select class="custom-select custom-select-sm" name="clLvlformedit" id="clLvlformedit" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($lvlsformacion as $lvlformacion){ ?>
                                    <option value="<?php echo $lvlformacion->id_lvlformacion; ?>"><?php echo $lvlformacion->formacion; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> <!-- FIN Información para Contacto -->
                    <hr>
                    <div class="row"> <!-- Información para Extra -->
                        <div class="col-6">
                            <div class=" col-12 from-group">
                                <?php
                                $data = array(
                                    'name'        => 'clAddressedit',
                                    'id'          => 'clAddressedit',
                                    'rows'        => '4',
                                    'style'       => 'width:100%',
                                    'class'       => 'form-control'
                                );
                                echo form_label('Dirección', 'clAddressedit');
                                echo form_textarea($data); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class=" col-12 from-group">
                                <label for="">Genero</label><br>
                                <?php foreach ($generos as $genero){ ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?= ($genero->id_genero == "1") ? "checked":" "; ?> id="clGeneroedit<?= $genero->id_genero ?>" name="clGeneroedit[]" class="custom-control-input" value="<?= $genero->id_genero?>">
                                        <label class="custom-control-label" for="clGeneroedit<?= $genero->id_genero ?>"><?php echo $genero->genero; ?></label>
                                    </div>
                                <?php }?>
                            </div>
                            <br>
                            <div class=" col-12 from-group">
                                <label for="">Estado civil</label><br>
                                <?php foreach ($statusvivil as $status){ ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?= ($status->id_statuscivil == "1") ? "checked":" "; ?> id="clStatusciviledit<?= $status->id_statuscivil ?>" name="clStatusciviledit[]" class="custom-control-input" value="<?= $status->id_statuscivil?>">
                                        <label class="custom-control-label" for="clStatusciviledit<?= $status->id_statuscivil ?>"><?php echo $status->estado; ?></label>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div> <!-- FIN Información para Extra -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Guardar" class="btn btn-primary"/>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
