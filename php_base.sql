-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2019 г., 20:16
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` text,
  `alias` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `about`, `alias`, `parent_id`, `meta_keywords`, `meta_description`) VALUES
(1, 'Кино', 'Кино About', 'film', NULL, 'films', 'films'),
(2, 'Театр', NULL, 'theatre', NULL, NULL, NULL),
(3, 'Концерты', NULL, 'concert', NULL, NULL, NULL),
(4, 'Вечеринки', NULL, 'party', NULL, NULL, NULL),
(5, 'Выставки', NULL, 'exhibition', NULL, NULL, NULL),
(6, 'Цирк', NULL, 'circus', NULL, NULL, NULL),
(7, 'Детям', NULL, 'kids', NULL, NULL, NULL),
(8, 'Другое', NULL, 'other', NULL, NULL, NULL),
(9, 'Ужасы', NULL, 'horrors', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `place_id` int(255) DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `date_end` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num_of_seats` int(11) DEFAULT NULL,
  `booked_seats` text,
  `actors` text,
  `image_array` text NOT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `status` enum('0','1','-1','') NOT NULL DEFAULT '1',
  `additional_field` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `alias`, `category_id`, `title`, `content`, `place_id`, `date_start`, `date_end`, `price`, `num_of_seats`, `booked_seats`, `actors`, `image_array`, `meta_keywords`, `meta_description`, `status`, `additional_field`) VALUES
(20, 'okean-elzi', 3, 'Концерт Океан Ельзи!', 'После двухлетнего перерыва группа Океан Ельзи возвращается в Беларусь с единственным выступлением - специально для белоруских поклонников ОЕ адаптировали шоу, которое фанаты увидели в августе 2018 на киевском стадионе «Олимпийский». Нестандартная сцена и видеоинсталяции, много звука и света, а также любимые песни и невероятная харизма Святослава Вакарчука – все это ждет поклонников Океана Ельзи 20 сентября в Минск-Арене. Билеты уже в продаже.  В 2017 году ОЕ объявили годовой перерыв в гастрольной и творческой деятельности. «Хотим немного отдохнуть после наших туров», - рассказывал два года назад лидер группы Святослав Вакарчук. ОЕ вернулись в августе 2018 года: на День независимости Украины музыканты пели 4 часа на стадионе «Олимпийский». Это выступление стало очередным рекордом группы: шоу посетили 100 000 слушателей.  Каждое выступление ОЕ – это всегда яркий и эмоциональный шторм, в который поклонники попадают еще до начала концерта. С первых аккордов между группой и фанатами возникает необъяснимая химия: овации и совместное пение, адреналин и драйв, а также большая волна искренности и признаний в любви между музыкантами и зрителями – это все выступление группы Океан Ельзи. Последний концерт группы в Беларуси прошел на фестивале LIDBEER-2017 – 30 000 зрителей вызывали музыкантов 3 раза на «бис».  В октябре 2019 года группе Океан Ельзи исполнится 25 лет. За это время музыканты выпустили 9 полноформатных альбомов, выступили с концертами почти во всех странах и стали одной из самых известных групп Украины во всем мире. На концерте в Минске зрителей ждут новые песни, а также хиты «Обiйми», «Така, як ти», «На небi», «Без бою», «Майже весна», «Холодно», «Без тебе», «Не йди», «911» и многие другие.  Океан Ельзи – это всегда спектр ярких эмоций, бешеной энергии иневероятной атмосферы, и, конечно, объединение зрителей в настоящий музыкальный океан.', 7, '2019-04-26 08:00:00', NULL, 25, 248, '[115]', NULL, 'Upload_5c9c552293ae56.03589206.png', '', '', '1', '{\"\":\"\"}'),
(21, 'scorpions', 3, 'Концерт Scorpions ', 'Scorpions – одна из самых популярных и старейших групп на планете: 18 студийных альбомов, 74 сингла более 200 раз становились «золотыми», «платиновыми», даже «мульти-платиновыми» и много раз занимали первые места в хит-парадах разных стран. По всему миру только официально было продано более 110 млн записей рок-группы.  В 2015 году группа отметила свое 50-летие, а в 2017 года отправилась в грандиозный мировой тур «CRAZY WORLD», в котором исполняет свои самые известные песни: Send me an angel, Rock you like a hurricane, Still loving you, Big city nights и, конечно же, легендарную “Wind of change”.', 7, '2019-04-17 08:01:00', NULL, 48, 248, NULL, NULL, 'Upload_5c9c555b76dbd1.73232506.png', '', '', '1', ''),
(22, 'elena-vaenga', 3, 'Концерт Елены Ваенги ', 'Елена Ваенга - феномен и жемчужина петербургской сцены, которая завоевала любовь огромного числа слушателей артистичностью натуры, вокальными данными и напористым характером. Считает, что искусство должно быть честным. На данный момент имеет 8 авторских альбомов. И собирается в очередной раз завоевать любовь белорусских слушателей со своим сольным концертом в Минске 8 апреля.  Елена Ваенга — это удивительная, хрупкая, ранимая, исключительно художественная и жизнерадостная натура. Ее дар – музыка, ее муза – северные просторы, которые стали лейтмотивом творчества певицы. Не смотря на ее внешнюю романтичность и нежность, за плечами этой артистки более 800 написанных песен, множество наград и миллионы покоренных сердец. Как мы все знаем, Елена Ваенга – это заслуженная певица российской эстрады. Но, наверное не все знают, что она также является и талантливой актрисой, автором своих песен и композитором музыки, под которую она поет. К какому жанру можно отнести творчество Ваенги? Ко многим жанрам – это и песни военных лет, баллада, блюз, шансон, романс, рок-н-ролл. На своём сольном концерте Елена Ваенга помимо новых хитов также исполнит свои известные песни: «Шопен», «Аэропорт», «Королева», « Невеста», «Нева».', 7, '2019-05-16 08:05:00', NULL, 15, 248, NULL, NULL, 'Upload_5c9c5626562293.07385822.png', '', '', '1', ''),
(23, 'nacionalnyj-balet', 4, 'Балет Грузии Сухишвили ', 'Национальный балет Грузии Сухишвили ', 7, '2019-05-30 08:06:00', NULL, 1, 248, NULL, NULL, 'Upload_5c9c56531b2fd3.14748982.jpg', '', '', '1', ''),
(24, 'bi2', 3, 'Концерт Би-2 ', 'Би-2 постоянно удивляют фанатов: они запросто могут устроить 120-тысячный фестиваль в родном городе, выпустить совместный трек с рэпером Oxxxymiron или снять настоящий клип-блокбастер – как на песню «Виски».  Весной 2019 года Шура и Лёва Би-2 устроят очередное незабываемое шоу для поклонников в Беларуси: 29 марта в Минске и 31 марта в Гомеле состоятся большие концерты Би-2 в сопровождении симфонического оркестра. Дирижер – Феликс Арановский.  Грандиозный проект с оркестром Би-2 задумали еще в 2003 году. Музыканты захотели тогда провести эксперимент и придать новое – симфоническое звучание своим песням. И не только в студии, но и на сцене, устроив рок-шоу в сопровождении оркестра. В тот же период Лёва и Шура познакомились с Заслуженным артистом России, дирижером Феликсом Арановским, встреча с которым стала знаковой. На протяжении уже 15 лет творческий тандем Би-2 и Феликса Арановского радует зрителей ярким и красочным выступлениями, в котором роковые блокбастеры Би-2 звучат в симфонической аранжировке.  ', 7, '2019-03-30 08:06:00', NULL, 27, 248, NULL, NULL, 'Upload_5c9c567fb1f904.94208098.png', '', '', '1', ''),
(25, 'bright-fest', 3, 'Bright Fest ', '11 мая на минском стадионе «ДИНАМО» пройдет грандиозный  BRIGHT FESTIVAL с участием LOBODA, «ЛЯПИС-98», КАСТА, «J:МОРС», Milmars.  II Европейские игры начинаются намного раньше, чем вы думаете! Приглашаем вас принять участие в фестивале, который станет ярким стартом этого главного спортивного события Беларуси 2019-го года.   BRIGHT FESTIVAL начнется уже в 15:00 активацией более 50-ти развлекательных зон на территории стадиона со стороны улицы Кирова. В рамках фестиваля будет организована работа спортивных площадок от федераций спорта Беларуси, интерактивных площадок молодежных организаций БГУ, встреча со звездами белорусского спорта, представление молодежных субкультур, спортивные и творческие состязания, песенные и танцевальные батлы, представление творческих молодежных проектов, зоны активного отдыха, зона релаксации, конкурсы, фотозоны, мастер-классы,  и многое другое.  На Bright Festival у вас будет возможность взять интервью и комментарии у приглашенных гостей, среди которых будут белорусские звезды спорта, блогеры и официальные лица.', 7, '2019-05-11 08:07:00', NULL, 13, 248, NULL, NULL, 'Upload_5c9c56bf7af308.24617147.png', '', '', '1', ''),
(26, 'volshebnyj-park-dzhun', 1, 'Волшебный парк Джун', '3D  «6+» для зрителей старше 6 лет  Режиссер:  Сценарий: Джош Аппелбаум, Андре Немец, Роберт Гордон  Продюсеры: Джош Аппелбаум, Эшли Чейни, Аарон Дем, ...  Вид:мультипликационный  Жанр: фэнтези, комедия, приключения, семейный  Кинозал Дворца Республики представляет!  «Волшебный парк Джун»!  Однажды фантазерка Джун обнаруживает, что придуманный ею чудесный Парк развлечений реален! Но его существование под угрозой, и Джун нужен план спасения ее Мечты. Помогут девочке ее новые друзья — волшебные звери Парка.', NULL, '2019-05-30 08:09:00', NULL, 5, 248, '{\"6\":{\"2019-04-06 08:17:00\":[59]},\"1\":{\"2019-05-23 08:15:00\":[113]}}', NULL, 'Upload_5c9c571f5e2308.99901741.jpg', '', '', '1', '{\"3d\":\"есть\"}'),
(27, 'delfinarij', 7, 'Дельфинарий ', '  Минский дельфинарий «Немо» - один из самых современных круглогодичных культурно-оздоровительных центров Европы, который объединил в себе дельфинарий и центр дельфинотерапии.     Кроме того Минский дельфинарий входит в состав международной сети культурно-оздоровительных комплексов «Немо» в Украине и других странах, расположенных: Киеве, Одессе, Харькове, Донецке, Бердянске, Ереване, Баку и Анапе. Открытие Минского круглогодичного дельфинария является долгожданным событием для всех гостей и жителей столицы, поскольку разнообразие памятников архитектуры и выдающихся мест Минска дополнилось прекрасным заведением для семейного и молодежного отдыха. Минский дельфинарий «Немо» удивляет не только своей современной и красивой конструкцией, а еще и лучшей в Европе шоу-программой с участием тихоокеанских дельфинов,  морских котиков и морского льва, которые исполнят сложнейшие и уникальные номера, подготовленные ведущими специалистами в области воспитания и тренировки морских млекопитающих. На представлениях в дельфинарии Вы познакомитесь с дельфинами, узнаете много интересного об их физиологии, характерах и особенностях поведения этих уникальных животных. Вы сможете прикоснуться к природе и ощутить, насколько прекрасен мир, который нас окружает. В Минском дельфинарии обитают северные морские котики Елочка и Алекс, а также наши очаровательные и непревзойденные – тихоокеанские дельфины – Геркулес – Вита, Мика – Хьюго и морской львенок – Николас. Минский дельфинарий «Немо» может вместить 700 посетителей.', 8, '2019-04-04 08:11:00', NULL, 32, 248, '[]', NULL, 'Upload_5c9c57af025238.90918868.jpg', '', '', '1', '{\"Увидите дельфинов?\":\"Да!\"}'),
(28, 'detskij-myuzikl-detektiv', 7, '', 'Отличная погода, сказочный лес…  Заяц несёт домой огромный мешок с чем-то необычным, большим и круглым. И вдруг откуда ни возьмись «заклятые друзья» Косого – Лиса и Волк. Естественный интерес хищников к заячьей находке, по ходу дела, превращается в детективную историю с мешком. В нём, как повествуется, находится тот самый сюрприз, который нашёл Заяц. Он утверждает, что это «бомба». Другая версия, возникшая в ходе сюжета – это яйцо динозавра. Так это или не так, мы узнаем в ходе путешествия этого самого мешка «с сюрпризом», превратившим жизнь обитателей леса в одну из самых запутанных лесных историй. Прямо настоящий детектив.  Среди этой детективной истории встретится всё семейство Зайца, очень ответственный Ёж, куриное семейство и смелый сторожевой Пёс, а Лесные слухи всё никак не дадут истории распутаться.  Чем всё-таки завершится непростое путешествие виновника лесного переполоха – узнаете, посмотрев детский мюзикл-детектив Театра эстрады «Мешок с сюрпризом».', 4, '2019-05-24 08:13:00', NULL, 7, 248, NULL, NULL, 'Upload_5c9c5800976ca2.15116170.jpg', '', '', '1', ''),
(29, 'dambo', 9, 'Дамбо ', 'Цирковой импресарио Марк Медичи назначает бывшую звезду цирка Холта Фэрриера и его детей Милли и Джо опекунами новорожденного слонёнка, чьи невероятно большие уши сразу становятся предметом для постоянных шуток и насмешек коллег Холта по цеху.', NULL, '2019-03-29 08:16:00', NULL, 5, 248, '{\"6\":{\"2019-05-16 08:17:00\":[79]}}', NULL, 'Upload_5c9c58db7a7375.48764226.jpg', '', '', '1', '{\"Режиссер\":\"Тим Бёртон\",\"В ролях\":\" Ева Грин, Колин Фаррелл, Майкл Китон, Дэнни ДеВито, Алан Аркин\"}'),
(30, 'rusalochka-1', 2, 'Спектакль Русалочка ', '', 4, '2019-05-17 08:18:00', NULL, 8, 248, '[214]', NULL, 'Upload_5c9c595358e896.56935726.png', '', '', '1', ''),
(31, 'lanirint', 2, 'Лабиринт исполнения желаний', '  Спектакль «Лабиринт исполнения желаний», запланированный на 28.03.2019 года в 11-00 и на 29.03.2019 года в 11-00, отменяется.  Возврат денежных средств за реализованные билеты на данное мероприятие будет производиться в кассе концертного зала «Минск» с 28.03.2019 по 01.04.2019 года.', 4, '2019-05-09 08:19:00', NULL, 11, 248, NULL, NULL, 'Upload_5c9c597b0af873.62941294.jpg', '', '', '1', ''),
(32, 'cirk--planeta', 6, 'Цирк \" Планета снов\"', 'Цирк \"Планета снов\", заявленный на 6 апреля 2019года на площадке \"Фэлкон Клаб\" (г. Минск, пр. Победителей, 22) по техническим причинам переносится на 21 апреля 2019 года в КЗ \"Минск\" (большой зал). Билеты, приобретенные зрителями в кассах \"Тикетпро\" действительны. Для уточнения посадочных мест, необходимо связаться по тел. :+375(29)795-58-16.', 7, '2019-04-04 08:33:00', NULL, 41, 248, NULL, NULL, 'Upload_5c9c5cab36a661.51416356.jpg', '', '', '1', ''),
(33, 'otkrytyy_mikrofon', 8, 'Comedy mic ', 'Вход СВОБОДНЫЙ!  +375 29 103 10 00', 6, '2019-05-30 08:45:00', NULL, 0, 248, NULL, NULL, 'Upload_5c9c5f756a2dd5.39571463.jpg', '', '', '1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `eventtimes`
--

CREATE TABLE `eventtimes` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `eventtimes`
--

INSERT INTO `eventtimes` (`id`, `event_id`, `place_id`, `date_array`) VALUES
(10, 26, 1, '[\"2019-03-29 08:15:00\",\"2019-05-23 08:15:00\",\"2019-04-25 08:19:00\"]'),
(11, 29, 3, '[\"2019-03-08 08:17:00\"]'),
(13, 29, 6, '[\"2019-05-16 08:17:00\",\"2019-05-24 08:17:00\"]'),
(14, 26, 5, '[\"2019-04-17 20:00:00\",\"2019-04-27 20:00:00\"]'),
(15, 26, 6, '[\"2019-04-30 20:00:00\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-12 10:05:04', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2017-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:05', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-03-11 21:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication');

-- --------------------------------------------------------

--
-- Структура таблицы `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` date NOT NULL,
  `seat` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `additional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `seat` varchar(255) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `event_id`, `place_id`, `date`, `time`, `seat`, `price`, `status`) VALUES
(89, 13, 30, 4, '2019-03-29 08:18:00', '2019-03-28 08:20:16', '214', '8', NULL),
(90, 13, 27, 8, '2019-04-04 08:11:00', '2019-03-28 08:20:30', '83', '32', 'cancel_by_user'),
(91, 13, 29, 6, '2019-05-16 08:17:00', '2019-03-28 08:20:40', '79', '5', 'cancel_by_admin'),
(92, 8, 26, 6, '2019-04-06 08:17:00', '2019-03-28 08:21:19', '59', '5', 'cancel_by_admin'),
(93, 8, 20, 7, '2019-03-30 08:00:00', '2019-03-28 08:21:40', '115', '25', NULL),
(94, 13, 26, 1, '2019-05-23 08:15:00', '2019-04-02 20:24:25', '113', '5', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `name`, `city`) VALUES
(1, 'Аврора', 'Minsk'),
(2, 'Беларусь', 'Minsk'),
(3, 'Берестье', 'Minsk'),
(4, 'ДомКино', 'Minsk'),
(5, 'Киев', 'Minsk'),
(6, 'Мир', 'Minsk'),
(7, 'МКСК Минск-Арена', 'Минск'),
(8, 'Дельфинарий', 'Минск');

-- --------------------------------------------------------

--
-- Структура таблицы `top`
--

CREATE TABLE `top` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `top`
--

INSERT INTO `top` (`id`, `event_id`, `image`) VALUES
(14, 21, 'Upload_5c9c55cc92d183.57336362.png'),
(15, 25, 'Upload_5c9c56c7dc8653.43193754.png'),
(16, 24, 'Upload_5cac3fe4779cb3.69016950.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('user','admin','moderator','') NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `role`, `name`, `phone`) VALUES
(5, 'userLogin', '$2y$12$Xpo/NR.IsQXdaWVTIx6se.Puw7AqBPnhjYJx7EO9BCihFHJ2hGpSS', 'belaruser@mail.ru', 'user', 'user', '+375-25 753-51-51'),
(7, 'user', '$2y$12$OanGfxK85RMjMzauu0HeHeK77KYoNF.gaFoDpViw/KZzbGdW8yc8u', 'asda@sa.sad', 'user', 'i\'m', '+375-25 777-77-77'),
(8, 'hellologin', '$2y$12$SCQrjkJBTG7Yf0xYFFs6G.GkfbKPcdojetGvRaKecMCgWHRZlRsnG', 'email@emaidl.ru', 'user', 'hello', '375'),
(9, 'user2', '$2y$12$wJmWNEMhYF86H/2mRjSOiOpcVaOJbF34j7JKByZwZHAWwDvSEYOQ2', 'ema2il@email.ru', 'user', 'имя', '375'),
(10, 'asd', '$2y$12$ld2bN63RpNvOSjXYiekYEuDVBP1GxvJb96AJJJrlT31GW/zT.InEK', 'ema2il@edmail.ru', 'user', 'asd', '375'),
(11, 'asdasdda', '$2y$12$BsfAfqkCELiuLhCpYUyAmOrlBnwzjBWTsiri9vM1pxG.DuuKHbK6i', 'admin@generalwork.by', 'user', 'qwdasd', '+375-25 753-51-51'),
(12, 'login', '$2y$12$PZEs59st8jPVWKRUFOnPDueFXyk.lExDnYjg7cSORlwzxlh6UTqxC', 'email@email.rud', 'user', 'Имя', '+375-25 753-51-51'),
(13, 'admin', '$2y$12$OthhyUngmIH2.OWxLAu0vutGQhsmxVBK4LD3tpMa6S9dpZYf6.pfa', 'admin@mail.ru', 'admin', 'Admin', '+375-25 753-51-51'),
(14, 'us', '$2y$12$WpBogfPjYpXYDdG.cIK68OGMp3HSa0FUCQ0J9nyB8C8.Y5EWF7/1y', 'us@mail.ru', 'admin', 'us', '+375-25 753-51-51'),
(15, 'asdasd', '$2y$12$atp2WF0i4.aBeuwnlF9zKeuT8JNsq/HaDxR2OOyJw.HHK1mXNXsra', 'asdasd@mail.ru', 'user', 'asdasd', '+375-25 753-51-51');

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `event_id`, `score`, `comment`) VALUES
(16, 13, 27, 2, 'Я хотел плавать, но сказали, что я не дельфин'),
(17, 8, 26, 4, 'Этот медведь постоянно смотрел на меня');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `event_category` (`category_id`),
  ADD KEY `event_category_2` (`category_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `eventtimes`
--
ALTER TABLE `eventtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `top`
--
ALTER TABLE `top`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `eventtimes`
--
ALTER TABLE `eventtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `top`
--
ALTER TABLE `top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Ограничения внешнего ключа таблицы `eventtimes`
--
ALTER TABLE `eventtimes`
  ADD CONSTRAINT `eventtimes_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `eventtimes_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Ограничения внешнего ключа таблицы `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Ограничения внешнего ключа таблицы `top`
--
ALTER TABLE `top`
  ADD CONSTRAINT `top_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Ограничения внешнего ключа таблицы `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
