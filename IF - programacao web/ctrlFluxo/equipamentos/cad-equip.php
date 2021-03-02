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
    <div class="area">
      <a href="../index.html"> <img src="../img/logo_if.png"> </a>
    </div>
    <h3>CADASTRO DE EQUIPAMENTOS</h3>
    <div class="menu">
      <div class="row">
        <div class="col">
          <a href="menu-equip.html" class="btn-back" title="Voltar"> <i class="fas fa-arrow-left fa-3x"
              style="color:  rgba(34, 199, 42, 0.856);"></i> </a>
        </div>
        <div class="col">
          <a href="#" class="btn-logout" title="Sair do Sistema"> <i class="fas fa-sign-out-alt fa-3x"
              style="color: rgb(179, 16, 16);"></i> </a>
        </div>
      </div>
      <form class="mx-auto" method="POST" action="../actions/cadastraEquipamentos.php">
        <div class="form-group">
          <label for="inputLocal" >Local</label>
          <select id="selectLocal" class="form-control" name="local">
            <option  selected value="...">...</option>
            <?php
              require_once '../config/connect.php';
              $buscaLocal = mysqli_query($conn, "SELECT * FROM locais"); 
                  while($linhas = mysqli_fetch_array($buscaLocal)){
                      $idLocal = $linhas['idLocal'];
                      $desc = $linhas['descricao'];
                      echo "<option value='".$idLocal."'>".$desc."</option>";
                    }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="inputDesc">Descrição</label>
          <select id="selectdesc" class="form-control" name="descricao">
            <option  selected >...</option>
            <option  value="Catraca">Catraca</option>
            <option  value="Fechadura Eletrônica">Fechadura Eletrônica</option>
            <option  value="Antena RFID">Antena RFID</option>
          </select>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </div>
      </form>
      <hr>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="lista-equip.php" ></iframe>
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