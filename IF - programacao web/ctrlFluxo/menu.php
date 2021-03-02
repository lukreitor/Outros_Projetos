<?php
session_start();

if (!$_SESSION) {
header('location: 403.html');
}
?>
<!DOCTYPE html>
<html lang="pt-br" xml:lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Sistema de Controle de Acesso">
    <meta name="keywords" content="controle, sistema, segurança">
    <meta name="author" content="Vinicius Dantas Santos">
    <meta name="viewport" content="width=device-width, inital-scale=1">

    <title> Controle de Fluxo </title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css"
        integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
    <link rel="stylesheet" href="style/estilo.css" type="text/css">
    <link rel="stylesheet" href="style/estilo-menu.css" type="text/css">
    <link rel="shortcut icon" href="img/shortif.png" type="image/x-icon">


</head>

<body>
    <div class="global">
        <div class="area">
            <a href="index.html"> <img src="img/logo_if.png"> </a>
        </div>
        <h3>MENU DO SISTEMA</h3>
        <div class="menu">
            <div class="row">
                <div class="col">
               <h4> Seja Bem-vindo: <?php echo $_SESSION['nome']; ?></h4>
                </div>
                <div class="col">
                    <a href="actions/logoff.php" class="btn-logout" title="Sair do Sistema"> <i class="fas fa-sign-out-alt fa-3x"
                            style="color: rgb(179, 16, 16);"></i> </a>
                </div>
            </div>
            <div class="menu-img">
                <a href="menu-cad.html">
                    <img src="img/window.png">
                    <p>Gerenciamento</p>
                </a>
            </div>
            <div class="menu-img">
                <a href="../ctrlFluxo/fluxo/visualizar-fluxo.html">
                    <img src="img/view.png">
                    <p>Visualizar</p>
                </a>
            </div>
            <div class="menu-img">
                <a href="#">
                    <img src="img/padlock.png">
                    <p>Relatórios</p>
                </a>
            </div>
            <div class="menu-img">
                <a href="index.html">
                    <img src="img/sair.png">
                    <p>Sair</p>
                </a>
            </div>
        </div>
    </div>
    <!--<footer>
        INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SERTÃO PERNAMBUCANO - CAMPUS
        PETROLINA<br />
        BR 407, Km 08 - Jardim São Paulo - Petrolina - PE - Brasil<br />
        CEP: 56.314-520 | Telefone: (87) 2101-4300<br />
        Desenvolvido por Vinicius Dantas! v0.3
    </footer> -->
</body>

</html>