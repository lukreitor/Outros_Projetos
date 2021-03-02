<?php 
require_once '../config/connect.php';

//capturando as variavéis via POST
$idUsuario = $_POST['idUsuario'];
$email = $_POST['email'];

//procedimento para o UPDATE:

$atualizaUsuario = mysqli_query($conn, "UPDATE usuario SET email ='".$email."' WHERE id_user = '".$idUsuario."'; ") or die (mysqli_error($conn)); 

if($atualizaUsuario){
        echo "<h3>Dados atualizados com sucesso!</h3>";
        echo "<meta http-equiv='refresh' content='3;url=\"..\usuarios\gerenciauser.php\"' />";
    }else{
        echo "Erro ao atualizar dados!";
        echo "<meta http-equiv='refresh' content='3;url=\"..\usuarios\gerenciauser.php\"' />";
    }

?>