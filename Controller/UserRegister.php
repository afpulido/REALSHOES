<?php
    /** conexion base de datos*/
    include "../model/conexion.php";

    if(isset($_POST['registrar'])){

        /** validar datos sin caracteres especiales*/
        $tipodoc          = mysqli_real_escape_string($conectar, $_REQUEST['tipodocumento']);
        $tipoUser       = mysqli_real_escape_string($conectar, $_REQUEST['tipousuario']);
        $id       = mysqli_real_escape_string($conectar, $_REQUEST['documento']);
        $nombre       = mysqli_real_escape_string($conectar, $_REQUEST['nombrecompleto']);
        $apellido       = mysqli_real_escape_string($conectar, $_REQUEST['nombrecompletoap']);
        $fecha       = mysqli_real_escape_string($conectar, $_REQUEST['fechanac']);
        $dir       = mysqli_real_escape_string($conectar, $_REQUEST['direccion']);
        $cel       = mysqli_real_escape_string($conectar, $_REQUEST['celular']);
        $email       = mysqli_real_escape_string($conectar, $_REQUEST['email']);
        $rol       = mysqli_real_escape_string($conectar, $_REQUEST['rolusuario']);

      


        if($conectar===false){
            die("Ha habido errores mientras se intentaba actualizar los datos del usuario" .mysqli_connect_error());
        }else{

        /** consulta de actualizacion de datos */
        $actualizar =   "UPDATE persona
                            SET persona_id = $id,
                                nombre ='$nombre',
                                apellidos = '$apellido',
                                direccion = '$dir',
                                telefono ='$cel',
                                tipo_doc_id =$tipodoc,
                                tipo_persona_id=$tipoUser,
                                rol_id =$rol, 
                                ultima_modificacion= now(),
                                fecha_eliminacion=null
                            WHERE      email = '$email'";

        if($conectar->query($actualizar) ===TRUE){
            echo "<script>alert('Los datos del usuario han sido actualizados')
                    window.location.href='../View/Admin/UserRegister.php'</script>";
        }else{
            echo "No ha sido posible la actualización, verifique la información. <br>";
            echo $conectar->error;
        }
        }
        $conectar->close();
        
    }
?>