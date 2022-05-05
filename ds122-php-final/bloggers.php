<!--o blog em si, após ter feito login-->
<?php
  require_once "sanitize.php";
  require_once "conexao.php";
  session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: login.php');
    }
  $logado = $_SESSION['usuario'];

  $form_comment = "";
  $msg = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_comment = $_POST['form_comment'];

    if (empty($form_comment)) {
      $error = true;
    }
    else{
      $comment = mysqli_real_escape_string($conexao, sanitize($form_comment));

      $sql = "INSERT INTO Comments (name, comment)
      VALUES ('$logado', '$comment')";

      if (!mysqli_query($conexao, $sql)) {
          die("Error: " . $sql . "<br>" . mysqli_error($conexao));
      }
      else {
        $form_comment = "";
        $msg = "Comentário salvo com sucesso!";
      }
    }
  }

  $sql = "SELECT id, name, comment FROM Comments";
  $comments = mysqli_query($conexao, $sql);


  if (!$comments) {
    die("Error: " . $sql . "<br>" . mysqli_error($conexao));
  }

?>
<!---------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bloggers</title>
    <link rel="icon" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bloggers.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="tela_inicial.php">Bloggers</a>
        <?php echo "<h1 class='bemvindo'>Bem vindo <u>$logado</u></h1>"; ?>
        <span class="navbar-toogle-icon"></span>
      </div>
      <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
      </div>
    </nav>
    <div class="btn btn-dark">
      <a href="tela_inicial.php">Pág. 1</a>
    </div>
    <div class="btn btn-dark">
      <a href="bloggers.php">Pág. 2</a>
    </div>
    <div class="btn btn-dark">
      <a href="bloggers_pag2.php">Pág. 3</a>
    </div>
    <div class="alinhamento">
      <h1 class="display-1">Bloggers - Guitarra</h1>
        <div id="div-70" class="video-principal">
          <iframe width="1250" height="670" src="https://www.youtube.com/embed/JO6ZNWB2BwQ"
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
            clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          </iframe>
        </div>
        <div id="div-30" class="primeirop"><br>
          Neste vídeo, eu retrato minha melhora, tanto com guitarra<br> quanto com violão, no passar de 1 mês. Aprendi várias coisas novas,
          como a música Hurt do Johnny Cash, comecei a praticar pentatônicas, powerchords, etc.<br><br><br><br>
          <p>
          <div class="ultimop">
            <img id="imagemdopietro" src="images/pietro.png"><br>Pietro Borges Parri<br>26/08/2001 (20 anos)<br>TADS - UFPR
          </div>
          <div class="ultimop2">
            Olá. Este é meu blog pessoal. Neste blog, eu falo sobre instrumentos musicais em geral, e minha experiência com eles.
            Há 3 páginas neste blog. A tela inicial (principal), onde você está agora. A segunda é sobre guitarra e a terceira é sobre
            violão. Você pode navegar por elas a qualquer momento usando os botões acima.
            Além das minhas opiniões e impressões até agora, também disponibilizei vídeos que relatam meu progresso.
            Divirta-se explorando, espero que consiga aprender coisas novas!
          </p>
          </div>
        </div>
    <hr>
    <div class="comments">
      <h2>Comentários</h2>

        <?php if (!empty($msg)): ?>
        <?= $msg ?>
        <?php endif; ?>

        <?php if (mysqli_num_rows($comments) > 0): ?>
        <?php while($comment = mysqli_fetch_assoc($comments)): ?>
            <div class="comment" id="comment_<?= $comment['id'] ?>">
            <h4>De: <?= $comment['name'] ?></h4>
            <h5>ID: <?= $comment['id'];?></h5>
            <?=  $comment['name']?> disse:
            <?php echo $comment['comment']?>
            </div>
          <a class='btn btn-warning' href='editar_comentario.php?id=<?= $comment['id']?>'>Editar comentário
          </a>
          <a class='btn btn-danger' href='deletar_comentario_f.php?id=<?= $comment['id']?>'>Deletar comentário
          </a><br><br>
        <?php endWhile; ?>
        <?php else: ?>
        Nenhum comentário enviado.
        <?php endIF; ?>

      <hr>
      <h3>Novo comentário</h3>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group col-sm-5">
        <textarea class="form-control" name="form_comment" rows="8" id="botaoenviar" cols="80" placeholder="Seu comentário"><?= $form_comment ?></textarea><br>
        </div>
        <input class="btn btn-success" id="botaoenviar" type="submit" name="submit" value="Enviar">
      </form>
    </div>
  </div>
  </body>
</html>
