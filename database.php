<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'registro';

//con esto se ingresa a la base de datos 
try {
    //almacena la conexion a abase de datos
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
//caso contrario     
} catch (PDOException $e) {
    die('conexión fallida:' .$e->getMessage());
}


?>