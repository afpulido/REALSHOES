<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <!-- CSS only -->
    <?php include "includes/cdnstop.php"?>  
    <title>Home</title>
</head>
<body>
    <!--inicio Header  -->
    <?php include "includes/header.php"?>    
    <!--Fin Header  -->
    
    <!--inicio menu  -->
     <?php include "includes/nav.php"?>   
    <!--Fin menu  -->

    <!-- Inicio Contenido-->
    <div class="main">
        <main>
            <!-- inicio promocion-->
            <div class='shadow'>
                <form action='../../Controller/CLoginRegister.php' method='post' class='form-group shadow' style='padding: 10px;'>
                    <h3 style='text-align: center; 'class='text-success'>Registro Usuario</h3>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Correo electrónico</span>
                        <input class='form-control' type='email' name='email' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Contraseña</span>
                        <input class='form-control' type='password' name='password' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Repita su contraseña</span>
                        <input class='form-control' type='password' name='repassword' id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <input type='checkbox' name="tratamientodatos" id="trdatos">
                        <span class='input-group-text'>Acepta nuestra política de datos</span>
                    </div>
                    <div class='input-group mb-10'>
                    <input class='btn btn-primary mb-4' type='submit' value='Actualizar Datos' name='registrar' style='float: right;'>
                    </div>
                    </form>
            </div>
            <!-- fin promocion2-->
        </main>
    </div>
    <!-- Fin Contenido-->

    <!-- Inicio footer -->
    <?php include "includes/footer.php"?> 
    <!-- fin footer -->

<!-- JavaScript Bundle with Popper -->
<?php include "includes/cdnsbot.php"?> 

</body>
</html>









  


