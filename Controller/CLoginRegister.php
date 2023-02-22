<?php
include "../Model/conexion.php";

if(isset($_POST['registrar'])){
    $email =$_REQUEST['email'];
    $password =$_REQUEST['password'];
    $repassword =$_REQUEST['repassword'];
    $id = rand(1,32786);

    if($email!=null && $password!=null && $repassword!=null ){
        if($password == $repassword){

            $email =mysqli_real_escape_string($conectar, $_REQUEST['email']);
            $password =mysqli_real_escape_string($conectar, $_REQUEST['password']);

            $consulta = "INSERT INTO persona (idpersona,nombre, apellidos,direccion,usuario,contraseña, telefono, email,idtipodocp,idtipopersona, idrolp,fecha_creacion, ultima_modificacion, fecha_eliminacion )
                        VALUES ($id,null,null,null,null,'$password',null,'$email',1,1,6,now(),now(),null)";

                if(mysqli_query($conectar,$consulta)){
                    echo "<script>alert('Registro exitoso')
                        window.location.href='../View/Cliente/Login.php'</script>";
                }else{
                    echo "<script>alert('Error al Registrarse')
                    </script>". mysqli_error($conectar);
                }

        }else{
            echo "<script>alert('las contraseñas no coinciden ')
                window.location.href='../View/Cliente/LoginRegister.php'</script>";
        }
    }else{
        echo "<script>alert('Los campos no pueden ser vacios')
                window.location.href='../View/Cliente/LoginRegister.php'</script>";

    }
}



?>