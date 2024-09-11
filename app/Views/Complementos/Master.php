<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $this->renderSection('Title'); ?> - FORMULARIOS </title>
    <meta charset="utf-8">
    <meta name="description" content="Demo">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#009688">
    
    <!-- CSS de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.min.css">
    
    <!-- Otros CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/sweetalert2.min.css">
    <link href="https://framework-gb.cdn.gob.mx/gm/v4/css/main.css" rel="stylesheet">
    
    <!-- JavaScript Base URL -->
    <script>
        const base_url = "<?= base_url(); ?>"
    </script>

    <?= $this->renderSection('HeadContent'); ?>
</head>
<body class="">
    <?= $this->include('Complementos/Menu'); ?>
    <main class="bd-content p-5">
        <?= $this->renderSection('MainContent'); ?>
    </main>
    <div id="cuerpo-content"></div>
    
    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.js"></script>
    
    <!-- JavaScript de DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.min.js"></script>
    
    <!-- Otros JavaScript -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/fontawesome.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gm/v4/js/gobmx.js"></script>

    <?= $this->renderSection('FooterContent'); ?>
</body>
</html>
