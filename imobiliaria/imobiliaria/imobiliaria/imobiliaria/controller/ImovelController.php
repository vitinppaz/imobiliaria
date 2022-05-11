<?php
require_once 'model/Imovel.php';

class ImovelController{
    
    public static function salvar(){

        $imovel = new Imovel;

        $imovel->setDescricao($_POST["descricao"]);
        $imovel->setFoto($_POST["foto"]);
        $imovel->setValor($_POST["valor"]);
        $imovel->setTipo($_POST["tipo"]);

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