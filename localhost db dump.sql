-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 14 2020 г., 20:23
-- Версия сервера: 10.0.38-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `trackpisode_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `Serie_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Comments`
--

INSERT INTO `Comments` (`id`, `User_id`, `Serie_id`, `body`, `created_at`, `updated_at`) VALUES
(5, 1, 17, 'lorem ipsum', '2020-04-24 21:00:50', '2020-04-24 21:00:50'),
(6, 1, 17, 'ghfghf', '2020-04-24 21:24:47', '2020-04-24 21:24:47'),
(7, 1, 17, 'c3', '2020-04-24 21:25:47', '2020-04-24 21:25:47'),
(8, 1, 17, 'comm4', '2020-04-24 21:26:47', '2020-04-24 21:26:47'),
(9, 1, 17, 'lorem ipsum 5', '2020-04-24 21:41:14', '2020-04-24 21:41:14'),
(10, 1, 17, 'lorem ipsup 6', '2020-04-24 21:41:27', '2020-04-24 21:41:27'),
(11, 1, 18, 'lorem 1', '2020-04-24 21:43:52', '2020-04-24 21:43:52'),
(12, 1, 18, 'lorem 2', '2020-04-24 21:44:02', '2020-04-24 21:44:02'),
(13, 1, 17, 'LOREM 7', '2020-04-24 22:46:15', '2020-04-24 22:46:15'),
(14, 1, 28, 'GFGFGF', '2020-04-24 22:48:58', '2020-04-24 22:48:58'),
(15, 1, 28, 'DFGGFDGFD', '2020-04-24 22:49:00', '2020-04-24 22:49:00'),
(16, 1, 28, 'FSDH SDH SDFH', '2020-04-24 22:49:02', '2020-04-24 22:49:02'),
(17, 1, 28, 'HDSHGHFBSGDFH', '2020-04-24 22:49:03', '2020-04-24 22:49:03'),
(18, 1, 28, 'f', '2020-04-24 23:10:19', '2020-04-24 23:10:19'),
(19, 1, 28, 'rggf', '2020-04-24 23:14:30', '2020-04-24 23:14:30'),
(20, 1, 18, 'lorem 3', '2020-04-24 23:16:36', '2020-04-24 23:16:36'),
(21, 1, 18, 'lorem 4', '2020-04-24 23:16:40', '2020-04-24 23:16:40'),
(22, 1, 18, 'lorem 5', '2020-04-24 23:16:44', '2020-04-24 23:16:44'),
(23, 1, 18, 'lorem 6', '2020-04-24 23:16:49', '2020-04-24 23:16:49'),
(24, 1, 17, 'lorem 8 8 8', '2020-04-26 00:46:04', '2020-04-26 00:46:04'),
(25, 52, 17, 'lorem ipsum 1', '2020-04-26 03:01:51', '2020-04-26 03:01:51'),
(26, 52, 16, 'lorem ipsum f hgt h hng nhgvngngngnnvmnmvh nbmbm  vbnmn bmnbmnk,jhmv,jm,, jm cmg mgm gmc mgh cmghukmcg ,gu,m cjgu ,cju,cju,dugh, x yg, x ,mux, duk, m,dguy,guyj,mx gtu,um,gtu', '2020-04-26 03:02:56', '2020-04-26 03:02:56'),
(27, 52, 19, 'good limonad', '2020-04-26 03:03:51', '2020-04-26 03:03:51'),
(28, 1, 37, 'comment 1', '2020-04-26 08:46:15', '2020-04-26 08:46:15'),
(29, 1, 38, 'hhghhg', '2020-04-26 19:02:20', '2020-04-26 19:02:20'),
(30, 53, 17, 'ghhgfgh', '2020-04-27 15:25:56', '2020-04-27 15:25:56'),
(31, 53, 17, 'eew', '2020-06-12 13:51:44', '2020-06-12 13:51:44');

-- --------------------------------------------------------

--
-- Структура таблицы `Episodes`
--

CREATE TABLE IF NOT EXISTS `Episodes` (
  `id` int(10) unsigned NOT NULL,
  `ep_number` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airdate` date NOT NULL,
  `Season_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Episodes`
--

INSERT INTO `Episodes` (`id`, `ep_number`, `title`, `airdate`, `Season_id`) VALUES
(1, 1, 'It''s Summer and We''re Running Out of Ice', '2019-10-20', 1),
(2, 2, 'Martial Feats of Comanche Horsemanship', '2019-10-27', 1),
(3, 3, 'She Was Killed by Space Junk', '2019-11-03', 1),
(4, 4, 'If You Don''t Like My Story, Write Your Own', '2019-11-10', 1),
(5, 5, 'Little Fear of Lightning', '2019-11-17', 1),
(6, 6, 'This Extraordinary Being', '2019-11-24', 1),
(7, 7, 'An Almost Religious Awe', '2019-12-01', 1),
(8, 8, 'A God Walks Into A Bar', '2019-12-08', 1),
(9, 9, 'See How They Fly', '2019-12-15', 1),
(10, 1, 'Pilot', '2013-12-02', 2),
(11, 2, 'Lawnmower Dog', '2013-12-09', 2),
(12, 3, 'Anatomy Park', '2013-12-16', 2),
(13, 4, 'M. Night Shaym-Aliens!', '2014-01-13', 2),
(14, 5, 'Meeseeks and Destroy', '2014-01-20', 2),
(15, 6, 'Rick Potion #9', '2014-01-27', 2),
(16, 7, 'Raising Gazorpazorp', '2014-03-10', 2),
(17, 8, 'Rixty Minutes', '2014-03-17', 2),
(18, 9, 'Something Ricked This Way Comes', '2014-03-24', 2),
(19, 10, 'Close Rick-counters of the Rick Kind', '2014-04-07', 2),
(20, 11, 'Ricksy Business', '2014-04-14', 2),
(21, 1, 'A Rickle In Time', '2015-07-02', 3),
(22, 2, 'Mortynight Run', '2015-07-02', 3),
(23, 3, 'Auto Erotic Assimilation', '2015-08-09', 3),
(24, 4, 'Total Rickall', '2015-08-16', 3),
(25, 1, 'Pilot', '2013-01-11', 4),
(26, 2, 'The Rave', '2013-01-18', 4),
(27, 3, 'Meet the New Boss', '2013-01-25', 4),
(28, 4, 'Half Deaf Is Better Than All Dead', '2013-02-01', 4),
(29, 5, 'The Kindred', '2013-02-08', 4),
(30, 6, 'Wicks', '2013-02-15', 4),
(31, 7, 'Behold a Pale Rider', '2013-02-22', 4),
(32, 8, 'We Shall Live Forever', '2013-03-01', 4),
(33, 9, 'Always a Cowboy', '2013-03-08', 4),
(34, 10, 'A Mixture of Madnes', '2013-03-15', 4),
(35, 1, 'Little Fish', '2014-01-10', 5),
(36, 2, 'The Thunder Man', '2014-01-17', 5),
(37, 3, 'The Warrior Class', '2014-01-24', 5),
(38, 4, 'Bloodlines', '2014-01-31', 5),
(39, 5, 'The Truth About Unicorns', '2014-02-07', 5),
(40, 6, 'Armies of One', '2014-02-14', 5),
(41, 7, 'Ways to Bury a Man', '2014-02-21', 5),
(42, 8, 'Evil for Evil', '2014-02-28', 5),
(43, 1, 'test episode', '2008-01-01', 6),
(44, 2, 'test episode', '2008-01-02', 6),
(45, 3, 'test episode', '2008-01-03', 6),
(46, 4, 'test episode', '2008-01-04', 6),
(47, 5, 'test episode', '2008-01-05', 6),
(48, 1, 'test episode', '2008-02-06', 7),
(49, 2, 'test episode', '2008-02-07', 7),
(50, 3, 'test episode', '2008-02-08', 7),
(51, 4, 'test episode', '2008-02-09', 7),
(52, 5, 'test episode', '2008-02-10', 7),
(53, 1, 'test episode', '2008-03-11', 8),
(54, 2, 'test episode', '2008-03-12', 8),
(55, 3, 'test episode', '2008-03-13', 8),
(56, 4, 'test episode', '2008-03-14', 8),
(57, 5, 'test episode', '2008-03-15', 8),
(58, 1, 'test 1504 e1', '2020-01-01', 9),
(59, 1, 'test 1', '2015-09-08', 10),
(60, 1, 'test title', '2020-04-17', 11),
(61, 1, 'test episode', '2020-04-18', 12),
(62, 1, 'test episode', '2020-04-19', 13),
(63, 1, 'test episode', '2020-04-20', 14),
(64, 1, 'test episode', '2020-04-21', 15),
(65, 1, 'test episode', '2020-04-22', 16),
(66, 1, 'test episode', '2020-04-23', 17),
(67, 1, 'test episode', '2020-04-24', 18),
(68, 1, 'test episode', '2020-04-25', 19),
(69, 2, 'test episode 2', '2020-04-26', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `Genres`
--

CREATE TABLE IF NOT EXISTS `Genres` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Genres`
--

INSERT INTO `Genres` (`id`, `name`) VALUES
(2, 'Action'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Fantasy'),
(6, 'History'),
(7, 'Horror'),
(8, 'Mystery'),
(9, 'Thriller'),
(10, 'Criminal'),
(11, 'Adventure');

-- --------------------------------------------------------

--
-- Структура таблицы `Ratings`
--

CREATE TABLE IF NOT EXISTS `Ratings` (
  `id` int(10) unsigned NOT NULL,
  `Serie_id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `vote` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Ratings`
--

INSERT INTO `Ratings` (`id`, `Serie_id`, `User_id`, `vote`) VALUES
(1, 16, 1, 8),
(2, 17, 1, 9),
(3, 18, 20, 6),
(4, 19, 20, 5),
(5, 20, 20, 10),
(6, 20, 20, 10),
(7, 21, 20, 5),
(8, 24, 20, 3),
(9, 22, 20, 9),
(10, 16, 20, 9),
(11, 17, 20, 10),
(12, 20, 21, 10),
(13, 17, 21, 9),
(14, 22, 21, 8),
(15, 16, 21, 9),
(16, 18, 21, 7),
(17, 19, 21, 10),
(18, 20, 1, 9),
(19, 25, 1, 2),
(20, 19, 1, 9),
(21, 28, 1, 5),
(22, 17, 52, 10),
(23, 16, 52, 8),
(24, 19, 52, 10),
(25, 19, 52, 10),
(26, 37, 1, 10),
(27, 32, 1, 9),
(28, 35, 1, 8),
(29, 48, 1, 6),
(30, 47, 1, 7),
(31, 31, 1, 6),
(32, 39, 1, 4),
(33, 36, 1, 7),
(34, 50, 1, 6),
(35, 51, 1, 9),
(36, 49, 1, 7),
(37, 52, 1, 8),
(38, 45, 1, 7),
(39, 44, 1, 6),
(40, 44, 1, 7),
(41, 43, 1, 8),
(42, 42, 1, 8),
(43, 38, 1, 10),
(44, 37, 7, 10),
(45, 46, 7, 6),
(46, 48, 7, 6),
(47, 47, 7, 8),
(48, 35, 7, 3),
(49, 35, 7, 10),
(50, 35, 7, 8),
(51, 35, 7, 8),
(52, 35, 7, 9),
(53, 35, 7, 9),
(54, 32, 7, 5),
(55, 31, 7, 7),
(56, 39, 7, 5),
(57, 36, 7, 7),
(58, 51, 7, 6),
(59, 53, 7, 6),
(60, 49, 7, 8),
(61, 52, 7, 6),
(62, 45, 7, 7),
(63, 43, 7, 8),
(64, 44, 7, 6),
(65, 42, 7, 7),
(66, 37, 8, 10),
(67, 46, 8, 8),
(68, 48, 8, 6),
(69, 47, 8, 8),
(70, 35, 8, 7),
(71, 32, 8, 6),
(72, 31, 8, 7),
(73, 36, 8, 7),
(74, 36, 8, 9),
(75, 36, 8, 10),
(76, 36, 8, 5),
(77, 39, 8, 5),
(78, 50, 8, 3),
(79, 37, 9, 10),
(80, 46, 9, 7),
(81, 48, 9, 5),
(82, 47, 9, 5),
(83, 47, 9, 6),
(84, 35, 9, 5),
(85, 31, 9, 6),
(86, 36, 9, 5),
(87, 39, 9, 6),
(88, 30, 9, 6),
(89, 37, 10, 10),
(90, 46, 10, 7),
(91, 48, 10, 8),
(92, 47, 10, 5),
(93, 35, 10, 6),
(94, 32, 10, 8),
(95, 39, 10, 7),
(96, 30, 10, 4),
(97, 49, 10, 6),
(98, 38, 10, 7),
(99, 38, 10, 8),
(100, 38, 10, 9),
(101, 20, 10, 7),
(102, 20, 10, 7),
(103, 24, 10, 5),
(104, 21, 10, 8),
(105, 18, 10, 8),
(106, 53, 10, 7),
(107, 53, 10, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `Seasons`
--

CREATE TABLE IF NOT EXISTS `Seasons` (
  `id` int(10) unsigned NOT NULL,
  `seasonNumber` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Serie_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Seasons`
--

INSERT INTO `Seasons` (`id`, `seasonNumber`, `Serie_id`) VALUES
(1, '1', 16),
(2, '1', 17),
(3, '2', 17),
(4, '1', 18),
(5, '2', 18),
(6, '1', 19),
(7, '2', 19),
(8, '3', 19),
(9, '1', 27),
(10, '1', 28),
(11, '1', 36),
(12, '1', 39),
(13, '1', 31),
(14, '1', 32),
(15, '1', 37),
(16, '1', 35),
(17, '1', 47),
(18, '1', 48),
(19, '1', 46);

-- --------------------------------------------------------

--
-- Структура таблицы `Series`
--

CREATE TABLE IF NOT EXISTS `Series` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci,
  `releaseYear` year(4) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posterPath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Series`
--

INSERT INTO `Series` (`id`, `title`, `summary`, `releaseYear`, `status`, `posterPath`, `created_at`, `updated_at`) VALUES
(1, 'test host1', 'dssdds', 1999, 'Ended', '/public/storage/posters/default-image.jpg', '2020-04-19 20:04:47', '2020-04-19 20:04:47'),
(16, 'Watchmen', 'Watchmen takes place 34 years after the events of the comic series. Set in the comic''s alternate history of the 20th century, vigilantes, once seen as heroes, have been outlawed due to their violent methods. In 1985, Adrian Veidt, formerly known as the vigilante Ozymandias, created a fake attack on New York City by a squid-like alien that resulted in millions within New York being killed, coercing nations to work together against a common threat and to avert a nuclear holocaust. Veidt''s actions disgusted his former companions, with Rorschach planning to tell the world of Veidt''s misdeeds before he is vaporized by Doctor Manhattan, who subsequently left the planet, unaware Rorschach had sent his journal to be published beforehand. The show takes place in 2019 Tulsa, Oklahoma. A white supremacist group, the Seventh Kavalry, inspired by Rorschach''s writings and masked image, wage violent war against minorities and the police that enforce special reparations for victims of racial injustice. On Christmas Eve 2016, during an event that came to be known as the "White Night", the Kavalry attacked the homes of 40 police officers working for the Tulsa Police Department. Of those who survived, only two stayed with the force: Detective Angela Abar and Police Chief Judd Crawford. As the police force was rebuilt, laws were passed that required police to not disclose their profession and to protect their identities while on the job by wearing masks, which includes allowing for costumed police officers.', 2019, 'Ended', '/public/storage/posters/watchmen-2.jpg', '2020-04-12 14:27:46', '2020-04-12 14:27:46'),
(17, 'Rick and Morty', 'Rick and Morty is an American adult animated science fiction sitcom created by Justin Roiland and Dan Harmon for Cartoon Network''s late-night programming block Adult Swim. The series follows the misadventures of cynical mad scientist Rick Sanchez and his good-hearted but fretful grandson Morty Smith, who split their time between domestic life and interdimensional adventures. Roiland voices the eponymous characters, with Chris Parnell, Spencer Grammer and Sarah Chalke voicing the rest of the family. The series originated from an animated short parody film of Back to the Future, created by Roiland for Channel 101, a short film festival co-founded by Harmon. The series has been acclaimed by critics for its originality, creativity and humor. The series has been picked up for an additional seventy episodes over an unspecified number of seasons, beginning with season 4. The fourth season premiered on November 10, 2019 consists of ten episodes.', 2013, 'Running', '/public/storage/posters/thumb5.jpg', '2020-04-12 14:30:15', '2020-04-12 14:30:15'),
(18, 'Banshee', 'A man is released from prison after serving 15 years for stealing $15 million in diamonds on behalf of his employer, a Ukrainian mob boss named Rabbit. He and his former lover and accomplice, Rabbit''s daughter Anastasia (Ana), had already decided to keep the loot for themselves. Anastasia got away with the diamonds and Rabbit is after the man, thinking he will lead him to his daughter and the diamonds. The man flees to the small fictional Pennsylvanian town of Banshee, where Ana has been living under the alias of Carrie Hopewell, mother of two and wife of the DA. Lucas Hood, the new sheriff, arrives in a bar at the entrance to the town and is immediately killed when he intervenes in a dispute between local criminals and the bar owner. The man takes Hood''s identity and has to impersonate the sheriff and deal with ex-Amish crime lord Kai Proctor, sort things out with "Carrie" and get his share of the diamonds while evading Rabbit.', 2013, 'Ended', '/public/storage/posters/thumb4.jpg', '2020-04-12 15:25:40', '2020-04-12 15:25:40'),
(19, 'Sons of anarchy', 'Sed rhoncus augue sed mauris pulvinar, eget tristique justo auctor. Quisque dignissim scelerisque felis at posuere. Nulla consequat metus eu dui volutpat maximus. Nam ornare cursus orci, at finibus metus pellentesque in. Nullam nibh mi, interdum eget nibh sed, consectetur efficitur turpis. Sed interdum risus vitae felis cursus fermentum. Curabitur varius condimentum nisl ac imperdiet. Nam aliquam turpis cursus volutpat sollicitudin. Nulla feugiat arcu odio, nec varius risus bibendum eu. In consequat, urna feugiat tincidunt placerat, tellus sapien laoreet ante, vestibulum dapibus enim sem at massa. Cras eget massa mattis, tempor risus vitae, viverra dui. Suspendisse potenti. Phasellus felis enim, viverra sit amet vehicula vel, pellentesque nec nulla. Fusce id fermentum eros, vel scelerisque diam.\r\n\r\nMorbi tristique purus finibus libero volutpat, id porta purus posuere. Donec hendrerit leo eu vulputate sagittis. Integer augue turpis, venenatis ut mattis at, tempus ac arcu. Nulla placerat auctor vestibulum. Nullam eget laoreet urna. Mauris eget dolor tincidunt, elementum augue vel, pretium velit. Maecenas a lorem elit. Duis a lacus a augue sollicitudin lobortis molestie nec ligula. Aliquam eget nisi eget enim maximus bibendum. Curabitur vitae cursus risus.\r\n\r\nNunc malesuada turpis metus. Proin ut gravida turpis. Nunc a ornare libero. Vivamus quis tempor odio, quis accumsan mi. Curabitur maximus ante at risus lacinia, in consectetur elit tincidunt. Nulla tincidunt, metus id scelerisque aliquet, nibh ante interdum lorem, et varius mauris turpis id eros. Nam euismod feugiat viverra. Donec a ex nulla. Morbi ut justo mattis, condimentum ante vel, facilisis nulla. Aenean bibendum mi at nisl semper, vel molestie leo cursus. Maecenas eu arcu vulputate, molestie nunc sit amet, aliquet nisl. Donec interdum dolor ac ligula cursus porta. Curabitur arcu magna, efficitur sed diam at, bibendum aliquet eros. Fusce ultricies nisl eu dolor lacinia, a vehicula mi posuere.', 2008, 'Ended', '/public/storage/posters/sonsofanarchy.jpg', '2020-04-12 15:37:19', '2020-04-12 15:37:19'),
(20, 'Marco Polo', 'Sed rhoncus augue sed mauris pulvinar, eget tristique justo auctor. Quisque dignissim scelerisque felis at posuere. Nulla consequat metus eu dui volutpat maximus. Nam ornare cursus orci, at finibus metus pellentesque in. Nullam nibh mi, interdum eget nibh sed, consectetur efficitur turpis. Sed interdum risus vitae felis cursus fermentum. Curabitur varius condimentum nisl ac imperdiet. Nam aliquam turpis cursus volutpat sollicitudin. Nulla feugiat arcu odio, nec varius risus bibendum eu. In consequat, urna feugiat tincidunt placerat, tellus sapien laoreet ante, vestibulum dapibus enim sem at massa. Cras eget massa mattis, tempor risus vitae, viverra dui. Suspendisse potenti. Phasellus felis enim, viverra sit amet vehicula vel, pellentesque nec nulla. Fusce id fermentum eros, vel scelerisque diam.\r\n\r\nMorbi tristique purus finibus libero volutpat, id porta purus posuere. Donec hendrerit leo eu vulputate sagittis. Integer augue turpis, venenatis ut mattis at, tempus ac arcu. Nulla placerat auctor vestibulum. Nullam eget laoreet urna. Mauris eget dolor tincidunt, elementum augue vel, pretium velit. Maecenas a lorem elit. Duis a lacus a augue sollicitudin lobortis molestie nec ligula. Aliquam eget nisi eget enim maximus bibendum. Curabitur vitae cursus risus.\r\n\r\nNunc malesuada turpis metus. Proin ut gravida turpis. Nunc a ornare libero. Vivamus quis tempor odio, quis accumsan mi. Curabitur maximus ante at risus lacinia, in consectetur elit tincidunt. Nulla tincidunt, metus id scelerisque aliquet, nibh ante interdum lorem, et varius mauris turpis id eros. Nam euismod feugiat viverra. Donec a ex nulla. Morbi ut justo mattis, condimentum ante vel, facilisis nulla. Aenean bibendum mi at nisl semper, vel molestie leo cursus. Maecenas eu arcu vulputate, molestie nunc sit amet, aliquet nisl. Donec interdum dolor ac ligula cursus porta. Curabitur arcu magna, efficitur sed diam at, bibendum aliquet eros. Fusce ultricies nisl eu dolor lacinia, a vehicula mi posuere.', 2014, 'Ended', '/public/storage/posters/Marco-Polo.jpg', '2020-04-12 15:46:45', '2020-04-12 15:46:45'),
(21, 'Hannibal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dapibus turpis nec quam interdum tristique. Morbi commodo elementum metus, eu consequat ante pharetra at. Proin urna libero, dictum non pellentesque et, viverra vitae massa. Donec eros massa, aliquam id varius eu, tincidunt ut dolor. Nullam consectetur tempus augue, quis venenatis lorem viverra a. Vestibulum bibendum at sapien vel vulputate. Phasellus sed nunc eget metus tincidunt vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nNam consequat odio mi, ac porttitor urna euismod sed. Curabitur tristique mi vulputate eros euismod, ac rhoncus massa tempus. Maecenas lobortis rutrum nisl ullamcorper laoreet. Vestibulum in ipsum lobortis, pellentesque risus a, dapibus urna. Suspendisse rhoncus nunc odio, ut tincidunt dui volutpat non. Proin hendrerit fringilla lacus at ultrices. Cras nulla augue, tempor eget justo a, placerat auctor turpis. Donec volutpat tortor id erat sollicitudin, sit amet cursus felis molestie. Duis hendrerit odio sit amet nisi ornare faucibus.\r\n\r\nPellentesque fringilla enim a augue feugiat, sed lacinia mauris aliquet. Morbi at erat convallis libero faucibus luctus nec a lectus. Maecenas eu urna eget sem efficitur mattis. Etiam auctor ullamcorper sagittis. Nulla malesuada porttitor blandit. Maecenas varius est in enim blandit, quis fermentum nisi dignissim. Morbi molestie dui vestibulum enim scelerisque, sit amet rhoncus dui condimentum. Sed luctus mauris metus, et sollicitudin felis sodales et. Nunc eu odio cursus, malesuada nulla quis, ornare augue. Phasellus ac varius lorem. Aenean a tempor mauris, in scelerisque lacus. Suspendisse eu dui porta, luctus augue nec, semper quam. Integer id tortor justo.', 2013, 'Ended', '/public/storage/posters/thumb6.jpg', '2020-04-12 15:49:11', '2020-04-12 15:49:11'),
(22, 'Grimm', 'Sed rhoncus augue sed mauris pulvinar, eget tristique justo auctor. Quisque dignissim scelerisque felis at posuere. Nulla consequat metus eu dui volutpat maximus. Nam ornare cursus orci, at finibus metus pellentesque in. Nullam nibh mi, interdum eget nibh sed, consectetur efficitur turpis. Sed interdum risus vitae felis cursus fermentum. Curabitur varius condimentum nisl ac imperdiet. Nam aliquam turpis cursus volutpat sollicitudin. Nulla feugiat arcu odio, nec varius risus bibendum eu. In consequat, urna feugiat tincidunt placerat, tellus sapien laoreet ante, vestibulum dapibus enim sem at massa. Cras eget massa mattis, tempor risus vitae, viverra dui. Suspendisse potenti. Phasellus felis enim, viverra sit amet vehicula vel, pellentesque nec nulla. Fusce id fermentum eros, vel scelerisque diam.\r\n\r\nMorbi tristique purus finibus libero volutpat, id porta purus posuere. Donec hendrerit leo eu vulputate sagittis. Integer augue turpis, venenatis ut mattis at, tempus ac arcu. Nulla placerat auctor vestibulum. Nullam eget laoreet urna. Mauris eget dolor tincidunt, elementum augue vel, pretium velit. Maecenas a lorem elit. Duis a lacus a augue sollicitudin lobortis molestie nec ligula. Aliquam eget nisi eget enim maximus bibendum. Curabitur vitae cursus risus.\r\n\r\nNunc malesuada turpis metus. Proin ut gravida turpis. Nunc a ornare libero. Vivamus quis tempor odio, quis accumsan mi. Curabitur maximus ante at risus lacinia, in consectetur elit tincidunt. Nulla tincidunt, metus id scelerisque aliquet, nibh ante interdum lorem, et varius mauris turpis id eros. Nam euismod feugiat viverra. Donec a ex nulla. Morbi ut justo mattis, condimentum ante vel, facilisis nulla. Aenean bibendum mi at nisl semper, vel molestie leo cursus. Maecenas eu arcu vulputate, molestie nunc sit amet, aliquet nisl. Donec interdum dolor ac ligula cursus porta. Curabitur arcu magna, efficitur sed diam at, bibendum aliquet eros. Fusce ultricies nisl eu dolor lacinia, a vehicula mi posuere.', 2011, 'Ended', '/public/storage/posters/thumb7.jpg', '2020-04-12 15:50:32', '2020-04-12 15:50:32'),
(23, 'Da Vinci''s Demons', 'Sed rhoncus augue sed mauris pulvinar, eget tristique justo auctor. Quisque dignissim scelerisque felis at posuere. Nulla consequat metus eu dui volutpat maximus. Nam ornare cursus orci, at finibus metus pellentesque in. Nullam nibh mi, interdum eget nibh sed, consectetur efficitur turpis. Sed interdum risus vitae felis cursus fermentum. Curabitur varius condimentum nisl ac imperdiet. Nam aliquam turpis cursus volutpat sollicitudin. Nulla feugiat arcu odio, nec varius risus bibendum eu. In consequat, urna feugiat tincidunt placerat, tellus sapien laoreet ante, vestibulum dapibus enim sem at massa. Cras eget massa mattis, tempor risus vitae, viverra dui. Suspendisse potenti. Phasellus felis enim, viverra sit amet vehicula vel, pellentesque nec nulla. Fusce id fermentum eros, vel scelerisque diam.\r\n\r\nMorbi tristique purus finibus libero volutpat, id porta purus posuere. Donec hendrerit leo eu vulputate sagittis. Integer augue turpis, venenatis ut mattis at, tempus ac arcu. Nulla placerat auctor vestibulum. Nullam eget laoreet urna. Mauris eget dolor tincidunt, elementum augue vel, pretium velit. Maecenas a lorem elit. Duis a lacus a augue sollicitudin lobortis molestie nec ligula. Aliquam eget nisi eget enim maximus bibendum. Curabitur vitae cursus risus.\r\n\r\nNunc malesuada turpis metus. Proin ut gravida turpis. Nunc a ornare libero. Vivamus quis tempor odio, quis accumsan mi. Curabitur maximus ante at risus lacinia, in consectetur elit tincidunt. Nulla tincidunt, metus id scelerisque aliquet, nibh ante interdum lorem, et varius mauris turpis id eros. Nam euismod feugiat viverra. Donec a ex nulla. Morbi ut justo mattis, condimentum ante vel, facilisis nulla. Aenean bibendum mi at nisl semper, vel molestie leo cursus. Maecenas eu arcu vulputate, molestie nunc sit amet, aliquet nisl. Donec interdum dolor ac ligula cursus porta. Curabitur arcu magna, efficitur sed diam at, bibendum aliquet eros. Fusce ultricies nisl eu dolor lacinia, a vehicula mi posuere.', 2013, 'Ended', '/public/storage/posters/thumb8.jpg', '2020-04-12 15:51:54', '2020-04-12 15:51:54'),
(24, 'Ray Donovan', 'Sed rhoncus augue sed mauris pulvinar, eget tristique justo auctor. Quisque dignissim scelerisque felis at posuere. Nulla consequat metus eu dui volutpat maximus. Nam ornare cursus orci, at finibus metus pellentesque in. Nullam nibh mi, interdum eget nibh sed, consectetur efficitur turpis. Sed interdum risus vitae felis cursus fermentum. Curabitur varius condimentum nisl ac imperdiet. Nam aliquam turpis cursus volutpat sollicitudin. Nulla feugiat arcu odio, nec varius risus bibendum eu. In consequat, urna feugiat tincidunt placerat, tellus sapien laoreet ante, vestibulum dapibus enim sem at massa. Cras eget massa mattis, tempor risus vitae, viverra dui. Suspendisse potenti. Phasellus felis enim, viverra sit amet vehicula vel, pellentesque nec nulla. Fusce id fermentum eros, vel scelerisque diam.\r\n\r\nMorbi tristique purus finibus libero volutpat, id porta purus posuere. Donec hendrerit leo eu vulputate sagittis. Integer augue turpis, venenatis ut mattis at, tempus ac arcu. Nulla placerat auctor vestibulum. Nullam eget laoreet urna. Mauris eget dolor tincidunt, elementum augue vel, pretium velit. Maecenas a lorem elit. Duis a lacus a augue sollicitudin lobortis molestie nec ligula. Aliquam eget nisi eget enim maximus bibendum. Curabitur vitae cursus risus.\r\n\r\nNunc malesuada turpis metus. Proin ut gravida turpis. Nunc a ornare libero. Vivamus quis tempor odio, quis accumsan mi. Curabitur maximus ante at risus lacinia, in consectetur elit tincidunt. Nulla tincidunt, metus id scelerisque aliquet, nibh ante interdum lorem, et varius mauris turpis id eros. Nam euismod feugiat viverra. Donec a ex nulla. Morbi ut justo mattis, condimentum ante vel, facilisis nulla. Aenean bibendum mi at nisl semper, vel molestie leo cursus. Maecenas eu arcu vulputate, molestie nunc sit amet, aliquet nisl. Donec interdum dolor ac ligula cursus porta. Curabitur arcu magna, efficitur sed diam at, bibendum aliquet eros. Fusce ultricies nisl eu dolor lacinia, a vehicula mi posuere.', 2013, 'Ended', '/public/storage/posters/thumb9.jpeg', '2020-04-12 15:56:26', '2020-04-12 15:56:26'),
(25, 'test show1', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', 2015, 'Ended', '/public/storage/posters/default-image.jpg', '2020-04-12 21:00:21', '2020-04-12 21:00:21'),
(26, 'test show2', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', 2016, 'Running', '/public/storage/posters/default-image.jpg', '2020-04-12 21:14:21', '2020-04-12 21:14:21'),
(27, 'test title 1504', 'lorem ipsum ...', 2020, 'Ended', '/public/storage/posters/default-image.jpg', '2020-04-15 14:07:33', '2020-04-15 14:07:33'),
(28, 'ABCCC', 'SDSDDS', 2000, 'Running', '/public/storage/posters/default-image.jpg', '2020-04-24 22:46:45', '2020-04-24 22:46:45'),
(29, 'The Walking Dead', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2010, 'Ended', '/public/storage/posters/The-Walking-Dead-Season-5-Key-Art-1280x965.jpg', '2020-04-26 07:16:45', '2020-04-26 07:16:45'),
(30, 'True Detective', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2014, 'Running', '/public/storage/posters/there-may-be-no-true-detective-season-3-as-creator-focuses-o_qhg7.jpg', '2020-04-26 07:23:15', '2020-04-26 07:23:15'),
(31, 'Mr. Robot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2015, 'Ended', '/public/storage/posters/mr-roobot.jpg', '2020-04-26 07:25:33', '2020-04-26 07:25:33'),
(32, 'Californication', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2007, 'Ended', '/public/storage/posters/Californication.jpg', '2020-04-26 07:28:39', '2020-04-26 07:28:39'),
(33, 'The 100', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2014, 'Running', '/public/storage/posters/the-100.jpg', '2020-04-26 07:32:43', '2020-04-26 07:32:43'),
(34, 'Fear the Walking Dead', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2015, 'Running', '/public/storage/posters/Fear the Walking Dead.jpg', '2020-04-26 07:34:52', '2020-04-26 07:34:52'),
(35, 'The Witcher', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2019, 'Running', '/public/storage/posters/the-witcher-netflix-estreno-e1576832290806.jpg', '2020-04-26 07:37:23', '2020-04-26 07:37:23'),
(36, '12 Monkeys', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2015, 'Ended', '/public/storage/posters/MV5BOTM0ZGI5NWEtMzkwZS00MjE5LTgxOTEtMTAzYjUwZWViYWQzXkEyXkFqcGdeQXVyNTAzNzUzODk@._V1_.jpg', '2020-04-26 07:39:58', '2020-04-26 07:39:58'),
(37, 'Breaking Bad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2008, 'Ended', '/public/storage/posters/breaking-bad.jpg', '2020-04-26 07:43:56', '2020-04-26 07:43:56'),
(38, 'Dexter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2006, 'Ended', '/public/storage/posters/Dexter.jpeg', '2020-04-26 07:48:12', '2020-04-26 07:48:12'),
(39, 'I Am the Night', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2019, 'Ended', '/public/storage/posters/I Am the Night.jpg', '2020-04-26 07:51:12', '2020-04-26 07:51:12'),
(40, 'Colony', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2015, 'Ended', '/public/storage/posters/Colony-TV-Series-Widescreen.jpg', '2020-04-26 07:53:33', '2020-04-26 07:53:33'),
(41, 'Bates Motel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2013, 'Ended', '/public/storage/posters/bates motel.jpg', '2020-04-26 07:57:47', '2020-04-26 07:57:47'),
(42, 'Limitless', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2015, 'Ended', '/public/storage/posters/limitless.jpg', '2020-04-26 08:02:28', '2020-04-26 08:02:28'),
(43, 'Prison Break', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2005, 'Ended', '/public/storage/posters/prison-break-revival.jpg', '2020-04-26 08:05:13', '2020-04-26 08:05:13'),
(44, 'The Following', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2013, 'Ended', '/public/storage/posters/ccde50760069f0db98298cf8b8088e82-700.jpg', '2020-04-26 08:07:14', '2020-04-26 08:07:14'),
(45, 'The X-Files', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 1993, 'Ended', '/public/storage/posters/x-files-revival-destacada.jpg', '2020-04-26 08:10:55', '2020-04-26 08:10:55'),
(46, 'The Strain', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2014, 'Ended', '/public/storage/posters/The Strain.jpg', '2020-04-26 08:13:46', '2020-04-26 08:13:46');
INSERT INTO `Series` (`id`, `title`, `summary`, `releaseYear`, `status`, `posterPath`, `created_at`, `updated_at`) VALUES
(47, 'Lethal Weapon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2016, 'Ended', '/public/storage/posters/Lethal-Weapon.jpg', '2020-04-26 08:16:11', '2020-04-26 08:16:11'),
(48, 'The Shannara Chronicles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2016, 'Ended', '/public/storage/posters/the-shannara-chronicles-1.jpg', '2020-04-26 08:20:21', '2020-04-26 08:20:21'),
(49, 'StartUp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2016, 'Ended', '/public/storage/posters/startup.jpg', '2020-04-26 08:22:41', '2020-04-26 08:22:41'),
(50, 'The Killing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2016, 'Ended', '/public/storage/posters/thekillingfeat.jpg', '2020-04-26 08:24:45', '2020-04-26 08:24:45'),
(51, 'Lost', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2004, 'Ended', '/public/storage/posters/lost-poster-lost-season-6-new-promo-pic-lost-7959076-1280-1024.jpg', '2020-04-26 08:26:29', '2020-04-26 08:26:29'),
(52, 'The Bridge', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2013, 'Ended', '/public/storage/posters/740full-the-bridge-poster.jpg', '2020-04-26 08:29:23', '2020-04-26 08:29:23'),
(53, 'Continuum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor urna nunc id cursus metus aliquam eleifend mi in. Tellus in hac habitasse platea. Aliquam nulla facilisi cras fermentum. Dui sapien eget mi proin sed libero enim sed. A arcu cursus vitae congue mauris rhoncus aenean vel. Malesuada proin libero nunc consequat interdum varius sit amet. Est placerat in egestas erat imperdiet sed. Mollis nunc sed id semper risus in. Sociis natoque penatibus et magnis dis parturient. Nibh praesent tristique magna sit amet. Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan. Maecenas volutpat blandit aliquam etiam erat. Rhoncus urna neque viverra justo nec ultrices. Tristique senectus et netus et malesuada fames ac turpis egestas. Non consectetur a erat nam at. Arcu risus quis varius quam. Semper auctor neque vitae tempus. Odio tempor orci dapibus ultrices in iaculis nunc sed augue.\r\n\r\nPraesent tristique magna sit amet purus gravida quis blandit turpis. Consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet mattis vulputate enim. Vestibulum sed arcu non odio. Aenean sed adipiscing diam donec adipiscing tristique risus. Orci a scelerisque purus semper eget duis. Eget magna fermentum iaculis eu. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ipsum dolor sit amet consectetur adipiscing elit duis tristique. Sagittis orci a scelerisque purus semper eget. Donec massa sapien faucibus et molestie ac feugiat. Aliquam vestibulum morbi blandit cursus risus at.', 2012, 'Ended', '/public/storage/posters/continuum01.jpg', '2020-04-26 08:31:51', '2020-04-26 08:31:51');

-- --------------------------------------------------------

--
-- Структура таблицы `SeriesGenres`
--

CREATE TABLE IF NOT EXISTS `SeriesGenres` (
  `id` int(10) unsigned NOT NULL,
  `Serie_id` int(10) unsigned NOT NULL,
  `Genre_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `SeriesGenres`
--

INSERT INTO `SeriesGenres` (`id`, `Serie_id`, `Genre_id`, `created_at`, `updated_at`) VALUES
(1, 0, 2, '2020-04-19 20:04:47', '2020-04-19 20:04:47'),
(17, 16, 4, '2020-04-12 14:27:46', '2020-04-12 14:27:46'),
(18, 17, 11, '2020-04-12 14:30:16', '2020-04-12 14:30:16'),
(19, 17, 3, '2020-04-12 14:30:16', '2020-04-12 14:30:16'),
(20, 18, 10, '2020-04-12 15:25:43', '2020-04-12 15:25:43'),
(21, 18, 4, '2020-04-12 15:25:44', '2020-04-12 15:25:44'),
(22, 19, 10, '2020-04-12 15:37:20', '2020-04-12 15:37:20'),
(23, 19, 4, '2020-04-12 15:37:20', '2020-04-12 15:37:20'),
(24, 20, 11, '2020-04-12 15:46:45', '2020-04-12 15:46:45'),
(25, 20, 4, '2020-04-12 15:46:45', '2020-04-12 15:46:45'),
(26, 21, 4, '2020-04-12 15:49:12', '2020-04-12 15:49:12'),
(27, 21, 9, '2020-04-12 15:49:12', '2020-04-12 15:49:12'),
(28, 22, 4, '2020-04-12 15:50:33', '2020-04-12 15:50:33'),
(29, 22, 5, '2020-04-12 15:50:33', '2020-04-12 15:50:33'),
(30, 22, 7, '2020-04-12 15:50:33', '2020-04-12 15:50:33'),
(31, 23, 11, '2020-04-12 15:51:54', '2020-04-12 15:51:54'),
(32, 23, 4, '2020-04-12 15:51:55', '2020-04-12 15:51:55'),
(33, 24, 10, '2020-04-12 15:56:30', '2020-04-12 15:56:30'),
(34, 24, 4, '2020-04-12 15:56:30', '2020-04-12 15:56:30'),
(35, 24, 9, '2020-04-12 15:56:30', '2020-04-12 15:56:30'),
(36, 25, 8, '2020-04-12 21:00:21', '2020-04-12 21:00:21'),
(37, 26, 9, '2020-04-12 21:14:21', '2020-04-12 21:14:21'),
(38, 27, 3, '2020-04-15 14:07:34', '2020-04-15 14:07:34'),
(39, 28, 8, '2020-04-24 22:46:45', '2020-04-24 22:46:45'),
(40, 29, 4, '2020-04-26 07:16:45', '2020-04-26 07:16:45'),
(41, 29, 7, '2020-04-26 07:16:45', '2020-04-26 07:16:45'),
(42, 29, 9, '2020-04-26 07:16:45', '2020-04-26 07:16:45'),
(43, 30, 10, '2020-04-26 07:23:15', '2020-04-26 07:23:15'),
(44, 30, 4, '2020-04-26 07:23:15', '2020-04-26 07:23:15'),
(45, 31, 10, '2020-04-26 07:25:33', '2020-04-26 07:25:33'),
(46, 31, 4, '2020-04-26 07:25:33', '2020-04-26 07:25:33'),
(47, 32, 3, '2020-04-26 07:28:39', '2020-04-26 07:28:39'),
(48, 32, 4, '2020-04-26 07:28:39', '2020-04-26 07:28:39'),
(49, 33, 2, '2020-04-26 07:32:43', '2020-04-26 07:32:43'),
(50, 33, 4, '2020-04-26 07:32:43', '2020-04-26 07:32:43'),
(51, 33, 5, '2020-04-26 07:32:43', '2020-04-26 07:32:43'),
(52, 34, 4, '2020-04-26 07:34:52', '2020-04-26 07:34:52'),
(53, 34, 7, '2020-04-26 07:34:52', '2020-04-26 07:34:52'),
(54, 34, 9, '2020-04-26 07:34:52', '2020-04-26 07:34:52'),
(55, 35, 2, '2020-04-26 07:37:23', '2020-04-26 07:37:23'),
(56, 35, 11, '2020-04-26 07:37:23', '2020-04-26 07:37:23'),
(57, 35, 4, '2020-04-26 07:37:23', '2020-04-26 07:37:23'),
(58, 35, 5, '2020-04-26 07:37:23', '2020-04-26 07:37:23'),
(59, 36, 4, '2020-04-26 07:39:58', '2020-04-26 07:39:58'),
(60, 36, 5, '2020-04-26 07:39:58', '2020-04-26 07:39:58'),
(61, 36, 9, '2020-04-26 07:39:58', '2020-04-26 07:39:58'),
(62, 37, 10, '2020-04-26 07:43:56', '2020-04-26 07:43:56'),
(63, 37, 4, '2020-04-26 07:43:56', '2020-04-26 07:43:56'),
(64, 37, 9, '2020-04-26 07:43:56', '2020-04-26 07:43:56'),
(65, 38, 4, '2020-04-26 07:48:12', '2020-04-26 07:48:12'),
(66, 38, 9, '2020-04-26 07:48:12', '2020-04-26 07:48:12'),
(67, 39, 4, '2020-04-26 07:51:12', '2020-04-26 07:51:12'),
(68, 40, 4, '2020-04-26 07:53:33', '2020-04-26 07:53:33'),
(69, 40, 5, '2020-04-26 07:53:33', '2020-04-26 07:53:33'),
(70, 41, 7, '2020-04-26 07:57:47', '2020-04-26 07:57:47'),
(71, 41, 9, '2020-04-26 07:57:47', '2020-04-26 07:57:47'),
(72, 42, 5, '2020-04-26 08:02:28', '2020-04-26 08:02:28'),
(73, 42, 9, '2020-04-26 08:02:28', '2020-04-26 08:02:28'),
(74, 43, 2, '2020-04-26 08:05:13', '2020-04-26 08:05:13'),
(75, 43, 10, '2020-04-26 08:05:13', '2020-04-26 08:05:13'),
(76, 43, 4, '2020-04-26 08:05:13', '2020-04-26 08:05:13'),
(77, 44, 10, '2020-04-26 08:07:14', '2020-04-26 08:07:14'),
(78, 44, 4, '2020-04-26 08:07:14', '2020-04-26 08:07:14'),
(79, 44, 9, '2020-04-26 08:07:14', '2020-04-26 08:07:14'),
(80, 45, 4, '2020-04-26 08:10:55', '2020-04-26 08:10:55'),
(81, 45, 5, '2020-04-26 08:10:55', '2020-04-26 08:10:55'),
(82, 45, 9, '2020-04-26 08:10:55', '2020-04-26 08:10:55'),
(83, 46, 5, '2020-04-26 08:13:46', '2020-04-26 08:13:46'),
(84, 46, 7, '2020-04-26 08:13:46', '2020-04-26 08:13:46'),
(85, 46, 9, '2020-04-26 08:13:46', '2020-04-26 08:13:46'),
(86, 47, 2, '2020-04-26 08:16:11', '2020-04-26 08:16:11'),
(87, 47, 3, '2020-04-26 08:16:11', '2020-04-26 08:16:11'),
(88, 48, 11, '2020-04-26 08:20:21', '2020-04-26 08:20:21'),
(89, 48, 4, '2020-04-26 08:20:21', '2020-04-26 08:20:21'),
(90, 48, 5, '2020-04-26 08:20:21', '2020-04-26 08:20:21'),
(91, 49, 10, '2020-04-26 08:22:41', '2020-04-26 08:22:41'),
(92, 49, 4, '2020-04-26 08:22:41', '2020-04-26 08:22:41'),
(93, 49, 9, '2020-04-26 08:22:41', '2020-04-26 08:22:41'),
(94, 50, 10, '2020-04-26 08:24:45', '2020-04-26 08:24:45'),
(95, 50, 4, '2020-04-26 08:24:45', '2020-04-26 08:24:45'),
(96, 51, 11, '2020-04-26 08:26:29', '2020-04-26 08:26:29'),
(97, 51, 4, '2020-04-26 08:26:29', '2020-04-26 08:26:29'),
(98, 51, 5, '2020-04-26 08:26:29', '2020-04-26 08:26:29'),
(99, 51, 8, '2020-04-26 08:26:29', '2020-04-26 08:26:29'),
(100, 52, 10, '2020-04-26 08:29:23', '2020-04-26 08:29:23'),
(101, 52, 4, '2020-04-26 08:29:23', '2020-04-26 08:29:23'),
(102, 52, 9, '2020-04-26 08:29:23', '2020-04-26 08:29:23'),
(103, 53, 5, '2020-04-26 08:31:51', '2020-04-26 08:31:51');

-- --------------------------------------------------------

--
-- Структура таблицы `UserSerieStatus`
--

CREATE TABLE IF NOT EXISTS `UserSerieStatus` (
  `id` int(11) NOT NULL,
  `Serie_id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `UserSerieStatus`
--

INSERT INTO `UserSerieStatus` (`id`, `Serie_id`, `User_id`, `status`) VALUES
(1, 16, 1, 'watching'),
(2, 17, 1, 'watching'),
(4, 19, 1, 'watching'),
(5, 18, 20, 'watching'),
(6, 19, 20, 'planning'),
(7, 22, 21, 'planning'),
(8, 18, 1, 'planning'),
(9, 28, 1, 'planning'),
(11, 17, 52, 'watching'),
(12, 16, 52, 'watching'),
(13, 19, 52, 'seen'),
(20, 37, 1, 'watching'),
(21, 32, 1, 'watching'),
(22, 36, 1, 'seen'),
(23, 31, 1, 'planning'),
(24, 47, 1, 'planning'),
(25, 48, 1, 'planning'),
(26, 46, 1, 'planning'),
(27, 35, 1, 'watching'),
(28, 39, 1, 'seen'),
(29, 50, 1, 'planning'),
(30, 51, 1, 'planning'),
(31, 52, 1, 'watching'),
(32, 45, 1, 'watching'),
(33, 44, 1, 'watching'),
(34, 43, 1, 'watching'),
(35, 42, 1, 'watching'),
(36, 38, 1, 'watching'),
(37, 37, 7, 'watching'),
(38, 46, 7, 'watching'),
(39, 48, 7, 'watching'),
(40, 47, 7, 'watching'),
(41, 35, 7, 'watching'),
(42, 32, 7, 'watching'),
(43, 31, 7, 'seen'),
(44, 39, 7, 'seen'),
(45, 36, 7, 'planning'),
(46, 51, 7, 'watching'),
(47, 45, 7, 'watching'),
(48, 44, 7, 'watching'),
(49, 42, 7, 'watching'),
(50, 37, 8, 'watching'),
(51, 35, 8, 'watching'),
(52, 47, 8, 'watching'),
(53, 32, 8, 'watching'),
(54, 31, 8, 'watching'),
(55, 36, 8, 'watching'),
(56, 39, 8, 'watching'),
(57, 50, 8, 'watching'),
(58, 37, 9, 'watching'),
(59, 46, 9, 'watching'),
(60, 48, 9, 'watching'),
(61, 47, 9, 'watching'),
(62, 35, 9, 'watching'),
(63, 36, 9, 'seen'),
(64, 30, 9, 'watching'),
(65, 37, 10, 'watching'),
(66, 46, 10, 'watching'),
(67, 48, 10, 'watching'),
(68, 47, 10, 'watching'),
(69, 39, 10, 'watching'),
(70, 30, 10, 'watching'),
(71, 49, 10, 'watching'),
(72, 38, 10, 'watching'),
(73, 20, 10, 'watching'),
(74, 24, 10, 'seen'),
(75, 21, 10, 'seen'),
(76, 18, 10, 'seen'),
(77, 17, 53, 'watching'),
(78, 52, 53, 'planning'),
(79, 46, 53, 'planning'),
(80, 37, 53, 'seen');

-- --------------------------------------------------------

--
-- Структура таблицы `UsersEpisodes`
--

CREATE TABLE IF NOT EXISTS `UsersEpisodes` (
  `id` int(11) NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `Episode_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `UsersEpisodes`
--

INSERT INTO `UsersEpisodes` (`id`, `User_id`, `Episode_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 2),
(5, 1, 11),
(6, 1, 12),
(7, 1, 15),
(8, 1, 16),
(9, 1, 17),
(10, 1, 19),
(11, 1, 14),
(12, 1, 13),
(13, 1, 20),
(14, 1, 18),
(15, 1, 21),
(16, 1, 43),
(17, 1, 44),
(18, 1, 45),
(19, 1, 4),
(20, 1, 5),
(21, 1, 6),
(22, 1, 7),
(23, 1, 8),
(26, 20, 27),
(27, 20, 25),
(28, 20, 26),
(29, 20, 28),
(30, 20, 29),
(31, 1, 10),
(32, 52, 10),
(33, 52, 11),
(34, 52, 12),
(35, 52, 1),
(36, 52, 2),
(37, 52, 3),
(38, 52, 43),
(39, 52, 44),
(40, 52, 45),
(41, 52, 46),
(42, 52, 47),
(43, 52, 49),
(44, 52, 50),
(45, 52, 51),
(46, 52, 48),
(47, 52, 52),
(48, 52, 53),
(49, 52, 54),
(50, 52, 55),
(51, 52, 56),
(52, 52, 57),
(80, 1, 64),
(82, 1, 60),
(83, 1, 61),
(84, 53, 10),
(85, 53, 11),
(86, 52, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_10_180306_create_series_table', 1),
(4, '2018_07_10_180443_create_genres_table', 1),
(5, '2018_07_10_181731_create_seriesgenres_table', 1),
(6, '2018_07_10_182719_create_seasons_table', 1),
(7, '2018_07_10_184041_create_episodes_table', 1),
(8, '2018_07_10_184736_create_usersepisodes_table', 1),
(9, '2018_10_02_084852_test99_table', 1),
(10, '2019_05_12_122033_create_ratings_table', 1),
(11, '2019_06_12_152338_add_columns_to_users_table', 1),
(12, '2019_06_15_151035_create_comments_table', 1),
(13, '2019_07_27_180458_create_user_serie_statuses_table', 1),
(14, '2019_08_01_005052_add_column_to_series_table', 1),
(15, '2020_03_25_004834_add_ep_number_column_to__episodes_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `test99_tbl`
--

CREATE TABLE IF NOT EXISTS `test99_tbl` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `provider`, `provider_id`, `email`, `avatar`, `sex`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, 'admin@mail.com', NULL, NULL, '$2y$10$AyGncR8q24NnjIBpsr/iIuo0mDdoyvwL1xzgl3D4c.iuFx9iOhLYy', 'Tcw9xEej8hQ595Kr5SzsEIStnvmBEw41RXyMqH4BZ8M4LBbXHUv7Er2cjJGO', '2020-04-12 10:00:44', '2020-04-12 10:00:44'),
(2, 'Chasity Kihn', NULL, NULL, NULL, 'hveum@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Y13Soysvu4', '2020-04-12 16:35:26', '2020-04-12 16:35:26'),
(3, 'Prof. Clementine McCullough Sr.', NULL, NULL, NULL, 'xwiegand@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'AOMpuAqYBF', '2020-04-12 16:35:26', '2020-04-12 16:35:26'),
(4, 'Antonio Pollich', NULL, NULL, NULL, 'jena82@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mCYDeTbGXW', '2020-04-12 16:35:26', '2020-04-12 16:35:26'),
(5, 'Carlee Schmeler', NULL, NULL, NULL, 'jamison.kozey@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ZfJSyyTqiT', '2020-04-12 16:35:26', '2020-04-12 16:35:26'),
(6, 'Domenica Stoltenberg IV', NULL, NULL, NULL, 'ilang@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'h34RG9R7Ir', '2020-04-12 16:35:26', '2020-04-12 16:35:26'),
(7, 'Jazlyn Hane II', NULL, NULL, NULL, 'gislason.rory@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1jOGyyzWLH6hjbEdLA1U9sAu4BdTUa78IgaV1x32KHqjojYIHtE9s4MFUesX', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(8, 'Trevion Monahan', NULL, NULL, NULL, 'jherzog@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VFIg8ikq5RtfEAVp4VwwYPUbKzgjO9IdxMxHGNZNAivSolqN3QrJTowYB92T', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(9, 'Prof. Santos Kulas V', NULL, NULL, NULL, 'baumbach.gage@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'yxnZTIipfp4jjVuG0yYg7P9B11h1fZOmR3AC4L8vVLEcaQsEZC1TCqZbIZcs', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(10, 'Dr. Rozella Strosin DDS', NULL, NULL, NULL, 'esatterfield@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'oQSHxEE0egbgMOzjFmEwJSifKwcHPxGlNiHcH72eJVJOpTyK3q9njPVTl3l9', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(11, 'Ms. Hellen Brekke', NULL, NULL, NULL, 'hilma77@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'T9X04x1ryc', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(12, 'Jerrod Pagac', NULL, NULL, NULL, 'ywest@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'BdvDd1URLe', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(13, 'Pattie Jerde', NULL, NULL, NULL, 'abbey45@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ABaZDhT6Er', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(14, 'Clementine Rippin', NULL, NULL, NULL, 'lera.daugherty@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Zqx26ay66g', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(15, 'Mariana Bauch IV', NULL, NULL, NULL, 'jrath@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mvCrmdBGwH', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(16, 'Veda Abernathy', NULL, NULL, NULL, 'schneider.nia@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'A6mOC49cJf', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(17, 'Dr. Cynthia Hyatt DVM', NULL, NULL, NULL, 'amelie37@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'aiLs5qsNYW', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(18, 'Donnie Larkin MD', NULL, NULL, NULL, 'reichert.carroll@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HL0mY7pNQI', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(19, 'Mrs. Kenya Satterfield', NULL, NULL, NULL, 'tess41@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ZHSSGg0qcV', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(20, 'Elvie Marquardt', NULL, NULL, NULL, 'ledner.arden@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HszNS9GFTTZyrtskabzDcnVAsx0dUnQYTMGYwrZEmr16MClJhsIWeESXhDPE', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(21, 'Demetrius Corkery', NULL, NULL, NULL, 'rtromp@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'D89GNQxxuEtQe0v9TLKHvy1qcLdvULLxiEYrofAgAXoQ4I2qMIYzO2CROEwy', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(22, 'Hellen Balistreri', NULL, NULL, NULL, 'amely.kuhic@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'GsKk71CgMR', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(23, 'Raven Kilback MD', NULL, NULL, NULL, 'carley.heidenreich@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'OJXeEMibT3', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(24, 'Malika Trantow', NULL, NULL, NULL, 'kavon.wyman@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'MimAAh2wb1', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(25, 'Javon Oberbrunner', NULL, NULL, NULL, 'eleanore89@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'x0sfYIdwRA', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(26, 'Dr. Hyman Hirthe', NULL, NULL, NULL, 'brown.jacey@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mbJRqlkj2p', '2020-04-12 16:35:27', '2020-04-12 16:35:27'),
(27, 'Abdul Trantow DDS', NULL, NULL, NULL, 'albertha.herzog@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2DAa3XzKVg', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(28, 'Brady Bins', NULL, NULL, NULL, 'koss.madelyn@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'pt94KqQjYV', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(29, 'Kiana Shanahan', NULL, NULL, NULL, 'gfay@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '6xLM0AblE8', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(30, 'Liliane Boyle I', NULL, NULL, NULL, 'welch.ardella@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Hsg3T3tvf2', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(31, 'Dax Heaney', NULL, NULL, NULL, 'kulas.noemi@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '5JpC0Vv9Ms', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(32, 'Rex Wisozk', NULL, NULL, NULL, 'stanton.santa@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DvUU9SdBOy', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(33, 'Christophe Ritchie IV', NULL, NULL, NULL, 'mziemann@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'YjgnX3Cmws', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(34, 'Hobart O''Kon', NULL, NULL, NULL, 'juwan.bruen@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'NxlEeUMh0a', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(35, 'Lucile Hettinger', NULL, NULL, NULL, 'mylene.boehm@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'DqVSKsTwno', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(36, 'Raina Parker I', NULL, NULL, NULL, 'qlang@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'MkOCwuPoc9', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(37, 'Lessie Nader', NULL, NULL, NULL, 'adrienne24@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'lKlDTpnx46', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(38, 'Leanna Stark', NULL, NULL, NULL, 'ebrakus@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'e7iZGbRDID', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(39, 'Mr. Hayden Huel DVM', NULL, NULL, NULL, 'lia93@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'H2387jezcA', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(40, 'Tanner Reilly', NULL, NULL, NULL, 'kristy.feeney@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'xicUfSKyjl', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(41, 'Prof. Unique Collins', NULL, NULL, NULL, 'rey31@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'OaWraKEYbx', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(42, 'Prof. Ethel Kunze PhD', NULL, NULL, NULL, 'waters.orville@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tRgLYAHaYn', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(43, 'Ms. Abigail Gaylord MD', NULL, NULL, NULL, 'leilani38@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'iYalkapni1', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(44, 'Maia Flatley III', NULL, NULL, NULL, 'kerluke.abe@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'BYGbkB71Xf', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(45, 'Cecile Lockman Sr.', NULL, NULL, NULL, 'reinger.bartholome@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'NeA03TH28e', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(46, 'Karley Bernier', NULL, NULL, NULL, 'angelita62@example.com', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'kwy94edWb1', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(47, 'Liza Maggio V', NULL, NULL, NULL, 'erdman.verla@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'AUxy3diQY9', '2020-04-12 16:35:28', '2020-04-12 16:35:28'),
(48, 'Kendra Muller III', NULL, NULL, NULL, 'georgiana70@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'UfJvrv6UtQ', '2020-04-12 16:35:29', '2020-04-12 16:35:29'),
(49, 'Milo Lemke', NULL, NULL, NULL, 'yroob@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mp0cC1x2d7', '2020-04-12 16:35:29', '2020-04-12 16:35:29'),
(50, 'Mr. Adolphus Bradtke', NULL, NULL, NULL, 'kutch.kaia@example.org', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'IIWZC39PmS', '2020-04-12 16:35:29', '2020-04-12 16:35:29'),
(51, 'Daisha Leannon MD', NULL, NULL, NULL, 'doug34@example.net', NULL, NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'q32kfFqbNq', '2020-04-12 16:35:29', '2020-04-12 16:35:29'),
(52, 'welby', 'admin', 'GOOGLE', '102131294042161674665', 'welby234@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GhgkQgOZNixdTqnt_lp7CFfd23RN0mpcBu2j6ndlw', NULL, NULL, 'z9Ulxs4p8hewdRyWcOnT0KL0BKWkvNowpKVUl1rGQ5vyYQqpuc20lzGcZ2qk', '2020-04-26 02:59:01', '2020-04-26 02:59:01'),
(53, 'Vitaly Vylku', 'admin', 'VKONTAKTE', '119631046', 'welby@mail.ru', 'https://sun9-5.userapi.com/c841333/v841333442/11dff/JPl_TRBfZTo.jpg?ava=1', 'm', NULL, 'rRaFKFyKhmXisVE0nAq8XCkS2D0xf7nrsEIWzS8IBKGXYnueyRw1YauX2t7i', '2020-04-26 03:11:56', '2020-04-26 03:11:56'),
(105, 'test1', NULL, NULL, NULL, 'test2@mail.co', NULL, NULL, '$2y$10$QQT.dKDBqUzThdQF7Dv2BOPScLF3MS8lU7sc1BePem7hQGdPxfZU.', 'vojBU9n5OObvQjwXtclb4Hajqy4jvERJT8rE9EbKK2Ttwuo9lZkCBw6YdkaI', '2020-06-12 13:47:48', '2020-06-12 13:47:48');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`User_id`),
  ADD KEY `comments_serie_id_foreign` (`Serie_id`);

--
-- Индексы таблицы `Episodes`
--
ALTER TABLE `Episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_season_id_foreign` (`Season_id`);

--
-- Индексы таблицы `Genres`
--
ALTER TABLE `Genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_serie_id_foreign` (`Serie_id`),
  ADD KEY `ratings_user_id_foreign` (`User_id`);

--
-- Индексы таблицы `Seasons`
--
ALTER TABLE `Seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seasons_serie_id_foreign` (`Serie_id`);

--
-- Индексы таблицы `Series`
--
ALTER TABLE `Series`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `SeriesGenres`
--
ALTER TABLE `SeriesGenres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seriesgenres_serie_id_foreign` (`Serie_id`),
  ADD KEY `seriesgenres_genre_id_foreign` (`Genre_id`);

--
-- Индексы таблицы `UserSerieStatus`
--
ALTER TABLE `UserSerieStatus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `UsersEpisodes`
--
ALTER TABLE `UsersEpisodes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Индексы таблицы `test99_tbl`
--
ALTER TABLE `test99_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `Episodes`
--
ALTER TABLE `Episodes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблицы `Genres`
--
ALTER TABLE `Genres`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `Ratings`
--
ALTER TABLE `Ratings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT для таблицы `Seasons`
--
ALTER TABLE `Seasons`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `Series`
--
ALTER TABLE `Series`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT для таблицы `SeriesGenres`
--
ALTER TABLE `SeriesGenres`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT для таблицы `UserSerieStatus`
--
ALTER TABLE `UserSerieStatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT для таблицы `UsersEpisodes`
--
ALTER TABLE `UsersEpisodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `test99_tbl`
--
ALTER TABLE `test99_tbl`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Episodes`
--
ALTER TABLE `Episodes`
  ADD CONSTRAINT `episodes_season_id_foreign` FOREIGN KEY (`Season_id`) REFERENCES `Seasons` (`id`);

--
-- Ограничения внешнего ключа таблицы `Seasons`
--
ALTER TABLE `Seasons`
  ADD CONSTRAINT `seasons_serie_id_foreign` FOREIGN KEY (`Serie_id`) REFERENCES `Series` (`id`);

--
-- Ограничения внешнего ключа таблицы `SeriesGenres`
--
ALTER TABLE `SeriesGenres`
  ADD CONSTRAINT `seriesgenres_genre_id_foreign` FOREIGN KEY (`Genre_id`) REFERENCES `Genres` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
