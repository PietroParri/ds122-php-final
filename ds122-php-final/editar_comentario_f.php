<?php
require_once "conexao.php";
require_once "sanitize.php";
 $id = $_GET['id'];
 if ($_SERVER["REQUEST_METHOD"] == "GET") {
   if (isset($_POST["joao"])) {
     $comentario_novo = sanitize($_POST["joao"]);
     $comentario_novo = mysqli_real_escape_string($conexao, $comentario_novo);
     //$comentario_novo = "pudim com nao sei que la";
     $sql = "UPDATE comments
             SET comment='". $comentario_novo ."'
             WHERE id=". $id;
     $result = $conexao->query($sql);
   }
 }

 //header('Location: bloggers.php');
//Esse arquivo edita um comentário específico da tabela a partir do id recebido e recarrega a página
?>
