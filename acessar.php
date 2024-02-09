<?php
    include_once("class/usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap" rel="stylesheet">
    <title>Área de acesso</title>
</head>
<body>


    <header>
    <nav id="ancoras">
        <a href="index.php">Início</a>
        <a href>Modalidades</a>
        <a href>Planos</a>
        <a href>Eventos</a>
        <a href="acessar.php">Área Restrita</a>
    </nav>
        <div id="imagem1">
         <img src="imagens/logo.png" width="110" height="110">
        </div>

    </header>
    <section id="sessao_login">
<article id="login_usuario">
<h1>Área Restrita</h1>

<form method="POST">

    <label>E-mail:</label> <br>
    <input id="texto" type="text" name="email" minlength="3" placeholder="Informe seu e-mail de cadastro" required><br><br>

    <label>Senha:</label> <br>
    <input  id="texto" type="password" name="senha" placeholder="Informe sua senha" minlength="3" required><br><br>

    <input id="botao_acessar" type="submit" name="entrar" value="Entrar">

        <?php
            if (isset($_REQUEST["entrar"]))
            {
                $a = new Usuario();

                if ($a->autenticarUsuario($_REQUEST["email"], $_REQUEST["senha"]) == 0)
                {
                    echo "<p>E-mail ou senha incorreto(s).</p>";                   
                }
                else {
                    $cookieName = "nome";
                    $cookieValue = $a->getnome();
                    setcookie($cookieName, $cookieValue, time() + 86400, "/");
                    header("Location: areaUser.php");
                }
            }
 ?>

            <p>Esqueceu a senha? Clique aqui.</p>
            <p>Nao tem cadastro? Cadastre-se aqui.</p>
</form>

           
</article>
<article id="img_login">

            <img src="imagens/img_login.png" alt="">

</article>
            </section>
    
<footer>
    <div id="rodape">

        <p>Desenvolvido por Danilo,2023.</p>
        <p>Técnico em Informática - Senac Santos</p>

    </div>
    </footer> 
</body>
</html>