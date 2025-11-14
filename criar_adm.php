<?php
require_once 'models/conexao.php';

// Criar setor padrão (id_setor = 1) caso não exista
$sqlSetor = "SELECT id_setor FROM setores WHERE id_setor = 1";
$resultSetor = $conn->query($sqlSetor);

if ($resultSetor->num_rows == 0) {
    $conn->query("
        INSERT INTO setores (id_setor, nome_setor, descricao_setor, responsavel_setor)
        VALUES (1, 'Administração', 'Setor padrão para administradores', 'Sistema')
    ");
    echo "Setor padrão criado.<br>";
} else {
    echo "Setor já existe.<br>";
}

// Verifica se o admin já existe
$sqlAdmin = "SELECT * FROM usuario WHERE email_usuario = 'admin@senai.com'";
$resultAdmin = $conn->query($sqlAdmin);

if ($resultAdmin->num_rows == 0) {

    // Senha sem hash (se quiser com hash me avise)
    $nome = "Administrador";
    $email = "admin@senai.com";
    $senha = "12345";
    $cargo = "administrador";
    $setor = 1;

    $sqlInsert = "
        INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cargo_usuario, id_setor)
        VALUES ('$nome', '$email', '$senha', '$cargo', $setor)
    ";

    if ($conn->query($sqlInsert)) {
        echo "Administrador criado com sucesso!<br>";
    } else {
        echo "Erro ao criar administrador: " . $conn->error . "<br>";
    }

} else {
    echo "Administrador já existe. Nada foi criado.<br>";
}

echo "<br><strong>Processo concluído.</strong>";

?>
<button onclick="window.location.href='home.php'">Voltar para Home</button>