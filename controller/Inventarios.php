<?php 
include_once "model/Inventario.php";
    class Inventarios{
        
        public function __construct(){}  

        public function main(){
            $_SESSION['codigoMensaje']=0;
            $_SESSION['mensajeSesion']="";
            $pagina='Inventarios';
            $title= 'RealShoes | Inventarios';
            $usuario = 'Clark Astarte';

            /* header("Location: ?c=Dashboard&a=Inventarios#todos"); */
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de en Dashboard Inventarios */
            require_once 'view/dashboard/Inventarios/inventarios.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        /* OK get ok post  falta mostrar sweetalert y validacion*/
        public function registrarInventarios(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $_SESSION['codigoMensaje']=0;
                $_SESSION['mensajeSesion']="";
                
                /* date("Y-m-d H:i:s") */
            
                /*  REGISTRO EXITOSO
                $rol=new rol(null,'1','1',null,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                $rol->registrarInventario();
                print_r($rol); 
                */
                
                $pagina='Registrar Inventarios';
                $title= 'RealShoes | Inventarios';
                $usuario = 'Clark Astarte';

                /* vista de header titulo */
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                /* Acá va vista de dashboard */
                require_once 'view/dashboard/Inventarios/createInventario.view.php';
                
                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){     
                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado=date("Y-m-d H:i:s");
                }else{
                    header("Location: ?c=Inventarios&a=registrarInventarios");
                }

                $rol = new Inventario(
                    null, /*inventario_id  */
                    $_POST['bodega'],
                    $_POST['descripcion'], 
                    date("Y-m-d H:i:s"), /* created */
                    date("Y-m-d H:i:s"), /* updated  */
                    $estado, /* deleted */ /* 0 si fuera a desactivar deberia llevar  date("Y-m-d H:i:s") */
                    
                );
                $rol->registrarInventario();
                header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                /* $rol->registrarInventario(); */
                /* if( $rol->registrarInventario()){
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Inventario registrado exitosamente";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No se pudo registrar el rol";
                    header("Location: ?c=Inventarios&a=registrarInventarios");
                   
                } */
                
            }
        }
        /*botones estado = ok, actualizar=ok y eliminar=ok   falta mostrar sweetalert y validacion*/
        public function consultarTodosInventarios(){
            $pagina='Mostrar Inventarios';
            $title= 'RealShoes | Inventarios';
            $usuario = 'Clark Astarte';

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                $inventarios= new Inventario;
                if($inventariosc = $inventarios->consultarTodosInventario()> 0){
                    $inventariosc = $inventarios->consultarTodosInventario();

                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";

                }else{
                    header("Location: ?c=Inventarios&a=registrarInventario");
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="No se cargaron correctamente los registros";
                }
            
                /* header("Location: ?c=Dashboard&a=Inventarios#activos"); */
                
                /* vista de header titulo */
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php'; 
                require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                /* Acá va vista de dashboard */
                require_once 'view/dashboard/Inventarios/readAllInventario.view.php';
                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

        }

        /* ok cambiar status  falta mostrar sweetalert y validacion*/
        public function actualizarStatusInventarios(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* Consulta del id ok llama los datos correctamente- */                
                /* $Inventariosc = new Inventario;
                $Inventariosc = $Inventariosc->desactivarStatusInventario($id,null);
                print_r($Inventariosc); */

                $id=$_GET['inventario_id'];
                $status=$_GET['deleted'];

                /* validar que parametro sea numerico
                null = Activo, CON fecha =Inactivo */

                if(is_numeric($id)){
                    $usuario = 'Clark Astarte';
                    $Inventariosc = new Inventario;

                    if($status==null){
                        $Inventariosc = $Inventariosc ->desactivarStatusInventario($id,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Inactivado el Inventario";
                        header("Location: ?c=Inventarios&a=consultarTodosInventarios");

                    }else if(!$status==null){
                        $Inventariosc = $Inventariosc ->activarStatusInventario($id,null, date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Activado el Inventario";
                        header("Location: ?c=Inventarios&a=consultarTodosInventarios");

                    }else{
                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al aplicar el cambio solicitado";
                        echo"
                        <script>
                        alert('error 2')
                        </script>
                        ";
                        header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                    }  
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }
            }
        }

        /* ok get and post falta sweealert2 y validacion */
        public function actualizarInventarios(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* Consulta del id ok llama los datos correctamente- */                
                /* $Inventariosc = new Inventario;
                $Inventariosc = $Inventariosc ->consultarIdInventario(1);
                print_r($Inventariosc); */

                $id=$_GET['inventario_id'];
                
                /* validar que parametro seanumerico */
                if(is_numeric($id)){
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";
                    $pagina='Actualizar Inventarios';
                    $title= 'RealShoes | Inventarios';
                    $usuario = 'Clark Astarte';

                    $inventariosc = new Inventario;
                    $inventariosc = $inventariosc->consultarIdinventario($id);

                    /* vista de header titulo */
                    require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                    /* Acá va vista de dashboard */
                    require_once 'view/dashboard/Inventarios/updateInventario.view.php';
                    
                    require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
                    
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
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
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }
                
                $id=$_POST['inventario_id'];
                /* echo $id=$_POST['inventario_id'];
                echo "<br>";
                echo $i=$_POST['bodega']. "<br>";
                echo $d=$_POST['descripcion']. "<br>";
                echo $ci=$_POST['created'];
                echo "<br>";
                echo $estado . "<br>"; */

                if(is_numeric($id)){
                    
                    $inventariosc =new Inventario(
                        $id,
                        $_POST['bodega'],
                        $_POST['descripcion'],
                        $_POST['created'],
                        date("Y-m-d H:i:s"),
                        $estado,
                        
                    );
                    /* print_r($Inventariosc); */
                    $inventariosc = $inventariosc->actualizarInventario();
                   echo $_SESSION['mensajeSesion']="Actualización correcto";
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Actualización correcto";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }else{
                    echo "error al actualizar";
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No se pudo actualizar";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }
            }
        }

        /* Eliminar OK  falta mostrar sweetalert */
        public function eliminarInventarios(){
            $id = $_GET['inventario_id'];

            if($_SERVER['REQUEST_METHOD']== 'GET'){
                if(is_numeric($id)){

                    $eliminar = new Inventario;
                    $eliminar = $eliminar -> eliminarInventario($id);
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Se ha eliminado el ROL definitivamente";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                 
                }else{
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="No ha sido posible eliminar el ROL";
                    header("Location: ?c=Inventarios&a=consultarTodosInventarios");
                }

            }
            
        }



        /* SQLSTATE[HY093]: Invalid parameter number: parameter was not defined */
    }
?>