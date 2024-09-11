<div class="container">
    <h1>Crear Producto</h1>

    <?php if (session('mensaje')) { ?>

        <div class="alert alert-danger" role="alert">
            <strong>Campos Vacios</strong><?php echo session('mensaje'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


    <?php } ?>
</div>


<form action="<?php echo base_url('/producto/traer') ?>" method="post">
    <div class="card-body">
        <div class="mb-3 row">
            <label for="codigo" class="form-label">Codigo del Producto</label>
            <input class="form-control" type="codigo" id="codigo" name="codigo" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input class="form-control" type="nombre" id="nombre" name="nombre" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="descripcion" class="form-label">Descripción del Producto</label>
            <input class="form-control" type="descripcion" id="descripcion" name="descripcion" placeholder="Registrar Producto...">

        </div>
        <div class="mb-3 row">
            <label for="precio" class="form-label">Precio del Producto</label>
            <input class="form-control" type="precio" id="precio" name="precio" placeholder="Registrar Producto...">

        </div>
        <input type="submit" value="Guardar" class="btn btn-outline-primary">

        <a href="<?php echo base_url('/producto');  ?> " class="btn btn-outline-danger">Cancelar Producto</a>
    </div>

</form>






