<?php
require_once("../banco.php");
require_once("../tabela.php");
require_once("processar_login.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha o ID da pessoa logada 
    $id_pessoa = $_SESSION['id_pessoa'];

    $tipo_de_projeto = $_POST['tipo_de_projeto'];
    $caracteristicas = $_POST['caracteristicas'];
    $estilo = $_POST['estilo'];
    $tamanho = $_POST['tamanho'];
    $finalizacao = $_POST['finalizacao'];

    $stmt = $conn->prepare("INSERT INTO trabalho.tb_orcamento (id_pessoa, id_tipo_projeto, ds_projeto, id_estilo, nu_tamanho, dt_finalizacao_desejada) 
    VALUES (:id_pessoa, :tipo_de_projeto, :caracteristicas, :estilo, :tamanho, :finalizacao)");
    $stmt->bindParam(':id_pessoa', $id_pessoa);
    $stmt->bindParam(':tipo_de_projeto', $tipo_de_projeto);
    $stmt->bindParam(':caracteristicas', $caracteristicas);
    $stmt->bindParam(':estilo', $estilo);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':finalizacao', $finalizacao);
    $stmt->execute();

    header('location: conclusao_novo_form.php');
    exit();
} else {
    header('Location: falha_novo_form.php');
    exit();
}
?>