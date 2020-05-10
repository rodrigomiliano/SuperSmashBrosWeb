<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");

if(empty($_POST["id"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El escenario <b>$_POST[id]</b> no existe";
    header("Location: ../index.php?seccion=listado_escenarios");
    die();
endif;

$escenarios = $_POST["id"];

if(!is_dir(RUTA_ESCENARIOS . "/$escenarios")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El escenario <b>$_POST[id]</b> no existe";
    header("Location: ../index.php?seccion=listado_escenarios");
    die();
endif;

unlink(RUTA_ESCENARIOS . "/$escenarios/$escenarios.png");

if(file_exists(RUTA_ESCENARIOS . "/$escenarios/origen.txt"))
    unlink(RUTA_ESCENARIOS . "/$escenarios/origen.txt");

rmdir(RUTA_ESCENARIOS . "/$escenarios");


$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El escenario <b>" . mostrar_denominacion_escenario($escenarios) . "</b> fue eliminado con èxito";

header("Location: ../index.php?seccion=listado_escenarios");