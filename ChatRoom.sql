-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 03 2015 г., 01:37
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ChatRoom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_room` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `id_room`, `id_sender`, `text`, `time`) VALUES
(3, 1, 1, 'Lalalal', '2015-11-02 22:33:05'),
(5, 1, 1, 'faafaf', '2015-11-02 22:33:10'),
(6, 1, 1, 'gfdgdgdgfgd', '2015-11-02 22:33:14'),
(7, 1, 1, 'gdgdgd', '2015-11-02 22:33:16'),
(8, 1, 1, 'fffffffffffffffffffffffff', '2015-11-02 22:33:18'),
(9, 1, 1, 'ddddddddddddddddddd', '2015-11-02 22:33:19'),
(10, 1, 1, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2015-11-02 22:33:21'),
(11, 1, 1, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2015-11-02 22:33:24'),
(12, 1, 1, 'It''s a trap!', '2015-11-02 22:33:32'),
(13, 2, 1, 'Hello!', '2015-11-02 22:33:40'),
(14, 6, 1, 'Good buy)', '2015-11-02 22:33:50'),
(15, 6, 2, 'good luck)', '2015-11-02 22:35:19'),
(16, 3, 2, 'ohhhh', '2015-11-02 22:35:23'),
(17, 1, 2, 'It''s me!', '2015-11-02 22:35:30'),
(18, 1, 2, 'check it', '2015-11-02 22:35:48');

-- --------------------------------------------------------

--
-- Структура таблицы `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reciever` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `text` text NOT NULL,
  `read` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `pm`
--

INSERT INTO `pm` (`id`, `id_reciever`, `id_sender`, `text`, `read`, `time`) VALUES
(1, 1, 2, 'Hi!', 0, '2015-11-02 15:39:10'),
(2, 1, 2, 'Hi!', 0, '2015-11-02 15:39:10'),
(3, 2, 1, 'Hello!', 0, '2015-11-02 15:39:10'),
(11, 3, 1, 'Hello!', 0, '2015-11-02 15:55:20'),
(12, 3, 1, 'How are you?', 0, '2015-11-02 15:55:26'),
(13, 2, 1, 'gfgf', 0, '2015-11-02 16:11:06'),
(14, 2, 1, 'hghg', 0, '2015-11-02 19:50:01'),
(15, 2, 1, 'gfgf', 0, '2015-11-02 21:17:47'),
(16, 2, 1, 'gfgf', 0, '2015-11-02 21:17:48'),
(17, 2, 1, 'gfgf', 0, '2015-11-02 21:17:49'),
(18, 2, 1, 'gfgf', 0, '2015-11-02 21:17:49'),
(19, 2, 1, 'gfgf', 0, '2015-11-02 21:17:50'),
(20, 2, 1, 'gfgf', 0, '2015-11-02 21:17:54'),
(21, 3, 1, 'gfgf', 0, '2015-11-02 21:17:58'),
(22, 2, 1, 'fdfd', 0, '2015-11-02 21:20:09'),
(23, 2, 1, 'fdfdfd', 0, '2015-11-02 21:20:49'),
(24, 2, 1, 'lala', 0, '2015-11-02 21:26:26'),
(25, 2, 1, 'Goodbuy)', 0, '2015-11-02 22:34:51'),
(26, 7, 1, 'Hello!', 0, '2015-11-02 22:34:57'),
(27, 7, 2, 'Hello!\n', 0, '2015-11-02 22:36:01'),
(28, 1, 2, 'lala', 0, '2015-11-02 22:36:07');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Room #1'),
(3, 'Room #2'),
(6, 'New room'),
(11, 'Last room');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms_users`
--

CREATE TABLE IF NOT EXISTS `rooms_users` (
  `id_room` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rooms_users`
--

INSERT INTO `rooms_users` (`id_room`, `id_user`) VALUES
(6, 2),
(6, 4),
(2, 2),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '123456'),
(2, 'user1', '123456'),
(3, 'user2', '123456'),
(4, 'user3', '123456'),
(6, 'user4', '123456'),
(7, 'user5', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
