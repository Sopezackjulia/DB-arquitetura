<?php
// conexão do banco
require_once("../banco.php");
session_start();
if (isset($_SESSION['id_pessoa'])) {
    $id_usuario_autenticado = $_SESSION['id_pessoa'];
// Função para validar entrada do usuário
function validarEntrada($entrada) {
    return htmlspecialchars(trim($entrada), ENT_QUOTES, 'UTF-8');
}

// Obtendo o ID do orcamento a partir da URL
$id_orcamento = isset($_GET['id']) ? validarEntrada($_GET['id']) : 0; // Certifique-se de validar e sanitizar isso adequadamente para evitar SQL injection

// Consulta SQL para obter as informações do orcamento 
$sql = "SELECT o.*, e.nm_estilo, tp.nm_tipo_projeto, ro.ds_resposta AS resposta_orcamento 
        FROM trabalho.tb_orcamento o
        LEFT JOIN trabalho.tb_estilo e ON o.id_estilo = e.id_estilo
        LEFT JOIN trabalho.tb_tipo_projeto tp ON o.id_tipo_projeto = tp.id_tipo_projeto
        LEFT JOIN trabalho.tb_resposta_orcamento ro ON o.id_orcamento = ro.id_orcamento
        WHERE o.id_orcamento = :id_orcamento"; // Lembre-se de validar e sanitizar a entrada do usuário
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_orcamento', $id_orcamento, PDO::PARAM_INT);

// Executar a consulta
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Retornou resultados
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Atribuir valores às variáveis
    $caracteristicas = isset($row['ds_projeto']) ? $row['ds_projeto'] : "";
    $tamanho = isset($row['nu_tamanho']) ? $row['nu_tamanho'] : "";
    $estilo = isset($row['nm_estilo']) ? $row['nm_estilo'] : "";
    $finalizacao = isset($row['dt_finalizacao_desejada']) ? $row['dt_finalizacao_desejada'] : "";
    $tipo_projeto = isset($row['nm_tipo_projeto']) ? $row['nm_tipo_projeto'] : "";
    $resposta = isset($row['resposta_orcamento']) ? $row['resposta_orcamento'] : "";
} else {
    // Nenhum resultado encontrado
    echo "Orcamento não encontrado.";
}
} else{
    header('Location: login.php');
    exit();
}
// Fechar a conexão com o banco de dados
$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/informacoes_orcamento.css">
</head>
<body>
    <header>
        <!-- logotipo da pagina -->
        <a href="#" class="logo" id="inicio"> Orçamento </a>

        <!-- barra de navegação -->
        <nav class="navbar">
            <a href="inicio_login.php"> Inicio </a>
            <a href="informacoes_usuario.php"> Minha conta </a>
            <a href="novo_orcamento.php"> Novo orçamento </a>
            <a href="logout.php"> Logout </a>
        </nav>
    </header>

    <div class="container">
        <h1>Informações do Orçamento</h1>
        <label for="caracteristicas">Características essenciais para esse projeto:</label>
        <div id="caracteristicas"><?php echo $caracteristicas; ?></div>

        <label for="tamanho">Tamanho da área (em m2):</label>
        <div id="tamanho"><?php echo $tamanho; ?></div>

        <label for="estilo">Tipo de estilo:</label>
        <div id="estilo"><?php echo $estilo; ?></div>

        <label for="finalizacao">Data de finalização desejada:</label>
        <div id="finalizacao"><?php echo $finalizacao; ?></div>

        <label for="tipo_projeto">Tipo de projeto:</label>
        <div id="tipo_projeto"><?php echo $tipo_projeto; ?></div>

        <label for="resposta"> Resposta: </label>
        <div id="resposta"> <?php echo $resposta; ?> </div>

        <a href="deletar_orcamento.php?id=<?php echo $id_orcamento; ?>" id="deletar"> Deletar orçamento </a>
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
