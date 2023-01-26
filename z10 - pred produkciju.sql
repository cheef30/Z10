-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 05:55 PM
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
-- Database: `z10`
--

-- --------------------------------------------------------

--
-- Table structure for table `igra`
--

CREATE TABLE `igra` (
  `ID` int(11) NOT NULL,
  `NAZIV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `igra`
--

INSERT INTO `igra` (`ID`, `NAZIV`) VALUES
(1, 'League of Legends'),
(8, 'Valorant'),
(9, 'TFT'),
(10, 'Counter Strike: Global Offensive'),
(11, 'Valorant W');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ID` int(11) NOT NULL,
  `KORISNICKO_IME` varchar(50) DEFAULT NULL,
  `LOZINKA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `KORISNICKO_IME`, `LOZINKA`) VALUES
(1, 'z10admin', 'e73e188b09041054f8d4bab8681c1a44');

-- --------------------------------------------------------

--
-- Table structure for table `mail_pretplatnici_vesti`
--

CREATE TABLE `mail_pretplatnici_vesti` (
  `ID` int(11) NOT NULL,
  `MEJL_ADRESA` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mec`
--

CREATE TABLE `mec` (
  `ID` int(11) NOT NULL,
  `ID_TAKMICENJA` int(11) NOT NULL,
  `DATUM` date DEFAULT NULL,
  `VREME` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mec`
--

INSERT INTO `mec` (`ID`, `ID_TAKMICENJA`, `DATUM`, `VREME`) VALUES
(3, 1, '2023-01-16', '18:00:00'),
(4, 1, '2023-01-17', '20:00:00'),
(5, 1, '2023-01-18', '20:00:00'),
(6, 1, '2023-01-24', '21:00:00'),
(7, 1, '2023-01-25', '19:00:00'),
(8, 1, '2023-01-31', '18:00:00'),
(9, 1, '2023-02-01', '19:00:00'),
(10, 1, '2023-02-07', '21:00:00'),
(11, 1, '2023-02-08', '20:00:00'),
(12, 1, '2023-02-14', '21:00:00'),
(13, 1, '2023-02-15', '21:00:00'),
(14, 1, '2023-02-21', '20:00:00'),
(15, 1, '2023-02-22', '18:00:00'),
(16, 1, '2023-02-28', '17:00:00'),
(17, 1, '2023-03-01', '20:00:00'),
(18, 1, '2023-03-06', '21:00:00'),
(19, 1, '2023-03-07', '18:00:00'),
(20, 1, '2023-03-08', '18:00:00'),
(21, 3, '2023-01-12', '20:00:00'),
(22, 3, '2023-01-13', '17:00:00'),
(23, 3, '2023-01-14', '19:00:00'),
(24, 3, '2023-01-15', '18:00:00'),
(25, 3, '2023-01-19', '21:00:00'),
(26, 3, '2023-01-20', '21:00:00'),
(27, 3, '2023-01-21', '21:00:00'),
(28, 3, '2023-01-22', '20:00:00'),
(29, 3, '2023-01-28', '17:00:00'),
(30, 3, '2023-01-29', '19:00:00'),
(31, 3, '2023-02-04', '19:00:00'),
(32, 3, '2023-02-05', '19:00:00'),
(33, 3, '2023-02-09', '20:00:00'),
(34, 3, '2023-02-10', '20:00:00'),
(35, 3, '2023-02-11', '17:00:00'),
(36, 3, '2023-02-12', '20:00:00'),
(37, 3, '2023-03-05', '18:00:00'),
(38, 3, '2023-03-06', '21:00:00'),
(39, 2, '2023-01-11', '18:00:00'),
(40, 2, '2023-01-17', '17:30:00'),
(41, 2, '2023-01-17', '19:00:00'),
(42, 2, '2023-01-25', '19:00:00'),
(43, 2, '2023-01-26', '15:00:00'),
(44, 2, '2023-02-02', '17:00:00'),
(45, 4, '2023-01-19', '19:00:00'),
(46, 4, '2023-01-26', '19:00:00'),
(47, 4, '2023-02-09', '19:00:00'),
(48, 4, '2023-02-16', '19:00:00'),
(49, 4, '2023-02-23', '19:00:00'),
(50, 4, '2023-03-02', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `takmicenje`
--

CREATE TABLE `takmicenje` (
  `ID` int(11) NOT NULL,
  `ID_IGRE` int(11) NOT NULL,
  `NAZIV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takmicenje`
--

INSERT INTO `takmicenje` (`ID`, `ID_IGRE`, `NAZIV`) VALUES
(1, 1, 'Ultraliga'),
(2, 10, 'ESEA'),
(3, 8, 'VCL EAST'),
(4, 9, 'TFT');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `ID` int(11) NOT NULL,
  `NAZIV` varchar(25) NOT NULL,
  `LOGO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`ID`, `NAZIV`, `LOGO`) VALUES
(1, 'Zero Tenacity', 'z10logo_red.png'),
(2, 'G2', 'G2.png'),
(3, 'AGO ROGUE', 'agorogue.png'),
(4, 'Illuminar Gaming', 'Illuminar_Gaming.png'),
(5, 'Goskilla', 'Goskilla.png'),
(6, 'Iron Wolves', 'Iron_Wolves.png'),
(7, 'TEAM ESCA GAMING', 'TEAM_ESCA_GAMING.png'),
(8, 'Komil & Friends', 'Komil_&_Friends.png'),
(9, 'Alior bank team', 'Alior_bank_team.png'),
(10, 'EXEED', 'EXEED.png'),
(11, 'Forsaken', 'Forsaken.png'),
(12, 'Grypciocraft', 'Grypciocraft.png'),
(13, 'Diamant', 'Diamant.png'),
(14, 'ACEND', 'ACEND.png'),
(15, 'ANONYMO', 'anonymo.png'),
(16, 'ENTERPRISE', 'ENTERPRISE.png'),
(17, 'B8 ESPORT', 'B8_ESPORT.png'),
(18, 'CYBER WOLVES', 'CYBER_WOLVES.png'),
(19, 'RAPID NINJAS', 'RAPID_NINJAS.png'),
(20, 'NOM ESPORTS', 'NOM_ESPORTS.png'),
(21, 'ANORTHOSIS', 'ANORTHOSIS.png'),
(22, 'Royals', 'Royals.png'),
(23, 'flowstate', 'flowstate.png'),
(24, 'Fourteen Esports', 'Fourteen_Esports.png'),
(25, 'brazylijski luz', 'brazylijski_luz.png'),
(26, 'LeoGaming', 'LeoGaming.png'),
(27, 'HOTU eSports', 'HOTU_eSports.png');

-- --------------------------------------------------------

--
-- Table structure for table `tim_mec`
--

CREATE TABLE `tim_mec` (
  `ID` int(11) NOT NULL,
  `ID_TIMA` int(11) NOT NULL,
  `ID_MECA` int(11) NOT NULL,
  `REZULTAT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tim_mec`
--

INSERT INTO `tim_mec` (`ID`, `ID_TIMA`, `ID_MECA`, `REZULTAT`) VALUES
(5, 6, 3, 0),
(6, 1, 3, 1),
(7, 1, 4, 1),
(8, 5, 4, 0),
(9, 1, 5, 0),
(10, 9, 5, 1),
(11, 10, 6, NULL),
(12, 1, 6, NULL),
(13, 1, 7, NULL),
(14, 7, 7, NULL),
(15, 1, 8, NULL),
(16, 4, 8, NULL),
(17, 8, 9, NULL),
(18, 1, 9, NULL),
(19, 12, 10, NULL),
(20, 1, 10, NULL),
(21, 1, 11, NULL),
(22, 11, 11, NULL),
(23, 5, 12, NULL),
(24, 1, 12, NULL),
(25, 4, 13, NULL),
(26, 1, 13, NULL),
(27, 9, 14, NULL),
(28, 1, 14, NULL),
(29, 1, 15, NULL),
(30, 6, 15, NULL),
(31, 1, 16, NULL),
(32, 8, 16, NULL),
(33, 1, 17, NULL),
(34, 10, 17, NULL),
(35, 1, 18, NULL),
(36, 12, 18, NULL),
(37, 7, 19, NULL),
(38, 1, 19, NULL),
(39, 11, 20, NULL),
(40, 1, 20, NULL),
(41, 1, 21, 0),
(42, 19, 21, 1),
(43, 17, 22, 1),
(44, 1, 22, 0),
(45, 1, 23, 0),
(46, 13, 23, 1),
(47, 20, 24, 0),
(48, 1, 24, 1),
(49, 14, 25, 1),
(50, 1, 25, 0),
(51, 1, 26, 0),
(52, 18, 26, 1),
(53, 15, 27, 1),
(54, 1, 27, 0),
(55, 1, 28, NULL),
(56, 21, 28, NULL),
(57, 1, 29, NULL),
(58, 16, 29, NULL),
(59, 1, 30, NULL),
(60, 19, 30, NULL),
(61, 17, 31, NULL),
(62, 1, 31, NULL),
(63, 1, 32, NULL),
(64, 13, 32, NULL),
(65, 20, 33, NULL),
(66, 1, 33, NULL),
(67, 15, 34, NULL),
(68, 1, 34, NULL),
(69, 14, 35, NULL),
(70, 1, 35, NULL),
(71, 1, 36, NULL),
(72, 18, 36, NULL),
(73, 1, 37, NULL),
(74, 21, 37, NULL),
(75, 1, 38, NULL),
(76, 16, 38, NULL),
(77, 22, 39, 4),
(78, 1, 39, 16),
(79, 23, 40, 16),
(80, 1, 40, 5),
(81, 24, 41, 19),
(82, 1, 41, 22),
(83, 25, 42, NULL),
(84, 1, 42, NULL),
(85, 1, 43, NULL),
(86, 26, 43, NULL),
(87, 1, 44, NULL),
(88, 27, 44, NULL),
(89, 1, 45, NULL),
(90, 1, 46, NULL),
(91, 1, 47, NULL),
(92, 1, 48, NULL),
(93, 1, 49, NULL),
(94, 1, 50, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `ID` int(11) NOT NULL,
  `NASLOV` varchar(200) DEFAULT NULL,
  `SLIKA` varchar(100) DEFAULT NULL,
  `LINK` varchar(500) DEFAULT NULL,
  `DATUM_VREME_UNOSA` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`ID`, `NASLOV`, `SLIKA`, `LINK`, `DATUM_VREME_UNOSA`) VALUES
(1, 'CALL AN AMBULANCE... BUT NOT FOR ME! | Voicecomms ULTRALIGA Season 8 Grandfinals vs AGO ROGUE', '12.jpg', 'https://www.youtube.com/watch?v=_-FR04L8Euc', '2023-01-23 21:28:06'),
(2, 'Wojtus PoV | EU Masters TOP 16 Group Of Death | Z10 vs VIT.B, GIANTS, UOL.SE', '11.jpg', 'https://www.youtube.com/watch?v=CFAAnZ3E5Zc', '2023-01-23 21:28:06'),
(3, 'McDonald\'s in Korea | Z10 Adventures - Vlog #1', '10.jpg', 'https://www.youtube.com/watch?v=qxPBdSnjL5I', '2023-01-23 21:28:06'),
(4, 'K-Drama CONFIRMED? Hanbok Style | Z10 Korean Adventures - Vlog #2', '9.jpg', 'https://www.youtube.com/watch?v=sFbpmtOpcYM', '2023-01-23 21:28:06'),
(5, 'Z10 Korean Bootcamp In 5 Star E-Hotel | Z10 Adventures', '8.jpg', 'https://www.youtube.com/watch?v=SZqu4lEfzj4', '2023-01-23 21:28:06'),
(6, 'IS OUR GAMING HOUSE ACTUALLY HAUNTED? | Z10 HALLOWEEN', '7.jpg', 'https://www.youtube.com/watch?v=t6i4BKlBAUs', '2023-01-23 21:28:06'),
(7, 'WOMAN VALORANT TEAM??? Z10 Changed their game | #tryouts', '6.jpg', 'https://www.youtube.com/watch?v=EzdiMEpHxeU', '2023-01-23 21:28:06'),
(8, 'GOD OF WAR RAGNAROK - SPECIAL EDITION UNBOXING + KRATOS COSPLAY ft. sto1etv', '5.jpg', 'https://www.youtube.com/watch?v=vBUJJGnItmw', '2023-01-23 21:28:06'),
(9, 'Z10 League of Legends 2023 Roster Reveal !', '4.jpg', 'https://www.youtube.com/watch?v=3KF7w-Sza9Y', '2023-01-23 21:28:06'),
(10, 'WEIRDEST SECRET SANTA EVER?! + 2022 RECAP', '1.jpg', 'https://www.youtube.com/watch?v=Y6h6TAF7imE', '2023-01-23 21:28:06'),
(11, 'Now & Beyond | Z10 in 2023', '3.jpg', 'https://www.youtube.com/watch?v=i24MJDDSMDM', '2023-01-23 21:28:06'),
(12, 'WE SURPRISED OUR LOYAL FAN WITH THE BEST PS5', '2.jpg', 'https://www.youtube.com/watch?v=8cMkt6lBag8', '2023-01-23 21:28:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igra`
--
ALTER TABLE `igra`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `KORISNICKO_IME` (`KORISNICKO_IME`);

--
-- Indexes for table `mail_pretplatnici_vesti`
--
ALTER TABLE `mail_pretplatnici_vesti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `MEJL_ADRESA` (`MEJL_ADRESA`);

--
-- Indexes for table `mec`
--
ALTER TABLE `mec`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `takmicenje`
--
ALTER TABLE `takmicenje`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_IGRE` (`ID_IGRE`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tim_mec`
--
ALTER TABLE `tim_mec`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_TIMA` (`ID_TIMA`,`ID_MECA`),
  ADD KEY `ID_MECA` (`ID_MECA`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igra`
--
ALTER TABLE `igra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mail_pretplatnici_vesti`
--
ALTER TABLE `mail_pretplatnici_vesti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mec`
--
ALTER TABLE `mec`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `takmicenje`
--
ALTER TABLE `takmicenje`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tim_mec`
--
ALTER TABLE `tim_mec`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `takmicenje`
--
ALTER TABLE `takmicenje`
  ADD CONSTRAINT `takmicenje_ibfk_1` FOREIGN KEY (`ID_IGRE`) REFERENCES `igra` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `tim_mec`
--
ALTER TABLE `tim_mec`
  ADD CONSTRAINT `tim_mec_ibfk_1` FOREIGN KEY (`ID_TIMA`) REFERENCES `tim` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tim_mec_ibfk_2` FOREIGN KEY (`ID_MECA`) REFERENCES `mec` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
