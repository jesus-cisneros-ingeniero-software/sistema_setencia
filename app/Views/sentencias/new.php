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
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">




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
       <!-- <li class="nav-item"><a href="<?= base_url('/register') ?>" class="nav-link"> Registro</a></li>-->
          <!--<li class="nav-item"><a href="<?= base_url('/sentencias/advancedSearch') ?>" class="nav-link"> Busqueda Avanzada </a></li>-->
          <li class="nav-item"><a href="<?= base_url('/sentencias') ?>" class="nav-link"> Busqueda </a></li>

      </ul>
    </nav>
  </div>
</header>


<body background="<?= base_url('/assets/img/fondoprop.png') ?>">

<script>
    function mostrarOpciones() {
        var select1 = document.getElementById("opciones");
        var select2Container = document.getElementById("opciones2-container");
        var select2 = document.getElementById("opciones2");

        if (select1.value === "DAM") {
            // Llenar las opciones para el segundo select
            select2.innerHTML = "";
            select2.innerHTML +=
                '<option value="SAS" > Subdirección de Asesoría </option>';
            // Mostrar el segundo select
            select2Container.style.display = "block";
        } else if (select1.value === "DRJ") {
            // Llenar las opciones para el segundo select
            select2.innerHTML = "";
            select2.innerHTML +=
                '<option value="SRJ" > Subdirección de Representación Jurídica </option>';
            select2.innerHTML +=
                '<option value="SAM">Subdirección de Amparos </option>';
            // Mostrar el segundo select
            select2Container.style.display = "block";
        } else if (select1.value === "DZN") {
            // Llenar las opciones para el segundo select
            select2.innerHTML = "";
            select2.innerHTML +=
                '<option value="CHI">Procuraduría Foránea en Chihuahua</option>';
            select2.innerHTML +=
                '<option value="CDJ">Procuraduría Foránea en Ciudad Juarez</option>';
            select2.innerHTML +=
                '<option value="CDV">Procuraduría Foránea en Ciudad Victoria </option>';
            select2.innerHTML +=
                '<option value="CUL">Procuraduría Foránea en Culiacán </option>';
            select2.innerHTML +=
                '<option value="DGO">Procuraduría Foránea en Durango </option>';
            select2.innerHTML +=
                '<option value="ENS">Procuraduría Foránea en Ensenada</option>';
            select2.innerHTML +=
                '<option value="GYS">Procuraduría Foránea en Guaymas</option>';
            select2.innerHTML +=
                '<option value="HMO"> Procuraduría Foránea en Hermosillo </option>';
            select2.innerHTML +=
                '<option value="PAR">Procuraduría Foránea en Hidalgo de Parral</option>';
            select2.innerHTML +=
                '<option value="PAZ">Procuraduría Foránea en La Paz </option>';
            select2.innerHTML +=
                '<option value="MZN">Procuraduría Foránea en Mazatlán</option>';
            select2.innerHTML +=
                '<option value="MXL">Procuraduría Foránea en Mexicali</option>';
            select2.innerHTML +=
                '<option value="NLE">Procuraduría Foránea en Nuevo León </option>';
            select2.innerHTML +=
                '<option value="REY">Procuraduría Foránea en Reynosa</option>';
            select2.innerHTML +=
                '<option value="SAL">Procuraduría Foránea en Saltillo</option>';
            select2.innerHTML +=
                '<option value="TMP">Procuraduría Foránea en Tampico</option>';
            select2.innerHTML +=
                '<option value="TIJ">Procuraduría Foránea en Tijuana</option>';
            select2.innerHTML +=
                '<option value="TOR">Procuraduría Foránea en Torreón</option>';
            // Mostrar el segundo select
            select2Container.style.display = "block";
        } else if (select1.value === "DZC") {
            // Llenar las opciones para el segundo select
            select2.innerHTML +=
                '<option value="AGS">Procuraduría Foránea en Aguascalientes </option>';
            select2.innerHTML +=
                '<option value="COL">Procuraduría Foránea en Colima </option>';
            select2.innerHTML +=
                '<option value="GDL">Procuraduría Foránea en Guadalajara</option>';
            select2.innerHTML +=
                '<option value="GTO">Procuraduría Foránea en Guanajuato</option>';
            select2.innerHTML +=
                '<option value="MOR">Procuraduría Foránea en Morelia</option>';
            select2.innerHTML +=
                '<option value="PAC">Procuraduría Foránea en Pachuca</option>';
            select2.innerHTML +=
                '<option value="PUE">Procuraduría Foránea en Puebla</option>';
            select2.innerHTML +=
                '<option value="QRO">Procuraduría Foránea en Querétaro</option>';
            select2.innerHTML +=
                '<option value="SLP">Procuraduría Foránea en San Luis Potosí</option>';
            select2.innerHTML +=
                '<option value="TEP">Procuraduría Foránea en Tepic</option>';
            select2.innerHTML +=
                '<option value="TLA">Procuraduría Foránea en Tlaxcala/option>';
            select2.innerHTML +=
                '<option value="TOL">Procuraduría Foránea en Toluca </option>';
            select2.innerHTML +=
                '<option value="ZAC">Procuraduría Foránea en Zacatecas</option>';

            select2Container.style.display = "block";
        } else if (select1.value === "DZS") {
            // Llenar las opciones para el segundo select
            select2.innerHTML = "";
            select2.innerHTML +=
                '<option value="ACP">Procuraduría Foránea en Acapulco</option>';
            select2.innerHTML +=
                '<option value="CAM">Procuraduría Foránea en Campeche </option>';
            select2.innerHTML +=
                '<option value="CUN">Procuraduría Foránea en Cancún </option>';
            select2.innerHTML +=
                '<option value="CTM">Procuraduría Foránea en Chetumal </option>';
            select2.innerHTML +=
                '<option value="CTZ">Procuraduría Foránea en Ciudad del Carmen</option>';
            select2.innerHTML +=
                '<option value="CVA">Procuraduría Foránea en Coatzacoalcos </option>';
            select2.innerHTML +=
                '<option value="MER">Procuraduría Foránea en Cuernavaca</option>';
            select2.innerHTML +=
                '<option value="OAX">Procuraduría Foránea en Mérida</option>';
            select2.innerHTML +=
                '<option value="ORI">Procuraduría Foránea en Oaxaca</option>';
            select2.innerHTML +=
                '<option value="POZ">Procuraduría Foránea en Poza Rica</option>';
            select2.innerHTML +=
                '<option value="TGZ">Procuraduría Foránea en Tuxtla Gutiérrez</option>';
            select2.innerHTML +=
                '<option value="VER">Procuraduría Foránea en Veracruz</option>';
            select2.innerHTML +=
                '<option value="VSA">Procuraduría Foránea en Villahermosa</option>';
            select2.innerHTML +=
                '<option value="XAL">Procuraduría Foránea en Xalapa</option>';
            // Mostrar el segundo select
            select2Container.style.display = "block";
        } else {
            // Ocultar el segundo select si no hay selección
            select2Container.style.display = "none";
        }
    }

    function mostrarOpciones2() {
        var select2 = document.getElementById("opciones2");
        var select3Container = document.getElementById("opciones3-container");
        var select3 = document.getElementById("opciones3");
        // ZONA CENTRO
        if (select2.value === "AGS") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML += '<option value="TLF1"> 1ER TRIBUNAL LAB FED IND';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED IND</option>';
            select3.innerHTML += '<option value="J24"> JUNTA 24</option>';

            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "COL") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="COL">TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J57">JUNTA 57</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "GDL") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF4"> 4TO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF5"> 5TO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF6"> 6TO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF7"> 4TO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF8"> 4TO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J17">JUNTA 17</option>';
            select3.innerHTML += '<option value="J18">JUNTA 18</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "GTO") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF4"> 4TO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J18  ">JUNTA 18</option>';
            select3.innerHTML += '<option value="J28  ">JUNTA 28</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "MOR") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J30  ">JUNTA 30</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "PAC") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3ER TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J51  ">JUNTA 51</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "PUE") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF4"> 4TO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J33 ">JUNTA 33</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "QRO") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J50 ">JUNTA 50</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "SLP") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3DO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J34 ">JUNTA 34</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "TLA") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3DO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J46 ">JUNTA 46</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "TEP") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF"> RIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J61 ">JUNTA 61</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "TOL") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF3"> 3DO TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J29 ">JUNTA 29</option>';
            // Mostrar el tercer select
        } else if (select2.value === "ZAC") {
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIB LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2ER TRIB LAB FED INVD </option>';
            select3.innerHTML += '<option value="J53">JUNTA 53</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        // ZONA NORTE
        else if (select2.value === "CHI") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED INVD>';
            select3.innerHTML += '<option value="J26">JUNTA 26</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CDJ") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF3"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED INVD>';
            select3.innerHTML += '<option value="J55">JUNTA 55</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "CDV") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J37">JUNTA 37</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "CUL") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J35">JUNTA 35</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }  else if (select2.value === "DGO") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J27">JUNTA 27</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "ENS") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J40">JUNTA 40</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "HMO") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1"> 1ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J23">JUNTA 23</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "PAZ") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF"> TRIBUNAL LAB FED INVD </option>';

            select3.innerHTML += '<option value="J58">JUNTA 58</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        }
        else if (select2.value === "ACP") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF"> TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J43">JUNTA 43</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "ACP") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF"> TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J43">JUNTA 43</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CAMP") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1">  1ER TRIBUNAL LAB FED IND </option>';
            select3.innerHTML +=
                '<option value="TL2F"> 2DO  TRIBUNAL LAB FED IND</option>';
            select3.innerHTML += '<option value="J8">JUNTA 48</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CUN") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF">  TRIBUNAL LAB FED IND </option>';
            select3.innerHTML += '<option value="J8">JUNTA 21</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CDC") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF3">   3.ER TRIBUNAL LAB FED IND  </option>';
            select3.innerHTML +=
                '<option value="TLF4">   4TO TRIBUNAL LAB FED IND  </option>';
            select3.innerHTML +=
                '<option value="TLF5">   5TO TRIBUNAL LAB FED IND  </option>';
            select3.innerHTML += '<option value="J52">JUNTA 52</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CTM") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF">  TRIBUNAL LAB FED IND </option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CTZ") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1">  1ER TRIBUNAL LAB FED IND </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO  TRIBUNAL LAB FED IND</option>';
            select3.innerHTML += '<option value="J38">JUNTA 38</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "CVA") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF1">  1ER TRIBUNAL LAB FED IND </option>';
            select3.innerHTML +=
                '<option value="TLF2"> 2DO  TRIBUNAL LAB FED IND</option>';
            select3.innerHTML += '<option value="J31">JUNTA 31</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "XAL") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF6">   6TO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF7">  7MO TRIBUNAL LAB FED INVD</option>';
            select3.innerHTML +=
                '<option value="TLF8">   8VO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF9">  9NO TRIBUNAL LAB FED INVD</option>';
            select3.innerHTML += '<option value="J22">JUNTA 22</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "XAL") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF3">    3ER TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF4">   4TO TRIBUNAL LAB FED INVD</option>';
            select3.innerHTML +=
                '<option value="TLF5">    5TO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML += '<option value="J45">JUNTA 45</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else if (select2.value === "VSA") {
            // Llenar las opciones para el tercer select
            select3.innerHTML = "";
            select3.innerHTML +=
                '<option value="TLF2">     2DO TRIBUNAL LAB FED IND  </option>';
            select3.innerHTML +=
                '<option value="TLF3">    3ER TRIBUNAL LAB FED IND</option>';
            select3.innerHTML +=
                '<option value="TLF4">     4TO TRIBUNAL LAB FED IND </option>';
            select3.innerHTML +=
                '<option value="TLF5">    5TO TRIBUNAL LAB FED INVD </option>';
            select3.innerHTML +=
                '<option value="TLF6">     6TO TRIBUNAL LAB FED IND </option>';
            select3.innerHTML += '<option value="J36BIS">JUNTA 36 BIS</option>';
            // Mostrar el tercer select
            select3Container.style.display = "block";
        } else {
            // Ocultar el tercer select si no hay selección
            select3Container.style.display = "none";
        }
    }
    function eliminarAcentos(elemento) {
        elemento.value = elemento.value.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase();
    }
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
    <form action="<?= base_url('sentencias/save'); ?>" method="POST" enctype="multipart/form-data">
        <label> Unidad administrativa:</label>
        <select
                id="opciones"
                name="unidadadministartiva"
                onchange="mostrarOpciones()"
        >
            <option value="DAM">Dirección de Asesoría y Mediación</option>
            <option value="DRJ">Dirección de Representación Jurídica</option>
            <option value="DZN">Dirección de Control de Procesos Zona Norte</option>
            <option value="DZC">Dirección de Control de Procesos Zona Centro</option>
            <option value="DZS">Dirección de Control de Procesos Zona Sur</option>
        </select>
        <br>
        <br>
        <div id="opciones2-container" style="display: none">
            <label>Área administrativa:</label>
            <select
                    id="opciones2"
                    name="areaadministrativa"
                    onchange="mostrarOpciones2()"
            >
                <!-- Aquí se llenarán las opciones dinámicamente -->
            </select>

        </div>
        <br>
        <br>
        <div id="opciones3-container" name="tribunal" style="display: none">
            <label>Tribunal Laboral:</label>
            <select id="opciones3"
                    name="tribunal">
                <!-- Aquí se llenarán las opciones dinámicamente -->
            </select>
        </div>
        <div class="fom-group">
        <?php if (!empty($entidades)): ?>
      <label for="entidad_id">Entidades:</label>
            <label for="entidad_id">Entidades:</label>
            <select name="entidad_id" id="entidad_id" class="form-control" required>
                <?php foreach ($entidades as $entidad): ?>
                    <option value="<?= $entidad->strEntFedId; ?>" <?= ($entidad->strEntFedId == 1) ? 'selected' : ''; ?>>
                        <?= $entidad->strEntidad; ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <?php else: ?>
      <p>No se encontraron entidades.</p>
    <?php endif; ?>
        </div>
        <!--aGREGAMOS EL CAMPO TRIBUNALES-->
        <div class="fom-group">
            <label for="NumExpediente">Tribunales:</label>
            <input type="text" name="tribunales" id="tribunales" class="form-control" placeholder=" " required>
        </div>
        <div class="fom-group">
            <label for="NumExpediente">Número de Expediente:</label>
            <input type="text" name="NumExpediente" id="NumExpediente" class="form-control" placeholder="1234" required>
        </div>
        <div class="form-group">
            <label for="NumAno">Año de la Sentencia:</label>
            <input type="text" name="NumAno" id="NumAno" class="form-control" placeholder="2024" required>
        </div>
        <div class="form-group">
            <label for="StrResumen">Resumen:</label>
            <input type="text" name="StrResumen" class="form-control" placeholder="Escribe un resumen" required>
        </div>

        <div class="form-group">
            <label for="juzgador_autocomplete">Seleccionar Juzgador:</label>
            <input type="text" id="juzgador_autocomplete" class="form-control" placeholder="Escriba el nombre del juzgador" autocomplete="off" required>
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
            <textarea name="LITIS" class="form-control" autocomplete="off" required></textarea>
        </div>
        <!-- Campo para cargar el archivo PDF -->
        <div class="form-group">
            <label for="pdf_file">Adjuntar PDF:</label>
            <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf" required> <!-- Aceptar solo archivos PDF -->
        </div>


        <div class="form-group">
            <button type="submit" class="boton">Guardar Sentencia</button>
        </div>
    </form>JuzgadorModel.php
</div>

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
<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>
<footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Desarrollado por Jesus Arturo Cisneros Cantero Supervisado por Damian Martinez Magliocca</span>
            <br>
            <span class="text-muted">En colaboracion con : Julio Cesar Padilla Alva, Martha Karina Teran Botello  y Ivan Ruiz Hernandez</span>
        </div>
</footer>
</html>