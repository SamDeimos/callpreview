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
                    <th data-priority="4">campaña</th>
                    <th data-priority="2">Estado</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign) : ?>
                    <tr>
                        <!-- id_call -->
                        <td><?php echo "#" . $campaign->id_campaign; ?></td>

                        <!-- campaña -->
                        <td><?php echo $campaign->campaign; ?></td>

                        <!-- nombres -->
                        <td><?php echo $campaign->id_status_campaign; ?></td>

                        <!-- Acción -->
                        <td class="text-center">
                            <a href="#" title="Informacion de cliente"><i class="far fa-trash-alt"></i></a>
                            <a href="#" title="Califiar llamada"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th data-priority="4">Campaña</th>
                    <th data-priority="1">Nombres</th>
                    <th class="text-center" data-priority="3">Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>