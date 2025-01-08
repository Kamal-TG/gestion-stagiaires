DROP DATABASE IF EXISTS ISTA;

CREATE DATABASE ISTA;

USE ISTA;

CREATE TABLE filieres (
    filiere_id INT AUTO_INCREMENT PRIMARY KEY,
    intitule VARCHAR(255) UNIQUE,
    code VARCHAR(50),
    nombre_annees TINYINT UNSIGNED NOT NULL
);

CREATE TABLE modules (
    module_id INT AUTO_INCREMENT,
    intitule VARCHAR(50) NOT NULL,
    code VARCHAR(50) NOT NULL,
    coefficient TINYINT UNSIGNED NOT NULL,
    filiere_id INT NOT NULL,
    PRIMARY KEY (module_id, filiere_id),
    FOREIGN KEY (filiere_id) REFERENCES filieres(filiere_id)
);

CREATE TABLE baccalaureats (
    baccalaureat_id INT AUTO_INCREMENT PRIMARY KEY,
    intitule VARCHAR(100) UNIQUE,
    code VARCHAR(50)
);

CREATE TABLE stagiaires (
    stagiaire_id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL
);

CREATE TABLE inscriptions (
    stagiaire_id INT NOT NULL,
    annee_etude TINYINT UNSIGNED NOT NULL,
    filiere_id INT NOT NULL,
    PRIMARY KEY (stagiaire_id),
    FOREIGN KEY (stagiaire_id) REFERENCES stagiaires(stagiaire_id) ON DELETE CASCADE,
    FOREIGN KEY (filiere_id) REFERENCES filieres(filiere_id)
);

CREATE TABLE notes (
    stagiaire_id INT,
    filiere_id INT,
    module_id INT,
    note DECIMAL(5, 2) NOT NULL,
    PRIMARY KEY (stagiaire_id, filiere_id, module_id),
    FOREIGN KEY (stagiaire_id) REFERENCES stagiaires(stagiaire_id) ON DELETE CASCADE,
    FOREIGN KEY (filiere_id, module_id) REFERENCES modules(filiere_id, module_id)
);

CREATE TABLE stagiaires_baccalaureats (
    stagiaire_id INT NOT NULL,
    annee_baccalaureat DATE NOT NULL,
    baccalaureat_id INT NOT NULL,
    PRIMARY KEY (stagiaire_id),
    FOREIGN KEY (stagiaire_id) REFERENCES stagiaires(stagiaire_id) ON DELETE CASCADE,
    FOREIGN KEY (baccalaureat_id) REFERENCES baccalaureats(baccalaureat_id)
);

CREATE TABLE justifications_types (
    justification_type_id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(100) UNIQUE
);

CREATE TABLE justifications (
    justification_id INT AUTO_INCREMENT PRIMARY KEY,
    stagiaire_id INT DEFAULT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    details TEXT DEFAULT NULL,
    document VARCHAR(255) UNIQUE,
    justification_type_id INT NOT NULL,
    FOREIGN KEY (stagiaire_id) REFERENCES stagiaires(stagiaire_id),
    FOREIGN KEY (justification_type_id) REFERENCES justifications_types(justification_type_id)
);

CREATE TABLE absences (
    absence_id INT AUTO_INCREMENT,
    stagiaire_id INT NOT NULL,
    date_absence DATE NOT NULL,
    nombre_heures INT NOT NULL,
    justifie BOOLEAN DEFAULT FALSE,
    justification_id INT DEFAULT NULL,
    PRIMARY KEY (absence_id, stagiaire_id),
    FOREIGN KEY (stagiaire_id) REFERENCES stagiaires(stagiaire_id) ON DELETE CASCADE,
    FOREIGN KEY (justification_id) REFERENCES justifications(justification_id) ON DELETE CASCADE
);

insert into filieres values
(default, "Technologie Des Aliments", "TDA", 2),
(default, "Technicien Spécialisé En Oléoculture Et Oléotechnie", "TSEOEO", 2),
(default, "Management Agricole", "MA", 2),
(default, "Stylisme Modelisme Industriel", "SMI", 2),
(default, "Techniques D'habillement Industrialisation", "TDI", 2),
(default, "Haute Couture", "HC", 2),
(default, "Technico-Commercial En Vente De Véhicules Et Pièces De Rechange", "t-CEVDVEPDR", 2),
(default, "Exploitatio", "E", 2),
(default, "Gestion Des Entreprises", "GDE", 2),
(default, "Management Hôtelier", "MH", 2),
(default, "Technicien Spécialisé Bureau D'etude En Construction Métallique", "TSBDECM", 2),
(default, "Développement Digital", "DD", 2),
(default, "Educateur Spécialisé Dans La Petite Enfance", "ESDLPE", 2),
(default, "Infographie", "I", 2),
(default, "Management Touristique", "MT", 2),
(default, "Automatisation Et Instrumentation Industrielle", "AEII", 2),
(default, "Génie Civil", "GC", 2),
(default, "Maintenance Des Machines Et Outillage En Plasturgie", "MDMEOEP", 2),
(default, "Chimie Cuir", "CC", 2),
(default, "Bureau D'etude En Construction Métallique", "BDECM", 2),
(default, "Technicien Spécialisé En Contrôle Qualité Textile", "TSECQT", 2),
(default, "Management Et Méthodes Cuir", "MEMC", 2),
(default, "Agriculture De Précision", "ADP", 2),
(default, "Géomètre Topographe", "GT", 2),
(default, "Infographie Prépresse", "IP", 2),
(default, "Qualité Hygiène Sécurité Environnement", "QHSE", 2),
(default, "Techniques Agricoles", "TA", 2),
(default, "Transformation Et Valorisation Des Plantes Aromatiques Et Médicinales", "TEVDPAEM", 2),
(default, "Exploitation", "E", 2),
(default, "Infrastructure Digitale", "ID", 2),
(default, "Technicien Spécialisé En Emballage Et Conditionnement", "TSEEEC", 2),
(default, "Management Agricol", "MA", 2),
(default, "Emballage Et Conditionnement", "EEC", 2);

INSERT INTO baccalaureats VALUES
(DEFAULT, 'Sciences Mathématiques', 'SM'),
(DEFAULT, 'Sciences Physiques', 'SP'),
(DEFAULT, 'Sciences de la Vie et de la Terre', 'SVT'),
(DEFAULT, 'Sciences Agronomiques', 'AG'),
(DEFAULT, 'Sciences Économiques et Gestion', 'SEG'),
(DEFAULT, 'Lettres Modernes', 'LL'),
(DEFAULT, 'Lettres et Sciences Humaines', 'LSH'),
(DEFAULT, 'Sciences Mathématiques (option internationale)', 'BI-SM'),
(DEFAULT, 'Sciences Physiques (option internationale)', 'BI-SP'),
(DEFAULT, 'Sciences de la Vie et de la Terre (option internationale)', 'BI-SVT'),
(DEFAULT, 'Sciences Économiques et Gestion (option internationale)', 'BI-SEG'),
(DEFAULT, 'Lettres Modernes (option internationale)', 'BI-LL'),
(DEFAULT, 'Baccalauréat professionnel industriel', 'BPI'),
(DEFAULT, 'Baccalauréat professionnel tertiaire', 'BPT'),
(DEFAULT, 'Sciences et Technologies Mécaniques', 'STM'),
(DEFAULT, 'Sciences et Technologies Électriques', 'STE'),
(DEFAULT, 'Sciences et Technologies de Gestion', 'STG'),
(DEFAULT, 'Baccalauréat arts appliqués', 'BAA'),
(DEFAULT, 'Baccalauréat sportif', 'BS');


