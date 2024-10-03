<!DOCTYPE html>
<html lang="es-mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
  <title>Búsqueda</title>
</head>

<body>
  <h2>Búsqueda Básica</h2>
  <form method="post" action="<?= base_url('sentencias/search'); ?>">
    <div class="form-group">
      <label for="NumExpediente">Número de Expediente:</label>
      <input type="text" name="NumExpediente" class="form-control">
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
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>

  <!-- Botón para ir a la búsqueda avanzada -->
  <a href="<?= base_url('sentencias/advancedSearch'); ?>" class="btn btn-secondary">Búsqueda Avanzada</a>
</body>

</html>