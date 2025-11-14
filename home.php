<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>
	<div class="titulo">
		<h1>Nesse sistema voce podera realizar solicitações de manutenção e suporte tecnico dentro do SENAI</h1>
	</div>
	<nav class="navegacao">
		<h1>Selecione seu cargo</h1>
		<ul>
			<li><a href="usuario.php">Usuario</a></li>
			<li><a href="login_adm.php">Administrador</a></li>
		</ul>
	</nav>
</body>
</html>
<style>
	body {
		font-family: Arial, sans-serif;
		background-color: #f4f4f4;
		margin: 0;
		padding: 20px;
	}
	h1 {
		color: #333;
	}
	.titulo {
		text-align: center;
		margin-bottom: 40px;
	}
	.navegacao {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-items: center;
		gap: 20px;
	}
	.navegacao ul {
		list-style-type: none;
		padding: 0;
		text-align: center;
	}
</style>