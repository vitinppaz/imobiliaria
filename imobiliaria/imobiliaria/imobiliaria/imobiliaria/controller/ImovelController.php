<?php
require_once 'model/Imovel.php';

class ImovelController{
    
    public static function salvar($fotoAtual = "", $fotoTipo=""){
        //cria um objeto do tipo Usuario
        $imovel = new Imovel;

        //trata a foto para ser armazenada no banco de dados
        $imagem = array();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
        }
        //verifica se o array imagem não está vazio, se tiver alguma imagem no mesmo
        //quer dizer que o usuário alterou a imagem ou está cadastrando um imovel novo
        if(!empty($imagem)){
            $imovel->setFoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
        }else{
            $imovel->setFoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
        }


        
        //armazena as informações do $_POST via set
        $imovel->setId($_POST["id"])    ;
        $imovel->setDescricao($_POST["descricao"]);
        $imovel->setValor($_POST["valor"]);
        $imovel->setTipo($_POST["tipo"]);

        //chama o método save para gravara as inforamações no banco de dados
        $imovel->save();
    }
    public static function listar(){

        $imoveis = new Imovel;

        return $imoveis->listAll();
    }
    public static function editar($id){

        $imovel = new Imovel;

        $imovel = $imovel->find($id);

        return $imovel;
    }

    public static function excluir($id)
    {

        //cria  um objeto  do tipo Imovel
        $imovel = new Imovel;

        $imovel = $imovel->remove($id);
    }
}
?>