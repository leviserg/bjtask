-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 04 2019 г., 16:25
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bjmvctask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `content` text,
  `pict` varchar(90) DEFAULT NULL,
  `changed` datetime NOT NULL,
  `completed` int(11) DEFAULT NULL,
  `edited` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `content`, `pict`, `changed`, `completed`, `edited`) VALUES
(1, 'Nick Smart', 'smart@example.com', ' Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text. Task 1 Text.', 'task_1.jpg', '2019-10-23 17:55:26', 0, 0),
(2, 'Jay Prince', 'prince@gmail.com', 'Task text. Task text. Task text. Task text. Task text. Task text. Task text. Task text. ', 'task_2.jpg', '2019-10-23 22:50:04', 1, 1),
(3, 'Sam Nickson', 'nickson@work.com', 'Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text Text', 'task_3.jpg', '2019-10-24 10:57:17', 0, 0),
(4, 'Xamarin', 'Xam@bubble.xyz', 'Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx Xxxx ', 'task_4.jpg', '2019-10-24 15:15:04', 1, 1),
(5, 'Senior', 'senior@php.com', 'Do nothing', 'task_5.jpg', '2019-10-24 15:16:21', 1, 1),
(6, 'Middle', 'middle@php.com', 'Do everything', 'task_6.jpg', '2019-10-25 12:08:55', 0, 0),
(7, 'Junior', 'junior@php.com', 'Do what you want', 'task_7.jpg', '2019-10-25 12:08:39', 0, 0),
(9, 'sdrgtasdrg', 'smile@example.com', 'srsadrgfsdagfrsdgsdgfsdgdgsg', 'task_9.jpg', '2019-10-25 12:13:02', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
