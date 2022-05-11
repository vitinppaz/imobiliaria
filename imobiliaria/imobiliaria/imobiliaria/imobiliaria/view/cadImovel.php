
    <form name="cadImovel" id="cadImovel" action="" method="post">
    <div class="form-group">
    <p> 
    <div style="width:300px;"  class="form-group">
      <label for="descricao">Descricao:</label>
      <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo isset($imovel)?$imovel->getDescricao():'' ?>" aria-describedby="descricao" placeholder="Digite a descrição">
      
    </div>
    </p>
    <p> 
    <div style="width:300px;" class="form-group">
      <label for="foto"> Foto:</label>
      <input type="text" class="form-control" id="foto" name="foto"  value="<?php echo isset($imovel)?$imovel->getFoto():'' ?>" aria-describedby="foto" placeholder="Insira o link da foto">
      
    </div>
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
        if(isset($_POST["btnSalvar"])){

            require_once "./controller/ImovelController.php";

            call_user_func(array("ImovelController","salvar"));

            header("location:index.php?page=imovel&action=listar");
        }

    ?>
