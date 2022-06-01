<?php

require_once 'Banco.php';
require_once './Conexao.php';

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    
        public function save(){

            $result = false;
    
            $conexao = new Conexao();
    
            if($conn = $conexao->getConection()){
                if($this->id > 0){
    
                    $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo fotoTipo = :fotoTipo WHERE id = :id";
    
                    $stmt = $conn->prepare($query);
    
                    if ($stmt->execute(array(":descricao" => $this->descricao, ":foto" => $this->foto, ":valor" => $this->valor,":tipo"=> $this->tipo, ':fotoTipo' =>$this->fotoTipo, ":id"=> $this->id))) {
                        $result = $stmt->rowCount();
                    }
                }else{
    
                    $query = "insert into imovel (id, descricao, foto, valor, tipo) values (null,:descricao,:foto,:valor, :tipo, :fotoTipo)";
    
                    $stmt = $conn->prepare($query);
    
                    if ($stmt->execute(array(":descricao" => $this->descricao, ":foto" => $this->foto, ":valor" => $this->valor, ":tipo" => $this->tipo, ':fotoTipo' =>$this->fotoTipo))) {
                        $result = $stmt->rowCount();
                    }
                }  
            }
            return $result;
        }

    

    public function remove($id){
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de remocao
        $query = "DELETE FROM imovel WHERE id = :id";
        //prepara a query para execuxao
        $stmt =  $conn->prepare($query);
        //executa a query
        if($stmt->execute(array(':id'=> $id))){
            $result = true;
        }
        return $result;
    }


    

    public function find($id){
        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "SELECT * FROM imovel where id = :id";

        $stmt = $conn->prepare($query);

        if ($stmt->execute(array(":id"=> $id))) {

            if ($stmt->rowCount() > 0) {

                $result = $stmt->fetchObject(Imovel::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }
    

    public function listAll(){
        
        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "SELECT * FROM imovel";

        $stmt = $conn->prepare($query);

        $result = array();

        if($stmt->execute()){

            while ($rs = $stmt->fetchObject(Imovel::class)){

                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function count(){

    }
}
?>