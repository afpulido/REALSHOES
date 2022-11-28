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
                    <a class="nav-link " aria-current="page" href="RegisterProduct.php">Registrar Producto</a>
                </li>
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
                $seleccionar = "SELECT * FROM producto where Idproducto=$id";
                $resultado = mysqli_query($conectar, $seleccionar);
                $dato = $resultado->fetch_assoc();
            }
            ?>
            <!-- Formulario--->
            <div class='shadow'>
                <form action='../../Controller/ProductUpdate.php' method='post' class='form-group shadow' style='padding: 10px; margin:10px'>
                    <h3 style='text-align: center; 'class='text-success'>Actualización de Datos Producto</h3>
                    
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Ingrese Numero Identificador de producto</span>
                        <!-- Con los datos llamados de la base de datos creo un valor .. value ="llamo php imprimo con echo y coloco el array con el campo especifico de la base de datos"-->                      
                        <input class='form-control' type='number' name='Idproducto' value="<?php echo $dato['Idproducto']?>" id='Idproducto' required>
                    </div>
            
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>codigo de inventario</span>
                        <select class='form-control' name='idplacainventario' id='idplacainventario' required>
                        <?php
                            $consulta       = "SELECT idplacainventario, bodega FROM inventario";
                            $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
                        
                            while ($reg = mysqli_fetch_array($resultado)) {
                            ?>
                                <option value='<?php echo $reg['idplacainventario']?>'><?php echo $reg['bodega']?></option>
                            <?php
                            }        
                    ?>
                    
                        </select>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Marca</span>
                        <input class='form-control' type='text' name='Marca' value="<?php echo $dato['Marca']?>" id='Marca' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>tipo</span>
                        <input class='form-control' type='text' name='Tipo' value="<?php echo $dato['Tipo']?>" id='Tipo' required>
                    </div>
                    <div>
                    <span class='input-group-text'>Talla</span>
                        <select class='form-control' name='Talla' id='Talla' required>
                        <?php
                            $consulta       = "SELECT idtalla, origen_talla, notalla FROM talla";
                            $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
                        
                            while ($reg = mysqli_fetch_array($resultado)) {
                            ?>
                                <option value='<?php echo $reg['idtalla']?>'><?php echo $reg['origen_talla']?><?php echo $reg['notalla']?></option>
                            <?php
                            }        
                    ?>
                    </select>
                    </div>

                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Genero</span>
                        <input class='form-control' type='text' name='Genero' value="<?php echo $dato['Genero']?>"id='Genero' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'>Coleccion Temporada</span>
                        <input class='form-control' type='text' name='Coleccion_Temporada' value="<?php echo $dato['Coleccion_Temporada']?>" id='Coleccion_Temporada' required>
                    </div>
                    <div class='input-group mb-3'>
                        <input class='btn btn-primary mb-4' type='submit' value='Actualizar Producto' name='ActualizarProd' style='float: right;'>
                    </div>
                    </form>

            </div>
            <!-- Formulario--->
            
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