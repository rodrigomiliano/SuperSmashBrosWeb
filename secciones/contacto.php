<div class="container">
	<div class="row justify-content-center my-5">
		<div class="col-6">			
			<h1 class="titulos center-block"></i>Contacto</h1>
            
			<?php
                if(!empty($_GET["error"])):
                   $error = $_GET["error"];
                if($error == "campos_obligatorios"):
               	   $mensaje = "Los campos Nombre, Apellido, Email y Comentarios son obligatorios.";
                endif;
            ?>
	
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		                <span class="sr-only">Close</span>
	                </button>
	                <strong>Error!</strong> <?= $mensaje ?? ""; ?>
                </div>				
	
            <?php
            endif;
            ?>

			<div class="card">
				<div class="card-body">
					<form action="index.php?seccion=procesar" method="post">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
						</div>
                        
						<div class="form-group">
							<label for="apellido">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su Apellido" >
						</div>
												
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su Email" >
						</div>
						
						<div class="form-group">
						    <label for="checkbox">Indique info que desea recibir:</label><br>							
						   	<label>Torneos/eventos <input type="checkbox" name="torneos" /></label><br>
		                    <label>Nuevos personajes <input type="checkbox" name="nuevos" /></label><br>
						    <label>Merchandising <input type="checkbox" name="merchandising" /></label><br>
						    <label>Otro <input type="checkbox" name="otro" /></label>
                        </div>

						<div class="form-group">
						     <label for="textarea">Dejanos tu comentario</label>
						     <textarea class="form-control" name="comentario" id="textarea" rows="3" placeholder="Hola!"></textarea>
						</div>

						<button type="submit" class="btn btn-primary btn-block">Enviar</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>