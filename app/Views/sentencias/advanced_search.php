<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Avanzada</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/estilo.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/logo.ico') ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <img src="<?= base_url('/assets/img/logo.ico') ?>" alt="Logo" width="50" height="50">
            <span class="site-name">PROFEDET</span>
        </div>
        <nav class="nav">
            <ul class="nav-list d-flex">
                <li class="nav-item"><a href="#inicio" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="#sobre-nosotros" class="nav-link">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="<?= base_url('/register') ?>" class="nav-link">Registro</a></li>
                <li class="nav-item"><a href="<?= base_url('/sentencias/advancedSearch') ?>" class="nav-link">Búsqueda Avanzada</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container mt-4">
    <h2>Búsqueda Avanzada</h2>

    <!-- Mensajes de error/success -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('sentencias/performAdvancedSearch'); ?>">
        <div class="form-group">
            <label for="NumExpediente">Número de Expediente:</label>
            <input type="text" id="NumExpediente" name="NumExpediente" class="form-control" placeholder="Ej: 12345" required>
        </div>

        <div class="form-group">
            <label for="NumAno">Año:</label>
            <input type="text" id="NumAno" name="NumAno" class="form-control" placeholder="Ej: 2024">
        </div>

        <div class="form-group">
            <label for="Juzgador_idJuzgador">Seleccionar Juzgador:</label>
            <select id="Juzgador_idJuzgador" name="Juzgador_idJuzgador" class="form-control">
                <option value="">Seleccione un juzgador</option>
                <?php foreach ($juzgadores as $juzgador): ?>
                    <option value="<?= $juzgador['idJuzgador'] ?>"><?= $juzgador['StrNombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="StrCaracteristicasEspeciales">Características Especiales:</label>
            <input type="text" id="StrCaracteristicasEspeciales" name="StrCaracteristicasEspeciales" class="form-control" placeholder="Características especiales">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="<?= base_url('sentencias'); ?>" class="btn btn-secondary ms-2">Búsqueda Básica</a>
        </div>
    </form>

    <!-- Mostrar resultados -->
    <table class="table mt-4">
        <thead>
        <tr>
            <th>ID Sentencia</th>
            <th>Número de Expediente</th>
            <th>Año</th>
            <th>Resumen</th>
            <th>Nombre del Juzgador</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombre del Archivo</th>
            <th>Ruta del Archivo</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($resultados)): ?>
            <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $resultado['idSentencia']; ?></td>
                    <td><?= $resultado['NumExpediente']; ?></td>
                    <td><?= $resultado['NumAno']; ?></td>
                    <td><?= $resultado['StrResumen']; ?></td>
                    <td><?= $resultado['juzgador_nombre']; ?></td>
                    <td><?= $resultado['juzgador_apellido_paterno']; ?></td>
                    <td><?= $resultado['juzgador_apellido_materno']; ?></td>
                    <td><?= $resultado['file_name']; ?></td>
                    <td><a href="<?= $resultado['file_path']; ?>">Ver Archivo</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9" class="text-center">No se encontraron resultados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Desarrollado por Jesus Arturo Cisneros Cantero Supervisado por Damian Martinez Magliocca</span>
        <br>
        <span class="text-muted">En colaboración con: Julio Cesar Padilla Alva, Martha Karina Teran Botello, y Carlos García</span>
    </div>
</footer>

<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>
</html>
