<?php
// função para o radio "estilo"
function estilo_select(){
    global $conn;
    $sth = $conn->prepare("select id_estilo, nm_estilo from trabalho.tb_estilo");
    $sth->execute();
    return $sth->fetchAll();
}
// função para o radio "tipos de projeto"
function tipo_projeto_select(){
    global $conn;
    $sth = $conn ->prepare("select id_tipo_projeto, nm_tipo_projeto from trabalho.tb_tipo_projeto");
    $sth->execute();
    return $sth->fetchAll();
}
?>