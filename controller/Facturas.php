<?php 
    require_once 'model/Factura.php';
    require_once 'model/PersonaSeleccionaProducto.php';
    require_once 'model/Persona.php';
    require_once 'model/Producto.php';

    class Facturas{
        public function __construct(){}
        public function main(){
            $pagina= 'Facturas';
            $title='Realshoes | Facturas';
            $usuario = 'Pepito Perez';
           /* vista de header titulo */
           require_once 'view/plantillas/dashboard/dashboard.head.view.php';
           require_once 'view/plantillas/dashboard/dashboard.header.view.php';
           require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
           require_once 'view/plantillas/dashboard/dashboard.break.view.php';

           /* Acá va vista de dashboard */
           require_once 'view/dashboard/facturas/factura.view.php';

           require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }
        public function registrarFacturas(){}
        public function cambiarStatusFacturas(){}
        public function eliminarFacturas(){}
        public function consultarTodasFacturas(){
            $pagina= 'Consultar Facturas';
            $title='Realshoes | Facturas';
            $usuario = 'Pepito Perez';
            
            $mostrar = new Factura;
            if($mostrarc=$mostrar->consultarTodasFactura()>0){
                $mostrarc=$mostrar->consultarTodasFactura();
            }

            

            /* vista de header titulo */
           require_once 'view/plantillas/dashboard/dashboard.head.view.php';
           require_once 'view/plantillas/dashboard/dashboard.header.view.php';
           require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
           require_once 'view/plantillas/dashboard/dashboard.break.view.php';

           /* Acá va vista de dashboard */
           require_once 'view/dashboard/facturas/ReadAllFactura.view.php';

           require_once 'view/plantillas/dashboard/dashboard.footer.view.php';



        }

        public function verFacturas(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $pagina= 'Facturas';
                $title='Realshoes | Facturas';
                $usuario = 'Pepito Perez';

                $idf = $_GET['facturas_id'];

                if(is_numeric($idf)){
                    $fv = new Factura;
                    $fv = $fv->consultarFacturaId($idf);
                    /* $idpedido=$fv->getPedidoId(); */
                   /*  $nproductos = new PersonaSeleccionaProducto;
                    $nproductos= $nproductos->mostrarProductosCarrito($idpedido); */

                    /* foreach ($nproductos as $facturas):
                        $facturas->getPersonaSeleccionaProductoId();
                    
                    endforeach;

                    $cliente = new Persona(); */

                    /* $cliente = $cliente->consultarIdPersona($nproductos[2]->getPersonaId()); */

                    /* $personapredido= $nproductos->getPersonaId(); */
          
                    require_once 'view/plantillas/dashboard/dashboard.head.view.php';
                    /* require_once 'view/plantillas/dashboard/dashboard.header.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
                    require_once 'view/plantillas/dashboard/dashboard.break.view.php'; */
                    print_r($fv);
                    echo "<br>";
                    print_r($nproductos);
                    echo "<br>";
                    /* print_r($cliente); */
                    require_once 'view/dashboard/facturas/verFactura.view.php';

                    require_once 'view/plantillas/dashboard/dashboard.footer.view.php';

                }else{

                }
            }
        }
        public function imprimirFacturas(){
            $title='Realshoes | Facturas';
            $idf = $_GET['facturas_id'];
            if(is_numeric($idf)){
                $fv = new Factura;
                $fv = $fv->consultarFacturaId($idf);
                /* $idpedido=$fv->getPedidoId();
                $nproductos = new PersonaSeleccionaProducto;
                $nproductos= $nproductos->mostrarProductosCarrito($idpedido); */
                
                require_once 'view/plantillas/dashboard/dashboard.head.view.php';

                require_once 'view/dashboard/facturas/imprimirFactura.view.php';
            }
        }
        public function actualizarFacturas(){}




    }
?>