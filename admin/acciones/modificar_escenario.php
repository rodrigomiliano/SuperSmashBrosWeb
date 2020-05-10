<?php
    require_once("../../config/config.php");
    require_once("../../config/funciones.php");

echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
echo "</pre>";

if(empty($_POST["id"]) || !is_dir(RUTA_ESCENARIOS . "/" . $_POST["id"]) ):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El escenario <b>$_POST[id]</b> no existe";
    header("Location:../index.php?seccion=listado_escenarios");
    die();
endif;

if(empty($_POST["denominacion"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El nombre del escenario y la imagen son obligatorios";
    header("Location: ../index.php?seccion=agregar_escenario&id=$escenarios");
    die();
endif;

$escenarios = $_POST["id"];
$denominacion = $_POST["denominacion"];
$nombreNuevo = crear_denominacion_escenario($denominacion);

if($_FILES["imagen"]["size"] > 0):
    if($_FILES["imagen"]["type"] != "image/png"):
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "El formato de la imagen debe ser PNG";
        header("Location:../index.php?seccion=agregar_escenario&id=$escenarios");
        die();        
    endif;    
    move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_ESCENARIOS . "/$escenarios/$escenarios.png");  
endif;

rename(RUTA_ESCENARIOS . "/$escenarios", RUTA_ESCENARIOS . "/$nombreNuevo");

rename(RUTA_ESCENARIOS . "/$nombreNuevo/$escenarios.png",RUTA_ESCENARIOS . "/$nombreNuevo/$nombreNuevo.png");


if(!empty($_POST["origen"])):
    file_put_contents(RUTA_ESCENARIOS . "/$nombreNuevo/origen.txt", $_POST["origen"]);
endif;

$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El escenario <b>" . mostrar_denominacion_escenario($nombreNuevo) . "</b> se modificó con èxito";

header("Location: ../index.php?seccion=listado_escenarios&estado=ok&ok=escenario_modificado");