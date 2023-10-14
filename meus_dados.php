<?php

    // Requerimento da Sessão Criada!==========
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ========================================

    require_once './DAO/UsuarioDAO.php';

    $objDAO = new UsuarioDAO();
    
    if(isset($_POST['btnSalvar'])){
        $nomeUsuario = trim($_POST['nomeUsuario']);
        $emailUsuario = trim($_POST['emailUsuario']);

        $ret = $objDAO->GravarMeusDados($nomeUsuario, $emailUsuario);
    }

    $dados = $objDAO->CarregarMeusDados();

    // echo '<pre>';
    // print_r($dados);
    // echo '</pre>';

    // echo '===============';

    // echo '<pre>';
    // var_dump($dados);
    // echo '</pre>';
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
                        <h2>Meus Dados.</h2>
                        <h5>Aqui você pode alterar seus dados de cadastro.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="meus_dados.php" method="POST">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input class="form-control" placeholder="Digiteu seu Nome aqui..." name="nomeUsuario" id="nomeUsuario" value="<?= $dados[0]['nome_usuario'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" placeholder="Digite seu E-mail aqui..." name="emailUsuario" id="emailUsuario" value="<?= $dados[0]['email_usuario'] ?>"/>
                    </div>
                    <button name="btnSalvar" class="btn btn-success" onclick="return MeusDados()">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>