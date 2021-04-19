-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 14 2021 г., 18:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lab3_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `idAuto` int(255) NOT NULL AUTO_INCREMENT,
  `Manufacturer` int(255) NOT NULL,
  `TypeID` int(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `EngId` int(255) NOT NULL,
  `Col` varchar(20) NOT NULL,
  `Pacet` varchar(20) NOT NULL,
  `Photo` text NOT NULL,
  PRIMARY KEY (`idAuto`),
  KEY `TypeID` (`TypeID`,`EngId`),
  KEY `EngId` (`EngId`),
  KEY `Manufacturer` (`Manufacturer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`idAuto`, `Manufacturer`, `TypeID`, `Price`, `EngId`, `Col`, `Pacet`, `Photo`) VALUES
(6, 1, 1, '444555.00', 1, 'White', 'GL+', '1.jpg'),
(8, 2, 2, '205000.00', 3, 'Black', 'GL', '2.jpg'),
(9, 3, 4, '6000000.00', 4, 'Black', 'GL+', '3.jpg'),
(10, 4, 5, '5000000.00', 3, 'White', 'GLX', '4.jpg'),
(11, 5, 6, '1000000.00', 1, 'Red', 'RS', '5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `engine`
--

CREATE TABLE IF NOT EXISTS `engine` (
  `IdEngine` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Fuel` varchar(20) NOT NULL,
  `Volume` varchar(20) NOT NULL,
  `Hp` int(255) NOT NULL,
  `Hm` int(11) NOT NULL,
  PRIMARY KEY (`IdEngine`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `idMf` int(255) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `year` int(20) NOT NULL,
  PRIMARY KEY (`idMf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`idMf`, `Brand`, `Model`, `country`, `year`) VALUES
(1, 'Volkswagen', 'Polo', 'Russia', 2011),
(2, 'Reno', 'Logan', 'Japan', 2019),
(3, 'Toyota', 'RAF4', 'Japan', 2020),
(4, 'MINI', 'Cooper', 'UK', 2006),
(5, 'KIA', 'PIO', 'Russia', 2010);

-- --------------------------------------------------------

--
-- Структура таблицы `teastdrives`
--

CREATE TABLE IF NOT EXISTS `teastdrives` (
  `UserID` int(11) NOT NULL,
  `IDTD` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teastdrives`
--

INSERT INTO `teastdrives` (`UserID`, `IDTD`) VALUES
(1, 3),
(2, 4),
(2, 6),
(2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `testdrive`
--

CREATE TABLE IF NOT EXISTS `testdrive` (
  `IDTD` int(255) NOT NULL AUTO_INCREMENT,
  `Autoid` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`IDTD`),
  KEY `Auto` (`Autoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `testdrive`
--

INSERT INTO `testdrive` (`IDTD`, `Autoid`, `Date`) VALUES
(3, 9, '2021-01-02'),
(4, 10, '2021-04-03'),
(5, 6, '2021-04-13'),
(6, 8, '2021-04-13'),
(7, 8, '2021-04-06'),
(8, 9, '2021-04-12'),
(9, 9, '2021-04-12'),
(10, 11, '2021-04-30'),
(11, 6, '2021-04-30'),
(12, 11, '2021-04-23'),
(13, 6, '2021-04-21'),
(14, 6, '2021-04-30'),
(15, 6, '2021-04-04'),
(16, 6, '2021-04-14'),
(17, 6, '2021-04-30'),
(18, 6, '2021-04-22'),
(19, 8, '2021-04-30'),
(20, 6, '2021-04-30'),
(21, 6, '2021-04-09'),
(22, 6, '2021-04-30'),
(23, 6, '2021-04-25');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `IdType` int(255) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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

CREATE TABLE IF NOT EXISTS `user` (
  `SNILS_p` int(11) NOT NULL AUTO_INCREMENT,
  `Surname` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Name` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Patronym` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Gender` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Phone` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Login` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `Password` varchar(100) CHARACTER SET cp1250 COLLATE cp1250_bin NOT NULL,
  PRIMARY KEY (`SNILS_p`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`SNILS_p`, `Surname`, `Name`, `Patronym`, `Gender`, `Phone`, `Email`, `Login`, `Password`) VALUES
(1, 'Sedov', 'Vadim', 'Aleksandrovich', 'Man', '89211829202', 'svavolhov@gmail.com', 'Akapulka', '2552'),
(2, 'Иванов', 'Иван', 'Иванович', 'Мужской', '81111829202', 'sva_volhov@mail.ru', 'user1', '111');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
