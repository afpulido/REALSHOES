<?php
    class PersonaSeleccionaProducto {
        #Atributos
        private $dbConexion;
        private $persona_selecciona_producto_id;
        private $persona_id;
        private $producto_id;
        private $pedido_id;
        private $cantidad;
        private $precio_unitario;
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
        #pedido
        public function __construct2( $persona_selecciona_producto_id,$pedido_id){
            $this->persona_selecciona_producto_id = $persona_selecciona_producto_id;
            $this->pedido_id->$pedido_id;    
        }

        #constructor factura-psp
        public function __construct4( $persona_selecciona_producto_id, $pedido_id,  $cantidad, $precio_unitario){
            $this->persona_selecciona_producto_id = $persona_selecciona_producto_id;
            $this->pedido_id->$pedido_id;  
            $this->cantidad = $cantidad;
            $this->precio_unitario = $precio_unitario;  
        }

        public function __construct9(
            $persona_selecciona_producto_id,
            $persona_id,
            $producto_id,
            $pedido_id,
            $cantidad,
            $precio_unitario,
            $fecha_creacion,
            $ultima_modificacion,
            $fecha_eliminaciondesactivacion
        ) {
            $this->persona_selecciona_producto_id = $persona_selecciona_producto_id;
            $this->persona_id = $persona_id;
            $this->producto_id = $producto_id;
            $this->pedido_id = $pedido_id;
            $this->cantidad = $cantidad;
            $this->precio_unitario = $precio_unitario;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
    
        // Getter methods
        public function getPersonaSeleccionaProductoId() {
            return $this->persona_selecciona_producto_id;
        }
    
        public function getPersonaId() {
            return $this->persona_id;
        }
    
        public function getProductoId() {
            return $this->producto_id;
        }
    
        public function getPedidoId() {
            return $this->pedido_id;
        }
    
        public function getCantidad() {
            return $this->cantidad;
        }
    
        public function getPrecioUnitario() {
            return $this->precio_unitario;
        }
    
        public function getFechaCreacion() {
            return $this->fecha_creacion;
        }
    
        public function getUltimaModificacion() {
            return $this->ultima_modificacion;
        }
    
        public function getFechaEliminacionDesactivacion() {
            return $this->fecha_eliminaciondesactivacion;
        }
    
        // Setter methods
        public function setPersonaSeleccionaProductoId($persona_selecciona_producto_id) {
            $this->persona_selecciona_producto_id = $persona_selecciona_producto_id;
        }
    
        public function setPersonaId($persona_id) {
            $this->persona_id = $persona_id;
        }
    
        public function setProductoId($producto_id) {
            $this->producto_id = $producto_id;
        }
    
        public function setPedidoId($pedido_id) {
            $this->pedido_id = $pedido_id;
        }
    
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
    
        public function setPrecioUnitario($precio_unitario) {
            $this->precio_unitario = $precio_unitario;
        }
    
        public function setFechaCreacion($fecha_creacion) {
            $this->fecha_creacion = $fecha_creacion;
        }
    
        public function setUltimaModificacion($ultima_modificacion) {
            $this->ultima_modificacion = $ultima_modificacion;
        }
    
        public function setFechaEliminacionDesactivacion($fecha_eliminaciondesactivacion) {
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
    
    


        #CRUD PersonaSeleccionaProductos
        # Metodos / funciones/ Casos de USO

        #CU0 seleccionar un producto OK
        public function seleccionarProducto(){
            try{
                $sql = 'INSERT INTO persona_selecciona_productos VALUES(
                    :persona_selecciona_producto_id,
                    :persona_id,
                    :producto_id,
                    :pedido_id,
                    :cantidad,
                    :precio_unitario,
                    :fechaCreacion,
                    :ultimaModificacion,
                    :fechaEliminacionDesactivacion
                )';
                $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('persona_selecciona_producto_id',$this->getPersonaSeleccionaProductoId());
                    $stmt->bindValue('persona_id',$this->getPedidoId());
                    $stmt->bindValue('producto_id',$this->getProductoId());
                    $stmt->bindValue('pedido_id',$this->getPedidoId());
                    $stmt->bindValue('cantidad',$this->getCantidad());
                    $stmt->bindValue('precio_unitario',$this->getPrecioUnitario());
                    $stmt->bindValue('fechaCreacion',$this->getFechaCreacion());
                    $stmt->bindValue('ultimaModificacion',$this->getUltimaModificacion());
                    $stmt->bindValue('fechaEliminacionDesactivacion',$this->getFechaEliminacionDesactivacion());
                $stmt->execute();

            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

        #CU0 deseleccionar un producto
        public function deseleccionarProducto($persona_selecciona_producto_id){
            try{
                $sql = 'DELETE FROM persona_selecciona_productos
                        WHERE persona_selecciona_producto_id = :persona_selecciona_producto_id';

                $stmt = $this->dbConexion->prepare($sql);
                
                    $stmt->bindValue('persona_selecciona_producto_id', $persona_selecciona_producto_id);

                $stmt->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        #CU0 Sumar cantidad de productos

        #CU0 Mostrar todos los productos agregados al carrito por pedido
        public function mostrarProductosCarrito($pedido_id){
            try{
                $carritoList = [];
                $sql = "SELECT * FROM persona_selecciona_productos
                        WHERE pedido_id = :id";
                $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('id', $pedido_id);
                
                $stmt->execute();

                    foreach ($stmt->fetchAll() as $carrito){
                        $carritoList[] = new PersonaSeleccionaProducto(
                            $carrito['persona_selecciona_producto_id'],
                            $carrito['persona_id'],
                            $carrito['producto_id'],
                            $carrito['pedido_id'],
                            $carrito['cantidad'],
                            $carrito['precio_unitario'],
                            $carrito['fecha_creacion'],
                            $carrito['ultima_modificacion'],
                            $carrito['fecha_eliminaciondesactivacion']
                        );
                    }
                return $carritoList;
            }catch(Exception $e){
                die($e->getMessage());
            } 
            
        }

        #CU0 contar cuantos productos hay en el carrito
        public function contarProductosPedido($pedido_id){
            try{
                $sql ='SELECT COUNT(persona_selecciona_producto_id) AS NProductos 
                    FROM persona_selecciona_productos 
                    WHERE pedido_id = :id';
                $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('id', $pedido_id);
                $stmt->execute();
                $cantidad =$stmt->fetchColumn();
                return $cantidad;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
?>    