<?php
    include_once "model/Pedido.php";
    include_once "model/Persona.php";
    include_once "model/Producto.php";
    include_once "model/PersonaSeleccionaProducto.php";
    
    class Factura {
        #Atributos
        private $dbConexion;
        private $factura_id;
        private $pedido_id;
        private $monto_total;
        private $estado;
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

        // Constructor
        public function __construct7($factura_id, $pedido_id, $monto_total, $estado, $fecha_creacion, $ultima_modificacion, $fecha_eliminaciondesactivacion) {
            $this->factura_id = $factura_id;
            $this->pedido_id = $pedido_id;
            $this->monto_total = $monto_total;
            $this->estado = $estado;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
        #constructor para factura
        public function __construct6($factura_id, $pedido_id, $monto_total, $estado, $fecha_creacion, $ultima_modificacion) {
            $this->factura_id = $factura_id;
            $this->pedido_id = $pedido_id;
            $this->monto_total = $monto_total;
            $this->estado = $estado;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
        }

        // Getter
        public function getFacturaId() {
            return $this->factura_id;
        }

        public function getPedidoId() {
            return $this->pedido_id;
        }

        public function getMontoTotal() {
            return $this->monto_total;
        }

        public function getEstado() {
            return $this->estado;
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

        // Setter
        public function setMontoTotal($monto_total) {
            $this->monto_total = $monto_total;
        }

        public function setFechaCreacion($fecha_creacion) {
            $this->fecha_creacion = $fecha_creacion;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function setUltimaModificacion($ultima_modificacion) {
            $this->ultima_modificacion = $ultima_modificacion;
        }

        public function setFechaEliminacionDesactivacion($fecha_eliminaciondesactivacion) {
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }

            #CRUD PersonaSeleccionaProductos
            # Metodos / funciones/ Casos de USO

            #CU0 registrar una factura
            public function registrarFactura(){
                try{
                    $sql ='INSERT INTO FACTURAS VALUES (
                        :factura_id,
                        :pedido_id,
                        :monto_total,
                        :estado,
                        :fecha_creacion,
                        :ultima_modificacion,
                        :fecha_eliminaciondesactivacion
                    )';
                    $stmt =$this->dbConexion->prepare($sql);
                        $stmt->bindValue('factura_id', $this->getFacturaId());
                        $stmt->bindValue('pedido_id', $this->getPedidoId());
                        $stmt->bindValue('monto_total', $this->getMontoTotal());
                        $stmt->bindValue('estado', $this->getEstado());
                        $stmt->bindValue('fecha_creacion', $this->getFechaCreacion());
                        $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
                        $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
                    $stmt->execute();

                }catch(Exception $e){
                    die($e->getMessage());
                }
                
            }

            # CU0 Consultar una Factura (por ID)
            public function consultarFacturaId($factura_id){

                try {
                /*  $sql = "SELECT * FROM FACTURAS WHERE factura_id=:factura_id"; */
                    $sql = " SELECT  
                                facturas.factura_id,
                                facturas.estado,
                                facturas.monto_total,
                                facturas.fecha_creacion,
                                facturas.ultima_modificacion,
                                pedidos.pedido_id,
                                pedidos.cantidad,
                                pedidos.subtotal, 
                                pedidos.metodo_pago_id,
                                persona_selecciona_productos.persona_selecciona_producto_id,
                                persona_selecciona_productos.cantidad,
                                persona_selecciona_productos.precio_unitario,
                                personas.persona_id,
                                personas.cedula,
                                personas.nombre,
                                personas.apellido,
                                personas.direccion,
                                personas.email,
                                productos.producto_id,
                                productos.nombre,
                                productos.descripcion
                            FROM 
                                persona_selecciona_productos
                            INNER JOIN
                                pedidos
                            ON   pedidos.pedido_id = persona_selecciona_productos.pedido_id
                            left JOIN 
                                personas
                            ON personas.persona_id = persona_selecciona_productos.persona_id
                            LEFT JOIN 
                                productos
                            ON productos.producto_id = persona_selecciona_productos.producto_id
                            LEFT join
                                facturas
                            ON facturas.pedido_id = pedidos.pedido_id
                            WHERE facturas.pedido_id = :pedido_id
                            ";

                    $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('pedido_id', $factura_id);
                    $stmt->execute();
                    $factura = $stmt->fetch();
                    $facturabyid = new Factura(
                        $factura['factura_id'],
                        $factura['pedido_id'],
                        $factura['monto_total'],
                        $factura['estado'],
                        $factura['fecha_creacion'],
                        $factura['ultima_modificacion']
                    );
                    $pedidos = new Pedido(
                        $factura['pedido_id'],
                        $factura['cantidad'],
                        $factura['subtotal'], 
                        $factura['metodo_pago_id'],
                    );
                    $psp = new PersonaSeleccionaProducto(
                        $factura['persona_selecciona_producto_id'],
                        $factura['pedido_id'],
                        $factura['cantidad'],
                        $factura['precio_unitario'],
                    );
                    $persona = new Persona(
                        $factura['persona_id'],
                        $factura['cedula'],
                        $factura['nombre'],
                        $factura['apellido'],
                        $factura['direccion'],
                        $factura['email'],
                    );
                    $producto = new Producto(
                        $factura['producto_id'],
                        $factura['nombre'],
                        $factura['descripcion'],
                    );
                    return $facturapediddo = array($facturabyid,$pedidos,$psp,$persona, $producto);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                    
            }

            #CU0 activar/desactivar una factura
            public function cambiarStatusFactura($id){
                if($id==0){
                    $estado='is null';
                }elseif($id==1){
                    $estado = 'is not null';
                }
                try{
                    $sql = 'SELECT * FROM FACTURAS 
                            WHERE fecha_eliminaciondesactivacion :estado';

                    $stmt=$this->dbConexion->prepare($sql);
                        $stmt->bindValue('estado', $estado);
                    $stmt->execute();
                }catch(Exception $e){
                    die($e->getMessage());
                }
                
            }

            #CU0 eliminar una factura
            public function eliminarFactura(){
                try{

                }catch(Exception $e){
                    die($e->getMessage());
                }
                
            }


            #CU0 mostrar una o todas las facturas
            public function consultarTodasFactura(){
                try{
                    $facturaList=[];
                    $sql = 'SELECT * FROM FACTURAS';
                    $stmt= $this->dbConexion->query($sql);
                
                    foreach($stmt->fetchAll() as $factura){
                        $facturaList[] = new Factura(
                            $factura['factura_id'],
                            $factura['pedido_id'],
                            $factura['monto_total'],
                            $factura['estado'],
                            $factura['fecha_creacion'],
                            $factura['ultima_modificacion'],
                            $factura['fecha_eliminaciondesactivacion']
                        );
                    }
                    return $facturaList;

                }catch(Exception $e){
                    die($e->getMessage());
                }
                
            }

    }
?>
