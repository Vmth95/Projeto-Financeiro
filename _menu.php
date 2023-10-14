<?php 

    // Requerimento da Sessão Criada!==========
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ========================================

    if(isset($_GET['close']) && $_GET['close'] == '1'){
        UtilDAO::Deslogar();
    }

?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a href="meus_dados.php"><i class="fa fa-user fa-3x"></i>Meus Dados</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Categoria<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_categoria.php">Cadastrar Categoria</a>
                    </li>
                    <li>
                        <a href="Consultar_categoria.php">Consultar Categoria</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Empresa<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_empresa.php">Cadastrar Empresa</a>
                    </li>
                    <li>
                        <a href="Consultar_empresa.php">Consultar Empresa</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Conta<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_conta.php">Cadastrar Conta</a>
                    </li>
                    <li>
                        <a href="Consultar_conta.php">Consultar Conta</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Movimento<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="Realizar_movimento.php">Realizar Movimento</a>
                    </li>
                    <li>
                        <a href="Consultar_movimento.php">Consultar Movimento</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?close=1"><i class="fa fa-square-o fa-3x"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>