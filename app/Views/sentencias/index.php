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

<body>
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
          <th>Resumen</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sentencias as $sentencia): ?>
          <tr>
            <td><?= $sentencia['NumExpediente'] ?></td>
            <td><?= $sentencia['NumAno'] ?></td>
            <td><?= $sentencia['StrResumen'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>


</html>