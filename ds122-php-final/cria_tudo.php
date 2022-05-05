<?php
include "credentials.php";
  //Criar conexão
  $conexao = mysqli_connect($servername,$usuario,$senha);
  //Checar conexão
  if(!$conexao){
  die("Problemas na conexão com o BD: " . mysqli_connect_error());
}

  //Criar database
  $sql = "CREATE DATABASE $dbname;";
  if (mysqli_query($conexao, $sql)) {
  echo "<br>Database criada com sucesso<br>";
}
else {
  echo "Erro criando database: " . mysqli_error($conexao);
}


 //Escolhe a database
$sql = "use $dbname;";
if (mysqli_query($conexao, $sql)) {
  echo "<br>Database mudada";
} else {
  echo "Erro: " . mysqli_error($conexao);
}
// SQL para criar tabela de usuários
$sql = "CREATE TABLE Guests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
usuario VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conexao, $sql)) {
  echo "<br>Tabela Guests criada!";
} else {
  echo "Erro: " . mysqli_error($conexao);
}

// SQL para criar tabela de comentários
$sql = "CREATE TABLE Comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
comment VARCHAR(250) NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conexao, $sql)) {
  echo "<br>Tabela Comments criada!";
} else {
  echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
