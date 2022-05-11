

    
    <form  name="cadUsuario" id="cadUsuario" action="" method="post">
    <p> 
    <div style="width:300px;"  class="form-group">
      <label for="descricao">Login:</label>
      <input type="text" class="form-control" name="login" id="login" value="<?php echo isset($usuario)?$usuario->getLogin():'' ?>" aria-describedby="login" placeholder="">
      
    </div>
    </p>
    <p> 
    <div style="width:300px;"  class="form-group">
      <label for="descricao">Senha:</label>
      <input type="password" class="form-control" name="senha" id="senha" value="<?php echo isset($usuario)?$usuario->getSenha():'' ?>" aria-describedby="senha" placeholder="">
      
    </div>
    </p>

    <div style="width:300px;"  class="form-group">
      <label for="descricao">Confirmação da Senha:</label>
      <input type="password" class="form-control" name="senha2" id="senha2" value="<?php echo isset($usuario)?$usuario->getId():'' ?>" aria-describedby="senha2" placeholder="">
      
    </div>
    </p>

    <p> 
    <div  style="width:300px;"  class="form-group">
      <label for="tipo">Tipo:</label>
      <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():''; ?>" />
      <select class="form-select" name="permissao" id="permissao">
      <option value="0"></option>
      <option value="A"<?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':''?>>Administrador</option>
      <option value="C"<?php echo isset($usuario) && $usuario->getPermissao()=='C'?'selected':''?>>Comum</option>
    
        
      </select>
    </div> 
    </p>    
    <input type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-outline-primary">
    </form>

    <?php
        if(isset($_POST["btnSalvar"])){

            require_once "./controller/UsuarioController.php";

            call_user_func(array("UsuarioController","salvar"));

            header("location:index.php?page=usuario&action=listar");
        }
    ?>

