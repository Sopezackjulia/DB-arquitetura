<?php
// conexão do banco
require_once("../banco.php");
session_start();

// Verifica se o usuario está conectado
if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];

    $sql = "SELECT * FROM trabalho.tb_pessoa WHERE id_pessoa = :id_usuario_autenticado";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_usuario_autenticado', $id_usuario_autenticado);
    $stmt->execute();

    // Verifica se a consulta retornou resultados
    if ($stmt->rowCount() > 0) {
        // Exibe as informações do usuário
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = isset($row['nm_pessoa']) ? $row['nm_pessoa'] : "";
        $dataNascimento = isset($row['dt_nascimento']) ? $row['dt_nascimento'] : "";
        $email = isset($row['nm_email']) ? $row['nm_email'] : "";
        $telefone = isset($row['nu_telefone']) ? $row['nu_telefone'] : "";
        $senha = isset($row['nm_senha']) ? $row['nm_senha'] : "";
    } else {
        echo "Nenhum resultado encontrado";
    }
} else {
    // Redireciona para a página de login se não estiver autenticado
    header("Location: login.php");
    exit();
}

// Feche a conexão após obter as informações do usuário
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/informacoes_usuario.css">
</head>
<body>
    <header>
        <!-- logotipo da pagina -->
        <a href="#" class="logo" id="inicio"> DB Arquitetura </a>

        <!-- barra de navegação -->
        <nav class="navbar">
            <a href="inicio_login.php"> Início </a>
            <a href=#inicio> Minha conta </a>
            <a href="novo_orcamento.php"> Novo orçamento </a>
            <a href="logout.php"> Logout </a>
        </nav>
    </header>

    <div class="container">
        <h1>Informações do Usuário</h1>
        <form method="post" action="atualizar_perfil.php">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="<?php echo $senha; ?>" required>

            <?php
                if(isset($_GET['alterar'])){
                    if($_GET['alterar'] === '1'){
                        echo "<p class='erro' style='color: green;'><strong>*Informações alteradas!</strong></p>";
                    }
                }
            ?>
            <button type="submit">Salvar</button>

        </form>
        <a href="deletar_conta.php" id="deletar"> Deletar conta </a>
    </div>
    <footer>
        <div id="info">
            <ul class="contact-list">
                <li class="list-item"><span class="contact-text">Porto Alegre, RS</span></li>
                <li class="list-item"><span class="contact-text">(51) 90000-0000</span></li>
                <li class="list-item"><span class="contact-text"><a href="DbArquitetura@gmail.com" title="Contato">DbArquitetura@gmail.com</a></span></li>
            </ul>
        </div>
    </footer>
</body>
</html>
