<?php
include "../Model/conexion.php";

if (isset($_GET['activeid'])){

    $id=$_GET['activeid'];

    if($id!=null){
        $consulta       = "SELECT fecha_eliminacion FROM persona WHERE idpersona=$id";
        $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
        $fila          = mysqli_fetch_assoc($resultado);

        if($fila['fecha_eliminacion']==null){
            /**Desactivar un usuario */
            $desactivar = "UPDATE persona
                       SET fecha_eliminacion = now()
                       WHERE  idpersona = $id";

            if($conectar->query($desactivar) ===TRUE){
            echo "<script>alert('Los datos del usuario han sido desactivados correctamente')
                    window.location.href='../View/Admin/userRegister.php'</script>";
            }else{
            echo "No ha sido posible la desactivación, verifique la información. <br>";
            echo $conectar->error;
            }
            
        }else{
            /**Activar un usuario */
            $activar = "UPDATE persona
                       SET fecha_eliminacion = null
                       WHERE  idpersona = $id";

            if($conectar->query($activar) ===TRUE){
            echo "<script>alert('Los datos del usuario han sido activados correctamente')
                    window.location.href='../View/Admin/userRegister.php'</script>";
            }else{
            echo "No ha sido posible la activación, verifique la información. <br>";
            echo $conectar->error;
            }

        }

        $conectar->close();
    }else{
        echo "<script>alert('Por favor actualice sus datos.')
                window.location.href='../View/Admin/userRegister.php'</script>";
    }

}

    
?>