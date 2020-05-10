<?php
    require_once("../../config/config.php");
    require_once("../../config/funciones.php");

echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
echo "</pre>";

if(empty($_POST["id"]) || !is_dir(RUTA_COMBATIENTES . "/" . $_POST["id"]) ):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El combatiente <b>$_POST[id]</b> no existe";
    header("Location:../index.php?seccion=listado_combatientes");    
    die();
endif;

if(empty($_POST["nombre"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El nombre del combatiente y la imagen son obligatorios";
    header("Location: ../index.php?seccion=agregar_combatiente&id=$combatientes");
    die();
endif;

$combatientes = $_POST["id"];
$nombre = $_POST["nombre"];
$nombreNuevo = crear_nombre_combatiente($nombre);

if($_FILES["imagen"]["size"] > 0):
    if($_FILES["imagen"]["type"] != "image/png"):
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "El formato de la imagen debe ser PNG";
        header("Location:../index.php?seccion=agregar_combatiente&id=$combatientes");
        die();        
    endif;    
    move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_COMBATIENTES . "/$combatientes/$combatientes.png");  
endif;

rename(RUTA_COMBATIENTES . "/$combatientes", RUTA_COMBATIENTES . "/$nombreNuevo");

rename(RUTA_COMBATIENTES . "/$nombreNuevo/$combatientes.png",RUTA_COMBATIENTES . "/$nombreNuevo/$nombreNuevo.png");


if(!empty($_POST["historia"])):
    file_put_contents(RUTA_COMBATIENTES . "/$nombreNuevo/historia.txt", $_POST["historia"]);
endif;

$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El personaje <b>" . mostrar_nombre_combatiente($nombreNuevo) . "</b> se modificó con èxito";

header("Location: ../index.php?seccion=listado_combatientes&estado=ok&ok=combatiente_modificado");