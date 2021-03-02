<?php 
require_once '../config/connect.php';

//capturando as variavéis via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$matricula = $_POST['matricula'];
$tipoUsuario = $_POST['opcao'];
$senha = $_POST['senha'];
$status = "ativo";

//procedimento para a inserção:

//verificação se há um cpf igual na tabela
$valida = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$cpf'"); 
if(mysqli_num_rows($valida) == 0){
    //query de inserção
    $queryInsere = mysqli_query($conn, "INSERT INTO 
    usuario VALUES
    (' ', '$nome', '$matricula', 
    '$cpf', '$email', 
    '".md5($senha)."', '$tipoUsuario', '$status')");

    if($queryInsere){
        echo "Show, cadastro do usuario ".$nome." realizado com sucesso!";
        echo "<meta http-equiv='refresh' content='3;url=\"..\usuarios\cad-user.html\"' />";
    }else{
        echo "Erro ao cadastrar usuario!";
        echo "<meta http-equiv='refresh' content='3;url=\"..\usuarios\cad-user.html\"' />";
    }

}else{

    echo "CPF Duplicado!";
    echo "<meta http-equiv='refresh' content='3;url=\"..\usuarios\cad-user.html\"' />";

}

?>