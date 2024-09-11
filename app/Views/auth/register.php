<?= $this->extend('Complementos/Master'); ?>
<?= $this->section('Title') ?>LOGIN<?= $this->endSection() ?>

<?= $this->section('MainContent'); ?>
<h2>Registro de Usuarios</h2>

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
    <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese el Primer Apellido">
    <br><br>
  </div>
  <div class="form-group col">
    <label class="control-label" for="apellido_materno">Apellido Materno</label>
    <input class="form-control" type="text" id="apellido_materno" name="apellido_materno" placeholder="Ingrese ele segundo Apellido">
    <br><br>
  </div>


  <!--<button type="submit">Registrarse</button>-->
  <button class="btn btn-success" type="submit">Registrar</button>
</form>

<?= $this->endSection(); ?>

<?= $this->section('FooterContent'); ?>
<script src="<?= base_url(); ?>/assets/js/functions_pedido.js"></script>
<script src="<?= base_url(); ?>/assets/js/functions_admin.js"></script>
<?= $this->endSection(); ?>