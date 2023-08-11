<?php
    class Tiendas{
        
        /* public $pagina='';
        public $usuario = 'Invitado';
        public $title; */
        
        public function __construct(){}

        /* public function getTitle($pagina){
            $title='Realshoes | '.$pagina;
            

            (validar si usuario logueado o es visitante)
            
            if($usuario!=null){
                $usuario= 'Pepito Perez'; (traer nombre de usuarioDB)
            }else{
                $usuario= 'Invitado';
            }
            
            return $title, $usuario;
        } */

        public function main(){
            $title='Realshoes | Tienda';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de tienda */
            require_once 'view/tienda/tienda.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function login(){
            $title='Realshoes | Login';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de login */
            require_once 'view/tienda/login.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }
        public function registro(){
            $title='Realshoes | Registro';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de login */
            require_once 'view/tienda/registro.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function dashboard(){
            $title='Realshoes | Dashboard';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/dashboard.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }

        /* cerrar sesion es una funcion destroy */
        public function cerrarSesion(){
            
            /* If you want to change the session id on each log in, 
            make sure to use session_regenerate_id(true) 
            during the log in process.  */

            session_destroy();
            session_regenerate_id(true);

            echo 'Has cerrado sesión Exitosamente <br>
            Regresa pronto!';
            
           /*  echo "
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Has cerrado sesión Exitosamente
                    Regresa pronto!',
                    showConfirmButton: false,
                    timer: 1500
                })
                <script>
                    window.location = '?';    
                </script>
            "; */

            /* header('Location: ?'); */

        }
















    }




?>