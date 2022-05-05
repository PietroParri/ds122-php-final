<?php
    require_once "conexao.php";

  /*  //Escolhe a database
    $sql = "use $dbname;";

    if (mysqli_query($conexao, $sql)) {
        echo "<br>Database mudada";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
*/
    // SQL para criar tabela
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
        echo "<br>ok!";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

        mysqli_close($conexao);
    ?>
