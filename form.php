<?php
// conexão do banco
Require_once ("banco.php");
Require_once ("tabela.php");
session_start ();

$nome = (isset($_GET['nome']) ? $_GET['nome'] : "");
$email = (isset($_GET['email']) ? $_GET['email'] : "");
$tel = (isset($_GET['tel']) ? $_GET['tel'] : "");
$date = (isset($_GET['date']) ? $_GET['date'] : "");

$tipo_de_projeto = tipo_projeto_select();
$estilo = estilo_select();

$caracteristicas = (isset($_GET['caracteristicas']) ? $_GET['caracteristicas'] : "");
$tamanho = (isset($_GET['tamanho']) ? $_GET['tamaho'] : "");
$finalizacao = (isset($_GET['finalizacao']) ? $_GET['finalizacao'] : "");

// função para tipos de projeto
function tipo_projeto($nome, $dados){
	$html = "";
	for ($i=0; $i<=count($dados)-1; $i++) {
		$html .= "<label for=\"". $nome . "_" . $dados[$i][0] . "\">" . $dados[$i][1] . "</label>\n";
		$html .="<input type=\"radio\" name=\"$nome\" value=\"" . 
		$dados[$i][0] . "\" id=\"${nome}_" . $dados[$i][0] . "\">\n";
		}
		return $html;
}

// função para retornar tipos de projeto
function tipo_de_projeto(){
	global $tipo_de_projeto;
	return tipo_projeto("tipo_de_projeto", $tipo_de_projeto);
}

// função para tipos de estilo
function tipo_estilo($nome, $dados){
    $html = "";
    for ($i=0; $i<=count($dados)-1; $i++) {
        $html .= "<label for=\"".$nome . "_" . $dados[$i][0] . "\">" . $dados[$i][1] . "</label>\n";
        $html .= "<input type=\"radio\" name=\"$nome\" value=\"" .
        $dados[$i][0] . "\" id=\"${nome}_" . $dados[$i][0] . "\">\n";
        }
        return $html;
}
// função para retornar tipos de estilo
function estilo(){
    global $estilo;
    return tipo_estilo("estilo", $estilo);
}
?>
<!DOCTYPE html>
    <html lang=pt-br>
        <head> 
            <meta charset="uft-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> DB Arquitetura </title>
            <link rel="stylesheet" href="css/form.css">
        </head>
        <body>       
        <header>
            <a class="logo" id="inicio"> DB Arquitetura </a>
            <!-- barra de navegação -->
            <nav class="navbar">
                <a href="inicio.php"> Início </a>
                <a href="#info"> Contatos </a>
                <a href="orc.php"> Meu orçamento </a>
            </nav>
        </header>
        <!-- formulário -->
       <section class="form">
       <div class="solicitar">
            <a class="orc" id="inicio"> Solicitação de orçamento </a>
        </div>
        <form action="processar_form.php" method="POST">
        <h2> Informações Pessoais: </h2>
            <div class="form_group">
                <label for="name"> Nome completo: </label>
                <input type="text" name="nome" required id="nome" value="<?=$nome?>"><br>
            </div>
            <div class="form_group">
                <label for="email"> Email: </label>
                <input type="email" name="email" required id="email" value="<?=$email?>"><br>
            </div>
            <div class="form_group">
                <label for="tel"> Número para contato: </label>
                <input type="tel" name="tel" required id="tel" value="<?=$tel?>"> <br> 
            </div>
            <div class="form_group">
                <label for="date"> Data de nascimento: </label>
                <input type="date" name="date" required id="date" value="<?=$date?>"> <br>
            </div>
            
            <h2> Informações do projeto: </h2>

            <div class="form_type">

            <label for="type"> <span> Tipo de projeto: <span></label> <br>
            <?php
            echo tipo_de_projeto();
            ?>
            </div>

            <div class="form_group">
            <label for="caracteristicas"> Escreva características essenciais para esse projeto:</label>
            <textarea id="caracteristicas" value="<?=$tamanho?>" name="caracteristicas"> Por exemplo, número de quartos, espaços abertos, requisitos de iluminação, acessibilidade, sustentabilidade, etc.</textarea>
            </div>

            <div class="form_type">

                <label for="type"><span> Tipo de estilo:  <span></label> <br>
                <?php
                echo estilo();
                ?>
            </div>

            <div class="form_group">
                <label for="tamanho"> Tamanho da área(em m2): </label>
                <input type="number" name="tamanho" required id="tamanho" value="<?=$tamanho?>"> <br>
            </div>

            <div class="form_group">
                <label for="finalizacao"> Data de finalização desejada: </label>
                <input type="date" name="finalizacao" required id="finalizacao" value="<?=$finalizacao?>"> <br>
            </div>
            <!-- botão enviar -->
            <input type="submit" value="Enviar">
            <a href="login.php" id="login"> Já solicitei o meu orçamento! </a>
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
