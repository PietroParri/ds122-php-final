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
    <title>Bloggers - Tela Inicial</title>
    <link rel="icon" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tela_inicial.css">
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
    <h1 class="display-1">Bloggers - Página Inicial</h1>
        <div id="div-70">
          <div id="div-30" class="primeirop">
              <img id="imagemdopietro" src="images/pietro.png"><br>Pietro Borges Parri<br>26/08/2001 (20 anos)<br>TADS - UFPR
          </div>
          Olá. Este é meu blog pessoal. Neste blog, eu falo sobre instrumentos musicais em geral,<br> e minha experiência com eles.
          Há 3 páginas neste blog. A tela inicial (principal), onde você está agora.<br> A segunda é sobre guitarra e a terceira é sobre
          violão. Você pode navegar por elas a qualquer momento usando os botões acima.<br>
          Além das minhas opiniões e impressões até agora, também disponibilizei<br> vídeos que relatam meu progresso.
          Divirta-se explorando, espero que consiga aprender coisas novas!
        </div>
    </div>
  </body>
</html>
