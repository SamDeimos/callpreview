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
                    <th class="text-center" data-priority="1">Nombre de campaña</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign) : ?>
                    <tr>
                        <!-- id_call -->
                        <td><?php echo "#" . $campaign->id_campaign; ?></td>

                        <!-- campaña -->
                        <td class="text-center"><?php echo $campaign->campaign; ?></td>

                        <!-- Estado -->
                        <td class="text-center">
                            <input id="status_camp" type="checkbox" data-id_campaign="<?php echo $campaign->id_campaign ?>" data-toggle="toggle" data-size="xs" data-on="Activa" data-off="Inactiva" data-onstyle="success" data-offstyle="danger" <?php echo ($campaign->id_campaign_status == 1) ? 'checked' : ''; ?>>
                        </td>

                        <td class="text-center">
                            <a class="download_reg_camp" href="<?php echo base_url(); ?>callcenter/campaigns/export_csv?campaign=<?php echo $campaign->campaign; ?>&id_campaign=<?php echo $campaign->id_campaign ?>" title="Desacargar reporte"><i class="fa fa-download"></i></a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th class="text-center" data-priority="1">Nombre de campaña</th>
                    <th class="text-center" data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>