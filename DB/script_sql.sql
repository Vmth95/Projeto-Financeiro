-- drop database test;
-- Script SQL de Consulta.
select * from tb_usuario;

select * from tb_categoria;

select * from tb_empresa;

select * from tb_conta;

select * from tb_movimento;


-- Script de Cadastro.
insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_usuario)
values
('Ana Maria', 'ana.maria@gmail.com', 'ana321', '2023-04-20');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Financiamento', 1);
