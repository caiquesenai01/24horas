<?php
require_once 'models/conexao.php';



 //Se não estiver logado, redireciona para login
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login_adm.php");
	echo "<script>alert('Você precisa estar logado para acessar esta página.');</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu do Administrador</title>
	<link rel="stylesheet" href="styles/adm.css">
</head>
<body>
	<header>
		<img src="senai.png" alt="Logo SENAI" class="logo">
	</header>
	<div class="titulo">
		<h1>Menu do Administrador</h1>
	</div>
	<div>
		<h2>Gerenciar solicitações</h2>
		<div class="filtro">
			<form action="" method="GET">
				<label for="Area">Área</label>
				<select name="Area" id="Area">
					<option value="TI">TI</option>
					<option value="Manutenção">Manutenção</option>
					<option value="Suporte">Suporte</option>
				</select>
				<label for="Local">Local</label>
				<select name="Local" id="Local">
					<option value="Laboratorio1">Laboratório 1</option>
					<option value="Laboratorio2">Laboratório 2</option>
					<option value="Laboratorio3">Laboratório 3</option>
				</select>
				<label for="Periodo">Período</label>
				<select name="Periodo" id="Periodo">
					<option value="Manha">Manhã</option>
					<option value="Tarde">Tarde</option>
					<option value="Noite">Noite</option>
				</select>
				<label for="Status">Status</label>
				<select name="Status" id="Status">
					<option value="Pendente">Pendente</option>
					<option value="Em Andamento">Em Andamento</option>
					<option value="Concluido">Concluído</option>
				</select>
				<div>
					<button type="submit">Filtrar</button>
				</div>
			</form>
		</div>
		<div>
			<?php
			//vai listar as solicitações aqui, pós filtro ou não
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
