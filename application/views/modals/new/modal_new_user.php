<!-- Modal -->
<div class="modal fade" id="userModalNew" tabindex="-1" role="dialog" aria-labelledby="userModalNewLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userModalNewLabel">Crear Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open('Usuarios/AddUser','id="form-new-usuario"') ?>
				<div class="modal-body">
					<div class="container">
						<div class="row"> <!--Información para LOGIN-->
						   <div class=" col-3 from-group">
                               <?php echo form_label('Cédula', 'usCedula'); ?>
                               <div class="input-group">
                                    <?php
                                    $data = array(
                                        'name'  => 'usCedula',
                                        'id'    => 'usCedula',
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
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'name'  => 'usNombre',
									'id'    => 'usNombre',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Nombre', 'usNombre');
								echo form_input($data); ?>
						   </div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'name'  => 'usApellido',
									'id'    => 'usApellido',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Apellido', 'usApellido');
								echo form_input($data); ?>
							</div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'type'  => 'password',
									'name'  => 'usPass',
									'id'    => 'usPass',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Contraseña', 'usPass');
								echo form_input($data); ?>
						   </div>
						</div> <!-- FIN Información para LOGIN-->
						<hr>
						<div class="row"> <!-- Información para CALL CENTER-->
							<div class=" col-4 from-group">
								<label for="usPermisos">Call Center</label>
								<select class="custom-select custom-select-sm" name="usCall" id="usCall" required>
									<option value="">Seleccione</option>
									<?php foreach ($callcenters as $callcenter){ ?>
										<option value="<?php echo $callcenter->id_callcenter; ?>"><?php echo $callcenter->nom_call; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class=" col-4 from-group">
								<?php
								$data = array(
									'name'  => 'usAgent',
									'id'    => 'usAgent',
									'class' => 'form-control form-control-sm',
								);
								echo form_label('Número agente', 'usAgent');
								echo form_input($data); ?>
							</div>
							<div class=" col-4 from-group">
								<?php
								$data = array(
									'name'  => 'usMeta',
									'id'    => 'usMeta',
									'class' => 'form-control form-control-sm',
								);
								echo form_label('Meta', 'usMeta');
								echo form_input($data); ?>
							</div>
						</div> <!-- FIN Información para CALL CENTER -->
						<hr>
						<div class="row"> <!-- Información para Contacto -->
							<div class=" col-3 from-group">
								<label for="usPermisos">Tipo de usuario</label>
								<select class="custom-select custom-select-sm" name="usPermisos" id="usPermisos" required>
									<option value="">Seleccione</option>
									<?php foreach ($permisos as $permiso){ ?>
										<option value="<?php echo $permiso->id_permisos; ?>"><?php echo $permiso->perfil; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class=" col-3 from-group">
                                <?php echo form_label('Correo', 'usEmail'); ?>
                                <div class="input-group">
                                    <?php
                                    $data = array(
                                        'type'  => 'email',
                                        'name'  => 'usEmail',
                                        'id'    => 'usEmail',
                                        'class' => 'form-control form-control-sm',
                                        'required' => 'required'
                                    );
                                    echo form_input($data); ?>
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" onclick="ValidateUserDebounce();" href="" style="padding: 0 .4rem 0 .4rem;"><i id="ValidateEmail" class="fa fa-search"></i></button>
                                    </div>
                                </div>
							</div>
							<div class=" col-3 from-group">
								<?php
								$data = array(
									'type'  => 'tel',
									'name'  => 'usTel',
									'id'    => 'usTel',
									'class' => 'form-control form-control-sm',
									'required' => 'required'
								);
								echo form_label('Teléfono', 'usTel');
								echo form_input($data); ?>
							</div>
                            <div class=" col-3 from-group">
                                <label for="">Estado de usuario</label><br>
                                <?php foreach ($estadousers as $estadouser){ ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" <?= ($estadouser->id_statususer == "1") ? "checked":" "; ?> id="usEstadouser<?= $estadouser->id_statususer ?>" name="usEstadouser[]" class="custom-control-input" value="<?= $estadouser->id_statususer?>">
                                        <label class="custom-control-label" for="usEstadouser<?= $estadouser->id_statususer ?>"><?php echo $estadouser->estado; ?></label>
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
										'name'        => 'usAddress',
										'id'          => 'usAddress',
										'rows'        => '4',
										'style'       => 'width:100%',
										'class'       => 'form-control'
									);
									echo form_label('Dirección', 'usAddress');
									echo form_textarea($data); ?>
								</div>
							</div>
							<div class="col-6">
								<div class=" col-12 from-group">
									<label for="">Sexo</label><br>
                                    <?php foreach ($generos as $genero){ ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" <?= ($genero->id_genero == "1") ? "checked":" "; ?> id="usGenero<?= $genero->id_genero ?>" name="usGenero[]" class="custom-control-input" value="<?= $genero->id_genero?>">
                                            <label class="custom-control-label" for="usGenero<?= $genero->id_genero ?>"><?php echo $genero->genero; ?></label>
                                        </div>
                                    <?php }?>
								</div>
								<br>
								<div class=" col-12 from-group">
									<label for="">Estado civil</label><br>
									<?php foreach ($statuscivil as $status){ ?>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" <?= ($status->id_statuscivil == "1") ? "checked":" "; ?> id="usStatuscivil<?= $status->id_statuscivil ?>" name="usStatuscivil[]" class="custom-control-input" value="<?= $status->id_statuscivil?>">
										<label class="custom-control-label" for="usStatuscivil<?= $status->id_statuscivil ?>"><?php echo $status->estado; ?></label>
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
