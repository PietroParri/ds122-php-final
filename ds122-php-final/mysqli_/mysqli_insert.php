<?php
require_once "conexao.php";

//Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Checar conexão
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Guests (firstname, lastname, usuario, email, password)
VALUES ('John', 'Doe', 'Johnny', 'john@example.com', 'senha')";


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error : " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
