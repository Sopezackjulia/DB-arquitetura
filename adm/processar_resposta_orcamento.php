<?php
require_once("../banco.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $id_orcamento = $_POST['id_orcamento'];
    
    // Verifica se o campo de resposta foi enviado e não está vazio
    if (isset($_POST['resposta']) && trim($_POST['resposta']) !== '') {
        $resposta = $_POST['resposta'];

        $stmt = $conn->prepare("INSERT INTO trabalho.tb_resposta_orcamento (id_orcamento, ds_resposta, id_adm)
                                VALUES (:id_orcamento, :ds_resposta, :id_adm)");

        $id_adm = $_SESSION['id_pessoa'];

        $stmt->bindParam(':id_orcamento', $id_orcamento);
        $stmt->bindParam(':ds_resposta', $resposta);
        $stmt->bindParam(':id_adm', $id_adm);

        $stmt->execute();
        
        // Redireciona de volta para a página de detalhes após o processamento
        header("Location: detalhes_orcamento.php?id=" . $id_orcamento);
        exit();
    } else {
        echo "O campo de resposta não pode estar vazio.";
    }
} else {
    header("Location: erro.php");
    exit();
}
?>