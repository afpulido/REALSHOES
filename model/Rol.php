<?php

    class Rol {
        #Atributos
        private $dbConexion;
        private $rol_id;
        private $nombre;
        private $descripcion;
        private $fecha_creacion;
        private $ultima_modificacion;
        private $fecha_eliminaciondesactivacion;

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

        public function __construct6($rol_id, $nombre, $descripcion, $fecha_creacion, $ultima_modificacion = null, $fecha_eliminaciondesactivacion = null) {
            $this->rol_id = $rol_id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->fecha_creacion = $fecha_creacion; /* ?: date('Y-m-d H:i:s'); */
            $this->ultima_modificacion = $ultima_modificacion /* ?: date('Y-m-d H:i:s') */;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }

        #Setter y Getters

        public function getRolId() {
            return $this->rol_id;
        }

        public function setRolId($rol_id) {
            $this->rol_id = $rol_id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getFechaCreacion() {
            return $this->fecha_creacion;
        }

        public function setFechaCreacion($fecha_creacion) {
            $this->fecha_creacion = $fecha_creacion;
        }

        public function getUltimaModificacion() {
            return $this->ultima_modificacion;
        }

        public function setUltimaModificacion($ultima_modificacion) {
            $this->ultima_modificacion = $ultima_modificacion;
        }

        public function getFechaEliminacionDesactivacion() {
            return $this->fecha_eliminaciondesactivacion;
        }

        public function setFechaEliminacionDesactivacion($fecha_eliminaciondesactivacion) {
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
    
        # Metodos / funciones/ Casos de USO

        # CU01 Registrar un nuevo ROL
        public function registrarRol(){
            try{
                $sql= 'INSERT INTO ROLES VALUES
                    (:rol_id,:nombre,:descripcion, :fecha_creacion,:ultima_modificacion, :fecha_eliminaciondesactivacion)';

                $stmt = $this->dbConexion->prepare($sql);

                $stmt->bindValue('rol_id',$this->getRolId());
                $stmt->bindValue('nombre',$this->getNombre());
                $stmt->bindValue('descripcion',$this->getDescripcion());
                $stmt->bindValue('fecha_creacion',$this->getFechaCreacion());
                $stmt->bindValue('ultima_modificacion',$this->getUltimaModificacion());
                $stmt->bindValue('fecha_eliminaciondesactivacion',$this->getFechaEliminacionDesactivacion());

                // Validar
                $stmt->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
                
        }

        # CU02 Consultar un ROL (por ID)
        public function consultarIdRol($rol_id){

            try {
                $sql = "SELECT * FROM ROLES WHERE rol_id=:rol_id";
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('rol_id', $rol_id);
                $stmt->execute();
                $rol = $stmt->fetch();
                $rolbyid = new Rol(
                        $rol['rol_id'],
                        $rol['nombre'],
                        $rol['descripcion'],
                        $rol['fecha_creacion'],
                        $rol['ultima_modificacion'],
                        $rol['fecha_eliminaciondesactivacion'],
                );
                return $rolbyid;
            } catch (Exception $e) {
                die($e->getMessage());
            }
                
        }

        #CU03 Consultar TODOS los ROLES (Activos y Desactivados)
         public function consultarTodosRol(){
            try {
                $rolList = []; /* arreglo para guardar los datos de */
                $sql = 'SELECT * FROM ROLES'; /* Consulta normal de SQL */
                $stmt = $this->dbConexion->query($sql);
                foreach ($stmt->fetchAll() as $rol) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                    $rolList[] = new Rol(
                        $rol['rol_id'],
                        $rol['nombre'],
                        $rol['descripcion'],
                        $rol['fecha_creacion'],
                        $rol['ultima_modificacion'],
                        $rol['fecha_eliminaciondesactivacion']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function consultarActivosRol(){
            try {
                $rolList = []; /* arreglo para guardar los datos de */
                $sql = 'SELECT * FROM ROLES 
                    WHERE fecha_eliminaciondesactivacion is null'; /* Consulta normal de SQL */
                $stmt = $this->dbConexion->query($sql);
                foreach ($stmt->fetchAll() as $rol) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                    $rolList[] = new Rol(
                        $rol['rol_id'],
                        $rol['nombre'],
                        $rol['descripcion'],
                        $rol['fecha_creacion'],
                        $rol['ultima_modificacion'],
                        $rol['fecha_eliminaciondesactivacion']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function consultarInactivosRol(){
            try {
                $rolList = []; /* arreglo para guardar los datos de */
                $sql = 'SELECT * FROM ROLES 
                    WHERE fecha_eliminaciondesactivacion is not null'; /* Consulta normal de SQL */
                $stmt = $this->dbConexion->query($sql);
                foreach ($stmt->fetchAll() as $rol) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                    $rolList[] = new Rol(
                        $rol['rol_id'],
                        $rol['nombre'],
                        $rol['descripcion'],
                        $rol['fecha_creacion'],
                        $rol['ultima_modificacion'],
                        $rol['fecha_eliminaciondesactivacion']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU04 activar los ROLES (Solo Activos o Inactivos)
        public function activarStatusRol($rol_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
            try {                
                $sql = 'UPDATE ROLES SET
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                            ultima_modificacion = :ultima_modificacion
                        WHERE rol_id = :rol_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
                $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
                $stmt->bindValue('rol_id', $rol_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        #CU05 Activar o desactivar un rol
        public function desactivarStatusRol($rol_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
            try {                
                $sql = 'UPDATE ROLES SET
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                            ultima_modificacion = :ultima_modificacion
                        WHERE rol_id = :rol_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
                $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
                $stmt->bindValue('rol_id', $rol_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
         #CU06 Actualizar un ROL
        public function actualizarRol() {
            try {                
                $sql = 'UPDATE ROLES SET
                            nombre = :nombre,
                            descripcion = :descripcion,
                            /* fecha_creacion = :fecha_creacion, */
                            ultima_modificacion = :ultima_modificacion,
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion
                        WHERE rol_id = :rol_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('nombre',$this->getNombre());
                $stmt->bindValue('descripcion', $this->getDescripcion());
                /* $stmt->bindValue('fecha_creacion', $this->getFechaCreacion()); */
                $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
                $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
                $stmt->bindValue('rol_id', $this->getRolId());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

         #CU07 Eliminar definitivamente un ROL
        public function eliminarRol($rol_id) {
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_id = :rol_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('rol_id', $rol_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
           
        }
        
        #CU0 contar todos roles
        public function contarTodosRoles(){
            try{
                $sql ='SELECT COUNT(rol_id) 
                    FROM ROLES';
                $stmt = $this->dbConexion->query($sql);
                $stmt->execute();
                $cantidad =$stmt->fetchColumn();
                return $cantidad;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        #CU0 contar activos roles
        public function contarActivosRoles(){
            try{
                $sql ='SELECT COUNT(rol_id) 
                    FROM ROLES
                    WHERE fecha_eliminaciondesactivacion is null';
                $stmt = $this->dbConexion->query($sql);
                $stmt->execute();
                $cantidad =$stmt->fetchColumn();
                return $cantidad;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        #CU0 contar inactivos roles
        public function contarInactivosRoles(){
            try{
                $sql ='SELECT COUNT(rol_id) 
                    FROM ROLES
                    WHERE fecha_eliminaciondesactivacion is not null';
                $stmt = $this->dbConexion->query($sql);
                $stmt->execute();
                $cantidad =$stmt->fetchColumn();
                return $cantidad;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }

?>

