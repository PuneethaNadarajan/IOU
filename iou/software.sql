-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2014 at 03:36 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `software`
--
CREATE DATABASE `software` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `software`;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `group_code` varchar(13) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`group_code`, `name`, `email`, `amount`) VALUES
('', 'meenu', 'meenu@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `group_code` varchar(13) DEFAULT NULL,
  `purpose` text,
  `amount` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`group_code`, `purpose`, `amount`, `name`, `email`) VALUES
('121', 'food', 2500, 'nagendra', 'nagendranegi@gmail.com'),
('121', 'food', 2500, 'nagendra', 'nagendranegi@gmail.com'),
('121', 'food', 2147483647, 'nagendra', 'nagendranegi@gmail.com'),
('', 'food', 15000, 'meenu', 'meenu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE IF NOT EXISTS `group_info` (
  `group_code` varchar(20) NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gname` varchar(30) NOT NULL,
  `gid` varchar(30) NOT NULL,
  `creationDate` varchar(20) NOT NULL,
  `groupLeader` varchar(30) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gname`, `gid`, `creationDate`, `groupLeader`) VALUES
('', '', '2014-04-16', 'meenu@gmail.com'),
('mca', '121', '2014-04-01', 'nagendranegi@gmail.com'),
('mbbs', '122333', '2014-04-15', 'n'),
('mba', '123', '2014-04-10', 'nagendranegi@gmail.com'),
('airforce', 'airforce', '2014-04-16', 'meenu@gmail.com'),
('navy', 'navy', '2014-04-02', 'meenu@gmail.com'),
('airforce', 'negi', '2014-04-08', 'meenu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `group_code` varchar(13) NOT NULL DEFAULT '',
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_code`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`group_code`, `name`, `email`) VALUES
('', 'meenu', 'meenu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `repay_details`
--

CREATE TABLE IF NOT EXISTS `repay_details` (
  `group_code` varchar(25) NOT NULL,
  `payer` varchar(25) NOT NULL,
  `payee` varchar(25) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repay_details`
--

INSERT INTO `repay_details` (`group_code`, `payer`, `payee`, `amount`) VALUES
('negi', 'nagendra', '', 1750),
('negi', 'nagendra', '', 0),
('airforce', 'meenu', '', 0),
('airforce', 'meenu', '', 0),
('airforce', 'meenu', '', 0),
('mmm', 'meenu', '', 0),
('navy', 'meenu', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`fname`, `lname`, `password`, `email`, `sex`) VALUES
('', '', '', '', ''),
('meenu', 'jindal', 'meenu', 'meenu@gmail.com', 'female'),
('jbjb', '', 'jj', 'n', 'male'),
('nagendra', 'negi', 'nagendara', 'nagendranegi@gmail.com', 'male'),
('puneetha', 'jindal', 'puneetha', 'puneetha@gmail.com', 'female');
