
<?php $idRolUsr = session()->get('_id_facultado'); ?>

<nav class="navbar navbar-expand-md navbar-dark bg-light sub-navbar navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#subNavBarDropdown"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand sub-navbar" href="#">PROFEDET</a>
        <div class="collapse navbar-collapse" id="subNavBarDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . '' ?>">Inicio</a>
                </li>
                <!-- <?php if ($idRolUsr >= 4) { ?>
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_5' ?>">Modulo 5</a>
                </li>
                <?php } ?>
                <?php if ($idRolUsr >= 3) { ?>
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_4' ?>">Modulo 4</a>
                </li>
                <?php }
                if ($idRolUsr >= 2) { ?>
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_3' ?>">Modulo 3</a>
                </li>
                <?php }
                if ($idRolUsr == 5) { ?>
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_2' ?>">Modulo 2</a>
                </li>
                <?php } ?> -->
                <li class="nav-item dropdown">
                    <a class="nav-link subnav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catálogos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" role="menu">
                        <li> <a class="dropdown-item" href="<?= base_url() . 'Areas/VerAreas' ?>">Ver Areas</a></li>
                        <li> <a class="dropdown-item" href=" <?= base_url() . 'Procuradurias/VerProcuradurias' ?>"> Ver Procuradurias</a> </li>
                        <li> <a class="dropdown-item" href=" <?= base_url() . 'Entidades/VerEntidades' ?>"> Ver Entidades</a> </li>
                        <li>  <a class="dropdown-item" href=" <?= base_url() . 'TipoFacultado/VerTipoFacultado' ?>"> Ver Tipo Facultados</a> </li>
                        <li> <a class="dropdown-item" href=" <?= base_url() . 'Perfiles/VerPerfiles' ?>"> Ver Perfiles</a></li>
                        <!--<a class="dropdown-item" href=" <?= base_url() . 'Usuario/VerUsuarios' ?>"> Ver Usuarios</a>
                        <a class="dropdown-item" href=" <?= base_url() . 'EstadoCivil/VerEstadoCivil' ?>"> Ver
                            EstadoCivil</a>-->
                        <!-- <a class="dropdown-item" href=" <?= base_url() . 'Empleado/VerEmpleado' ?>"> Ver Empleado</a>---------------------Sin uso por el momento Falta implementar
                       
                        <a class="dropdown-item" href=" <?= base_url() . 'NivelSeguridad/VerNivelSeguridad' ?>"> Ver
                            Nivel de Seguridad</a>
                        <a class="dropdown-item" href=" <?= base_url() . 'Visitante/VerVisitante' ?>"> Ver Visitante</a>
                        <a class="dropdown-item" href=" <?= base_url() . 'Facultados/VerFacultados' ?>"> Ver
                            Facultados</a>
                        <a class="dropdown-item" href=" <?= base_url() . 'Pantallas/VerPantallas' ?>"> Ver Pantallas</a>-->
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() ?>Salir">Salir</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
