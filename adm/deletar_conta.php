<?php
require_once("../banco.php");
session_start();

// Verifica se o usuário está autenticado
if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];

    try {
        // Iniciar a transação
        $conn->beginTransaction();

        // Verificar a quantidade de registros na tabela tb_adm
        $stmt_count = $conn->prepare("SELECT COUNT(*) FROM trabalho.tb_adm");
        $stmt_count->execute();
        $num_rows = $stmt_count->fetchColumn();
        $stmt_count->closeCursor();

        if ($num_rows > 1) { 
            // 1. Excluir dados da tabela tb_adm
            $stmt_orcamento = $conn->prepare("DELETE FROM trabalho.tb_adm WHERE id_usuario = :id_pessoa");
            $stmt_orcamento->bindParam(':id_pessoa', $id_usuario_autenticado);
            $stmt_orcamento->execute();
            $stmt_orcamento->closeCursor();

            // 2. Excluir dados da tabela tb_pessoa
            $stmt_pessoa = $conn->prepare("DELETE FROM trabalho.tb_pessoa WHERE id_pessoa = :id_pessoa");
            $stmt_pessoa->bindParam(':id_pessoa', $id_usuario_autenticado);
            $stmt_pessoa->execute();
            $stmt_pessoa->closeCursor();

            // Commit da transação
            $conn->commit();

            // Redirecionar para a página inicial após a exclusão bem-sucedida
            header('Location: ../inicio.php');
            exit();
        } else {
            // Rollback da transação, pois não há registros suficientes
            $conn->rollBack();
            // Redirecionar para a página de falha de exclusão devido ao número insuficiente de registros
            header('Location: falha_exclusao.php');
            exit();
        }
    } catch (PDOException $e) {
        // Em caso de erro, desfaz as alterações e redireciona para a página de falha
        $conn->rollBack();
        header('Location: falha_exclusao.php');
        exit();
    }
} else {
    // Redirecionar para a página de falha se o usuário não estiver autenticado
    header('Location: falha_exclusao.php');
    exit();
}
?>