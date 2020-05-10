<?php
    $titulo = "Agregar un nuevo combatiente";
    $submit = "Agregar combatiente";
    $action = "agregar_combatiente";

    if(!empty($_GET["id"])):
        
        $combatientes = $_GET["id"];
        
        if(!is_dir(RUTA_COMBATIENTES . "/$combatientes")):
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "El combatiente <b>$_GET[id]</b> no existe";

            header("Location:index.php?seccion=listado_combatientes");
            die();
        endif;

        $titulo = mostrar_nombre_combatiente($combatientes);
        $submit = "Modificar combatiente";
        $action = "modificar_combatiente";

    endif;
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="titulos center-block"><?= $titulo; ?></h2>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row  justify-content-center my-5">
            
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="acciones/<?= $action; ?>.php" method="post" enctype="multipart/form-data">
                            <?php
                                if(isset($combatientes)):
                            ?>
                                <input type="hidden" name="id" value="<?= $combatientes; ?>">
                            <?php
                                endif;
                            ?>
                          
                            <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del combatiente" value="<?= isset($combatientes) ? mostrar_nombre_combatiente($combatientes) : ""; ?>">
                            </div>

                            <div class="form-group">
                              <label for="imagen">Imagen</label>
                              <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                              <small id="fileHelpId" class="form-text ">La imagen debe ser horizontal y el formato debe ser <b>PNG</b></small>
                              <?php
                                if(isset($combatientes)):
                              ?>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="<?= "../combatientes/$combatientes/$combatientes.png" ?>" alt="<?= mostrar_nombre_combatiente($combatientes); ?>" class="img-fluid img-rounded">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                    
                              <?php
                                endif;
                              ?>
                            </div>

                            <div class="form-group">
                              <label for="historia">Historia</label>
                              <textarea class="form-control" name="historia" id="historia" rows="6"><?php

                                  if(isset($combatientes)) echo mostrar_historia(RUTA_COMBATIENTES . "/$combatientes/historia.txt",false);?></textarea>
                            </div>

                            <button class="btn btn-primary btn-block"><?= $submit; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>              
    </div>