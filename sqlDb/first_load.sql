-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 08:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhp`
--

-- --------------------------------------------------------

--
-- Table structure for table `aa_test`
--

CREATE TABLE `aa_test` (
  `Id` int(11) NOT NULL,
  `String` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `aa_test`
--

INSERT INTO `aa_test` (`Id`, `String`) VALUES
(1, 'testtesttest');

-- --------------------------------------------------------

--
-- Table structure for table `alters_klassen`
--

CREATE TABLE `alters_klassen` (
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alters_klassen`
--

INSERT INTO `alters_klassen` (`Von`, `Bis`, `Klasse`) VALUES
(0, 12, 'Kinder'),
(13, 15, 'Schüler'),
(16, 17, 'Jugend'),
(18, 20, 'Junioren'),
(21, 120, 'Aktive');

-- --------------------------------------------------------

--
-- Table structure for table `alters_klassen_masters`
--

CREATE TABLE `alters_klassen_masters` (
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alters_klassen_masters`
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
(80, 84, 'AK10'),
(85, 89, 'AK11'),
(90, 94, 'AK12'),
(95, 99, 'AK13');

-- --------------------------------------------------------

--
-- Table structure for table `alters_klassen_zk`
--

CREATE TABLE `alters_klassen_zk` (
  `Id` int(11) NOT NULL,
  `Von` int(11) NOT NULL,
  `Bis` int(11) NOT NULL,
  `Klasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alters_klassen_zk`
--

INSERT INTO `alters_klassen_zk` (`Id`, `Von`, `Bis`, `Klasse`) VALUES
(1, 0, 12, 'Kinder'),
(2, 13, 15, 'Schüler'),
(3, 16, 17, 'Jugend'),
(4, 18, 20, 'Junioren'),
(5, 21, 100, 'Aktive');

-- --------------------------------------------------------

--
-- Table structure for table `auswertung_laender_mannschaft_109`
--

CREATE TABLE `auswertung_laender_mannschaft_109` (
  `laender` text DEFAULT NULL,
  `Punkte` float(11,1) DEFAULT NULL,
  `Platz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bl_grp`
--

CREATE TABLE `bl_grp` (
  `Grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bl_grp`
--

INSERT INTO `bl_grp` (`Grp`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `bridgen`
--

CREATE TABLE `bridgen` (
  `Bridge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bridgen`
--

INSERT INTO `bridgen` (`Bridge`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `datenbanken`
--

CREATE TABLE `datenbanken` (
  `Id_Db` int(11) NOT NULL,
  `Datenbank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flaggen_staaten`
--

CREATE TABLE `flaggen_staaten` (
  `IdStaat` int(11) NOT NULL,
  `Image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flaggen_staaten`
--

INSERT INTO `flaggen_staaten` (`IdStaat`, `Image`) VALUES
(0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geschlecht`
--

CREATE TABLE `geschlecht` (
  `Geschlecht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `geschlecht`
--

INSERT INTO `geschlecht` (`Geschlecht`) VALUES
('Männlich'),
('Weiblich');

-- --------------------------------------------------------

--
-- Table structure for table `gewichtsklassen`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gewichtsklassen`
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
-- Table structure for table `gruppen_aus`
--

CREATE TABLE `gruppen_aus` (
  `Gruppen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gruppen_aus`
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
-- Table structure for table `heber`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laender`
--

CREATE TABLE `laender` (
  `laender` text NOT NULL,
  `Idlaender` int(11) NOT NULL,
  `laender_lang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laender`
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
-- Table structure for table `laenderwertung`
--

CREATE TABLE `laenderwertung` (
  `Platz` int(11) NOT NULL,
  `P_Punkte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laenderwertung`
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
-- Table structure for table `master_pw`
--

CREATE TABLE `master_pw` (
  `Id` int(11) NOT NULL,
  `Master_PW` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relativtabzug`
--

CREATE TABLE `relativtabzug` (
  `Gewicht` int(11) NOT NULL,
  `Maenner` double(11,1) NOT NULL,
  `Frauen` double(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `relativtabzug`
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
-- Table structure for table `robi_faktoren_men_aktive`
--

CREATE TABLE `robi_faktoren_men_aktive` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_men_aktive`
--

INSERT INTO `robi_faktoren_men_aktive` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 55, 293),
(2, 61, 317),
(3, 67, 339),
(4, 73, 362),
(5, 81, 375),
(6, 89, 387),
(7, 96, 416),
(8, 102, 412),
(9, 109, 435),
(10, 1, 478);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_men_junioren`
--

CREATE TABLE `robi_faktoren_men_junioren` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_men_junioren`
--

INSERT INTO `robi_faktoren_men_junioren` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 55, 264),
(2, 61, 293),
(3, 67, 316),
(4, 73, 344),
(5, 81, 372),
(6, 89, 371),
(7, 96, 397),
(8, 102, 392),
(9, 109, 410),
(10, 1, 432);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_men_schueler`
--

CREATE TABLE `robi_faktoren_men_schueler` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_men_schueler`
--

INSERT INTO `robi_faktoren_men_schueler` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 49, 220),
(2, 55, 248),
(3, 61, 263),
(4, 67, 297),
(5, 73, 306),
(6, 81, 327),
(7, 89, 342),
(8, 96, 350),
(9, 102, 353),
(10, 1, 352);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_men_standart`
--

CREATE TABLE `robi_faktoren_men_standart` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_men_standart`
--

INSERT INTO `robi_faktoren_men_standart` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 55, 293),
(2, 61, 312),
(3, 67, 331),
(4, 73, 348),
(5, 81, 368),
(6, 89, 387),
(7, 96, 401),
(8, 102, 412),
(9, 109, 424),
(10, 1, 453);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_women_aktive`
--

CREATE TABLE `robi_faktoren_women_aktive` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_women_aktive`
--

INSERT INTO `robi_faktoren_women_aktive` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 45, 191),
(2, 49, 210),
(3, 55, 232),
(4, 59, 243),
(5, 64, 257),
(6, 71, 267),
(7, 76, 278),
(8, 81, 283),
(9, 87, 294),
(10, 1, 331);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_women_junioren`
--

CREATE TABLE `robi_faktoren_women_junioren` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_women_junioren`
--

INSERT INTO `robi_faktoren_women_junioren` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 45, 179),
(2, 49, 206),
(3, 55, 211),
(4, 59, 227),
(5, 64, 240),
(6, 71, 252),
(7, 76, 259),
(8, 81, 259),
(9, 87, 269),
(10, 1, 324);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_women_schueler`
--

CREATE TABLE `robi_faktoren_women_schueler` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_women_schueler`
--

INSERT INTO `robi_faktoren_women_schueler` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 40, 135),
(2, 45, 157),
(3, 49, 177),
(4, 55, 192),
(5, 59, 206),
(6, 64, 215),
(7, 71, 225),
(8, 76, 229),
(9, 81, 231),
(10, 1, 230);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktoren_women_standart`
--

CREATE TABLE `robi_faktoren_women_standart` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktoren_women_standart`
--

INSERT INTO `robi_faktoren_women_standart` (`Id`, `GwKl`, `WeltRekord`) VALUES
(1, 45, 191),
(2, 49, 203),
(3, 55, 221),
(4, 59, 232),
(5, 64, 245),
(6, 71, 261),
(7, 76, 272),
(8, 81, 283),
(9, 87, 294),
(10, 1, 320);

-- --------------------------------------------------------

--
-- Table structure for table `robi_faktor_b`
--

CREATE TABLE `robi_faktor_b` (
  `Id` int(11) DEFAULT NULL,
  `B` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `robi_faktor_b`
--

INSERT INTO `robi_faktor_b` (`Id`, `B`) VALUES
(1, 3.3219281);

-- --------------------------------------------------------

--
-- Table structure for table `sinclair_alterstabellle`
--

CREATE TABLE `sinclair_alterstabellle` (
  `Age` int(11) NOT NULL,
  `Al_Sin_Werte` float(11,3) NOT NULL,
  `Al_Sin_Werte_W` float(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sinclair_alterstabellle`
--

INSERT INTO `sinclair_alterstabellle` (`Age`, `Al_Sin_Werte`, `Al_Sin_Werte_W`) VALUES
(30, 1.000, 1.000),
(31, 1.016, 1.016),
(32, 1.031, 1.031),
(33, 1.046, 1.046),
(34, 1.059, 1.059),
(35, 1.072, 1.072),
(36, 1.083, 1.084),
(37, 1.096, 1.097),
(38, 1.109, 1.110),
(39, 1.122, 1.124),
(40, 1.135, 1.138),
(41, 1.149, 1.153),
(42, 1.162, 1.170),
(43, 1.176, 1.187),
(44, 1.189, 1.205),
(45, 1.203, 1.223),
(46, 1.218, 1.244),
(47, 1.233, 1.265),
(48, 1.248, 1.288),
(49, 1.263, 1.313),
(50, 1.279, 1.340),
(51, 1.297, 1.369),
(52, 1.316, 1.401),
(53, 1.338, 1.435),
(54, 1.361, 1.470),
(55, 1.385, 1.507),
(56, 1.411, 1.545),
(57, 1.437, 1.585),
(58, 1.462, 1.625),
(59, 1.488, 1.665),
(60, 1.514, 1.705),
(61, 1.541, 1.744),
(62, 1.568, 1.778),
(63, 1.598, 1.808),
(64, 1.629, 1.839),
(65, 1.663, 1.873),
(66, 1.699, 1.909),
(67, 1.738, 1.948),
(68, 1.779, 1.989),
(69, 1.823, 2.033),
(70, 1.867, 2.077),
(71, 1.910, 2.120),
(72, 1.953, 2.163),
(73, 2.004, 2.214),
(74, 2.060, 2.270),
(75, 2.117, 2.327),
(76, 2.181, 2.391),
(77, 2.255, 2.465),
(78, 2.336, 2.546),
(79, 2.419, 2.629),
(80, 2.504, 2.714),
(81, 2.597, 0.000),
(82, 2.702, 0.000),
(83, 2.831, 0.000),
(84, 2.981, 0.000),
(85, 3.153, 0.000),
(86, 3.352, 0.000),
(87, 3.580, 0.000),
(88, 3.843, 0.000),
(89, 4.145, 0.000),
(90, 4.493, 0.000);

-- --------------------------------------------------------

--
-- Table structure for table `sinclair_faktoren`
--

CREATE TABLE `sinclair_faktoren` (
  `Id` int(11) NOT NULL,
  `Sin_Koef_M` double(15,10) NOT NULL,
  `Sin_Koef_W` double(15,10) NOT NULL,
  `Sin_Gew_M` double(11,3) NOT NULL,
  `Sin_Gew_W` double(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sinclair_faktoren`
--

INSERT INTO `sinclair_faktoren` (`Id`, `Sin_Koef_M`, `Sin_Koef_W`, `Sin_Gew_M`, `Sin_Gew_W`) VALUES
(1, 0.7227625210, 0.7870043410, 193.609, 153.757);

-- --------------------------------------------------------

--
-- Table structure for table `skalierungsfaktoren`
--

CREATE TABLE `skalierungsfaktoren` (
  `age` int(11) NOT NULL,
  `maennlich` float(11,5) DEFAULT NULL,
  `weiblich` float(11,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skalierungsfaktoren`
--

INSERT INTO `skalierungsfaktoren` (`age`, `maennlich`, `weiblich`) VALUES
(1, 1.00000, 1.00000),
(2, 1.00000, 1.00000),
(3, 1.00000, 1.00000),
(4, 1.00000, 1.00000),
(5, 1.00000, 1.00000),
(6, 1.00000, 1.00000),
(7, 1.00000, 1.00000),
(8, 1.00000, 1.00000),
(9, 1.00000, 1.00000),
(10, 1.00000, 1.00000),
(11, 1.00000, 1.00000),
(12, 1.00000, 1.00000),
(13, 1.00000, 1.00000),
(14, 1.00000, 1.00000),
(15, 1.00000, 1.00000),
(16, 1.00000, 1.00000),
(17, 1.00000, 1.00000),
(18, 1.00000, 1.00000),
(19, 1.00000, 1.00000),
(20, 1.00000, 1.00000),
(21, 1.00000, 1.00000),
(22, 1.00000, 1.00000),
(23, 1.00000, 1.00000),
(24, 1.00000, 1.00000),
(25, 1.00000, 1.00000),
(26, 1.00000, 1.00000),
(27, 1.00000, 1.00000),
(28, 1.00000, 1.00000),
(29, 1.00000, 1.00000),
(30, 1.00000, 1.00000),
(31, 1.00000, 1.00000),
(32, 1.00000, 1.00000),
(33, 1.00000, 1.00000),
(34, 1.00000, 1.00000),
(35, 1.00000, 1.00000),
(36, 1.00000, 1.00000),
(37, 1.00000, 1.00000),
(38, 1.00000, 1.00000),
(39, 1.00000, 1.00000),
(40, 1.00000, 1.00000),
(41, 1.00000, 1.00000),
(42, 1.00000, 1.00000),
(43, 1.00000, 1.00000),
(44, 1.00000, 1.00000),
(45, 1.00000, 1.00000),
(46, 1.00000, 1.00000),
(47, 1.00000, 1.00000),
(48, 1.00000, 1.00000),
(49, 1.00000, 1.00000),
(50, 1.00000, 1.00000),
(51, 1.00000, 1.00000),
(52, 1.00000, 1.00000),
(53, 1.00000, 1.00000),
(54, 1.00000, 1.00000),
(55, 1.00000, 1.00000),
(56, 1.00000, 1.00000),
(57, 1.00000, 1.00000),
(58, 1.00000, 1.00000),
(59, 1.00000, 1.00000),
(60, 1.00000, 1.00000),
(61, 1.00000, 1.00000),
(62, 1.00000, 1.00000),
(63, 1.00000, 1.00000),
(64, 1.00000, 1.00000),
(65, 1.00000, 1.00000),
(66, 1.00000, 1.00000),
(67, 1.00000, 1.00000),
(68, 1.00000, 1.00000),
(69, 1.00000, 1.00000),
(70, 1.00000, 1.00000),
(71, 1.00000, 1.00000),
(72, 1.00000, 1.00000),
(73, 1.00000, 1.00000),
(74, 1.00000, 1.00000),
(75, 1.00000, 1.00000),
(76, 1.00000, 1.00000),
(77, 1.00000, 1.00000),
(78, 1.00000, 1.00000),
(79, 1.00000, 1.00000),
(80, 1.00000, 1.00000),
(81, 1.00000, 1.00000),
(82, 1.00000, 1.00000),
(83, 1.00000, 1.00000),
(84, 1.00000, 1.00000),
(85, 1.00000, 1.00000),
(86, 1.00000, 1.00000),
(87, 1.00000, 1.00000),
(88, 1.00000, 1.00000),
(89, 1.00000, 1.00000),
(90, 1.00000, 1.00000),
(91, 1.00000, 1.00000),
(92, 1.00000, 1.00000),
(93, 1.00000, 1.00000),
(94, 1.00000, 1.00000),
(95, 1.00000, 1.00000),
(96, 1.00000, 1.00000),
(97, 1.00000, 1.00000),
(98, 1.00000, 1.00000),
(99, 1.00000, 1.00000),
(100, 1.00000, 1.00000),
(101, 1.00000, 1.00000),
(102, 1.00000, 1.00000),
(103, 1.00000, 1.00000),
(104, 1.00000, 1.00000),
(105, 1.00000, 1.00000),
(106, 1.00000, 1.00000),
(107, 1.00000, 1.00000),
(108, 1.00000, 1.00000),
(109, 1.00000, 1.00000);

-- --------------------------------------------------------

--
-- Table structure for table `staaten`
--

CREATE TABLE `staaten` (
  `IdStaat` int(11) NOT NULL,
  `Staat` text NOT NULL,
  `FlaggenFormat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staaten`
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
-- Table structure for table `tmp_absignal_1`
--

CREATE TABLE `tmp_absignal_1` (
  `Id` int(11) NOT NULL,
  `Kr1` int(11) DEFAULT NULL,
  `Kr2` int(11) DEFAULT NULL,
  `Kr3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmp_absignal_1`
--

INSERT INTO `tmp_absignal_1` (`Id`, `Kr1`, `Kr2`, `Kr3`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_absignal_2`
--

CREATE TABLE `tmp_absignal_2` (
  `Id` int(11) NOT NULL,
  `Kr1` int(11) DEFAULT NULL,
  `Kr2` int(11) DEFAULT NULL,
  `Kr3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmp_absignal_2`
--

INSERT INTO `tmp_absignal_2` (`Id`, `Kr1`, `Kr2`, `Kr3`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_anzeige_1`
--

CREATE TABLE `tmp_anzeige_1` (
  `Anweisung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_anzeige_1`
--

INSERT INTO `tmp_anzeige_1` (`Anweisung`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_anzeige_2`
--

CREATE TABLE `tmp_anzeige_2` (
  `Anweisung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_anzeige_2`
--

INSERT INTO `tmp_anzeige_2` (`Anweisung`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_anzeige_wk_1`
--

CREATE TABLE `tmp_anzeige_wk_1` (
  `Wk_Nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_anzeige_wk_1`
--

INSERT INTO `tmp_anzeige_wk_1` (`Wk_Nummer`) VALUES
(107);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_anzeige_wk_2`
--

CREATE TABLE `tmp_anzeige_wk_2` (
  `Wk_Nummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_anzeige_wk_2`
--

INSERT INTO `tmp_anzeige_wk_2` (`Wk_Nummer`) VALUES
(82);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_db`
--

CREATE TABLE `tmp_db` (
  `S_Db` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_db`
--

INSERT INTO `tmp_db` (`S_Db`) VALUES
('109');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gerd_1`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_gerd_1`
--

INSERT INTO `tmp_gerd_1` (`IdHeber`, `Art`, `HGw`, `V`, `Name`, `Vorname`, `Verein`, `Kgw`, `Klasse`) VALUES
(-80, 'Stossen', 101, 2, 'Herweg', 'Lucy', 'ASK Frankfurt (Oder) e.V.', 64.00, -64);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gerd_2`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_gerd_2`
--

INSERT INTO `tmp_gerd_2` (`IdHeber`, `Art`, `HGw`, `V`, `Name`, `Vorname`, `Verein`, `Kgw`, `Klasse`) VALUES
(-468, 'Reißen', 101, 2, ' Kaufhold', ' Ayleen', 'Chemnitzer AC e.V.', 57.90, -58);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_hardware_1`
--

CREATE TABLE `tmp_hardware_1` (
  `Id` int(11) NOT NULL,
  `Anweisung` int(11) NOT NULL,
  `Zeit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_hardware_1`
--

INSERT INTO `tmp_hardware_1` (`Id`, `Anweisung`, `Zeit`) VALUES
(1, 1, 59);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_hardware_2`
--

CREATE TABLE `tmp_hardware_2` (
  `Id` int(11) NOT NULL,
  `Anweisung` int(11) NOT NULL,
  `Zeit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_hardware_2`
--

INSERT INTO `tmp_hardware_2` (`Id`, `Anweisung`, `Zeit`) VALUES
(1, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_heber_speichern_1`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_heber_speichern_1`
--

INSERT INTO `tmp_heber_speichern_1` (`Id`, `IdHeber`, `Versuch`, `G1`, `G2`, `G3`, `Time1`, `Time2`, `Time3`, `Technik1`, `Technik2`, `Technik3`) VALUES
(1, 0, 0, '', '', '', 0, 0, 0, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_heber_speichern_2`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_heber_speichern_2`
--

INSERT INTO `tmp_heber_speichern_2` (`Id`, `IdHeber`, `Versuch`, `G1`, `G2`, `G3`, `Time1`, `Time2`, `Time3`, `Technik1`, `Technik2`, `Technik3`) VALUES
(1, 0, 0, '', '', '', 0, 0, 0, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_jury_status_1`
--

CREATE TABLE `tmp_jury_status_1` (
  `Id` int(11) NOT NULL,
  `Anzeige` int(11) NOT NULL,
  `Sprecher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_jury_status_1`
--

INSERT INTO `tmp_jury_status_1` (`Id`, `Anzeige`, `Sprecher`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_jury_status_2`
--

CREATE TABLE `tmp_jury_status_2` (
  `Id` int(11) NOT NULL,
  `Anzeige` int(11) NOT NULL,
  `Sprecher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_jury_status_2`
--

INSERT INTO `tmp_jury_status_2` (`Id`, `Anzeige`, `Sprecher`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_kr_check_1`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_kr_check_1`
--

INSERT INTO `tmp_kr_check_1` (`ID`, `K1`, `K2`, `K3`, `Re1`, `Re2`, `Re3`, `ReAnzeige`) VALUES
(1, 0, 0, 0, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_kr_check_2`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_kr_check_2`
--

INSERT INTO `tmp_kr_check_2` (`Id`, `K1`, `K2`, `K3`, `Re1`, `Re2`, `Re3`, `ReAnzeige`) VALUES
(1, 0, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_letzter_heber_1`
--

CREATE TABLE `tmp_letzter_heber_1` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `V` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_letzter_heber_1`
--

INSERT INTO `tmp_letzter_heber_1` (`IdHeber`, `Art`, `V`) VALUES
(0, 'Stossen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_letzter_heber_2`
--

CREATE TABLE `tmp_letzter_heber_2` (
  `IdHeber` int(11) NOT NULL,
  `Art` text NOT NULL,
  `V` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_letzter_heber_2`
--

INSERT INTO `tmp_letzter_heber_2` (`IdHeber`, `Art`, `V`) VALUES
(0, 'Reißen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_reload_1`
--

CREATE TABLE `tmp_reload_1` (
  `IdHeber` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `HGw` int(11) NOT NULL,
  `Art` text NOT NULL,
  `Gruppe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_reload_1`
--

INSERT INTO `tmp_reload_1` (`IdHeber`, `V`, `HGw`, `Art`, `Gruppe`) VALUES
(-80, 2, 101, 'Stossen', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_reload_2`
--

CREATE TABLE `tmp_reload_2` (
  `IdHeber` int(11) NOT NULL,
  `V` int(11) NOT NULL,
  `HGw` int(11) NOT NULL,
  `Art` text NOT NULL,
  `Gruppe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_reload_2`
--

INSERT INTO `tmp_reload_2` (`IdHeber`, `V`, `HGw`, `Art`, `Gruppe`) VALUES
(-468, 2, 101, 'Reißen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_ss_reload_1`
--

CREATE TABLE `tmp_ss_reload_1` (
  `Id` int(11) DEFAULT NULL,
  `AnsagerR` int(11) DEFAULT NULL,
  `HeberRaumR` int(11) DEFAULT NULL,
  `UebersichtR` int(11) DEFAULT NULL,
  `Wk_Leiter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmp_ss_reload_1`
--

INSERT INTO `tmp_ss_reload_1` (`Id`, `AnsagerR`, `HeberRaumR`, `UebersichtR`, `Wk_Leiter`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_ss_reload_2`
--

CREATE TABLE `tmp_ss_reload_2` (
  `Id` int(11) DEFAULT NULL,
  `AnsagerR` int(11) DEFAULT NULL,
  `HeberRaumR` int(11) DEFAULT NULL,
  `UebersichtR` int(11) DEFAULT NULL,
  `Wk_Leiter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmp_ss_reload_2`
--

INSERT INTO `tmp_ss_reload_2` (`Id`, `AnsagerR`, `HeberRaumR`, `UebersichtR`, `Wk_Leiter`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_uebernaechster_heber_1`
--

CREATE TABLE `tmp_uebernaechster_heber_1` (
  `IdHeber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_uebernaechster_heber_1`
--

INSERT INTO `tmp_uebernaechster_heber_1` (`IdHeber`) VALUES
(-124);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_uebernaechster_heber_2`
--

CREATE TABLE `tmp_uebernaechster_heber_2` (
  `IdHeber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_uebernaechster_heber_2`
--

INSERT INTO `tmp_uebernaechster_heber_2` (`IdHeber`) VALUES
(-96);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_uebersichtmk_reload`
--

CREATE TABLE `tmp_uebersichtmk_reload` (
  `IdReload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_uebersichtmk_reload`
--

INSERT INTO `tmp_uebersichtmk_reload` (`IdReload`) VALUES
(73);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_wk_korrektur_block`
--

CREATE TABLE `tmp_wk_korrektur_block` (
  `Id` int(11) NOT NULL,
  `Grp_Bridge_1` int(11) NOT NULL,
  `Grp_Bridge_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tmp_wk_korrektur_block`
--

INSERT INTO `tmp_wk_korrektur_block` (`Id`, `Grp_Bridge_1`, `Grp_Bridge_2`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_wk_testpokal`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verein`
--

CREATE TABLE `verein` (
  `Verein` text NOT NULL,
  `IdVerein` int(11) NOT NULL,
  `Bundesliga` int(11) NOT NULL,
  `IdLaender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `verein`
--

INSERT INTO `verein` (`Verein`, `IdVerein`, `Bundesliga`, `IdLaender`) VALUES
('MTV Soltau ', -46, 1, 10),
('AC 1892 Weinheim e. V.', -45, 1, 2),
('Ohrdrufer SV e.V.', -44, 1, 17),
('TSV Waldkirchen e.V.', -43, 1, 3),
('AV 03 e.V. Speyer', -42, 1, 12),
('SV Flözlingen 1920 e.V.', -41, 1, 2),
('SV 08 Laufenburg e.V.', -40, 1, 2),
('AC Atlas Plauen e.V.', -39, 1, 14),
('AC Potsdam e.V.', -38, 1, 5),
('ESV München-Ost e.V.', -37, 1, 3),
('KSV 1959 Langen e.V.', -36, 1, 8),
('AC Germania St. Ilgen e.V.', -35, 1, 2),
('GV Eisenbach 1976 e.V.', -34, 1, 2),
('TB 03 Roding e.V.', -33, 1, 3),
('TSG Rodewisch e.V.', -32, 1, 14),
('TSV Burgau e.V.', -31, 1, 3),
('SAV Kassel 1993 e.V.', -30, 1, 8),
('AC 1892 Mutterstadt e.V.', -29, 1, 12),
('SGV Böbingen 1920 e.V.', -28, 1, 2),
('Athletik Hamburg e.V.', -27, 1, 7),
('SG Fortschritt Eibau e.V.', -26, 1, 14),
('TSG Haßloch e.V.', -25, 1, 12),
('AC Suhl e.V.', -24, 1, 17),
('NSAC Görlitz e.V.', -23, 1, 14),
('SV Empor Berlin e.V.', -22, 1, 4),
('ASV Herbsleben e.V.', -21, 1, 17),
('Riesaer AC 1969 e.V.', -20, 1, 14),
('TSV  Heinsheim e.V.', -19, 1, 2),
('SV 90 Gräfenroda e.V.', -18, 1, 17),
('SV Germania Obrigheim', -17, 1, 2),
('TSV Röthenbach e.V.', -16, 1, 3),
('KSV Lörrach 1902 e.V.', -15, 1, 2),
('TV 1898 e.V. Elz ', -14, 1, 8),
('KraftWerkstatt Lörrach e.V.', -13, 1, 2),
('WFC Nagold e.V.', -12, 1, 2),
('TSV BW 65 Schwedt e.V.', -11, 1, 5),
('1. AC 1897 Weiden e.V.', -10, 1, 3),
('ASK Frankfurt (Oder) e.V.', -9, 1, 5),
('ASV 1901 Ladenburg e.V.', -8, 1, 2),
('Dresdner SC 1898 e.V.', -7, 1, 14),
('Chemnitzer AC e.V.', -6, 1, 14),
('ASV 1932 Schleusingen', -5, 1, 17),
('Berliner TSC e.V.', -4, 1, 4),
('Sus Jandelsbrunn e. V.', -3, 1, 3),
('AC Meißen e. V.', -2, 1, 14),
('ASV 1897 Tuttlingen e.V.', -1, 1, 2),
('Kein Verein', 9000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `versions_tabelle`
--

CREATE TABLE `versions_tabelle` (
  `Id` int(11) NOT NULL,
  `Versionsnummer` float(11,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `versions_tabelle`
--

INSERT INTO `versions_tabelle` (`Id`, `Versionsnummer`) VALUES
(1, 1.111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aa_test`
--
ALTER TABLE `aa_test`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `alters_klassen`
--
ALTER TABLE `alters_klassen`
  ADD PRIMARY KEY (`Von`);

--
-- Indexes for table `alters_klassen_masters`
--
ALTER TABLE `alters_klassen_masters`
  ADD PRIMARY KEY (`Von`);

--
-- Indexes for table `alters_klassen_zk`
--
ALTER TABLE `alters_klassen_zk`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `datenbanken`
--
ALTER TABLE `datenbanken`
  ADD PRIMARY KEY (`Id_Db`);

--
-- Indexes for table `flaggen_staaten`
--
ALTER TABLE `flaggen_staaten`
  ADD PRIMARY KEY (`IdStaat`);

--
-- Indexes for table `gruppen_aus`
--
ALTER TABLE `gruppen_aus`
  ADD PRIMARY KEY (`Gruppen`);

--
-- Indexes for table `heber`
--
ALTER TABLE `heber`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `laender`
--
ALTER TABLE `laender`
  ADD PRIMARY KEY (`Idlaender`);

--
-- Indexes for table `laenderwertung`
--
ALTER TABLE `laenderwertung`
  ADD PRIMARY KEY (`Platz`);

--
-- Indexes for table `relativtabzug`
--
ALTER TABLE `relativtabzug`
  ADD PRIMARY KEY (`Gewicht`);

--
-- Indexes for table `sinclair_faktoren`
--
ALTER TABLE `sinclair_faktoren`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `skalierungsfaktoren`
--
ALTER TABLE `skalierungsfaktoren`
  ADD PRIMARY KEY (`age`);

--
-- Indexes for table `staaten`
--
ALTER TABLE `staaten`
  ADD PRIMARY KEY (`IdStaat`);

--
-- Indexes for table `tmp_absignal_1`
--
ALTER TABLE `tmp_absignal_1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_absignal_2`
--
ALTER TABLE `tmp_absignal_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_anzeige_1`
--
ALTER TABLE `tmp_anzeige_1`
  ADD PRIMARY KEY (`Anweisung`);

--
-- Indexes for table `tmp_anzeige_2`
--
ALTER TABLE `tmp_anzeige_2`
  ADD PRIMARY KEY (`Anweisung`);

--
-- Indexes for table `tmp_anzeige_wk_1`
--
ALTER TABLE `tmp_anzeige_wk_1`
  ADD PRIMARY KEY (`Wk_Nummer`);

--
-- Indexes for table `tmp_anzeige_wk_2`
--
ALTER TABLE `tmp_anzeige_wk_2`
  ADD PRIMARY KEY (`Wk_Nummer`);

--
-- Indexes for table `tmp_gerd_1`
--
ALTER TABLE `tmp_gerd_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_gerd_2`
--
ALTER TABLE `tmp_gerd_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_hardware_1`
--
ALTER TABLE `tmp_hardware_1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_hardware_2`
--
ALTER TABLE `tmp_hardware_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_heber_speichern_1`
--
ALTER TABLE `tmp_heber_speichern_1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_heber_speichern_2`
--
ALTER TABLE `tmp_heber_speichern_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_kr_check_1`
--
ALTER TABLE `tmp_kr_check_1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tmp_kr_check_2`
--
ALTER TABLE `tmp_kr_check_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tmp_letzter_heber_1`
--
ALTER TABLE `tmp_letzter_heber_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_letzter_heber_2`
--
ALTER TABLE `tmp_letzter_heber_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_reload_2`
--
ALTER TABLE `tmp_reload_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_uebernaechster_heber_1`
--
ALTER TABLE `tmp_uebernaechster_heber_1`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_uebernaechster_heber_2`
--
ALTER TABLE `tmp_uebernaechster_heber_2`
  ADD PRIMARY KEY (`IdHeber`);

--
-- Indexes for table `tmp_wk_korrektur_block`
--
ALTER TABLE `tmp_wk_korrektur_block`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `verein`
--
ALTER TABLE `verein`
  ADD PRIMARY KEY (`IdVerein`);

--
-- Indexes for table `versions_tabelle`
--
ALTER TABLE `versions_tabelle`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datenbanken`
--
ALTER TABLE `datenbanken`
  MODIFY `Id_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `heber`
--
ALTER TABLE `heber`
  MODIFY `IdHeber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laender`
--
ALTER TABLE `laender`
  MODIFY `Idlaender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `verein`
--
ALTER TABLE `verein`
  MODIFY `IdVerein` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
