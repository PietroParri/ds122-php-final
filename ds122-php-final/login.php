<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
  header('Location: index.php');
  exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//$query = "select usuario, usuario from guests where usuario = '{$usuario}' and password = md5('{$senha}')";

//$result = mysqli_query($conexao, $query);

//$row = mysqli_num_rows($result);


$sql = "SELECT * FROM guests WHERE usuario = '$usuario' and password = '$senha'";
$result = $conexao->query($sql);
if(mysqli_num_rows($result) < 1){
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('Location: index_error.php');
}
else{
  $_SESSION['usuario'] = $usuario;
  $_SESSION['senha'] = $senha;
  header('Location: tela_inicial.php');
}

/*
echo $row;exit;

if($row == 1) {
  $_SESSION['usuario'] = $usuario;
  header('Location: painel.php');
  exit();
} else {
  header('Location: index.php');
  exit();
}*/
mysqli_close($conexao);
?>
