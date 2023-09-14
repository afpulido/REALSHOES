<?php 
    include_once 'model/Persona.php';
    class Perfiles{
        public function __construct(){}
        
        public function main(){
        $pagina='Perfil';
        $title= 'Dashboard | Perfil';
        $usuario = 'Clark Astarte';
        
        $datosPerfil = new persona;

        $datosPerfil = $datosPerfil->consultarIdPersona($_POST['persona_id']);

        require_once 'view/plantillas/dashboard/dashboard.head.view.php';
        /* require_once 'view/plantillas/dashboard/dashboard.header.view.php';
        require_once 'view/plantillas/dashboard/dashboard.sidebar.view.php';
        require_once 'view/plantillas/dashboard/dashboard.break.view.php'; */

        /* Acá va vista de dashboard */
        require_once 'view/dashboard/perfil/profile.view.php';

        require_once 'view/plantillas/dashboard/dashboard.footer.view.php';
            
        }

        public function cambiarImagenPerfiles(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $perfil = new Persona ;
                $perfil =$perfil->consultarIdPersona($_POST['persona_id']);
                print_r($perfil);
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $valor= rand(1, 9999999);

                if(isset($_FILES['imagen'])){
                    echo $imagen=null;
                    $archivo = $_FILES['imagen']; 
                    $nombreimg =$valor.$archivo['name'];
                    $extension = $archivo['type'];
                    $ruta_provisional = $archivo['tmp_name'];
                    $carpeta = 'assets/img/dashboard/usuarios/';
                    if($extension != 'image/jpg' && $extension != 'image/JPG' 
                        && $extension != 'image/jpeg' && $extension != 'image/JPEG' 
                        && $extension != 'image/PNG' && $extension != 'image/png' ){

                        $_SESSION['codigoMensaje']=2;
                        $_SESSION['mensajeSesion']="Error al subir la Imagen:  no es válida: solo jpg, JPG, jpeg, JPEG, png, PNG";   
                    }else{
                        $ruta = $carpeta.$nombreimg;
                        move_uploaded_file($ruta_provisional,$ruta);
                        $imagen= $nombreimg; 
                    }
                } 
            }

            $cambiarperfil = new Persona(
                $_POST['persona_id'],
                $imagen,
                date("Y-m-d H:i:s")  
            );
            /* perfil cambiado exitosamente */
            $cambiarperfil->cambiarImagenPerfil($_POST['persona_id'],$imagen,date("Y-m-d H:i:s"));

            
        }

        public function CambiarDatosPerfiles(){
            if($_SERVER['REQUEST_METHOD']=='GET'){}
            if($_SERVER['REQUEST_METHOD']=='POST'){}
            
        }
        public function cambiarDatosCompras(){
            if($_SERVER['REQUEST_METHOD']=='GET'){}
            if($_SERVER['REQUEST_METHOD']=='POST'){}
            
        }

        public function cambiarContrasena(){
            if($_SERVER['REQUEST_METHOD']=='GET'){}
            if($_SERVER['REQUEST_METHOD']=='POST'){}
            
        }

    }


?>