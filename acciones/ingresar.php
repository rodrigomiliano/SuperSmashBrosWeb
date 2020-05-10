<?php

require_once("../config/config.php");
require_once("../config/funciones.php");

if(empty($_POST["usuario"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los campos usuario/e-mail y contraseña son obligatorios";

    header("Location: ../index.php?seccion=ingresar");
    die();
endif;


$email = $_POST["usuario"];
$password = $_POST["password"];


if(strpos($email,"@") === false)
    $usuario = true;
else
    $usuario = false;


if($usuario):

    $usuarios = glob(RUTA_USUARIOS . "/*/usuario.txt");

    foreach($usuarios as $nombreUsuario):

        $usr = file_get_contents($nombreUsuario);

        if($usr == $email){
            $usuarioIngresar = $usr;
            break;
        }

    endforeach;


    if(isset($usuarioIngresar)){
        $email = dirname($nombreUsuario);
        $email = explode(RUTA_USUARIOS . "/", $email)[1];
    }

endif;


$passwordAnterior = file_get_contents(RUTA_USUARIOS . "/$email/password.txt");

if(!is_dir(RUTA_USUARIOS . "/$email") || !password_verify($password,$passwordAnterior)):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los datos que ingresaste son incorrectos";

    header("Location: ../index.php?seccion=ingresar");

    die();
endif;

$perfil = file_get_contents(RUTA_USUARIOS . "/$email/perfil.txt");
$usuario = file_get_contents(RUTA_USUARIOS . "/$email/usuario.txt");


$_SESSION["usuario"] = [
    "usuario" => $usuario,
    "email" => $email,
    "perfil" => $perfil
];


$_SESSION["estado"] = "ok";
$_SESSION["mensaje"] = "Bienvenido <b>$usuario</b> al equipo de Super Smash Bros";

if($perfil == "admin"):   
    header("Location: ../admin/index.php");
    die();
else:   
    header("Location: ../index.php");
    die();
endif;