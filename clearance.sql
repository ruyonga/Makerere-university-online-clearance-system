-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 02:55 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `africa`
--

CREATE TABLE IF NOT EXISTS `africa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE IF NOT EXISTS `clearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) NOT NULL,
  `code` text NOT NULL,
  `cl_date` varchar(10) NOT NULL,
  `regnum` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `department`, `code`, `cl_date`, `regnum`) VALUES
(7, 'hall nsibirwa', 'cleared', '15-04-22', '11/U/11749/EVE'),
(8, 'hospital', 'cleared', '15-04-22', '11/U/11749/EVE'),
(9, 'faculty_dean cocis', 'cleared', '', '11/U/11749/EVE');

-- --------------------------------------------------------

--
-- Table structure for table `cleareddate`
--

CREATE TABLE IF NOT EXISTS `cleareddate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cl_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cleareddate`
--

INSERT INTO `cleareddate` (`id`, `regnum`, `department`, `cl_date`) VALUES
(1, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(2, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(3, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(4, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(5, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(6, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(7, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(8, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(9, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(10, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(11, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(12, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(13, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(14, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(15, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(16, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(17, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(18, '11/U/11749/EVE', 'games_union', '2015-03-09'),
(19, '11/U/11749/EVE', 'games_union', '2015-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `secretcode` text NOT NULL,
  `inchargecode` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `secretcode`, `inchargecode`) VALUES
(1, 'games_union', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'hospital', '8b42a1c9b8f9fde869f83c954b3d463b', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'police', '814989b983fd853fb374e1676a06ade4', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'dean', '48767461cb09465362c687ae0c44753b', '48767461cb09465362c687ae0c44753b'),
(5, 'faculty_dean', '9f3f3ec092da377b8e4fe8f14a3c84df', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'finance', '8d98684e08ba01b902f8adddc6b45050', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'lib', 'e8acc63b1e238f3255c900eed37254b8', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'cocis');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(50) NOT NULL,
  `tution` int(9) NOT NULL,
  `bal` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `regnum`, `tution`, `bal`) VALUES
(1, '11/U/11749/EVE', 6000000, 0),
(2, '112/U/11201/PS', 6000000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `games_union`
--

CREATE TABLE IF NOT EXISTS `games_union` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `regnum` varchar(20) NOT NULL,
  `warden` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`, `regnum`, `warden`, `status`) VALUES
(1, 'nsibirwa', 'nsi', 'nsibirwa', '1'),
(2, 'complex', 'comp123', 'complex', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `regnum`, `status`) VALUES
(1, '11/U/11749/EVE', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `lib`
--

CREATE TABLE IF NOT EXISTS `lib` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `satatus` varchar(5) NOT NULL,
  `head` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lib`
--

INSERT INTO `lib` (`id`, `regnum`, `satatus`, `head`) VALUES
(1, '11/U/11749/EVE', 'no', 'libraian');

-- --------------------------------------------------------

--
-- Table structure for table `nsibirwa`
--

CREATE TABLE IF NOT EXISTS `nsibirwa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nsibirwa`
--

INSERT INTO `nsibirwa` (`id`, `regnum`, `status`, `regdate`) VALUES
(1, '11/U/11749/EVE', 'yes', '2015-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE IF NOT EXISTS `police` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regnum` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  `crime` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `regnum` varchar(20) NOT NULL,
  `stdnum` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `games_union` varchar(5) NOT NULL DEFAULT '0',
  `dean` varchar(5) NOT NULL DEFAULT '0',
  `police` varchar(5) NOT NULL DEFAULT '0',
  `hall` varchar(5) NOT NULL DEFAULT '0',
  `hospital` varchar(5) NOT NULL DEFAULT '0',
  `lib` varchar(5) NOT NULL DEFAULT '0',
  `finance` varchar(5) NOT NULL DEFAULT '0',
  `faculty_dean` varchar(5) NOT NULL DEFAULT '0',
  `hall_of_res` varchar(40) NOT NULL,
  `add_date` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `regnum`, `stdnum`, `email`, `faculty`, `course`, `games_union`, `dean`, `police`, `hall`, `hospital`, `lib`, `finance`, `faculty_dean`, `hall_of_res`, `add_date`) VALUES
(1, 'Ruyonga', 'Daniel', '11/U/11749/EVE', 211013442, 'druyonga@gmail.com', 'cocis', 'Computer Science', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '0', 'yes', 'nsibirwa', 2011),
(2, 'Namanda', 'Shamudah', '12/U/11201/PS', 212013247, 'sh@gmail.com', 'COCIS', 'Information Systems', 'yes', '0', '0', '0', '0', '0', '0', '0', 'Africa', 2012);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
