<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .cardami{
            padding: 0;
        }
        .rojo{
            border: 5px solid #F03131;
            background: #F04848;
        }

        .amarillo{
            border: 5px solid #F03131;
            background: yellow;
        }

        .verde{
            border: 5px solid #F03131;
            background: green;
        }

        .azul{
            border: 5px solid #022BD1;
            background: #3051D9;
        }
    </style>
</head>
<body>
<?php //var_dump($damiwf) ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Flujo de Dami# <?php echo $id_dami?></h1>
        </div>
        <div class="col-6 text-right">
            <p><strong>Vendedor:</strong> <?php echo $datadami->vendedor?></p>
            <p><strong>Cliente:</strong> <?php echo $datadami->nombres?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($damiwf as $w){?>
        <div class="col-3 cardami">
                <div class="card card-bordered <?php echo $w->color?>">
                    <div class="card-body">
                        <h6 class="title">Estado: <?php echo $w->estado?></h6>
                        <p class="card-text">Modifica: <?php echo $w->perfil?></p>
                        <p class="card-text">Tarea: <?php echo $w->status?></p>
                        <a href="#" class="btn btn-primary btn-xs">Siguiente paso</a>
                    </div>
                </div>
        </div>
        <?php }?>
    </div>
</div>
</body>
</html>