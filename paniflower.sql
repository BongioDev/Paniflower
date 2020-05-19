-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 mei 2020 om 20:36
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paniflower`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id` int(11) NOT NULL,
  `naam` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `chauffeur`
--

INSERT INTO `chauffeur` (`id`, `naam`) VALUES
(1, 'ZZ Jan Jannsen'),
(2, 'Peter Selie'),
(3, 'Tom Aet'),
(4, 'Aleko Bongiovanni');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `eenheid`
--

CREATE TABLE `eenheid` (
  `id` int(11) NOT NULL,
  `naam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `eenheid`
--

INSERT INTO `eenheid` (`id`, `naam`) VALUES
(1, 'kg'),
(2, 'ton'),
(3, 'hl'),
(4, 'l'),
(5, 'stuk');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(60) NOT NULL,
  `losplaats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `losplaats`) VALUES
(1, 'Aveve Merksem', 'Vaartkaai 30 - 2170 Merksem (BE)'),
(2, 'Bakkersland Hedel', 'Baronieweg 15 - 5321 Hedel (NL)'),
(3, 'Hubo Houthalen-helchteren', 'grote baan 45, houthalen helchteren 3530'),
(4, 'fictieve winkel', 'fictievestraat 85, Genk 3600'),
(6, 'Aveve brussel', 'avevestraat 82 - 3265 Brussel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opdrachtgever`
--

CREATE TABLE `opdrachtgever` (
  `id` int(11) NOT NULL,
  `naam` varchar(60) NOT NULL,
  `laadplaats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `opdrachtgever`
--

INSERT INTO `opdrachtgever` (`id`, `naam`, `laadplaats`) VALUES
(1, 'paniflower', 'Westkaai 1 2170 Merksem (BE)'),
(2, 'fictieve opdrachtgever', 'kerkhofstraat 82 houhalen helchteren 3530'),
(7, 'Tuin en benodigdheden', 'Tuinstraat 85 - GENT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_paniflower`
--

CREATE TABLE `order_paniflower` (
  `id` int(11) NOT NULL,
  `opdrachtgever_id` int(11) NOT NULL,
  `laad_datum_uur` datetime NOT NULL,
  `opmerking_laden` varchar(250) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `los_datum_uur` datetime NOT NULL,
  `opmerking_lossen` varchar(250) NOT NULL,
  `product_id` int(11) NOT NULL,
  `kwantum` int(11) NOT NULL,
  `eenheid_id` int(11) NOT NULL,
  `chauffeur_id` int(11) NOT NULL,
  `extra_opmerking` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order_paniflower`
--

INSERT INTO `order_paniflower` (`id`, `opdrachtgever_id`, `laad_datum_uur`, `opmerking_laden`, `klant_id`, `los_datum_uur`, `opmerking_lossen`, `product_id`, `kwantum`, `eenheid_id`, `chauffeur_id`, `extra_opmerking`) VALUES
(5, 1, '2020-06-11 07:00:00', 'Laaddok 1', 1, '2020-06-11 11:00:00', 'Achteraan winkel, volg pijltjes', 1, 525, 1, 1, 'Voor je vertrekt, kom nog even langs kantoor...'),
(6, 1, '2020-04-09 09:00:00', 'laaddok 7', 3, '2020-04-09 13:00:00', 'lossen rechts van de inkom', 3, 75, 5, 2, ''),
(42, 2, '2021-11-20 09:00:00', 'dit is opmerking laden', 2, '2021-11-21 12:00:00', 'opmerking lossen dit', 2, 100, 4, 2, 'hallo extra oprmekring');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `artikelnr` varchar(30) NOT NULL,
  `naam` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `artikelnr`, `naam`) VALUES
(1, '1000', 'EXPORTBLOEM - BULK'),
(2, '1001', 'EUROFLOWER 11/680 - BULK'),
(3, '1002', 'EUROWHITE 11/560 - BULK'),
(5, '1022', 'GIST'),
(6, '1007', 'GRANEN WIT'),
(8, '1025', 'BROOD KRUIMELS'),
(12, '1025', 'VOGEL ZAAD'),
(13, '1059', 'GROENTEN ZADEN');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `admin`) VALUES
(2, 'chantal001', '$2y$10$p/VDXl1lkczWeOfM6oUzceQV1sgFlx0Yl3ditxo3eVE4SAr4O.SOO', 0),
(3, 'Roza002', '$2y$10$8R6pH5qSZH4CxzmvLdlCiuhVUa9/bFbAjzPIMFMgdXdhMXrBbLEZe', 0),
(4, 'admin1', '$2y$10$fi/jVqppRmSSPqcMCIGVFOtGyeY0jJkx0iVqNOVKcRceyM6pUhFQq', 1),
(5, 'admin2', '$2y$10$ECcz7KM38MzRzEPsi1eMn.rAcUOZ37xpC5Rre6/JBzs8vJrqOsugS', 1),
(6, 'charlotte003', '$2y$10$rQc2uUC6rpJOc7Y7z4DRBOvmptdoSrqpg1VFbGkEaJ.IzjU0iX3PK', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `eenheid`
--
ALTER TABLE `eenheid`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `opdrachtgever`
--
ALTER TABLE `opdrachtgever`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `order_paniflower`
--
ALTER TABLE `order_paniflower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opdrachtgever_id` (`opdrachtgever_id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `eenheid_id` (`eenheid_id`),
  ADD KEY `chauffeur_id` (`chauffeur_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `eenheid`
--
ALTER TABLE `eenheid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `opdrachtgever`
--
ALTER TABLE `opdrachtgever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `order_paniflower`
--
ALTER TABLE `order_paniflower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order_paniflower`
--
ALTER TABLE `order_paniflower`
  ADD CONSTRAINT `order_paniflower_ibfk_1` FOREIGN KEY (`chauffeur_id`) REFERENCES `chauffeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_paniflower_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_paniflower_ibfk_3` FOREIGN KEY (`opdrachtgever_id`) REFERENCES `opdrachtgever` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_paniflower_ibfk_4` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_paniflower_ibfk_5` FOREIGN KEY (`eenheid_id`) REFERENCES `eenheid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
