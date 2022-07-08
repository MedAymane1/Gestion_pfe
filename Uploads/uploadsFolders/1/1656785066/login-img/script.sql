CREATE DATABASE gestion_pfe;

USE gestion_pfe;

CREATE TABLE compte(
	id_compte INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    statut VARCHAR(255)
);

CREATE TABLE encadrant(
    nom_enc VARCHAR(255) NOT NULL,
    prenom_enc VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
	code_enc INT NOT NULL PRIMARY KEY,
    passwd VARCHAR(255) NOT NULL,
    img VARCHAR(255) DEFAULT "profile-image.png",

 
    id_compte INT NOT NULL,
    FOREIGN KEY (id_compte) REFERENCES compte(id_compte) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE etudiant(
    nom_etd VARCHAR(255) NOT NULL,
    prenom_etd VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,	
    cne VARCHAR(255) UNIQUE NOT NULL,
	apogee INT NOT NULL PRIMARY KEY,
    passwd VARCHAR(255) NOT NULL,
    img VARCHAR(255) DEFAULT "profile-image.png"
   
);

CREATE TABLE groupe (
    id_grp INT AUTO_INCREMENT PRIMARY KEY,
    nom_grp VARCHAR(255),
    nb_membre INT,
    img_grp VARCHAR(255) DEFAULT "group-image.png",

    id_compte INT NOT NULL,
    FOREIGN KEY (id_compte) REFERENCES compte(id_compte) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE enc_etd_grp (
    id_grp INT,
    code_enc INT,
    apogee INT,

    FOREIGN KEY (id_grp) REFERENCES groupe(id_grp)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (code_enc) REFERENCES encadrant(code_enc)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (apogee) REFERENCES etudiant(apogee)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE liste_etd(
	apogee INT PRIMARY KEY,
    cne VARCHAR(255) UNIQUE NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL
);

CREATE TABLE liste_enc(
	code_enc INT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL
);

/*
INSERT INTO list_etd VALUES (18031991, 'p120097758', 'ASSLADDAY', 'Mohamed Aymane'),
                            (18032337, 'p120022349', 'AMYN', 'Ali'),
                            (18032384, 'p120097804', 'OULED TALEB', 'Soulaimane'),
                            (65432515, 'p864651321', 'AAAAAAA', 'Gggggg'),
                            (21344131, 'p126843108', 'ZZZZZZ', 'Uuuuuuu'),
                            (35168551, 'p120088460', 'BBBBBB', 'Mmmmmmm'),
                            (22225455, 'p132516758', 'KKKKK', 'Llllll'),
                            (10002455, 'p321351215', 'FFFFF', 'Nnnnnn') 

INSERT INTO groupe (nom_grp, nb_membre) VALUES ('groupe 1', 3),
                                               ('groupe 2', 1),
                                               ('groupe 3', 2),
                                               ('groupe 4', 3)
*/