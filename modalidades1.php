<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modalidades</title>
</head>
<body>
    
    <?php
    
    include_once("class/modalidades.php");

        $modalidade = new Modalidade();
        $lista = $modalidade->listarModalidades();

        

       if ($lista != 0 )
       {
        foreach($lista as $i)
        {

            $imagem = $i["imagem"];
            $titulo = $i["nome"];
            $descricao = $i["descricao"];

            echo "
            
                <div> 
                
                    <img src='$imagem'>
                    <p>'$titulo'</p>
                    <p>'$descricao'</p>
              
                </div>
            ";


       }
    }



    
    
    
    
    ?>

</body>
</html>