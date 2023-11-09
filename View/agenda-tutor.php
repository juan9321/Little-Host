<?php
require_once('../Controllers/HospedagemController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Little Host | Agenda</title>
    <link rel="icon" href="img/logo6.png">
    <link rel="stylesheet" type="text/css" href="css/agenda2.css">
    <link rel="stylesheet" type="text/css" href="css/agenda.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" type="text/css" href="css/navFooter.css">
</head>
<body>
    <?php include('layouts/menu.php'); ?>

    <main>
            
        <div class="container">
            <h1>Sua Agenda</h1>
                <section class="content">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>Inicio da Hospedagem</th>
                                <th>Fim da Hospedagem</th>
                                <th>Perfil</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $tutorCod = $_SESSION['tutor_cod']; // Obtém o código do tutor da sessão

                        $hospedagemController = new HospedagemController();
                        $hospedagens = $hospedagemController->listarHospedagensDoTutor($tutorCod);
                        
                
                                if (!empty($hospedagens)) {
                                    foreach ($hospedagens as $hospedagem) {
                                        echo "<tr>";
                                        echo "<td>" . $hospedagem['data_hosp'] . "</td>";
                                        echo "<td>" . $hospedagem['data_busca'] . "</td>";

                                        echo "<td><a href='perfil_agenda.php?id=" . $hospedagem['cod_anfitriao'] . "' class='btn-visualizar'>Perfil</a></td>"; 
                                    
                                        echo '<td><button onclick="excluirHospedagem(' . $hospedagem['cod'] . ')" class="btn-excluir">Excluir</button></td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Nenhuma hospedagem agendada.</td></tr>";
                                }
                                ?>

                        </tbody>
                    </table>
                </section>
        </div>
    </main>
    <script src="js/excluirHospedagem.js"></script>
</body>
</html>
