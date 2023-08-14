<?php
    /* inicio de solo vistas */
    /* header('location:view/tienda/tienda.view.php'); */

    /*  c=?id "tienda", "dashboard", 1,2
    a=?t "tienda"/?d "dashboard"    
    */
    session_start();    

    require_once "model/DataBase.php";    
    if (!isset($_REQUEST['c'])) {        
            require_once "controller/Tiendas.php";        
            $controllert = new Tiendas;
            $controllert->main();
            /* $controller=new Dashboard;
            $controllerd->main(); */
    } else {
            $controller = $_REQUEST['c'];
            require_once "controller/" . $controller . ".php";
            $controller = new $controller;
            $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
            call_user_func(array($controller, $action));
       
    }


    
    /* 
    require_once "model/DataBase.php";    
    if (!isset($_REQUEST['id'])) { 
        $usuario="Pepito";      
        if($usuario!='Invitado'){
            require_once "controller/Dashboard.php";
            $controller = new Dashboard;
        }else{
            require_once "controller/Tiendas.php";        
            $controller = new Tiendas;
            $controller->main();
        }
    } else {
        if($usuario!='Invitado'){
            $controller = $_REQUEST['id'];
            require_once "controller/" . $controller . ".php";
            $controller = new $controller;
            $action = isset($_REQUEST['d']) ? $_REQUEST['d'] : 'main';
            call_user_func(array($controller, $action));
        }else{
            $controller = $_REQUEST['id'];
            require_once "controller/" . $controller . ".php";
            $controller = new $controller;
            $action = isset($_REQUEST['t']) ? $_REQUEST['t'] : 'main';
            call_user_func(array($controller, $action));
        }
    } */


?>