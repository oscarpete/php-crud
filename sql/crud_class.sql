create table class
(
    id        int auto_increment
        primary key,
    className varchar(30) not null,
    location  varchar(30) not null,
    constraint assignedTeacher
        foreign key (id) references teacher (id)
);

