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
                    <th>campaña</th>
                    <th>Nombres cliente</th>
                    <th>Llamado</th>
                    <th>Fecha llamada</th>
                    <th>Duración</th>
                    <th>Resultado</th>
                    <th>Formulario</th>
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
                        <td>
                            <?php foreach (json_decode($reg->data) as $key => $value) {
                                echo '<div class="col-4"><strong>' . $key . ' :</strong>' . $value . '</div>';
                            } ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>campaña</th>
                    <th>Nombres cliente</th>
                    <th>Llamado</th>
                    <th>Fecha llamada</th>
                    <th>Duración</th>
                    <th>Resultado</th>
                    <th>Formulario</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>