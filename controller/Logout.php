<?php 
    class Logout{
    public function __construct(){}

    public function main(){
        session_destroy();

        session_start();
        $_SESSION['mensajeSesion']="Ha cerrado sesión exitosamente ¡vuelve Pronto!";
        header('Location: ?');
    }

    }


?>