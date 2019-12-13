/*file: insecure.php
 purpose: Simple Insecure PHP Example
 author: Joe McManus joe.mcmanus@coloado.edu
 version: 1.0
 date: 2014/09/26
*/

CREATE DATABASE `contactsSchema` ;
USE contactsSchema;
CREATE TABLE `contactsTable` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `first` VARCHAR(40) DEFAULT NULL,
     `last` VARCHAR(64) DEFAULT NULL,
     `email` VARCHAR(256) DEFAULT NULL,
     PRIMARY KEY (`id`)
) ENGINE=InnoDB;

GRANT SELECT, INSERT, UPDATE, DELETE  ON contactsSchema.contactsTable TO 'contactsUser'@'localhost' identified by 'superSecretPassword'; 
GRANT ALL ON contactsSchema.contactsTable TO 'contactsInsecure'@'localhost' identified by 'superSecretPassword'; 


INSERT INTO contactsTable (id, first, last, email) values(null, 'Edmund', 'Hillary', 'edmund@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Tenzing', 'Norgay', 'tenzing@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Ernst', 'Reiss', 'ernst@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Fritz', 'Luchsinger', 'fritz@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Ernst', 'Schmied', 'schmied@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Juerg', 'Marmet', 'juerg@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Jim', 'Whittaker', 'jim@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'Nawang', 'Gombu', 'nawang@everest.com');
INSERT INTO contactsTable (id, first, last, email) values(null, 'MS', 'Kohli', 'kohli@everest.com');

