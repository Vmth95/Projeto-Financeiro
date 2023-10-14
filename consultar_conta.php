<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

        require_once './DAO/ContaDAO.php';

        $objDao= new ContaDAO();
        $contas = $objDao->ConsultarConta();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>
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
                        <h2>Consultar Contas</h2>
                        <h5>Consulte todas as suas Contas aqui.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contas Cadastradas, caso deseja alterar. Clique no botão.
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Banco</th>
                                                <th>Agência</th>
                                                <th>Conta</th>
                                                <th>Saldo</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0; $i < count($contas); $i++){ ?>   
                                            <tr class="odd gradeX">
                                                <td><?= $contas[$i]['banco_conta'] ?></td>
                                                <td><?= $contas[$i]['agencia_conta'] ?></td>
                                                <td><?= $contas[$i]['numero_conta'] ?></td>
                                                <td><?= $contas[$i]['saldo_conta'] ?></td>
                                                <td>
                                                    <a href="alterar_conta.php?cod=<?= $contas[$i]['id_conta']?>" class="btn btn-warning btn-sm" >Alterar</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>