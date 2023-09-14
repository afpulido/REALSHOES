<?php 
    require_once 'model/Persona.php';
    class Registrarse{

        public function __construct(){}

        public function main(){
            if($_SERVER['REQUEST_METHOD']== 'GET'){
                $pagina= 'Registrarse';
                $title='Realshoes | Registrarse';
                $usuario = 'Invitado';
                /* $prueba=getTitle($pagina); */

                /* vista de header titulo */
                require_once 'view/plantillas/tienda/tienda.head.view.php';
                require_once 'view/plantillas/tienda/tienda.header.view.php';

                /* Acá va vista de login */
                require_once 'view/tienda/login/registrarse.view.php';

                require_once 'view/plantillas/tienda/tienda.footer.view.php';
            }

            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $correo =$_POST['email'];
                $password = $_POST['password'];
                $password2 = $_POST['repassword'];
                $rolCliente = 4; /* el rol cliente es 4 */

               /*  echo $correo . $password . $password2 . $rolCliente; */

                if($password == $password2){
                    if($correo!= null){
                        $registroCliente = new Persona(
                            null,
                            null,
                            null,
                            null,
                            null,
                            password_hash($password,PASSWORD_DEFAULT),
                            null,
                            $correo,
                            null,
                            $rolCliente,
                            date("Y-m-d H:i:s"),
                            date("Y-m-d H:i:s"),
                            null
                        );
                        $registroCliente->registrarUsuario();

                        $_SESSION['codigoMensasje']=1;
                        $_SESSION['mensajeSesion']="Registro exitoso";

                        header('Location: ?c=Login');

                    }else{
                        $_SESSION['codigoMensasje']=2;
                        $_SESSION['mensajeSesion']="Error al registrar el correo";
                        header('Location: ?c=Registrarse');
                    }
                }else{
                    $_SESSION['codigoMensasje']=2;
                    $_SESSION['mensajeSesion']="Error las contraseñas no son iguales";
                    header('Location: ?c=Registrarse');

                }

                

            }
        }

    }

?>