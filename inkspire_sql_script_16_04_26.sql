-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 10:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inkspire`
--
CREATE DATABASE IF NOT EXISTS `inkspire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inkspire`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_ID` int(11) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_descritption` mediumtext NOT NULL,
  `genre_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `books`:
--   `author_ID`
--       `login` -> `ID`
--   `genre_ID`
--       `ganre` -> `ID`
--

--
-- Dumping data for table `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_chapters`
--

DROP TABLE IF EXISTS `books_chapters`;
CREATE TABLE `books_chapters` (
  `ID` int(11) NOT NULL,
  `Chapter_Nmbr` int(11) NOT NULL,
  `Chapter_name` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Image_url` varchar(255) NOT NULL,
  `books_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `books_chapters`:
--   `books_ID`
--       `books` -> `ID`
--

--
-- Dumping data for table `books_chapters`
--


-- --------------------------------------------------------

--
-- Table structure for table `ganre`
--

DROP TABLE IF EXISTS `ganre`;
CREATE TABLE `ganre` (
  `ID` int(11) NOT NULL,
  `ganre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `ganre`:
--

--
-- Dumping data for table `ganre`
--

INSERT INTO `ganre` (`ID`, `ganre_name`) VALUES
(1, 'Fantasy'),
(2, 'Science Fiction'),
(3, 'Dystopian'),
(5, 'Mystery'),
(6, 'Horror'),
(7, 'Historical Fiction'),
(8, 'Romance'),
(9, 'Short Story'),
(10, 'Children’s'),
(11, 'Memoir & Autobiography'),
(12, 'Biography'),
(13, 'Self-help'),
(14, 'History'),
(15, 'Travel'),
(16, 'True Crime'),
(17, 'Humor'),
(18, 'Guide - How-to '),
(19, 'Religion & Spirituality'),
(20, 'Humanities & Social Sciences'),
(21, 'Parenting & Families'),
(22, 'Science & Technology');

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_login`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `get_login`;
CREATE TABLE `get_login` (
`ID` int(11)
,`username` varchar(255)
,`password` varchar(255)
,`ID_role` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ID_role` int(11) NOT NULL,
  `View_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `login`:
--   `ID_role`
--       `role` -> `RoleID`
--


-- --------------------------------------------------------

--
-- Table structure for table `mm_chapters`
--

DROP TABLE IF EXISTS `mm_chapters`;
CREATE TABLE `mm_chapters` (
  `ID` int(11) DEFAULT NULL,
  `short_name` varchar(256) NOT NULL,
  `chapter_Description` text NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `mm_chapters`:
--   `book_id`
--       `books` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_characters`
--

DROP TABLE IF EXISTS `mm_characters`;
CREATE TABLE `mm_characters` (
  `ID` int(11) NOT NULL,
  `Character_name` varchar(255) NOT NULL,
  `Character_descript` text NOT NULL,
  `books_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `mm_characters`:
--   `books_ID`
--       `books` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_ideas`
--

DROP TABLE IF EXISTS `mm_ideas`;
CREATE TABLE `mm_ideas` (
  `ID` int(11) NOT NULL,
  `short_idea` varchar(256) NOT NULL,
  `description` tinytext NOT NULL,
  `book_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `mm_ideas`:
--   `book_ID`
--       `books` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_places`
--

DROP TABLE IF EXISTS `mm_places`;
CREATE TABLE `mm_places` (
  `ID` int(11) NOT NULL,
  `Place_Name` varchar(256) NOT NULL,
  `Place_description` text NOT NULL,
  `book_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `mm_places`:
--   `book_ID`
--       `books` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `role`:
--

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `role`) VALUES
(1, 'Administrator'),
(2, 'Writer'),
(3, 'Reader'),
(4, 'Guest');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_role`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_role`;
CREATE TABLE `view_role` (
`RoleID` int(11)
,`role` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `get_login` exported as a table
--
DROP TABLE IF EXISTS `get_login`;
CREATE TABLE`get_login`(
    `ID` int(11) NOT NULL,
    `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `ID_role` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Structure for view `view_role` exported as a table
--
DROP TABLE IF EXISTS `view_role`;
CREATE TABLE`view_role`(
    `RoleID` int(11) NOT NULL,
    `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `book_name` (`book_name`),
  ADD KEY `role_2_book` (`genre_ID`),
  ADD KEY `login_2_book` (`author_ID`);

--
-- Indexes for table `books_chapters`
--
ALTER TABLE `books_chapters`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bookID_2_BooksChapter` (`books_ID`);

--
-- Indexes for table `ganre`
--
ALTER TABLE `ganre`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_role` (`ID_role`);

--
-- Indexes for table `mm_chapters`
--
ALTER TABLE `mm_chapters`
  ADD KEY `mmChapter_2_book` (`book_id`);

--
-- Indexes for table `mm_characters`
--
ALTER TABLE `mm_characters`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `characters_2_book` (`books_ID`);

--
-- Indexes for table `mm_ideas`
--
ALTER TABLE `mm_ideas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `book_2_ideas` (`book_ID`);

--
-- Indexes for table `mm_places`
--
ALTER TABLE `mm_places`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Book_2_mmPlace` (`book_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `books_chapters`
--
ALTER TABLE `books_chapters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ganre`
--
ALTER TABLE `ganre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mm_characters`
--
ALTER TABLE `mm_characters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mm_ideas`
--
ALTER TABLE `mm_ideas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mm_places`
--
ALTER TABLE `mm_places`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `login_2_book` FOREIGN KEY (`author_ID`) REFERENCES `login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_2_book` FOREIGN KEY (`genre_ID`) REFERENCES `ganre` (`ID`);

--
-- Constraints for table `books_chapters`
--
ALTER TABLE `books_chapters`
  ADD CONSTRAINT `bookID_2_BooksChapter` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `test` FOREIGN KEY (`ID_role`) REFERENCES `role` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mm_chapters`
--
ALTER TABLE `mm_chapters`
  ADD CONSTRAINT `mmChapter_2_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mm_characters`
--
ALTER TABLE `mm_characters`
  ADD CONSTRAINT `characters_2_book` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mm_ideas`
--
ALTER TABLE `mm_ideas`
  ADD CONSTRAINT `book_2_ideas` FOREIGN KEY (`book_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mm_places`
--
ALTER TABLE `mm_places`
  ADD CONSTRAINT `Book_2_mmPlace` FOREIGN KEY (`book_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table books
--

--
-- Metadata for table books_chapters
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'inkspire', 'books_chapters', '{\"CREATE_TIME\":\"2025-02-23 07:06:07\",\"col_order\":[0,2,3,4,1,5],\"col_visib\":[1,1,1,1,1,1]}', '2025-03-05 05:39:13');

--
-- Metadata for table ganre
--

--
-- Metadata for table get_login
--

--
-- Metadata for table login
--

--
-- Metadata for table mm_chapters
--

--
-- Metadata for table mm_characters
--

--
-- Metadata for table mm_ideas
--

--
-- Metadata for table mm_places
--

--
-- Metadata for table role
--

--
-- Metadata for table view_role
--

--
-- Metadata for database inkspire
--
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
