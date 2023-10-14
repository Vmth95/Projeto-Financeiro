<?php
    require_once './DAO/UsuarioDAO.php';

    if (isset($_POST['btnAcessar'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $objDAO = new UsuarioDAO();
        $ret= $objDAO->ValidarLogin($email, $senha);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br/>
                <br/>
                <?php include_once '_msg.php' ?>
                <h2>CONTROLE FINANCEIRO: ACESSO</h2>
                <h5>( FAÇA SEU LOGIN )</h5>
                <br/>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>ENTRE COM SEUS DADOS</strong>
                    </div>
                    <br/>
                    <div class="panel-body">
                        <form action="index.php" method="post">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" placeholder="Digite seu E-mail aqui..." name="email" id="email" value="<?= isset($email) ? $email : '' ?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Digite sua Senha aqui..." name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>"/>
                            </div>
                            <button name="btnAcessar" class="btn btn-primary" onclick="return ValidarLogin()">Acessar</button>
                        </form>
                        <hr/>
                        <span>Caso não tenha cadastro?</span> <a href="cadastro.php">Clique aqui...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>