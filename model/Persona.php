<?php
    class Persona {
        #Atributos
        private $dbConexion;
        private $persona_id;
        private $cedula;
        private $nombre;
        private $apellido;
        private $direccion;
        private $contrasena;
        private $telefono;
        private $email;
        private $imagen;
        private $rol_id;
        private $fecha_creacion;
        private $ultima_modificacion;
        private $fecha_eliminaciondesactivacion;
    
    #sobre carga de Constructores
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

    #registrar cliente
    public function __construct7($persona_id, $email,$contrasena,$rol_id,$fecha_creacion, $ultima_modificacion, $fecha_eliminaciondesactivacion){
        $this->persona_id = $persona_id;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->rol_id = $rol_id;
        $this->fecha_creacion = $fecha_creacion;
        $this->ultima_modificacion = $ultima_modificacion;
        $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
    }

    #Iniciar sesion
    public function __construct2($email,$contrasena){
        $this->email=$email;
        $this->contrasena=$contrasena;
        
    }
    /* cargar imagen */
    public function __construct3($persona_id,$imagen, $ultima_modificacion){
        $this->persona_id = $persona_id;
        $this->imagen = $imagen;
        $this->ultima_modificacion = $ultima_modificacion;
    }
    /* modificar información personal*/
    public function __construct6($persona_id, $cedula, $nombre, $apellido, $email, $ultima_modificacion) {
        $this->persona_id = $persona_id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->ultima_modificacion = $ultima_modificacion;
    }
    /* datos de compra */
    public function __construct4($persona_id, $direccion, $telefono, $ultima_modificacion) {
        $this->persona_id = $persona_id;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->ultima_modificacion = $ultima_modificacion;
    }
    /* cambiar password */
    public function __construct5($persona_id, $contrasena, $ultima_modificacion) {
        $this->persona_id = $persona_id;
        $this->contrasena = $contrasena;
        $this->ultima_modificacion = $ultima_modificacion;
        
    }
    /* registrar un empleado */
    public function __construct13($persona_id, $cedula, $nombre, $apellido, $direccion, $contrasena,$telefono, $email, $imagen, $rol_id, $fecha_creacion = null, $ultima_modificacion = null, $fecha_eliminaciondesactivacion = null) {
        $this->persona_id = $persona_id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->contrasena = $contrasena;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->imagen = $imagen;
        $this->rol_id = $rol_id;
        $this->fecha_creacion = $fecha_creacion;
        $this->ultima_modificacion = $ultima_modificacion;
        $this->fecha_eliminaciondesactivacion = $fecha_eliminaciondesactivacion;
    }

    // Getters
    public function getPersonaId() {
        return $this->persona_id;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getRolId() {
        return $this->rol_id;
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

    // Setters
    public function setPersonaId($persona_id) {
        $this->persona_id = $persona_id;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setRolId($rol_id) {
        $this->rol_id = $rol_id;
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

    #metodos o funciones USUARIOS
    
    #CU0 Registrar toda persona
    public function registrarUsuario(){
        try{
            $sql = 'INSERT INTO PERSONAS VALUES(
                :persona_id,
                :cedula,
                :nombre,
                :apellido,
                :direccion,
                :contrasena,
                :telefono,
                :email,
                :imagen,
                :rol_id,
                :fecha_creacion,
                :ultima_modificacion,
                :fecha_eliminaciondesactivacion
                )';

            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('persona_id', $this->getPersonaId());
            $stmt->bindValue('cedula', $this->getCedula());
            $stmt->bindValue('nombre', $this->getNombre());
            $stmt->bindValue('apellido', $this->getApellido());
            $stmt->bindValue('direccion', $this->getDireccion());
            $stmt->bindValue('contrasena', $this->getContrasena());
            $stmt->bindValue('telefono', $this->getTelefono());
            $stmt->bindValue('email', $this->getEmail());
            $stmt->bindValue('imagen', $this->getImagen());
            $stmt->bindValue('rol_id', $this->getRolId());
            $stmt->bindValue('fecha_creacion', $this->getFechaCreacion());
            $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
            $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
            
            $stmt->execute();      
        }catch(Exception $e){
            die ($e->getMessage());
        }
        
    }

    #CU0 Iniciar sesión usuario(Login) OK
    public function login($email, $contrasena){
        try{
            $sql='SELECT * FROM PERSONAS
                WHERE email =  :email
                LIMIT 1';
            
            $stmt = $this->dbConexion->prepare($sql);
           
            $stmt->bindValue('email', $this->getEmail());
            /* $stmt->bindValue('contrasena',password_verify($contrasena,$this->getContrasena())); */
            
            $stmt->execute();
            /* print_r($stmt); */

            $usuarioDB = $stmt->fetch();

            if($usuarioDB){
                $login = new Persona(
                    $usuarioDB['persona_id'],
                    $usuarioDB['cedula'],
                    $usuarioDB['nombre'],
                    $usuarioDB['apellido'],
                    $usuarioDB['direccion'],
                    $usuarioDB['contrasena'],
                    $usuarioDB['telefono'],
                    $usuarioDB['email'],
                    $usuarioDB['imagen'],
                    $usuarioDB['rol_id'],
                    $usuarioDB['fecha_creacion'],
                    $usuarioDB['ultima_modificacion'],
                    $usuarioDB['fecha_eliminaciondesactivacion']

                );
                if(password_verify($contrasena,$usuarioDB['contrasena'])){
                    return $login;
                }/* else{
                    echo "La contraseña no coincide";
                } */
            } else {
                return false;
            }
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    #CU0 Mostrar Usuario por ID
    public function consultarIdPersona($persona_id){
        try{
            $sql = "SELECT * FROM PERSONAS WHERE persona_id = :persona_id";

            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('persona_id', $persona_id);

            $stmt ->execute();

            $personam =$stmt->fetch();
            $personabyid= new Persona(
                $personam['persona_id'],
                $personam['cedula'],
                $personam['nombre'],
                $personam['apellido'],
                $personam['direccion'],
                $personam['contrasena'],
                $personam['telefono'],
                $personam['email'],
                $personam['imagen'],
                $personam['rol_id'],
                $personam['fecha_creacion'],
                $personam['ultima_modificacion'],
                $personam ['fecha_eliminaciondesactivacion']
            );
            return $personabyid;

        }catch (Exception $e){
            die($e->getMessage());
        }
        
    }

    #CU0 actualizar usuario 
    public function actualizarUsuario(){
        try{
            $sql = 'UPDATE PERSONAS SET
               cedula = :cedula,
               nombre = :nombre,
               apellido = :apellido,
               direccion = :direccion,
               contrasena = :contrasena,
               telefono =:telefono,
               email = :email,
               imagen = :imagen,
               rol_id = :rol_id,
               ultima_modificacion = :ultima_modificacion,
                fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion
                WHERE persona_id = :persona_id
                )';

            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('persona_id', $this->getPersonaId());
            $stmt->bindValue('cedula', $this->getCedula());
            $stmt->bindValue('nombre', $this->getNombre());
            $stmt->bindValue('apellido', $this->getApellido());
            $stmt->bindValue('direccion', $this->getDireccion());
            $stmt->bindValue('contrasena', $this->getContrasena());
            $stmt->bindValue('telefono', $this->getTelefono());
            $stmt->bindValue('email', $this->getEmail());
            $stmt->bindValue('imagen', $this->getImagen());
            $stmt->bindValue('rol_id', $this->getRolId());
            $stmt->bindValue('ultima_modificacion', $this->getUltimaModificacion());
            $stmt->bindValue('fecha_eliminaciondesactivacion', $this->getFechaEliminacionDesactivacion());
        }catch(Exception $e){
            die($e->getMessage());

        }

        
    } 

    #CU0 Mostrar todos los Usuarios
    public function consultarTodosPersona(){
        try {
            $personasList = []; /* arreglo para guardar los datos de */
            /*$sql = 'SELECT * FROM PERSONAS'; /* Consulta normal de SQL */
            $sql = 'SELECT personas.*, roles.nombre AS rol_nombre
                        FROM personas
                        INNER JOIN roles ON personas.rol_id = roles.rol_id 
                        WHERE personas.rol_id IN (1, 2, 3, 4)';
            $stmt = $this->dbConexion->query($sql);
            foreach ($stmt->fetchAll() as $persona) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                $personasList[] = new Persona(
                    $persona['persona_id'],
                    $persona['cedula'],
                    $persona['nombre'],
                    $persona['apellido'],
                    $persona['direccion'],
                    $persona['contrasena'],
                    $persona['telefono'],
                    $persona['email'],
                    $persona['imagen'],
                    $persona['rol_nombre'],
                    $persona['fecha_creacion'],
                    $persona['ultima_modificacion'],
                    $persona['fecha_eliminaciondesactivacion']                                      
                );
            }
            return $personasList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    #CU0 Mostrar todos los Empleados
    public function consultarTodosEmpleado(){
        try {
            $personasList = []; /* arreglo para guardar los datos de */
            /*$sql = 'SELECT * FROM PERSONAS'; /* Consulta normal de SQL */
            $sql = 'SELECT personas.*, roles.nombre AS rol_nombre
                        FROM personas
                        INNER JOIN roles ON personas.rol_id = roles.rol_id 
                        WHERE personas.rol_id IN (1,2, 3)';
            $stmt = $this->dbConexion->query($sql);
            foreach ($stmt->fetchAll() as $persona) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                $personasList[] = new Persona(
                    $persona['persona_id'],
                    $persona['cedula'],
                    $persona['nombre'],
                    $persona['apellido'],
                    $persona['direccion'],
                    $persona['contrasena'],
                    $persona['telefono'],
                    $persona['email'],
                    $persona['imagen'],
                    $persona['rol_nombre'],
                    $persona['fecha_creacion'],
                    $persona['ultima_modificacion'],
                    $persona['fecha_eliminaciondesactivacion']                                      
                );
            }
            return $personasList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    #CU0 Mostrar todos los Clientes
    public function consultarTodosCliente(){
        try {
            $personasList = []; /* arreglo para guardar los datos de */
            /*$sql = 'SELECT * FROM PERSONAS'; /* Consulta normal de SQL */
            $sql = 'SELECT personas.*, roles.nombre AS rol_nombre
                        FROM personas
                        INNER JOIN roles ON personas.rol_id = roles.rol_id 
                        WHERE personas.rol_id IN (4)';
            $stmt = $this->dbConexion->query($sql);
            foreach ($stmt->fetchAll() as $persona) { /* hace el bucle para mostrar todos los campos de un registro n cantidad de veces */
                $personasList[] = new Persona(
                    $persona['persona_id'],
                    $persona['cedula'],
                    $persona['nombre'],
                    $persona['apellido'],
                    $persona['direccion'],
                    $persona['contrasena'],
                    $persona['telefono'],
                    $persona['email'],
                    $persona['imagen'],
                    $persona['rol_nombre'],
                    $persona['fecha_creacion'],
                    $persona['ultima_modificacion'],
                    $persona['fecha_eliminaciondesactivacion']                                      
                );
            }
            return $personasList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    #CU0 Activar o desactivar usuario
    public function activarStatusPersona($persona_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
        try {                
            $sql = 'UPDATE PERSONAS SET
                        fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                        ultima_modificacion = :ultima_modificacion
                    WHERE persona_id = :persona_id';
            $stmt = $this->dbConexion->prepare($sql);
            $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    #CU0 Activar o desactivar un rol
    public function desactivarStatusPersona($persona_id, $fecha_eliminaciondesactivacion, $ultima_modificacion) {
        try {                
            $sql = 'UPDATE PERSONAS SET
                        fecha_eliminaciondesactivacion = :fecha_eliminaciondesactivacion,
                        ultima_modificacion = :ultima_modificacion
                    WHERE persona_id = :persona_id';
            $stmt = $this->dbConexion->prepare($sql);
            $stmt->bindValue('fecha_eliminaciondesactivacion', $fecha_eliminaciondesactivacion);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    #CU0 Eliminar definitivamente Usuario
    public function eliminarPersona($persona_id) {
        try {
            $sql = 'DELETE FROM PERSONAS WHERE persona_id = :persona_id';
            $stmt = $this->dbConexion->prepare($sql);
            $stmt->bindValue('persona_id', $persona_id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
       
    }

    #CU0 Cambiar contraseña
    public function cambiarContrasena($persona_id, $contrasena, $ultima_modificacion){
        try{
            $sql= 'UPDATE PERSONAS SET
                contrasena = :contrasena,
                ultima_modificacion = :ultima_modificacion
                WHERE persona_id = :persona_id';
            
            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('contrasena', $contrasena);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);

            $stmt ->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    #CU0 Cambiar Imagen de Perfil
    public function cambiarImagenPerfil($persona_id, $imagen, $ultima_modificacion){
        try{
            $sql= 'UPDATE PERSONAS SET
                imagen = :imagen,
                ultima_modificacion = :ultima_modificacion
                WHERE persona_id = :persona_id';
            
            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('imagen', $imagen);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);

            $stmt ->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    #CU0 Cambiar datos perfil usuario
    public function cambiarDatosPerfil($persona_id, $cedula,$nombre, $apellido, $email, $ultima_modificacion){
        try{
            $sql= 'UPDATE PERSONAS SET
                cedula = :cedula,
                nombre = :nombre,
                apellido = :apellido,
                email = :email,
                ultima_modificacion = :ultima_modificacion
                WHERE persona_id = :persona_id';
            
            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('cedula', $cedula);
            $stmt->bindValue('nombre', $nombre);
            $stmt->bindValue('apellido', $apellido);
            $stmt->bindValue('email', $email);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);

            $stmt ->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    #CU0 Cambiar datos de Compra
    public function cambiarDatosCompra($persona_id, $direccion, $telefono, $ultima_modificacion){
        try{
            $sql= 'UPDATE PERSONAS SET
                direccion = :direccion,
                telefono = :telefono,
                ultima_modificacion = :ultima_modificacion
                WHERE persona_id = :persona_id';
            
            $stmt = $this->dbConexion->prepare($sql);

            $stmt->bindValue('direccion', $direccion);
            $stmt->bindValue('telefono', $telefono);
            $stmt->bindValue('ultima_modificacion', $ultima_modificacion);
            $stmt->bindValue('persona_id', $persona_id);

            $stmt ->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    }
?>
