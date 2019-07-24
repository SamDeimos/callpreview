<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>callcenter/campaigns/campaign"><i class="fa fa-user-plus"></i> Nueva campaña</a>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <table id="Tablecampaign" class="table table-hover text-left dataTable no-footer dtr-inline dt-responsive nowrap" style="width:100%">
            <thead class="bg-light text-capitalize">
                <tr>
                    <th>ID</th>
                    <th data-priority="1">Nombre de campaña</th>
                    <th data-priority="5">Formulario</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Reporte</th>
                    <th class="text-center" data-priority="4">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign) : ?>
                    <tr>
                        <!-- id_call -->
                        <td><?php echo "#" . $campaign->id_campaign; ?></td>

                        <!-- campaña -->
                        <td><a href="<?php echo base_url(); ?>callcenter/campaigns/campaign/<?php echo $campaign->id_campaign; ?>"><?php echo $campaign->campaign; ?></a></td>

                        <!-- formulario -->
                        <td><?php echo $campaign->form; ?></td>

                        <!-- Estado -->
                        <td class="text-center">
                            <input id="status_camp" type="checkbox" data-id_campaign="<?php echo $campaign->id_campaign ?>" data-toggle="toggle" data-size="xs" data-on="Activa" data-off="Inactiva" data-onstyle="success" data-offstyle="danger" <?php echo ($campaign->id_campaign_status == 1) ? 'checked' : ''; ?>>
                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle btn-xxs" type="button" data-toggle="dropdown" aria-expanded="false">Exportar</button>
                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(15px, -107px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>callcenter/campaigns/export_csv?campaign=<?php echo $campaign->campaign; ?>&id_campaign=<?php echo $campaign->id_campaign ?>" title="Desacargar reporte"><i class="fa fa-download"></i> CSV</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>callcenter/campaigns/export_xlsx?campaign=<?php echo $campaign->campaign; ?>&id_campaign=<?php echo $campaign->id_campaign ?>" title="Desacargar reporte"><i class="fa fa-download"></i> EXCEL</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $campaign->id_campaign ?>" data-modulo="Campaign"><i class="far fa-trash-alt"></i></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th data-priority="1">Nombre de campaña</th>
                    <th data-priority="5">Formulario</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Reporte</th>
                    <th class="text-center" data-priority="4">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>