<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="usuarios/usuario"><i class="fa fa-user-plus"></i> Nueva tarea</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <table id="Tableuser" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
            <tr>
                <th>ID</th>
                <th data-priority="1">Cliente</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th class="text-center" data-priority="2">Acción</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($tareas as $tarea){ ?>
                <tr>
                    <td><a href="#">#<?php echo $tarea->id_task; ?></a></td>
                    <td><a target="_blank" href="<?php echo base_url()."clientes/cliente/".$tarea->id_cliente; ?>"><?php echo $tarea->nombres; ?></a></td>
                    <td><?php echo $tarea->estado; ?></td>
                    <td><?php echo $tarea->fecha_create; ?></td>
                    <td></td>
                </tr>
                <?php }?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th data-priority="1">Cliente</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th class="text-center" data-priority="2">Acción</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>