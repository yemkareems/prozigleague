-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 11:33 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `uri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `firstName`, `lastName`, `uri`) VALUES
(1, 'Sachin', 'Tendulkar', 'img/player/sachin.jpg'),
(2, 'Sadagopan', 'Ramesh', 'img/player/sachin.jpg'),
(3, 'Wasim', 'Akram', 'img/player/sachin.jpg'),
(4, 'Waqar', 'Younis', 'img/player/sachin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `uri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `uri`) VALUES
(1, 'India', 'img/team/india.jpg'),
(2, 'Pakistan', 'img/team/pakistan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team_player_mapping`
--

CREATE TABLE `team_player_mapping` (
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_player_mapping`
--

INSERT INTO `team_player_mapping` (`team_id`, `player_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_player_mapping`
--
ALTER TABLE `team_player_mapping`
  ADD KEY `team_id` (`team_id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;