<?php
require_once("../banco.php");
session_start();

// Verifica se o usuário está conectado
if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter dados do formulário
        $nome = $_POST["nome"];
        $dataNascimento = $_POST["dataNascimento"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $senha = $_POST["senha"];

        // Atualizar os dados no banco de dados
        $stmt = $conn->prepare("UPDATE trabalho.tb_pessoa SET nm_pessoa = ?, dt_nascimento = ?, nm_email = ?, nu_telefone = ?, nm_senha = ? WHERE id_pessoa = ?");

        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $dataNascimento);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $telefone);
        $stmt->bindParam(5, $senha);
        $stmt->bindParam(6, $id_usuario_autenticado);

        $stmt->execute();
        header ('location: informacoes_adm.php?alterar=1');
        exit();
}   }
else{
    header('Location: falha_alterar.php');
    exit();
}

?>