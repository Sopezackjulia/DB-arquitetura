<?php
require_once("../banco.php");
require_once("../tabela.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];

    // Inserir na tabela tb_pessoa
    $stmt = $conn->prepare("INSERT INTO trabalho.tb_pessoa (nm_pessoa, nm_email, nm_senha, nu_telefone, dt_nascimento) 
    VALUES (:nome, :email, :senha, :tel, :date)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':date', $date);
    $stmt->execute();

    // Obter o ID da pessoa recém-inserida
    $id_pessoa = $conn->lastInsertId();

    // Inserir na tabela tb_adm
    $stmt = $conn->prepare("INSERT INTO trabalho.tb_adm (id_usuario) 
    VALUES (:id_usuario)");
    
    // Substituir :id_adm por :id_usuario no bindParam
    $stmt->bindParam(':id_usuario', $id_pessoa);
    $stmt->execute();

    header('location: conclusao_novo_adm.php');
    exit();
} else {
    header('Location: falha_novo_adm.php');
    exit();
}
?>