<?php
require_once("../banco.php");
session_start();

if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];

    // Função para validar entrada do usuário
    function validarEntrada($entrada) {
        return htmlspecialchars(trim($entrada), ENT_QUOTES, 'UTF-8');
    }

    // Obtendo o ID do orcamento a partir da URL
    $id_orcamento = isset($_GET['id']) ? validarEntrada($_GET['id']) : 0;

    // Excluir informações da tabela tb_resposta_orcamento
    $sqlDeleteResposta = "DELETE FROM trabalho.tb_resposta_orcamento WHERE id_orcamento = :id_orcamento";
    $stmtDeleteResposta = $conn->prepare($sqlDeleteResposta);
    $stmtDeleteResposta->bindParam(':id_orcamento', $id_orcamento, PDO::PARAM_INT);
    $stmtDeleteResposta->execute();

    // Excluir informações da tabela tb_orcamento
    $sqlDeleteOrcamento = "DELETE FROM trabalho.tb_orcamento WHERE id_orcamento = :id_orcamento";
    $stmtDeleteOrcamento = $conn->prepare($sqlDeleteOrcamento);
    $stmtDeleteOrcamento->bindParam(':id_orcamento', $id_orcamento, PDO::PARAM_INT);
    $stmtDeleteOrcamento->execute();

    // Redirecionar de volta para a página de informações do usuário após a exclusão
    header('Location: inicio_login.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>