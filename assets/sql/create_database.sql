/* drop database if exists rento_car ; */ 
create database if not exists taskflow ;

/*  */

use taskflow ;

/*  table user  */

create table if not exists user (
    id int AUTO_INCREMENT PRIMARY KEY ,
    username VARCHAR(255) not null ,
    useremail VARCHAR(255) unique not null,
    userpassword text not null,
    date_inscription timestamp DEFAULT CURRENT_TIMESTAMP 
);

/*  table task  */

create table if not exists task (
    id int AUTO_INCREMENT PRIMARY KEY ,
    taskname VARCHAR(50) not null ,
    taskdesc text not null ,
    taskstatus ENUM('TODO', 'DOING', 'DONE') NOT NULL DEFAULT 'TODO' ,
    taskpriority ENUM('low', 'medium', 'high') default 'medium' ,
    taskstart timestamp   ,
    taskfin timestamp   
);

/*  table task_type  */

create table if not exists task_type (
task_id INT not null ,
type enum('bug','feature')
);

/*  table collaboration  */

create table if not exists collaboration (
    user_id  INT  not null,
    task_id  INT  not null,
    primary key (user_id , task_id) ,
    foreign key (user_id) references user(id)  on delete cascade ,
    foreign key (task_id) references task(id) on delete cascade 
);


