<?php
// conexão do banco
Require_once ("../banco.php");

$nome = (isset($_GET['nome']) ? $_GET['nome'] : "");
$email = (isset($_GET['email']) ? $_GET['email'] : "");
$senha = (isset($_GET['senha']) ? $_GET['senha'] : "");
$tel = (isset($_GET['tel']) ? $_GET['tel'] : "");
$date = (isset($_GET['date']) ? $_GET['date'] : "");

?>

<!DOCTYPE html>
    <html lang=pt-br>
        <head> 
            <meta charset="uft-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Novo Administrador </title>
            <link rel="stylesheet" href="../css/adm_novo.css">
        </head>
        <body>       
        <header>
        <!-- logotipo da pagina -->
        <a href="#" class="logo" id="inicio"> DB Arquitetura </a>

        <!-- barra de navegação -->
        <nav class="navbar">
            <a href="inicio_adm.php"> Inicio </a>
            <a href=informacoes_adm.php> Minha conta </a>
            <a href=#inicio> Novo administrador </a>
            <a href="logout.php"> Logout </a>
        </nav>
    </header>
        <!-- formulário -->
       <section class="form">
       <div class="solicitar">
            <a class="orc" id="inicio"> Adicionar novo administrador </a>
        </div>
        <form action="processar_novo_adm.php" method="POST">
            
            <h2> Informações pessoais </h2>

            <div class="form_group">
                <label for="name"> Nome completo: </label>
                <input type="text" name="nome" required id="nome" value="<?=$nome?>"><br>
            </div>
            <div class="form_group">
                <label for="email"> Email: </label>
                <input type="email" name="email" required id="email" value="<?=$email?>"><br>
            </div>
            <div class="form_group">
                <label for="senha"> Senha:(máximo 15 caracteres) </label>
                <input type="password" name="senha" required id="senha" value="<?=$senha?>"><br>
            </div>
            <div class="form_group">
                <label for="tel"> Número para contato: </label>
                <input type="tel" name="tel" required id="tel" value="<?=$tel?>"> <br> 
            </div>
            <div class="form_group">
                <label for="date"> Data de nascimento: </label>
                <input type="date" name="date" required id="date" value="<?=$date?>"> <br>
            </div>
            <!-- botão enviar -->
            <input type="submit" value="Enviar">
        </form>
        </section>
        <!-- rodapé -->
        <footer id="info">
            <ul class="contact-list">
                <li class="list-item"><span class="contact-text">Porto Alegre, RS</span></li>
                <li class="list-item"><span class="contact-text">(51) 90000-0000</span></li>
                <li class="list-item"><span class="contact-text"><a href="DbArquitetura@gmail.com" title="Contato">DbArquitetura@gmail.com</a></span></li>
              </ul>
        </footer>
        </body>
</html>