<?php
require_once('../banco.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT id_pessoa, nm_email, nm_senha FROM trabalho.tb_pessoa WHERE nm_email = :email AND nm_senha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id_pessoa'] = $user['id_pessoa'];  // Armazenar o ID da pessoa na sessão
        $_SESSION['autenticado'] = true;
        header("Location: inicio_login.php");
    } else {
        // Usuário ou senha incorretos, redirecione de volta para a página de login 
        header("Location: login.php?erro=1");
    }
}
else {
    header('Location: falha_login.php');
    exit();
}