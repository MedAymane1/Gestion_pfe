CREATE DATABASE gestion_pfe;

USE gestion_pfe;

CREATE TABLE compte(
	id_compte INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    statut VARCHAR(255)
);

CREATE TABLE encadrant(
	code_enc INT NOT NULL PRIMARY KEY,
    nom_enc VARCHAR(255) NOT NULL,
    prenom_enc VARCHAR(255) NOT NULL,
    email_enc VARCHAR(255) NOT NULL,
    img_enc VARCHAR(255) DEFAULT "profile-image.png",

    id_compte INT NOT NULL,
    FOREIGN KEY (id_compte) REFERENCES compte(id_compte) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE etudiant(
	apogee INT NOT NULL PRIMARY KEY,
    cne VARCHAR(255) UNIQUE NOT NULL,
	nom_etd VARCHAR(255) NOT NULL,
    prenom_etd VARCHAR(255) NOT NULL,
    email_etd VARCHAR(255) NOT NULL,
    img_etd VARCHAR(255) DEFAULT "profile-image.png"
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

CREATE TABLE suggestion(
    id_sugg INT AUTO_INCREMENT PRIMARY KEY,
    text_sugg VARCHAR(255) NOT NULL,

    code_enc INT NOT NULL,
    FOREIGN KEY (code_enc) REFERENCES encadrant(code_enc)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE message(
    msg_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    incoming_msg_id INT NOT NULL,
    outgoing_msg_id INT NOT NULL,
    msg VARCHAR(1000) NOT NULL
);

CREATE TABLE file_path(
    new_file_name VARCHAR(255) PRIMARY KEY,
    file_name VARCHAR(255),
    path_file VARCHAR(255),

    id_grp INT,
    FOREIGN KEY (id_grp) REFERENCES groupe(id_grp) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE folder_path(
    folder_id INT NOT NULL PRIMARY KEY,
    folder_name VARCHAR(255),
    folder_path VARCHAR(255),

    id_grp INT,
    FOREIGN KEY (id_grp) REFERENCES groupe(id_grp) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- CREATE TABLE liste_etd(
-- 	apogee INT PRIMARY KEY,
--     cne VARCHAR(255) UNIQUE NOT NULL,
--     nom VARCHAR(255) NOT NULL,
--     prenom VARCHAR(255) NOT NULL
-- );

-- CREATE TABLE liste_enc(
-- 	code_enc INT PRIMARY KEY,
--     nom VARCHAR(255) NOT NULL,
--     prenom VARCHAR(255) NOT NULL
-- );

CREATE TABLE liste_etd(
	apogee INT PRIMARY KEY,
    cne VARCHAR(255) UNIQUE NOT NULL,
    nom_etd VARCHAR(255) NOT NULL,
    prenom_etd VARCHAR(255) NOT NULL
);

CREATE TABLE liste_enc(
	code_enc INT PRIMARY KEY,
    nom_enc VARCHAR(255) NOT NULL,
    prenom_enc VARCHAR(255) NOT NULL
);

/*
INSERT INTO compte (username, passwd, statut) VALUES ('groupe1', 'groupe1', 'Group'),
                                                     ('groupe2', 'groupe2', 'Group'),
                                                     ('groupe3', 'groupe3', 'Group'),
                                                     ('groupe4', 'groupe4', 'Group')

INSERT INTO compte (username, passwd, statut)
    VALUES ('ismail_J', 'jellouli', 'Supervisor')

INSERT INTO list_etd VALUES (18031991, 'p120097758', 'ASSLADDAY', 'Mohamed Aymane'),
                            (18032337, 'p120022349', 'AMYN', 'Ali'),
                            (18032384, 'p120097804', 'OULED TALEB', 'Soulaimane'),
                            (65432515, 'p864651321', 'AAAAAAA', 'Gggggg'),
                            (21344131, 'p126843108', 'ZZZZZZ', 'Uuuuuuu'),
                            (35168551, 'p120088460', 'BBBBBB', 'Mmmmmmm'),
                            (22225455, 'p132516758', 'KKKKK', 'Llllll'),
                            (10002455, 'p321351215', 'FFFFF', 'Nnnnnn')

INSERT INTO encadrant (code_enc, nom_enc, prenom_enc, email_enc, id_compte)
    VALUES ('65478924', 'JELLOULI', 'Ismail', 'ismail.jellouli@gmail.com', 5)

INSERT INTO groupe (nom_grp, nb_membre, id_compte) VALUES ('groupe 1', 3, 1),
                                                          ('groupe 2', 1, 2),
                                                          ('groupe 3', 2, 3),
                                                          ('groupe 4', 3, 4)
                                               
INSERT INTO suggestion (text_sugg, code_enc) VALUES ('suggestion 1', 65478924),
                                                    ('suggestion 2', 65478924),
                                                    ('suggestion 3', 65478924),
                                                    ('suggestion 4', 65478924),
                                                    ('suggestion 5', 65478924),
                                                    ('suggestion 6', 65478924),
                                                    ('suggestion 7', 65478924),
                                                    ('suggestion 8', 65478924),
                                                    ('suggestion 9', 65478924),
                                                    ('suggestion 10', 65478924)
*/
