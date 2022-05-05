<!-- -----------------fogo do doom--------------------- -->
<?php
require_once "conexao.php";
require_once "sanitize.php";
 $id = $_GET['id'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST["joao"])) {
     $comentario_novo = sanitize($_POST["joao"]);
     $comentario_novo = mysqli_real_escape_string($conexao, $comentario_novo);
     //$comentario_novo = "pudim com nao sei que la";
     $sql = "UPDATE comments
             SET comment='". $comentario_novo ."'
             WHERE id=". $id;
              $result = $conexao->query($sql);
              header('Location: bloggers.php');
   }
 }

 //header('Location: bloggers.php');
//Esse arquivo edita um comentário específico da tabela a partir do id recebido e recarrega a página
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Editar comentário</title>
  </head>
  <body>

    <form action="editar_comentario.php?id=<?= $id?>" method="post">
      <div class="form-group col-sm-5">
        <label>Edite seu comentário</label>
      <textarea class="form-control" name="joao" placeholder="Comentário..."></textarea>
    </div>
    <br>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <center>
      <div id="fireCanvas"></div>
    <script src="js/index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/editcomment.css">
  </body>
</html>
