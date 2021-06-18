-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2021 at 12:23 AM
-- Server version: 10.5.10-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmak`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_categories`
--

CREATE TABLE `assigned_categories` (
  `ins_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_categories`
--

INSERT INTO `assigned_categories` (`ins_id`, `cat_id`) VALUES
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `carte`
--

CREATE TABLE `carte` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `date_creation` date NOT NULL,
  `nb_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carte`
--

INSERT INTO `carte` (`id`, `username`, `date_creation`, `nb_points`) VALUES
(1, 'yassine', '2021-05-22', 568),
(2, 'taha', '2000-08-25', 255),
(4, 'hamadi', '2005-03-26', 85),
(5, 'hjhh', '2000-01-01', 30);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'abidaa'),
(4, 'lol');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_enregistrement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_cmd`, `id_membre`, `montant`, `date_enregistrement`) VALUES
(37, 1, 15000, '2021-05-06'),
(38, 1, 5000, '2021-05-06'),
(39, 1, 12000, '2021-05-06'),
(40, 1, 12000, '2021-05-06'),
(41, 1, 17000, '2021-05-06'),
(53, 1, 15000, '2021-05-07'),
(54, 1, 30000, '2021-05-07'),
(55, 1, 130000, '2021-05-07'),
(56, 1, 50000, '2021-05-07'),
(57, 1, 80000, '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `thread` varchar(100) NOT NULL,
  `content` varchar(250) NOT NULL,
  `date_comment` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `user`, `thread`, `content`, `date_comment`) VALUES
(32, 'tes', 'trt', 'ggr', '2021-05-19'),
(33, 'testing', 'ee', 'efef', '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_commande`
--

INSERT INTO `detail_commande` (`id_commande`, `id_produit`, `nom`, `prix`, `quantite`) VALUES
(48, 2, 'Hamburger', 15000, 28),
(49, 1, 'Coca cola', 5000, 1),
(50, 1, 'Coca cola', 5000, 14),
(53, 1, 'Coca cola', 5000, 3),
(54, 1, 'Coca cola', 5000, 6),
(55, 1, 'Coca cola', 5000, 26),
(56, 5, 'Sprite', 5000, 10),
(57, 1, 'Coca cola', 5000, 16);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(10) NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `description`, `code`, `date`, `time`) VALUES
('lala', 'Logged in', 1, '2021-20-05', '14:34:23'),
('lala', 'Logged in', 1, '2021-20-05', '16:33:37'),
('benali', 'Logged in', 1, '2021-20-05', '17:30:05'),
('benali', 'Logged in', 1, '2021-20-05', '20:48:42'),
('benali', 'Logged in', 1, '2021-20-05', '21:24:29'),
('benali', 'Logged in', 1, '2021-20-05', '21:28:25'),
('benali', 'Logged in', 1, '2021-20-05', '21:40:56'),
('benali', 'Logged in', 1, '2021-20-05', '22:53:05'),
('benali', 'Logged in', 1, '2021-20-05', '23:40:42'),
('benali', 'Logged in', 1, '2021-20-05', '23:43:53'),
('benali', 'Logged in', 1, '2021-20-05', '23:44:37'),
('benali', 'Logged in', 1, '2021-20-05', '23:45:29'),
('benali', 'Logged in', 1, '2021-20-05', '23:46:23'),
('benali', 'Logged in', 1, '2021-20-05', '23:47:19'),
('benali', 'Logged in', 1, '2021-20-05', '23:47:44'),
('benali', 'Logged in', 1, '2021-20-05', '23:47:54'),
('benali', 'Logged in', 1, '2021-20-05', '23:48:03'),
('benali', 'Logged in', 1, '2021-20-05', '23:49:16'),
('benali', 'Logged in', 1, '2021-20-05', '23:52:44'),
('benali', 'Logged in', 1, '2021-20-05', '23:53:25'),
('lola', 'Logged in', 1, '2021-20-05', '23:58:56'),
('benali', 'Logged in', 1, '2021-21-05', '00:02:53'),
('benali', 'Logged in', 1, '2021-21-05', '00:12:51'),
('benali', 'Logged in', 1, '2021-21-05', '00:14:51'),
('benali', 'Logged in', 1, '2021-21-05', '00:15:17'),
('benali', 'Logged in', 1, '2021-21-05', '00:27:37'),
('benali', 'Logged in', 1, '2021-21-05', '00:28:08'),
('benali', 'Logged in', 1, '2021-21-05', '00:28:32'),
('benali', 'Logged in', 1, '2021-21-05', '00:29:11'),
('benali', 'Logged in', 1, '2021-21-05', '00:30:03'),
('benali', 'Logged in', 1, '2021-21-05', '00:30:51'),
('benali', 'Logged in', 1, '2021-21-05', '00:33:22'),
('benali', 'Logged in', 1, '2021-21-05', '00:35:54'),
('benali', 'Logged in', 1, '2021-21-05', '00:41:37'),
('benali', 'Logged in', 1, '2021-21-05', '00:42:07'),
('benali', 'Logged in', 1, '2021-21-05', '00:42:18'),
('benali', 'Logged in', 1, '2021-21-05', '00:43:03'),
('benali', 'Logged in', 1, '2021-21-05', '00:45:19'),
('benali', 'Logged in', 1, '2021-21-05', '00:45:36'),
('benali', 'Logged in', 1, '2021-21-05', '00:46:08'),
('benali', 'Logged in', 1, '2021-21-05', '00:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(5, 'batataa'),
(6, 'sel9'),
(4, 'tomate');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `name`, `content`) VALUES
(6, 'fghgfh', 'gggg');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `num_tel` int(8) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`id`, `nom`, `prenom`, `num_tel`, `adresse`) VALUES
(28, 'aloui', 'wassimm', 95623144, 'tabarka'),
(29, 'bensalah', 'mohamedd', 55621478, 'tunis'),
(30, 'benjema', 'omar', 56321047, 'ariana'),
(33, 'mohamed', 'amine', 98541263, 'benarous');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `produit` varchar(50) NOT NULL,
  `images` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `produit`, `images`, `quantite`, `prix`) VALUES
(2, 'Hamburger', 'image/burger.jpg', 30, 15000),
(3, 'Pasta', 'image/pasta.jpg', 33, 20000),
(4, 'Couscous', 'image/couscous.jpg', 20, 25000),
(5, 'Sprite', 'image/sprite.jpg', 20, 5000),
(6, 'Pizza', 'image/pizza.jpg', 8, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `nv_prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `id_produit`, `pourcentage`, `nv_prix`) VALUES
(4, 58, 88, 44),
(6, 7774, 14, 41),
(7, 65, 14, 144),
(8, 89, 18, 3556),
(9, 14, 65, 64);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `ing_id` int(11) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `ins_id`, `ing_id`, `quantity`) VALUES
(12, 6, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

CREATE TABLE `sujet` (
  `ID` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `commentaire` varchar(50) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `ID` int(11) NOT NULL,
  `utilisateur` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`ID`, `utilisateur`, `titre`, `contenu`, `date`) VALUES
(29, 'gzezgzgz', 'new', '', '2021-04-29'),
(33, 'unknown', 'aa', 'aaa', '2021-04-30'),
(35, 'Foobar', 'Fizzbuzz', 'testing', '2021-04-30'),
(36, 'testing', 'rerer', 'rerr', '2021-05-06'),
(37, 'testing', 'rerer', 'rerr', '2021-05-06'),
(38, 'daha', 'dhdhd', 'dhdh', '2021-05-07'),
(39, 'slouma', 'test1', 'welyeee', '2021-05-07'),
(40, 'slouma', 'test2', 'welyteee', '2021-05-07'),
(42, 'slouma', 'hello', 'world', '2021-05-07'),
(43, 'jid', 'jdidddd', 'ddd', '2021-05-07'),
(60, 'ajout', 'test', 'test', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `ID` int(20) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`ID`, `utilisateur`, `titre`, `contenu`, `date`) VALUES
(1, 'GG', 'GGG', 'GGGG', '0000-00-00'),
(2, 'GRGR', 'GR', 'GRG', '0000-00-00'),
(3, 'GG', 'GGG', 'GGGG', '0000-00-00'),
(6, 'GRGR', 'GR', 'GRG', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `types` varchar(50) CHARACTER SET latin1 NOT NULL,
  `images` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `nom`, `types`, `images`) VALUES
(2, 'fs', 'Pate', '2.jpg'),
(4, 'lll', 'Pate', '3.jpg'),
(5, 'lll', 'Salade', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(8) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `username`, `password`, `state`, `phone_number`, `is_admin`, `is_banned`) VALUES
('aa', 'aa', 'aaaa@gmail.com', 'aaaa', '$2y$10$fPCX7UPkOVyFwseSs/ezV.9.TXD4kjjIITwX0XlD9LC43Cyo98c2G', 'Tunis', 12345678, 0, 1),
('Aziz', 'Ben Ali', 'ba.tahaaziz@gmail.com', 'benali', '$2y$10$gXuBkzY4FSdFER1HOru.UepUTIV2I2eklh0IjaHRmkfdMWmyGoVqe', 'Tunis', 12345678, 1, 0),
('Taha Aziz', 'Ben Ali', 'ba@gmail.com', 'la', '$2y$10$DZ/EPI2.EprFJYD5ZdPlUuDZzz7pWaWJejLiZd4z1GgeFZjp8wQEu', 'Tunis', 12345678, 0, 0),
('lala', 'lalal', 'lala@gma.com', 'lala', '$2y$10$Pdx4Vh6qDGZUQR7S8EBF/OBn2MO5FFnak7KnpM9eqWGsRonHzS5ru', 'Tunis', 12345678, 0, 0),
('lol', 'lol', 'ba.tahaziz@g.com', 'lola', '$2y$10$BdOvlt/w0DZhIY2pDnFYxOvju3R2V3JQxi1V5Sm4ten1AH0LFDlpq', 'Tunis', 12345678, 0, 0),
('Dossiera', 'Vide', 'test@gmail.com', 'test', '$2y$10$HUw2UmE.Dw.9x3VqH6s0D.Hfo61BgShRc3BuJvjVHh1X1izUs8j0i', 'Tunis', 90123456, 0, 0),
('a a a a', 'lol ooo oll ooo', 'ba.taha@gmail.a', 'zaheaz', '$2y$10$w61Kuwimqg2of2L5kwTEFeVsjBAUUpl2Rha3uxypJ/gtpRtwpWAwi', 'Tunis', 12345678, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ins_id` (`ins_id`),
  ADD KEY `ing_id` (`ing_id`);

--
-- Indexes for table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
