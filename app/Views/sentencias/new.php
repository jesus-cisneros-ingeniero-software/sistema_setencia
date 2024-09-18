<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Sentencia</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Agregar Nueva Sentencia</h1>
    <form action="<?= base_url('sentencias/save'); ?>" method="POST">
      <div class="form-group">
        <label for="NumExpediente">Número de Expediente:</label>
        <input type="text" name="NumExpediente" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="NumAno">Año:</label>
        <input type="text" name="NumAno" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="Juzgador_idJuzgador">Seleccionar Juzgador:</label>
        <select name="Juzgador_idJuzgador" id="Juzgador_idJuzgador" class="form-control">
          <option value="">Seleccione un juzgador</option>
          <?php foreach ($juzgadores as $juzgador): ?>
            <option value="<?= $juzgador['idJuzgador'] ?>"><?= $juzgador['StrNombre'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="nuevo_juzgador">Agregar nuevo Juzgador (si no está en la lista):</label>
        <input type="text" name="StrNombre" id="nuevo_juzgador" class="form-control" placeholder="Nombre del nuevo juzgador">
        <input type="text" name="StrApellidoPaterno" id="nuevo_juzgador_apellidoP" class="form-control" placeholder="Apellido Paterno">
        <input type="text" name="StrApellidoMaterno" id="nuevo_juzgador_apellidoM" class="form-control" placeholder="Apellido Materno">
      </div>



      <div class="form-group">
        <label for="LITIS">LITIS:</label>
        <textarea name="LITIS" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar Sentencia</button>
      </div>

    </form>
  </div>
</body>

</html>