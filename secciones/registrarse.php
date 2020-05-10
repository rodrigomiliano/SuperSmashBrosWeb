<?php
    if(logueado()):       
        header("Location:index.php");
    endif;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="text-center my-4">Registrate y se parte del combate</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card my-4">
                <div class="card-body border-white">
                    <form action="acciones/registrarse.php" method="post">

                        <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese su usuario">
                        </div>

                        <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu email">
                        </div>

                        <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>