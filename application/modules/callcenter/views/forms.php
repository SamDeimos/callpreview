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
                    <th data-priority="1">formulario</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forms as $form) : ?>
                    <tr>
                        <!-- id_call -->
                        <td><?php echo "#" . $form->id_form; ?></td>

                        <!-- fomrulario -->
                        <td><a href="<?php echo base_url(); ?>callcenter/forms/form/<?php echo $form->id_form; ?>"><?php echo $form->form; ?></a></td>

                        <!-- Acción -->
                        <td class="text-center">
                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $form->id_form ?>" data-modulo="Form"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th data-priority="1">formulario</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>