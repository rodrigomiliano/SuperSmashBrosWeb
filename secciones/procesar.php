<?php

    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";

     $nombre = $_POST["nombre"];
     $apellido = $_POST["apellido"];
     $email = $_POST["email"];
     $torneos = $_POST['torneos'] ?? false;
     $nuevos = $_POST['nuevos'] ?? false;
     $merchandising = $_POST['merchandising'] ?? false;
     $otro = $_POST['otro'] ?? false;
     $comentario = $_POST['comentario'];

     if(empty($nombre) || empty($apellido) || empty($email)) {
         header('Location: index.php?seccion=contacto&error=campos_obligatorios');
     die;
     }     
?>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-6">
                 <h1 class="text-center">Contacto</h1>

                <div class="card">
                    <div class="card-body">
                        <p>Gracias por contactarte, sus datos han sido enviado correctamente y en breve recibirá novedades de su interés.</p>
                        <p>Nombre: <?= $nombre;?></p>
                        <p>Apellido: <?= $apellido;?></p>
                        <p>Email: <?= $email;?></p>
                        <p>Intereses</p>
                        <ul>
                            <?php
                              if($torneos !== false):
                              echo "<li>Torneos/eventos</li>";
                              endif;
                            ?>
                             
                            <?php
                              if($nuevos !== false):
                              echo "<li>Nuevos personajes</li>";
                              endif;
                            ?>

                            <?php
                              if($merchandising !== false):
                              echo "<li>Merchandising</li>";
                              endif;
                            ?>
                         
                            <?php
                              if($otro !== false):
                              echo "<li>Otro</li>";
                              endif;
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>