<?php

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
        

        /* $prueba=getTitle($pagina); */

        /* vista de header titulo */
        require_once 'view/plantillas/dashboard/dashboard.head.view.php';
        require_once 'view/plantillas/dashboard/dashboard.header.view.php';
        require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
        require_once 'view/plantillas/dashboard/dashboard.break.view.php';

        /* Acá va vista de dashboard */
        require_once 'view/dashboard/dashboard.view.php';

        require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
    }


}






?>