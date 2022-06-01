
    <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <p> 
    <div style="width:300px;"  class="form-group">
      <label for="descricao">Descricao:</label>
      <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo isset($imovel)?$imovel->getDescricao():'' ?>" aria-describedby="descricao" placeholder="Digite a descrição">
      
    </div>
    </p>
    <p> 
    <div style="width:300px;" class="form-group">
      <label class="col-sm-2 col-form-label text-right" for="foto"> Foto:</label>
      <input type="file" class="form-control col-sm-8" id="foto" name="foto"/>

      
    </div>
    <?php
      if(isset($imovel) && !empty($imovel->getFoto())){
    ?>  
    <div class="form-group form-row">
      <div class="text-center">
        <img class="img-thumbnail" style="widht: 25%;"
         src="data:<?php echo $imovel->getFotoTipo();?>;base64,<?php echo base64_encode($imovel->getFoto())?>">
      </div>
    </div>
    <?php
      }
    ?>
    </p>
    </div>
    <p> 
    <div style="width:300px;" class="form-group">
      <label for="valor"> Valor:</label>
      <input type="number" class="form-control" id="valor" name="valor"  value="<?php echo isset($imovel)?$imovel->getId():'' ?>" aria-describedby="foto" placeholder="Insira o valor">
      
    </div>
    </p>  
    <p> 
    <div  style="width:300px;"  class="form-group">
      <label for="tipo">Tipo:</label>
      <select class="form-select" name="tipo" id="tipo">
        <option value="0"></option>
        <option value="A">Apartamento</option>
        <option value="C">Casa</option>
        <option value="T">Terreno</option>
        
      </select>
    </div> 
    </p>  
    <p>  
        <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-outline-primary">
    </p>  
    </form>

    <?php
    //verifica se o botão salvar submit foi acionado
        if(isset($_POST["btnSalvar"])){

          //chama uma função PHP que permite informar a classe e o método que será acionado

          if(isset($imovel)){
            call_user_func(array('ImovelController', 'salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
          }else{
            call_user_func(array('ImovelController', 'salvar'));
          }


           

            header("location:index.php?page=imovel&action=listar");
        }

    ?>
