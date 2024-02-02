<?php
session_start();
$url_base="http://localhost/SIC/";

if(!isset ($_SESSION['Nombreusuario'])){
    header("Location:".$url_base."login.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
          <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
     crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>  
    $(document).ready(function(){
    $("#tabla_id").DataTable({
        "pageLength":3,
        LengthMenu:[
            [3,10,15,20],
            [3,10,15,20]
        ],
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
        }
    })
    })

    </script> 

    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Sistema <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>secciones/residentes/">Residentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>secciones/visitantes/">Visitantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>secciones/vehiculos/">Vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>secciones/apartamentos/">Apartamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>secciones/usuarios/">Usarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_base;?>cerrar.php/">Cerrar sesion</a>
                </li>
            </ul>
        </nav>

        <main class="container">
        