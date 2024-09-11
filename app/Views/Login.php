!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SETENCIAS</title>
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>

<?= $this->extend('Complementos/Master'); ?>
<?= $this->section('Title') ?>LOGIN<?= $this->endSection() ?>

<?= $this->section('MainContent'); ?>


<div class="container">
  <h2 class="text-center">Login Setencias</h2>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>
  <hr class="red">
  <div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
      <form action="<?= base_url('/autenticar') ?>" method="POST">
        <label class="control-label" for="usuario">Usuario: </label>
        <input required="" class="form-control" type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario..."><br>
        <label class="control-label" for="password">Contraseña:</label>
        <input required="" class="form-control" type="password" name="password" id="password" placeholder="Ingrese su contraseña...">
        <br>
        <button class="btn btn-primary"> Ingresar</button>

      </form>
    </div>
    <div class="col-sm-4">

    </div>


  </div>

</div>



<?= $this->endSection(); ?>

<?= $this->section('FooterContent'); ?>
<script src="<?= base_url(); ?>/assets/js/functions_pedido.js"></script>
<script src="<?= base_url(); ?>/assets/js/functions_admin.js"></script>
<?= $this->endSection(); ?>