CREATE DATABASE test_tutors;

USE test_tutors;
CREATE TABLE customer
(
  id int auto_increment PRIMARY KEY,
  first varchar(50),
  last varchar(50),
  phone int,
  email varchar(250),
  username varchar(60),
  password varchar(255),
  date_created date
);

CREATE TABLE tutor 
(
  id int primary key auto_increment, 
  first varchar(255), 
  last varchar(255),
  phone int,
  email varchar(250),
  username varchar(60),
  password varchar(255), 
  approved tinyint(1),
  active tinyint(1),
  date_created date
);

CREATE TABLE admin
(
  id int primary key auto_increment,
  username varchar(250),
  password varchar(255),
  RootAdmin tinyint(1)
);



INSERT INTO customer (first, last, phone, email, username, password, date_created) VALUES ('cust_first', 'cust_last', '1234567891', 'cust@una.edu', 'cust_user', 'cust_pass', '2019-01-01');
INSERT INTO tutor (first, last, phone, email, username, password, approved, active, date_created) VALUES ('tut_first', 'tut_last', '1234567891', 'tut@una.edu', 'tut_user', 'tut_pass', '1', '1', '2019-01-01');
INSERT INTO admin (username, password, RootAdmin) VALUES ('admin_user', 'admin_pass', '1');


