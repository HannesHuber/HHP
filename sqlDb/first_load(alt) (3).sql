-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Mrz 2018 um 13:35
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hhp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alters_klassen`
--

CREATE TABLE `alters_klassen` (
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `alters_klassen`
--

INSERT INTO `alters_klassen` (`Von`, `Bis`, `Klasse`) VALUES
(0, 12, 'Kinder'),
(13, 15, 'Schüler'),
(16, 17, 'Jugend'),
(18, 20, 'Junioren'),
(21, 120, 'Aktive');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alters_klassen_masters`
--

CREATE TABLE `alters_klassen_masters` (
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `alters_klassen_masters`
--

INSERT INTO `alters_klassen_masters` (`Von`, `Bis`, `Klasse`) VALUES
(30, 34, 'AK0'),
(35, 39, 'AK1'),
(40, 44, 'AK2'),
(45, 49, 'AK3'),
(50, 54, 'AK4'),
(55, 59, 'AK5'),
(60, 64, 'AK6'),
(65, 69, 'AK7'),
(70, 74, 'AK8'),
(75, 79, 'AK9'),
(80, 130, 'AK10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alters_klassen_zk`
--

CREATE TABLE `alters_klassen_zk` (
  `Id` int(11) NOT NULL,
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `alters_klassen_zk`
--

INSERT INTO `alters_klassen_zk` (`Id`, `Von`, `Bis`, `Klasse`) VALUES
(1, 0, 11, 'Kinder'),
(2, 12, 14, 'Schüler'),
(3, 15, 17, 'Jugend'),
(4, 18, 20, 'Junioren'),
(5, 21, 100, 'Aktive');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bl_grp`
--

CREATE TABLE `bl_grp` (
  `Grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bl_grp`
--

INSERT INTO `bl_grp` (`Grp`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bridgen`
--

CREATE TABLE `bridgen` (
  `Bridge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bridgen`
--

INSERT INTO `bridgen` (`Bridge`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datenbanken`
--

CREATE TABLE `datenbanken` (
  `Id_Db` int(11) NOT NULL,
  `Datenbank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flaggen_staaten`
--

CREATE TABLE `flaggen_staaten` (
  `IdStaat` int(11) NOT NULL,
  `Image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `flaggen_staaten`
--

INSERT INTO `flaggen_staaten` (`IdStaat`, `Image`) VALUES
(0, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geschlecht`
--

CREATE TABLE `geschlecht` (
  `Geschlecht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `geschlecht`
--

INSERT INTO `geschlecht` (`Geschlecht`) VALUES
('Männlich'),
('Weiblich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gewichtsklassen`
--

CREATE TABLE `gewichtsklassen` (
  `Id` int(11) NOT NULL,
  `Kinder_M` int(11) DEFAULT NULL,
  `Kinder_W` int(11) DEFAULT NULL,
  `Schüler_M` int(11) DEFAULT NULL,
  `Schüler_W` int(11) DEFAULT NULL,
  `Aktive_M` int(11) DEFAULT NULL,
  `Aktive_W` int(11) DEFAULT NULL,
  `Jugend_M` int(11) DEFAULT NULL,
  `Jugend_W` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `gewichtsklassen`
--

INSERT INTO `gewichtsklassen` (`Id`, `Kinder_M`, `Kinder_W`, `Schüler_M`, `Schüler_W`, `Aktive_M`, `Aktive_W`, `Jugend_M`, `Jugend_W`) VALUES
(1, 30, 32, 35, 40, 56, 48, 50, 44),
(2, 35, 36, 40, 44, 62, 53, 56, 48),
(3, 40, 40, 45, 48, 69, 58, 62, 53),
(4, 45, 44, 50, 53, 77, 63, 69, 58),
(5, 50, 48, 56, 58, 85, 69, 77, 63),
(6, 56, 53, 62, 63, 94, 74, 85, 69),
(7, 62, 1, 69, 1, 105, 90, 94, 1),
(8, 1, 0, 1, 0, 1, 1, 1, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gruppen_aus`
--

CREATE TABLE `gruppen_aus` (
  `Gruppen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `gruppen_aus`
--

INSERT INTO `gruppen_aus` (`Gruppen`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `heber`
--

CREATE TABLE `heber` (
  `IdHeber` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `IdVerein` int(11) NOT NULL,
  `Jahrgang` int(11) NOT NULL,
  `Gewicht` double(11,2) NOT NULL,
  `Land` text NOT NULL,
  `Geschlecht` text NOT NULL,
  `IdStaat` int(11) NOT NULL,
  `Auswahl` text NOT NULL,
  `AlKl` text NOT NULL,
  `GwKl` text NOT NULL,
  `Bundesliga` int(11) NOT NULL,
  `Id_Online_Db` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `heber`
--

INSERT INTO `heber` (`IdHeber`, `Name`, `Vorname`, `IdVerein`, `Jahrgang`, `Gewicht`, `Land`, `Geschlecht`, `IdStaat`, `Auswahl`, `AlKl`, `GwKl`, `Bundesliga`, `Id_Online_Db`) VALUES
(16, 'Littmann', 'Melina', 9000, 2003, 56.00, '', 'Weiblich', 1, '', 'Schüler', '-58', 0, ''),
(17, 'Lammel', ' Elin', 30, 2003, 40.10, 'TH', 'Weiblich', 1, '', 'Schüler', '-44', 0, ''),
(18, 'Breitschuh', ' Marie Sophie', 9000, 2003, 48.10, '', 'Weiblich', 0, '', 'Schüler', '-53', 0, ''),
(19, 'Sensche', ' Elias', 30, 2003, 40.40, 'TH', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(20, 'Weißbeck', 'Benjamin', 15, 2003, 56.40, 'SN', 'Männlich', 1, '', 'Schüler', '-62', 0, ''),
(21, 'Barthel', ' Marlen', 9000, 2003, 33.20, '', 'Weiblich', 0, '', 'Schüler', '-40', 0, ''),
(22, 'Schlittig', ' Vicky', 24, 2003, 51.30, 'SN', 'Weiblich', 1, '', 'Schüler', '-53', 0, ''),
(24, 'Günnel', ' Maurice', 35, 2003, 44.20, 'SN', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(25, 'Exner', ' Elias', 9000, 2003, 37.10, '', 'Männlich', 0, '', 'Schüler', '-40', 0, ''),
(27, 'Schadt', ' Egor', 27, 2003, 51.20, 'BB', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(28, 'Klünder', ' Kevin', 6, 2003, 36.10, 'SN', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(29, 'Müller', 'Lucas', 6, 2003, 36.20, 'SN', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(30, 'Fähsecke', ' Marie', 38, 2003, 38.70, 'BW', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(33, 'Knop', ' Leo', 34, 2003, 42.30, 'RP', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(37, 'Blume', ' Samira', 9000, 2002, 44.60, '', 'Weiblich', 0, '', 'Jugend', '-48', 0, ''),
(39, 'Weiner', 'Sven', 32, 2002, 63.20, 'BW', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(40, 'Leuthner', ' Kevin', 32, 2002, 58.90, 'BW', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(109, 'Hartenberger', 'Michelle', 35, 2002, 46.10, 'SN', 'Weiblich', 1, '', 'Jugend', '-48', 0, ''),
(110, 'Biener', 'Marie-Kristin', 9000, 2002, 44.40, '', 'Weiblich', 0, '', 'Jugend', '-48', 0, ''),
(111, 'Bergmann', 'Jannick', 9000, 2001, 62.60, '', 'Männlich', 0, '', 'Jugend', '-69', 0, ''),
(112, 'Boeder', 'Jordan', 9000, 2001, 50.10, '', 'Männlich', 0, '', 'Jugend', '-56', 0, ''),
(113, 'Blume', 'Lukas', 9000, 2001, 52.00, '', 'Männlich', 0, '', 'Jugend', '-56', 0, ''),
(114, 'Dunka', 'Josef', 9000, 2002, 43.50, '', 'Männlich', 0, '', 'Jugend', '-50', 0, ''),
(115, 'Drechsel', 'Nikita', 15, 2001, 57.10, 'SN', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(116, 'Deutschmann', 'David', 38, 2001, 74.30, 'BW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(117, 'Bröse', 'Maximilian', 27, 2002, 44.00, 'BB', 'Männlich', 0, '', 'Jugend', '-50', 0, ''),
(118, 'Bretsche', 'Mika', 7, 2002, 80.10, 'TH', 'Männlich', 0, '', 'Jugend', '-85', 0, ''),
(119, 'Feil', 'Bastian', 9000, 2001, 63.20, '', 'Männlich', 0, '', 'Jugend', '-69', 0, ''),
(120, 'Feil', 'Philipp', 9000, 2001, 64.40, '', 'Weiblich', 0, '', 'Jugend', '-69', 0, ''),
(121, 'Feil', 'Nils', 9000, 2001, 51.30, '', 'Männlich', 0, '', 'Jugend', '-56', 0, ''),
(122, 'Elsner', 'Eric', 9000, 2002, 69.20, '', 'Männlich', 0, '', 'Jugend', '-77', 0, ''),
(123, 'Ehrig', 'Nino', 9000, 2001, 59.20, '', 'Weiblich', 0, '', 'Jugend', '-63', 0, ''),
(124, 'Grau', 'Eric', 5, 2001, 65.40, 'BY', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(125, 'Friedrich', 'Raphael', 2, 2001, 74.90, 'RP', 'Männlich', 0, '', 'Jugend', '-77', 1, ''),
(126, 'Fricke', 'Marc', 27, 2002, 88.00, 'BB', 'Männlich', 0, '', 'Jugend', '-94', 0, ''),
(127, 'Fricke', 'Julian', 28, 2003, 43.80, 'BW', 'Männlich', 0, '', 'Schüler', '-45', 0, ''),
(128, 'Florian', 'Maximilian', 7, 2001, 75.50, 'TH', 'Männlich', 0, '', 'Jugend', '-77', 0, ''),
(130, 'Grillmayer', 'Paula', 3, 2003, 52.10, 'BY', 'Weiblich', 1, '', 'Jugend', '-53', 1, ''),
(132, 'Hein', 'Karl', 31, 2002, 44.60, 'BE', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(133, 'Greiner', 'Marlon', 7, 2003, 88.20, 'TH', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(134, 'Hansch', 'Dennis', 36, 2002, 47.30, 'BB', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(135, 'Hanft', 'Dominik', 12, 2001, 73.70, 'NW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(136, 'Hagedorn', 'Emily', 34, 2002, 55.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(137, 'Haaß', 'David', 32, 2002, 88.80, 'BW', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(138, 'Günther', 'Moritz', 25, 2002, 88.40, 'NI', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(139, 'Hofmann', 'Elisabeth', 32, 2001, 57.70, 'BW', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(140, 'Hörner', 'Amelie', 11, 2002, 56.60, 'BB', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(141, 'Kaiser', 'Davina', 8, 2001, 72.10, 'SL', 'Weiblich', 1, '', 'Jugend', '+69', 0, ''),
(142, 'Keßler', 'Emily', 19, 2002, 45.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-48', 0, ''),
(143, 'Kaufhold', 'Kimberley', 15, 2001, 46.00, 'SN', 'Weiblich', 1, '', 'Jugend', '-48', 0, ''),
(144, 'Maier', 'Moritz', 33, 2001, 79.80, 'BY', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(145, 'Ludwig', 'Erik', 26, 2001, 75.90, 'SN', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(146, 'Loose', 'W', 10, 2002, 30.00, 'BW', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(147, 'Knodel', 'Lucas', 19, 2002, 37.00, 'RP', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(148, 'Kluge', 'Fabian', 28, 2001, 63.00, 'BW', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(149, 'Müller', 'Lukas', 16, 2001, 74.80, 'BW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(150, 'Müller', 'Ron', 36, 2001, 54.50, 'BB', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(151, 'Möske', 'Charline', 22, 2003, 37.20, 'BY', 'Weiblich', 1, '', 'Schüler', '-40', 0, ''),
(152, 'Meißner', 'Alexander', 31, 2003, 38.70, 'BE', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(153, 'Mattig', 'Lea Justine', 9, 2001, 58.30, 'BB', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(154, 'Pilz', 'Daniel', 3, 2001, 73.40, 'BY', 'Männlich', 1, '', 'Jugend', '-77', 1, ''),
(155, 'Pham Manh', 'Tuan', 27, 2001, 42.80, 'BB', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(156, 'Peter', 'Dave', 38, 2001, 56.10, 'BW', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(157, 'Perlt', 'Julia ', 30, 2001, 48.60, 'TH', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(158, 'Neuhäuser', 'Leonie', 7, 2003, 39.30, 'TH', 'Weiblich', 1, '', 'Schüler', '-40', 0, ''),
(159, 'Schelhorn', 'Tarek-Wilhelm', 30, 2001, 87.40, 'TH', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(160, 'Sailer', 'Philipp', 32, 2001, 70.20, 'BW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(161, 'Rössler', 'Laura', 18, 2001, 56.50, 'RP', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(162, 'Reum', 'Ben', 14, 2002, 55.25, 'TH', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(163, 'Plüger', 'Adrian', 30, 2001, 62.00, 'TH', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(164, 'Schuster', 'Luc-Dante', 13, 2001, 52.00, 'BE', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(165, 'Schönsiegel', 'Celina', 32, 2002, 39.60, 'BW', 'Weiblich', 1, '', 'Jugend', '-44', 0, ''),
(166, 'Schönherr', 'Richard', 15, 2002, 60.20, 'SN', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(167, 'Schneider', 'Milena', 35, 2001, 61.20, 'SN', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(168, 'Schemmel', 'Tobias', 3, 2001, 63.10, 'BY', 'Männlich', 1, '', 'Jugend', '-69', 1, ''),
(169, 'Stoye', 'Josefine', 15, 2001, 53.00, 'SN', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(170, 'Seitz', 'Bianca', 37, 2001, 46.10, 'HH', 'Weiblich', 1, '', 'Jugend', '-48', 0, ''),
(171, 'Seifert', 'Tim', 35, 2002, 45.60, 'SN', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(172, 'Sebalj', 'David', 39, 2001, 45.00, 'BW', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(173, 'Schütte', 'Fynn', 31, 2002, 48.20, 'BE', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(174, 'Weiss', 'Philipp', 7, 2001, 57.65, 'TH', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(175, 'Weiner', 'Luca', 32, 2001, 57.20, 'BW', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(176, 'Ursolino', 'Angelina', 32, 2002, 56.80, 'BW', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(177, 'Truong-Bach', 'Lisa Mai', 27, 2001, 45.20, 'BB', 'Weiblich', 1, '', 'Jugend', '-48', 0, ''),
(178, 'Trost', 'Hannes', 9000, 2001, 65.30, '', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(179, 'Wendlandt', 'Jannes', 21, 2001, 63.80, 'BB', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(180, 'Woecht', 'Sebastian', 28, 2001, 69.00, 'BW', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(181, 'Wolf', 'Ricardo Aaron', 36, 2002, 54.90, 'BB', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(182, 'Zagermann', 'Eric', 17, 2001, 86.00, 'TH', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(185, 'Schache', 'Sina-Franziska', 26, 2002, 52.60, 'SN', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(186, 'Da Silva Prior', 'Leon Cavalho', 2, 2002, 63.10, 'RP', 'Männlich', 0, '', 'Jugend', '-69', 1, ''),
(187, 'Loose', 'Kyra', 10, 2002, 48.50, 'BW', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(188, 'Kopp', 'Madita', 39, 2001, 52.90, 'BW', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(189, 'Kessler', 'Ben', 19, 2005, 50.00, 'RP', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(190, 'Stöcklin', 'Tobias', 40, 2005, 55.00, 'BY', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(191, 'Schuler', 'Justin', 41, 2005, 70.00, 'BW', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(192, 'Grätz', 'Tizian', 11, 2005, 50.00, 'BB', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(193, 'Saini', 'Rishabh', 33, 2005, 50.00, 'BY', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(194, 'Graze', 'Elias', 10, 2005, 50.00, 'BW', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(195, 'Sailer', 'Lars', 32, 2005, 50.00, 'BW', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(196, 'Spatola', 'Moriano', 10, 2005, 75.00, 'BW', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(197, 'Soldner', 'Farin', 32, 2005, 75.00, 'BW', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(198, 'Haupt', 'Christian', 42, 2005, 50.00, 'BY', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(199, 'Jutzi', 'Tom', 43, 2003, 50.00, 'BW', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(200, 'Reischl', 'Jonas', 44, 2003, 50.00, 'BY', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(201, 'Schneider', 'Julian', 19, 2003, 50.00, 'RP', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(203, 'Kampp', 'Marcel', 41, 2003, 0.00, 'BW', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(205, 'Bühr', 'Yannik', 28, 2003, 20.00, 'BW', 'Männlich', 0, '', 'Schüler', '-35', 0, ''),
(206, 'Reichensperger', 'Marcel', 43, 2006, 43.90, 'BW', 'Männlich', 1, '', 'Kinder', '-45', 0, ''),
(207, 'Hofmann', 'Emanuel', 28, 2006, 50.00, 'BW', 'Männlich', 1, '', 'Kinder', '-50', 0, ''),
(208, 'Junemann', 'Eric', 11, 2006, 50.00, 'BB', 'Männlich', 1, '', 'Kinder', '-50', 0, ''),
(209, 'Löffler', 'Nils', 2, 2004, 31.70, 'RP', 'Männlich', 1, '', 'Schüler', '-35', 1, ''),
(210, 'Friend', 'Hutch', 54, 2004, 33.30, 'HE', 'Männlich', 0, '', 'Schüler', '-35', 0, ''),
(211, 'Wagenbach', 'Lars', 43, 2004, 36.00, 'BW', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(212, 'Stanton', 'Elijah', 47, 2004, 39.30, 'BY', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(213, 'Rukabert', 'Benjamin', 44, 2004, 0.00, 'BY', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(214, 'Holetz', 'Tim', 32, 2004, 44.00, 'BW', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(215, 'Häfele', 'Alexander', 48, 2004, 43.60, 'BY', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(216, 'Köhler', 'Raik', 19, 2004, 42.00, 'RP', 'Männlich', 1, '', 'Schüler', '-45', 0, ''),
(217, 'Seibold', 'Florian', 44, 2004, 54.40, 'BY', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(218, 'Grätz', 'Julian', 11, 2004, 47.60, 'BB', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(219, 'Stanton', 'Rowan', 47, 2004, 52.80, 'BY', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(220, 'Klassig', 'Conner', 32, 2004, 53.80, 'BW', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(222, 'Sattler', 'Yannik', 19, 2004, 54.50, 'RP', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(223, 'Blas', 'Noah', 9000, 2004, 58.60, '', 'Männlich', 0, '', 'Schüler', '-62', 0, ''),
(224, 'Still', 'Robin', 46, 2004, 62.30, 'BY', 'Männlich', 1, '', 'Schüler', '-69', 0, ''),
(225, 'Schönsiegel', 'Justin', 32, 2004, 64.00, 'BW', 'Männlich', 1, '', 'Schüler', '-69', 0, ''),
(226, 'Frey', 'Moritz', 12, 2004, 69.70, 'NW', 'Weiblich', 0, '', 'Schüler', '+63', 0, ''),
(227, 'Fischer', 'Finn', 9000, 2003, 50.00, '', 'Männlich', 0, '', 'Schüler', '-50', 0, ''),
(228, 'Suschko', 'Julian', 43, 2003, 55.00, 'BW', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(229, 'Esterle', 'Michael', 9000, 2003, 50.00, '', 'Männlich', 0, '', 'Schüler', '-50', 0, ''),
(230, 'Kazanc', 'Demian', 2, 2003, 42.20, 'RP', 'Männlich', 1, '', 'Schüler', '-45', 1, ''),
(231, 'Hinderberger', 'Tim', 2, 2003, 37.30, 'RP', 'Männlich', 1, '', 'Schüler', '-40', 1, ''),
(232, 'Fischer', 'Tom', 9000, 2001, 49.70, '', 'Weiblich', 0, '', 'Jugend', '-53', 0, ''),
(233, 'Stefan', 'Tim', 49, 2001, 44.00, 'RP', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(234, 'Kurz', 'Lorenz', 49, 2001, 62.00, 'RP', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(235, 'Baumgart', 'Tim', 9000, 2001, 77.60, '', 'Männlich', 0, '', 'Jugend', '-85', 0, ''),
(236, 'Poled', 'Nicolas', 50, 2001, 75.20, 'BW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(247, 'Dudorkhanov', 'Indira', 9000, 2008, 27.80, '', 'Männlich', 1, '', 'Kinder', '-30', 0, ''),
(248, 'Gürth', 'Nils', 30, 2007, 34.40, 'TH', 'Männlich', 1, '', 'Kinder', '-35', 0, ''),
(249, 'Maas', 'Denny', 30, 2005, 47.70, 'TH', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(250, 'Langkabel', 'Laura', 30, 2005, 43.40, 'TH', 'Weiblich', 1, '', 'Schüler', '-44', 0, ''),
(251, 'Dudorkhanov', 'Iman', 9000, 2005, 29.70, '', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(252, 'Dudorkhanov', 'Ibrahim', 9000, 2004, 43.00, '', 'Männlich', 0, '', 'Schüler', '-45', 0, ''),
(253, 'Steudner', 'Max', 30, 2004, 52.20, 'TH', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(254, 'Oelling', 'Jakob', 9000, 2003, 50.00, '', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(255, 'Walther', 'Eric-Rene', 9000, 2003, 85.90, '', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(256, 'John', 'Leon', 9000, 2002, 73.90, '', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(257, 'Motek', 'Jonas', 9000, 2001, 50.00, '', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(258, 'Oelling', 'Jakob', 51, 2006, 56.30, 'TH', 'Männlich', 1, '', 'Kinder', '-62', 0, ''),
(259, 'Lanckrock', 'Justin', 53, 2005, 28.00, 'HE', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(260, 'Kleine', 'Ryuu', 53, 2005, 37.40, 'HE', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(261, 'Vasilev ', 'Filip', 53, 2003, 48.40, 'HE', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(262, 'Konrad', 'Mark', 53, 2003, 37.90, 'HE', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(263, 'Moritz', 'Justus', 53, 2003, 51.95, 'HE', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(264, 'Georgiev', 'Aleks', 15, 2002, 50.00, 'SN', 'Männlich', 1, '', 'Jugend', '-50', 0, ''),
(265, 'Lagah', 'Goutam', 53, 2002, 80.50, 'HE', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(266, 'Malkowsky', 'Asarja', 53, 2001, 50.00, 'HE', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(267, 'Alvarez', 'Carlos', 25, 2004, 35.20, 'NI', 'Männlich', 0, '', 'Schüler', '-40', 0, ''),
(268, 'De Nuccio', 'Leon', 54, 2004, 46.90, 'HE', 'Männlich', 0, '', 'Schüler', '-50', 0, ''),
(269, 'Houede', 'Daniel', 54, 2004, 49.20, 'HE', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(270, 'Funk', 'Tim Patrick', 54, 2004, 50.00, 'HE', 'Männlich', 0, '', 'Schüler', '-50', 0, ''),
(271, 'Marx', 'Magnus', 52, 2005, 34.50, 'BW', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(272, 'Demirtas', 'Efe Can', 54, 2004, 15.00, 'HE', 'Männlich', 0, '', 'Schüler', '-35', 0, ''),
(273, 'Schreiner', 'Alexander', 54, 2003, 33.20, 'HE', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(274, 'Hallstein', 'Simon', 54, 2003, 50.50, 'HE', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(275, 'van de Weijer', 'Lars', 54, 2002, 60.00, 'HE', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(276, 'Simon', 'Mika', 14, 2004, 45.20, 'TH', 'Männlich', 1, '', 'Schüler', '-50', 0, ''),
(277, 'Neumann', 'Robin', 12, 2006, 57.90, 'NW', 'Männlich', 1, '', 'Kinder', '-62', 0, ''),
(278, 'Hennecke', 'Fabian', 12, 2005, 36.00, 'NW', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(279, 'Schilling', 'Oskar', 12, 2005, 52.50, 'NW', 'Männlich', 1, '', 'Schüler', '-56', 0, ''),
(280, 'Brückner', 'Sophie', 12, 2005, 34.00, 'NW', 'Weiblich', 0, '', 'Schüler', '-40', 0, ''),
(281, 'Hennecke', 'Pascal', 12, 2004, 69.20, 'NW', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(282, 'Reuter', 'Tom David', 12, 2004, 58.30, 'NW', 'Männlich', 1, '', 'Schüler', '-62', 0, ''),
(283, 'Heß', 'Damian', 7, 2007, 40.50, 'TH', 'Männlich', 1, '', 'Kinder', '-45', 0, ''),
(284, 'Kallenbach', 'Luca', 7, 2006, 53.10, 'TH', 'Männlich', 1, '', 'Kinder', '-56', 0, ''),
(285, 'Schweng', 'Eileen', 7, 2005, 33.10, 'TH', 'Weiblich', 1, '', 'Schüler', '-40', 0, ''),
(286, 'Langer', 'Tommy', 7, 2004, 35.60, 'TH', 'Männlich', 1, '', 'Schüler', '-40', 0, ''),
(287, 'Langbein', 'John', 7, 2004, 31.00, 'TH', 'Männlich', 1, '', 'Schüler', '-35', 0, ''),
(288, 'Jahn', 'Marlon', 7, 2003, 89.90, 'TH', 'Männlich', 1, '', 'Schüler', '+69', 0, ''),
(289, 'Emick', 'Jan', 9000, 2004, 74.20, '', 'Männlich', 0, '', 'Schüler', '+69', 0, ''),
(290, 'Schröpfer', 'Mo', 9000, 2003, 57.00, '', 'Männlich', 1, '', 'Schüler', '-62', 0, ''),
(292, 'Treutlein', 'Mandy', 9000, 1990, 69.75, '', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(293, 'Kusterer', 'Sabine', 9000, 1990, 58.70, '', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(294, 'Velagic', 'Almir', 9000, 1990, 150.30, '', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(295, 'Prochorow', 'Alexej', 9000, 1990, 136.45, '', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(296, 'Perez Valentin', 'Lydia', 9000, 1990, 75.85, '', 'Weiblich', 6, '', 'Aktive', '-90', 0, ''),
(297, 'Kingue Matam', 'Bernadin', 9000, 1990, 70.70, '', 'Männlich', 2, '', 'Aktive', '-77', 0, ''),
(298, 'Spiess', 'Jürgen', 9000, 1990, 106.90, '', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(299, 'Müller', 'Nico', 9000, 1990, 76.00, '', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(300, 'Lang', 'Max', 9000, 1990, 78.00, '', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(301, 'Michel', 'Anais', 9000, 1990, 49.55, '', 'Weiblich', 2, '', 'Aktive', '-53', 0, ''),
(302, 'Bouly', 'Kevin', 9000, 1990, 96.90, '', 'Männlich', 0, '', 'Aktive', '-105', 0, ''),
(303, 'Hennequin', 'Benjamin', 9000, 1990, 88.70, '', 'Männlich', 2, '', 'Aktive', '-94', 0, ''),
(304, 'Bardis', 'Giovanni', 9000, 1990, 86.85, '', 'Männlich', 0, '', 'Aktive', '-94', 0, ''),
(305, 'Nayo Ketchanke', 'Gaelle', 9000, 1990, 75.40, '', 'Weiblich', 2, '', 'Aktive', '-90', 0, ''),
(306, 'Mata Perez', 'Andres Eduardo', 9000, 1990, 81.15, '', 'Männlich', 6, '', 'Aktive', '-85', 0, ''),
(307, 'Sanchez Lopez', 'David', 9000, 1990, 72.15, '', 'Männlich', 6, '', 'Aktive', '-77', 0, ''),
(308, 'Brachi Garcia', 'Josue', 9000, 1990, 59.25, '', 'Männlich', 0, '', 'Aktive', '-62', 0, ''),
(309, 'Bordignon', 'Giorgua', 9000, 1990, 63.80, '', 'Weiblich', 0, '', 'Aktive', '-69', 0, ''),
(310, 'Pagliaro', 'Genny', 9000, 1990, 49.70, '', 'Weiblich', 3, '', 'Aktive', '-53', 0, ''),
(311, 'Pizzolato', 'Antonio', 9000, 1990, 86.90, '', 'Männlich', 3, '', 'Aktive', '-94', 0, ''),
(312, 'Scarantino', 'Mirco', 9000, 1990, 56.95, '', 'Männlich', 3, '', 'Aktive', '-62', 0, ''),
(313, 'Everi', 'Anna-Maria', 9000, 1990, 63.60, '', 'Weiblich', 0, '', 'Aktive', '-69', 0, ''),
(340, 't3', '', 3, 2000, 90.00, 'BY', 'Männlich', 1, '', 'Kinder', '+62', 1, ''),
(341, 't2', '', 3, 2005, 80.00, 'BY', 'Männlich', 1, '', 'Kinder', '+62', 1, ''),
(342, 't1', '', 3, 2005, 54.00, 'BY', 'Männlich', 1, '', 'Kinder', '-56', 1, ''),
(343, 't4', '', 3, 2000, 85.00, 'BY', 'Männlich', 1, '', 'Kinder', '+62', 1, ''),
(344, 't5', '', 3, 2000, 70.00, 'BY', 'Männlich', 1, '', 'Kinder', '+62', 1, ''),
(346, 't6', '', 3, 2000, 92.00, 'BY', 'Männlich', 1, '', 'Kinder', '+62', 1, ''),
(348, 'Moritz', 'Redlich', 64, 1996, 75.00, 'BY', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(354, 'Enns', 'Arthur', 64, 1990, 73.40, 'BY', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(355, 'Neumann', 'Ellen', 64, 1994, 81.20, 'BY', 'Weiblich', 1, '', 'Aktive', '-90', 0, ''),
(356, 'Reindl', 'Silke', 64, 1989, 65.10, 'BY', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(358, 'Salosnig', 'Martina', 64, 1984, 67.80, 'BY', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(359, 'Schmidt', 'Julia', 64, 1995, 50.40, 'BY', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(360, 'Popel', 'Johannes', 3, 1994, 76.80, 'BY', 'Männlich', 1, '', 'Aktive', '-77', 1, ''),
(361, 'Schemmel', 'Kerstin', 3, 1998, 66.40, 'BY', 'Weiblich', 1, '', 'Junioren', '-69', 1, ''),
(362, 'Guerro Gainza', 'Viktor Yoel', 57, 1997, 84.10, 'RP', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(363, 'Heid', 'Jason', 57, 1998, 76.20, 'RP', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(364, 'Schroth', 'Nina', 57, 1991, 77.50, 'RP', 'Weiblich', 1, '', 'Aktive', '-90', 0, ''),
(365, 'Weishaupt', 'Tim', 49, 1997, 83.50, 'RP', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(366, 'Wittur', 'Mike Maximilian', 49, 1993, 76.20, 'RP', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(367, 'Block', 'Jennifer', 5, 1990, 67.60, 'BY', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(368, 'Schoener', 'Katharina', 5, 1988, 62.00, 'BY', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(369, 'Unger', 'Nina', 5, 1989, 57.60, 'BY', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(370, 'Zehner', 'Ulrike', 5, 1977, 47.30, 'BY', 'Weiblich', 1, '', 'Aktive', '-48', 0, ''),
(371, 'Lee', 'Rebecca', 43, 1988, 62.20, 'BW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(372, 'Nützel ', 'Nicole', 43, 1979, 59.60, 'BW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(373, 'Pipke', 'Monika', 43, 1960, 51.90, 'BW', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(374, 'Rohde', 'Ivonne', 43, 1982, 57.90, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(375, 'Hinkelmann', 'Nancy', 4, 1996, 47.60, 'SN', 'Weiblich', 1, '', 'Aktive', '-48', 0, ''),
(376, 'Behm ', 'Robby', 58, 1986, 104.40, 'BW', 'Männlich', 1, '', 'Aktive', '-105', 0, ''),
(377, 'Hüllen-Deutscher', 'Daniela', 58, 1976, 68.60, 'BW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(378, 'Buchwald', 'Ina', 12, 1989, 66.10, 'NW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(379, 'Etscheit', 'Judith', 12, 1984, 66.80, 'NW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(380, 'Gjeli ', 'Enis', 12, 1999, 94.00, 'NW', 'Männlich', 1, '', 'Junioren', '-94', 0, ''),
(381, 'Mayer', 'Sakina', 12, 1993, 62.00, 'NW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(382, 'von der Heyden', 'Angelina', 12, 1998, 68.30, 'NW', 'Weiblich', 1, '', 'Junioren', '-69', 0, ''),
(383, 'Peter', 'Tessa', 8, 1993, 68.10, 'SL', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(384, 'Janta', 'Gerit', 6, 1997, 55.70, 'SN', 'Weiblich', 1, '', 'Junioren', '-58', 0, ''),
(385, 'Janta', 'Hagen', 6, 1999, 72.80, 'SN', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(386, 'Kästner', 'Henrik', 52, 2000, 83.40, 'BW', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(387, 'Kästner', 'Celine', 52, 1998, 52.10, 'BW', 'Weiblich', 1, '', 'Junioren', '-53', 0, ''),
(388, 'Schaaf', 'Leon', 52, 2001, 69.00, 'BW', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(389, 'Florian', 'Max', 7, 2001, 85.00, 'TH', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(390, 'Schweng', 'Cindy', 7, 2000, 61.40, 'TH', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(391, 'Vogel ', 'Marc', 7, 2000, 94.00, 'TH', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(392, 'Männeke', 'Max', 11, 1995, 84.60, 'BB', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(393, 'Guzda', 'Patrick Michael', 11, 2000, 92.90, 'BB', 'Männlich', 1, '', 'Jugend', '-94', 0, ''),
(394, 'Jurke', 'Bartimäus', 11, 1995, 84.10, 'BB', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(395, 'Leuschner', 'Maximilian', 11, 1999, 84.70, 'BB', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(396, 'Zandeck', 'Manuel', 11, 1998, 74.00, 'BB', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(397, 'Jurke', 'Äneas', 11, 1989, 76.50, 'BB', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(398, 'Arian', 'Assal', 45, 1990, 58.00, 'HE', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(400, 'Bouratn', 'Martin', 9, 1995, 93.00, 'BB', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(401, 'Hintze', 'Jenny', 9, 2000, 61.40, 'BB', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(402, 'Mattig', 'Lea-Justine', 9, 2001, 57.20, 'BB', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(403, 'Oswald', 'Robert', 9, 1988, 93.40, 'BB', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(404, 'Pahl', 'Paul', 9, 1998, 83.50, 'BB', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(405, 'Schedler', 'Leon', 9, 1998, 56.00, 'BB', 'Männlich', 1, '', 'Junioren', '-56', 0, ''),
(406, 'Taubert', 'Anna', 9, 2000, 74.40, 'BB', 'Weiblich', 1, '', 'Jugend', '+69', 0, ''),
(407, 'Hörner', 'Helene', 40, 1998, 75.00, 'BY', 'Weiblich', 1, '', 'Junioren', '-90', 0, ''),
(408, 'Cornelius', 'Cosima', 38, 1990, 56.70, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(409, 'Schwarzbach', 'Tom', 2, 1986, 84.90, 'RP', 'Männlich', 1, '', 'Aktive', '-85', 1, ''),
(410, 'Spindler', 'Christina', 2, 1995, 68.80, 'RP', 'Weiblich', 1, '', 'Aktive', '-69', 1, ''),
(411, 'Wüst', 'Carolin', 2, 1999, 62.30, 'RP', 'Weiblich', 1, '', 'Junioren', '-63', 1, ''),
(412, 'Ender', 'Jonas', 13, 1998, 84.60, 'BE', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(413, 'Joachim', 'Robert', 13, 1987, 70.40, 'BE', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(414, 'Müller', 'Michael', 13, 1987, 86.60, 'BE', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(415, 'Mummhardt', 'Philip', 13, 1995, 118.90, 'BE', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(416, 'Oehler', 'Elisabeth', 13, 1991, 52.90, 'BE', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(417, 'Schreiber', 'Chantal', 13, 1998, 89.00, 'BE', 'Weiblich', 1, '', 'Junioren', '-90', 0, ''),
(418, 'Kassel', 'Rene', 14, 1986, 76.60, 'TH', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(419, 'Günther', 'Björn', 14, 1996, 103.00, 'TH', 'Männlich', 1, '', 'Aktive', '-105', 0, ''),
(420, 'Kudzik', 'Philip', 15, 1993, 94.00, 'SN', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(421, 'Lang', 'Max', 15, 1992, 76.80, 'SN', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(422, 'Martin', 'Sandra', 15, 1986, 47.90, 'SN', 'Weiblich', 1, '', 'Aktive', '-48', 0, ''),
(423, 'Perthel', 'Kurt', 15, 1997, 94.00, 'SN', 'Männlich', 1, '', 'Junioren', '-94', 0, ''),
(424, 'Pichler', 'Christoph', 15, 1993, 67.20, 'SN', 'Männlich', 1, '', 'Aktive', '-69', 0, ''),
(425, 'Häusler', 'Anna-Carina', 22, 1989, 68.70, 'BY', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(426, 'Rieß', 'Lisa', 22, 1989, 67.80, 'BY', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(427, 'Schnurrer', 'Florian', 22, 1993, 93.60, 'BY', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(428, 'Lombardo', 'Noah', 69, 1999, 65.40, 'BY', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(429, 'Gürtler', 'Annalena', 17, 1998, 74.90, 'TH', 'Weiblich', 1, '', 'Junioren', '-90', 0, ''),
(430, 'Meyer', 'Domenic', 17, 1998, 93.50, 'TH', 'Männlich', 1, '', 'Junioren', '-94', 0, ''),
(431, 'Grotz', 'Saskia', 54, 1982, 71.10, 'HE', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(432, 'Minchev', 'Sevdalin', 9000, 0, 0.00, '', 'Männlich', 1, '', '', '', 0, ''),
(433, 'Minchev ', 'Sevdalin', 37, 1992, 62.00, 'HH', 'Männlich', 1, '', 'Aktive', '-62', 0, ''),
(434, 'Hansen', 'Anna', 68, 1986, 58.00, 'NI', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(435, 'Marth', 'Janina', 9000, 1991, 69.00, '', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(436, 'Porrmann', 'Nina', 68, 1976, 57.10, 'NI', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(437, 'Marth', 'Janina', 68, 1991, 67.90, 'NI', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(438, 'Hermann', 'Daniel', 73, 1996, 76.40, 'BW', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(439, 'Stösser', 'Tim', 75, 1999, 111.90, 'BW', 'Männlich', 1, '', 'Junioren', '+105', 0, ''),
(440, 'Scheuer', 'tina', 1, 1979, 91.00, 'BW', 'Weiblich', 1, '', 'Aktive', '+90', 1, ''),
(441, 'Winterholler', 'Nicole', 71, 1986, 73.50, 'BY', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(442, 'Spieß', 'Jürgen', 72, 1984, 93.60, 'BW', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(443, 'Krieger', 'Carina', 18, 1990, 49.80, 'RP', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(444, 'Rössler', 'Laura', 18, 2001, 57.20, 'RP', 'Weiblich', 1, '', 'Jugend', '-58', 0, ''),
(445, 'Bopp', 'Lena', 50, 1990, 57.70, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(446, 'Kusterer', 'Sabine', 50, 1991, 63.00, 'BW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(447, 'Scharnberg', 'Natascha', 50, 1980, 57.50, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(448, 'Schweizer', 'Kevin', 50, 1986, 92.60, 'BW', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(449, 'Attilo', 'Sophia', 19, 1993, 52.90, 'RP', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(450, 'Attilo ', 'Giuliano', 19, 1998, 68.50, 'RP', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(451, 'Dauth', 'Caroline', 19, 1999, 62.20, 'RP', 'Weiblich', 1, '', 'Junioren', '-63', 0, ''),
(452, 'Drews', 'Patrick', 19, 1995, 73.60, 'RP', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(453, 'Feil', 'Nils', 19, 2001, 59.80, 'RP', 'Männlich', 1, '', 'Jugend', '-62', 0, ''),
(454, 'Hammer', 'Nik', 19, 1998, 71.40, 'RP', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(455, 'Izere Shima', 'Padou', 19, 2000, 55.70, 'RP', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(456, 'Aßmann', 'Stefan', 42, 1987, 84.80, 'BY', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(457, 'Uhl', 'Armin', 42, 1991, 84.70, 'BY', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(458, 'Huber', 'Moritz', 1, 1998, 68.60, 'BW', 'Männlich', 1, '', 'Junioren', '-69', 1, ''),
(459, 'Valduga', 'Camilla', 1, 2000, 65.60, 'BW', 'Weiblich', 1, '', 'Junioren', '-69', 1, ''),
(460, 'Tabel', 'Tabea Hanna', 1, 1996, 75.00, 'BW', 'Weiblich', 1, '', 'Aktive', '-90', 1, ''),
(461, 'Bonitz', 'Celina', 78, 2000, 52.60, 'ST', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(462, 'Haupt', 'Dany', 78, 1999, 78.30, 'ST', 'Weiblich', 1, '', 'Junioren', '-90', 0, ''),
(463, 'Weisbach', 'Anna-Maria', 23, 1999, 92.50, 'SN', 'Weiblich', 1, '', 'Junioren', '+90', 0, ''),
(464, 'Schüller', 'Florian', 79, 2000, 154.40, 'TH', 'Männlich', 1, '', 'Jugend', '+94', 0, ''),
(465, 'Rieger', 'Patricia', 80, 1985, 73.30, 'SH', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(466, 'Burkhardt', 'Steve', 26, 1985, 84.60, 'SN', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(467, 'Hieke ', 'Robert', 26, 1994, 116.70, 'SN', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(468, 'Köhler ', 'Jessika', 26, 1999, 75.20, 'SN', 'Weiblich', 1, '', 'Junioren', '-90', 0, ''),
(469, 'Ludwig ', 'Nancy', 26, 2000, 63.00, 'SN', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(470, 'Ludwig', 'Erik', 26, 2001, 84.60, 'SN', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(471, 'Walzak ', 'Pauline', 26, 1999, 52.80, 'SN', 'Weiblich', 1, '', 'Junioren', '-53', 0, ''),
(472, 'Weber', 'Ronny', 26, 1987, 62.00, 'SN', 'Männlich', 1, '', 'Aktive', '-62', 0, ''),
(473, 'Wenke', 'Stefan', 26, 1990, 94.00, 'SN', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(474, 'Bahrendt', 'Angelo', 29, 1997, 111.50, 'ST', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(475, 'Gösche', 'Claudia', 83, 1987, 67.50, 'BW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(476, 'Grau ', 'Svenia', 83, 2000, 63.00, 'BW', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(477, 'Schmidt', 'Kevin', 83, 1997, 63.90, 'BW', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(478, 'Pianski', 'Julian', 82, 1998, 95.00, 'SN', 'Männlich', 1, '', 'Junioren', '-105', 0, ''),
(479, 'Albiez', 'Andreas', 81, 1982, 57.70, 'BW', 'Männlich', 1, '', 'Aktive', '-62', 0, ''),
(480, 'Eble', 'Lisa', 81, 1990, 64.90, 'BW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(481, 'Eschrich', 'Lydia', 30, 2000, 68.10, 'TH', 'Weiblich', 1, '', 'Jugend', '-69', 0, ''),
(482, 'Griebel', 'Mark', 30, 1999, 71.90, 'TH', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(483, 'Griebel', 'Philipp', 30, 1996, 94.00, 'TH', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(484, 'Heyer ', 'Fritz', 30, 1999, 62.00, 'TH', 'Männlich', 1, '', 'Junioren', '-62', 0, ''),
(485, 'Idieva', 'Khava', 30, 2000, 59.60, 'TH', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(486, 'Langkabel', 'Andre', 30, 2000, 85.00, 'TH', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(487, 'Orben', 'Selina', 30, 2000, 62.00, 'TH', 'Weiblich', 1, '', 'Jugend', '-63', 0, ''),
(488, 'Perlt', 'Julia', 30, 2001, 52.60, 'TH', 'Weiblich', 1, '', 'Jugend', '-53', 0, ''),
(489, 'Witte', 'Kirsten', 30, 1996, 90.00, 'TH', 'Weiblich', 1, '', 'Aktive', '-90', 0, ''),
(490, 'Hertrampf', 'Björn', 32, 1982, 89.40, 'BW', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(491, 'Döll', 'Sarah', 32, 2000, 67.10, 'BW', 'Weiblich', 1, '', 'Jugend', '-69', 0, ''),
(492, 'Hofmann', 'Ruben', 32, 2000, 71.20, 'BW', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(493, 'Hofmann', 'Matthäus', 32, 1994, 105.00, 'BW', 'Männlich', 1, '', 'Aktive', '-105', 0, ''),
(494, 'Neufeld', 'Jakob', 32, 1983, 77.00, 'BW', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(495, 'Soldner', 'Janne', 32, 1999, 98.00, 'BW', 'Männlich', 1, '', 'Junioren', '-105', 0, ''),
(496, 'Müller', 'Nico', 32, 1993, 78.40, 'BW', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(497, 'Siegmann', 'Martin', 32, 1993, 68.90, 'BW', 'Männlich', 1, '', 'Aktive', '-69', 0, ''),
(498, 'Maurer', 'Lena', 84, 1994, 62.60, 'BW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(499, 'Zschaler', 'Sonja', 85, 1990, 67.50, 'NI', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(500, 'Schlatt', 'Lara-Theresa', 86, 1991, 72.60, 'NW', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(501, 'Körner', 'Kerstin', 87, 1992, 62.70, 'BY', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(502, 'Jahn', 'Annabell', 87, 1986, 56.80, 'BY', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(503, 'Bauer', 'Marina', 33, 1999, 52.70, 'BY', 'Weiblich', 1, '', 'Junioren', '-53', 0, ''),
(504, 'Brandhuber', 'Hans', 33, 1996, 84.80, 'BY', 'Männlich', 1, '', 'Aktive', '-85', 0, ''),
(505, 'Brandhuber', 'Simon', 33, 1991, 70.70, 'BY', 'Männlich', 1, '', 'Aktive', '-77', 0, ''),
(506, 'Koralewski', 'Leon', 33, 1999, 67.60, 'BY', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(507, 'Koralewski', 'Rene', 33, 1997, 68.70, 'BY', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(508, 'Nowara', 'Gregor', 33, 1993, 93.70, 'BY', 'Männlich', 1, '', 'Aktive', '-94', 0, ''),
(509, 'Jacobs', 'Sarah', 88, 1992, 73.60, 'BY', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(510, 'Nuetzel', 'Lena', 76, 1987, 57.80, 'BY', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(511, 'Pobig', 'Claudia', 76, 1989, 60.60, 'BY', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(512, 'Schiffer', 'Karl', 36, 1998, 72.40, 'BB', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(513, 'Schneider', 'Michael-Lucas', 36, 1998, 61.70, 'BB', 'Männlich', 1, '', 'Junioren', '-62', 0, ''),
(514, 'Schweizer', 'Lisa-Marie', 36, 1995, 62.60, 'BB', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(515, 'Varlamov', 'Michael', 89, 1997, 93.30, 'BB', 'Männlich', 1, '', 'Junioren', '-94', 0, ''),
(516, 'Boche', 'Maria', 48, 1993, 55.20, 'BY', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(517, 'Voit', 'Tamara', 46, 1994, 62.70, 'BY', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(518, 'Viktorova', 'Videlina', 90, 1991, 62.60, 'BW', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(519, 'Thiemann', 'Kerstin', 91, 1995, 71.70, 'BW', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(520, 'Ammer', 'Anja', 93, 1984, 90.00, 'BW', 'Weiblich', 1, '', 'Aktive', '-90', 0, ''),
(521, 'Dosdall', 'Fiona', 93, 1995, 78.40, 'BW', 'Weiblich', 1, '', 'Aktive', '-90', 0, ''),
(522, 'Lee', 'Betty', 93, 1987, 55.30, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(523, 'Räuchle', 'Ramon', 94, 1997, 85.00, 'BW', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(524, 'Oreja', 'Ricarda Judith', 92, 1995, 66.00, 'NW', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(525, 'Wutzler', 'Theresa', 92, 1991, 73.50, 'NW', 'Weiblich', 1, '', 'Aktive', '-74', 0, ''),
(526, 'Bektic', 'Katarina', 39, 1992, 55.40, 'BW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(527, 'Jaeger', 'Jessica', 77, 1981, 61.80, 'SL', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(528, 'Scheuer ', 'Tina', 53, 1979, 94.70, 'HE', 'Weiblich', 1, '', 'Aktive', '+90', 0, ''),
(529, 'Arian', 'Assal', 45, 1990, 55.90, 'HE', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(530, 'Schroll', 'Jacqueline', 47, 1997, 63.00, 'BY', 'Weiblich', 1, '', 'Junioren', '-63', 0, ''),
(531, 'Florian', 'Max', 7, 2001, 84.30, 'TH', 'Männlich', 1, '', 'Jugend', '-85', 0, ''),
(532, 'Opper', 'Julia', 70, 1993, 63.00, 'HE', 'Weiblich', 1, '', 'Aktive', '-63', 0, ''),
(533, 'Gutu', 'Roberto', 29, 2000, 71.50, 'ST', 'Männlich', 1, '', 'Jugend', '-77', 0, ''),
(534, 'Roßberg', 'Arthur', 29, 2000, 50.90, 'ST', 'Männlich', 1, '', 'Jugend', '-56', 0, ''),
(535, 'Scholz', 'Paula', 29, 1996, 68.70, 'ST', 'Weiblich', 1, '', 'Aktive', '-69', 0, ''),
(536, 'Adler', 'Martin', 36, 1999, 82.00, 'BB', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(537, 'Blechschmidt', 'Jens', 36, 1998, 76.50, 'BB', 'Männlich', 1, '', 'Junioren', '-77', 0, ''),
(538, 'Fischer', 'Ken', 36, 1997, 83.70, 'BB', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(539, 'Kabs', 'Laura-Sophie', 36, 1998, 61.00, 'BB', 'Weiblich', 1, '', 'Junioren', '-63', 0, ''),
(540, 'Kluth', 'Tizian', 36, 1997, 83.70, 'BB', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(541, 'Mau', 'John Luke', 36, 1998, 64.40, 'BB', 'Männlich', 1, '', 'Junioren', '-69', 0, ''),
(542, 'Hartenberger', 'Florian', 35, 1999, 81.90, 'SN', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(543, 'Kunschke', 'Justin', 89, 2000, 67.20, 'BB', 'Männlich', 1, '', 'Jugend', '-69', 0, ''),
(544, 'Baumann', 'Anastasia', 96, 1991, 51.60, 'NW', 'Weiblich', 1, '', 'Aktive', '-53', 0, ''),
(545, 'Nezha', 'Agim', 96, 1998, 84.40, 'NW', 'Männlich', 1, '', 'Junioren', '-85', 0, ''),
(546, 'Offer', 'Nicole', 96, 1990, 57.10, 'NW', 'Weiblich', 1, '', 'Aktive', '-58', 0, ''),
(547, 'Wonisch', 'Nico', 97, 1999, 60.40, 'BW', 'Männlich', 1, '', 'Junioren', '-62', 0, ''),
(548, 'Prochorow', 'Alexej', 95, 1990, 134.50, 'HE', 'Männlich', 1, '', 'Aktive', '+105', 0, ''),
(549, 'ksv1', '', 1, 1999, 50.00, 'BW', 'Männlich', 1, '', 'Junioren', '-56', 1, ''),
(550, 'ksv2', '', 1, 1995, 70.00, 'BW', 'Männlich', 1, '', 'Aktive', '-77', 1, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `laender`
--

CREATE TABLE `laender` (
  `laender` text NOT NULL,
  `Idlaender` int(11) NOT NULL,
  `laender_lang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `laender`
--

INSERT INTO `laender` (`laender`, `Idlaender`, `laender_lang`) VALUES
('BW', 2, 'Baden-Württemberg'),
('BY', 3, 'Bayern'),
('BE', 4, 'Berlin'),
('BB', 5, 'Brandenburg'),
('HB', 6, 'Bremen'),
('HH', 7, 'Hamburg'),
('HE', 8, 'Hessen'),
('MV', 9, 'Mecklenburg-Vorpommern'),
('NI', 10, 'Niedersachsen'),
('NW', 11, 'Nordrhein-Westfalen'),
('RP', 12, 'Rheinland-Pfalz'),
('SL', 13, 'Saarland'),
('SN', 14, 'Sachsen'),
('ST', 15, '	Sachsen-Anhalt'),
('SH', 16, 'Schleswig-Holstein'),
('TH', 17, 'Thüringen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `laenderwertung`
--

CREATE TABLE `laenderwertung` (
  `Platz` int(11) NOT NULL,
  `P_Punkte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `laenderwertung`
--

INSERT INTO `laenderwertung` (`Platz`, `P_Punkte`) VALUES
(1, 28),
(2, 25),
(3, 23),
(4, 22),
(5, 21),
(6, 20),
(7, 19),
(8, 18),
(9, 17),
(10, 16),
(11, 15),
(12, 14),
(13, 13),
(14, 12),
(15, 11),
(16, 10),
(17, 9),
(18, 8),
(19, 7),
(20, 6),
(21, 5),
(22, 4),
(23, 3),
(24, 2),
(25, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `master_pw`
--

CREATE TABLE `master_pw` (
  `Id` int(11) NOT NULL,
  `Master_PW` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `relativtabzug`
--

CREATE TABLE `relativtabzug` (
  `Gewicht` int(11) NOT NULL,
  `Maenner` double(11,1) NOT NULL,
  `Frauen` double(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `relativtabzug`
--

INSERT INTO `relativtabzug` (`Gewicht`, `Maenner`, `Frauen`) VALUES
(31, 22.5, 12.5),
(32, 23.0, 12.5),
(33, 23.5, 12.5),
(34, 24.0, 12.5),
(35, 24.5, 12.5),
(36, 25.0, 12.5),
(37, 25.5, 12.5),
(38, 26.0, 12.5),
(39, 26.5, 12.5),
(40, 27.0, 12.5),
(41, 27.5, 13.0),
(42, 28.0, 13.0),
(43, 28.5, 13.5),
(44, 29.0, 13.5),
(45, 29.5, 14.0),
(46, 30.0, 14.0),
(47, 30.5, 14.5),
(48, 31.0, 15.0),
(49, 32.0, 15.5),
(50, 34.5, 16.0),
(51, 35.0, 16.5),
(52, 36.0, 17.0),
(53, 37.0, 17.5),
(54, 38.5, 18.5),
(55, 40.0, 19.5),
(56, 42.0, 20.5),
(57, 44.0, 21.5),
(58, 46.0, 22.5),
(59, 48.0, 23.5),
(60, 50.0, 25.0),
(61, 52.0, 26.5),
(62, 54.0, 27.5),
(63, 56.0, 28.5),
(64, 57.5, 29.5),
(65, 59.0, 31.0),
(66, 60.5, 32.0),
(67, 62.0, 33.0),
(68, 63.5, 34.0),
(69, 65.0, 35.0),
(70, 66.5, 36.0),
(71, 68.0, 37.0),
(72, 69.5, 38.0),
(73, 70.5, 39.0),
(74, 71.5, 40.0),
(75, 72.5, 40.0),
(76, 74.0, 40.5),
(77, 75.5, 41.0),
(78, 77.0, 41.5),
(79, 78.0, 42.0),
(80, 0.0, 42.5),
(81, 0.0, 43.0),
(82, 0.0, 43.5),
(83, 0.0, 44.0),
(84, 0.0, 44.5),
(85, 0.0, 44.5),
(86, 0.0, 45.0),
(87, 0.0, 45.5),
(88, 0.0, 46.0),
(89, 0.0, 46.0),
(90, 0.0, 46.5),
(91, 0.0, 47.0),
(92, 0.0, 47.5),
(93, 0.0, 47.5),
(94, 0.0, 48.0),
(95, 0.0, 48.5),
(96, 95.5, 48.5),
(97, 96.0, 49.0),
(98, 96.5, 49.5),
(99, 97.0, 49.5),
(100, 97.5, 50.0),
(101, 98.5, 50.5),
(102, 99.5, 50.5),
(103, 100.5, 51.0),
(104, 101.0, 51.0),
(105, 102.0, 51.5),
(106, 103.0, 51.5),
(107, 103.5, 52.0),
(108, 103.5, 52.0),
(109, 104.0, 52.5),
(110, 104.0, 52.5),
(111, 104.0, 53.0),
(112, 104.5, 53.0),
(113, 104.5, 53.5),
(114, 105.0, 53.5),
(115, 105.0, 54.0),
(116, 105.5, 54.0),
(117, 106.0, 54.5),
(118, 106.5, 54.5),
(119, 107.0, 55.0),
(120, 107.5, 55.0),
(121, 108.0, 55.5),
(122, 108.5, 55.5),
(123, 109.0, 56.0),
(124, 109.5, 56.0),
(125, 110.0, 56.5),
(126, 110.5, 56.5),
(127, 111.0, 57.0),
(128, 111.5, 57.0),
(129, 112.0, 57.5),
(130, 112.5, 57.5),
(131, 113.0, 58.0),
(132, 113.5, 58.0),
(133, 114.0, 58.5),
(134, 114.5, 58.5),
(135, 115.0, 59.0),
(136, 115.5, 59.0),
(137, 116.0, 59.5),
(138, 116.5, 59.5),
(139, 117.0, 60.0),
(140, 117.5, 60.0),
(141, 118.0, 60.5),
(142, 118.5, 60.5),
(143, 119.0, 61.0),
(144, 119.5, 61.0),
(145, 120.0, 61.5),
(146, 120.5, 61.5),
(147, 121.0, 62.0),
(148, 121.5, 62.0),
(149, 122.0, 62.5),
(150, 122.5, 62.5),
(151, 123.0, 63.0),
(152, 123.5, 63.0),
(153, 124.0, 63.5),
(154, 124.5, 63.5),
(155, 125.0, 64.0),
(156, 125.5, 64.0),
(157, 126.0, 64.5),
(158, 126.5, 64.5),
(159, 127.0, 65.0),
(160, 127.5, 65.0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sinclair_alterstabellle`
--

CREATE TABLE `sinclair_alterstabellle` (
  `Age` int(11) NOT NULL,
  `Al_Sin_Werte` float(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `sinclair_alterstabellle`
--

INSERT INTO `sinclair_alterstabellle` (`Age`, `Al_Sin_Werte`) VALUES
(30, 1.000),
(31, 1.016),
(32, 1.031),
(33, 1.046),
(34, 1.059),
(35, 1.072),
(36, 1.083),
(37, 1.096),
(38, 1.109),
(39, 1.122),
(40, 1.135),
(41, 1.149),
(42, 1.162),
(43, 1.176),
(44, 1.189),
(45, 1.203),
(46, 1.218),
(47, 1.233),
(48, 1.248),
(49, 1.263),
(50, 1.279),
(51, 1.297),
(52, 1.316),
(53, 1.338),
(54, 1.361),
(55, 1.385),
(56, 1.411),
(57, 1.437),
(58, 1.462),
(59, 1.488),
(60, 1.514),
(61, 1.541),
(62, 1.568),
(63, 1.598),
(64, 1.629),
(65, 1.663),
(66, 1.699),
(67, 1.738),
(68, 1.779),
(69, 1.823),
(70, 1.867),
(71, 1.910),
(72, 1.953),
(73, 2.004),
(74, 2.060),
(75, 2.117),
(76, 2.181),
(77, 2.255),
(78, 2.336),
(79, 2.419),
(80, 2.504),
(81, 2.597),
(82, 2.702),
(83, 2.831),
(84, 2.981),
(85, 3.153),
(86, 3.352),
(87, 3.580),
(88, 3.843),
(89, 4.145),
(90, 4.493);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sinclair_faktoren`
--

CREATE TABLE `sinclair_faktoren` (
  `Id` int(11) NOT NULL,
  `Sin_Koef_M` double(15,10) NOT NULL,
  `Sin_Koef_W` double(15,10) NOT NULL,
  `Sin_Gew_M` double(11,3) NOT NULL,
  `Sin_Gew_W` double(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `sinclair_faktoren`
--

INSERT INTO `sinclair_faktoren` (`Id`, `Sin_Koef_M`, `Sin_Koef_W`, `Sin_Gew_M`, `Sin_Gew_W`) VALUES
(1, 0.7943581410, 0.8972607400, 174.393, 148.026);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `staaten`
--

CREATE TABLE `staaten` (
  `IdStaat` int(11) NOT NULL,
  `Staat` text NOT NULL,
  `FlaggenFormat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `staaten`
--

INSERT INTO `staaten` (`IdStaat`, `Staat`, `FlaggenFormat`) VALUES
(0, '---', ''),
(1, 'Ger', 'jpg'),
(2, 'Fra', ''),
(3, '', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(9, '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_anzeige_1`
--

CREATE TABLE `tmp_anzeige_1` (
  `Anweisung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_anzeige_1`
--

INSERT INTO `tmp_anzeige_1` (`Anweisung`) VALUES
(1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_anzeige_2`
--

CREATE TABLE `tmp_anzeige_2` (
  `Anweisung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_anzeige_2`
--

INSERT INTO `tmp_anzeige_2` (`Anweisung`) VALUES
(0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_anzeige_wk_1`
--

CREATE TABLE `tmp_anzeige_wk_1` (
  `Wk_Nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_anzeige_wk_1`
--

INSERT INTO `tmp_anzeige_wk_1` (`Wk_Nummer`) VALUES
(45);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_anzeige_wk_2`
--

CREATE TABLE `tmp_anzeige_wk_2` (
  `Wk_Nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_anzeige_wk_2`
--

INSERT INTO `tmp_anzeige_wk_2` (`Wk_Nummer`) VALUES
(1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_db`
--

CREATE TABLE `tmp_db` (
  `S_Db` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_db`
--

INSERT INTO `tmp_db` (`S_Db`) VALUES
('40');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_gerd_1`
--

CREATE TABLE `tmp_gerd_1` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `HGw` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `Verein` text NOT NULL,
  `Kgw` double(11,2) NOT NULL,
  `Klasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_gerd_1`
--

INSERT INTO `tmp_gerd_1` (`IdHeber`, `Art`, `HGw`, `V`, `Name`, `Vorname`, `Verein`, `Kgw`, `Klasse`) VALUES
(-1, 'Stoßen', -1, -1, '', '', '', 0.00, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_gerd_2`
--

CREATE TABLE `tmp_gerd_2` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `HGw` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `Verein` text NOT NULL,
  `Kgw` double(11,2) NOT NULL,
  `Klasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_gerd_2`
--

INSERT INTO `tmp_gerd_2` (`IdHeber`, `Art`, `HGw`, `V`, `Name`, `Vorname`, `Verein`, `Kgw`, `Klasse`) VALUES
(337, 'Reißen', 50, 2, 'aaaa', '', 'aaaaaa', 78.00, -100);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_hardware_1`
--

CREATE TABLE `tmp_hardware_1` (
  `Id` int(11) NOT NULL,
  `Anweisung` int(11) NOT NULL,
  `Zeit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_hardware_1`
--

INSERT INTO `tmp_hardware_1` (`Id`, `Anweisung`, `Zeit`) VALUES
(1, 1, 60);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_hardware_2`
--

CREATE TABLE `tmp_hardware_2` (
  `Id` int(11) NOT NULL,
  `Anweisung` int(11) NOT NULL,
  `Zeit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_hardware_2`
--

INSERT INTO `tmp_hardware_2` (`Id`, `Anweisung`, `Zeit`) VALUES
(1, 0, 60);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_heber_speichern_1`
--

CREATE TABLE `tmp_heber_speichern_1` (
  `Id` int(11) NOT NULL,
  `IdHeber` int(11) NOT NULL,
  `Versuch` int(11) NOT NULL,
  `G1` text NOT NULL,
  `G2` text NOT NULL,
  `G3` text NOT NULL,
  `Time1` int(11) NOT NULL,
  `Time2` int(11) NOT NULL,
  `Time3` int(11) NOT NULL,
  `Technik1` float(11,2) NOT NULL,
  `Technik2` float(11,2) NOT NULL,
  `Technik3` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_heber_speichern_1`
--

INSERT INTO `tmp_heber_speichern_1` (`Id`, `IdHeber`, `Versuch`, `G1`, `G2`, `G3`, `Time1`, `Time2`, `Time3`, `Technik1`, `Technik2`, `Technik3`) VALUES
(1, 0, 0, '', '', '', 0, 0, 0, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_heber_speichern_2`
--

CREATE TABLE `tmp_heber_speichern_2` (
  `Id` int(11) NOT NULL,
  `IdHeber` int(11) NOT NULL,
  `Versuch` int(11) NOT NULL,
  `G1` text NOT NULL,
  `G2` text NOT NULL,
  `G3` text NOT NULL,
  `Time1` int(11) NOT NULL,
  `Time2` int(11) NOT NULL,
  `Time3` int(11) NOT NULL,
  `Technik1` float(11,2) NOT NULL,
  `Technik2` float(11,2) NOT NULL,
  `Technik3` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_heber_speichern_2`
--

INSERT INTO `tmp_heber_speichern_2` (`Id`, `IdHeber`, `Versuch`, `G1`, `G2`, `G3`, `Time1`, `Time2`, `Time3`, `Technik1`, `Technik2`, `Technik3`) VALUES
(1, 0, 0, '', '', '', 0, 0, 0, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_jury_status_1`
--

CREATE TABLE `tmp_jury_status_1` (
  `Id` int(11) NOT NULL,
  `Anzeige` int(11) NOT NULL,
  `Sprecher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_jury_status_1`
--

INSERT INTO `tmp_jury_status_1` (`Id`, `Anzeige`, `Sprecher`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_jury_status_2`
--

CREATE TABLE `tmp_jury_status_2` (
  `Id` int(11) NOT NULL,
  `Anzeige` int(11) NOT NULL,
  `Sprecher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_jury_status_2`
--

INSERT INTO `tmp_jury_status_2` (`Id`, `Anzeige`, `Sprecher`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_kr_check_1`
--

CREATE TABLE `tmp_kr_check_1` (
  `ID` int(11) NOT NULL,
  `K1` int(11) NOT NULL,
  `K2` int(11) NOT NULL,
  `K3` int(11) NOT NULL,
  `Re1` int(11) NOT NULL,
  `Re2` int(11) NOT NULL,
  `Re3` int(11) NOT NULL,
  `ReAnzeige` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_kr_check_1`
--

INSERT INTO `tmp_kr_check_1` (`ID`, `K1`, `K2`, `K3`, `Re1`, `Re2`, `Re3`, `ReAnzeige`) VALUES
(1, 0, 0, 0, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_kr_check_2`
--

CREATE TABLE `tmp_kr_check_2` (
  `Id` int(11) NOT NULL,
  `K1` int(11) NOT NULL,
  `K2` int(11) NOT NULL,
  `K3` int(11) NOT NULL,
  `Re1` int(11) NOT NULL,
  `Re2` int(11) NOT NULL,
  `Re3` int(11) NOT NULL,
  `ReAnzeige` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_kr_check_2`
--

INSERT INTO `tmp_kr_check_2` (`Id`, `K1`, `K2`, `K3`, `Re1`, `Re2`, `Re3`, `ReAnzeige`) VALUES
(1, 0, 0, 0, 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_letzter_heber_1`
--

CREATE TABLE `tmp_letzter_heber_1` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `V` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_letzter_heber_1`
--

INSERT INTO `tmp_letzter_heber_1` (`IdHeber`, `Art`, `V`) VALUES
(0, 'Reißen', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_letzter_heber_2`
--

CREATE TABLE `tmp_letzter_heber_2` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `V` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_letzter_heber_2`
--

INSERT INTO `tmp_letzter_heber_2` (`IdHeber`, `Art`, `V`) VALUES
(334, 'Reißen', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_reload_1`
--

CREATE TABLE `tmp_reload_1` (
  `IdHeber` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `HGw` int(11) NOT NULL,
  `Art` text NOT NULL,
  `Gruppe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_reload_1`
--

INSERT INTO `tmp_reload_1` (`IdHeber`, `V`, `HGw`, `Art`, `Gruppe`) VALUES
(0, -1, -1, 'Reißen', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_reload_2`
--

CREATE TABLE `tmp_reload_2` (
  `IdHeber` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `HGw` int(11) NOT NULL,
  `Art` text NOT NULL,
  `Gruppe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_reload_2`
--

INSERT INTO `tmp_reload_2` (`IdHeber`, `V`, `HGw`, `Art`, `Gruppe`) VALUES
(337, 2, 50, 'Reißen', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_ss_reload_1`
--

CREATE TABLE `tmp_ss_reload_1` (
  `AnsagerR` int(11) NOT NULL,
  `HeberRaumR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_ss_reload_1`
--

INSERT INTO `tmp_ss_reload_1` (`AnsagerR`, `HeberRaumR`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_ss_reload_2`
--

CREATE TABLE `tmp_ss_reload_2` (
  `AnsagerR` int(11) NOT NULL,
  `HeberRaumR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_ss_reload_2`
--

INSERT INTO `tmp_ss_reload_2` (`AnsagerR`, `HeberRaumR`) VALUES
(0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_uebernaechster_heber_1`
--

CREATE TABLE `tmp_uebernaechster_heber_1` (
  `IdHeber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_uebernaechster_heber_1`
--

INSERT INTO `tmp_uebernaechster_heber_1` (`IdHeber`) VALUES
(346);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_uebernaechster_heber_2`
--

CREATE TABLE `tmp_uebernaechster_heber_2` (
  `IdHeber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_uebernaechster_heber_2`
--

INSERT INTO `tmp_uebernaechster_heber_2` (`IdHeber`) VALUES
(1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_uebersichtmk_reload`
--

CREATE TABLE `tmp_uebersichtmk_reload` (
  `IdReload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_uebersichtmk_reload`
--

INSERT INTO `tmp_uebersichtmk_reload` (`IdReload`) VALUES
(11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_wk_korrektur_block`
--

CREATE TABLE `tmp_wk_korrektur_block` (
  `Id` int(11) NOT NULL,
  `Grp_Bridge_1` int(11) NOT NULL,
  `Grp_Bridge_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_wk_korrektur_block`
--

INSERT INTO `tmp_wk_korrektur_block` (`Id`, `Grp_Bridge_1`, `Grp_Bridge_2`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_wk_testpokal`
--

CREATE TABLE `tmp_wk_testpokal` (
  `IdHeber` int(11) NOT NULL,
  `Versuch` int(11) NOT NULL,
  `Reißen` int(11) NOT NULL,
  `Stoßen` int(11) NOT NULL,
  `Technik_Reißen` float(11,2) NOT NULL,
  `Technik_Stoßen` float(11,2) NOT NULL,
  `Div_Wert_R` int(11) NOT NULL,
  `Div_Wert_S` int(11) NOT NULL,
  `Gueltig_Reißen` text NOT NULL,
  `Gueltig_Stoßen` text NOT NULL,
  `time` text NOT NULL,
  `NH_Reißen` int(11) NOT NULL,
  `NH_Stoßen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verein`
--

CREATE TABLE `verein` (
  `Verein` text NOT NULL,
  `IdVerein` int(11) NOT NULL,
  `Bundesliga` int(11) NOT NULL,
  `IdLaender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `verein`
--

INSERT INTO `verein` (`Verein`, `IdVerein`, `Bundesliga`, `IdLaender`) VALUES
('SV Germania Obrigheim e. V.', -5, 1, 2),
('Kraft-Sport-Club 07 Schifferstadt e.V.', -4, 1, 2),
('AC Germania St. Ilgen e.V.', -3, 1, 2),
('TSV  Heinsheim e. V.', -2, 1, 2),
('KSV Lörrach', 1, 1, 2),
('AV03 Speyer', 2, 1, 12),
('1. AC Weiden', 3, 1, 3),
('AC Atlas Plauen', 4, 0, 14),
('AC 82 Schweinfurt', 5, 0, 3),
('AC Meißen', 6, 0, 14),
('AC Suhl', 7, 0, 17),
('AC Heros Wemmetsweiler', 8, 0, 13),
('ASK Frankfurt/Oder', 9, 0, 5),
('ASV Ladenburg', 10, 0, 2),
('AC Potsdam', 11, 0, 5),
('AC Goliath 20 Mengede', 12, 0, 11),
('Berliner TSC', 13, 0, 4),
('Breitunger AV', 14, 0, 17),
('Chemnitzer AC', 15, 0, 14),
('Eichenauer SV', 16, 0, 2),
('FAC Sangerhausen', 17, 0, 17),
('KSC 07 Schifferstadt', 18, 0, 12),
('KSV Grünstadt', 19, 0, 12),
('Motor Eberswalde', 21, 0, 5),
('ESV München Freimann', 22, 0, 3),
('NSAC Görlitz', 23, 0, 14),
('Riesaer AC', 24, 0, 14),
('SC Lüchow', 25, 0, 10),
('SG F. Eibau', 26, 0, 14),
('SG Saefkow', 27, 0, 5),
('SGV Oberböbingen', 28, 0, 2),
('SSV Samswegen1884', 29, 0, 15),
('SV 90 Gräfenroda', 30, 0, 17),
('SV Empor Berlin', 31, 0, 4),
('SV G. Obrigheim', 32, 0, 2),
('TB 03 Roding', 33, 0, 3),
('TSG Haßloch', 34, 0, 12),
('TSG Rodewisch', 35, 0, 14),
('TSV B/W Schwedt', 36, 0, 5),
('Athletenverein Harburg', 37, 0, 7),
('Athletikclub Konstanz ', 38, 0, 2),
('VFL Nagold', 39, 0, 2),
('ASV 1860 Neumark', 40, 0, 3),
('TSV Heinsheim', 41, 0, 2),
('KSV Kitzingen', 42, 0, 3),
('AC 92 Weinheim', 43, 0, 2),
('TSV Waldkirchen', 44, 0, 3),
('ASC 06 Zeilsheim', 45, 0, 8),
('TUS Raublig', 46, 0, 3),
('ASC Boxdorf', 47, 0, 3),
('TSV Ingoldstadt-Nord', 48, 0, 3),
('AC 1923 Altrip', 49, 0, 12),
('KSV Durlach', 50, 0, 2),
('SG Jugendkraft Crawinkel', 51, 0, 17),
('AC Neulußheim', 52, 0, 2),
('KSV Langen', 53, 0, 8),
('FTG Pfungstadt', 54, 0, 8),
('AC 1892 Mutterstadt', 57, 0, 12),
('AC Germania St. Ilgen', 58, 0, 2),
('1.AC Bayreuth', 64, 0, 3),
('BSC Kenpokan', 68, 0, 10),
('ESV München-Neuaubing', 69, 0, 3),
('GSV Eintrach Baunatal', 70, 0, 8),
('KraftMühle Würzburg', 71, 0, 3),
('Kraft-Werk Schwarzach', 72, 0, 2),
('GV Eisenbach', 73, 0, 2),
('HG Rastatt', 75, 0, 2),
('KSV Bavaria Regensburg', 76, 0, 3),
('KSV Hostenbach', 77, 0, 13),
('MSV Buna Schkobau', 78, 0, 15),
('Ohrdrufer Sportverein', 79, 0, 17),
('Preetzer TSV', 80, 0, 16),
('SV Laufenburg', 81, 0, 2),
('SSV 1952 Torgau', 82, 0, 14),
('SC Pforzheim', 83, 0, 2),
('SV Magstadt', 84, 0, 2),
('SV Quitt Ankum 1919', 85, 0, 10),
('SV Bayer Wuppertal', 86, 0, 11),
('SV - DJK - Kolbermoor', 87, 0, 3),
('TSG Augsburg', 88, 0, 3),
('TSV Cottbus', 89, 0, 5),
('TV 1877 Waldhof', 90, 0, 2),
('TV Ettenheim', 91, 0, 2),
('VFL Duisburg-Süd', 92, 0, 11),
('VFL Sindelfingen', 93, 0, 2),
('TV Feldrennach', 94, 0, 2),
('Kölner AC', 96, 0, 11),
('TV Mengen', 97, 0, 2),
('Kein Verein', 9000, 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `alters_klassen`
--
ALTER TABLE `alters_klassen`
  ADD PRIMARY KEY (`Von`);

--
-- Indizes für die Tabelle `alters_klassen_masters`
--
ALTER TABLE `alters_klassen_masters`
  ADD PRIMARY KEY (`Von`);

--
-- Indizes für die Tabelle `alters_klassen_zk`
--
ALTER TABLE `alters_klassen_zk`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `datenbanken`
--
ALTER TABLE `datenbanken`
  ADD PRIMARY KEY (`Id_Db`);

--
-- Indizes für die Tabelle `flaggen_staaten`
--
ALTER TABLE `flaggen_staaten`
  ADD PRIMARY KEY (`IdStaat`);

--
-- Indizes für die Tabelle `gewichtsklassen`
--
ALTER TABLE `gewichtsklassen`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `gruppen_aus`
--
ALTER TABLE `gruppen_aus`
  ADD PRIMARY KEY (`Gruppen`);

--
-- Indizes für die Tabelle `heber`
--
ALTER TABLE `heber`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `laender`
--
ALTER TABLE `laender`
  ADD PRIMARY KEY (`Idlaender`);

--
-- Indizes für die Tabelle `laenderwertung`
--
ALTER TABLE `laenderwertung`
  ADD PRIMARY KEY (`Platz`);

--
-- Indizes für die Tabelle `relativtabzug`
--
ALTER TABLE `relativtabzug`
  ADD PRIMARY KEY (`Gewicht`);

--
-- Indizes für die Tabelle `sinclair_faktoren`
--
ALTER TABLE `sinclair_faktoren`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `staaten`
--
ALTER TABLE `staaten`
  ADD PRIMARY KEY (`IdStaat`);

--
-- Indizes für die Tabelle `tmp_anzeige_1`
--
ALTER TABLE `tmp_anzeige_1`
  ADD PRIMARY KEY (`Anweisung`);

--
-- Indizes für die Tabelle `tmp_anzeige_2`
--
ALTER TABLE `tmp_anzeige_2`
  ADD PRIMARY KEY (`Anweisung`);

--
-- Indizes für die Tabelle `tmp_anzeige_wk_1`
--
ALTER TABLE `tmp_anzeige_wk_1`
  ADD PRIMARY KEY (`Wk_Nummer`);

--
-- Indizes für die Tabelle `tmp_anzeige_wk_2`
--
ALTER TABLE `tmp_anzeige_wk_2`
  ADD PRIMARY KEY (`Wk_Nummer`);

--
-- Indizes für die Tabelle `tmp_gerd_1`
--
ALTER TABLE `tmp_gerd_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_gerd_2`
--
ALTER TABLE `tmp_gerd_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_hardware_1`
--
ALTER TABLE `tmp_hardware_1`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `tmp_hardware_2`
--
ALTER TABLE `tmp_hardware_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `tmp_heber_speichern_1`
--
ALTER TABLE `tmp_heber_speichern_1`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `tmp_heber_speichern_2`
--
ALTER TABLE `tmp_heber_speichern_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `tmp_kr_check_1`
--
ALTER TABLE `tmp_kr_check_1`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `tmp_kr_check_2`
--
ALTER TABLE `tmp_kr_check_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `tmp_letzter_heber_1`
--
ALTER TABLE `tmp_letzter_heber_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_letzter_heber_2`
--
ALTER TABLE `tmp_letzter_heber_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_reload_2`
--
ALTER TABLE `tmp_reload_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_uebernaechster_heber_1`
--
ALTER TABLE `tmp_uebernaechster_heber_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_uebernaechster_heber_2`
--
ALTER TABLE `tmp_uebernaechster_heber_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indizes für die Tabelle `tmp_wk_korrektur_block`
--
ALTER TABLE `tmp_wk_korrektur_block`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `verein`
--
ALTER TABLE `verein`
  ADD PRIMARY KEY (`IdVerein`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `datenbanken`
--
ALTER TABLE `datenbanken`
  MODIFY `Id_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT für Tabelle `heber`
--
ALTER TABLE `heber`
  MODIFY `IdHeber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;

--
-- AUTO_INCREMENT für Tabelle `laender`
--
ALTER TABLE `laender`
  MODIFY `Idlaender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `verein`
--
ALTER TABLE `verein`
  MODIFY `IdVerein` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
