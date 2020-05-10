<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center my-3 py-3" id="escenarios">
                Listado de escenarios actuales
            </h2>
        </div>
    </div>


    <div class="row my-5 justify-content-end">
        <div class="col-auto">
            <a href="index.php?seccion=agregar_escenario" class="btn btn-success btn-lg">Agregar escenario</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            
            <table id="tablaCombatientesEscenarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Denominación</th>
                        <th>Origen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (is_dir(RUTA_ESCENARIOS)):
                        $carpeta = opendir(RUTA_ESCENARIOS);

                        while ($denominacionEscenarios = readdir($carpeta)):
                            if ($denominacionEscenarios == "." || $denominacionEscenarios == "..") {
                                continue;
                            }                                
                ?>
                            <tr>
                                <td><img src="../escenarios/<?= $denominacionEscenarios."/".$denominacionEscenarios.".png" ?>" alt="<?= mostrar_denominacion_escenario($denominacionEscenarios); ?>" width="50"></td>
                                <td><?= mostrar_denominacion_escenario($denominacionEscenarios); ?></td>
                                <td><?= mostrar_origen(RUTA_ESCENARIOS."/".$denominacionEscenarios."/origen.txt"); ?></td>                                
                                <td>                                
                                    <div class="btn-group" role="group" aria-label="">
                                        <a type="button" class="btn btn-info btn-lg" href="index.php?seccion=agregar_escenario&id=<?= $denominacionEscenarios; ?>">Modificar</a>                                    
                                        <form class="eliminarCombatienteEscenario" action="acciones/eliminar_escenario.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $denominacionEscenarios; ?>">
                                            <button type="submit" class="btn btn-secondary btn-lg">Eliminar</button>
                                        </form>
                                    </div>                                
                                </td>
                            </tr>
                <?php
                        endwhile;
                    else:
                ?>
                        <tr>
                            <td colspan="4"><p class="text-danger text-center">Ups! Todavía no hay escenarios cargados.</p></td>
                        </tr>
                <?php
                    endif;
                ?>                        
                </tbody>
            </table>
        </div>
    </div>
</div>