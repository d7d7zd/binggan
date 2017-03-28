CREATE DATABASE IF NOT EXISTS `shop`;

DROP TABLE IF EXISTS `sp_admin`;
CREATE TABLE `sp_admin`(
	`id` tinyint unsigned auto_increment key,
	`name` varchar(20) not null unique,
	`password` varchar(32) not null,
	`email` varchar(50)
);

DROP TABLE IF EXISTS `sp_cate`;
CREATE TABLE `sp_cate`(
	`id` smallint unsigned auto_increment key,
	`class` varchar(20) not null unique
);

DROP TABLE IF EXISTS `sp_pro`;
CREATE TABLE `sp_pro`(
	`id` int unsigned auto_increment key,
	`pName` varchar(20) not null unique,
	`pDesc` text,
	`pPrice` decimal(10, 2) not null unsigned,
	`iPrice` decimal(10, 2) not null unsigned,
	`isShow` tinyint(1) default 1,
	`isHot` tinyint(1) default 0,
);


create table pro(
	id int unsigned auto_increment key,
	name varchar(50) not null unique,
	pSn varchar(50) not null unique,
	pNum smallint unsigned default 0,
	pPrice decimal(10, 2) not null,
	iPrice decimal(10, 2) not null,
	pDesc text,
	pImg varchar(255),
	isShow tinyint(1) default 1,
	isHot tinyint(1) default 0,
	cId int unsigned not null);
)

create table users(
id int unsigned auto_increment key,
name varchar(20) not null unique,
password varchar(32) not null,
sex enum("man", "woman") default  "man",
email varchar(50),
face varchar(255),
regTime int unsigned
);

create table album(
id int unsigned auto_increment key,
pId int unsigned not null,
path varchar(50) not null
);
	
