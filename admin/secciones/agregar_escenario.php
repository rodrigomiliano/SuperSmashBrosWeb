<?php
    $titulo = "Agregar un nuevo escenario";
    $submit = "Agregar escenario";
    $action = "agregar_escenario";

    if(!empty($_GET["id"])):
        
        $escenarios = $_GET["id"];
        
        if(!is_dir(RUTA_ESCENARIOS . "/$escenarios")):
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "El escenario <b>$_GET[id]</b> no existe";    

            header("Location:index.php?seccion=listado_escenarios");
            die();
        endif;

        $titulo = mostrar_denominacion_escenario($escenarios);
        $submit = "Modificar escenario";
        $action = "modificar_escenario";

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
                                if(isset($escenarios)):
                            ?>
                                <input type="hidden" name="id" value="<?= $escenarios; ?>">
                            <?php
                                endif;
                            ?>
                          
                            <div class="form-group">
                              <label for="denominacion">Denominación</label>
                              <input type="text" class="form-control" name="denominacion" id="denominacion" placeholder="Ingrese denominación del escenario" value="<?= isset($escenarios) ? mostrar_denominacion_escenario($escenarios) : ""; ?>">
                            </div>

                            <div class="form-group">
                              <label for="imagen">Imagen</label>
                              <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                              <small id="fileHelpId" class="form-text ">La imagen debe ser horizontal y el formato debe ser <b>PNG</b></small>
                              <?php
                                if(isset($escenarios)):
                              ?>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="<?= "../escenarios/$escenarios/$escenarios.png" ?>" alt="<?= mostrar_denominacion_escenario($escenarios); ?>" class="img-fluid img-rounded">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                    
                              <?php
                                endif;
                              ?>
                            </div>

                            <div class="form-group">
                              <label for="origen">Origen</label>
                              <textarea class="form-control" name="origen" id="origen" rows="6"><?php

                                  if(isset($escenarios)) echo mostrar_origen(RUTA_ESCENARIOS . "/$escenarios/origen.txt",false);?></textarea>
                            </div>

                            <button class="btn btn-primary btn-block"><?= $submit; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>              
    </div>