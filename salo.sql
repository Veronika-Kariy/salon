-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2023 г., 22:46
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `salo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carpet`
--

CREATE TABLE `carpet` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carpet`
--

INSERT INTO `carpet` (`id`, `id_master`, `id_user`, `name`, `tel`, `email`, `date`, `time`, `status`) VALUES
(61, 2, 11, 'папа', 'папа', 'па', '2023-01-28', '09:30', 0),
(62, 1, 11, '1', '12345', '1@1.com', '2023-01-30', '09:30', 2),
(63, 2, 3, 'fdfd', 'fdfd', 'fd', '2023-01-29', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `carpet_list`
--

CREATE TABLE `carpet_list` (
  `id` int(11) NOT NULL,
  `id_carpet` int(11) NOT NULL,
  `id_services` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carpet_list`
--

INSERT INTO `carpet_list` (`id`, `id_carpet`, `id_services`) VALUES
(75, 62, 1),
(76, 62, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `master_of_puppets`
--

CREATE TABLE `master_of_puppets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `stage` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `master_of_puppets`
--

INSERT INTO `master_of_puppets` (`id`, `name`, `surname`, `stage`, `img`) VALUES
(1, 'Алинa', 'Саминова', '3 года', '02dc565bcba998ff37b47dd14ad4754a.jpg'),
(2, 'Анастасия', 'Кравченко', '6 лет', '4.jpg'),
(3, 'Мария', 'Прохорова', '3 месяца', '6.jpg'),
(6, 'Имя', 'фамилия', 'стаж', '94c5a2f4b746298eacfb027b09e3a3d5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `rewiews`
--

CREATE TABLE `rewiews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estimation` int(11) NOT NULL,
  `plus` varchar(5000) NOT NULL,
  `minus` varchar(5000) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `answer` varchar(1000) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rewiews`
--

INSERT INTO `rewiews` (`id`, `id_user`, `estimation`, `plus`, `minus`, `comment`, `date`, `answer`, `status`) VALUES
(6, 3, 4, 'gfgffffм', 'gfgf', 'gfgff', '25.01.2023', '0', 0),
(7, 2, 3, 'ffdfdfdfdf', 'dfdfdfd', 'fdfdfdfd', '16.01.3023', '0', 0),
(8, 6, 4, 'gf', 'gf', 'gf', '16.01.2023', '0', 0),
(9, 7, 4, 'gf', 'gf', 'gf', '14.44.44', '0', 0),
(10, 6, 4, 'i', 'l', 'y', '28.01.2023', '0', 0),
(11, 1, 5, 'fgtgg', 'ggg', 'ggg', '07.01.2923', '0', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `id_master`, `service`) VALUES
(1, 1, 'Ноги полностью - 1600 р'),
(2, 1, 'Руки полностью - 1000 р'),
(3, 3, 'Лицо - 800 р'),
(4, 2, 'Спина - 1800 р'),
(5, 2, 'Живот - 750 р ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `id_master` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `password`, `status`, `id_master`) VALUES
(1, 'aa', 'aa@aa.ru', '1', '36b2b795711b2dd1e4b9750471efe263', 0, NULL),
(2, '2', '2@2.ru', '2', 'f4bbf80cb8cd8c730b6af56b29d7f449', 0, NULL),
(3, '1', '1@1.ru', '12', '36b2b795711b2dd1e4b9750471efe263', 1, NULL),
(6, 'Виринея', 'V_karii@mail.ru', '89502138594', '86d2713140c5ea8e69703e3b2782e34c', 0, NULL),
(7, 'Ника', 'virineya.kariy@mail.ru', '89502138595', 'c186d53d908a26df9a27dec04edb9a4e', 0, NULL),
(8, 'gg', 'gg@gg.c', '89236815201', '2b44163be1002da4ec9b80a6fd10ffbc', 0, NULL),
(10, 'gfgfgf', 'gfgfgf@gffgh.ru', '89236815202', '4ce1dd09e2287802ea61e4058ac43b53', 0, NULL),
(11, '1', '1@1.com', '12345', '36b2b795711b2dd1e4b9750471efe263', 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carpet`
--
ALTER TABLE `carpet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `carpet_list`
--
ALTER TABLE `carpet_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carpet` (`id_carpet`),
  ADD KEY `id_services` (`id_services`);

--
-- Индексы таблицы `master_of_puppets`
--
ALTER TABLE `master_of_puppets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rewiews`
--
ALTER TABLE `rewiews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carpet`
--
ALTER TABLE `carpet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `carpet_list`
--
ALTER TABLE `carpet_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `master_of_puppets`
--
ALTER TABLE `master_of_puppets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `rewiews`
--
ALTER TABLE `rewiews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carpet`
--
ALTER TABLE `carpet`
  ADD CONSTRAINT `carpet_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `master_of_puppets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carpet_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `carpet_list`
--
ALTER TABLE `carpet_list`
  ADD CONSTRAINT `carpet_list_ibfk_1` FOREIGN KEY (`id_carpet`) REFERENCES `carpet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carpet_list_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rewiews`
--
ALTER TABLE `rewiews`
  ADD CONSTRAINT `rewiews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `master_of_puppets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `master_of_puppets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
