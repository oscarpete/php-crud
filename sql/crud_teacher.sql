create table teacher
(
    id        int auto_increment
        primary key,
    firstName varchar(30) not null,
    lastName  varchar(30) not null,
    email     varchar(30) not null,
    constraint classId
        foreign key (id) references class (id)
);

