drop database if exists photo_gallery;
create database photo_gallery;
use photo_gallery;

create table users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	username VARCHAR(50),
	email VARCHAR(50),
	mobile INT,	
	address VARCHAR(255),
	password VARCHAR(250)
) Engine=InnoDB;

create table photos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50),
	file_path VARCHAR(50),
	description VARCHAR(100),
	FOREIGN KEY (userid) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;