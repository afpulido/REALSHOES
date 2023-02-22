<?php
include ('..\nowarning.php');

//Session para iniciar sesion
session_start();
 
//include conexion a base de datos
include "../../model/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap y CSS, JS etc-->
    <?php include "includes/cdnstop.php";?>
  
    <title>Inicio Sesión</title>
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
        <div class="col-3"></div>
        <div class="col-6">
        <!-- Inicio contenido pagina-->
            <div class='shadow'>
                <form id='login-form' class='form' action='../../controller/login.php' method='post' style='padding: 10px; margin:10px;'>
                    <h3 class='text-center text-success'>Inicio de sesión</h3>
                    <div class='form-group'>
                        <i class='fa-solid fa-envelope'></i>
                        <label for='email' >Email:</label><br>
                        <input type='email' name='email' id='email' class='form-control mb-4'>
                    </div>
                    <div class='form-group'>
                        <i class='fa-solid fa-key'></i>
                        <label for='password' >Contraseña:</label><br>
                        <input type='password' id='password' name='password' class='form-control mb-4'>
                    </div>
                    <div id='register-link' class='text-right'>
                        <input type='submit' value='Iniciar sesión' class='btn btn-primary mb-4' name='login' style='float: right;'>
                        <label for='texto' class='form-text mb-4'>¿No está registrado?</label><a href='LoginRegister.php' style='text-decoration: none;'> Registrarse</a> 
                    </div>                                      
                </form>
            </div> 
        <!-- Fin contenido pagina-->
        </div>
        <div class="col-3"></div>
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
     


