-- Atualizar (Update)
update tb_categoria
	set nome_categoria = 'Internet'
where id_categoria = 2;

update tb_empresa
	set nome_empresa = 'Casas Bahia',
		telefone_empresa = '4333332222'
    where id_empresa = 1;