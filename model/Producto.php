<?php
    class Producto {
         #Atributos
         private $dbConexion;
         private $producto_id;
         private $nombre;
         private $descripcion;
         private $tipo;
         private $marca;
         private $coleccion;
         private $genero;
         private $talla;
         private $unidades;
         private $valor_compra;
         private $ganancia;
         private $valor_venta;
         private $imagen1;
         private $imagen2;
         private $imagen3;
         private $imagen4;
         private $inventario_id;
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
    

        public function __construct20($producto_id,$nombre, $descripcion,$tipo, $marca, $coleccion, $genero, $talla, $unidades, $valor_compra,$ganancia, $valor_venta, $imagen1,$imagen2,$imagen3, $imagen4, $inventario_id, $fecha_creacion,$ultima_modificacion, $fecha_eliminaciondesactivacion) {
            $this->producto_id = $producto_id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->tipo = $tipo;
            $this->marca = $marca;
            $this->coleccion = $coleccion;
            $this->genero = $genero;
            $this->talla = $talla;
            $this->unidades = $unidades;
            $this->valor_compra = $valor_compra;
            $this->ganancia = $ganancia;
            $this->valor_venta = $valor_venta;
            $this->imagen1 = $imagen1;
            $this->imagen2 = $imagen2;
            $this->imagen3 = $imagen3;
            $this->imagen4 = $imagen4;
            $this->inventario_id = $inventario_id;
            $this->fecha_creacion = $fecha_creacion;
            $this->ultima_modificacion = $ultima_modificacion;
            $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
        }
        
        #Constructor factura-producto
        public function __construct3($producto_id, $nombre, $descripcion){
            $this->producto_id = $producto_id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }

    
        public function getProductoId() {
            return $this->producto_id;
        }

        public function setProductoId($producto_id) {
            $this->producto_id = $producto_id;
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

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function setMarca($marca) {
            $this->marca = $marca;
        }

        public function getColeccion() {
            return $this->coleccion;
        }

        public function setColeccion($coleccion) {
            $this->coleccion = $coleccion;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function setGenero($genero) {
            $this->genero = $genero;
        }

        public function getTalla() {
            return $this->talla;
        }

        public function setTalla($talla) {
            $this->talla = $talla;
        }

        public function getUnidades() {
            return $this->unidades;
        }

        public function setUnidades($unidades) {
            $this->unidades = $unidades;
        }

        public function getValorCompra() {
            return $this->valor_compra;
        }

        public function setValorCompra($valor_compra) {
            $this->valor_compra = $valor_compra;
        }

        public function getGanancia() {
            return $this->ganancia;
        }

        public function setGanancia($ganancia) {
            $this->ganancia = $ganancia;
        }

        public function getValorVenta() {
            return $this->valor_venta;
        }

        public function setValorVenta($valor_venta) {
            $this->valor_venta = $valor_venta;
        }

        public function getImagen1() {
            return $this->imagen1;
        }

        public function setImagen1($imagen1) {
            $this->imagen1 = $imagen1;
        }

        public function getImagen2() {
            return $this->imagen2;
        }

        public function setImagen2($imagen2) {
            $this->imagen2 = $imagen2;
        }

        public function getImagen3() {
            return $this->imagen3;
        }

        public function setImagen3($imagen3) {
            $this->imagen3 = $imagen3;
        }

        public function getImagen4() {
            return $this->imagen4;
        }

        public function setImagen4($imagen4) {
            $this->imagen4 = $imagen4;
        }

        public function getInventarioId() {
            return $this->inventario_id;
        }

        public function setInventarioId($inventario_id) {
            $this->inventario_id = $inventario_id;
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
    
    
    
    
        #CRUD PRODUCTOS
        # Metodos / funciones/ Casos de USO
        
        #CU0 Registrar un nuevo producto
        public function registrarProducto(){
            try{
                $sql = 'INSERT INTO PRODUCTOS VALUES 
                (:producto_id, :nombre, :descripcion, :tipo, :marca, :coleccion, :genero, :talla, :unidades, :valor_compra, :ganancia, :valor_venta, :imagen1, :imagen2, :imagen3, :imagen4, :inventario_id,:fecha_creacion, :ultima_modificacion, :fecha_eliminaciondesactivacion)';

                $stmt = $this->dbConexion->prepare($sql);
                
                $stmt ->bindValue('producto_id', $this->getProductoId());
                $stmt ->bindValue('nombre', $this->getNombre());
                $stmt ->bindValue('descripcion', $this->getDescripcion());
                $stmt ->bindValue('tipo', $this->getTipo());
                $stmt ->bindValue('marca', $this->getMarca());
                $stmt ->bindValue('coleccion', $this->getColeccion());
                $stmt ->bindValue('genero', $this->getGenero());
                $stmt ->bindValue('talla', $this->getTalla());
                $stmt ->bindValue('unidades', $this->getUnidades());
                $stmt ->bindValue('valor_compra', $this->getValorCompra());
                $stmt ->bindValue('ganancia', $this->getGanancia());
                $stmt ->bindValue('valor_venta', $this->getValorVenta());
                $stmt ->bindValue('imagen1', $this->getImagen1());
                $stmt ->bindValue('imagen2', $this->getImagen2());
                $stmt ->bindValue('imagen3', $this->getImagen3());
                $stmt ->bindValue('imagen4', $this->getImagen4());
                $stmt ->bindValue('inventario_id', $this->getInventarioId());
                $stmt ->bindValue('fecha_creacion', $this->getFechaCreacion());
                $stmt ->bindValue('ultima_modificacion', $this->getUltimaModificacion());
                $stmt ->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
                
                // Validar
                $stmt->execute();
            }catch (Exception $e){
                die($e->getMessage());
            }
            
        }

        #CU0 consultar un por ID producto
        public function consultarIdProducto($producto_id){
            try{
                $sql = 'SELECT * FROM PRODUCTOS WHERE producto_id = :producto_id';

                $stmt = $this->dbConexion->prepare($sql);
                    $stmt->bindValue('producto_id', $producto_id);
                    $stmt->execute();
                    $producto = $stmt->fetch();
                    $productobyid = new Producto(
                        $producto['producto_id'],
                        $producto['nombre'], 
                        $producto['descripcion'], 
                        $producto['tipo'], 
                        $producto['marca'], 
                        $producto['coleccion'], 
                        $producto['genero'], 
                        $producto['talla'], 
                        $producto['unidades'], 
                        $producto['valor_compra'], 
                        $producto['ganancia'], 
                        $producto['valor_venta'], 
                        $producto['imagen1'], 
                        $producto['imagen2'], 
                        $producto['imagen3'], 
                        $producto['imagen4'], 
                        $producto['inventario_id'],
                        $producto['fecha_creacion'], 
                        $producto['ultima_modificacion'], 
                        $producto['fecha_eliminaciondesactivacion'],
                    );
                    return $productobyid;
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

        #CU0 actualizar todos los Productos
        public function actualizarProducto(){
            try{
                $sql = 'UPDATE PRODUCTOS SET 
                            nombre = :nombre, 
                            descripcion = :descripcion, 
                            tipo = :tipo, 
                            marca = :marca, 
                            coleccion = :coleccion, 
                            genero = :genero, 
                            talla = :talla, 
                            unidades = :unidades, 
                            valor_compra = :valor_compra, 
                            ganancia = :ganancia, 
                            valor_venta = :valor_venta, 
                            imagen1 = :imagen1, 
                            imagen2 = :imagen2, 
                            imagen3 = :imagen3, 
                            imagen4 = :imagen4, 
                            inventario_id = :inventario_id,
                            fecha_creacion = :fecha_creacion, 
                            ultima_modificacion = :ultima_modificacion, 
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion
                        WHERE producto_id = :producto_id';

                $stmt= $this->dbConexion->prepare($sql);

                    $stmt->bindValue('nombre', $this->getNombre());
                    $stmt->bindValue('descripcion', $this->getDescripcion());
                    $stmt->bindValue('tipo', $this->getTipo());
                    $stmt->bindValue('marca', $this->getMarca());
                    $stmt->bindValue('coleccion', $this->getColeccion());
                    $stmt->bindValue('genero', $this->getGenero());
                    $stmt->bindValue('talla', $this->getTalla());
                    $stmt->bindValue('unidades', $this->getUnidades());
                    $stmt->bindValue('valor_compra', $this->getValorCompra());
                    $stmt->bindValue('ganancia', $this->getGanancia());
                    $stmt->bindValue('valor_venta', $this->getValorVenta());
                    $stmt->bindValue('imagen1', $this->getImagen1());
                    $stmt->bindValue('imagen2', $this->getImagen2());
                    $stmt->bindValue('imagen3', $this->getImagen3());
                    $stmt->bindValue('imagen4', $this->getImagen4());
                    $stmt->bindValue('inventario_id', $this->getInventarioId());
                    $stmt->bindValue('fecha_creacion', $this->getFechaCreacion());
                    $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
                    $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
                    $stmt->bindValue('producto_id', $this->getProductoId());
                    
                $stmt->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

        #CU0 Consultar todos los Productos Activos
        public function consultarTodosProducto(){
            try{
                $productosList = [];
                $sql = 'SELECT * FROM PRODUCTOS';
                $stmt= $this->dbConexion->query($sql);
                
                foreach ($stmt->fetchAll() as $producto) {
                    $productosList [] = new Producto(
                        $producto['producto_id'],
                        $producto['nombre'], 
                        $producto['descripcion'], 
                        $producto['tipo'], 
                        $producto['marca'], 
                        $producto['coleccion'], 
                        $producto['genero'], 
                        $producto['talla'], 
                        $producto['unidades'], 
                        $producto['valor_compra'], 
                        $producto['ganancia'], 
                        $producto['valor_venta'], 
                        $producto['imagen1'], 
                        $producto['imagen2'], 
                        $producto['imagen3'], 
                        $producto['imagen4'], 
                        $producto['inventario_id'],
                        $producto['fecha_creacion'], 
                        $producto['ultima_modificacion'], 
                        $producto['fecha_eliminaciondesactivacion'],
                    );
                }
                return $productosList;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        #CU0 Activar o desactivar Productos
        public function activarStatusProducto($producto_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
            try {                
                $sql = 'UPDATE PRODUCTOS SET
                            fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                            ultima_modificacion = :ultima_modificacion
                        WHERE producto_id = :producto_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
                $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
                $stmt->bindValue('producto_id', $producto_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

         #CU0 Eliminar definitivamente Usuario
        public function eliminarProducto($producto_id) {
            try {
                $sql = 'DELETE FROM PRODUCTOS WHERE producto_id = :producto_id';
                $stmt = $this->dbConexion->prepare($sql);
                $stmt->bindValue('producto_id', $producto_id);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }

         #CU0 Mostar los 10 productos por cada genero dama
         public function consultarTodosDama(){
            try{
                $productosDamaList = [];
                $sql = 'SELECT * FROM PRODUCTOS WHERE genero = 1 limit 10';
                $stmt= $this->dbConexion->query($sql);
                
                foreach ($stmt->fetchAll() as $producto) {
                    $productosDamaList [] = new Producto(
                        $producto['producto_id'],
                        $producto['nombre'], 
                        $producto['descripcion'], 
                        $producto['tipo'], 
                        $producto['marca'], 
                        $producto['coleccion'], 
                        $producto['genero'], 
                        $producto['talla'], 
                        $producto['unidades'], 
                        $producto['valor_compra'], 
                        $producto['ganancia'], 
                        $producto['valor_venta'], 
                        $producto['imagen1'], 
                        $producto['imagen2'], 
                        $producto['imagen3'], 
                        $producto['imagen4'], 
                        $producto['inventario_id'],
                        $producto['fecha_creacion'], 
                        $producto['ultima_modificacion'], 
                        $producto['fecha_eliminaciondesactivacion'],
                    );
                }
                return $productosDamaList;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        #CU0 Mostar los 10 productos por cada genero caballero
        public function consultarTodosCaballero(){
            try{
                $productosCaballeroList = [];
                $sql = 'SELECT * FROM PRODUCTOS WHERE genero = 2 limit 10';
                $stmt= $this->dbConexion->query($sql);
                
                foreach ($stmt->fetchAll() as $producto) {
                    $productosCaballeroList [] = new Producto(
                        $producto['producto_id'],
                        $producto['nombre'], 
                        $producto['descripcion'], 
                        $producto['tipo'], 
                        $producto['marca'], 
                        $producto['coleccion'], 
                        $producto['genero'], 
                        $producto['talla'], 
                        $producto['unidades'], 
                        $producto['valor_compra'], 
                        $producto['ganancia'], 
                        $producto['valor_venta'], 
                        $producto['imagen1'], 
                        $producto['imagen2'], 
                        $producto['imagen3'], 
                        $producto['imagen4'], 
                        $producto['inventario_id'],
                        $producto['fecha_creacion'], 
                        $producto['ultima_modificacion'], 
                        $producto['fecha_eliminaciondesactivacion'],
                    );
                }
                return $productosCaballeroList;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

         #CU0 Mostar los 10 productos por cada genero infantil
         public function consultarTodosInfantil(){
            try{
                $productosInfantilList = [];
                $sql = 'SELECT * FROM PRODUCTOS WHERE genero = 3 limit 10';
                $stmt= $this->dbConexion->query($sql);
                
                foreach ($stmt->fetchAll() as $producto) {
                    $productosInfantilList [] = new Producto(
                        $producto['producto_id'],
                        $producto['nombre'], 
                        $producto['descripcion'], 
                        $producto['tipo'], 
                        $producto['marca'], 
                        $producto['coleccion'], 
                        $producto['genero'], 
                        $producto['talla'], 
                        $producto['unidades'], 
                        $producto['valor_compra'], 
                        $producto['ganancia'], 
                        $producto['valor_venta'], 
                        $producto['imagen1'], 
                        $producto['imagen2'], 
                        $producto['imagen3'], 
                        $producto['imagen4'], 
                        $producto['inventario_id'],
                        $producto['fecha_creacion'], 
                        $producto['ultima_modificacion'], 
                        $producto['fecha_eliminaciondesactivacion'],
                    );
                }
                return $productosInfantilList;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }


        #CU0 contar todos Productos
        public function contarTodosProductos(){
            try{
                $sql ='SELECT COUNT(producto_id) 
                    FROM PRODUCTOS';
                $stmt = $this->dbConexion->query($sql);
                $stmt->execute();
                $cantidad =$stmt->fetchColumn();
                return $cantidad;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        #CU0 contar activos roles
        public function contarActivosProductos(){
            try{
                $sql ='SELECT COUNT(producto_id) 
                    FROM PRODUCTOS
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
        public function contarInactivosProductos(){
            try{
                $sql ='SELECT COUNT(producto_id) 
                    FROM PRODUCTOS
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