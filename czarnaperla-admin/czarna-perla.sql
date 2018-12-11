-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Gru 2018, 15:30
-- Wersja serwera: 10.1.34-MariaDB
-- Wersja PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `czarna-perla`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firmy`
--

CREATE TABLE `firmy` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `value` text COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `firmy`
--

INSERT INTO `firmy` (`id`, `nazwa`, `value`, `data_dodania`) VALUES
(18, 'Zara', 'zara', '2018-11-22'),
(19, 'test1', 'test1', '2018-11-22'),
(20, 'test2', 'test2', '2018-11-22'),
(21, 'dupa', 'dupa', '2018-11-22'),
(22, 'sraka', 'sraka', '2018-11-22'),
(23, 'dupaaaa', 'dupaaaa', '2018-11-27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaje`
--

CREATE TABLE `rodzaje` (
  `id` int(11) NOT NULL,
  `rodzaj` text COLLATE utf8_polish_ci NOT NULL,
  `value` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rodzaje`
--

INSERT INTO `rodzaje` (`id`, `rodzaj`, `value`) VALUES
(6, 'Koszulki', 'koszulki'),
(7, 'Spodnie', 'spodnie'),
(8, 'Akcesoria', 'akcesoria'),
(9, 'Inne', 'inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar`
--

CREATE TABLE `towar` (
  `id` int(11) NOT NULL,
  `rodzaj` text COLLATE utf8_polish_ci NOT NULL,
  `firma` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `ilosc_ogolna` int(11) NOT NULL,
  `ilosc_usunietych` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towar`
--

INSERT INTO `towar` (`id`, `rodzaj`, `firma`, `ilosc`, `ilosc_ogolna`, `ilosc_usunietych`) VALUES
(19, 'koszulki', 'zara', 85, 227, 142),
(20, 'akcesoria', 'dupa', 0, 19, 19),
(21, 'inne', 'dupa', 5, 14, 9),
(22, 'spodnie', 'test2', 0, 6, 6),
(23, 'akcesoria', 'sraka', 45, 45, 0),
(24, 'koszulki', 'dupaaaa', 22, 22, 0),
(25, 'inne', 'sraka', 52, 55, 3),
(26, 'akcesoria', 'test2', 7, 7, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `firmy`
--
ALTER TABLE `firmy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rodzaje`
--
ALTER TABLE `rodzaje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `firmy`
--
ALTER TABLE `firmy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `rodzaje`
--
ALTER TABLE `rodzaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `towar`
--
ALTER TABLE `towar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
