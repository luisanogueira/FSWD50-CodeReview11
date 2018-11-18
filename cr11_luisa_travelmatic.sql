-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2018 às 19:00
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_luisa_travelmatic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `concerts`
--

CREATE TABLE `concerts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `concerts`
--

INSERT INTO `concerts` (`id`, `image`, `name`, `website`, `type`, `price`, `date`, `time`, `fk_location_id`) VALUES
(1, 'img/lenny.jpg', 'Lenny Kravitz', 'http://lennykravitz.com/', 'rock concert', '48.00', '2019-12-09', '19:30:00', 18),
(2, 'img/vivaldi.jpg', 'Vivaldi', 'www.volksoper.at', 'musical for family', '92.00', '2018-11-20', '18:30:00', 17),
(9, 'img/slayer.jpg', 'Slayer', 'https://www.slayer.net/', 'Dark metal concert', '47.00', '2018-11-23', '17:45:00', 12),
(11, 'img/kris.jpg', 'Kris Kristofferson', 'http://kriskristofferson.com/', 'country concert', '58.00', '2018-11-15', '20:00:00', 26),
(13, 'img/boheme.jpg', 'La BohÃ¨me', 'https://www.wiener-staatsoper.at/', 'opera', '215.00', '2018-11-23', '19:30:00', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ZIP_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `location`
--

INSERT INTO `location` (`id`, `address`, `city`, `ZIP_code`) VALUES
(2, 'SchÃ¶nbrunner StraÃŸe 21', 'Wien', 1050),
(4, 'Wienzeile', 'Wien', 1060),
(5, 'KettenbrÃ¼ckengasse 19', 'Wien', 1050),
(12, 'Roland-Rainer-Platz 1, Wiener Stadthalle', 'Wien', 1150),
(13, 'Griechengasse 9 Fleischmarkt 11, A', 'Wien', 1010),
(14, 'Zehetnergasse 13', 'Wien', 1140),
(15, 'Maria-Theresien-Platz', 'Wien', 1010),
(16, 'Karlsplatz 1', 'Wien', 1010),
(17, 'Wahringer Strasse 78', 'Wien', 1090),
(18, 'Wiener Stadthalle - Halle D, Roland Rainer Platz 1', 'Wien', 1150),
(22, 'SchÃ¶nbrunner Schlosspark', 'Wien', 1130),
(23, 'SchÃ¶nbrunner Schlosspark', 'Wien', 1130),
(24, 'jdskjdhskj', 'msklnk', 0),
(25, 'SchÃ¶nbrunner Schlosspark', 'Wien', 1130),
(26, 'Wiener Stadthalle - Halle F', 'Wien', 1150),
(30, 'SchleifmÃ¼hlgasse 16', 'Wien', 1040),
(31, 'Prinz Eugen-StraÃŸe 27', 'Wien', 1030),
(32, 'Opernring 2', 'Wien', 1010);

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restaurants`
--

INSERT INTO `restaurants` (`id`, `image`, `name`, `phone`, `website`, `description`, `type`, `fk_location_id`) VALUES
(1, 'img/casamia.jpg', 'Casa Mia', 439234638, 'https://www.casamia1230.at/', 'Charming italian restaurant in the middle of the 14th district.', 'italian', 14),
(2, 'img/griechenbeisl2.jpg', 'Griechenbeisl', 435331977, 'http://griechenbeisl.at/', 'Very typical austrian restaurant with excellent menu choices', 'austrian', 13),
(4, 'img/sixta.png', 'Sixta', 435852856, 'http://www.sixta-restaurant.at/', 'Nice and cozy restaurant/bar that can be visited from Tuesday to Sunday', 'austrian', 2),
(6, 'img/thai.png', 'Lemon Leaf Thai', 5812308, 'http://www.lemonleaf.at/', 'Typical food from Thailand', 'thai', 5),
(10, 'img/voll.jpg', 'Vollpension', 435850464, 'https://www.vollpension.wien/', 'Very nice cafe in the fourth district with good cakes and other grandma treats.', 'cafe', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `things_todo`
--

CREATE TABLE `things_todo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `things_todo`
--

INSERT INTO `things_todo` (`id`, `image`, `name`, `website`, `description`, `type`, `fk_location_id`) VALUES
(1, 'img/church.jpg', 'St. Charles Church', 'http://www.karlskirche.at/', 'Beautiful church in the center of Vienna, totally worth the visit.', 'Church', 16),
(2, 'img/kunsthistorisches.jpg', 'Kunsthistorisches Museum', 'https://www.khm.at/', 'An excellent art museum that can be explored for 15 euros from tuesday to sunday.', 'Museum', 15),
(3, 'img/naschmarkt.jpg', 'Naschmarkt', 'http://www.wienernaschmarkt.eu/index.html', 'Open market with typical austrian restaurants and many little shops with fresh fruits, vegetables and other typical food.', 'market', 4),
(6, 'img/zoo.jpg', 'Zoo', 'https://www.zoovienna.at/', 'Good attraction for families, with animals from different parts of the world.', 'park', 25),
(8, 'img/belv.jpg', 'Belvedere', 'https://www.belvedere.at/', 'Museum where the famous painting ', 'museum/ palace', 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userRole`) VALUES
(1, 'Luisa Nogueira', 'luisa.nogueira@outlook.com', 'b77d8c1f084ec518cde29da2e6d1bdaf6c666e6ae360f610a011aa33779ab66e', 1),
(2, 'Marie', 'marie@me.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 2),
(3, 'Peter', 'pete@me.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location3` (`fk_location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location1` (`fk_location_id`);

--
-- Indexes for table `things_todo`
--
ALTER TABLE `things_todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location2` (`fk_location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `things_todo`
--
ALTER TABLE `things_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `location3` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`id`);

--
-- Limitadores para a tabela `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `location1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`id`);

--
-- Limitadores para a tabela `things_todo`
--
ALTER TABLE `things_todo`
  ADD CONSTRAINT `location2` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
