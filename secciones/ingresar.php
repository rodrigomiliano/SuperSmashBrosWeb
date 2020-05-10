<?php
    if(logueado()):      
        header("Location:index.php");
    endif;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center my-4">Iniciar sesión</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card my-4">
                <div class="card-body border-white">
                    <form action="acciones/ingresar.php" method="post">

                        <div class="form-group">
                        <label for="usuario">Usuario / E-mail</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese su usuario o email">
                        </div>

                        <div class="form-group">
                        <label for="password">Constraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block ">Ingresar</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>