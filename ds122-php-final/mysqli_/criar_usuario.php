<?php
require_once "conexao.php";

//Criar conexão
$conexao = mysqli_connect($servername, $usuario, $senha, $dbname);
//Checar conexão
if (!$conexao) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Guests (firstname, lastname, usuario, email, password)
VALUES ('zago', 'lucas', 'admin', 'kouketsu@kouketsu.com', 'admin')";


if (mysqli_query($conexao, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error : " . $sql . "<br>" . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
