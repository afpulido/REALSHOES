<?php 
    include_once "model/Rol.php";
    class Roles{
        
        public function __construct(){}  

        public function main(){
            $_SESSION['codigoMensaje']=0;
            $_SESSION['mensajeSesion']="";
            $pagina='Roles';
            $title= 'RealShoes | Roles';
            $usuario = 'Clark Astarte';

            /* header("Location: ?c=Dashboard&a=Roles#todos"); */
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de en Dashboard Roles */
            require_once 'view/dashboard/roles/roles.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        /* OK get ok post  falta mostrar sweetalert y validacion*/
        public function registrarRoles(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $_SESSION['codigoMensaje']=0;
                $_SESSION['mensajeSesion']="";
                
                /* date("Y-m-d H:i:s") */
            
                /*  REGISTRO EXITOSO
                $rol=new rol(null,'1','1',null,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                $rol->registrarRol();
                print_r($rol); 
                */
                
                $pagina='Registrar Roles';
                $title= 'RealShoes | Roles';
                $usuario = 'Clark Astarte';

                /* vista de header titulo */
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                /* Acá va vista de dashboard */
                require_once 'view/dashboard/roles/createrol.view.php';
                
                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){     
                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado=date("Y-m-d H:i:s");
                }else{
                    header("Location: ?c=Roles&a=registrarRoles");
                }

                $rol = new Rol(
                    null, /*rol_id  */
                    $_POST['nombre'],
                    $_POST['descripcion'], 
                    date("Y-m-d H:i:s"), /* created */
                    date("Y-m-d H:i:s"), /* updated  */
                    $estado, /* deleted */ /* 0 si fuera a desactivar deberia llevar  date("Y-m-d H:i:s") */
                    
                );
                $rol->registrarRol();
                header("Location: ?c=Roles&a=consultarTodosRoles");
                /* $rol->registrarRol(); */
                /* if( $rol->registrarRol()){
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Rol registrado exitosamente";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No se pudo registrar el rol";
                    header("Location: ?c=Roles&a=registrarRoles");
                   
                } */
                
            }
        }
        /*botones estado = ok, actualizar=ok y eliminar=ok   falta mostrar sweetalert y validacion*/
        public function consultarTodosRoles(){
            $pagina='Mostrar Roles';
            $title= 'RealShoes | Roles';
            $usuario = 'Clark Astarte';

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                $roles= new Rol;
                if($rolesc = $roles->consultarTodosRol()> 0){
                    $rolesc = $roles->consultarTodosRol();

                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";

                }else{
                    header("Location: ?c=Roles&a=registrarRoles");
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="No se cargaron correctamente los registros";
                }
            
                /* header("Location: ?c=Dashboard&a=Roles#activos"); */
                
                /* vista de header titulo */
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php'; 
                require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                /* Acá va vista de dashboard */
                require_once 'view/dashboard/roles/readAllRol.view.php';
                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

        }

        /* ok cambiar status  falta mostrar sweetalert y validacion*/
        public function actualizarStatusRoles(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* Consulta del id ok llama los datos correctamente- */                
                /* $rolesc = new Rol;
                $rolesc = $rolesc->desactivarStatusRol($id,null);
                print_r($rolesc); */

                $id=$_GET['rol_id'];
                $status=$_GET['deleted'];

                /* validar que parametro sea numerico
                null = Activo, CON fecha =Inactivo */

                if(is_numeric($id)){
                    $usuario = 'Clark Astarte';
                    $rolesc = new Rol;

                    if($status==null){
                        $rolesc = $rolesc ->desactivarStatusRol($id,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Inactivado el Rol";
                        header("Location: ?c=Roles&a=consultarTodosRoles");

                    }else if(!$status==null){
                        $rolesc = $rolesc ->activarStatusRol($id,null, date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Activado el Rol";
                        header("Location: ?c=Roles&a=consultarTodosRoles");

                    }else{
                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al aplicar el cambio solicitado";
                        echo"
                        <script>
                        alert('error 2')
                        </script>
                        ";
                        header("Location: ?c=Roles&a=consultarTodosRoles");
                    }  
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }
            }
        }

        /* ok get and post falta sweealert2 y validacion */
        public function actualizarRoles(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* Consulta del id ok llama los datos correctamente- */                
                /* $rolesc = new Rol;
                $rolesc = $rolesc ->consultarIdRol(1);
                print_r($rolesc); */

                $id=$_GET['rol_id'];
                
                /* validar que parametro seanumerico */
                if(is_numeric($id)){
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";
                    $pagina='Actualizar Roles';
                    $title= 'RealShoes | Roles';
                    $usuario = 'Clark Astarte';

                    $rolesc = new Rol;
                    $rolesc = $rolesc ->consultarIdRol($id);

                    /* vista de header titulo */
                    require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                    /* Acá va vista de dashboard */
                    require_once 'view/dashboard/roles/updaterol.view.php';
                    
                    require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
                    
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }
                
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                /* validar estado */
                if($_POST['estado']==1){
                    $estado = null;
                }elseif($_POST['estado']==2){
                    $estado = date("Y-m-d H:i:s");
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No se pudo actualizar el estado";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }
                
                $id=$_POST['rol_id'];
                /* echo $id=$_POST['rol_id'];
                echo "<br>";
                echo $i=$_POST['nombre']. "<br>";
                echo $d=$_POST['descripcion']. "<br>";
                echo $ci=$_POST['created'];
                echo "<br>";
                echo $estado . "<br>"; */

                if(is_numeric($id)){
                    
                    $rolesc =new rol(
                        $id,
                        $_POST['nombre'],
                        $_POST['descripcion'],
                        $_POST['created'],
                        date("Y-m-d H:i:s"),
                        $estado,
                        
                    );
                    /* print_r($rolesc); */
                    $rolesc = $rolesc->actualizarRol();
                   echo $_SESSION['mensajeSesion']="Actualización correcto";
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Actualización correcto";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }else{
                    echo "error al actualizar";
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No se pudo actualizar";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }
            }
        }

        /* Eliminar OK  falta mostrar sweetalert */
        public function eliminarRoles(){
            $id = $_GET['rol_id'];

            if($_SERVER['REQUEST_METHOD']== 'GET'){
                if(is_numeric($id)){

                    $eliminar = new Rol;
                    $eliminar = $eliminar -> eliminarRol($id);
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Se ha eliminado el ROL definitivamente";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                 
                }else{
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="No ha sido posible eliminar el ROL";
                    header("Location: ?c=Roles&a=consultarTodosRoles");
                }

            }
            
        }



        /* SQLSTATE[HY093]: Invalid parameter number: parameter was not defined */
    }
?>