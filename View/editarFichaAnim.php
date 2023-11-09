
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Edição de Ficha Animal</title>
    <link rel="stylesheet" href="css/styleFicha.css">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>
<body>

<!-- início do navbar-->
<?php
include('layouts/menu.php');
?>
<!-- fim do navbar-->

<?php
require_once('../Controllers/FichaController.php');

$fichaController = new FichaController();

// Verifique se o parâmetro 'id' está definido na URL
if (isset($_GET['cod_animal'])) {
    $cod_animal = $_GET['cod_animal'];
    $animal = $fichaController->read($cod_animal);
} else {
    echo "ID não foi fornecido na URL.";
    // Você pode tratar esse caso de erro aqui, como redirecionar para outra página ou mostrar uma mensagem de erro.
    // Por exemplo, header("Location: pagina_de_erro.php");
}
?>

    <main>
        <div class="container">
            <h1>Editar Ficha do Animal</h1>
                <section class="content">
                    <h1>Dados do Animal</h1>
                    <br>
                    <div id="animal-info">
                        <form method="post" action="../Controllers/FichaController.php?funcao=update&cod_animal=<?php echo $cod_animal; ?>">
                        <div class="col-md-3">
                            <label for="nome"  class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="Name" value="<?php echo $animal['nome']; ?>"><br>
                        </div>
                        <div class="col-md-3">
                            <label for="especie" class="form-label">Espécie:</label>
                            <input type="text" class="form-control" name="inputEspecie" value="<?php echo $animal['especie']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="raca" class="form-label">Raça:</label>
                            <input type="text" class="form-control" name="Raca" value="<?php echo $animal['raca']; ?>"><br>
                            </div>


                            <div class="col-md-3">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <input type="text" class="form-control" name="inputSexo" value="<?php echo $animal['sexo']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="text" class="form-control" name="Idade" value="<?php echo $animal['idade']; ?>"><br>
                            </div>


                            <div class="col-md-3">
                            <label for="peso" class="form-label">Peso:</label>
                            <input type="text" class="form-control" name="Peso" value="<?php echo $animal['peso']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="tamanho" class="form-label">Tamanho:</label>
                            <input type="text" class="form-control" name="Tamanho" value="<?php echo $animal['tamanho']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="caracteristicas" class="form-label">Características:</label>
                            <input type="text" class="form-control" name="Caracteristicas" value="<?php echo $animal['caracteristicas']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="comportamento" class="form-label">Comportamento:</label>
                            <input type="text" class="form-control" name="Comportamento" value="<?php echo $animal['comportamento']; ?>"><br>
                            </div>

                            <div class="col-md-3">
                            <label for="historico_medico" class="form-label">Histórico Médico:</label>
                            <input clss="input-field" class="form-control" type="text" name="Historico_Medico" value="<?php echo $animal['historico_medico']; ?>"><br>
                            </div>


                            <div class="col-md-3">
                            <label for="instrucoes_especiais" class="form-label">Instruções Especiais:</label>
                            <input type="text" class="form-control" name="Instrucoes_especiais" value="<?php echo $animal['instrucoes_especiais']; ?>"><br>
                            </div>
                            <br>
                            <input class="btn-editar" type="submit" value="Atualizar Ficha">
                            </form>
                    </div>
                </section>
                
        </div>
    </main>













</div>

</body>
</html>
