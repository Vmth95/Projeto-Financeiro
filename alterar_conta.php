<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

    require_once "./DAO/ContaDAO.php";
    $objDAO = new ContaDAO();

    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
        $idConta = $_GET['cod'];

        $dados = $objDAO->DetalharConta($idConta);

        // echo '<pre>';
        // var_dump($dados);
        // echo '</pre>';        

        if(count($dados)== 0){
            header('location : consultar_conta.php');
            exit;
        }
    }else if(isset($_POST['btn_salvar'])){
        $idConta = $_POST['cod'];
        $banco = trim($_POST['banco']);
        $agencia = trim($_POST['agencia']);
        $conta = trim($_POST['numero']);
        $saldo = trim($_POST['saldo']);

        $ret = $objDAO->AlterarConta($banco, $agencia, $conta, $saldo, $idConta);
        
        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    }else if(isset($_POST['btnExcluir'])){
        $idConta = $_POST['cod'];

        $ret = $objDAO->ExcluirConta($idConta);

        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    }else{
        header('location: consultar_conta.php');
        exit;
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar todas as suas Contas.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="alterar_conta.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta']; ?>">
                    <div class="form-group">
                        <label>Nome do Banco: </label>
                        <input class="form-control" placeholder="Digite o nome da banco..." name="banco" id="banco" value="<?= $dados[0]['banco_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Agêcia: </label>
                        <input class="form-control" placeholder="Digite a agência..." name="agencia" id="agencia" value="<?= $dados[0]['agencia_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Número da conta:</label>
                        <input class="form-control" placeholder="Digite o Número da conta..." name="numero" id="numero" value="<?= $dados[0]['numero_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Saldo da conta:</label>
                        <input class="form-control" placeholder="Digite o Saldo da conta..." name="saldo" id="saldo" value="<?= $dados[0]['saldo_conta'] ?>" />
                    </div>
                    <button class="btn btn-success btn-" name="btn_salvar" onclick="return ValidarConta()">Salvar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dimiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-tittle" id="myModalLabel">Confirmação de Exclusão!</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir sua conta Bancária: <b><?= $dados[0]['banco_conta'] ?>?</b></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dimiss="modal">Cancelar</button>
                                    <button type="subimit" name="btnExcluir" class="btn btn-primary">Sim</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>