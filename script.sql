create database if not exists pjerrejerre;

use pjerrejerre;


-- tabla correspondiente a los usuarios
create table if not exists usuarios (
    id int auto_increment,
    email varchar(30) not null,
    nombre varchar(15) null,
    apellido varchar(15) null,
    estado smallint not null,
    primary key(id)

);