<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <title>Sistema SENAI - Home</title>
</head>
<body>
	<header>
		<img src="senai.png" alt="Logo SENAI" class="logo">
	</header>
	<div class="titulo">
		<h1>Nesse sistema você poderá realizar solicitações de manutenção e suporte técnico dentro do SENAI</h1>
	</div>
	<nav class="navegacao">
		<h1>Selecione seu cargo</h1>
		<ul>
			<li><a href="usuario.php">Usuário</a></li>
			<li><a href="login_adm.php">Administrador</a></li>
		</ul>
	</nav>
</body>
