<?php
    require_once './DAO/UsuarioDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $nomeUsuario = trim($_POST['nomeUsuario']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $repSenha = trim($_POST['repSenha']);

        $objDAO = new UsuarioDAO();
        $ret = $objDAO->ValidarCadastro($nomeUsuario, $email, $senha, $repSenha);
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br/>
                <br/>
                <?php include_once '_msg.php'?>
                <h2>Controle Financeiro: Cadastro</h2>
                <h5>(Faça seu cadastro)</h5>
                <br/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Preencher todos os Campos:</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="cadastro.php" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Seu Nome" name="nomeUsuario" id="nomeUsuario" value="<?= isset($nomeUsuario) ? $nomeUsuario : '' ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Seu email" name="email" id="email" value="<?= isset($email) ? $email : '' ?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie uma Senha (mínimo 6 caracteres)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita a Senha" name="repSenha" id="repSenha" value="<?= isset($repSenha) ? $repSenha : '' ?>"/>
                            </div>
                            <button name="btnCadastrar" class="btn btn-success" onclick="return ValidarCadastro()">Cadastrar</button>
                        </form>
                        <hr />
                        <span>Já Possui Cadastro?</span> <a href="index.php">Clique aqui...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>