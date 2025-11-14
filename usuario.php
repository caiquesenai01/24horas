<?php
require_once 'models/conexao.php';
print_r($_SESSION);
// PROCESSAR FORMULÁRIO

// debug opcional
// print_r($_SESSION);
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_professor = $_SESSION['id_usuario']; // ajuste se necessário

    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $id_sala = $_POST['nome_sala'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $prioridade = $_POST['prioridade_tarefa'];

    // status e datas
    $status = "Aberta";
    $data_abertura = date("Y-m-d H:i:s");

    // ----- UPLOAD DA IMAGEM -----
    $foto = null;

    if (!empty($_FILES['imagem']['name'])) {

        $target_dir = "uploads/";

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $foto = $target_dir . basename($_FILES["imagem"]["name"]);

        if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $foto)) {
            $foto = null; // evita erro
        }
    }

    // ----- INSERT NO BANCO -----
    $sql = "INSERT INTO tarefa 
    (id_professor, id_sala, nome_professor_tarefa, cargo_solicitante, sala_tarefa,
     descricao_tarefa, categoria_tarefa, status_tarefa, prioridade_tarefa,
     foto_tarefa, data_abertura_tarefa)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "iisssssssss",
        $id_professor,
        $id_sala,
        $nome,
        $cargo,
        $id_sala, // sala_tarefa recebe o ID também
        $descricao,
        $categoria,
        $status,
        $prioridade,
        $foto,
        $data_abertura
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
	<header>
		<img src="senai.png" alt="Logo SENAI" class="logo">
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
				<label for="cargo">cargo</label>
				<select name="cargo" id="cargo">
					<option value="Aluno">Aluno</option>
					<option value="Professor">Professor</option>
					<option value="Funcionário">Funcionário</option>
					<option value="Tecnico">Tecnico</option>
				</select>
				<label for="nome_sala">local</label>
				<select name="nome_sala" id="nome_sala">
					<option value="Laboratorio">Laboratório</option>
					<option value="sala">sala</option>
					<option value="setor">setor</option>
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
