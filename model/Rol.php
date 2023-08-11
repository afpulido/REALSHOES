<?php
    class Rol{
        #Atributos
        private $dbConexion;
        private $idRol;
        private $nombreRol;
        private $descripcionRol;
        private $deletedRol;
        private $createdRol;
        private $updatedRol;
        
        #Constructores
        public function __construct(){
            try {
                $this->dbConexion = DataBase::conexion();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
            
        }  

        public function __construct6($idRol, $nombreRol, $descripcionRol, $deletedRol, $createdRol, $updatedRol){
            $this->idRol = $idRol;
            $this->nombreRol= $nombreRol;
            $this->descripcionRol= $descripcionRol;
            $this->deletedRol = $deletedRol;
            $this->createdRol= $createdRol;
            $this->updatedRol= $updatedRol;
        }
        

        #Setter y Getters
        public function setIdRol($idRol){
            $this->idRol = $idRol;
        } 
        public function getIdRol(){
            return $this->idRol;
        }
        


        # Metodos / funciones/ Casos de USO
    }



?>