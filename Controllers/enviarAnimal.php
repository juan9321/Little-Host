<?php
require_once("../Models/Conexao.php");
$conexao = new Conexao();

// Verifique se o campo 'fImage' está definido no arquivo enviado
if (isset($_FILES['fImage'])) {
    $arquivo = $_FILES['fImage']; // pega arquivo da imagem

    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        if (isset($_POST['cod_animal'])) {
            $cod_animal = $_POST['cod_animal'];
            
            $caminhoAtualArquivo = $arquivo['tmp_name']; // caminho atual da imagem
            $nomeImagem = $cod_animal; // deixa o nome da imagem como o ID do animal
            $caminhoSalvar = 'arquivos/' . $nomeImagem . ".png"; // caminho para salvar imagem dentro da pasta "arquivos" no seu servidor
            $caminhoSalvarBanco = '../Controllers/arquivos/' . $nomeImagem . ".png"; // caminho para salvar no banco de dados

            $moverImagem = move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar); // salva a imagem no servidor

            if ($moverImagem) {
                $query = "UPDATE ficha_animal SET img=? WHERE cod_animal=?";
                $stmt = $conexao->getConexao()->prepare($query);
                $stmt->bind_param("si", $caminhoSalvarBanco, $cod_animal);
                
                if ($stmt->execute()) {
                    header("Location: ../View/ficha.php");
                } else {
                    echo "Erro na consulta SQL: " . $stmt->error;
                }
            } else {
                header("Location: ../View/ficha.php");
            }
        } else {
            header("Location: ../View/ficha.php");
        }
    } else {
        header("Location: ../View/ficha.php");
    }
} else {
    header("Location: ../View/ficha.php");
}
?>
