<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>callcenter/forms/form"><i class="fa fa-user-plus"></i> Nuevo Formulario</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <table id="Tablecampaign" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
                <tr>
                    <th>ID</th>
                    <th class="text-center" data-priority="1">formulario</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forms as $form) : ?>
                    <tr>
                        <!-- id_call -->
                        <td><?php echo "#" . $form->id_form; ?></td>

                        <!-- campaña -->
                        <td class="text-center"><?php echo $form->form; ?></td>

                        <!-- estado -->
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-<?php echo ($form->id_form_status = 1) ? 'success' : 'danger'; ?> btn-xxs" disabled><?php echo $form->id_form_status; ?></button>
                        </td>

                        <!-- Acción -->
                        <td class="text-center">
                            <a href="#" title="Informacion de cliente"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th class="text-center" data-priority="1">formulario</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>