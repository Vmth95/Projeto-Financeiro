// Validação da tela Index (login). ============= 
function ValidarLogin(){
    if ($("#email").val().trim() == ''){
        alert("Preencher o Campo E-mail!");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == ''){
        alert("Preencher o Campo Senha!");
        $("#senha").focus();
        return false;
    }
}

// Validação de tela Meus Dados. ==============
function MeusDados(){
    if ($("#nome").val().trim() == ''){
        alert("Preencher o Campo Nome!");
        $("#nome").focus();
        return false;
    }

    if ($("#email").val().trim() == ''){
        alert("Preencher o Campo E-mail!");
        $("#email").focus();
        return false;
    }
}

// Validação de tela Cadastro. ==============
function ValidarCadastro(){
    if ($("#nomeUsuario").val().trim() == ''){
        alert("Preencher o Campo Nome!");
        $("#nomeUsuario").focus();
        return false;
    }
   
    if ($("#email").val().trim() == ''){
        alert("Preencher o Campo E-mail!");
        $("#email").focus();
        return false;
    }
  
    if ($("#senha").val().trim() == ''){
        alert("Preencher o Campo Senha!");
        $("#senha").focus();
        return false;
    }

    if($("#senha").val().trim().length < 6){
        alert("A Senha deverá conter no mínimo, 6 caracteres!");
        $("#senha").focus();
        return false;
    }   
   
    if ($("#repSenha").val().trim() == ''){
        alert("Preencher o Campo Senha!");
        $("#repSenha").focus();
        return false;
    }
   
    if ($("#senha").val().trim() != $("#repSenha").val().trim()){
        alert("O Campo Senha deve ser igual ao Repetir Senha!");
        $("#repSenha").focus();
        return false;
    }
}

// Validar Categoria. =============
function ValidarCategoria(){
    if ($("#nome").val().trim() == ''){
        alert("Preencher o Campo Nome da Categoria!");
        $("#nome").focus();
        return false;
    }
}

// Validar Empresa. =============
function ValidarEmpresa(){
    if ($("#nome").val().trim() == ''){
        alert("Preencher o Campo Nome da Empresa!");
        $("#nome").focus();
        return false;
    }

    if ($("#telefone").val().trim() == ''){
        alert("Preencher o Campo Telefone!");
        $("#telefone").focus();
        return false;
    }

    if ($("#endereço").val().trim() == ''){
        alert("Preencher o Campo Endereço!");
        $("#endereço").focus();
        return false;
    }
}

// Validar Conta. ============
function ValidarConta(){
    if ($("#banco").val().trim() == ''){
        alert("Preencher o Campo Nome do Banco!");
        $("#banco").focus();
        return false;
    }

    if ($("#agencia").val().trim() == ''){
        alert("Preencher o Campo Agência!");
        $("#agencia").focus();
        return false;
    }

    if ($("#numero").val().trim() == ''){
        alert("Preencher o Campo Número da Conta!");
        $("#numero").focus();
        return false;
    }

    if ($("#saldo").val().trim() == ''){
        alert("Preencher o Campo Saldo!");
        $("#saldo").focus();
        return false;
    }
}

// Validar Movimento. ==============
function ValidarMovimento(){
    if ($("#tipoMovimento").val().trim() == ''){
        alert("Selecione o Tipo do Movimento!");
        $("#tipoMovimento").focus();
        return false;
    }

    if ($("#data").val().trim() == ''){
        alert("Selecione uma Data!");
        $("#data").focus();
        return false;
    }

    if ($("#valor").val().trim() == ''){
        alert("Preencher o Campo Valor!");
        $("#valor").focus();
        return false;
    }

    if ($("#categoria").val().trim() == ''){
        alert("Selecione uma Categoria!");
        $("#categoria").focus();
        return false;
    }

    if ($("#empresa").val().trim() == ''){
        alert("Selecione uma Empresa!");
        $("#empresa").focus();
        return false;
    }
    
    if ($("#conta").val().trim() == ''){
        alert("Selecione uma Conta!");
        $("#conta").focus();
        return false;
    }    
}

function ValidarMovimentoConsultar(){
    if ($("#tipo").val().trim() == ''){
        alert("Selecione o Tipo do Movimento!");
        $("#tipo").focus();
        return false;
    }

    if ($("#dtInicial").val().trim() == ''){
        alert("Selecione uma Data de Início!");
        $("#dtInicial").focus();
        return false;
    }

    if ($("#dtFinal").val().trim() == ''){
        alert("Selecione uma Data Final!");
        $("#dtFinal").focus();
        return false;
    }
}