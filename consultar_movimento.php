<?php
// Requerimento da Sessão criada!==============
require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
// ===========================================

require_once './DAO/MovimentoDAO.php';

$tipoMovimento = '';

if (isset($_POST['bntPesquisar'])) {
    $tipoMovimento = $_POST['tipo'];
    $dtInicial = $_POST['dtInicial'];
    $dtFinal = $_POST['dtFinal'];

    $objDAO = new MovimentoDAO();
    $movs = $objDAO->FiltrarMovimento($tipoMovimento, $dtInicial, $dtFinal);
} else if (isset($_POST['btnExcluir'])) {
    $idMovimento = trim($_POST['idMov']);
    $idConta = trim($_POST['idConta']);
    $tipoMovimento = $_POST['tipoMovimento'];
    $valor = trim($_POST['valor']);

    $objDAO = new MovimentoDAO();
    $ret = $objDAO->ExcluirMovimento($idMovimento, $idConta, $tipoMovimento, $valor);
}

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
                        <h2>Consultar Movimento</h2>
                        <h5>Consulte todos os movimentos em um determinado periodo.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form action="consultar_movimento.php" method="POST">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de Movimento </label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="0" <?= $tipoMovimento == 0 ? 'selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipoMovimento == 1 ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipoMovimento == 2 ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial: </label>
                            <input type="date" class="form-control" name="dtInicial" id="dtInicial" value="<?= isset($dtInicial) ? $dtInicial : '' ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final: </label>
                            <input type="date" class="form-control" name="dtFinal" id="dtFinal" value="<?= isset($dtFinal) ? $dtFinal : '' ?>" />
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <button class="btn btn-info" name="bntPesquisar" onclick="return ValidarMovimentoConsultar()">Pesquisar</button>
                    </div>
                </form>
                <hr>
                <?php if (isset($movs)) : ?>
                    <div class="row">
                        <div class="panel-heading">
                            <span>Aqui você pode visualizar todos os Movimentos financeiros realizados, se preferir, pode exclui-los:</span>
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
                                            <th>Ação</th>
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
                                                <td><?= $movs[$i]['numero_conta'] - $movs[$i]['agencia_conta'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                    <form action="consultar_movimento.php" method="POST">
                                                        <!-- Aqui será os inputs oculto, para armazenar os dados do Movimento -->
                                                        <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento'] ?>">
                                                        <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                        <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                        <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento'] ?>">
                                                        <!-- Fim. -->
                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Deseja excluir o Movimento:</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            <b>Data do Movimento: </b><?= $movs[$i]['data_movimento'] ?>?
                                                                            <br>
                                                                            <b>Tipo do Movimento: </b><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?>?
                                                                            <br>
                                                                            <b>Categoria: </b><?= $movs[$i]['nome_categoria'] ?>?
                                                                            <br>
                                                                            <b>Empresa: </b><?= $movs[$i]['nome_empresa'] ?>?
                                                                            <br>
                                                                            <b>Conta: </b><?= $movs[$i]['banco_conta'] ?> / <?= $movs[$i]['agencia_conta'] ?> - <?= $movs[$i]['numero_conta'] ?>?
                                                                            <br>
                                                                            <b>Valor: R$ </b><?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" name="btnExcluir" class="btn btn-primary">Sim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
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
</body>

</html>