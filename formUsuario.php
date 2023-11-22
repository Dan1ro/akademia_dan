<?php
    include_once("class/usuario.php");
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="ReplicaSiteFigma/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>

    <title>Cadastrar</title>
</head>
<body>
        <h1>Cadastrar Usuario</h1>

        <h2>Novo usuario</h2>

        <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" minlength="3" required><br><br>

        <label>Email:</label>
        <input type="text" name="email" minlength="3" required><br><br>

        <label>Dt Nasc:</label>
        <input type="text" name="dtNascimento" minlength="3" required><br><br>

        <label>Cidade:</label>
        <input type="text" name="cidade" minlength="3" required><br><br>

        <label>Senha:</label>
        <input type="text" name="senha" minlength="3" required><br><br>

        <input type="submit" name="inserir" value="Cadastrar">

        <?php 
        
        
        if ( isset($_REQUEST["inserir"]) )
        {
            $p = new Usuario();
            $p->create($_REQUEST["nome"], $_REQUEST["email"], $_REQUEST["dtNascimento"], $_REQUEST["cidade"], $_REQUEST["senha"]); 
            
            echo $p->inserirUsuario() == true ? "<p>Usuario Cadastrado com sucesso.</p>" :"<p>Ocorreu um erro. Usuario não cadastrado.</p>";
        }
        
        ?>

    </form>

    
    
    <?php

        include_once("class/usuario.php");

        $u = new Usuario();
        $listarusuario = $u->listaruser1();

        echo "<table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Dt.Nasc</th>
            <th>Cidade</th>
            <th>Senha</th>
        </tr>";

        foreach ($listarusuario as $item) {
            echo "
            <tr>
            <td> " . $item["nome"] . "</td>
            <td> " . $item["email"] . "</td>
            <td> " . $item["dtNascimento"] . "</td>
            <td> " . $item["cidade"] . "</td>
            <td> " . $item["senha"] . "</td>
            <td> <a href='excluirUsuario.php?pid=" . $item["idUsuario"] .  "'onClick='return confirmar()'>Excluir<a/> </td>
             </tr>";

        }
        
        echo "</table>";
    
    ?>
   

</body>
</html>

