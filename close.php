<?php
if (isset($_COOKIE["nome"]))
    {
        unset($_COOKIE["nome"]);
        setcookie("nome", "", time() - 3600, "/");
    }

    header("Location: acessar.php");
?>