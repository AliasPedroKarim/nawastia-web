-- auto-generated definition
create table img_user
(
    id_image      int auto_increment
        primary key,
    nom_d_origine varchar(50)   not null,
    description   text          not null,
    image         blob          not null,
    extension     varchar(25)   not null,
    taille        int           not null,
    `blob`        int default 0 null,
    path          varchar(1000) null
);

create index id_image
    on img_user (id_image);

