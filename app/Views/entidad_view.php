<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
  <title>Consulta de Entidades</title>
</head>

<body>
  <h1>Selecciona una Entidad</h1>

  <?php if (!empty($entidades)): ?>
    <form action="<?= base_url('entidad/seleccionar') ?>" method="POST">
      <label for="entidad_id">Entidades:</label>
      <select name="entidad_id" id="entidad_id">
        <?php foreach ($entidades as $entidad): ?>
          <option value="<?= $entidad->strEntFedId; ?>"><?= $entidad->strEntidad; ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>
      <button type="submit">Seleccionar</button> <!-- Botón de selección -->
    </form>
  <?php else: ?>
    <p>No se encontraron entidades.</p>
  <?php endif; ?>

</body>

</html>