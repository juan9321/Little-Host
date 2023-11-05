<?php
require_once('../Controllers/TutorController.php');
require_once('../Controllers/FichaController.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visualização de Dados do Animal</title>
    <link rel="stylesheet" href="css/styleFicha.css">
    <link rel="stylesheet" href="css/calendario.css">
</head>
<body>

<!-- Início do navbar -->
<?php
include('layouts/menu.php');
?>
<!-- Fim do navbar -->

<div class="container">
    <h1>Ficha animal</h1>
    <main>
    <section class="content">
    <br>
    <?php

    $tutorCod = $_SESSION['tutor_cod'];

    $tutorController = new TutorController();
    $temAnimaisCadastrados = $tutorController->verificarAnimaisCadastrados($tutorCod);

    if ($temAnimaisCadastrados) {
        $fichaController = new FichaController();
        $animals = $fichaController->listarAnimaisPorTutor($tutorCod);

        if (!empty($animals)) {
            foreach ($animals as $animal) {
                echo '<form action="../Controllers/enviarAnimal.php" method="post" enctype="multipart/form-data">';
                echo '<div class="max-width">';
                echo '<div class="imageContainer">';

                // Verifique se o animal possui uma imagem
                if (!empty($animal['img'])) {
                    // Se o animal tiver uma imagem, exiba a imagem cadastrada
                    echo '<img src="' . $animal['img'] . '" alt="Imagem do animal" id="imgPhoto">';
                } else {
                    // Se o animal não tiver uma imagem, mostre uma imagem padrão
                    echo '<img src="img/pata.png" alt="Imagem Padrão" id="imgPhoto">';
                }

                echo '</div>';
                echo '</div>';

                // Adicione um campo oculto para armazenar o código do animal
                echo '<input type="hidden" name="cod_animal" value="' . $animal['cod_animal'] . '">';

                echo '<input type="file" id="flImage" name="fImage" accept="image/*">';
                echo '<input type="submit" value="Enviar Imagem do Animal">';
                echo '</form>';

                echo '<br>';

                // O restante do código para exibir os detalhes do animal permanece inalterado
                echo "<p><strong>Nome:</strong> " . $animal['nome'] . "</p>";
                echo "<p><strong>Espécie:</strong> " . $animal['especie'] . "</p>";
                echo "<p><strong>Raça:</strong> " . $animal['raca'] . "</p>";
                echo "<p><strong>Sexo:</strong> " . $animal['sexo'] . "</p>";
                echo "<p><strong>Idade:</strong> " . $animal['idade'] . "</p>";
                echo "<p><strong>Peso:</strong> " . $animal['peso'] . "</p>";
                echo "<p><strong>Tamanho:</strong> " . $animal['tamanho'] . "</p>";
                echo "<p><strong>Características:</strong> " . $animal['caracteristicas'] . "</p>";
                echo "<p><strong>Comportamento:</strong> " . $animal['comportamento'] . "</p>";
                echo "<p><strong>Histórico Médico:</strong> " . $animal['historico_medico'] . "</p>";
                echo "<p><strong>Instruções Especiais:</strong> " . $animal['instrucoes_especiais'] . "</p>";

                // Botão para excluir o animal
                echo '<button onclick="excluirAnimal(' . $animal['cod_animal'] . ')" class="btn-excluir">Excluir Animal</button>';
                
                echo "<a href='editarTutor2.php?id=" . $tutorCod . "' class='btn-editar'>Editar Meus Dados</a>"; 
                // Botão para editar o animal (adicionado)
                echo '<a href="editarfichaanim.php?cod_animal=' . $animal['cod_animal'] . '" class="btn-editar">Editar Animal</a>';
            }
        } else {
            echo "Nenhum animal cadastrado por este tutor.";
        }
    } else {
        echo "Nenhum animal cadastrado por este tutor.";
    }
    ?>
    </section>
</main>
</div>

<script src="js/imagemAnimal.js"></script>
<script src="js/excluirAnimal.js"></script>
</body>
</html>
