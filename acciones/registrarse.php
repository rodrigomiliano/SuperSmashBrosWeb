<?php

require_once("../config/config.php");
require_once("../config/funciones.php");


if(empty($_POST["email"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos e-mail y password son obligatorios";
    header("Location:../index.php?seccion=registrarse");
    die();
endif;

$email = $_POST["email"];
$password = $_POST["password"];

$nuevoUsuario = explode("@",$email)[0];

$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $nuevoUsuario;

if(is_dir(RUTA_USUARIOS . "/$email")):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Ese usuario ya existe en el sitio, por favor intentar con otro nombre";
    header("Location:../index.php?seccion=registrarse");
    die();
endif;

mkdir(RUTA_USUARIOS . "/$email");

file_put_contents(RUTA_USUARIOS . "/$email/usuario.txt", $usuario);

file_put_contents(RUTA_USUARIOS . "/$email/perfil.txt", "usuario");

$password = password_hash($password, PASSWORD_DEFAULT);

file_put_contents(RUTA_USUARIOS . "/$email/password.txt",$password);

$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Registro exitoso, ahora tienes que ingresar con tus datos";

header("Location: ../index.php?seccion=ingresar");