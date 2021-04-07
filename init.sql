-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 25 2021 г., 19:59
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myprojectphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `subscriber` int(11) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `name`, `surname`, `email`, `phoneNumber`, `subscriber`, `password`) VALUES
(16, 'Арсен', 'Алғожаев', 'arsenalgozaev@gmail.com', '+7 (999) 999-9999', 1, '47e4fcb4fd3555197d38f2bdeec542c186b54166'),
(17, 'qwe', 'qwe', 'qwe@qwe', '+7 (999) 999-9999', 1, '056eafe7cf52220de2df36845b8ed170c67e23e3'),
(18, '123', '123', 'asd@asd', '+7 (999) 999-9999', 1, 'f10e2821bbbea527ea02200352313bc059445190'),
(19, 'zxc', 'zxc', 'zxc@zxc', '+7 (999) 999-9999', 0, 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd'),
(20, 'qaz', 'qaz', 'qaz@qaz', '+7 (999) 999-9999', 0, '7c286a779653e0c1d9cbc2b9c772fbea7033e452'),
(21, 'wsx', 'wsx', 'wsx@wsx', '+7 (999) 999-9999', 0, 'ee997ddf311aa6f67fc2122df98dd29b9fd20e29');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Breakfast'),
(2, 'Salads'),
(3, 'Soups'),
(4, 'Sauces'),
(5, 'Blanks'),
(6, 'Main dishes'),
(7, 'Pastries and Desserts'),
(8, 'Snacks');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `like_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`post_id`, `like_user_id`) VALUES
(67, 16),
(30, 16),
(105, 16),
(106, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `recipe` text NOT NULL,
  `views` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `postNum` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `recipe`, `views`, `likes`, `postNum`, `author_id`, `category_id`, `cover`) VALUES
(20, ' new title 4', 'new description4', 'new recipe4', 2, 0, 1, 16, 1, NULL),
(21, 'new title 5', 'new description5', 'new recipe5', 3, 0, 1, 16, 1, NULL),
(22, 'new title 6', 'new description6', 'new recipe6', 7, 0, 1, 16, 1, NULL),
(23, 'new title 7', 'new description7', 'new recipe7', 84, 0, 1, 16, 1, NULL),
(24, 'new title 8', 'new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  new description8  ', 'new recipe8', 11, 0, 1, 16, 1, NULL),
(25, '    Lorem ipsum ', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, accusamus harum? Quo adipisci ad dolor saepe quasi reprehenderit? Facere atque earum nostrum, consequuntur sapiente quibusdam minus corporis error cumque ullam!\r\n', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, accusamus harum? Quo adipisci ad dolor saepe quasi reprehenderit? Facere atque earum nostrum, consequuntur sapiente quibusdam minus corporis error cumque ullam!\r\n', 9, 13, 1, 18, 1, NULL),
(26, 'dfsdfs', 'fsdfsdfsd', '', 0, 0, 1, 16, 1, NULL),
(29, 'cvcvcv', 'cvcvcv', 'cvcvcvc', 3, 0, 1, 17, 5, NULL),
(30, 'thtgtg', 'thttgth', 'thtgtgth', 5, 1, 1, 17, 3, NULL),
(49, 'hdfghd', 'hdfghd', 'fghdfghdfghdfgh', 0, 0, 1, 17, 1, NULL),
(50, 'kjfhgj', 'fhjstf', 'hgdfghdf', 0, 0, 1, 17, 7, NULL),
(51, 'dsfxcxb', 'vcxvbfgg', 'vbxvbgfxbv', 0, 0, 1, 17, 6, NULL),
(52, 'vbxcvbx', 'cvbfgbxfbz', 'fbvcxbcvb', 0, 0, 1, 17, 8, NULL),
(53, 'bcvbcvb', 'sbfsfbs', 'bsfbfbsfb', 0, 0, 1, 17, 4, NULL),
(54, 'jfghjfgjfgh', 'jhfghjfghj', 'ghjfghjfghj', 0, 0, 1, 17, 6, NULL),
(55, 'hghghg', 'hghghgh', 'ghghghhg', 0, 0, 1, 17, 5, NULL),
(56, 'nsgns', 'fgnsfgns', 'fgnsfgn', 0, 0, 1, 17, 1, NULL),
(57, 'mgdm', 'hmdhmd', 'hmdhmdghm', 0, 0, 1, 17, 1, NULL),
(58, 'GHNGHN', 'GHNGHN', 'GHNGHN', 0, 0, 1, 17, 1, NULL),
(59, 'FGDFGD', 'FGDFGD', 'FGDFGDFG', 0, 0, 1, 17, 2, NULL),
(60, 'ghfgh', 'fghfgh', 'fghfgh', 0, 0, 1, 17, 1, NULL),
(61, 'trtrrt', 'gbfgbfgbfgb', 'wrtwhth', 0, 0, 1, 17, 1, NULL),
(62, 'khkhk', 'hkhkkhk', 'khkhkhkhkhkh', 1, 0, 1, 17, 1, NULL),
(67, 'hg', 'hg', 'hg', 0, 1, 1, 17, 2, NULL),
(68, 'jh', 'jh', 'jh', 3, 0, 1, 17, 1, NULL),
(69, 'po', 'po', 'po', 38, 0, 1, 17, 1, NULL),
(70, 'hghfh', 'hgfhfgh', 'fghfghfg', 11, 0, 1, 16, 4, NULL),
(71, 'yudtyu', 'dtyud', 'uyduyd', 28, 0, 1, 16, 1, NULL),
(72, 'kjkjk', 'jkjkjkk', 'jkjkjkjk', 0, 0, 1, 16, 2, NULL),
(73, 'oiyl', 'yiolyoily', 'iolyiolyol', 0, 0, 1, 16, 1, NULL),
(74, 'лорлор', 'лролрол', 'ролрол', 0, 0, 1, 16, 2, NULL),
(105, 'bvnxt', 'hztzt', '.kjgjmdym', 0, 1, 1, 16, 1, 'image/posts/1616692646.jpg'),
(106, 'irmrhrthrth', 'umrfdg', 'twrnwtbw', 0, 1, 1, 16, 1, 'image/posts/1616693890.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `content`, `post_id`, `date`, `uid`) VALUES
(1, 'review review review review ', 69, '2021-03-22 15:56:02', 16),
(2, 'review review review review ', 69, '2021-03-22 15:56:02', 16),
(11, 'JHDJH', 70, '2021-03-22 17:44:14', 16),
(12, 'new review\r\n', 69, '2021-03-22 17:44:51', 16),
(13, 'review', 61, '2021-03-22 17:45:03', 16),
(14, 'review', 25, '2021-03-24 17:13:29', 16),
(15, 'review\r\n', 105, '2021-03-25 17:26:47', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `sub_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`sub_id`, `us_id`) VALUES
(16, 18),
(17, 17),
(16, 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD KEY `FK_post_like_id` (`post_id`),
  ADD KEY `FK_user_like_id` (`like_user_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_author_id` (`author_id`),
  ADD KEY `FD_category_id` (`category_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_rev_id` (`post_id`),
  ADD KEY `FK_user_rev_id` (`uid`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD KEY `FK_sub_id` (`us_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_post_like_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_like_id` FOREIGN KEY (`like_user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FD_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_author_id` FOREIGN KEY (`author_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_post_rev_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_rev_id` FOREIGN KEY (`uid`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `FK_sub_id` FOREIGN KEY (`us_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribers_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
