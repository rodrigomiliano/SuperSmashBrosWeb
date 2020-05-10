<div class="container my-5"> 
         <div class="row">
            <div class="col-12">
                <?php
                    if(!empty($_GET["estado"]) && $_GET["estado"] == "ok"):
                        if(!empty($_GET["ok"])):                            
                ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Éxito!</strong> Diste de alta un nuevo combatiente.
                        </div>

                <?php
                        endif;
                    endif;
                ?>
            </div>
        </div>


    <div class="row mt-4 justify-content-center">
       <div class="col-10">     
          <h1 class="titulos center-block" id="combatientes">Combatientes</h1>
            <p>La lista total hasta la fecha de personajes jugables en Ultimate es 74, contando los 4 DLC, el número más alto de personajes jugables de todos los videojuegos de Super Smash Bros.</p>
            <ul class="justify-content-start text-align-left">
                <li>Personajes iniciales: Mario, Donkey kong, Link, Samus, Yoshi, Kirby, Fox y Pikachu.</li>
                <li>Personajes DLC: Planta Piraña, Joker, Hèroe y Banjo & Kazooie.</li>
                <li>El resto de los personajes se desbloquean jugando el modo historia.</li>          
            </ul>
       </div>
    </div>

</div>

    <!-- EX ARRAY DE COMBATIENTES (TP1)
    <div class="row justify-content-center">
             <?php
               foreach($combatientesArray as $combatienteArray):                    
             ?>
                   <div class="col-3">
                       <img src="<?= $combatienteArray["url"]; ?>" alt="<?= $combatienteArray["nombre"]; ?>" class="img-fluid">
                       <h2 class="h3"><?= $combatienteArray["nombre"]; ?></h2>
                       <p class="text-muted"><?= empty($combatienteArray["dlc"]) ? "" : $combatienteArray["dlc"]; ?></p>
                       <p><?= $combatienteArray["descripcion"]; ?></p>                      
                       <a class="nav-link" target="_blank" href="<?php echo $combatienteArray["video"]; ?>"><?php echo $combatienteArray["video"]; ?></a> 
                   </div>
             <?php
               endforeach;
             ?>
    </div>    -->


<div class="container my-5">          
    <div class="row">
        <?php
            if (is_dir(RUTA_COMBATIENTES)):  
                $carpeta = opendir(RUTA_COMBATIENTES);  
                     while ($nombreCombatientes = readdir($carpeta)):                    
                         if ($nombreCombatientes == "." || $nombreCombatientes == "..") {
                     continue;
                    }
        ?>
             <div class="col-12 col-md-3 my-3">
                 <div class="card-deck">
                     <div class="card border-default">
                         <div class="card-body">                                    
                             <img src="<?= "combatientes/".$nombreCombatientes."/".$nombreCombatientes.".png"; ?>" alt="Foto de <?= mostrar_nombre_combatiente($nombreCombatientes); ?>" class="img-fluid">    
                             <h3 class="card-title text-center mt-2"><?= mostrar_nombre_combatiente($nombreCombatientes); ?></h3>                                        
                             <p class="text-white-50"><?= mostrar_historia(RUTA_COMBATIENTES."/".$nombreCombatientes."/historia.txt"); ?></p>                  
                         </div>
                     </div>
                 </div>
             </div>
        <?php
             endwhile;               
            endif;
        ?>
    </div>
</div>