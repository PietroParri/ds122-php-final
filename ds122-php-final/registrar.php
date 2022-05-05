<!--tela de cadastro-->
<?php
  require_once "sanitize.php";
  require_once "conexao.php";

  $firstname = $lastname = $usuario = $email = $senha = "";
  $msg = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($firstname) || empty($lastname) || empty($usuario) || empty($email) || empty($senha)) {
      $error = true;
    }
    else{
      $firstname = mysqli_real_escape_string($conexao, sanitize($firstname));
      $lastname = mysqli_real_escape_string($conexao, sanitize($lastname));
      $usuario = mysqli_real_escape_string($conexao, sanitize($usuario));
      $email = mysqli_real_escape_string($conexao, sanitize($email));
      $senha = mysqli_real_escape_string($conexao, sanitize($senha));

      $sql = "INSERT INTO Guests (firstname, lastname, usuario, email, password)
      VALUES ('$firstname', '$lastname', '$usuario', '$email', '$senha')";

      if (!mysqli_query($conexao, $sql)) {
          die("Error: " . $sql . "<br>" . mysqli_error($conexao));
      }
      else {
        $firstname = $lastname = $usuario = $email = $senha = "";
      //  $msg = "Comentário salvo com sucesso!";
      }
    }
  }

  /*$sql = "SELECT id, name, comment FROM Comments";
  $comments = mysqli_query($conexao, $sql);

  if (!$comments) {
    die("Error: " . $sql . "<br>" . mysqli_error($conexao));
  }*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/registrar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/check_form.js"></script>
  </head>
  <body>
    <section class="hero is-sucess is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-4 is-offset-4">
              <div class="notification is-danger">
                <p>Cadastre-se</p>
              </div>
              <div class="box">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                  <div class="field">
                    <div class="control">
                      <input type="text" name="firstname" class="input is-large" value="<?= $firstname ?>" placeholder="Primeiro Nome"/><br><br>
                      <input type="text" name="lastname" class="input is-large" value="<?= $lastname ?>" placeholder="Sobrenome"/><br><br>
                      <input type="text" name="usuario" class="input is-large" value="<?= $usuario ?>" placeholder="Usuário (login)"/><br><br>
                      <input type="email" name="email" class="input is-large" value="<?= $email ?>" placeholder="E-mail"/><br><br>
                      <input type="password" name="senha" class="input is-large" value="<?= $senha ?>" placeholder="Senha"/><br><br>
                    </div>
                  </div>
                    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registrar</button><br>
                    <a href="index.php">Voltar à tela de login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
  </body>
</html>
