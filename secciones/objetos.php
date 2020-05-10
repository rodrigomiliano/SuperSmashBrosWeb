<div class="container my-5">
    <div class="row mt-4 justify-content-center">
        <div class="col-10">     
            <h1 class="titulos center-block">Objetos</h1>
            <p>¡Los objetos que aparecen en el escenario pueden resultar claves para la victoria! Si los usas con cabeza, claro.</p>       
        </div>
    </div>
</div>

<div class="container my-5"> 
    <div class="row">           
        <?php
          foreach($objetosArray as $objetoArray):                    
        ?>
            <div class="col-2">
                <div class="card-body mb-3" style="width: 11rem;">
                    <img src="<?= $objetoArray["url"]; ?>" class="card-img-top" alt="<?= $objetoArray["alt"]; ?>">  
                    <p class="card-text"><?= $objetoArray["nombre"]; ?></p>
                    <p><?= $objetoArray["descripcion"]; ?></p>
                </div>
            </div>
        <?php
          endforeach;
        ?>        
    </div>
</div>