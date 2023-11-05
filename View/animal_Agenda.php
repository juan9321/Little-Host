<?php
require_once('../Controllers/TutorController.php');
require_once('../Controllers/FichaController.php');

$tutorCod = $_GET['tutor_cod'];

$tutorController = new TutorController();
$fichaController = new FichaController();
$animals = $fichaController->listarAnimaisPorTutor($tutorCod);

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

<!-- início do navbar-->
<?php
include('layouts/menu.php');
?>
<!-- fim do navbar-->

<div class="container">
    <h1>Ficha animal</h1>
    <main>
    <section class="content">
        <h1>Dados do Animal</h1>




        <div id="animal-info">


        <?php
          
            if (!empty($animals)) {
                foreach ($animals as $animal) {
                    echo '<form action="" method="post" enctype="multipart/form-data">';
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

                    echo '</form>';

                    echo '<br>';

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

                }
            } else {
                echo "Nenhum animal cadastrado por este tutor.";
            }
            ?>

        </div>
    </section>
</main>
</div>
<script src="js/excluirAnimal.js"></script>
</body>
</html>
