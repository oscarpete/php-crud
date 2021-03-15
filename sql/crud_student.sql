create table student
(
    id        int auto_increment
        primary key,
    firstName varchar(30) not null,
    lastName  varchar(30) not null,
    email     varchar(30) not null,
    constraint class
        foreign key (id) references class (id),
    constraint teacher
        foreign key (id) references teacher (id)
);

