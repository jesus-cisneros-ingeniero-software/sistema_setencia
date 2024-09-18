<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETENCIAS</title>
    <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<div class="container">
    <h1>Subir Setencia</h1>

    <?php if (session('mensaje')) { ?>

        <div class="alert alert-danger" role="alert">
            <strong>Campos Vacios</strong><?php echo session('mensaje'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


    <?php } ?>
</div>


<form action="<?php echo base_url('/setencia/traer') ?>" method="post">
    <div class="card-body">
        <div class="mb-3 row">
            <label for="NumExpediente" class="form-label">Numero de expediente</label>
            <input class="form-control" type="NumExpediente" id="NumExpediente" name="NumExpediente" placeholder="1">

        </div>
        <div class="mb-3 row">
            <label for="NumAno" class="form-label">Año del expediente</label>
            <input class="form-control" type="NumAno" id="NumAno" name="NumAno" placeholder="Año del expediente">

        </div>
        <div class="mb-3 row">
            <label for="StrResumen" class="form-label">Descripción del Producto</label>
            <input class="form-control" type="StrResumen" id="StrResumen" name="StrResumen" placeholder="Resumen">

        </div>
        <div class="mb-3 row">
            <label for="StrCaracteristicasEspeciales" class="form-label">Caracteristicas Especiales:</label>
            <input class="form-control" type="StrCaracteristicasEspeciales" id="StrCaracteristicasEspeciales" name="StrCaracteristicasEspeciales" placeholder="Caracteristicas Especiales">
        </div>
        <div class="mb-3 row">
            <label for="LITIS" class="form-label">LITIS</label>
            <input class="form-control" type="LITIS" id="LITIS" name="LITIS" placeholder="LITIS">
        </div>

        <input type="submit" value="Guardar" class="btn btn-outline-primary">

        <a href="<?php echo base_url('/setencia');  ?> " class="btn btn-outline-danger">Cancelar Producto</a>
    </div>

</form>