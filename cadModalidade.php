<?php 

include_once("class/modalidades.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Modalidade</title>
</head>
<body>

<form enctype="multipart/form-data"  method="POST">

    <label>Nome da modalidade:</label>
    <input type="text" name="nome" minlength="3" required><br><br>

    <label>Descrição:</label>
    <input type="text" name="descricao" minlength="3" required><br><br>
 
 
    Enviar esse arquivo: <input name="imagem" type="file" />
    <input type="submit" name="enviar" value="Enviar arquivo"/>

<?php
      
      include_once("class/modalidades.php");


      if ( isset($_REQUEST["enviar"]) )
      {

        $target_dir = "imagens/modalidades/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        //

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }

        $d = new Modalidade();
        $d->create($_REQUEST["nome"], $_REQUEST["descricao"],$target_file);
            
        $d->cadastrarmodalidade();

        echo "Modalidade cadastrada com sucesso.";
        
    }
?>

    </form>

    
</body>
</html>