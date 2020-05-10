<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");

if(empty($_POST["denominacion"]) || $_FILES["imagen"]["size"] == "0" ):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El nombre del escenario y la imagen son obligatorios";
    header("Location:../index.php?seccion=agregar_escenario");
    die();
endif;

$denominacion = $_POST["denominacion"];
$origen = $_POST["origen"] ?? "";
$imagen = $_FILES["imagen"];

if($imagen["type"] != "image/png"):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El formato de la imagen debe ser PNG";
    header("Location:../index.php?seccion=agregar_escenario");
    die();
endif;

$nombreCarpeta = crear_denominacion_escenario($denominacion);


if(is_dir("../escenarios/$nombreCarpeta")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El escenario ya está creado. Probà con otro.";
    header("Location:../index.php?seccion=agregar_escenario");
    die();
endif;


mkdir("../../escenarios/$nombreCarpeta");


if(!empty($origen)):
    file_put_contents("../../escenarios/$nombreCarpeta/origen.txt",$origen);
endif;


move_uploaded_file($imagen["tmp_name"],"../../escenarios/$nombreCarpeta/$nombreCarpeta.png");


$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El escenario fue creado con èxito";
header("Location:../index.php?seccion=listado_escenarios");