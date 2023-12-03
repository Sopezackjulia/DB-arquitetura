<?php
session_start();

// Verifica se a variável de sessão existe
if (isset($_SESSION['id_pessoa'])) {
    // O usuário está autenticado
    $id_usuario_autenticado = $_SESSION['id_pessoa'];
} else {
    // Redireciona para a página de login se não estiver autenticado
    header("Location: login.php");
    exit();
}
include ("../banco.php");
?>
<!DOCTYPE html>
    <html lang=pt-br>
        <head> 
            <meta charset="uft-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> DB Arquitetura </title>
            <link rel="stylesheet" href="../css/conclusao_login.css">
        </head>
        <body>       
        <header>
            <a class="logo" id="inicio"> DB Arquitetura </a>
        </header>
        <div id="envio">
        <h1> NOVO ADMINISTRADOR ADICIONADO! </h1> <br>
        <h5> Clique abaixo para retornar a página inicial! </h5>
        <a href="inicio_adm.php" id="login"> Página inicial </a>
        </div>
        <!-- rodapé -->
        <footer id="info">
            <ul class="contact-list">
                <li class="list-item"><span class="contact-text">Porto Alegre, RS</span></li>
                <li class="list-item"><span class="contact-text">(51) 90000-0000</span></li>
                <li class="list-item"><span class="contact-text"><a href="DbArquitetura@gmail.com" title="Contato">DbArquitetura@gmail.com</a></span></li>
              </ul>
        </footer>