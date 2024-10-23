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
        <li class="nav-item"><a href="<?= base_url('/register') ?>" class="nav-link"> Registro</a></li>
      </ul>
    </nav>
  </div>
</header>

</header>


<body background="<?= base_url('/assets/img/fondoprop.png') ?>">

<script>
    document.addEventListener('DOMContentLoaded', function () {
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


    document.addEventListener('DOMContentLoaded', function () {
        // Guardar nuevo juzgador mediante fetch
        document.getElementById('guardarJuzgador').addEventListener('click', function (event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del botón

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
            fetch("<?= base_url('sentencias/saveJuzgador') ?>", {  // Ruta ajustada para guardar juzgador
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
                // Actualizar el formulario principal con los datos del nuevo juzgador
                document.getElementById('juzgador_autocomplete').value = nombre + ' ' + apellidoP + ' ' + apellidoM;
                document.getElementById('Juzgador_idJuzgador').value = responseData.idJuzgador; // Asigna el ID del juzgador recién creado
                document.querySelector('.suggestions-container').style.display = 'none'; // Ocultar sugerencias

                // Cerrar el modal
                var modalElement = document.querySelector('#nuevoJuzgadorModal');
                var modal = bootstrap.Modal.getInstance(modalElement); // Obtener instancia de modal
                modal.hide(); // Cerrar modal

                // Limpiar campos del modal
                document.getElementById('nuevo_juzgador_nombre').value = '';
                document.getElementById('StrApellidoPaterno').value = '';
                document.getElementById('StrApellidoMaterno').value = '';
            })
            .catch(error => {
                alert('Hubo un error al guardar el juzgador: ' + error);
            });
        });

        // Autocomplete para juzgadores (ya lo tienes implementado)
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
    <h1>Agregar Sentencia</h1>
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
            <input type="text" id="juzgador_autocomplete" class="form-control" placeholder="Escriba el nombre del juzgador" autocomplete="off">
            <input type="hidden" name="Juzgador_idJuzgador" id="Juzgador_idJuzgador" autocomplete="off">
            <!-- Contenedor para mostrar sugerencias -->
            <div class="suggestions-container">
                <div id="suggestion-list"></div> <!-- Contenedor de sugerencias -->
            </div>
            <!-- Botón para abrir el modal de nuevo juzgador -->
            <!-- Botón para abrir el modal -->
<button type="button" class="boton mt-2" data-bs-toggle="modal" data-bs-target="#nuevoJuzgadorModal">
    Agregar nuevo Juzgador
</button>
        </div>

        <!-- Otros campos del formulario -->
        <div class="form-group">
            <label for="StrDescripcion">Agregar nueva Sentencia (si no está en la lista):</label>
            <input type="text" name="StrDescripcion" id="StrDescripcion" class="form-control" placeholder="Descripción de la nueva sentencia" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="LITIS">LITIS:</label>
            <textarea name="LITIS" class="form-control" autocomplete="off"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="boton">Guardar Sentencia</button>
        </div>
    </form>
</div>

<!-- Modal para agregar nuevo juzgador -->
<!-- Modal para agregar nuevo juzgador -->
<div class="modal fade" id="nuevoJuzgadorModal" tabindex="-1" aria-labelledby="nuevoJuzgadorModalLabel" aria-hidden="true">
  <div class="modal-dialog d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoJuzgadorModalLabel">Agregar Nuevo Juzgador</h5>
        <button type="button" class="btn-close btn-close-gold" aria-label="Cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario con el método POST -->
        <form id="formNuevoJuzgador" method="post" action="<?= base_url('sentencias/saveJuzgador') ?>">
          <div class="mb-3">
            <label for="nuevo_juzgador_nombre" class="form-label">Nombre del Juzgador:</label>
            <input type="text" class="form-control" id="nuevo_juzgador_nombre" name="StrNombre" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="StrApellidoPaterno" class="form-label">Apellido Paterno:</label>
            <input type="text" class="form-control" id="StrApellidoPaterno" name="StrApellidoPaterno" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="StrApellidoMaterno" class="form-label">Apellido Materno:</label>
            <input type="text" class="form-control" id="StrApellidoMaterno" name="StrApellidoMaterno" autocomplete="off">
          </div>
          <button type="submit" class="boton">Guardar Juzgador</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
<footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Desarrollado por Jesus Arturo Cisneros Cantero Supervisado por Damian Martinez Magliocca</span>
            <br>
            <span class="text-muted">En colaboracion con : Julio Cesar Padilla Alva, Martha Karina Teran Botello , y Carlos García</span>
        </div>
</footer>
</html>