<?php 

    include_once("class/usuario.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
</head>
<body>

<?php 

    $u = new Usuario();
    $u->buscarUsuario($_GET["pid"]);

    echo"
    <form method='POST'>

    <label>Nome:</label>
    <input type='text' name='nome' minlength='3' value='" . $u->getnome() . "'required><br><br>

    <label>Email:</label>
    <input type='text' name='email' minlength='3' value='" . $u->getemail() . "' required><br><br>

    <label>Dt Nasc:</label>
    <input type='text' name='dtNascimento' minlength='3' value='" . $u->getdtNascimento() . "' required><br><br>

    <label>Cidade:</label>
    <input type='text' name='cidade' minlength='3' value='" . $u->getcidade() . "' required><br><br>

    <label>Senha:</label>
    <input type='text' name='senha' minlength='3' value='" . $u->getsenha() . "' required><br><br>

    <input type='submit' name='att' value='Atualizar'>

    ";

    if (isset($_REQUEST["att"]))
    {
       
        $u->setnome($_REQUEST["nome"]);
        $u->setemail($_REQUEST["email"]);
        $u->setdtNascimento($_REQUEST["dtNascimento"]);
        $u->setcidade($_REQUEST["cidade"]); 
        $u->setsenha($_REQUEST["senha"]); 
        
        echo $u->atualizarUsuario($_GET["pid"]) == true ?
         "<p>Usuario atualizado com sucesso.</p>" :
         "<p>Ocorreu um erro. Atualização não efetuada.</p>";
    }

?>

<a href="formUsuario.php">Voltar</a>

    </form>

    
</body>
</html>