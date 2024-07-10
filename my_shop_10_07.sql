-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Jul 2024 um 13:45
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `my_shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `articlenum` varchar(255) NOT NULL,
  `anzahl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`ID`, `user_uuid`, `articlenum`, `anzahl`) VALUES
(24, '204b2af9-afce-4150-94eb-2502d1f6957d', 'd5bc78d9-145d-42e0-84ea-d3adeffc1aa6', 5),
(25, '204b2af9-afce-4150-94eb-2502d1f6957d', 'ec39ad51-e892-4923-b470-4a3d2ba0347b', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(5, 'Schuhe', 'leer'),
(6, 'Taschen', 'Kategorie für Schuhe'),
(7, 'Hosen', 'Kategorie für Hosen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `articlenum` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `creator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `articlenum`, `title`, `description`, `price`, `category`, `creator`) VALUES
(28, 'd5bc78d9-145d-42e0-84ea-d3adeffc1aa6', 'Nike Zoom 900', 'Farbe: rot, Größe 40 - 45', 145.5, 'Schuhe', '204b2af9-afce-4150-94eb-2502d1f6957d'),
(30, 'ec39ad51-e892-4923-b470-4a3d2ba0347b', 'Ledertasche', 'braun', 50.99, 'Taschen', '204b2af9-afce-4150-94eb-2502d1f6957d');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `uuid`, `firstname`, `lastname`, `email`, `password`, `role`, `created_at`) VALUES
(6, '204b2af9-afce-4150-94eb-2502d1f6957d', 'Max', 'Muster', 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$akVyMERLNkhFNWw5ZzJMNQ$vIam9NyE6haWTkyNJw6FIWbGBoDJkBYRPKQtx5fNf70', 'admin', '2024-07-07 22:00:00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_uuid` (`user_uuid`),
  ADD KEY `articlenum` (`articlenum`);

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `articlenum` (`articlenum`),
  ADD KEY `creator` (`creator`),
  ADD KEY `category` (`category`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `articlenum` FOREIGN KEY (`articlenum`) REFERENCES `products` (`articlenum`),
  ADD CONSTRAINT `user_uuid` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`);

--
-- Constraints der Tabelle `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`name`),
  ADD CONSTRAINT `creator` FOREIGN KEY (`creator`) REFERENCES `users` (`uuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
