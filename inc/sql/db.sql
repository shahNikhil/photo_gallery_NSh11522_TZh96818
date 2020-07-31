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
	display_name VARCHAR(50) NOT NULL,
	file_path VARCHAR(1250),
	description VARCHAR(100),
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

create table operator (
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE	
) Engine=InnoDB;

--
-- creating 5 dumy users with password pass123
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'Nikhil', 'Shah', 'nick', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$adYFZIR2mkChkRBPHTKdK.vcW2ss5LUXw3BBdse7uXLQePRN5k1WG');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(2, 'Tom', 'Shah', 'dummy', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$iJy9Sh63mGgi.QYlJc6eIuo5rh4GHF4Ip5b0IQftDgsxCmKb2G3wW');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(3, 'jerry', 'shah', 'sunny', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$LAxRUoVecSI3muoA5T08quzy6nY1KsSJJSm8aAOZ6edal8soUi.NK');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(4, 'micky', 'Shah', 'corona', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$6yuUVhn4792F7oXQ2/yDsOgQANSOcST5ADovfi/S8oJUNe1Nd.Yfu');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(5, 'mouse', 'Shah', 'CSIS', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$3HTjMl7GJs7.OQ4sQ8fY..v96ecTXd.Qlnn42VEfKLPhpNmWUyeem');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `address`, `password`) VALUES
(6, 'Jackie', 'Zhen', 'jzhen', 'dummy@gmail.com', 2147483647, '#211,404 douglas Street\r\n', '$2y$10$adYFZIR2mkChkRBPHTKdK.vcW2ss5LUXw3BBdse7uXLQePRN5k1WG');
--
-- insterting some dummy photos to have a glance at ui
--

INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(2, 'abstract.jpeg', 'abstract.jpeg', 'inc/data/uploads/abstract.jpeg', 'cool abstract demo1', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(3, 'abstract2.jpeg', 'abstract2.jpeg', 'inc/data/uploads/abstract2.jpeg', 'cool abstract demo 2', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(4, 'abstract3.jpeg', 'abstract3.jpeg', 'inc/data/uploads/abstract3.jpeg', 'cool abstract demo 3', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(5, 'ancient.jpeg', 'ancient.jpeg', 'inc/data/uploads/ancient.jpeg', 'cool ancient demo 1', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(6, 'beach.jpeg', 'beach.jpeg','inc/data/uploads/beach.jpeg', 'cool beach demo 1', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(7, 'beach2.jpeg', 'beach2.jpeg', 'inc/data/uploads/beach2.jpeg', 'cool beach demo 2', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(8, 'beach3.jpeg', 'beach3.jpeg', 'inc/data/uploads/beach3.jpeg', 'cool beach 3 demo', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(9, 'beach4.jpeg', 'beach4.jpeg', 'inc/data/uploads/beach4.jpeg', 'cool beach demo 4', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(10, 'beach5.jpeg', 'beach5.jpeg', 'inc/data/uploads/beach5.jpeg', 'cool beach demo 5', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(11, 'cat.jpeg', 'cat.jpeg', 'inc/data/uploads/cat.jpeg', 'cool cat demo 1', 1);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(12, 'cat2.jpeg', 'cat2.jpeg', 'inc/data/uploads/cat2.jpeg', 'cool cat demo 2', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(13, 'cat3.jpeg', 'cat3.jpeg', 'inc/data/uploads/cat3.jpeg', 'cool cat demo 3', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(14, 'city.jpeg', 'city.jpeg', 'inc/data/uploads/city.jpeg', 'cool city demo 1', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(15, 'city2.jpeg', 'city2.jpeg', 'inc/data/uploads/city2.jpeg', 'cool city demo 2', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(16, 'city3.jpeg', 'city3.jpeg', 'inc/data/uploads/city3.jpeg', 'cool city demo 3', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(17, 'city4.jpeg', 'city4.jpeg', 'inc/data/uploads/city4.jpeg', 'cool city demo 4', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(18, 'city5.jpeg', 'city5.jpeg', 'inc/data/uploads/city5.jpeg', 'cool city demo 5', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(19, 'dog.jpeg', 'dog.jpeg', 'inc/data/uploads/dog.jpeg', 'cool dog demo 1', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(20, 'dog2.jpeg', 'dog2.jpeg', 'inc/data/uploads/dog2.jpeg', 'cool dog demo 2', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(21, 'dog3.jpeg', 'dog3.jpeg', 'inc/data/uploads/dog3.jpeg', 'cool dog demo 3', 2);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(22, 'dog4.jpeg', 'dog4.jpeg', 'inc/data/uploads/dog4.jpeg', 'cool dog demo 4', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(23, 'Egypt.jpeg', 'egypt.jpeg', 'inc/data/uploads/Egypt.jpeg', 'cool Egypt demo 1', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(24, 'galaxy.jpeg', 'galaxy.jpeg', 'inc/data/uploads/galaxy.jpeg', 'cool galaxy demo 1', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(25, 'galaxy2.jpeg', 'galaxy2.jpeg', 'inc/data/uploads/galaxy2.jpeg', 'cool galaxy demo 2', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(26, 'galaxy3.jpeg', 'galaxy3.jpeg', 'inc/data/uploads/galaxy3.jpeg', 'cool galaxy demo 3', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(27, 'galaxy4.jpeg', 'galaxy4.jpeg', 'inc/data/uploads/galaxy4.jpeg', 'cool galaxy demo 4', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(28, 'galaxy5.jpeg', 'galaxy5.jpeg', 'inc/data/uploads/galaxy5.jpeg', 'cool galaxy demo 5', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(29, 'india.jpeg', 'india.jpeg', 'inc/data/uploads/india.jpeg', 'cool India demo 1', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(30, 'landmark.jpeg', 'landmark.jpeg', 'inc/data/uploads/landmark.jpeg', 'cool landmark demo 1', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(31, 'minimalist.png', 'minimalist.jpeg', 'inc/data/uploads/minimalist.png', 'cool minimalist demo 1', 3);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(32, 'minimalist2.jpeg', 'minimalist2.jpeg', 'inc/data/uploads/minimalist2.jpeg', 'cool minimalist demo 2', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(33, 'minimalist3.jpeg', 'minimalist3.jpeg', 'inc/data/uploads/minimalist3.jpeg', 'cool minimalist demo 3', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(34, 'minimalist4.jpeg', 'minimalist4.jpeg', 'inc/data/uploads/minimalist4.jpeg', 'cool minimalist demo 4', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(35, 'minimalist5.jpeg', 'minimalist5.jpeg', 'inc/data/uploads/minimalist5.jpeg', 'cool minimalist demo 5', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(36, 'Nature.jpeg', 'nature.jpeg', 'inc/data/uploads/Nature.jpeg', 'cool nature demo 1', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(37, 'nature2.jpeg', 'nature2.jpeg', 'inc/data/uploads/nature2.jpeg', 'cool nature demo 2', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(38, 'Nature3.jpeg', 'nature3.jpeg', 'inc/data/uploads/Nature3.jpeg', 'cool nature demo 3', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(39, 'nature4.jpeg', 'nature4.jpeg', 'inc/data/uploads/nature4.jpeg', 'cool nature demo 4', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(40, 'nature5.jpeg', 'nature5.jpeg', 'inc/data/uploads/nature5.jpeg', 'cool nature demo 5', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(41, 'pattern.jpeg', 'pattern.jpeg', 'inc/data/uploads/pattern.jpeg', 'cool pattern demo 1', 4);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(42, 'pattern2.jpeg', 'pattern2.jpeg', 'inc/data/uploads/pattern2.jpeg', 'cool pattern demo 2', 5);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(43, 'pattern3.jpeg', 'pattern3.jpeg', 'inc/data/uploads/pattern3.jpeg', 'cool pattern demo 3', 5);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(44, 'pattern4.jpeg', 'pattern4.jpeg', 'inc/data/uploads/pattern4.jpeg', 'cool pattern demo 4', 5);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(45, 'pattern5.jpeg', 'pattern5.jpeg', 'inc/data/uploads/pattern5.jpeg', 'cool pattern demo 5', 5);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(46, 'rome.jpeg', 'rome.jpeg', 'inc/data/uploads/rome.jpeg', 'cool Rome demo 1', 5);
INSERT INTO `photos` (`id`, `name`, `display_name`, `file_path`, `description`, `user_id`) VALUES
(47, 'taj mahal.jpeg', 'taj mahal.jpeg', 'inc/data/uploads/taj mahal.jpeg', 'cool taj mahal demo 1', 5);

--
-- Insert admin users
--
INSERT INTO `operator` (`user_id`) VALUES (1);
INSERT INTO `operator` (`user_id`) VALUES (6);
-