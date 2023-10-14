<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

    require_once './DAO/ContaDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $banco = trim($_POST['banco']);
        $agencia = trim($_POST['agencia']);
        $numero = trim($_POST['numero']);
        $saldo = trim($_POST['saldo']);

        $objDAO = new ContaDAO();
        $ret = $objDAO->CadastrarConta($banco, $agencia, $numero, $saldo);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php' ?>
<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cadastrar Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas Contas.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="nova_conta.php" method="POST">
                    <div class="form-group">
                        <label>Nome do Banco:</label>
                        <input class="form-control" placeholder="Digite o nome da banco..." name="banco" id="banco" value="<?= isset($banco) ? $banco : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Agêcia:</label>
                        <input class="form-control" placeholder="Digite a agência..." name="agencia" id="agencia" value="<?= isset($agencia) ? $agencia : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Número da conta:</label>
                        <input class="form-control" placeholder="Digite o Número da conta..." name="numero" id="numero" value="<?= isset($numero) ? $numero : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Saldo da conta:</label>
                        <input class="form-control" placeholder="Digite o Saldo da conta..." name="saldo" id="saldo" value="<?= isset($saldo) ? $saldo : '' ?>"/>
                    </div>
                    <button class="btn btn-success btn" name="btnCadastrar" onclick="return ValidarConta()">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>