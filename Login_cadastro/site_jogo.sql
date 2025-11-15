create database Site_jogo;
use Site_jogo;
create table usuarios
(id int primary key auto_increment,
nome varchar(100) not null,
email varchar(150) unique not null,
senha_hash varchar(100) not null);

describe usuarios;