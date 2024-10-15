<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sentencia</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/logo.ico') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Guardar nuevo juzgador mediante fetch
        document.getElementById('guardarJuzgador').addEventListener('click', function () {
            var nombre = document.getElementById('nuevo_juzgador_nombre').value.trim();
            var apellidoP = document.getElementById('StrApellidoPaterno').value.trim();
            var apellidoM = document.getElementById('StrApellidoMaterno').value.trim();

            // Verifica que el nombre y apellido paterno estén completos
            if (!nombre || !apellidoP) {
                alert('Por favor complete los campos requeridos (Nombre y Apellido Paterno).');
                return; // Detiene la ejecución si falta información
            }

            // Crear objeto con los datos a enviar
            var data = {
                StrNombre: nombre,
                StrApellidoPaterno: apellidoP,
                StrApellidoMaterno: apellidoM
            };

            // Enviar los datos al servidor utilizando fetch
            fetch("<?= base_url('sentencias/save') ?>", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json(); // Parsear la respuesta JSON
            })
            .then(responseData => {
                document.getElementById('juzgador_autocomplete').value = nombre + ' ' + apellidoP + ' ' + apellidoM;
                document.getElementById('Juzgador_idJuzgador').value = responseData.idJuzgador; // Asigna el ID del juzgador recién creado
                document.querySelector('.suggestions-container').style.display = 'none'; // Ocultar sugerencias
            })
            .catch(error => {
                alert('Hubo un error al guardar el juzgador: ' + error);
            });

        });

        // Autocomplete para juzgadores
        var juzgadores = [
            <?php foreach ($juzgadores as $juzgador): ?>
            {
                label: "<?= $juzgador['StrNombre'] . ' ' . $juzgador['StrApellidoPaterno'] . ' ' . $juzgador['StrApellidoMaterno'] ?>",
                value: <?= $juzgador['idJuzgador'] ?>
            },
            <?php endforeach; ?>
        ];

        document.getElementById('juzgador_autocomplete').addEventListener('input', function () {
            var input = this.value.toLowerCase();
            var suggestions = juzgadores.filter(function(juzgador) {
                return juzgador.label.toLowerCase().includes(input);
            });

            // Mostrar las sugerencias en el contenedor
            var suggestionsContainer = document.querySelector('.suggestions-container');
            var suggestionList = suggestionsContainer.querySelector('#suggestion-list');
            suggestionList.innerHTML = ''; // Limpiar sugerencias

            if (suggestions.length > 0) {
                suggestions.forEach(function(sug) {
                    var suggestionItem = document.createElement('div');
                    suggestionItem.textContent = sug.label;
                    suggestionItem.dataset.value = sug.value; // Guarda el id del juzgador
                    suggestionItem.classList.add('suggestion-item');

                    suggestionItem.addEventListener('click', function() {
                        document.getElementById('juzgador_autocomplete').value = this.textContent;
                        document.getElementById('Juzgador_idJuzgador').value = this.dataset.value;
                        suggestionsContainer.style.display = 'none'; // Ocultar sugerencias
                    });

                    suggestionList.appendChild(suggestionItem);
                });

                // Mostrar el contenedor de sugerencias
                suggestionsContainer.style.display = 'block';
            } else {
                suggestionsContainer.style.display = 'none'; // Cerrar si no hay sugerencias
            }
        });

        // Cerrar las sugerencias cuando el usuario hace clic en otro lugar
        document.addEventListener('click', function(e) {
            if (!document.getElementById('juzgador_autocomplete').contains(e.target)) {
                document.querySelector('.suggestions-container').style.display = 'none'; // Cerrar sugerencias si se hace clic fuera
            }
        });
    });
</script>

<div class="container" style="position: relative;"> <!-- Hacer contenedor relativo para posicionar sugerencias -->
    <h1>Agregar Nueva Sentencia</h1>
    <form action="<?= base_url('sentencias/save'); ?>" method="POST">
        <div class="fom-group">
        <?php if (!empty($entidades)): ?>
      <label for="entidad_id">Entidades:</label>
      <select name="entidad_id" id="entidad_id" class="form-control">
        <?php foreach ($entidades as $entidad): ?>
          <option value="<?= $entidad->strEntFedId; ?>">
            <?= $entidad->strEntidad; ?>
          </option>
        <?php endforeach; ?>
      </select>
    <?php else: ?>
      <p>No se encontraron entidades.</p>
    <?php endif; ?>
        </div>
        <div class="fom-group">
            <label for="NumExpediente">Número de Expediente:</label>
            <input type="text" name="NumExpediente" id="NumExpediente" class="form-control" placeholder="1234">
        </div>
        <div class="form-group">
            <label for="NumAno">Año de la Sentencia:</label>
            <input type="text" name="NumAno" id="NumAno" class="form-control" placeholder="2024">
        </div>
        
        <div class="form-group">
            <label for="juzgador_autocomplete">Seleccionar Juzgador:</label>
            <input type="text" id="juzgador_autocomplete" class="form-control" placeholder="Escriba el nombre del juzgador">
            <input type="hidden" name="Juzgador_idJuzgador" id="Juzgador_idJuzgador">
            <!-- Contenedor para mostrar sugerencias -->
            <div class="suggestions-container">
                <div id="suggestion-list"></div> <!-- Contenedor de sugerencias -->
            </div>
            <!-- Botón para abrir el modal de nuevo juzgador -->
            <!-- Botón para abrir el modal -->
<button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#nuevoJuzgadorModal">
    Agregar nuevo Juzgador
</button>
        </div>

        <!-- Otros campos del formulario -->
        <div class="form-group">
            <label for="StrDescripcion">Agregar nueva Sentencia (si no está en la lista):</label>
            <input type="text" name="StrDescripcion" id="StrDescripcion" class="form-control" placeholder="Descripción de la nueva sentencia">
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

<!-- Modal para agregar nuevo juzgador -->
<div class="modal fade" id="nuevoJuzgadorModal" tabindex="-1" aria-labelledby="nuevoJuzgadorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoJuzgadorModalLabel">Agregar Nuevo Juzgador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formNuevoJuzgador">
          <div class="mb-3">
            <label for="nuevo_juzgador_nombre" class="form-label">Nombre del Juzgador:</label>
            <input type="text" class="form-control" id="nuevo_juzgador_nombre" name="StrNombre" required>
          </div>
          <div class="mb-3">
            <label for="StrApellidoPaterno" class="form-label">Apellido Paterno:</label>
            <input type="text" class="form-control" id="StrApellidoPaterno" name="StrApellidoPaterno" required>
          </div>
          <div class="mb-3">
            <label for="StrApellidoMaterno" class="form-label">Apellido Materno:</label>
            <input type="text" class="form-control" id="StrApellidoMaterno" name="StrApellidoMaterno">
          </div>
          <button type="button" class="btn btn-primary" id="guardarJuzgador">Guardar Juzgador</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
<footer>

</footer>
</html>