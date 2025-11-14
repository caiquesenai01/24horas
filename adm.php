<?php
require_once 'models/conexao.php';

session_start();
print_r($_SESSION);
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
				<label for="Periodo">Período</label>
				<select name="Periodo" id="Periodo">
					<option value="Manha">Manhã</option>
					<option value="Tarde">Tarde</option>
					<option value="Noite">Noite</option>
				</select>
				<label for="Status">Status</label>
				<select name="Status" id="Status">
					<option value="aberta">aberta</option>
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

// 1. Construir base da query
$query = "SELECT tarefa.*, salas.nome_sala 
          FROM tarefa 
          JOIN salas ON tarefa.id_sala = salas.id_sala
          WHERE 1=1";


// 2. Aplicar filtros, se existirem
if (!empty($_GET['Area'])) {
    $area = $_GET['Area'];
    $query .= " AND tarefa.categoria_tarefa = '$area'";
}

if (!empty($_GET['Local'])) {
    $local = $_GET['Local'];
    $query .= " AND tarefa.id_sala = '$local'";
}


if (!empty($_GET['nome_sala'])) {
    $nome_sala = $_GET['nome_sala'];
    $query .= " AND nome_sala = '$nome_sala'";
}



if (!empty($_GET['Status'])) {
    $status = $_GET['Status'];
    $query .= " AND status_tarefa = '$status'";
}
if (!empty($_GET['Per'])) {
    $status = $_GET['Status'];
    $query .= " AND status_tarefa = '$status'";
}

// 3. Executar query
$result = $conn->query($query);

// 4. Mostrar resultados
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' style='margin-top:20px; width:100%;'>";
    echo "<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Sala</th>
            <th>Data</th>
			<th>Periodo</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id_tarefa']."</td>";
        echo "<td>".$row['nome_professor_tarefa']."</td>";
        echo "<td>".$row['categoria_tarefa']."</td>";
        echo "<td>".$row['status_tarefa']."</td>";
        echo "<td>".$row['nome_sala']."</td>";
        echo "<td>".$row['data_abertura_tarefa']."</td>";
		echo "<td>".$row['periodo']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhuma solicitação encontrada.</p>";
}

?>

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
