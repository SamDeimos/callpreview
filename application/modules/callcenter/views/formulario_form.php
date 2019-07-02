<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs float-right" href="<?php echo base_url(); ?>callcenter/forms">volver</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <form id="form_add" action="AddForm" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 border-right">
                    <div class="form-group">
                        <label for="nombre">Nombre formulario</label>
                        <input class="form-control form-control-sm" name="campaign" id="campaign" type="text" value="" required>
                    </div>
                </div>
                <div class="col-6">
                    <label for="id_form_status">Estado</label>
                    <div class="input-group">
                        <select class="custom-select custom-select-sm" name="id_form_status" id="id_form_status">
                            <option value="1">activar</option>
                            <option value="0">inactiva</option>
                        </select>
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
                                            <button type="button" class="btn btn-outline-primary btn-xs" id="add_campo">Nuevo campo</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        <td><input class="values_camp" name="values_camp[]" type="hidden"></td>
                                        <td><button class="btn btn-primary btn-xs remove_campo">-</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input class="btn btn-primary float-right" type="submit" value="Crear">
        </form>
    </div>
</div>