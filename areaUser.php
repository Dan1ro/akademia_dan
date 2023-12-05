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
    
        session_start();
        echo "<p>Bem vindo, " . $_SESSION["nome"] .  ".</p>";
    
    ?>

<a href="acessar.php">Voltar</a>
    
</body>
</html>