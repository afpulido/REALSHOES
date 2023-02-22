<?php
  include "../../Model/conexion.php"
?>

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
            <!-- Consulta para llenar los campos de los formularios de acuerdo al id de la persona
                a modificar-->
            <?php
            if(isset($_REQUEST['updateid'])){
                $id=$_REQUEST['updateid'];
                $seleccionar = "SELECT * FROM persona where idpersona=$id";
                $resultado = mysqli_query($conectar, $seleccionar);
                $dato = $resultado->fetch_assoc();
            }
            ?>
            <!-- Formulario--->
            <div class='shadow'>
                <form action='../../Controller/UserRegister.php' method='post' class='form-group shadow' style='padding: 10px; margin:10px'>
                    <h3 style='text-align: center; 'class='text-success'>Actualización de Datos Usuario</h3>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Elija el tipo de documento</span>
                        <select class='form-control' name='tipodocumento' id='' required>
                        <?php
                        /* Consulta de para llenar automaticamente la lista desplegable*/
                            $consulta       = "SELECT idtd,nombre_td FROM tipo_doc";
                            $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
                        
                            while ($reg = mysqli_fetch_array($resultado)) {
                            ?>
                                <option value='<?php echo $reg['idtd']?>'><?php echo $reg['nombre_td']?></option>
                            <?php
                            }
                            
                    ?>
                    
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Elija el tipo de usuario</span>
                        <select class='form-control' name='tipousuario' id='' required>
                        <?php
                            /* Consulta de para llenar automaticamente la lista desplegable*/
                            $consulta       = "SELECT id_tp,nombretp FROM tipo_persona";
                            $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
                        
                            while ($reg = mysqli_fetch_array($resultado)) {
                            ?>
                                <option value='<?php echo $reg['id_tp']?>'><?php echo $reg['nombretp']?></option>
                            <?php
                            }
                          
                    ?>
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Ingrese documento de identidad o NIT</span>
                        <!-- Con los datos llamados de la base de datos creo un valor .. value ="llamo php imprimo con echo y coloco el array con el campo especifico de la base de datos"-->                      
                        <input class='form-control' type='number' name='documento' value="<?php echo $dato['idpersona']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Escriba su nombre completo o razón social</span>
                        <input class='form-control' type='text' name='nombrecompleto' value="<?php echo $dato['nombre']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Escriba sus Apellidos o razón social</span>
                        <input class='form-control' type='text' name='nombrecompletoap' value="<?php echo $dato['apellidos']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Dirección</span>
                        <input class='form-control' type='text' name='direccion' value="<?php echo $dato['direccion']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Celular</span>
                        <input class='form-control' type='phone' name='celular' value="<?php echo $dato['telefono']?>"id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Correo electrónico</span>
                        <input class='form-control' type='email' name='email' value="<?php echo $dato['email']?>" id='' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Rol de usuario</span>
                        <select class='form-control' name='rolusuario' id='' required>

                        <?php
                            /* Consulta de para llenar automaticamente la lista desplegable*/
                            $consulta       = "SELECT idrol,nombre_rol FROM rol";
                            $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
                    
                            while ($reg = mysqli_fetch_array($resultado)) {
                            ?>
                                <option value='<?php echo $reg['idrol']?>'><?php echo $reg['nombre_rol']?></option>
                            <?php
                            }
                            
                        ?>
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <input class='btn btn-primary mb-4' type='submit' value='Actualizar Usuario' name='registrar' style='float: right;'>
                    </div>
                    </form>

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

<?php  $conectar->close(); ?>
</body>
</html>