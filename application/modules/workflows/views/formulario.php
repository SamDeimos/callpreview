<br>
<div class="card">
    <div class="card-acction">
        <?php
        if(isset($cliente)){ ?>
        <a class="btn btn-primary btn-xs" href="clientes/cliente"><i class="fa fa-user-plus"></i> Nueva cliente</a>
        <?php } ?>
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>workflows">volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-6 border-right">
                    <input class="form-control" name="id_task" id="id_task" type="hidden" value="<?php echo set_value("id_task", isset($tarea->id_task) ? $tarea->id_task : ""); ?>">
                    <div class="form-group">
                    <label for="id_cliente">Selccionar Cliente</label>
                        <div class="input-group">
					        <select class="custom-select custom-select-sm select_single" name="id_cliente" id="id_cliente" required>
                                <option <?php echo (isset($tarea->dni) ? '' : ''); ?> value=""></option>
                                <?php foreach ($cedulas as $cedula){ ?>
                                <option <?php echo ((isset($tarea->dni) ? $tarea->dni : '') == $cedula->dni) ? "selected" : ""; ?> value="<?php echo $cedula->id_cliente; ?>"><?php echo $cedula->dni; ?> - <?php echo $cedula->nombres; ?> - #<?php echo $cedula->id_cliente; ?></option>
                                <?php } ?>
                            </select>                
                        </div>
                    </div>
                </div>
                <!-- Columna derecha -->
                <div class="col-6">
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_statustask">Estado</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_statustask" id="id_statustask" required>
                                        <?php foreach ($status_tasks as $status_task){ ?>
                                        <option <?php echo ((isset($tarea->id_statustask) ? $tarea->id_statustask : '1') == $status_task->id_statustask) ? "selected" : ""; ?> value="<?php echo $status_task->id_statustask; ?>"><?php echo $status_task->estado; ?></option>
                                        <?php } ?>
                                    </select>                
                                </div>
                            </div>
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_statustask">Tipo</label>
                                <div class="input-group">
                                    <select class="custom-select custom-select-sm" name="id_typetask" id="id_typetask" required>
                                        <?php foreach ($type_tasks as $type_task){ ?>
                                        <option <?php echo ((isset($tarea->id_typetask) ? $tarea->id_typetask : '1') == $type_task->id_typetask) ? "selected" : ""; ?> value="<?php echo $type_task->id_typetask; ?>"><?php echo $type_task->type; ?></option>
                                        <?php } ?>
                                    </select>                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo (isset($tarea) ? "Actualizar" : "Guardar"); ?>">
        </form>
    </div>
</div>