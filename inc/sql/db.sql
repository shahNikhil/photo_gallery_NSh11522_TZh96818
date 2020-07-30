drop database if exists photo_gallery;
create database photo_gallery;
use photo_gallery;

create table users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	username VARCHAR(50) NOT NULL UNIQUE,
	email VARCHAR(50),
	mobile BIGINT,	
	address VARCHAR(255),
	password VARCHAR(250) NOT NULL
) Engine=InnoDB;

create table photos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	file_path VARCHAR(50),
	description VARCHAR(100),
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;