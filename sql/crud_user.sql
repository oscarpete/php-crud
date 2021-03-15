create table user
(
    id       int auto_increment
        primary key,
    name     varchar(30) not null,
    email    varchar(30) not null,
    password varchar(30) not null,
    constraint user_email_uindex
        unique (email)
);

