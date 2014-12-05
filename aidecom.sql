
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 05 Décembre 2014 à 07:05
-- Version du serveur: 5.1.71
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `aidecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` text COLLATE latin1_general_ci,
  `mail` text COLLATE latin1_general_ci,
  `passe` text COLLATE latin1_general_ci,
  `about` text COLLATE latin1_general_ci,
  `full_name` text COLLATE latin1_general_ci,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` text COLLATE latin1_general_ci,
  `grade` text COLLATE latin1_general_ci,
  `url` text COLLATE latin1_general_ci,
  `rt` text COLLATE latin1_general_ci,
  `ban` int(11) DEFAULT NULL,
  `image` text COLLATE latin1_general_ci,
  `isconnected` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `ref` text COLLATE latin1_general_ci,
  `vote` decimal(65,0) DEFAULT NULL,
  `class` text COLLATE latin1_general_ci,
  `ecole` text COLLATE latin1_general_ci,
  `numero` text COLLATE latin1_general_ci,
  `urlfb` text COLLATE latin1_general_ci,
  `pays` text COLLATE latin1_general_ci,
  `msgact` text COLLATE latin1_general_ci,
  `statut` text COLLATE latin1_general_ci,
  `datnais` text COLLATE latin1_general_ci,
  `couverture` text COLLATE latin1_general_ci,
  `lastst` text COLLATE latin1_general_ci,
  `first_name` text COLLATE latin1_general_ci,
  `last_name` text COLLATE latin1_general_ci,
  `username` text COLLATE latin1_general_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`id`, `mail`, `passe`, `about`, `full_name`, `date`, `ip`, `grade`, `url`, `rt`, `ban`, `image`, `isconnected`, `used`, `ref`, `vote`, `class`, `ecole`, `numero`, `urlfb`, `pays`, `msgact`, `statut`, `datnais`, `couverture`, `lastst`, `first_name`, `last_name`, `username`) VALUES
('1001745', 'grifrose@gmail.com', 'fcd8780493d9d11d29031b928a9da358a6f48627fff0cb7e80fb8107de86e0c365dc9cf8fe2fc05a6ce6d75803b78ac894d82a396042312a995ef63b5dd4dd11', NULL, 'nki omar', '2021-06-14 00:00:00', NULL, '0', NULL, NULL, NULL, 'http://127.0.0.1/rt.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nki', 'omar', 'kayi'),
('1001672', 'moha@gmail.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', NULL, 'John  Test', '2021-06-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John ', 'Test', 'test'),
('1001929', 'grifroe@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'Hamza Bourrahim', '2021-06-14 00:00:00', NULL, '5', NULL, NULL, NULL, 'http://127.0.0.1/lionel-messi-smile.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hamza', 'Bourrahim', 'naper01'),
('1001887', 'hamza@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'John Test', '2022-06-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John', 'Test', 'hamza'),
('1001476', 'you@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'You right', '2026-06-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'You', 'right', 'iimet'),
('1001543', 'houssa@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'Houssam Bourrahim', '2026-06-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Houssam', 'Bourrahim', 'housa'),
('1001928', 'cool@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'Mpp team', '2001-09-14 00:00:00', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mpp', 'team', 'test'),
('1001790', 'barack@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'Barack Obama', '2011-08-14 00:00:00', NULL, '0', NULL, NULL, NULL, 'http://www.jim.fr/e-docs/00/02/37/70/carac_photo_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Barack', 'Obama', 'brak'),
('1001707', 'redacteur@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'redacteur Test', '2001-09-14 00:00:00', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'redacteur', 'Test', 'redact'),
('1001487', 'redact@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'redact test', '2003-09-14 00:00:00', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'redact', 'test', 'test'),
('1001506', 'omarfjff@gmail.com', '041201d7a5a8ec962517abc1f4845a3ba855564bba84870aa75186ac8361903ef21f0bce0865829a688c5b5e13e306345478ae475ad5cf28af8be6c73f9c8cc6', NULL, 'hhh hhh', '2004-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hhh', 'hhh', NULL),
('100174', 'lolhamza@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'hamza bourrahim', '2004-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hamza', 'bourrahim', NULL),
('1001592', 'wassim@gmail.com', '69663d806e0906953a35b36a32b12fae5982188816a3d169ddf8c3e4bf483d99720af201e00f640b2cef0e0ef12d0b6ddc0d8c62c1f3cb2612d593ff66bbc4f3', NULL, 'wassim test', '2004-12-14 00:00:00', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wassim', 'test', NULL),
('1001730', 'mehdi@gm.com', '106501a298aad9719b646540c93ad3773f729b1de8f1f40cb357426b3059bcaed1f99ef5f0a4788134af186d63078182578b395b2fdd1e4cdca1a22ba8b1b7a7', NULL, 'mehdi mehdi', '2004-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mehdi', 'mehdi', NULL),
('1001797', 'maxance@gmail.com', '0460615cc84d91d99fa2ad15ff43ba6d6041c82969627b8f8117e1cb5c283ac541144a8987440199d59fa2d6c9d4533e118b1df9f72c06ac5a1f5ea24d375320', NULL, 'delong maxance', '2004-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delong', 'maxance', NULL),
('1001186', 'simon@gmail.com', '24d802b145245d7fc4400c898af6eddc8e89dd05506f2af39b2612ead8970e31b8522aab07d51c1de0068768ad2ab3fcdf33d66da3ea878ceaf656f469e581dc', NULL, 'simon simon', '2005-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'simon', 'simon', NULL),
('1001310', 'loys@gmail.com', '223efabf7e910f76d3f9955891ef41202e89f823798a4a5946c51f9dea599c385ae716633a9ac2ec4cb19c13c72b985e1574611398454dbf15bd98b3b9aa54c2', NULL, 'loys loys', '2005-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'loys', 'loys', NULL),
('1001197', 'hamzabour@gmail.com', '750be7cc52ba8d5066381c5f35c9152c41d958a206cf0c5ef42602362a47d98aed6e0d978bd702430489553ee667dfa6ea4c7f6641bba87143c908937ed8e1aa', NULL, 'bourrahim hamza', '2005-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bourrahim', 'hamza', NULL),
('100155', 'dey@gmail.com', '88b80e5bb2d907530e510703968c6b29dd5f415d2337e846672f0259f39cce0ee3d79d50954866c154055d314bb4a6e666e256a492aac0175b10d9b86a48aea3', NULL, 'dey dey', '2005-12-14 00:00:00', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dey', 'dey', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `aidecom_chat`
--

CREATE TABLE IF NOT EXISTS `aidecom_chat` (
  `id` text,
  `sender_id` text,
  `message` text,
  `date` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `aidecom_chat`
--

INSERT INTO `aidecom_chat` (`id`, `sender_id`, `message`, `date`) VALUES
('msg-1034', '1001592', ':D :p :* :) :( :boy: :computer:', '3'),
('msg-1029', '1001186', 'oui :)', '3'),
('msg-829', '1001310', 'cou :D', '3'),
('msg-1170', '100155', 'dey :D', '6');

-- --------------------------------------------------------

--
-- Structure de la table `aidecom_mails`
--

CREATE TABLE IF NOT EXISTS `aidecom_mails` (
  `id` text,
  `subject` text,
  `sender_id` text,
  `orga_id` text,
  `message` text,
  `date` text,
  `ip` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `aidecom_mails`
--

INSERT INTO `aidecom_mails` (`id`, `subject`, `sender_id`, `orga_id`, `message`, `date`, `ip`) VALUES
('sen-211', 'subje', 'subje', 'undefined', 'sdjgjg', '3', NULL),
('sen-416', 'Test', '1001592', 'undefined', 'bonjour', '4', NULL),
('sen-1183', 'FDGFG', '100155', 'undefined', 'HHGFH', '6', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `aidecom_messages`
--

CREATE TABLE IF NOT EXISTS `aidecom_messages` (
  `id_recp` text,
  `id_exp` text,
  `message` text,
  `image` text,
  `fichier` text,
  `projet` text,
  `convo_id` text,
  `recp_is_co` text,
  `date` text,
  `last_min` text,
  `hour` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `aidecom_organismes`
--

CREATE TABLE IF NOT EXISTS `aidecom_organismes` (
  `id` text,
  `name` text CHARACTER SET utf8,
  `email` text,
  `tel` text,
  `adresse` text,
  `chef` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `aidecom_organismes`
--

INSERT INTO `aidecom_organismes` (`id`, `name`, `email`, `tel`, `adresse`, `chef`) VALUES
('123', 'Commite des refugees libie', 'libie@gmail.com', '075859394', NULL, NULL),
('2234', 'Maison d''accuil France', 'maison@gmail.com', NULL, NULL, NULL),
('6579', 'Maison d''accuil Egypte', 'egypte.m@gmail.com', '086574848', NULL, NULL),
('5649', 'Hopitale de service Tunisie', 'tunisdg@gmal.com', '054759500', NULL, NULL),
('5430', 'Commite des refugees Egypte', 'egypte.comit@gmail.com', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
