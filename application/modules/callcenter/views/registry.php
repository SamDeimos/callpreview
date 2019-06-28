<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/calls">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <table id="Tableregistry" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
                <tr>
                    <th>ID</th>
                    <th data-priority="4">campaña</th>
                    <th data-priority="1">Nombres cliente</th>
                    <th data-priority="2">Llamado</th>
                    <th data-priority="2">Fecha llamada</th>
                    <th data-priority="2">Duración</th>
                    <th data-priority="2">Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrys as $reg) : ?>
                    <tr>
                        <td><?php echo $reg->id_call_registry ?></td>
                        <td><?php echo $reg->campaign ?></td>
                        <td><?php echo $reg->nombres ?></td>
                        <td><?php echo $reg->dst ?></td>
                        <td><?php echo ($reg->cdr_calldate == '') ? $reg->reg_calldate : $reg->cdr_calldate ?></td>
                        <td><?php echo seg_to_hours($reg->billsec) ?></td>
                        <td><?php echo ($reg->disposition != '') ? $reg->disposition : 'NO ANSWERED'  ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th data-priority="4">Campaña</th>
                    <th data-priority="1">Nombres cliente</th>
                    <th data-priority="2">Llamado</th>
                    <th data-priority="2">Fecha llamada</th>
                    <th data-priority="2">Duración</th>
                    <th data-priority="2">Resultado</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>