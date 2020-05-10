<!DOCTYPE html>

<?php    
	require_once("config/config.php");
	require_once("config/arrays.php");
    include_once("config/funciones.php");    
    $seccion = $_GET["seccion"] ?? "serie";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Super Smash Bros</title>    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">        
</head>

<body>   
    <header>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <h1 class="m-auto">
                    <a href="index.php"  title='SUPER SMASH BROS.' class='d-block m-auto'>Super Smash Bros</a>
                </h1>
            </div>
        </div>
    </header>

    <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
                
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav mr-auto">
            
                <?php
                 foreach($navbar as $url => $nombre):
                ?>
                    <li class="nav-item <?= $seccion == $url ? "active" : "" ?>">
                    <a class="nav-link" href="index.php?seccion=<?= $url; ?>"><?= $nombre; ?></a>
                    </li> 
                <?php   
                endforeach;
                ?>
            </ul>


            <ul class="navbar-nav mr-0">

            <?php
                if(logueado()):
                    $usuario = $_SESSION["usuario"];
                    if(is_admin()):
            ?>

                        <li class="nav-item">
                            <a href="admin/index.php" class="nav-link"><?= $_SESSION["usuario"]["usuario"]; ?></a>
                        </li>
            <?php
                    else:
            ?>
                        <li class="nav-item">
                            <span class="navbar-text"><?= $_SESSION["usuario"]["usuario"]; ?></span>
                        </li>
            <?php
                    endif;
            ?>

                    <li class="nav-item">
                        <a href="acciones/salir.php" class="nav-link">Salir</a>
                    </li>
            <?php
                else:
            ?>

                <li class="nav-item">
                    <a href="index.php?seccion=ingresar" class="nav-link">Ingresar</a>
                </li>
                
                <li class="nav-item">
                    <a href="index.php?seccion=registrarse" class="nav-link">Registrarse</a>
                </li>
            <?php
                endif;
            ?>
                
            </ul>

        </div>            
    </nav>
	
    <?php      
    mostrar_cartel_mensajes();
       if(file_exists("secciones/$seccion.php")):
           require_once("secciones/$seccion.php");
       else:
           require_once("secciones/error.php");
       endif;
   ?>
	
    <div class="container-fluid px-0">
        <footer class="smashfooter">
            <div class="row mx-0">
                <div class="col-12 px-0">
                    <p class="text-center">Super Smash Bros web - 2019 - Rodrigo Miliano</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>   
</body>

    

</html>