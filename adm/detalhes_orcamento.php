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

// Consulta SQL para obter as informações do orcamento e a resposta associada
$sql = "SELECT o.*, e.nm_estilo, tp.nm_tipo_projeto, ro.ds_resposta AS resposta_orcamento 
        FROM trabalho.tb_orcamento o
        LEFT JOIN trabalho.tb_estilo e ON o.id_estilo = e.id_estilo
        LEFT JOIN trabalho.tb_tipo_projeto tp ON o.id_tipo_projeto = tp.id_tipo_projeto
        LEFT JOIN trabalho.tb_resposta_orcamento ro ON o.id_orcamento = ro.id_orcamento
        WHERE o.id_orcamento = :id_orcamento"; 

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
    $resposta = isset($row['resposta']) ? $row['resposta'] : "";
} else {
    // Nenhum resultado encontrado
    echo "Não existem orçamentos pendentes!.";
}
} else{
    header('Location: login_adm.php');
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
    <title>Orçamento</title>
    <link rel="stylesheet" href="../css/informacoes_orcamento.css">
</head>
<body>
    <header>
        <!-- logotipo da pagina -->
        <a href="#" class="logo" id="inicio"> DB Arquitetura </a>

        <!-- barra de navegação -->
        <nav class="navbar">
            <a href="inicio_adm.php"> Inicio </a>
            <a href="informacoes_adm.php"> Minha conta </a>
            <a href="novo_adm.php"> Novo Administrador </a>
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

        <form method="post" action="processar_resposta_orcamento.php">
    <input type="hidden" name="id_orcamento" value="<?php echo $id_orcamento; ?>">
    <label for="resposta"> Resposta: </label>
    <textarea id="resposta" name="resposta"><?php echo $resposta; ?></textarea>
    <button type="submit">Enviar Resposta</button>
</form>
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