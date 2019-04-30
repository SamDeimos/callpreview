<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="usuarios/usuario"><i class="fa fa-user-plus"></i> Nueva usuario</a>
    </div>
</div>
<br>
<div class="card">
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
                <th class="text-center" data-priority="2">Acción</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $user){ ?>
                <tr>
                    <td><?php echo $user->id_user; ?></td>
                    <td><?php echo $user->nombres; ?></td>
                    <td><?php echo $user->dni; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->tel; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td><?php echo $user->genero; ?></td>
                    <td><?php echo $user->estado; ?></td>
                    <td><?php echo $user->perfil; ?></td>
                    <td></td>
                </tr>
                <?php }?>
            </tbody>
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
                <th class="text-center data-priority="2"">Acción</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
