<?php
    include_once("class/usuario.php");
    $u = new Usuario();

    $u->DeleteUser($_GET["pid"]);
    echo "Usuario excluído";
?>

<a href="formUsuario.php">Voltar</a>