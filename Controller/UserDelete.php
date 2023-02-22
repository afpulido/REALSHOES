<?php
include "../Model/conexion.php";

if (isset($_GET['deleteid']))

    $id=$_GET['deleteid'];

   $eliminar = "DELETE FROM  persona WHERE  idpersona = $id";

if($conectar->query($eliminar) ===TRUE){
    echo "<script>alert('Los datos del usuario han sido Eliminados del Sistema')
            window.location.href='../View/Admin/userRegister.php'</script>";
}else{
    echo "No ha sido posible la Eliminación, verifique la información. <br>";
    echo $conectar->error;
}

$conectar->close();

?>