-- Abdullah M & Holleigh 

CREATE DATABASE MathFellows;

USE MathFellows;

CREATE TABLE customers (
  id int auto_increment NOT NULL PRIMARY KEY,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  phone varchar(10),
  email varchar(50),
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  securityQuestion varchar(50),
  securityAnswer varchar(50),
  dateCreated date
);


CREATE TABLE tutors (
  id int primary key auto_increment NOT NULL, 
  firstName varchar(50) NOT NULL, 
  lastName varchar(50) NOT NULL,
  phone varchar(10),
  email varchar(50),
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL, 
  approved tinyint(1) NOT NULL,
  active tinyint(1) NOT NULL,
  description varchar(255),
  securityQuestion varchar(50),
  securityAnswer varchar(50),
  dateCreated date
);


CREATE TABLE admins (
  id int primary key auto_increment NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  rootAdmin tinyint(1) NOT NULL
);

CREATE TABLE grades (
    id int primary key auto_increment NOT NULL,
    grade varchar(50)
);

CREATE TABLE subjects (
    id int primary key auto_increment NOT NULL,
    subject varchar(50)
);

CREATE TABLE bookings (
    id int primary key auto_increment NOT NULL,
    tutorId int,
    customerId int,
    dateBooked date,
    FOREIGN KEY (tutorId) REFERENCES tutors(id),
    FOREIGN KEY (customerId) REFERENCES customers(id)
);

CREATE TABLE tutorGradeBridge (
    id int primary key auto_increment NOT NULL,
    tutorId int,
    gradeId int,
    FOREIGN KEY (tutorId) REFERENCES tutors(id),
    FOREIGN KEY (gradeId) REFERENCES grades(id)
);

CREATE TABLE tutorSubjectBridge (
    id int primary key auto_increment NOT NULL,
    tutorId int,
    subjectId int,
    FOREIGN KEY (tutorId) REFERENCES tutors(id),
    FOREIGN KEY (subjectId) REFERENCES subjects(id)
);

INSERT INTO customers (firstName, lastName, phone, email, username, password, securityQuestion, securityAnswer, dateCreated) VALUES ('John', 'Doe', '123456789', 'john@example.com', 'johnny22', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', 'what''s your first name?', 'john', '2019-01-01');
INSERT INTO customers (firstName, lastName, phone, email, username, password, securityQuestion, securityAnswer, dateCreated) VALUES ('Alex', 'Halsey', '123456729', 'alex@example.com', 'alex91', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', 'what''s your first name?', 'alex', '2019-01-01');
INSERT INTO customers (firstName, lastName, phone, email, username, password, securityQuestion, securityAnswer, dateCreated) VALUES ('Emily', 'Clark', '123456729', 'emily@example.com', 'emily455', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', 'what''s your first name?', 'emily', '2019-01-01');
INSERT INTO tutors (firstName, lastName, phone, email, username, password, approved, active, securityQuestion, securityAnswer, dateCreated) VALUES ('Nancy', 'James', '1234567891', 'nancy@example.com', 'nancyj', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '1', '1', 'what''s your first name?', 'nancy', '2019-01-01');
INSERT INTO tutors (firstName, lastName, phone, email, username, password, approved, active, securityQuestion, securityAnswer, dateCreated) VALUES ('Richard', 'Troy', '1234167891', 'richard@example.com', 'richardt', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '1', '0', 'what''s your first name?', 'richard', '2019-01-01'); 
INSERT INTO tutors (firstName, lastName, phone, email, username, password, approved, active, securityQuestion, securityAnswer, dateCreated) VALUES ('Fred', 'Sharp', '1234333891', 'fred@example.com', 'freds', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '0', '0', 'what''s your first name?', 'fred', '2019-01-01'); 
INSERT INTO admins (username, password, rootAdmin) VALUES ('masterAdmin', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '1');
INSERT INTO admins (username, password, rootAdmin) VALUES ('josh87', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '0');
INSERT INTO admins (username, password, rootAdmin) VALUES ('anthony83', '$2y$10$VrZh7eli8o.ii9hJBAwVcO84zkzdW35CTP7Lp4kL4Y85AJL2eOOmi', '0');
INSERT INTO grades (grade) VALUES ('7th');
INSERT INTO grades (grade) VALUES ('8th');
INSERT INTO grades (grade) VALUES ('9th');
INSERT INTO grades (grade) VALUES ('10th');
INSERT INTO grades (grade) VALUES ('11th');
INSERT INTO grades (grade) VALUES ('12th');
INSERT INTO subjects (subject) VALUES ('pre-algebra');
INSERT INTO subjects (subject) VALUES ('algebra (1 or 2)');
INSERT INTO subjects (subject) VALUES ('geometry');
INSERT INTO subjects (subject) VALUES ('trigonometry');
INSERT INTO subjects (subject) VALUES ('pre-calculus');
INSERT INTO subjects (subject) VALUES ('calculus');
INSERT INTO tutorGradeBridge (tutorId, gradeId) VALUES (1, 1);
INSERT INTO tutorGradeBridge (tutorId, gradeId) VALUES (1, 2);
INSERT INTO tutorGradeBridge (tutorId, gradeId) VALUES (2, 3);
INSERT INTO tutorGradeBridge (tutorId, gradeId) VALUES (2, 4);
INSERT INTO tutorSubjectBridge (tutorId, subjectId) VALUES (1, 1);
INSERT INTO tutorSubjectBridge (tutorId, subjectId) VALUES (1, 3);
INSERT INTO tutorSubjectBridge (tutorId, subjectId) VALUES (2, 4);
INSERT INTO tutorSubjectBridge (tutorId, subjectId) VALUES (2, 5);