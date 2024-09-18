<!DOCTYPE html>
<html lang="es-mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Lista de PDFs</title>
</head>

<body>

  <h2>Archivos Subidos</h2>

  <label class="form-label" for="customFile">Default file input example</label>
  <input type="file" class="form-control" id="customFile" />

  <?php if (session()->get('message')): ?>
    <p style="color:green;"><?= session()->get('message') ?></p>
  <?php endif; ?>
  <?php if (session()->get('error')): ?>
    <p style="color:red;"><?= session()->get('error') ?></p>
  <?php endif; ?>

  <?php if (!empty($files) && is_array($files)): ?>
    <ul>
      <?php foreach ($files as $file): ?>
        <li>
          <!-- Mostrar el nombre del archivo -->
          <?= esc($file['file_name']); ?>
          <!-- Enlace de descarga -->
          <a href="<?= base_url('pdfs/download/' . $file['file_name']); ?>">Descargar</a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>No hay archivos subidos.</p>
  <?php endif; ?>

</body>

</html>