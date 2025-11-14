<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADM Menu</title>
</head>
<body>
	<div class="titulo">
		<h1>Menu do Administrador</h1>
	</div>
	<div>
		<h2>Gerenciar solicitações</h2>
		<div class="filtro">
			<form action="" method="GET">
				<label for="Area">Area</label>
				<select name="Area" id="Area">
					<option value="TI">TI</option>
					<option value=""></option>
					<option value=""></option>
				</select>
				<label for="Local">local</label>
				<select name="Local" id="Local">
					<option value="">Laboratorio1</option>
					<option value="">Laboratorio2</option>
					<option value="">Laboratorio3</option>
				</select>
				<label for="Periodo">Periodo</label>
				<select name="Periodo" id="Periodo">
					<option value="Manha">Manhã</option>
					<option value="Tarde">Tarde</option>
					<option value="Noite">Noite</option>
				</select>
				<label for="Status">Status</label>
				<select name="Status" id="Status">
					<option value="Pendente">Pendente</option>
					<option value="Em Andamento">Em Andamento</option>
					<option value="Concluido">Concluido</option>
				</select>
				<div>
					<button type="submit">Filtrar</button>
				</div>
			</form>
		</div>
		<div>
			<?php 
			//vai listar as solicitações aqui, pos filtro ou nao
			?>
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
</style>