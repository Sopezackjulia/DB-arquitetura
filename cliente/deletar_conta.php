<?php
require_once("../banco.php");
session_start();

if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];

    // Excluir dados da tabela tb_orcamento
    $stmt_orcamento = $conn->prepare("DELETE FROM trabalho.tb_orcamento WHERE id_pessoa = :id_pessoa");
    $stmt_orcamento->bindParam(':id_pessoa', $id_usuario_autenticado);
    $stmt_orcamento->execute();
    $stmt_orcamento->closeCursor();

    // Excluir dados da tabela tb_pessoa
    $stmt_pessoa = $conn->prepare("DELETE FROM trabalho.tb_pessoa WHERE id_pessoa = :id_pessoa");
    $stmt_pessoa->bindParam(':id_pessoa', $id_usuario_autenticado);
    $stmt_pessoa->execute();
    $stmt_pessoa->closeCursor();

    // Redirecionar para a página inicial após a exclusão
    header('Location: ../inicio.php');
    exit();
} else {
    header('Location: falha_exclusão.php');
    exit();
}
?>
    