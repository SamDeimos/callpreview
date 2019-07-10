<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/forms">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <form id="form_add" action="<?php echo base_url(); ?>/callcenter/forms/AddForm" method="POST">
            <div class="row">
                <div class="col-12 border-right">
                    <input name="id_form" id="id_form" type="hidden" value="<?php echo isset($form) ? $form->id_form : '' ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre formulario</label>
                        <input class="form-control form-control-sm" name="form" id="form" type="text" value="<?php echo isset($form) ? $form->form : '' ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="create_form" class="table table-hover text-center">
                                <thead class="text-uppercase bg-light">
                                    <tr>
                                        <th scope="col">Nombre campo</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">valores</th>
                                        <th scope="col">
                                            <button type="button" class="btn btn-outline-primary btn-xs" id="add_campo" <?php echo isset($form) ? 'disabled' : ''?>>Nuevo campo</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!isset($form)) : ?>
                                        <tr>
                                            <td>
                                                <input class="form-control form-control-sm" name="label[]" placeholder="nombre de campo" type="text" required>
                                            </td>
                                            <td>
                                                <select class="custom-select custom-select-sm type" name="id_form_type[]" id="id_form_type">
                                                    <option value="0" selected>texto</option>
                                                    <option value="1">lista</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input class="values_camp" name="values_camp[]" type="hidden">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-xs remove_campo">-</button>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <?php foreach ($form_fields as $fields) : ?>
                                            <tr>
                                                <td>
                                                    <input class="form-control form-control-sm" name="label[]" placeholder="nombre de campo" type="text" value="<?php echo $fields->label ?>" required>
                                                </td>
                                                <td>
                                                    <select class="custom-select custom-select-sm type" name="id_form_type[]" id="id_form_type">
                                                        <option value="0" <?php echo ($fields->type == 0) ? 'selected' : '' ?>>texto</option>
                                                        <option value="1" <?php echo ($fields->type == 1) ? 'selected' : '' ?>>lista</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <?php if ($fields->type == 1) : ?>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <button class="btn btn-primary btn-xxs add_val">add</button>
                                                                <input class="form-control form-control-sm mt-2 val" name="val[]" placeholder="valor" type="text">
                                                            </div>
                                                            <div class="col-6">
                                                                <button class="btn btn-primary btn-xxs remove_val">remove</button>
                                                                <select multiple class="custom-select custom-select-sm mt-2" name="values_camp_select[]" id="values_camp_select" size="3">
                                                                    <?php foreach (explode(',', str_replace(array('"', "[", "]"), "", $fields->value)) as $value) :  ?>
                                                                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <input class="values_camp" name="values_camp[]" type="hidden" value="<?php echo str_replace(array('"', "[", "]"), "", $fields->value) ?>">
                                                        </div>
                                                    <?php else : ?>
                                                        <input class="values_camp" name="values_camp[]" type="hidden">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs remove_campo" disabled>-</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="<?php echo isset($form) ? 'Actualizar' : 'Crear'; ?>">
        </form>
    </div>
</div>
