-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Cze 14, 2023 at 12:16 PM
-- Wersja serwera: 10.5.20-MariaDB
-- Wersja PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20811319_products`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `Pkey` int(10) NOT NULL,
  `SKU` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `Weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `discs`
--

CREATE TABLE `discs` (
  `Pkey` int(10) NOT NULL,
  `SKU` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `Size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `furniture`
--

CREATE TABLE `furniture` (
  `Pkey` int(10) NOT NULL,
  `SKU` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `Height` int(10) NOT NULL,
  `Width` int(10) NOT NULL,
  `Length` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indeksy dla tabeli `discs`
--
ALTER TABLE `discs`
  ADD PRIMARY KEY (`Pkey`);

--
-- Indeksy dla tabeli `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`Pkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `discs`
--
ALTER TABLE `discs`
  MODIFY `Pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `Pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
