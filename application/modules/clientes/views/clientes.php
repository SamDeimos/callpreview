<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="clientes/cliente"><i class="fa fa-user-plus"></i> Nueva cliente</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <table id="Tablecliente" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
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
                    <th class="text-center" data-priority="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente){ ?>
                    <tr>
                        <td><?php echo $cliente->id_cliente; ?></td>
                        <td><a href="<?php echo base_url()."clientes/cliente/".$cliente->id_cliente; ?>"><?php echo $cliente->nombres; ?></a></td>
                        <td><?php echo $cliente->dni; ?></td>
                        <td><?php echo $cliente->email; ?></td>
                        <td><?php echo $cliente->tel; ?></td>
                        <td><?php echo $cliente->address; ?></td>
                        <td><?php echo $cliente->genero; ?></td>
                        <td><?php echo $cliente->estado; ?></td>
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
                    <th class="text-center data-priority="2"">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
