-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2023 г., 08:11
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `num` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`num`, `id_user`, `checked`, `content`) VALUES
(4, 16, 1, 'new content'),
(110, 18, 0, ''),
(111, 18, 0, 'сделать веб'),
(112, 18, 1, 'ghghghghghghghghghghgghhghggggggggggggggghhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(141, 1, 0, 'Сделать автори'),
(143, 1, 0, 'Сделать добавление, изменение, удаление тасок'),
(144, 16, 0, ''),
(153, 1, 1, 'aksjd'),
(155, 1, 1, ''),
(156, 1, 1, ''),
(158, 1, 1, ''),
(159, 1, 0, ''),
(160, 1, 0, ''),
(161, 1, 0, ''),
(162, 20, 0, 'asef');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`) VALUES
(1, 'petr', 'petr@mail.ru', '1234'),
(16, 'slava', 'slava@mail.ru', '1234'),
(17, 'Igor', 'Igor@mail.ru', '1234'),
(18, 'roma', 'roma@mail.ru', '123'),
(19, 'gosha', 'gosha@mail.ru', '1234'),
(20, 'lskdjglakh', 'askdfhsd@jsd.ru', '1234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`num`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
