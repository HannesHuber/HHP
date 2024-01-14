-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Nov 2019 um 12:12
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.10

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
  `Image` longblob DEFAULT NULL
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
(-197, 'Krüger', 'Nico ', -41, 1987, 77.90, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '7788'),
(-196, 'Bickel', 'Dominik', -6, 1994, 74.40, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '11499'),
(-195, 'Brehm', 'Nanina', -6, 1994, 63.70, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '13554'),
(-194, 'Hertrampf', 'Björn ', -41, 1982, 91.10, 'BW', 'Männlich', 3, '', 'Aktive', '-96', 1, '10923'),
(-193, 'Scholz', 'Paula', -41, 1996, 68.80, 'BW', 'Weiblich', 3, '', 'Aktive', '-71', 1, '20784'),
(-192, 'Joachin', 'Robert ', -41, 1987, 69.80, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '7395'),
(-191, 'Mark', 'Eckhardt', -41, 1989, 97.00, 'BW', 'Männlich', 3, '', 'Aktive', '-102', 1, '10960'),
(-190, 'Wisniewski', 'Damian', -41, 1986, 67.80, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '20000'),
(-189, 'Guto', 'Roberto ', -41, 2000, 73.00, 'BW', 'Männlich', 3, '', 'Junioren', '-73', 1, '12911'),
(-188, 'test', 'test', -121, 2002, 100.00, 'BW', 'Männlich', 3, '', 'Jugend', '-102', 1, '12312'),
(-187, 'Secho', 'Fabian', -122, 1987, 101.00, 'BW', 'Männlich', 1, '', 'Aktive', '-102', 1, '20676'),
(-186, 'Maus', 'Micky', -122, 1988, 80.50, 'BW', 'Männlich', 1, '', 'Aktive', '-81', 1, '21370'),
(-185, 'Fries', 'Jonathan ', -121, 1997, 86.50, 'BW', 'Männlich', 1, '', 'Aktive', '-89', 1, '21391'),
(-184, 'Glaser', 'Robert', -121, 1970, 91.00, 'BW', 'Männlich', 1, '', 'Aktive', '-96', 1, '20131'),
(-183, 'Blümchen', 'Benjamin', -122, 1997, 80.30, 'BW', 'Männlich', 1, '', 'Aktive', '-81', 1, '21371'),
(-182, 'Duck', 'Donald', -121, 1990, 95.00, 'BW', 'Männlich', 1, '', 'Aktive', '-96', 1, '20117'),
(-181, 'Maus', 'Minnie', -122, 1989, 62.60, 'BW', 'Weiblich', 1, '', 'Aktive', '-64', 1, '21372'),
(-180, 'Simpson', 'Homer', -122, 1959, 94.90, 'BW', 'Männlich', 3, '', 'Aktive', '-96', 1, '21374'),
(-179, 'Dan Biebl', 'Stefanie', -121, 2000, 88.00, 'BW', 'Weiblich', 1, '', 'Junioren', '+87', 1, '20128'),
(-178, 'Mustermann', 'Martin', -121, 1985, 94.80, 'BW', 'Männlich', 3, '', 'Aktive', '-96', 1, '20116'),
(-177, 'Bauer', 'Peter', -121, 1980, 88.40, 'BW', 'Männlich', 3, '', 'Aktive', '-89', 1, '20113'),
(-176, 'der Bär', 'Balu', -122, 1960, 72.50, 'BW', 'Männlich', 1, '', 'Aktive', '-73', 1, '21373'),
(-175, 'Friedrich', 'Lukas Noah', -156, 2005, 68.00, 'BW', 'Männlich', 1, '', 'Schüler', '-73', 1, '21255'),
(-174, 'Drafz', 'Benedikt', -151, 2005, 67.00, 'BB', 'Männlich', 1, '', 'Schüler', '-67', 1, '22478'),
(-173, 'Beck', 'Geronimo', -163, 2004, 46.00, 'TH', 'Männlich', 1, '', 'Jugend', '-49', 1, '22256'),
(-172, 'Kleinfeld', 'Raphael', -188, 2006, 65.00, 'TH', 'Männlich', 1, '', 'Schüler', '-67', 1, '22461'),
(-171, 'Neubert', 'Nora', -148, 2006, 53.00, 'SN', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21735'),
(-170, 'Barthel', 'Marius', -139, 2005, 60.00, 'SN', 'Männlich', 1, '', 'Schüler', '-61', 1, '12988'),
(-169, 'Rogge', 'Jan Lennart', -154, 2005, 61.00, 'BY', 'Männlich', 1, '', 'Schüler', '-61', 1, '22502'),
(-168, 'Akdeniz', 'Dilara', -3, 2006, 50.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21988'),
(-167, 'Schuler', 'Justin', -164, 2005, 48.00, 'BW', 'Männlich', 1, '', 'Schüler', '-49', 1, '21264'),
(-166, 'Bühr', 'Marlene', -176, 2006, 50.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21348'),
(-165, 'Kohlisch', 'Martin', -148, 2004, 57.00, 'SN', 'Männlich', 1, '', 'Jugend', '-61', 1, '13666'),
(-164, 'Keil', 'Richard', -170, 2006, 50.00, 'BE', 'Männlich', 1, '', 'Schüler', '-55', 1, '21217'),
(-163, 'Müller', 'Marie', -130, 2006, 55.00, 'BY', 'Weiblich', 1, '', 'Schüler', '-55', 1, '20924'),
(-162, 'Pfister', 'Roi Tayler', -144, 2006, 35.00, 'BW', 'Männlich', 1, '', 'Schüler', '-35', 1, '22252'),
(-161, 'Raulf', 'Luis', -166, 2006, 58.00, 'SN', 'Männlich', 1, '', 'Schüler', '-61', 1, '21779'),
(-160, 'Kahler', 'Ben', -163, 2005, 59.00, 'TH', 'Männlich', 1, '', 'Schüler', '-61', 1, '22500'),
(-159, 'Viol', 'Laura', -152, 2005, 69.00, 'BB', 'Weiblich', 1, '', 'Schüler', '-71', 1, '13176'),
(-158, 'Neukirchner', 'Laura Leonie', -139, 2005, 44.00, 'SN', 'Weiblich', 1, '', 'Schüler', '-45', 1, '22375'),
(-157, 'Dudorkhanov', 'Ibrahim', -188, 2004, 74.00, 'TH', 'Männlich', 1, '', 'Jugend', '-81', 1, '13624'),
(-156, 'Schlenz', 'Tobias', -154, 2006, 91.00, 'BY', 'Männlich', 1, '', 'Schüler', '-96', 1, '21279'),
(-155, 'Siegert', 'Drago Balthsar', -133, 2004, 92.00, 'BB', 'Männlich', 1, '', 'Jugend', '-96', 1, '13453'),
(-154, 'Hermsdorf', 'Hendrik', -118, 2006, 70.00, 'TH', 'Männlich', 1, '', 'Schüler', '-73', 1, '21673'),
(-153, 'Plischke', 'Marc', -166, 2004, 98.00, 'SN', 'Männlich', 1, '', 'Jugend', '-102', 1, '22075'),
(-152, 'Rettenberger', 'Nathalie', 69, 2004, 56.00, 'BY', 'Weiblich', 1, '', 'Jugend', '-59', 1, '21248'),
(-151, 'Holetz', 'Tim', -147, 2004, 75.00, 'BW', 'Männlich', 1, '', 'Jugend', '-81', 1, '20287'),
(-150, 'Benzelrath', 'Nils', -176, 2004, 67.00, 'BW', 'Männlich', 1, '', 'Jugend', '-67', 1, '20486'),
(-149, 'Ring', 'Paul', -220, 2006, 36.00, 'BY', 'Männlich', 1, '', 'Schüler', '-40', 1, '21520'),
(-148, 'Kurbanova', 'Tanzila', -188, 2005, 70.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-71', 1, '21883'),
(-147, 'Hennecke', 'Fabian Joelle', -171, 2005, 57.00, 'TH', 'Männlich', 1, '', 'Schüler', '-61', 1, '21769'),
(-146, 'Rothbauer', 'Tyler', -133, 2006, 45.00, 'BB', 'Männlich', 1, '', 'Schüler', '-45', 1, '21022'),
(-145, 'Nützel', 'Lucas', -129, 2004, 43.00, 'RP', 'Männlich', 1, '', 'Jugend', '-49', 1, '21452'),
(-144, 'Hennecke', 'Pascal Morris', -171, 2004, 114.00, 'TH', 'Männlich', 1, '', 'Jugend', '+102', 1, '21770'),
(-143, 'Engels', 'Mara', -129, 2004, 75.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-76', 1, '20847'),
(-142, 'Rettenberger', 'Eric', 69, 2004, 72.00, 'BY', 'Männlich', 1, '', 'Jugend', '-73', 1, '22451'),
(-141, 'Kloos', 'Dennis', -191, 2006, 51.00, 'BW', 'Männlich', 1, '', 'Schüler', '-55', 1, '22494'),
(-140, 'Knorra', 'Max-Sebastian', -191, 2004, 58.00, 'BW', 'Männlich', 1, '', 'Jugend', '-61', 1, '22052'),
(-139, 'Simon', 'Mika', -224, 2004, 65.00, 'TH', 'Männlich', 1, '', 'Jugend', '-67', 1, '20144'),
(-138, 'Göttlich', 'Lennard', -135, 2004, 57.00, 'SN', 'Männlich', 1, '', 'Jugend', '-61', 1, '20412'),
(-137, 'Urban', 'Arian Lukas', -133, 2005, 73.00, 'BB', 'Männlich', 1, '', 'Schüler', '-73', 1, '21023'),
(-136, 'Conti', 'Enrico', -221, 2005, 82.00, 'BW', 'Männlich', 1, '', 'Schüler', '-89', 1, '21269'),
(-135, 'Nizamov', 'Artur', -157, 2005, 65.00, 'SN', 'Männlich', 1, '', 'Schüler', '-67', 1, '21450'),
(-134, 'Phan', 'Quoc Hai', -64, 2004, 73.00, 'NI', 'Männlich', 1, '', 'Jugend', '-73', 1, '21107'),
(-133, 'Schlittig', 'Robby', -157, 2006, 51.00, 'SN', 'Männlich', 1, '', 'Schüler', '-55', 1, '21737'),
(-132, 'Kronschwitz', 'Lio Tim', -142, 2005, 65.00, 'BB', 'Männlich', 1, '', 'Schüler', '-67', 1, '13589'),
(-131, 'Scholz', 'Florian', -128, 2005, 70.00, 'SN', 'Männlich', 1, '', 'Schüler', '-73', 1, '21241'),
(-130, 'Graf', 'Maria', -132, 2006, 45.00, 'BY', 'Weiblich', 1, '', 'Schüler', '-45', 1, '20425'),
(-129, 'Meyer', 'Natalie', -152, 2004, 73.00, 'BB', 'Weiblich', 1, '', 'Jugend', '-76', 1, '20375'),
(-128, 'Dudorkhanov', 'Iman', -188, 2005, 49.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-49', 1, '13625'),
(-127, 'Körner', 'Lukas', -188, 2005, 52.00, 'TH', 'Männlich', 1, '', 'Schüler', '-55', 1, '21880'),
(-126, 'Engel', 'Alexandra', -153, 2004, 48.00, 'BB', 'Weiblich', 1, '', 'Jugend', '-49', 1, '20186'),
(-125, 'Marx', 'Magnus', -169, 2005, 56.00, 'TH', 'Männlich', 1, '', 'Schüler', '-61', 1, '20138'),
(-124, 'Blum', 'Philip', -135, 2005, 76.00, 'SN', 'Männlich', 1, '', 'Schüler', '-81', 1, '22447'),
(-123, 'Schweng', 'Eileen', -163, 2005, 56.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-59', 1, '21404'),
(-122, 'Tas', 'Melda', -129, 2004, 50.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-55', 1, '21273'),
(-121, 'Soldner', 'Farin', -147, 2005, 76.00, 'BW', 'Männlich', 1, '', 'Schüler', '-81', 1, '21331'),
(-120, 'Stanton', 'Elijah', -91, 2004, 60.00, 'BY', 'Männlich', 1, '', 'Jugend', '-61', 1, '21014'),
(-119, 'Sheebo', 'Rezan', -147, 2004, 58.00, 'BW', 'Männlich', 1, '', 'Jugend', '-61', 1, '21546'),
(-118, 'Hammer', 'Moritz', -152, 2005, 85.00, 'BB', 'Männlich', 1, '', 'Schüler', '-89', 1, '21175'),
(-117, 'Böhme', 'Tim', -170, 2006, 50.00, 'BE', 'Männlich', 1, '', 'Schüler', '-55', 1, '21216'),
(-116, 'Brückner', 'Sophie', -171, 2005, 49.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-49', 1, '21410'),
(-115, 'Kopp', 'Dana', -219, 2006, 58.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-59', 1, '22049'),
(-114, 'Walker', 'Felix', -220, 2006, 42.00, 'BY', 'Männlich', 1, '', 'Schüler', '-45', 1, '20884'),
(-113, 'Ludwig', 'Nicky- Jane', -118, 2006, 55.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-55', 1, '22002'),
(-112, 'Farrar', 'Mika', -157, 2005, 68.00, 'SN', 'Männlich', 1, '', 'Schüler', '-73', 1, '21449'),
(-111, 'Weißmann', 'Ron', -148, 2006, 48.00, 'SN', 'Männlich', 1, '', 'Schüler', '-49', 1, '21732'),
(-110, 'Sahin', 'Silvan ', -221, 2006, 60.00, 'BW', 'Männlich', 1, '', 'Schüler', '-61', 1, '22114'),
(-109, 'Bellmann', 'Ole', -148, 2006, 55.00, 'SN', 'Männlich', 1, '', 'Schüler', '-55', 1, '21734'),
(-108, 'Meingast', 'Alexander', -168, 2006, 48.00, 'BY', 'Männlich', 1, '', 'Schüler', '-49', 1, '22050'),
(-107, 'Schmitt', 'Fabius Yuma ', -99, 2006, 56.00, 'BW', 'Männlich', 1, '', 'Schüler', '-61', 1, '22489'),
(-106, 'Wirtner', 'Manuel', -158, 2004, 58.00, 'BW', 'Männlich', 1, '', 'Jugend', '-61', 1, '13634'),
(-105, 'Berger', 'Erik-Steven', -128, 2004, 85.00, 'SN', 'Männlich', 1, '', 'Jugend', '-89', 1, '21439'),
(-104, 'Stanton', 'Rowan', -91, 2004, 70.00, 'BY', 'Männlich', 1, '', 'Jugend', '-73', 1, '21015'),
(-103, 'Teterjatnik', 'Iwan', -136, 2004, 70.00, 'BB', 'Männlich', 1, '', 'Jugend', '-73', 1, '20309'),
(-102, 'Pfeifer', 'Nicco', -166, 2006, 90.00, 'SN', 'Männlich', 1, '', 'Schüler', '-96', 1, '21778'),
(-101, 'Kohn', 'Justin', -135, 2004, 78.00, 'SN', 'Männlich', 1, '', 'Jugend', '-81', 1, '20411'),
(-100, 'Neuert', 'Florian', -3, 2006, 66.00, 'BW', 'Männlich', 1, '', 'Schüler', '-67', 1, '21987'),
(-99, 'Bürkle', 'Benjamin', -156, 2004, 62.00, 'BW', 'Männlich', 1, '', 'Jugend', '-67', 1, '20069'),
(-98, 'Reinhardt', 'Nils Thorben', -143, 2004, 78.00, 'ST', 'Männlich', 1, '', 'Jugend', '-81', 1, '20345'),
(-97, 'Walter', 'Lenny', -133, 2005, 58.00, 'BB', 'Männlich', 1, '', 'Schüler', '-61', 1, '21016'),
(-96, 'Biela', 'Maximilian', -220, 2006, 55.00, 'BY', 'Männlich', 1, '', 'Schüler', '-55', 1, '21265'),
(-95, 'Martin', 'Leonie Mercedes', -148, 2004, 66.00, 'SN', 'Weiblich', 1, '', 'Jugend', '-71', 1, '13665'),
(-94, 'Tas', 'Sinem', -129, 2004, 52.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-55', 1, '20259'),
(-93, 'Frank', 'Leonard', -169, 2005, 70.00, 'TH', 'Männlich', 1, '', 'Schüler', '-73', 1, '22104'),
(-92, 'Barth', 'Jason', -139, 2006, 60.00, 'SN', 'Männlich', 1, '', 'Schüler', '-61', 1, '21723'),
(-91, 'Kloss', 'Lukas', -223, 2006, 71.00, 'HE', 'Männlich', 1, '', 'Schüler', '-73', 1, '22406'),
(-90, 'Sahitaj', 'Edonis', -154, 2004, 51.00, 'BY', 'Männlich', 1, '', 'Jugend', '-55', 1, '21278'),
(-89, 'Keßler', 'Moritz', -129, 2005, 42.00, 'RP', 'Männlich', 1, '', 'Schüler', '-45', 1, '21138'),
(-88, 'Saini', 'Rishabh', -168, 2005, 60.00, 'BY', 'Männlich', 1, '', 'Schüler', '-61', 1, '20614'),
(-87, 'Singh', 'Pavanpreet', -7, 2005, 65.00, 'HE', 'Männlich', 1, '', 'Schüler', '-67', 1, '21030'),
(-86, 'Leopold', 'Niclas', -133, 2006, 78.00, 'BB', 'Männlich', 1, '', 'Schüler', '-81', 1, '21017'),
(-85, 'Kerimow', 'Dominik', -167, 2005, 42.00, 'BY', 'Männlich', 1, '', 'Schüler', '-45', 1, '21070'),
(-84, 'Chrysochoidis', 'Alexandros', -143, 2005, 96.00, 'ST', 'Männlich', 1, '', 'Schüler', '-96', 1, '21254'),
(-83, 'Hein', 'Tiago', -140, 2006, 48.00, 'BE', 'Männlich', 1, '', 'Schüler', '-49', 1, '21748'),
(-82, 'Wissing', 'Nele', -139, 2005, 59.00, 'SN', 'Weiblich', 1, '', 'Schüler', '-59', 1, '21947'),
(-81, 'Simeth', 'Lukas', -168, 2005, 51.00, 'BY', 'Männlich', 1, '', 'Schüler', '-55', 1, '22051'),
(-80, 'Karnatz', 'Louis', -135, 2005, 59.00, 'SN', 'Männlich', 1, '', 'Schüler', '-61', 1, '21908'),
(-79, 'Lange', 'Maximilian', -140, 2005, 61.00, 'BE', 'Männlich', 1, '', 'Schüler', '-61', 1, '20770'),
(-78, 'Rohde', 'Felix', -142, 2005, 50.00, 'BB', 'Männlich', 1, '', 'Schüler', '-55', 1, '13592'),
(-77, 'Weißert', 'Jan', -156, 2004, 74.00, 'BW', 'Männlich', 1, '', 'Jugend', '-81', 1, '20487'),
(-76, 'Siegert', 'Sissi Lara', -133, 2006, 58.00, 'BB', 'Weiblich', 1, '', 'Schüler', '-59', 1, '21020'),
(-75, 'Häfele', 'Alexander', -177, 2004, 72.00, 'BY', 'Männlich', 1, '', 'Jugend', '-73', 1, '12542'),
(-74, 'Haupt', 'Christian', -220, 2005, 77.00, 'BY', 'Männlich', 1, '', 'Schüler', '-81', 1, '20494'),
(-73, 'Ullmann ', 'Anne-Marie ', -222, 2006, 50.00, 'TH', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21746'),
(-72, 'Grießmann', 'Jeremy', -152, 2004, 73.00, 'BB', 'Männlich', 1, '', 'Jugend', '-73', 1, '20296'),
(-71, 'Mayer', 'Phillip', -191, 2005, 74.00, 'BW', 'Männlich', 1, '', 'Schüler', '-81', 1, '21056'),
(-70, 'Spist', 'Christopher', -153, 2006, 59.00, 'BB', 'Männlich', 1, '', 'Schüler', '-61', 1, '20187'),
(-69, 'Reuter', 'Tom David', -171, 2004, 94.00, 'TH', 'Männlich', 1, '', 'Jugend', '-96', 1, '22005'),
(-68, 'Heidemann', 'Felix', -139, 2006, 59.00, 'SN', 'Männlich', 1, '', 'Schüler', '-61', 1, '21724'),
(-67, 'Jahnke', 'Tino', -151, 2004, 73.00, 'BB', 'Männlich', 1, '', 'Jugend', '-73', 1, '20539'),
(-66, 'Klassig', 'Conner', -147, 2004, 78.00, 'BW', 'Männlich', 1, '', 'Jugend', '-81', 1, '20288'),
(-65, 'Rusch', 'Valentino', -135, 2005, 55.00, 'SN', 'Männlich', 1, '', 'Schüler', '-55', 1, '21152'),
(-64, 'Merscher', 'Lennert Benedict', -142, 2005, 53.00, 'BB', 'Männlich', 1, '', 'Schüler', '-55', 1, '21457'),
(-63, 'Herweg', 'Lucy', -133, 2006, 52.00, 'BB', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21019'),
(-62, 'Stofer', 'Marius', -221, 2004, 60.00, 'BW', 'Männlich', 1, '', 'Jugend', '-61', 1, '21140'),
(-61, 'Thomanek', 'Julia', -221, 2006, 55.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-55', 1, '22112'),
(-60, 'Hauff', 'Tom', -133, 2006, 60.00, 'BB', 'Männlich', 1, '', 'Schüler', '-61', 1, '21018'),
(-59, 'Lichtenwald', 'Paul', -128, 2005, 53.00, 'SN', 'Männlich', 1, '', 'Schüler', '-55', 1, '21672'),
(-58, 'Beyer', 'Valentin', -156, 2006, 63.00, 'BW', 'Männlich', 1, '', 'Schüler', '-67', 1, '22238'),
(-57, 'Pomsel', 'Maurice', -139, 2006, 45.00, 'SN', 'Männlich', 1, '', 'Schüler', '-45', 1, '21722'),
(-56, 'Prießner', 'Vincent', -148, 2004, 57.00, 'SN', 'Männlich', 1, '', 'Jugend', '-61', 1, '21455'),
(-55, 'Ring', 'Hannes', -220, 2006, 42.00, 'BY', 'Männlich', 1, '', 'Schüler', '-45', 1, '21266'),
(-54, 'Mast', 'Ronny', -219, 2004, 83.00, 'BW', 'Männlich', 1, '', 'Jugend', '-89', 1, '20353'),
(-53, 'Wagenbach', 'Lars Elias', -191, 2004, 57.00, 'BW', 'Männlich', 1, '', 'Jugend', '-61', 1, '20531'),
(-52, 'Tas', 'Simge', -129, 2004, 69.00, 'RP', 'Weiblich', 1, '', 'Jugend', '-71', 1, '20260'),
(-51, 'Schrödersecker', 'Chryssanthi-Sanyana Marie ', -3, 2006, 64.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-64', 1, '22009'),
(-50, 'Haselmann', 'Enrico', -141, 2005, 63.00, 'BY', 'Männlich', 1, '', 'Schüler', '-67', 1, '20074'),
(-49, 'Schmitt', 'Aleta Kimana', -99, 2006, 56.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-59', 1, '22490'),
(-48, 'Millen', 'Lea', -199, 2005, 54.00, 'RP', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21534'),
(-47, 'Thieme', 'Hanna-Christin', -157, 2006, 54.00, 'SN', 'Weiblich', 1, '', 'Schüler', '-55', 1, '21736'),
(-46, 'Kessler', 'Ben', -129, 2005, 59.00, 'RP', 'Männlich', 1, '', 'Schüler', '-61', 1, '21137'),
(-45, 'Pfalzgraf', 'Lisa-Marie', -99, 2006, 56.00, 'BW', 'Weiblich', 1, '', 'Schüler', '-59', 1, '22492'),
(-44, 'Neumann', 'Robin', -171, 2006, 92.00, 'TH', 'Männlich', 1, '', 'Schüler', '-96', 1, '21775'),
(-43, 'Werner', 'Maximilian', -144, 2004, 64.00, 'BW', 'Männlich', 1, '', 'Jugend', '-67', 1, '20522'),
(-42, 'Schnurrer', 'Florian', -123, 1993, 97.00, 'BW', 'Männlich', 3, '', 'Aktive', '-102', 1, '13094'),
(-41, 'Zierer', 'Verena', -123, 1994, 67.10, 'BW', 'Weiblich', 3, '', 'Aktive', '-71', 1, '22122'),
(-40, 'Schuierer', 'Maximilian', -184, 1993, 71.70, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '11050'),
(-39, 'Wang', 'Jingyi', -123, 1992, 69.00, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '13030'),
(-38, 'Holllerith', 'Anna', -123, 1996, 65.10, 'BW', 'Weiblich', 3, '', 'Aktive', '-71', 1, '20819'),
(-37, 'Klitzke', 'Sarah', -123, 1993, 62.20, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '20215'),
(-36, 'Rieß', 'Lisa', -123, 1989, 70.80, 'BW', 'Weiblich', 3, '', 'Aktive', '-71', 1, '13113'),
(-35, 'Isilay', 'Ali', -123, 1994, 84.00, 'BW', 'Männlich', 3, '', 'Aktive', '-89', 1, '20815'),
(-34, 'König', 'Anne-Sophie', -17, 1989, 61.70, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '21712'),
(-33, 'Biega', 'Tadeusz', -17, 1986, 95.50, 'BW', 'Männlich', 3, '', 'Aktive', '-96', 1, '21555'),
(-32, 'Rosol', 'Tomasz', -17, 1989, 66.30, 'BW', 'Männlich', 3, '', 'Aktive', '-67', 1, '11229'),
(-31, 'Mummhardt', 'Philip', -17, 1995, 110.00, 'BW', 'Männlich', 3, '', 'Aktive', '+109', 1, '11526'),
(-30, 'Rieger', 'Patricia', -17, 1987, 78.80, 'BW', 'Weiblich', 3, '', 'Aktive', '-81', 1, '12950'),
(-29, 'Schedler', 'Leon', -17, 1998, 56.90, 'BW', 'Männlich', 3, '', 'Aktive', '-61', 1, '12077'),
(-28, 'Marecek', 'Petr', -17, 1998, 80.90, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '22281'),
(-27, 'Fischer', 'Adolf', -184, 1984, 72.00, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '21912'),
(-26, 'Jackwerth', 'Maximilian', -184, 1995, 111.90, 'BW', 'Männlich', 3, '', 'Aktive', '+109', 1, '11379'),
(-25, 'Voit', 'Hermann', -184, 1987, 80.20, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '7992'),
(-24, 'Rat', 'Lavinia', -218, 1992, 56.70, 'BW', 'Weiblich', 1, '', 'Aktive', '-59', 1, '21656'),
(-23, 'Schemmel', 'Simone', -218, 1994, 67.50, 'BW', 'Weiblich', 1, '', 'Aktive', '-71', 1, '10550'),
(-22, 'Narr', 'Alexander', -218, 1993, 95.80, 'BW', 'Männlich', 1, '', 'Aktive', '-96', 1, '8115'),
(-21, 'Popel', 'Johannes', -218, 1994, 82.00, 'BW', 'Männlich', 1, '', 'Aktive', '-89', 1, '11658'),
(-20, 'Schemmel', 'Kerstin', -218, 1998, 63.90, 'BW', 'Weiblich', 1, '', 'Aktive', '-64', 1, '11660'),
(-19, 'Schemmel', 'Roman', -218, 1997, 86.45, 'BW', 'Männlich', 1, '', 'Aktive', '-89', 1, '11077'),
(-18, 'Nowara', 'Daniel', -184, 1989, 102.90, 'BW', 'Männlich', 3, '', 'Aktive', '-109', 1, '9234'),
(-17, 'Kellermeier', 'Julia', -184, 0, 52.00, 'BW', 'Weiblich', 3, '', '', '', 1, '12442'),
(-16, 'Pilz', 'Steffen', -184, 1975, 73.00, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '11281'),
(-15, 'Pilz', 'Annika', -184, 2002, 54.80, 'BW', 'Weiblich', 3, '', 'Jugend', '-55', 1, '12780'),
(-14, 'Brandhuber', 'Simon', -184, 1991, 68.80, 'BW', 'Männlich', 3, '', 'Aktive', '-73', 1, '9549'),
(-13, 'Kulzer', 'Peter', -184, 1998, 105.60, 'BW', 'Männlich', 3, '', 'Aktive', '-109', 1, '12049'),
(-12, 'Nowara', 'Gregor', -184, 1993, 90.00, 'BW', 'Männlich', 3, '', 'Aktive', '-96', 1, '10626'),
(-11, 'Stransky', 'Petr', -184, 1997, 73.30, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '20886'),
(-10, 'Jahn', 'Annabell', -184, 1986, 61.80, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '13324'),
(-9, 'Brandhuber', 'Hans', -184, 1996, 88.40, 'BW', 'Männlich', 3, '', 'Aktive', '-89', 1, '11378'),
(-8, 'Wagner', 'Andreas', -6, 1962, 61.00, 'BW', 'Männlich', 1, '', 'Aktive', '-61', 1, '1321'),
(-7, 'Nützel', 'Nicole', -6, 1979, 56.70, 'BW', 'Weiblich', 3, '', 'Aktive', '-59', 1, '6891'),
(-6, 'Hesse', 'Josef ', -6, 1994, 82.30, 'BW', 'Männlich', 3, '', 'Aktive', '-89', 1, '11225'),
(-5, 'Fleischmann', 'Jana', -6, 1991, 64.80, 'BW', 'Weiblich', 1, '', 'Aktive', '-71', 1, '20100'),
(-4, 'Lee', 'Rebecca', -6, 1988, 59.90, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '20099'),
(-3, 'Szymon', 'Sven', -6, 1993, 76.90, 'BW', 'Männlich', 3, '', 'Aktive', '-81', 1, '11064'),
(-2, 'Kohler', 'Laura', -6, 1988, 59.20, 'BW', 'Weiblich', 3, '', 'Aktive', '-64', 1, '21985'),
(-1, 'Rohde', 'Ivonne', -6, 1982, 59.40, 'BW', 'Weiblich', 1, '', 'Aktive', '-64', 1, '11231'),
(1, 't1', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, '', 'Aktive', '-55', 0, ''),
(2, 't2', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, '', 'Aktive', '-55', 0, ''),
(3, 't3', '', -146, 1990, 50.00, 'BY', 'Männlich', 1, '', 'Aktive', '-55', 0, ''),
(4, 't4', '', -146, 1990, 110.00, 'BY', 'Männlich', 1, '', 'Aktive', '+109', 0, ''),
(5, 't5', '', -146, 1990, 110.00, 'BY', 'Männlich', 1, '', 'Aktive', '+109', 0, ''),
(6, 'test', 'test', -9, 1990, 1.00, '', 'Männlich', 1, 'Auswahl', 'Aktive', '-55', 1, '21212'),
(7, 'asda', 'test', -9, 1990, 1.00, '', 'Weiblich', 1, 'Auswahl', 'Aktive', '-45', 1, '123');

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
-- Tabellenstruktur für Tabelle `robi_faktoren_men_aktive`
--

CREATE TABLE `robi_faktoren_men_aktive` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_men_aktive`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_men_junioren`
--

CREATE TABLE `robi_faktoren_men_junioren` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_men_junioren`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_men_schueler`
--

CREATE TABLE `robi_faktoren_men_schueler` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_men_schueler`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_men_standart`
--

CREATE TABLE `robi_faktoren_men_standart` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_men_standart`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_women_aktive`
--

CREATE TABLE `robi_faktoren_women_aktive` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_women_aktive`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_women_junioren`
--

CREATE TABLE `robi_faktoren_women_junioren` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_women_junioren`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_women_schueler`
--

CREATE TABLE `robi_faktoren_women_schueler` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_women_schueler`
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
-- Tabellenstruktur für Tabelle `robi_faktoren_women_standart`
--

CREATE TABLE `robi_faktoren_women_standart` (
  `Id` int(11) DEFAULT NULL,
  `GwKl` int(11) DEFAULT NULL,
  `WeltRekord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktoren_women_standart`
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
-- Tabellenstruktur für Tabelle `robi_faktor_b`
--

CREATE TABLE `robi_faktor_b` (
  `Id` int(11) DEFAULT NULL,
  `B` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `robi_faktor_b`
--

INSERT INTO `robi_faktor_b` (`Id`, `B`) VALUES
(1, 3.3219281);

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
(107);

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
('107');

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
(-188, 'Reissen', 147, 2, 'test', 'test', 'Testverein', 100.00, -102);

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
(-187, 'Reissen', 1);

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
(-188, 2, 147, 'Reissen', 1);

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
  `Id` int(11) DEFAULT NULL,
  `AnsagerR` int(11) DEFAULT NULL,
  `HeberRaumR` int(11) DEFAULT NULL,
  `UebersichtR` int(11) DEFAULT NULL,
  `Wk_Leiter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tmp_ss_reload_1`
--

INSERT INTO `tmp_ss_reload_1` (`Id`, `AnsagerR`, `HeberRaumR`, `UebersichtR`, `Wk_Leiter`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tmp_ss_reload_2`
--

CREATE TABLE `tmp_ss_reload_2` (
  `Id` int(11) DEFAULT NULL,
  `AnsagerR` int(11) DEFAULT NULL,
  `HeberRaumR` int(11) DEFAULT NULL,
  `UebersichtR` int(11) DEFAULT NULL,
  `Wk_Leiter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tmp_ss_reload_2`
--

INSERT INTO `tmp_ss_reload_2` (`Id`, `AnsagerR`, `HeberRaumR`, `UebersichtR`, `Wk_Leiter`) VALUES
(1, 1, 1, 1, 1);

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
(-187);

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
(1, 1, 1);

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
('Kein Verein', 9000, 1, 2);

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
(1, 1.041);

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
  MODIFY `Id_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT für Tabelle `heber`
--
ALTER TABLE `heber`
  MODIFY `IdHeber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
