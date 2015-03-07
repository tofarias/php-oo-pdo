create database teste_selecao;
use teste_selecao;
-- tabelas da estrutura nova da loja
CREATE TABLE produtos_tamanhos (
id int(11) PRIMARY KEY,
id_produto_cor int(11),
id_tamanho int(11)
);

CREATE TABLE produtos_cores (
id int(11) PRIMARY KEY,
id_cor int(11),
id_produto int(11)
);

CREATE TABLE tamanhos (
titulo varchar(50),
id int(11) PRIMARY KEY
);

CREATE TABLE cores (
titulo varchar(50),
id int(11) PRIMARY KEY
);

CREATE TABLE Produtos (
titulo varchar(100),
id int(11) PRIMARY KEY,
codigo varchar(50)
);

ALTER TABLE produtos_tamanhos ADD FOREIGN KEY(Id_produto_cor) REFERENCES produtos_cores (Id);
ALTER TABLE produtos_tamanhos ADD FOREIGN KEY(id_tamanho) REFERENCES tamanhos (id);
ALTER TABLE produtos_cores ADD FOREIGN KEY(id_cor) REFERENCES cores (id);
ALTER TABLE produtos_cores ADD FOREIGN KEY(id_produto) REFERENCES Produtos (id);


-- tabela antigo do cliente
create table dados_antigos(
	codigo varchar(100),
	titulo varchar(100),
	cor varchar(50),
	tamanho varchar(50)
);

INSERT INTO dados_antigos (`codigo`, `titulo`, `cor`, `tamanho`) VALUES
('100', 'Sapato Verão 2014', 'Branco', '33'),
('100', 'Sapato Verão 2014', 'Branco', '34'),
('100', 'Sapato Verão 2014', 'Branco', '35'),
('100', 'Sapato Verão 2014', 'Azul', '33'),
('100', 'Sapato Verão 2014', 'Azul', '34'),
('100', 'Sapato Verão 2014', 'Azul', '35'),
('120', 'Tênis Nike', 'Preto', '36'),
('120', 'Tênis Nike', 'Preto', '37'),
('120', 'Tênis Nike', 'Preto', '38'),
('120', 'Tênis Nike', 'Vermelho', '36'),
('120', 'Tênis Nike', 'Vermelho', '37'),
('120', 'Tênis Nike', 'Vermelho', '38');

