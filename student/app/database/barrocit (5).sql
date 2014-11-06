-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 06 nov 2014 om 12:14
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
  `appointmentsNR` int(11) NOT NULL AUTO_INCREMENT,
  `customerNR` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `datum` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`appointmentsNR`),
  KEY `customersNR` (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Gegevens worden geëxporteerd voor tabel `appointments`
--

INSERT INTO `appointments` (`appointmentsNR`, `customerNR`, `name`, `datum`, `time`, `description`) VALUES
(2, 1, 'hddad', '2014-10-15', '00:00:00', 'adjlagkjalg'),
(12, 1, 'piet', '2014-10-23', '00:00:00', 'test'),
(14, 2, 'fdfd', '0000-00-00', '00:00:00', 'ddfdfd'),
(15, 1, 'test', '2014-10-22', '00:00:00', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `department` varchar(15) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `name`, `department`, `comment`, `datetime`) VALUES
(2, 'test', 'finance', 'dit is een comment', '2014-10-14'),
(47, 'datum', 'Sales', 'test', '2014-10-17'),
(57, 'Commentaar', 'Development', 'Commentaar van Development', '2014-10-16'),
(58, 'piet', 'Finance', 'hallo', '2014-10-17'),
(59, 'jesse', 'Finance', 'hallo', '2014-10-17'),
(61, 'pietje', 'Sales', 'hoi', '2014-11-03'),
(62, 'bontje', 'Sales', 'hoi', '2014-11-03'),
(63, 'regilio', 'Sales', 'hoi', '2014-11-04');

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
  `salesAmount` int(11) NOT NULL,
  `balance` double DEFAULT NULL,
  `credit` varchar(10) NOT NULL,
  `maxAmount` int(10) NOT NULL,
  `largeReservationNumber` varchar(10) NOT NULL,
  `offerStatus` varchar(40) NOT NULL,
  `prostpect` varchar(50) NOT NULL,
  `bkr_control` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  `bankNumber` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `limiet` int(11) NOT NULL,
  PRIMARY KEY (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`customerNR`, `companyName`, `address`, `postcode`, `residence`, `telephoneNumber`, `email`, `amountOfInvoices`, `openProjects`, `appointments`, `internalContact`, `dateAction`, `lastcontactDate`, `nextAction`, `contactPerson`, `BTW`, `salesAmount`, `balance`, `credit`, `maxAmount`, `largeReservationNumber`, `offerStatus`, `prostpect`, `bkr_control`, `description`, `bankNumber`, `start_date`, `end_date`, `limiet`) VALUES
(1, 'test', 'zooi', '1111aa', '', 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '', 'name', 0, 1476, 1500, '500', 900, '', '', '', 1, '', '', '2014-10-27', '2014-10-31', 0),
(2, 'bedrijfsnaam', 'namenstraat', '4363fg', 'raamsdonkcity', 946582, 'email@hotmail.com', 2, 2, '', '', '0000-00-00', '0000-00-00', '', 'naam', 0, 122, 200, '', 500, '', '', '', 1, '', '', '2014-10-27', '2014-10-31', 0),
(8, 'ING', 'sluisakker 47', '4944BV', '`Raamsdonk', 610542399, 'remmert_kloppenburg@msn.com', 0, 0, '', '', '2014-10-14', '2014-10-16', '', '', 0, 0, 400, '300', 400, '', '', '', 1, '', '', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoicesNR` int(11) NOT NULL AUTO_INCREMENT,
  `customerNR` int(11) NOT NULL,
  `projectNR` int(10) NOT NULL,
  `datum` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `quintity` int(20) NOT NULL,
  `price` int(100) NOT NULL,
  `btw` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`invoicesNR`),
  KEY `projectsNR` (`projectNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`invoicesNR`, `customerNR`, `projectNR`, `datum`, `amount`, `paid`, `quintity`, `price`, `btw`, `description`, `active`) VALUES
(0, 1, 1, '2014-10-02', '484', 10, 4, 100, 21, 'project barroc', 0),
(1, 2, 2, '2014-10-08', '1', 40, 1, 1, 21, '', 0),
(3, 2, 2, '2014-10-15', '121', 10, 1, 100, 21, 'project school', 0),
(4, 1, 1, '2014-10-16', '121', 0, 1, 100, 21, 'test', 0),
(5, 1, 1, '2014-10-08', '871', 0, 3, 240, 21, 'dgaga', 0),
(6, 8, 3, '0000-00-00', '0', 0, 3, 100, 21, 'jkadlh', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectNR` int(11) NOT NULL AUTO_INCREMENT,
  `krediet` int(11) NOT NULL,
  `revenueamount` int(11) NOT NULL,
  `customerNR` int(10) NOT NULL,
  `maintenance_contract` tinyint(1) NOT NULL,
  `software` varchar(50) NOT NULL,
  `hardware` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`projectNR`),
  KEY `customerNR` (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`projectNR`, `krediet`, `revenueamount`, `customerNR`, `maintenance_contract`, `software`, `hardware`, `description`, `active`) VALUES
(1, 0, 0, 1, 1, 'dsjkdsj', 'grmrmm', 'dkjdkfjdk', 0),
(2, 0, 0, 2, 2, 'gyhujm', 'rfthj', 'ghuj', 1),
(3, 0, 0, 8, 3, 'dagad', 'dgasg', 'dagag', 0),
(11, 0, 0, 2, 2, 'dfghjm', 'sdrfgthj', 'sdfgth', 0),
(12, 0, 0, 2, 0, 'adga', 'adg', 'adg', 0),
(13, 0, 0, 2, 0, 'test', 'test', 'test', 0);

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
