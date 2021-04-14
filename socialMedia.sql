-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 12:20 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialMedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postid` int(11) NOT NULL,
  `messages` varchar(140) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `times`, `postid`, `messages`, `userid`) VALUES
(128, '2020-10-28 22:19:17', 210, 'hi', 1),
(129, '2020-10-28 22:23:16', 211, 'hi', 1),
(130, '2020-10-28 22:24:11', 212, 'hi', 8),
(131, '2020-10-28 22:24:19', 213, 'hi', 8),
(132, '2020-10-28 22:26:00', 215, 'hi', 12),
(133, '2020-10-28 22:26:06', 216, 'hi', 12),
(134, '2020-10-28 22:26:48', 217, 'hi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeid`, `userid`, `postid`, `liked`) VALUES
(102, 8, 211, 1),
(103, 8, 210, 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `messageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `usermsgid` int(11) NOT NULL,
  `msgC` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL,
  `clockt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`messageid`, `userid`, `usermsgid`, `msgC`, `seen`, `clockt`) VALUES
(288, 12, 1, 'hey', 1, '2020-10-28 22:26:19'),
(289, 1, 12, 'hi', 0, '2020-10-28 22:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notId` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `seconduser` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `notType` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `pinpoint` int(11) NOT NULL,
  `timey` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notId`, `userid`, `seconduser`, `postid`, `notType`, `seen`, `pinpoint`, `timey`) VALUES
(315, 1, 8, 210, 1, 1, 103, '2020-10-28 22:27:24'),
(316, 1, 8, 211, 1, 1, 102, '2020-10-28 22:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL,
  `rts` int(11) NOT NULL,
  `timey` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `userid`, `msg`, `likes`, `rts`, `timey`) VALUES
(210, 1, 'Hi', 1, 1, '2020-10-28 22:19:17'),
(211, 1, 'This is my first real tweet!', 1, 0, '2020-10-28 22:23:16'),
(212, 8, 'I love the yankees!', 0, 0, '2020-10-28 22:24:11'),
(213, 8, 'This is my second tweet!', 0, 0, '2020-10-28 22:24:19'),
(214, 8, 'HiID=210', 0, 0, '2020-10-28 22:24:42'),
(215, 12, 'I am the goat!!', 0, 0, '2020-10-28 22:26:00'),
(216, 12, 'love the ufc!', 0, 0, '2020-10-28 22:26:06'),
(217, 11, 'Love playing OF for the yankees!', 0, 0, '2020-10-28 22:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `retweets`
--

CREATE TABLE `retweets` (
  `rtid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retweets`
--

INSERT INTO `retweets` (`rtid`, `userid`, `postid`) VALUES
(107, 8, 210);

-- --------------------------------------------------------

--
-- Table structure for table `userFollows`
--

CREATE TABLE `userFollows` (
  `followid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `whotheyfollow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userFollows`
--

INSERT INTO `userFollows` (`followid`, `userid`, `whotheyfollow`) VALUES
(88, 1, 8),
(89, 8, 1),
(90, 1, 12),
(91, 12, 1),
(92, 11, 1),
(93, 1, 11),
(94, 11, 8),
(95, 8, 11),
(96, 8, 12),
(97, 12, 8),
(98, 11, 12),
(99, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(10000) NOT NULL,
  `picc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstName`, `lastName`, `email`, `pass`, `picc`) VALUES
(1, 'SOKOL', 'SHERI', 'sok@aol.com', '059e2fe9d5caa170ea34025ad505067fac8481b9', 2),
(8, 'AARON', 'JUDGE', 'ajudge@yankees.com', '059e2fe9d5caa170ea34025ad505067fac8481b9', 3),
(11, 'AARON', 'HICKS', 'ahicks@yankees.com', '059e2fe9d5caa170ea34025ad505067fac8481b9', 1),
(12, 'JON', 'JONES', 'jbones@ufc.com', '059e2fe9d5caa170ea34025ad505067fac8481b9', 3),
(17, 'GEORGE', 'CLOONEY', 'clooney@casamigos.com', '059e2fe9d5caa170ea34025ad505067fac8481b9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `LikeID` (`likeid`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD UNIQUE KEY `PostID` (`postid`),
  ADD KEY `PostID_2` (`postid`);

--
-- Indexes for table `retweets`
--
ALTER TABLE `retweets`
  ADD PRIMARY KEY (`rtid`);

--
-- Indexes for table `userFollows`
--
ALTER TABLE `userFollows`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `retweets`
--
ALTER TABLE `retweets`
  MODIFY `rtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `userFollows`
--
ALTER TABLE `userFollows`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
