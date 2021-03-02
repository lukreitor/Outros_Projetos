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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css" integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style/estilo.css" type="text/css">
    <link rel="stylesheet" href="style/estilo-login.css" type="text/css">
    <link rel="shortcut icon" href="img/shortif.png" type="image/x-icon">

</head>

<body>
    <div class="global">
        <div class="area">
            <a href="index.html"><img src="img/logo_if.png"></a>
        </div>
        <div class="form-login">
            <h3>Envio de Arquivo</h3>
            <form name="cad" method="POST" action="actions/recebeArquivo.php" enctype="multipart/form-data">
                <div class="input-login">
                    <label for="arquivo"> Arquivo</label>
                    <br />
                    <input type="file" name="arquivo" />
                </div>

                <button type="submit" class="botao" name="botaoacess" id="botaoAcessar">
                    Enviar <i class="fas fa-sign-in-alt"></i> </button>
            </form>
        </div>
    </div>
    <footer>
        INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SERTÃO PERNAMBUCANO - CAMPUS
        PETROLINA<br />
        BR 407, Km 08 - Jardim São Paulo - Petrolina - PE - Brasil<br />
        CEP: 56.314-520 | Telefone: (87) 2101-4300<br />
        Desenvolvido por Vinicius Dantas! v0.3
    </footer>
    <script type="text/javascript">
        document.querySelector('input[type=email]').oninvalid = function() {

            this.setCustomValidity("");

            if (!this.validity.valid) {

                this.setCustomValidity("Login errado meu jovem!");
            }

        };
    </script>
</body>

</html>