<?php
    // Requerimento da Sessão criada!==============
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ===========================================
    require_once './DAO/CategoriaDAO.php';

    $objDAO = new CategoriaDAO();

    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
        $idCategoria = $_GET['cod'];
        
        $dados = $objDAO->DetalharCategoria($idCategoria);

        if(count($dados) == 0){
            header('location: consultar_categoria.php');
            exit;
        }
    }else if(isset($_POST['btn_cadastrar'])){
        $idCategoria = $_POST['cod'];
        $nome = trim($_POST['nome']);

        $ret = $objDAO->AlterarCategoria($nome, $idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
        exit;
    }else if(isset($_POST['btn_excluir'])){
        $idCategoria = $_POST['cod'];

        $ret = $objDAO->ExcluirCategoria($idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
        exit;
    }else{
        header('location: consultar_categoria.php');
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
                        <h2>Alterar Categoria</h2>
                        <h5>Aqui você poderá alterar ou excluir suas categorias.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="alterar_categoria.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                    <div class="form-group">
                        <label>Nome da Categoria:</label>
                        <input class="form-control" placeholder="Digite o Nome da Categoria..." name="nome" id="nome" value="<?= $dados[0]['nome_categoria'] ?>"/>
                    </div>

                    <button name="btn_cadastrar" class="btn btn-success"  onclick="return ValidarCategoria()">Salvar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                    <!-- <button class="btn btn-danger" name="btn_excluir">Excluir</button> -->

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão!</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a Categoria: <b><?= $dados[0]['nome_categoria'] ?>?</b></span>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button name="btn_excluir" class="btn btn-primary">Sim</button>
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