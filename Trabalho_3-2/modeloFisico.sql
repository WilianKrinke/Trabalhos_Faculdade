drop database if exists atividadesomativa7e8;
create database atividadesomativa7e8;

create table atividadeSomativa7e8.Regiao(
	codRegiao bigint not null,
    nomeRegiao varchar(45) not null,
    descricaoRegiao text,
    primary key(codRegiao)
);

create table atividadeSomativa7e8.Vinicola(
	codVinicola bigint not null,
    nomeVinicola varchar(100) not null,
    descricaoVinicola text,
    foneVinicola varchar(15),
    emailVinicola varchar(15),
    codRegiao bigint not null,
    primary key(codVinicola),
    foreign key(codRegiao) references atividadeSomativa7e8.Regiao(codRegiao)
);

create table atividadeSomativa7e8.Vinho(
	codVinho bigint not null,
    nomeVinho varchar(50) not null,
    tipoVinho varchar(30) not null,
    anoVinho int not null,
    descricaoVinho text,
    codVinicola bigint not null,
    primary key(codVinho),
    foreign key(codVinicola) references atividadeSomativa7e8.Vinicola(codVinicola)    
);