<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
  <title>Lista de PDFs</title>
</head>

<body>

  <h2>Archivos Subidos</h2>

  <?php if (!empty($files) && is_array($files)): ?>
    <ul>
      <?php foreach ($files as $file): ?>
        <li>
          <!-- Mostrar el nombre del archivo -->
          <?= esc($file['file_name']); ?>

          <!-- Enlace de descarga -->
          <a href="<?= base_url('pdfs/download/' . $file['file_name']); ?>" target="_blank">Descargar</a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>No hay archivos subidos.</p>
  <?php endif; ?>

</body>

</html>