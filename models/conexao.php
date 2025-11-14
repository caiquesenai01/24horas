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
//calma que eu faco mais coisa (quando for pra voce me chamar usa o botao de pin ali em cima)
