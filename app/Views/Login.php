<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SETENCIAS</title>
  <!--<link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
  <section class="vh-100" style="background-color:rgba(145,145,145,255);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">SISTEMA DE SETENCIA </h3>
              <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('error') ?>
                </div>

              <?php endif; ?>

              <form action="<?= base_url('/autenticar') ?>" method="POST">
                <input required="" class="form-control" type="text" name="usuario" id="usuario"
                  placeholder="Ingrese su usuario..."><br>
                <label class="form-label" for="typeEmailX-2">USUARIO</label>



                <input required="" class="form-control" type="password" name="password" id="password"
                  placeholder="Ingrese su contraseña...">
                <label class="form-label" for="typePasswordX-2">Contraseña</label>

                <br>
                <br>
                <button class="btn btn-primary"> INGRESAR</button>
              </form>
              <hr>

              <a href="<?= base_url('/register') ?>">¿No tienes cuenta? Registrate</a>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<!--
<footer class="vh-100" style="background-color:rgba(145,145,145,255);">
  <p>Desarrollado Cisneros Cantero Jeús Arturo ext 44562</p>
  <p>Revisado por Damian Martinez Magliocca ext 44560</p>

</footer>
              -->