<div class="card mt-4">
    <div class="card-acction">
        <button id="btn-calendar" title="Llamadas agendadas" class="btn btn-primary btn-xs float-right"><i class="fa fa-calendar-o"></i></button>
        <a title="Registro de llamadas" class="btn btn-primary btn-xs float-right mr-1" href="<?php echo base_url(); ?>callcenter/calls/registry"><i class="fa fa-fax"></i></a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <table id="Tablecall" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
                <tr>
                    <th>ID</th>
                    <th data-priority="5">Campaña</th>
                    <th data-priority="1">Nombres</th>
                    <th data-priority="2">Teléfonos</th>
                    <th data-priority="3">Estado</th>
                    <th class="text-center" data-priority="4">Acción</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th data-priority="5">Campaña</th>
                    <th data-priority="1">Nombres</th>
                    <th data-priority="2">Teléfonos</th>
                    <th data-priority="3">Estado</th>
                    <th class="text-center" data-priority="4">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<button id="btn-ext" class="btn-float"><i class="fa fa-phone"></i></button>