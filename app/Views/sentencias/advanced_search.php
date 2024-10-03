<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
  <title>Búsqueda Avanzada</title>
</head>

<body>

</body>

</html>

<h2>Búsqueda Avanzada</h2>
<form method="post" action="<?= base_url('sentencias/advancedSearch'); ?>">

  <div class="form-group">
    <label for="NumExpediente">Número de Expediente:</label>
    <input type="text" name="NumExpediente" class="form-control">
  </div>

  <div class="form-group">
    <label for="NumAno">Año:</label>
    <input type="text" name="NumAno" class="form-control">
  </div>

  <div class="form-group">
    <label for="Juzgador_idJuzgador">Seleccionar Juzgador:</label>
    <select name="Juzgador_idJuzgador" class="form-control">
      <option value="">Seleccione un juzgador</option>
      <?php foreach ($juzgadores as $juzgador): ?>
        <option value="<?= $juzgador['idJuzgador'] ?>"><?= $juzgador['StrNombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="StrCaracteristicasEspeciales">Características Especiales:</label>
    <input type="text" name="StrCaracteristicasEspeciales" class="form-control">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

<!-- Botón para regresar a la búsqueda básica -->
<a href="<?= base_url('sentencias'); ?>" class="btn btn-secondary">Búsqueda Básica</a>