DROP DATABASE IF EXISTS ISTA;

CREATE DATABASE ISTA;

USE ISTA;

CREATE TABLE stagiaires (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    filiere VARCHAR(50) NOT NULL,
    annee_etude VARCHAR(4) NOT NULL,
    type_bac VARCHAR(50) NOT NULL,
    annee_bac VARCHAR(4) NOT NULL
);

CREATE TABLE absences (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_heures INT NOT NULL,
    date_absence DATE NOT NULL,
    justifie BOOLEAN NOT NULL,
    id_stagiaire INT NOT NULL,
    FOREIGN KEY (id_stagiaire) REFERENCES stagiaires(id)
)
