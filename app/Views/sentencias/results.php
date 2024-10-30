<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Sentencias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Resultados de Sentencias</h2>
    <table class="table table-bordered">
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
        <?php if (!empty($sentencias)): ?>
            <?php foreach ($sentencias as $sentencia): ?>
                <tr>
                    <td><?= $sentencia['idSentencia'] ?? ''; ?></td>
                    <td><?= $sentencia['NumExpediente'] ?? ''; ?></td>
                    <td><?= $sentencia['NumAno'] ?? ''; ?></td>
                    <td><?= $sentencia['StrResumen'] ?? ''; ?></td>
                    <td><?= $sentencia['StrNombre'] ?? ''; ?></td>
                    <td><?= $sentencia['StrApellidoPaterno'] ?? ''; ?></td>
                    <td><?= $sentencia['StrApellidoMaterno'] ?? ''; ?></td>
                    <td><?= $sentencia['file_name'] ?? ''; ?></td>
                    <td><?= $sentencia['file_path'] ?? ''; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">No se encontraron resultados.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
