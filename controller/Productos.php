<?php 
    include_once "model/Producto.php";
    class Productos{
        
        public function __construct(){}  

        public function main(){
            $_SESSION['codigoMensaje']=0;
            $_SESSION['mensajeSesion']="";
            $pagina='Productos';
            $title= 'RealShoes | Productos';
            $usuario = 'Clark Astarte';

            /* header("Location: ?c=Dashboard&a=Roles#todos"); */
            
            require_once 'view/plantillas/dashboard/dashboard.head.view.php';
            require_once 'view/plantillas/dashboard/dashboard.header.view.php';
            require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
            require_once 'view/plantillas/dashboard/dashboard.break.view.php';

            /* Acá va vista de en Dashboard Roles */
            require_once 'view/dashboard/productos/Productos.view.php';

            require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }   
        /* ok registrar productos ok falta sweetalert, validar subir imagenes */
        public function registrarProductos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                /* $productoc= new Producto(
                    null,'carlos','descripcion prueba',1,1,1,1,1,100,50000,30,65000,'1.jpg',null,null,null,1,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"),null
                );
                $productoc->registrarProducto();
                print_r($productoc); */


                $pagina='Registrar Productos';
                $title= 'RealShoes | Productos';
                $usuario = 'Clark Astarte';

                 /* vista de header titulo */
                 require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.break.view.php';
 
                 /* Acá va vista de dashboard */
                 require_once 'view/dashboard/productos/createProducto.view.php';
                 
                 require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                               
                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado = date("Y-m-d H:i:s");
                }
                /* variable randon para evitar que se repitan o se colocoquen dos nombre iguales */
                $valor= rand(1, 9999999);

                if(isset($_FILES['imagen1'])){
                    echo $imagen1=null;
                    $archivo = $_FILES['imagen1']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen1= $nombreimg; 
                    }
                } 
                if(isset($_FILES['imagen2'])){
                    $archivo = $_FILES['imagen2']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(($_FILES['imagen2']==null)){
                        $imagen2=null;
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen2= $nombreimg;
                    }
                }else{
                    $imagen2=null;
                }

                if(isset($_FILES['imagen3'])){
                    $archivo = $_FILES['imagen3']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(is_null($_FILES['imagen3'])){
                        $imagen3=null;
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen3= $nombreimg;
                    }
                }
                if(isset($_FILES['imagen4'])){
                    $archivo = $_FILES['imagen4']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(is_null($_FILES['imagen4'])){
                        $imagen4=null;
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen4= $nombreimg;
                    }
                }
               
                $productoc = new Producto (
                    null, 
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['tipo'],
                    $_POST['marca'],
                    $_POST['coleccion'],
                    $_POST['genero'],
                    $_POST['talla'],
                    $_POST['cantidad'],
                    $_POST['pcompra'],
                    $_POST['ganancia'],
                    $_POST['pventa'],
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen4,
                    $_POST['inventario'],
                    date("Y-m-d H:i:s"),
                    date("Y-m-d H:i:s"),
                    $estado
                   
                );

               $productoc->registrarProducto();
                header('Location: ?c=Productos&a=consultarTodosProductos');
            }
                
        }
        /* mostrar todos los productos (activos e inactivos) ok falta sweetalert */
        public function consultarTodosProductos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $productos = new Producto;
                if($productosc=$productos->consultarTodosProducto()>0){
                    $productosc=$productos->consultarTodosProducto();
                }else{
                    echo "error al llamar los datos"; 
                }
               
               

                $pagina='Mostrar Productos';
                $title= 'RealShoes | Productos';
                $usuario = 'Clark Astarte';

                 /* vista de header titulo */
                 require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                 require_once 'view/plantillas/dashboard/dashboard.break.view.php';
 
                 /* Acá va vista de dashboard */
                 require_once 'view/dashboard/productos/readAllProducto.view.php';
                 
                 require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

            }
        }
        /*  */
        public function actualizarProductos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id=$_GET['producto_id'];
                
                /* validar que parametro seanumerico */
                if(is_numeric($id)){
                    $_SESSION['codigoMensaje']=0;
                    $_SESSION['mensajeSesion']="";
                    $pagina='Actualizar Productos';
                    $title= 'RealShoes | Productos';
                    $usuario = 'Clark Astarte';
                    
                    $productoc= new Producto;
                    $productoc= $productoc->consultarIdProducto($id);


                    /* vista de header titulo */
                    require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                    /* require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.break.view.php'; */
    
                    /* Acá va vista de dashboard */
                    require_once 'view/dashboard/productos/updateProducto.view.php';
                    
                    require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
                }
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($_POST['estado']==1){
                    $estado=null;
                }elseif($_POST['estado']==2){
                    $estado = date("Y-m-d H:i:s");
                }
                /* variable randon para evitar que se repitan o se colocoquen dos nombre iguales */
                $valor= rand(1, 9999999);

                if(isset($_FILES['imagen1'])){
                    echo $imagen1=null;
                    $archivo = $_FILES['imagen1']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen1= $nombreimg; 
                    }
                } 
                if(isset($_FILES['imagen2'])){
                    $archivo = $_FILES['imagen2']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(($_FILES['imagen2']==null)){
                        $imagen2=null;
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen2= $nombreimg;
                    }
                }else{
                    $imagen2=$productoc->getImagen2();
                }

                if(isset($_FILES['imagen3'])){
                    $archivo = $_FILES['imagen3']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(is_null($_FILES['imagen3'])){
                        $imagen3=$productoc->getImagen3();
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen3= $nombreimg;
                    }
                }
                if(isset($_FILES['imagen4'])){
                    $archivo = $_FILES['imagen4']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/productos/';
                    if(is_null($_FILES['imagen4'])){
                        $imagen4=$productoc->getImagen4();
                    }elseif($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen4= $nombreimg;
                    }
                }
               
                $upproductoc = new Producto (
                    $_POST['producto_id'], 
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['tipo'],
                    $_POST['marca'],
                    $_POST['coleccion'],
                    $_POST['genero'],
                    $_POST['talla'],
                    $_POST['cantidad'],
                    $_POST['pcompra'],
                    $_POST['ganancia'],
                    $_POST['pventa'],
                    $imagen1,
                    $imagen2,
                    $imagen3,
                    $imagen4,
                    $_POST['inventario'],
                    $_POST['created'],
                    date("Y-m-d H:i:s"),
                    $estado
                   
                );
                /* print_r($upproductoc); */
                $upproductoc->actualizarProducto();
                header('Location: ?c=Productos&a=consultarTodosProductos');
            }
        }
        /* cambiar estado ok falta sweetalert */
        public function actualizarStatusProductos(){
            $id=$_GET['producto_id'];
            $status=$_GET['deleted'];
            if($_SERVER['REQUEST_METHOD'] == 'GET'){

                if(is_numeric($id)){
                    $productoc = new Producto;
                    if($status==null){
                        $productoc = $productoc ->activarStatusProducto($id,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Inactivado el Rol";
                        header("Location: ?c=Productos&a=consultarTodosProductos");

                    }else if(!$status==null){
                        $productoc = $productoc ->activarStatusProducto($id,null, date("Y-m-d H:i:s"));
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha Activado el Rol";
                        header("Location: ?c=Productos&a=consultarTodosProductos");

                    }else{
                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al aplicar el cambio solicitado";
                        echo"
                        <script>
                        alert('error 2')
                        </script>
                        ";
                        header("Location: ?c=Productos&a=consultarTodos¨Productos");
                    }

                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Ingrese un valor correcto";
                    header("Location: ?c=Productos&a=consultarTodosProductos");

                }
            }
            
        }
        /* eliminar ok falta sweetalert */
        public function eliminarProductos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id = $_GET['producto_id'];

                if($_SERVER['REQUEST_METHOD']== 'GET'){
                    if(is_numeric($id)){
    
                        $eliminar = new Producto;
                        $eliminar = $eliminar -> eliminarProducto($id);
                        $_SESSION['codigoMensaje']=1;
                        $_SESSION['mensajeSesion']="Se ha eliminado el ROL definitivamente";
                        header("Location: ?c=Productos&a=consultarTodosProductos");
                     
                    }else{
                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="No ha sido posible eliminar el USUARIO";
                        header("Location: ?c=Productos&a=consultarTodosProductos");
                    }
                }
            }
        }
      
    }
?>