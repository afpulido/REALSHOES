<?php 
    include_once "model\Persona.php";

    class Login{
        
        public function __construct(){}  

        public function main(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $pagina= 'Tienda';
                $title='Realshoes | Tienda';
                $usuario = 'Pepito Perez';
                /* $prueba=getTitle($pagina); */

                /* vista de header titulo */
                require_once 'view/plantillas/tienda/tienda.head.view.php';
                require_once 'view/plantillas/tienda/tienda.header.view.php';

                /* Acá va vista de Tienda */
                require_once 'view/tienda/login/login.view.php';

                require_once 'view/plantillas/tienda/tienda.footer.view.php';
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $loginc= new Persona(
                    $_POST['email'],
                    $_POST['password']
                );
                /* print_r($loginc);
                echo "<br>"; */
                $login=$loginc->login($_POST['email'],$_POST['password'] );
                /* print_r($login); */

                
                if($login){
                    $activo = $login->getFechaEliminacionDesactivacion();
                    $rol = $login->getRolId();

                    /* print_r($activo);
                    print_r($rol); */

                    if(is_null($activo)){
                        if($rol == 1){
                            
                        }elseif($rol == 2){
                              
                        }elseif($rol == 3){
                            
                        }elseif($rol == 4){
                            
                        }elseif($rol == 5){
                           
                        }elseif($rol == 6){
                            
                        }else{
                            $_SESSION['codigoMensaje']=2;
                            echo $_SESSION['mensajeSesion']="Acceso no autorizado";
                        }
                        $_SESSION['codigoMensaje']=1;
                        echo $_SESSION['mensajeSesion']="Bienvenido ".$login->getNombre(). " ". $login->getApellido();

                        header('Location:?c=Dashboard');
                        /* $datosLogin = serialize($login);
                        $_SESSION['perfil']= $datosLogin; */

                        /* echo $_SESSION['perfil']; */

                    }else{
                        $_SESSION['codigoMensaje']=2;
                        echo $_SESSION['mensajeSesion']="El usuario esta registrado, 
                            <br> pero la cuenta esta Inactiva desde ". $login->getFechaEliminacionDesactivacion()." <br>
                            Por favor contactar a soporte@realshoes.com";
                    }
                }else{
                    $_SESSION['codigoMensaje']=2;
                    echo $_SESSION['mensajeSesion']="Error al Iniciar sesión";
                    header('Location:?c=login');
                }  
            }
            
        }

        public function iniciarSesión(){
            

        }
    }
?>