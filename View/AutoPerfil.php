<?php
require_once("../Controllers/AnfitriaoController.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <!--titulo e logo da pagina-->
    <title>Little Host | Perfil</title>
    <link rel="icon" href="img/logo6.png">

    <!-- link do arquivo css -->
    <link rel="stylesheet" href="css/predefinicaoImg.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/autoperfil.css">
    <link rel="stylesheet" href="css/navFooter.css">
    <link rel="stylesheet" href="css/calendario.css">
    <!-- link do arquivo js -->
    <script src="js/calendario.js" defer></script>
    </head>
<body>

    <!-- inico do navbar-->
    <?php
        include('layouts/menu.php');

        $anfitriaoCod = isset($_SESSION['anfitriao_cod']) ? $_SESSION['anfitriao_cod'] : null;
        $anfitriaoController = new AnfitriaoController();
        $lista = $anfitriaoController->listarDadosAnfitriaoLogado($anfitriaoCod);


  
        $anfitriaoCod = $_SESSION['anfitriao_cod'];

        $anfitriaoController = new AnfitriaoController();
        $lista = $anfitriaoController->listarDadosAnfitriaoLogado($anfitriaoCod);

    ?>
    <!-- fim do navbar-->


    <!-- inico do container-->

    <main>
      <div class="container">
        <div class="profile">
          <!--imagem circular com js-->
          <form action="../Controllers/enviar.php" method="post" enctype="multipart/form-data">
            <div class="max-width">
              <div class="imageContainer">

                <?php if($lista[0]['imagem_perfil'] && file_exists($lista[0]['imagem_perfil'])){ ?>

                  <img src="<?php echo $lista[0]['imagem_perfil'] ?>" alt="Selecione uma imagem" id="imgPhoto" class='imagem-160x160'>

                <?php }else{ ?>

                  <img src="img/perfil.png" alt="Selecione uma imagem" id="imgPhoto" class='imagem-160x160'>
                  
                <?php } ?>

              </div>
            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $anfitriaoCod ?>"> <!-- codigo do anfitriao -->
            <input type="file" id="flImage" name="flImage" accept="image/+">
          <!--fim-->

          <!-- imagem com php botao-->
            
            <input  class="comic-button" type="submit" value="Enviar">
          </form>
          <!--fim-->



          <?php

            if (!empty($lista)) {
                foreach ($lista as $listar) {
                    echo "<h2>Meus Dados:</h2>";
                    echo "<p><strong>Nome:</strong> " . $listar['nome'] . "</p>";
                    echo "<p><strong>Telefone:</strong> " . $listar['telefone'] . "</p>";
                    echo "<p><strong>Endereço:</strong> " . $listar['endereco'] . "</p>";
                    echo "<p><strong>Cidade:</strong> " . $listar['cidade'] . "</p>";
                    echo "<p><strong>Bairro:</strong> " . $listar['bairro'] . "</p>";
                    echo "<p><strong>Número da Casa:</strong> " . $listar['num_casa'] . "</p>";
                    echo "<p><strong>Complemento:</strong> " . $listar['complemento'] . "</p>";
                    echo "<p><strong>Gênero:</strong> " . $listar['genero'] . "</p>";
                    echo "<p><strong>Valor por Hora:</strong> R$ " . $listar['valor_hora'] . "</p>";
                    echo "<p><strong>Preferências:</strong> " . $listar['preferencias'] . "</p>";
                
                }
            } else {
                echo "<p>Nenhuma informação encontrada para este anfitrião.</p>";
            }
          ?>

          <button class="comic-button">
            <a href="EditarAnfitriao.php?anfitriao_cod=<?php echo $listar['cod']; ?>" class="btn-editar">Editar Dados Pessoais</a>
          </button>         
        </div>
          
      </div>
   
    </main>
      
      

      <br>
      <br>
           
      <div class="footer">
        <div class="footer-images">
          <a href="#"><img src="img/x.jpg"></a>
          <a href="#"><img src="img/instagram.png"></a>
          <a href="#"><img src="img/facebook.jpg"></a>
        </div>
        <div class="footer-links">
            <a href="home.php">Home</a>
            <a href="sobre.php">Sobre Nós</a>
            <a href="contato.php">Contato</a>
            <a href="anfitriao.php">Anfitriões</a>
        </div>
        <div class="copyright">
           © 2023 Todos os direitos reservados.
        </div>
      </div>

      <script src="js/navbar.js"></script>
      <script src="js/imagem.js"></script>
      
</body>
</html>