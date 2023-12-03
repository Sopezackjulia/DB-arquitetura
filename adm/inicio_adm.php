<?php
// conexão do banco
Require_once ("../banco.php");
session_start ();

// Verifica se a variável de sessão existe
if (isset($_SESSION['id_pessoa'])) {
    // O usuário está autenticado
    $id_usuario_autenticado = $_SESSION['id_pessoa'];
} else {
    // Redireciona para a página de login se não estiver autenticado
    header("Location: login_adm.php");
    exit();
}

$sql = "SELECT * FROM trabalho.tb_orcamento WHERE id_orcamento not in (select id_orcamento from trabalho.tb_resposta_orcamento)";
$result = $conn->query($sql);
?> 
<!DOCTYPE html>
<html lang=pt-br>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> DB Arquitetura </title>

        <!-- inserção do css -->
        <link rel="stylesheet" href="../css/inicio_adm.css">
    </head>
    <body>
        <header>
            <!-- logotipo da pagina -->
            <a class="logo" id="inicio"> DB Arquitetura </a>

            <!-- barra de navegação -->
            <nav class="navbar">
                <a href=#inicio> Início </a>
                <a href="informacoes_adm.php"> Minha conta </a>
                <a href="novo_adm.php"> Novo Administrador </a>
                <a href="logout.php"> Logout </a>
            </nav>
        </header>
        <section class="orcamentos">
    <h3>Orçamentos</h3> <br>
    <h3> Orçamentos Pendentes </h3>
    <div class="content">

        <?php
        // Exibir orçamentos na página
        if ($result->rowCount() > 0) {
            $count = 1;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $orcamentoId = $row["id_orcamento"]; 
                echo "<p><strong>Orçamento " . $count . ":</strong> <a href='detalhes_orcamento.php?id=$orcamentoId'>" . $row["ds_projeto"] . "</a><br>";
                $count++;
            }
        } else {
            echo "<span style='font-size: 10em;'>Nenhum orçamento encontrado.</span>";
        }

        // Fechar a conexão com o banco de dados
        $conn = null;
        ?>

    </div> 
        </section>
        <footer id="info">
            <ul class="contact-list">
                <li class="list-item"><span class="contact-text">Porto Alegre, RS</span></li>
                <li class="list-item"><span class="contact-text">(51) 90000-0000</span></li>
                <li class="list-item"><span class="contact-text"><a href="DbArquitetura@gmail.com" title="Contato">DbArquitetura@gmail.com</a></span></li>
              </ul>
        </footer>
    </body>
</html>

