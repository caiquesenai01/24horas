<?php 

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "shambles"; 

$conn = new mysqli ($servername , $dbname ,$password , $dbname);

if  ($conn->connect_error) {
     die("Tentativa De Conexão Falhou". $conn->connect_error);
}
?>
