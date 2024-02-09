<?php 

class Modalidade
{

    private $nome;
    private $descricao;
    private $imagem;

    public function __construct(){}

    public function create($_nome, $_descricao, $_imagem)
    {

        $this->nome = $_nome;
        $this->descricao = $_descricao;
        $this->imagem = $_imagem;

    }

    public function listarModalidades()
    {
        try{

            include("db/conn.php");

            $sql = "CALL psModalidades()";
            $data = $conn->query($sql)->fetchAll();

            return $data;

        }
        catch (Exception $e)
        {
            return false;
        }


    }

    public function cadastrarmodalidade()
    {

        include("db/conn.php");
        $sql = "CALL piModalidade(:nome, :descricao, :imagem)";
    
        $data = [
    
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'imagem' => $this->imagem,

        ];
    
        $statement = $conn->prepare($sql);
        $statement->execute($data);
    
        return true;

    }



}
?>