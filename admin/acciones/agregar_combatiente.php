<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");

if(empty($_POST["nombre"]) || $_FILES["imagen"]["size"] == "0" ):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El nombre del personaje y la imagen son obligatorios";
    header("Location:../index.php?seccion=agregar_combatiente");    
    die();
endif;

$nombre = $_POST["nombre"];
$historia = $_POST["historia"] ?? "";
$imagen = $_FILES["imagen"];

if($imagen["type"] != "image/png"):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El formato de la imagen debe ser PNG";
    header("Location:../index.php?seccion=agregar_combatiente");    
    die();
endif;

$nombreCarpeta = crear_nombre_combatiente($nombre);


if(is_dir("../combatientes/$nombreCarpeta")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El combatiente ya está creado. Probà con otro.";
    header("Location:../index.php?seccion=agregar_combatiente");    
    die();
endif;


mkdir("../../combatientes/$nombreCarpeta");


if(!empty($historia)):
    file_put_contents("../../combatientes/$nombreCarpeta/historia.txt",$historia);
endif;


move_uploaded_file($imagen["tmp_name"],"../../combatientes/$nombreCarpeta/$nombreCarpeta.png");


$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El combatiente fue creado con èxito";
header("Location:../index.php?seccion=listado_combatientes");