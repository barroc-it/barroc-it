-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 03 okt 2014 om 15:42
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
  `appointments NR` int(11) NOT NULL AUTO_INCREMENT,
  `customersNR` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `datum` date NOT NULL,
  `time` time NOT NULL,
  `beschrijving` varchar(80) NOT NULL,
  PRIMARY KEY (`appointments NR`),
  KEY `customersNR` (`customersNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `aantalFacturen` int(5) NOT NULL,
  `openProjects` int(5) NOT NULL,
  `appointments` varchar(30) NOT NULL,
  `internalContact` text NOT NULL,
  `dateAction` date NOT NULL,
  `lastcontactDate` date NOT NULL,
  `nextAction` varchar(40) NOT NULL,
  `contactPerson` text NOT NULL,
  `BTW` int(5) NOT NULL,
  `omzetbedrag` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  PRIMARY KEY (`customerNR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`customerNR`, `companyName`, `address`, `postcode`, `residence`, `telephoneNumber`, `email`, `aantalFacturen`, `openProjects`, `appointments`, `internalContact`, `dateAction`, `lastcontactDate`, `nextAction`, `contactPerson`, `BTW`, `omzetbedrag`, `saldo`) VALUES
(1, 'test', '', '', '', 0, '', 0, 0, '', '', '0000-00-00', '0000-00-00', '', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoices NR` int(11) NOT NULL AUTO_INCREMENT,
  `customersNR` int(10) NOT NULL,
  `krediet` varchar(20) NOT NULL,
  `offerStatus` varchar(20) NOT NULL,
  `limiet` int(10) NOT NULL,
  `bkr_controle` tinyint(1) NOT NULL,
  `grootboekrekeningsnummer` int(15) NOT NULL,
  PRIMARY KEY (`invoices NR`),
  KEY `customersNR` (`customersNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectsNR` int(11) NOT NULL AUTO_INCREMENT,
  `customerNR` int(10) NOT NULL,
  `maintenance contract` tinyint(1) NOT NULL,
  `software` varchar(50) NOT NULL,
  `hardware` varchar(50) NOT NULL,
  `prostpect` varchar(50) NOT NULL,
  PRIMARY KEY (`projectsNR`),
  KEY `customerNR` (`customerNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments-customers` FOREIGN KEY (`customersNR`) REFERENCES `customers` (`customerNR`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices-custommers` FOREIGN KEY (`customersNR`) REFERENCES `customers` (`customerNR`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`customerNR`) REFERENCES `customers` (`customerNR`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
