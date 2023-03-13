-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 mrt 2023 om 21:55
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserveringssysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservation`
--

INSERT INTO `reservation` (`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `comments`, `date`) VALUES
(2, 'Sybren', 'Goudappel', 'sybreng@gmail.com', 636211662, 'Heeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscleHeeeeeel veel muscle', '2023-03-16'),
(5, 'Mr', 'Bean', 'beanmr@gmail.com', 31, 'beans beans beans beans beans beans beans beans beans beans ', '2025-03-11'),
(8, 'ww', 'www', 'wwww', 0, 'wwww', '2023-03-15');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
