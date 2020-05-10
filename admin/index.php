<!DOCTYPE html>

<?php
    require_once("../config/config.php");
    require_once("../config/arrays.php");
    require_once("../config/funciones.php");

    if(!is_admin()):
        header("Location:../index.php?estado=error&error=acceso");
        die();
    endif;

    $seccion = $_GET["seccion"] ?? "listado_combatientes";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Super Smash Bros</title>    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

</head>

<body>    
    <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav mr-auto">

            <?php
                foreach($navbarPanel as $url => $nombre):
            ?>
                    <li class="nav-item <?= $seccion == $url ? "active" : "" ?>">
                    <a class="nav-link" href="index.php?seccion=<?= $url; ?>"><?= $nombre; ?></a>
                    </li> 
                <?php   
                 endforeach;                
                ?>
            </ul>



            <ul class="navbar-nav mr-0">

                <li class="nav-item">
                    <a href="index.php" class="nav-link"><?= $_SESSION["usuario"]["usuario"]; ?></a>
                </li>

                <li class="nav-item">
                    <a href="../acciones/salir.php" class="nav-link">Salir</a>
                </li>
            </ul>


        </div>
    </nav>

    <?php       
        mostrar_cartel_mensajes();

        if(file_exists("secciones/$seccion.php")):
            require_once("secciones/$seccion.php");
        else:
            require_once("secciones/error.php");
        endif;
    ?>
    
    <div class="container-fluid px-0">
        <footer class="smashfooter">
            <div class="row mx-0">
                <div class="col-12 px-0">
                    <p class="text-center">Super Smash Bros web - 2019 - Rodrigo Miliano</p>
                </div>
            </div>
        </footer>
    </div>


    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.4.0/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    
    <script>

let formBorrar = document.querySelectorAll(".eliminarCombatienteEscenario");

for(let i = 0; i < formBorrar.length; i++){

    formBorrar[i].addEventListener("submit", function(evento){
       
        evento.preventDefault();

        Swal.fire({
            title: '¿De verdad desea eliminar el combatiente/escenario?',
            text: "Ojo, esta acción no se puede deshacer!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, claro que si!',
            cancelButtonText: 'Nooooooo'
        }).then((result) => {
                        
            if (result.value) { 
                
                Swal.fire(
                    'Eliminado!',
                    'El combatiente/escenario fue eliminado de manera satisfactoria',
                    'success'
                    ).then(($ok) => {                        
                        this.submit();
                    })
                }

            })
        })
        
}


$(document).ready(function() {

    $('#tablaCombatientesEscenarios').DataTable({
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
         }
    });
} );


</script>


</body>

    

</html>