<div class="container">
    <form action="cadLogin" id="cadLogin" action="" method="post">
        <div class="card" style="top :40px; width: 50%;">
            <div class="card-header">
                <span class="card-title">Login</span>
            </div>
            <div class="card-body">                
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário</label>
                <input type="text" class="form-control com-sm-8" name="login" id="login"
                value=""/>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha</label>
                <input type="password" class="form-control com-sm-8" name="senha" id="senha"
                value=""/>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-sucess" name="btnLogar" id="btnLogar" value="Logar">
            </div>


    </div>
    </form>
</div>
<?php
    //verifica se o botão submit foi acionado
    if(isset($_POST['btnLogar'])){

        //chama uma função PHP que permite informar a classe e o método que será acionado
        $_SESSION['logado'] = call_user_func(array('UsuarioController' , 'logar'));
        //Armazena o usuario na SESSION
        $_SESSION['login'] = $_POST['login'];
        //redireciona para a index
        header('Location: index.php');
    }
?>