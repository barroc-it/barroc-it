-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 16 okt 2014 om 11:06
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `barrocit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment NR` int(11) NOT NULL AUTO_INCREMENT,
  `customerNR` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`appointment NR`),
  KEY `customersNR` (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `appointments`
--

INSERT INTO `appointments` (`appointment NR`, `customerNR`, `name`, `date`, `time`, `description`) VALUES
(2, 1, 'hoi', '2014-10-15', '00:00:00', 'adjlagkjalg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerNR` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `residence` varchar(30) NOT NULL,
  `telephoneNumber` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `amountOfInvoices` int(5) NOT NULL,
  `openProjects` int(5) NOT NULL,
  `appointments` varchar(30) NOT NULL,
  `internalContact` text NOT NULL,
  `dateAction` date NOT NULL,
  `lastcontactDate` date NOT NULL,
  `nextAction` varchar(40) NOT NULL,
  `contactPerson` text NOT NULL,
  `BTW` int(5) NOT NULL,
  `salesAmount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `credit` varchar(10) NOT NULL,
  `limit` int(10) NOT NULL,
  `largeReservationNumber` varchar(10) NOT NULL,
  `offerStatus` varchar(40) NOT NULL,
  `prostpect` varchar(50) NOT NULL,
  `bkr_control` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  `bankNumber` varchar(20) NOT NULL,
  PRIMARY KEY (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`customerNR`, `companyName`, `address`, `postcode`, `residence`, `telephoneNumber`, `email`, `amountOfInvoices`, `openProjects`, `appointments`, `internalContact`, `dateAction`, `lastcontactDate`, `nextAction`, `contactPerson`, `BTW`, `salesAmount`, `balance`, `credit`, `limit`, `largeReservationNumber`, `offerStatus`, `prostpect`, `bkr_control`, `description`, `bankNumber`) VALUES
(1, 'test', 'zooi', '1111aa', '', 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '', 'name', 0, NULL, 1500, '', 500, '', '', '', 0, '', ''),
(2, 'bedrijfsnaam', 'namenstraat', '4363fg', 'raamsdonkcity', 946582, 'email@hotmail.com', 2, 2, '', '', '0000-00-00', '0000-00-00', '', 'naam', 0, NULL, 200, '', 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoicesNR` int(11) NOT NULL AUTO_INCREMENT,
  `projectNR` int(10) NOT NULL,
  `date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `quintity` int(20) NOT NULL,
  `price` int(100) NOT NULL,
  `btw` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`invoicesNR`),
  KEY `projectsNR` (`projectNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`invoicesNR`, `projectNR`, `date`, `amount`, `paid`, `quintity`, `price`, `btw`, `description`, `active`) VALUES
(1, 2, '2014-10-08', 100, 40, 5, 100, 21, '', 0),
(2, 1, '2014-10-02', 10, 10, 4, 100, 21, 'project barroc', 0),
(3, 2, '2014-10-15', 100, 10, 1, 100, 21, 'project school', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectNR` int(11) NOT NULL AUTO_INCREMENT,
  `customerNR` int(10) NOT NULL,
  `maintenance_contract` tinyint(1) NOT NULL,
  `software` varchar(50) NOT NULL,
  `hardware` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`projectNR`),
  KEY `customerNR` (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`projectNR`, `customerNR`, `maintenance_contract`, `software`, `hardware`, `description`, `active`) VALUES
(1, 1, 1, 'dsjkdsj', 'grmrmm', 'dkjdkfjdk', 0),
(2, 2, 2, 'gyhujm', 'rfthj', 'ghuj', 0),
(11, 2, 2, 'dfghjm', 'sdrfgthj', 'sdfgth', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gebruikersrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`name`, `password`, `gebruikersrol`) VALUES
('sales', 'sales', 1),
('finance', 'finance', 2),
('development', 'development', 3);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments-customers` FOREIGN KEY (`customerNR`) REFERENCES `customers` (`customerNR`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `project-invoice` FOREIGN KEY (`projectNR`) REFERENCES `projects` (`projectNR`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`customerNR`) REFERENCES `customers` (`customerNR`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
