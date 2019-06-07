<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('', 'id="form-delete"') ?>
            <div class="modal-body">
                <p>Esta acción no se puede deshacer, ¿Desea eliminar este registro?</p>
                <?php
                $idDelete = array(
                    'type'  => 'text',
                    'name'  => 'idDelete',
                    'id'    => 'idDelete',
                    'class' => 'form-control form-control-sm',
                );
                $modulo = array(
                    'type'  => 'text',
                    'name'  => 'modulo',
                    'id'    => 'modulo',
                    'class' => 'form-control form-control-sm',
                );
                echo form_input($idDelete);
                echo form_input($modulo);?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" value="Eliminar" class="btn btn-danger" />
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>