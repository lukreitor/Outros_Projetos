<?php 
require_once '../config/connect.php';

//capturando as variavéis via POST
$login = $_POST['cpf'];
$senha = $_POST['senha'];

//procedimento para o LOGIN:

$BuscarUsuario = mysqli_query($conn, "SELECT * FROM  usuario where cpf = '".$login."' and senha = '".md5($senha)."' and situacao = 'ativo' ;")
or die(mysqli_error($conn));

$user = mysqli_fetch_array($BuscarUsuario);

if(mysqli_num_rows($BuscarUsuario) == 1){
    
session_start();

$_SESSION['nome'] = $user['nome'];

header('location: ../menu.php');
       
}else{
    echo  "<h3>Usuario ou senha invalida! </h3>";
    echo "<meta http-equiv='refresh' content='2;url=\"..\index.html\"' />";
}

?>