CREATE TABLE IF NOT EXISTS article
(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT
)ENGINE=INNODB;
INSERT INTO article (title, description) VALUES ('MySQL Enterprise Edition', 'Un ensemble de fonctionnalités avancées, d''outils de gestion et de support technique qui permet d''atteindre les plus hauts niveaux de continuité de service, de montée en charge, de fiabilité et de sécurité de MySQL.');
INSERT INTO article (title, description) VALUES ('MySQL Cluster CGE', 'MySQL Cluster permet aux utilisateurs de relever les défis de la base de données de la prochaine génération de services Web, du Cloud et de services de communications avec une évolutivité, une disponibilité et une flexibilité sans compromis.');
INSERT INTO article (title, description) VALUES ('MySQL pour OEM / ISV', 'Plus de 2000 ISV, OEM et VAR s''appuient sur MySQL comme base de données intégrée à leurs produits, pour rendre leurs applications, leurs matériels et leurs appareils plus compétitifs, les commercialiser plus rapidement et diminuer leur coût des marchandises vendues.');