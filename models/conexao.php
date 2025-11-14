<?php 

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "suporte_senai"; 

$conn = new mysqli ($servername , $username ,$password , $dbname);

if  ($conn->connect_error) {
     die("Tentativa De Conexão Falhou". $conn->connect_error);
}
?>
