<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

    require_once './DAO/EmpresaDAO.php';

    $objDAO = new EmpresaDAO();

    if(isset($_GET['cod']) && is_numeric($_GET['cod'])) {
        $idEmpresa = $_GET['cod'];

        $dados = $objDAO->DetalharEmpresa($idEmpresa);

        // echo '<pre>';
        // var_dump($dados);
        // echo '</pre>';

        if (count($dados) == 0) {
            header('location: consultar_empresa.php');
            exit;
        }
    }else if (isset($_POST['btn_salvar'])) {
        $idEmpresa = $_POST['cod'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereço'];

        $ret = $objDAO->AlterarEmpresa($nome, $telefone, $endereco, $idEmpresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    }else if(isset($_POST['btnExcluir'])) {
        $idEmpresa = $_POST['cod'];

        $ret = $objDAO->ExcluirEmpresa($idEmpresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    }else {
        header('location: consultar_empresa.php');
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
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá alterar suas empresas.</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr/>
                <form action="alterar_empresa.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Nome da empresa: </label>
                        <input class="form-control" placeholder="Digite o nome da empresa..." name="nome" id="nome" value="<?= $dados[0]['nome_empresa'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input class="form-control" placeholder="Digite o telefone da empresa... (opcional)" name="telefone" id="telefone" value="<?= $dados[0]['telefone_empresa'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Endereço: </label>
                        <input class="form-control" placeholder="Digite o endereço da empresa...(opcional)" name="endereço" id="endereço" value="<?= $dados[0]['endereco_empresa'] ?>"/>
                    </div>
                    <button class="btn btn-success btn-" name="btn_salvar" onclick="return ValidarEmpresa()">Salvar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão!</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a Empresa: <b><?= $dados[0]['nome_empresa'] ?>?</b></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btnExcluir" class="btn btn-primary">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>