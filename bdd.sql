CREATE DATABASE denas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE denas;

CREATE TABLE client (
id INT NOT NULL PRIMARY KEY,
nom VARCHAR(50) NOT NULL,
login VARCHAR(50) NOT NULL,
pass VARCHAR(100) NOT NULL,
estBloque INT,
codePinOtp VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO client VALUES(1,'toni','toni','123456',0,'otp1');
INSERT INTO client VALUES(2,'carole','carole','123456',0,'otp2');

