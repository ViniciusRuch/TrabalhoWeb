CREATE DATABASE api_db;

USE api_db;

CREATE TABLE ferramenta(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo varchar(100) not null,
    nome varchar(100) not null,
    descricao varchar(100) not null
);

CREATE TABLE material(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo varchar(100) not null,
    quantidade INT not null,
    descricao varchar(100) not null,
    preco float not null 
);
CREATE TABLE madeira(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo varchar(100) not null unique,
    quantidade INT not null,
    descricao varchar(100) not null,
    preco float not null ,
    dimensoes varchar(100) not null
);