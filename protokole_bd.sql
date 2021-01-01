-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 11 Février 2020 à 17:32
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `protokole_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `samedi` varchar(255) NOT NULL,
  `dimanche` varchar(255) NOT NULL,
  `indisponible` int(11) NOT NULL,
  `date_maj` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_agent`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`, `indisponible`, `date_maj`) VALUES
(1, 2, 'Lundi : 3 h0 à 0 h0', 'Mardi : 20 h0 à 0 h0', '0', '0', '0', '0', '0', 0, 'Mar, 11 Fév 2020');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(11) NOT NULL,
  `nom_agent` varchar(100) DEFAULT NULL,
  `postnom_agent` varchar(100) DEFAULT NULL,
  `prenom_agent` varchar(50) DEFAULT NULL,
  `telephone_agent` varchar(50) DEFAULT NULL,
  `login_agent` varchar(20) DEFAULT NULL,
  `password_agent` varchar(30) DEFAULT NULL,
  `sexe_agent` varchar(25) DEFAULT NULL,
  `categorie` varchar(255) NOT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `nom_agent`, `postnom_agent`, `prenom_agent`, `telephone_agent`, `login_agent`, `password_agent`, `sexe_agent`, `categorie`, `id_service`, `id_fonction`) VALUES
(1, 'Kanyinda', 'Olivier', 'Grace', '444', 'grace', 'grace', 'Homme', 'agent_simple', 3, 2),
(2, 'Tshisekedi', 'Tshilombo', 'Felix', '243822958421', 'felix', 'felix', 'Homme', 'agent_special', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `archivage`
--

CREATE TABLE `archivage` (
  `id_archivage` int(11) NOT NULL,
  `titre_doc_archivage` varchar(240) DEFAULT NULL,
  `heur_archivage` varchar(240) NOT NULL,
  `jour_archivage` varchar(25) NOT NULL,
  `mois_archivage` varchar(233) NOT NULL,
  `anne_archivage` varchar(244) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_type_document` int(11) NOT NULL,
  `id_piece_jointe` int(11) NOT NULL,
  `image_document` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `archivage_courrier`
--

CREATE TABLE `archivage_courrier` (
  `id_archivage_courrier` int(11) NOT NULL,
  `titre_doc_archivage` varchar(222) NOT NULL,
  `numero_doc_archivage` int(11) NOT NULL,
  `lien_genere_archivage` varchar(222) NOT NULL,
  `heur_archivage` varchar(222) NOT NULL,
  `minute_archivage` varchar(222) NOT NULL,
  `jour_archivage` varchar(222) NOT NULL,
  `mois_archivage` varchar(233) NOT NULL,
  `anne_archivage` varchar(222) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_type_document` int(11) NOT NULL,
  `image_document` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `archivage_courrier`
--

INSERT INTO `archivage_courrier` (`id_archivage_courrier`, `titre_doc_archivage`, `numero_doc_archivage`, `lien_genere_archivage`, `heur_archivage`, `minute_archivage`, `jour_archivage`, `mois_archivage`, `anne_archivage`, `id_agent`, `id_type_document`, `image_document`) VALUES
(8, 'recherche du travail', 22, 'pdf', '0', '0', '1', '1', '2019', 1, 1, 'uploads/futuris challenge.docx');

-- --------------------------------------------------------

--
-- Structure de la table `audiance`
--

CREATE TABLE `audiance` (
  `id_audiance` int(11) NOT NULL,
  `jour_audiance` int(11) NOT NULL,
  `motif_audiance` text NOT NULL,
  `heur_audiance` int(11) NOT NULL,
  `min_audiance` int(11) NOT NULL,
  `mois_audiance` int(11) NOT NULL,
  `annee_audiance` int(11) NOT NULL,
  `observation_audiance` text NOT NULL,
  `traite_audiance` varchar(250) NOT NULL,
  `etat_audiance` int(11) NOT NULL,
  `id_agent_recois` int(11) NOT NULL,
  `id_correspondant` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `audiance`
--

INSERT INTO `audiance` (`id_audiance`, `jour_audiance`, `motif_audiance`, `heur_audiance`, `min_audiance`, `mois_audiance`, `annee_audiance`, `observation_audiance`, `traite_audiance`, `etat_audiance`, `id_agent_recois`, `id_correspondant`, `id_agent`) VALUES
(1, 17, 'hgy', 20, 0, 1, 2019, 'poiuyf', '1/1/2020 à 0:0', 0, 2, 5, 1),
(2, 17, 'miugfmlkjhg', 17, 0, 5, 2019, 'fghjklm', '18/2/2020 à 13:0', 1, 2, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `correspondant`
--

CREATE TABLE `correspondant` (
  `id_correspondant` int(11) NOT NULL,
  `nom_correspondant` varchar(100) DEFAULT NULL,
  `postnom_correspondant` varchar(30) DEFAULT NULL,
  `prenom_correspondant` varchar(50) DEFAULT NULL,
  `telephone_correspondant` varchar(23) DEFAULT NULL,
  `email_correspondant` varchar(240) NOT NULL,
  `sexe_correspondant` varchar(25) DEFAULT NULL,
  `adresse_correspondant` varchar(233) NOT NULL,
  `id_piece_jointe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `correspondant`
--

INSERT INTO `correspondant` (`id_correspondant`, `nom_correspondant`, `postnom_correspondant`, `prenom_correspondant`, `telephone_correspondant`, `email_correspondant`, `sexe_correspondant`, `adresse_correspondant`, `id_piece_jointe`) VALUES
(1, 'Kika', 'Madiau', 'Gedo', NULL, '', 'Homme', '', 0),
(4, 'Madiau', 'Vanda', 'Josh', '2222', 'kanyi@gmail.com', 'Homme', '', 0),
(5, 'Lulebo', 'Mantubani', 'Harmache', '243825847140', 'priscak@gmail.com', 'Femme', '', 0),
(6, 'jordan', 'lulebo', 'ùpoiutyr', '0822966560', 'jo@gmail.com', 'Homme', 'ioutydfghjkl', 0),
(7, 'jordan', 'lulebo', 'ùpoiutyr', '0822966560', 'jo@gmail.com', 'Homme', 'ioutydfghjkl', 0);

-- --------------------------------------------------------

--
-- Structure de la table `courrier_entrant`
--

CREATE TABLE `courrier_entrant` (
  `id_courrier_entrant` int(11) NOT NULL,
  `objet_courrier_entrant` varchar(100) DEFAULT NULL,
  `jour_courrier_entrant` int(11) NOT NULL,
  `heur_courrier_entrant` int(11) DEFAULT NULL,
  `minute_courrier_entrant` int(11) NOT NULL,
  `annee_courrier_entrant` int(240) NOT NULL,
  `mois_courrier_entrant` int(255) NOT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_correspondant` int(11) DEFAULT NULL,
  `observation_courrier_entrant` varchar(222) NOT NULL,
  `vue_courrier_entrant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `courrier_sortant`
--

CREATE TABLE `courrier_sortant` (
  `id_courrier_sortant` int(11) NOT NULL,
  `objet_courrier_sortant` varchar(255) DEFAULT NULL,
  `destinataire` varchar(255) NOT NULL,
  `heur_courrier_sortant` int(11) DEFAULT NULL,
  `minute_courrier_sortant` int(11) NOT NULL,
  `jour_courrier_sortant` int(11) DEFAULT NULL,
  `mois_courrier_sortant` int(11) NOT NULL,
  `annee_courrier_sortant` int(11) NOT NULL,
  `observation_courrier_sortant` varchar(255) NOT NULL,
  `id_agent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `courrier_sortant`
--

INSERT INTO `courrier_sortant` (`id_courrier_sortant`, `objet_courrier_sortant`, `destinataire`, `heur_courrier_sortant`, `minute_courrier_sortant`, `jour_courrier_sortant`, `mois_courrier_sortant`, `annee_courrier_sortant`, `observation_courrier_sortant`, `id_agent`) VALUES
(1, 'File d\'attente', '4', 14, 30, 20, 12, 2019, 'A participer', 1),
(2, 'Introduction', 'Apple', 10, 0, 3, 10, 2019, 'A réintegrer', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `id_fonction` int(11) NOT NULL,
  `nom_fonction` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `nom_fonction`) VALUES
(1, 'SECRETAIRE'),
(2, 'DELEGUE');

-- --------------------------------------------------------

--
-- Structure de la table `piece_jointe`
--

CREATE TABLE `piece_jointe` (
  `id_piece_jointe` int(11) NOT NULL,
  `numero_piece_jointe` varchar(23) NOT NULL,
  `id_correspondant` int(11) NOT NULL,
  `fichier_image_piece_jointe` varchar(100) NOT NULL,
  `id_type_piece_jointe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece_jointe`
--

INSERT INTO `piece_jointe` (`id_piece_jointe`, `numero_piece_jointe`, `id_correspondant`, `fichier_image_piece_jointe`, `id_type_piece_jointe`) VALUES
(1, '2121215878777', 5, '0001.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(11) NOT NULL,
  `demandeur` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `qr_Img` varchar(255) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `heure_qr` varchar(255) NOT NULL,
  `date_qr` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qrcode`
--

INSERT INTO `qrcode` (`id_qrcode`, `demandeur`, `destinataire`, `qr_Img`, `id_agent`, `heure_qr`, `date_qr`) VALUES
(1, 'poiuytr - PROTOKOLE PRO', 'loiuyt', 'protokole17760.png', 1, '85612', '856412'),
(2, 'grace - PROTOKOLE PRO', 'felix', 'protokole31257.png', 1, '1212', '54574420'),
(3, 'jordan', 'kabila', 'protokole19166.png', 1, '1221', '212785');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `libele_service` varchar(45) NOT NULL,
  `code_service` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `libele_service`, `code_service`) VALUES
(1, 'POST 1', '1'),
(2, 'POST 2', '2'),
(3, 'POST 3', '3'),
(4, 'Presidence', '4');

-- --------------------------------------------------------

--
-- Structure de la table `type_correspondant`
--

CREATE TABLE `type_correspondant` (
  `id_type_correspondant` int(11) NOT NULL,
  `libele_type_correspondant` varchar(100) DEFAULT NULL,
  `id_correspondant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE `type_document` (
  `id_type_document` int(11) NOT NULL,
  `libele_type_document` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_document`
--

INSERT INTO `type_document` (`id_type_document`, `libele_type_document`) VALUES
(1, 'administratif'),
(2, 'gestion');

-- --------------------------------------------------------

--
-- Structure de la table `type_piece_jointe`
--

CREATE TABLE `type_piece_jointe` (
  `id_piece_jointe` int(11) NOT NULL,
  `libele_piece_jointe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_piece_jointe`
--

INSERT INTO `type_piece_jointe` (`id_piece_jointe`, `libele_piece_jointe`) VALUES
(1, 'Carte d\'electeur'),
(2, 'Carte d\'étudiant'),
(3, 'Carte de permis de conduire'),
(4, 'Carte d\'élève');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `id_fonction` (`id_fonction`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `archivage`
--
ALTER TABLE `archivage`
  ADD PRIMARY KEY (`id_archivage`),
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `id_type_document` (`id_type_document`),
  ADD KEY `id_piece_jointe` (`id_piece_jointe`),
  ADD KEY `id_agent_2` (`id_agent`);

--
-- Index pour la table `archivage_courrier`
--
ALTER TABLE `archivage_courrier`
  ADD PRIMARY KEY (`id_archivage_courrier`),
  ADD KEY `id_agent` (`id_agent`);

--
-- Index pour la table `audiance`
--
ALTER TABLE `audiance`
  ADD PRIMARY KEY (`id_audiance`);

--
-- Index pour la table `correspondant`
--
ALTER TABLE `correspondant`
  ADD PRIMARY KEY (`id_correspondant`);

--
-- Index pour la table `courrier_entrant`
--
ALTER TABLE `courrier_entrant`
  ADD PRIMARY KEY (`id_courrier_entrant`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `id_correspondant` (`id_correspondant`);

--
-- Index pour la table `courrier_sortant`
--
ALTER TABLE `courrier_sortant`
  ADD PRIMARY KEY (`id_courrier_sortant`),
  ADD KEY `id_agent` (`id_agent`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id_fonction`);

--
-- Index pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD PRIMARY KEY (`id_piece_jointe`),
  ADD KEY `fk_id_coorespondant` (`id_correspondant`);

--
-- Index pour la table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `type_correspondant`
--
ALTER TABLE `type_correspondant`
  ADD PRIMARY KEY (`id_type_correspondant`),
  ADD KEY `id_correspondant` (`id_correspondant`);

--
-- Index pour la table `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id_type_document`);

--
-- Index pour la table `type_piece_jointe`
--
ALTER TABLE `type_piece_jointe`
  ADD PRIMARY KEY (`id_piece_jointe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `archivage`
--
ALTER TABLE `archivage`
  MODIFY `id_archivage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `archivage_courrier`
--
ALTER TABLE `archivage_courrier`
  MODIFY `id_archivage_courrier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `audiance`
--
ALTER TABLE `audiance`
  MODIFY `id_audiance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `correspondant`
--
ALTER TABLE `correspondant`
  MODIFY `id_correspondant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `courrier_entrant`
--
ALTER TABLE `courrier_entrant`
  MODIFY `id_courrier_entrant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `courrier_sortant`
--
ALTER TABLE `courrier_sortant`
  MODIFY `id_courrier_sortant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  MODIFY `id_piece_jointe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_correspondant`
--
ALTER TABLE `type_correspondant`
  MODIFY `id_type_correspondant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id_type_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_piece_jointe`
--
ALTER TABLE `type_piece_jointe`
  MODIFY `id_piece_jointe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id_fonction`) REFERENCES `fonction` (`id_fonction`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `archivage`
--
ALTER TABLE `archivage`
  ADD CONSTRAINT `archivage_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archivage_ibfk_2` FOREIGN KEY (`id_piece_jointe`) REFERENCES `piece_jointe` (`id_piece_jointe`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archivage_ibfk_3` FOREIGN KEY (`id_type_document`) REFERENCES `type_document` (`id_type_document`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `archivage_courrier`
--
ALTER TABLE `archivage_courrier`
  ADD CONSTRAINT `archivage_courrier_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `type_document` (`id_type_document`),
  ADD CONSTRAINT `fk_id_agent` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`),
  ADD CONSTRAINT `fk_id_type_document` FOREIGN KEY (`id_agent`) REFERENCES `type_document` (`id_type_document`),
  ADD CONSTRAINT `id_agent` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`);

--
-- Contraintes pour la table `courrier_entrant`
--
ALTER TABLE `courrier_entrant`
  ADD CONSTRAINT `courrier_entrant_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`) ON UPDATE CASCADE,
  ADD CONSTRAINT `courrier_entrant_ibfk_2` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON UPDATE CASCADE,
  ADD CONSTRAINT `courrier_entrant_ibfk_3` FOREIGN KEY (`id_correspondant`) REFERENCES `correspondant` (`id_correspondant`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `courrier_sortant`
--
ALTER TABLE `courrier_sortant`
  ADD CONSTRAINT `courrier_sortant_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `fk_id_coorespondant` FOREIGN KEY (`id_correspondant`) REFERENCES `correspondant` (`id_correspondant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_correspondant`
--
ALTER TABLE `type_correspondant`
  ADD CONSTRAINT `type_correspondant_ibfk_1` FOREIGN KEY (`id_correspondant`) REFERENCES `correspondant` (`id_correspondant`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
