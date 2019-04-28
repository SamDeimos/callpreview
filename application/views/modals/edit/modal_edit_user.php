<!-- Modal -->
<div class="modal fade" id="userModalEdit" tabindex="-1" role="dialog" aria-labelledby="userModalEditLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userModalEditLabel">Actualizar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open('Usuarios/EditUser','id="form-edit-usuario"') ?>
				<div class="modal-body">
					<div class="container">
						<div class="row"> <!--Información para LOGIN-->
						   <div class=" col-3 from-group">
                               <?php echo form_label('Cédula', 'usCedulaedit'); ?>
                               <div class="input-group">
                                    <?php
                                    $data = array(
                                        'name'  => 'usCedulaedit',
                                        'id'    => 'usCedulaedit',
                                        'class' => 'form-control form-control-sm',
                                        'required' => 'required',
                                        'aria-describedby' => 'inputGroupPrepend'
                                    );
                                    echo form_input($data); ?>
<!--                                   <div class="input-group-prepend">-->
<!--                                       <button class="input-group-text" id="ValidateUser" onclick="ValidateUserSRI();" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateDni" class="fa fa-search"></i></button>-->
<!--                                   </div>-->
                               </div>
						   </div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'name'  => 'usNombreedit',
									'id'    => 'usNombreedit',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Nombre', 'usNombreedit');
								echo form_input($data); ?>
						   </div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'name'  => 'usApellidoedit',
									'id'    => 'usApellidoedit',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Apellido', 'usApellidoedit');
								echo form_input($data); ?>
							</div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'type'  => 'password',
									'name'  => 'usPassedit',
									'id'    => 'usPassedit',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Contraseña', 'usPassedit');
								echo form_input($data); ?>
						   </div>
						</div> <!-- FIN Información para LOGIN-->
						<hr>
						<div class="row"> <!-- Información para CALL CENTER-->
							<div class=" col-4 from-group">
								<label for="usCalledit">Call Center</label>
								<select class="custom-select custom-select-sm" name="usCalledit" id="usCalledit" required>
									<option value="">Seleccione</option>
									<?php foreach ($callcenters as $callcenter){ ?>
										<option value="<?php echo $callcenter->id_callcenter; ?>"><?php echo $callcenter->nom_call; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class=" col-4 from-group">
								<?php
								$data = array(
									'name'  => 'usAgentedit',
									'id'    => 'usAgentedit',
									'class' => 'form-control form-control-sm',
								);
								echo form_label('Número agente', 'usAgentedit');
								echo form_input($data); ?>
							</div>
							<div class=" col-4 from-group">
								<?php
								$data = array(
									'name'  => 'usMetaedit',
									'id'    => 'usMetaedit',
									'class' => 'form-control form-control-sm',
								);
								echo form_label('Meta', 'usMetaedit');
								echo form_input($data); ?>
							</div>
						</div> <!-- FIN Información para CALL CENTER -->
						<hr>
						<div class="row"> <!-- Información para Contacto -->
							<div class=" col-3 from-group">
								<label for="usPermisosedit">Tipo de usuario</label>
								<select class="custom-select custom-select-sm" name="usPermisosedit" id="usPermisosedit" required>
									<option value="">Seleccione</option>
									<?php foreach ($permisos as $permiso){ ?>
										<option value="<?php echo $permiso->id_permisos; ?>"><?php echo $permiso->perfil; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class=" col-3 from-group">
                                <?php echo form_label('Correo', 'usEmailedit'); ?>
                                <div class="input-group">
                                    <?php
                                    $data = array(
                                        'type'  => 'email',
                                        'name'  => 'usEmailedit',
                                        'id'    => 'usEmailedit',
                                        'class' => 'form-control form-control-sm',
                                        'required' => 'required'
                                    );
                                    echo form_input($data); ?>
<!--                                    <div class="input-group-prepend">-->
<!--                                        <button class="input-group-text" onclick="ValidateUserDebounce();" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateEmail" class="fa fa-search"></i></button>-->
<!--                                    </div>-->
                                </div>
							</div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'type'  => 'tel',
									'name'  => 'usTeledit',
									'id'    => 'usTeledit',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Teléfono', 'usTeledit');
								echo form_input($data); ?>
							</div>
                            <div class=" col-3 from-group">
                                <label for="">Estado de usuario</label><br>
                                <?php foreach ($estadousers as $estadouser){ ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?= ($estadouser->id_statususer == "1") ? "checked":" "; ?> id="usEstadouseredit<?= $estadouser->id_statususer ?>" name="usEstadouseredit[]" class="custom-control-input" value="<?= $estadouser->id_statususer?>">
                                        <label class="custom-control-label" for="usEstadouseredit<?= $estadouser->id_statususer ?>"><?php echo $estadouser->estado; ?></label>
                                    </div>
                                <?php }?>
                            </div>
						</div> <!-- FIN Información para Contacto -->
						<hr>
						<div class="row"> <!-- Información para Extra -->
							<div class="col-6">
								<div class=" col-12 from-group">
									<?php
									$data = array(
										'name'        => 'usAddressedit',
										'id'          => 'usAddressedit',
										'rows'        => '4',
										'style'       => 'width:100%',
										'class'       => 'form-control'
									);
									echo form_label('Dirección', 'usAddressedit');
									echo form_textarea($data); ?>
								</div>
							</div>
							<div class="col-6">
								<div class=" col-12 from-group">
									<label for="">Genero</label><br>
                                    <?php foreach ($generos as $genero){ ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" <?= ($genero->id_genero == "1") ? "checked":" "; ?> id="usGeneroedit<?= $genero->id_genero ?>" name="usGeneroedit[]" class="custom-control-input" value="<?= $genero->id_genero?>">
                                            <label class="custom-control-label" for="usGeneroedit<?= $genero->id_genero ?>"><?php echo $genero->genero; ?></label>
                                        </div>
                                    <?php }?>
								</div>
								<br>
								<div class=" col-12 from-group">
									<label for="">Estado civil</label><br>
									<?php foreach ($statuscivil as $status){ ?>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" <?= ($status->id_statuscivil == "1") ? "checked":" "; ?> id="usStatusciviledit<?= $status->id_statuscivil ?>" name="usStatusciviledit[]" class="custom-control-input" value="<?= $status->id_statuscivil?>">
										<label class="custom-control-label" for="usStatusciviledit<?= $status->id_statuscivil ?>"><?php echo $status->estado; ?></label>
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
