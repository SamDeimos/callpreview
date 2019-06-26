<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>usuarios/usuario"><i class="fa fa-user-plus"></i> Nueva usuario</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <table id="Tableuser" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
            <tr>
                <th>ID</th>
                <th data-priority="1">Nombres</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Genero</th>
                <th>Estado</th>
                <th data-priority="3">Perfil</th>
                <th></th>
                <th class="text-center" data-priority="2">Acción</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th data-priority="1">Nombres</th>
                <th>Cédula</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Genero</th>
                <th>Estado</th>
                <th>Perfil</th>
                <th></th>
                <th class="text-center data-priority="2"">Acción</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
