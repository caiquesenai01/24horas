<?php
require_once 'models/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu do Usuário</title>
	<link rel="stylesheet" href="styles/usuario.css">
</head>
<body>
	<header>
		<img src="senai.png" alt="Logo SENAI" class="logo">
	</header>
	<div class="titulo">
		<h1>Menu do Usuário</h1>
	</div>
	<div class="visualizar">
		<div class="criar">
			<h2>Registrar solicitação</h2>
			<form action="" class="form-solicitacao">
				<label for="nome">nome</label>
				<input type="text" name="nome" id="nome" placeholder="Insira seu nome">
				<label for="matricula">matricula</label>
				<input type="text" name="matricula" id="matricula" placeholder="Insira sua matrícula">
				<label for="cargo">cargo</label>
				<select name="cargo" id="cargo">
					<option value="Aluno">Aluno</option>
					<option value="Professor">Professor</option>
					<option value="Funcionário">Funcionário</option>
					<option value="Tecnico">Tecnico</option>
				</select>
				<label for="local">local</label>
				<select name="local" id="local">
					<option value="Laboratorio">Laboratório</option>
					<option value="sala">sala</option>
					<option value="setor">setor</option>
				</select>
				<label for="descricao">descricao</label>
				<textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descreva o problema"></textarea>
				<label for="categoria">categoria</label>
				<select name="categoria" id="categoria">
					<option value="Manutenção">Manutenção</option>
					<option value="Suporte Técnico">Suporte Técnico</option>
					<option value="Estrutural">Estrutural</option>
				</select>
				<label for="prioridade">prioridade</label>
				<select name="prioridade" id="prioridade">
					<option value="Baixa">Baixa</option>
					<option value="Média">Média</option>
					<option value="Alta">Alta</option>
				</select>
				<label for="imagem">Upload de imagem</label>
				<input type="file" name="imagem" id="imagem">
				<div>
					<button type="submit">Criar</button>
				</div>
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
