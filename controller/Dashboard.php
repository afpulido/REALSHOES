<?php 
    include_once ('model/Rol.php');
    include_once ('model/Persona.php');
    include_once ('model/Producto.php');
    include_once ('model/Inventario.php');
    /* include_once ('model/Factura.php.php'); */


    class Dashboard{
        /**
         * variales para cambiar los titulos de la pagina y el titulo de del dashboard
         */
        /* $pagina = 'Dashboard';
        $title = 'Real Shoes | '. $pagina;

        $usuario = '';

        if($usuario!=null){
            echo 'NombreUsuario';
        }else{
            echo 'Invitado';
        } */

        public function main(){
            $pagina='Dashboard';
            $title= 'RealShoes | Dashboard';
            $usuario = 'Clark Astarte';

            /* $persona= new Persona;
            $persona = $persona->consultarIdPersona($_POST['rol_id']);

            if($_SESSION['nombrePersona']==''){
                $_SESSION['nombrePersona']=='Invitado';
            }else{
                $_SESSION['nombrePersona']==$persona->getNombrePersona();
            }
            $_SESSION['codigoMensasje']=1;
            $_SESSION['mensajeSesion']="bienvenido "; */
            

            /* $prueba=getTitle($pagina); */


            $rol = new Rol();
            $rolT =$rol->contarTodosRoles();
            $rolA= $rol->contarActivosRoles();
            $rolI= $rol->contarInactivosRoles();


            $producto = new Producto();
            $productoT =$producto->contarTodosProductos();
            $productoA= $producto->contarActivosProductos();
            $productoI= $producto->contarInactivosProductos();

            /* vista de header titulo */
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/dashboard.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }

        public function perfiles(){
            header('Location: ?c=Perfiles');
        }

        public function usuarios(){
            $pagina='Usuarios';
            $title= 'Dashboard | Usuarios';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/personas/persona.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        public function roles(){
        
            header('Location: ?c=Roles');
        }

        public function productos(){
            $pagina='Productos';
            $title= 'Dashboard | Productos';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        public function inventarios(){
            $pagina='Inventario';
            $title= 'Dashboard | Inventario';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        public function ventas(){
            $pagina='Ventas';
            $title= 'Dashboard | Ventas';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        public function compras(){
            $pagina='Compras';
            $title= 'Dashboard | Compras';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }
        public function reportes(){
            $pagina='Reportes';
            $title= 'Dashboard | Reportes';
            $usuario = 'Clark Astarte';
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de dashboard */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }



    }






?>