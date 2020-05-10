<?php

session_start();

$config = $_SERVER["HTTP_HOST"] == "localhost" ? parse_ini_file(__DIR__."/../desarrollo.ini",true) : parse_ini_file(__DIR__."/../produccion.ini",true);

error_reporting($config["ERRORES"]["tipos"]);
ini_set("display_errors",$config["ERRORES"]["display"]);

date_default_timezone_set($config["TIMEZONE"]["zona"]);

define("RUTA_COMBATIENTES", __DIR__ . "/../" . $config["COMBATIENTES"]["ruta_imagenes"]);

define("RUTA_ESCENARIOS", __DIR__ . "/../" . $config["ESCENARIOS"]["ruta_imagenes"]);

define("RUTA_USUARIOS", __DIR__ . "/../" . $config["USUARIOS"]["ruta_usuarios"]);

ini_set("upload_max_filesize",$config["CONFIGURACIONES"]["max_size"]);