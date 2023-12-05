<?php
include("class/usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Area do Usuário</h1>

    <?php 
    
    if (isset($_COOKIE["nome"]))
    {
        echo "<p>Olá, " . $_COOKIE["nome"] . "</p>";
    }
    else {
        header("Location: acessar.php");
    }  

    ?>

<a href="acessar.php">Voltar</a>
<a href="close.php">Sair</a>
    
</body>
</html>