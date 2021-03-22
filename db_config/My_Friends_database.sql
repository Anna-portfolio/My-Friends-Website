-- created by @Anna-portfolio (https://github.com/Anna-portfolio). DISCLAIMER: All the data used in these databases are fictitious. Any similarity to any data is entirely coincidental.


-- INFO: Create MyFriends database (browse-friends.php): 

-- delete the database if already exists and (re-)create it
DROP DATABASE IF EXISTS `mf_database`; 
CREATE DATABASE `mf_database`; 
USE `mf_database`;

-- create Users table in the database
CREATE TABLE `users` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `avatar` VARCHAR(200) DEFAULT 'images/users/user-default.png',
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `age` VARCHAR(11) DEFAULT 'unspecified',
  `city` VARCHAR(50) NOT NULL,
  `country` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(10) DEFAULT NULL
);

-- insert five rows into the User table
INSERT INTO users(avatar, email, password, first_name, last_name, age, city, country, phone) VALUES ('images/users/user-01.jpg', 'leon@co.uk', '12341234', 'Leon', 'Smith', '25', 'San Francisco', 'US', '7865431010');
INSERT INTO users(email, password, first_name, last_name, age, city, country) VALUES ('lewis@co.uk', 'abcdabcd', 'Lewis', 'Kennedy', '58', 'Vancouver', 'Canada');
INSERT INTO users(avatar, email, password, first_name, last_name, age, city, country, phone) VALUES ('images/users/user-03.jpg', 'lauren@co.uk', 'hello123123', 'Lauren', 'Duncan', '29', 'Seattle', 'US', '6325284115');
INSERT INTO users(avatar, email, password, first_name, last_name, age, city, country) VALUES ('images/users/user-04.jpg', 'lucas@co.uk', 'lucas111222', 'Lucas', 'Chapman', '72', 'Southampton', 'UK');
INSERT INTO users(avatar, email, password, first_name, last_name, city, country, phone) VALUES ('images/users/user-05.jpg', 'gabriela@lorem.com', '43214321', 'Gabriella', 'Watts', 'Nantes', 'France', '7854152326');