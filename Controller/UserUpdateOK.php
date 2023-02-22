<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <!-- CSS only -->
    <?php include "includes/cdnstop.php"?>  
    <title>Document</title>
</head>
<body>
    <?php
        $userid = $_POST['documento'];
        //var_dump($userid);
        $seleccionar = "SELECT * FROM persona WHERE idpersona=$userid";
        $resultado = mysqli_query($conectar, $seleccionar);
        $dato = $resultado->fetch_assoc();
        //var_dump($dato);
    ?>
    <!--inicio Header  -->
    <?php include "includes/header.php"?>    
    <!--Fin Header  -->
    
    <!--inicio menu  -->
     <?php include "includes/nav.php"?>   
    <!--Fin menu  -->

    <!-- Inicio Contenido-->
    <div class="main">
        <!-- Submenu -->
        <aside class="submenu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="RegisterTipoPersona.php">Tipo Persona</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="RegisterTipoDoc.php">Tipo Documento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="RegisterRol.php">Rol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </aside>
        <!-- Submenu -->

        <main>
            <!-- Formulario--->
            <div class='shadow'>
                <form action='../../Controller/UserRegister.php' method='post' class='form-group shadow' style='padding: 10px; margin:10px'>
                    <h3 style='text-align: center; 'class='text-success'>Actualización de Datos Usuario</h3>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Elija el tipo de documento</span>
                        <select class='form-control' name='tipodocumento' id='' required>
                            <option value='1'>Tarjeta de identidad</option>
                            <option value='2'>Cédula de ciudadanía</option>
                            <option value='3'>Cédula de extranjería</option>
                            <option value='4'>Registro civil de nacimiento</option>
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Elija el tipo de usuario</span>
                        <select class='form-control' name='tipousuario' id='' required>
                            <option value='1'>Natural</option>
                            <option value='2'>Jurídico</option>
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Ingrese documento de identidad o NIT</span>
                        <input class='form-control' type='number' name='documento' value="<? echo $dato[$userid]?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Escriba su nombre completo o razón social</span>
                        <input class='form-control' type='text' name='nombrecompleto' value="<? echo $dato['nombre']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Escriba sus Apellidos o razón social</span>
                        <input class='form-control' type='text' name='nombrecompletoap' value="<? echo $dato['apellido']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Dirección</span>
                        <input class='form-control' type='text' name='direccion' value="<? echo $dato['direccion']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Celular</span>
                        <input class='form-control' type='phone' name='celular' value="<? echo $dato['telefono']?>"id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Correo electrónico</span>
                        <input class='form-control' type='email' name='email' value="<? echo $dato['email']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>

                    
                        <span class='input-group-text'>Rol de usuario</span>
                        <select class='form-control' name='rolusuario' id='' required>
                            <option value='1'>Administrador</option>
                            <option value='2'>Cliente</option>
                            <option value='3'>Auxiliar administrativo</option>
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <input class='btn btn-primary mb-4' type='submit' value='Registrar Usuario' name='registrar' style='float: right;'>
                    </div>
                    </form>
                    <?php 
                        $dato['idtipodocp'] = $_POST['tipodocumento'];
                        $dato['idtipopersona'] = $_POST['tipousuario'];
                        $dato['idrolp'] = $_POST['rolusuario'];
                        $dato['ultima_modificacion'] = now();

                    ?>

            </div>
            <!-- Formulario--->

            <!-- Tabla de registros--->
            <div class="row">
                <div class="col">
                    <?php 
                        include "../../Controller/ShowUsers.php";
                    ?>  
                </div>  
                 
            </div>
            <!-- Tabla de Registros--->
            
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