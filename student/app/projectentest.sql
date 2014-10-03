-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 03 okt 2014 om 14:25
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `phpseries`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectentest`
--

CREATE TABLE IF NOT EXISTS `projectentest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opdrachtgever` varchar(50) NOT NULL,
  `project` varchar(50) NOT NULL,
  `adress` varchar(40) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `telefoonnummer` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `projectentest`
--

INSERT INTO `projectentest` (`id`, `opdrachtgever`, `project`, `adress`, `postcode`, `telefoonnummer`) VALUES
(1, 'fer', 'is niet zo slim', 'methuis', '1111aa', 0),
(2, '', '', 'methuisrr', '', 0),
(3, 'sietse', 'sietpeserht', 'rgthyrr', '2345aa', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
