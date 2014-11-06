-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 06 nov 2014 om 11:22
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`invoicesNR`, `customerNR`, `projectNR`, `datum`, `amount`, `paid`, `quintity`, `price`, `btw`, `description`, `active`) VALUES
(0, 1, 1, '2014-10-02', '484', 10, 4, 100, 21, 'project barroc', 1),
(1, 2, 2, '2014-10-08', '1', 40, 1, 1, 21, '', 0),
(3, 2, 2, '2014-10-15', '121', 10, 1, 100, 21, 'project school', 0),
(4, 1, 1, '2014-10-16', '121', 0, 1, 100, 21, 'test', 0),
(5, 1, 1, '2014-10-08', '871', 0, 3, 240, 21, 'dgaga', 0),
(6, 8, 3, '0000-00-00', '0', 0, 3, 100, 21, 'jkadlh', 0);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `project-invoice` FOREIGN KEY (`projectNR`) REFERENCES `projects` (`projectNR`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
