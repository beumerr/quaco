-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 sep 2019 om 18:23
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.1.12

--
-- Database: `quaco`
--

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `field`
--

INSERT INTO `field` (`id`, `type_id`, `post_id`, `name`, `value`, `order`, `parent`) VALUES
(1, 1, 1, 'content_html', '<p>This is main content</p>', 1, 0),
(2, 2, 1, 'subtitle', 'Here come the subtitle field value ', 0, 0);

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `field_type`
--

INSERT INTO `field_type` (`field_id`, `value`) VALUES
(1, 'html_content'),
(2, 'text'),
(3, 'number'),
(4, 'select');

-- --------------------------------------------------------


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
-- Gegevens worden geëxporteerd voor tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `value`) VALUES
(1, 'header'),
(2, 'footer');

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `type_id`, `title`, `level`, `meta_description`, `slug`, `template_id`, `has_fields`, `has_media`, `is_archive`, `publish_date`, `parent`, `status`, `user_id`) VALUES
(1, 1, 'Home', 0, 'Welcome to \'Power FE\', manage your content with SEO optimizer and build worlds fastest frond-end.', 'home', 1, b'1', b'0', b'0', '0000-00-00 00:00:00.0', 0, 1, 1),
(2, 1, 'services', 0, 'Our services and stuf', 'services', 2, b'1', b'0', b'0', '0000-00-00 00:00:00.0', 0, 1, 1),
(3, 1, 'webdesign', 0, 'Cool webdesign page ', 'webdesign', 3, b'1', b'0', b'0', '0000-00-00 00:00:00.0', 0, 1, 1),
(4, 1, 'webshop', 0, 'webshop cooll kope kope', 'webshop', 3, b'1', b'0', b'0', '0000-00-00 00:00:00.0', 0, 1, 1),
(5, 1, 'contact', 0, 'contact contact contact', 'contact', 4, b'1', b'0', b'0', '0000-00-00 00:00:00.0', 0, 1, 1),
(6, 2, 'News', 0, 'News, this in archive page', 'news', 0, b'0', b'0', b'1', '0000-00-00 00:00:00.0', 0, 1, 1),
(7, 2, 'A intresting news subject', 0, 'A intresting news subject meta omg', 'a-intresting-news-subject', 0, b'1', b'1', b'0', '0000-00-00 00:00:00.0', 6, 1, 1);

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `post_type`
--

INSERT INTO `post_type` (`id`, `value`) VALUES
(1, 'page'),
(2, 'news');

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `mail`, `lastlogin`, `password`, `level`, `token`, `firstname`, `lastname`, `phone`, `last_login`) VALUES
(1, 'thomasbeumer@live.nl', NULL, '098f6bcd4621d373cade4e832627b4f6', 0, NULL, 'thomas', 'beumer', '0637549818', '0000-00-00 00:00:00.0');

-- --------------------------------------------------------

--
-- Gegevens worden geëxporteerd voor tabel `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `name`, `value`, `order`) VALUES
(1, 1, 'street', 'Teststreet', 1),
(2, 1, 'street_nr', '21', 2);

