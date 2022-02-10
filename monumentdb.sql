#Création de la base de donnée
DROP DATABASE IF EXISTS monumentdb;
CREATE DATABASE monumentdb;
USE monumentdb;

#Création de la table monument

CREATE TABLE monument (
    id_monument INT(5)NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100)NOT NULL,
    adresse VARCHAR(100)NOT NULL,
    id_typesite INT(5) NOT NULL,
    PRIMARY KEY(id_monument)
) ENGINE = InnoDB;

#Création de la table typesite

CREATE TABLE typesite (
    id_typesite INT(5)NOT NULL AUTO_INCREMENT,
    libelle VARCHAR(100)NOT NULL,
    codesite CHAR(5) NOT NULL,
    PRIMARY KEY(id_typesite)
) ENGINE = InnoDB;

#Création de la table metro

CREATE TABLE metro (
    id_metro INT(5)NOT NULL AUTO_INCREMENT,
    ligne CHAR(5)NOT NULL,
    station VARCHAR(100)NOT NULL,
    PRIMARY KEY(id_metro)
) ENGINE = InnoDB;

#Création de la table acceder

CREATE TABLE acceder (
    id_acceder INT(5)NOT NULL AUTO_INCREMENT,
    id_monument INT(5)NOT NULL,
    id_metro INT(5)NOT NULL,
    PRIMARY KEY(id_acceder)
) ENGINE = InnoDB;




#ALTER TABLE monument
#ADD PRIMARY KEY(id_monument);

#ALTER TABLE typesite
#ADD PRIMARY KEY(id_typesite);

#ALTER TABLE metro
#ADD PRIMARY KEY(id_metro);

#ALTER TABLE acceder
#ADD PRIMARY KEY(id_acceder);

