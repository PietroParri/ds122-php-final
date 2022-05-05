<?php
    include "credentials.php";


    //Criar conexão
    $conexao = mysqli_connect($servername,$usuario,$senha);
    //Checar conexão
    if(!$conexao){
        die("Problemas na conexão com o BD: " . mysqli_connect_error());
    }

    //Criar database
    $sql = "CREATE DATABASE $dbname;";
    if (mysqli_query($conexao, $sql)) {
        echo "<br>Database criada com sucesso<br>";
    } else {
        echo "Erro criando database: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
?>
