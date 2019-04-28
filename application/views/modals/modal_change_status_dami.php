<!-- Modal -->
<div class="modal fade" id="ChangeStatusModal" tabindex="-1" role="dialog" aria-labelledby="ChangeStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ChangeStatusModalLabel">Enviar Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('','id="form-delete"') ?>
            <div class="modal-body">
                <p>Cambiar estado de DAMI</p>
                <?php
                $data = array(
                    'type'  => 'text',
                    'name'  => 'idDami',
                    'id'    => 'idDami',
                    'class' => 'form-control form-control-sm',
                );
                echo form_input($data);
//                $data = array(
//                    'type'  => 'text',
//                    'name'  => 'status',
//                    'id'    => 'status',
//                    'class' => 'form-control form-control-sm',
//                );
//                echo form_input($data); ?>
                <hr>
                <select name="status" id="">

                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Cambiar" class="btn btn-danger btn-xs"/>
            </div>
            <?php echo form_close(); var_dump($user->perfil)?>
        </div>
    </div>
</div>
