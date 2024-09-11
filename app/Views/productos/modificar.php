<div class="container">
    <h1>Modificar Producto</h1>

    <?php if (session('mensaje')) { ?>

        <div class="alert alert-danger" role="alert">
            <strong>Campos Vacios</strong><?php echo session('mensaje'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


    <?php } ?>
</div>


<form action="<?php echo base_url('/producto/actualizar') ?>" method="post">
    <div class="card-body">

        <input type="hidden" value="<?php echo $traer['id']; ?>" name="id">

        <div class="mb-3 row">
            <label for="codigo" class="form-label">Codigo del Producto</label>
            <input class="form-control" type="codigo" id="codigo" name="codigo" value="<?php echo $traer['codigo']; ?>" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input class="form-control" type="nombre" id="nombre" name="nombre" value="<?php echo $traer['nombre']; ?>" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="descripcion" class="form-label">Descripción del Producto</label>
            <input class="form-control" type="descripcion" id="descripcion" name="descripcion" value="<?php echo $traer['descripcion']; ?>" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="precio" class="form-label">Precio del Producto</label>
            <input class="form-control" type="precio" id="precio" name="precio" value="<?php echo $traer['precio']; ?>" placeholder="Registrar Producto...">

        </div>
        <input type="submit" value="Modificar" class="btn btn-outline-primary">

        <a href="<?php echo base_url('/producto');  ?> " class="btn btn-outline-danger">Cancelar Producto</a>
    </div>

</form>






