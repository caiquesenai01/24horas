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

<button class="botao-modo" onclick="alternarModo()">
  <span class="icone-modo">◐</span>
  <span class="texto-modo">Modo Escuro</span>
</button>

<script>
function alternarModo() {
  document.body.classList.toggle('modo-noturno');
  const icone = document.querySelector('.icone-modo');
  const texto = document.querySelector('.texto-modo');
  
  if (document.body.classList.contains('modo-noturno')) {
    icone.textContent = '◑';
    texto.textContent = 'Modo Claro';
    localStorage.setItem('modo', 'noturno');
  } else {
    icone.textContent = '◐';
    texto.textContent = 'Modo Escuro';
    localStorage.setItem('modo', 'claro');
  }
}

// Verificar preferência salva
document.addEventListener('DOMContentLoaded', function() {
  const modoSalvo = localStorage.getItem('modo');
  const icone = document.querySelector('.icone-modo');
  const texto = document.querySelector('.texto-modo');
  
  if (modoSalvo === 'noturno') {
    document.body.classList.add('modo-noturno');
    icone.textContent = '◑';
    texto.textContent = 'Modo Claro';
  }
});
</script>

	<header>
		<img src="imagens/senai.png" alt="Logo SENAI" class="logo">		
	</header>
	<div class="titulo">
		<h1>Nesse sistema você poderá realizar solicitações de manutenção e suporte técnico dentro do SENAI</h1>
	</div>
	<div>
		<nav class="navegacao">
			<h1>Selecione seu cargo</h1>
			<ul>
				<li><a href="usuario.php">Usuário</a></li>
				<li><a href="login_adm.php">Administrador</a></li>
			</ul>
		</nav>
	</div>
</body>
