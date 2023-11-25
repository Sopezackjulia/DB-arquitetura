<?php
require_once("banco.php");
require_once("tabela.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];

    $stmt = $conn -> prepare ("INSERT INTO trabalho.tb_pessoa (nm_pessoa, nm_email, nu_telefone, dt_nascimento) values (:nome, :email, :tel, :date)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

    $id_pessoa = $conn->lastInsertId();

    $tipo_de_projeto = $_POST['tipo_de_projeto'];
    $caracteristicas = $_POST['caracteristicas'];
    $estilo = $_POST['estilo'];
    $tamanho = $_POST['tamanho'];
    $finalizacao = $_POST['finalizacao'];

    $stmt = $conn -> prepare ("INSERT INTO trabalho.tb_orcamento (id_pessoa, id_tipo_projeto, ds_projeto, id_estilo, nu_tamanho, dt_finalizacao_desejada) 
    values (:id_pessoa, :tipo_de_projeto, :caracteristicas, :estilo, :tamanho, :finalizacao)");
    $stmt->bindParam(':id_pessoa', $id_pessoa);
    $stmt->bindParam(':tipo_de_projeto', $tipo_de_projeto);
    $stmt->bindParam(':caracteristicas', $caracteristicas);
    $stmt->bindParam(':estilo', $estilo);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':finalizacao', $finalizacao);
    $stmt->execute();

    header ('location: inicio.php');
    exit();
}
?>