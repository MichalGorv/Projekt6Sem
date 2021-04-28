-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Kwi 2021, 09:15
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
-- Baza danych: `konta`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta_uzytkownikow`
--

CREATE TABLE `konta_uzytkownikow` (
  `nazwa` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konta_uzytkownikow`
--

INSERT INTO `konta_uzytkownikow` (`nazwa`, `email`, `haslo`) VALUES
('test', 'test@wp.pl', 'test');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konta_uzytkownikow`
--
ALTER TABLE `konta_uzytkownikow`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
