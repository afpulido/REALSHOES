<?php

    class Inventario {
        #Atributos
        private $dbConexion;
        private $inventario_id;
        private $bodega;
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

        public function __construct6($inventario_id, $bodega, $descripcion, $fecha_creacion = null, $ultima_modificacion = null, $fecha_eliminaciondesactivacion = null) {
            $this->inventario_id = $inventario_id;
            $this->bodega = $bodega;
            $this->descripcion = $descripcion;
            $this->fecha_creacion = $fecha_creacion; /* ?: date('Y-m-d H:i:s'); */
            $this->ultima_modificacion = $ultima_modificacion /* ?: date('Y-m-d H:i:s') */;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }

        #Setter y Getters

        public function getInventarioId() {
            return $this->inventario_id;
        }

        public function setInventarioId($inventario_id) {
            $this->inventario_id = $inventario_id;
        }

        public function getBodega() {
            return $this->bodega;
        }

        public function setBodega($bodega) {
            $this->bodega = $bodega;
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

        # CU0 Registrar un nuevo inventario
        public function registrarinventario(){
            try{
                $sql= 'INSERT INTO INVENTARIOS VALUES
                    (:inventario_id,:bodega,:descripcion, :fecha_creacion,:ultima_modificacion, :fecha_eliminaciondesactivacion)';

                $stmt = $this->dbConexion->prepare($sql);

                $stmt->bindValue('inventario_id',$this->getInventarioId());
                $stmt->bindValue('bodega',$this->getBodega());
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

        # CU0 Consultar un inventario (por ID)
        public function consultarIdinventario($inventario_id){

            try {
                $sql = "SELECT * FROM INVENTARIOS 
                WHERE inventario_id=:inventario_id";
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('inventario_id', $inventario_id);
                $stmt->execute();
                $inventario = $stmt->fetch();
                $inventariobyid = new Inventario(
                        $inventario['inventario_id'],
                        $inventario['bodega'],
                        $inventario['descripcion'],
                        $inventario['fecha_creacion'],
                        $inventario['ultima_modificacion'],
                        $inventario['fecha_eliminaciondesactivacion'],
                );
                return $inventariobyid;
            } catch (Exception $e) {
                die($e->getMessage());
            }
                
        }

        #CU03 Consultar TODOS los INVENTARIOS (Activos y Desactivados)
         public function consultarTodosInventario(){
                try {
                    $inventarioList = []; /* arreglo para guardar los datos de */
                    $sql = 'SELECT * FROM INVENTARIOS'; /* Consulta normal de SQL */
                    $stmt = $this->dbConexion->query($sql);
                    foreach ($stmt->fetchAll() as $inventario) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                        $inventarioList[] = new inventario(
                            $inventario['inventario_id'],
                            $inventario['bodega'],
                            $inventario['descripcion'],
                            $inventario['fecha_creacion'],
                            $inventario['ultima_modificacion'],
                            $inventario['fecha_eliminaciondesactivacion']
                        );
                    }
                    return $inventarioList;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
        }
        
        public function consultarActivosinventario(){
            try {
                $inventarioList = []; /* arreglo para guardar los datos de */
                $sql = 'SELECT * FROM INVENTARIOS 
                    WHERE fecha_eliminaciondesactivacion is null'; /* Consulta normal de SQL */
                $stmt = $this->dbConexion->query($sql);
                foreach ($stmt->fetchAll() as $inventario) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                    $inventarioList[] = new Inventario(
                        $inventario['inventario_id'],
                        $inventario['bodega'],
                        $inventario['descripcion'],
                        $inventario['fecha_creacion'],
                        $inventario['ultima_modificacion'],
                        $inventario['fecha_eliminaciondesactivacion']
                    );
                }
                return $inventarioList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function consultarInactivosinventario(){
            try {
                $inventarioList = []; /* arreglo para guardar los datos de */
                $sql = 'SELECT * FROM INVENTARIOS 
                    WHERE fecha_eliminaciondesactivacion is not null'; /* Consulta normal de SQL */
                $stmt = $this->dbConexion->query($sql);
                foreach ($stmt->fetchAll() as $inventario) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                    $inventarioList[] = new Inventario(
                        $inventario['inventario_id'],
                        $inventario['bodega'],
                        $inventario['descripcion'],
                        $inventario['fecha_creacion'],
                        $inventario['ultima_modificacion'],
                        $inventario['fecha_eliminaciondesactivacion']
                    );
                }
                return $inventarioList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU04 activar los INVENTARIOS (Solo Activos o Inactivos)
        public function activarStatusinventario($inventario_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
            try {                
                $sql = 'UPDATE INVENTARIOS SET
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                            ultima_modificacion = :ultima_modificacion
                        WHERE inventario_id = :inventario_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
                $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
                $stmt->bindValue('inventario_id', $inventario_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        #CU05 Activar o desactivar un inventario
        public function desactivarStatusinventario($inventario_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
            try {                
                $sql = 'UPDATE INVENTARIOS SET
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                            ultima_modificacion = :ultima_modificacion
                        WHERE inventario_id = :inventario_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
                $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
                $stmt->bindValue('inventario_id', $inventario_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
         #CU06 Actualizar un inventario
        public function actualizarInventario() {
            try {                
                $sql = 'UPDATE INVENTARIOS SET
                            bodega = :bodega,
                            descripcion = :descripcion,
                            /* fecha_creacion = :fecha_creacion, */
                            ultima_modificacion = :ultima_modificacion,
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion
                        WHERE inventario_id = :inventario_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('bodega',$this->getbodega());
                $stmt->bindValue('descripcion', $this->getDescripcion());
                /* $stmt->bindValue('fecha_creacion', $this->getFechaCreacion()); */
                $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
                $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
                $stmt->bindValue('inventario_id', $this->getinventarioId());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

         #CU07 Eliminar definitivamente un inventario
        public function eliminarInventario($inventario_id) {
            try {
                $sql = 'DELETE FROM INVENTARIOS WHERE inventario_id = :inventario_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('inventario_id', $inventario_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
           
        }
    }
/* 
    $inventario = new inventarioModel(null, "Admin", "Administrator inventarioe");
    $inventario->setFechaEliminacionDesactivacion("2023-08-21 12:00:00");
    
    echo "inventario ID: " . $inventario->getinventarioId() . "<br>";
    echo "bodega: " . $inventario->getbodega() . "<br>";
    echo "Descripción: " . $inventario->getDescripcion() . "<br>";
    echo "Fecha Creación: " . $inventario->getFechaCreacion() . "<br>";
    echo "Última Modificación: " . $inventario->getUltimaModificacion() . "<br>";
    echo "Fecha Eliminación/Desactivación: " . $inventario->getFechaEliminacionDesactivacion() . "<br>";
 */    


?>

