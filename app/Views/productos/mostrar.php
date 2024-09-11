<!-- Recibe el mensaje de producto guardado-->
<?php if (session('mensaje')) { ?>


    <div class="alert alert-info" role="alert">
        <?php echo session('mensaje'); ?>
    </div>


<?php } ?>
<div class="container" >
    
    <h1>Tabla Productos</h1>

    <table class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Ajustes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campos as $campo) : ?>
                <tr>
                    <td><?php echo $campo['codigo']; ?></td>
                    <td><?php echo $campo['nombre'];  ?></td>
                    <td><?php echo $campo['descripcion']; ?></td>
                    <td><?php echo $campo['precio']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a type="button" class="btn btn-outline-success" href="<?php echo base_url('/producto/editar/' . $campo['id']); ?>">Editar</a> 
                            <a img src="/app/Imagenes/eliminar.jpg" widh="50px" height="50px"  type="button" class="btn btn-outline-danger" href="<?php echo base_url('/producto/borrar/' . $campo['id']); ?>">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?php echo base_url('/producto/crear');  ?> " class="btn btn-outline-info">Nuevo Producto</a>
</div>