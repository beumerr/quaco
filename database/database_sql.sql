-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 sep 2019 om 00:25
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `field`
--

CREATE TABLE `field` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `type_id` tinyint(1) UNSIGNED NOT NULL,
  `post_id` smallint(1) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `field`
--

INSERT INTO `field` (`id`, `type_id`, `post_id`, `name`, `value`, `order`, `parent`) VALUES
(1, 1, 1, 'content_html', '<p>This is main content</p>', 1, 0),
(2, 2, 1, 'subtitle', 'Here come the subtitle field value ', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `field_type`
--

CREATE TABLE `field_type` (
  `field_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `field_type`
--

INSERT INTO `field_type` (`field_id`, `value`) VALUES
(1, 'html_content'),
(2, 'text'),
(3, 'number'),
(4, 'select');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media`
--

CREATE TABLE `media` (
  `post_id` smallint(1) UNSIGNED NOT NULL,
  `type_id` tinyint(1) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `media_type`
--

CREATE TABLE `media_type` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE `menu` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `type_id` smallint(1) UNSIGNED NOT NULL,
  `post_id` mediumint(1) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `parent` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`id`, `type_id`, `post_id`, `name`, `icon`, `order`, `parent`) VALUES
(1, 1, 1, 'home', '<div class=\'icon home\'></div>', 1, 0),
(2, 1, 2, 'services', '<div class=\'icon service\'></div>', 2, 0),
(3, 1, 3, 'webdesign', '', 1, 2),
(4, 1, 4, 'webshop', '', 2, 2),
(5, 1, 5, 'contact', '<div class=\'icon contact\'></div>', 2, 0),
(6, 2, 1, 'home', '', 1, 0),
(7, 2, 2, 'services', '', 2, 0),
(10, 2, 5, 'support', '', 3, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `value`) VALUES
(1, 'header'),
(2, 'footer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `option`
--

CREATE TABLE `option` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_id` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `has_fields` bit(1) NOT NULL DEFAULT b'0',
  `has_media` bit(1) NOT NULL DEFAULT b'0',
  `is_archive` bit(1) NOT NULL DEFAULT b'0',
  `publish_date` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP(1),
  `parent` smallint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` smallint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `type_id`, `title`, `level`, `meta_description`, `slug`, `template_id`, `has_fields`, `has_media`, `is_archive`, `publish_date`, `parent`, `status`, `user_id`) VALUES
(325, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'et', 8, b'1', b'1', b'1', '2019-09-16 11:02:04.7', 310, 0, 1),
(324, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'Duis', 1, b'1', b'1', b'0', '2019-09-16 11:02:04.7', 0, 1, 1),
(323, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'Etiam', 5, b'0', b'0', b'1', '2019-09-16 11:02:04.7', 9, 1, 1),
(322, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 'sit', 10, b'1', b'0', b'1', '2019-09-16 11:02:04.7', 8, 2, 1),
(321, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'lacus.', 2, b'0', b'0', b'1', '2019-09-16 11:02:04.7', 310, 1, 1),
(320, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'lectus,', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.7', 310, 2, 1),
(319, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'Phasellus', 3, b'1', b'0', b'1', '2019-09-16 11:02:04.7', 9, 1, 1),
(318, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'vel', 4, b'0', b'0', b'0', '2019-09-16 11:02:04.7', 1, 0, 1),
(317, 1, 'Lorem asdt. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'enim', 6, b'0', b'1', b'1', '2019-09-16 11:02:04.7', 0, 1, 1),
(316, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'posuere', 1, b'1', b'1', b'1', '2019-09-16 11:02:04.7', 7, 0, 1),
(314, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'libero', 7, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 8, 2, 1),
(315, 1, 'Lo44444rem ipsum dolor sit ddd, consectetulit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'arcu.', 10, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 317, 1, 1),
(313, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'facilisi.', 4, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 10, 0, 1),
(312, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'Pellentesque', 3, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 5, 0, 1),
(311, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'magna', 1, b'0', b'1', b'1', '2019-09-16 11:02:04.6', 317, 2, 1),
(310, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'nisi', 8, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 0, 2, 1),
(309, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'neque.', 7, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 0, 0, 1),
(307, 3, 'Lorem ipsum dolor sit amet, consectetuer', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'eget', 8, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 310, 1, 1),
(308, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'varius.', 2, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 0, 0, 1),
(306, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'Nunc', 4, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 5, 1, 1),
(305, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'erat.', 9, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 1, 2, 1),
(304, 3, 'Lorem ipsum dolor sit amet,', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'imperdiet', 9, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 6, 2, 1),
(303, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'Phasellus', 1, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 317, 2, 1),
(302, 2, 'Lorem ipsum dolor sit amet, consectetuer', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'Donec', 4, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 10, 2, 1),
(301, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'ad', 6, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 30, 2, 1),
(300, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'aliquet', 8, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 0, 1, 1),
(299, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'In', 6, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 5, 0, 1),
(298, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'tincidunt.', 9, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 6, 2, 1),
(296, 0, 'Lorem ipsum dolor sit amet,', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'purus,', 3, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 6, 2, 1),
(297, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'convallis', 8, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 2, 0, 1),
(295, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'nunc', 4, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 8, 2, 1),
(294, 0, 'Lorem ipsum dolor sit amet,', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'amet', 9, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 0, 0, 1),
(293, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'tempor', 6, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 8, 0, 1),
(291, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'Nullam', 2, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 5, 0, 1),
(292, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 'sociis', 8, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 5, 2, 1),
(290, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'accumsan', 2, b'0', b'1', b'1', '2019-09-16 11:02:04.6', 8, 0, 1),
(288, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'libero', 7, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 0, 0, 1),
(289, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'Proin', 10, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 5, 2, 1),
(287, 3, 'Lorem ipsum dolor sit amet, consectetuer', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'elit.', 7, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 7, 2, 1),
(286, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'nisi', 4, b'0', b'1', b'1', '2019-09-16 11:02:04.6', 4, 0, 1),
(285, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'fermentum', 5, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 5, 2, 1),
(284, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'augue,', 1, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 1, 1, 1),
(283, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'nulla.', 4, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 0, 1, 1),
(282, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'vitae,', 10, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 0, 0, 1),
(281, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'eu', 7, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 3, 0, 1),
(280, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'iaculis', 7, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 5, 2, 1),
(278, 2, 'Lorem ipsum dolor sit amet,', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'Proin', 3, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 8, 0, 1),
(279, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'nonummy.', 10, b'0', b'1', b'1', '2019-09-16 11:02:04.6', 9, 2, 1),
(275, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'convallis,', 10, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 6, 0, 1),
(276, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'mattis', 4, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 5, 0, 1),
(277, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'eu,', 10, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 2, 1, 1),
(274, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'mollis.', 9, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 1, 0, 1),
(273, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis', 'Duis', 8, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 7, 1, 1),
(272, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'sed,', 10, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 1, 0, 1),
(271, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'Cras', 9, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 0, 1, 1),
(270, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'a', 5, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 3, 0, 1),
(269, 0, 'Lorem ipsum dolor sit amet, consectetuer', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'aliquet', 4, b'1', b'0', b'1', '2019-09-16 11:02:04.6', 9, 0, 1),
(268, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'Suspendisse', 10, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 4, 2, 1),
(267, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'natoque', 4, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 9, 1, 1),
(266, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'ipsum', 9, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 7, 0, 1),
(265, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'ac', 6, b'0', b'1', b'1', '2019-09-16 11:02:04.6', 4, 0, 1),
(264, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'Donec', 5, b'1', b'1', b'1', '2019-09-16 11:02:04.6', 6, 0, 1),
(263, 3, 'Lorem ipsum dolor sit amet, consectetuer', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 'feugiat.', 6, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 3, 2, 1),
(261, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'cursus', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 3, 0, 1),
(262, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'Phasellus', 2, b'1', b'0', b'0', '2019-09-16 11:02:04.6', 3, 0, 1),
(260, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'libero', 6, b'0', b'1', b'0', '2019-09-16 11:02:04.6', 0, 0, 1),
(259, 1, 'Lorem ipsum dolor sit amet, consectetuer', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'lacinia', 6, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 1, 0, 1),
(258, 1, 'Lorem ipsum dolor sit amet, consectetuer', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 'nec', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.6', 2, 2, 1),
(257, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'elit,', 7, b'0', b'0', b'1', '2019-09-16 11:02:04.6', 5, 2, 1),
(256, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'pharetra,', 6, b'0', b'0', b'0', '2019-09-16 11:02:04.6', 4, 0, 1),
(255, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida', 'Maecenas', 8, b'0', b'0', b'0', '2019-09-16 11:02:04.5', 10, 2, 1),
(254, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'Integer', 6, b'0', b'1', b'0', '2019-09-16 11:02:04.5', 1, 1, 1),
(253, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'ornare,', 4, b'1', b'1', b'1', '2019-09-16 11:02:04.5', 8, 0, 1),
(252, 0, 'Lorem ipsum dolor sit amet,', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'nunc.', 5, b'1', b'0', b'1', '2019-09-16 11:02:04.5', 5, 0, 1),
(251, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'erat', 9, b'0', b'1', b'1', '2019-09-16 11:02:04.5', 10, 0, 1),
(249, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'nisi', 6, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 10, 0, 1),
(250, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'dapibus', 1, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 3, 2, 1),
(248, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'magna', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 3, 0, 1),
(247, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'ornare,', 6, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 6, 0, 1),
(246, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'libero.', 6, b'0', b'1', b'1', '2019-09-16 11:02:04.5', 5, 2, 1),
(245, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'pellentesque.', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 8, 2, 1),
(244, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'volutpat.', 2, b'1', b'0', b'1', '2019-09-16 11:02:04.5', 2, 0, 1),
(243, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'Integer', 8, b'0', b'1', b'0', '2019-09-16 11:02:04.5', 8, 1, 1),
(242, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'elementum', 7, b'0', b'0', b'0', '2019-09-16 11:02:04.5', 4, 2, 1),
(241, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'dolor,', 9, b'0', b'0', b'0', '2019-09-16 11:02:04.5', 10, 0, 1),
(240, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'odio.', 1, b'1', b'0', b'1', '2019-09-16 11:02:04.5', 4, 1, 1),
(239, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'mollis', 2, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 1, 2, 1),
(238, 1, 'Lorem ipsum dolor sit amet, consectetuer', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'libero.', 5, b'1', b'1', b'1', '2019-09-16 11:02:04.5', 5, 2, 1),
(237, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'eget', 3, b'1', b'1', b'1', '2019-09-16 11:02:04.5', 2, 2, 1),
(236, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque', 'Nullam', 1, b'0', b'0', b'0', '2019-09-16 11:02:04.5', 7, 1, 1),
(235, 0, 'Lorem ipsum dolor sit amet, consectetuer', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at', 'sit', 8, b'1', b'0', b'0', '2019-09-16 11:02:04.5', 3, 0, 1),
(234, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'elit,', 10, b'1', b'0', b'1', '2019-09-16 11:02:04.5', 10, 1, 1),
(233, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'Donec', 3, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 8, 0, 1),
(232, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper.', 'bibendum.', 8, b'1', b'1', b'1', '2019-09-16 11:02:04.5', 9, 1, 1),
(231, 0, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'nec,', 10, b'0', b'1', b'1', '2019-09-16 11:02:04.5', 2, 1, 1),
(230, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'dui', 9, b'1', b'1', b'0', '2019-09-16 11:02:04.5', 2, 2, 1),
(229, 0, 'Lorem ipsum dolor sit amet, consectetuer', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non,', 'Duis', 3, b'1', b'0', b'1', '2019-09-16 11:02:04.5', 0, 0, 1),
(228, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu', 'elit.', 10, b'0', b'1', b'1', '2019-09-16 11:02:04.5', 8, 1, 1),
(226, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet', 'elit.', 2, b'1', b'1', b'1', '2019-09-16 11:02:04.5', 0, 0, 1),
(227, 3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cu', 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 'lobortis', 9, b'0', b'1', b'0', '2019-09-16 11:02:04.5', 7, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_type`
--

CREATE TABLE `post_type` (
  `id` tinyint(1) NOT NULL,
  `value` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `post_type`
--

INSERT INTO `post_type` (`id`, `value`) VALUES
(2, 'news'),
(1, 'page');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `mail` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP(1) ON UPDATE CURRENT_TIMESTAMP(1)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `level`, `token`, `first_name`, `last_name`, `last_login`) VALUES
(1, 'thomasbeumer@live.nl', '$2y$10$sRDFSziZliaryVtvp1L6Ju3DFU1fJhnUBBmwoGzpNSQ7AcCl8muhK', 5, NULL, 'thomas', 'beumer', '2019-09-22 10:11:09.0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` smallint(1) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `name`, `value`, `order`) VALUES
(1, 1, 'street', 'Teststreet', 1),
(2, 1, 'street_nr', '21', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cf_example_post1_idx` (`post_id`);

--
-- Indexen voor tabel `field_type`
--
ALTER TABLE `field_type`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexen voor tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`post_id`,`type_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_media_post1_idx` (`post_id`);

--
-- Indexen voor tabel `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_types_media1_idx` (`id`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`);

--
-- Indexen voor tabel `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_meta_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `field`
--
ALTER TABLE `field`
  MODIFY `id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `media_type`
--
ALTER TABLE `media_type`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT voor een tabel `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
