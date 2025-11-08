-- Criação do banco de dados
Create database  bd_mundo;
use bd_mundo;

-- Criação de tabelas
create table paises (
    id_pais int primary key auto_increment,
    nome varchar(100) not null,
    continente varchar(50) not null,
    codigo_pais int not null,
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
