Se realizo la conexion a base de datos local en la siguiente direccion pruebaphp/scripts/db/credentials

en la carpeta scripts encontramos las cruds de cada tabla



Setting environment for using XAMPP for Windows.
Usuario 1@DESKTOP-SMO69AN c:\xampp
# mysql -u root -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 22
Server version: 10.4.28-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> show database
    -> ;}
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'database' at line 1
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '}' at line 1
MariaDB [(none)]> show database;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'database' at line 1
MariaDB [(none)]> show databases;
+--------------------------+
| Database                 |
+--------------------------+
| campuslands              |
| db_hunter_facture_stiven |
| information_schema       |
| mysql                    |
| performance_schema       |
| phpmyadmin               |
| prueba                   |
| prueba1                  |
| test                     |
+--------------------------+
9 rows in set (0.001 sec)

MariaDB [(none)]> create database campusland;
Query OK, 1 row affected (0.001 sec)

MariaDB [(none)]> show databases;
+--------------------------+
| Database                 |
+--------------------------+
| campusland               |
| campuslands              |
| db_hunter_facture_stiven |
| information_schema       |
| mysql                    |
| performance_schema       |
| phpmyadmin               |
| prueba                   |
| prueba1                  |
| test                     |
+--------------------------+
10 rows in set (0.001 sec)

MariaDB [(none)]> use campusland;
Database changed
MariaDB [campusland]> create table pais;
ERROR 1113 (42000): A table must have at least 1 column
MariaDB [campusland]> create table pais(idPais INT PRIMARY KEY AUTO_INCREMENT,nombrePais VARCHAR(255));
Query OK, 0 rows affected (0.174 sec)

MariaDB [campusland]> DESCRIBE pais
    -> ;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| idPais     | int(11)      | NO   | PRI | NULL    | auto_increment |
| nombrePais | varchar(255) | YES  |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
2 rows in set (0.013 sec)

MariaDB [campusland]> DROP pais
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'pais' at line 1
MariaDB [campusland]> DROP table pais;
Query OK, 0 rows affected (0.373 sec)

MariaDB [campusland]> DESCRIBE pais;
ERROR 1146 (42S02): Table 'campusland.pais' doesn't exist
MariaDB [campusland]> create table pais(idPais INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,nombrePais VARCHAR(255));
Query OK, 0 rows affected (0.261 sec)

MariaDB [campusland]> DESCRIBE pais
    -> ;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| idPais     | int(11)      | NO   | PRI | NULL    | auto_increment |
| nombrePais | varchar(255) | YES  |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
2 rows in set (0.038 sec)

MariaDB [campusland]> create table departamento;
ERROR 1113 (42000): A table must have at least 1 column
MariaDB [campusland]> create table departamento (idDep INT PRIMARY KEY AUTO_INCREMENT NOT NULL, nombreDep VARCHAR(50), idPais INT;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1
MariaDB [campusland]> create table departamento(idDep INT PRIMARY KEY AUTO_INCREMENT NOT NULL, nombreDep VARCHAR(50), idPais INT);
Query OK, 0 rows affected (0.444 sec)

MariaDB [campusland]> ALTER TABLE departamento ADD CONSTRAINT pais FOREIGN KEY(idPais)REFERENCES pais(idPais);
Query OK, 0 rows affected (1.030 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [campusland]> describe departamento;
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| idDep     | int(11)     | NO   | PRI | NULL    | auto_increment |
| nombreDep | varchar(50) | YES  |     | NULL    |                |
| idPais    | int(11)     | YES  | MUL | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
3 rows in set (0.018 sec)

MariaDB [campusland]> create table region(idReg INT PRIMARY KEY AUTO_INCREMENT NOT NULL, nombreReg VARCHAR(60), idDep INT);
Query OK, 0 rows affected (0.214 sec)

MariaDB [campusland]> DESCRIBE region;
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| idReg     | int(11)     | NO   | PRI | NULL    | auto_increment |
| nombreReg | varchar(60) | YES  |     | NULL    |                |
| idDep     | int(11)     | YES  |     | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
3 rows in set (0.014 sec)

MariaDB [campusland]> ALTER TABLE region ADD CONSTRAINT departamento FOREIGN KEY (idDep)REFERENCES departamento(idDep);
Query OK, 0 rows affected (0.991 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [campusland]> describe region;
+-----------+-------------+------+-----+---------+----------------+
| Field     | Type        | Null | Key | Default | Extra          |
+-----------+-------------+------+-----+---------+----------------+
| idReg     | int(11)     | NO   | PRI | NULL    | auto_increment |
| nombreReg | varchar(60) | YES  |     | NULL    |                |
| idDep     | int(11)     | YES  | MUL | NULL    |                |
+-----------+-------------+------+-----+---------+----------------+
3 rows in set (0.030 sec)

MariaDB [campusland]> CREATE TABLE campers(idCamper VARCHAR(20) PRIMARY KEY NOT NULL, nombreCamper VARCHAR(50),apellidoCamper VARCHAR(50), fechaNac DATE, idReg INT);
Query OK, 0 rows affected (0.210 sec)

MariaDB [campusland]> ALTER TABLE campers ADD CONSTRAINT region FOREIGN KEY (idReg) REFERENCES region(idReg);
Query OK, 0 rows affected (0.933 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [campusland]> describe campers;
+----------------+-------------+------+-----+---------+-------+
| Field          | Type        | Null | Key | Default | Extra |
+----------------+-------------+------+-----+---------+-------+
| idCamper       | varchar(20) | NO   | PRI | NULL    |       |
| nombreCamper   | varchar(50) | YES  |     | NULL    |       |
| apellidoCamper | varchar(50) | YES  |     | NULL    |       |
| fechaNac       | date        | YES  |     | NULL    |       |
| idReg          | int(11)     | YES  | MUL | NULL    |       |
+----------------+-------------+------+-----+---------+-------+
5 rows in set (0.016 sec)

MariaDB [campusland]>