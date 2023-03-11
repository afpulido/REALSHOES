<?php 
    include "../model/conexion.php";
    

    if(isset($_POST['login'])){
        $email      = $_REQUEST['email'];
        $password   = $_REQUEST['password'];

        echo "<br>" . $email . $password;

        $email          = mysqli_real_escape_string($conectar, $_POST['email']);
        $password       = mysqli_real_escape_string($conectar, $_POST['password']);
        
        /**
         * $passencriptado=password_hash($password, PASSWORD_DEFAULT);
         * 
         * if(password_verify($password, $fila['userpassword']) && $filas==1){}
         * 
         */

        

        $consulta       = "SELECT * FROM persona WHERE email='$email'";
        $resultado      = mysqli_query($conectar, $consulta) or die(mysqli_connect_error());
        $fila          = mysqli_fetch_assoc($resultado);
    
        $filas          = mysqli_num_rows($resultado);

        

        
        if($password == $fila['contraseña'] && $email == $fila['email']){
            if($fila['fecha_eliminacion']==null){

                if($fila['rol_id']==1){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                            window.location = '../view/Admin/Dashboard.php';    
                        </script>
                    ";
                } elseif($fila['rol_id']==2){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                            window.location = '../view/Admin/Dashboard.php';    
                        </script>
                    ";
                }elseif($fila['rol_id']==3){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                        window.location = '../view/Admin/Dashboard.php';    
                        </script>
                    ";
                }elseif($fila['rol_id']==4){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                            window.location = '../view/Admin/Dashboard.php';    
                        </script>
                    ";
                }elseif($fila['rol_id']==5){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                        window.location = '../view/Cliente/Home.php';    
                        </script>
                    ";
                }elseif($fila['rol_id']==6){
                    echo "
                        <script>alert('Inicio de Sesión exitoso');
                            window.location = '../view/Cliente/Home.php';    
                        </script>
                    ";
                    
                }
                session_start();
                $_SESSION['rol_id'];
                $nombre =$fila['nombre'];

            }else{
                echo "
            <script>alert('No pudo iniciar sesion: USUARIO DESACTIVADO: Contacte al administrador: soporte@realshoes.com');
                        window.location = '../View/Cliente/Login.php';    
                    </script>
            ";

            }

            
        }else{
            echo "
            <script>alert('Usuario o contraseña incorrecto');
                        window.location = '../View/Cliente/Login.php';    
                    </script>
            ";
        }
    }
?>  