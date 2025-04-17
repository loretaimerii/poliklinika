-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 09:45 PM
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
-- Database: `poliklinika`
--

-- --------------------------------------------------------

--
-- Table structure for table `analiza`
--

CREATE TABLE `analiza` (
  `analizaid` int(11) NOT NULL,
  `infermieriid` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `qmimi` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analiza`
--

INSERT INTO `analiza` (`analizaid`, `infermieriid`, `emri`, `qmimi`) VALUES
(1, 5, 'Analiza e gjakut', 115.00),
(2, 3, 'Analiza e gjakut', 115.00),
(3, 2, 'Analiza e gjakut', 115.00),
(4, 1, 'Analiza e gjakut', 115.00),
(7, 4, 'Student Project 2', 34.00);

-- --------------------------------------------------------

--
-- Table structure for table `infermieret`
--

CREATE TABLE `infermieret` (
  `infermieriid` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fjalekalimi` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `dataelindjes` date DEFAULT NULL,
  `roli` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infermieret`
--

INSERT INTO `infermieret` (`infermieriid`, `emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `qyteti`, `dataelindjes`, `roli`) VALUES
(1, 'Melisa', 'Imeri', '043990112', 'melisa@gmail.com', 'melisa1', 'Ferizaj', NULL, b'0'),
(2, 'Gent', 'Demelezi', '044888222', 'gent@gmail.com', 'gent1', 'Prishtine', NULL, b'0'),
(3, 'Erton', 'Imeri', '043181900', 'erton@gmail.com', 'erton1', 'Ferizaj', NULL, b'0'),
(4, 'Renea', 'Shahini', '045983289', 'renea@gmail.com', 'renea1', 'Prishtina', NULL, b'0'),
(5, 'Florent', 'Avdyli', '044332223', 'florent@gmail.com', 'florent1', 'Prizren', NULL, b'0'),
(13, 'Alena', 'Imeri', '044999999', 'alena@gmail.com', NULL, 'Prishtine', NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `kategorit`
--

CREATE TABLE `kategorit` (
  `kategoriaid` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `qmimi` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorit`
--

INSERT INTO `kategorit` (`kategoriaid`, `emri`, `qmimi`) VALUES
(1, 'Kategoria 1', 30.00),
(2, 'Kategoria 2', 50.00),
(3, 'Kategoria 3', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `kontrollat`
--

CREATE TABLE `kontrollat` (
  `kontrollaid` int(11) NOT NULL,
  `pacientiid` int(11) NOT NULL,
  `mjekuid` int(11) NOT NULL,
  `analizaid` int(11) NOT NULL,
  `kategoriaid` int(11) NOT NULL,
  `dataekontrolles` date NOT NULL,
  `emri` varchar(50) NOT NULL,
  `pershkrimi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontrollat`
--

INSERT INTO `kontrollat` (`kontrollaid`, `pacientiid`, `mjekuid`, `analizaid`, `kategoriaid`, `dataekontrolles`, `emri`, `pershkrimi`) VALUES
(1, 2, 1, 3, 1, '2023-05-13', 'Kontrolle e pergjithshme', 'kontrolle e pergjithshme per kete pacient'),
(2, 4, 2, 4, 1, '2023-04-25', 'Kontrolle e pergjithshme', NULL),
(11, 5, 3, 2, 2, '2022-12-20', 'Echokardiograma', NULL),
(14, 8, 3, 4, 2, '2022-12-25', 'Echokardiograma', '           hghhhhhhhhhhhhhhhhhhh             '),
(24, 6, 1, 3, 2, '0000-00-00', 'Elektrokardiograma', NULL),
(26, 7, 1, 1, 2, '2023-11-10', 'Testi i stresit', NULL),
(35, 7, 1, 4, 2, '2028-10-24', 'Echokardiograma', NULL),
(37, 7, 1, 3, 2, '2023-10-03', 'Testi i stresit', NULL),
(40, 4, 1, 3, 2, '2023-11-10', 'Testi i stresit', '            '),
(64, 7, 3, 3, 2, '2023-10-23', 'Testi i stresit', NULL),
(71, 3, 1, 1, 2, '2023-11-08', 'Kontrolle e pergjithshme', '     kontroll       '),
(86, 7, 4, 1, 2, '2023-10-18', 'Elektrokardiograma', NULL),
(87, 7, 3, 2, 2, '2023-11-10', 'Kontrolle e pergjithshme', NULL),
(88, 3, 1, 3, 2, '2023-11-09', 'Kontrolle e pergjithshme', '       kontroll     '),
(90, 7, 4, 3, 2, '2023-11-09', 'Elektrokardiograma', NULL),
(92, 5, 1, 3, 2, '2024-08-10', 'Testi i stresit', '     kkkkkkkkkkkkkkkkkkkk       ');

-- --------------------------------------------------------

--
-- Table structure for table `mjeket`
--

CREATE TABLE `mjeket` (
  `mjekuid` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fjalekalimi` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `dataelindjes` date DEFAULT NULL,
  `roli` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mjeket`
--

INSERT INTO `mjeket` (`mjekuid`, `emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `qyteti`, `dataelindjes`, `roli`) VALUES
(1, 'Fiona', 'Imeri', '044222000', 'fiona@gmail.com', 'fiona1', 'Ferizaj', '2023-10-04', b'1'),
(2, 'Edona', 'Hajdini', '045921211', 'edona@gmail.com', 'edona1', 'Ferizaj', NULL, b'1'),
(3, 'Fjolla', 'Tmava', '045981129', 'fjolla@gmail.com', 'fjolla1', 'Ferizaj', NULL, b'1'),
(4, 'Ema', 'Imeri', '045555771', 'ema@gmail.com', 'ema1', 'Ferizaj', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `pacientet`
--

CREATE TABLE `pacientet` (
  `pacientiid` int(11) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `telefoni` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fjalekalimi` varchar(30) DEFAULT NULL,
  `qyteti` varchar(30) DEFAULT NULL,
  `dataelindjes` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacientet`
--

INSERT INTO `pacientet` (`pacientiid`, `emri`, `mbiemri`, `telefoni`, `email`, `fjalekalimi`, `qyteti`, `dataelindjes`) VALUES
(1, 'Odesa', 'Topojani', '044911911', 'odesa@gmail.com', 'odesa1', 'Ferizaj', '1986-01-23'),
(2, 'Anida', 'Terziu', '045888999', 'anida@gmail.com', 'anida1', 'Tetove', '1979-05-21'),
(3, 'Eljesa', 'Shabani', '044110110', 'eljesa@gmail.com', 'eljesa1', 'Ferizaj', '1960-07-07'),
(4, 'Bujar', 'Avdyli', '044111102', 'bujar@gmail.com', 'bujar1', 'Ferizaj', '2000-04-01'),
(5, 'Jonida', 'Olluri', '044221221', 'jonida@gmail.com', 'jonida1', 'ferizaj', '1977-11-25'),
(6, 'Erza', 'Berisha', '045987987', 'erza@gmail.com', 'erza1', 'Lipjan', '1992-06-18'),
(7, 'Erisaaa', 'Matoshi', '043986986', 'erisa@gmail.com', 'erisa1', 'Prishtine', '1988-02-09'),
(8, 'Merjeme', 'Bajrami', '049985985', 'merjeme@gmail.com', 'merjeme1', 'Ferizaj', '1996-03-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analiza`
--
ALTER TABLE `analiza`
  ADD PRIMARY KEY (`analizaid`),
  ADD KEY `infermieriid` (`infermieriid`);

--
-- Indexes for table `infermieret`
--
ALTER TABLE `infermieret`
  ADD PRIMARY KEY (`infermieriid`);

--
-- Indexes for table `kategorit`
--
ALTER TABLE `kategorit`
  ADD PRIMARY KEY (`kategoriaid`);

--
-- Indexes for table `kontrollat`
--
ALTER TABLE `kontrollat`
  ADD PRIMARY KEY (`kontrollaid`),
  ADD KEY `pacientiid` (`pacientiid`),
  ADD KEY `mjekuid` (`mjekuid`),
  ADD KEY `analizaid` (`analizaid`),
  ADD KEY `kategoriaid` (`kategoriaid`);

--
-- Indexes for table `mjeket`
--
ALTER TABLE `mjeket`
  ADD PRIMARY KEY (`mjekuid`);

--
-- Indexes for table `pacientet`
--
ALTER TABLE `pacientet`
  ADD PRIMARY KEY (`pacientiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analiza`
--
ALTER TABLE `analiza`
  MODIFY `analizaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `infermieret`
--
ALTER TABLE `infermieret`
  MODIFY `infermieriid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategorit`
--
ALTER TABLE `kategorit`
  MODIFY `kategoriaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontrollat`
--
ALTER TABLE `kontrollat`
  MODIFY `kontrollaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `mjeket`
--
ALTER TABLE `mjeket`
  MODIFY `mjekuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pacientet`
--
ALTER TABLE `pacientet`
  MODIFY `pacientiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analiza`
--
ALTER TABLE `analiza`
  ADD CONSTRAINT `analiza_ibfk_1` FOREIGN KEY (`infermieriid`) REFERENCES `infermieret` (`infermieriid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontrollat`
--
ALTER TABLE `kontrollat`
  ADD CONSTRAINT `kontrollat_ibfk_1` FOREIGN KEY (`pacientiid`) REFERENCES `pacientet` (`pacientiid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrollat_ibfk_2` FOREIGN KEY (`mjekuid`) REFERENCES `mjeket` (`mjekuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrollat_ibfk_3` FOREIGN KEY (`analizaid`) REFERENCES `analiza` (`analizaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrollat_ibfk_4` FOREIGN KEY (`kategoriaid`) REFERENCES `kategorit` (`kategoriaid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
