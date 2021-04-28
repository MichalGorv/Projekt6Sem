-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2021, 09:13
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `koszyk`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(250) NOT NULL,
  `nazwa_produktu` varchar(100) NOT NULL,
  `grafika` varchar(200) NOT NULL,
  `cena` varchar(50) NOT NULL,
  `opis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa_produktu`, `grafika`, `cena`, `opis`) VALUES
(1, 'produkt1', 'produkt-1.jpg', '100', 'bibi1'),
(2, 'produkt2', 'produkt-2.jpg', '200', 'bibi2'),
(3, 'produkt3', 'produkt-3.jpg', '300', 'bibi3'),
(4, 'produkt4', 'produkt-4.jpg', '400', 'bibi4'),
(5, 'produkt5', 'produkt-5.jpg', '500', 'bibi5'),
(6, 'produkt6', 'produkt-6.jpg', '600', 'bibi6'),
(7, 'produkt7', 'produkt-7.jpg', '700', 'bibi7'),
(8, 'produkt8', 'produkt-8.jpg', '800', 'bibi8');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
