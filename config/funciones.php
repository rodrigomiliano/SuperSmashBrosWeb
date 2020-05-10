<?php
  
function mostrarSerie($versiones){    
   foreach($versiones as $version):
     echo "<h2>" . $version["titulo"] . "</h2>";
     echo "<img src=\"" . $version["url"] . " \" alt=\" " . $version["url"] . "\" class=\"img-fluid\">";
     echo "<p>" . $version["descripcion"] . "</p>";     
   endforeach;
}

function mostrarInfoEscenarios($infoEscenarios){    
  foreach($infoEscenarios as $infoEscenario):
    echo "<h2>" . $infoEscenario["titulo"] . "</h2>";
    echo "<p>" . $infoEscenario["descripcion"] . "</p>";     
  endforeach;
}

function mostrar_nombre_combatiente($nombre){
    $nombre = str_ireplace("_"," ",$nombre);
    return ucwords($nombre);
}

function mostrar_denominacion_escenario($denominacion){
  $denominacion = str_ireplace("_"," ",$denominacion);
  return ucwords($denominacion);
}

function crear_nombre_combatiente($nombre){
  $nombre = str_ireplace(" ","_",$nombre);
  return strtolower($nombre);
}

function crear_denominacion_escenario($denominacion){
  $denominacion = str_ireplace(" ","_",$denominacion);
  return strtolower($denominacion);
}

function mostrar_historia($ruta_historia, $texto = true){  
  if($texto)
      $historia = file_exists($ruta_historia) ? nl2br(file_get_contents($ruta_historia)) : "Se desconoce su historia";
  else
      $historia = file_exists($ruta_historia) ? file_get_contents($ruta_historia) : "";      
  return $historia;
}

function mostrar_origen($ruta_origen, $texto = true){  
  if($texto)
      $origen = file_exists($ruta_origen) ? nl2br(file_get_contents($ruta_origen)) : "Se desconoce su origen";
  else
      $origen = file_exists($ruta_origen) ? file_get_contents($ruta_origen) : "";      
  return $origen;
}


function logueado(){
  return isset($_SESSION["usuario"]);
}

function is_admin(){
  if(!logueado())
      return false;

  return $_SESSION["usuario"]["perfil"] == "admin";
}

function mis_mensajes(){
  return isset($_SESSION["estado"]);
}

function mostrar_cartel_mensajes(){
  if(mis_mensajes()):
      $clase = $_SESSION["estado"] == "error" ? "danger" : "success";

      $respuesta = "<div class='container'><div class='row my-5'><div class='col-12'>
      <div class='alert alert-$clase alert-dismissible fade show' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              <span class='sr-only'>Close</span>
          </button>
          $_SESSION[mensaje]
      </div></div></div></div>";

      unset($_SESSION["estado"]);
  else:
      $respuesta = false;
  endif;

  echo $respuesta;
}