-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 01:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sayaraty`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `Login_admin` varchar(20) NOT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Num_Telephone_admin` varchar(15) DEFAULT NULL,
  `Adresse` varchar(30) DEFAULT NULL,
  `Photo_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`Login_admin`, `Nom`, `Password`, `Email`, `Num_Telephone_admin`, `Adresse`, `Photo_admin`) VALUES
('OussamaMaster', 'Anou Oussama', 'Oussamax_20!', 'oussamanou30@gmail.com', '+212-624768295', '30 Bv Lkhatabi, Hay Salam, Ouj', '../IMG/pdp_oussama');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `Note` int(11) DEFAULT NULL,
  `Statut` tinyint(1) DEFAULT NULL,
  `id_candidat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id_avis`, `contenu`, `Note`, `Statut`, `id_candidat`) VALUES
(1, 'Au début j\'appréhendais et au final je ne regrette pas du tout de m\'y inscrite. Les cours du code y sont très bien expliqués,les entraînements par thème facilitent l\'apprentissage et ce qui était top c\'était d\'avoir pu commencer la conduite, tout en révisant mon code', 4, 1, 'Mohamed_Erramach'),
(2, '\'Des tarifs attractifs\' Les tarifs attractifs et la flexibilité des auto-écoles en ligne comme Ornikar présentent de nombreux avantages. Notamment pour les 18-25 dont l\'activité s\'accommode parfois mal avec les horaires d\'ouverture d\'une auto-école classique.', 4, 1, 'AdilTl'),
(3, '\'Je recommande à 100% !\' Assurance beaucoup moins élevée en termes de tarifs, communication au top avec Sophie, vraiment je recommande à 100% pour les jeunes conducteurs Très satisfaite de la rapidité et de l\'efficacité', 5, 1, 'Oumniah_El');

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `Login_candidat` varchar(30) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Email_candidat` varchar(30) DEFAULT NULL,
  `Sexe_candidat` varchar(6) DEFAULT NULL,
  `Num_telephone` varchar(15) DEFAULT NULL,
  `Num_CIN_candidat` varchar(10) DEFAULT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `Date_d_inscription` date DEFAULT NULL,
  `Prix_payer` double DEFAULT NULL,
  `Nb_heures` int(11) DEFAULT NULL,
  `Statut` tinyint(1) DEFAULT NULL,
  `PHOTO` varchar(30) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`Login_candidat`, `Password`, `Nom`, `Email_candidat`, `Sexe_candidat`, `Num_telephone`, `Num_CIN_candidat`, `Date_de_naissance`, `Date_d_inscription`, `Prix_payer`, `Nb_heures`, `Statut`, `PHOTO`, `Adresse`) VALUES
('AdilTl', 'Adilerr-9', 'Adil Taouil', 'AdilTl_@gmail.com', 'Homme', '+212-678341778', 'S891234', '2000-08-31', '2023-02-10', 3600, 12, 0, 'IMG/Taouil.jpg.crdownload', NULL),
('Amixou', 'AOIEZKDJIO8', 'Amina', 'oussama.anou21@ump.ac.ma', 'Femme', '0624768295', 'B0124', '2000-12-20', '2023-03-07', 0, 0, 0, '../IMG/Candidat.jpg', '15 Boulevard Hamid ElAssri, Hay boussekora'),
('kizuns', 'OZEIDKEZI3813', 'Hmito', 'Hmitoo03@gmail.com', 'Homme', '0694768212', 'O9128', '2003-08-09', '2023-03-07', 0, 0, 0, '../IMG/Candidat.jpg', NULL),
('logos', 'oui', 'karim', 'oussama.anou21@ump.ac.ma', 'Homme', '0624768295', 'E01241', '2003-09-12', '2023-03-07', 0, 0, 0, '../IMG/Candidat.jpg', NULL),
('Mohamed_Erramach', 'mohamed_50!', 'Mohamed Erramach', 'MohaErr9@gmail.com', 'Homme', '+212-789125366', 'H91244', '1986-02-15', '2023-02-20', 3000, 10, 0, 'IMG/Erramach.jpeg', NULL),
('Oumniah_El', '0mniaH.22', 'Oumniah Elkaabi', 'OumniaH3l@gmail.com', 'Femme', '+212-679209405', 'F87332', '1992-05-01', '2023-01-31', 2900, 10, 0, 'IMG/Oumniah.jpg', NULL),
('YOU', 'mohamed_50!', 'Oussama Anou', 'oussama.anou21@ump.ac.ma', 'Homme', '0624768295', 'S0987', '2000-03-04', '2023-03-06', 0, 0, 0, '../IMG/Candidat.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `ID_EXAMEN` int(11) NOT NULL,
  `HORAIR` varchar(50) DEFAULT NULL,
  `Lieu` varchar(20) DEFAULT NULL,
  `Id_candidat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Contenu` text DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Objet` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `Nom`, `Contenu`, `Email`, `Objet`) VALUES
(2, 'Oussama Anou', 'aaaa', 'oussama.anou21@ump.ac.ma', 'P_contact'),
(3, 'Oussama Anou', 'AAAAAZZ', 'oussama.anou21@ump.ac.ma', 'P_contact'),
(4, 'Oussama Anou', 'Bonjour \r\nJ\'ai un problème \r\nCordialement', 'oussama.anou21@ump.ac.ma', 'Problème de contact'),
(5, '222', 'HA', 'oussama.anou21@ump.ac.ma', 'Problème technique'),
(6, '222', 'HA', 'oussama.anou21@ump.ac.ma', 'Problème technique'),
(7, 'karim', 'HAM\r\nKKKLAL?\r\nJAKLJNRZZJ', 'karim21@ump.ac.ma', 'Autre problème');

-- --------------------------------------------------------

--
-- Table structure for table `moniteur`
--

CREATE TABLE `moniteur` (
  `Login_moniteur` varchar(30) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Email_moniteur` varchar(30) DEFAULT NULL,
  `Sexe_moniteur` varchar(6) DEFAULT NULL,
  `Num_telephone_moniteur` varchar(15) DEFAULT NULL,
  `Num_CIN_moniteur` varchar(10) DEFAULT NULL,
  `Num_licence` varchar(20) DEFAULT NULL,
  `Photo_moniteur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moniteur`
--

INSERT INTO `moniteur` (`Login_moniteur`, `Password`, `Nom`, `Email_moniteur`, `Sexe_moniteur`, `Num_telephone_moniteur`, `Num_CIN_moniteur`, `Num_licence`, `Photo_moniteur`) VALUES
('BrahimBihi', 'LeviBihi90!', 'Brahim Bassor', 'Brahimb_89@gmail.com', 'Homme', '0679121314', 'P7812', 'Ou1298455', '../IMG/brahim-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `ID_OFFRE` int(11) NOT NULL,
  `Titre` varchar(60) DEFAULT NULL,
  `Prix` double DEFAULT NULL,
  `Statut` tinyint(1) DEFAULT NULL,
  `Commentaire` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`ID_OFFRE`, `Titre`, `Prix`, `Statut`, `Commentaire`) VALUES
(1, 'Pack Code de la route', 500, 1, 'Pour ceux qui veulent réviser le code de la conduite'),
(2, 'Pack Permis - Code + 10h De conduite + Examen de permis', 2800, 1, 'Le grand classique de ceux qui souhaitent réussir le permis. Le dossier, le controle des yeux et la TVA inclus'),
(3, 'Pack Permis Plus - Code + 20h De conduite + Examen de permis', 3400, 1, 'Un offre convenable pour assister trés bien a la conduite. Le dossier, le controle des yeux et la TVA inclus');

-- --------------------------------------------------------

--
-- Table structure for table `permis`
--

CREATE TABLE `permis` (
  `ID_PERMIS` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `candidat_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `ID_SEANCE` int(11) NOT NULL,
  `Heure` varchar(20) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `id_candidat` varchar(30) DEFAULT NULL,
  `id_moniteur` varchar(30) DEFAULT NULL,
  `id_vehicule` varchar(30) DEFAULT NULL,
  `Jour` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `Num_matricule` varchar(20) NOT NULL,
  `Marque` varchar(10) DEFAULT NULL,
  `Modele` varchar(50) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Disponibilite` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`Login_admin`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `fk_idcandidat` (`id_candidat`);

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`Login_candidat`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`ID_EXAMEN`),
  ADD KEY `fk_id_candidat` (`Id_candidat`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`Login_moniteur`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_OFFRE`);

--
-- Indexes for table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`ID_PERMIS`),
  ADD KEY `fk_candidat_id` (`candidat_id`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`ID_SEANCE`),
  ADD KEY `fk_candidat` (`id_candidat`),
  ADD KEY `fk_moniteur` (`id_moniteur`),
  ADD KEY `fk_vehicule` (`id_vehicule`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`Num_matricule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `ID_OFFRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_idcandidat` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`Login_candidat`) ON DELETE CASCADE;

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_id_candidat` FOREIGN KEY (`Id_candidat`) REFERENCES `candidat` (`Login_candidat`) ON DELETE CASCADE;

--
-- Constraints for table `permis`
--
ALTER TABLE `permis`
  ADD CONSTRAINT `fk_candidat_id` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`Login_candidat`) ON DELETE CASCADE;

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_candidat` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`Login_candidat`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_moniteur` FOREIGN KEY (`id_moniteur`) REFERENCES `moniteur` (`Login_moniteur`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_vehicule` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`Num_matricule`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
