<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sentencia</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/logo.ico') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">

</head>
<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="<?= base_url('/assets/img/logo.ico') ?>" alt="Logo" width="50" height="50">
            <span class="site-name">PROFEDET </span>
        </div>
        <nav class="nav">
            <ul class="nav-list d-flex">
                <li class="nav-item"><a href="#inicio" class="nav-link"></a></li>
                <li class="nav-item"><a href="#sobre-nosotros" class="nav-link">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="<?= base_url('/register') ?>" class="nav-link"> Registro</a></li>
                <li class="nav-item"><a href="<?= base_url('/sentencias/advancedSearch') ?>" class="nav-link"> Busqueda Avanzada </a></li>

            </ul>
        </nav>
    </div>
</header>
<body>
<div class="container" style="position: relative;">
<form id="registerForm" method="post" action="<?= base_url('/auth/createUser'); ?>">
    <div class="form-group col">
      <h1>Nuevo Registro</h1>
      <br>
      <br>
      <div class="form-group col">
        <label class="control-label" for="apellido_paterno">Apellido Paterno:</label>
        <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno"
          placeholder="Ingrese el Primer Apellido">
        <br><br>
      </div>
      <div class="form-group col">
        <label class="control-label" for="apellido_materno">Apellido Materno:</label>
        <input class="form-control" type="text" id="apellido_materno" name="apellido_materno"
          placeholder="Ingrese el Segundo Apellido">
        <br><br>
        <label class="control-label" for="nombre">Nombre:</label>
        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el Nombre">
        <br><br>
        <label for="fkPerfil">Perfil:</label>
        <select id="fkPerfil" name="fkPerfil" required>
          <?php if (!empty($perfil)): ?>
            <?php foreach ($perfil as $p): ?>
              <option value="<?= $p['idperfil'] ?>"><?= $p['StrRol'] ?></option>
            <?php endforeach; ?>
          <?php else: ?>
            <option value="">No hay perfiles disponibles</option>
          <?php endif; ?>
        </select><br>
        <br>

        <label class="control-label" for="usuario">Credencial de identidad:</label>
        <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Nombre de Usuario">
        <br><br>
      </div>
      <div class="form-group col">
        <label class="control-label" for="password">Contraseña:</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
        <br><br>
      </div>
    </div>
    <!--<button type="submit">Registrarse</button>-->
    <button class="btn btn-success" type="submit">Registrar</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<script src="<?= base_url('/js/alert.js') ?>"></script>-->
<link rel="stylesheet" href="<?= base_url('/css/registro.css') ?>">
<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>



</body>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Desarrollado por Jesus Arturo Cisneros Cantero Supervisado por Damian Martinez Magliocca</span>
        <br>
        <span class="text-muted">En colaboracion con : Julio Cesar Padilla Alva, Martha Karina Teran Botello , y Carlos García</span>
    </div>
</footer>
