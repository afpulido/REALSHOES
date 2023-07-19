<?php 

$serverName="localhost";
$dbname="RealShoes";
$username="";
$passworddb="";

$connectionInfo = array("Database"=>$dbname, 
            "UID"=>$username, 
            "PWD"=>$passworddb, 
            "CharacterSet"=>"UTF-8");

$connection = sqlsrv_connect ($serverName,$connectionInfo);

if($connection){
    echo "exitosa";
}else{
    echo "fallo";
    die (print_r(sqlsrv_errors(), true));
}

?>