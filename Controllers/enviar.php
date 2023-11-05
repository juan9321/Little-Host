<?php

require_once("../Models/Conexao.php");
$conexao = new Conexao();


$arquivo = $_FILES['flImage']; //pega arquivo da imagem
$caminhoAtualArquivo = $arquivo['tmp_name']; //caminho atual da image,

$nomeImagem = $_POST['id'];//deixa nome da imagem como o id do usuario
$caminhoSalvar = 'arquivos/' . $nomeImagem . ".png"; //caminho para salvar imagem dentro dos arquivos
$caminhoSalvarBanco = '../Controllers/arquivos/' . $nomeImagem . ".png"; //caminho para salvar no banco de dados

$moverImagem = move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar);//salva imagem no site

$stmt = $conexao->getConexao()->query("UPDATE anfitriao SET imagem_perfil='$caminhoSalvarBanco' WHERE cod=$nomeImagem"); //muda caminho da imagem


if($moverImagem){
    header("Location: ../View/AutoPerfil.php");
}else{
    header("Location: ../View/AutoPerfil.php");
}

?>