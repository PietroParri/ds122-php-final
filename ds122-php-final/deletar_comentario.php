<?php
require_once "conexao.php";
require_once "sanitize.php";

//Criar conexão
$conexao = mysqli_connect($servername, $usuario, $senha, $dbname);
//Checar conexão
if (!$conexao) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, comment From comments";
$comments = mysqli_query($conexao, $sql);
$comment = mysqli_fetch_assoc($comments);
$id = $comment['id'];

$sql = "DELETE FROM comments
        WHERE id=" . $id;

if (mysqli_query($conexao, $sql)) {
  echo "Comentario deletado!";
} else {
  echo "Error : " . $sql . "<br>" . mysqli_error($conexao);
}

mysqli_close($conexao);
//Esse arquivo deleta o último comentário da tabela (para deletar um comentário com ID específico,
//basta comentar as linhas (12,13,14,15) e colocar o id desejado na linha 18.)
?>
