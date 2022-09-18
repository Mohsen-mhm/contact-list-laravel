# Contact list with PHP & mySQL & Smarty

## This is a contact list project.

--------------------------------------------------

First create Database *register* by this command:

create database `register`;

--------------------------------------------------

then create table *records* in `register` for contacts by this command:

create table records(
    id int AUTO_INCREMENT,
    name varchar(50),
    email varchar(100),
    phone varchar(50),
    submittedby varchar(50),
    avatar varchar(200),
    PRIMARY KEY (id)
);

--------------------------------------------------

also create table *users* in `register` for admin by this command:

create table users(
    id int AUTO_INCREMENT,
    username varchar(50),
    email varchar(100),
    password varchar(50),
    PRIMARY KEY (id)
);

--------------------------------------------------

## check username and password at <db.php> file

## Ready to go, register and use :)