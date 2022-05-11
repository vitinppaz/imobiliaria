<?php
    require_once './controller/UsuarioController.php';
    require_once './controller/ImovelController.php';
?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <title>Cadastro de Usuários E Imóveis</title>
    
    
  </head>
  <body>
    <h1>Cadastro de Usuários E Imóveis!</h1>
    <link rel="stylesheet" href="https://bootswatch.com/5/cerulean/bootstrap.css">
    <a href="index.php?page=imovel">Imovel</a><br>
    <a href="index.php?page=usuario">Usuario</a><br>

    <?php
    if(isset($_GET["action"]) && (isset($_GET["page"])) && $_GET["page"] == "usuario"){
        if($_GET["action"] == "editar"){

            $usuario = call_user_func(array("UsuarioController","editar"), $_GET["id"]);
            require_once 'view/cadUsuario.php';
        }
        if($_GET["action"] == "listar"){
            require_once 'view/listUsuario.php';
        }
        
        if($_GET["action"] == "excluir"){

            $usuario = call_user_func(array("UsuarioController","excluir"), $_GET["id"]);
            require_once 'view/listUsuario.php';
        }
    }elseif((isset($_GET["page"])) && $_GET["page"] == "usuario"){
        require_once 'view/cadUsuario.php';
    }
    
?>

<?php
    if(isset($_GET["action"]) && (isset($_GET["page"])) && $_GET["page"] == "imovel"){
        if($_GET["action"] == "editar"){

            $imovel = call_user_func(array("ImovelController","editar"), $_GET["id"]);
            require_once 'view/cadImovel.php';
        }
        if($_GET["action"]  == "listar"){
            require_once 'view/listImovel.php';
        }
        
        if($_GET["action"] == "excluir"){

            $imovel = call_user_func(array("ImovelController","excluir"), $_GET["id"]);
            require_once 'view/listImovel.php';
        }
    }elseif((isset($_GET["page"])) && $_GET["page"] == "imovel"){
        
        
        require_once 'view/cadImovel.php';
    }
    
?>
 
 
</body>
</html>