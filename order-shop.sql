-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 17 2023 г., 17:27
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `order-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order_self`
--

CREATE TABLE `order_self` (
  `id` int(11) NOT NULL,
  `orderName` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `order_self`
--

INSERT INTO `order_self` (`id`, `orderName`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Бургуер', '2023-07-31 11:31:22', '2023-08-17 16:44:30', 'лимит не превышен'),
(5, 'Бургуер', '2023-07-31 22:54:38', '2023-08-17 03:40:13', 'лимит превышен'),
(16, 'Салат', '2023-08-17 16:43:44', '2023-08-17 16:43:49', 'лимит превышен');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order_self`
--
ALTER TABLE `order_self`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `order_self`
--
ALTER TABLE `order_self`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
