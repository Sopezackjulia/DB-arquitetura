<?php
// conexão do banco
Require_once ("../banco.php");
session_start ();

$email = (isset($_GET['email']) ? $_GET['email'] : "");
$senha = (isset($_GET['senha']) ? $_GET['senha'] : "");

?>
<!DOCTYPE html>
    <html lang=pt-br>
        <head> 
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Administração </title>
            <link rel="stylesheet" href="../css/login.css">
        </head>
        <body>       
        <header>
            <a class="logo" id="inicio"> DB Arquitetura </a>
        </header>
        <!-- formulário -->
       <section class="form">
       <div class="solicitar">
            <a class="orc" id="inicio"> <h2> ADMINISTRAÇÃO </h2></a>
        </div>
        <h3> Login para administração </h3>
        <form action="processar_login_adm.php" method="POST">
            <div class="form_group">
                <label for="email"> Email: </label>
                <input type="email" name="email" required id="email" value="<?=$email?>"><br>
            </div>
            <div class="form_group">
                <label for="senha"> Senha: </label>
                <input type="password" name="senha" required id="senha" value="<?=$senha?>"><br>
            </div>
            <?php
            if(isset($_GET['erro'])){
                if($_GET['erro'] === '1'){
                 echo "<p class='erro' style='color: red;'><strong>*Usuário ou senha incorretos</strong></p>";
                }
            }
            ?>
            <input type="submit" value="Entrar">
            <a href="../cliente/login.php" id="form"> Sou cliente! </a>
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