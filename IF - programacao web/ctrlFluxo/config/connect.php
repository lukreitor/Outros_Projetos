<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "bdctrlfluxo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $bd);

// Check connection
if (!$conn) {
  die("Falha na conexão ERRO: " . mysqli_connect_error());
}
//echo "Conectado com Sucesso!!";

date_default_timezone_set("Brazil/East");
?>