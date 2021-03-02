<?php 
require_once '../config/connect.php';

//capturando as variavéis via POST
$local = $_POST['local'];
$desc = $_POST['descricao'];


//procedimento para a inserção:

    //query de inserção
    $queryInsere = mysqli_query($conn, "INSERT INTO equipamentos VALUES ('', '$desc', '$local')");

    if($queryInsere){
        echo "Show, cadastro do equiapmento ".$desc." realizado com sucesso!";
        echo "<meta http-equiv='refresh' content='3;url=\"../equipamentos/cad-equip.html\"' />";
    }else{
        echo "Erro ao cadastrar equipamento!";
        echo "<meta http-equiv='refresh' content='3;url=\"../equipamentos/cad-equip.html\"' />";
    }

?>