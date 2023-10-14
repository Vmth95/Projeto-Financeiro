<?php

    // Se existir o ret na pagina em forma de variavel ou na URL do Browser (Navegador), sera identificado pelo arquivo _msg.php!
    // Este codigo, vai forçar a mensagem aparecer nas telas de Consulta da Aplicação.
    if(isset($_GET['ret'])){
        $ret = $_GET['ret'];
    }

    if(isset($ret)){
        switch($ret){
            case 1:
                echo '<div class="alert alert-success">Ação realizada com Sucesso!</div>';
            break;
            case 0:
                echo '<div class="alert alert-warning">Preencher todo(s) o(s) Campo(s) Obrigatório(s)!</div>';
            break;
            case -1:
                echo '<div class="alert alert-danger">Ocorreu um erro na operação, tente novamente mais tarde!</div>';
            break;
            case -2:
                echo '<div class="alert alert-warning">Senha deve ter entre 6 e 8 Caracteres!</div>';
            break;
            case -3:
                echo '<div class="alert alert-warning">O campo Senha e Repetir Senha, devem ser iguais!</div>';
            break;
            case -4:
                echo '<div class="alert alert-warning">Esta informação esta em uso, não podera ser exclusa!</div>';
            break;
        }
    }
    
?>