<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class UsuarioDAO extends Conexao{
        public function ValidarLogin($email, $senha){
            if($email == '' || $senha == ''){
                return 0;
            }else if(strlen($senha) < 6){
                return -2;
            }else{
                // return 1;

                $conexao = parent::retornarConexao();

                $comando_sql = 'select id_usuario, nome_usuario from tb_usuario where email_usuario = ? and senha_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);
                $sql->bindValue(2, $senha);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                // Guarda nesta variavel, o acesso com os dados do Usuário.
                $user = $sql->fetchAll();

                // Um retorno caso ele não encontre nenhum Usuário identificado no Array a cima, retornando uma mensagem.
                // Lembrano que só cai aqui, quando nada for encontrado referente ao Usuário.
                if(count($user) == 0){
                    return -6;
                }else{
                    //Caso encontre os dados de acesso do Usuário, esta variável armazena o seu ID.
                    $cod = $user[0]['id_usuario'];
                    $nome = $user[0]['nome_usuario'];

                    UtilDAO::CriarSessao($cod, $nome);
                    // Após a identificação do Usuário, a Sessão é construida e libera o acesso a aplicação.
                    header('location: tela_inicial.php');
                    exit;
                }
            }
        }

        public function ValidarCadastro($nome, $email, $senha, $repSenha){
            if($nome == '' || $email == '' || $senha == '' || $repSenha == ''){
                return 0;
            }else if(strlen($senha) < 6){
                return -2;
            }else if($senha != $repSenha){
                return -3;
            }else{

                // Aqui sera chamado a função de validar o E-mail, verificando se ja existe um cadastro ou não.
                // Desta forma, não será possivel realizar um cadastro com um E-mail ja existente na tb_usuario
                if($this->ValidarEmailDuplicadoCadastro($email) != 0){
                    return -5;
                }

                $conexao = parent::retornarConexao();

                $comando_sql = 'insert into tb_usuario(nome_usuario, email_usuario, senha_usuario, data_cadastro) values(?, ?, ?, ?);';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $senha);
                $sql->bindValue(4, date('Y-m-d'));

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function CarregarMeusDados(){
            $conexao = parent::retornarConexao();

            $comando_sql = 'select nome_usuario, email_usuario from tb_usuario where id_usuario = ?;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::UsuarioLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function GravarMeusDados($nome, $email){
            if($nome == '' || $email == ''){
                return 0;
            }else{
                
                if($this->ValidarEmailDuplicadoAlterar($email) != 0){
                    return -5;
                }

                $conexao = parent::retornarConexao();

                $comando_sql = 'update tb_usuario set nome_usuario = ?, email_usuario = ? where id_usuario = ?;';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, UtilDAO::UsuarioLogado());

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        // Esta função verifica se não existe um cadastro ja realizado, com os mesmos dados.
        public function ValidarEmailDuplicadoCadastro($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select count(email_usuario) as contar from tb_usuario where email_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                $contar = $sql->fetchAll();
                return $contar[0]['contar'];
            }
        }

        public function ValidarEmailDuplicadoAlterar($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select count(email_usuario) as contar from tb_usuario where email_usuario = ? and id_usuario != ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                $contar = $sql->fetchAll();
                return $contar[0]['contar'];
            }
        }        
    }

?>