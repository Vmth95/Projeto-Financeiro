select * from tb_movimento where tipo_movimento = 1;

select * from tb_movimento where tipo_movimento = 2;

select nome_usuario, data_cadastro
	from tb_usuario
where nome_usuario like '%a%';

select nome_usuario, data_cadastro
	from tb_usuario
where nome_usuario like '%b%';

select nome_usuario, data_cadastro
	from tb_usuario
where nome_usuario like '%d%';

select * from tb_usuario where data_cadastro between '2020-01-01' and '2023-12-30';

select nome_usuario, nome_categoria
	from tb_usuario as US
inner join tb_categoria as CT
	on CT.id_usuario = US.id_usuario;
    
select nome_categoria, nome_usuario
	from tb_usuario as US
inner join tb_categoria as CT
	on CT.id_usuario = US.id_usuario;
    
select nome_usuario, email_usuario, banco_conta, numero_conta, saldo_conta
	from tb_usuario as US
inner join tb_conta as TC
	on tc.id_usuario = US.id_usuario;
    
select nome_usuario, nome_categoria, nome_empresa, tipo_movimento, data_movimento, valor_movimento
	from tb_usuario
inner join tb_categoria
	on tb_categoria.id_usuario = tb_usuario.id_usuario
inner join tb_empresa
	on tb_empresa.id_usuario = tb_usuario.id_usuario
inner join tb_movimento
	on tb_movimento.id_usuario = tb_usuario.id_usuario;
    
select nome_usuario, nome_categoria, nome_empresa, saldo_conta, tipo_movimento, data_movimento, valor_movimento
	from tb_usuario
inner join tb_categoria
	on tb_categoria.id_usuario = tb_usuario.id_usuario
inner join tb_empresa
	on tb_empresa.id_usuario = tb_usuario.id_usuario
inner join tb_conta
	on tb_empresa.id_usuario = tb_usuario.id_usuario
inner join tb_movimento
	on tb_movimento.id_usuario = tb_usuario.id_usuario;
    
select nome_usuario, email_usuario, senha_usuario, data_cadastro,nome_categoria,nome_empresa, telefone_empresa, endereco_empresa, banco_conta, agencia_conta, numero_conta, saldo_conta, tipo_movimento, data_movimento, valor_movimento, obs_movimento
	from tb_usuario
inner join tb_categoria
	on tb_categoria.id_usuario = tb_usuario.id_usuario
inner join tb_empresa
	on tb_empresa.id_usuario = tb_usuario.id_usuario
inner join tb_conta
	on tb_conta.id_usuario = tb_usuario.id_usuario
inner join tb_movimento
	on tb_movimento.id_usuario = tb_usuario.id_usuario;
    
select * from tb_usuario, tb_categoria, tb_empresa, tb_conta, tb_movimento;
    
     