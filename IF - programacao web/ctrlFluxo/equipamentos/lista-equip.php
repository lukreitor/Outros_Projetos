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
    <link rel="stylesheet" href="../style/estilo.css" type="text/css">
    <link rel="stylesheet" href="../style/estilo-menu.css" type="text/css">
    <link rel="shortcut icon" href="img/shortif.png" type="image/x-icon">
</head>
<body>
    <div class="global">
    <a href="#" class="btn btn-primary"> Cadastrar novo Local </a>
        <h3>Lista de Equipamentos Cadastrados</h3>

            <div class="table-responsive-sm">   
                <table class="table table-striped table-sm text-thead">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" colspan="2">#</th>
                            <th scope="col" colspan="6">Local </th>
                            <th scope="col" colspan="4">Descrição</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php 
                        require_once '../config/connect.php';
                        $buscaEquip = mysqli_query($conn, "SELECT equipamentos.idEquipamentos, 
                        equipamentos.descricao AS descEqui, locais.descricao AS descLocal
                        FROM 
                        equipamentos, locais 
                        WHERE locais.idLocal = equipamentos.idLocal"); 

                            while($linhas = mysqli_fetch_array($buscaEquip)){
                                $idEqui = $linhas['idEquipamentos'];
                                $desc = $linhas['descEqui'];
                                $local = $linhas['descLocal'];

                                echo "<tr>";
                                echo "<th  scope='row' colspan='2'>".$idEqui."</th>";
                                echo "<td  colspan='6'>".$local."</td>
                                      <td  colspan='4'>".$desc."</td>";
                                echo "</tr>";

                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>