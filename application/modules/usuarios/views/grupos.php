<br>
<div class="card">
    <div class="card-acction">
        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>usuarios/grupos/grupo"><i class="fa fa-cart-plus"></i> Nuevo grupo</a>
    </div>
</div>
<div class="card-area">
    <div class="row">
        <?php foreach ($grupos as $grupo) : ?>
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h4 class="title">Grupo <?php echo $grupo->grupo; ?></h4>
                        <p class="card-text">
                            <strong>Director: </strong> <?php echo $grupo->nombres; ?> <br>
                            <strong>Integrantes: </strong> <?php echo count(json_decode($grupo->belong_user_grupo)); ?>
                        </p>
                        <a href="<?php echo base_url(); ?>usuarios/grupos/grupo/<?php echo $grupo->id_grupo; ?>" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>