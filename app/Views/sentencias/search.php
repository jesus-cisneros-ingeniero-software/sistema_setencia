<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Sentencias Específicas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Buscar Sentencias Específicas</h1>
    <form method="post" action="<?= base_url('sentencias/search'); ?>">

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
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
    </form>

    <?php if (isset($resultados)): ?>
      <h2>Resultados de la búsqueda</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Número de Expediente</th>
            <th>Año</th>
            <th>Juzgador</th>
            <th>Resumen</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resultados as $resultado): ?>
            <tr>
              <td><?= $resultado['NumExpediente'] ?></td>
              <td><?= $resultado['NumAno'] ?></td>
              <td><?= $resultado['StrResumen'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>

</html>