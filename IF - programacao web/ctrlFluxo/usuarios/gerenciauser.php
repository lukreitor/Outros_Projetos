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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css" integrity="sha384-OLYO0LymqQ+uHXELyx93kblK5YIS3B2ZfLGBmsJaUyor7CpMTBsahDHByqSuWW+q" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/estilo.css" type="text/css">
  <link rel="stylesheet" href="../style/estilo-menu.css" type="text/css">
  <link rel="shortcut icon" href="img/shortif.png" type="image/x-icon">
</head>

<body>
  <div class="global">
    <div class="area">
      <a href="../index.html"> <img src="../img/logo_if.png"> </a>
    </div>
    <h3>GERÊNCIA DE USUARIOS</h3>
    <div class="menu">
      <div class="row">
        <div class="col">
          <a href="menu-user.html" class="btn-back" title="Voltar"> <i class="fas fa-arrow-left fa-3x" style="color:  rgba(34, 199, 42, 0.856);"></i> </a>
        </div>
        <div class="col">
          <a href="#" class="btn-logout" title="Sair do Sistema"> <i class="fas fa-sign-out-alt fa-3x" style="color: rgb(179, 16, 16);"></i> </a>
        </div>
      </div>
      <div class="table-responsive-sm">
        <table class="table table-hover text-thead">
          <thead class="thead-dark">
            <tr>
              <th scope="col" colspan="8">Usuario </th>
              <th scope="col" colspan="2">Status </th>
              <th scope="col" colspan="2"> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once '../config/connect.php'; //importando o arquivo de conexão

            $buscaUsers = mysqli_query($conn, "SELECT * FROM  usuario");

            while ($linhas = mysqli_fetch_array($buscaUsers)) {
              $idUsers = $linhas['id_user'];
              $nome = $linhas['nome']; //o que ta entre aspas dentro do array deve ser exatamente o nome da coluna no BD.
              $mat = $linhas['matricula'];
              $cpf = $linhas['cpf'];
              $email = $linhas['email'];
            ?>
              <tr>
                <th scope='row' colspan='8'><?php echo $linhas['nome']; ?></th>
                <th scope='row' colspan='2'><?php echo $linhas['situacao']; ?></th>
                <td colspan='4'>
                  <div class='dropdown'>
                    <button class='btn btn-info dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Ações </button>

                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <button class='dropdown-item' data-toggle='modal' data-target="#modalDetalhes<?php echo $linhas['id_user']; ?>" type='button'><i class='fas fa-eye'></i> Detalhes</button>
                      <button class='dropdown-item btn btn-warning' data-toggle='modal' data-target="#modalEditar<?php echo $linhas['id_user']; ?>" type='button'><i class='fas fa-edit'></i> Editar</button>
                      <button class='dropdown-item btn btn-danger' href='#' data-toggle='modal' data-target="#modalDesativar<?php echo $linhas['id_user']; ?>" type='button'><i class='fas fa-user-times'></i>
                        Desativar</button>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="modalDetalhes<?php echo $linhas['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detalhes do Usuario</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h6>Nome: <?php echo $linhas['nome']; ?> </h6>
                      <h6>Matricula: <?php echo $linhas['matricula']; ?> </h6>
                      <h6>CPF: <?php echo $linhas['cpf']; ?> </h6>
                      <h6>E-mail: <?php echo $linhas['email']; ?> </h6>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Edição-->
              <div class="modal fade" id="modalEditar<?php echo $linhas['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Usuario </br><?php echo $linhas['nome']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form name="formEditUser" method="POST" action="../actions/editaUsuario.php">
                        <input type="hidden" value="<?php echo $linhas['id_user']; ?>" name="idUsuario">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Email: </label>
                          <input type="text" class="form-control" id="recipient-name" name="email" value="<?php echo $linhas['email']; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modalDesativar<?php echo $linhas['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Desativar Usuario :<?php echo $linhas['nome']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form name="formEditUser" method="POST" action="../actions/desativaUsuario.php">
                        <div class="text-center">
                          <input type="hidden" name="id_user" value="<?php echo $linhas['id_user'];?>"> 
                          <button type="submit" class="btn btn-success">Sim</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>
            <!-- fechando o while PHP -->

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>

</body>

</html>