-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2025 at 06:28 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `published_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`),
  KEY `category_id` (`category_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `image_url`, `category_id`, `author_id`, `published_date`) VALUES
(1, 'qqq', 'Fuga Nulla veniam ', 'Screenshot (88).png', NULL, NULL, '2025-07-20 18:54:18'),
(8, 'Ullam dicta sed in ', 'Quaerat id quo sint', 'Screenshot (89).png', NULL, NULL, '2025-07-21 15:59:27'),
(9, 'Fuga Aperiam', 'Adipisicing totam au', 'Screenshot (88).png', NULL, NULL, '2025-07-21 16:00:37'),
(21, 'Parliament Votes to Dissolve Itself in Surprise Decision', 'In an unexpected move on Thursday morning, members of the national parliament voted unanimously to dissolve the legislative body, citing internal fatigue and political stagnation.\r\n\r\nThe session began routinely, but quickly took an unusual turn when one member proposed a vote for self-dissolution, stating that \"after years of unproductive sessions and repeated gridlock, perhaps the best solution is to step aside.\"\r\n\r\nThe proposal, initially met with laughter, gained traction as more members expressed frustration with the lack of progress on key national issues. Within an hour, the vote was held and passed with full support.\r\n\r\nPrime Minister Adel Kareem expressed surprise at the outcome.\r\n\"I came to request increased defense funding,\" he said. \"Instead, I witnessed the parliament declare its own shutdown.\"\r\n\r\nThe government has announced that temporary legislative duties will be handled by a committee of legal and economic experts until new elections can be organized.\r\n\r\nPublic reactions have been mixed, with some citizens praising the move as “a necessary reset,” while others worry about the lack of parliamentary oversight during the transition period.\r\n\r\nFurther details are expected to be released in the coming days.\r\n\r\n', 'Politics1.jpeg', 2, NULL, '2025-07-26 10:30:00'),
(22, 'Parliament Votes to Dissolve Itself in Surprise Decision', 'In an unexpected move on Thursday morning, members of the national parliament voted unanimously to dissolve the legislative body, citing internal fatigue and political stagnation.\r\n\r\nThe session began routinely, but quickly took an unusual turn when one member proposed a vote for self-dissolution, stating that \"after years of unproductive sessions and repeated gridlock, perhaps the best solution is to step aside.\"\r\n\r\nThe proposal, initially met with laughter, gained traction as more members expressed frustration with the lack of progress on key national issues. Within an hour, the vote was held and passed with full support.\r\n\r\nPrime Minister Adel Kareem expressed surprise at the outcome.\r\n\"I came to request increased defense funding,\" he said. \"Instead, I witnessed the parliament declare its own shutdown.\"\r\n\r\nThe government has announced that temporary legislative duties will be handled by a committee of legal and economic experts until new elections can be organized.\r\n\r\nPublic reactions have been mixed, with some citizens praising the move as “a necessary reset,” while others worry about the lack of parliamentary oversight during the transition period.\r\n\r\nFurther details are expected to be released in the coming days.\r\n\r\n', 'Politics2.jpeg', 2, NULL, '2025-07-26 10:30:24'),
(23, 'Parliament Votes to Dissolve Itself in Surprise Decision', 'In an unexpected move on Thursday morning, members of the national parliament voted unanimously to dissolve the legislative body, citing internal fatigue and political stagnation.\r\n\r\nThe session began routinely, but quickly took an unusual turn when one member proposed a vote for self-dissolution, stating that \"after years of unproductive sessions and repeated gridlock, perhaps the best solution is to step aside.\"\r\n\r\nThe proposal, initially met with laughter, gained traction as more members expressed frustration with the lack of progress on key national issues. Within an hour, the vote was held and passed with full support.\r\n\r\nPrime Minister Adel Kareem expressed surprise at the outcome.\r\n\"I came to request increased defense funding,\" he said. \"Instead, I witnessed the parliament declare its own shutdown.\"\r\n\r\nThe government has announced that temporary legislative duties will be handled by a committee of legal and economic experts until new elections can be organized.\r\n\r\nPublic reactions have been mixed, with some citizens praising the move as “a necessary reset,” while others worry about the lack of parliamentary oversight during the transition period.\r\n\r\nFurther details are expected to be released in the coming days.\r\n\r\n', 'Politics4.jpeg', 2, NULL, '2025-07-26 10:31:07'),
(24, 'Tech Giant Unveils AI Assistant That Can Code Entire Websites in Seconds', 'In a major leap forward for the tech industry, Innovexa Technologies unveiled its latest innovation on Friday: an artificial intelligence assistant capable of designing and coding full-featured websites in under 60 seconds.\r\n\r\nThe assistant, named CodeMate, uses advanced generative AI and real-time user input to create responsive, secure, and fully functional websites with minimal human guidance.\r\n\r\n“Our goal was to break down the barriers between ideas and execution,” said Innovexa CEO Lina Martinez during the launch event in San Francisco. “Whether you\'re a small business owner, a student, or a developer — CodeMate puts the power of web creation in your hands.”\r\n\r\nThe AI can handle HTML, CSS, JavaScript, backend integration, and even generate SEO-optimized content. It also offers users the ability to revise the layout through voice commands or simple prompts.\r\n\r\nWhile some praised the innovation for its potential to revolutionize freelance work and education, others raised concerns about job displacement in the tech sector.\r\n\r\nIn response, Innovexa emphasized that CodeMate is designed to assist, not replace, developers — offering speed, but still relying on human creativity and customization.\r\n\r\nThe assistant will be available in beta next month to selected users worldwide.\r\n\r\n', 'Technology 1.jpeg', 4, NULL, '2025-07-26 10:35:10'),
(25, 'Tech Giant Unveils AI Assistant That Can Code Entire Websites in Seconds', 'In a major leap forward for the tech industry, Innovexa Technologies unveiled its latest innovation on Friday: an artificial intelligence assistant capable of designing and coding full-featured websites in under 60 seconds.\r\n\r\nThe assistant, named CodeMate, uses advanced generative AI and real-time user input to create responsive, secure, and fully functional websites with minimal human guidance.\r\n\r\n“Our goal was to break down the barriers between ideas and execution,” said Innovexa CEO Lina Martinez during the launch event in San Francisco. “Whether you\'re a small business owner, a student, or a developer — CodeMate puts the power of web creation in your hands.”\r\n\r\nThe AI can handle HTML, CSS, JavaScript, backend integration, and even generate SEO-optimized content. It also offers users the ability to revise the layout through voice commands or simple prompts.\r\n\r\nWhile some praised the innovation for its potential to revolutionize freelance work and education, others raised concerns about job displacement in the tech sector.\r\n\r\nIn response, Innovexa emphasized that CodeMate is designed to assist, not replace, developers — offering speed, but still relying on human creativity and customization.\r\n\r\nThe assistant will be available in beta next month to selected users worldwide.\r\n\r\n', 'Technology 3.jpeg', 4, NULL, '2025-07-26 10:35:26'),
(26, 'Tech Giant Unveils AI Assistant That Can Code Entire Websites in Seconds', 'In a major leap forward for the tech industry, Innovexa Technologies unveiled its latest innovation on Friday: an artificial intelligence assistant capable of designing and coding full-featured websites in under 60 seconds.\r\n\r\nThe assistant, named CodeMate, uses advanced generative AI and real-time user input to create responsive, secure, and fully functional websites with minimal human guidance.\r\n\r\n“Our goal was to break down the barriers between ideas and execution,” said Innovexa CEO Lina Martinez during the launch event in San Francisco. “Whether you\'re a small business owner, a student, or a developer — CodeMate puts the power of web creation in your hands.”\r\n\r\nThe AI can handle HTML, CSS, JavaScript, backend integration, and even generate SEO-optimized content. It also offers users the ability to revise the layout through voice commands or simple prompts.\r\n\r\nWhile some praised the innovation for its potential to revolutionize freelance work and education, others raised concerns about job displacement in the tech sector.\r\n\r\nIn response, Innovexa emphasized that CodeMate is designed to assist, not replace, developers — offering speed, but still relying on human creativity and customization.\r\n\r\nThe assistant will be available in beta next month to selected users worldwid', 'Technology2.jpeg', 4, NULL, '2025-07-26 10:35:49'),
(27, 'Star Striker Transfers to Rival Club in Record-Breaking Deal', 'In one of the most talked-about moves of the season, international football star Leo Andrade has officially signed with Capital City FC, leaving his former club Rivergate United after seven successful years.\r\n\r\nThe transfer deal, reportedly worth €130 million, marks the most expensive domestic transfer in the league’s history.\r\n\r\nAndrade, 28, has been a fan favorite at Rivergate, scoring 112 goals and winning three league titles. His sudden move to a rival club has sparked both celebration and outrage across social media.\r\n\r\n“I gave everything I had to Rivergate,” Andrade said during his first press conference with Capital City FC. “But I felt it was time for a new challenge. I’m excited for what’s ahead.”\r\n\r\nThe club\'s manager, Marco D’Alessio, called the signing “a defining moment for our team,” adding that Andrade brings “world-class skill and unmatched leadership.”\r\n\r\nRivergate United has yet to announce a replacement, but sources say they are in talks with two rising stars from South America.\r\n\r\nThe first clash between the two clubs this season is now expected to draw record viewership, as fans await Andrade’s return to his former stadium — this time wearing rival colors.\r\n\r\n', 'sport1.jpeg', 3, NULL, '2025-07-26 10:38:00'),
(28, 'Star Striker Transfers to Rival Club in Record-Breaking Deal', 'In one of the most talked-about moves of the season, international football star Leo Andrade has officially signed with Capital City FC, leaving his former club Rivergate United after seven successful years.\r\n\r\nThe transfer deal, reportedly worth €130 million, marks the most expensive domestic transfer in the league’s history.\r\n\r\nAndrade, 28, has been a fan favorite at Rivergate, scoring 112 goals and winning three league titles. His sudden move to a rival club has sparked both celebration and outrage across social media.\r\n\r\n“I gave everything I had to Rivergate,” Andrade said during his first press conference with Capital City FC. “But I felt it was time for a new challenge. I’m excited for what’s ahead.”\r\n\r\nThe club\'s manager, Marco D’Alessio, called the signing “a defining moment for our team,” adding that Andrade brings “world-class skill and unmatched leadership.”\r\n\r\nRivergate United has yet to announce a replacement, but sources say they are in talks with two rising stars from South America.\r\n\r\nThe first clash between the two clubs this season is now expected to draw record viewership, as fans await Andrade’s return to his former stadium — this time wearing rival colors.\r\n\r\n', 'sport2.jpeg', 3, NULL, '2025-07-26 10:38:28'),
(29, 'Star Striker Transfers to Rival Club in Record-Breaking Deal', 'In one of the most talked-about moves of the season, international football star Leo Andrade has officially signed with Capital City FC, leaving his former club Rivergate United after seven successful years.\r\n\r\nThe transfer deal, reportedly worth €130 million, marks the most expensive domestic transfer in the league’s history.\r\n\r\nAndrade, 28, has been a fan favorite at Rivergate, scoring 112 goals and winning three league titles. His sudden move to a rival club has sparked both celebration and outrage across social media.\r\n\r\n“I gave everything I had to Rivergate,” Andrade said during his first press conference with Capital City FC. “But I felt it was time for a new challenge. I’m excited for what’s ahead.”\r\n\r\nThe club\'s manager, Marco D’Alessio, called the signing “a defining moment for our team,” adding that Andrade brings “world-class skill and unmatched leadership.”\r\n\r\nRivergate United has yet to announce a replacement, but sources say they are in talks with two rising stars from South America.\r\n\r\n', 'sport3.jpeg', 3, NULL, '2025-07-26 10:38:41'),
(30, 'From Refugee to Robotics Engineer: The Inspiring Journey of Amal Khoury', 'At just 26 years old, Amal Khoury is not only breaking barriers in the world of robotics but rewriting the narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by brain signals — a breakthrough that could transform the lives of amputees around the world.\r\n\r\nHer journey wasn’t easy. Between fleeing war, struggling with language barriers, and navigating financial hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.\r\n\r\n“I want every girl who thinks her background defines her to know: it doesn’t. Your future is yours to build.”\r\n\r\nAs her story gains international recognition, Amal continues to focus on what she loves most — building technology that makes a real difference.\r\n\r\n', 'Featured1.jpeg', 5, NULL, '2025-07-26 10:41:21'),
(31, 'From Refugee to Robotics Engineer: The Inspiring Journey of Amal Khoury', 'At just 26 years old, Amal Khoury is not only breaking barriers in the world of robotics but rewriting the narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by brain signals — a breakthrough that could transform the lives of amputees around the world.\r\n\r\nHer journey wasn’t easy. Between fleeing war, struggling with language barriers, and navigating financial hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.\r\n\r\n“I want every girl who thinks her background defines her to know: it doesn’t. Your future is yours to build.”\r\n\r\nAs her story gains international recognition, Amal continues to focus on what she loves most — building technology that makes a real difference.\r\n\r\n', 'Featured2.jpeg', 5, NULL, '2025-07-26 10:41:51'),
(32, 'From Refugee to Robotics Engineer: The Inspiring Journey of Amal Khoury', 'At just 26 years old, Amal Khoury is not only breaking barriers in the world of robotics but rewriting the narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by brain signals — a breakthrough that could transform the lives of amputees around the world.\r\n\r\nHer journey wasn’t easy. Between fleeing war, struggling with language barriers, and navigating financial hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.\r\n\r\n', 'Featured3.jpeg', 5, NULL, '2025-07-26 10:42:06'),
(33, 'Government Approves New Tax Law Amid Public Criticism', ' narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by ', 'Popular4.jpeg', 6, NULL, '2025-07-26 10:44:48'),
(34, 'Massive Fire Erupts in Downtown Market, No Casualties Reported', ' narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by ', 'Popular1.jpeg', 6, NULL, '2025-07-26 10:45:10'),
(35, 'University Students Protest Tuition Hike Across Major Cities', ' hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.', 'Popular2.jpeg', 6, NULL, '2025-07-26 10:45:40'),
(36, 'Government Approves New Tax Law Amid Public Criticism', ' hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.', 'Populaق3.jpeg', 6, NULL, '2025-07-26 10:46:31'),
(37, 'Upgrade Your Style – New Summer Collection Now Available!', ' hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displa', 'Ads1.jpeg', 7, NULL, '2025-07-26 10:48:14'),
(38, 'Limited Offer: 50% Off All Electronics – Shop Now', ' hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displa', 'Ads2.jpeg', 7, NULL, '2025-07-26 10:48:30'),
(39, 'Fresh & Organic – Weekly Grocery Delivery to Your Door', '\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.\r\n\r\n“I want every girl who thinks her background defines her to know: it doesn’t. Your future is yours to build.”\r\n\r\nAs her story gains international recognition, Amal continues to focus on what she loves most — building technology that makes a real difference.\r\n\r\n', 'Ads3.jpeg', 7, NULL, '2025-07-26 10:48:54'),
(40, 'Transform Your Space – Modern Furniture at Unbeatable Prices', '\r\nAt just 26 years old, Amal Khoury is not only breaking barriers in the world of robotics but rewriting the narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by brain signals — a breakthrough that could transform the lives of amputees around the world.\r\n\r\nHer journey wasn’t easy. Between fleeing war, struggling with language barriers, and navigating financial hardships, Amal says perseverance was key.\r\n', 'Ads4.jpeg', 7, NULL, '2025-07-26 10:49:21'),
(41, 'Tech Giant Unveils AI Assistant That Can Code Entire Websites in Seconds', ' narrative for an entire generation of young women from conflict zones.\r\n\r\nBorn in a refugee camp in southern Lebanon, Amal spent her early years surrounded by instability. But even then, her curiosity for machines was unstoppable.\r\n“I used to take apart old radios just to see how they worked,” she recalls with a smile.\r\n\r\nToday, she leads a research team at TechNova Labs in Berlin, where she develops robotic limbs controlled by brain signals — a breakthrough that could transform the lives of amputees around the world.\r\n\r\nHer journey wasn’t easy. Between fleeing war, struggling with language barriers, and navigating financial hardships, Amal says perseverance was key.\r\n“I didn’t have access to many resources, but I had the internet, free online courses, and a dream I refused to give up on.”\r\n\r\nAmal is now a global speaker and a mentor for refugee youth interested in STEM. She recently launched an initiative called \"Code Without Borders\", which provides free training in programming and AI to displaced communities.\r\n\r\n“I want every girl who thinks her background defines her to know: it doesn’t. Your future is yours to build.”\r\n\r\nAs her story gains international recognition, Amal continues to focus on what she loves most — building technology that makes a real difference.\r\n\r\n', 'Politics4.jpeg', 2, NULL, '2025-07-26 11:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(3, 'Sport'),
(2, 'Politics'),
(4, 'Technology'),
(5, 'Featured'),
(6, 'Popular'),
(7, 'Ads');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `article_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment_text` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `user_id`, `comment_text`, `timestamp`) VALUES
(1, 41, 2, 'ddd', '2025-08-01 16:04:04'),
(2, 41, 2, 'ddd', '2025-08-01 16:04:18'),
(3, 41, 2, 'dd', '2025-08-01 16:05:01'),
(4, 41, 2, 'اقاقفل', '2025-08-01 16:47:47'),
(5, 41, 2, 'ببييبي', '2025-08-01 16:48:12'),
(6, 41, 2, 'tttttttt', '2025-08-01 16:49:24'),
(7, 28, 2, 'ddddddd', '2025-08-01 16:50:27'),
(8, 30, 2, 'ssssssssss', '2025-08-01 17:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(2, 'raghad_sami', 'raghad@gmail.com', '$2y$10$xZ.ucjd9kFOEC.32fyuVf..gPbeS6vMQLTUf46/ovq31VQFC8N1Gm', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
