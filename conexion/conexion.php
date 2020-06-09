<?php
//parametros de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iaumg";

//crear conexion 
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
//verificar conexion
if($conn->connect_error){
	die("Error al conectar a la base de datos");
}

?>