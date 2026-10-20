CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe_hash VARCHAR(255) NOT NULL,
    role ENUM('utilisateur', 'admin') NOT NULL DEFAULT 'utilisateur',
    formation VARCHAR(100),
    annee_etudes VARCHAR(30),
    langue ENUM('fr', 'en') NOT NULL DEFAULT 'fr',
    date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE criteres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    description VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    description TEXT NOT NULL,
    salaire_min INT NOT NULL,
    salaire_max INT NOT NULL,
    risque_ia INT NOT NULL
);

CREATE TABLE masters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    ecole VARCHAR(100) NOT NULL,
    UNIQUE (nom, ecole)
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_critere INT NOT NULL,
    texte VARCHAR(255) NOT NULL,
    ordre INT UNIQUE NOT NULL,
    FOREIGN KEY (id_critere) REFERENCES criteres (id) ON DELETE CASCADE
);

CREATE TABLE metiers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorie INT NOT NULL,
    nom VARCHAR(150) NOT NULL,
    description VARCHAR(255),
    UNIQUE (id_categorie, nom),
    FOREIGN KEY (id_categorie) REFERENCES categories (id) ON DELETE CASCADE
);

CREATE TABLE conseils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorie INT NOT NULL,
    ordre INT NOT NULL,
    titre VARCHAR(150) NOT NULL,
    texte TEXT NOT NULL,
    projet_suggere TEXT,
    FOREIGN KEY (id_categorie) REFERENCES categories (id) ON DELETE CASCADE
);

CREATE TABLE valeurs_criteres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorie INT NOT NULL,
    id_critere INT NOT NULL,
    valeur INT NOT NULL,
    UNIQUE (id_categorie, id_critere),
    FOREIGN KEY (id_categorie) REFERENCES categories (id) ON DELETE CASCADE,
    FOREIGN KEY (id_critere) REFERENCES criteres (id) ON DELETE CASCADE
);

CREATE TABLE categorie_master (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorie INT NOT NULL,
    id_master INT NOT NULL,
    UNIQUE (id_categorie, id_master),
    FOREIGN KEY (id_categorie) REFERENCES categories (id) ON DELETE CASCADE,
    FOREIGN KEY (id_master) REFERENCES masters (id) ON DELETE CASCADE
);

CREATE TABLE reponses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_question INT NOT NULL,
    valeur INT NOT NULL,
    UNIQUE (id_utilisateur, id_question),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id) ON DELETE CASCADE,
    FOREIGN KEY (id_question) REFERENCES questions (id) ON DELETE CASCADE
);

CREATE TABLE favoris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_categorie INT NOT NULL,
    date_ajout DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (id_utilisateur, id_categorie),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id) ON DELETE CASCADE,
    FOREIGN KEY (id_categorie) REFERENCES categories (id) ON DELETE CASCADE
);

CREATE TABLE reinitialisations_mdp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    token_hash VARCHAR(64) UNIQUE NOT NULL,
    date_expiration DATETIME NOT NULL,
    date_utilisation DATETIME,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id) ON DELETE CASCADE
);
