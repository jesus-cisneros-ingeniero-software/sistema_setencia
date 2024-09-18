<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuario</title>
  <!--<link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<h1>Registro de Usuarios</h1>

<form method="post" action="<?= base_url('auth/createUser'); ?>">
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


  <br><br>


  <div class="form-group col">
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
    <label class="control-label" for="apellido_paterno">Apellido Paterno</label>
    <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno"
      placeholder="Ingrese el Primer Apellido">
    <br><br>
  </div>
  <div class="form-group col">
    <label class="control-label" for="apellido_materno">Apellido Materno</label>
    <input class="form-control" type="text" id="apellido_materno" name="apellido_materno"
      placeholder="Ingrese ele segundo Apellido">
    <br><br>
  </div>


  <!--<button type="submit">Registrarse</button>-->
  <button class="btn btn-success" type="submit">Registrar</button>
</form>