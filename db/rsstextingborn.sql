-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2017 at 06:51 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsstextingborn`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(255) DEFAULT NULL,
  `C_phone` varchar(50) DEFAULT NULL,
  `last_message_date` datetime DEFAULT NULL,
  `is_replied` enum('0','1') NOT NULL DEFAULT '1',
  `C_vis` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`C_id`, `C_name`, `C_phone`, `last_message_date`, `is_replied`, `C_vis`) VALUES
(12, 'Scott Osborn', '+13108096967', '2016-12-06 13:05:42', '1', 1),
(11, 'sanjeet', '+919477989708', '2016-11-09 23:20:22', '1', 1),
(13, 'Jaime Sanders', '+14083387208', '2016-12-16 15:34:27', '0', 1),
(14, 'Jaime Sanders', '+114083387208', '2016-11-01 15:26:13', '1', 1),
(15, 'Nancy Osborn', '+13108720576', '2016-11-01 17:54:56', '1', 1),
(16, 'S Kumar', '+918902152640', '2016-11-03 19:49:34', '1', 1),
(17, 'Steve Fowler', '+12484594664', '2016-11-17 18:05:02', '0', 1),
(18, 'Maureen McKenna', '+1310-508-9780', '2016-11-14 08:43:44', '1', 1),
(19, 'Melissa Osborn', '+13108720409', '2016-12-28 08:21:50', '1', 1),
(20, 'S Kumar', '+1+918902152640', '2016-11-14 00:45:13', '1', 1),
(21, 'Brianna Matthews', '+1310-982-8860', '2016-11-14 08:41:31', '1', 1),
(22, 'Rachel Malerich', '+13104096600', '2016-11-15 09:39:01', '1', 1),
(23, 'Nobuo Oshikiri', '+14243796277', '2016-11-17 10:56:47', '1', 1),
(24, 'Blake Webster', '+13109471251', '2016-11-18 09:31:52', '1', 1),
(25, 'Matt Savido', '+1310-344-0889', '2016-11-23 09:11:38', '1', 1),
(26, 'Angela Lai', '+13104902899', '2016-11-23 09:21:29', '1', 1),
(27, 'Brett Beachler', '+13096486607', '2016-11-28 12:12:32', '0', 1),
(28, 'Greg Wood', '+13236690710', '2016-12-05 10:16:52', '1', 1),
(29, 'Anne Goddard', '+13103650779', '2016-12-05 10:58:04', '0', 1),
(30, 'Annie Eastwood', '+18189836112', '2016-12-05 10:17:54', '1', 1),
(31, 'Bethany Schwerdtfeger', '+13108095452', '2016-12-06 09:48:40', '0', 1),
(32, 'Caller', '+13103032530', '2016-12-09 06:55:51', '1', 1),
(33, 'Dimitri Patakidis', '+16617134572', '2016-12-09 18:13:07', '1', 1),
(34, 'Don Gould', '+13108720921', '2016-12-12 10:15:38', '1', 1),
(35, 'Robert Cook', '+13109896600', '2016-12-12 13:19:27', '1', 1),
(36, 'Mike Leoni', '+13108773532', '2016-12-12 13:56:46', '1', 1),
(37, 'Carol Cotter', '+13106976861', '2016-12-12 14:56:13', '1', 1),
(38, 'Linda Bannick', '+13109855378', '2016-12-12 16:28:53', '1', 1),
(39, 'Jeff Donnelly', '+14077663781', '2016-12-14 18:12:44', '0', 1),
(40, 'Joseph Tillotson', '+1310-720-0174', '2016-12-13 12:55:39', '1', 1),
(41, 'Margaret Stout', '+13108190595', '2016-12-13 15:53:38', '1', 1),
(42, 'Kirsten Leetch', '+13107532095', '2016-12-13 16:13:06', '1', 1),
(43, 'Tony', '+14154545162', '2016-12-15 10:20:56', '0', 1),
(44, 'Harry and Denise Boxer', '+13107170004', '2016-12-15 08:05:21', '1', 1),
(45, 'Marina Braff', '+19517600691', '2016-12-15 08:39:43', '1', 1),
(46, 'Ashley Barril', '+13108195006', '2016-12-15 12:49:37', '1', 1),
(47, 'Grace Barril', '+16572597854', '2016-12-15 11:49:48', '1', 1),
(48, 'Katherine Martini', '+16614330458', '2016-12-16 09:06:18', '1', 1),
(49, 'Mike Cveyich', '+13107457031', '2016-12-15 14:37:36', '1', 1),
(50, 'Jason Usow', '+13104205959', '2016-12-16 09:45:49', '1', 1),
(51, 'Pat Kelleher', '+13107014180', '2016-12-16 12:13:49', '1', 1),
(52, 'Moorea Smith', '+13109558627', '2016-12-16 15:16:40', '1', 1),
(53, 'Alexander Wong', '+13109890635', '2016-12-16 15:18:58', '1', 1),
(54, 'Kori Coates', '+13102920106', '2016-12-20 11:58:13', '1', 1),
(55, 'Ardyn Wallo', '+15628848545', '2016-12-23 08:36:43', '0', 1),
(56, 'Lindsay Osborn', '+13108092113', '2016-12-28 08:21:32', '1', 1),
(57, 'scot', '+1923338080120', '2017-01-16 11:53:36', '1', 1),
(58, 'scot', '+923338080120', '2017-01-17 03:43:55', '1', 1),
(59, 'scot2', '+17604375816', '2017-01-17 03:54:36', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE IF NOT EXISTS `contact_message` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `message` text,
  `media_file` varchar(255) DEFAULT NULL,
  `message_time` datetime DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_at` datetime NOT NULL,
  `type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=>send, 2=>received',
  `webnotification` enum('0','1') NOT NULL DEFAULT '0',
  `M_vis` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `contact_id`, `message`, `media_file`, `message_time`, `status`, `added_at`, `type`, `webnotification`, `M_vis`) VALUES
(11, 11, 'Will you be needing a ride?', '', '2016-11-08 10:07:00', '1', '2016-11-08 22:25:10', '1', '0', 1),
(12, 11, 'what you think?', '', NULL, '1', '2016-11-01 09:39:56', '1', '0', 1),
(13, 11, 'no nothing', '', NULL, '1', '2016-11-01 09:42:39', '1', '0', 1),
(14, 11, 'where are you?', '', NULL, '1', '2016-11-01 09:45:21', '1', '0', 1),
(15, 11, 'In kolkata', '', NULL, '1', '2016-11-01 09:47:35', '1', '0', 1),
(16, 11, 'In kolkata, west bengal', '', NULL, '1', '2016-11-01 09:48:34', '1', '0', 1),
(17, 12, 'We have some questions. Please call us at (310) 698-5143', '', NULL, '1', '2016-11-01 14:30:01', '1', '0', 1),
(18, 13, 'Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', '', NULL, '1', '2016-11-01 14:57:22', '1', '0', 1),
(19, 14, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', '', NULL, '1', '2016-11-01 15:26:13', '1', '0', 1),
(20, 15, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', '', NULL, '1', '2016-11-01 17:54:56', '1', '0', 1),
(21, 14, 'Please call us as soon as possible. Your car is on fire.', '', NULL, '1', '2016-11-01 18:01:41', '1', '0', 1),
(22, 15, 'Please call us as soon as possible.', '', NULL, '1', '2016-11-01 18:10:06', '1', '0', 1),
(23, 12, '1001 S Pacific Coast Hwy', '', NULL, '1', '2016-11-01 22:17:46', '1', '0', 1),
(24, 15, 'test', '', NULL, '1', '2016-11-02 14:54:32', '1', '0', 1),
(25, 15, 'We are waiting your reply', '', NULL, '1', '2016-11-03 19:20:37', '1', '0', 1),
(26, 15, 'what are you doing here', '', NULL, '1', '2016-11-03 19:26:08', '1', '0', 1),
(27, 11, 'tested by sanjeet', '', NULL, '1', '2016-11-03 19:30:47', '1', '0', 1),
(28, 11, 'tested by sanjeet', '', NULL, '1', '2016-11-03 19:31:50', '1', '0', 1),
(29, 11, 'what is the problem', '', NULL, '1', '2016-11-03 19:38:13', '1', '0', 1),
(30, 16, 'We have some questions. Please call us at (310) 698-5143', '', NULL, '1', '2016-11-03 19:49:34', '1', '0', 1),
(31, 17, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', '', NULL, '1', '2016-11-03 19:51:58', '1', '0', 1),
(32, 12, 'zfsth frhnjmdtynsartbtrer', '', NULL, '1', '2016-11-04 00:37:30', '1', '0', 1),
(33, 12, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', '', NULL, '1', '2016-11-04 00:38:03', '1', '0', 1),
(34, 16, 'I have not time to call you', '', NULL, '1', '2016-11-04 05:14:54', '1', '0', 1),
(35, 12, 'Hggffgbn', '', NULL, '1', '2016-11-05 02:45:16', '1', '0', 1),
(36, 12, 'Your dog threw up two nice piles in the family room. She''s probably hungry now.', '', NULL, '1', '2016-11-06 03:43:17', '1', '0', 1),
(37, 12, 'Heres a look at your air filter', '', NULL, '1', '2016-11-08 00:30:04', '1', '0', 1),
(38, 12, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', NULL, '0000-00-00 00:00:00', '1', '2016-11-08 18:31:27', '1', '0', 1),
(39, 12, 'We have an update on your car. Please call us at (310) 698-5143', 'Air_Filter.jpg', NULL, '1', '2016-11-08 18:32:52', '1', '0', 1),
(40, 11, 'Your brakes are at %, need to be redone.', 'Tulips.jpg', NULL, '1', '2016-11-09 01:59:01', '1', '0', 1),
(41, 11, 'this is today test', NULL, NULL, '1', '2016-11-09 03:02:11', '2', '1', 1),
(42, 11, 'this is today test1', NULL, NULL, '1', '2016-11-09 03:06:55', '2', '1', 1),
(43, 12, 'Repky from cell', NULL, NULL, '1', '2016-11-09 03:11:06', '2', '1', 1),
(44, 12, 'A second reply from my cell', NULL, NULL, '1', '2016-11-09 03:12:11', '2', '1', 1),
(45, 12, 'Third reply from cell', NULL, NULL, '1', '2016-11-09 03:15:37', '2', '1', 1),
(46, 12, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', NULL, NULL, '1', '2016-11-09 03:18:08', '1', '0', 1),
(47, 12, 'Reply again', NULL, NULL, '1', '2016-11-09 03:18:42', '2', '1', 1),
(48, 12, 'Reply\n....', NULL, NULL, '1', '2016-11-09 04:49:35', '2', '1', 1),
(49, 11, 'test message', NULL, NULL, '1', '2016-11-09 21:28:50', '2', '1', 1),
(50, 12, 'We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-09 22:14:07', '1', '0', 1),
(51, 12, 'Reply Wednesday 1', NULL, NULL, '1', '2016-11-09 22:14:35', '2', '1', 1),
(52, 12, 'We have some questions. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-09 23:14:01', '1', '0', 1),
(53, 11, 'How do I mark a message as read?', NULL, NULL, '1', '2016-11-09 23:20:22', '1', '0', 1),
(54, 12, 'Cant call. No phone', NULL, NULL, '1', '2016-11-10 03:28:09', '2', '1', 1),
(55, 12, 'just do it', NULL, NULL, '1', '2016-11-10 03:29:56', '1', '0', 1),
(56, 12, 'lkjgliy olg liug uyf l', NULL, NULL, '1', '2016-11-10 03:31:17', '1', '0', 1),
(57, 13, 'Any way to auto fill the name when you hit the link?', NULL, NULL, '1', '2016-11-10 19:08:58', '2', '1', 1),
(58, 12, 'Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-10 19:11:48', '1', '0', 1),
(59, 12, 'Reply', NULL, NULL, '1', '2016-11-10 19:12:24', '2', '1', 1),
(60, 13, 'Helo', NULL, NULL, '1', '2016-11-10 19:20:44', '1', '0', 1),
(61, 12, 'test reply', NULL, NULL, '1', '2016-11-10 19:26:20', '1', '0', 1),
(62, 12, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will have your car will be ready at 5:00pm', NULL, NULL, '1', '2016-11-10 19:43:46', '1', '0', 1),
(63, 13, 'This is Osborn''s Automotive: Today’s service will be $85.15. Please call us at (310) 698-5143 or reply "Approve" and we will have your car will be ready at 5:00pm', NULL, NULL, '1', '2016-11-10 19:46:59', '1', '0', 1),
(64, 13, 'Hey, you didn''t txt anyone yesterday!', NULL, NULL, '1', '2016-11-11 15:53:42', '1', '0', 1),
(65, 13, 'You want me to text customers?', NULL, NULL, '1', '2016-11-11 15:59:34', '2', '1', 1),
(66, 18, 'Hello Maureen, Jaime with Osborn''s Automotive here. The brake job will be around $550 for good quality front pads and rotors. Your current rotors are rusted and pitted, they will not be salvageable. I will order parts as we discussed. Thank you!', NULL, NULL, '1', '2016-11-11 17:17:50', '1', '0', 1),
(67, 19, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will have your car will be ready at 5:00pm', NULL, NULL, '1', '2016-11-11 17:33:15', '1', '0', 1),
(68, 18, 'Hello Maureen, Jaime with Osborn''s Automotive here. The brake job will be around $550 for good quality front pads and rotors. Your current rotors are rusted and pitted, they will not be salvageable. I will order parts as we discussed. Thank you!', NULL, NULL, '1', '2016-11-11 17:35:49', '1', '0', 1),
(69, 0, 'All good!', NULL, NULL, '1', '2016-11-11 18:41:07', '2', '1', 1),
(70, 13, 'yes!  It works, just the reply notice doesn''t show up yet', NULL, NULL, '1', '2016-11-12 02:45:56', '1', '0', 1),
(71, 12, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', NULL, NULL, '1', '2016-11-14 07:02:36', '1', '0', 1),
(72, 12, 'Reply today', NULL, NULL, '1', '2016-11-14 07:03:45', '2', '1', 1),
(73, 12, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready.', NULL, NULL, '1', '2016-11-14 07:04:49', '1', '0', 1),
(74, 12, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', NULL, NULL, '1', '2016-11-14 07:32:14', '1', '0', 1),
(75, 12, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', 'BG_Tray.jpg', NULL, '1', '2016-11-14 07:32:50', '1', '0', 1),
(76, 12, 'Regplggg', NULL, NULL, '1', '2016-11-14 07:40:01', '2', '1', 1),
(77, 20, 'This is test message', NULL, NULL, '1', '2016-11-14 00:44:28', '1', '0', 1),
(78, 20, 'This is test message', NULL, NULL, '1', '2016-11-14 00:45:13', '1', '0', 1),
(79, 12, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-14 06:26:33', '1', '0', 1),
(80, 12, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', NULL, NULL, '1', '2016-11-14 07:27:14', '1', '0', 1),
(81, 12, '7:28am text', NULL, NULL, '1', '2016-11-14 07:28:18', '1', '0', 1),
(82, 13, 'The texting system is up and running. to reply to a text on the PC, just click their name in the list', NULL, NULL, '1', '2016-11-14 07:31:46', '1', '0', 1),
(83, 13, 'date and time now showing correctly too.', NULL, NULL, '1', '2016-11-14 07:42:19', '1', '0', 1),
(84, 12, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', NULL, NULL, '1', '2016-11-14 08:08:46', '1', '0', 1),
(85, 12, '8:09 reply', NULL, NULL, '1', '2016-11-14 16:09:34', '2', '1', 1),
(86, 12, 'ok fine', NULL, NULL, '1', '2016-11-14 08:12:03', '1', '0', 1),
(87, 21, 'Good Morning Brianna. I got your vehicle notes in the night box. Can you tell me what happened?', NULL, NULL, '1', '2016-11-14 08:41:31', '1', '0', 1),
(88, 18, 'Maureen, sorry for the hectic morning here. I did hear you say we need to check the windshield washer squirts. But you also sounded like there was something else that needed checking. What else would you like us to check?', NULL, NULL, '1', '2016-11-14 08:43:44', '1', '0', 1),
(89, 0, 'Good morning, is this Jamie? Ok so I was turning off the exit trying to turn onto a (wet) street, as I was driving for some reason my car started sliding and I ', NULL, NULL, '1', '2016-11-14 16:51:40', '2', '1', 1),
(90, 0, 'the slide or something mechanical...', NULL, NULL, '1', '2016-11-14 16:51:45', '2', '1', 1),
(91, 12, 'test message - Sent from Jaime from Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-11-14 09:04:50', '1', '0', 1),
(92, 0, 'No worries!ðŸ‘ðŸ»\nThe windshield wiper dispenser is not wrking! & it did two months ago? Weird! If too expensive, forget it!', NULL, NULL, '1', '2016-11-14 18:00:17', '2', '1', 1),
(93, 12, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-11-15 07:29:34', '1', '0', 1),
(94, 12, 'Reply 730am', NULL, NULL, '1', '2016-11-15 15:30:33', '2', '1', 1),
(95, 12, 'This is Osborn''s Automotive: We are reminding you that your F150 is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-11-15 08:57:20', '1', '0', 1),
(96, 13, 'This is Osborn''s Automotive: We are reminding you that your Subaru is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-11-15 09:00:28', '1', '0', 1),
(97, 22, 'Good Morning Rachel, this is Jaime from Osborn''s.  Call me when you get a chance please. Thank you! 310-698-5143', NULL, NULL, '1', '2016-11-15 09:39:01', '1', '0', 1),
(98, 12, 'This is Osborn''s Automotive: We are reminding you that your 10am test is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, '0000-00-00 00:00:00', '1', '2016-11-16 06:48:38', '1', '0', 1),
(99, 12, 'This is Jaime from Osborn''s', NULL, NULL, '1', '2016-11-16 19:34:34', '1', '0', 1),
(100, 17, 'This is Osborn''s Automotive: We are reminding you that your POS is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-11-17 08:41:03', '1', '0', 1),
(101, 17, 'are you going to stay in bed all day?', NULL, NULL, '1', '2016-11-17 08:46:53', '1', '0', 1),
(102, 17, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready.', NULL, NULL, '1', '2016-11-17 10:04:04', '1', '0', 1),
(103, 17, 'Yes sir ', NULL, NULL, '1', '2016-11-17 18:05:02', '2', '1', 1),
(104, 23, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-17 10:56:47', '1', '0', 1),
(105, 12, '', NULL, NULL, '1', '2016-11-18 12:53:11', '2', '1', 1),
(106, 19, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, '0000-00-00 00:00:00', '0', '2016-11-18 05:22:38', '1', '0', 1),
(107, 19, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, '0000-00-00 00:00:00', '0', '2016-11-18 05:23:05', '1', '0', 1),
(108, 19, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, '0000-00-00 00:00:00', '0', '2016-11-18 05:27:20', '1', '0', 1),
(109, 19, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-18 05:44:26', '1', '0', 1),
(110, 12, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-18 08:33:06', '1', '0', 1),
(111, 24, 'Your phone call was not funny.', NULL, NULL, '1', '2016-11-18 09:31:52', '1', '0', 1),
(112, 12, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-11-18 21:23:07', '1', '0', 1),
(113, 12, 'This message should show up Sunday morning at 10:00 am if all is working fine.', NULL, '0000-00-00 00:00:00', '0', '2016-11-18 21:25:35', '1', '0', 1),
(114, 12, 'Test message at 9:42pm', NULL, NULL, '1', '2016-11-18 21:42:24', '1', '0', 1),
(115, 12, 'Reply at 9:42', NULL, NULL, '1', '2016-11-18 21:42:52', '2', '1', 1),
(116, 12, 'Thank You - 9:44', NULL, NULL, '1', '2016-11-18 21:44:07', '1', '0', 1),
(117, 25, 'Hello Matt. The inspection on your truck has been completed, light bulb replaced and the oil change is being finished. The spark plugs are out of gap and we recommend replacing them. The spark plugs are $188.50, your total today would be $278.59. Would you like us to proceed with this recommendation? - Jaime with Osborn''s Automotive', NULL, NULL, '1', '2016-11-23 09:11:38', '1', '0', 1),
(118, 0, 'Ok', NULL, NULL, '1', '2016-11-23 09:12:20', '2', '1', 1),
(119, 26, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-23 09:21:29', '1', '0', 1),
(120, 12, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-23 10:50:44', '1', '0', 1),
(121, 19, 'This is Osborn''s Automotive: We are reminding you that your xxxx is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-11-23 10:50:54', '1', '0', 1),
(122, 13, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-23 10:51:07', '1', '0', 1),
(123, 12, 'Replyggghvh', NULL, NULL, '1', '2016-11-23 10:51:08', '2', '1', 1),
(124, 19, 'Hero', NULL, NULL, '1', '2016-11-23 10:51:15', '2', '1', 1),
(125, 13, 'Sorry no', NULL, NULL, '1', '2016-11-23 10:51:39', '2', '1', 1),
(126, 13, 'Sorry, Yes', NULL, NULL, '1', '2016-11-23 11:20:32', '1', '0', 1),
(127, 12, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-26 22:07:14', '1', '0', 1),
(128, 27, 'This is Osborn''s Automotive: Your car has been diagnosed and an estimate prepared. Please call us at (310) 698-5143 so we can discuss repair costs & completion time, Thanks.', NULL, NULL, '1', '2016-11-28 12:12:10', '1', '0', 1),
(129, 27, 'Bravo. ', NULL, NULL, '1', '2016-11-28 12:12:32', '2', '1', 1),
(130, 12, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-28 22:14:25', '1', '0', 1),
(131, 12, 'Reply from cell 10:14pm', NULL, NULL, '1', '2016-11-28 22:15:05', '2', '1', 1),
(132, 12, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-11-28 22:16:27', '1', '0', 1),
(133, 12, 'Sent back at 55ree', NULL, NULL, '1', '2016-11-28 22:16:52', '2', '1', 1),
(134, 12, 'Testing image', 'bob-dylan-credit-estate-of-fred-w-mcdarrah.jpg', '0000-00-00 00:00:00', '0', '2016-11-29 17:37:29', '1', '0', 1),
(135, 12, 'image test', 'bob-dylan-credit-estate-of-fred-w-mcdarrah1.jpg', NULL, '1', '2016-11-29 17:38:08', '1', '0', 1),
(136, 13, 'Reminder- you have an appointment at Osborn''s Automotive schedule for tomorrow, 12/6/2016x at 8:00. Thank you- Osborn''s Automotive', NULL, NULL, '1', '2016-12-05 10:02:58', '1', '0', 1),
(137, 12, 'Just a friendly reminder. You have a schedule appointment at Osborn''s Automotive tomorrow 12/5/16 at 8am. We look forward to seeing you!', NULL, NULL, '1', '2016-12-05 10:07:00', '1', '0', 1),
(138, 12, 'Ok.', NULL, NULL, '1', '2016-12-05 10:07:45', '2', '1', 1),
(139, 12, 'Better?', NULL, NULL, '1', '2016-12-05 10:08:35', '1', '0', 1),
(140, 13, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2016-12-05 10:10:32', '1', '0', 1),
(141, 28, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2016-12-05 10:16:52', '1', '0', 1),
(142, 29, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2016-12-05 10:17:25', '1', '0', 1),
(143, 30, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2016-12-05 10:17:54', '1', '0', 1),
(144, 13, 'This is Osborn''s Automotive: Today’s service will be 365$. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready.', NULL, NULL, '1', '2016-12-05 15:08:45', '1', '0', 1),
(145, 13, 'Approve', NULL, NULL, '1', '2016-12-05 15:14:01', '2', '1', 1),
(146, 13, 'Asshat', NULL, NULL, '1', '2016-12-05 15:14:11', '2', '1', 1),
(147, 13, 'This is Osborn''s Automotive: We are reminding you that your xxxx is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-12-05 15:14:24', '1', '0', 1),
(148, 31, 'Good Morning Bethany. I know you talked to Paul yesterday about the blower motor assembly. This morning we were actually able to hear the noise your husband told us about. It  is actually the CD player. We removed the fuse for the CD Player, once there was no direct power the noise went away. I am hoping this is under dealer warranty. Please call me or respond to this text when you get a chance. Thank you- Jaime Service Manager Osborn''s Automotive', NULL, NULL, '1', '2016-12-06 09:29:43', '1', '0', 1),
(149, 12, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-12-06 09:32:31', '1', '0', 1),
(150, 31, 'Hi Jaime. We never use the CD player, so disconnecting it is a good solution.', NULL, NULL, '1', '2016-12-06 09:47:57', '2', '1', 1),
(151, 31, 'I will call Lexus about warranty if CD player. Thanks!!!', NULL, NULL, '1', '2016-12-06 09:48:40', '2', '1', 1),
(152, 12, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, '0000-00-00 00:00:00', '0', '2016-12-06 13:05:42', '1', '0', 1),
(153, 32, 'Good Morning Shane. I received your message from last night and wanted to confirm your appointment request. Hopefully 8am will work for you. If does not please feel free to call me at 310-698-5143 and I can schedule at your convenience. I look forward to meeting you. - Jaime @ Osborns Auto', NULL, NULL, '1', '2016-12-09 06:55:51', '1', '0', 1),
(154, 33, 'This is Osborn''s Automotive: We are reminding you that your Ford is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', NULL, NULL, '1', '2016-12-09 18:13:07', '1', '0', 1),
(155, 13, 'Gmc truck that got dropped off this morning is being picked in by tow truck. Is that ok?', NULL, NULL, '1', '2016-12-09 19:50:02', '1', '0', 1),
(156, 13, 'Yes', NULL, NULL, '1', '2016-12-09 20:06:57', '2', '1', 1),
(157, 13, 'do we have hubs coming from somewhere?', NULL, NULL, '1', '2016-12-12 08:15:15', '1', '0', 1),
(158, 13, 'Yes world PAC', NULL, NULL, '1', '2016-12-12 08:16:51', '2', '1', 1),
(159, 13, 'same part number?', NULL, NULL, '1', '2016-12-12 08:27:58', '1', '0', 1),
(160, 13, 'Yes different brand', NULL, NULL, '1', '2016-12-12 08:31:06', '2', '1', 1),
(161, 13, 'how you feeling? I''m coughing up oysters, dizzy, just lovely.', NULL, NULL, '1', '2016-12-12 08:32:25', '1', '0', 1),
(162, 13, 'You hear from Tandra? I sent her a message checking status', NULL, NULL, '1', '2016-12-12 08:43:27', '2', '1', 1),
(163, 13, 'nothing from tandra', NULL, NULL, '1', '2016-12-12 08:46:59', '1', '0', 1),
(164, 34, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-12 10:15:38', '1', '0', 1),
(165, 13, 'Carol Boss will be in maybe Thursday. Doesn''t want to talk to me cuz I don''t know what "Same Thing" means.  She won''t answer my questions but wants to know why it''s doing the same thing. But it won''t do it when she comes in either.', NULL, NULL, '1', '2016-12-12 12:56:41', '1', '0', 1),
(166, 13, ' Great', NULL, NULL, '1', '2016-12-12 12:57:26', '2', '1', 1),
(167, 35, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-12 13:19:27', '1', '0', 1),
(168, 36, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-12 13:25:04', '1', '0', 1),
(169, 36, 'Mike, This is Osborn''s Automotive: The starter runs $350 with an OEM part and 3/36 warranty. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready. I''ll get you an update on the squeak soon.', NULL, NULL, '1', '2016-12-12 13:38:02', '1', '0', 1),
(170, 36, 'Installed ?', NULL, NULL, '1', '2016-12-12 13:41:10', '2', '1', 1),
(171, 36, 'Yes, that''s parts and labor', NULL, NULL, '1', '2016-12-12 13:42:39', '1', '0', 1),
(172, 36, 'Go ahead', NULL, NULL, '1', '2016-12-12 13:42:57', '2', '1', 1),
(173, 36, 'Approve', NULL, NULL, '1', '2016-12-12 13:46:44', '2', '1', 1),
(174, 36, 'Found the issue with the noises, give me a call when you get a chance so I can explain.  Scott Osborn (310) 698-5143', NULL, NULL, '1', '2016-12-12 13:52:13', '1', '0', 1),
(175, 36, 'I need an hour', NULL, NULL, '1', '2016-12-12 13:55:39', '2', '1', 1),
(176, 36, 'no problem.', NULL, NULL, '1', '2016-12-12 13:56:46', '1', '0', 1),
(177, 37, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-12 14:56:13', '1', '0', 1),
(178, 38, 'Linda, still having bearing problems.  Are you OK keeping the rental another day? - Sent from Scott at Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-12-12 16:14:42', '1', '0', 1),
(179, 13, 'Lindas BMW misdiag - it''s rear bearings.', NULL, NULL, '1', '2016-12-12 16:17:13', '1', '0', 1),
(180, 13, 'Hmm', NULL, NULL, '1', '2016-12-12 16:19:46', '2', '1', 1),
(181, 13, 'So there were two noises', NULL, NULL, '1', '2016-12-12 16:19:54', '2', '1', 1),
(182, 13, '1 was the driveshaft bushing and then whirling from front. Is it possible there were 3 noises?', NULL, NULL, '1', '2016-12-12 16:20:43', '2', '1', 1),
(183, 38, 'Yes, its ok.thankyou for letting me know. ', NULL, NULL, '1', '2016-12-12 16:25:50', '2', '1', 1),
(184, 13, 'he says its the same. got rear hubs and bearings from worldpac tomorrow morning. told him we''re eating it.', NULL, NULL, '1', '2016-12-12 16:28:16', '1', '0', 1),
(185, 38, 'We''ll get you an update again by noon tomorrow.', NULL, NULL, '1', '2016-12-12 16:28:53', '1', '0', 1),
(186, 39, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-12 16:37:46', '1', '0', 1),
(187, 13, 'Oscar spent most of the day cleaning. Car wash area is spotless, compressor area washed, bath scrubbed. Looks good', NULL, NULL, '1', '2016-12-12 16:38:58', '1', '0', 1),
(188, 39, 'Drivers window motor/regulator about $345 plus tax installed.  Checking brakes right now.', NULL, NULL, '1', '2016-12-12 16:54:18', '1', '0', 1),
(189, 39, 'We will skip the window motor for the time. Thank you for the estimate, perhaps in spring...', NULL, NULL, '1', '2016-12-12 17:04:36', '2', '1', 1),
(190, 39, 'Rear brakes - leaking wheel cylinder on drivers side. Brake shoes contaminated with brake fluid from leak. Drums oversized (worn out). Replacing front and rear brakes, new rotors, drums, rear shoes, wheel cylinders & flush old brake fluid $1,260 total.', NULL, NULL, '1', '2016-12-12 17:23:10', '1', '0', 1),
(191, 39, 'Approved. ', NULL, NULL, '1', '2016-12-12 17:26:57', '2', '1', 1),
(192, 39, 'Got it. Parts ordered for tomorrow morning. You''ll have new brakes all the way around. Starting on it at 7:30am.', NULL, NULL, '1', '2016-12-12 17:29:00', '1', '0', 1),
(193, 39, 'Thanks.', NULL, NULL, '1', '2016-12-12 17:46:58', '2', '1', 1),
(194, 40, 'Hi Joseph. We found cracked vacuum lines at the vapor canister. Unfortunately, not all of these parts are available through GM. We will have to use bulk line, aftermarket elbows along with the 2 parts we can get through GMC. I estimate repair to be about $250. Would you like us to proceed?', NULL, NULL, '1', '2016-12-13 12:55:39', '1', '0', 1),
(195, 13, 'Tri City or RC auto glass for a new windshield?', NULL, NULL, '1', '2016-12-13 14:33:29', '1', '0', 1),
(196, 13, 'Try city', NULL, NULL, '1', '2016-12-13 14:33:52', '2', '1', 1),
(197, 39, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-13 15:50:37', '1', '0', 1),
(198, 41, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-13 15:53:38', '1', '0', 1),
(199, 42, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-13 16:13:06', '1', '0', 1),
(200, 39, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-14 10:21:35', '1', '0', 1),
(201, 39, 'Jeff, are you picking up your car tonight?  I''m closing soon.  Scott Osborn', NULL, NULL, '1', '2016-12-14 16:24:23', '1', '0', 1),
(202, 13, 'I just asked Keith to listen to a noise in a girls car. He''s helping!  and didn''t bitch!', NULL, NULL, '1', '2016-12-14 16:33:56', '1', '0', 1),
(203, 43, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-14 20:20:05', '1', '0', 1),
(204, 43, 'This is Osborn''s Automotive: Today’s service will be $350. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready.', NULL, NULL, '1', '2016-12-14 20:20:06', '1', '0', 1),
(205, 43, 'This is Osborn''s Automotive: Your car has been diagnosed and an estimate prepared. Please call us at (310) 698-5143 so we can discuss repair costs & completion time, Thanks.', NULL, NULL, '1', '2016-12-14 20:20:43', '1', '0', 1),
(206, 43, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-14 20:22:35', '1', '0', 1),
(207, 44, 'Harry, we have the check engine light and oil change taken care of. There is some other work the car needs. Please call us at (310) 698-5143 to discuss. Osborn''s Automotive', NULL, NULL, '1', '2016-12-15 08:05:21', '1', '0', 1),
(208, 45, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 08:39:43', '1', '0', 1),
(209, 43, 'Good morning, Squire.', NULL, NULL, '1', '2016-12-15 09:30:30', '1', '0', 1),
(210, 43, 'Wassss up', NULL, NULL, '1', '2016-12-15 09:47:47', '2', '1', 1),
(211, 43, 'not much, Jaime out today. Working the front counter and sick as a dog. wanna go home.', NULL, NULL, '1', '2016-12-15 10:12:09', '1', '0', 1),
(212, 43, 'Been there that is not good', NULL, NULL, '1', '2016-12-15 10:20:56', '2', '1', 1),
(213, 13, 'hows that ear infuction doing?', NULL, NULL, '1', '2016-12-15 10:33:40', '1', '0', 1),
(214, 13, ' Eh, hurts but the fever is kicking my ass', NULL, NULL, '1', '2016-12-15 10:34:14', '2', '1', 1),
(215, 13, 'Now the cough', NULL, NULL, '1', '2016-12-15 10:34:17', '2', '1', 1),
(216, 13, 'You?', NULL, NULL, '1', '2016-12-15 10:34:21', '2', '1', 1),
(217, 13, 'still hacking up shit, headache, dizzy, same shit.', NULL, NULL, '1', '2016-12-15 10:36:49', '1', '0', 1),
(218, 46, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 11:49:08', '1', '0', 1),
(219, 47, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 11:49:48', '1', '0', 1),
(220, 13, 'did you order an uber?', NULL, NULL, '1', '2016-12-15 12:02:02', '1', '0', 1),
(221, 13, 'No', NULL, NULL, '1', '2016-12-15 12:02:22', '2', '1', 1),
(222, 13, 'Paul just called..., his upper radiator hose burst in his eyes', NULL, NULL, '1', '2016-12-15 12:02:58', '2', '1', 1),
(223, 13, 'Chimere called an ambulance', NULL, NULL, '1', '2016-12-15 12:03:11', '2', '1', 1),
(224, 13, 'But I heard her say they were near ucla... is that where the call his at?', NULL, NULL, '1', '2016-12-15 12:03:40', '2', '1', 1),
(225, 13, 'I sent the uber to LAX', NULL, NULL, '1', '2016-12-15 12:21:11', '1', '0', 1),
(226, 13, 'so they called an uber and an ambulance?', NULL, NULL, '1', '2016-12-15 12:21:38', '1', '0', 1),
(227, 13, 'You ordered the uber?', NULL, NULL, '1', '2016-12-15 12:22:05', '2', '1', 1),
(228, 48, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 12:22:45', '1', '0', 1),
(229, 13, 'no, it showed up on my phone as picking me up', NULL, NULL, '1', '2016-12-15 12:23:19', '1', '0', 1),
(230, 46, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 12:49:37', '1', '0', 1),
(231, 49, 'This is Osborn''s Automotive: Your car is ready. We will be here until 4:30pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-15 14:37:36', '1', '0', 1),
(232, 48, 'This is Osborn''s Automotive: Your car is ready. Please call us at (310) 698-5143 if you need a ride.', NULL, NULL, '1', '2016-12-16 09:06:18', '1', '0', 1),
(233, 50, 'This is Osborn''s Automotive: Your car is ready. Please call us at (310) 698-5143 if you need a ride', NULL, NULL, '1', '2016-12-16 09:45:49', '1', '0', 1),
(234, 51, 'This is Osborn''s Automotive: Your car is ready. (310) 698-5143', NULL, NULL, '1', '2016-12-16 12:13:49', '1', '0', 1),
(235, 13, 'going to do Keiths Bday on Monday when you''re here.', NULL, NULL, '1', '2016-12-16 12:27:52', '1', '0', 1),
(236, 13, 'Thank you', NULL, NULL, '1', '2016-12-16 13:00:27', '2', '1', 1),
(237, 52, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-16 15:16:40', '1', '0', 1),
(238, 53, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', NULL, NULL, '1', '2016-12-16 15:18:58', '1', '0', 1),
(239, 13, 'How you feeling, Sunshine?', NULL, NULL, '1', '2016-12-16 15:21:24', '1', '0', 1),
(240, 13, 'Lol, well doing a breathing treatment right now. ER last night... but honestly feeling better today', NULL, NULL, '1', '2016-12-16 15:22:12', '2', '1', 1),
(241, 13, 'How you feeling SUNSHINE', NULL, NULL, '1', '2016-12-16 15:22:31', '2', '1', 1),
(242, 13, 'my ass is dragging. can''t wait to go home and crawl into bed.', NULL, NULL, '1', '2016-12-16 15:26:41', '1', '0', 1),
(243, 13, 'Sorry! Gosh I hope you get better soon', NULL, NULL, '1', '2016-12-16 15:34:27', '2', '1', 1),
(244, 19, 'http://crosshairsusa.net/events/ccw-course-111-115/', NULL, NULL, '1', '2016-12-19 09:05:41', '1', '0', 1),
(245, 54, 'Hello Kori. We have an outstanding balance due for your oil change on the PT Cruiser in the amount of $52.99, please call me at 310-698-5143 ASAP. Thank you, Jaime', NULL, NULL, '1', '2016-12-20 11:58:13', '1', '0', 1),
(246, 55, 'Good Morning. We checked the GMC first thing and the battery is dead. We tested it and it is testing bad and we are recommending replacement. The cost will be $158.74 including taxes. Should we proceed with this replacement?- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2016-12-23 07:50:50', '1', '0', 1),
(247, 56, 'https://rockyags.cr.usgs.gov/realtime/webcams/jordan_peak_5/jordan_peak_5.jpg', NULL, NULL, '1', '2016-12-28 08:21:32', '1', '0', 1),
(248, 19, 'https://rockyags.cr.usgs.gov/realtime/webcams/jordan_peak_5/jordan_peak_5.jpg', NULL, NULL, '1', '2016-12-28 08:21:50', '1', '0', 1),
(249, 57, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2017-01-16 11:49:36', '1', '0', 1),
(250, 57, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2017-01-16 11:49:38', '1', '0', 1),
(251, 57, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2017-01-16 11:49:39', '1', '0', 1),
(252, 57, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2017-01-16 11:49:39', '1', '0', 1),
(253, 57, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2017-01-16 11:51:36', '1', '0', 1),
(254, 57, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2017-01-16 11:53:36', '1', '0', 1),
(255, 58, '- Sent from Jaime at Osborn''s (310) 698-5143', NULL, NULL, '1', '2017-01-16 11:55:22', '1', '0', 1),
(256, 58, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143', NULL, NULL, '1', '2017-01-17 03:22:37', '1', '0', 1),
(257, 59, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', NULL, NULL, '1', '2017-01-17 03:53:41', '1', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(5) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', '+4', 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', '+8', 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', '+12', 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', '+16', 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', '+20', 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', '+24', 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', '+660', 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', '+28', 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', '+32', 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', '+51', 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', '+533', 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', '+36', 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', '+40', 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', '+31', 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', '+44', 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', '+48', 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', '+50', 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', '+52', 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', '+112', 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', '+56', 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', '+84', 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', '+204', 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', '+60', 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', '+64', 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', '+68', 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', '+70', 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', '+72', 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', '+76', 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', '+96', 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', '+100', 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', '+854', 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', '+108', 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', '+116', 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', '+120', 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', '+124', 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', '+132', 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', '+136', 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', '+140', 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', '+148', 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', '+152', 56),
(44, 'CN', 'CHINA', 'China', 'CHN', '+156', 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', '+170', 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', '+174', 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', '+178', 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', '+180', 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', '+184', 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', '+188', 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', '+384', 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', '+191', 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', '+192', 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', '+196', 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', '+203', 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', '+208', 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', '+262', 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', '+212', 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', '+214', 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', '+218', 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', '+818', 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', '+222', 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', '+226', 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', '+232', 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', '+233', 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', '+231', 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', '+238', 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', '+234', 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', '+242', 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', '+246', 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', '+250', 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', '+254', 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', '+258', 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', '+266', 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', '+270', 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', '+268', 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', '+276', 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', '+288', 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', '+292', 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', '+300', 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', '+304', 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', '+308', 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', '+312', 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', '+316', 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', '+320', 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', '+324', 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', '+624', 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', '+328', 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', '+332', 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', '+336', 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', '+340', 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', '+344', 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', '+348', 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', '+352', 354),
(99, 'IN', 'INDIA', 'India', 'IND', '+356', 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', '+360', 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', '+364', 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', '+368', 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', '+372', 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', '+376', 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', '+380', 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', '+388', 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', '+392', 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', '+400', 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', '+398', 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', '+404', 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', '+296', 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', '+408', 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', '+410', 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', '+414', 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', '+417', 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', '+418', 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', '+428', 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', '+422', 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', '+426', 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', '+430', 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', '+434', 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', '+438', 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', '+440', 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', '+442', 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', '+446', 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', '+807', 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', '+450', 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', '+454', 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', '+458', 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', '+462', 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', '+466', 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', '+470', 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', '+584', 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', '+474', 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', '+478', 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', '+480', 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', '+484', 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', '+583', 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', '+498', 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', '+492', 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', '+496', 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', '+500', 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', '+504', 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', '+508', 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', '+104', 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', '+516', 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', '+520', 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', '+524', 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', '+528', 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', '+530', 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', '+540', 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', '+554', 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', '+558', 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', '+562', 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', '+566', 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', '+570', 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', '+574', 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', '+580', 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', '+578', 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', '+512', 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', '+586', 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', '+585', 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', '+591', 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', '+598', 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', '+600', 595),
(168, 'PE', 'PERU', 'Peru', 'PER', '+604', 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', '+608', 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', '+612', 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', '+616', 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', '+620', 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', '+630', 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', '+634', 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', '+638', 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', '+642', 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', '+643', 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', '+646', 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', '+654', 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', '+659', 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', '+662', 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', '+666', 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', '+670', 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', '+882', 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', '+674', 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', '+678', 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', '+682', 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', '+686', 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', '+690', 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', '+694', 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', '+702', 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', '+703', 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', '+705', 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', '+90', 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', '+706', 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', '+710', 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', '+724', 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', '+144', 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', '+736', 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', '+740', 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', '+744', 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', '+748', 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', '+752', 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', '+756', 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', '+760', 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', '+158', 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', '+762', 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', '+834', 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', '+764', 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', '+768', 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', '+772', 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', '+776', 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', '+780', 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', '+788', 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', '+792', 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', '+795', 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', '+796', 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', '+798', 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', '+800', 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', '+804', 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', '+784', 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', '+826', 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', '+840', 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', '+858', 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', '+860', 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', '+548', 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', '+862', 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', '+704', 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', '+92', 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', '+850', 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', '+876', 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', '+732', 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', '+887', 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', '+894', 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', '+716', 263);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `E_id` int(11) NOT NULL,
  `E_event` varchar(128) NOT NULL,
  `E_subject` varchar(255) NOT NULL,
  `E_body` text NOT NULL,
  `E_vis` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`E_id`, `E_event`, `E_subject`, `E_body`, `E_vis`) VALUES
(2, 'forget_password', 'osborn-automotive:: Forget Password', 'Hi {{first_name}},\n\n<p>Welcome to our osborn-automotive</p>\n<p>Your new password for osborn-automotive portal is <strong>{{new_password}}</strong></p>\n\n\nThanks\nosborn-automotive\n\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inboundsms`
--

CREATE TABLE IF NOT EXISTS `inboundsms` (
  `id` int(11) NOT NULL,
  `number` varchar(50) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inboundsms`
--

INSERT INTO `inboundsms` (`id`, `number`, `message`) VALUES
(1, '+919477989708', 'this is test message'),
(2, '+919477989708', 'this is test message1'),
(3, NULL, NULL),
(4, NULL, NULL),
(5, ' 919477989708', 'this is today test1'),
(6, '+13108096967', 'Repky from cell'),
(7, '+13108096967', 'A second reply from my cell'),
(8, '+13108096967', 'Third reply from cell'),
(9, '+13108096967', 'Reply again'),
(10, '+13108096967', 'Reply\n....');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_sms`
--

CREATE TABLE IF NOT EXISTS `schedule_sms` (
  `id` bigint(20) NOT NULL,
  `contactId` int(11) NOT NULL,
  `toNumber` varchar(20) NOT NULL,
  `fromNumber` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `media_file` varchar(255) NOT NULL,
  `message_time` datetime NOT NULL,
  `isProcess` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(12) unsigned NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `setting_type` char(1) CHARACTER SET utf8 NOT NULL,
  `value_type` char(1) CHARACTER SET utf8 NOT NULL,
  `int_value` int(12) DEFAULT NULL,
  `string_value` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `text_value` text CHARACTER SET utf8,
  `created` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `code`, `name`, `setting_type`, `value_type`, `int_value`, `string_value`, `text_value`, `created`) VALUES
(1, 'SITE_TITLE', 'Site Title', 'S', 'S', 0, 'Osborn''s Automotive', NULL, 1456366065),
(2, 'SITE_SLOGAN', 'Site Slogan', 'S', 'S', 0, 'osborn-automotive', NULL, 2009),
(9, 'SITE_ADMIN_MAIL', 'Site Admin Mail', 'S', 'S', NULL, 'sosborn@osbornauto.com', NULL, 1456366065),
(24, 'BASE_URL', 'site url', 'S', 'S', NULL, 'http://localhost:81/rsstexting/', NULL, 1456366065),
(28, 'TWILIO_ACCOUNT_SID', 'Your Account SID from www.twilio.com/user/account', 'S', 'S', NULL, 'AC87f842afb6208742a5036918db9758e9', NULL, 0),
(29, 'TWILIO_ACCOUNT_TOKEN', 'Your Auth Token from www.twilio.com/user/account', 'S', 'S', NULL, '695122d4b243a762cfd9cf5d6893beb8', NULL, 0),
(41, 'TWILIO_FROM_VALID_PHONE_NUMBER', 'From a valid Twilio number   https://www.twilio.com/console/phone-numbers/incoming', 'S', 'S', NULL, '+13104214894', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 0),
(42, 'SITE_SIGNATURE', 'Signature\r\n', 'S', 'S', 0, 'Osborn’s Automotive', 'Osborn’s Automotive', 1456366065),
(43, 'SITE_DEFAULT_TIME', 'Default time ', 'S', 'S', 0, '10:00 AM', '10:00 am', 1456366065);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `list_order` int(11) DEFAULT NULL,
  `T_vis` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `message`, `list_order`, `T_vis`) VALUES
(1, 'Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', 6, 99),
(2, 'Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', 5, 99),
(3, 'We have an update on your car. Please call us at (310) 698-5143', 4, 99),
(4, 'We have some questions. Please call us at (310) 698-5143', 3, 99),
(5, 'Will you be needing a ride?', 3, 99),
(6, 'This is test message', 1, 99),
(7, 'this is listing again order', 7, 99),
(8, 'Please call us as soon as possible. Your car is on fire. Osborn''s Automotive (310) 698-5143', 2, 99),
(9, 'Today’s service will be $. Please reply "Approve" and we will have your car will be ready at 5:00pm', 1, 99),
(10, 'Your brakes are at %, need to be redone.', 7, 99),
(11, 'This is Osborn''s Automotive: Today’s service will be $. Please reply "Approve" and we will have your car will be ready at 5:00pm', 11, 99),
(12, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will have your car will be ready at 5:00pm', 12, 99),
(13, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143.', 5, 99),
(14, 'This is Osborn''s Automotive: Your vehicle inspection has been completed and emailed to you. Please call us at (310) 698-5143', 8, 1),
(15, 'This is Osborn''s Automotive: We have an update on your car. Please call us at (310) 698-5143', 1, 1),
(16, 'This is Osborn''s Automotive: Your car is ready. We will be here until 5pm. Please call us at (310) 698-5143', 8, 1),
(17, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will have your car ready at 5:00pm', 2, 99),
(18, 'This is Osborn''s Automotive: Today’s service will be $. Please call us at (310) 698-5143 or reply "Approve" and we will notify you when it is ready.', 8, 1),
(19, 'This is Jaime from Osborn''s', 4, 99),
(20, '- Sent from Jaime from Osborn''s (310) 698-5143', 5, 99),
(21, '- Sent from Jaime at Osborn''s (310) 698-5143', 7, 1),
(22, 'This is Osborn''s Automotive: We are reminding you that your xxxx is due for service. You can either call us at (310) 698-5143, txt us back or click bit.ly/1J7bISN to make an appointment.', 2, 1),
(23, 'This is Osborn''s Automotive: We have some questions about your vehicle. Please call us at (310) 698-5143', 6, 1),
(24, 'This is Osborn''s Automotive: Your car has been diagnosed and an estimate prepared. Please call us at (310) 698-5143 so we can discuss repair costs & completion time, Thanks.', 9, 1),
(25, 'Reminder- you have an appointment at Osborn''s Automotive schedule for tomorrow, xxxxxxx at xx. Thank you- Osborn''s Automotive', 3, 99),
(26, 'Just a friendly reminder. You have a schedule appointment at Osborn''s Automotive tomorrow (DATE) at (TIME). We look forward to seeing you!', 8, 99),
(27, 'This is Osborn''s Automotive: Just reminding you of your appointment tomorrow. If you need to reschedule or unable to make it, please let us know so we can adjust our schedule.', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Us_id` int(11) NOT NULL,
  `Us_email` varchar(255) DEFAULT NULL,
  `Us_pasword` varchar(255) DEFAULT NULL,
  `Us_group` int(11) DEFAULT '1',
  `Us_accesTill` date DEFAULT NULL,
  `Us_vis` int(11) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Us_id`, `Us_email`, `Us_pasword`, `Us_group`, `Us_accesTill`, `Us_vis`) VALUES
(1, 'admin@rsstextingborn.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`E_id`);

--
-- Indexes for table `inboundsms`
--
ALTER TABLE `inboundsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_sms`
--
ALTER TABLE `schedule_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `E_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inboundsms`
--
ALTER TABLE `inboundsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `schedule_sms`
--
ALTER TABLE `schedule_sms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(12) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Us_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
