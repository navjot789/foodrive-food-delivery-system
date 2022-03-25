-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2022 at 07:28 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u957918675_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `aid` int(11) NOT NULL,
  `id` int(11) NOT NULL COMMENT 'menuid',
  `addon_name` varchar(100) DEFAULT NULL,
  `addon_price` float DEFAULT NULL COMMENT 'null price or 0 will make an addon free of charge	',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:Basic|1:Static',
  `soft_delete` int(11) NOT NULL DEFAULT 0,
  `cdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`aid`, `id`, `addon_name`, `addon_price`, `status`, `soft_delete`, `cdate`) VALUES
(89, 163, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(90, 164, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(101, 162, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(103, 165, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(104, 166, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(105, 167, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(106, 168, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(107, 169, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(108, 170, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(109, 171, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(110, 172, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(111, 173, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(112, 174, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(113, 175, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(115, 176, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(116, 177, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(117, 178, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(118, 179, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(119, 180, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(120, 181, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(121, 182, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(122, 183, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(123, 184, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(124, 185, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(125, 186, 'Bottle Deposit', 0.1, 1, 0, '1625122800'),
(126, 187, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(127, 188, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(128, 189, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(129, 190, 'Bottle Deposit', 0.4, 1, 0, '1625209200'),
(130, 191, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(131, 192, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(132, 193, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(133, 194, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(134, 195, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(135, 196, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(136, 197, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(137, 198, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(138, 199, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(139, 200, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(140, 201, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(141, 202, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(142, 203, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(143, 204, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(144, 205, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(145, 206, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(146, 207, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(147, 208, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(148, 209, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(149, 210, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(150, 211, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(151, 212, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(152, 213, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(153, 214, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(154, 215, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(155, 216, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(156, 217, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(157, 220, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(158, 221, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(159, 222, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(160, 223, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(161, 224, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(162, 225, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(163, 226, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(164, 227, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(165, 228, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(166, 229, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(167, 230, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(168, 231, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(169, 232, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(170, 233, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(171, 234, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(172, 235, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(173, 236, 'Bottle Deposit', 2.4, 1, 0, '1625209200'),
(174, 238, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(175, 239, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(176, 240, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(177, 241, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(178, 242, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(179, 243, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(180, 244, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(181, 245, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(182, 246, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(183, 247, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(184, 248, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(185, 249, 'Bottle Deposit', 0.1, 1, 0, '1625209200'),
(186, 250, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(187, 251, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(188, 252, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(189, 253, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(190, 254, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(191, 255, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(192, 256, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(193, 257, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(194, 258, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(195, 259, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(196, 260, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(197, 261, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(198, 262, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(199, 263, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(200, 264, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(201, 265, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(202, 266, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(203, 267, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(204, 268, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(205, 269, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(206, 270, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(207, 271, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(208, 272, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(209, 273, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(210, 274, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(211, 275, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(212, 276, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(213, 277, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(214, 278, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(215, 279, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(216, 282, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(217, 283, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(223, 289, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(224, 290, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(225, 291, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(226, 292, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(227, 293, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(228, 294, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(229, 295, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(233, 299, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(234, 300, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(235, 301, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(236, 302, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(237, 303, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(238, 309, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(239, 310, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(240, 311, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(241, 312, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(242, 313, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(243, 314, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(244, 315, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(245, 316, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(246, 317, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(247, 318, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(248, 319, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(249, 320, 'Bottle Deposit', 0.1, 1, 0, '1625295600'),
(250, 430, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(251, 431, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(252, 432, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(253, 433, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(254, 434, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(255, 435, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(256, 436, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(257, 437, 'Bottle Deposit', 0.25, 1, 0, '1625295600'),
(264, 435, 'Testing', 0, 0, 0, '1625382000'),
(265, 509, 'dep', 0.2, 1, 0, '1625468400'),
(291, 518, 'test case', 1.12, 0, 0, NULL),
(292, 517, 'cheese', 2, 0, 0, NULL),
(293, 517, 'Poping', 2.33, 0, 0, NULL),
(294, 517, 'Mitva', 2.33, 0, 0, NULL),
(299, 519, 'Bottle Pop', 0.12, 1, 0, NULL),
(300, 519, 'game of throne', 1.22, 1, 0, NULL),
(301, 521, 'aff', 0.12, 0, 0, NULL),
(302, 521, 'mkl', 0.22, 0, 0, NULL),
(303, 523, 'mama', 1, 0, 0, NULL),
(304, 523, 'maily', 2, 1, 0, NULL),
(305, 523, 'fudi marlo', 1.66, 0, 0, NULL),
(306, 532, '1 Sugar', 0, 0, 0, NULL),
(307, 532, '2 Sugar', 0, 0, 0, NULL),
(308, 532, '3 Sugar', 0, 0, 0, NULL),
(309, 532, '1 Milk', 0, 0, 0, NULL),
(310, 532, '2 Milk', 0, 0, 0, NULL),
(311, 532, '3 Milk', 0, 0, 0, NULL),
(312, 30, 'With Taters', 3, 0, 0, NULL),
(313, 33, 'With Taters', 1.5, 0, 0, NULL),
(314, 35, 'With Taters', 1.5, 0, 0, NULL),
(315, 540, 'Basmati Rice', 0, 1, 0, NULL),
(316, 541, 'Basmati Rice', 0, 1, 0, NULL),
(322, 604, 'Bacon', 1.5, 0, 0, NULL),
(323, 604, 'Cheese', 1, 0, 0, NULL),
(324, 604, 'Mushroom', 1.5, 0, 0, NULL),
(325, 604, 'Fried Onions', 1, 0, 0, NULL),
(326, 605, 'Cheese', 1, 0, 0, NULL),
(327, 605, 'Bacon', 1.5, 0, 0, NULL),
(328, 605, 'Mushroom', 1.5, 0, 0, NULL),
(329, 605, 'Fried Onions', 1, 0, 0, NULL),
(330, 606, 'Cheese', 1, 0, 0, NULL),
(331, 606, 'Bacon', 1.5, 0, 0, NULL),
(332, 606, 'Mushroom', 1.5, 0, 0, NULL),
(333, 606, 'Fried Onions', 1, 0, 0, NULL),
(334, 607, 'Cheese', 1, 0, 0, NULL),
(335, 607, 'Bacon', 1.5, 0, 0, NULL),
(336, 607, 'Mushroom', 1.5, 0, 0, NULL),
(337, 607, 'Fried Onions', 1, 0, 0, NULL),
(338, 608, 'Extra Cheese', 1, 0, 0, NULL),
(339, 608, 'Bacon', 1.5, 0, 0, NULL),
(340, 608, 'Mushroom', 1.5, 0, 0, NULL),
(341, 608, 'Fried Onions', 1, 0, 0, NULL),
(342, 609, 'Cheese', 1, 0, 0, NULL),
(343, 609, 'Bacon', 1.5, 0, 0, NULL),
(344, 609, 'Mushroom', 1.5, 0, 0, NULL),
(345, 609, 'Fried Onions', 1, 0, 0, NULL),
(346, 610, 'Extra Cheese', 1, 0, 0, NULL),
(347, 610, 'Bacon', 1.5, 0, 0, NULL),
(348, 610, 'Mushroom', 1.5, 0, 0, NULL),
(349, 610, 'Fried Onions', 1, 0, 0, NULL),
(350, 611, 'Extra Cheese', 1, 0, 0, NULL),
(351, 611, 'Bacon', 1.5, 0, 0, NULL),
(352, 611, 'Mushroom', 1.5, 0, 0, NULL),
(353, 611, 'Fried Onions', 1, 0, 0, NULL),
(354, 612, 'Extra Cheese', 1, 0, 0, NULL),
(355, 612, 'Bacon', 1.5, 0, 0, NULL),
(356, 612, 'Mushroom', 1.5, 0, 0, NULL),
(357, 612, 'Fried Onions', 1, 0, 0, NULL),
(358, 613, 'Cheese', 1, 0, 0, NULL),
(359, 613, 'Bacon', 1.5, 0, 0, NULL),
(360, 613, 'Mushroom', 1.5, 0, 0, NULL),
(361, 613, 'Fried Onions', 1, 0, 0, NULL),
(362, 639, 'Cheddar Cheese', 0, 0, 0, NULL),
(363, 639, 'Lettuce', 0, 0, 0, NULL),
(364, 639, 'Tomato', 0, 0, 0, NULL),
(365, 653, 'Two Chicken Strips', 4, 0, 0, NULL),
(366, 653, 'Shrimp', 5, 0, 0, NULL),
(367, 653, 'Grilled Chicken Breast', 5, 0, 0, NULL),
(368, 686, 'Chipotle Dip', 1, 0, 0, NULL),
(369, 747, 'Test', 1, 0, 0, NULL),
(370, 747, 'Static', 2, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addons` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_details`
--

CREATE TABLE `commission_details` (
  `id` int(11) NOT NULL,
  `order_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `total_bill` float NOT NULL,
  `admin_commission` float NOT NULL,
  `owner_commission` float NOT NULL,
  `payable_tax` float NOT NULL COMMENT 'GST',
  `payable_pst` float NOT NULL COMMENT 'PST',
  `placed_at` int(11) DEFAULT NULL COMMENT 'Placed at',
  `date_added` int(11) DEFAULT NULL COMMENT 'Delivered at',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:GET-PAID|1:ISSUE-REFUNDED',
  `s_id` int(11) NOT NULL DEFAULT 0,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `created_by` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `slug`, `thumbnail`, `created_by`, `is_featured`, `created_at`, `updated_at`) VALUES
(4, 'convenience store', 'convenience-store', 'wJeLSondagDYfKNH0Fu5.jpg', 1, 1, 1612031400, 1619807400),
(5, 'Asian and Indian Cuisine', 'asian-and-indian-cuisine', 'placeholder.png', 1, 0, 1639209600, 1639209600),
(6, 'Chinese', 'chinese', 'placeholder.png', 1, 0, 1641196800, NULL),
(7, 'Vietnamese', 'vietnamese', 'placeholder.png', 1, 0, 1641196800, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', 'Rs', 1, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 1, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `street_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_1` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordinate_1` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordinate_2` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_3` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `coordinate_3` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `street_no`, `street_name`, `city`, `address_1`, `coordinate_1`, `address_2`, `coordinate_2`, `address_3`, `coordinate_3`) VALUES
(12, 11, '901', '6 Avenue East', 'Prince Rupert', '901 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"54.3207405\",\"longitude\":\"-130.3057249\"}', '', '{\"latitude\":\"\",\"longitude\":\"\"}', '', '{\"latitude\":\"\",\"longitude\":\"\"}'),
(90, 96, '333', 'Albert Avenue', 'Prince Rupert', '333 Albert Ave, Prince Rupert, BC V8J 2W2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(97, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 107, '1665', 'Park Avenue', 'Prince Rupert', '1665 Park Ave, Prince Rupert, BC V8J 3Y7, Canada', '{\"latitude\":\"54.301118\",\"longitude\":\"-130.338777\"}', NULL, NULL, NULL, NULL),
(102, 108, '1600', 'Park Avenue', 'Prince Rupert', '1600 Park Ave, Prince Rupert, BC V8J 4P7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(103, 109, '901', '6 Avenue East', 'Prince Rupert', '901 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(104, 110, '1055', '6 Avenue East', 'Prince Rupert', '1055 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"54.3224412\",\"longitude\":\"-130.3031911\"}', NULL, NULL, NULL, NULL),
(105, 111, '1723', '2 Avenue West', 'Prince Rupert', '1723 2 Ave W, Prince Rupert, BC V8J 1J5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(106, 112, '500', '7 Avenue West', 'Prince Rupert', '500 7 Ave W, Prince Rupert, BC V8J 2L8, Canada', '{\"latitude\":\"54.3095787\",\"longitude\":\"-130.322274\"}', NULL, NULL, NULL, NULL),
(107, 113, '959', '6 Avenue East', 'Prince Rupert', '959 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(108, 114, '9355', '140 Street', 'Surrey', '9355 140 St, Surrey, BC V3V 5Z3, Canada', '{\"latitude\":\"49.1728244\",\"longitude\":\"-122.8349553\"}', NULL, NULL, NULL, NULL),
(109, 115, '1818', '6 Avenue East', 'Prince Rupert', '1818 6 Ave E, Prince Rupert, BC V8J 1Y6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(110, 116, '1014', '2 Avenue West', 'Prince Rupert', '1014 2 Ave W, Prince Rupert, BC V8J 1J1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(112, 118, '537', '7 Avenue West', 'Prince Rupert', '537 7 Ave W, Prince Rupert, BC V8J 2L9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(115, 121, '637', 'Drake Crescent', 'Prince Rupert', '637 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"54.3126349\",\"longitude\":\"-130.3012563\"}', NULL, NULL, NULL, NULL),
(116, 122, '629', '8 Avenue West', 'Prince Rupert', '629 8 Ave W, Prince Rupert, BC V8J 2R3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(117, 123, '697', 'Drake Crescent', 'Prince Rupert', '697 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(118, 124, '1734', 'India Avenue', 'Prince Rupert', '1734 India Ave, Prince Rupert, BC V8J 2Y3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(119, 125, '432', 'Bowser Street', 'Prince Rupert', '432 Bowser St, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(120, 126, '559', 'Pillsbury Avenue', 'Prince Rupert', '559 Pillsbury Ave, Prince Rupert, BC V8J 4A2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(121, 127, '1624', '2 Avenue West', 'Prince Rupert', '1624 2 Ave W, Prince Rupert, BC V8J 1J6, Canada', '{\"latitude\":\"54.3030832\",\"longitude\":\"-130.3431173\"}', NULL, NULL, NULL, NULL),
(122, 128, '2191', 'Seal Cove Road', 'Prince Rupert', '2191 Seal Cove Rd, Prince Rupert, BC V8J 2K8, Canada', '{\"latitude\":\"54.33025310000001\",\"longitude\":\"-130.2879755\"}', NULL, NULL, NULL, NULL),
(123, 129, '643', 'Ritchie Street', 'Prince Rupert', '643 Ritchie St, Prince Rupert, BC V8J 3S9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(126, 132, '2100', 'Seal Cove Circle', 'Prince Rupert', '2100 Seal Cove Cir, Prince Rupert, BC V8J 2G3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(127, 133, '1822', '2 Avenue West', 'Prince Rupert', '1822 2 Ave W, Prince Rupert, BC V8J 1J7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(128, 134, '880', 'Prince Rupert Boulevard', 'Prince Rupert', '880 Prince Rupert Blvd, Prince Rupert, BC V8J 4H5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(129, 135, '1500', 'Hudson Bay Mountain Road', 'Smithers', '1500 Hudson Bay Mountain Rd, Smithers, BC V0J 2N4, Canada', '{\"latitude\":\"54.755916\",\"longitude\":\"-127.1631432\"}', NULL, NULL, NULL, NULL),
(130, 136, '85', 'Hays Vale Drive', 'Prince Rupert', '85 Hays Vale Dr, Prince Rupert, BC V8J 3Z1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(131, 137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 138, '415', '6 Avenue West', 'Prince Rupert', '415 6 Ave W, Prince Rupert, BC V8J 1Z5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(133, 139, '240', 'Sherbrooke Avenue', 'Prince Rupert', '240 Sherbrooke Ave, Prince Rupert, BC V8J 2V7, Canada', '{\"latitude\":\"54.311707\",\"longitude\":\"-130.310324\"}', NULL, NULL, NULL, NULL),
(134, 140, '1502', '8 Avenue East', 'Prince Rupert', '1502 8 Ave E, Prince Rupert, BC V8J 2P1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(135, 141, '119', 'Gull Crescent', 'Prince Rupert', '119 Gull Crescent, Prince Rupert, BC V8J 4G4, Canada', '{\"latitude\":\"54.3099168\",\"longitude\":\"-130.3054689\"}', NULL, NULL, NULL, NULL),
(136, 142, '1227', 'Hays Cove Avenue', 'Prince Rupert', '1227 Hays Cove Ave, Prince Rupert, BC V8J 2R4, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(137, 143, '641', 'Ritchie Street', 'Prince Rupert', '641 Ritchie St, Prince Rupert, BC V8J 3S9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(138, 144, '1140', 'Prince Rupert Boulevard', 'Prince Rupert', '1140 Prince Rupert Blvd, Prince Rupert, BC V8J 2Y9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(140, 146, '1640', '10 Avenue East', 'Prince Rupert', '1640 10 Ave E, Prince Rupert, BC V8J 2V3, Canada', '{\"latitude\":\"54.3239741\",\"longitude\":\"-130.2915324\"}', NULL, NULL, NULL, NULL),
(141, 147, '529', '7 Avenue West', 'Prince Rupert', '529 7 Ave W, Prince Rupert, BC V8J 2L9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(142, 148, '500', 'Evergreen Drive', 'Prince Rupert', '500 Evergreen Dr, Prince Rupert, BC V8J 2Z9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(143, 149, '426', '3 Avenue West', 'Prince Rupert', '426 3 Ave W, Prince Rupert, BC V8J 1L7, Canada', '{\"latitude\":\"54.31258159999999\",\"longitude\":\"-130.325442\"}', NULL, NULL, NULL, NULL),
(144, 150, '1741', 'Kootenay Avenue', 'Prince Rupert', '1741 Kootenay Ave, Prince Rupert, BC V8J 4A3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(145, 151, '140', '5th Avenue East', 'Prince Rupert', '140 5th Ave E, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(146, 152, '648', 'Fulton Street', 'Prince Rupert', '648 Fulton St #1, Prince Rupert, BC V8J 3L1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(147, 153, '671', 'McKay Street', 'Prince Rupert', '671 McKay St, Prince Rupert, BC V8J 3X6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(148, 154, '85', 'Hays Vale Drive', 'Prince Rupert', '85 Hays Vale Dr, Prince Rupert, BC V8J 3Z1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(149, 155, '1431', 'Pigott Avenue', 'Prince Rupert', '1431 Pigott Ave, Prince Rupert, BC V8J 2E2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(150, 156, '415', '6 Avenue West', 'Prince Rupert', '415 6 Ave W, Prince Rupert, BC V8J 1Z5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(151, 157, '317', 'Crestview Drive', 'Prince Rupert', '317 Crestview Dr, Prince Rupert, BC V8J 2Z6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(152, 158, '434', 'McBride Street', 'Prince Rupert', '434 McBride St, Prince Rupert, BC V8J 3G2, Canada', '{\"latitude\":\"54.3138871\",\"longitude\":\"-130.3194937\"}', NULL, NULL, NULL, NULL),
(153, 159, '697', 'Drake Crescent', 'Prince Rupert', '697 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(154, 160, '1722', '10 Avenue East', 'Prince Rupert', '1722 10 Ave E, Prince Rupert, BC V8J 2X5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(155, 161, '1741', 'Kootenay Avenue', 'Prince Rupert', '1741 Kootenay Ave, Prince Rupert, BC V8J 4A3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(156, 162, '500', 'Evergreen Drive', 'Prince Rupert', '500 Evergreen Dr, Prince Rupert, BC V8J 2Z9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(157, 163, '1421', 'Omineca Avenue', 'Prince Rupert', '1421 Omineca Ave, Prince Rupert, BC V8J 2B9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(158, 164, '1034', '3 Avenue West', 'Prince Rupert', '1034 3 Ave W, Prince Rupert, BC V8J 1N1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(159, 165, '1246', 'Hays Cove Avenue', 'Prince Rupert', '1246 Hays Cove Ave, Prince Rupert, BC V8J 2H2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(160, 166, '1246', 'Hays Cove Avenue', 'Prince Rupert', '1246 Hays Cove Ave, Prince Rupert, BC V8J 2H2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(161, 167, '900', '3 Avenue West', 'Prince Rupert', '900 3 Ave W, Prince Rupert, BC V8J 1M8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(162, 168, '610', 'Evergreen Drive', 'Prince Rupert', '610 Evergreen Dr, Prince Rupert, BC V8J 3A1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(168, 174, '434', 'McBride Street', 'Prince Rupert', '434 McBride St, Prince Rupert, BC V8J 3G2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(169, 175, '641', 'Ritchie Street', 'Prince Rupert', '641 Ritchie St, Prince Rupert, BC V8J 3S9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(171, 177, '1656', '10 Avenue East', 'Prince Rupert', '1656 10 Ave E, Prince Rupert, BC V8J 2V3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(172, 178, '1871', 'Sloan Avenue', 'Prince Rupert', '1871 Sloan Ave, Prince Rupert, BC V8J 4B4, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(173, 179, '1827', '7th Avenue East', 'Prince Rupert', '1827 7th Ave E, Prince Rupert, BC V8J 2K6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(174, 180, '1362', 'Summit Avenue', 'Prince Rupert', '1362 Summit Ave, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(176, 182, '1741', 'Kootenay Avenue', 'Prince Rupert', '1741 Kootenay Ave, Prince Rupert, BC V8J 4A3, Canada', '{\"latitude\":\"54.298527\",\"longitude\":\"-130.339876\"}', NULL, NULL, NULL, NULL),
(177, 183, '880', 'Prince Rupert Boulevard', 'Prince Rupert', '880 Prince Rupert Blvd, Prince Rupert, BC V8J 4H5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(178, 184, '1031', '3 Avenue West', 'Prince Rupert', '1031 3 Ave W, Prince Rupert, BC V8J 1M9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(179, 185, '1003', '2 Avenue West', 'Prince Rupert', '1003 2 Ave W, Prince Rupert, BC V8J 1H9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(180, 186, '1723', '2 Avenue West', 'Prince Rupert', '1723 2 Ave W, Prince Rupert, BC V8J 1J5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(181, 187, '333', '9 Avenue West', 'Prince Rupert', '333 9 Ave W, Prince Rupert, BC V8J 2S6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(182, 188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 189, '412', '9 Avenue West', 'Prince Rupert', '412 9 Ave W, Prince Rupert, BC V8J 2S8, Canada', '{\"latitude\":\"54.3092573\",\"longitude\":\"-130.318765\"}', NULL, NULL, NULL, NULL),
(184, 190, '1829', '10 Avenue East', 'Prince Rupert', '1829 10 Ave E, Prince Rupert, BC V8J 2X6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(185, 191, '1545', '6 Avenue East', 'Prince Rupert', '1545 6 Ave E, Prince Rupert, BC V8J 1Y3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(186, 192, '1339', 'Hays Cove Avenue', 'Prince Rupert', '1339 Hays Cove Ave, Prince Rupert, BC V8J 2H3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(187, 193, '1279', 'Omineca Avenue', 'Prince Rupert', '1279 Omineca Ave, Prince Rupert, BC V8J 2B9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(188, 194, '1414', 'Omineca Avenue', 'Prince Rupert', '1414 Omineca Ave, Prince Rupert, BC V8J 3T5, Canada', '{\"latitude\":\"54.3022613\",\"longitude\":\"-130.3312944\"}', NULL, NULL, NULL, NULL),
(189, 195, '1337', 'Overlook Street', 'Prince Rupert', '1337 Overlook St, Prince Rupert, BC V8J 2C7, Canada', '{\"latitude\":\"54.3253476\",\"longitude\":\"-130.3023399\"}', NULL, NULL, NULL, NULL),
(190, 196, '842', '6 Avenue West', 'Prince Rupert', '842 6 Ave W, Prince Rupert, BC V8J 2A1, Canada', '{\"latitude\":\"54.3085607\",\"longitude\":\"-130.3259771\"}', NULL, NULL, NULL, NULL),
(192, 198, '1129', '8 Avenue East', 'Prince Rupert', '1129 8 Ave E, Prince Rupert, BC V8J 2N8, Canada', '{\"latitude\":\"54.3219559\",\"longitude\":\"-130.3000045\"}', NULL, NULL, NULL, NULL),
(193, 199, '1325', 'Summit Avenue', 'Prince Rupert', '1325 Summit Ave, Prince Rupert, BC V8J 4C1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(194, 200, '523', '6 Avenue West', 'Prince Rupert', '523 6 Ave W, Prince Rupert, BC V8J 1Z7, Canada', '{\"latitude\":\"54.3100253\",\"longitude\":\"-130.3226963\"}', NULL, NULL, NULL, NULL),
(195, 201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 202, '629', '8 Avenue West', 'Prince Rupert', '629 8 Ave W, Prince Rupert, BC V8J 2R3, Canada', '{\"latitude\":\"54.30802970000001\",\"longitude\":\"-130.3218282\"}', NULL, NULL, NULL, NULL),
(197, 203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 204, '432', 'McBride Street', 'Prince Rupert', '432 McBride St, Prince Rupert, BC V8J 3G2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(199, 205, '603', 'McKay Street', 'Prince Rupert', '603 McKay St, Prince Rupert, BC V8J 3X6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(200, 206, '353', '5 Street', 'Prince Rupert', '353 5 St, Prince Rupert, BC V8J 3L6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(201, 207, '1406', 'Park Avenue', 'Prince Rupert', '1406 Park Ave, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(202, 208, '1528', 'Kay Smith Boulevard', 'Prince Rupert', '1528 Kay Smith Blvd, Prince Rupert, BC V8J 2E8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(203, 209, '1084', '1st Avenue West', 'Prince Rupert', '1084 1st Ave W, Prince Rupert, BC V8J 1A9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(204, 210, '1733', 'Sloan Avenue', 'Prince Rupert', '1733 Sloan Ave, Prince Rupert, BC V8J 2B5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(205, 211, '426', '8 Avenue East', 'Prince Rupert', '426 8 Ave E, Prince Rupert, BC V8J 2M8, Canada', '{\"latitude\":\"54.31450989999999\",\"longitude\":\"-130.3113914\"}', NULL, NULL, NULL, NULL),
(207, 213, '1136', '6 Avenue East', 'Prince Rupert', '1136 6 Ave E, Prince Rupert, BC V8J 1X8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(208, 214, '2076', 'Seal Cove Circle', 'Prince Rupert', '2076 Seal Cove Cir, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(209, 215, '1543', '8 Avenue East', 'Prince Rupert', '1543 8 Ave E, Prince Rupert, BC V8J 2N9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(210, 216, '901', '6 Avenue East', 'Prince Rupert', '901 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"54.3207703\",\"longitude\":\"-130.3057783\"}', NULL, NULL, NULL, NULL),
(211, 217, '1304', 'Omineca Avenue', 'Prince Rupert', '1304 Omineca Ave, Prince Rupert, BC V8J 3T5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(212, 218, '1339', 'Hays Cove Avenue', 'Prince Rupert', '1339 Hays Cove Ave, Prince Rupert, BC V8J 2H3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(213, 219, '426', '9 Avenue West', 'Prince Rupert', '426 9 Ave W, Prince Rupert, BC V8J 2S8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(214, 220, '1136', '6 Avenue East', 'Prince Rupert', '1136 6 Ave E, Prince Rupert, BC V8J 1X8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(217, 223, '2089', 'Seal Cove Circle', 'Prince Rupert', '2089 Seal Cove Cir, Prince Rupert, BC V8J 2G4, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(219, 225, '1356', 'Overlook Street', 'Prince Rupert', '1356 Overlook St, Prince Rupert, BC V8J 2C8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(220, 226, '665', 'Drake Crescent', 'Prince Rupert', '665 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"54.3128126\",\"longitude\":\"-130.3014902\"}', NULL, NULL, NULL, NULL),
(221, 227, '709', 'Drake Crescent', 'Prince Rupert', '709 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(222, 228, '1648', '10 Avenue East', 'Prince Rupert', '1648 10 Ave E, Prince Rupert, BC V8J 2V3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(223, 229, '616', '7 Avenue West', 'Prince Rupert', '616 7 Ave W, Prince Rupert, BC V8J 2M1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(224, 230, '415', '6 Avenue West', 'Prince Rupert', '415 6 Ave W, Prince Rupert, BC V8J 1Z5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(225, 231, '604', '8 Avenue West', 'Prince Rupert', '604 8 Ave W, Prince Rupert, BC V8J 2R2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(226, 232, '501', '6 Avenue East', 'Prince Rupert', '501 6 Ave E, Prince Rupert, BC V8J 1W8, Canada', '{\"latitude\":\"54.3164893\",\"longitude\":\"-130.3132424\"}', NULL, NULL, NULL, NULL),
(227, 233, '1025', '9 Avenue East', 'Prince Rupert', '1025 9 Ave E, Prince Rupert, BC V8J 2S2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(228, 234, '1003', '2 Avenue West', 'Prince Rupert', '1003 2 Ave W, Prince Rupert, BC V8J 1H9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(229, 235, '1421', 'Pigott Place', 'Prince Rupert', '1421 Pigott Pl, Prince Rupert, BC V8J 2E4, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(233, 239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 240, '1344', '11 Avenue East', 'Prince Rupert', '1344 11 Ave E, Prince Rupert, BC V8J 2X1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(235, 241, '1343', 'Seville Road', 'Prince Rupert', '1343 Seville Rd, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"54.322684\",\"longitude\":\"-130.2958849\"}', NULL, NULL, NULL, NULL),
(236, 242, '1320', '8 Avenue East', 'Prince Rupert', '1320 8 Ave E, Prince Rupert, BC V8J 2N7, Canada', '{\"latitude\":\"54.323093\",\"longitude\":\"-130.297318\"}', NULL, NULL, NULL, NULL),
(237, 243, '221', '5 Street', 'Prince Rupert', '221 5 St, Prince Rupert, BC V8J 1L8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(238, 244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 245, '128', '5th Avenue East', 'Prince Rupert', '128 5th Ave E, Prince Rupert, BC V8J 1R5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(241, 246, '521', 'Evergreen Drive', 'Prince Rupert', '521 Evergreen Dr, Prince Rupert, BC V8J 2G4, Canada', '{\"latitude\":\"54.3323879\",\"longitude\":\"-130.2880822\"}', NULL, NULL, NULL, NULL),
(243, 248, '900', '3 Avenue West', 'Prince Rupert', '900 3 Ave W, Prince Rupert, BC V8J 1M8, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(244, 249, '1450', 'Park Avenue', 'Prince Rupert', '1450 Park Ave, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(245, 250, '697', 'Drake Crescent', 'Prince Rupert', '697 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"54.3133718\",\"longitude\":\"-130.3015969\"}', NULL, NULL, NULL, NULL),
(246, 250, '697', 'Drake Crescent', 'Prince Rupert', '697 Drake Crescent, Prince Rupert, BC V8J 4K3, Canada', '{\"latitude\":\"54.3133718\",\"longitude\":\"-130.3015969\"}', NULL, NULL, NULL, NULL),
(247, 251, '1344', '11 Avenue East', 'Prince Rupert', '1344 11 Ave E, Prince Rupert, BC V8J 2X1, Canada', '{\"latitude\":\"54.3213051\",\"longitude\":\"-130.2939646\"}', NULL, NULL, NULL, NULL),
(248, 252, '1016', 'Eagle Drive', 'Prince Rupert', '1016 Eagle Dr, Prince Rupert, BC V8J 4R4, Canada', '{\"latitude\":\"54.31604549999999\",\"longitude\":\"-130.2949199\"}', NULL, NULL, NULL, NULL),
(249, 253, '500', '2 Avenue West', 'Prince Rupert', '500 2 Ave W, Prince Rupert, BC V8J 3T6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(250, 254, '1200', 'Beach Place', 'Prince Rupert', '1200 Beach Pl, Prince Rupert, BC V8J 1C5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(251, 255, '697', 'McKay Street', 'Prince Rupert', '697 McKay St, Prince Rupert, BC V8J 3X6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(252, 256, '1419', '6 Avenue East', 'Prince Rupert', '1419 6 Ave E, Prince Rupert, BC V8J 1Y1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(253, 257, '843', 'Comox Avenue', 'Prince Rupert', '843 Comox Ave, Prince Rupert, BC V8J 2T4, Canada', '{\"latitude\":\"54.305512\",\"longitude\":\"-130.3236283\"}', NULL, NULL, NULL, NULL),
(254, 258, '633', '8 Avenue West', 'Prince Rupert', '633 8 Ave W, Prince Rupert, BC V8J 2R3, Canada', '{\"latitude\":\"54.3079379\",\"longitude\":\"-130.3220549\"}', NULL, NULL, NULL, NULL),
(255, 259, '333', 'Alberta Place', 'Prince Rupert', '333 Alberta Pl, Prince Rupert, BC V8J 3X7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(256, 260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 261, '365', 'Prince Rupert Boulevard', 'Prince Rupert', '365 Prince Rupert Blvd, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(258, 262, '641', 'Fulton Street', 'Prince Rupert', '641 Fulton St, Prince Rupert, BC V8J 3L1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(259, 263, '901', '6 Avenue East', 'Prince Rupert', '901 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(260, 264, '1430', 'Sloan Avenue', 'Prince Rupert', '1430 Sloan Ave, Prince Rupert, BC V8J 2A9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(261, 265, '1741', 'Kootenay Avenue', 'Prince Rupert', '1741 Kootenay Ave, Prince Rupert, BC V8J 4A3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(262, 266, '1856', 'Rushbrook Avenue', 'Prince Rupert', '1856 Rushbrook Ave, Prince Rupert, BC V8J 2G2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(263, 267, '1300', 'Summit Avenue', 'Prince Rupert', '1300 Summit Ave, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"54.3049401\",\"longitude\":\"-130.332339\"}', NULL, NULL, NULL, NULL),
(264, 268, '533', '7 Avenue West', 'Prince Rupert', '533 7 Ave W, Prince Rupert, BC V8J 2L9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(267, 271, '1833', '10 Avenue East', 'Prince Rupert', '1833 10 Ave E, Prince Rupert, BC V8J 2X6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(268, 272, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 273, '1820', 'Sloan Avenue', 'Prince Rupert', '1820 Sloan Ave, Prince Rupert, BC V8J 4B5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(270, 274, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 275, '1656', '10 Avenue East', 'Prince Rupert', '1656 10 Ave E, Prince Rupert, BC V8J 2V3, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(272, 276, '736', '7 Avenue West', 'Prince Rupert', '736 7 Ave W, Prince Rupert, BC V8J 2M1, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(273, 277, '157', 'Crestview Drive', 'Prince Rupert', '157 Crestview Dr, Prince Rupert, BC V8J 2Z4, Canada', '{\"latitude\":\"54.3199738\",\"longitude\":\"-130.2921374\"}', NULL, NULL, NULL, NULL),
(274, 278, '644', '7th Avenue East', 'Prince Rupert', '644 7th Ave E, Prince Rupert, BC V8J 2J6, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(275, 279, '1790', 'Kootenay Avenue', 'Prince Rupert', '1790 Kootenay Ave, Prince Rupert, BC V8J 4B2, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(276, 280, '118', 'Silversides Drive', 'Prince Rupert', '118 Silversides Dr, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(277, 281, '217', '6 Street', 'Prince Rupert', '217 6 St, Prince Rupert, BC V8J, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(278, 282, '1462', 'Jamaica Avenue', 'Prince Rupert', '1462 Jamaica Ave, Prince Rupert, BC V8J 2Y5, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(279, 283, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 284, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 285, '508', '4 Avenue East', 'Prince Rupert', '508 4 Ave E, Prince Rupert, BC V8J 1N9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(282, 286, '641', 'Ritchie Street', 'Prince Rupert', '641 Ritchie St, Prince Rupert, BC V8J 3S9, Canada', '{\"latitude\":\"\",\"longitude\":\"\"}', NULL, NULL, NULL, NULL),
(283, 287, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_settings`
--

CREATE TABLE `delivery_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_settings`
--

INSERT INTO `delivery_settings` (`id`, `key`, `value`) VALUES
(1, 'delivery_charge', '0.00'),
(2, 'maximum_time_to_deliver', '20-55'),
(6, 'base_meter', '3000'),
(7, 'cashback', '5');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:offline|1:online',
  `vehicle_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `user_id`, `status`, `vehicle_type`, `address`) VALUES
(6, 103, 1, 'car', '333 Albert Avenue, Prince Rupert, BC, Canada'),
(9, 188, 0, NULL, NULL),
(12, 239, 1, 'car', ''),
(13, 287, 0, 'car', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `customer_id`, `menu_id`) VALUES
(30, 96, 9),
(31, 96, 746),
(32, 223, 240),
(33, 279, 667),
(34, 190, 530);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` float NOT NULL COMMENT 'GST',
  `pst` float NOT NULL COMMENT 'PST',
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `name`, `tax`, `pst`, `is_featured`, `created_by`, `created_at`, `updated_at`, `thumbnail`) VALUES
(5, 'Hot Food', 5, 0, 0, 1, 1611945000, 1639900800, 'placeholder.png'),
(7, 'Chips', 5, 0, 0, 1, 1611945000, 1639900800, 'p03mLUHEZRieDafjvyK2.jpg'),
(22, 'Drinks', 5, 7, 0, 1, 1613068200, 1639900800, 'placeholder.png'),
(23, 'Juice', 5, 0, 0, 1, 1613068200, 1631430000, 'placeholder.png'),
(24, 'Slurpee/Screemer', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(26, 'Hot Drinks', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(28, 'Chocolate Bars/ Candies', 5, 0, 0, 1, 1613068200, 1639900800, 'placeholder.png'),
(30, 'Gums', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(32, 'Dairy', 0, 0, 0, 1, 1613068200, NULL, 'placeholder.png'),
(34, 'Sandwiches', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(36, 'Ice Cream', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(38, 'Frozen Items', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(40, 'Grocery', 0, 0, 0, 1, 1613068200, NULL, 'placeholder.png'),
(41, 'Water', 0, 0, 0, 1, 1613068200, 1633417200, 'placeholder.png'),
(42, 'Medicare', 0, 0, 0, 1, 1613068200, NULL, 'placeholder.png'),
(44, 'Home Essentials', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(46, 'Pet Foods', 0, 0, 0, 1, 1613068200, NULL, 'placeholder.png'),
(48, 'Bait', 5, 0, 0, 1, 1613068200, 1632898800, 'placeholder.png'),
(60, 'Test category', 5, 7, 0, 1, 1632639600, NULL, 'placeholder.png'),
(61, 'Sides', 5, 0, 0, 1, 1639209600, NULL, 'placeholder.png'),
(62, 'Curries', 5, 0, 0, 1, 1639209600, NULL, 'placeholder.png'),
(63, 'Combo Meals', 5, 0, 0, 1, 1639209600, NULL, 'placeholder.png'),
(64, 'Individual Items', 5, 0, 0, 1, 1639296000, NULL, 'placeholder.png'),
(81, 'Combo Plates', 5, 0, 0, 1, 1641196800, 1641196800, 'placeholder.png'),
(82, 'Breakfast', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(83, 'Burgers', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(84, 'Chicken', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(85, 'Lunch', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(86, 'Asian Plates', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(87, 'Soups', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(88, 'Kids Corner', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(89, 'Side Orders', 5, 0, 0, 1, 1641196800, NULL, 'placeholder.png'),
(90, 'Seafood', 5, 0, 0, 1, 1641801600, 1642665600, 'placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories_index`
--

CREATE TABLE `food_categories_index` (
  `indx_id` int(11) NOT NULL,
  `id` int(11) NOT NULL COMMENT 'category ID',
  `mid` int(11) NOT NULL COMMENT 'Menu ID',
  `index_order` int(11) NOT NULL DEFAULT 0,
  `restaurant_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'owner ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_categories_index`
--

INSERT INTO `food_categories_index` (`indx_id`, `id`, `mid`, `index_order`, `restaurant_id`, `created_by`) VALUES
(33, 5, 6, 1, 2, 11),
(34, 7, 8, 3, 2, 11),
(35, 5, 9, 0, 2, 11),
(36, 5, 10, 0, 2, 11),
(37, 5, 15, 0, 2, 11),
(38, 5, 16, 0, 2, 11),
(39, 5, 17, 0, 2, 11),
(40, 5, 18, 0, 2, 11),
(41, 5, 19, 0, 2, 11),
(42, 5, 20, 0, 2, 11),
(43, 5, 21, 0, 2, 11),
(44, 5, 22, 0, 2, 11),
(45, 5, 23, 0, 2, 11),
(46, 5, 24, 0, 2, 11),
(47, 5, 25, 0, 2, 11),
(48, 5, 26, 0, 2, 11),
(49, 5, 27, 0, 2, 11),
(50, 5, 28, 0, 2, 11),
(51, 5, 29, 0, 2, 11),
(52, 5, 30, 0, 2, 11),
(53, 5, 31, 0, 2, 11),
(54, 5, 32, 0, 2, 11),
(55, 5, 33, 0, 2, 11),
(56, 5, 34, 0, 2, 11),
(57, 5, 35, 0, 2, 11),
(58, 5, 36, 0, 2, 11),
(59, 5, 37, 0, 2, 11),
(60, 5, 38, 0, 2, 11),
(61, 5, 39, 0, 2, 11),
(62, 5, 40, 0, 2, 11),
(63, 5, 41, 0, 2, 11),
(64, 5, 42, 0, 2, 11),
(65, 7, 43, 0, 2, 11),
(66, 7, 44, 0, 2, 11),
(67, 7, 45, 0, 2, 11),
(68, 7, 46, 0, 2, 11),
(69, 7, 47, 0, 2, 11),
(70, 7, 48, 0, 2, 11),
(71, 7, 49, 0, 2, 11),
(72, 7, 50, 0, 2, 11),
(73, 7, 51, 0, 2, 11),
(74, 7, 52, 0, 2, 11),
(75, 7, 53, 0, 2, 11),
(76, 7, 54, 0, 2, 11),
(77, 7, 55, 0, 2, 11),
(78, 7, 56, 0, 2, 11),
(79, 7, 57, 0, 2, 11),
(80, 7, 58, 0, 2, 11),
(81, 7, 59, 0, 2, 11),
(82, 7, 60, 0, 2, 11),
(83, 7, 61, 0, 2, 11),
(84, 7, 62, 0, 2, 11),
(85, 7, 63, 0, 2, 11),
(86, 7, 64, 0, 2, 11),
(87, 7, 73, 0, 2, 11),
(88, 7, 74, 0, 2, 11),
(89, 7, 75, 0, 2, 11),
(90, 7, 76, 0, 2, 11),
(91, 7, 77, 0, 2, 11),
(92, 7, 78, 0, 2, 11),
(93, 7, 79, 0, 2, 11),
(94, 7, 80, 0, 2, 11),
(95, 7, 81, 0, 2, 11),
(96, 7, 82, 0, 2, 11),
(97, 7, 83, 0, 2, 11),
(98, 7, 84, 0, 2, 11),
(99, 7, 85, 0, 2, 11),
(100, 7, 86, 0, 2, 11),
(101, 7, 87, 0, 2, 11),
(102, 7, 88, 0, 2, 11),
(103, 7, 89, 0, 2, 11),
(104, 7, 90, 0, 2, 11),
(105, 7, 91, 0, 2, 11),
(106, 7, 92, 0, 2, 11),
(107, 7, 93, 0, 2, 11),
(108, 7, 94, 0, 2, 11),
(109, 7, 95, 0, 2, 11),
(110, 7, 96, 0, 2, 11),
(111, 7, 97, 0, 2, 11),
(112, 7, 98, 0, 2, 11),
(113, 7, 99, 0, 2, 11),
(114, 7, 100, 0, 2, 11),
(115, 7, 101, 0, 2, 11),
(116, 7, 102, 0, 2, 11),
(117, 7, 103, 0, 2, 11),
(118, 7, 104, 0, 2, 11),
(119, 7, 105, 0, 2, 11),
(120, 7, 106, 0, 2, 11),
(121, 7, 107, 0, 2, 11),
(122, 7, 108, 0, 2, 11),
(123, 7, 109, 0, 2, 11),
(124, 7, 110, 0, 2, 11),
(125, 7, 111, 0, 2, 11),
(126, 7, 112, 0, 2, 11),
(127, 7, 113, 0, 2, 11),
(128, 7, 114, 0, 2, 11),
(129, 7, 115, 0, 2, 11),
(130, 7, 116, 0, 2, 11),
(131, 7, 117, 0, 2, 11),
(132, 7, 118, 0, 2, 11),
(133, 7, 119, 0, 2, 11),
(134, 7, 120, 0, 2, 11),
(135, 7, 121, 0, 2, 11),
(136, 7, 122, 0, 2, 11),
(137, 7, 123, 0, 2, 11),
(138, 7, 124, 0, 2, 11),
(139, 7, 125, 0, 2, 11),
(140, 7, 126, 0, 2, 11),
(141, 7, 127, 0, 2, 11),
(142, 7, 128, 0, 2, 11),
(143, 7, 129, 0, 2, 11),
(144, 7, 130, 0, 2, 11),
(145, 7, 131, 0, 2, 11),
(146, 7, 132, 0, 2, 11),
(147, 7, 133, 0, 2, 11),
(148, 7, 134, 0, 2, 11),
(149, 7, 135, 0, 2, 11),
(150, 7, 136, 0, 2, 11),
(151, 7, 137, 0, 2, 11),
(152, 7, 138, 0, 2, 11),
(153, 7, 139, 0, 2, 11),
(154, 7, 140, 0, 2, 11),
(155, 7, 141, 0, 2, 11),
(156, 7, 142, 0, 2, 11),
(157, 7, 143, 0, 2, 11),
(158, 22, 162, 2, 2, 11),
(159, 22, 163, 0, 2, 11),
(160, 22, 164, 0, 2, 11),
(161, 22, 165, 0, 2, 11),
(162, 22, 166, 0, 2, 11),
(163, 22, 167, 0, 2, 11),
(164, 22, 168, 0, 2, 11),
(165, 22, 169, 0, 2, 11),
(166, 22, 170, 0, 2, 11),
(167, 22, 171, 0, 2, 11),
(168, 22, 172, 0, 2, 11),
(169, 22, 173, 0, 2, 11),
(170, 22, 174, 0, 2, 11),
(171, 22, 175, 0, 2, 11),
(172, 22, 176, 0, 2, 11),
(173, 22, 177, 0, 2, 11),
(174, 22, 178, 0, 2, 11),
(175, 22, 179, 0, 2, 11),
(176, 22, 180, 0, 2, 11),
(177, 22, 181, 0, 2, 11),
(178, 22, 182, 0, 2, 11),
(179, 22, 183, 0, 2, 11),
(180, 22, 184, 0, 2, 11),
(181, 22, 185, 0, 2, 11),
(182, 22, 186, 0, 2, 11),
(183, 22, 187, 0, 2, 11),
(184, 22, 188, 0, 2, 11),
(185, 22, 189, 0, 2, 11),
(186, 22, 190, 0, 2, 11),
(187, 22, 191, 0, 2, 11),
(188, 22, 192, 0, 2, 11),
(189, 22, 193, 0, 2, 11),
(190, 22, 194, 0, 2, 11),
(191, 22, 195, 0, 2, 11),
(192, 22, 196, 0, 2, 11),
(193, 22, 197, 0, 2, 11),
(194, 22, 198, 0, 2, 11),
(195, 22, 199, 0, 2, 11),
(196, 22, 200, 0, 2, 11),
(197, 22, 201, 0, 2, 11),
(198, 22, 202, 0, 2, 11),
(199, 22, 203, 0, 2, 11),
(200, 22, 204, 0, 2, 11),
(201, 22, 205, 0, 2, 11),
(202, 22, 206, 0, 2, 11),
(203, 22, 207, 0, 2, 11),
(204, 22, 208, 0, 2, 11),
(205, 22, 209, 0, 2, 11),
(206, 23, 210, 5, 2, 11),
(207, 23, 211, 0, 2, 11),
(208, 22, 212, 0, 2, 11),
(209, 22, 213, 0, 2, 11),
(210, 22, 214, 0, 2, 11),
(211, 22, 215, 0, 2, 11),
(212, 22, 216, 0, 2, 11),
(213, 22, 217, 0, 2, 11),
(214, 22, 220, 0, 2, 11),
(215, 22, 221, 0, 2, 11),
(216, 22, 222, 0, 2, 11),
(217, 22, 223, 0, 2, 11),
(218, 22, 224, 0, 2, 11),
(219, 22, 225, 0, 2, 11),
(220, 22, 226, 0, 2, 11),
(221, 22, 227, 0, 2, 11),
(222, 22, 228, 0, 2, 11),
(223, 22, 229, 0, 2, 11),
(224, 22, 230, 0, 2, 11),
(225, 41, 231, 12, 2, 11),
(226, 41, 232, 0, 2, 11),
(227, 41, 233, 0, 2, 11),
(228, 41, 234, 0, 2, 11),
(229, 41, 235, 0, 2, 11),
(230, 41, 236, 0, 2, 11),
(231, 22, 238, 0, 2, 11),
(232, 22, 239, 0, 2, 11),
(233, 22, 240, 0, 2, 11),
(234, 22, 241, 0, 2, 11),
(235, 22, 242, 0, 2, 11),
(236, 22, 243, 0, 2, 11),
(237, 22, 244, 0, 2, 11),
(238, 22, 245, 0, 2, 11),
(239, 22, 246, 0, 2, 11),
(240, 22, 247, 0, 2, 11),
(241, 22, 248, 0, 2, 11),
(242, 22, 249, 0, 2, 11),
(243, 22, 250, 0, 2, 11),
(244, 22, 251, 0, 2, 11),
(245, 22, 252, 0, 2, 11),
(246, 22, 253, 0, 2, 11),
(247, 22, 254, 0, 2, 11),
(248, 22, 255, 0, 2, 11),
(249, 22, 256, 0, 2, 11),
(250, 22, 257, 0, 2, 11),
(251, 22, 258, 0, 2, 11),
(252, 22, 259, 0, 2, 11),
(253, 22, 260, 0, 2, 11),
(254, 22, 261, 0, 2, 11),
(255, 22, 262, 0, 2, 11),
(256, 22, 263, 0, 2, 11),
(257, 22, 264, 0, 2, 11),
(258, 22, 265, 0, 2, 11),
(259, 22, 266, 0, 2, 11),
(260, 22, 267, 0, 2, 11),
(261, 23, 268, 0, 2, 11),
(262, 23, 269, 0, 2, 11),
(263, 22, 270, 0, 2, 11),
(264, 22, 271, 0, 2, 11),
(265, 22, 272, 0, 2, 11),
(266, 22, 273, 0, 2, 11),
(267, 41, 274, 0, 2, 11),
(268, 22, 275, 0, 2, 11),
(269, 22, 276, 0, 2, 11),
(270, 22, 277, 0, 2, 11),
(271, 22, 278, 0, 2, 11),
(272, 22, 279, 0, 2, 11),
(273, 22, 282, 0, 2, 11),
(274, 22, 283, 0, 2, 11),
(275, 22, 289, 0, 2, 11),
(276, 22, 290, 0, 2, 11),
(277, 22, 291, 0, 2, 11),
(278, 22, 292, 0, 2, 11),
(279, 22, 293, 0, 2, 11),
(280, 22, 294, 0, 2, 11),
(281, 22, 295, 0, 2, 11),
(282, 22, 299, 0, 2, 11),
(283, 23, 300, 0, 2, 11),
(284, 23, 301, 0, 2, 11),
(285, 23, 302, 0, 2, 11),
(286, 23, 303, 0, 2, 11),
(287, 23, 309, 0, 2, 11),
(288, 23, 310, 0, 2, 11),
(289, 23, 311, 0, 2, 11),
(290, 22, 312, 0, 2, 11),
(291, 22, 313, 0, 2, 11),
(292, 22, 314, 0, 2, 11),
(293, 22, 315, 0, 2, 11),
(294, 22, 316, 0, 2, 11),
(295, 22, 317, 0, 2, 11),
(296, 22, 318, 0, 2, 11),
(297, 22, 319, 0, 2, 11),
(298, 22, 320, 0, 2, 11),
(299, 28, 321, 4, 2, 11),
(300, 28, 322, 0, 2, 11),
(301, 28, 323, 0, 2, 11),
(302, 28, 324, 0, 2, 11),
(303, 28, 325, 0, 2, 11),
(304, 28, 326, 0, 2, 11),
(305, 28, 327, 0, 2, 11),
(306, 28, 328, 0, 2, 11),
(307, 28, 329, 0, 2, 11),
(308, 28, 330, 0, 2, 11),
(309, 28, 331, 0, 2, 11),
(310, 28, 332, 0, 2, 11),
(311, 28, 333, 0, 2, 11),
(312, 28, 334, 0, 2, 11),
(313, 28, 335, 0, 2, 11),
(314, 28, 336, 0, 2, 11),
(315, 28, 337, 0, 2, 11),
(316, 28, 338, 0, 2, 11),
(317, 28, 339, 0, 2, 11),
(318, 28, 343, 0, 2, 11),
(319, 28, 344, 0, 2, 11),
(320, 28, 345, 0, 2, 11),
(321, 28, 346, 0, 2, 11),
(322, 28, 348, 0, 2, 11),
(323, 28, 349, 0, 2, 11),
(324, 28, 350, 0, 2, 11),
(325, 28, 351, 0, 2, 11),
(326, 28, 352, 0, 2, 11),
(327, 28, 353, 0, 2, 11),
(328, 28, 354, 0, 2, 11),
(329, 28, 355, 0, 2, 11),
(330, 28, 356, 0, 2, 11),
(331, 28, 357, 0, 2, 11),
(332, 28, 358, 0, 2, 11),
(333, 28, 359, 0, 2, 11),
(334, 28, 360, 0, 2, 11),
(335, 28, 361, 0, 2, 11),
(336, 28, 362, 0, 2, 11),
(337, 28, 363, 0, 2, 11),
(338, 28, 364, 0, 2, 11),
(339, 28, 365, 0, 2, 11),
(340, 28, 366, 0, 2, 11),
(341, 28, 367, 0, 2, 11),
(342, 28, 368, 0, 2, 11),
(343, 28, 369, 0, 2, 11),
(344, 28, 370, 0, 2, 11),
(345, 28, 371, 0, 2, 11),
(346, 28, 372, 0, 2, 11),
(347, 28, 373, 0, 2, 11),
(348, 28, 374, 0, 2, 11),
(349, 28, 375, 0, 2, 11),
(350, 28, 376, 0, 2, 11),
(351, 28, 377, 0, 2, 11),
(352, 28, 378, 0, 2, 11),
(353, 28, 379, 0, 2, 11),
(354, 36, 380, 6, 2, 11),
(355, 36, 381, 0, 2, 11),
(356, 36, 382, 0, 2, 11),
(357, 36, 383, 0, 2, 11),
(358, 36, 384, 0, 2, 11),
(359, 36, 385, 0, 2, 11),
(360, 36, 386, 0, 2, 11),
(361, 36, 387, 0, 2, 11),
(362, 36, 388, 0, 2, 11),
(363, 36, 389, 0, 2, 11),
(364, 36, 390, 0, 2, 11),
(365, 36, 391, 0, 2, 11),
(366, 36, 392, 0, 2, 11),
(367, 36, 393, 0, 2, 11),
(368, 36, 394, 0, 2, 11),
(369, 36, 395, 0, 2, 11),
(370, 36, 396, 0, 2, 11),
(371, 36, 397, 0, 2, 11),
(372, 36, 398, 0, 2, 11),
(373, 36, 399, 0, 2, 11),
(374, 36, 400, 0, 2, 11),
(375, 32, 402, 7, 2, 11),
(376, 32, 403, 0, 2, 11),
(377, 36, 404, 0, 2, 11),
(378, 36, 405, 0, 2, 11),
(379, 36, 406, 0, 2, 11),
(380, 36, 407, 0, 2, 11),
(381, 36, 408, 0, 2, 11),
(382, 36, 409, 0, 2, 11),
(383, 36, 410, 0, 2, 11),
(384, 36, 411, 0, 2, 11),
(385, 36, 412, 0, 2, 11),
(386, 36, 413, 0, 2, 11),
(387, 36, 414, 0, 2, 11),
(388, 36, 415, 0, 2, 11),
(389, 36, 416, 0, 2, 11),
(390, 36, 417, 0, 2, 11),
(391, 36, 418, 0, 2, 11),
(392, 36, 419, 0, 2, 11),
(393, 36, 420, 0, 2, 11),
(394, 36, 421, 0, 2, 11),
(395, 36, 422, 0, 2, 11),
(396, 36, 423, 0, 2, 11),
(397, 36, 424, 0, 2, 11),
(398, 36, 425, 0, 2, 11),
(399, 36, 426, 0, 2, 11),
(400, 36, 427, 0, 2, 11),
(401, 32, 428, 0, 2, 11),
(402, 32, 429, 0, 2, 11),
(403, 22, 430, 0, 2, 11),
(404, 22, 431, 0, 2, 11),
(405, 22, 432, 0, 2, 11),
(406, 22, 433, 0, 2, 11),
(407, 22, 434, 0, 2, 11),
(408, 22, 435, 0, 2, 11),
(409, 22, 436, 0, 2, 11),
(410, 22, 437, 0, 2, 11),
(411, 40, 438, 8, 2, 11),
(412, 40, 439, 0, 2, 11),
(413, 40, 440, 0, 2, 11),
(414, 40, 441, 0, 2, 11),
(415, 40, 442, 0, 2, 11),
(416, 40, 443, 0, 2, 11),
(417, 40, 445, 0, 2, 11),
(418, 40, 446, 0, 2, 11),
(419, 40, 447, 0, 2, 11),
(420, 40, 448, 0, 2, 11),
(421, 40, 449, 0, 2, 11),
(422, 40, 450, 0, 2, 11),
(423, 40, 451, 0, 2, 11),
(424, 40, 452, 0, 2, 11),
(425, 40, 453, 0, 2, 11),
(426, 40, 454, 0, 2, 11),
(427, 40, 455, 0, 2, 11),
(428, 32, 487, 0, 2, 11),
(429, 32, 488, 0, 2, 11),
(430, 32, 489, 0, 2, 11),
(431, 32, 490, 0, 2, 11),
(432, 32, 491, 0, 2, 11),
(433, 32, 492, 0, 2, 11),
(434, 32, 493, 0, 2, 11),
(435, 32, 494, 0, 2, 11),
(436, 32, 495, 0, 2, 11),
(437, 32, 496, 0, 2, 11),
(438, 32, 497, 0, 2, 11),
(439, 32, 498, 0, 2, 11),
(440, 32, 499, 0, 2, 11),
(441, 32, 500, 0, 2, 11),
(442, 32, 501, 0, 2, 11),
(443, 32, 502, 0, 2, 11),
(444, 32, 503, 0, 2, 11),
(445, 32, 504, 0, 2, 11),
(446, 32, 505, 0, 2, 11),
(447, 32, 506, 0, 2, 11),
(448, 32, 507, 0, 2, 11),
(449, 40, 524, 0, 2, 11),
(450, 40, 525, 0, 2, 11),
(451, 40, 526, 0, 2, 11),
(452, 40, 527, 0, 2, 11),
(453, 40, 528, 0, 2, 11),
(454, 40, 529, 0, 2, 11),
(455, 24, 530, 9, 2, 11),
(456, 24, 531, 0, 2, 11),
(457, 26, 532, 10, 2, 11),
(458, 26, 533, 0, 2, 11),
(459, 26, 534, 0, 2, 11),
(460, 44, 535, 11, 2, 11),
(461, 61, 539, 3, 5, 203),
(462, 63, 540, 1, 5, 203),
(463, 63, 541, 0, 5, 203),
(465, 62, 543, 0, 5, 203),
(466, 62, 544, 0, 5, 203),
(467, 62, 545, 0, 5, 203),
(468, 62, 546, 0, 5, 203),
(469, 62, 547, 0, 5, 203),
(470, 62, 548, 0, 5, 203),
(471, 62, 549, 0, 5, 203),
(472, 61, 550, 0, 5, 203),
(473, 61, 551, 0, 5, 203),
(474, 61, 552, 0, 5, 203),
(475, 61, 553, 0, 5, 203),
(476, 61, 554, 0, 5, 203),
(477, 61, 555, 0, 5, 203),
(478, 22, 556, 4, 5, 203),
(479, 22, 557, 0, 5, 203),
(480, 44, 570, 0, 2, 11),
(481, 44, 571, 0, 2, 11),
(482, 44, 572, 0, 2, 11),
(483, 44, 573, 0, 2, 11),
(548, 22, 586, 0, 5, 203),
(549, 22, 587, 0, 5, 203),
(550, 22, 588, 0, 5, 203),
(554, 60, 746, 0, 4, 11),
(555, 60, 747, 0, 4, 11),
(558, 81, 589, 1, 6, 244),
(559, 81, 590, 0, 6, 244),
(560, 81, 591, 0, 6, 244),
(561, 82, 593, 2, 6, 244),
(562, 82, 594, 0, 6, 244),
(563, 82, 595, 0, 6, 244),
(564, 82, 596, 0, 6, 244),
(565, 82, 597, 0, 6, 244),
(566, 82, 598, 0, 6, 244),
(567, 82, 599, 0, 6, 244),
(568, 82, 600, 0, 6, 244),
(569, 82, 601, 0, 6, 244),
(570, 82, 602, 0, 6, 244),
(571, 82, 603, 0, 6, 244),
(572, 83, 604, 3, 6, 244),
(573, 83, 605, 0, 6, 244),
(574, 83, 606, 0, 6, 244),
(575, 83, 607, 0, 6, 244),
(576, 83, 608, 0, 6, 244),
(577, 83, 609, 0, 6, 244),
(578, 83, 610, 0, 6, 244),
(579, 83, 611, 0, 6, 244),
(580, 83, 612, 0, 6, 244),
(581, 83, 613, 0, 6, 244),
(582, 84, 614, 4, 6, 244),
(583, 84, 615, 0, 6, 244),
(584, 84, 616, 0, 6, 244),
(585, 84, 617, 0, 6, 244),
(586, 84, 618, 0, 6, 244),
(587, 84, 619, 0, 6, 244),
(588, 84, 620, 0, 6, 244),
(589, 84, 621, 0, 6, 244),
(590, 84, 622, 0, 6, 244),
(591, 84, 623, 0, 6, 244),
(592, 84, 624, 0, 6, 244),
(593, 90, 625, 5, 6, 244),
(594, 90, 626, 0, 6, 244),
(595, 90, 627, 0, 6, 244),
(596, 90, 628, 0, 6, 244),
(597, 90, 629, 0, 6, 244),
(598, 90, 630, 0, 6, 244),
(599, 90, 631, 0, 6, 244),
(600, 34, 632, 6, 6, 244),
(601, 34, 633, 0, 6, 244),
(602, 34, 634, 0, 6, 244),
(603, 34, 635, 0, 6, 244),
(604, 34, 636, 0, 6, 244),
(605, 34, 637, 0, 6, 244),
(606, 34, 638, 0, 6, 244),
(607, 34, 639, 0, 6, 244),
(608, 34, 640, 0, 6, 244),
(609, 34, 641, 0, 6, 244),
(610, 34, 642, 0, 6, 244),
(611, 34, 643, 0, 6, 244),
(612, 34, 644, 0, 6, 244),
(613, 34, 645, 0, 6, 244),
(614, 34, 646, 0, 6, 244),
(615, 85, 648, 7, 6, 244),
(616, 85, 649, 0, 6, 244),
(617, 85, 650, 0, 6, 244),
(618, 85, 651, 0, 6, 244),
(619, 85, 652, 0, 6, 244),
(620, 85, 653, 0, 6, 244),
(621, 85, 654, 0, 6, 244),
(622, 86, 655, 8, 6, 244),
(623, 86, 656, 0, 6, 244),
(624, 86, 657, 0, 6, 244),
(625, 86, 658, 0, 6, 244),
(626, 86, 659, 0, 6, 244),
(627, 86, 660, 0, 6, 244),
(628, 86, 661, 0, 6, 244),
(629, 86, 662, 0, 6, 244),
(630, 86, 663, 0, 6, 244),
(631, 86, 664, 0, 6, 244),
(632, 86, 665, 0, 6, 244),
(633, 86, 666, 0, 6, 244),
(634, 86, 667, 0, 6, 244),
(635, 86, 668, 0, 6, 244),
(636, 87, 669, 9, 6, 244),
(637, 87, 670, 0, 6, 244),
(638, 88, 671, 10, 6, 244),
(639, 88, 672, 0, 6, 244),
(640, 88, 673, 0, 6, 244),
(641, 88, 674, 0, 6, 244),
(642, 88, 675, 0, 6, 244),
(643, 88, 676, 0, 6, 244),
(644, 89, 677, 11, 6, 244),
(645, 89, 678, 0, 6, 244),
(646, 89, 679, 0, 6, 244),
(647, 89, 680, 0, 6, 244),
(648, 89, 681, 0, 6, 244),
(649, 89, 682, 0, 6, 244),
(650, 89, 683, 0, 6, 244),
(651, 89, 684, 0, 6, 244),
(652, 89, 685, 0, 6, 244),
(653, 89, 686, 0, 6, 244),
(654, 89, 687, 0, 6, 244),
(655, 89, 688, 0, 6, 244),
(656, 89, 689, 0, 6, 244),
(657, 89, 690, 0, 6, 244),
(658, 89, 691, 0, 6, 244),
(659, 89, 692, 0, 6, 244),
(660, 89, 693, 0, 6, 244),
(661, 89, 694, 0, 6, 244),
(662, 89, 695, 0, 6, 244),
(663, 89, 696, 0, 6, 244),
(664, 89, 697, 0, 6, 244),
(665, 89, 698, 0, 6, 244),
(666, 89, 699, 0, 6, 244),
(667, 22, 700, 12, 6, 244),
(668, 22, 701, 0, 6, 244),
(669, 22, 702, 0, 6, 244),
(670, 22, 703, 0, 6, 244),
(671, 22, 704, 0, 6, 244),
(672, 22, 705, 0, 6, 244),
(673, 22, 706, 0, 6, 244),
(674, 22, 707, 0, 6, 244),
(675, 22, 708, 0, 6, 244),
(676, 22, 709, 0, 6, 244),
(677, 22, 710, 0, 6, 244),
(678, 22, 711, 0, 6, 244),
(679, 22, 712, 0, 6, 244),
(680, 22, 713, 0, 6, 244),
(681, 22, 714, 0, 6, 244),
(682, 22, 715, 0, 6, 244),
(683, 22, 716, 0, 6, 244),
(684, 22, 717, 0, 6, 244),
(685, 22, 718, 0, 6, 244),
(686, 22, 719, 0, 6, 244),
(687, 22, 720, 0, 6, 244),
(688, 22, 721, 0, 6, 244),
(689, 22, 722, 0, 6, 244),
(690, 22, 723, 0, 6, 244),
(691, 22, 724, 0, 6, 244),
(692, 22, 725, 0, 6, 244),
(693, 22, 726, 0, 6, 244),
(694, 22, 727, 0, 6, 244),
(695, 22, 728, 0, 6, 244),
(696, 22, 729, 0, 6, 244),
(697, 22, 730, 0, 6, 244),
(698, 22, 731, 0, 6, 244),
(699, 22, 732, 0, 6, 244),
(700, 22, 733, 0, 6, 244),
(701, 22, 734, 0, 6, 244),
(702, 22, 735, 0, 6, 244),
(703, 22, 736, 0, 6, 244),
(704, 22, 737, 0, 6, 244),
(705, 22, 738, 0, 6, 244),
(706, 22, 739, 0, 6, 244),
(707, 22, 740, 0, 6, 244),
(708, 22, 741, 0, 6, 244),
(709, 22, 742, 0, 6, 244),
(710, 22, 743, 0, 6, 244),
(711, 22, 744, 0, 6, 244);

-- --------------------------------------------------------

--
-- Table structure for table `food_menus`
--

CREATE TABLE `food_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `items` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `nutrition_fact` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `has_discount` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `discounted_price` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `thumb_status` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `has_variant` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_menus`
--

INSERT INTO `food_menus` (`id`, `name`, `category_id`, `restaurant_id`, `items`, `details`, `nutrition_fact`, `servings`, `availability`, `has_discount`, `price`, `discounted_price`, `thumbnail`, `thumb_status`, `slug`, `created_at`, `updated_at`, `has_variant`) VALUES
(6, 'Taters', 5, 2, '', 'choose size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'WJXt0n8Oimy34fxuzIhw.jpg', 1, 'taters', 1611945000, 1640073600, 1),
(8, 'Lays (Classic)', 7, 2, '', 'Small (66g), Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'QM6GD3bWzF4dUZRI7KyY.jpg', 1, 'lays-classic', 1611945000, 1644566400, 1),
(9, 'Fried Chicken (Drum)', 5, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.00\"}', '{\"menu\":\"\"}', 'GOcWifRjsILPBv6Jwqya.jpg', 1, 'fried-chicken-drum', 1611945000, 1643184000, 0),
(10, 'Fried Chicken (Thigh)', 5, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.00\"}', '{\"menu\":\"\"}', 'je9pPuIDLXHoqVgbmhMn.jpg', 1, 'fried-chicken-thigh', 1611945000, 1624950000, 0),
(15, '1 Pc Meal', 5, 2, '', '1 Thigh (or 2 Drums) along with Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.49\"}', '{\"menu\":\"\"}', 'YPenWSkFZm2BrJT4637o.jpg', 1, '1-pc-meal', 1612290600, 1638345600, 0),
(16, '2 Pc Meal', 5, 2, '', '1 Thigh and 1 Drum along with Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.49\"}', '{\"menu\":\"\"}', '9KurfGmWnwchIMLbvC3E.jpg', 1, '2-pc-meal', 1612290600, 1638345600, 0),
(17, '3 Pc Meal', 5, 2, '', '1 Thigh and 2 Drums along with Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.49\"}', '{\"menu\":\"\"}', 'WRjBi2NzSFuYECVG3al8.jpg', 1, '3-pc-meal', 1612290600, 1638345600, 0),
(18, '4 Pc Meal', 5, 2, '', '2 Thighs and 2 Drums along with Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.49\"}', '{\"menu\":\"\"}', 'bLtF2JckjuaHOdqUX86l.jpg', 1, '4-pc-meal', 1612290600, 1638345600, 0),
(19, '6 Pc Chicken', 5, 2, '', '3 Thighs and 3 Drums', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.49\"}', '{\"menu\":\"\"}', '2UoAlGhzNCYuImctB67D.jpg', 1, '6-pc-chicken', 1612290600, 1638345600, 0),
(20, '6 Pc Meal', 5, 2, '', '3 Thighs and 3 Drums along with Large box of Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"18.49\"}', '{\"menu\":\"\"}', 'R3iFspDqeZa5nGEU8ygu.jpg', 1, '6-pc-meal', 1612290600, 1638345600, 0),
(21, '9 Pc Chicken', 5, 2, '', '4 Thighs and 5 Drums', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"21.49\"}', '{\"menu\":\"\"}', '0JAO5RrqkZfKWvYs472z.jpg', 1, '9-pc-chicken', 1612290600, 1638345600, 0),
(22, '9 Pc Meal', 5, 2, '', '4 Thighs and 5 Drums along with Large box of Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"25.49\"}', '{\"menu\":\"\"}', 'iAnNTPa0yK9vCVr7skl6.jpg', 1, '9-pc-meal', 1612290600, 1638345600, 0),
(23, '15 Pc Chicken', 5, 2, '', '7 Thighs and 8 Drums', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"31.49\"}', '{\"menu\":\"\"}', 'uaeUO5dXNpCPYnj7cTtA.jpg', 1, '15-pc-chicken', 1612290600, 1638345600, 0),
(24, '15 Pc Meal', 5, 2, '', '7 Thighs and 8 Drums along with Large box of Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"35.49\"}', '{\"menu\":\"\"}', 'WB5dKvzEGqDSPQJ1cwxh.jpg', 1, '15-pc-meal', 1612290600, 1638345600, 0),
(25, '20 Pc Chicken', 5, 2, '', '10 Thighs and 10 Drums', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"41.49\"}', '{\"menu\":\"\"}', 'sAeGxPdHOzN51ZtEWBDy.jpg', 1, '20-pc-chicken', 1612290600, 1638345600, 0),
(26, '20 Pc Meal', 5, 2, '', '10 Thighs and 10 Drums along with Large box of Taters', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"45.49\"}', '{\"menu\":\"\"}', 'W2c0VI4vX56smuSalMre.jpg', 1, '20-pc-meal', 1612290600, 1638345600, 0),
(27, 'Regular Corn Dog', 5, 2, '', 'Batter Wrapped Chicken Frankfurter on a stick', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.69\"}', '{\"menu\":\"\"}', 'P3DzOhGTgCy2c4VAaBSk.jpg', 1, 'regular-corn-dog', 1612290600, 1638345600, 0),
(28, 'Jalapeño Corn Dogs', 5, 2, '', 'Batter Wrapped Cheese and Jalapeno Chicken Frankfurter on a stick', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.69\"}', '{\"menu\":\"\"}', 'WITEcmCf2KkOJ1uHqhzD.jpg', 1, 'jalapeño-corn-dogs', 1612290600, 1638345600, 0),
(29, 'Taquito', 5, 2, '', 'Chicken and cheese filling inside with a crunchy layering outside', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'inyOUKQZ31wLXP85SAuh.jpg', 1, 'taquito', 1612290600, 1638345600, 0),
(30, '6 Pc Hot Wings', 5, 2, '', 'Crispy and medium spicy Chicken Hot Wings', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.99\"}', '{\"menu\":\"\"}', 'KvdwmpusTEecC4JMnxoZ.jpg', 1, '6-pc-hot-wings', 1612290600, 1638345600, 0),
(31, '12 Pc Hot Wings', 5, 2, '', 'Crispy and medium spicy Chicken Hot Wings', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"18.49\"}', '{\"menu\":\"\"}', 'c2Md3PzoUQqWXe6Nm51a.jpg', 1, '12-pc-hot-wings', 1612290600, 1638345600, 0),
(32, '18 Pc Hot Wings', 5, 2, '', 'Crispy and medium spicy Chicken Hot Wings', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"22.99\"}', '{\"menu\":\"\"}', '7mDTQuFdeIqfJ1lwk6g8.jpg', 1, '18-pc-hot-wings', 1612290600, 1638345600, 0),
(33, '16 Pc Popcorn Chicken', 5, 2, '', 'Bite Sized pieces of Chicken battered and fried', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', 'Clc0TtVQwWsk9hbIM8Nf.jpg', 1, '16-pc-popcorn-chicken', 1612290600, 1624950000, 1),
(34, '16 Pc Popcorn Chicken Meal', 5, 2, '', 'Popcorn Chicken served with Taters', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"8.49\"}', '{\"menu\":\"\"}', '3hlI7d48JnamvMZLr9w6.jpg', 1, '16-pc-popcorn-chicken-meal', 1612290600, 1624950000, 0),
(35, '32 Pc Popcorn Chicken', 5, 2, '', 'Bite Sized pieces of Chicken battered and fried', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.99\"}', '{\"menu\":\"\"}', 'DGNPB2HzAcbvq15OJlTr.jpg', 1, '32-pc-popcorn-chicken', 1612290600, 1624950000, 1),
(36, '32 Pc Popcorn Chicken Meal', 5, 2, '', 'Popcorn Chicken served with Taters', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"10.49\"}', '{\"menu\":\"\"}', 'v7coQxNzJqrF5TaLIbns.jpg', 1, '32-pc-popcorn-chicken-meal', 1612290600, 1624950000, 0),
(37, '6 Pc Mac and Cheese Bites', 5, 2, '', 'Macaroni and Cheese Wedge Bettered', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'SwdgGYphQtA7KkUCnvuE.jpg', 1, '6-pc-mac-and-cheese-bites', 1612290600, 1638345600, 0),
(38, '12 Pc Mac and Cheese Bites', 5, 2, '', 'Macaroni and Cheese Wedge Bettered', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.49\"}', '{\"menu\":\"\"}', 'THY9Jvt8gUuGI67b3sFi.jpg', 1, '12-pc-mac-and-cheese-bites', 1612290600, 1638345600, 0),
(39, 'Mozza Sticks (6Pc)', 5, 2, '', 'Sticks of mozzarella cheese battered and fried', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', 'FatiEWqQ1GgeNd3yTZIS.jpg', 1, 'mozza-sticks-6pc', 1612290600, 1638345600, 0),
(40, 'Mozza Sticks (12 Pc)', 5, 2, '', 'Sticks of mozzarella cheese battered and fried', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.49\"}', '{\"menu\":\"\"}', 'Ocx6KRApk5TznaENytGQ.jpg', 1, 'mozza-sticks-12-pc', 1612290600, 1638345600, 0),
(41, 'Onion Rings', 5, 2, '', 'Rings of Onions battered and fried (170g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.25\"}', '{\"menu\":\"\"}', 'WSwY3J7aK2XflCmhNitx.jpg', 1, 'onion-rings', 1612290600, 1638345600, 0),
(42, 'Fried Pickles', 5, 2, '', 'Deep fried battered Dill Pickles', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"0.85\"}', '{\"menu\":\"\"}', 'CSAub8OwjtNk3PUaqsX9.jpg', 1, 'fried-pickles', 1612377000, 1638345600, 0),
(43, 'Lays (Ketchup)', 7, 2, '', 'Small (66g), Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'gGdCL3ifjln4vzToKHFa.jpg', 1, 'lays-ketchup', 1612463400, 1644566400, 1),
(44, 'Lays (Salt and Vinegar)', 7, 2, '', 'Small (66g), Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'cJ40h1rUvtAib8CVzkSZ.jpg', 1, 'lays-salt-and-vinegar', 1612463400, 1644566400, 1),
(45, 'Lays (Barbecue)', 7, 2, '', 'Small (66g), Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'h4wqICaJiSZTP7e9Nt6G.jpg', 1, 'lays-barbecue', 1612463400, 1644566400, 1),
(46, 'Lays (Sour cream and Onion)', 7, 2, '', 'Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'Cfczw43sZ8Rumi5SKYrA.jpg', 1, 'lays-sour-cream-and-onion', 1612463400, 1625036400, 0),
(47, 'Lays (Dill Pickle)', 7, 2, '', 'Large(165g)', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'jyu5wGPlKOZoUe6tDVvz.jpg', 1, 'lays-dill-pickle', 1612463400, 1625036400, 0),
(48, 'Lays Wavy (Original)', 7, 2, '', 'Large(165g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'ujh58oYnNdxt0vIk3f6Z.jpg', 1, 'lays-wavy-original', 1612463400, 1625036400, 0),
(49, 'Doritos (Nacho Cheese)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '1OyAmkrguSltnN3UiX65.jpg', 1, 'doritos-nacho-cheese', 1612463400, 1644566400, 1),
(50, 'Doritos (Jalapeno and Cheddar)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '9eXFqWhaJ87fzZpmVNlH.jpg', 1, 'doritos-jalapeno-and-cheddar', 1612463400, 1644566400, 0),
(51, 'Doritos (Sweet Chili Heat)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'XaVDhUYgOF1f8Rl0utvQ.jpg', 1, 'doritos-sweet-chili-heat', 1612463400, 1644566400, 1),
(52, 'Doritos (Zesty Cheese)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'MuEIcTskjKFz4WJp7vdD.jpg', 1, 'doritos-zesty-cheese', 1612463400, 1644566400, 1),
(53, 'Doritos (Bold BBQ)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '0Mh2qScItYavNJxXKLsn.jpg', 1, 'doritos-bold-bbq', 1612463400, 1644566400, 1),
(54, 'Doritos (Cool Ranch)', 7, 2, '', 'Large (255g), Small (80g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'mfCNA4KEtRd6pSUM2JZk.jpg', 1, 'doritos-cool-ranch', 1612463400, 1644566400, 1),
(55, 'Tostitos (Restaurant Style)', 7, 2, '', '275g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'g1m2EAo70uNF6vkYs9TM.jpg', 1, 'tostitos-restaurant-style', 1612463400, 1644566400, 0),
(56, 'Tostitos (Rounds)', 7, 2, '', '295g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '82okgAvtRFVLHDclsdnQ.jpg', 1, 'tostitos-rounds', 1612463400, 1644566400, 0),
(57, 'Cheezies', 7, 2, '', 'Large (210g), Small (70g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '8iUqwEQGTdS3clkIhvF7.jpg', 1, 'cheezies', 1612463400, 1644566400, 1),
(58, 'Ruffles (All Dressed)', 7, 2, '', 'Large (200g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'PNJXvBLlTpAOu4gj8rZW.jpg', 1, 'ruffles-all-dressed', 1612463400, 1644566400, 1),
(59, 'Ruffles (Sour Cream \'n Onion)', 7, 2, '', '200g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'toWq6rlRjHIv4De57h1m.jpg', 1, 'ruffles-sour-cream-n-onion', 1612463400, 1644566400, 0),
(60, 'Munchies (Snack Mix)', 7, 2, '', '272g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'xZWMsUg6FdeVLl820JIn.jpg', 1, 'munchies-snack-mix', 1612463400, 1644566400, 0),
(61, 'Cheetos (Crunchy)', 7, 2, '', 'Large (310g), Small (90g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'TiPMSXha6nYLzFUwe51O.jpg', 1, 'cheetos-crunchy', 1612463400, 1644566400, 1),
(62, 'Cheetos (Puffs)', 7, 2, '', 'Large (280g), Small (84g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'IZQTlHKtaRFXo4phOSiG.jpg', 1, 'cheetos-puffs', 1612463400, 1644566400, 0),
(63, 'Cheetos (Cheddar Jalapeno)', 7, 2, '', '310g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'Tx6BXkj0yanieSoYJfME.jpg', 1, 'cheetos-cheddar-jalapeno', 1612463400, 1644566400, 0),
(64, 'Chester\'s (Corn Twists)', 7, 2, '', '60g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'UeyIigMufYS2B9WldvRj.jpg', 1, 'chester-s-corn-twists', 1612463400, 1644566400, 0),
(73, 'Miss Vickie\'s (Sea Salt and Malt Vinegar)', 7, 2, '', 'Large (200g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '5lq7vzwD18WXontYMHb3.jpg', 1, 'miss-vickie-s-sea-salt-and-malt-vinegar', 1612809000, 1644566400, 0),
(74, 'Miss Vickie\'s (Original Recipe)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '6HnvQ0dOF3R2urEKafDw.jpg', 1, 'miss-vickie-s-original-recipe', 1612809000, 1644566400, 0),
(75, 'Miss Vickie\'s (Sweet Chili and Sour Cream)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'EDea0wJUsVQAt2MHhGic.jpg', 1, 'miss-vickie-s-sweet-chili-and-sour-cream', 1612809000, 1644566400, 0),
(76, 'Hickory Sticks (Original)', 7, 2, '', 'Large (275g), Small (90g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'XJGPMBUEc8pvlTj21mHI.jpg', 1, 'hickory-sticks-original', 1612809000, 1644566400, 1),
(77, 'Smartfood Popcorn (White Cheddar)', 7, 2, '', 'Large (200g), Small (50g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'IZpWkFimLguBCq17s4d0.jpg', 1, 'smartfood-popcorn-white-cheddar', 1612809000, 1644566400, 1),
(78, 'Old Dutch (Original)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'xUytArFahel2Z1JkMwQs.jpg', 1, 'old-dutch-original', 1612809000, 1644566400, 1),
(79, 'Old Dutch (Salt \'n Vinegar)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '34Uv7aXM6qTp1tnmlKQe.jpg', 1, 'old-dutch-salt-n-vinegar', 1612809000, 1644566400, 1),
(80, 'Old Dutch (Ketchup)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'HYyLbMxXwKdhkz1cZVmO.jpg', 1, 'old-dutch-ketchup', 1612809000, 1644566400, 1),
(81, 'Old Dutch (BBQ)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'NwukLtv0j6xUWn3prq4A.jpg', 1, 'old-dutch-bbq', 1612809000, 1644566400, 1),
(82, 'Old Dutch (Sour Cream \'n Onion)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'pzxdXAnTHWU7O1wyV9bK.jpg', 1, 'old-dutch-sour-cream-n-onion', 1612809000, 1644566400, 1),
(83, 'Old Dutch (All Dressed)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '2FgEzO0M536eLwj1qIRh.jpg', 1, 'old-dutch-all-dressed', 1612809000, 1644566400, 1),
(84, 'Old Dutch (Dill Pickle)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'LMmbUkite3IVgQFrTGRy.jpg', 1, 'old-dutch-dill-pickle', 1612809000, 1644566400, 1),
(85, 'Old Dutch (Crispy Bacon)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'pNEo10zfrGOQqUuZgAs9.jpg', 1, 'old-dutch-crispy-bacon', 1612809000, 1644566400, 0),
(86, 'Old Dutch (Cheddar and Sour Cream)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'fQKVkTEwgM5Ie2JoYXqP.jpg', 1, 'old-dutch-cheddar-and-sour-cream', 1612809000, 1644566400, 0),
(87, 'Old Dutch Rip-L (Mexican Chili)', 7, 2, '', 'Large (255g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'IjiaxQYp25zKdWHesGEN.jpg', 1, 'old-dutch-rip-l-mexican-chili', 1612809000, 1644566400, 1),
(88, 'Old Dutch Rip-L (Original)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '8odrPXQCglWBjK7GeUpJ.jpg', 1, 'old-dutch-rip-l-original', 1612809000, 1644566400, 0),
(89, 'Old Dutch Rip-L (Lightly Salted)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'jrAXxhEYCeSJQq6zbd2V.jpg', 1, 'old-dutch-rip-l-lightly-salted', 1612809000, 1644566400, 0),
(90, 'Old Dutch Rip-L (Sour Cream and Green Onion)', 7, 2, '', 'Large (255g), Small (66)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '70LNWiVY8jQxu1rBU2py.jpg', 1, 'old-dutch-rip-l-sour-cream-and-green-onion', 1612809000, 1644566400, 1),
(91, 'Old Dutch Rip-L (Smokey BBQ)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'JvAqkmpl75dKz4tF6N2L.jpg', 1, 'old-dutch-rip-l-smokey-bbq', 1612809000, 1644566400, 0),
(92, 'Old Dutch Rip-L (Creamy Dill)', 7, 2, '', 'Large (255g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'kch0KHUZpAYvXIseCVmz.jpg', 1, 'old-dutch-rip-l-creamy-dill', 1612809000, 1644566400, 0),
(93, 'Corn Chips (Original)', 7, 2, '', 'Large (320g), Small(85g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'IWGto8ERemFAxD0hzsJ3.jpg', 1, 'corn-chips-original', 1612809000, 1644566400, 1),
(94, 'Corn Chips (BBQ)', 7, 2, '', 'Large (320g), Small(85g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '9ZRXjVKvxfwinMEtd6Sm.jpg', 1, 'corn-chips-bbq', 1612809000, 1644566400, 1),
(95, 'Arriba (Nacho Cheese)', 7, 2, '', 'Large (245g), Small(84g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'uhwyGxkHAQfTVlRBainS.jpg', 1, 'arriba-nacho-cheese', 1612809000, 1644566400, 1),
(96, 'Arriba (Zesty Taco)', 7, 2, '', 'Large (245g), Small(84g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'DUoRyKhA243N8YiVsgjJ.jpg', 1, 'arriba-zesty-taco', 1612809000, 1644566400, 1),
(97, 'Arriba (Jalapeno Cheddar)', 7, 2, '', 'Large (245g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'cJ3DeopkY6H59GPn8fzQ.jpg', 1, 'arriba-jalapeno-cheddar', 1612809000, 1644566400, 0),
(98, 'Arriba (Creamy Guacamole)', 7, 2, '', 'Large (245g)', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'LCyFEfH9ZbiOvKUelcYo.jpg', 1, 'arriba-creamy-guacamole', 1612809000, 1644566400, 0),
(99, 'Dutch Crunch (Sea Salt and Malt Vinegar)', 7, 2, '', 'Large (200g), Small(66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'PRjckT8pa92LegfKFy5h.jpg', 1, 'dutch-crunch-sea-salt-and-malt-vinegar', 1612809000, 1644566400, 1),
(100, 'Dutch Crunch (Jalapeno and Cheddar)', 7, 2, '', 'Large (200g), Small(66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'EiAbNeFwPWVJ4c76m5T2.jpg', 1, 'dutch-crunch-jalapeno-and-cheddar', 1612809000, 1644566400, 1),
(101, 'Dutch Crunch (Mesquite BBQ)', 7, 2, '', 'Large (200g), Small(66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '5YLPui9Nh3yHvlVxIorR.jpg', 1, 'dutch-crunch-mesquite-bbq', 1612809000, 1644566400, 1),
(102, 'Dutch Crunch (Original)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'ARduTSLVUxFKHYQrwIo2.jpg', 1, 'dutch-crunch-original', 1612809000, 1644566400, 0),
(103, 'Dutch Crunch (Sour Cream and Dill)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '9Z0cWt1YodBsfxnmTPJH.jpg', 1, 'dutch-crunch-sour-cream-and-dill', 1612809000, 1644566400, 0),
(104, 'Dutch Crunch (Cracked Pepper and Balsamic Vinegar)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '8POa0X5edqRcmWiKyLzr.jpg', 1, 'dutch-crunch-cracked-pepper-and-balsamic-vinegar', 1612809000, 1644566400, 0),
(105, 'Dutch Crunch (Parmesan and Garlic)', 7, 2, '', 'Large (200g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'YbSeolxsWNm9GD87cUJu.jpg', 1, 'dutch-crunch-parmesan-and-garlic', 1612809000, 1644566400, 0),
(106, 'Ridgies (All Dressed)', 7, 2, '', 'Large (220g), Small (66g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'YzGj8ITcy4w0RKaU3hmP.jpg', 1, 'ridgies-all-dressed', 1612809000, 1644566400, 1),
(107, 'Ridgies (Spicy Salt and Vinegar)', 7, 2, '', 'Large (210g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'Olav0VYRD38txg7uo5mJ.jpg', 1, 'ridgies-spicy-salt-and-vinegar', 1612809000, 1644566400, 0),
(108, 'Ridgies (Sour Cream, Green Onion and Bacon)', 7, 2, '', 'Large (220g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'po68PMsLtgHjIZ0DUuzE.jpg', 1, 'ridgies-sour-cream-green-onion-and-bacon', 1612809000, 1644566400, 0),
(109, 'Cheese Pleesers Puffed', 7, 2, '', 'Large (265g), Small (65g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'IelgMwS7cxW6pXvzQuPB.jpg', 1, 'cheese-pleesers-puffed', 1612809000, 1644566400, 1),
(110, 'Popcorn Twists', 7, 2, '', 'Large (175g), Small (55g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'Ufsci7mIn34aESpkqwCu.jpg', 1, 'popcorn-twists', 1612809000, 1644566400, 1),
(111, 'Crunchys (Nacho Cheese)', 7, 2, '', 'Large (290g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'zCIKsTADFkEN8n5ZftlG.jpg', 1, 'crunchys-nacho-cheese', 1612809000, 1644566400, 0),
(112, 'Crunchys (Extreme Cheddar)', 7, 2, '', 'Large (290g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'ItZgr9Di1X75SYoONmPG.jpg', 1, 'crunchys-extreme-cheddar', 1612809000, 1644566400, 0),
(113, 'Party Mix (Original)', 7, 2, '', 'Large (280g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '15SueOVvDgsRUthT8G3A.jpg', 1, 'party-mix-original', 1612809000, 1644566400, 0),
(114, 'Party Mix (Cheesy)', 7, 2, '', 'Large (280g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'IkqNmbeiCzjEaUJTSo86.jpg', 1, 'party-mix-cheesy', 1612809000, 1644566400, 0),
(115, 'Party Mix (All Dressed)', 7, 2, '', 'Large (280g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'KDo8SZxAuOHC56jE3Rit.jpg', 1, 'party-mix-all-dressed', 1612809000, 1644566400, 0),
(116, 'Bac\'n Puffs', 7, 2, '', 'Large (100g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'HbN4ugzQZtVpsx0hLEY5.jpg', 1, 'bac-n-puffs', 1612809000, 1625122800, 0),
(117, 'Old Dutch Box (Rip-L)', 7, 2, '', '2 Fresh Packs (220g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'OckQSBK3IXpJM4bHCEPy.jpg', 1, 'old-dutch-box-rip-l', 1612809000, 1625122800, 0),
(118, 'Old Dutch Box (Ketchup)', 7, 2, '', '2 Fresh Packs (220g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'znSC4Qcraqm9RNGAvouY.jpg', 1, 'old-dutch-box-ketchup', 1612809000, 1625122800, 0),
(119, 'Old Dutch Box (BBQ)', 7, 2, '', '2 Fresh Packs (220g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'CsqT4w6k8OPzHhb95aEU.jpg', 1, 'old-dutch-box-bbq', 1612809000, 1625122800, 0),
(120, 'Old Dutch Box (Salt \'n Vinegar)', 7, 2, '', '2 Fresh Packs (220g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'UI8xT6leb7vDCJZMS9zr.jpg', 1, 'old-dutch-box-salt-n-vinegar', 1612809000, 1625122800, 0),
(121, 'Old Dutch Box (Onion \'n Garlic)', 7, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', '15p9DHcmIlG2bOEFaQjn.jpg', 1, 'old-dutch-box-onion-n-garlic', 1612809000, 1625122800, 0),
(122, 'Pretzels (Mini Twists)', 7, 2, '', 'Large (320g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'c2RVDdkgOyo6NEhIeTr9.jpg', 1, 'pretzels-mini-twists', 1612895400, 1625122800, 0),
(123, 'Pretzels (Thins)', 7, 2, '', 'Large (400g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '0nZtDBEyKGialU4Re71J.jpg', 1, 'pretzels-thins', 1612895400, 1625122800, 0),
(124, 'Pretzel Pieces (Honey Mustard and Onion)', 7, 2, '', '240g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.29\"}', '{\"menu\":\"\"}', 'OqyUhzXAGLW5kErmZbSg.jpg', 1, 'pretzel-pieces-honey-mustard-and-onion', 1612895400, 1625122800, 0),
(125, 'Pretzel Pieces (Cheddar Cheese)', 7, 2, '', '240g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.29\"}', '{\"menu\":\"\"}', 'ruvjDpJBAfSI1GyesdaN.jpg', 1, 'pretzel-pieces-cheddar-cheese', 1612895400, 1625122800, 0),
(126, 'Pretzel Pieces (Salted Caramel)', 7, 2, '', '240g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.29\"}', '{\"menu\":\"\"}', 'BIMxHDwnRiUzTkgyNqpm.jpg', 1, 'pretzel-pieces-salted-caramel', 1612895400, 1625122800, 0),
(127, 'Rold Gold Pretzels (Classic Dipped)', 7, 2, '', '198g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'nQPGwJV6so0t2ETudaXO.jpg', 1, 'rold-gold-pretzels-classic-dipped', 1612895400, 1625122800, 0),
(128, 'Pringles (Original)', 7, 2, '', 'Large (194g), Small (148g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'D6tZizGmHPeU5xY3gn4o.jpg', 1, 'pringles-original', 1612895400, 1627974000, 1),
(129, 'Pringles (BBQ)', 7, 2, '', 'Large (203g), Small (156g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'YxF3IUadtEqROBnkmPTS.jpg', 1, 'pringles-bbq', 1612895400, 1627974000, 1),
(130, 'Pringles (Ketchup)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'CaLryKQTGJIxZ2X0wAhR.jpg', 1, 'pringles-ketchup', 1612895400, 1625122800, 0),
(131, 'Pringles (Sour Cream and Onion)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'DOe7EtLkjnK698T14Z2F.jpg', 1, 'pringles-sour-cream-and-onion', 1612895400, 1625122800, 0),
(132, 'Pringles (Pizza)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'JQ8tjOKqoihzgXIH2lvC.jpg', 1, 'pringles-pizza', 1612895400, 1625122800, 0),
(133, 'Pringles (Salt and Vinegar)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'P9Q3sp1wcqZ8OaVULn6u.jpg', 1, 'pringles-salt-and-vinegar', 1612895400, 1625122800, 0),
(134, 'Pringles (Buffalo Ranch)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'Rga5ZGN49ETIzp1svXOK.jpg', 1, 'pringles-buffalo-ranch', 1612895400, 1625122800, 0),
(135, 'Pringles (Baconator)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'eyS7HDA629blCVwiErh5.jpg', 1, 'pringles-baconator', 1612895400, 1625122800, 0),
(136, 'Pringles (Jalapeno)', 7, 2, '', '156g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'RenVZqlT9kgXxtY4NJKz.jpg', 1, 'pringles-jalapeno', 1612895400, 1625122800, 0),
(137, 'Dan-D Pak Rice Crackers', 7, 2, '', 'Large (1kg), Medium (500g), Small (100g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.99\"}', '{\"menu\":\"\"}', 'l8syhSwNBgkda0ZFX5LK.jpg', 1, 'dan-d-pak-rice-crackers', 1612895400, 1627974000, 1),
(138, 'Bits and Bites (Original)', 7, 2, '', '175g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'syxMtbjoeSicLv84JrBD.jpg', 1, 'bits-and-bites-original', 1612895400, 1625122800, 0),
(139, 'Bits and Bites (Barbecue)', 7, 2, '', '175g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'z7ROlbqy4mksefVS6Jg2.jpg', 1, 'bits-and-bites-barbecue', 1612895400, 1625122800, 0),
(140, 'Bits and Bites (Cheddar)', 7, 2, '', '175g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '5vhLAxcpmuIFJT4rXWM6.jpg', 1, 'bits-and-bites-cheddar', 1612895400, 1625122800, 0),
(141, 'Crispers (Barbecue)', 7, 2, '', '175g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'pM1OqtvV4akNzor95wgX.jpg', 1, 'crispers-barbecue', 1612895400, 1625122800, 0),
(142, 'Crispers (Cheddar)', 7, 2, '', '175g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'M0t31cdPm5zCgxXFSTAK.jpg', 1, 'crispers-cheddar', 1612895400, 1625122800, 0),
(143, 'Bugles (Original)', 7, 2, '', '85g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'wPD9M0fBJLpN7yX2CWxc.jpg', 1, 'bugles-original', 1612895400, 1625122800, 0),
(162, 'Coca-Cola can (355ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.00\"}', '{\"menu\":\"\"}', 'U7Ro3XAdrtEWDnYfNzuh.jpg', 1, 'coca-cola-can-355ml', 1613068200, 1625122800, 0),
(163, 'Pepsi can (355ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.00\"}', '{\"menu\":\"\"}', 'NxSP51acCGo3jhXI8byH.jpg', 1, 'pepsi-can-355ml', 1613068200, 1625122800, 0),
(164, 'Coca-Cola', 22, 2, '', 'Large (1L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'V4xjghqLARyM36X8Cdba.jpg', 1, 'coca-cola', 1613068200, 1643875200, 1),
(165, 'Diet Coke', 22, 2, '', 'Large (1L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', '4NjOQ9SPufHJ2kzoTgnR.jpg', 1, 'diet-coke', 1613068200, 1643875200, 1),
(166, 'Coke Zero', 22, 2, '', 'Large (1L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'RJsgeyS6hti2I7nAbqFZ.jpg', 1, 'coke-zero', 1613068200, 1643875200, 1),
(167, 'Canada Dry', 22, 2, '', 'Large (1L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'kuv95dmxDjEQ6aLY1ReG.jpg', 1, 'canada-dry', 1613068200, 1643875200, 0),
(168, 'Sprite', 22, 2, '', 'Large (1L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'VCo9w8OmxQYurPJfDZb4.jpg', 1, 'sprite', 1613068200, 1643875200, 1),
(169, 'Canada Dry (Cranberry 500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'gZYWxq0pQOfl32sRojrM.jpg', 1, 'canada-dry-cranberry-500ml', 1613068200, 1643875200, 0),
(170, 'Canada Dry (Diet 500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'VyRfEvdhsc2XTIS6FWQN.jpg', 1, 'canada-dry-diet-500ml', 1613068200, 1643875200, 0),
(171, 'Fanta', 22, 2, '', '500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'pdl56OF8JaYjCX2BHNwm.jpg', 1, 'fanta', 1613068200, 1643875200, 0),
(172, 'Barq\'s Root Beer (500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'NWHmYrI6n51ZJdKQg8w7.jpg', 1, 'barq-s-root-beer-500ml', 1613068200, 1643875200, 0),
(173, 'Barq\'s Cherry Bite (500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', '0uKVMYf1lxbaDwi9gRGH.jpg', 1, 'barq-s-cherry-bite-500ml', 1613068200, 1643875200, 0),
(174, 'A and W Root Beer', 22, 2, '', '500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', '8rizs91qAYILOyPuT3jx.jpg', 1, 'a-and-w-root-beer', 1613068200, 1643875200, 0),
(175, 'Cool Iced Tea', 22, 2, '', '500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'BKLlrF58vVM3ngJ9mHw2.jpg', 1, 'cool-iced-tea', 1613068200, 1643875200, 0),
(176, 'Fresca (500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'h9fFgVByOklj6pqdrxaR.jpg', 1, 'fresca-500ml', 1613068200, 1643875200, 0),
(177, 'Monster Energy (Original)', 22, 2, '', 'Large (710ml), Small (473ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', '7ScObK5eEBRYLWqUvTQl.jpg', 1, 'monster-energy-original', 1613068200, 1628146800, 1),
(178, 'Monster Energy (Zero Ultra 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'Oc8SU1y6nMRu7klI4sj5.jpg', 1, 'monster-energy-zero-ultra-473ml', 1613068200, 1625209200, 0),
(179, 'Monster Energy (Ultra Violet 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'ISMejQhrFW2yYw9O1Bbs.jpg', 1, 'monster-energy-ultra-violet-473ml', 1613068200, 1625209200, 0),
(180, 'Monster Energy (Ultra Rosa 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'fql2xauGsyiMVbw9Pezt.jpg', 1, 'monster-energy-ultra-rosa-473ml', 1613068200, 1625209200, 0),
(181, 'Monster Energy (Ultra Sunrise 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'Rqv8UHAabiV5hsmdSDPG.jpg', 1, 'monster-energy-ultra-sunrise-473ml', 1613068200, 1625209200, 0),
(182, 'Monster Energy (Ultra Paradise 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'XjUNkwAGTaDFitYM6fl9.jpg', 1, 'monster-energy-ultra-paradise-473ml', 1613068200, 1625122800, 0),
(183, 'Monster Energy (Ultra Blue 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'jbhE0xLdou74lOYAVaJR.jpg', 1, 'monster-energy-ultra-blue-473ml', 1613068200, 1625122800, 0),
(184, 'Monster Energy (Mango Loco 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'rdFewCJ94PcYy2TtkM8s.jpg', 1, 'monster-energy-mango-loco-473ml', 1613068200, 1625122800, 0),
(185, 'Monster Energy (Pacific Punch 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'Cl59SwzM23OfvxZ8QYUI.jpg', 1, 'monster-energy-pacific-punch-473ml', 1613068200, 1625122800, 0),
(186, 'Monster Energy (Pipeline Punch 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'eFbJTmi63XBfq4O7CMyl.jpg', 1, 'monster-energy-pipeline-punch-473ml', 1613068200, 1625122800, 0),
(187, 'Monster Hydro (Purple Passion 550ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'pAM12vHWJjirhVYq9duS.jpg', 1, 'monster-hydro-purple-passion-550ml', 1613068200, 1625209200, 0),
(188, 'Monster Hydro (Blue Ice 550ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', '390oJexNnzWIviX8FsZD.jpg', 1, 'monster-hydro-blue-ice-550ml', 1613068200, 1625209200, 0),
(189, 'Monster Hydro (Mean Green 550ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'k71rLmtnMWPSu8GHaQzo.jpg', 1, 'monster-hydro-mean-green-550ml', 1613068200, 1625209200, 0),
(190, 'Monster Energy (Original 4x473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"11.59\"}', '{\"menu\":\"\"}', 'lT6qiEYa3rC5nAJ7e2NF.jpg', 1, 'monster-energy-original-4x473ml', 1613068200, 1625209200, 0),
(191, 'Nos (Original 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'bhCBl8vu3jcOqafgY4wS.jpg', 1, 'nos-original-473ml', 1613068200, 1625209200, 0),
(192, 'Nos (GT Grape 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'DdsjXAgROYi0KbxPh25m.jpg', 1, 'nos-gt-grape-473ml', 1613068200, 1625209200, 0),
(193, 'Nos (Sonic Sour 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'lq9mWH8xhGcXIgQDdCY6.jpg', 1, 'nos-sonic-sour-473ml', 1613068200, 1625209200, 0),
(194, 'Reign (Lemon HDZ 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'FRusdX80Ex1w4LKoDjaV.jpg', 1, 'reign-lemon-hdz-473ml', 1613068200, 1625209200, 0),
(195, 'Reign (Sour Apple 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'ng5INlTiVfqBKE3aRbFp.jpg', 1, 'reign-sour-apple-473ml', 1613068200, 1625209200, 0),
(196, 'Reign (Razzle Berry 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'GpCmJ5DqtB2FVjT9eiz4.jpg', 1, 'reign-razzle-berry-473ml', 1613068200, 1625209200, 0),
(197, 'Reign (Melon Mania 473ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'oI8QUHfS2jRgCA5rlwzt.jpg', 1, 'reign-melon-mania-473ml', 1613068200, 1625209200, 0),
(198, 'Powerade (Fruit Punch 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'vnsGauKJ24rT6WCjtD5P.jpg', 1, 'powerade-fruit-punch-710ml', 1613068200, 1643875200, 0),
(199, 'Powerade (Mixed Berry 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'N8Admf2BxXtRZqFLojTs.jpg', 1, 'powerade-mixed-berry-710ml', 1613068200, 1643875200, 0),
(200, 'Powerade (Strawberry Lemonade 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', '9youUaOcHtDYZmib4SMK.jpg', 1, 'powerade-strawberry-lemonade-710ml', 1613068200, 1643875200, 0),
(201, 'Powerade (Melon Pineapple 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', '0ySN87XmawkPE693YvG4.jpg', 1, 'powerade-melon-pineapple-710ml', 1613068200, 1643875200, 0),
(202, 'Powerade (Grape 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'DW5szi8aBRPdxFVAJ6Ee.jpg', 1, 'powerade-grape-710ml', 1613068200, 1643875200, 0),
(203, 'Powerade (Orange 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'rhakZfgBUoexQsXLFbJ2.jpg', 1, 'powerade-orange-710ml', 1613068200, 1643875200, 0),
(204, 'Powerade Zero Sugar (Blue Raspberry 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', '6FZAwI89lryCvD0dgtUi.jpg', 1, 'powerade-zero-sugar-blue-raspberry-710ml', 1613068200, 1643875200, 0),
(205, 'Powerade Ultra (White Cherry 710ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'Da4F6quzjsBAhTcIrtZb.jpg', 1, 'powerade-ultra-white-cherry-710ml', 1613068200, 1643875200, 0),
(206, 'Gold Peak Tea (Lemon 547ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.49\"}', '{\"menu\":\"\"}', 'DmReXPFiJHSOATQE8VIG.jpg', 1, 'gold-peak-tea-lemon-547ml', 1613068200, 1625209200, 0),
(207, 'Gold Peak Tea (Raspberry 547ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.49\"}', '{\"menu\":\"\"}', 'WtYcvXmzZuTaM3DSiH8n.jpg', 1, 'gold-peak-tea-raspberry-547ml', 1613068200, 1625209200, 0),
(208, 'Nestea (Lemon 500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'ENaUxycPs04FbroMJWHi.jpg', 1, 'nestea-lemon-500ml', 1613068200, 1643875200, 0),
(209, 'Nestea Zero Sugar (Lemon 500ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'BJOqpgP3dnYFtaj8bUci.jpg', 1, 'nestea-zero-sugar-lemon-500ml', 1613068200, 1643875200, 0),
(210, 'Minute Maid (Orange 355ml)', 23, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.39\"}', '{\"menu\":\"\"}', 'XxpSmB1vMiJcQDkTrjYW.jpg', 1, 'minute-maid-orange-355ml', 1613068200, 1633417200, 0),
(211, 'Minute Maid (Apple 355ml)', 23, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.39\"}', '{\"menu\":\"\"}', 'Gv9IFdVHoXSebqu2tQK8.jpg', 1, 'minute-maid-apple-355ml', 1613068200, 1633417200, 0),
(212, 'Peace Tea (Razzleberry 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'BiwWUTvKZ9CuYrmO2eIE.jpg', 1, 'peace-tea-razzleberry-695ml', 1613068200, 1643875200, 0),
(213, 'Peace Tea (Peach 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'CBWQ32gr8DsjvIX0ymUP.jpg', 1, 'peace-tea-peach-695ml', 1613068200, 1643875200, 0),
(214, 'Peace Tea (Cheeky Cherry 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'eVHRbEOpWj270hPasBix.jpg', 1, 'peace-tea-cheeky-cherry-695ml', 1613068200, 1643875200, 0),
(215, 'Peace Tea (Sno-Berry 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'WzlFACjJ3wm8k5B6fbxd.jpg', 1, 'peace-tea-sno-berry-695ml', 1613068200, 1643875200, 0),
(216, 'Peace Tea (Tea + Lemonade 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'CN1hQdzyOcVKkwJtaWjF.jpg', 1, 'peace-tea-tea-lemonade-695ml', 1613068200, 1643875200, 0),
(217, 'Peace Tea (Mango Green Tea 695ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'xsoTBlHQgWih7X23GrD4.jpg', 1, 'peace-tea-mango-green-tea-695ml', 1613068200, 1643875200, 0),
(220, 'Vitaminwater (acai blueberry pomegranate 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'clgGBu0qf9UZPDLmny2d.jpg', 1, 'vitaminwater-acai-blueberry-pomegranate-591ml', 1613413800, 1643875200, 0),
(221, 'Vitaminwater (lemonade 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'JDZxRgvikVo1CGaQXhsA.jpg', 1, 'vitaminwater-lemonade-591ml', 1613413800, 1643875200, 0),
(222, 'Vitaminwater (orange 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'lgIhcVRE2nwmQreUoqGM.jpg', 1, 'vitaminwater-orange-591ml', 1613413800, 1643875200, 0),
(223, 'Vitaminwater Zero Sugar (acai blueberry pomegranate 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'FGPODtSZ9epaicXbmYIo.jpg', 1, 'vitaminwater-zero-sugar-acai-blueberry-pomegranate-591ml', 1613413800, 1643875200, 0),
(224, 'Vitamin Water Zero Sugar (lemonade 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'wyziXYord8D0lhHWbGfM.jpg', 1, 'vitamin-water-zero-sugar-lemonade-591ml', 1613413800, 1643875200, 0),
(225, 'Vitamin Water Zero Sugar (orange 591ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'k1GZNle97AOxBJwMprLS.jpg', 1, 'vitamin-water-zero-sugar-orange-591ml', 1613413800, 1643875200, 0),
(226, 'Core Power (Chocolate 414ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'apOBCEqy7dmL3gebURco.jpg', 1, 'core-power-chocolate-414ml', 1613413800, 1643875200, 0),
(227, 'Core Power (Vanilla 414ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'jYC5JPvhD7KdrVAXmIZk.jpg', 1, 'core-power-vanilla-414ml', 1613413800, 1643875200, 0),
(228, 'Core Power (Strawberry Banana 414ml)', 22, 2, '', '', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '6pAGoqfNEFhcHvjVRLJ4.jpg', 1, 'core-power-strawberry-banana-414ml', 1613413800, 1643875200, 0),
(229, 'Tim Hortons (Iced Capp original)', 22, 2, '', '340ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'VPmAd1vExJBTwMXRo4rq.jpg', 1, 'tim-hortons-iced-capp-original', 1613413800, 1625209200, 0),
(230, 'Tim Hortons (Iced Coffee)', 22, 2, '', '340ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'baE1KFh9tcOBWvPMVioq.jpg', 1, 'tim-hortons-iced-coffee', 1613413800, 1625209200, 0),
(231, 'Dasani Water', 41, 2, '', 'Small (591ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.79\"}', '{\"menu\":\"\"}', 'PreckFCsX4YOZBz1VqJt.jpg', 1, 'dasani-water', 1613413800, 1633590000, 0),
(232, 'Smartwater', 41, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'qVbRg9Z0xmcPwKAJ6WIr.jpg', 1, 'smartwater', 1613413800, 1633590000, 0),
(233, 'Smartwater (alkaline 9+pH)', 41, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'VZecWpwNovPX3rAMDtJx.jpg', 1, 'smartwater-alkaline-9-ph', 1613413800, 1633417200, 0),
(234, 'Smartwater (antioxidant)', 41, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '5yMb1Ch9aqPOAXzwGfg2.jpg', 1, 'smartwater-antioxidant', 1613413800, 1633417200, 0),
(235, 'Pure Life Water', 41, 2, '', 'Large (1.5L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.99\"}', '{\"menu\":\"\"}', 'UQIr3iuVlJcXODnvepE8.jpg', 1, 'pure-life-water', 1613413800, 1633417200, 1),
(236, 'Pure Life Water Case', 41, 2, '', '24 x 500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.99\"}', '{\"menu\":\"\"}', '5pMna0QvkW6fBgjxqTDY.jpg', 1, 'pure-life-water-case', 1613413800, 1633417200, 0),
(238, 'Pepsi', 22, 2, '', 'Large (1L), Small (591ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'FdVoJ7wMUQKaXHgYhuZc.jpg', 1, 'pepsi', 1613500200, 1628146800, 1),
(239, 'Diet Pepsi', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'PywzdINJf5xhqeOaG0EQ.jpg', 1, 'diet-pepsi', 1613500200, 1625295600, 0),
(240, 'Pepsi Zero', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'sXeRB3mYPjWG8htLkg0q.jpg', 1, 'pepsi-zero', 1613500200, 1625295600, 0),
(241, 'Mountain Dew', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'r2tWPvXAbop3Y0IGSuKe.jpg', 1, 'mountain-dew', 1613500200, 1625295600, 0),
(242, '7UP', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'nfRDUzb10jyVSgXkraB5.jpg', 1, '7up', 1613500200, 1625295600, 0),
(243, 'Crush (Orange)', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'Bs9VNCSY4l7I5JPgMxzR.jpg', 1, 'crush-orange', 1613500200, 1625295600, 0),
(244, 'Crush (Grape)', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'xvFbIpKG8ALSsCzyt0nH.jpg', 1, 'crush-grape', 1613500200, 1625295600, 0),
(245, 'Crush (Cream Soda)', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'MUfx7PwAXT2Cb5yzSQRD.jpg', 1, 'crush-cream-soda', 1613500200, 1625295600, 0),
(246, 'Dr Pepper', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'wv68lVXOunKcUr0jyMzQ.jpg', 1, 'dr-pepper', 1613500200, 1625295600, 0),
(247, 'Mug Root Beer', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'l92DvdkfhKbsNIVmcXwP.jpg', 1, 'mug-root-beer', 1613500200, 1625295600, 0),
(248, 'Brisk Iced Tea', 22, 2, '', '591ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'KDcrLvYEAaWUXo8QmGb4.jpg', 1, 'brisk-iced-tea', 1613500200, 1625209200, 0),
(249, 'Pepsi King Can', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.79\"}', '{\"menu\":\"\"}', 'D7l80NGxCZjnBF9SLbrt.jpg', 1, 'pepsi-king-can', 1613500200, 1625209200, 0),
(250, 'Mountain Dew Kickstart (Orange)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'jRd09YUCIyrm2oLazQbe.jpg', 1, 'mountain-dew-kickstart-orange', 1613500200, 1625295600, 0),
(251, 'Rockstar Punched (Fruit Punch)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'FnqScedp0azj7AG9ROvH.jpg', 1, 'rockstar-punched-fruit-punch', 1613500200, 1643875200, 0),
(252, 'Rockstar Pure Zero (Punched)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'XlgHF8PcbeQaxjLOyqrz.jpg', 1, 'rockstar-pure-zero-punched', 1613500200, 1643875200, 0),
(253, 'Rockstar Pure Zero (Watermelon)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'M64NcZr1AmjQIkdRagqD.jpg', 1, 'rockstar-pure-zero-watermelon', 1613500200, 1643875200, 0),
(254, 'Rockstar Pure Zero (Mandarin Orange)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'YSc0vrQCylDUebkWnXKJ.jpg', 1, 'rockstar-pure-zero-mandarin-orange', 1613500200, 1643875200, 0),
(255, 'Rockstar Pure Zero (Silver Ice)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'aSewPX6d0DEx4TnCbkMp.jpg', 1, 'rockstar-pure-zero-silver-ice', 1613500200, 1643875200, 0),
(256, 'Rockstar XD Thermo (Marshmallow)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'cqSbVehaYIGxyjBEQsvp.jpg', 1, 'rockstar-xd-thermo-marshmallow', 1613500200, 1643875200, 0),
(257, 'Rockstar XD Thermo (Hardcore Apple)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'H6tgF4GCldxyWf5B719E.jpg', 1, 'rockstar-xd-thermo-hardcore-apple', 1613500200, 1643875200, 0);
INSERT INTO `food_menus` (`id`, `name`, `category_id`, `restaurant_id`, `items`, `details`, `nutrition_fact`, `servings`, `availability`, `has_discount`, `price`, `discounted_price`, `thumbnail`, `thumb_status`, `slug`, `created_at`, `updated_at`, `has_variant`) VALUES
(258, 'Rockstar Revolt (Killer Black Cherry)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', '8kYKFalZ96Jf1Ho7tjiz.jpg', 1, 'rockstar-revolt-killer-black-cherry', 1613500200, 1643875200, 0),
(259, 'Rockstar Revolt (Killer Blue Raz)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'TtmUkaVylqFxZOhMR73G.jpg', 1, 'rockstar-revolt-killer-blue-raz', 1613500200, 1643875200, 0),
(260, 'Rockstar Revolt (Killer Grape)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'zVMi2ESRcufjpmQKFAUl.jpg', 1, 'rockstar-revolt-killer-grape', 1613500200, 1643875200, 0),
(261, 'Starbucks Frappuccino (Mocha)', 22, 2, '', '405ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'rXcKmjJ6NV0R3DvFOgAa.jpg', 1, 'starbucks-frappuccino-mocha', 1613500200, 1625295600, 0),
(262, 'Starbucks Frappuccino (Vanilla)', 22, 2, '', '405ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '2jgSFEtdPce3sMHkzywW.jpg', 1, 'starbucks-frappuccino-vanilla', 1613500200, 1625295600, 0),
(263, 'Starbucks Doubleshot (Vanilla)', 22, 2, '', '444ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'iubk5UQL0zFxJRV1fWZY.jpg', 1, 'starbucks-doubleshot-vanilla', 1613500200, 1625295600, 0),
(264, 'Starbucks Doubleshot (Mocha)', 22, 2, '', '444ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '4wfhxvzKjSRGX8Zmi7c0.jpg', 1, 'starbucks-doubleshot-mocha', 1613500200, 1625295600, 0),
(265, 'Pure Leaf Iced Tea (Peach)', 22, 2, '', '547ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'ac8o3PvE1ywKxCVWqOJM.jpg', 1, 'pure-leaf-iced-tea-peach', 1613500200, 1625295600, 0),
(266, 'Pure Leaf Iced Tea (Lemon)', 22, 2, '', '547ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'WYi4eq2R35dw9xzI60kF.jpg', 1, 'pure-leaf-iced-tea-lemon', 1613500200, 1625295600, 0),
(267, 'Pure Leaf Iced Tea (Honey Green Tea)', 22, 2, '', '547ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'Z8dPAbjpXUYRcwvTN530.jpg', 1, 'pure-leaf-iced-tea-honey-green-tea', 1613500200, 1625295600, 0),
(268, 'Dole Juice (Orange)', 23, 2, '', '450ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.39\"}', '{\"menu\":\"\"}', 'IASDK1XFf0hZMvNpRElQ.jpg', 1, 'dole-juice-orange', 1613500200, 1633503600, 0),
(269, 'Dole Juice (Apple)', 23, 2, '', '450ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.39\"}', '{\"menu\":\"\"}', '3L6oXtTiA21UYydO5Qeu.jpg', 1, 'dole-juice-apple', 1613500200, 1633503600, 0),
(270, 'Gatorade (Cool Blue)', 22, 2, '', '710ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'xCFVcRuldHT0b9ZUIWsK.jpg', 1, 'gatorade-cool-blue', 1613500200, 1625295600, 0),
(271, 'Gatorade (Orange)', 22, 2, '', '710ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'CnORg5hMIubGad3xAfWN.jpg', 1, 'gatorade-orange', 1613500200, 1625295600, 0),
(272, 'Gatorade (Grape)', 22, 2, '', '710ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'JXa4F17q80bOkQRmjx6z.jpg', 1, 'gatorade-grape', 1613500200, 1625295600, 0),
(273, 'Gatorade (Fruit Punch)', 22, 2, '', '710ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', '2DK45Yctp9B8hylGgQaC.jpg', 1, 'gatorade-fruit-punch', 1613500200, 1625295600, 0),
(274, 'Aquafina Water', 41, 2, '', 'Large (1L), Small (591ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.79\"}', '{\"menu\":\"\"}', 'JtYLCzviGTfX3kQ0ZpyM.jpg', 1, 'aquafina-water', 1613500200, 1633417200, 1),
(275, 'Snapple (Lemonade)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'dnPelpy8BZGYW93hmQ5t.jpg', 1, 'snapple-lemonade', 1613500200, 1625295600, 0),
(276, 'Snapple (Raspberry Tea)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'DBNHyaJicoCVMLXKIwsT.jpg', 1, 'snapple-raspberry-tea', 1613500200, 1625295600, 0),
(277, 'Snapple (Lemon Tea)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'jQlYKGaIh9toPgxVymNk.jpg', 1, 'snapple-lemon-tea', 1613500200, 1625295600, 0),
(278, 'Snapple (Kiwi Strawberry)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'a6h7YczCWxgX1OKu8ylV.jpg', 1, 'snapple-kiwi-strawberry', 1613500200, 1625295600, 0),
(279, 'Snapple (Pomegranate Raspberry)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', '5Cg9cDxEqXTJ6Nmd7u3s.jpg', 1, 'snapple-pomegranate-raspberry', 1613500200, 1625295600, 0),
(282, 'Snapple (Half \'n Half)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'BMJNnoephmOxIHw6CS2k.jpg', 1, 'snapple-half-n-half', 1614105000, 1625295600, 0),
(283, 'Snapple (Mango Madness)', 22, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'Fn8qm6QJBXRsu5hdra3y.jpg', 1, 'snapple-mango-madness', 1614105000, 1625295600, 0),
(289, 'Jones (Berry Lemonade Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'YoXtyFCRW2eH0JznLOM5.jpg', 1, 'jones-berry-lemonade-soda', 1614105000, 1625295600, 0),
(290, 'Jones (Orange and Cream Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'GEzCB8IHJltVc4WALyN7.jpg', 1, 'jones-orange-and-cream-soda', 1614105000, 1625295600, 0),
(291, 'Jones (Root Beer)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'LgDvaXYSl2UzpexoHsW9.jpg', 1, 'jones-root-beer', 1614105000, 1625295600, 0),
(292, 'Jones (Strawberry Lime Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'rCIRXy8V2L10TjeBSfm4.jpg', 1, 'jones-strawberry-lime-soda', 1614105000, 1625295600, 0),
(293, 'Jones (Cream Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'eIuyHidOEGSwJB2KnDLU.jpg', 1, 'jones-cream-soda', 1614105000, 1625295600, 0),
(294, 'Jones (Green Apple Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'FBkptQlcNsP9KCRv8H4Z.jpg', 1, 'jones-green-apple-soda', 1614105000, 1625295600, 0),
(295, 'Jones (Blue Bubblegum Soda)', 22, 2, '', '355ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', '2znK0N1lHRrbGOyfC3ZQ.jpg', 1, 'jones-blue-bubblegum-soda', 1614105000, 1625295600, 0),
(299, 'Aloe Vera Drink', 22, 2, '', '1.5L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '5tneMHRgNO4LWDSmCjPq.jpg', 1, 'aloe-vera-drink', 1614105000, 1625295600, 0),
(300, 'Sunny D (Smooth Orange)', 23, 2, '', '500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'S8qdIi1rVb9MmJ4wXaPF.jpg', 1, 'sunny-d-smooth-orange', 1614105000, 1633417200, 0),
(301, 'Sunny D (Tangy Orange)', 23, 2, '', '500ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', '0SG92yriVIPlLudjcsJg.jpg', 1, 'sunny-d-tangy-orange', 1614105000, 1633417200, 0),
(302, 'Sunny D (Orange Strawberry)', 23, 2, '', 'Large (1.18L), Small (500ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', '3tfA58eUk2QBVYm9c4Hv.jpg', 1, 'sunny-d-orange-strawberry', 1614105000, 1633417200, 1),
(303, 'Sunny D (Orange Mango)', 23, 2, '', '1.18L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'c6jT85QnLxYGdwlofEsI.jpg', 1, 'sunny-d-orange-mango', 1614105000, 1633417200, 0),
(309, 'Minute Maid (Orange)', 23, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '9ofMdAipx6DS0qjTbmXc.jpg', 1, 'minute-maid-orange', 1615228200, 1633417200, 0),
(310, 'Sunrype (Apple)', 23, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'E5NQM1WUbH0kFqzDeGhx.jpg', 1, 'sunrype-apple', 1615228200, 1633417200, 0),
(311, 'Sunrype (Pineapple)', 23, 2, '', '900ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'tau6Y7Bzs4PAkC2R3HO0.jpg', 1, 'sunrype-pineapple', 1615228200, 1633417200, 0),
(312, '5-hour Energy (Sour Apple)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'xAm5i78uYleWLBMZbryS.jpg', 1, '5-hour-energy-sour-apple', 1615228200, 1625295600, 0),
(313, '5-hour Energy (Grape)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'EYfp1SWa4t0UCdNcbvz7.jpg', 1, '5-hour-energy-grape', 1615228200, 1625295600, 0),
(314, '5-hour Energy (Berry)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'xnUMctAiNLbhoR6s07BP.jpg', 1, '5-hour-energy-berry', 1615228200, 1625295600, 0),
(315, '5-hour Energy (Peach Mango)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'Awnz8LSpH5lYyRbDCOEk.jpg', 1, '5-hour-energy-peach-mango', 1615228200, 1625295600, 0),
(316, '5-hour Energy (Blue Raspberry)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'f2nx04PsJpHzcQYGI9kC.jpg', 1, '5-hour-energy-blue-raspberry', 1615228200, 1625295600, 0),
(317, '5-hour Energy (Tropical Burst)', 22, 2, '', '57ml Extra Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', 'JnguUsyOzRwVI4ekhlxP.jpg', 1, '5-hour-energy-tropical-burst', 1615228200, 1625295600, 0),
(318, '5-hour Energy (Grape)', 22, 2, '', '57ml Regular Strength', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.60\"}', '{\"menu\":\"\"}', '3rkDNwWAXsl496cvz0jh.jpg', 1, '5-hour-energy-grape', 1615228200, 1625295600, 0),
(319, 'Red Bull', 22, 2, '', 'Large (473ml), Medium (335ml), Small (250ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.29\"}', '{\"menu\":\"\"}', 'WbGDFjci7B4fx6AoneH1.jpg', 1, 'red-bull', 1615228200, 1628146800, 1),
(320, 'Red Bull Sugarfree', 22, 2, '', 'Large (473ml), Medium (335ml), Small (250ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.29\"}', '{\"menu\":\"\"}', 'anJFU1YP39IeXb6rg0Gz.jpg', 1, 'red-bull-sugarfree', 1615228200, 1628146800, 1),
(321, 'Snickers', 28, 2, '', '52g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'XpkiQFa2RVmrxW7joGHM.jpg', 1, 'snickers', 1615401000, 1625122800, 0),
(322, 'Kitkat', 28, 2, '', 'Large (73g), Small (45g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'nAO2fpDx60bwXcmhZMra.jpg', 1, 'kitkat', 1615401000, 1628146800, 1),
(323, 'Kitkat Chunky', 28, 2, '', 'Large (64g), Small (49g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'MOaCepGsqB2H5m4wAzXR.jpg', 1, 'kitkat-chunky', 1615401000, 1628146800, 0),
(324, 'Reese', 28, 2, '', '46g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'plj418J3AaV2UH9buveW.jpg', 1, 'reese', 1615401000, 1625122800, 0),
(325, 'Twix', 28, 2, '', '50g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '37ogvLQ4emu6qPpZCKyS.jpg', 1, 'twix', 1615401000, 1625122800, 0),
(326, 'Mars', 28, 2, '', 'Large (85g), Small (52g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.68\"}', '{\"menu\":\"\"}', 'NlsRO40eZPVHfJXdCMFT.jpg', 1, 'mars', 1615401000, 1633590000, 0),
(327, 'Coffee Crisp', 28, 2, '', 'Large (75g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.68\"}', '{\"menu\":\"\"}', '6FckMXtSDE8jHu4afLKO.jpg', 1, 'coffee-crisp', 1615401000, 1625122800, 0),
(328, 'Aero', 28, 2, '', '42g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'Nb0Ia6jwvxDKYQqH3CR2.jpg', 1, 'aero', 1615401000, 1625122800, 0),
(329, '3 Musketeers', 28, 2, '', '54g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '2osmYpZ0rzSg5ihwItVK.jpg', 1, '3-musketeers', 1615401000, 1625122800, 0),
(330, 'Wunderbar', 28, 2, '', '58g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'R6vdxbetq89DZGc5VLak.jpg', 1, 'wunderbar', 1615401000, 1625122800, 0),
(331, 'OHenry', 28, 2, '', '58g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'fIXWBwcUhLH5zKl07VO6.jpg', 1, 'ohenry', 1615401000, 1625122800, 0),
(332, 'Eat-More', 28, 2, '', '52g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'asKAMIFovd2SONi1zTbG.jpg', 1, 'eat-more', 1615401000, 1625122800, 0),
(333, 'Mirage', 28, 2, '', '41g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'dwQYsUhxX5vo1LlypVZP.jpg', 1, 'mirage', 1615401000, 1625122800, 0),
(334, 'Hershey’s Whole Almonds', 28, 2, '', '43g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'gqjIiRa2okGSQsxZOYXD.jpg', 1, 'hershey-s-whole-almonds', 1615401000, 1625122800, 0),
(335, 'Teasers', 28, 2, '', '35g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '95CwkmgHxa4BYz6l3i7o.jpg', 1, 'teasers', 1615573800, 1625122800, 0),
(336, 'O Henry Level up', 28, 2, '', '42g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'JqG608vwnQPARu2tYdyc.jpg', 1, 'o-henry-level-up', 1615573800, 1625122800, 0),
(337, 'Bounty', 28, 2, '', 'Large (85g), Small (57g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.68\"}', '{\"menu\":\"\"}', 'x7GmsHhMP430jAkbtwZV.jpg', 1, 'bounty', 1615573800, 1633590000, 0),
(338, 'Dairy Milk', 28, 2, '', '42g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'SmICV2b9swNupqhGLKcJ.jpg', 1, 'dairy-milk', 1615573800, 1625122800, 0),
(339, 'Smarties', 28, 2, '', '75g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.68\"}', '{\"menu\":\"\"}', 'js9UDhSgyxIC4YGWMtZL.jpg', 1, 'smarties', 1615573800, 1625122800, 0),
(343, 'm and m’s ( Milk Chocolate)', 28, 2, '', '120g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'i5Sz9YqJXPAgU48tMaxG.jpg', 1, 'm-and-m-s-milk-chocolate', 1616178600, 1625122800, 0),
(344, 'Maynards (Fuzzy Peach)', 28, 2, '', 'Small (185g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'CFLX1KlQuzA0nwTgSER9.jpg', 1, 'maynards-fuzzy-peach', 1616178600, 1633590000, 0),
(345, 'Maynards (Swedish Berries)', 28, 2, '', 'Small (185g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'mcBjMAJ4Y9wWsnaxelTi.jpg', 1, 'maynards-swedish-berries', 1616265000, 1633590000, 0),
(346, 'Maynards Sour Patch kids (Sour Cherry Blasters)', 28, 2, '', 'Small (185g)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'Ogp7GTHZErMCsdNKhIDQ.jpg', 1, 'maynards-sour-patch-kids-sour-cherry-blasters', 1616265000, 1633590000, 0),
(348, 'Maynards Sour Patch kids (Tropical)', 28, 2, '', '185g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'TAZEyCfSqzsuQp6DU0vJ.jpg', 1, 'maynards-sour-patch-kids-tropical', 1616524200, 1625122800, 0),
(349, 'Maynards (Sour Wine gums)', 28, 2, '', '170g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', '1VgETeIjKr5n6AxtQ8oq.jpg', 1, 'maynards-sour-wine-gums', 1616524200, 1625122800, 0),
(350, 'm and m’s (Almond)', 28, 2, '', '110g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'gBwALHq2NQcj5ImPV16J.jpg', 1, 'm-and-m-s-almond', 1616524200, 1625122800, 0),
(351, 'Skittles (Original)', 28, 2, '', '191g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'xr2INfGJWadTis9n8elK.jpg', 1, 'skittles-original', 1616524200, 1625122800, 0),
(352, 'Skittles (Tropical)', 28, 2, '', '191g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'VP75XeNhvMaYqdRAWlrK.jpg', 1, 'skittles-tropical', 1616524200, 1625122800, 0),
(353, 'Skittles (Sweet Heat)', 28, 2, '', '191g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'feMmFn1VHo7A4BcUXuLT.jpg', 1, 'skittles-sweet-heat', 1616524200, 1625122800, 0),
(354, 'Life Savers Gummies (Sour)', 28, 2, '', '180g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'c5jBsGrbZ7PMtAVe1wzk.jpg', 1, 'life-savers-gummies-sour', 1616524200, 1625122800, 0),
(355, 'Life Savers (Five Flavour)', 28, 2, '', '150g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'cpRwqsvLdzNhfM8k1CSD.jpg', 1, 'life-savers-five-flavour', 1616524200, 1625122800, 0),
(356, 'Life Savers Gummies (Wild Berries)', 28, 2, '', '180g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.19\"}', '{\"menu\":\"\"}', 'oJdBi1m5fNTQF4MAUDqs.jpg', 1, 'life-savers-gummies-wild-berries', 1616524200, 1625122800, 0),
(357, 'Starburst Gummies (Sours)', 28, 2, '', '164g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'kYhi5BrlUax7NAOT3nFj.jpg', 1, 'starburst-gummies-sours', 1616524200, 1625122800, 0),
(358, 'Starburst Duos (2 flavours in 1)', 28, 2, '', '191g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'ODRC5s2IVhn4Aejk3MK7.jpg', 1, 'starburst-duos-2-flavours-in-1', 1616524200, 1625122800, 0),
(359, 'Starburst minis (Original)', 28, 2, '', '191g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', '58lbhqUQIDtVe61LxGpu.jpg', 1, 'starburst-minis-original', 1616524200, 1625122800, 0),
(360, 'Maltesers', 28, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '7Rh10wZ3HTag2sMApoBU.jpg', 1, 'maltesers', 1616524200, 1633590000, 0),
(361, 'Koala Kones Gummies', 28, 2, '', '200g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '1pyrAH0i8GFL4QRIUSzP.jpg', 1, 'koala-kones-gummies', 1616610600, 1625122800, 0),
(362, 'Koala Kones (Sour)', 28, 2, '', '200g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'TGsZmEgRaN1n2OM94Sjw.jpg', 1, 'koala-kones-sour', 1616610600, 1625122800, 0),
(363, 'Big Kahuna', 28, 2, '', '600g', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"8.99\"}', '{\"menu\":\"\"}', 'sTEKP4G5IDQUeguF3qpb.jpg', 1, 'big-kahuna', 1616610600, 1625122800, 0),
(364, 'Huer Super Mix', 28, 2, '', '200g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.19\"}', '{\"menu\":\"\"}', 'o1FO0MXvy7kUltzm8dYb.jpg', 1, 'huer-super-mix', 1616610600, 1633590000, 0),
(365, 'Huer Super Mix (Sour)', 28, 2, '', '200g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'Et9pnecNDYfQOUu10Xjg.jpg', 1, 'huer-super-mix-sour', 1616610600, 1625122800, 0),
(366, 'Twizzlers Nibs Cherry (little nibbles)', 28, 2, '', '75g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'qukdOANHnoRB8Taewyc5.jpg', 1, 'twizzlers-nibs-cherry-little-nibbles', 1616610600, 1633590000, 0),
(367, 'Twizzlers Nibs Cherry (super long)', 28, 2, '', '400g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'UVyi8dAWcbzILgnx93lX.jpg', 1, 'twizzlers-nibs-cherry-super-long', 1616610600, 1625122800, 0),
(368, 'Twizzlers pull ‘n’ pell ( Fruit Punch)', 28, 2, '', '340g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'R13teF8fPQ9GbjWM2xco.jpg', 1, 'twizzlers-pull-n-pell-fruit-punch', 1616610600, 1625122800, 0),
(369, 'Kinder Surprise', 28, 2, '', '20g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '6J4imQPoUslI0xh7YTWE.jpg', 1, 'kinder-surprise', 1616697000, 1633590000, 0),
(370, 'Rockets', 28, 2, '', '63g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.79\"}', '{\"menu\":\"\"}', 'UCMSjl6NXmK2h9bTZYxi.jpg', 1, 'rockets', 1616697000, 1633590000, 0),
(371, 'Double Bubble', 28, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.10\"}', '{\"menu\":\"\"}', 'lUowHhDYEms0rB1Se8kv.jpg', 1, 'double-bubble', 1616697000, 1625122800, 0),
(372, 'Maynards Wine Gums', 28, 2, '', '44g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'hRwUQ45tmx16nBrcTu3S.jpg', 1, 'maynards-wine-gums', 1616697000, 1633590000, 0),
(373, 'Quick milk magic sipper (fruity cereal flavour)', 28, 2, '', '5 Pieces', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.09\"}', '{\"menu\":\"\"}', '578aOV0mTw6yCHURtvJM.jpg', 1, 'quick-milk-magic-sipper-fruity-cereal-flavour', 1616697000, 1625122800, 0),
(374, 'Ring pop (Berry Blast)', 28, 2, '', '14g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.69\"}', '{\"menu\":\"\"}', 'shYP2XngIDloj8zCxGet.jpg', 1, 'ring-pop-berry-blast', 1616697000, 1625122800, 0),
(375, 'Cry Baby (Extra Sour)', 28, 2, '', '6 Pieces', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.25\"}', '{\"menu\":\"\"}', 'LJdQZAkRo6TIjNlhOFBu.jpg', 1, 'cry-baby-extra-sour', 1616697000, 1633590000, 0),
(376, 'Sweet Soaker candy filled', 28, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'QDndc6ohYm4VJqCvs5py.jpg', 1, 'sweet-soaker-candy-filled', 1616697000, 1625122800, 0),
(377, 'Lotsa Fizz candy', 28, 2, '', '5 Pieces', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.99\"}', '{\"menu\":\"\"}', 'LiQVZBPbu3y7CthgsR9J.jpg', 1, 'lotsa-fizz-candy', 1616697000, 1625122800, 0),
(378, 'Shark Bite candy', 28, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.89\"}', '{\"menu\":\"\"}', 'NgPfAWyUT2bmeqHtlxhJ.jpg', 1, 'shark-bite-candy', 1616697000, 1625122800, 0),
(379, 'Blue Razz blow pop (Berry)', 28, 2, '', '18.4g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.79\"}', '{\"menu\":\"\"}', 'KudlE8R3fbPk9iJD0Txz.jpg', 1, 'blue-razz-blow-pop-berry', 1616697000, 1633590000, 0),
(380, 'Vanilla Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', 'CUkgziGRrW2v3tPflTxp.jpg', 1, 'vanilla-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(381, 'Chocolate Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', 'ziALcmVKhM5jTs2uUNwd.jpg', 1, 'chocolate-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(382, 'Strawberry Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', '3Z2SjgB1nObWXF8cpH5w.jpg', 1, 'strawberry-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(383, 'Maple Walnut Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', 'opWqOsKX6f8IA03bPEvC.jpg', 1, 'maple-walnut-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(384, 'Shark bite Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', '9Uf1VEZG2LdOwcH3tbQN.jpg', 1, 'shark-bite-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(385, 'Cookies n\' Cream Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', '8fDyPR93XcBOdYr2FI4m.jpg', 1, 'cookies-n-cream-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(386, 'Tiger Tiger Ice Cream by scoop', 36, 2, '', 'Large (3 Scoops), Medium (2 Scoops), Small (1 Scoop)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.07\"}', '{\"menu\":\"\"}', 'dNAou2ltPigvksEjw5Kx.jpg', 1, 'tiger-tiger-ice-cream-by-scoop', 1616783400, 1628146800, 1),
(387, 'Magnum Double (Chocolate Vanilla)', 36, 2, '', '90ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'egxqOEaKpr5Y17F3bMDH.jpg', 1, 'magnum-double-chocolate-vanilla', 1616783400, 1624950000, 0),
(388, 'Magnum Double (Raspberry)', 36, 2, '', '90ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'rpFNV3nTWQh7yXqlRCHe.jpg', 1, 'magnum-double-raspberry', 1616783400, 1624950000, 0),
(389, 'Magnum Double (Cookies and Cream)', 36, 2, '', '90ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'ta2IfySG7bkzJpPFw9LD.jpg', 1, 'magnum-double-cookies-and-cream', 1616783400, 1624950000, 0),
(390, 'Magnum (Almond)', 36, 2, '', '100ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'wVXeA1t2h6ifJzrn4IuT.jpg', 1, 'magnum-almond', 1616783400, 1624950000, 0),
(391, 'Klondike Vanilla Sandwich', 36, 2, '', '135ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'vJSwPdWIA3ZHu6XQLCoe.jpg', 1, 'klondike-vanilla-sandwich', 1616783400, 1633590000, 0),
(392, 'Klondike Cookies and Cream Sandwich', 36, 2, '', '135ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'bl0FZUvNxgTPmSLiEeB8.jpg', 1, 'klondike-cookies-and-cream-sandwich', 1616783400, 1624950000, 0),
(393, 'Klondike Cone ( Strawberry and Vanilla)', 36, 2, '', '200ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.29\"}', '{\"menu\":\"\"}', 'mzNqACW31tSrpZ86DBLT.jpg', 1, 'klondike-cone-strawberry-and-vanilla', 1616783400, 1633590000, 0),
(394, 'Klondike Cone (Chocolate and Caramel)', 36, 2, '', '200ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.29\"}', '{\"menu\":\"\"}', 'r8AusIWwXSDJZvybV9to.jpg', 1, 'klondike-cone-chocolate-and-caramel', 1616783400, 1633590000, 0),
(395, 'Reese Ice cream', 36, 2, '', '100ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.39\"}', '{\"menu\":\"\"}', 'vAGwnTiYgo4HWlcxrfVP.jpg', 1, 'reese-ice-cream', 1617301800, 1624950000, 0),
(396, 'Haagen-Dazs (Vanilla Milk)', 36, 2, '', '88ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'OfRhAxbQLGztJTa2uyvm.jpg', 1, 'haagen-dazs-vanilla-milk', 1617301800, 1624950000, 0),
(397, 'Haagen-Dazs (Vanilla Almond)', 36, 2, '', '88ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'cLiZVyUnraFuk1Jj9GD2.jpg', 1, 'haagen-dazs-vanilla-almond', 1617301800, 1624950000, 0),
(398, 'Haagen-Dazs (Double Chocolate Almond)', 36, 2, '', '88ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'NJCzp5bwZrjviAtW1fFT.jpg', 1, 'haagen-dazs-double-chocolate-almond', 1617301800, 1624950000, 0),
(399, 'Oreo Ice cream', 36, 2, '', '125ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'GdDfe8YuUtcmyhkanz0O.jpg', 1, 'oreo-ice-cream', 1617301800, 1633590000, 0),
(400, 'Chips Ahoy Chocolate chip cookie sandwich', 36, 2, '', '125ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'LUhHQuwAdkrM0OKEFVTS.jpg', 1, 'chips-ahoy-chocolate-chip-cookie-sandwich', 1617301800, 1624950000, 0),
(402, 'Dairyland Milk (3.25%)', 32, 2, '', 'Large (4L), Medium (2L), Small (1L)', '{\"4L\":\"6.99\",\"2L\":\"4.99\",\"1L\":\"3.59\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'urQ5a6ksXCT0IS8OLty1.jpg', 1, 'dairyland-milk-3-25', 1617474600, 1631343600, 1),
(403, 'Dairyland Milk (2%)', 32, 2, '', 'Large (4L), Medium (2L), Small (1L)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'M1HBJlEYAfb4z09SWjFN.jpg', 1, 'dairyland-milk-2', 1617474600, 1631343600, 1),
(404, 'Nestle Parlour Sandwich (Vanilla)', 36, 2, '', '100ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'ruA7Hs5UJkWYihKpLEPf.jpg', 1, 'nestle-parlour-sandwich-vanilla', 1617733800, 1624950000, 0),
(405, 'Nestle Parlour (Super Sandwich)', 36, 2, '', '200ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.49\"}', '{\"menu\":\"\"}', 'ltspkb5BZ0DIECG9dcwV.jpg', 1, 'nestle-parlour-super-sandwich', 1617733800, 1624950000, 0),
(406, 'Nestle Drumstick (Oreo)', 36, 2, '', '135ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', '8iE0p4rwn9SLKXWg1MlQ.jpg', 1, 'nestle-drumstick-oreo', 1617733800, 1624950000, 0),
(407, 'Nestle Drumstick (Vanilla Fudge)', 36, 2, '', '140ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'AX6VwkbRDONT029aCm74.jpg', 1, 'nestle-drumstick-vanilla-fudge', 1617733800, 1625036400, 0),
(408, 'Nestle Drumstick (Vanilla Caramel)', 36, 2, '', '140ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'T7ZL3RHQb05rvh2VEpl4.jpg', 1, 'nestle-drumstick-vanilla-caramel', 1617733800, 1625036400, 0),
(409, 'Nestle Drumstick (Rolo)', 36, 2, '', '135ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'rIufPphtboecHjwmzZLn.jpg', 1, 'nestle-drumstick-rolo', 1617733800, 1625036400, 0),
(410, 'Nestle Drumstick King (Sweet ‘n Salty Caramel)', 36, 2, '', '180ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '3VMRZs09XNhYpvt4bTIG.jpg', 1, 'nestle-drumstick-king-sweet-n-salty-caramel', 1617733800, 1625036400, 0),
(411, 'Nestle Drumstick King (Mocha Cookie Crunch)', 36, 2, '', '180ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'p3uKZvhlsoAEU2IQJmL7.jpg', 1, 'nestle-drumstick-king-mocha-cookie-crunch', 1617733800, 1633590000, 0),
(412, 'KitKat Ice cream', 36, 2, '', '80ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'jZGhJesYaQkXu7MIT1dC.jpg', 1, 'kitkat-ice-cream', 1617733800, 1633590000, 0),
(413, 'Life Savers ice cream (five flavour)', 36, 2, '', '65ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'SXoFYCVnMmEQuWbHzeUw.jpg', 1, 'life-savers-ice-cream-five-flavour', 1617733800, 1633590000, 0),
(414, 'Maynards ice cream (Fuzzy Peach)', 36, 2, '', '65ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'qGbNaLQKyBeztXo7YEf8.jpg', 1, 'maynards-ice-cream-fuzzy-peach', 1617733800, 1625036400, 0),
(415, 'Maynards ice cream (Swedish Berries)', 36, 2, '', '65ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'H1TV7SEqRcQgnMO3aWXL.jpg', 1, 'maynards-ice-cream-swedish-berries', 1617733800, 1625036400, 0),
(416, 'Popsicle (Cyclonde)', 36, 2, '', '80ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'gmxscln3FyVeSLzvRr57.jpg', 1, 'popsicle-cyclonde', 1617733800, 1633590000, 0),
(417, 'Popsicle (Fire Cracker)', 36, 2, '', '90ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'PhUN1XFAuq4o3jMe2dgl.jpg', 1, 'popsicle-fire-cracker', 1617733800, 1633590000, 0),
(418, 'Popsicle (SpongeBob SqaurePants)', 36, 2, '', '118ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', '8rn7KtpywWokgvP0sBfm.jpg', 1, 'popsicle-spongebob-sqaurepants', 1617733800, 1625036400, 0),
(419, 'Creamsicle (Orange)', 36, 2, '', '60ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'y9Em1Q2pwzxFWeYLZjTh.jpg', 1, 'creamsicle-orange', 1617733800, 1625036400, 0),
(420, 'Fudgesicle (Ice Milk Bar)', 36, 2, '', '60ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.59\"}', '{\"menu\":\"\"}', 'kDdPETLRQsf07yzbIOwq.jpg', 1, 'fudgesicle-ice-milk-bar', 1617733800, 1625036400, 0),
(421, 'Champman’s (Vanilla)', 36, 2, '', '4L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.99\"}', '{\"menu\":\"\"}', 'PHb2BXqgdRpmiSEC6Az3.jpg', 1, 'champman-s-vanilla', 1617733800, 1625036400, 0),
(422, 'Champman’s (Dutch Chocolate)', 36, 2, '', '4L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.99\"}', '{\"menu\":\"\"}', '9FLZwPb2rBa7Cehl0Jni.jpg', 1, 'champman-s-dutch-chocolate', 1617733800, 1625036400, 0),
(423, 'Champman’s (Neapolitan)', 36, 2, '', '4L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.99\"}', '{\"menu\":\"\"}', 'pPtMdbFDx9Sm4oJVKGIr.jpg', 1, 'champman-s-neapolitan', 1617733800, 1625036400, 0),
(424, 'Champman’s (Butterscotch Ripple)', 36, 2, '', '4L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.99\"}', '{\"menu\":\"\"}', 'tl4zPMXyrEnw6k8f1xTo.jpg', 1, 'champman-s-butterscotch-ripple', 1617733800, 1625036400, 0),
(425, 'Nestle Parlour (Vanilla)', 36, 2, '', '1.5L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.99\"}', '{\"menu\":\"\"}', 'px94jEtD5cf7Nw8ibdaJ.jpg', 1, 'nestle-parlour-vanilla', 1617733800, 1625036400, 0),
(426, 'Nestle Parlour (Maple Walnut)', 36, 2, '', '1.5L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.99\"}', '{\"menu\":\"\"}', 's4W5rOD6387bT2cfx1VU.jpg', 1, 'nestle-parlour-maple-walnut', 1617733800, 1625036400, 0),
(427, 'Nestle Parlour (Neapolitan)', 36, 2, '', '1.5 L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.99\"}', '{\"menu\":\"\"}', 'AQLDb9Zkz6NCOGqW7aEF.jpg', 1, 'nestle-parlour-neapolitan', 1617733800, 1625036400, 0),
(428, 'Dairyland Milk (1%)', 32, 2, '', 'Large (2L), Small (1L)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.99\"}', '{\"menu\":\"\"}', 'kn42MqaPiHAtOIdo3Cuf.jpg', 1, 'dairyland-milk-1', 1618165800, 1631343600, 1),
(429, 'Dairyland Chocolate Milk (1%)', 32, 2, '', '1L', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.59\"}', '{\"menu\":\"\"}', 'mbsR5Mdw1Wu08gLO2UJH.jpg', 1, 'dairyland-chocolate-milk-1', 1618165800, 1631343600, 0),
(430, 'Coca-Cola 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'wY8dbCItoLc1PRynfEvi.jpg', 1, 'coca-cola-2l', 1618252200, 1643875200, 0),
(431, 'Diet Coke 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'gjtqPrJlVkC0NdyX1cuM.jpg', 1, 'diet-coke-2l', 1618252200, 1643875200, 0),
(432, 'Coke Zero 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', '7oQv4bjzA0R3J1hKNS6d.jpg', 1, 'coke-zero-2l', 1618252200, 1643875200, 0),
(433, 'Canada Dry 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'z0bgacKQ6Bs4AtdMJuRX.jpg', 1, 'canada-dry-2l', 1618252200, 1643875200, 0),
(434, 'Sprite 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'ShsWMBZFjKLQprw5oayN.jpg', 1, 'sprite-2l', 1618252200, 1643875200, 0),
(435, 'Fanta 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'h3lgbakYJAOGoeLBsEdt.jpg', 1, 'fanta-2l', 1618252200, 1643875200, 0),
(436, 'A and W Root Beer 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'rClepioKPQM96bwYBzDf.jpg', 1, 'a-and-w-root-beer-2l', 1618252200, 1643875200, 0),
(437, 'Cool Iced Tea 2L', 22, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'QEMciw8fBT051C6DuYlo.jpg', 1, 'cool-iced-tea-2l', 1618252200, 1643875200, 0),
(438, 'Windsor Table Salt (1Kg)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', '8Tb6tZvJfycrOkWEhHP4.jpg', 1, 'windsor-table-salt-1kg', 1618857000, 1624950000, 0),
(439, 'Sifto Coarse Salt (1.36Kg)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.49\"}', '{\"menu\":\"\"}', 'N4KlofmI0TcARDq5ys3n.jpg', 1, 'sifto-coarse-salt-1-36kg', 1618857000, 1624950000, 0),
(440, 'Rogers Granulated Sugar', 40, 2, '', 'Large (4Kg), Small (2Kg)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.99\"}', '{\"menu\":\"\"}', 'D2EiGvKRsUYBqro7CwdV.jpg', 1, 'rogers-granulated-sugar', 1618857000, 1633590000, 1),
(441, 'Prairie all purpose flour (2.5Kg)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.99\"}', '{\"menu\":\"\"}', 'wt7U34bIrYWJVcnxfkFm.jpg', 1, 'prairie-all-purpose-flour-2-5kg', 1618857000, 1624950000, 0),
(442, 'Arm and Hammer baking soda (500g)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', '10JjRAfoZWeXq6ldrE5Q.jpg', 1, 'arm-and-hammer-baking-soda-500g', 1619029800, 1624950000, 0),
(443, 'Kraft Marshmallows original (400g)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.99\"}', '{\"menu\":\"\"}', 'fX1txLFBhyqkoIig9KUE.jpg', 1, 'kraft-marshmallows-original-400g', 1619029800, 1624950000, 0),
(445, 'China Lily Soya sauce (483ml)', 40, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', 'VEMrwjKiBRpoIYDfZ5A0.jpg', 1, 'china-lily-soya-sauce-483ml', 1619029800, 1624950000, 0),
(446, 'Mr. Noodles (Vegetable flavour)', 40, 2, '', '85g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.99\"}', '{\"menu\":\"\"}', 'ZKwz4PGArQspNnaX5Yu9.jpg', 1, 'mr-noodles-vegetable-flavour', 1619029800, 1624950000, 0),
(447, 'Mr. Noodles (Chicken flavour)', 40, 2, '', '85g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"0.99\"}', '{\"menu\":\"\"}', 'lI7TCpsMjLHAUtk9ngXm.jpg', 1, 'mr-noodles-chicken-flavour', 1619029800, 1624950000, 0),
(448, 'Sapporo Ichiban (Original)', 40, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'Oh5d73pYqRgQbxLDv1tl.jpg', 1, 'sapporo-ichiban-original', 1619029800, 1624950000, 0),
(449, 'Sapporo Ichiban (Beef)', 40, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '8biJ6x7Dd3snXuCgOEfV.jpg', 1, 'sapporo-ichiban-beef', 1619029800, 1624950000, 0),
(450, 'Sapporo Ichiban (Hot and Spicy)', 40, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'CUz6v3pflcPweAxnLrjt.jpg', 1, 'sapporo-ichiban-hot-and-spicy', 1619029800, 1624950000, 0),
(451, 'Sapporo Ichiban (Shrimp)', 40, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'mlw1he28gsLEFndRY6Cx.jpg', 1, 'sapporo-ichiban-shrimp', 1619029800, 1624950000, 0),
(452, 'Sapporo Ichiban (Chicken)', 40, 2, '', '100g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', 'sRwVDi6NXvtHLdMZy41h.jpg', 1, 'sapporo-ichiban-chicken', 1619029800, 1624950000, 0),
(453, 'Kimchi Bowl Noodles (Original)', 40, 2, '', '86g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'FV4et8U756WvXlDZLs3r.jpg', 1, 'kimchi-bowl-noodles-original', 1619029800, 1624950000, 0),
(454, 'Kimchi Bowl Noodles (Beef)', 40, 2, '', '86g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'ynQeqd23bcGu0IrN5sSY.jpg', 1, 'kimchi-bowl-noodles-beef', 1619029800, 1624950000, 0),
(455, 'Kimchi Bowl Noodles (Chicken)', 40, 2, '', '86g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.79\"}', '{\"menu\":\"\"}', 'CjrUiXhDBnQW1ZMfJF50.jpg', 1, 'kimchi-bowl-noodles-chicken', 1619029800, 1624950000, 0),
(487, 'International Delight Creamer (French Vanilla)', 32, 2, '', 'Large(946ml), Small(473ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', '6BwGcOV2ruNi9gnsyxSZ.jpg', 1, 'international-delight-creamer-french-vanilla', 1625382000, 1631343600, 1),
(488, 'International Delight Creamer (Hazelnut)', 32, 2, '', 'Large(946ml), Small(473ml)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', 'EtSpWhm6aeLFKysqG2rQ.jpg', 1, 'international-delight-creamer-hazelnut', 1625382000, 1631343600, 1),
(489, 'Milk 2 Go (Original)', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'TELbZ6UzQFS0tmaK39MP.jpg', 1, 'milk-2-go-original', 1625468400, NULL, 0),
(490, 'Milk 2 Go (Strawberry)', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '31Y9nUrkz5mDlQfEiHht.jpg', 1, 'milk-2-go-strawberry', 1625468400, NULL, 0),
(491, 'Milk 2 Go (Chocolate)', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'CWBwaqk1jFmS0bExUiPX.jpg', 1, 'milk-2-go-chocolate', 1625468400, NULL, 0),
(492, 'Milk 2 Go (Cookies and Cream)', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'LyJ3dz6quwVt4XmFD7Y0.jpg', 1, 'milk-2-go-cookies-and-cream', 1625468400, NULL, 0),
(493, 'Nestle Rolo Milk Shake', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '7r31kyAZQO6PSWc4Fwsu.jpg', 1, 'nestle-rolo-milk-shake', 1625468400, NULL, 0),
(494, 'Nestle Coffee Crisp Milk Shake', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '6xVRt3sULw7ekWGF84mf.jpg', 1, 'nestle-coffee-crisp-milk-shake', 1625468400, NULL, 0),
(495, 'Dairyland Creamo half and half', 32, 2, '', '473ml', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"3.59\"}', '{\"menu\":\"\"}', 'hBonl7GwiypCT3NFZ4XP.jpg', 1, 'dairyland-creamo-half-and-half', 1625468400, 1631343600, 0),
(496, 'Dairyland butter (Unsalted creamery butter)', 32, 2, '', '454g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.99\"}', '{\"menu\":\"\"}', 'Vd0KBvsOUinqxkXTH6Zo.jpg', 1, 'dairyland-butter-unsalted-creamery-butter', 1625468400, 1626591600, 0),
(497, 'Fraser valley creamery butter', 32, 2, '', '250g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.99\"}', '{\"menu\":\"\"}', 'rVJ0kLiE58RWStFN2pPM.jpg', 1, 'fraser-valley-creamery-butter', 1625468400, NULL, 0),
(498, 'Faith Farms Marble Cheddar Cheese', 32, 2, '', '', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.99\"}', '{\"menu\":\"\"}', 'aIePnQXbdvSZkLy21lrw.jpg', 1, 'faith-farms-marble-cheddar-cheese', 1625468400, NULL, 0),
(499, 'Dairyland Sour Cream', 32, 2, '', '250ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'xfCJhaUVA6r2bimjyOpL.jpg', 1, 'dairyland-sour-cream', 1625468400, NULL, 0),
(500, 'Western Family dip (bacon and onion)', 32, 2, '', '225g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'ouzUxOtCqcAD7Xje12NS.jpg', 1, 'western-family-dip-bacon-and-onion', 1625468400, 1636617600, 0),
(501, 'Western Family dip (roasted garlic)', 32, 2, '', '225g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'epzmcMtjGJ2yiuCI6OxF.jpg', 1, 'western-family-dip-roasted-garlic', 1625468400, 1636617600, 0),
(502, 'Western Family dip (french onion)', 32, 2, '', '225g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'bIOQqL24tPnXwsMxTiVu.jpg', 1, 'western-family-dip-french-onion', 1625468400, 1636617600, 0),
(503, 'Western Family dip (creamy ranch)', 32, 2, '', '225g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', '9odZUEcXiAuWKNtMYLC2.jpg', 1, 'western-family-dip-creamy-ranch', 1625468400, 1636617600, 0),
(504, 'Philadelphia Original (Cream Cheese)', 32, 2, '', '227g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'tMABPrjWdgkHaSZKTIFG.jpg', 1, 'philadelphia-original-cream-cheese', 1625468400, 1626591600, 0),
(505, 'Philadelphia dip (French Onion)', 32, 2, '', '227g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'XoiBFUqIj8enCbJaKtxQ.jpg', 1, 'philadelphia-dip-french-onion', 1625468400, 1626591600, 0),
(506, 'Philadelphia dip (Herb and Spice)', 32, 2, '', '227g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'OCGXIev7FAMKxgoSD0H3.jpg', 1, 'philadelphia-dip-herb-and-spice', 1625468400, 1626591600, 0),
(507, 'Philadelphia dip (Dill Pickle)', 32, 2, '', '227g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.49\"}', '{\"menu\":\"\"}', 'RV0YLubxU1fjatPdFhDM.jpg', 1, 'philadelphia-dip-dill-pickle', 1625468400, NULL, 0),
(524, 'Old Dutch Beef Jerky Original', 40, 2, '', '45g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.79\"}', '{\"menu\":\"\"}', 'nrkJtTMhU1YcR5Sg9DpO.jpg', 1, 'old-dutch-beef-jerky-original', 1632121200, 1632207600, 0),
(525, 'Old Dutch Beef Jerky', 40, 2, '', '15g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.99\"}', '{\"menu\":\"\"}', '2LaEdgrsUCIe3ctApQ1G.jpg', 1, 'old-dutch-beef-jerky', 1632121200, 1632207600, 0),
(526, 'Big Chief Beef Jerky', 40, 2, '', '30g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.79\"}', '{\"menu\":\"\"}', 'V6c5rHTv3REaLym7Dhz2.jpg', 1, 'big-chief-beef-jerky', 1632121200, 1632207600, 1),
(527, 'Cattleman\'s Cut Beef Jerky', 40, 2, '', '230g', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"19.99\"}', '{\"menu\":\"\"}', 'M4tsWKnTHPU68R5EaDl0.jpg', 1, 'cattleman-s-cut-beef-jerky', 1632121200, 1632207600, 1),
(528, 'Tostitos Medium Salsa Dip', 40, 2, '', '418mL', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'XWMqika0Qme69dNUvKfr.jpg', 1, 'tostitos-medium-salsa-dip', 1632121200, 1632207600, 0),
(529, 'Tostitos Medium Salsa Con Queso Salsa Dip', 40, 2, '', '394mL', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.99\"}', '{\"menu\":\"\"}', 'FXWcUj3pu8hzsKZQLI0q.jpg', 1, 'tostitos-medium-salsa-con-queso-salsa-dip', 1632121200, 1632207600, 0),
(530, 'Slurpee', 24, 2, '', 'Small (12oz), Medium (16oz), Large (22oz)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.38\"}', '{\"menu\":\"\"}', 'KF1rNoW4hcHISGvkLpqT.jpg', 1, 'slurpee', 1632121200, 1632207600, 1),
(531, 'Screemer', 24, 2, '', 'Small (12oz), Medium (16oz), Large (22oz)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.76\"}', '{\"menu\":\"\"}', 'Y1x0iJTdaNrpvCUeW9VH.jpg', 1, 'screemer', 1632121200, 1632207600, 1),
(532, 'Coffee', 26, 2, '', 'Small (12oz), Medium (16oz), Large (20oz)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.90\"}', '{\"menu\":\"\"}', 'FqkYG4wLX6KTbhdAnMS9.jpg', 1, 'coffee', 1632121200, 1632207600, 1),
(533, 'French Vanilla', 26, 2, '', 'Small (12oz), Medium (16oz), Large (20oz)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.62\"}', '{\"menu\":\"\"}', 'nteCESWN3KULxYlMVj2Z.jpg', 1, 'french-vanilla', 1632121200, 1632207600, 1),
(534, 'Hot Chocolate', 26, 2, '', 'Small (12oz), Medium (16oz), Large (20oz)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.62\"}', '{\"menu\":\"\"}', 'QhgVoLb9E6PNGwxtpkFD.jpg', 1, 'hot-chocolate', 1632121200, 1632207600, 1),
(535, 'Cubed Ice', 44, 2, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.50\"}', '{\"menu\":\"\"}', 'UqBN0QVFuEYcjbpAiz2K.jpg', 1, 'cubed-ice', 1632121200, 1639728000, 0),
(539, 'Veggie Spring Roll', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3\"}', '{\"menu\":\"\"}', 'R5G7E4oe0vHM3wBY2jmr.jpg', 1, 'veggie-spring-roll', 1639296000, 1639987200, 0),
(540, 'Butter Chicken', 63, 5, '', 'Combo Served with 1meat, 2Veg Curry and Rice', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"18.00\"}', '{\"menu\":\"\"}', 'nUzvlRsBiH6Ad8cSxM91.jpg', 1, 'butter-chicken', 1639296000, 1643443200, 1),
(541, 'Chicken Curry', 63, 5, '', 'Combo Served with 1meat, 2Veg Curry and Basmati rice', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"18.00\"}', '{\"menu\":\"\"}', 'mc3sHt5RF9jUMWeNkor0.jpg', 1, 'chicken-curry', 1639296000, 1643443200, 1),
(543, 'Vegetable Curry', 62, 5, '', 'Combo Served with 1meat, 2Veg Curry, Basmati rice or 1 Roti with Additional any Curry', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15\"}', '{\"menu\":\"\"}', 'vDkBUWQAjr0yO6YX2zaE.jpg', 1, 'vegetable-curry', 1639296000, 1640160000, 0),
(544, 'Butter Chicken', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.00\"}', '{\"menu\":\"\"}', 'FOnTA0VkIiQKrbmZla8L.jpg', 1, 'butter-chicken', 1639296000, 1643443200, 1),
(545, 'Chicken Curry', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.00\"}', '{\"menu\":\"\"}', 'CdhRsXFlHjN5IqfP0kmA.jpg', 1, 'chicken-curry', 1639296000, 1643443200, 1),
(546, 'Lamb Curry', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"19.00\"}', '{\"menu\":\"\"}', 'IKkwXRH1ODh5QV8b0YAG.jpg', 1, 'lamb-curry', 1639296000, 1643443200, 1),
(547, 'Cabbage and Carrot', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.00\"}', '{\"menu\":\"\"}', 'p9iNxkZBt7orXUTwMz1K.jpg', 1, 'cabbage-and-carrot', 1639296000, 1643443200, 1),
(548, 'Chickpea', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.00\"}', '{\"menu\":\"\"}', 'PG4uH8qBikfwRI5UAX3V.jpg', 1, 'chickpea', 1639296000, 1643443200, 1),
(549, 'Beets', 62, 5, '', 'Choose a size', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.00\"}', '{\"menu\":\"\"}', 'JXkB79vYTSU2me5nodsM.jpg', 1, 'beets', 1639296000, 1643443200, 1),
(550, 'Veggie Samosa', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.50\"}', '{\"menu\":\"\"}', 'O0MesZpSzn2kNIq1TdQE.jpg', 1, 'veggie-samosa', 1639296000, 1639987200, 0);
INSERT INTO `food_menus` (`id`, `name`, `category_id`, `restaurant_id`, `items`, `details`, `nutrition_fact`, `servings`, `availability`, `has_discount`, `price`, `discounted_price`, `thumbnail`, `thumb_status`, `slug`, `created_at`, `updated_at`, `has_variant`) VALUES
(551, 'Chicken Samosa', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.50\"}', '{\"menu\":\"\"}', 'CkYPpZt7muGnqbUQxVzr.jpg', 1, 'chicken-samosa', 1639296000, 1639987200, 0),
(552, 'Roti', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2\"}', '{\"menu\":\"\"}', 'vstSV1bRGgDu4Lx6oC52.jpg', 1, 'roti', 1639296000, 1639987200, 0),
(553, 'Naan', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.50\"}', '{\"menu\":\"\"}', 'ZRTrdlHaMJBgI1GEFUjL.jpg', 1, 'naan', 1639296000, 1643443200, 0),
(554, 'Butter Chicken Poutine', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', '7cq9kauS5TX0PiRQh3Ax.jpg', 1, 'butter-chicken-poutine', 1639296000, 1639987200, 0),
(555, 'Poutine', 61, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'P6LqJblakG1C5v7sEwYg.jpg', 1, 'poutine', 1639296000, 1639987200, 0),
(556, 'Mango Lassi', 22, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7\"}', '{\"menu\":\"\"}', 'zqcl1jQ723IAaGFm5Ko0.jpg', 1, 'mango-lassi', 1639296000, 1639296000, 0),
(557, 'Coca-Cola can (355ml)', 22, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.50\"}', '{\"menu\":\"\"}', 'JVky3acPlI9YzfSWtsoF.jpg', 1, 'coca-cola-can-355ml', 1639296000, 1639987200, 0),
(570, 'April Soft Bathroom Tissue', 44, 2, '', '4 Rolls', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', 'cA32EvFdBV4q7zPCZpmK.jpg', 1, 'april-soft-bathroom-tissue', 1639555200, 1639555200, 0),
(571, 'Purex Bathroom Tissue', 44, 2, '', '12 Rolls (2ply)', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.99\"}', '{\"menu\":\"\"}', '1M8r7dSstwQvi4EyGYAf.jpg', 1, 'purex-bathroom-tissue', 1639555200, 1639555200, 0),
(572, 'Fiesta Paper Towel', 44, 2, '', '2 Rolls', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.99\"}', '{\"menu\":\"\"}', '6nfo4sgMVIKC0P5mEq2Z.jpg', 1, 'fiesta-paper-towel', 1639555200, 1639555200, 0),
(573, 'Palmolive Dish Liquid', 44, 2, '', '828 ml', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.99\"}', '{\"menu\":\"\"}', 'OIF2ZgzwNf1SC0MAEVv7.jpg', 1, 'palmolive-dish-liquid', 1639555200, 1639900800, 0),
(586, 'Pepsi can (355ml)', 22, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.50\"}', '{\"menu\":\"\"}', 'wdUvcSI9ni8RtyYGDr5O.jpg', 1, 'pepsi-can-355ml', 1639987200, NULL, 0),
(587, 'Canada Dry can', 22, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.5\"}', '{\"menu\":\"\"}', 'HCt6BqgAWYxrldjaGPeJ.jpg', 1, 'canada-dry-can', 1639987200, NULL, 0),
(588, 'Coke Zero can', 22, 5, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.5\"}', '{\"menu\":\"\"}', 'WLQnHFt5YsPzJuZ6ibIy.jpg', 1, 'coke-zero-can', 1639987200, NULL, 0),
(589, 'Sweet and Sour Boneless Pork Special Fried Rice', 81, 6, '', 'Served with Sweet &amp; Sour Boneless Pork', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', '4lhcWkB9gY2TyNJ5nGZv.jpg', 0, 'sweet-and-sour-boneless-pork-special-fried-rice', 1641196800, 1642579200, 0),
(590, 'Dry Garlic Spareribs Special Fried Rice', 81, 6, '', 'Served with Dry Garlic Spareribs', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'ZbwYR5xtGCfWyHTsonJO.jpg', 0, 'dry-garlic-spareribs-special-fried-rice', 1641196800, 1642579200, 0),
(591, 'Deep Fried Chicken Wings Special Fried Rice', 81, 6, '', 'Served with Deep Fried Chicken Wings', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'cgeMazA7oJNmpf5OVYG2.jpg', 0, 'deep-fried-chicken-wings-special-fried-rice', 1641196800, 1642579200, 0),
(593, '2 Eggs with Bacon, Ham, or Sausage', 82, 6, '', 'Served with Hash browns and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'DmOe0BbVUEFwPy6Rz4Zp.jpg', 0, '2-eggs-with-bacon-ham-or-sausage', 1641801600, 1642579200, 1),
(594, '3 Egg Ham and Cheddar Cheese Omelette', 82, 6, '', 'Served with Hashbrowns and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'hpv0e1T2HjbrmMZFfIGV.jpg', 0, '3-egg-ham-and-cheddar-cheese-omelette', 1641801600, 1642579200, 1),
(595, '3 Egg Shrimp and Green Onion Omelette', 82, 6, '', 'Served with Hashbrowns and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'DO3trMRmVdkpsI5XhcSG.jpg', 0, '3-egg-shrimp-and-green-onion-omelette', 1641801600, 1642579200, 1),
(596, 'Denver Omelette', 82, 6, '', '3 eggs with diced onions, celery, green peppers, tomato and ham. Served with Hashbrown and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'eaSZ8yTR6hxmKoGg4pUj.jpg', 0, 'denver-omelette', 1641801600, 1642579200, 1),
(597, '3 Egg Tomato, Mushroom and Cheese Omelette', 82, 6, '', 'Served with Hashbrown and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'F94UgRJX1IysDCmOAw3Y.jpg', 0, '3-egg-tomato-mushroom-and-cheese-omelette', 1641801600, 1642579200, 1),
(598, '3 Egg Bacon, Onion, and Cheese Omelette', 82, 6, '', 'Served with Hashbrown and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'NXD4mbL0RIxUok6rMOG9.jpg', 0, '3-egg-bacon-onion-and-cheese-omelette', 1641801600, 1642579200, 1),
(599, 'No. 1 Breakfast', 82, 6, '', '2 French Toast with Strawberries and Whipped Cream', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'xKiZzjWgyRMLwdTXvCtk.jpg', 0, 'no-1-breakfast', 1641801600, 1642579200, 0),
(600, 'No. 2 Breakfast', 82, 6, '', '2 Scrambled Eggs with 2 Bacon and English Muffin', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.95\"}', '{\"menu\":\"\"}', 'KmsaAGrQ6Nv9ID0LYcXT.jpg', 0, 'no-2-breakfast', 1641801600, 1642579200, 0),
(601, 'French Toast', 82, 6, '', '2 Slices', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.95\"}', '{\"menu\":\"\"}', 'wzyXolr3dCPUxn2qV9WE.jpg', 0, 'french-toast', 1641801600, 1642579200, 0),
(602, 'Pancakes', 82, 6, '', '3 high', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.95\"}', '{\"menu\":\"\"}', 'UrMq1gGX2fTW49sy6FNA.jpg', 0, 'pancakes', 1641801600, 1642579200, 0),
(603, 'Fisherman\'s Breakfast', 82, 6, '', '7 oz New York Steak, 2 Eggs, Hashbrowns and Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"24.95\"}', '{\"menu\":\"\"}', 'tZYGWCbdjfF2eJMN3AoT.jpg', 0, 'fisherman-s-breakfast', 1641801600, 1642579200, 1),
(604, 'Plain Burger', 83, 6, '', '6oz homemade beef patty. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'plain-burger', 1641801600, 1641801600, 1),
(605, 'Deluxe Burger', 83, 6, '', '6oz homemade beef patty, lettuce, tomato, pickle, mayonnaise, ketchup, and mustard served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'deluxe-burger', 1641801600, 1641801600, 1),
(606, 'Bacon Deluxe Burger', 83, 6, '', '6oz homemade beef patty, lettuce, tomato, pickle, mayo, ketchup, and mustard. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.45\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'bacon-deluxe-burger', 1641801600, 1641801600, 1),
(607, 'Mushroom Deluxe Burger', 83, 6, '', '6oz homemade beef patty, lettuce, tomato, pickle, mayo, ketchup, and mustard. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.45\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'mushroom-deluxe-burger', 1641801600, 1641801600, 1),
(608, 'Cheese Deluxe Burger', 83, 6, '', '6oz homemade beef patty, cheese, lettuce, tomato, pickle, mayo, ketchup, and mustard. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'cheese-deluxe-burger', 1641801600, 1641801600, 1),
(609, 'Cajun Deluxe Burger', 83, 6, '', '6oz homemade beef patty, lettuce, tomato, pickle, mayo, ketchup, mustard, and Cajun spice. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'cajun-deluxe-burger', 1641801600, 1641801600, 1),
(610, 'Pizza Deluxe Burger', 83, 6, '', '6oz homemade beef patty with meat sauce, melted mozzarella cheese, lettuce, tomato, pickle, and mayo. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'pizza-deluxe-burger', 1641801600, 1641801600, 1),
(611, 'Combo Deluxe Burger', 83, 6, '', '6oz homemade beef patty with meat sauce, melted mozzarella cheese and a hot dog, lettuce, tomato, pickle, and mayo. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'combo-deluxe-burger', 1641801600, 1641801600, 1),
(612, 'Western Burger', 83, 6, '', '6oz homemade beef patty topped with crispy onions, bacon and BBQ Sauce, lettuce, tomato, pickle, and mayo. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'western-burger', 1641801600, 1641801600, 1),
(613, 'Mister Deluxe Burger', 83, 6, '', 'Two 6oz homemade beef patties, lettuce, tomato, pickle, mayo, ketchup, and mustard. Served with fries.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'mister-deluxe-burger', 1641801600, 1641801600, 1),
(614, 'Breaded Chicken Burger', 84, 6, '', 'Lettuce, tomato, pickle, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'qQmbSeudn2L9o7lPMBHV.jpg', 0, 'breaded-chicken-burger', 1641801600, 1642665600, 1),
(615, 'Chicken Strips with Chow Mein', 84, 6, '', 'Served chow mien OR Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'rNzMVhSmvxcDKU0IwO3l.jpg', 0, 'chicken-strips-with-chow-mein', 1641801600, 1642665600, 1),
(616, 'Chicken Nuggets', 84, 6, '', '10 pieces, Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'IKVO5lTEpLNqkjhQCsPU.jpg', 0, 'chicken-nuggets', 1641801600, 1642665600, 1),
(617, 'Southern Fried Chicken with Potato Wedges', 84, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'XC0Vzxq2uj4ridY6km8K.jpg', 0, 'southern-fried-chicken-with-potato-wedges', 1641801600, 1642665600, 1),
(618, 'Butter Chicken with Rice and Naan Bread', 84, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'GTO4vjB9MpYRyHhu8rdX.jpg', 0, 'butter-chicken-with-rice-and-naan-bread', 1641801600, 1642665600, 1),
(619, 'Chicken Griller with Fries', 84, 6, '', 'Grilled chicken on a toasted bun with lettuce, tomato, pickle, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'e8sXxyZB2SvagpoHICOU.jpg', 0, 'chicken-griller-with-fries', 1641801600, 1642665600, 0),
(620, 'Chicken Cordon Blue Burger', 84, 6, '', 'Crispy chicken burger with Ham and Swiss Cheese, lettuce, tomato, pickle, and mayo, served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'xFZSzXbwvYi8I0TaNflp.jpg', 0, 'chicken-cordon-blue-burger', 1641801600, 1642665600, 1),
(621, 'Chicken Wings served with Rice', 84, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'IimvMzgeNFl6dSAhuKRB.jpg', 0, 'chicken-wings-served-with-rice', 1641801600, 1642665600, 1),
(622, 'Sweet and Sour Chicken Balls Special Fried Rice', 84, 6, '', 'Served with Sweet and Sour Chicken Balls', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'KjfVSHmxvt34nIEwZsaP.jpg', 0, 'sweet-and-sour-chicken-balls-special-fried-rice', 1641801600, 1642665600, 0),
(623, '2 Piece Chicken Strips', 84, 6, '', 'Served with Fries and sweet and sour dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.95\"}', '{\"menu\":\"\"}', 'kNaFL06bu1EVI7cxoUmf.jpg', 0, '2-piece-chicken-strips', 1641801600, 1642665600, 0),
(624, '5 Piece Chicken Nuggets', 84, 6, '', 'Served with Fries and sweet and sour dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.95\"}', '{\"menu\":\"\"}', 'gulny5S3b8jKRqY7o6iD.jpg', 0, '5-piece-chicken-nuggets', 1641801600, 1642665600, 0),
(625, 'Cod Fish and Chips', 90, 6, '', 'Served with fries, tartar sauce, and coleslaw', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'QCpKvf1HMsxWTNJyaeAq.jpg', 0, 'cod-fish-and-chips', 1641801600, 1642665600, 1),
(626, 'Seafood Combo with Fries', 90, 6, '', '1 piece Fish \'n Chips, Fantail Prawns, and Calamari, and dipping sauces', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"23.95\"}', '{\"menu\":\"\"}', 'eUBI45dHuJsgKEFRTh9z.jpg', 0, 'seafood-combo-with-fries', 1641801600, 1642665600, 0),
(627, 'Calamari with Tzatziki Dip', 90, 6, '', 'Calamari with Tzatziki Dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'glwEbPCTf2xZUXRe3ApJ.jpg', 0, 'calamari-with-tzatziki-dip', 1641801600, 1642665600, 0),
(628, 'Calamari with Chow Mein and Tzatziki Dip', 90, 6, '', 'Calamari with Chow Mein and Tzatziki Dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'pCnKAcUPQz2DZdraNjqF.jpg', 0, 'calamari-with-chow-mein-and-tzatziki-dip', 1641801600, 1642665600, 0),
(629, 'Deep Fried Fantail Prawns', 90, 6, '', 'Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', '9JpthIcLUWEzVOBRv0qi.jpg', 0, 'deep-fried-fantail-prawns', 1641801600, 1642665600, 0),
(630, 'Shrimp Scampi with Rice', 90, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'dXiU01KPs9qmNEfkeOrc.jpg', 0, 'shrimp-scampi-with-rice', 1641801600, 1642665600, 0),
(631, 'Calamari and Tzatziki Dip Special Fried Rice', 90, 6, '', 'Served with Calamari and Tzatziki Dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', '8lqxiZPWrfwzIj9sHL1A.jpg', 0, 'calamari-and-tzatziki-dip-special-fried-rice', 1641801600, 1642665600, 0),
(632, 'Corned Beef Sandwich', 34, 6, '', 'Served on Rye bread with Swiss Cheese. Comes with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'XCZSPipqN0sc4I7ExvjR.jpg', 0, 'corned-beef-sandwich', 1641801600, 1642752000, 0),
(633, 'Open Denver Sandwich', 34, 6, '', 'Diced onions, celery, green peppers, tomato and ham in egg. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', '8Lt3hPMJy5c6Iq1vE90u.jpg', 0, 'open-denver-sandwich', 1641801600, 1642752000, 0),
(634, 'Closed Denver Sandwich', 34, 6, '', 'Diced onions, celery, green peppers, tomato, and ham in egg. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'mVdbe4rWHDpaQFnoyw01.jpg', 0, 'closed-denver-sandwich', 1641801600, 1642752000, 0),
(635, 'Ham and Egg Sandwich', 34, 6, '', 'Toasted, Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'qzG7J8fDHMXPUSVidNyt.jpg', 0, 'ham-and-egg-sandwich', 1641801600, 1642752000, 0),
(636, 'Bacon and Egg Sandwich', 34, 6, '', 'Toasted, Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'zGbJkeVOoENal8h6fxdT.jpg', 0, 'bacon-and-egg-sandwich', 1641801600, 1642752000, 0),
(637, 'Toasted B.L.T', 34, 6, '', 'Toasted bacon, lettuce, and tomato, mayo. Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'OYIUl8h7AJrt2a6WVwnx.jpg', 0, 'toasted-b-l-t', 1641801600, 1642752000, 0),
(638, 'Grilled Cheese Sandwich', 34, 6, '', 'Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'cYrKUu8kzjJXmOq2lRBd.jpg', 0, 'grilled-cheese-sandwich', 1641801600, 1642752000, 0),
(639, 'Croissant Sandwich', 34, 6, '', 'Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'tWgHkQEazOJyBCNZqG8l.jpg', 0, 'croissant-sandwich', 1641801600, 1642752000, 0),
(640, 'French Dip au Jus', 34, 6, '', 'Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'gxNVKSvM8rTEXyQ2m31j.jpg', 0, 'french-dip-au-jus', 1641801600, 1642752000, 0),
(641, 'Shrimp Kaiser', 34, 6, '', 'Fresh Pacific shrimp in light mayo on a toasted Kaiser bun, Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', '5aGHkogb0Xw8hVR7jQ2O.jpg', 0, 'shrimp-kaiser', 1641801600, 1642752000, 0),
(642, 'Toasted Shrimp House', 34, 6, '', 'Toasted sandwich with bacon, tomato, shrimp, lettuce, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'aeb6uHKvqIxZ5SBh13dP.jpg', 0, 'toasted-shrimp-house', 1641801600, 1642752000, 0),
(643, 'Toasted Club House', 34, 6, '', 'Toasted sandwich with bacon, tomato, turkey, lettuce, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'SrmG3Q2dolnpwjvfW86H.jpg', 0, 'toasted-club-house', 1641801600, 1642752000, 0),
(644, 'Manhattan Clubhouse', 34, 6, '', 'Toasted sandwich with ham, cheese, turkey, lettuce, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', '6AWEhJS9IC1tkqKpjGel.jpg', 0, 'manhattan-clubhouse', 1641801600, 1642752000, 0),
(645, 'Toasted Crab House', 34, 6, '', 'Toasted sandwich with bacon, tomato, local dungeness crab, lettuce, and mayo. Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'iuTOzZIjPwAHvW8FRCEX.jpg', 0, 'toasted-crab-house', 1641801600, 1642752000, 0),
(646, 'Hot Veal Cutlets', 34, 6, '', 'Served with corn, mashed potatoes, and Gravy', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', '1G2xS78nzqdJCPQI5Hac.jpg', 0, 'hot-veal-cutlets', 1641801600, 1642752000, 0),
(648, 'New York 7oz. Steak Sandwich', 85, 6, '', 'Served with Fries, Onion Rings and Garlic Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"25.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'new-york-7oz-steak-sandwich', 1641888000, 1641888000, 0),
(649, 'Mixed Lunch', 85, 6, '', 'Dry Ribs, Fantail Prawns, Chicken Strips. Served with Green Salad and Soup of the Day', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'mixed-lunch', 1641888000, 1641888000, 0),
(650, 'Salisbury Steak with Fried Mushrooms', 85, 6, '', 'Served with corn, mashed Potatoes, and Gravy.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"16.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'salisbury-steak-with-fried-mushrooms', 1641888000, 1641888000, 0),
(651, 'Hot Beef Sandwich', 85, 6, '', 'Served on garlic toast, with corn and with your choice of side', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'hot-beef-sandwich', 1641888000, 1641888000, 1),
(652, 'Hot Turkey Sandwich', 85, 6, '', 'Served on garlic toast, corn and with your choice of side', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'hot-turkey-sandwich', 1641888000, 1641888000, 1),
(653, 'Caesar Salad', 85, 6, '', 'Salad', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'caesar-salad', 1641888000, 1641888000, 1),
(654, 'Chef\'s Salad', 85, 6, '', 'Ham, Egg, Turkey and Cheese', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'chef-s-salad', 1641888000, 1641888000, 0),
(655, 'Thai Chili Chicken with Rice', 86, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'thai-chili-chicken-with-rice', 1641888000, NULL, 0),
(656, 'Chow Mein', 86, 6, '', 'with Chicken, Beef or Mushrooms', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"9.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'chow-mein', 1641888000, 1641888000, 1),
(657, 'Beef and Mushroom Chow Mein', 86, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'beef-and-mushroom-chow-mein', 1641888000, NULL, 1),
(658, 'Special Fried Rice', 86, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'special-fried-rice', 1641888000, NULL, 0),
(659, 'Dry Garlic Spareribs', 86, 6, '', 'Served with steamed rice', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'dry-garlic-spareribs', 1641888000, 1641888000, 1),
(660, 'Sweet and Sour Boneless Pork', 86, 6, '', 'Served with rice', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'sweet-and-sour-boneless-pork', 1641888000, 1641888000, 0),
(661, 'Sweet and Sour Spareribs', 86, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'sweet-and-sour-spareribs', 1641888000, NULL, 1),
(662, 'Vietnamese Pork Chops with fried egg', 86, 6, '', 'Served with Steamed Rice, fried egg and veggies', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'vietnamese-pork-chops-with-fried-egg', 1641888000, 1641888000, 0),
(663, 'Grilled Pork with Vermicelli Noodles and 2 Spring Rolls', 86, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'grilled-pork-with-vermicelli-noodles-and-2-spring-rolls', 1641888000, NULL, 0),
(664, 'Vietnamese Salad Rolls (2)', 86, 6, '', 'Vermicelli noodles, prawns or pork, and veggies wrapped in rice paper with peanut sauce to dip.', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'vietnamese-salad-rolls-2', 1641888000, 1641888000, 1),
(665, 'Vietnamese grilled chicken with fried egg', 86, 6, '', 'Served on steamed rice and veggies', '{\"\":\"\"}', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"15.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'vietnamese-grilled-chicken-with-fried-egg', 1641888000, 1641888000, 0),
(666, 'Egg Foo Young', 86, 6, '', 'Served with steamed rice', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"12.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'egg-foo-young', 1641888000, 1641888000, 0),
(667, 'Pad Thai Noodles', 86, 6, '', 'Rice noodles with eggs, bean sprouts, green onions, cilantro, lime and peanuts. Served with hoisin sauce and sirarcha', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'pad-thai-noodles', 1641888000, 1641888000, 1),
(668, 'Vietnamese grilled chicken and spring roll on vermicelli noodles', 86, 6, NULL, NULL, '[]', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"14.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'vietnamese-grilled-chicken-and-spring-roll-on-vermicelli-noodles', 1641888000, 1641888000, 0),
(669, 'Soup of the Day', 87, 6, '', 'Soup of the Day served with crackers', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"5.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'soup-of-the-day', 1641888000, 1641888000, 0),
(670, 'Clam Chowder', 87, 6, '', 'Homemade Clam Chowder served with crackers', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'clam-chowder', 1641888000, 1641888000, 0),
(671, 'kid\'s 1 Piece Cod Fish \'n Chips', 88, 6, '', 'served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'kid-s-1-piece-cod-fish-n-chips', 1641888000, 1641888000, 0),
(672, 'Hot Dog', 88, 6, '', 'Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'hot-dog', 1641888000, 1641888000, 0),
(673, 'Kid\'s grilled Cheese Sandwich', 88, 6, '', 'Served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'kid-s-grilled-cheese-sandwich', 1641888000, 1641888000, 0),
(674, 'Kids Burger', 88, 6, '', 'Plain burger served with Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'kids-burger', 1641888000, 1641888000, 0),
(675, 'Kids Pasta', 88, 6, '', 'served with meat sauce and Garlic Toast', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'kids-pasta', 1641888000, 1641888000, 0),
(676, 'Kids Quesadilla', 88, 6, '', 'Served with fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'kids-quesadilla', 1641888000, 1641888000, 0),
(677, 'Egg Rolls', 89, 6, '', 'Each', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.5\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'egg-rolls', 1641888000, 1641888000, 0),
(678, 'Spring rolls', 89, 6, '', '2 Spring Rolls', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'spring-rolls', 1641888000, 1641888000, 0),
(679, 'Chow Mein Bun', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'chow-mein-bun', 1641888000, NULL, 0),
(680, 'Garlic Toast', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'garlic-toast', 1641888000, NULL, 0),
(681, 'Onion Rings', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.25\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'onion-rings', 1641888000, NULL, 1),
(682, 'French Fries', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'french-fries', 1641888000, NULL, 1),
(683, 'Poutine Fries', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"8.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'poutine-fries', 1641888000, NULL, 1),
(684, 'Butter Chicken Poutine', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'butter-chicken-poutine', 1641888000, NULL, 1),
(685, 'Italian Poutine', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'italian-poutine', 1641888000, NULL, 1),
(686, 'Yam Fries', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'yam-fries', 1641888000, NULL, 0),
(687, 'Zucchini Sticks', 89, 6, '', 'Served with Tzatziki Dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'zucchini-sticks', 1641888000, 1641888000, 0),
(688, 'Mozzarella Sticks', 89, 6, '', 'Served with Salsa Dip', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"11.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'mozzarella-sticks', 1641888000, 1641888000, 0),
(689, 'Gravy', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.50\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'gravy', 1641888000, NULL, 0),
(690, 'Sweet and Sour Sauce', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.50\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'sweet-and-sour-sauce', 1641888000, 1641888000, 0),
(691, 'Snack Tray', 89, 6, '', 'Platter of Calamari, Zucchini Sticks, Mozzarella Sticks, Fantail Prawns, Chicken Nuggets and Fries', '{\"\":\"\"}', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"28.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'snack-tray', 1641888000, 1641888000, 0),
(692, 'Potato wedges', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"7.25\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'potato-wedges', 1641888000, NULL, 0),
(693, 'Side of Steamed Rice', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.50\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-of-steamed-rice', 1641888000, NULL, 0),
(694, 'Side order of Bacon', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-of-bacon', 1641888000, NULL, 0),
(695, 'Side order of Ham', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-of-ham', 1641888000, NULL, 0),
(696, 'Side order of Sausage', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-of-sausage', 1641888000, NULL, 0),
(697, 'Side order of Toast', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-of-toast', 1641888000, NULL, 1),
(698, 'Side order of 2 Eggs', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-of-2-eggs', 1641888000, NULL, 0),
(699, 'Side order Hashbrown', 89, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'side-order-hashbrown', 1641888000, NULL, 0),
(700, 'Coca-Cola 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'A8IxzNQKrcpG4fts36SL.jpg', 1, 'coca-cola-500ml', 1642492800, 1642579200, 0),
(701, 'Coke Zero 500 ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'CBm50sUQwgxfTOLZR4Gl.jpg', 1, 'coke-zero-500-ml', 1642492800, 1642579200, 0),
(702, 'Diet Coke 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'yXhjbJ54ecHda0YMKuSt.jpg', 1, 'diet-coke-500ml', 1642492800, 1642579200, 0),
(703, 'Ginger Ale 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'YVyn34icOCT1rHumI6oK.jpg', 1, 'ginger-ale-500ml', 1642492800, 1642579200, 0),
(704, 'Sprite 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'xDUyhSY3et4X8FGpEcVJ.jpg', 1, 'sprite-500ml', 1642492800, 1642579200, 0),
(705, 'Fresca 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'sMCd8qwbg1B9IuFQzS54.jpg', 1, 'fresca-500ml', 1642492800, 1642579200, 0),
(706, 'Fanta 500ml', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.75\"}', '{\"menu\":\"\"}', 'XwSLQ27nBOjY8GRZv4zC.jpg', 1, 'fanta-500ml', 1642492800, 1642579200, 0),
(707, 'Pepsi Can', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.75\"}', '{\"menu\":\"\"}', 'Am1HP7UhVaeEdMJ8IRlL.jpg', 1, 'pepsi-can', 1642492800, 1642579200, 0),
(708, 'Diet Pepsi Can', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.75\"}', '{\"menu\":\"\"}', 'EfCL2D60qZtcmlYB7Ay5.jpg', 1, 'diet-pepsi-can', 1642492800, 1642579200, 0),
(709, 'Orange Crush Can', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"1.75\"}', '{\"menu\":\"\"}', 'nHl1mSo3N5OYIU6JjFKp.jpg', 1, 'orange-crush-can', 1642492800, 1642579200, 0),
(710, 'Monster Original (Black)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'jbC0DndJyPcxe2rpFz4l.jpg', 1, 'monster-original-black', 1642492800, 1642579200, 0),
(711, 'Monster Zero Ultra (White)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'yvu3KC7PkNoriQpJERUW.jpg', 1, 'monster-zero-ultra-white', 1642492800, 1642579200, 0),
(712, 'Monster Ultra Paradise (Green)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'H32r68mibNTIC4wq7ydG.jpg', 1, 'monster-ultra-paradise-green', 1642492800, 1642579200, 0),
(713, 'Monster Punch (Red)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'ojG9nxDiy6J3VIYszNud.jpg', 1, 'monster-punch-red', 1642492800, 1642579200, 0),
(714, 'Monster Ultra Rosa (Pink)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'h6f0oNDXMRwHujk2L3zY.jpg', 1, 'monster-ultra-rosa-pink', 1642492800, 1642579200, 0),
(715, 'Monster Ultra Sunrise (Orange)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'OY50JLvqkaNoxQ3jPfUt.jpg', 1, 'monster-ultra-sunrise-orange', 1642492800, 1642579200, 0),
(716, 'Monster Punch (Blue)', 22, 6, NULL, NULL, '[]', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'monster-punch-blue', 1642492800, NULL, 0),
(717, 'Monster Ultra Blue', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'OgXyK6p78s0JNUtH2dSB.jpg', 1, 'monster-ultra-blue', 1642492800, 1642579200, 0),
(718, 'Monster Coffee Java', 22, 6, NULL, NULL, '[]', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'monster-coffee-java', 1642492800, NULL, 0),
(719, 'Powerade Fruit Punch', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'QTD4o2L8EeNv9cHWBfz7.jpg', 1, 'powerade-fruit-punch', 1642492800, 1642579200, 0),
(720, 'Powerade Mixed Berry', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'aSpWJIXmClUVb2enZ45x.jpg', 1, 'powerade-mixed-berry', 1642492800, 1642579200, 0),
(721, 'Powerade Strawberry-Lemonade', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'HU1xgdhl0O64DqkB8v72.jpg', 1, 'powerade-strawberry-lemonade', 1642492800, 1642579200, 0),
(722, 'Powerade Orange', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'NGQIFarh0KxMEvZ57qyT.jpg', 1, 'powerade-orange', 1642492800, 1642579200, 0),
(723, 'Powerade Mixed Berry Zero', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'i7GoBEWIfeqLOcmd4Zbp.jpg', 1, 'powerade-mixed-berry-zero', 1642492800, 1642579200, 0),
(724, 'NOS Blue', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'W93R4Yj0lMApdrKmch2i.jpg', 1, 'nos-blue', 1642492800, 1642579200, 0),
(725, 'NOS Green (Sonic Sour)', 22, 6, NULL, NULL, '[]', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"4\"}', '{\"menu\":\"\"}', 'feYZ5pBGo0j1tAgHliTP.jpg', 1, 'nos-green-sonic-sour', 1642492800, 1642579200, 0),
(726, 'Nestea Lemon Iced Tea', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'wzc0lxuTXSsW78QEFHO5.jpg', 1, 'nestea-lemon-iced-tea', 1642492800, 1642579200, 0),
(727, 'Nestea Zero Iced Tea', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'm4rLyUCHpl0foGgRYskD.jpg', 1, 'nestea-zero-iced-tea', 1642492800, 1642579200, 0),
(728, 'Gold Peak Lemon Iced Tea', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'Nznk1RDOEXCABb2KTHwJ.jpg', 1, 'gold-peak-lemon-iced-tea', 1642492800, 1642579200, 0),
(729, 'Gold Peak Raspberry Iced Tea', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'XeGjgqQWOkxf51IYuaTr.jpg', 1, 'gold-peak-raspberry-iced-tea', 1642492800, 1642579200, 0),
(730, 'Gold Peak Peach', 22, 6, NULL, NULL, '[]', 'menu', 0, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'placeholder.png', 0, 'gold-peak-peach', 1642492800, NULL, 0),
(731, 'XXX Vitamin Water (Purple)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'zI5C2w3SEgoZhHm6iKUc.jpg', 1, 'xxx-vitamin-water-purple', 1642492800, 1642579200, 0),
(732, 'Multi-V Vitamin Water (white)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'M4pHgaCxXS0zIPkn1ArB.jpg', 1, 'multi-v-vitamin-water-white', 1642492800, 1642579200, 0),
(733, 'Mega C Vitamin Water (Red)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'EO5hxRJbX7SVcniQ3BNt.jpg', 1, 'mega-c-vitamin-water-red', 1642492800, 1642579200, 0),
(734, 'Energy Vitamin Water (Yellow)', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'Laq9gGAU5tlHBjCvPeZx.jpg', 1, 'energy-vitamin-water-yellow', 1642492800, 1642579200, 0),
(735, 'Orange Minute Maid Juice', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'j74oZKTM9m0HOn25VdbR.jpg', 1, 'orange-minute-maid-juice', 1642492800, 1642579200, 0),
(736, 'V-8 Juice', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', '184j2xmfB6nVc5AJtegh.jpg', 1, 'v-8-juice', 1642492800, 1642579200, 0),
(737, 'Dasani Water', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"2.95\"}', '{\"menu\":\"\"}', 'WoQzcx7ICenOB2KlLMDU.jpg', 1, 'dasani-water', 1642492800, 1642579200, 0),
(738, 'Chocolate Milk to Go', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'RA3dDEZzjy9OvlSkVtKT.jpg', 1, 'chocolate-milk-to-go', 1642492800, 1642579200, 0),
(739, 'Vanilla Milk to Go', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'pc4LFxonVAKG5rdBRUg3.jpg', 1, 'vanilla-milk-to-go', 1642492800, 1642579200, 0),
(740, 'Banana Milk to Go', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'usiEVjkrhA1eUFq5S7JB.jpg', 1, 'banana-milk-to-go', 1642492800, 1642579200, 0),
(741, 'Strawberry Milk to Go', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"3.25\"}', '{\"menu\":\"\"}', 'FzH7dtmVAoCQOZD4hUB0.jpg', 1, 'strawberry-milk-to-go', 1642492800, 1642579200, 0),
(742, 'Vanilla Milkshake', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.50\"}', '{\"menu\":\"\"}', 'Bzfnpk92ELtFOdM8IUC4.jpg', 0, 'vanilla-milkshake', 1642492800, 1642579200, 0),
(743, 'Strawberry Milkshake', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"6.50\"}', '{\"menu\":\"\"}', 'Y46Se8HWp2fBmUzLdQtK.jpg', 0, 'strawberry-milkshake', 1642492800, 1642579200, 0),
(744, 'Vietnamese Iced Coffee', 22, 6, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"4.25\"}', '{\"menu\":\"\"}', 'EURtWLCukXZD3jNglpHM.jpg', 0, 'vietnamese-iced-coffee', 1642492800, 1642579200, 0),
(746, 'Butter chickens test', 60, 4, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"13.66\"}', '{\"menu\":\"\"}', 'BKqHZ3d6jhwWTaJz9U15.jpg', 1, 'butter-chickens-test', 1642665600, 1643270400, 1),
(747, 'tester', 60, 4, NULL, NULL, '[]', 'menu', 1, '{\"menu\":0}', '{\"menu\":\"10\"}', '{\"menu\":\"\"}', 'placeholder.png', 1, 'tester', 1642665600, NULL, 0);

--
-- Triggers `food_menus`
--
DELIMITER $$
CREATE TRIGGER `delete_order_index` AFTER DELETE ON `food_menus` FOR EACH ROW DELETE from food_categories_index WHERE mid = OLD.id AND restaurant_id = OLD.restaurant_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` char(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`) VALUES
(1, 'English', 'en'),
(2, 'Bengali', 'bn'),
(3, 'French', 'fr'),
(4, 'Espanol', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `order_placed_at` int(11) DEFAULT NULL,
  `order_approved_at` int(11) DEFAULT NULL,
  `order_preparing_at` int(11) DEFAULT NULL,
  `order_prepared_at` int(11) DEFAULT NULL,
  `order_delivered_at` int(11) DEFAULT NULL,
  `order_canceled_at` int(11) DEFAULT NULL,
  `order_refunded_at` int(11) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_info` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_menu_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_addons_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_varient_price` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_delivery_charge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_vat_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'GST',
  `total_pst_amount` float NOT NULL COMMENT 'PST',
  `service_charge` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credits` float DEFAULT NULL,
  `tip` float DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `servings` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addons` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_commissions`
--

CREATE TABLE `paid_commissions` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `paid_amount` float NOT NULL,
  `paid_tax` float NOT NULL COMMENT 'GST',
  `paid_pst` float NOT NULL COMMENT 'PST',
  `date_added` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_commission_history`
--

CREATE TABLE `paid_commission_history` (
  `hid` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `paid_amount` float DEFAULT NULL,
  `paid_tax` float DEFAULT NULL COMMENT 'GST',
  `paid_pst` float NOT NULL COMMENT 'PST',
  `date_added` int(11) DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_to_pay` float DEFAULT NULL,
  `amount_paid` float DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_status` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `key`, `value`) VALUES
(1, 'cash_on_delivery', '[{\"active\":\"1\"}]'),
(2, 'paypal', '[{\"active\":\"0\",\"mode\":\"sandbox\",\"currency\":\"CAD\",\"sandbox_client_id\":\"\",\"sandbox_secret_key\":\"\",\"production_client_id\":\"production-client-id\",\"production_secret_key\":\"production-secret-key\"}]'),
(3, 'stripe', '[{\"active\":\"1\",\"testmode\":\"off\",\"currency\":\"CAD\",\"public_key\":\"\",\"secret_key\":\"\",\"public_live_key\":\"\",\"secret_live_key\":\"\"}]'),
(4, 'credit_debit_on_delivery', '[{\"active\":\"1\"}]'),
(5, 'wallet', '[{\"active\":\"1\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuisine` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_name` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1 COMMENT 'Show/hidden restaurant on frontend',
  `online_status` int(11) NOT NULL DEFAULT 0 COMMENT 'Online|Offline',
  `schedule` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'a json object with time',
  `owner_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'placeholder.png',
  `delivery_charge` float DEFAULT NULL,
  `maximum_time_to_deliver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '00:45 mins | 20-30 mins',
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `about`, `cuisine`, `street_no`, `street_name`, `city`, `place_id`, `address`, `phone`, `visibility`, `online_status`, `schedule`, `owner_id`, `thumbnail`, `delivery_charge`, `maximum_time_to_deliver`, `latitude`, `longitude`, `status`, `slug`, `created_at`, `updated_at`, `website`, `rating`) VALUES
(2, 'PJ’s Midway', 'Snacks, pop, ice, grocery items, fresh sandwiches, fresh baked pastry, deep fried chicken and taters, bait for the fishermen, and fresh coffee is always on.', '[4]', '901', '6 Avenue East', 'Prince Rupert', 'ChIJN0iVymXVclQRjb-bbF8zMvo', '901 6 Ave E, Prince Rupert, BC V8J 1X7, Canada', '2506242100', 1, 0, '{\"saturday_opening\":\"14:00\",\"saturday_closing\":\"23:59\",\"sunday_opening\":\"14:00\",\"sunday_closing\":\"23:59\",\"monday_opening\":\"12:00\",\"monday_closing\":\"23:59\",\"tuesday_opening\":\"12:00\",\"tuesday_closing\":\"23:59\",\"wednesday_opening\":\"12:00\",\"wednesday_closing\":\"23:59\",\"thursday_opening\":\"12:00\",\"thursday_closing\":\"23:59\",\"friday_opening\":\"12:00\",\"friday_closing\":\"23:59\"}', 11, 'FSoxHdpBY8frOybD9cNA.jpg', 2.99, '20-35', '54.3207405', '-130.3057249', 1, 'pj-s-midway', 1611772200, 1645948800, '', '4.7'),
(4, 'Test Restaurant', 'This is just a test restaurant', '[4]', '9355', '140 Street', 'Surrey', 'ChIJT5smsN3ZhVQRo3qHXsfGmLQ', '9355 140 St, Surrey, BC V3V 5Z3, Canada', '9041240382', 1, 1, '{\"saturday_opening\":\"00:00\",\"saturday_closing\":\"23:59\",\"sunday_opening\":\"00:00\",\"sunday_closing\":\"23:59\",\"monday_opening\":\"00:00\",\"monday_closing\":\"23:59\",\"tuesday_opening\":\"00:00\",\"tuesday_closing\":\"23:59\",\"wednesday_opening\":\"00:00\",\"wednesday_closing\":\"23:59\",\"thursday_opening\":\"00:00\",\"thursday_closing\":\"23:59\",\"friday_opening\":\"00:00\",\"friday_closing\":\"23:59\"}', 11, 'placeholder.png', 0, '20-35', '49.1728244', '-122.8349553', 1, 'test-restaurant', 1637136000, 1644652800, '', '0'),
(5, 'Trishan Food Market', 'A family operated Restaurant that serves fusion of Asian cuisine cooked to perfection using fresh ingredients and best spices.', '[5]', '709', '2 Avenue West', 'Prince Rupert', 'ChIJDykPoRPVclQRMtyaxGxBeH4', '709 2 Ave W, Prince Rupert, BC V8J 1H4, Canada', '2506350548', 0, 0, '{\"saturday_opening\":\"14:00\",\"saturday_closing\":\"22:00\",\"sunday_opening\":\"closed\",\"sunday_closing\":\"closed\",\"monday_opening\":\"12:00\",\"monday_closing\":\"22:00\",\"tuesday_opening\":\"12:00\",\"tuesday_closing\":\"22:00\",\"wednesday_opening\":\"12:00\",\"wednesday_closing\":\"22:00\",\"thursday_opening\":\"12:00\",\"thursday_closing\":\"22:00\",\"friday_opening\":\"12:00\",\"friday_closing\":\"22:00\"}', 203, 'Ac3WYVbtnSRN2amx4PlB.jpg', 0, '25-45', '54.311248', '-130.3285068', 1, 'trishan-food-market', 1639209600, 1644739200, '', '0'),
(6, 'No.1 Restaurant and Catering', 'Serving up a mix of Chinese and Vietnamese foods they are sure to have something for everyone.', '[7,6]', '500', '2 Avenue West', 'Prince Rupert', 'ChIJK3ZEXhPVclQRZX0BPpXIhxY', '500 2 Ave W, Prince Rupert, BC V8J 3T6, Canada', '2506278436', 0, 0, '{\"saturday_opening\":\"14:00\",\"saturday_closing\":\"23:00\",\"sunday_opening\":\"19:00\",\"sunday_closing\":\"23:00\",\"monday_opening\":\"closed\",\"monday_closing\":\"closed\",\"tuesday_opening\":\"11:00\",\"tuesday_closing\":\"23:00\",\"wednesday_opening\":\"11:00\",\"wednesday_closing\":\"23:00\",\"thursday_opening\":\"11:00\",\"thursday_closing\":\"23:00\",\"friday_opening\":\"11:00\",\"friday_closing\":\"23:00\"}', 244, 'QPt1iTOejF7D9q0kIJd6.jpg', 2.99, '30-45', '54.3132175', '-130.3278146', 1, 'no-1-restaurant-and-catering', 1641196800, 1646640000, NULL, '5.0');

--
-- Triggers `restaurants`
--
DELIMITER $$
CREATE TRIGGER `add_restaurant_settings` AFTER INSERT ON `restaurants` FOR EACH ROW INSERT INTO restaurant_settings(restaurant_id, owner_id, created_at) VALUES(NEW.id, NEW.owner_id, NEW.created_at)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_menu_data` AFTER DELETE ON `restaurants` FOR EACH ROW DELETE FROM food_menus WHERE restaurant_id = OLD.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_res_settings` AFTER DELETE ON `restaurants` FOR EACH ROW DELETE FROM restaurant_settings WHERE restaurant_id = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_settings`
--

CREATE TABLE `restaurant_settings` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `res_percent` int(11) NOT NULL,
  `admin_percent` int(11) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_settings`
--

INSERT INTO `restaurant_settings` (`id`, `restaurant_id`, `owner_id`, `res_percent`, `admin_percent`, `service_charge`, `created_at`) VALUES
(12, 2, 11, 100, 0, 10, 1611772200),
(13, 4, 11, 95, 5, 5, 1637136000),
(15, 5, 203, 100, 0, 10, 1639209600),
(16, 6, 244, 95, 5, 0, 1641196800);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `order_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `res_reply` text COLLATE utf8_unicode_ci NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'owner'),
(4, 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `key`, `value`) VALUES
(1, 'sender', 'php_mailer'),
(2, 'protocol', 'smtp'),
(3, 'host', 'smtp.titan.email'),
(4, 'username', 'noreply@foodrive.ca'),
(5, 'password', 'noreply007'),
(6, 'port', '587'),
(7, 'security', 'tls'),
(8, 'from', 'foodrive.ca'),
(9, 'debug', 'false'),
(10, 'show_error', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `s_id` int(11) NOT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `refund_fault` varchar(20) NOT NULL,
  `owner_debt` float NOT NULL,
  `tax_deduct` float NOT NULL COMMENT 'GST',
  `pst_deduct` float NOT NULL COMMENT 'PST',
  `system_debt` float NOT NULL,
  `refund_reason` text NOT NULL,
  `gen_cmt` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:pending|1:approve|2:reject	',
  `add_date` varchar(50) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`s_id`, `order_id`, `user_id`, `sub`, `brief`, `refund_fault`, `owner_debt`, `tax_deduct`, `pst_deduct`, `system_debt`, `refund_reason`, `gen_cmt`, `status`, `add_date`, `update_at`) VALUES
(1, 'OR-1636934016-154', 154, 'Items are missing or incorrect', 'Not a big problem. Just letting you guys know ya store did 12 mozza sticks instead of 6 and 6 mac&amp;cheese bites instead of 12.', 'restaurant', 3, 0, 0, 0, 'Just letting you guys know ya store did 12 mozza sticks instead of 6 and 6 mac&amp;amp;cheese bites instead of 12', 'Just letting you guys know ya store did 12 mozza sticks instead of 6 and 6 mac&amp;amp;cheese bites instead of 12', 1, '1636935887', '1637044204'),
(2, 'OR-1640295442-215', 215, 'Items are missing or incorrect', 'Missing 4 chicken', '', 0, 0, 0, 0, '', 'chinken already there.', 2, '1640298984', '1640411279'),
(3, 'OR-1640295442-215', 215, 'Not in the list', 'Hey sorry found the chicken thx', '', 0, 0, 0, 0, '', 'chicken already there, customer found it', 2, '1640299199', '1640411362'),
(4, 'OR-1641099870-114', 114, 'Items are missing or incorrect', 'Didn\'t have picked so the customer is not charged for that', 'restaurant', 5.1, 0, 0, 0, 'Customer didn’t charged for pickles as they were out of stock', 'Customer didn’t charged for pickles as they were out of stock', 1, '1641134027', '1641134208'),
(5, 'OR-1641604965-228', 228, 'Not in the list', '8 pieces of my chicken were not cooked properly! They were pink bloody in middle of chicken ! We phoned pjs to put in a complaint and the lady hung up on us ..', 'restaurant', 17.5, 2, 0, 0, '8 pieces of chicken were bloody', 'Refunded 19.50', 1, '1641614030', '1641653508'),
(6, 'OR-1641797220-114', 114, 'Not in the list', 'Other order was charged 5.60 less #OR-1641793395-129', 'restaurant', 5.6, 0, 0, 0, 'Other order was charged 5.60 less #OR-1641793395-129.', 'Other order was charged 5.60 less #OR-1641793395-129.', 1, '1641803775', '1641803862'),
(7, 'OR-1641861121-174', 174, 'I have food taste, quality or quantity issue', 'Both the 2 piece chicken orders both had dry chicken which we threw away but the taters were good', 'restaurant', 10, 0, 0, 0, 'Both the 2 piece chicken orders both had dry chicken', 'Both the 2 piece chicken orders both had dry chicken', 1, '1641865981', '1641867111'),
(25, 'OR-1645044666-275', 275, 'Items are missing or incorrect', 'I was suppose to get 2 energy drinks today with my order and they only sent the one drink', 'restaurant', 4, 0.2, 0.28, 0, 'Missing 1 energy drink in the order', 'Missing drink', 1, '1645087349', '1645136726'),
(26, 'OR-1645511352-235', 235, 'Items are missing or incorrect', 'Ordered tostitos cheese, received salsa instead with no phone call to inform us that they had no tostitos cheese left', 'restaurant', 5.5, 0, 0, 0, 'Incorrect dipping', 'Incorrect dip', 1, '1645513376', '1645516771'),
(27, 'OR-1646636785-268', 268, 'I have food taste, quality or quantity issue', 'I ordered a large bag of chips got 3 small bags. Although the price might be the same the size of the bag is not. If I wanted 3 small bags at 180g I woulda said 3 small bags at 180g both corn dogs are burnt. Like black....', 'restaurant', 9, 0, 0, 0, 'Burnt corn dogs', 'Hello', 1, '1646639006', '1646772589'),
(28, 'OR-1646377062-114', 114, 'Not in the list', 'Got less chicken on call, so deducted less money from customer', 'restaurant', 3.99, 0.2, 0, 0, 'Charge less from customer, she got less chicken', 'Deducted money from this as we charged less from another order today (8 march), Didn’t charge for pretzel minis', 1, '1646772331', '1646772449');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `key`, `value`) VALUES
(1, 'language', 'en'),
(2, 'purchase_code', 'c3fd790a-7126-4045-8f74-3d62b410d428'),
(3, 'system_name', ''),
(4, 'system_title', 'Foodrive'),
(5, 'system_email', 'foodrive.mail@gmail.com'),
(6, 'address', ''),
(7, 'phone', '9041240384'),
(8, 'system_currency', 'CAD'),
(9, 'currency_position', 'left'),
(10, 'author', 'Navjot Singh'),
(11, 'website_description', 'Want a delicious meal, but no time we will deliver it hot and yummy. Order food from your neighborhood local joints. Order Now.'),
(12, 'website_keywords', 'foodrive,foo,drive,online,food,buy,canada,ecom,store,nearby,local,meal,restaurant,driver,rider,spyce'),
(13, 'footer_text', 'foodrive'),
(14, 'footer_link', 'https://foodrive.ca/'),
(15, 'timezone', 'America/Vancouver'),
(16, 'recaptcha_sitekey', NULL),
(17, 'recaptcha_secretkey', NULL),
(18, 'version', '2.1'),
(19, 'gmap_api_key', NULL),
(20, 'phone_validation', 'bcac0cc5bb4d44bf8bc825e2bbab2b77'),
(21, 'inspect_elements', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `code` varchar(75) DEFAULT NULL,
  `amt` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `add_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `user_id`, `s_id`, `code`, `amt`, `type`, `add_date`) VALUES
(1, 154, 1, NULL, 3, 'credit', '1637044204'),
(2, 114, 4, NULL, 5.1, 'credit', '1641134208'),
(3, 228, 5, NULL, 19.5, 'credit', '1641653508'),
(4, 228, NULL, 'OR-1641792234-228', 19.15, 'debit', '1641792234'),
(5, 114, 6, NULL, 5.6, 'credit', '1641803862'),
(6, 174, 7, NULL, 10, 'credit', '1641867111'),
(7, 174, NULL, 'OR-1642034821-174', 10, 'debit', '1642034822'),
(8, 228, NULL, 'OR-1642223692-228', 0.35, 'debit', '1642223692'),
(26, 275, 25, NULL, 4.48, 'credit', '1645136726'),
(27, 235, 26, NULL, 5.5, 'credit', '1645516771'),
(28, 114, 28, NULL, 4.19, 'credit', '1646772449'),
(29, 268, 27, NULL, 9, 'credit', '1646772589');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0:Pending|1:Approved|2:Suspend\r\n',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `verify_token`, `password`, `role_id`, `status`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'Administrator', 'foodrive.mail@gmail.com', '9041240382', '', 'f442c811a4e3200fb0763570c4dededa3a91acc8', 1, 1, NULL, 1705910400, 'MSHOVcaA0QFihRE7Jflb.jpg'),
(11, 'Paramjeet singh', 'pjsmidway@foodrive.ca', '4378861462', '', 'f7dba7f8c3678a48a8260f6512b1614301cf39c6', 3, 1, NULL, 1164096000, 'Lx4Dj5nBdEeUXYC6Ri3u.jpg'),
(96, 'Navjot singh', 'ns949405@gmail.com', '8735090139', 'TaXuZH8KvY0pzYwd0Btj', '9d1d9a22c1527668c1fd7c3e8e0011da61c01c49', 2, 1, 1632219053, 1761030000, 'placeholder.png'),
(103, 'Mohit Sethi', 'mohitsethi148@gmail.com', '7782424779', NULL, 'e2096ba380c644e6104eab430d78ee4afb3c861b', 4, 1, 1632894936, 1671609600, 'placeholder.png'),
(107, 'Shivin sharma', 'shivinsharma0216@gmail.com', '6047169004', 'XC2nc7ATHLRzpahdUuYT', '3d609ad10d563144c5196acb03fdc63e7697c078', 2, 1, 1633639246, NULL, 'placeholder.png'),
(108, 'Curtis Wesley', 'curtis20wesley@hotmail.com', '2506318734', '96eVCw6Cgk5ylB6EfnwM', '2cade454e7ce85a0cbab1ec1cd10b23e85ca8dde', 2, 1, 1633662471, NULL, 'placeholder.png'),
(109, 'Nitish Goel', 'nitishgoel44@gmail.com', '6046133921', 'CtliaiQyXKGHnQxfWF1M', '079f87133a9dd9226ce1f4986bc65c155405f220', 2, 1, 1633757625, NULL, 'placeholder.png'),
(110, 'Hannah Louise Philippson Madill', 'hannahmadill@gmail.com', '7802913017', 'Zezz0X8JaZdHo1WuzLvX', '220b1d05b5a416ac32164bec05d2122a02ec63c1', 2, 1, 1633815756, NULL, 'placeholder.png'),
(111, 'Michael', 'jedimaster4712@gmail.com', '7788841916', 'QiyVIJsqZXPfYuzJGkdL', '0c20ceb0e304efc1d382537140a0346fa9a9154a', 2, 1, 1634089387, NULL, 'placeholder.png'),
(112, 'Josh', 'jthomas.r@hotmail.com', '2506002285', '5knrIcodoKiaikZtZG5j', '005674a82e8a141d0c19ff01b4520da2b0467fc7', 2, 1, 1634094900, NULL, 'placeholder.png'),
(113, 'Brianna', 'briannald22@gmail.com', '7786452048', 'VceZR1rqYKCZ9LQ6mQwe', '46cb9818937638faef464c65557ba28a1349696b', 2, 1, 1634275958, NULL, 'placeholder.png'),
(114, 'Phone orders', 'phone@foodrive.ca', '2506003058', '1jGgHQmuvct8zykuJTiq', 'e2096ba380c644e6104eab430d78ee4afb3c861b', 2, 1, 1634334388, 982828800, 'placeholder.png'),
(115, 'Destiny Green', 'destinysb.green@hotmail.com', '2365585521', '0i33WkKHSw4rbAj3c6dv', 'd5aa20f94c60acbd10b225976d09d19e1b730a03', 2, 1, 1634608233, NULL, 'placeholder.png'),
(116, 'Krista', 'krista.leigh07@hotmail.com', '7786450273', 'FuTm2L5VTOVPZVfAMuG4', 'dcfe795549c98957ec15aaebcfa99ed25d7850ea', 2, 1, 1634621260, NULL, 'placeholder.png'),
(118, 'Zoey', 'Hillharriszy68@gmail.com', '7782138158', 'yk9XDYLgTA6fL4ibOseY', '5f7419f25207633db60ef26d50354663795cdc05', 2, 1, 1634621645, NULL, 'placeholder.png'),
(121, 'Amy', 'amydsweety@gmail.com', '7786450818', 'BW6ZhuosQloPPL6uPGmD', '3f3294b6706ccf007df292ed97a5c1395e9d5388', 2, 1, 1634688123, NULL, 'placeholder.png'),
(122, 'Ramona', 'ramonaalexcee@outlook.com', '7788846847', '3tJWY4BuXKvP4FzCxLge', 'bb1142f2755c2d2e980ad76b81d66ff72aadcc04', 2, 1, 1634766165, NULL, 'placeholder.png'),
(123, 'Kaitlyn Barton', 'kaitlyn_barton@yahoo.com', '2506006024', 'eETjrcBpy2aHN2R4PWZ1', '3204b05661d82787777ab28d9459ba6d0d9223e1', 2, 1, 1634704473, NULL, 'placeholder.png'),
(124, 'kevin chow', 'kevinchow3797@gmail.com', '2506006579', 'ZFknP4U2Lly7f8UAGD85', 'b3f143ab650b03f14aeaff29bf710cca7005e054', 2, 1, 1634706764, NULL, 'placeholder.png'),
(125, 'Mckay Ashley', 'ashleyangie11@icloud.com', '7784022293', 'fAp3ASVkVSqGjuqpH35E', '8a9f298127bf62cb03572cee2496b8785ab99a86', 2, 1, 1634763084, 1603263600, 'SdO2C9vJUiRWpyeH3ALZ.jpg'),
(126, 'Bruce hill', 'bruce_hill_jr@hotmail.com', '7788840266', 'LdjKpfwYPmUQuoA9gP9a', '5bea96ff01694ec28f4c7da8eab387133e64a555', 2, 1, 1634766821, NULL, 'placeholder.png'),
(127, 'Beth Gladstone', 'Bethanngladstone@gmail.com', '7786450445', '4vuTYai5VxbEEL18tRPC', '78d6e4f24549f092c22de11c8cfab235d8012802', 2, 1, 1634783693, NULL, 'placeholder.png'),
(128, 'Charlotte Vannier', 'charvan@citywest.ca', '7788846017', 'ehpnK9ZSYa6IoT8FDbeZ', '03302bde673a335a6ad00cf4d9aa0b92c767774a', 2, 1, 1634784205, NULL, 'placeholder.png'),
(129, 'kayla wesley', 'kayladawn10@hotmail.com', '2506005503', '2tSEaJMmzE49rxifljgg', '033c24a3d204d4a7dd6333bef3477eb95471a6ef', 2, 1, 1634787187, NULL, 'placeholder.png'),
(132, 'Bailey Barton', 'baileybarton32@gmail.com', '7786450661', 'Ryjm3PBhbs9uCqF6vaTz', 'b22ddd5f33cc7c236ccd1b548467cd160c63a296', 2, 1, 1634869100, NULL, 'placeholder.png'),
(133, 'Darren', 'Darrengreen331@gmail.com', '7786450911', 'fBJ3MBRaLQVOdtRksRMP', '39ccb32d95edfdbcd882f2b01809724ec640ea16', 2, 1, 1634869878, NULL, 'placeholder.png'),
(134, 'Austin sampare', 'aussie0503@hotmail.com', '7782100391', 'mlTiAyCsWFfHx4EJW6yV', '8fffdddb221fd708e32c29697bf55394a17dda16', 2, 1, 1634877323, NULL, 'placeholder.png'),
(135, 'Tim', 'thenooks1985@gmail.com', '2508457789', 'LHCijy6OddohBlV5auGw', 'f77729cef8fca2bcceca5c831824074942a43b6b', 2, 2, 1634937657, 1666335600, 'placeholder.png'),
(136, 'Caleb Perrie', 'calebperrie36@gmail.com', '2506158233', 'RhZvbwRBQE73h1rTLU9m', '3e1f6ac02ab3c686243aca18199903154b31d31c', 2, 1, 1634966070, NULL, 'placeholder.png'),
(137, 'Cody', 'codydennis715@outlook.com', '2505526507', 'aryfrDAImYRdVml4etEy', '6de6aec33bc6874d19ef6d799a021e2d16ac059f', 2, 1, 1635034693, NULL, 'placeholder.png'),
(138, 'George Nguyen-Green', 'x.x.Ascendance.x.x@gmail.com', '7783610531', 'PxrlzV2TALiFzn9Ywo9R', '169c34431abf6b25b248b4b9c0dc8df5b372b539', 2, 1, 1635038346, NULL, 'placeholder.png'),
(139, 'Ernest brown', 'Ebrown8857@gmail.com', '2506002167', 'DAPA8ReDjVZGOE6ck3tj', '9b3d1b47cc79e1a2e1f1983824a520f87ab79a53', 2, 1, 1635109951, NULL, 'placeholder.png'),
(140, 'Connie', 'connmarie07@gmail.com', '2506000459', '5RDB42bzMdkBHvpaPGnU', 'd393817b551ba94ac9f2bec68fb7911dd79ce7b5', 2, 1, 1635128363, NULL, 'placeholder.png'),
(141, 'Billy-Joe', 'billyjoecampbell0323@gmail.com', '7786452204', '5ToVXkG6JdXOTPt9dQxg', 'a55068fe0c32a143b35f20e7e3efdf5a113b6a38', 2, 1, 1635128608, NULL, 'placeholder.png'),
(142, 'Ceci Spence', 'c_spence96@hotmail.com', '7786517419', '7jU9xiuAxvY6Z410ciBC', '39d506b286fd0396a725eab40db212bb14b45f20', 2, 1, 1635139199, 1579680000, 'placeholder.png'),
(143, 'Jonathan Spence', 'jonathanspence42@gmail.com', '2506000758', 'ypAbUUt0ocGbJjkeYOtX', 'd2f99e3a5ef0cb7e441a3b78a012825d90985d22', 2, 1, 1635140089, NULL, 'placeholder.png'),
(144, 'Shaylee', 'shaylee.wing7@gmail.com', '7788840271', 'mmhud8hQfkZ9OqDQD2iE', '882e15a718fc6dabb8e9a636e3d4a7a9a9dd9f88', 2, 1, 1635144097, NULL, 'placeholder.png'),
(146, 'Lorrieanne', 'lorrieanne_r_l@live.ca', '7788841840', 'WsMdBfG1U8nD7x3U1juE', '89efc6323d3be5935476c5130dd654c7f5e17a2f', 2, 1, 1635201605, NULL, 'placeholder.png'),
(147, 'Jennifer', 'jen.pahl98@gmail.com', '7782272558', 'HrxL99AR1msK9ptonwlH', '19908bf2a309e07aa72d7474302079776de3235b', 2, 1, 1635213129, NULL, 'placeholder.png'),
(148, 'Gregory Hartling', 'gthartling@hotmail.com', '7802665035', 'JbCpawGcIayHHSEyUguH', 'e64801cb176b38b17f64b3bd17d3d4db46264fa0', 2, 1, 1635220635, NULL, 'placeholder.png'),
(149, 'Tristen Johnson', 'hastzyro@gmail.com', '2506002059', 'KOCod7wZc835nVhKycvC', 'b660d4f1da91e318a0b6b2753bb38836835ae072', 2, 1, 1635225782, NULL, 'placeholder.png'),
(150, 'Brendan', 'brendandanes88@gmail.com', '7783610278', '75QZ2H5ek50Y0sKCxzjm', '396f7626c4759dcb8dd34a4aaed172e703c432c7', 2, 1, 1635228139, NULL, 'placeholder.png'),
(151, 'Gladstone Susan', 'luv_the_puck_gal@hotmail.com', '7786450362', 'SkPJpSnzJEPT5zJQCAcO', '3679cdd64e82fd0cc58895e206afad0f9bd3c05c', 2, 1, 1635230064, NULL, 'placeholder.png'),
(152, 'Chrystal', 'chrystalbrown553@gmail.com', '2506002917', 'htPt19z2DRTXLYBQBoJJ', 'aeb728c75e8bad6ce7210db87944e175982c5af4', 2, 1, 1635303047, NULL, 'placeholder.png'),
(153, 'Meagan Clifton', 'muggin41@hotmail.com', '2506004970', 'fS8aHZbLlK2X9ePe4jiP', 'b91bd46b288436e6a51e5830dc27b15e71f7aa44', 2, 1, 1635382102, NULL, 'placeholder.png'),
(154, 'Jordan Alexcee', 'alexceej@gmail.com', '7788845255', 'hFUthSSYS5AR3NZja27D', '950f5738eb96300745f202a271fa7be20ddfcecb', 2, 1, 1635382205, NULL, 'placeholder.png'),
(155, 'Ryder Martin', 'rydermartin94@gmail.com', '7788849582', 'zmtUTiRmP8yJ9fzc3W84', '10ce611dfd91f2357b85ba25170e4962169bbc2f', 2, 1, 1635388538, NULL, 'placeholder.png'),
(156, 'damien nguyenreen', 'damien.r.nguyengreen@gmail.com', '7786450710', 'mdRCZclIk1edX4RjEvI6', '1c7f8667519a7880869abde7d2070ba4a3c6b51e', 2, 1, 1635394178, NULL, 'placeholder.png'),
(157, 'Garrett Shaw', 'ggfroed@hotmail.com', '2506001682', '2hwo9scH3H2AsSvYtNzQ', '73f49a2a4c8abe9d4521e241640381a52991bdb7', 2, 1, 1635398839, NULL, 'placeholder.png'),
(158, 'Darcy Stevens', 'das006@live.ca', '2506001334', 'DPCbh1yvjBoPUXbE6kL3', 'bedc59dbfb79cb68aba4955043482e757d29e69b', 2, 1, 1635548477, NULL, 'placeholder.png'),
(159, 'James', 'jtoddbarton@gmail.com', '2506004100', 'zB2WO67KIx2JMKiMeBgy', '29ac3bd5fb62c579ccebb595d09af7d52db78a07', 2, 1, 1635574254, NULL, 'placeholder.png'),
(160, 'Jeremy Stevens', 'stevens78@live.com', '7788844027', 'O8Gu3dedVb8mlnvss7F0', 'c832bb844f84d7a314c9c4985f1a1629254f36fe', 2, 1, 1635632761, NULL, 'placeholder.png'),
(161, 'Peggy', 'peggywatts001@gmail.com', '12506002755', 'OUqNjeJtKua5eMrNembh', '36c214cc4b349902e7cefca1062fc9fe19f3b57f', 2, 1, 1635643934, NULL, 'placeholder.png'),
(162, 'Jorja', 'jorjamarx@gmail.com', '7786450785', 'Oi20REUKBXBYpzd90EIa', '15a177fd3534962bbb61698e48e8a15dd920cb75', 2, 1, 1635660078, NULL, 'placeholder.png'),
(163, 'Victoria Harris', 'victoriabh99@gmail.com', '2368387063', 'ftCnVhBtlitznvGeYr0i', 'cb93429f3a673ab2e02bd65eba0c82b200fe373c', 2, 1, 1635718558, NULL, 'placeholder.png'),
(164, 'Allison', 'Ally_smith05@hotmail.com', '2506002553', 'TnlJBN6MZ4L2serHCx0J', '492b66df07f956005a4eb6ab41f0adf51edbb265', 2, 1, 1635745027, NULL, 'placeholder.png'),
(165, 'Jeffery', 'jefferyruss91@gmail.com', '2506001068', 'a87jzTV29hnMvUgkfTc3', 'f71c4d58202c4f3772cb698265eacb2f933766f5', 2, 1, 1635825120, NULL, 'placeholder.png'),
(166, 'Chelsea', 'chelseamarciia15@gmail.com', '2506000906', 'uSfGxQElZedkh4X78Xex', 'fd3a96df0c124c1e5141a1160b8c856f999e7876', 2, 1, 1635822376, NULL, 'placeholder.png'),
(167, 'Nina', 'Savnatmer04@gmail.com', '2369922304', 'lpPKQWcsO3Uzr0g6aEse', '10bcf2b870cb26308aa1ace8f237b59386f079d4', 2, 1, 1635833773, NULL, 'placeholder.png'),
(168, 'Jessie', 'jessiemarks05@gmail.com', '7788841977', 'PfH6pd9OX0UsqLwTfWzf', '3ec1aef3529fa655a212292e1e7e1d922cb66102', 2, 1, 1635908446, NULL, 'placeholder.png'),
(174, 'Brett', 'brettstevens03@hotmail.com', '2506004615', 'atH4JJHIWbB1fPRzFfJJ', 'a76d82f219d183051ddab882df747b1984fcb43f', 2, 1, 1636168237, NULL, 'placeholder.png'),
(175, 'Tyanna Stewart', 'ty.stewart3447@gmail.com', '7784003686', 'xef7REIaNLgtghDl86tK', '5e0184069b5dbce012e12fa46fb706b399601938', 2, 1, 1636327830, NULL, 'placeholder.png'),
(177, 'Will', 'wrbangus@hotmail.com', '2506415882', 'moD1GSBplmjF9JaBwHFF', 'fe78a17a1a31e07f0b71a1974f8220c47a3e167d', 2, 1, 1636577814, NULL, 'placeholder.png'),
(178, 'Tyler', 'tylermorven@gmail.com', '2506003691', 'weqaX8bCKGpCcLJUUWBG', 'af57a2e4faebe297f160f45feda50b567c771509', 2, 1, 1636585711, NULL, 'placeholder.png'),
(179, 'Tanya Gonu', 'tsg03@live.ca', '2506000683', 'dqX2IaFb5AsTyXP5yUr6', '0e99acdc48e4538a5733c9d5d9440a2c2166314a', 2, 1, 1636763639, NULL, 'placeholder.png'),
(180, 'April', 'april.stevens1979@gmail.com', '2506004296', '7EBfELubQodsShOLFzjk', 'b452d4427e3019fa31810cd671d31a255cb6d6cf', 2, 1, 1636870835, NULL, 'placeholder.png'),
(182, 'keenan', 'keenanr10@hotmail.com', '7788840218', 'A0vaoFt6XiWfFlf8ijXt', '73a56fa70b991c86cf3157812a7034d05ee5a0b6', 2, 1, 1636870951, NULL, 'placeholder.png'),
(183, 'Amber Sampare', 'amber.sampare02@gmail.com', '7782101339', 'nNrGHVx4DPku8y3svS65', '1f1897bf48dbb139ac71bc0c156a9006ee145535', 2, 1, 1636874188, NULL, 'placeholder.png'),
(184, 'D S', 'danieljohnsievert@hotmail.com', '7786450229', 'wRz9KXCMRQwMlLDKkqmg', 'af59315c82666953164f01f03c14a60db0e31a1d', 2, 1, 1637129991, NULL, 'placeholder.png'),
(185, 'Matthew', 'mattmusterer@gmail.com', '7788842073', '2382hULS4LmaABBEdc4e', '316daf62da8f7bf0cc26a609dd2c29f43fa3589a', 2, 1, 1637206693, NULL, 'placeholder.png'),
(186, 'Kelsey brown', 'kgb1996@hotmail.com', '7788842618', 'T072FrFC4OMifT1Oj8Vl', '4bc2fa6c7724f3c30296e03e53ba6c07d05af9bc', 2, 1, 1637299733, NULL, 'placeholder.png'),
(187, 'Irma', 'mckayirma@hotmail.com', '2506003007', 'uy3uB7VwTMbL7K0rPM56', 'ecf1cbe73214ed23b9dcc4bbeaad7c559e948d06', 2, 1, 1637368483, NULL, 'placeholder.png'),
(188, 'Brandie Smythe', 'Bsmythe15@gmail.com', '7785395780', NULL, 'e924a9a72dd380e28f965e19dd94cac659495aff', 4, 0, 1637372372, NULL, 'placeholder.png'),
(189, 'Charmaine', 'cedgar1996@outlook.com', '7786454796', 'r1QT73CAEe8J3A7JG4Jm', '98293bb70d6d70351250d6e4235ab5d2f627fc79', 2, 1, 1637534698, NULL, 'placeholder.png'),
(190, 'Courtney', 'courtney.green19@outlook.com', '7788840505', 'TYmJgfm0RNrgBzS9XKVh', '4fe0891c73325755a852a0579fafdca56371162d', 2, 1, 1637725604, NULL, 'placeholder.png'),
(191, 'Kwiiaas', 'kwiiaasrparnell@hotmail.com', '2506004316', 'fJTrUdVA0RQRdy4UFvRm', 'e3b767351ff16b9f150a611afe138a94385d31e3', 2, 1, 1637806253, NULL, 'placeholder.png'),
(192, 'Jessica Watts', 'wattsjessica702@gmail.com', '2506003113', 'v3S3DK1LEQvzf0ob0gvb', '3ebe69f57e9fa15ea59330d074e1e042163fbedc', 2, 1, 1637825198, NULL, 'placeholder.png'),
(193, 'Brandon Johnson - Hill', 'brandon.hillj@hotmail.com', '2506002494', 'SRxVkVt0T93b2GNePc5I', '8932e445d0ee90a4eaaa1627db36e2ee84ecf954', 2, 1, 1638159384, NULL, 'placeholder.png'),
(194, 'Tawny Johnson', 'tawny_jay_03@hotmail.com', '2506002576', 'Q3zzc5M95ClHdOoaXcQP', 'e664543b96b385055969c607f61a21c8ccec5fe9', 2, 1, 1638253418, NULL, 'placeholder.png'),
(195, 'caylie', 'caylie.brown49@gmail.com', '7788840216', 'IhZ1mCxxSgUqUyh1qn8N', '508a06191f7910ac874c1f5788771f77f0806b68', 2, 1, 1638408756, NULL, 'placeholder.png'),
(196, 'Havana', 'havanajaelynn@icloud.com', '2364647954', 'Ms97sMnx4l7oQKqPq9rD', '5aab98f88e5d86ffea5c987fa57848db182a323c', 2, 1, 1638428304, NULL, 'placeholder.png'),
(198, 'Journey Stevens', 'jstevens_14@hotmail.com', '7788672543', 'ZalHzb9XHrv0Cco5f80U', '3e6252f6ed7f079543215cc1234f140c6eeed305', 2, 1, 1638765052, NULL, 'placeholder.png'),
(199, 'Miranda Leighton', 'leighton_m_87@hotmail.com', '2506005583', 'qsqvRhDQf77ACH1CQUZ2', '5b2a585b0b18a9917f1e01c1d2cd34677b9d429f', 2, 1, 1638994892, NULL, 'placeholder.png'),
(200, 'Danette Fillier-Aubin', 'danettefillier@hotmail.com', '5064767232', 'RcVFf2zUgHAZLMXVl5nP', '79b28ff3ad6edb1fd05b2ea370bb002c54487518', 2, 1, 1638995345, NULL, 'placeholder.png'),
(201, 'Will', 'dakota@citywest.ca', '2506000825', 'wUECaZRWtD5bFcJYL8dS', 'fe455c7f72fb0358b588a3f0c9e7cc6144c8e1a3', 3, 1, 1639017350, NULL, 'placeholder.png'),
(202, 'Raymond', 'rj1773099@gmail.com', '7788842237', 'S14xAacgBboGdlbZmA9k', 'e4fbcb91b70cce016c61e653318c79bbb1b49df0', 2, 1, 1639200381, NULL, 'placeholder.png'),
(203, 'Suresh', 'trishan@foodrive.ca', NULL, NULL, '6dde4bbbbe145fe3c282983e5a82390bf8c71615', 3, 1, NULL, NULL, 'placeholder.png'),
(204, 'Kathleen', 'katt0418@outlook.com', '2506001606', 'p9rhoOnzCvPIQeExvzaX', '7e59b4405ec6fc889a213f7fce8fb2bfcb039fac', 2, 1, 1639387388, NULL, 'placeholder.png'),
(205, 'Patience', 'patiencegood0017@gmail.com', '7783610529', 'rM3iqMNQ0vbs2360bWfP', 'cd687b7933fa6d601d71bcede6c8eb122d575192', 2, 1, 1639638664, NULL, 'placeholder.png'),
(206, 'Shubham sood', 'shubhamsood446@gmail.com', '2506158453', 'rZeJ2wTy7zA4z857Vnx6', 'cc1ef8e57d00b90f24be111b90e1e41b704d4d02', 2, 1, 1639695005, NULL, 'placeholder.png'),
(207, 'Will Shirey', 'willzacery@gmail.com', '2506002663', 'fa63MJy1dB4EToSdC0KL', 'cfc64f91333235db4aec35809177d1d4136c0a26', 2, 1, 1639779574, NULL, 'placeholder.png'),
(208, 'Sheri', 'tsimshianbrat14@hotmail.com', '7788840927', 'UgkZ00NyRIi1wEj8P9gu', '5e9df685b18b36983bde7a3deb299813f4ed86be', 2, 1, 1639887337, NULL, 'placeholder.png'),
(209, 'Corey', 'coreysampare@gmail.com', '2508573523', 'QDiL8WhLNP4VCtOU1fu8', '2c67d9f12a43fa5061458e46032a84a4913dac4e', 2, 1, 1639897686, NULL, 'placeholder.png'),
(210, 'Brigette Lewis', 'bridgette_sampson13@hotmail.com', '7788840299', 'jLjt2qtVO1AV3N9xemtI', 'e98501eb0ec26d29feb8452c82c1c1c2249a026a', 2, 1, 1639984115, NULL, 'placeholder.png'),
(211, 'Elle', '1991lle@gmail.com', '7789901236', '1J0QjVtOSjALqHzKRz6U', 'b035876a2d2e13f63846ec21de3320c7d71bd874', 2, 1, 1640055215, NULL, 'placeholder.png'),
(213, 'Connor Fortune', 'cplusfortune@gmail.com', '2506001622', 'D0L6uL038OIwWOyyhvcR', 'e9c6d1c5baa26ca3e8cdfc6c7876241b65285a5e', 2, 1, 1640159631, NULL, 'placeholder.png'),
(214, 'Jim Henry Jr', 'jim.fisheries@gmail.com', '7786450589', 'TzPdUcouaYAaJQDVw8bq', 'a4fc5e591c5df54dc33207b7af0da716499c8108', 2, 1, 1640222729, NULL, 'placeholder.png'),
(215, 'Carter', 'Cartertait1287@gmail.com', '2368336624', '2NSzqwuDfUd4CB79u7Ro', '4c0c9f64be84dcb7ff54ec2a3c3cd39a2a8b2a87', 2, 1, 1640294899, NULL, 'placeholder.png'),
(216, 'Lovepreet Kaur', 'lovedhindsa1997@gmail.com', '7789521713', 'gtWgKqkXqJ3Dm34V30JC', '9f2feb0f1ef425b292f2f94bc8482494df430413', 2, 1, 1640301049, NULL, 'placeholder.png'),
(217, 'Beatrice Bryant', 'buzzbryant@hotmail.com', '7788847114', 'euD0zshLbpD4lL9K3omW', '3a4e6260048e1e492effae8d3c8fb3ff0f102076', 2, 1, 1640486356, NULL, 'placeholder.png'),
(218, 'xavier', 'xaviermorvenguno@gmail.com', '2506097548', 'aBy1FgxXSoEv2Kem2CB7', '525f9a3c8640c049f52dc5ec167caf0ff6f4ba69', 2, 1, 1640575575, NULL, 'placeholder.png'),
(219, 'Kyle Ridsdale', 'kyle.ridsdale@gmail.com', '7788847131', 'YHXKU6GRBPlvgksBW1MU', '3e003b556cee1d2d1305508d4fc2a4492e6df0de', 2, 1, 1640582314, NULL, 'placeholder.png'),
(220, 'Natasha Evans', 'natashaevans1996@hotmail.com', '2508005412', 'RFLHfWYkmC6LLMhQY2Gt', '2f41a140a2098952a4681b8a83bd685d9f5ee1d1', 2, 1, 1640670086, NULL, 'placeholder.png'),
(223, 'Brandi Ridsdale', 'brandimay2007@icloud.com', '7788840080', 'GTaZfbYs6Ut3aFynzWXO', 'f537ff7208e24ef178ac9c400ffaa4fe2e4ba41c', 2, 1, 1640733352, NULL, 'placeholder.png'),
(225, 'Niles', 'niles.salo@gmail.com', '7786450705', 'bQF3iM7xqKsftc8VVJqJ', '0a74152c9182a65209bd83d74e2f4e3a6f560cb2', 2, 1, 1640760532, NULL, 'placeholder.png'),
(226, 'Shayna', 'shayn.stewy-15@hotmail.com', '7788845493', '2jKstfQd1wZQ50UhGlVm', 'e831d05d563cf294ad07c7ea6d7b6a1780f5e0e3', 2, 1, 1640830989, NULL, 'placeholder.png'),
(227, 'Joey Tapper', 'joeytapper@outlook.com', '2506006282', '9wtClcbijMaO26mfZTTo', '82d22b4cbf12076edcf3986d7518756887d1c453', 2, 1, 1640846219, 1295683200, 'placeholder.png'),
(228, 'Heather', 'Mrs_ryann11@hotmail.com', '2506005550', '38f5R6HT6tin2J6gcx55', '4ba591fbb34b3a8787c901892e423a35ded10681', 2, 1, 1641017862, NULL, 'placeholder.png'),
(229, 'Eli Clayton', 'elijah_cory@outlook.com', '7787177099', 'h92oJ2tt12N6raBFrx1v', 'a1659c440108db0a2098ddb739a60126526c3dc7', 2, 1, 1641089488, NULL, 'placeholder.png'),
(230, 'Taylor Jade', 'taylorjnguyengreen@gmail.com', '7783610543', 'bUjNgEB7cpo8tKPQFhYc', '3a03085e707efeec45d8b3f9569a555e35556628', 2, 1, 1641097793, NULL, 'placeholder.png'),
(231, 'Amy Lewis', 'lewisamy467@gmail.com', '2506002151', 'DKuaAYZoofE7cbzLON9d', 'fbcb44c4ae164bff0466cc03930abc8810dd5cf2', 2, 1, 1641103475, NULL, 'placeholder.png'),
(232, 'Paige', 'paigemusgrave152@gmail.com', '2369879876', 'EXrlR67Z9tBF9v5CYO9N', '150512518b3be3f69875b385976d275e322fc9a2', 2, 1, 1641187714, NULL, 'placeholder.png'),
(233, 'Eugene Robinson', 'etr.59.1@hotmail.com', '2506246738', 'dhuDUQODcRPTlHwqHXRd', 'b43d746b83fc2361784b6e6b4bb3ec7351d0459c', 2, 1, 1641348377, NULL, 'placeholder.png'),
(234, 'Vernon Musterer', 'Death_fighter66@hotmail.com', '2506003153', 'zFu71G1emr5vaVJa2UfU', 'e9198edc6726ba274b024213f9fe8415d10e34c1', 2, 1, 1641435320, NULL, 'placeholder.png'),
(235, 'Kyle wesley', 'kyle_wesley@hotmail.com', '7788840077', 'sDvNDtuxmyX1hZghUG4n', '0c5b7bb995b8d9c0ca00926f8b71f0e7a513e7a1', 2, 1, 1641436108, NULL, 'placeholder.png'),
(239, 'Atul Nain', 'aarohi125120@gmail.com', '6043767146', NULL, '56def8b4ae654bb63a1ba8ccbd6195996936209b', 4, 1, 1641626202, 1169452800, 'placeholder.png'),
(240, 'Tawni Reece', 'tawniagreece2@gmail.com', '7788846829', 'vE72YMaEoKEyvMz2TEy7', 'ae8fd756d675e0c6e0f87cfdac42f872734f8682', 2, 1, 1641709354, NULL, 'placeholder.png'),
(241, 'Carla', 'carlamckay93@yahoo.com', '7786450245', 'PH0HDWKwE0XaJUDaj0my', 'e3884118b93faccc0d47c3cc253832a85b072e28', 2, 1, 1641950614, NULL, 'placeholder.png'),
(242, 'Brittany Johnson', 'brittanyej05@gmail.com', '7788840337', '5jwRXL68DKiGMnvr5CHx', '26abd4d84b9bedb7bdfe1fec676dbb419e9e0bba', 2, 1, 1641950923, NULL, 'placeholder.png'),
(243, 'Sofia Velasquez', 'sofiamckay@yahoo.ca', '7789803621', 'efcBxZxEk9LTW5V9RaOU', '7efcf038f52aeb2ec02b4840a08f9aba7251d266', 2, 1, 1641957708, NULL, 'placeholder.png'),
(244, 'No.1 Catering', 'no1catering@foodrive.ca', '2506278436', NULL, 'e6de217a5be560b3c0a52e1e83d1f4319dd3506b', 3, 1, 1641196800, 1641196800, 'placeholder.png'),
(245, 'Gail Mckay', 'mckaygail85@gmail.com', '7786899860', 'IHWrQuTbL0H1D0rtYOWm', '2ca23839b5b0dc49698ca0cbca47fab32c5dd5c2', 2, 1, 1642640724, NULL, 'placeholder.png'),
(246, 'Gater', 'lorritaloring@gmail.com', '7788843838', 'YH4fI73EPAkKtDZn9J5t', 'd1e0ff60c6705ee3292eb659cf19d3f7636b279d', 2, 1, 1642749881, NULL, 'placeholder.png'),
(248, 'John Reece', 'jonreece88@gmail.com', '2506252458', 'kVGb4ruC2IRz57hP4Iiu', '6e1029cfd87a2b4da96f5d0dc2dbc6a0d689207a', 2, 1, 1642912983, NULL, 'placeholder.png'),
(249, 'Zack', 'zacharyaustin35@gmail.com', '2508007044', '868kM5IrHTaVg7dBu7aW', 'a7f8ff395a5e7dfdd6b3e19e8433031d6660b758', 2, 1, 1642993205, NULL, 'placeholder.png'),
(250, 'Ernest Johnny', 'Ernestfjjohnny_16@live.com', '2506007097', NULL, 'a5c50960439adf8cca79650487123d9f6fd94acb', 2, 1, 1674374400, NULL, 'placeholder.png'),
(251, 'Ryanne R', 'ryannedanes10@gmail.com', '7788840507', 'oOLCjEyReIVaXPAeDx2S', 'a51cc8cfcf12c77a3ec957c076061bc7c0d132f1', 2, 1, 1643008509, NULL, 'placeholder.png'),
(252, 'Jade Rothwell', 'jadelizabethrothwell00@gmail.com', '7788842353', 'Ii5Z4wYVGcUQDNroWkSQ', 'f34d85f5018188a068ca858668b5cbf003effbf0', 2, 1, 1643078714, NULL, 'placeholder.png'),
(253, 'Kiana Johnson', 'kianajohnson1769@gmail.com', '7786450022', '5FINagzpDi4Vb7Xjdo7B', '98213f9c6c7920078d235ea2ebbd1b66ba074772', 2, 1, 1643235660, NULL, 'placeholder.png'),
(254, 'Pam', 'tsimshianangel@gmail.com', '2506002084', 'MZGffLCZnC5S3ddsZyDI', '304ba9556b429eca3f70cd2fc9092b842f43e070', 2, 1, 1643336663, NULL, 'placeholder.png'),
(255, 'Sheri Vickers', 'sheri_vickers31@hotmail.com', '2506007125', 'q0UgQHdKyoLSBTw0QXWM', '320cd59e09976f893b9ad803a2132bc7a8bb2463', 2, 1, 1643436822, NULL, 'placeholder.png'),
(256, 'Mia', 'berryblossom156@gmail.com', '7788846799', '5RIIOqJlxl9paoQipH5O', '03ddc06654959b12ad7a28b465e2a8f4c0d4db15', 2, 1, 1643441152, NULL, 'placeholder.png'),
(257, 'Karanpreet singh', 'karanprets9@gmail.com', '6047249743', 'DhehXZh4HuOrL2rElf7J', '79978280c674874b40335a1fe094f49029ad3210', 2, 1, 1643503649, NULL, 'placeholder.png'),
(258, 'Amritbir Singh', 'Amritbir437@gmail.com', '6046145281', 'Hms4NROzNWbCefyIcUXc', 'c773d00ff773e815f9b73db51047e79354463a9f', 2, 1, 1643509446, NULL, 'placeholder.png'),
(259, 'Allen Vesoli', 'vesoli5985@nahetech.com', '2506242185', 'OlFfC6j5iLDEILEqCUik', 'e2096ba380c644e6104eab430d78ee4afb3c861b', 2, 1, 1643599748, NULL, 'placeholder.png'),
(260, 'Jim Jebediah', 'jimjebediah@gmail.com', '2502222222', 'WBYHWu92s62Jj7QcS2ca', 'b719b4f9fbf1c6048512062a8aacbe76210fdf16', 2, 0, 1643681186, NULL, 'placeholder.png'),
(261, 'Jim', 'jimmyjebediah@gmail.com', '2502221234', 'lTXEhI8rvA8WVIujuFRU', 'f77729cef8fca2bcceca5c831824074942a43b6b', 2, 2, 1643682504, NULL, 'placeholder.png'),
(262, 'Derek Dudoward Sankey', 'DerekDS6891@Gmail.com', '2506004888', 'EVAl1vxgZjLo4esstNBM', 'e5280b4d838d4d9bd1afc38c77900303d83ba67a', 2, 1, 1643749866, NULL, 'placeholder.png'),
(263, 'SARBJEET KAUR', 'sarbjeettwb99@gmail.com', '6046033990', 'C79tr4Kv0EZQv60zWMFL', 'f9aadd471a22ebd40883cc1b5925038ebcf25f3a', 2, 1, 1643754522, NULL, 'placeholder.png'),
(264, 'Janessa Stevens', 'janessagabe@gmail.com', '2506002273', 'EG1qMh6c7kUPH4GjDFEn', '06858e39e6a1394199201e8531cadcad8e78db10', 2, 1, 1643764552, NULL, 'placeholder.png'),
(265, 'Jasmine Lewis', 'jem.lewis1993@gmail.com', '7788844979', 'yowMw9iQa3e4HFrAO463', '8b27cc53ec53a9787b1334db28cc773e21407ea2', 2, 1, 1643767536, NULL, 'placeholder.png'),
(266, 'Paula smith', 'paulasmith08@hotmail.ca', '6045516166', 'AKRwYkT6VqGKZO6FIbBi', '928e5355359cd47d2aa6e8ef805375ec18117165', 2, 1, 1643864186, NULL, 'placeholder.png'),
(267, 'Yashvi thekdi', 'yashvithekdi2903@gmail.com', '2506002748', 'Xl4cyNUMF0H0sQuZD9ry', 'e494b39031b45e66239894b9a2061ed921a40e29', 2, 1, 1643932548, NULL, 'placeholder.png'),
(268, 'Jake Yeomans', 'jakeyeomans@hotmail.com', '7788840524', 'JAu0jfSSClk4x5BJbU3k', '8d179060ae903896e688c862f2da098e2a952c66', 2, 1, 1643957733, NULL, 'placeholder.png'),
(271, 'Melissa Helin', 'melissatait15@gmail.com', '7786450724', 'e8qvv2pVVc7w8z1XW3ri', '8d5929ce46bf02c02f12ab0657a60b1a4b560869', 2, 1, 1644128833, NULL, 'placeholder.png'),
(272, 'Cali', 'cali.dendys@gmail.ca', '7783610840', 'WAh2dTLeQxETbjLecLQs', '794f75e854afd0ef95fdfb17c80361755e1ab756', 2, 0, 1644276510, NULL, 'placeholder.png'),
(273, 'Ashley Bryant', 'summer_bree@hotmail.com', '2506001107', 'wcCZh7YMtxPWzhwdoy62', '742a2eacdf7eb35a00e78227f4566efa565ac6a7', 2, 1, 1644292609, NULL, 'placeholder.png'),
(274, 'Cali', 'ericasixp@gmail.com', '7783610080', 'tdYHgA1L3BYO8h4BtCJt', 'b82b2fd7fd6eb68b64009357e6f886800a7a9334', 2, 0, 1644535501, NULL, 'placeholder.png'),
(275, 'Sheryl Russ', 'sheryl.boo17@gmail.com', '2506000587', 'of9lsaai2RnaIgo3ABlc', 'e18579a3827c9fe3eb2a9bfd0d327d43396e2cb7', 2, 1, 1645042957, NULL, 'placeholder.png'),
(276, 'Mikayla', 'kayla_dudoward_13@hotmail.com', '2506003958', '46siLyLP4foxxaUZ8Bw0', '84d57765f718f67aeaed99a1a90708bd30ff67e3', 2, 1, 1645083590, NULL, 'placeholder.png'),
(277, 'Phillip', 'phillipgnyakas1@outlook.com', '2506002421', 'mcIQAN11UQBc7gEaFkvs', 'c0b1401303c34c4b7bf6bac953dc1a758dbec08c', 2, 1, 1645083624, NULL, 'placeholder.png'),
(278, 'Chantel', 'chanteltemple420@hotmail.com', '7788841153', 'hjOnJ09K8p31FN6sD9R8', '0aad814cd1352cdf8ac0d9fe0fec5789034f6851', 2, 1, 1645165438, NULL, 'placeholder.png'),
(279, 'yun', 'yg.andrew@gmail.com', '2894000036', '9l0Yjb8wqmPaP1H4RLdG', 'ecde0eea6d580ef518322642a5bc753a2bcfd09e', 2, 1, 1645327631, NULL, 'placeholder.png'),
(280, 'Stanley bolton', 'Stanley-23-aaron@hotmail.com', '7788846960', 'N9m8ycmaXGhSbqju4xKU', '09e34100a056aaabff5cbc9f57dded078b0e9a78', 2, 1, 1645334045, NULL, 'placeholder.png'),
(281, 'Owen Jenkins', 'owenjenkins01@outlook.com', '2506416196', 'uLPVdG7cYGfTlJZkW0MK', 'e2dce06816c17ceddfdc061dd0a135bee4e40133', 2, 1, 1645487054, NULL, 'placeholder.png'),
(282, 'James', 'jamesleblanc969@gmail.com', '7788844567', 'u9zozfl5Q9OP7JNM7khJ', '22960410e6fd4128576c15c879638678b96df6a5', 2, 1, 1646013955, NULL, 'placeholder.png'),
(283, 'Courtney', 'courtney.rebecca19@hotmail.com', '2506001824', 'QmsOqg6u0msw4MzzbfAP', 'e7659a3649ef24d717b7851d136458e36c827e34', 2, 0, 1646287893, NULL, 'placeholder.png'),
(284, 'Courtney', 'jessical.10@hotmail.com', '2506003877', '4Pb6M1iIfzSOxpe9pWDt', 'e7659a3649ef24d717b7851d136458e36c827e34', 2, 0, 1646288182, NULL, 'placeholder.png'),
(285, 'Chelsey', 'chelseysimpson2189@gmail.com', '7788842066', 'sG35CNWGwqWwEIR1AGr9', 'bdbe69257af2cc8ddbc3c0603e93335b9547f950', 2, 1, 1646369536, NULL, 'placeholder.png'),
(286, 'Shirley', 'paige.wright117@gmail.com', '7783612597', 'MRFOkNlgKqKuvkYXK4rv', 'da207a864acd9af49ecf6fb4d748fd6e954aec6c', 2, 1, 1646517755, NULL, 'placeholder.png'),
(287, 'Manpreet Singh', 'singh65045@gmail.com', '2506002613', NULL, '3162fff1d56d31fe7ef0952261cda09893dd468a', 4, 1, 1427007600, NULL, 'placeholder.png');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `create_address_coodinates` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO customers(user_id) VALUES
(NEW.id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `option_id` int(11) NOT NULL,
  `variant` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `avail` int(11) NOT NULL DEFAULT 0 COMMENT '1: outofstock',
  `soft_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1: deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `menu_id`, `option_id`, `variant`, `price`, `avail`, `soft_delete`) VALUES
(1, 6, 17, 'small', 0, 0, 0),
(2, 6, 17, 'large[+$2.00]', 2, 0, 0),
(38, 647, 121, 'white', 0, 0, 0),
(39, 647, 121, 'whole wheat', 2, 0, 0),
(40, 647, 122, 'strawberry', 1.55, 0, 0),
(41, 647, 122, 'mango', 1.66, 0, 0),
(42, 647, 122, 'orange', 1.77, 0, 0),
(43, 33, 103, 'honey mustard', 0, 0, 0),
(44, 33, 103, 'barbeque', 0, 1, 0),
(45, 33, 103, 'sweet and sour', 0, 1, 0),
(46, 33, 103, 'plum', 0, 0, 0),
(47, 33, 103, 'ranch', 0, 0, 0),
(48, 35, 104, 'honey mustard', 0, 0, 0),
(49, 35, 104, 'barbeque', 0, 1, 0),
(50, 35, 104, 'sweet and sour', 0, 1, 0),
(51, 35, 104, 'plum', 0, 0, 0),
(52, 35, 104, 'ranch', 0, 0, 0),
(53, 35, 105, 'honey mustard', 0, 0, 0),
(54, 35, 105, 'barbeque', 0, 1, 0),
(55, 35, 105, 'sweet and sour', 0, 1, 0),
(56, 35, 105, 'plum', 0, 0, 0),
(57, 35, 105, 'ranch', 0, 0, 0),
(58, 164, 58, '500ml', 0, 0, 0),
(59, 164, 58, '1l [+$0.50]', 0.5, 0, 0),
(60, 165, 59, '500ml', 0, 0, 0),
(61, 165, 59, '1l [+$0.50]', 0.5, 0, 0),
(62, 166, 60, '500ml', 0, 0, 0),
(63, 166, 60, '1l [+$0.50]', 0.5, 0, 0),
(64, 168, 62, '500ml', 0, 0, 0),
(65, 168, 62, '1l [+$0.50]', 0.5, 0, 0),
(66, 177, 63, '473ml', 0, 0, 0),
(67, 177, 63, '710ml[+$0.60]', 0.6, 1, 0),
(68, 238, 65, '591ml', 0, 0, 0),
(69, 238, 65, '1l [+$0.20]', 0.2, 0, 0),
(70, 319, 71, '250ml', 0, 0, 0),
(71, 319, 71, '335ml[+$1.00]', 1, 0, 0),
(72, 319, 71, '473ml[+$2.00]', 2, 0, 0),
(73, 320, 70, '250ml', 0, 0, 0),
(74, 320, 70, '335ml[+$1.00]', 1, 0, 0),
(75, 320, 70, '473ml[+$2.00]', 2, 0, 0),
(76, 302, 69, '500ml', 0, 0, 0),
(77, 302, 69, '1.18l [+$2.20]', 2.2, 0, 0),
(78, 8, 19, 'small', 0, 0, 0),
(79, 8, 19, 'large[+$1.60]', 1.6, 0, 0),
(80, 43, 20, 'small', 0, 0, 0),
(81, 43, 20, 'large[+$1.60]', 1.6, 0, 0),
(82, 44, 21, 'small', 0, 0, 0),
(83, 44, 21, 'large[+$1.60]', 1.6, 0, 0),
(84, 45, 22, 'small', 0, 0, 0),
(85, 45, 22, 'large[+$1.60]', 1.6, 0, 0),
(86, 49, 23, 'small', 0, 0, 0),
(88, 51, 25, 'small', 0, 0, 0),
(90, 52, 26, 'small', 0, 0, 0),
(92, 53, 27, 'small', 0, 0, 0),
(94, 54, 28, 'small', 0, 0, 0),
(96, 57, 29, 'small', 0, 0, 0),
(98, 58, 30, 'small', 0, 1, 0),
(100, 61, 31, 'small', 0, 0, 0),
(102, 76, 34, 'small', 0, 0, 0),
(104, 77, 35, 'small', 0, 0, 0),
(106, 78, 36, 'small', 0, 0, 0),
(108, 79, 37, 'small', 0, 0, 0),
(110, 80, 38, 'small', 0, 0, 0),
(112, 81, 39, 'small', 0, 0, 0),
(114, 82, 40, 'small', 0, 0, 0),
(116, 83, 41, 'small', 0, 0, 0),
(118, 84, 42, 'small', 0, 0, 0),
(120, 87, 43, 'small', 0, 0, 0),
(122, 90, 44, 'small', 0, 0, 0),
(124, 93, 45, 'small', 0, 0, 0),
(126, 94, 46, 'small', 0, 0, 0),
(128, 95, 47, 'small', 0, 0, 0),
(139, 96, 48, 'small', 0, 0, 0),
(141, 99, 49, 'small', 0, 0, 0),
(143, 100, 50, 'small', 0, 0, 0),
(145, 101, 51, 'small', 0, 0, 0),
(147, 106, 52, 'small', 0, 0, 0),
(149, 109, 53, 'small', 0, 0, 0),
(151, 110, 54, 'small', 0, 0, 0),
(153, 128, 55, 'small', 0, 0, 0),
(154, 128, 55, 'large[+$1.00]', 1, 0, 0),
(155, 129, 56, 'small', 0, 0, 0),
(156, 129, 56, 'large[+$1.00]', 1, 0, 0),
(157, 137, 57, 'small', 0, 0, 0),
(158, 137, 57, 'large[+$5.00]', 5, 0, 0),
(159, 322, 72, 'small', 0, 0, 0),
(160, 322, 72, 'large[+$0.69]', 0.69, 0, 0),
(161, 402, 85, '1l', 0, 0, 0),
(162, 402, 85, '2l [+$2.00]', 2, 0, 0),
(163, 402, 85, '4l [+$3.00]', 3, 0, 0),
(164, 403, 86, '1l', 0, 0, 0),
(165, 403, 86, '2l [+$2.00]', 2, 0, 0),
(166, 403, 86, '4l [+$3.00]', 3, 0, 0),
(167, 428, 87, '1l', 0, 0, 0),
(168, 428, 87, '2l [+$2.00]', 2, 0, 0),
(169, 487, 88, '473ml', 0, 0, 0),
(170, 487, 88, '946ml [+$1.50]', 1.5, 0, 0),
(171, 488, 89, '473ml', 0, 0, 0),
(172, 488, 89, '946ml [+$1.50]', 1.5, 0, 0),
(173, 440, 91, 'small', 0, 0, 0),
(174, 440, 91, 'large [+$4.00]', 4, 0, 0),
(175, 530, 94, 'small', 0, 0, 0),
(176, 530, 94, 'medium[+$0.47]', 0.47, 0, 0),
(177, 530, 94, 'large[+$0.97]', 0.97, 0, 0),
(178, 530, 100, 'tropical', 0, 0, 0),
(179, 530, 100, 'fruit punch', 0, 0, 0),
(180, 531, 95, 'small', 0, 0, 0),
(181, 531, 95, 'medium[+$0.47]', 0.47, 0, 0),
(182, 531, 95, 'large[+$0.97]', 0.97, 0, 0),
(183, 531, 101, 'tropical', 0, 0, 0),
(184, 531, 101, 'fruit punch', 0, 0, 0),
(185, 531, 102, 'vanilla', 0, 0, 0),
(186, 531, 102, 'chocolate', 0, 0, 0),
(187, 531, 102, 'strawberry', 0, 0, 0),
(188, 532, 97, 'small', 0, 0, 0),
(189, 532, 97, 'medium[+$0.24]', 0.24, 0, 0),
(190, 532, 97, 'large[+$0.50]', 0.5, 0, 0),
(191, 533, 98, 'small', 0, 0, 0),
(192, 533, 98, 'medium[+$0.47]', 0.47, 0, 0),
(193, 533, 98, 'large[+$0.73]', 0.73, 0, 0),
(194, 534, 99, 'small', 0, 0, 0),
(195, 534, 99, 'medium[+$0.47]', 0.47, 0, 0),
(196, 534, 99, 'large[+$0.73]', 0.73, 0, 0),
(197, 235, 66, '500ml', 0, 0, 0),
(198, 235, 66, '1.5l [+$1.00]', 1, 1, 0),
(199, 274, 68, '591ml', 0, 0, 0),
(200, 274, 68, '1l [+$1.00]', 1, 0, 0),
(201, 380, 78, '1 scoop', 0, 0, 0),
(202, 380, 78, '2 scoops [+$0.48]', 0.48, 0, 0),
(203, 380, 78, '3 scoops [+$0.92]', 0.92, 0, 0),
(204, 381, 79, '1 scoop', 0, 0, 0),
(205, 381, 79, '2 scoops [+$0.48]', 0.48, 0, 0),
(206, 381, 79, '3 scoops [+$0.92]', 0.92, 0, 0),
(207, 382, 80, '1 scoop', 0, 0, 0),
(208, 382, 80, '2 scoops [+$0.48]', 0.48, 0, 0),
(209, 382, 80, '3 scoops [+$0.92]', 0.92, 0, 0),
(210, 383, 81, '1 scoop', 0, 0, 0),
(211, 383, 81, '2 scoops [+$0.48]', 0.48, 0, 0),
(212, 383, 81, '3 scoops [+$0.92]', 0.92, 0, 0),
(213, 384, 82, '1 scoop', 0, 0, 0),
(214, 384, 82, '2 scoops [+$0.48]', 0.48, 0, 0),
(215, 384, 82, '3 scoops [+$0.92]', 0.92, 0, 0),
(216, 385, 83, '1 scoop', 0, 0, 0),
(217, 385, 83, '2 scoops [+$0.48]', 0.48, 0, 0),
(218, 385, 83, '3 scoops [+$0.92]', 0.92, 0, 0),
(219, 386, 84, '1 scoop', 0, 0, 0),
(220, 386, 84, '2 scoops [+$0.48]', 0.48, 0, 0),
(221, 386, 84, '3 scoops [+$0.92]', 0.92, 0, 0),
(222, 540, 106, 'cabbage and carrots', 0, 0, 0),
(223, 540, 106, 'chickpea', 0, 0, 0),
(224, 540, 106, 'beets', 0, 0, 0),
(225, 540, 107, 'cabbage and carrots', 0, 0, 0),
(226, 540, 107, 'chickpea', 0, 0, 0),
(227, 540, 107, 'beets', 0, 0, 0),
(228, 540, 107, 'squash', 0, 0, 0),
(229, 541, 108, 'cabbage and carrots', 0, 0, 0),
(230, 541, 108, 'chickpea', 0, 0, 0),
(231, 541, 108, 'beets', 0, 0, 0),
(232, 541, 108, 'red lentils', 0, 0, 0),
(233, 541, 108, 'spinach lentils', 0, 0, 0),
(234, 541, 109, 'cabbage and carrots', 0, 0, 0),
(235, 541, 109, 'chickpea', 0, 0, 0),
(236, 541, 109, 'beets', 0, 0, 0),
(237, 541, 109, 'squash', 0, 0, 0),
(238, 544, 115, 'small', 0, 0, 0),
(239, 544, 115, 'large', 6.5, 0, 0),
(240, 545, 114, 'small', 0, 0, 0),
(241, 545, 114, 'large', 5.5, 0, 0),
(242, 546, 123, 'small', 0, 0, 0),
(243, 546, 123, 'large', 7, 0, 0),
(244, 547, 113, 'small', 0, 0, 0),
(245, 547, 113, 'large', 4.5, 0, 0),
(246, 548, 112, 'small', 0, 0, 0),
(247, 548, 112, 'large', 4.5, 0, 0),
(248, 549, 111, 'small', 0, 0, 0),
(249, 549, 111, 'large', 4.5, 0, 0),
(250, 585, 124, 'small', 0, 0, 0),
(251, 585, 124, 'big', 2, 0, 0),
(252, 746, 125, 'small', 0, 1, 0),
(253, 746, 125, 'large', 2, 0, 0),
(254, 593, 126, 'bacon', 0, 0, 0),
(255, 593, 126, 'ham', 0, 0, 0),
(256, 593, 126, 'sausage', 0, 0, 0),
(257, 593, 127, 'white', 0, 0, 0),
(258, 593, 127, 'whole wheat', 0, 0, 0),
(259, 593, 127, 'rye', 0, 0, 0),
(260, 593, 128, 'sunny side up', 0, 0, 0),
(261, 593, 128, 'basted medium', 0, 0, 0),
(262, 593, 128, 'basted soft', 0, 0, 0),
(263, 593, 128, 'scrambled', 0, 0, 0),
(264, 593, 128, 'poached hard', 0, 0, 0),
(265, 593, 128, 'poached medium', 0, 0, 0),
(266, 593, 128, 'poached soft', 0, 0, 0),
(267, 593, 128, 'over hard', 0, 0, 0),
(268, 593, 128, 'over medium', 0, 0, 0),
(269, 593, 128, 'over easy', 0, 0, 0),
(270, 593, 128, 'basted hard', 0, 0, 0),
(271, 594, 129, 'white', 0, 0, 0),
(272, 594, 129, 'whole wheat', 0, 0, 0),
(273, 594, 129, 'rye', 0, 0, 0),
(274, 595, 130, 'white', 0, 0, 0),
(275, 595, 130, 'whole wheat', 0, 0, 0),
(276, 595, 130, 'rye', 0, 0, 0),
(277, 596, 131, 'white', 0, 0, 0),
(278, 596, 131, 'whole wheat', 0, 0, 0),
(279, 596, 131, 'rye', 0, 0, 0),
(280, 597, 132, 'white', 0, 0, 0),
(281, 597, 132, 'whole wheat', 0, 0, 0),
(282, 597, 132, 'rye', 0, 0, 0),
(283, 598, 133, 'white', 0, 0, 0),
(284, 598, 133, 'whole wheat', 0, 0, 0),
(285, 598, 133, 'rye', 0, 0, 0),
(286, 603, 134, 'blue', 0, 0, 0),
(287, 603, 134, 'rare', 0, 0, 0),
(288, 603, 134, 'medium to rare', 0, 0, 0),
(289, 603, 134, 'medium', 0, 0, 0),
(290, 603, 134, 'medium to well done', 0, 0, 0),
(291, 603, 134, 'well done', 0, 0, 0),
(292, 603, 135, 'white', 0, 0, 0),
(293, 603, 135, 'whole wheat', 0, 0, 0),
(294, 603, 135, 'rye', 0, 0, 0),
(295, 604, 136, 'none', 0, 0, 0),
(296, 604, 136, 'onion rings[+$2.00]', 2, 0, 0),
(297, 604, 136, 'caesar salad[+$3.50]', 3.5, 0, 0),
(298, 604, 136, 'green salad[+$1.00]', 1, 0, 0),
(299, 604, 136, 'poutine[+$2.00]', 2, 0, 0),
(300, 604, 136, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(301, 604, 136, 'potato wedges[+$2.00]', 2, 0, 0),
(302, 605, 137, 'none', 0, 0, 0),
(303, 605, 137, 'onion rings[+$2.00]', 2, 0, 0),
(304, 605, 137, 'caesar salad[+$3.50]', 3.5, 0, 0),
(305, 605, 137, 'green salad[+$1.00]', 1, 0, 0),
(306, 605, 137, 'poutine[+$2.00]', 2, 0, 0),
(307, 605, 137, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(308, 605, 137, 'potato wedges[+$2.00]', 2, 0, 0),
(309, 606, 138, 'none', 0, 0, 0),
(310, 606, 138, 'onion rings[+$2.00]', 2, 0, 0),
(311, 606, 138, 'caesar salad[+$3.50]', 3.5, 0, 0),
(312, 606, 138, 'green salad[+$1.00]', 1, 0, 0),
(313, 606, 138, 'poutine[+$2.00]', 2, 0, 0),
(314, 606, 138, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(315, 606, 138, 'potato wedges[+$2.00]', 2, 0, 0),
(316, 607, 139, 'none', 0, 0, 0),
(317, 607, 139, 'onion rings[+$2.00]', 2, 0, 0),
(318, 607, 139, 'caesar salad[+$3.50]', 3.5, 0, 0),
(319, 607, 139, 'green salad[+$1.00]', 1, 0, 0),
(320, 607, 139, 'poutine[+$2.00]', 2, 0, 0),
(321, 607, 139, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(322, 607, 139, 'potato wedges[+$2.00]', 2, 0, 0),
(323, 608, 140, 'none', 0, 0, 0),
(324, 608, 140, 'onion rings[+$2.00]', 2, 0, 0),
(325, 608, 140, 'caesar salad[+$3.50]', 3.5, 0, 0),
(326, 608, 140, 'green salad[+$1.00]', 1, 0, 0),
(327, 608, 140, 'poutine[+$2.00]', 2, 0, 0),
(328, 608, 140, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(329, 608, 140, 'potato wedges[+$2.00]', 2, 0, 0),
(330, 609, 141, 'none', 0, 0, 0),
(331, 609, 141, 'onion rings[+$2.00]', 2, 0, 0),
(332, 609, 141, 'caesar salad[+$3.50]', 3.5, 0, 0),
(333, 609, 141, 'green salad[+$1.00]', 1, 0, 0),
(334, 609, 141, 'poutine[+$2.00]', 2, 0, 0),
(335, 609, 141, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(336, 609, 141, 'potato wedges[+$2.00]', 2, 0, 0),
(337, 610, 142, 'none', 0, 0, 0),
(338, 610, 142, 'onion rings[+$2.00]', 2, 0, 0),
(339, 610, 142, 'caesar salad[+$3.50]', 3.5, 0, 0),
(340, 610, 142, 'green salad[+$1.00]', 1, 0, 0),
(341, 610, 142, 'poutine[+$2.00]', 2, 0, 0),
(342, 610, 142, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(343, 610, 142, 'potato wedges[+$2.00]', 2, 0, 0),
(344, 611, 143, 'none', 0, 0, 0),
(345, 611, 143, 'onion rings[+$2.00]', 2, 0, 0),
(346, 611, 143, 'caesar salad[+$3.50]', 3.5, 0, 0),
(347, 611, 143, 'green salad[+$1.00]', 1, 0, 0),
(348, 611, 143, 'poutine[+$2.00]', 2, 0, 0),
(349, 611, 143, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(350, 611, 143, 'potato wedges[+$2.00]', 2, 0, 0),
(351, 612, 144, 'none', 0, 0, 0),
(352, 612, 144, 'onion rings[+$2.00]', 2, 0, 0),
(353, 612, 144, 'caesar salad[+$3.50]', 3.5, 0, 0),
(354, 612, 144, 'green salad[+$1.00]', 1, 0, 0),
(355, 612, 144, 'poutine[+$2.00]', 2, 0, 0),
(356, 612, 144, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(357, 612, 144, 'potato wedges[+$2.00]', 2, 0, 0),
(358, 613, 145, 'none', 0, 0, 0),
(359, 613, 145, 'onion rings[+$2.00]', 2, 0, 0),
(360, 613, 145, 'caesar salad[+$3.50]', 3.5, 0, 0),
(361, 613, 145, 'green salad[+$1.00]', 1, 0, 0),
(362, 613, 145, 'poutine[+$2.00]', 2, 0, 0),
(363, 613, 145, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(364, 613, 145, 'potato wedges[+$2.00]', 2, 0, 0),
(365, 614, 146, 'none', 0, 0, 0),
(366, 614, 146, 'onion rings[+$2.00]', 2, 0, 0),
(367, 614, 146, 'caesar salad[+$3.50]', 3.5, 0, 0),
(368, 614, 146, 'green salad[+$1.00]', 1, 0, 0),
(369, 614, 146, 'poutine[+$2.00]', 2, 0, 0),
(370, 614, 146, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(371, 614, 146, 'potato wedges[+$2.00]', 2, 0, 0),
(372, 615, 147, 'none', 0, 0, 0),
(373, 615, 147, 'onion rings[+$2.00]', 2, 0, 0),
(374, 615, 147, 'caesar salad[+$3.50]', 3.5, 0, 0),
(375, 615, 147, 'green salad[+$1.00]', 1, 0, 0),
(376, 615, 147, 'poutine[+$2.00]', 2, 0, 0),
(377, 615, 147, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(378, 615, 147, 'potato wedges[+$2.00]', 2, 0, 0),
(379, 616, 148, 'spicy', 0, 0, 0),
(380, 616, 148, 'honey garlic', 0, 0, 0),
(381, 616, 148, 'deep fried', 0, 0, 0),
(382, 616, 148, 'sweet and sour dip', 0, 0, 0),
(383, 616, 149, 'none', 0, 0, 0),
(384, 616, 149, 'onion rings[+$2.00]', 2, 0, 0),
(385, 616, 149, 'caesar salad[+$3.50]', 3.5, 0, 0),
(386, 616, 149, 'green salad[+$1.00]', 1, 0, 0),
(387, 616, 149, 'poutine[+$2.00]', 2, 0, 0),
(388, 616, 149, 'yam fries w/ chipotle dip[+$3.50]', 3.5, 0, 0),
(389, 616, 149, 'potato wedges[+$2.00]', 2, 0, 0),
(390, 616, 149, 'steamed rice [$1.00]', 1, 0, 0),
(391, 615, 147, 'steamed rice[$1.00]', 1, 0, 0),
(392, 747, 150, 'white', 0, 0, 0),
(393, 747, 150, 'whole wheat', 2, 0, 0),
(394, 747, 150, 'rye', 4, 0, 0),
(395, 617, 151, '2 piece', 0, 0, 0),
(396, 617, 151, '3 piece[+$3.00]', 3, 0, 0),
(397, 618, 152, 'steamed rice', 0, 0, 0),
(398, 618, 152, 'basmati rice', 0, 0, 0),
(399, 620, 153, 'fries', 0, 0, 0),
(400, 620, 153, 'onion rings[+$2.00]', 2, 0, 0),
(401, 620, 153, 'caesar salad[+$3.50]', 3.5, 0, 0),
(402, 620, 153, 'poutine[+$2.00]', 2, 0, 0),
(403, 620, 153, 'yam fries with chipotle dip[+$3.50]', 3.5, 0, 0),
(404, 620, 153, 'potato wedges[+$2.00]', 2, 0, 0),
(405, 621, 154, 'deep fried', 0, 0, 0),
(406, 621, 154, 'honey garlic', 0, 0, 0),
(407, 621, 154, 'spicy', 0, 0, 0),
(408, 625, 155, '1 piece', 0, 0, 0),
(409, 625, 155, '2 piece[$4.00]', 4, 0, 0),
(410, 625, 155, '3 piece[+$9.00]', 9, 0, 0),
(412, 651, 156, 'fries', 0, 0, 0),
(413, 651, 156, 'mashed potatoes', 0, 0, 0),
(414, 652, 158, 'fries', 0, 0, 0),
(415, 652, 158, 'mashed potatoes', 0, 0, 0),
(416, 653, 159, 'small', 0, 0, 0),
(417, 653, 159, 'large[+$2.00]', 2, 0, 0),
(418, 656, 160, 'small', 0, 0, 0),
(419, 656, 160, 'large[+$2.00]', 2, 0, 0),
(420, 656, 161, 'chicken', 0, 0, 0),
(421, 656, 161, 'beef[+$1.00]', 1, 0, 0),
(422, 656, 161, 'mushroom[+$1.00]', 1, 0, 0),
(423, 657, 162, 'small', 0, 0, 0),
(424, 657, 162, 'large[+$3.00]', 3, 0, 0),
(425, 659, 163, 'small', 0, 0, 0),
(426, 659, 163, 'large[+$3.00]', 3, 0, 0),
(427, 661, 164, 'small', 0, 0, 0),
(428, 661, 164, 'large[+$3.00]', 3, 0, 0),
(429, 664, 165, 'prawn', 0, 0, 0),
(430, 664, 165, 'pork[+$1.00]', 1, 0, 0),
(431, 667, 166, 'vegetarian tofu', 0, 0, 0),
(432, 667, 166, 'chicken[+$2.00]', 2, 0, 0),
(433, 667, 166, 'shrimp[+$3.00]', 3, 0, 0),
(434, 681, 167, 'small', 0, 0, 0),
(435, 681, 167, 'large[+$1.50]', 1.5, 0, 0),
(436, 682, 168, 'small', 0, 0, 0),
(437, 682, 168, 'large[+$1.50]', 1.5, 0, 0),
(438, 683, 169, 'small', 0, 0, 0),
(439, 683, 169, 'large[+$2.00]', 2, 0, 0),
(440, 683, 170, 'regular', 0, 0, 0),
(441, 683, 170, 'shredded mozzarella cheese', 0, 0, 0),
(442, 683, 170, 'cheese curds[+$1.00]', 1, 0, 0),
(443, 684, 171, 'small', 0, 0, 0),
(444, 684, 171, 'large[+$3.00]', 3, 0, 0),
(445, 685, 172, 'small', 0, 0, 0),
(446, 685, 172, 'large[+$3.00]', 3, 0, 0),
(447, 697, 173, 'white', 0, 0, 0),
(448, 697, 173, 'whole wheat', 0, 0, 0),
(449, 697, 173, 'rye', 0, 0, 0),
(450, 746, 174, 'mango', 1, 0, 0),
(451, 746, 174, 'orange', 1.99, 1, 0),
(452, 746, 174, 'grape', 2.69, 1, 0),
(453, 49, 23, 'large[+$3.00]', 3, 0, 0),
(454, 51, 25, 'large[+$3.00]', 3, 0, 0),
(455, 52, 26, 'large[+$3.00]', 3, 0, 0),
(456, 53, 27, 'large[+$3.00]', 3, 0, 0),
(457, 54, 28, 'large[+$3.00]', 3, 0, 0),
(458, 57, 29, 'large[+$2.00]', 2, 0, 0),
(459, 58, 30, 'large[+$3.00]', 3, 0, 0),
(460, 61, 31, 'large[+$3.00]', 3, 0, 0),
(461, 76, 34, 'large[+$3.00]', 3, 0, 0),
(462, 77, 35, 'large[+$3.00]', 3, 0, 0),
(463, 78, 36, 'large[+$3.00]', 3, 0, 0),
(464, 79, 37, 'large[+$3.00]', 3, 0, 0),
(465, 80, 38, 'large[+$3.00]', 3, 0, 0),
(466, 81, 39, 'large[+$3.00]', 3, 0, 0),
(467, 82, 40, 'large[+$3.00]', 3, 0, 0),
(468, 83, 41, 'large[+$3.00]', 3, 0, 0),
(469, 84, 42, 'large[+$3.00]', 3, 0, 0),
(470, 87, 43, 'large[+$3.00]', 3, 0, 0),
(471, 90, 44, 'large[+$3.00]', 3, 0, 0),
(472, 93, 45, 'large[+$3.00]', 3, 0, 0),
(473, 94, 46, 'large[+$3.00]', 3, 0, 0),
(474, 95, 47, 'large[+$3.00]', 3, 0, 0),
(475, 96, 48, 'large[+$3.00]', 3, 0, 0),
(476, 99, 49, 'large[+$3.00]', 3, 0, 0),
(477, 100, 50, 'large[+$3.00]', 3, 0, 0),
(478, 101, 51, 'large[+$3.00]', 3, 0, 0),
(479, 106, 52, 'large[+$3.00]', 3, 0, 0),
(480, 109, 53, 'large[+$3.00]', 3, 0, 0),
(481, 110, 54, 'large[+$2.00]', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant_options`
--

CREATE TABLE `variant_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1:deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variant_options`
--

INSERT INTO `variant_options` (`id`, `menu_id`, `name`, `options`, `soft_delete`) VALUES
(10, 515, 'size', 'small, large', 0),
(11, 515, 'crust', 'roasted, not roasted', 0),
(12, 517, 'Size', 'small, large', 0),
(13, 517, 'Bread', 'italian, brown', 0),
(14, 520, 'size', 'small,large', 0),
(16, 520, 'cheese', 'white,yellow', 0),
(17, 6, 'Size', 'small,large[+$2.00]', 0),
(18, 521, 'Meal Size', '2 pc,3 pc, 4 pc, 6 pc, 9 pc, 15 pc, 20 pc', 0),
(19, 8, 'Size', 'small,large[+$1.60]', 0),
(20, 43, 'Size', 'small, large[+$1.60]', 0),
(21, 44, 'Size', 'small,large[+$1.60]', 0),
(22, 45, 'Size', 'small,large[+$1.60]', 0),
(23, 49, 'Size', 'small,large[+$3.00]', 0),
(24, 50, 'Size', 'small,large[+$2.60]', 0),
(25, 51, 'Size', 'small,large[+$3.00]', 0),
(26, 52, 'Size', 'small,large[+$3.00]', 0),
(27, 53, 'Size', 'small,large[+$3.00]', 0),
(28, 54, 'Size', 'small,large[+$3.00]', 0),
(29, 57, 'Size', 'small,large[+$2.00]', 0),
(30, 58, 'Size', 'small,large[+$3.00]', 0),
(31, 61, 'Size', 'small,large[+$3.00]', 0),
(32, 62, 'Size', 'small,large[+$2.60]', 0),
(33, 73, 'Size', 'small,large[+$2.60]', 0),
(34, 76, 'Size', 'small,large[+$3.00]', 0),
(35, 77, 'Size', 'small,large[+$3.00]', 0),
(36, 78, 'Size', 'small,large[+$3.00]', 0),
(37, 79, 'Size', 'small,large[+$3.00]', 0),
(38, 80, 'Size', 'small,large[+$3.00]', 0),
(39, 81, 'Size', 'small,large[+$3.00]', 0),
(40, 82, 'Size', 'small,large[+$3.00]', 0),
(41, 83, 'Size', 'small,large[+$3.00]', 0),
(42, 84, 'Size', 'small,large[+$3.00]', 0),
(43, 87, 'Size', 'small,large[+$3.00]', 0),
(44, 90, 'Size', 'small,large[+$3.00]', 0),
(45, 93, 'Size', 'small,large[+$3.00]', 0),
(46, 94, 'Size', 'small,large[+$3.00]', 0),
(47, 95, 'Size', 'small,large[+$3.00]', 0),
(48, 96, 'Size', 'small,large[+$3.00]', 0),
(49, 99, 'Size', 'small,large[+$3.00]', 0),
(50, 100, 'Size', 'small,large[+$3.00]', 0),
(51, 101, 'Size', 'small,large[+$3.00]', 0),
(52, 106, 'Size', 'small,large[+$3.00]', 0),
(53, 109, 'Size', 'small,large[+$3.00]', 0),
(54, 110, 'Size', 'small,large[+$2.00]', 0),
(55, 128, 'Size', 'small,large[+$1.00]', 0),
(56, 129, 'Size', 'small,large[+$1.00]', 0),
(57, 137, 'Size', 'small,large[+$5.00]', 0),
(58, 164, 'Size', '500ml, 1l [+$0.50]', 0),
(59, 165, 'Size', '500ml, 1l [+$0.50]', 0),
(60, 166, 'Size', '500ml, 1l [+$0.50]', 0),
(61, 167, 'Size', '500ml, 1l [+$0.50]', 0),
(62, 168, 'Size', '500ml, 1l [+$0.50]', 0),
(63, 177, 'Size', '473ml, 710ml[+$0.60]', 0),
(64, 231, 'Size', '591ml, 1l [$0.20]', 0),
(65, 238, 'Size', '591ml, 1l [+$0.20]', 0),
(66, 235, 'Size', '500ml, 1.5l [+$1.00]', 0),
(67, 232, 'Size', '591ml, 1l [+$0.90], 1.5l [+$1.90]', 0),
(68, 274, 'Size', '591ml, 1l [+$1.00]', 0),
(69, 302, 'Size', '500ml, 1.18l [+$2.20]', 0),
(70, 320, 'Size', '250ml, 335ml[+$1.00] , 473ml[+$2.00]', 0),
(71, 319, 'Size', '250ml, 335ml[+$1.00] , 473ml[+$2.00]', 0),
(72, 322, 'Size', 'small, large[+$0.69]', 0),
(73, 326, 'Size', 'small, large[+$0.69]', 0),
(74, 337, 'Size', 'small, large[+$0.69]', 0),
(75, 346, 'Size', '185g, 355g[+$1.00]', 0),
(76, 345, 'Size', '185g, 355g[+$1.00]', 0),
(77, 344, 'Size', '185g, 355g[+$1.00]', 0),
(78, 380, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(79, 381, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(80, 382, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(81, 383, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(82, 384, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(83, 385, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(84, 386, 'Size', '1 scoop, 2 scoops [+$0.48], 3 scoops [+$0.92]', 0),
(85, 402, 'Size', '1l, 2l [+$2.00], 4l [+$3.00]', 0),
(86, 403, 'Size', '1l, 2l [+$2.00], 4l [+$3.00]', 0),
(87, 428, 'Size', '1l, 2l [+$2.00]', 0),
(88, 487, 'Size', '473ml, 946ml [+$1.50]', 0),
(89, 488, 'Size', '473ml, 946ml [+$1.50]', 0),
(90, 523, 'xxx', 'samm', 0),
(91, 440, 'Size', 'small,large [+$4.00]', 0),
(92, 526, 'Flavour', 'original,teriyaki,jalapeno', 0),
(93, 527, 'Flavour', 'original,teriyaki,peppered', 0),
(94, 530, 'Size', 'small,medium[+$0.47],large[+$0.97]', 0),
(95, 531, 'Size', 'small,medium[+$0.47],large[+$0.97]', 0),
(97, 532, 'Size', 'small,medium[+$0.24],large[+$0.50]', 0),
(98, 533, 'Size', 'small,medium[+$0.47],large[+$0.73]', 0),
(99, 534, 'Size', 'small,medium[+$0.47],large[+$0.73]', 0),
(100, 530, 'Flavour', 'tropical,fruit punch', 0),
(101, 531, 'Flavour', 'tropical,fruit punch', 0),
(102, 531, 'Ice Cream', 'vanilla,chocolate,strawberry', 0),
(103, 33, 'Dip', 'honey mustard,barbeque,sweet and sour,plum,ranch', 0),
(104, 35, '1st Dip', 'honey mustard,barbeque,sweet and sour,plum,ranch', 0),
(105, 35, '2nd Dip', 'honey mustard,barbeque,sweet and sour,plum,ranch', 0),
(106, 540, '1st Curry', 'cabbage and carrots, chickpea, beets', 0),
(107, 540, '2nd Curry', 'cabbage and carrots, chickpea, beets, squash', 0),
(108, 541, '1st Curry', 'cabbage and carrots, chickpea, beets, red lentils, spinach lentils', 0),
(109, 541, '2nd Curry', 'cabbage and carrots, chickpea, beets, squash', 0),
(110, 557, 'Flavour', 'coka cola, pepsi', 0),
(111, 549, 'Size', 'small, large', 0),
(112, 548, 'Size', 'small, large', 0),
(113, 547, 'Size', 'small, large', 0),
(114, 545, 'Size', 'small, large', 0),
(115, 544, 'Size', 'small, large', 0),
(116, 592, 'Size', 'small, medium', 0),
(118, 592, 'Flavour', 'orange, mango', 0),
(119, 646, 'Size', 'sm, med, large', 0),
(120, 646, 'Flav', 'mang, orng, straw', 0),
(121, 647, 'bread', 'white, whole wheat', 0),
(122, 647, 'jam', 'strawberry, mango, orange', 0),
(123, 546, 'Size', 'small,large', 0),
(124, 585, 'size', 'small,big', 0),
(125, 746, 'size', 'small, large', 0),
(126, 593, 'Meat', 'bacon, ham, sausage', 0),
(127, 593, 'Bread Type', 'white, whole wheat, rye', 0),
(128, 593, 'Eggs Cooked to order', 'sunny side up, basted medium, basted soft, scrambled, poached hard, poached medium, poached soft, over hard, over medium, over easy, basted hard', 0),
(129, 594, 'Bread Type', 'white, whole wheat, rye', 0),
(130, 595, 'Bread Type', 'white, whole wheat, rye', 0),
(131, 596, 'Bread Type', 'white, whole wheat, rye', 0),
(132, 597, 'Bread Type', 'white, whole wheat, rye', 0),
(133, 598, 'Bread Type', 'white, whole wheat, rye', 0),
(134, 603, 'Meat Cooked to order', 'blue, rare, medium to rare, medium, medium to well done, well done', 0),
(135, 603, 'Bread Type', 'white, whole wheat, rye', 0),
(136, 604, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(137, 605, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(138, 606, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(139, 607, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(140, 608, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(141, 609, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(142, 610, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(143, 611, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(144, 612, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(145, 613, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(146, 614, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(147, 615, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00], steamed rice[$1.00]', 0),
(148, 616, 'Type', 'spicy, honey garlic, deep fried, sweet and sour dip', 0),
(149, 616, 'Substitutions', 'none, onion rings[+$2.00], caesar salad[+$3.50], green salad[+$1.00], poutine[+$2.00], yam fries w/ chipotle dip[+$3.50], potato wedges[+$2.00], steamed rice [$1.00]', 0),
(150, 747, 'size', 'white, whole wheat, rye', 0),
(151, 617, 'Size', '2 piece, 3 piece[+$3.00]', 0),
(152, 618, 'Options', 'steamed rice, basmati rice', 0),
(153, 620, 'Side', 'fries, onion rings[+$2.00], caesar salad[+$3.50], poutine[+$2.00], yam fries with chipotle dip[+$3.50], potato wedges[+$2.00]', 0),
(154, 621, 'Type', 'deep fried, honey garlic, spicy', 0),
(155, 625, 'Size', '1 piece, 2 piece[$4.00], 3 piece[+$9.00]', 0),
(156, 651, 'Sides', 'fries, mashed potatoes', 0),
(158, 652, 'Sides', 'fries, mashed potatoes', 0),
(159, 653, 'Size', 'small, large[+$2.00]', 0),
(160, 656, 'Size', 'small, large[+$2.00]', 0),
(161, 656, 'Meat', 'chicken, beef[+$1.00], mushroom[+$1.00]', 0),
(162, 657, 'Size', 'small, large[+$3.00]', 0),
(163, 659, 'Size', 'small, large[+$3.00]', 0),
(164, 661, 'Size', 'small, large[+$3.00]', 0),
(165, 664, 'Meat', 'prawn, pork[+$1.00]', 0),
(166, 667, 'Meat', 'vegetarian tofu, chicken[+$2.00], shrimp[+$3.00]', 0),
(167, 681, 'Size', 'small, large[+$1.50]', 0),
(168, 682, 'Size', 'small, large[+$1.50]', 0),
(169, 683, 'Size', 'small, large[+$2.00]', 0),
(170, 683, 'Cheese', 'regular, shredded mozzarella cheese, cheese curds[+$1.00]', 0),
(171, 684, 'Size', 'small, large[+$3.00]', 0),
(172, 685, 'Size', 'small, large[+$3.00]', 0),
(173, 697, 'Bread Type', 'white, whole wheat, rye', 0),
(174, 746, 'Jam', 'mango,orange,grape', 0);

--
-- Triggers `variant_options`
--
DELIMITER $$
CREATE TRIGGER `delete_assoc_varients` AFTER DELETE ON `variant_options` FOR EACH ROW DELETE from variants WHERE option_id = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `key`, `value`) VALUES
(1, 'title', 'Discover the greatest places around Prince Rupert'),
(2, 'sub_title', 'Want a delicious meal, but no time we will deliver it hot and yummy.'),
(3, 'social_links', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/foodrive.ca\",\"twitter\":\"\",\"instagram\":\"https:\\/\\/www.instagram.com\\/foodrive.ca\\/\"}'),
(4, 'about_us', '<p>Order food and beverages online from restaurants near you. We deliver food from your neighborhood local joints, your favorite restaurants in your area. Exciting bit? We place no minimum order restrictions! Order in as little (or as much) as you?d like. We will make the foodrive to you!<br></p>'),
(5, 'privacy_policy', '<h6>At Foodrive, accessible from https://foodrive.ca, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Foodrive and how we use it.</h6><h6><br>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.<br>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Foodrive. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href=\"https://www.privacypolicygenerator.info/\" xss=\"removed\">Free Privacy Policy Generator</a>.</h6><p><br></p><h2 xss=\"removed\">Consent</h2><p xss=\"removed\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p><h2 xss=\"removed\">Information we collect</h2><p xss=\"removed\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p><p xss=\"removed\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p><p xss=\"removed\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p><h2 xss=\"removed\">How we use your information</h2><p xss=\"removed\">We use the information we collect in various ways, including to:</p><ul xss=\"removed\"><li>Provide, operate, and maintain our website</li><li>Improve, personalize, and expand our website</li><li>Understand and analyze how you use our website</li><li>Develop new products, services, features, and functionality</li><li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li><li>Send you emails</li><li>Find and prevent fraud</li></ul><h2 xss=\"removed\">Log Files</h2><p xss=\"removed\">Foodrive follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p><h2 xss=\"removed\">Advertising Partners Privacy Policies</h2><p xss=\"removed\">You may consult this list to find the Privacy Policy for each of the advertising partners of Foodrive.</p><p xss=\"removed\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Foodrive, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p><p xss=\"removed\">Note that Foodrive has no access to or control over these cookies that are used by third-party advertisers.</p><h2 xss=\"removed\">Third Party Privacy Policies</h2><p xss=\"removed\">Foodrive\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p><p xss=\"removed\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p><h2 xss=\"removed\">CCPA Privacy Rights (Do Not Sell My Personal Information)</h2><p xss=\"removed\">Under the CCPA, among other rights, California consumers have the right to:</p><ul><li>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</li><li>Request that a business delete any personal data about the consumer that a business has collected.</li><li>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</li><li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li></ul><h2 xss=\"removed\">GDPR Data Protection Rights</h2><p xss=\"removed\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p><ul><li>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</li><li>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</li><li>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</li><li>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</li><li>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</li><li>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</li><li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li></ul><h2 xss=\"removed\">Children\'s Information</h2><p xss=\"removed\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p><p xss=\"removed\">Foodrive does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>'),
(6, 'faq', '<h6><b>How can I make changes in my order after order get placed?</b></h6><p>Your order can be edited before it reaches the restaurant. You could contact <b>customer support</b> team via <b>chat </b>or <b>email </b>to do so. Once order is placed and restaurant starts preparing your food, you may not edit its contents.<br></p><blockquote class=\"blockquote\"><b>How can I cancel my order?</b></blockquote><p>We regret to inform you that, Order cancellation is not possible if<span xss=\"removed\"> the order is already inside the kitchen or prepared, contact to your restaurant if order cancellation is still possible or contact us through <b>email(</b></span><a href=\"mailto:support@foodrive.ca\">support@foodrive.ca</a>)<span xss=\"removed\"><b> </b>or <b>chat</b>. However, we cannot guarantee. </span></p><p>However, we provided an option for order cancellation on<b> CASH ON DELIVERY</b> or <b>CREDIT/DEBIT</b> payment method, but as soon as order gets <b>approved by restaurant, </b>the cancellation option <b>will disappear</b>.</p><blockquote class=\"blockquote\"><span xss=\"removed\"><b>How can I report any problem with my order?</b></span></blockquote><p>First and foremost, we\'re sorry! While we strive to make both your order and delivery experience perfect every time, sometimes mistakes happen. And when they do, we\'re here to make things right.</p><p>To report an issue follow the instructions below:</p><p>1. Select <b>Manage Profile </b>on the top right corner</p><p>2. Select <b>Orders -> All Orders</b> and choose the corresponding order</p><p>3. Scroll to the bottom and select <b>Support</b> option (Note: <b>Support</b> option is only visible after the order is delivered)</p><p>4. Follow the prompts on the screen</p><p>\r\n</p>\r\n'),
(7, 'banner_image', 'banner.jpg'),
(8, 'backend_logo', 'QuWeFXAyVbptGEiPS8kC.jpg'),
(9, 'website_logo', 'gkiJQLMe9zS61WsHO2f3.jpg'),
(10, 'favicon', 'lSNbtW1uTFKndB5jcPpg.jpg'),
(11, 'theme', 'default'),
(12, 'advt_sliders', '[\"7jvCUzlo6pbVQEdSRaD0.jpg\",\"7X3EUQ4gfokZVJnrMTwC.jpg\",\"MBtaskuHR34mcrYS1W6J.jpg\",\"placeholder.jpg\",\"placeholder.jpg\",\"placeholder.jpg\"]'),
(13, 'advt_limit', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `commission_details`
--
ALTER TABLE `commission_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `delivery_settings`
--
ALTER TABLE `delivery_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories_index`
--
ALTER TABLE `food_categories_index`
  ADD PRIMARY KEY (`indx_id`);

--
-- Indexes for table `food_menus`
--
ALTER TABLE `food_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_code` (`order_code`);

--
-- Indexes for table `paid_commissions`
--
ALTER TABLE `paid_commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `paid_commission_history`
--
ALTER TABLE `paid_commission_history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `restaurant_settings`
--
ALTER TABLE `restaurant_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant_options`
--
ALTER TABLE `variant_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission_details`
--
ALTER TABLE `commission_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `delivery_settings`
--
ALTER TABLE `delivery_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `food_categories_index`
--
ALTER TABLE `food_categories_index`
  MODIFY `indx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=712;

--
-- AUTO_INCREMENT for table `food_menus`
--
ALTER TABLE `food_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_commissions`
--
ALTER TABLE `paid_commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `paid_commission_history`
--
ALTER TABLE `paid_commission_history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurant_settings`
--
ALTER TABLE `restaurant_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `variant_options`
--
ALTER TABLE `variant_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commission_details`
--
ALTER TABLE `commission_details`
  ADD CONSTRAINT `commission_details_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_menus`
--
ALTER TABLE `food_menus`
  ADD CONSTRAINT `food_menus_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_menus_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `food_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
