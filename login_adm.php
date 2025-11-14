<?php 
require_once "models/conexao.php";
session_start();
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
	<form action="autenticar_adm.php" method="POST" class="form">
		<input type="text" name="nome" id="nome_usuario" placeholder="Insira seu usuário">
		<input type="password" name="senha" id="senha_usuario" placeholder="Insira sua senha">
		<button type="submit">Acessar</button>	</form>
	<nav class="navegacao">
		<ul>
			<li><a href="home.php">Voltar para Home</a></li>
		</ul>
	</nav>
</body>
</html>
