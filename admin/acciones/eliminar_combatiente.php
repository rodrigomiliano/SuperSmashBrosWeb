<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");

if(empty($_POST["id"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El combatiente <b>$_POST[id]</b> no existe";
    header("Location: ../index.php?seccion=listado_combatientes");
    die();
endif;

$combatientes = $_POST["id"];

if(!is_dir(RUTA_COMBATIENTES . "/$combatientes")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El combatiente <b>$_POST[id]</b> no existe";
    header("Location: ../index.php?seccion=listado_combatientes");
    die();
endif;

unlink(RUTA_COMBATIENTES . "/$combatientes/$combatientes.png");

if(file_exists(RUTA_COMBATIENTES . "/$combatientes/historia.txt"))
    unlink(RUTA_COMBATIENTES . "/$combatientes/historia.txt");

rmdir(RUTA_COMBATIENTES . "/$combatientes");


$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "El combatiente <b>" . mostrar_nombre_combatiente($combatientes) . "</b> fue eliminado con èxito";

header("Location: ../index.php?seccion=listado_combatientes");