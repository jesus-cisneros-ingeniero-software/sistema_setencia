<!DOCTYPE html>
<html lang="es_mx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Sentencias</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">

  <script>
    // Función de búsqueda en la tabla
    function buscarSentencias() {
      const input = document.getElementById("busqueda");
      const filter = input.value.toLowerCase();
      const table = document.getElementById("tablaSentencias");
      const tr = table.getElementsByTagName("tr");

      for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td")[0]; // Filtra por el primer campo (puede cambiar)
        if (td) {
          const txtValue = td.textContent || td.innerText;
          tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
        }
      }
    }
  </script>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sentencia</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/logo.ico') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">



</head>
<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="<?= base_url('/assets/img/logo.ico') ?>" alt="Logo" width="50" height="50">
            <span class="site-name">PROFEDET </span>
        </div>
        <nav class="nav">
            <ul class="nav-list d-flex">
                <li class="nav-item"><a href="#inicio" class="nav-link"></a></li>
                <li class="nav-item"><a href="#sobre-nosotros" class="nav-link">Sobre Nosotros</a></li>
                <li class="nav-link"><a href="<?= base_url('/sentencias/agregar') ?>" class="nav-link">Agregar Setencia </a></li>
               <!-- <li class="nav-item"><a href="<?= base_url('/register') ?>" class="nav-link"> Nueva cuenta</a></li>-->EntidadController.php
               <!-- <li class="nav-item"><a href="<?= base_url('/sentencias/advancedSearch') ?>" class="nav-link"> Busqueda Avanzada </a></li>
                -->

            </ul>
        </nav>
    </div>
</header>


<body background="<?= base_url('/assets/img/fondoprop.png') ?>">

  <div class="container">
    <h1>Buscar Sentencias</h1>
    <button class="btn btn-primary"
      onclick="window.location.href='<?= base_url('/sentencias/agregar'); ?>'"> Agregar nueva setencia </button>
    <input type="text" id="busqueda" onkeyup="buscarSentencias()" class="form-control" placeholder="Buscar por número de expediente...">

    <table class="table table-bordered mt-3" id="tablaSentencias">
      <thead>
        <tr>
          <th>Número de Expediente</th>
          <th>Año</th>
            <th>Tribunales</th>
          <th>Resumen</th>
            <th>Juzgador</th>
            <th>Entidad</th>

            <th>Fecha creacion</th>
            <th>Ver</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sentencias as $sentencia): ?>
          <tr>
            <td><?= $sentencia['NumExpediente'] ?></td>
            <td><?= $sentencia['NumAno'] ?></td>
              <td><?= $sentencia['tribunal'] ?></td>
            <td><?= $sentencia['StrResumen'] ?></td>
              <td>
                  <?=
                  isset($sentencia['juzgador'])
                      ? $sentencia['juzgador']['StrNombre'] . ' ' .
                      $sentencia['juzgador']['StrApellidoPaterno'] . ' ' .
                      $sentencia['juzgador']['StrApellidoMaterno']
                      : 'N/A';
                  ?>
              </td>
              <td><?= $sentencia['entidad'] ?? 'N/A' ?></td>
              <td>
                  <?php
                  foreach ($pdfs as $pdf) {
                      if ($pdf['id_sentencia'] == $sentencia['idSentencia']) {
                          echo date('d-m-Y H:i:s', strtotime($pdf['created_at']));
                          break;
                      }
                  }
                  ?>
              </td>
              <td>
                  <?php
                  foreach ($pdfs as $pdf) {
                      if ($pdf['id_sentencia'] == $sentencia['idSentencia']) {
                          #echo '<a href="' . base_url('/uploads/pdfs/' . $pdf['file_name']) . '" target="_blank" class="btn btn-info">Abrir PDF</a>';
                          echo '<a href="' . base_url('/pdfs/view/' . $pdf['file_name']) . '" target="_blank" class="btn btn-info">Abrir PDF</a>';
                          break;
                      }
                  }
                  ?>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Desarrollado por Jesus Arturo Cisneros Cantero Supervisado por Damian Martinez Magliocca</span>
        <br>
        <span class="text-muted">En colaboracion con : Julio Cesar Padilla Alva, Martha Karina Teran Botello  y Ivan Ruiz Hernandez</span>
    </div>
</footer>


</html>