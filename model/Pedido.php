<?php
    class Pedido {
        #Atributos
        private $dbConexion;
        private $pedido_id;
        private $cantidad;
        private $subtotal;
        private $metodo_pago_id;
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

        public function __construct7($pedido_id, $cantidad, $subtotal, $metodo_pago_id, $fecha_creacion, $ultima_modificacion, $fecha_eliminaciondesactivacion){
            $this->pedido_id = $pedido_id;
            $this->cantidad = $cantidad;
            $this->subtotal = $subtotal;
            $this->metodo_pago_id = $metodo_pago_id;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
        #constructor factura-pedido
        public function __construct6($pedido_id, $cantidad, $subtotal, $metodo_pago_id,  $fecha_creacion, $ultima_modificacion){
            $this->pedido_id = $pedido_id;
            $this->cantidad = $cantidad;
            $this->subtotal = $subtotal;
            $this->metodo_pago_id = $metodo_pago_id;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
        }

        #getters and setters
    
        public function getPedidoId() {
            return $this->pedido_id;
        }
    
        public function getCantidad() {
            return $this->cantidad;
        }
    
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
    
        public function getSubtotal() {
            return $this->subtotal;
        }
    
        public function setSubtotal($subtotal) {
            $this->subtotal = $subtotal;
        }
    
        public function getMetodoPagoId() {
            return $this->metodo_pago_id;
        }
    
        public function setMetodoPagoId($metodo_pago_id) {
            $this->metodo_pago_id = $metodo_pago_id;
        }
    
        public function getFechaCreacion() {
            return $this->fecha_creacion;
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

        #CRUD Pedido
        # Metodos / funciones/ Casos de USO

        #CU0 registrar un pedido
        public function registrarPedido(){
            try{
                $sql = "INSERT INTO PEDIDOS VALUES (
                            :pedido_id,
                            :cantidad,
                            :subtotal,
                            :metodo_pago_id,
                            :fecha_creacion,
                            :ultima_modificacion,
                            :fecha_eliminaciondesactivacion
                        )";
                $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('pedido_id',$this->getPedidoId());
                    $stmt->bindValue('cantidad',$this->getCantidad());
                    $stmt->bindValue('subtotal',$this->getSubtotal());
                    $stmt->bindValue('metodo_pago_id',$this->getMetodoPagoId());
                    $stmt->bindValue('fecha_creacion',$this->getFechaCreacion());
                    $stmt->bindValue('ultima_modificacion',$this->getUltimaModificacion());
                    $stmt->bindValue('fecha_eliminaciondesactivacion',$this->getFechaEliminacionDesactivacion());
                $stmt->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

        #CU0 Consultar siguiente id Pedido
        public function consultarSiguientePedidoId(){
            try{
                $sql = "SELECT pedido_id +1 AS pedido_id 
                        FROM pedidos 
                        ORDER BY pedido_id DESC 
                        LIMIT 1";

                $stmt= $this->dbConexion->query($sql);

                $stmt->execute();

            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
                
        #CU0 consultar todos los pedido
        public function consultarTodosPedido(){
            try{
                $pedidoList=[];
                $sql = 'SELECT * FROM PEDIDOS';
                $stmt = $this->dbConexion->query($sql);

                foreach ($stmt->fetchAll() as $pedido){
                    $pedidoList[] = new Pedido(
                        $pedido['pedido_id'],
                        $pedido['cantidad'],
                        $pedido['subtotal'],
                        $pedido['metodo_pago_id'],
                        $pedido['fecha_creacion'],
                        $pedido['ultima_modificacion'],
                        $pedido['fecha_eliminaciondesactivacion']
                    );
                }
                return $pedidoList;
            }catch (Exception $e){
                die($e->getMessage());
            }

           /*  try{
                $pedidoList=[];
                $sql = "SELECT * FROM PEDIDOS";
                $stmt= $this->dbConexion->query($sql);

                foreach($stmt->fetchAll() as $pedido){
                    $pedidoList[] = new Pedido(
                        $pedido['pedido_id'],
                        $pedido['cantidad'],
                        $pedido['subtotal'],
                        $pedido['metodo_pago_id'],
                        $pedido['fecha_creacion'],
                        $pedido['ultima_modificacion'],
                        $pedido['fecha_eliminaciondesactivacion']
                    );
                }
                return $pedidoList;
            }catch(Exception $e){
                die($e->getMessage());
            } */
            
        }
        #CU0 actualizar un pedido
        #CU0 actualizar un pedido
        #CU0 actualizar un pedido






        #CU0 comprar uno o varios productos

        #CU0 cancelar un pedido



    }
    

?>