<?php

class Usuario
{
    private $nome;
    private $email;
    private $dtNascimento;
    private $cidade;
    private $senha;

    public function __construct() {}

    public function create($_nome, $_email, $_dtNascimento, $_cidade, $_senha)
    {
         $this->nome = $_nome;
         $this->email = $_email;
         $this->dtNascimento = $_dtNascimento;
         $this->cidade = $_cidade;
         $this->senha = md5($_senha);
    }

public function inserirUsuario()
{
    include("db/conn.php");
    $sql = "CALL piUsuario(:nome, :email, :dtNascimento, :cidade, :senha)";

    $data = [

        'nome' => $this->nome,
        'email' => $this->email,
        'dtNascimento' => $this->dtNascimento,
        'cidade' => $this->cidade,
        'senha' => $this->senha
     
    ];

    $statement = $conn->prepare($sql);
    $statement->execute($data);

    return true;
}


public function getnome(){
    return $this->nome;
}


public function getemail(){
    return $this->email;
}

public function getdtNascimento(){
    return $this->dtNascimento;
}


public function getcidade(){
    return $this->cidade;
}


public function getsenha(){
    return $this->senha;
}

public function setnome($_nome)
{
    $this->nome = $_nome;
}

public function setemail($_email)
{
    $this->email = $_email;
}

public function setdtNascimento($_dtNascimento)
{
    $this->dtNascimento = $_dtNascimento;
}


public function setcidade($_cidade)
{
    $this->cidade = $_cidade;
}

public function setsenha($_senha)
{
    $this->senha = $_senha;
}

public function listaruser1()
{
    try{
    include_once("db/conn.php");

    $sql = "CALL psUsuario('')";
    $data = $conn->query($sql)->fetchAll();

    return $data;
    }
    catch (Exception $e)
    {
        return false;
    }
}

public function buscarUsuario($_id)
{
    try{
    include("db/conn.php");

    $sql = "CALL ps_Usuario2('$_id')";
    $data = $conn->query($sql)->fetchAll();

    foreach ($data as $item) {
        $this->nome = $item["nome"];
        $this->email = $item["email"];
        $this->dtNascimento = $item["dtNascimento"];
        $this->cidade = $item["cidade"];
        $this->senha = $item["senha"];
    }

    return true;
    }
    catch (Exception $e)
    {
        return false;
    }

}



public function atualizarUsuario($_id)
{
    try{
    include("db/conn.php");
    $sql = "CALL pu_Usuario(:id, :nome, :email, :dtNascimento, :cidade, :email)";

    $data = [

        'id' =>$_id,
        'nome' => $this->nome,
        'email' => $this->email,
        'dtNascimento' => $this->dtNascimento,
        'cidade' => $this->cidade,
        'email' => $this->email

    ];

    $statement = $conn->prepare($sql);
    $statement->execute($data);

    return true;
    }

    catch (Exception $e) {

        return false;
    }

}

public function DeleteUser($_id)
{

    try{
    include_once("db/conn.php");
    $sql = "CALL pdUsuario(:idUsuario)";

    $data = [

        'idUsuario'=>$_id

    ];

    $statement = $conn->prepare($sql);
    $statement->execute($data);

    return true;
}
    catch (Exception $e)
    {
        return false;
    }

}

public function autenticarUsuario($_email,$_senha) {

    try {
    include_once("db/conn.php");
    $sql = "CALL paUsuario('$_email','$_senha')";
    $stmt = $conn->prepare($sql);

    $stmt->execute(); 

    if ($user = $stmt->fetch()) 
    {
        $this->nome = $user["nome"];
        return 1;
    }
    else
    {
        return 0;
    }

}
    catch (Exception $e)
    {
        return false;
    }

}
}
?>