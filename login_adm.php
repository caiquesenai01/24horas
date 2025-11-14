<?php 
require_once "models/conexao.php";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Administrador</title>
	<link rel="stylesheet" href="styles/login_adm.css">
</head>
<body>
	<header>
		<img src="senai.png" alt="Logo SENAI" class="logo">
	</header>
	<div class="titulo">
		<h1>Login Administrador</h1>
	</div>
	<form action="" class="form">
		<input type="text" name="nome" id="" placeholder="Insira seu usuário">
		<input type="password" name="senha" id="" placeholder="Insira sua senha">
		<button type="submit">Entrar</button>
	</form>
	<nav class="navegacao">
		<ul>
			<li><a href="home.php">Voltar para Home</a></li>
			<li><a href="adm.php">Ir para ADM</a></li>
		</ul>
	</nav>
</body>
</html>
