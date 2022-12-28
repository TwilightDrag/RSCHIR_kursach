CREATE DATABASE IF NOT EXISTS table_list;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON table_list.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE table_list;
SET NAMES utf8;

CREATE TABLE IF NOT EXISTS `lessons_table` (
                                          ID INT NOT NULL AUTO_INCREMENT,
                                          day char(11),
                                          para INT,
                                          name VARCHAR(200),
                                          room VARCHAR(200),
                                          PRIMARY KEY (ID)
);

INSERT INTO lessons_table VALUE (NULL,'1.12' , '1', 'Безопасность жизнедеятельности', '209-A');
INSERT INTO lessons_table VALUE (NULL,'2.12', '2', 'Моделирование бизнес-процессов', '210-A');
INSERT INTO lessons_table VALUE (NULL,'3.12', '3', 'Основы сетевых технологий', '208-A');
INSERT INTO lessons_table VALUE (NULL,'3.12' , '1', 'Безопасность жизнедеятельности', '209-B');
INSERT INTO lessons_table VALUE (NULL,'2.12', '2', 'Дополнительные главы вычислительной математики', '209-A');
INSERT INTO lessons_table VALUE (NULL,'1.12', '4', 'Основы сетевых технологий', '209-B');

CREATE TABLE IF NOT EXISTS `lessons` (
                                         ID INT NOT NULL AUTO_INCREMENT,
                                         name VARCHAR(200),
                                         PRIMARY KEY (ID)
);

INSERT INTO lessons VALUE (NULL, 'Безопасность жизнедеятельности');
INSERT INTO lessons VALUE (NULL, 'Моделирование бизнес-процессов');
INSERT INTO lessons VALUE (NULL, 'Основы сетевых технологий');
INSERT INTO lessons VALUE (NULL, 'Математическая логика и теория алгоритмов');
INSERT INTO lessons VALUE (NULL, 'Курс на помучать первачка');
INSERT INTO lessons VALUE (NULL, 'Вы будете страдать на этой дисциплине');
INSERT INTO lessons VALUE (NULL, 'Дополнительные главы вычислительной математики');
INSERT INTO lessons VALUE (NULL, 'Добавочка тем, кому не хватило первой части курса');

CREATE TABLE IF NOT EXISTS `places` (
                                       ID INT NOT NULL AUTO_INCREMENT,
                                       place VARCHAR(200),
                                       PRIMARY KEY (ID)
);

INSERT INTO places VALUE (NULL, '209-B');
INSERT INTO places VALUE (NULL, '101-A');
INSERT INTO places VALUE (NULL, '102-A');
INSERT INTO places VALUE (NULL, '103-A');
INSERT INTO places VALUE (NULL, '204-B');

CREATE TABLE IF NOT EXISTS `admins` (
                                       ID INT NOT NULL AUTO_INCREMENT,
                                       name VARCHAR(200),
                                       login VARCHAR(200),
                                       password char(20),
                                       PRIMARY KEY (ID)
    );

INSERT INTO admins VALUE (NULL, 'admin', 'Admin' , 'admin');

CREATE TABLE IF NOT EXISTS `users` (
                                        ID INT NOT NULL AUTO_INCREMENT,
                                        name VARCHAR(200),
                                        login VARCHAR(200),
                                        password char(20),
                                        PRIMARY KEY (ID)
    );

INSERT INTO users VALUE (NULL, 'Leo', 'leo' , '123');

