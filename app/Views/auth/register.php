<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro usuario</title>
  <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/registro.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <form id="registerForm" method="post" action="<?= base_url('/auth/createUser'); ?>">
    <div class="form-group col">
      <h1>Registro de Usuarios</h1>
      <br>
      <br>
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

      <label class="control-label" for="usuario">Usuario:</label>
      <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Nombre de Usuario">
      <br><br>
    </div>
    <div class="form-group col">
      <label class="control-label" for="password">Contraseña:</label>
      <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña">
      <br><br>
    </div>
    <div class="form-group col">


      <label class="control-label" for="nombre">Nombre:</label>
      <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese el Nombre">
      <br><br>
    </div>
    <div class="form-group col">
      <label class="control-label" for="apellido_paterno">Apellido Paterno:</label>
      <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno"
        placeholder="Ingrese el Primer Apellido">
      <br><br>
    </div>
    <div class="form-group col">
      <label class="control-label" for="apellido_materno">Apellido Materno:</label>
      <input class="form-control" type="text" id="apellido_materno" name="apellido_materno"
        placeholder="Ingrese ele segundo Apellido">
      <br><br>
    </div>


    <!--<button type="submit">Registrarse</button>-->
    <button class="btn btn-success" type="submit">Registrar</button>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('/js/alert.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('/css/registro.css') ?>">