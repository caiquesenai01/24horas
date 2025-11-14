<?php
require_once "models/conexao.php";
include_once "models/conexao.php";

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE nome_usuario = ? AND senha_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nome_usuario'] = $user['nome_usuario'];
        header("Location: adm.php");
        exit();
    } else {
        echo "<script>alert('Nome de usuário ou senha incorretos.');</script>";
        header("Location: login_adm.php");
        exit();
    }
}