<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--titulo e logo da pagina-->
    <title>Anfitriões</title>
    <link rel="icon" href="img/logo6.png">

    <!-- link do arquivo css -->
    <link rel="stylesheet" href="css/predefinicaoImg.css">
    <link rel="stylesheet" href="css/anfitriao.css">
    <link rel="stylesheet" href="css/navFooter.css">

    <!-- link do arquivo js -->
    <script src="js/script.js"></script>
    <script src="js/navbar.js"></script>
</head>
<body>

    <!-- início do navbar-->
    <?php
        include('layouts/menu.php');
    ?>
    <!-- fim do navbar-->

    <?php
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        // O usuário não está logado, então redirecione ou mostre uma mensagem de alerta.
        echo "Você precisa estar logado para acessar esta página. Redirecione para a página de login em 10 segundos...";
        header("refresh:10;url=login-cadastro.php"); // Redirecione para a página de login após 10 segundos
        exit();
    } 


    include('../Controllers/AnfitriaoController.php');
    include('../Controllers/FichaController.php');

    $FichaController = new FichaController();


    if (isset($_SESSION['tutor_cod'])) {
        $animals = $FichaController->listarAnimaisPorTutor($_SESSION['tutor_cod']);
    } else {
        // Redirecione ou mostre uma mensagem de erro, pois a chave 'tutor_cod' não está definida.
        echo "Voce é um Anfitriao, e nao tem acesso para acessar essa pagina. Redirecionando para uma página de erro em 5 segundos...";
        header("refresh:5;url=home.php"); // Redirecione para a página de erro após 5 segundos
        exit();
    }
    
    if (empty($animals)) {
        // Se o usuário não tiver animais cadastrados, redirecione para alguma página de aviso ou exiba uma mensagem.
        echo "Você não tem animais cadastrados. Redirecionando para alguma página de aviso em 5 segundos...";
        header("refresh:5;url=fichaAnimal.php"); // Redirecione para a página de aviso após 5 segundos
        exit();
    }
    ?>

    <!-- ... (código HTML) ... -->
    <main>
        <section class="products" id="products">
            <h3 class="heading"><span>Anfitriões</span></h3>
            <div class="box-container">
                <?php
                $AnfitriaoController = new AnfitriaoController();
                $anfitrioes = $AnfitriaoController->listar();
                foreach ($anfitrioes as $anfitriao) {
                    foreach ($animals as $animal) {
                        ?>
                        <div class="box">
                            <div class="image">
                                <?php
                                if (isset($anfitriao['imagem_perfil']) && file_exists($anfitriao['imagem_perfil'])) {
                                    echo "<img src='" . $anfitriao['imagem_perfil'] . "' alt='Imagem do Anfitrião' class='imagem-100x100'>";
                                } else {
                                    echo "<img src='img/perfil.png' alt='Imagem padrão' class='imagem-100x100'>";
                                }
                                ?>
                            </div>
                            <div class="content">
                                <h3><?php echo $anfitriao['nome'] ?></h3>
                            </div>
                            <div class="btn">
                                <?php
                                $perfilUrl = "perfil.php?id=" . $anfitriao['cod'] . "&cod_animal=" . $animal['cod_animal'];
                                echo "<a href='$perfilUrl' class='btn-editar'>Perfil</a>";
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <!-- ... (seu código HTML) ... -->

    <!--inicio do footer-->
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
    <!--fim do footer-->
</body>
</html>
