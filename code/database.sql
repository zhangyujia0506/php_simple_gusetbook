CREATE DATABASE gbook;
use gbook;
CREATE TABLE  admin (
username  VARCHAR(20)  NOT NULL ,
userpass   VARCHAR(20)  NOT NULL 
);
CREATE TABLE message (
id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
author   VARCHAR(20) NOT NULL ,
addtime DATETIME NOT NULL ,
content  VARCHAR(1000) NOT NULL ,
reply      VARCHAR(1000) NOT NULL 
);
insert into admin values('admin','admin');