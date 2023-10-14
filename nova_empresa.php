<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

    require_once './DAO/EmpresaDAO.php';

    if (isset($_POST['btn_cadastrar'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereço = $_POST['endereço'];
        $objDAO = new EmpresaDAO();
        $ret = $objDAO->CadastrarEmpresa($nome, $telefone, $endereço);
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
                        <h2>Cadastrar Empresa</h2>
                        <h5>Aqui você poderá cadastrar todas as suas empresas.</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr />
                <form action="nova_empresa.php" method="post">
                    <div class="form-group">
                        <label>Nome da empresa: </label>
                        <input class="form-control" placeholder="Digite o nome da empresa..." name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telefone: </label>
                        <input class="form-control" placeholder="Digite o telefone da empresa... (opcional)" name="telefone" id="telefone" value="<?= isset($telefone) ? $telefone : '' ?>" />
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa...(opcional)" name="endereço" id="endereço" value="<?= isset($endereço) ? $endereço : '' ?>" />
                    </div>
                    <button class="btn btn-success btn-lg" name="btn_cadastrar" onclick="return ValidarEmpresa()">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>