<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuario Menu</title>
</head>
<body>
	<div class="titulo">
		<h1>Menu do Usuario</h1>
	</div>
	<div class="visualizar">
		<div class="criar">
			<h2>Registrar solicitação</h2>
			<form action="">
				<button type="submit">Criar</button>
			</form>
		</div>
		<div class="acompanhar">
			<h2>Acompanhamento de solicitações</h2>
		</div>
	</div>
	<nav class="navegacao">
		<ul>
			<li><a href="home.php">Voltar para Home</a></li>
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
	.visualizar{
		display: flex;
		flex-direction: row;
		gap: 60%;
		margin-left: 10%;
	}
	.criar, .acompanhar {
		border: 1px solid #ccc;
		padding: 20px;
		width: 200px;
		text-align: center;
	}
</style>