<?php

    // Requerimento da Sessão Criada!==========
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();

    require_once './DAO/MovimentoDAO.php';

    $dao = new MovimentoDAO();

    $total_entrada = $dao->TotalEntrada();
    $total_saida = $dao->TotalSaida();
    $movs = $dao->MostrarUltimosLancamentos();

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
                        <h2>Página inicial</h2>
                        <h5>Aqui você poderá acompanhar seus números de uma maneira geral.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <div class="col-md-6 ">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_entrada[0]['Total'] != '' ? number_format($total_entrada[0]['Total'], 2, ',', '.') : 0 ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            <span>TOTAL DE ENTRADA</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_saida[0]['Total'] != '' ? number_format($total_saida[0]['Total'], 2, ',', '.') : 0 ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            <span>TOTAL DE SAIDA</span>
                        </div>
                    </div>
                </div>
                <hr>
                <?php if(count($movs)): ?>
                    <div class="row">
                        <div class="panel-heading">
                            <span>Ultimos 10 movimentos:</span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            <th>Categoria</th>
                                            <th>Empresa</th>
                                            <th>Conta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // O Motivo da Variável TOTAL, é somar todos os valores encontrados pelo ARRAY MOVS
                                        // Desta forma ele sempre ira somar os valores adicionadaos em cada posição do ARRAY
                                        $total = 0;
                                        for ($i = 0; $i < count($movs); $i++) {
                                            if ($movs[$i]['tipo_movimento'] == 1) {
                                                $total = $total + $movs[$i]['valor_movimento'];
                                            } else {
                                                $total = $total - $movs[$i]['valor_movimento'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                <td><?= $movs[$i]['data_movimento'] ?></td>
                                                <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                <td> Banco: <?= $movs[$i]['banco_conta'] ?> |Conta: <?= $movs[$i]['numero_conta'] ?> | Agência: <?= $movs[$i]['agencia_conta'] ?></td>
                                          
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div style="text-align: center;">
                                    <span style="color: <?= $total < 0 ? '#FF0000' : '#006400' ?>;"><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>