<?php
    include_once "model/Pedido.php";

    class Pedidos{
        public function __construct(){}
        public function main(){

            $pagina= 'Pedidos';
            $title='Realshoes | Pedidos';
            $usuario = 'Invitado';

            /* vista de header titulo */
           require_once 'view/plantillas/dashboard/dashboard.head.view.php';
           require_once 'view/plantillas/dashboard/dashboard.header.view.php';
           require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
           require_once 'view/plantillas/dashboard/dashboard.break.view.php';

           /* Acá va vista de dashboard */
           require_once 'view/dashboard/pedidos/pedido.view.php';

           require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }
        public function registrarPedidos(){}
        public function consultarTodosPedidos(){
            $pagina= 'Pedidos';
            $title='Realshoes | Pedidos';
            $usuario = 'Invitado';
            
            $pedidos = new Pedido;

            $pedidos->consultarTodosPedido();

            if($pedidosc=$pedidos->consultarTodosPedido()>0){
                $pedidosc=$pedidos->consultarTodosPedido();
            }

            /* vista de header titulo */
           require_once 'view/plantillas/dashboard/dashboard.head.view.php';
           /* require_once 'view/plantillas/dashboard/dashboard.header.view.php';
           require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
           require_once 'view/plantillas/dashboard/dashboard.break.view.php'; */

           /* Acá va vista de dashboard */
           require_once 'view/dashboard/pedidos/readAllPedido.view.php';

           require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
        }

    }
?>