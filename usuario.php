<?php
require_once 'models/conexao.php';

session_start();
print_r($_SESSION);

// PROCESSAR FORMULÁRIO
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_professor = $_SESSION['id_usuario']; 

    $nome = $_POST['nome'];
    $cargo_solicitante = $_POST['cargo_solicitante'];
    $id_sala = $_POST['nome_sala']; 
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $prioridade = $_POST['prioridade_tarefa'];
    $periodo = $_POST['periodo'];

    // Buscar nome da sala para salvar em sala_tarefa
    $sqlSala = "SELECT nome_sala FROM salas WHERE id_sala = ?";
    $stmtSala = $conn->prepare($sqlSala);
    $stmtSala->bind_param("i", $id_sala);
    $stmtSala->execute();
    $stmtSala->bind_result($nome_sala);
    $stmtSala->fetch();
    $stmtSala->close();

    $status = "Aberta";
    $data_abertura = date("Y-m-d H:i:s");

    // UPLOAD DA IMAGEM
    $foto = null;

    if (!empty($_FILES['imagem']['name'])) {

        $target_dir = "uploads/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $foto = $target_dir . basename($_FILES["imagem"]["name"]);

        if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $foto)) {
            $foto = null;
        }
    }

    // INSERT CORRIGIDO
    $sql = "INSERT INTO tarefa 
    (id_professor, id_sala, nome_professor_tarefa, cargo_solicitante, sala_tarefa,
     descricao_tarefa, categoria_tarefa, status_tarefa, prioridade_tarefa,
     foto_tarefa, data_abertura_tarefa, periodo)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "iissssssssss",
        $id_professor,
        $id_sala,
        $nome,
        $cargo_solicitante,
        $nome_sala,       // sala_tarefa SALVANDO NOME CORRETAMENTE
        $descricao,
        $categoria,
        $status,
        $prioridade,
        $foto,
        $data_abertura,
        $periodo
    );

    if ($stmt->execute()) {
        echo "<p style='color:green'>Solicitação criada com sucesso!</p>";
    } else {
        echo "<p style='color:red'>Erro ao salvar: " . $conn->error . "</p>";
    }
}
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
		<h1>Menu do Usuário</h1>
	</div>
	<div class="visualizar">
		<div class="criar">
			<h2>Registrar solicitação</h2>
			<form action="usuario.php" method="POST" enctype="multipart/form-data" class="form-solicitacao">
				<label for="nome">nome</label>
				<input type="text" name="nome" id="nome" placeholder="Insira seu nome">
				<label for="matricula">matricula</label>
				<input type="text" name="matricula" id="matricula" placeholder="Insira sua matrícula">
				<label for="cargo_solicitante">cargo</label>
				<select name="cargo_solicitante" id="cargo_solicitante">
					<option value="Aluno">Aluno</option>
					<option value="Professor">Professor</option>
					<option value="Funcionário">Funcionário</option>
					<option value="Tecnico">Tecnico</option>
				</select>
				<label for="nome_sala">local</label>
				<select name="nome_sala" id="nome_sala">
					<?php
					$sql = "SELECT id_sala, nome_sala FROM salas order by nome_sala";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo '<option value="'.$row["id_sala"].'">'.$row["nome_sala"].'</option>';
						}
					}
					?>
				</select>
				<label for="descricao">descricao</label>
				<textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descreva o problema"></textarea>
				<label for="categoria">categoria</label>
				<select name="categoria" id="categoria">
					<option value="Manutenção">Manutenção</option>
					<option value="Suporte Técnico">Suporte Técnico</option>
					<option value="Estrutural">Estrutural</option>
				</select>
				<label for="prioridade_tarefa">prioridade</label>
				<select name="prioridade_tarefa" id="prioridade_tarefa">
					<option value="Baixa">Baixa</option>
					<option value="Média">Média</option>
					<option value="Alta">Alta</option>
				</select>
				<label for=periodo">periodo</label>
				<select name="periodo" id="periodo">
					<option value="Manha">Manhã</option>
					<option value="Tarde">Tarde</option>
					<option value="Noite">Noite</option>	
				</select>
				<label for="imagem">Upload de imagem</label>
				<input type="file" name="imagem" id="imagem">
				
				<div>
					<button type="submit">Criar</button>
				</div>
			</form>
		</div>
			</div>
		<div class="acompanhar">
    <h2>Acompanhamento de solicitações</h2>
    
    <!-- Formulário de Busca -->
    <div class="busca-solicitacoes">
        <form action="" method="GET" class="form-busca">
            <div class="campos-busca">
                <div class="campo-busca">
                    <label for="buscaNome">Buscar por Nome</label>
                    <input type="text" name="buscaNome" id="buscaNome" placeholder="Digite o nome do solicitante">
                </div>
                <div class="campo-busca">
                    <label for="buscaData">Buscar por Data</label>
                    <input type="date" name="buscaData" id="buscaData">
                </div>
                <div class="campo-busca">
                    <label for="buscaHorario">Buscar por Horário</label>
                    <select name="buscaHorario" id="buscaHorario">
                        <option value="">Todos os horários</option>
                        <option value="manha">Manhã (06:00 - 12:00)</option>
                        <option value="tarde">Tarde (12:00 - 18:00)</option>
                        <option value="noite">Noite (18:00 - 23:00)</option>
                    </select>
                </div>
            </div>
            <div class="acoes-busca">
                <button type="submit" class="btn-buscar">Buscar</button>
                <button type="reset" class="btn-limpar">Limpar</button>
            </div>
        </form>
    </div>

    <!-- Resultados da Busca -->
    <div class="resultados-busca">
        <div class="cabecalho-resultados">
            <h3>Resultados da Busca</h3>
            <div class="total-solicitacoes">
                <span id="contadorResultados">0</span> solicitações encontradas
            </div>
        </div>
        
        <div class="lista-solicitacoes">
            <!-- Exemplo de solicitação - substitua por dados reais do PHP -->
            <div class="solicitacao-item">
                <div class="solicitacao-header">
                    <div class="solicitante-info">
                        <h4>João Silva</h4>
                        <span class="matricula">MAT: 2023001</span>
                    </div>
                    <div class="solicitacao-meta">
                        <span class="data">15/03/2024</span>
                        <span class="horario">14:30</span>
                    </div>
                </div>
                <div class="solicitacao-detalhes">
                    <p class="descricao">Problema com o projetor no laboratório 2 - não está conectando com o computador.</p>
                    <div class="solicitacao-tags">
                        <span class="tag-local">Laboratório 2</span>
                        <span class="tag-categoria">Suporte Técnico</span>
                        <span class="tag-prioridade alta">Alta</span>
                        <span class="tag-status pendente">Pendente</span>
                    </div>
                </div>
                <div class="solicitacao-acoes">
                    <button class="btn-detalhes">Ver Detalhes</button>
                    <button class="btn-editar">Editar</button>
                </div>
            </div>

            <!-- Mais solicitações virão aqui via PHP -->
        </div>

        <!-- Placeholder quando não há resultados -->
        <div class="sem-resultados">
            <p>Nenhuma solicitação encontrada. Tente alterar os filtros de busca.</p>
        </div>
    </div>
</div>
	</div>
	<nav class="navegacao">
		<ul>
			<li><a href="home.php">Voltar para Home</a></li>
		</ul>
	</nav>
</body>
</html>

</body>
</html>
