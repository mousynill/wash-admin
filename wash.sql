-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 10:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wash`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegisterAdmin` (`email` VARCHAR(200), `FirstName` VARCHAR(50), `LastName` VARCHAR(50), `UserName` VARCHAR(50), `UserPassword` VARCHAR(50))  INSERT INTO admin(Email, FirstName, LastName, UserName, UserPassword) VALUES (@email, @FirstName, @LastName, @UserName, @UserPassword)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comicchaptertable`
--

CREATE TABLE `comicchaptertable` (
  `seriesID` int(11) NOT NULL,
  `chapterNo` int(11) NOT NULL,
  `chapterTitle` varchar(255) NOT NULL,
  `chapterPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comicstable`
--

CREATE TABLE `comicstable` (
  `SeriesID` int(11) NOT NULL,
  `ComicFilename` varchar(250) DEFAULT NULL,
  `ComicTitle` varchar(250) DEFAULT NULL,
  `ComicAuthor` varchar(250) DEFAULT NULL,
  `ComicDescription` varchar(250) DEFAULT NULL,
  `ComicSize` int(11) DEFAULT NULL,
  `ComicThumbnailPath` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comicstable`
--

INSERT INTO `comicstable` (`SeriesID`, `ComicFilename`, `ComicTitle`, `ComicAuthor`, `ComicDescription`, `ComicSize`, `ComicThumbnailPath`) VALUES
(1, 'try.jpg', 'fdfs', 'sdfasdf', 'asdfsfsdf', 372150, 'thumbnails/comics/5b693521853db2.79175713.jpg'),
(2, 'try.jpg', 'oks na', 'asd', 'asd', 372150, 'thumbnails/comics/5b69366142a752.42206489.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `parasite`
--

CREATE TABLE `parasite` (
  `ParasiteCode` char(4) NOT NULL,
  `ParasiteName` varchar(25) NOT NULL,
  `Severity` varchar(20) NOT NULL,
  `Population` int(4) NOT NULL,
  `ParasiteCount` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parasite`
--

INSERT INTO `parasite` (`ParasiteCode`, `ParasiteName`, `Severity`, `Population`, `ParasiteCount`) VALUES
('ANCY', '0', 'Ancylostoma', 0, '0.00'),
('ASCA', '0', 'Ascaris', 0, '0.00'),
('CRYP', '0', 'Cryptosporidium', 0, '0.00'),
('GIAR', '0', 'Giarda', 0, '0.00'),
('TRIC', '0', 'Trichuris', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `trychaptertable`
--

CREATE TABLE `trychaptertable` (
  `seriesID` int(11) NOT NULL,
  `chapterNo` int(11) NOT NULL,
  `chapterTitle` varchar(255) NOT NULL,
  `chapterPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trychaptertable`
--

INSERT INTO `trychaptertable` (`seriesID`, `chapterNo`, `chapterTitle`, `chapterPath`) VALUES
(1, 1, 'Superman Re', 'uploads/com'),
(1, 2, 'Meet Louis ', 'uploads/com'),
(2, 1, 'Barry Allen', 'uploads/com'),
(2, 2, 'Unexpected ', 'uploads/com'),
(2, 0, '', 'uploads/com'),
(2, 0, '', 'uploads/com'),
(2, 0, '', 'uploads/comics/5b731918236167.84738615.jpg'),
(2, 3, 'dasd', 'uploads/comics/5b73193b4d7c06.95853412.jpg'),
(2, 0, '', 'uploads/comics/5b7326481e6ce4.84405163.jpg'),
(2, 0, '', 'uploads/comics/5b7326c506de02.16449786.jpg'),
(2, 0, '', 'uploads/comics/5b7326eeee8f08.38369151.jpg'),
(2, 3, 's12312', 'uploads/comics/5b7326fa0715a3.51516118.jpg'),
(2, 5, 'dasdasd', 'uploads/comics/5b73270e495bc6.43546797.jpg'),
(2, 5, 'dasdasd', 'uploads/comics/5b73272ec4e810.63104680.jpg'),
(1, 0, 'qweqwe', 'uploads/comics/5b732753889d32.49771571.jpg'),
(1, 69, 'rnill', 'uploads/comics/5b73277fc63932.56257848.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(2, 'Allan', 'Luartes', 'lan.luartes@gmail.com', 'pupistr', 'superuser');

-- --------------------------------------------------------

--
-- Table structure for table `videostable`
--

CREATE TABLE `videostable` (
  `IdNo` int(11) NOT NULL,
  `VideoFileName` varchar(50) NOT NULL,
  `VideoTitle` varchar(40) NOT NULL,
  `VideoAuthor` varchar(40) NOT NULL,
  `VideoDescription` varchar(150) NOT NULL,
  `VideoPath` varchar(250) NOT NULL,
  `VideoSize` int(11) NOT NULL,
  `thumbnailPath` varchar(250) NOT NULL,
  `viewCount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videostable`
--

INSERT INTO `videostable` (`IdNo`, `VideoFileName`, `VideoTitle`, `VideoAuthor`, `VideoDescription`, `VideoPath`, `VideoSize`, `thumbnailPath`, `viewCount`) VALUES
(1, 'tryvideo.mp4', 'try video', 'wadu hek', 'ASDFASDF', 'uploads/videos/5b692d6adaeb30.92329603.mp4', 1616419, 'thumbnails/1.jpg', 0),
(2, 'tryvideo.mp4', 'asdasd', 'asdasd', 'asdasd', 'uploads/videos/5b6db51a31ea14.04861687.mp4', 1616419, 'thumbnails/2.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comicchaptertable`
--
ALTER TABLE `comicchaptertable`
  ADD PRIMARY KEY (`seriesID`,`chapterNo`);

--
-- Indexes for table `comicstable`
--
ALTER TABLE `comicstable`
  ADD PRIMARY KEY (`SeriesID`);

--
-- Indexes for table `parasite`
--
ALTER TABLE `parasite`
  ADD PRIMARY KEY (`ParasiteCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videostable`
--
ALTER TABLE `videostable`
  ADD PRIMARY KEY (`IdNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comicstable`
--
ALTER TABLE `comicstable`
  MODIFY `SeriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videostable`
--
ALTER TABLE `videostable`
  MODIFY `IdNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comicchaptertable`
--
ALTER TABLE `comicchaptertable`
  ADD CONSTRAINT `FK_COMICSTABLE` FOREIGN KEY (`seriesID`) REFERENCES `comicstable` (`SeriesID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
