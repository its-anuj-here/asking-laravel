-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 08:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askiladd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_views` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_name`, `cat_desc`, `cat_id`, `cat_views`) VALUES
('Internet Tech', 'Internet refers to network of networks. In this network each computer is recognized by a globally unique address known as IP address. A special computer DNS (Domain Name Server) is used to give name t', 1, 30),
('Data Science', 'Data science is an interdisciplinary field that uses scientific methods, processes, algorithms and systems to extract or extrapolate knowledge and insights from noisy, structured and unstructured data', 2, 17),
('Microprocessors', 'A microprocessor is a computer processor where the data processing logic and control is included on a single integrated circuit, or a small number of integrated circuits.', 3, 1),
('Machine Learning', 'Machine science is an interdisciplinary field that uses scientific methods, processes, algorithms and systems to r extrapolate knowledge and insights from noisy, structured and unstructured data', 4, 1),
('Python Language', 'Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together. Python\'s simple, easy to learn syntax emphasizes readability and therefore reduces the cost of program maintenance. Python supports modules and packages, which encourages program modularity and code reuse. The Python interpreter and the extensive standard library are available in source or binary form without charge for all major platforms, and can be freely distributed.', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `votedByUsers` text NOT NULL,
  `queryid` int(11) NOT NULL,
  `tstamp` datetime DEFAULT current_timestamp(),
  `commentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userid`, `comment`, `votes`, `votedByUsers`, `queryid`, `tstamp`, `commentid`) VALUES
(12, 'Hahahahahahaha', -3, '', 5, '2022-11-04 12:17:28', 3),
(12, 'Hahaha', 1, '', 10, '2022-11-05 11:22:51', 8);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fid` int(50) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email` text NOT NULL,
  `message` text NOT NULL,
  `receiving_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fid`, `sender_name`, `sender_email`, `message`, `receiving_date`) VALUES
(1, 'Anuj', 'anuj@kmv', 'Trying to send a feedback', '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `user_id` varchar(20) NOT NULL,
  `query_id` int(11) NOT NULL,
  `query_title` varchar(50) NOT NULL,
  `query_desc` varchar(300) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `votedByUser` text NOT NULL,
  `query_views` int(100) NOT NULL DEFAULT 0,
  `query_cat` varchar(20) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`user_id`, `query_id`, `query_title`, `query_desc`, `votes`, `votedByUser`, `query_views`, `query_cat`, `tstamp`) VALUES
('12', 5, 'What is Data Science?', 'Can anyone explain me in simple English language about it?', 3, '', 55, '2', '2022-11-05 10:12:27'),
('12', 6, 'Question papers', 'Need recent question papers for exam preps', 0, '', 1, '3', '2022-11-05 10:12:27'),
('12', 7, 'Where to start?', 'Hey! I want to learn Python. can anyone tell me where to start', 0, '', 21, '5', '2022-11-05 10:12:27'),
('12', 8, 'Where to start?', 'Hey! I want to learn Python. can anyone tell me where to start', 0, '', 30, '1', '2022-11-05 10:12:27'),
('12', 10, 'Checking Out', 'New Query of mine', 2, '', 21, '2', '2022-11-05 11:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usid` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usid`, `username`, `password`, `timestamp`) VALUES
(12, 'its_anuj', '$2y$10$cx5GPzZRkj69MGc9be9Wpu4hqgSNtOPGVBegy5T3rINPbZOKgxS/.', '2022-11-02 16:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
