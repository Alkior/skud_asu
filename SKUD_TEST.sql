-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 10 2022 г., 12:53
-- Версия сервера: 8.0.28-0ubuntu0.21.10.3
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `SKUD.TEST`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `year_of_birth` int UNSIGNED DEFAULT '0',
  `higher_education` tinyint UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groupName`
--

CREATE TABLE `groupName` (
  `ID` int NOT NULL,
  `group_from_zup_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `groupName`
--

INSERT INTO `groupName` (`ID`, `group_from_zup_name`) VALUES
(58, '7эленгкл'),
(49, 'апрлкенлкенцуы'),
(45, 'апрокщдквуыпо'),
(34, 'АСУ ИБ'),
(56, 'двпалк6не'),
(59, 'енглгробвдуепленкдл'),
(38, 'енгшвпроапрло'),
(37, 'енгшенгггггггггш'),
(36, 'енгшенгшенгш'),
(43, 'каепокенокенокено'),
(40, 'каепрокенлшк6енлкен'),
(54, 'кекоенокенокеноероке'),
(46, 'келдпалл'),
(47, 'кенлаеплпал'),
(48, 'кенлпарлклкенл'),
(44, 'кеноекнокео'),
(55, 'кеноенко'),
(53, 'кенокенокеновенлокл'),
(42, 'кенокенокенокен'),
(39, 'кенокенопаро'),
(50, 'кенопалкунову'),
(52, 'коеноекнокеокеов'),
(41, 'нкогенгкеновапо'),
(31, 'Отделение доврачебной помощи АДС'),
(57, 'паькело');

-- --------------------------------------------------------

--
-- Структура таблицы `information_systems`
--

CREATE TABLE `information_systems` (
  `ID` int NOT NULL,
  `system_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `information_systems`
--

INSERT INTO `information_systems` (`ID`, `system_name`) VALUES
(6, '1С ЗУП'),
(7, 'СКУД АСУ'),
(8, 'Домен ORG'),
(9, '1С \"Больница\"'),
(10, '1С \"Розничная аптека\"'),
(11, '1С \"Больничная аптека\"'),
(12, '1С \"Бухгалтерский учет\"'),
(13, '1С \"Комбинат питания\"'),
(14, '1С \"Диетпитание\"'),
(15, '1С \"Клиническая лаборатория\"'),
(16, 'Электронная почта'),
(17, 'РИАМС \"Промед\"'),
(18, 'ЭДО ЧУЗ \"МСЧ\"'),
(19, 'Сайт ЧУЗ \"МСЧ\"'),
(20, 'VipNet АП1'),
(21, 'VipNet АП2'),
(22, 'VipNet ФМБА'),
(23, 'СБИС Онлайн'),
(24, 'ЭДО \"Согаз\"'),
(25, 'Сайт \"SuperJob\"'),
(26, 'ЕГИСЗ \"ФРМО\"'),
(27, 'ЕГИСЗ \"ФРМР\"'),
(28, 'ЕГИСЗ \"ЕИБД\"'),
(29, 'Клиент-Банк ГПБ'),
(30, 'Сбербизнес Онлайн'),
(31, 'Центр поддержки корпоративных лицензий'),
(32, '1C &quot;Тестовая&quot;');

-- --------------------------------------------------------

--
-- Структура таблицы `mainData`
--

CREATE TABLE `mainData` (
  `id` int NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `group_from_zup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `res_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `who_give_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `why_give` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `who_close_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `why_close` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `mainData`
--

INSERT INTO `mainData` (`id`, `surname`, `name`, `lastname`, `group_from_zup`, `res_name`, `start_date`, `who_give_id`, `why_give`, `attributes`, `end_date`, `who_close_id`, `why_close`, `note`, `update_date`) VALUES
(1, 'Потапов', 'Евгений', 'Юрьевич', 'АСУ ИБ', 'СКУД АСУ', '2022-01-21 06:05:38', 'Потапов Евгений', 'На правах Администратора', 'логин / пароль', NULL, NULL, NULL, 'Тестовая запись', '2022-01-21 06:29:57'),
(2, 'Ершов', 'Федор', 'Иванович', 'АСУ ИБ', '1С ЗУП', '2022-01-21 06:33:10', 'Ершов Федор', 'При приёме на работу', 'логин ЕршовФИ, пароль 1q2w!Q@W', NULL, NULL, NULL, '', '2022-01-21 06:33:43'),
(3, 'Ершов', 'Федор', 'Иванович', 'АСУ ИБ', 'Домен ORG', '2022-01-21 06:42:40', 'Ершов Федор', 'При приёме на работу', 'Логин fershov, пароль 1q2w!Q@W', NULL, NULL, NULL, '', '2022-01-21 06:42:40'),
(4, 'Ершов', 'fershov', 'Иванович', 'АСУ ИБ', 'Электронная почта', '2022-01-21 06:47:57', 'Ершов Федор', 'При приёме на работу', 'fershov@chuzmsch.ru', NULL, NULL, NULL, '', '2022-01-21 06:47:57'),
(5, 'Ершов', 'Федор', 'Иванович', 'АСУ ИБ', 'ЭДО ЧУЗ ', '2022-01-21 06:49:18', 'Ершов Федор', 'При приёме на работу', 'Авторизация через домен ORG', NULL, NULL, NULL, '', '2022-01-21 06:49:18'),
(6, 'Ершов', 'Федор', 'Иванович', 'АСУ ИБ', 'Центр поддержки корпоративных лицензий', '2022-01-21 06:59:18', 'Ершов Федор', 'При приёме на работу', 'Логин fershov@chuzmsch.ru, пароль CHUZ1q2w!Q@W', NULL, NULL, NULL, '', '2022-01-21 06:59:18'),
(7, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'Домен ORG', '2022-01-21 11:20:09', 'Карамышев Сергей', 'При приёме на работу', 'Логин: dsolyannikova Пароль: 1234Qwe', NULL, NULL, 'тест', '', '2022-01-24 11:00:16'),
(8, 'Солянникова	', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ЗУП', '2022-01-21 11:22:32', 'Карамышев Сергей', 'При приёме на работу', '12345', NULL, NULL, NULL, 'Вход по отображаемому имени', '2022-01-21 11:22:32'),
(9, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-21 11:24:02', 'Карамышев Сергей', 'При приёме на работу', '12345', NULL, NULL, NULL, 'Вход по отображаемому имени', '2022-01-21 11:24:02'),
(10, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-21 11:24:40', 'Карамышев Сергей', 'При приёме на работу', '12345', NULL, NULL, NULL, 'Вход по отображаемому имени', '2022-01-21 11:24:40'),
(11, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'Электронная почта', '2022-01-21 11:25:09', 'Карамышев Сергей', 'При приёме на работу', 'dsolyannikova@chuzmsch.ru', NULL, NULL, NULL, '', '2022-01-21 11:25:09'),
(12, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-21 11:27:26', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-21 11:27:26'),
(13, 'Test', 'Test', 'Test', 'АСУ ИБ', '1С ЗУП', '2022-01-24 04:50:59', 'Потапов Евгений', 'test', 'test', NULL, NULL, NULL, '', '2022-01-24 04:50:59'),
(14, 'Test', 'Test', 'Test', 'АСУ ИБ', '1С ЗУП', '2022-01-24 04:52:45', 'Потапов Евгений', 'test', 'test', NULL, NULL, NULL, '', '2022-01-24 04:52:45'),
(15, 'Test', 'wertwert', 'wtwertw', 'АСУ ИБ', 'Домен ORG', '2022-01-24 05:41:00', 'Ершов Федор', 'herfhrth', 'erthreth', NULL, NULL, NULL, '', '2022-01-24 05:41:00'),
(16, 'Солянникова	', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ЗУП', '2022-01-25 13:01:50', 'Карамышев Сергей', 'При приёме на работу', '12345', NULL, NULL, NULL, 'Вход по отображаемому имени', '2022-01-25 13:01:50'),
(17, '', '', '', '', '', '2022-01-25 13:05:01', '', '', '', NULL, NULL, NULL, '', '2022-01-25 13:05:01'),
(18, '', '', '', '', '', '2022-01-25 13:05:11', '', '', '', NULL, NULL, NULL, '', '2022-01-25 13:05:11'),
(19, '', '', '', '', '', '2022-01-25 13:05:22', '', '', '', NULL, NULL, NULL, '', '2022-01-25 13:05:22'),
(20, '', '', '', '', '', '2022-01-25 13:33:39', '', '', '', NULL, NULL, NULL, '', '2022-01-25 13:33:39'),
(21, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:46:37', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:46:37'),
(22, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:47:06', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:47:06'),
(23, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:48:19', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:48:19'),
(24, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:49:24', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:49:24'),
(25, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:49:26', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:49:26'),
(26, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:49:30', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:49:30'),
(27, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:52:32', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:52:32'),
(28, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:59:42', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:59:42'),
(29, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', 'ЭДО ЧУЗ ', '2022-01-25 13:59:48', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 13:59:48'),
(30, 'Солянникова', 'Дарья', 'Валерьевна', 'АСУ ИБ', 'ЭДО ЧУЗ ', '2022-01-25 14:03:54', 'Карамышев Сергей', 'При приёме на работу', '', NULL, NULL, NULL, '', '2022-01-25 14:06:14'),
(31, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 14:07:13', 'Потапов Евгений', 'При приёме на работу', '', NULL, 'Карамышев Сергей', NULL, '', '2022-01-25 14:07:36'),
(32, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 14:09:38', 'Потапов Евгений', 'При приёме на работу', '', NULL, 'Ершов Федор', 'gwerg', 'ghbvt', '2022-01-25 14:10:08'),
(33, 'Солянникова', 'Дарья', 'Валерьевна', 'ACY &quot;IB&quot;', '1С ', '2022-01-25 14:10:11', 'Потапов Евгений', 'При приёме на работу', '', NULL, 'Карамышев Сергей', 'ergewrg', 'ghbvt', '2022-01-26 12:31:20'),
(34, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 14:10:22', 'Потапов Евгений', 'При приёме на работу', 'wergwerg', '2022-01-27 23:03:00', 'Карамышев Сергей', 'wergfewrgg', 'ghbvt', '2022-01-25 14:10:46'),
(35, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 14:10:49', 'Потапов Евгений', 'При приёме на работу', 'wergwerg', NULL, NULL, NULL, 'ghbvt', '2022-01-25 14:10:49'),
(36, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 14:29:27', 'Потапов Евгений', 'При приёме на работу', 'wergwerg', NULL, NULL, NULL, 'ghbvt', '2022-01-25 14:29:27'),
(37, 'Солянникова', 'Дарья', 'Валерьевна', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-25 15:22:10', 'Потапов Евгений', 'При приёме на работу', '', NULL, NULL, NULL, 'ghbvt', '2022-01-26 12:23:01'),
(38, 'кенгенг', 'кенгкенг', 'кенгкенгкенг', 'АСУ ИБ', '1C &quot;Тестовая&quot;', '2022-01-26 12:10:09', 'Ершов Федор', 'кенг', 'кенг', NULL, NULL, NULL, 'кенг', '2022-01-26 12:29:30'),
(39, 'erhr', 'erthrehre', 'eryhreh', 'Отделение доврачебной помощи АДС', '1C &quot;Тестовая&quot;', '2022-01-26 12:29:03', 'Карамышев Сергей', 'ertherh', '', NULL, NULL, NULL, '', '2022-01-26 12:29:03'),
(40, 'rtyurtyu', 'rtyurtyu', 'rtyurtyu', 'ACY &quot;IB&quot;', '1С ', '2022-01-26 15:15:19', 'Потапов Евгений', 'rtyurtyutrrtyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 'rtyu', NULL, NULL, NULL, '', '2022-01-26 15:15:19'),
(41, 'erhr', 'erthrehre', 'eryhreh', 'Отделение доврачебной помощи АДС', '1C &quot;Тестовая&quot;', '2022-01-28 09:55:16', 'Карамышев Сергей', 'ertherh', '', NULL, NULL, NULL, '', '2022-01-28 10:00:35'),
(42, 'erhr', 'erthrehre', 'eryhreh', 'Отделение доврачебной помощи АДС', '1C &quot;Тестовая&quot;', '2022-01-28 10:00:40', 'Карамышев Сергей', 'ertherh', '', NULL, NULL, NULL, '', '2022-01-28 10:00:56'),
(43, 'erhr', 'erthrehre', 'eryhreh', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-28 10:10:29', 'Ершов Федор', 'ertherh', 'asdrfgaerg', NULL, NULL, NULL, 'aergerg', '2022-01-28 10:55:44'),
(44, 'erhr', 'erthrehre', 'eryhreh', 'Отделение доврачебной помощи АДС', '1С ', '2022-01-28 10:10:37', 'Карамышев Сергей', 'ertherh', '', NULL, NULL, NULL, '', '2022-01-28 10:10:37'),
(45, 'Test', 'Test', 'Test', 'АСУ ИБ', '1С ', '2022-01-28 10:54:10', 'Ершов Федор', 'test', 'test', NULL, NULL, NULL, '', '2022-01-28 10:54:32'),
(46, 'Потапов', 'Лопатин', 'Test', 'ACY &quot;IB&quot;', '1С ЗУП', '2022-01-31 08:59:14', 'Потапов Евгений', 'heryhrth', 'ertherther', NULL, NULL, NULL, 'thertherh', '2022-01-31 08:59:14');

-- --------------------------------------------------------

--
-- Структура таблицы `update_date`
--

CREATE TABLE `update_date` (
  `ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `priv` int DEFAULT NULL,
  `user` varchar(56) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `annot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `priv`, `user`, `password`, `surname`, `name`, `annot`) VALUES
(1, 1, 'epotapov', 'f1560227f5e82507325373e8e6c58ec9', 'Потапов', 'Евгений', ''),
(23, 1, 'Федор', '$2y$10$sazgpYwSuYWCahrSD8c7MeWCh5RXT67SYHBaA0nGzqVzwWSpjKQEK', 'Ершов', 'Федор', ''),
(24, 1, 'Сергей', '$2y$10$S3qjJXrHLtT8OgusdwxkbuFRSzBs05qiBbrR9m.UCbgxbe2W4n47y', 'Карамышев', 'Сергей', ''),
(28, 0, 'etoken', '$2y$10$sJHPoIqWW1tuaWUty/XuneAoBylR1Ih6HE5ZLUa1HJstcA1iK9fIW', 'ertyrety', 'rtfergfe', 'erfe'),
(34, 0, 'user', '0c5805b7bea1d15b318c73ca27fb1b0c', 'user', 'user', 'user123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groupName`
--
ALTER TABLE `groupName`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `group_from_zup_name` (`group_from_zup_name`);

--
-- Индексы таблицы `information_systems`
--
ALTER TABLE `information_systems`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `mainData`
--
ALTER TABLE `mainData`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groupName`
--
ALTER TABLE `groupName`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `information_systems`
--
ALTER TABLE `information_systems`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `mainData`
--
ALTER TABLE `mainData`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
