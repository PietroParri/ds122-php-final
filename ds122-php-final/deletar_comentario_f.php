<?php
require_once "conexao.php";

$id = $_GET['id'];
$sqlSelect = "DELETE FROM comments WHERE id=$id";
$result = $conexao->query($sqlSelect);
header('Location: bloggers.php');
//Esse arquivo deleta um comentário específico da tabela a partir do id recebido e recarrega a página
?>
