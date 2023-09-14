<?php
    include_once 'model\Producto.php';
    include_once 'model\PersonaSeleccionaProducto.php';
    include_once 'model\Pedido.php';
    include_once 'model\Factura.php';
    class Carritos{
        public function __construct(){}

        public function main(){
            $pedido = 2;
            
            $productosCarrito = new PersonaSeleccionaProducto;            
            $productosCarrito =$productosCarrito->mostrarProductosCarrito($pedido);


            $pagina= 'Carrito';
            $title='Realshoes | Carrito';
            $usuario = 'Invitado';
            

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';        

            /* Acá va vista de Carrito de compras */
            require_once 'view/tienda/carrito/carrito.view.php'; 

            require_once 'view/plantillas/tienda/tienda.footer.view.php';

           
            
        }
        public function AgregarProductosCarritos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $personaId = $_GET['per'];            
                $productoId = $_GET['pro'];            
                $pedidoId = $_GET['ped'];
                $cantidadproducto =$_GET['cant'];

                $producto = new Producto;
                $productoc=$producto->consultarIdProducto($productoId);
                $pventa=$productoc->getValorVenta();

                if($productoc->getUnidades()>=$cantidadproducto){
                    $cantidad =$cantidadproducto;

                    $pspc = new PersonaSeleccionaProducto(null, $personaId, $productoId, $pedidoId, $cantidad, $pventa, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), null);
                    $pspc->seleccionarProducto();

                    header('Location: ?');
                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="No hay Stock suficiente ".$productoc->getUnidades();
                }
            }

            /* if($_SERVER['REQUEST_METHOD']=='GET'){
                if(is_numeric($_GET['producto_id'])){
                    $producto= new Producto;
                    $producto->consultarIdProducto($_GET['producto_id']);

                }else{
                    $_SESSION['codigoMensaje']=2;
                    $_SESSION['mensajeSesion']="Error al agregar el producto al carrito";   
                }
            } */

            
        }
        public function quitarProductoCarritos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id=$_GET['psp'];
                echo $id;
                if(is_numeric($id)){
                    $quitar = new PersonaSeleccionaProducto;
                    $quitar= $quitar->deseleccionarProducto($id); 
                    header('Location: ?c=Carritos');
                }
            }
        }
        public function contarProductosPedidos($pedido){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $idpedido=1;
                if(is_numeric($idpedido)){
                    $nproductos = new PersonaSeleccionaProducto;
                    $nproductos= $nproductos->contarProductosPedido($idpedido); 
                }
            }
        }
        
    }

?>