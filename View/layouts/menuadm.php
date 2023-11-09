<!-- link do arquivo js  -->
<script src="js/scriptt.js"></script>
<link rel="stylesheet" href="css/navFooter.css">
<!-- fim do navbar-->



<?php
session_start();
?>

<!-- inico do navbar-->    
<header>
    <nav class="navbar">
        <div class="logo">
        <a href="tela-adm.php">
            <img src="img/logo.png" alt="Logo">
        </a>
        </div>
        <ul class="nav-menu">

            <li class="nav-item"><a href="tela-adm.php" class="nav-link">Tutores</a></li>
            <li class="nav-item"><a href="tela-adm2.php" class="nav-link">Anfitriões</a></li>
            

            <?php if(isset($_SESSION['logado']) && $_SESSION['logado']){ ?> <!-- CASO ESTEJA LOGADO -->
                <li class="nav-item"><a onclick='return confirmar()' href="../Controllers/logout.php">Sair</a></li>


            <?php }else{ ?><!-- CASO NÃO ESTEJA LOGADO -->
                <li class="nav-item"><a href="login-cadastro.php" class="nav-link">Login</a></li>
            <?php } ?>
            </ul>
        <div class="nav-icon">
            <span class="nav-resp"></span>
            <span class="nav-resp"></span>
            <span class="nav-resp"></span>
        </div>
    </nav>

    
    <script src="js/navbar.js"></script>
</header>    


