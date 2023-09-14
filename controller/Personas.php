<?php
    include_once "model\Persona.php";
    include_once "model\Rol.php";

    class Personas{
        
        public function __construct(){}  

        public function main(){
            $_SESSION['codigoMensaje']=0;
            $_SESSION['mensajeSesion']="";
            $pagina='Usuarios';
            $title= 'RealShoes | Usuarios';
            $usuario = 'Clark Astarte';

            /* header("Location: ?c=Dashboard&a=Roles#todos"); */
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de en Dashboard Roles */
            require_once 'view/dashboard/personas/persona.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }

        /* ok faltan alerts */
        public function registrarPersonas(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* $prueba= new persona(10,
                    1234, 'Omar','Bohorquez','Calle falsa 123', sha1(1),
                    311474, 'q@q.com', 'goku.png', 14,
                    date("Y-m-d H:i:s"),
                    date("Y-m-d H:i:s"), 
                    null 
                );
                $prueba->registrarUsuario();
                print_r($prueba);*/

                $roles = new Rol;
                $rolesc= $roles->consultarActivosRol(); /* ok Roles activos */

                $_SESSION['codigoMensaje']=0;
                $_SESSION['mensajeSesion']=""; 
                $pagina='Registrar Usuarios';
                $title= 'RealShoes | Usuarios';
                $usuario = 'Clark Astarte';

               /* vista de header titulo */
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                /* Acá va vista de dashboard */
                require_once 'view/dashboard/personas/createPersona.view.php';
                
                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){  
                $cedula = $_POST['cedula'];
                $rol = $_POST['rol_id'];
                $nombre=$_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['email'];         

                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado = date("Y-m-d H:i:s");
                }

                $contraseña = $_POST['password'];
                $contraseña2 = $_POST['password2'];
                if($contraseña===$contraseña2){
                    $pass=$_POST['password'];
                }else{
                    echo "error en las contraseñas";
                    header('Location: ?c=Personas&a=registrarPersonas');
                }
    
                if(isset($_FILES['perfil'])){
                    $archivo = $_FILES['perfil']; 
                    $nombreimg =$cedula.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/usuarios/';
                    if($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error en los Imagen no válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   

                    }else{
                        
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $perfil= $nombreimg;
                    
                        $personac = new Persona(
                            null,
                            $cedula,
                            $nombre,
                            $apellido,
                            $direccion,
                            password_hash($pass,PASSWORD_DEFAULT),
                            $telefono,
                            $correo,
                            $perfil,
                            $rol,
                            date("Y-m-d H:i:s"),
                            date("Y-m-d H:i:s"), 
                            $estado
                        );
                        $personac->registrarUsuario();
                        header('Location: ?c=Personas&a=consultarTodosPersonas');
                    }   

                    
                }
                
            }
        }
        /* botones estado=OK, actualizar=OK, eliminar=OK falta sweetalert*/
        public function consultarTodosPersonas(){
            $pagina='Mostrar Usuarios';
            $title= 'RealShoes | Usuarios';
            $usuario = 'Clark Astarte';

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                $usuarios = new Persona;
                $joinroles = new Rol;
                if($usuariosc  = $usuarios ->consultarTodosPersona()> 0){
                    $usuariosc = $usuarios->consultarTodosPersona();
                    /* print_r($usuariosc);

                    $rolesc = $joinroles->consultarActivosRol();
                    print_r($rolesc); */
                    /* $roles= new Rol;
                    $rolesc = $roles->consultarIdRol($usuariosc->getRolId());
                    print_r($rolesc); */
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";

                }else{
                    header("Location: ?c=Personas&a=registrarPersonas");
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
                require_once 'view/dashboard/personas/readAllPersona.view.php';


                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

        }
        /* botones estado=OK, actualizar=OK, eliminar=OK falta sweetalert*/
        public function consultarTodosEmpleados(){
            $pagina='Mostrar Empleados';
            $title= 'RealShoes | Empleados';
            $usuario = 'Clark Astarte';

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                $usuarios = new Persona;
                $joinroles = new Rol;
                if($usuariosc  = $usuarios ->consultarTodosEmpleado()> 0){
                    $usuariosc = $usuarios->consultarTodosEmpleado();
                    /* print_r($usuariosc);

                    $rolesc = $joinroles->consultarActivosRol();
                    print_r($rolesc); */
                    /* $roles= new Rol;
                    $rolesc = $roles->consultarIdRol($usuariosc->getRolId());
                    print_r($rolesc); */
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";

                }else{
                    header("Location: ?c=Personas&a=registrarPersonas");
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
                require_once 'view/dashboard/personas/readAllEmpleado.view.php';


                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

        }
        /* botones estado=OK, actualizar=OK, eliminar=OK falta sweetalert*/
        public function consultarTodosClientes(){
            $pagina='Mostrar Clientes';
            $title= 'RealShoes | Clientes';
            $usuario = 'Clark Astarte';

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                $usuarios = new Persona;
                $joinroles = new Rol;
                if($usuariosc  = $usuarios ->consultarTodosCliente()> 0){
                    $usuariosc = $usuarios->consultarTodosCliente();
                    /* print_r($usuariosc);

                    $rolesc = $joinroles->consultarActivosRol();
                    print_r($rolesc); */
                    /* $roles= new Rol;
                    $rolesc = $roles->consultarIdRol($usuariosc->getRolId());
                    print_r($rolesc); */
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";

                }else{
                    header("Location: ?c=Personas&a=registrarPersonas");
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
                require_once 'view/dashboard/personas/readAllCliente.view.php';


                require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }

        }
        
        /* Actualizar OK falta sweetalert*/
        public function actualizarPersonas(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id=$_GET['usuarios_id'];
                if(is_numeric($id)){
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";
                    $pagina='Actualizar Usuario';
                    $title= 'RealShoes | Usuarios';
                    $usuario = 'Clark Astarte';

                    $personac =new Persona;
                    $personac= $personac->consultarIdPersona($id);
                    $rolid= new Rol;
                    $rolid = $rolid->consultarIdRol($personac->getRolId());
                    $rolesc = new Rol;
                    $rolesc= $rolesc->consultarActivosRol(); /* ok Roles activos */
                    

                    /* header("Location: ?c=Dashboard&a=Roles#todos"); */
                    
                    require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.break.view.php';

                    /* Acá va vista de en Dashboard Roles */
                    require_once 'view/dashboard/personas/updatePersona.view.php';

                    require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
                }else{
                    $_SESSION['codigoMensasje']=2;
                    $_SESSION['mensajeSesion']="No ha sido posible eliminar el ROL";
                    header("Location: ?c=Personas&a=consultarTodosPersonas");

                }
                

            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){  
                $cedula = $_POST['cedula'];
                $rol = $_POST['rol_id'];
                $nombre=$_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['email'];         

                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado = date("Y-m-d H:i:s");
                }

                $contraseña = $_POST['password'];
                $contraseña2 = $_POST['password2'];
                if($contraseña===$contraseña2){
                    $pass=$_POST['password'];
                }else{
                    echo "error en las contraseñas";
                    header('Location: ?c=Personas&a=registrarPersonas');
                }
    
                if(isset($_FILES['perfil'])){
                    $archivo = $_FILES['perfil']; 
                    $nombreimg =$cedula.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/usuarios/';
                    if($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error en los Imagen no válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   

                    }else{
                        
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $perfil= $nombreimg;
                    
                        $personac = new Persona(
                            
                            $cedula,
                            $nombre,
                            $apellido,
                            $direccion,
                            password_hash($pass, PASSWORD_DEFAULT),
                            $telefono,
                            $correo,
                            $perfil,
                            $rol,
                            date("Y-m-d H:i:s"),
                            date("Y-m-d H:i:s"), 
                            $estado
                        );
                        $personac->actualizarUsuario();
                        echo "actualización exitosa";
                        /* header('Location: ?c=Personas&a=consultarTodosPersonas'); */
                    }   

                    
                }
                
            }

        }
        /* cambiar estado OK falta sweetalert*/
        public function actualizarStatusPersonas(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* Consulta del id ok llama los datos correctamente- */                
                /* $personac = new Rol;
                $personac = $personac->desactivarStatusRol($id,null);
                print_r($personac); */

                $id=$_GET['usuarios_id'];
                $status=$_GET['deleted'];

                /* validar que parametro sea numerico
                null = Activo, CON fecha =Inactivo */

                if(is_numeric($id)){
                    
                    $personac = new Persona;

                    if($status==null){
                        $personac = $personac ->desactivarStatusPersona($id,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Inactivado el Rol";
                        header("Location: ?c=Personas&a=consultarTodosPersonas");

                    }else if(!$status==null){
                        $personac = $personac ->activarStatusPersona($id,null, date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Activado el Rol";
                        header("Location: ?c=Personas&a=consultarTodosPersonas");

                    }else{
                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al aplicar el cambio solicitado";
                        echo"
                        <script>
                        alert('error 2')
                        </script>
                        ";
                        header("Location: ?c=Personas&a=consultarTodos¨Personas");
                    }  
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Personas&a=consultarTodosPersonas");
                }
            }
            
        }

       
        /* Eliminar Ok falta sweetalert */
        public function eliminarPersonas(){
            $id = $_GET['usuarios_id'];

            if($_SERVER['REQUEST_METHOD']== 'GET'){
                if(is_numeric($id)){

                    $eliminar = new Persona;
                    $eliminar = $eliminar -> eliminarPersona($id);
                    $_SESSION['codigoMensaje']=1;
                    $_SESSION['mensajeSesion']="Se ha eliminado el ROL definitivamente";
                    header("Location: ?c=Personas&a=consultarTodosPersonas");
                 
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No ha sido posible eliminar el USUARIO";
                    header("Location: ?c=Personas&a=consultarTodosPersonas");
                }

            }
            
        }

        /* falta cambiar imagen perfil */
        public function cambiarImagenPersonas(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){

            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            }

        }


    }

?>