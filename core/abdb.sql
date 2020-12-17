-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 29, 2020 at 09:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ab_achats`
--

CREATE TABLE `ab_achats` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_achat` int(11) NOT NULL,
  `pau` double NOT NULL,
  `pat` double NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_achats`
--

INSERT INTO `ab_achats` (`id`, `product_id`, `quantity_achat`, `pau`, `pat`, `added_by`, `c_date`) VALUES
(1, 1, 8, 90, 720, 1, '2020-02-27 07:11:36'),
(2, 2, 3, 400, 1200, 1, '2020-02-27 07:37:55'),
(3, 3, 50, 700, 35000, 8, '2020-02-29 18:14:52'),
(4, 4, 6, 100, 600, 8, '2020-02-29 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `ab_products`
--

CREATE TABLE `ab_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `unity` varchar(256) NOT NULL,
  `quantity` double NOT NULL,
  `pau` double NOT NULL,
  `pat` double NOT NULL,
  `pvu_min` double NOT NULL,
  `pvu_max` double NOT NULL,
  `stock_no` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_products`
--

INSERT INTO `ab_products` (`id`, `category_id`, `name`, `model`, `unity`, `quantity`, `pau`, `pat`, `pvu_min`, `pvu_max`, `stock_no`, `status`, `added_by`, `c_date`) VALUES
(1, 2, 'Panneau Scolaire', 'SOLAR', 'Piece', 1, 90, 720, 95, 0, '1', 1, 1, '2020-02-27 07:11:36'),
(2, 2, 'Amplificateur', 'SOLAR', 'Piece', 0, 400, 1200, 450, 0, '2', 0, 1, '2020-02-27 07:37:55'),
(3, 2, 'Panneau Scolaire', 'SOLAR 50V', 'Piece', 0, 700, 35000, 800, 0, 'Boutique-2', 0, 8, '2020-02-29 18:14:52'),
(4, 2, 'Telephone', 'Techo F1', 'Piece', 1, 100, 600, 150, 200, 'Boutique-2', 1, 8, '2020-02-29 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `ab_product_category`
--

CREATE TABLE `ab_product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_product_category`
--

INSERT INTO `ab_product_category` (`id`, `name`, `added_by`, `c_date`) VALUES
(1, 'Couture', 1, '2020-02-27 00:44:44'),
(2, 'Electricite', 1, '2020-02-27 00:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `ab_users`
--

CREATE TABLE `ab_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `profile` varchar(256) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_users`
--

INSERT INTO `ab_users` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `category_id`, `password`, `added_by`, `status`, `profile`, `c_date`) VALUES
(1, 'Gedeaon', 'Tsokalo', 'gedeon@gmail.com', '07856756478', 'Gisozi/Kigali', 1, '1234', 1, 1, 'u,png', '2020-02-26 22:49:00'),
(2, 'Ezechiel', 'Ezpk', 'ezpk@gmail.com', '07875767876', 'Gisozi/Kibanza', 1, 'mxMJ9ASC', 1, 1, 'images/user.png', '2020-02-27 05:31:06'),
(4, 'Ezechiel', 'Kalengya', '', '07875767876', 'Gisozi/Kibanza', 2, 'hlNOuI-X', 1, 1, 'images/user.png', '2020-02-27 06:33:17'),
(6, 'Arnold', 'Kasoki', '', '+250784700764', 'Gisozi/Kibanza', 2, '0KO23[{h', 1, 1, 'images/user.png', '2020-02-27 06:36:16'),
(7, 'Arnold', 'Kasoki', 'afrodis@gmail.com', '0786565652', 'Gisozi/Kigali', 3, 's2w]@+DV', 1, 1, 'images/user.png', '2020-02-27 06:36:51'),
(8, 'kabutu', 'Kali', 'kabutu@gmail.com', '0786618405', 'Goma/RDC', 1, 'kabutu@2020', 1, 1, 'images/user.png', '2020-02-29 17:31:04'),
(9, 'Jeremie', 'ramazani', 'jeeremie@gmail.com', '0786618405', 'Goma/RDC', 3, 'Jeremie@2020', 8, 1, 'images/user.png', '2020-02-29 17:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `ab_user_category`
--

CREATE TABLE `ab_user_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_user_category`
--

INSERT INTO `ab_user_category` (`id`, `name`, `added_by`, `c_date`) VALUES
(1, 'Administrateur', 1, '2020-02-29 10:00:00'),
(2, 'Gerant', 1, '2020-02-29 10:00:00'),
(3, 'Employe', 1, '2020-02-29 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ab_ventes`
--

CREATE TABLE `ab_ventes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_vente` double NOT NULL,
  `pvu` double NOT NULL,
  `pvt` double NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_ventes`
--

INSERT INTO `ab_ventes` (`id`, `product_id`, `quantity_vente`, `pvu`, `pvt`, `added_by`, `c_date`) VALUES
(1, 4, 2, 200, 400, 8, '2020-02-29 20:22:56'),
(2, 4, 3, 200, 600, 8, '2020-02-29 20:28:47'),
(3, 2, 3, 450, 1350, 8, '2020-02-29 20:29:13'),
(4, 1, 2, 95, 190, 8, '2020-02-29 21:20:51'),
(5, 1, 3, 95, 285, 8, '2020-02-29 21:21:54'),
(6, 1, 2, 95, 190, 8, '2020-02-29 21:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ab_achats`
--
ALTER TABLE `ab_achats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_products`
--
ALTER TABLE `ab_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_product_category`
--
ALTER TABLE `ab_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_users`
--
ALTER TABLE `ab_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_user_category`
--
ALTER TABLE `ab_user_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ab_ventes`
--
ALTER TABLE `ab_ventes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ab_achats`
--
ALTER TABLE `ab_achats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ab_products`
--
ALTER TABLE `ab_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ab_product_category`
--
ALTER TABLE `ab_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_users`
--
ALTER TABLE `ab_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ab_user_category`
--
ALTER TABLE `ab_user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ab_ventes`
--
ALTER TABLE `ab_ventes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
