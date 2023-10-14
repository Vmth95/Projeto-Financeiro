-- Exclusão (Delete)

-- drop database dbqui19h;

-- drop table tb_usuario;

delete from tb_categoria
	where id_categoria = 3;

delete from tb_categoria
	where id_categoria
in (4,5);    