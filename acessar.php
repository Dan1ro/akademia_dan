<?php
    include_once("class/usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de acesso</title>
</head>
<body>

<h1>Acesso</h1>

<form method="POST">

    <label>E-mail:</label>
    <input type="text" name="email" minlength="3" required><br><br>

    <label>Senha:</label>
    <input type="password" name="senha" minlength="3" required><br><br>

    <input type="submit" name="entrar" value="Entrar">

        <?php
            if (isset($_REQUEST["entrar"]))
            {
                $a = new Usuario();

            if ($a->autenticarUsuario($_REQUEST["email"], $_REQUEST["senha"]) == 0)
            {
                echo "<p>E-mail ou senha incorreto(s).</p>";                   
            }
            else {
                session_start();
                $_SESSION["nome"] = $a->getnome();
                header("Location: areaUser.php");
         }
     }

 ?>

</form>
    
</body>
</html>