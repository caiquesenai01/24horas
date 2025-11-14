<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<div class="titulo">
		<h1>Login Administrador</h1>
	</div>
	<form action="" class="form">
		<input type="text" name="nome" id="" placeholder="Insira seu usuario">
		<input type="text" name="senha" id="" placeholder="Insira sua senha">
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
<style>
	h1 {
		color: #333;
	}
	.titulo {
		text-align: center;
		margin-bottom: 40px;
	}
	body {
		font-family: Arial, sans-serif;
		background-color: #f4f4f4;
		margin: 0;
		padding: 20px;
	}
	h1 {
		color: #333;
	}
	.form {
		display: flex;
		flex-direction: column;
		gap: 10px;
		margin-bottom: 20px;
	}
</style>