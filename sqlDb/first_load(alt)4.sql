-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Feb 2019 um 15:09
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
-- Tabellenstruktur für Tabelle `aa_test`
--

CREATE TABLE `aa_test` (
  `Id` int(11) NOT NULL,
  `String` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `aa_test`
--

INSERT INTO `aa_test` (`Id`, `String`) VALUES
(1, 'testtesttest');

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
(1, 34, 'AK0'),
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
  `Id` int(11) DEFAULT NULL,
  `Kinder_M` int(11) DEFAULT NULL,
  `Kinder_W` int(11) DEFAULT NULL,
  `Schüler_M` int(11) DEFAULT NULL,
  `Schüler_W` int(11) DEFAULT NULL,
  `Jugend_M` int(11) DEFAULT NULL,
  `Jugend_W` int(11) DEFAULT NULL,
  `Aktive_M` int(11) DEFAULT NULL,
  `Aktive_W` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `gewichtsklassen`
--

INSERT INTO `gewichtsklassen` (`Id`, `Kinder_M`, `Kinder_W`, `Schüler_M`, `Schüler_W`, `Jugend_M`, `Jugend_W`, `Aktive_M`, `Aktive_W`) VALUES
(1, 25, 25, 35, 35, 49, 40, 55, 45),
(2, 30, 30, 40, 40, 55, 45, 61, 49),
(3, 35, 35, 45, 45, 61, 49, 67, 55),
(4, 40, 40, 49, 49, 67, 55, 73, 59),
(5, 45, 45, 55, 55, 73, 59, 81, 64),
(6, 49, 49, 61, 59, 81, 64, 89, 71),
(7, 55, 55, 67, 64, 89, 71, 96, 76),
(8, 61, 59, 73, 71, 96, 76, 102, 81),
(9, 67, 1, 81, 76, 102, 81, 109, 87),
(10, 1, 0, 89, 1, 1, 1, 1, 1),
(11, 0, 0, 96, 0, 0, 0, 0, 0),
(12, 0, 0, 1, 0, 0, 0, 0, 0);

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
(1, 't1', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, 'Auswahl', 'Aktive', '-55', 0, ''),
(2, 't2', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, 'Auswahl', 'Aktive', '-55', 0, ''),
(3, 't3', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, 'Auswahl', 'Aktive', '-55', 0, ''),
(4, 't4', '', -146, 1990, 110.00, 'BY', 'Männlich', 1, 'Auswahl', 'Aktive', '+109', 0, ''),
(5, 't5', '', -146, 1990, 110.00, 'BY', 'Männlich', 1, 'Auswahl', 'Aktive', '+109', 0, '');

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
('TH', 17, 'Thüringen'),
('Unb', 18, 'Unbekannt');

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
(74, 71.5, 39.5),
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
(1, 0.7519450300, 0.7834974760, 175.508, 153.655);

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
(0);

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
(1);

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
(79);

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
(82);

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
('86');

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
(-468, 'Reißen', 101, 2, ' Kaufhold', ' Ayleen', 'Chemnitzer AC e.V.', 57.90, -58);

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
(1, 1, 59);

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
(1, 1, 60);

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
(1, 0, 0, 0, 0, 0, 0, 2);

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
(3, 'Stoßen', 3);

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
(0, 'Reißen', 0);

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
(0, -1, -1, 'Stoßen', 1);

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
(-468, 2, 101, 'Reißen', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_ss_reload_1`
--

CREATE TABLE `tmp_ss_reload_1` (
  `AnsagerR` int(11) NOT NULL,
  `HeberRaumR` int(11) NOT NULL,
  `UebersichtR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_ss_reload_1`
--

INSERT INTO `tmp_ss_reload_1` (`AnsagerR`, `HeberRaumR`, `UebersichtR`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_ss_reload_2`
--

CREATE TABLE `tmp_ss_reload_2` (
  `AnsagerR` int(11) NOT NULL,
  `HeberRaumR` int(11) NOT NULL,
  `UebersichtR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tmp_ss_reload_2`
--

INSERT INTO `tmp_ss_reload_2` (`AnsagerR`, `HeberRaumR`, `UebersichtR`) VALUES
(1, 1, 1);

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
(3);

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
(-96);

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
(73);

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
('VFL Nagold e.V.', -217, 1, 2),
('TSV Cottbus e.V.', -216, 1, 5),
('AC Meißen e.V.', -215, 1, 14),
('AC 1972 Kindsbach e.V.', -214, 1, 18),
('SV-DJK Kolbermoor e.V. ', -213, 1, 3),
('SG Anton Saefkow 83 e.V.', -212, 1, 18),
('USC Viadrina Frankfurt (Oder) e.V:', -211, 1, 5),
('SV Freiburg-Haslach 1895', -210, 1, 2),
('AC 82 Schweinfurt e. V.', -209, 1, 3),
('Powerlifting Würzburg e.V.', -208, 1, 3),
('SAV Kassel 1993 e.V.', -207, 1, 8),
('KSV Bochum 1898 e.V.', -206, 1, 11),
('Sportclub Pforzheim e.V.', -205, 1, 2),
('1. AC Regensburg e.V.', -204, 1, 3),
('HG Rastatt 1972 e. V.', -203, 1, 2),
('SV 1883 Schwarza e.V.', -202, 1, 17),
('Kölner AC v. 1882 e. V. ', -201, 1, 11),
('TuS Raubling e.V.', -200, 1, 3),
('Kylltalheber Ehrang 1973', -199, 1, 12),
('SuS Dortmund Derne e.V.', -198, 1, 11),
('TSG Haßloch e.V.', -197, 1, 12),
('VfL Duisburg-Süd 1920 e.V.', -196, 1, 11),
('Preetzer TSV v. 1861 e.V.', -195, 1, 16),
('TSV Gaarden v. 1875 e.V.', -194, 1, 16),
('AC 1972 e.V. Kindsbach e. V.', -193, 1, 12),
('SV Bayer Wuppertal e.V.', -192, 1, 11),
('AC 1892 Weinheim e. V.', -191, 1, 2),
('1. AC 1954 Bayreuth e.V.', -190, 1, 3),
('ESV-Freimann München', -189, 1, 3),
('SV 90 Gräfenroda e.V.', -188, 1, 17),
('VfL Sindelfingen e.V.', -187, 1, 2),
('TSG 1885 Augsburg  e.V.', -186, 1, 3),
('Athletenteam Vogtland ', -185, 1, 2),
('TB 03 Roding e. V.', -184, 1, 2),
('Testverein 3', -183, 1, 2),
('SG Anton Saefkow 83', -182, 1, 4),
('TUS Freiheit Herten', -181, 1, 2),
('KSV Essen 1888 e.V.', -180, 1, 11),
('AC 1894 Neulußheim e.V.', -179, 1, 2),
('TC Hameln v. 1880 e.V. ', -178, 1, 10),
('TSV Ingolstadt-Nord e.V.', -177, 1, 3),
('SGV Oberböbingen ´20 e.V.', -176, 1, 2),
('TG Landshut v. 1861 e.V.', -175, 1, 3),
('SSV Samswegen 1884', -174, 1, 15),
('TSV ', -173, 1, 2),
('KSC 07 Schifferstadt e.V.', -172, 1, 12),
('ASV 1932 Schleusingen', -171, 1, 17),
('SV Empor Berlin e.V.', -170, 1, 4),
('ESV Loko. Mühlhausen', -169, 1, 17),
('TB 03 Roding e.V.', -168, 1, 3),
('SSV Höchstädt', -167, 1, 3),
('AC Meißen e. V.', -166, 1, 14),
('SV Gold-Blau Augsburg e.V.', -165, 1, 3),
('TSV  Heinsheim e.V.', -164, 1, 2),
('AC Suhl e.V.', -163, 1, 17),
('TSG Rodewisch e.V.', -162, 1, 14),
('TV Mengen 1863 e.V.', -161, 1, 2),
('AV 03 e.V. Speyer', -160, 1, 12),
('MSV Buna Schkopau e.V.', -159, 1, 15),
('TV Ettenheim e.V.', -158, 1, 2),
('Riesaer AC 1969 e.V.', -157, 1, 14),
('TV Feldrennach 1896 e.V.', -156, 1, 2),
('NSAC Görlitz e.V.', -155, 1, 14),
('TSV Burgau e.V.', -154, 1, 3),
('SV Motor Eberswalde e.V.', -153, 1, 5),
('USC Viadrina Frankfurt', -152, 1, 5),
('TSG Angermünde e.V.', -151, 1, 5),
('SGV Oberböbingen 1920 e. V.', -150, 1, 2),
('SC Lüchow v. 1861 e.V.', -149, 1, 10),
('Chemnitzer AC e.V.', -148, 1, 14),
('SV Germania Obrigheim', -147, 1, 2),
('1. AC 1897 Weiden e.V.', -146, 1, 3),
('Dresdner SC 1898 e.V.', -145, 1, 14),
('Kraft-Werk Schwarzach e.V.', -144, 1, 2),
('FAC Sangerhausen e. V.', -143, 1, 15),
('AC Potsdam e.V.', -142, 1, 5),
('ASV 1860 Neumarkt e.V.', -141, 1, 18),
('Berliner TSC e.V.', -140, 1, 4),
('AC Atlas Plauen e.V.', -139, 1, 14),
('AC 1892 Mutterstadt e.V.', -138, 1, 12),
('SG ', -137, 1, 4),
('TSV BW 65 Schwedt e.V.', -136, 1, 5),
('SG Fortschritt Eibau e.V.', -135, 1, 14),
('KSV 1894/96 Kitzingen e.V.', -134, 1, 3),
('ASK Frankfurt (Oder) e.V.', -133, 1, 5),
('TSV Waldkirchen e.V.', -132, 1, 3),
('SV 08 Laufenburg e.V.', -131, 1, 2),
('Eichenauer SV e.V.', -130, 1, 3),
('KSV Grünstadt e.V.', -129, 1, 12),
('SSV 1952 Torgau e.V.', -128, 1, 14),
('KSV Lörrach 1902 e.V.', -127, 1, 2),
('Athletenverein 1903 e.V. Speyer', -126, 1, 2),
('AV Groß-Zimmern', -125, 1, 2),
('Testverein 4', -124, 1, 2),
('ESV-Freimann München e.V.', -123, 1, 3),
('Testverein2', -122, 1, 2),
('Testverein', -121, 1, 2),
('KSV 1898 e.V. St. Georgen e. V.', -120, 1, 2),
('Herrnburger Athletenverein 77 e.V. / Karsten Dähli', -119, 1, 2),
('ASV Herbsleben e.V.', -118, 1, 2),
('KSV 1884 Mannheim e.V.', -117, 1, 2),
('Athletik Club Heros Berlin e.V.', -116, 1, 2),
('Turnverein Ettenheim e.V.', -115, 1, 2),
('Freie Turner Blumenthal e. V. ', -114, 1, 2),
('Athletik-Sport-Verein ADLER  e.V.', -113, 1, 2),
('TuS Raubling e. V.', -112, 1, 2),
('GKV Bad Dürrenberg e. V.', -111, 1, 2),
('SV Einheit Altenburg e. V.', -110, 1, 2),
('TSG 1885 Augsburg  e. V.', -109, 1, 2),
('MSV Buna Schkopau e. V.', -108, 1, 15),
('TSG 1861 Kaiserslautern e. V.', -107, 1, 2),
('Eichenauer Sportverein e.V.', -106, 1, 3),
('Scoop e.V. ', -105, 1, 7),
('TSV 1860 Stralsund e. V.', -104, 1, 2),
('SV Athletia Wiesbaden 1892 ', -103, 1, 2),
('ASV 81 Würzburg e. V.', -102, 1, 2),
('KSV Sömmerda 1910 e. V.', -101, 1, 2),
('Kraftsportverein 1905 Worms e.V., 1. Vorsitzender ', -100, 1, 2),
('1. KSV 1896 Durlach e.V.', -99, 1, 2),
('MTV Vater Jahn Peine', -98, 1, 2),
('Athleten Club 1978 e.V. Forst', -97, 1, 2),
('ASV 1860 Neumarkt i.d.OPf. e. V.', -96, 1, 3),
('PSV Blau Gelb Fulda 1934/61 e. V.', -95, 1, 2),
('1. Athletik-Club 1954 Bayreuth e.V.', -94, 1, 2),
('TSG Haßloch e. V.', -93, 1, 2),
('Sportklub Hansa Germania von 1881 Hamburg e. V. co', -92, 1, 2),
('ESV München-Ost e.V.', -91, 1, 3),
('Athleten-Club 09 e.V. Laubenheim e. V.', -90, 1, 2),
('Turnverein Eintracht Diersburg e. V.', -89, 1, 2),
('SV 08 Laufenburg e. V. Abt.Gewichtheben', -88, 1, 2),
('AC 1904/20 e.V. Mainz-Weisenau e.V.', -87, 1, 2),
('Sportverein Freiburg-Haslach 1895 e.V. ', -86, 1, 2),
('1. Athletenclub 1897 Weiden e.V.', -85, 1, 3),
('SV Blau-Gelb Berlin e. V.', -84, 1, 2),
('VfL Sindelfingen e. V.', -83, 1, 2),
('TSV Forstenried e. V.', -82, 1, 2),
('Riesaer Athletikclub 1969 e. V.', -81, 1, 14),
('Turn-Club Hameln von 1880 e.V. ', -80, 1, 2),
('Kraftsportverein 1894/96 Kitzingen e.V.', -79, 1, 3),
('BKSV Hamburg e.V.', -78, 1, 2),
('Sportverein Tungendorf Neumünster von 1911 e.V. ', -77, 1, 2),
('STC Bavaria 20 Landshut e. V.', -76, 1, 2),
('Ohrdrufer Sportverein e. V.', -75, 1, 2),
('Turnverein Feldrennach 1896 e. V.', -74, 1, 2),
('Breitunger Athletik Verein e.V.', -73, 1, 17),
('GV Donaueschingen e.V.', -72, 1, 2),
('VfK Hannover v. 1903 e.V.', -71, 1, 10),
('Obervellmarer- Sport- Club e. V. Kraftsport', -70, 1, 2),
('SV Magstadt 1897 e. V.', -69, 1, 2),
('TV Heppenheim e. V.', -68, 1, 2),
('TSV 1862 Erding - Abt. Gewichtheben e. V.', -67, 1, 2),
('Turnverein 1898 e.V. Elz - Abtl. Gewichtheben', -66, 1, 2),
('Kylltalheber Ehrang 1973 e. V.', -65, 1, 2),
('BSC Kenpokan e.V.', -64, 1, 10),
('TV 1877 Waldhof-Mannheim e. V.', -63, 1, 2),
('TV Schwäbisch Gmünd-Wetzgau 1920 e. V.', -62, 1, 2),
('AC Goliath Mengede e.V.', -61, 1, 11),
('GV Eisenbach 1976 e.V.', -60, 1, 2),
('ASC 1906 Zeilsheim e.V.', -59, 1, 2),
('Fermersleber Sportverein 1895 Magdeburg e.V.', -58, 1, 2),
('Athletikclub Meißen e. V.', -57, 1, 2),
('ATSV Espelkamp', -56, 1, 2),
('TSV Blau-Weiß 65 Schwedt e. V.', -55, 1, 2),
('SV 14/19 Westerholt e. V.', -54, 1, 2),
('ASV 1897 Tuttlingen e.V.', -53, 1, 2),
('SAV Kassel 1993 e. V.', -52, 1, 2),
('ASV 1897 Neu-Ulm e. V.', -51, 1, 2),
('SG Fortschritt Eibau e. V.', -50, 1, 14),
('Fitness und Athletenclub Sangerhausen e. V.', -49, 1, 2),
('VfL Nagold e. V.', -48, 1, 2),
('Dresdner Sportclub 1898 e.V.', -47, 1, 14),
('SV 1883 Schwarza e. V.', -46, 1, 2),
('SV Fellbach 1890 e. V.', -45, 1, 2),
('Turnverein Eichen v. 1888 e.V.', -44, 1, 2),
('SV Empor Berlin e. V.', -43, 1, 4),
('SV 90 Gräfenroda e. V.', -42, 1, 17),
('SSV Samswegen 1884 e. V.', -41, 1, 15),
('SC Lüchow v. 1861 e. V.', -40, 1, 10),
('TSV Ingolstadt-Nord 1897/1913 e. V.', -39, 1, 3),
('Gewichtheber u.  Fitness Club Artern e. V', -38, 1, 2),
('SV - DJK  Kolbermoor e. V.', -37, 1, 2),
('AC 1894 e.V. Neulußheim e.V.', -36, 1, 2),
('ESV Lokomotive Mühlhausen e.V.', -35, 1, 17),
('Gymnastikverein Luckenwalde e.V.', -34, 1, 2),
('Sportverein Flözlingen 1920 e. V.', -33, 1, 2),
('Athleten-Club Suhl e.V.', -32, 1, 2),
('TSV Röthenbach e. V.', -31, 1, 2),
('Hebergemeinschaft Rastatt 1972 e. V.', -30, 1, 2),
('TSV Rettigheim 1902 e.V.', -29, 1, 2),
('AC 1923 Altrip e.V.', -28, 1, 2),
('Athleten - Club 82 Schweinfurt e. V.', -27, 1, 2),
('SG Heidelberg - Kirchheim e. V.', -26, 1, 2),
('Gewichtheber und Aerobic Verein Zittau 04 e. V.', -25, 1, 2),
('SV Bayer Wuppertal e. V.', -24, 1, 2),
('Sportvereinigung Gifhorn von 1912 e.V.', -23, 1, 2),
('Kraftsportverein Essen 1888 e.V.', -22, 1, 2),
('TSV Grün-Weiß Rostock 1895 e. V.', -21, 1, 2),
('Jugendkraft Crawinkel e.V.', -20, 1, 2),
('GSV Eintracht Baunatal e.V.', -19, 1, 2),
('Bielefelder TG v. 1848 e.V.', -18, 1, 2),
('Berliner Turn- und Sportclub e.V.', -17, 1, 2),
('Athletik-Club Potsdam e.V.', -16, 1, 2),
('TSV Waldkirchen e. V.', -15, 1, 3),
('Turn- und Athletenverein Brüel e.V .', -14, 1, 2),
('AC Olympia Schrobenhausen v.1895', -13, 1, 2),
('Sportclub Pforzheim e. V.', -12, 1, 2),
('KSV Grünstadt e. V.', -11, 1, 2),
('ESV München-Neuaubing e. V.', -10, 1, 2),
('Athleten-Club 1892 Mutterstadt e.V.', -9, 1, 2),
('ASV 1901 Ladenburg e.V.', -8, 1, 2),
('KSV 1959 Langen e.V.', -7, 1, 8),
('Athletik Club 1892 Weinheim e. V.', -6, 1, 2),
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
('AC Heros Wemmetsweiler ', 8, 1, 2),
('ASK Frankfurt/Oder', 9, 0, 5),
('ASV Ladenburg', 10, 0, 2),
('AC Potsdam', 11, 0, 5),
('AC Goliath 20 Mengede', 12, 0, 11),
('Berliner TSC', 13, 0, 4),
('Breitunger AV', 14, 0, 17),
('Chemnitzer AC', 15, 0, 14),
('Eichenauer SV', 16, 0, 3),
('FAC Sangerhausen', 17, 0, 15),
('KSC 07 Schifferstadt', 18, 0, 12),
('KSV Grünstadt', 19, 0, 12),
('Motor Eberswalde', 21, 0, 5),
('ESV München Freimann', 22, 0, 3),
('NSAC Görlitz', 23, 0, 14),
('Riesaer AC', 24, 0, 14),
('SC Lüchow', 25, 0, 10),
('SG F. Eibau', 26, 0, 14),
('SG Saefkow', 27, 0, 4),
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
('TSV Heinsheim', 41, 1, 18),
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
('KSV Langen ', 53, 1, 18),
('FTG Pfungstadt', 54, 0, 8),
('AC 1892 Mutterstadt', 57, 0, 12),
('AC Germania St. Ilgen', 58, 0, 2),
('1.AC Bayreuth', 64, 0, 3),
('BSC Kenpokan', 68, 0, 10),
('ESV München-Neuaubing', 69, 1, 3),
('GSV Eintrach Baunatal', 70, 0, 8),
('KraftMühle Würzburg', 71, 0, 3),
('Kraft-Werk Schwarzach', 72, 0, 2),
('GV Eisenbach', 73, 0, 2),
('HG Rastatt', 75, 0, 2),
('KSV Bavaria Regensburg', 76, 0, 3),
('KSV Hostenbach', 77, 1, 2),
('MSV Buna Schkobau', 78, 0, 15),
('Ohrdrufer Sportverein', 79, 0, 17),
('Preetzer TSV', 80, 0, 12),
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
('Kein Verein', 9000, 1, 2),
('AC Germania Aschaffenburg-Schweinheim', 9002, 1, 2),
('KSV 1898 St. Georgen e.V.', 9003, 0, 2),
('AV Großzimmern', 9004, 0, 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `versions_tabelle`
--

CREATE TABLE `versions_tabelle` (
  `Id` int(11) NOT NULL,
  `Versionsnummer` float(11,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `versions_tabelle`
--

INSERT INTO `versions_tabelle` (`Id`, `Versionsnummer`) VALUES
(1, 1.002);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aa_test`
--
ALTER TABLE `aa_test`
  ADD PRIMARY KEY (`Id`);

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
-- Indizes für die Tabelle `tmp_ss_reload_1`
--
ALTER TABLE `tmp_ss_reload_1`
  ADD PRIMARY KEY (`AnsagerR`);

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
-- Indizes für die Tabelle `versions_tabelle`
--
ALTER TABLE `versions_tabelle`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `datenbanken`
--
ALTER TABLE `datenbanken`
  MODIFY `Id_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT für Tabelle `heber`
--
ALTER TABLE `heber`
  MODIFY `IdHeber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `laender`
--
ALTER TABLE `laender`
  MODIFY `Idlaender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `verein`
--
ALTER TABLE `verein`
  MODIFY `IdVerein` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
