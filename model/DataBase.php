<?php
    class DataBase{
        public static function conexion(){            
            $hostname = "localhost";
            $port = "3306";
            $database = "realshoes";
            $username = "root";
            $password = "";
            
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

        /* function __construct(
            $host = 'localhost', 
            $dbname = 'test', 
            $user = 'root', 
            $pass = 'prueba', 
            $options = array() ){
            try {
                $this->_pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, $options);      
            }catch (PDOException $e) {  
                print "¡Error!: " . $e->getMessage();           die();      } 
        } */
                
	}
?>