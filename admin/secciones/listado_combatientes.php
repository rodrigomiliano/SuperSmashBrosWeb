<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center my-3 py-3" id="combatientes"> 
                Listado de combatientes actuales
            </h2>
        </div>
    </div>


    <div class="row my-5 justify-content-end">
        <div class="col-auto">
            <a href="index.php?seccion=agregar_combatiente" class="btn btn-success btn-lg">Agregar combatiente</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            
            <table id="tablaCombatientesEscenarios" class="table table-striped">  
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Historia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (is_dir(RUTA_COMBATIENTES)):
                        $carpeta = opendir(RUTA_COMBATIENTES);

                        while ($nombreCombatientes = readdir($carpeta)):
                            if ($nombreCombatientes == "." || $nombreCombatientes == "..") {
                                continue;
                            }                                
                ?>
                            <tr>
                                <td><img src="../combatientes/<?= $nombreCombatientes."/".$nombreCombatientes.".png" ?>" alt="<?= mostrar_nombre_combatiente($nombreCombatientes); ?>" width="50"></td>
                                <td><?= mostrar_nombre_combatiente($nombreCombatientes); ?></td>
                                <td><?= mostrar_historia(RUTA_COMBATIENTES."/".$nombreCombatientes."/historia.txt"); ?></td>                                
                                <td>                                
                                    <div class="btn-group" role="group" aria-label="">
                                        <a type="button" class="btn btn-info btn-lg" href="index.php?seccion=agregar_combatiente&id=<?= $nombreCombatientes; ?>">Modificar</a>                                    
                                        <form class="eliminarCombatienteEscenario" action="acciones/eliminar_combatiente.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $nombreCombatientes; ?>">
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
                            <td colspan="4"><p class="text-danger text-center">Ups! Todavía no hay combatientes cargados.</p></td>
                        </tr>
                <?php
                    endif;
                ?>                        
                </tbody>
            </table>
        </div>
    </div>
</div>