<?php 
    include_once ('Model/Producto.php');
    include_once ('model/PersonaSeleccionaProducto.php');

    class Tiendas{
        public $pagina;
        public $usuario='Invitado';
        public $title;
        public $titulo;
        
        public function __construct(){}

        /* public function getTitle($pagina){
            $title='Realshoes | '.$pagina;
            
        }

        public function Title($titulo, $pagina ){
            $title= $titulo.' | '.$pagina;
            return $title;
            return $pagina;
        }
            (validar si usuario logueado o es visitante)
            
            if($_SESSION[]!=null){
                $usuario= 'Pepito Perez'; (traer nombre de usuarioDB)
            }else{
                $usuario= 'Invitado';
            }
            
            return $title, $usuario;
        } */

        public function main(){
            $pagina= 'Tienda';
            $title='Realshoes | Tienda';
            $usuario = 'Pepito Perez';

            $productos = new Producto;

            if($caballeros = $productos->consultarTodosCaballero()>0){
                $caballeros = $productos->consultarTodosCaballero();
                /* print_r($caballeros); */
            }
            if($damas = $productos->consultarTodosDama()>0){
                $damas = $productos->consultarTodosDama();
            }    
            if($infantil = $productos ->consultarTodosInfantil()>0){
                $infantil = $productos ->consultarTodosInfantil();
            }

            $idpedido=1;
            $nproductos = new PersonaSeleccionaProducto;
            $nproductos= $nproductos->contarProductosPedido($idpedido);

            /* vista de header titulo */
           require_once 'view/plantillas/tienda/tienda.head.view.php';
           require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Tienda */
            require_once 'view/tienda/tienda.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }       
        

        public function login(){
            header('Location: ?c=Login');
        }
        public function registrarse(){
            header('Location: ?c=Registrarse');
        }

        public function Olvido(){
            $pagina= 'Olvido Contraseña';
            $title='Realshoes | Registrarse';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Olvido Contraseña */
            require_once 'view/tienda/contacto/olvido.view.php';

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

            /* Acá va vista de Dashboard */
            require_once 'view/dashboard/dashboard.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }

        /* cerrar sesion es una session destroy */
        public function cerrarSesion(){
            header('Location: ?c=Logout');
            
            /* If you want to change the session id on each log in, 
            make sure to use session_regenerate_id(true) 
            during the log in process.  */

            /* session_destroy();
            session_regenerate_id(true);

            echo 'Has cerrado sesión Exitosamente <br>
            Regresa pronto!'; */
            
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

        public function colecciones(){
            $pagina= 'Colecciones';
            $title='Realshoes | Colecciones';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header Colecciones */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de login */
            require_once 'view/tienda/producto/colecciones.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function damas(){
            $pagina= 'Damas';
            $title='Realshoes | Damas';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Damas */
            require_once 'view/tienda/producto/damas.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function caballeros(){
            $pagina= 'Caballeros';
            $title='Realshoes | Caballeros';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Caballeros */
            require_once 'view/tienda/producto/caballeros.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function infantil(){
            $pagina= 'Infantil';
            $title='Realshoes | Infantil';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Infantil */
            require_once 'view/tienda/producto/infantil.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function quienes(){
            $pagina= 'Quienes Somos';
            $title='Realshoes | Quienes Somos';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Quienes Somos */
            require_once 'view/tienda/contacto/quienes.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function contactenos(){
            $pagina= 'Contáctenos';
            $title='Realshoes | Contáctenos';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Contactenos */
            require_once 'view/tienda/contacto/contactenos.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function productos(){
            $pagina= 'Productos';
            $title='Realshoes | Productos';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Productos */
            require_once 'view/tienda/contacto/productos.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function caja(){
            $pagina= 'Caja';
            $title='Realshoes | Caja';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Caja */
            require_once 'view/tienda/carrito/caja.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function carrito(){
            header('Location:?c=Carritos');
        }

        public function creditos(){
            $pagina= 'Créditos';
            $title='Realshoes | Crédicos';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Creditos */
            require_once 'view/tienda/contacto/creditos.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function faq(){
            $pagina= 'FAQ';
            $title='Realshoes | FAQ';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de FAQ */
            require_once 'view/tienda/contacto/faq.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function terminos(){
            $pagina= 'Términos & Condiciones';
            $title='Realshoes | Términos';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Términos & Condiciones */
            require_once 'view/tienda/contacto/terminos.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        public function ayuda(){
            $pagina= 'Ayuda';
            $title='Realshoes | Ayuda';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de Ayuda */
            require_once 'view/tienda/contacto/ayuda.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }

        










    }




?>