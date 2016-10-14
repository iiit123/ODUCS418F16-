-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2016 at 09:33 PM
-- Server version: 5.7.13
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_programming`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `ques_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `answer`, `ques_id`, `user_id`, `is_correct`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, '<p><span style="color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 13px;">Not limited to this, the fact is that the Chinese native speakers are very puzzled at the usage of these two words.</span></p>', 11, 1, 0, '2016-10-01 14:54:56', NULL, NULL),
(9, '<p><span style="font-family: Verdana, sans-serif; font-size: 15px;">Then, if we run the following SQL statement (that contains an INNER JOIN):</span></p>', 11, 1, 0, '2016-10-06 15:13:22', NULL, NULL),
(10, '<p>tggjvhghvghvbhjjbh,jbh,j,bh,jb,hjbhjbhjbhjbbhj</p>', 11, 1, 1, '2016-10-06 22:33:01', NULL, NULL),
(11, '<p>aslkalkndklnaskndsflknsflksldkfsdnklfnklsdfknfdls</p>', 11, 1, 0, '2016-10-07 16:34:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `ans_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `like_flag` int(11) NOT NULL DEFAULT '0',
  `star_flag` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `ques_id`, `ans_id`, `user_id`, `like_flag`, `star_flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 11, NULL, 1, 1, 1, '2016-10-06 02:48:35', NULL, NULL),
(8, 13, NULL, 1, 1, 1, '2016-10-07 15:46:04', NULL, NULL),
(9, 12, NULL, 1, -1, 0, '2016-10-07 16:34:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `vote_type` enum('upvote','downvote','right_ans') NOT NULL,
  `user_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ques_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `question` longtext NOT NULL,
  `tags` mediumtext NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `likes_count` int(11) NOT NULL DEFAULT '0',
  `answers_count` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `title`, `question`, `tags`, `views`, `user_id`, `likes_count`, `answers_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Native IOS app and node.js', '								', 'ios,node,native', 40, 1, 1, 4, '2016-10-04 01:50:59', NULL, NULL),
(12, 'Phonegap with node.js', '<div class="post-text" itemprop="text" style="margin: 0px 0px 5px; padding: 0px; border: 0px; font-size: 15px; width: 660px; word-wrap: break-word; line-height: 1.3; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;"><p style="margin-bottom: 1em; padding: 0px; border: 0px; clear: both;">I am developing an IOS app using phone gap and I would like to use node.js for part of it. Is it feasable to get phonegap to run an instance of node.js along side the rest of the app?</p></div>', 'javascript,ios,node', 11, 1, -1, 0, '2016-10-06 01:52:23', NULL, NULL),
(13, 'Server side javascript - General [duplicate]', '<div class="post-text" itemprop="text" style="margin: 0px 0px 5px; padding: 0px; border: 0px; font-size: 15px; width: 660px; word-wrap: break-word; line-height: 1.3; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;"><p style="margin-bottom: 1em; padding: 0px; border: 0px; clear: both;">What is the correct scenario to use server side javascript? like node.js What kind of problems it solves?</p><div><br></div></div>', 'node,javascript', 10, 1, 1, 0, '2016-10-08 01:53:06', NULL, NULL),
(14, 'How redirect to HTTPS using DNS server?', '<p style="margin-bottom: 1em; padding: 0px; border: 0px; font-size: 15px; clear: both; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;">I use the openDNS servers : 208.67.222.123 / 208.67.220.123 as DNS provider for my PC.</p><p style="margin-bottom: 1em; padding: 0px; border: 0px; font-size: 15px; clear: both; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;">When I go to an inappropriate http:// (adult content), I got redirected to https:// open dns site.</p><p style="margin-bottom: 1em; padding: 0px; border: 0px; font-size: 15px; clear: both; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;">I just wonder how a DNS server can redirect from HTTP to HTTPS content ?</p><p style="margin-bottom: 1em; padding: 0px; border: 0px; font-size: 15px; clear: both; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;">(and eventually How to disable that ?)</p>', 'dns,https', 5, 1, 0, 0, '2016-10-08 02:42:54', NULL, NULL),
(15, 'Replace AJAX calls to websockets?', '								', 'php,ajax,sockets,websockets', 2, 1, 0, 0, '2016-10-06 02:47:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `gender`, `dob`, `nick_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'cs518pa$$', 'm', '08/10/1992', 'admin', '2016-09-18 19:57:03', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `ans_id` (`ans_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `receiver_id` (`user_id`),
  ADD KEY `notification_id` (`notification_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `questions` (`ques_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `questions` (`ques_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`ans_id`) REFERENCES `answers` (`ans_id`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`ques_id`) REFERENCES `questions` (`ques_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
