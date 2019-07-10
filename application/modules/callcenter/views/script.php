<div class="card mt-4">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>callcenter/scripts/script"><i class="fa fa-cart-plus"></i> Nuevo guion</a>
    </div>
</div>
<div class="card-area">
    <div class="row">
        <?php foreach ($scripts as $script) : ?>
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h4 class="title"><?php echo $script->script; ?></h4>
                        <p class="card-text">
                            <strong>Descripción: </strong><?php echo $script->descripcion; ?>
                        </p>
                        <a href="<?php echo base_url(); ?>callcenter/scripts/script/<?php echo $script->id_script; ?>" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>