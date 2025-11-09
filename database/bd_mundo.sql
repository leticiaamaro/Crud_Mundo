-- Criação do banco de dados
Create database  bd_mundo;
use bd_mundo;

-- Criação de tabelas
create table paises (
    id_pais int primary key auto_increment,
    nome varchar(100) not null,
    continente varchar(50) not null,
    codigo_pais char(3) not null,
    populacao int not null,
    idioma varchar(50) not null
);

create table cidades (
    id_cidade int primary key auto_increment,
    nome varchar(100) not null,
    populacao int not null,
    id_pais int not null,
    foreign key (id_pais) references paises(id_pais)
);

-- Inserindo países na tabela 'paises'
insert into paises (nome, continente, codigo_pais, populacao, idioma) values
	-- América do Sul
	('Brasil', 'América do Sul', '76', 214000000, 'Português'),
	-- América do Norte
	('Canadá', 'América do Norte', '124', 39000000, 'Inglês'),
	-- Europa
	('Alemanha', 'Europa', '276', 84000000, 'Alemão'),
	-- África
	('Egito', 'África', '818', 110000000, 'Árabe'),
	-- Ásia
	('Japão', 'Ásia', '392', 125000000, 'Japonês'),
	-- Oceania
	('Austrália', 'Oceania', '36', 26000000, 'Inglês');
    
-- Brasil (id_pais = 1)
insert into cidades (nome, populacao, id_pais) values
('São Paulo', 12300000, 1),
('Rio de Janeiro', 6700000, 1),
('Brasília', 3100000, 1),
('Salvador', 2900000, 1),
('Fortaleza', 2700000, 1);

-- Canadá (id_pais = 2)
insert into cidades (nome, populacao, id_pais) values
('Toronto', 2800000, 2),
('Montreal', 1800000, 2),
('Vancouver', 675000, 2),
('Calgary', 1300000, 2),
('Ottawa', 1000000, 2);

-- Alemanha (id_pais = 3)
insert into cidades (nome, populacao, id_pais) values
('Berlim', 3800000, 3),
('Hamburgo', 1800000, 3),
('Munique', 1500000, 3),
('Colônia', 1100000, 3),
('Frankfurt', 760000, 3);

-- Egito (id_pais = 4)
insert into cidades (nome, populacao, id_pais) values
('Cairo', 10200000, 4),
('Alexandria', 5200000, 4),
('Giza', 4400000, 4),
('Port Said', 750000, 4),
('Luxor', 500000, 4);

-- Japão (id_pais = 5)
insert into cidades (nome, populacao, id_pais) values
('Tóquio', 13900000, 5),
('Yokohama', 3700000, 5),
('Osaka', 2700000, 5),
('Nagoya', 2300000, 5),
('Sapporo', 1900000, 5);

-- Austrália (id_pais = 6)
insert into cidades (nome, populacao, id_pais) values
('Sydney', 5300000, 6),
('Melbourne', 5000000, 6),
('Brisbane', 2600000, 6),
('Perth', 2100000, 6),
('Adelaide', 1400000, 6);
