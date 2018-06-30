-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jun 2018 um 16:57
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_verena_carpella_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`ID`, `name`, `email`, `pass`) VALUES
(1, 'Verena Carpella', 'verenaparaluxe@gmail.com', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892'),
(2, 'admin admin', 'admin@mail.com', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `ID` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `manufactur` varchar(55) DEFAULT NULL,
  `model_type` varchar(55) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fk_location_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`ID`, `type`, `manufactur`, `model_type`, `amount`, `img`, `fk_location_ID`) VALUES
(1, 'SUV', 'Cadillac', 'Escalade', NULL, NULL, 1),
(2, 'SUV', 'Cadillac', 'Escalade', 0, '', 1),
(3, 'SUV', 'Volvo', 'XC90', NULL, NULL, 1),
(4, 'SUV', 'Jeep', 'Grand Cherokee', NULL, NULL, NULL),
(5, 'SUV', 'Tesla', 'Model X', NULL, NULL, NULL),
(6, 'E-Car', 'Ford', 'Focus Electric', NULL, NULL, NULL),
(7, 'E-Car', 'BMW', 'i3', NULL, NULL, NULL),
(8, 'E-Car', 'Mercedes', 'B250e', NULL, NULL, NULL),
(9, 'Limo', 'Tesla', 'Model S', 0, '', 2),
(10, 'Limo', 'Rolls Royce', 'Phantom', NULL, NULL, NULL),
(11, 'Limo', 'Bentley', 'Flying Spur', NULL, NULL, NULL),
(12, 'Limo', 'Audi', 'A6', NULL, NULL, NULL),
(13, 'Limo', 'Mercedes-Mayerbach', 'S-Klasse', NULL, NULL, NULL),
(14, 'Cabrio', 'Mercedes Benz', 'E-Klasse', NULL, NULL, NULL),
(15, 'Cabrio', 'Alfa Romeo', '4C Spider', NULL, NULL, NULL),
(16, 'Cabrio', 'Ford', 'Mustang Facelift', 0, '', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `carlocations`
--

CREATE TABLE `carlocations` (
  `carLocations_ID` int(11) NOT NULL,
  `fk_car_ID` int(11) NOT NULL,
  `fk_location_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `locations`
--

CREATE TABLE `locations` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `point` varchar(20) NOT NULL,
  `address` char(25) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `locations`
--

INSERT INTO `locations` (`ID`, `name`, `point`, `address`, `postcode`) VALUES
(1, 'Central', 'Mitte', 'Landstraßer Hauptstraße 2', 1030),
(2, 'North', 'Ares Tower', 'Donau-City-Straße 11', 1220),
(3, 'South', 'HaubtBahnhof', 'Alfred-Adler-Straße 107', 1100),
(4, 'West', 'WestBahnhof', 'Europaplatz 2', 1150);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `pass`) VALUES
(1, 'Verena Carpella', 'verenaparaluxe@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'test testinger', 'test@mail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(3, 'verena test', 'test@test.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `car_ibfk_1` (`fk_location_ID`);

--
-- Indizes für die Tabelle `carlocations`
--
ALTER TABLE `carlocations`
  ADD PRIMARY KEY (`carLocations_ID`);

--
-- Indizes für die Tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `carlocations`
--
ALTER TABLE `carlocations`
  MODIFY `carLocations_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `locations`
--
ALTER TABLE `locations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`fk_location_ID`) REFERENCES `locations` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
