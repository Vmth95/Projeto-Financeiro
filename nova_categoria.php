<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================

    require_once './DAO/CategoriaDAO.php';

    if (isset($_POST['btn_cadastrar'])) {
        $nome = trim($_POST['nome']);

        $objDAO = new CategoriaDAO();
        $ret = $objDAO->CadastrarCategoria($nome);
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
                        <h2>Cadastrar Categoria</h2>
                        <h5>Aqui você poderá cadastrar todas as suas Categorias.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form action="nova_categoria.php" method="POST">
                    <div class="form-group">
                        <label>Nome da Categoria:</label>
                        <input class="form-control" placeholder="Digite o nome da categoria. Exemplo conta de luz" name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>" />
                    </div>
                    <button name="btn_cadastrar" class="btn btn-success btn-lg" onclick="return ValidarCategoria()">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>