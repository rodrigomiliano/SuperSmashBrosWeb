<div class="container my-5">
    <div class="row mt-4 justify-content-center">
        <div class="col-10">     
            <h1 class="titulos center-block" id="escenarios">Escenarios</h1>
        </div>
    </div>
</div>


<div class="container my-5">          
    <div class="row">
        <?php
            if (is_dir(RUTA_ESCENARIOS)):  
                $carpeta = opendir(RUTA_ESCENARIOS);  
                     while ($denominacionEscenarios = readdir($carpeta)):                    
                         if ($denominacionEscenarios == "." || $denominacionEscenarios == "..") {
                     continue;
                    }
        ?>
             <div class="col-12 col-md-4 my-3">
                 <div class="card-deck">
                     <div class="card border-default">
                         <div class="card-body">                                    
                             <img src="<?= "escenarios/".$denominacionEscenarios."/".$denominacionEscenarios.".png"; ?>" alt="Foto de <?= mostrar_denominacion_escenario($denominacionEscenarios); ?>" class="img-fluid">    
                             <h3 class="card-title text-center mt-2"><?= mostrar_denominacion_escenario($denominacionEscenarios); ?></h3>                                        
                             <p class="text-white-50"><?= mostrar_origen(RUTA_ESCENARIOS."/".$denominacionEscenarios."/origen.txt"); ?></p>                  
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


<div class="container my-5">
    <div class="row">
        <div class="col-12 ">
            <h1 class="titulos center-block">Sobre los escenarios...</h1>
        </div>
    </div>

    <div class="row">

        <div class="card-deck">
            <div class="card border-default">
                <div class="card-body d-flex">

                    <div class="col-6">
                        <?php
                           mostrarInfoEscenarios($infoEscenarios);
                        ?>
                    </div>     
    
                    <div class="col-6  ">
                        <p class="card-title text-center h3">Esto fue creación de un jugador:</p>
                        <img src="img/editor.jpg" alt="Foto de editor de escenario" class="img-fluid">  
                        <p class="card-text text-center">Código: 8KBX8NNT</p>           
                    </div>

                </div>
            </div>       
        </div>

    </div>
</div>      