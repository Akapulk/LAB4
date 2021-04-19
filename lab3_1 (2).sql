-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 09 2021 г., 12:17
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab3_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `idAuto` int(255) NOT NULL,
  `Manufacturer` int(255) NOT NULL,
  `TypeID` int(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `EngId` int(255) NOT NULL,
  `Col` varchar(20) NOT NULL,
  `Pacet` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`idAuto`, `Manufacturer`, `TypeID`, `Price`, `EngId`, `Col`, `Pacet`) VALUES
(6, 1, 1, '444555.00', 1, 'White', 'GL+'),
(8, 2, 2, '205000.00', 3, 'Black', 'GL'),
(9, 3, 4, '6000000.00', 4, 'Black', 'GL+'),
(10, 4, 5, '5000000.00', 3, 'White', 'GLX'),
(11, 5, 6, '1000000.00', 1, 'Red', 'RS');

-- --------------------------------------------------------

--
-- Структура таблицы `engine`
--

CREATE TABLE `engine` (
  `IdEngine` int(255) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Fuel` varchar(20) NOT NULL,
  `Volume` varchar(20) NOT NULL,
  `Hp` int(255) NOT NULL,
  `Hm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `engine`
--

INSERT INTO `engine` (`IdEngine`, `Name`, `Fuel`, `Volume`, `Hp`, `Hm`) VALUES
(1, 'M16A', '92', '1.6', 115, 160),
(3, '20B1', '98', '2.5', 201, 150),
(4, '6GT', 'Дизель', '3.0', 190, 230),
(5, 'RS4', '95', '4.0', 380, 200);

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE `manufacturer` (
  `idMf` int(255) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `year` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`idMf`, `Brand`, `Model`, `country`, `year`) VALUES
(1, 'Volkswagen', 'Golf', 'Russia', 2011),
(2, 'Reno', 'Logan', 'Japan', 2019),
(3, 'Toyota', 'RAF4', 'Japan', 2020),
(4, 'MINI', 'Cooper', 'UK', 2006),
(5, 'KIA', 'PIO', 'Russia', 2010);

-- --------------------------------------------------------

--
-- Структура таблицы `testdrive`
--

CREATE TABLE `testdrive` (
  `IDTD` int(255) NOT NULL,
  `Autoid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `SERNOM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `IdType` int(255) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`IdType`, `Type`) VALUES
(1, 'Sedan'),
(2, 'SUB'),
(3, 'Pick-up'),
(4, 'van'),
(5, 'Micro'),
(6, '4WD'),
(7, 'Hetchback'),
(8, 'Lemuzin'),
(9, 'cupe'),
(10, 'Liftback'),
(11, 'K-car'),
(12, 'K-car'),
(13, 'K-car'),
(14, 'K-car');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `SNILS_p` int(11) NOT NULL,
  `Surname` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Name` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Patronym` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Gender` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Phone` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Login` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Password` varchar(100) CHARACTER SET cp1250 COLLATE cp1250_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`SNILS_p`, `Surname`, `Name`, `Patronym`, `Gender`, `Phone`, `Email`, `Login`, `Password`) VALUES
(1, 'Седов', 'Вадим', 'Александрович', 'Мужской', '89211829202', 'svavolhov@gmail.com', 'Akapulka', '2552'),
(2, 'Иванов', 'Иван', 'Иванович', 'Мужской', '81111829202', 'sva_volhov@mail.ru', 'user1', '111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`idAuto`),
  ADD KEY `TypeID` (`TypeID`,`EngId`),
  ADD KEY `EngId` (`EngId`),
  ADD KEY `Manufacturer` (`Manufacturer`);

--
-- Индексы таблицы `engine`
--
ALTER TABLE `engine`
  ADD PRIMARY KEY (`IdEngine`);

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`idMf`);

--
-- Индексы таблицы `testdrive`
--
ALTER TABLE `testdrive`
  ADD PRIMARY KEY (`IDTD`),
  ADD KEY `Auto` (`Autoid`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`IdType`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`SNILS_p`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `idAuto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `engine`
--
ALTER TABLE `engine`
  MODIFY `IdEngine` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `idMf` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `testdrive`
--
ALTER TABLE `testdrive`
  MODIFY `IDTD` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `IdType` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `SNILS_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`EngId`) REFERENCES `engine` (`IdEngine`),
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `type` (`IdType`),
  ADD CONSTRAINT `auto_ibfk_3` FOREIGN KEY (`Manufacturer`) REFERENCES `manufacturer` (`idMf`);

--
-- Ограничения внешнего ключа таблицы `testdrive`
--
ALTER TABLE `testdrive`
  ADD CONSTRAINT `testdrive_ibfk_1` FOREIGN KEY (`Autoid`) REFERENCES `auto` (`idAuto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
