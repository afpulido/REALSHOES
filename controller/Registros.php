<?php
    class Registros{

        public function __construct(){}

        public function main(){
            $pagina= 'Registrarse';
            $title='Realshoes | Registrarse';
            $usuario = 'Invitado';
            /* $prueba=getTitle($pagina); */

            /* vista de header titulo */
            require_once 'view/plantillas/tienda/tienda.head.view.php';
            require_once 'view/plantillas/tienda/tienda.header.view.php';

            /* Acá va vista de login */
            require_once 'view/tienda/registrarse.view.php';

            require_once 'view/plantillas/tienda/tienda.footer.view.php';
        }
    }

?>