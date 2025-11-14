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
//calma que eu faco mais coisa (quando for pra voce me chamar usa o botao de pin ali em cima)
