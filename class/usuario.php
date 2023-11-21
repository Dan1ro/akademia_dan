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
         $this->senha = $_senha;
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



public function listaruser1()
{
    include_once("db/conn.php");

    $sql = "CALL psUsuario('')";
    $data = $conn->query($sql)->fetchAll();

    return $data;
}

public function DeleteUser($_id)
{

    include_once("db/conn.php");
    $sql = "CALL pdUsuario(:idUsuario)";

    $data = [

        'idUsuario'=>$_id

    ];

    $statement = $conn->prepare($sql);
    $statement->execute($data);

    return true;

}





}
?>