-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2021 at 11:43 AM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `user_id`, `project_id`, `recipient_id`, `title`, `description`, `date_time`) VALUES
(1, 8, 6, 8, 'helo', 'bye bye', '2021-04-23 17:23:09'),
(2, 15, 9, 15, 'Welcome', 'Welcome to the Super League, fellow founding members!', '2021-04-25 04:13:19'),
(3, 15, 9, 1, 'Welcome', 'Welcome to the Super League, fellow founding members!', '2021-04-25 04:13:19'),
(4, 15, 9, 2, 'Welcome', 'Welcome to the Super League, fellow founding members!', '2021-04-25 04:13:19'),
(5, 15, 9, 15, 'Test', '2nd test announcement', '2021-04-25 04:14:05'),
(6, 15, 9, 1, 'Test', '2nd test announcement', '2021-04-25 04:14:05'),
(7, 15, 9, 2, 'Test', '2nd test announcement', '2021-04-25 04:14:05'),
(8, 22, 15, 22, 'UML', 'Hi guys we need to finish the UML diagram by tomorrow  ', '2021-04-28 17:27:57'),
(9, 22, 15, 0, 'UML', 'Hi guys we need to finish the UML diagram by tomorrow  ', '2021-04-28 17:27:57'),
(10, 22, 15, 0, 'UML', 'Hi guys we need to finish the UML diagram by tomorrow  ', '2021-04-28 17:27:57'),
(11, 22, 15, 0, 'UML', 'Hi guys we need to finish the UML diagram by tomorrow  ', '2021-04-28 17:27:57'),
(12, 23, 16, 23, 'Are you ready', 'Let\'s get started', '2021-04-28 17:29:02'),
(13, 23, 16, 1, 'Are you ready', 'Let\'s get started', '2021-04-28 17:29:02'),
(14, 23, 16, 2, 'Are you ready', 'Let\'s get started', '2021-04-28 17:29:02'),
(15, 23, 16, 3, 'Are you ready', 'Let\'s get started', '2021-04-28 17:29:02'),
(16, 25, 17, 25, '123', '`1232qddq', '2021-04-29 01:21:10'),
(17, 26, 19, 26, 'Test', 'test', '2021-04-29 04:52:29'),
(18, 26, 19, 1, 'Test', 'test', '2021-04-29 04:52:29'),
(19, 26, 19, 2, 'Test', 'test', '2021-04-29 04:52:29'),
(20, 26, 19, 3, 'Test', 'test', '2021-04-29 04:52:29'),
(21, 3, 22, 3, 'Hi there', 'Technically bringing people to mars if difficult, but were going there\'', '2021-04-29 13:27:14'),
(22, 3, 21, 3, 'Tomorrow meeting oh', 'Please be on time', '2021-04-29 13:28:50'),
(23, 31, 25, 31, 'Test', 'test', '2021-05-01 10:33:02'),
(24, 31, 25, 1, 'Test', 'test', '2021-05-01 10:33:02'),
(25, 31, 25, 2, 'Test', 'test', '2021-05-01 10:33:02'),
(26, 31, 25, 3, 'Test', 'test', '2021-05-01 10:33:02'),
(27, 2, 17, 25, 'Test', 'Test', '2021-05-05 01:08:54'),
(28, 2, 17, 2, 'Test', 'Test', '2021-05-05 01:08:54'),
(29, 2, 17, 1, 'Test', 'Test', '2021-05-05 01:08:54'),
(30, 2, 17, 3, 'Test', 'Test', '2021-05-05 01:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `project_id`, `board_name`, `date_time`) VALUES
(1, 3, 'Account', '2021-04-23 12:31:56'),
(2, 5, 'Test Task 1', '2021-04-23 13:37:51'),
(3, 6, 'testing', '2021-04-23 17:26:40'),
(4, 7, 'Labeauté', '2021-04-24 14:14:27'),
(5, 8, 'Sprint 1', '2021-04-24 15:46:33'),
(6, 9, 'Initial', '2021-04-25 04:15:49'),
(7, 10, 'Counter', '2021-04-25 04:20:08'),
(8, 9, 'Withdraw', '2021-04-25 04:22:27'),
(9, 12, 'abc', '2021-04-28 07:49:41'),
(10, 13, 'B1', '2021-04-28 10:34:54'),
(11, 14, 'Discussion', '2021-04-28 14:30:11'),
(12, 15, 'Programming', '2021-04-28 16:49:41'),
(13, 16, 'Prepare the patty', '2021-04-28 17:31:08'),
(14, 18, 'asd', '2021-04-29 01:23:37'),
(15, 19, 'test', '2021-04-29 04:54:18'),
(16, 20, 'Task ', '2021-04-29 06:04:52'),
(19, 23, 'Introduction', '2021-04-29 20:44:16'),
(20, 24, 'AAA', '2021-04-30 05:45:27'),
(21, 25, '1', '2021-05-01 10:34:05'),
(22, 26, 'Board #1', '2021-05-02 08:11:48'),
(23, 26, 'Board #2', '2021-05-02 08:13:39'),
(24, 26, 'Board #3', '2021-05-02 08:13:47'),
(25, 27, 'Board 1', '2021-05-05 00:53:43'),
(26, 28, 'POS-Sprint 1', '2021-05-05 15:13:07'),
(27, 29, 'EMTP-Sprint 1', '2021-05-05 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `bug_report`
--

CREATE TABLE `bug_report` (
  `bug_id` int(11) NOT NULL,
  `bug_name` varchar(225) NOT NULL,
  `bug_desc` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assignee` int(11) NOT NULL,
  `priority` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bug_report`
--

INSERT INTO `bug_report` (`bug_id`, `bug_name`, `bug_desc`, `created_by`, `project_id`, `assignee`, `priority`, `state`, `creation_date`, `due_date`, `start_date`) VALUES
(1, 'Uploading profile pic', 'can\'t upload profile picture', 5, 3, 3, 'Medium', 'Open', '2021-04-23 12:38:43', '2021-04-29', '2021-04-23'),
(2, 'Test bug', 'Please fix the bugs', 7, 5, 7, 'High', 'Open', '2021-04-23 13:46:04', '2021-05-12', '2021-04-23'),
(3, 'index.html', 'The navigation bar doesn\'t become a burger when resized', 13, 7, 14, 'High', 'Closed', '2021-04-24 15:00:39', '2021-05-06', '2021-04-24'),
(4, 'Wrong description', 'Description does not match item', 15, 9, 1, 'Low', 'In Progress', '2021-04-25 04:34:05', '2021-04-28', '2021-04-25'),
(5, 'asdf', 'asdg', 25, 17, 25, 'Medium', 'In Progress', '2021-04-29 01:28:13', '2021-05-07', '2021-04-29'),
(6, 'test', 'test', 26, 19, 26, 'Low', 'Closed', '2021-04-29 05:04:42', '2021-04-30', '2021-04-29'),
(7, 'Bug 1', 'Test test test', 33, 27, 33, 'Medium', 'Open', '2021-05-05 00:45:30', '2021-05-06', '2021-05-05'),
(8, 'Page not found ', 'In the calendar event page', 36, 28, 2, 'High', 'Open', '2021-05-05 15:24:14', '2021-05-07', '2021-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `comment_task`
--

CREATE TABLE `comment_task` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_task`
--

INSERT INTO `comment_task` (`comment_id`, `user_id`, `task_id`, `comment`, `creation_date`) VALUES
(1, 5, 1, '', '2021-04-23 12:33:39'),
(2, 5, 1, 'Good Job', '2021-04-23 12:33:55'),
(3, 7, 2, 'test comment for test task 1', '2021-04-23 13:40:14'),
(4, 14, 3, 'Kindly update the navigation bar to a burger when resized.', '2021-04-24 14:26:49'),
(5, 14, 3, 'Will do!', '2021-04-24 14:27:13'),
(6, 13, 4, 'Kindly create a new html page called enhancements2.html', '2021-04-24 14:29:49'),
(7, 13, 5, 'This task is completed.', '2021-04-24 14:31:25'),
(8, 14, 3, 'The status of this task is Doing.', '2021-04-24 14:33:17'),
(9, 14, 5, 'Great!', '2021-04-24 14:33:54'),
(10, 14, 4, 'Will do!', '2021-04-24 14:34:47'),
(11, 18, 10, 'done', '2021-04-28 07:52:35'),
(12, 25, 15, 'qqfsdfgd', '2021-04-29 01:24:30'),
(13, 26, 16, 'test', '2021-04-29 04:56:25'),
(14, 27, 17, 'Cool', '2021-04-29 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `contactusform`
--

CREATE TABLE `contactusform` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusform`
--

INSERT INTO `contactusform` (`contact_id`, `name`, `email`, `subject`, `comment`) VALUES
(1, 'Pam Parmer', 'pam.parmer@googlemail.com', '', 'Looking for more customers for your website or online store? We can get you targeted traffic specifically for your business model\r\n For more info Visit: http://bit.ly/webtraffic-foryourniche'),
(2, 'Xavier', 'xavierljw336@gmail.com', 'Test', 'Testing'),
(3, 'Abraham Homenick', 'London.Thompson@yahoo.com', 'optical', 'benchmark'),
(4, 'Latanya Deane', 'deane.latanya@gmail.com', '', 'Looking for fresh buyers? Obtain thousands of people who are ready to buy sent directly to your website. Increase your profits fast. Start seeing results in as little as 48 hours. To get details For details visit: http://bit.ly/webtraffic-foryourniche'),
(5, 'Mickie Fanny', 'mickie.fanny@gmail.com', '', 'Do you need more buyers for your website? We can deliver targeted people precisely for your business\r\n For additional information For details visit: http://bit.ly/get-real-web-visitors'),
(6, 'Caren Willmott', 'willmott.caren@outlook.com', '', 'Boost visitor volumes to your site fast. Get 3,000 visitors in any niche for less than $40. Traffic guaranteed or your money refunded: http://bit.ly/real-human-visitors');

-- --------------------------------------------------------

--
-- Table structure for table `custom_draft`
--

CREATE TABLE `custom_draft` (
  `custom_draft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(225) NOT NULL,
  `custom` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_draft`
--

INSERT INTO `custom_draft` (`custom_draft_id`, `user_id`, `document_name`, `custom`) VALUES
(1, 13, 'LaBeauté', '<p>Things need to be fixed:<br />1. Navigation bar</p>\r\n<p>2. XML Error on &lt;video autoplay&gt;</p>\r\n<p>3. Add 2 enhancements on JavaScript</p>'),
(2, 2, 'Test 1', '<p>test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `text_color` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `start_event`, `end_event`, `color`, `text_color`) VALUES
(1, 4, 'Accounting', '2021-05-27 00:00:00', '2021-05-27 00:00:00', '#FF0000', '#ffffff'),
(2, 5, 'YOLO', '2021-04-23 00:00:00', '2021-04-30 00:00:00', '#ea0000', '#000000'),
(3, 2, 'Test task 1', '2021-06-01 00:00:00', '2021-06-01 00:00:00', '#FF0000', '#ffffff'),
(4, 1, 'Test task 1', '2021-06-01 00:00:00', '2021-06-01 00:00:00', '#FF0000', '#ffffff'),
(5, 7, 'Can we invite Jasmine and Elaine?', '2021-04-10 00:00:00', '2021-04-20 00:00:00', '#6453e9', '#ffffff'),
(6, 7, 'Can we invite Jasmine and Elaine?', '2021-04-10 00:00:00', '2021-04-20 00:00:00', '#6453e9', '#ffffff'),
(7, 14, 'index.html', '2021-04-25 00:00:00', '2021-04-25 00:00:00', '#FF0000', '#ffffff'),
(8, 14, 'enhancement2.html', '2021-05-01 00:00:00', '2021-05-01 00:00:00', '#FF0000', '#ffffff'),
(9, 13, 'enquiry.html', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(10, 13, 'CWA Assignment 2 Due', '2021-04-24 00:00:00', '2021-05-11 11:59:00', '#6453e9', '#ffffff'),
(11, 9, 'Testing Title', '2021-04-24 00:00:00', '2021-04-25 00:00:00', '#6453e9', '#ffffff'),
(13, 9, 'Task 1', '2021-04-27 00:00:00', '2021-04-27 00:00:00', '#FF0000', '#ffffff'),
(14, 1, 'Getting started', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(15, 2, 'Getting started', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(16, 3, 'Counter announcement', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(17, 15, 'Time to withdraw', '2021-05-01 00:00:00', '2021-05-01 00:00:00', '#FF0000', '#ffffff'),
(18, 1, 'Hello Wolrd', '2021-04-14 17:18:17', '2021-04-26 11:17:18', '#6453e9', '#ffffff'),
(19, 3, 'testing', '2021-04-27 00:00:00', '2021-04-28 00:00:00', '#6453e9', '#ffffff'),
(20, 1, 'testing', '2021-04-29 00:00:00', '2021-04-29 00:00:00', '#FF0000', '#ffffff'),
(21, 21, 'complete gear train', '2021-04-29 00:00:00', '2021-04-29 00:00:00', '#FF0000', '#ffffff'),
(22, 0, 'UML ', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(23, 22, 'UML', '2021-04-29 00:00:00', '2021-04-30 00:00:00', '#6453e9', '#ffffff'),
(24, 1, 'Patty preparation', '2021-04-29 00:00:00', '2021-04-29 00:00:00', '#FF0000', '#ffffff'),
(25, 24, 'UCD', '2021-05-01 00:00:00', '2021-05-01 00:00:00', '#FF0000', '#ffffff'),
(26, 1, 'qwe', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(27, 25, 'jj', '2021-04-30 00:00:00', '2021-04-30 16:00:00', '#6453e9', '#ffffff'),
(28, 26, 'tset', '2021-05-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(29, 26, 'test', '2021-04-29 13:00:20', '2021-04-30 00:00:00', '#6453e9', '#ffffff'),
(30, 1, 'Cleaning', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(31, 2, 'Cleaning', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(32, 1, 'Wirting', '2021-05-30 00:00:00', '2021-05-30 00:00:00', '#FF0000', '#ffffff'),
(33, 28, 'Meeting with group', '2021-05-04 01:10:00', '2021-05-05 00:00:00', '#ff0009', '#000000'),
(34, 31, '1', '2021-05-26 00:00:00', '2021-05-26 00:00:00', '#FF0000', '#ffffff'),
(35, 1, 'Task 1', '2021-05-12 00:00:00', '2021-05-12 00:00:00', '#FF0000', '#ffffff'),
(36, 33, 'Hari Raya', '2021-05-13 00:00:00', '2021-05-14 00:00:00', '#00ff38', '#000000'),
(37, 2, 'Test', '2021-05-13 00:00:00', '2021-05-14 00:00:00', '#6453e9', '#ffffff'),
(38, 5, 'z', '2021-06-06 00:00:00', '2021-06-06 00:00:00', '#FF0000', '#ffffff'),
(39, 2, 'Sprint Planning', '2021-05-06 00:00:00', '2021-05-06 00:00:00', '#FF0000', '#ffffff'),
(40, 36, 'Design wireframe', '2021-05-14 00:00:00', '2021-05-14 00:00:00', '#FF0000', '#ffffff'),
(41, 1, 'Designing Database', '2021-05-06 00:00:00', '2021-05-06 00:00:00', '#FF0000', '#ffffff'),
(42, 36, 'Daily scrum meeting', '2021-05-14 10:45:00', '2021-05-13 18:17:00', '#6453e9', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_survey`
--

CREATE TABLE `feedback_survey` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(225) NOT NULL,
  `major` varchar(225) NOT NULL,
  `understanding` varchar(225) NOT NULL,
  `experience` varchar(225) NOT NULL,
  `like_ui` varchar(225) NOT NULL,
  `navigation_feature` varchar(225) NOT NULL,
  `process_flow` varchar(225) NOT NULL,
  `tools_provided` varchar(225) NOT NULL,
  `linkage` varchar(225) NOT NULL,
  `rate` varchar(225) NOT NULL,
  `recommend` varchar(225) NOT NULL,
  `like_most` longtext,
  `like_least` longtext,
  `improve` longtext,
  `new_feature` longtext,
  `bugs` longtext,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_survey`
--

INSERT INTO `feedback_survey` (`feedback_id`, `name`, `email`, `role`, `major`, `understanding`, `experience`, `like_ui`, `navigation_feature`, `process_flow`, `tools_provided`, `linkage`, `rate`, `recommend`, `like_most`, `like_least`, `improve`, `new_feature`, `bugs`, `creation_date`) VALUES
(1, 'Cheyenne', '101209756@students.swinburne.edu.my', 'Students', 'Computing', 'Average', 'Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Good', 'Good', 'Very Good', 'Very Likely', 'The UI is excellent, feels like i\'m using a legit website at first. The basic necessity function for Agile Master system is also included.', 'I tried to use this website with my phone but later found out that the UI is not fluid, which means it doesnt fit my phone screen.', 'Which you guys could make the UI more fluid.', 'No comments.', NULL, '2021-04-23 11:36:31'),
(2, 'Bryan Hon Sheng Chun', 'bhsc1998@gmail.com', 'Students', 'Computing', 'Average', 'Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Likely', 'Board Page', 'Time tracker', 'There seems to be just a slight bug on the adding member into the project page that it\'ll kind of duplicate but overall it\'s good', 'It would be nice if you can change the project image', NULL, '2021-04-23 12:50:51'),
(3, 'Gabby', 'gbkong98@gmail.com', 'Students', 'Computing', 'Average', 'Average', 'Very Good', 'Good', 'Good', 'Average', 'Good', 'Good', 'Very Likely', '', '', 'age part maybe the developer can set a min age range so people won\'t get a negative age and can\'t find the create task button ', '', NULL, '2021-04-23 13:26:48'),
(4, 'Wilson Mah', '101208368@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Excellent ', 'Good', 'Good', 'Very Good', 'Excellent ', 'Very Good', 'Very Good', 'Very Likely', 'Overall I like the idea where integrating all the tools required by a software development team into a website. The reason being it could potentially save the dev team a lot of times since developers do not have to open loads of webpage all the time such as GitHub (for tracking commits), Trello (for tracking backlog items) and other tools that are used by the dev teams. Other than that, UI is clean and easy to navigate from modules to modules and most of the features found on the webpage are design towards users which provide the users with a good experience while using the app.', 'GitHub module and Diagram module', 'For the GitHub module, I would prefer it lets user link their project repository to the Agile Master account (like using webhook to integrate GitHub updates into a channel for tracking GitHub commits). As for the diagram creator, I found this module a little bit difficult to use since sometimes I was not able to drag the diagram I want, I would recommend making the diagram easier for users to drag and drop.', 'No, since this web system already has all the features that are required by a dev team.', NULL, '2021-04-23 14:07:25'),
(5, 'Yan Ting', '101209183@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Very Good', 'Very Good', 'Excellent ', 'Very Good', 'Excellent ', 'Excellent ', 'Very Good', 'Very Likely', 'The document generator for document such as meeting minutes which are very convenient.', 'Overall there are no dissatisfying items while using the system.', 'There is one minor thing which is the Login button on the homepage are quite unobvious for me, probably could move next to the Get Started button.', 'I think overall the system is well done in my humble opinion :D', NULL, '2021-04-23 17:38:17'),
(6, 'Jackie Chin Yong An', 'jackiechin9875@gmail.com', 'Students', 'Computing', 'Good', 'Average', 'Excellent ', 'Excellent ', '', 'Very Good', 'Excellent ', 'Very Good', 'Very Likely', 'Upload project ', 'Time tracker, because it is abit confusing', 'Age, can be negative\r\nCity and Country should have a dropdown list\r\nTime tracker navigation, if keep clicking time tracker navigation, time tracker will be recorded ', 'cloud saving', NULL, '2021-04-24 12:45:55'),
(7, 'Lee Jia Wei', 'xavierljw336@gmail.com', 'Students', 'Computing', 'Good', 'Good', 'Very Good', 'Very Good', 'Very Good', 'Excellent ', '', 'Excellent ', '', '', '', '', '', NULL, '2021-04-24 15:25:31'),
(8, 'Kevin Tan', 'ktan@swinburne.edu.my', 'Lecturer', 'Business', 'Average', 'Good', 'Very Good', 'Good', 'Very Good', 'Good', 'Very Good', 'Good', 'Very Likely', 'A number of options and features available', 'Lacks user customizability', 'Giving user the freedom or flexibility to customize their settings according to their preference/project', 'Allow for projects to have multiple project leaders, and to maybe setup the project with more features based on respective needs', NULL, '2021-04-25 04:38:45'),
(9, 'Simon Lu', 'simonlu_97@hotmail.com', 'Students', 'Computing', 'Good', 'Very Good', 'Excellent ', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Likely', 'Sidebar menu ', 'Some font inconsistent ', '-', '', '-', '2021-04-27 20:36:33'),
(10, 'Bryan Teo', 'iamtrollking997@gmail.com', 'Students', 'Computing', 'Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', 'dayum why dont u just released online. the last agile website i used is not even better than this. this is good', 'all good', 'all good', 'everything i needed is inside', 'nah all good.', '2021-04-28 07:57:33'),
(11, 'Stephen Lee', 'stephen822@gmail.com', 'Students', 'Engineering', 'Average', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Good', 'Excellent ', 'Very Good', 'Excellent ', 'Very Likely', 'The dashboard.', '-', 'Register Page, dropdown menu for cities or country instead of typing manually.', '-', 'No errors found at the moment.', '2021-04-28 10:36:45'),
(12, 'Jennifer Lim', 'jenniferlim12@gmail.com', 'Students', 'Science', 'Average', 'Very Good', 'Excellent ', 'Very Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', 'The overall system looks nice, just like the initial one in the market.', 'I don\'t really understand the GitHub one, but i guess because i didn\'t use it.', 'Nope.', 'Nope. All looks good. Good Job.', 'Abit buggy when upload profile image but it still works anyway.', '2021-04-28 10:43:55'),
(13, 'Bong Sze Chi', '101214174@students.swinburne.edu.my', 'Students', 'Engineering', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Good', 'Excellent ', 'Very Good', 'Very Likely', 'summary of task assigned', 'colour and design of words', 'dashboard as when the side bar is expanded, the word \"Total projects\" overlapped with the icon.', 'add more animation and improve the designs to motivate users to complete their task in time', 'Add more animation and try to include well designed headlines', '2021-04-28 14:38:40'),
(14, 'Gillian ', '101210020@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Likely', 'Members page', '- ', '- ', '- ', '-', '2021-04-29 01:32:42'),
(15, 'Brian Loh', 'bloh@swinburne.edu.my', 'Lecturer', 'Computing', 'Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Good', 'Good', 'Good', 'Very Likely', '- Interface, theme, functionalities', '- Lack of instructions for users', '- Indicate that there are new announcements when the user views the dashboard\r\n- Allow editing of task details after creation', '- Perhaps notification feature (email / push)', '- When viewing a board, the menu should highlight Board instead of Projects.\r\n- The calendar is missing validation for start and end date. E.g. The start date can be later than end date.\r\n- In Uploads, if 2 users upload a file with the same name, the newer file would overwrite the older file. Files should be appended with some unique values to prevent this from happening.\r\n- Reloading the Time Tracker page causes multiple timers to appear.\r\n- Should the Live Chat show all users in the system, or only the team members?', '2021-04-29 05:14:50'),
(16, 'Kenneth Lo Jin Chan', 'kennethlojinchan@live.com', 'Students', 'Engineering', 'Average', 'Poor', 'Very Good', 'Very Good', 'Good', 'Good', 'Good', 'Very Good', 'Very Likely', 'Calendar', 'None', 'I think when adding the team members to a task in the board it will keep going back to the main page which is kind of annoying. I hope it can remain at the same page. ', 'Feature to change the theme of the website for user preferences', 'So far no errors', '2021-04-29 06:13:43'),
(17, 'Ahmed Safty', 'ahmedsafty96@gmail.com', 'Students', 'Engineering', 'Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', 'The easiness of the use of project making, choosing members, calendar adjustments, and the progress report generated. Also, the document generator makes it easy to make quick reports needed.', 'As i mentioned before the redirection in the projects tap.', 'Nothing specific all of the UI is perfect and all the tools work perfectly.', 'Voice notes if possible in the chat rooms between the members.', 'It is not an error but redirection in creating new projects it rests to the main page of the project when I create a new board or new team member', '2021-04-29 20:54:27'),
(18, 'Abdullah-Al-Kafi', 'kafi.bracu@gmail.com', 'Students', 'Business', 'Good', 'Very Good', 'Excellent ', 'Excellent ', 'Very Good', 'Excellent ', 'Excellent ', 'Excellent ', 'Very Likely', '', '', '', '', '', '2021-05-01 06:50:40'),
(19, 'Lai Peng Hung', '101208371@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Very Good', 'Good', 'Very Likely', '', '', 'Could use some front-end framework such as ajax to reduce the reloading of the page.\r\nThe hide menu button at the top navbar can move to the sidebar because I need to scroll up again if I want to hide the sidebar on a long page.', '', '', '2021-05-01 10:50:55'),
(20, 'Tay Yuan Long', '101219946@students.swinburne.edu.my', 'Students', 'Computing', 'Good', 'Average', 'Very Good', 'Good', 'Very Good', 'Very Good', 'Good', 'Very Good', 'Very Likely', 'The diagram creator. As it actually allow the user to create flowchart or pageflow', 'The uploads system as only the manager allow to delete the upload items.', 'I think the whole system is well done, so personally there is nothing need ti be improve', '', 'I didn\'t encounter any error while going through the process flow', '2021-05-02 08:27:08'),
(21, 'Fu Swee Tee', 'test@gmail.com', 'Lecturer', 'Computing', 'Good', 'Excellent ', 'Very Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Very Likely', 'UI is very clean and integration of project tools in a single platform. Document and diagram generator are very helpful.', 'The bugs encountered as well as the live chat system could be more easily accessible.', 'Live chat - notifications needed at the top right corner of the chat menu for any new messages.\r\nNotifications - would be better to group the notifications into read/unread, so that the user will be able to know which are the notifications that are new and could pay attention to that.\r\nTime tracker - to be functional\r\nCalendar - to be integrated with the email calendar', 'More data analytics component which will be helpful to the management team in analyzing the entire project/team efficiency\r\nProject costing module to keep track of the budget of spent for the project across the project duration.\r\n', 'After adding the team member and creating the board, expected to load the same tab instead of Project Description tab.\r\n\r\nNew Task - Start Date and Due Date could not be the same date? What if the complete duration is within a day?\r\n\r\nLive Chat at the top right - Can chat with anyone? Even not the project team member? The main chat listing only showed four users? Who are these users? No notification received when there\'s new chat messages from other team member?\r\n\r\nCalendar > Add Event - No checking on start date and end date, no checking on overlapping time?\r\n\r\nTime Tracker - displaying empty rows of data, timer did not captured the total duration spent', '2021-05-05 15:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE `file_storage` (
  `storage_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_uploaded` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_storage`
--

INSERT INTO `file_storage` (`storage_id`, `file_name`, `file`, `date_uploaded`, `document_type`, `project_id`, `user_id`) VALUES
(1, 'First file', 'chilled.jpg', '23-04-2021', 'Testing', 3, 5),
(2, 'foodIntake_Track_Add.dart', 'foodIntake_Track_Add.dart', '23-04-2021', 'Implementation', 5, 7),
(3, 'LaBeauté', 'Assignment 2 instructions.pdf', '24-04-2021', 'Reports', 7, 13),
(4, 'User Guide', 'Agile Master - User Testing Guidelines.pdf', '25-04-2021', 'Others', 9, 15),
(5, 'UML', 'pass task UML.drawio', '29-04-2021', '', 15, 22),
(6, 'h', 'IMG_20190221_102022.jpg', '29-04-2021', 'Others', 18, 25),
(7, 'test', 'Test.pdf', '29-04-2021', 'Design', 19, 26),
(8, 'test2', 'Test.pdf', '29-04-2021', 'Implementation', 19, 26),
(9, 'test3', 'Test.txt', '29-04-2021', 'Testing', 19, 26),
(10, 'test4', 'Test.txt', '29-04-2021', 'Testing', 19, 26),
(11, 'The blueprint', 'tester.exe', '29-04-2021', 'Others', 22, 3),
(12, 'testing if can put virus file also', 'tobeuploaded.bat', '29-04-2021', 'Others', 22, 3),
(13, 'File 1', 'water1.jpg', '05-05-2021', 'Design', 27, 33),
(14, 'Flowchart', 'Flowchart-Diagram (1).png', '05-05-2021', 'Design', 29, 36);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_agenda_draft`
--

CREATE TABLE `meeting_agenda_draft` (
  `meeting_agenda_draft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `called_by` varchar(255) NOT NULL,
  `note_taker` varchar(255) NOT NULL,
  `time_keeper` varchar(255) NOT NULL,
  `attendees` varchar(255) NOT NULL,
  `agenda_items` longtext,
  `action_items_from_previous_meeting` longtext,
  `new_action_items` longtext,
  `notes_info` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_minutes_draft`
--

CREATE TABLE `meeting_minutes_draft` (
  `meeting_minutes_draft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `called_by` varchar(255) NOT NULL,
  `note_taker` varchar(255) NOT NULL,
  `time_keeper` varchar(255) NOT NULL,
  `attendees` varchar(255) NOT NULL,
  `agenda_items` longtext,
  `decisions` longtext,
  `new_action_items` longtext,
  `notes_info` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 440472704, 456593959, 'hi'),
(2, 1332808358, 456593959, 'how\'s the progress?'),
(3, 440472704, 917304012, 'Sup'),
(4, 1332808358, 917304012, 'HALO'),
(5, 1332808358, 917304012, 'CAN YOU DO YOUR WORK?'),
(6, 1332808358, 966478505, 'hello'),
(7, 1332808358, 966478505, 'byebye'),
(8, 1103249274, 1377370132, 'Hi there, this is Xavier.'),
(9, 1377370132, 1103249274, 'Hey! This is Jia Wei!'),
(10, 1377370132, 1103249274, 'I was wondering if you have finished creating the enhancements2.html page?'),
(11, 1103249274, 1377370132, 'Oh? I thought that task was assigned to you?'),
(12, 1377370132, 1103249274, 'oh really? let me check!'),
(13, 1377370132, 1103249274, 'oh indeed! i\'m sorry!'),
(14, 1103249274, 1377370132, 'no worries! take your time!'),
(15, 1103249274, 1377370132, 'Also, kindly give an update on the enquiry.html'),
(16, 1377370132, 1103249274, 'oh, for that, I\'ve completed all verifications already! kindly give it a try and let me know if there is anything that needs improvement.'),
(17, 1103249274, 1377370132, 'Will do!'),
(18, 1103249274, 1337482885, 'OK thank you :)'),
(19, 456593959, 655539570, '.'),
(20, 456593959, 655539570, '.'),
(21, 1332808358, 636061308, 'livechat abc'),
(22, 1332808358, 350729646, 'test'),
(23, 1332808358, 1334448860, 'Oof'),
(24, 1332808358, 1334448860, 'Hello'),
(25, 1337482885, 1334448860, 'Test'),
(26, 1332808358, 1500107397, 'Testing 123'),
(27, 1587952541, 1160003630, 'teset'),
(28, 966478505, 1160003630, 'test'),
(29, 1160003630, 966478505, 'Hi'),
(30, 1160003630, 1587952541, 'Halo'),
(31, 1160003630, 1587952541, 'Hi'),
(32, 1587952541, 1160003630, 'tttt'),
(33, 966478505, 989429769, 'Hello there dummy2'),
(34, 655539570, 989429769, 'Hello dummy3'),
(35, 989429769, 1332808358, 'HEllo Peter'),
(36, 989429769, 655539570, 'hello'),
(37, 1192056129, 1337482885, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `recipient_id`, `activity`, `date_time`) VALUES
(1, 1, 'Project Manager added you into Testing project', '2021-04-23 12:29:14'),
(2, 4, 'Project Manager added you into Testing project', '2021-04-23 12:29:20'),
(3, 4, 'Bryan swithed role with you in Testing project', '2021-04-23 12:29:26'),
(4, 1, 'Project Manager added you into Test 2 project', '2021-04-23 12:30:15'),
(5, 2, 'Project Manager added you into Test 2 project', '2021-04-23 12:30:20'),
(6, 3, 'Project Manager added you into Test 2 project', '2021-04-23 12:30:24'),
(7, 4, 'Project Manager added you into Test 2 project', '2021-04-23 12:30:29'),
(8, 4, 'Project Manager added you into Test 2 project', '2021-04-23 12:30:35'),
(9, 4, 'Project Manager added you into Test 2 project', '2021-04-23 12:31:01'),
(10, 5, 'Project Manager added new board in Test 2 project', '2021-04-23 12:31:56'),
(11, 1, 'Project Manager added new board in Test 2 project', '2021-04-23 12:31:56'),
(12, 2, 'Project Manager added new board in Test 2 project', '2021-04-23 12:31:56'),
(13, 3, 'Project Manager added new board in Test 2 project', '2021-04-23 12:31:56'),
(14, 4, 'Project Manager added new board in Test 2 project', '2021-04-23 12:31:56'),
(15, 4, 'Bryan Hon assigned Accounting task in  board', '2021-04-23 12:32:40'),
(16, 3, 'Bryan Hon assigned bug to you (Uploading profile pic) in Test 2 project', '2021-04-23 12:38:43'),
(17, 1, 'Project Manager added you into 123 project', '2021-04-23 13:20:47'),
(18, 1, 'Gabriel Kong swithed role with you in 123 project', '2021-04-23 13:21:18'),
(19, 1, 'Project Manager added you into Project 1 project', '2021-04-23 13:34:35'),
(20, 2, 'Project Manager added you into Project 1 project', '2021-04-23 13:34:42'),
(21, 3, 'Project Manager added you into Project 1 project', '2021-04-23 13:34:53'),
(22, 7, 'Project Manager added new board in Project 1 project', '2021-04-23 13:37:51'),
(23, 1, 'Project Manager added new board in Project 1 project', '2021-04-23 13:37:51'),
(24, 2, 'Project Manager added new board in Project 1 project', '2021-04-23 13:37:51'),
(25, 3, 'Project Manager added new board in Project 1 project', '2021-04-23 13:37:51'),
(26, 2, 'Wilson Mah assigned Test task 1 task in  board', '2021-04-23 13:39:08'),
(27, 1, 'Project Manger assigned  Test task 1 task to you in  board', '2021-04-23 13:39:33'),
(28, 7, 'Wilson Mah assigned bug to you (Test bug) in Project 1 project', '2021-04-23 13:46:04'),
(29, 8, 'Project Manager added new board in test project', '2021-04-23 17:26:40'),
(30, 1, 'Project Manager added you into Labeauté project', '2021-04-24 14:09:21'),
(31, 2, 'Project Manager added you into Labeauté project', '2021-04-24 14:09:32'),
(32, 3, 'Project Manager added you into Labeauté project', '2021-04-24 14:09:40'),
(33, 3, 'Xavier swithed role with you in Labeauté project', '2021-04-24 14:09:46'),
(34, 13, 'Dummy3 swithed role with you in Labeauté project', '2021-04-24 14:11:08'),
(35, 13, 'Project Manager added new board in Labeauté project', '2021-04-24 14:14:27'),
(36, 1, 'Project Manager added new board in Labeauté project', '2021-04-24 14:14:27'),
(37, 2, 'Project Manager added new board in Labeauté project', '2021-04-24 14:14:27'),
(38, 3, 'Project Manager added new board in Labeauté project', '2021-04-24 14:14:27'),
(39, 14, 'Project Manager added you into Labeauté project', '2021-04-24 14:23:02'),
(40, 14, 'Jia Wei Lee assigned index.html task in  board', '2021-04-24 14:26:11'),
(41, 14, 'Xavier Lee assigned enhancement2.html task in  board', '2021-04-24 14:29:06'),
(42, 13, 'Xavier Lee assigned enquiry.html task in  board', '2021-04-24 14:31:03'),
(43, 14, 'Xavier Lee assigned bug to you (index.html) in Labeauté project', '2021-04-24 15:00:39'),
(44, 10, 'Project Manager added you into FYP B project', '2021-04-24 15:46:22'),
(45, 9, 'Project Manager added new board in FYP B project', '2021-04-24 15:46:33'),
(46, 10, 'Project Manager added new board in FYP B project', '2021-04-24 15:46:33'),
(47, 9, 'Jason Goh assigned Task 1 task in  board', '2021-04-24 15:47:03'),
(48, 1, 'Project Manager added you into Super League project', '2021-04-25 04:12:08'),
(49, 2, 'Project Manager added you into Super League project', '2021-04-25 04:12:25'),
(50, 15, 'Project Manager added new board in Super League project', '2021-04-25 04:15:49'),
(51, 1, 'Project Manager added new board in Super League project', '2021-04-25 04:15:49'),
(52, 2, 'Project Manager added new board in Super League project', '2021-04-25 04:15:49'),
(53, 1, 'Kev Tan assigned Getting started task in  board', '2021-04-25 04:16:31'),
(54, 2, 'Project Manger assigned  Getting started task to you in  board', '2021-04-25 04:17:48'),
(55, 3, 'Project Manager added you into Champions League project', '2021-04-25 04:19:59'),
(56, 15, 'Project Manager added new board in Champions League project', '2021-04-25 04:20:08'),
(57, 3, 'Project Manager added new board in Champions League project', '2021-04-25 04:20:08'),
(58, 3, 'Kev Tan assigned Counter announcement task in  board', '2021-04-25 04:20:36'),
(59, 15, 'Project Manager added new board in Super League project', '2021-04-25 04:22:27'),
(60, 1, 'Project Manager added new board in Super League project', '2021-04-25 04:22:27'),
(61, 2, 'Project Manager added new board in Super League project', '2021-04-25 04:22:27'),
(62, 15, 'Kev Tan assigned Time to withdraw task in  board', '2021-04-25 04:23:00'),
(63, 1, 'Kev Tan assigned bug to you (Wrong description) in Super League project', '2021-04-25 04:34:05'),
(64, 11, 'Project Manager added you into testing123 project', '2021-04-28 07:48:36'),
(65, 1, 'Project Manager added you into testing123 project', '2021-04-28 07:48:59'),
(66, 2, 'Project Manager added you into testing123 project', '2021-04-28 07:49:05'),
(67, 3, 'Project Manager added you into testing123 project', '2021-04-28 07:49:11'),
(68, 18, 'Project Manager added new board in testing123 project', '2021-04-28 07:49:41'),
(69, 1, 'Project Manager added new board in testing123 project', '2021-04-28 07:49:41'),
(70, 2, 'Project Manager added new board in testing123 project', '2021-04-28 07:49:41'),
(71, 3, 'Project Manager added new board in testing123 project', '2021-04-28 07:49:41'),
(72, 1, 'bryan Teo assigned testing task in  board', '2021-04-28 07:51:13'),
(73, 19, 'Project Manager added new board in Agile Project project', '2021-04-28 10:34:54'),
(74, 21, 'Project Manager added new board in EWB Project project', '2021-04-28 14:30:11'),
(75, 21, 'Sze Chi Bong assigned complete gear train task in  board', '2021-04-28 14:30:45'),
(76, 0, 'Project Manager added you into Programming  project', '2021-04-28 16:42:50'),
(77, 0, 'Project Manager added you into Programming  project', '2021-04-28 16:43:01'),
(78, 0, 'Project Manager added you into Programming  project', '2021-04-28 16:43:32'),
(79, 22, 'Project Manager added new board in Programming  project', '2021-04-28 16:49:41'),
(80, 0, 'Project Manager added new board in Programming  project', '2021-04-28 16:49:41'),
(81, 0, 'Project Manager added new board in Programming  project', '2021-04-28 16:49:41'),
(82, 0, 'Project Manager added new board in Programming  project', '2021-04-28 16:49:41'),
(83, 0, 'Ibrahim Al-hadhrami assigned UML  task in  board', '2021-04-28 16:51:38'),
(84, 1, 'Project Manager added you into How to make a burger project', '2021-04-28 17:27:44'),
(85, 2, 'Project Manager added you into How to make a burger project', '2021-04-28 17:28:10'),
(86, 3, 'Project Manager added you into How to make a burger project', '2021-04-28 17:28:19'),
(87, 23, 'Project Manager added new board in How to make a burger project', '2021-04-28 17:31:08'),
(88, 1, 'Project Manager added new board in How to make a burger project', '2021-04-28 17:31:08'),
(89, 2, 'Project Manager added new board in How to make a burger project', '2021-04-28 17:31:08'),
(90, 3, 'Project Manager added new board in How to make a burger project', '2021-04-28 17:31:08'),
(91, 1, 'Joel Goh assigned Patty preparation task in  board', '2021-04-28 17:36:46'),
(92, 0, 'Project Manager added you into Programming  project', '2021-04-28 17:43:41'),
(93, 1, 'Project Manager added you into Programming  project', '2021-04-28 17:43:50'),
(94, 24, 'Project Manager added you into Programming  project', '2021-04-28 17:47:36'),
(95, 24, 'Ibrahim swithed role with you in Programming  project', '2021-04-28 17:47:48'),
(96, 22, 'Thulani swithed role with you in Programming  project', '2021-04-28 17:49:12'),
(97, 24, 'Ibrahim Al-hadhrami assigned UCD task in  board', '2021-04-28 17:51:06'),
(98, 2, 'Project Manager added you into ETMP project', '2021-04-29 01:21:38'),
(99, 1, 'Project Manager added you into ETMP project', '2021-04-29 01:21:48'),
(100, 3, 'Project Manager added you into ETMP project', '2021-04-29 01:21:59'),
(101, 2, 'Gillian  swithed role with you in ETMP project', '2021-04-29 01:22:16'),
(102, 1, 'Project Manager added you into 111 project', '2021-04-29 01:23:28'),
(103, 25, 'Project Manager added new board in 111 project', '2021-04-29 01:23:37'),
(104, 1, 'Project Manager added new board in 111 project', '2021-04-29 01:23:37'),
(105, 1, 'Gillian  Tan  assigned qwe task in  board', '2021-04-29 01:24:04'),
(106, 25, 'Gillian  Tan  assigned bug to you (asdf) in ETMP project', '2021-04-29 01:28:13'),
(107, 1, 'Project Manager added you into Test Project project', '2021-04-29 04:51:26'),
(108, 2, 'Project Manager added you into Test Project project', '2021-04-29 04:51:32'),
(109, 3, 'Project Manager added you into Test Project project', '2021-04-29 04:51:37'),
(110, 26, 'Project Manager added new board in Test Project project', '2021-04-29 04:54:18'),
(111, 1, 'Project Manager added new board in Test Project project', '2021-04-29 04:54:18'),
(112, 2, 'Project Manager added new board in Test Project project', '2021-04-29 04:54:18'),
(113, 3, 'Project Manager added new board in Test Project project', '2021-04-29 04:54:18'),
(114, 26, 'Test11 Test22 assigned tset task in  board', '2021-04-29 04:55:24'),
(115, 26, 'Test11 Test22 assigned bug to you (test) in Test Project project', '2021-04-29 05:04:42'),
(116, 1, 'Project Manager added you into Testing project', '2021-04-29 06:04:14'),
(117, 2, 'Project Manager added you into Testing project', '2021-04-29 06:04:24'),
(118, 3, 'Project Manager added you into Testing project', '2021-04-29 06:04:30'),
(119, 27, 'Project Manager added new board in Testing project', '2021-04-29 06:04:52'),
(120, 1, 'Project Manager added new board in Testing project', '2021-04-29 06:04:52'),
(121, 2, 'Project Manager added new board in Testing project', '2021-04-29 06:04:52'),
(122, 3, 'Project Manager added new board in Testing project', '2021-04-29 06:04:52'),
(123, 1, 'Kenneth Lo assigned Cleaning task in  board', '2021-04-29 06:05:51'),
(124, 2, 'Project Manger assigned  Cleaning task to you in  board', '2021-04-29 06:07:03'),
(125, 3, 'Project Manager added new board in 123 project', '2021-04-29 13:23:57'),
(126, 3, 'Project Manager added new board in 123 project', '2021-04-29 13:24:35'),
(127, 10, 'Project Manager added you into project x project', '2021-04-29 13:27:32'),
(128, 10, 'Dummy3 swithed role with you in project x project', '2021-04-29 13:27:46'),
(129, 1, 'Project Manager added you into LowRise Assignment B project', '2021-04-29 20:43:29'),
(130, 3, 'Project Manager added you into LowRise Assignment B project', '2021-04-29 20:43:36'),
(131, 2, 'Project Manager added you into LowRise Assignment B project', '2021-04-29 20:43:53'),
(132, 28, 'Project Manager added new board in LowRise Assignment B project', '2021-04-29 20:44:16'),
(133, 1, 'Project Manager added new board in LowRise Assignment B project', '2021-04-29 20:44:16'),
(134, 3, 'Project Manager added new board in LowRise Assignment B project', '2021-04-29 20:44:16'),
(135, 2, 'Project Manager added new board in LowRise Assignment B project', '2021-04-29 20:44:16'),
(136, 1, 'Ahmed  Elsafty assigned Wirting task in  board', '2021-04-29 20:45:20'),
(137, 2, 'Project Manager added you into TEST PROJECT FEATURE project', '2021-04-30 05:44:59'),
(138, 1, 'Project Manager added new board in TEST PROJECT FEATURE project', '2021-04-30 05:45:27'),
(139, 2, 'Project Manager added new board in TEST PROJECT FEATURE project', '2021-04-30 05:45:27'),
(140, 1, 'Project Manager added you into Bundle Of Joy project', '2021-05-01 10:31:56'),
(141, 2, 'Project Manager added you into Bundle Of Joy project', '2021-05-01 10:32:36'),
(142, 3, 'Project Manager added you into Bundle Of Joy project', '2021-05-01 10:32:43'),
(143, 31, 'Project Manager added new board in Bundle Of Joy project', '2021-05-01 10:34:05'),
(144, 1, 'Project Manager added new board in Bundle Of Joy project', '2021-05-01 10:34:05'),
(145, 2, 'Project Manager added new board in Bundle Of Joy project', '2021-05-01 10:34:05'),
(146, 3, 'Project Manager added new board in Bundle Of Joy project', '2021-05-01 10:34:05'),
(147, 31, 'Lai Peng Hung assigned 1 task in  board', '2021-05-01 10:34:57'),
(148, 1, 'Project Manager added you into Testing project', '2021-05-02 08:08:25'),
(149, 2, 'Project Manager added you into Testing project', '2021-05-02 08:08:33'),
(150, 3, 'Project Manager added you into Testing project', '2021-05-02 08:08:39'),
(151, 32, 'Project Manager added new board in Testing project', '2021-05-02 08:11:48'),
(152, 1, 'Project Manager added new board in Testing project', '2021-05-02 08:11:48'),
(153, 2, 'Project Manager added new board in Testing project', '2021-05-02 08:11:48'),
(154, 3, 'Project Manager added new board in Testing project', '2021-05-02 08:11:48'),
(155, 32, 'Project Manager added new board in Testing project', '2021-05-02 08:13:39'),
(156, 1, 'Project Manager added new board in Testing project', '2021-05-02 08:13:39'),
(157, 2, 'Project Manager added new board in Testing project', '2021-05-02 08:13:39'),
(158, 3, 'Project Manager added new board in Testing project', '2021-05-02 08:13:39'),
(159, 32, 'Project Manager added new board in Testing project', '2021-05-02 08:13:47'),
(160, 1, 'Project Manager added new board in Testing project', '2021-05-02 08:13:47'),
(161, 2, 'Project Manager added new board in Testing project', '2021-05-02 08:13:47'),
(162, 3, 'Project Manager added new board in Testing project', '2021-05-02 08:13:47'),
(163, 1, 'Tay Yuan Long assigned Task 1 task in  board', '2021-05-02 08:14:27'),
(164, 33, 'Min Hui Phang assigned bug to you (Bug 1) in Project A project', '2021-05-05 00:45:30'),
(165, 33, 'Project Manager added new board in Project A project', '2021-05-05 00:53:43'),
(166, 35, 'Project Manager added you into Project A project', '2021-05-05 00:57:20'),
(167, 35, 'Min Hui swithed role with you in Project A project', '2021-05-05 00:57:34'),
(168, 33, 'Amirul swithed role with you in Project A project', '2021-05-05 00:58:09'),
(169, 5, 'Dummy2   assigned z task in  board', '2021-05-05 01:33:31'),
(170, 2, 'Project Manager added you into POS project', '2021-05-05 15:12:49'),
(171, 36, 'Project Manager added new board in POS project', '2021-05-05 15:13:07'),
(172, 2, 'Project Manager added new board in POS project', '2021-05-05 15:13:07'),
(173, 2, 'Peter Lim assigned Sprint Planning task in  board', '2021-05-05 15:15:17'),
(174, 36, 'Peter Lim assigned Design wireframe task in  board', '2021-05-05 15:15:56'),
(175, 3, 'Project Manager added you into ETMP project', '2021-05-05 15:16:59'),
(176, 1, 'Project Manager added you into ETMP project', '2021-05-05 15:17:09'),
(177, 36, 'Project Manager added new board in ETMP project', '2021-05-05 15:17:25'),
(178, 3, 'Project Manager added new board in ETMP project', '2021-05-05 15:17:25'),
(179, 1, 'Project Manager added new board in ETMP project', '2021-05-05 15:17:25'),
(180, 1, 'Peter Lim assigned Designing Database task in  board', '2021-05-05 15:18:02'),
(181, 2, 'Peter Lim assigned bug to you (Page not found ) in POS project', '2021-05-05 15:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `status`) VALUES
(1, 'FYP', 'Final year project', 'Active'),
(2, 'Testing', 'Fyp test', 'Active'),
(3, 'Test 2', '2nd project', 'Active'),
(4, '123', '123', 'Active'),
(5, 'Project 1', 'Project 1 description', 'Active'),
(6, 'test', 'test 1', 'Active'),
(7, 'Labeauté', 'Coming all the way from France, our Labeautéxperts takes the whole beauty industry by storm as we bring forward contemporary services to our vast clientele all over the world.', 'Active'),
(8, 'FYP B', 'FYP B Sem1 2021\r\n', 'Active'),
(9, 'Super League', 'Project on how to fail miserably', 'Active'),
(10, 'Champions League', 'The lesser of two evils', 'Active'),
(11, 'q', 'q', 'Active'),
(12, 'testing123', 'testing', 'Active'),
(13, 'Agile Project', 'des', 'Active'),
(14, 'EWB Project', 'Engineers Without Borders Australia is working toward the goal of a transformed engineering sector where every engineer has the skills, knowledge, experience, and attitude to contribute to sustainable community development and poverty alleviation.', 'Active'),
(15, 'Programming ', 'Working in the Project ', 'Active'),
(16, 'How to make a burger', 'Steps to make a burger', 'Active'),
(17, 'ETMP a', 'Expert.com Training Portala a \r\nsadsa', 'Active'),
(18, '111', '1', 'Active'),
(19, 'Test Project', 'Description', 'Active'),
(20, 'Testing', 'Testing out this website\r\n', 'Active'),
(21, '123', '456', 'Active'),
(22, 'project x', 'Bringing humans to mars', 'Active'),
(23, 'LowRise Assignment B', 'The second assignment of lowrise unit\r\n ', 'Active'),
(24, 'TEST PROJECT FEATURE', 'TEST PROJECT FEATURE', 'Active'),
(25, 'Bundle Of Joy', 'Bundle Of Joy', 'Active'),
(26, 'Testing', 'Just used or testing', 'Active'),
(27, 'Project A', 'Test test test\r\nzzzzzzzzzzzzzz', 'Active'),
(28, 'POS', 'Point of Sale system', 'Active'),
(29, 'ETMP', 'Training Portal Management System', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `issue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `desc` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_issue`
--

INSERT INTO `report_issue` (`issue_id`, `name`, `issue_name`, `desc`, `creation_date`) VALUES
(1, 'Phang Min Hui', 'Bugs', 'I found some bugs', '2021-05-05 00:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `sdd_draft`
--

CREATE TABLE `sdd_draft` (
  `sdd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `purpose` longtext,
  `scope` longtext,
  `overview` longtext,
  `reference_material` longtext,
  `definitions_acronyms_abbreviations` longtext,
  `system_overview` longtext,
  `system_architecture` longtext,
  `data_description` longtext,
  `data_dictionary` longtext,
  `component_design` longtext,
  `overview_of_user_interface` longtext,
  `screen_objects_and_actions` longtext,
  `requirement_matrix` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `srs_draft`
--

CREATE TABLE `srs_draft` (
  `srs_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `purpose` longtext,
  `scope` longtext,
  `definitions_acronyms_abbreviations` longtext,
  `business_rules` longtext,
  `system_specification` longtext,
  `system_features` longtext,
  `user_classes_characteristics` longtext,
  `design_implementation_constraints` longtext,
  `assumptions` longtext,
  `operating_environment` longtext,
  `use_case` longtext,
  `external_interface_requirements_user_interfaces` longtext,
  `external_interface_requirements_software_interface` longtext,
  `external_interface_requirements_communication_interface` longtext,
  `non_functional_requirements_usability` longtext,
  `non_functional_requirements_reliability` longtext,
  `non_functional_requirements_security` longtext,
  `non_functional_requirements_portability` longtext,
  `non_functional_requirements_maintainability` longtext,
  `non_functional_requirements_availability` longtext,
  `management_process` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `std_draft`
--

CREATE TABLE `std_draft` (
  `std_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_member` varchar(255) NOT NULL,
  `purpose` longtext,
  `scope` longtext,
  `alpha_testing` longtext,
  `system_and_integration_testing` longtext,
  `performance_and_stress_testing` longtext,
  `user_acceptance_testing` longtext,
  `batch_testing` longtext,
  `automated_regression_testing` longtext,
  `beta_testing` longtext,
  `hardware_requirement` longtext,
  `main_frame` longtext,
  `workstation` longtext,
  `test_schedule` longtext,
  `control_procedures` longtext,
  `features_to_be_tested` longtext,
  `features_not_to_be_tested` longtext,
  `resources_roles_responsibility` longtext,
  `schedules` longtext,
  `significantly_impacted_departments` longtext,
  `dependencies` longtext,
  `risk_assumptions` longtext,
  `tools` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(225) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `project_task_num` int(3) NOT NULL,
  `board_id` int(11) NOT NULL DEFAULT '0',
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL,
  `completion_date` date DEFAULT NULL,
  `state` int(1) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `project_task_num`, `board_id`, `due_date`, `start_date`, `completion_date`, `state`, `created_by`) VALUES
(1, 'Accounting', 'Do account stuff', 1, 1, '2021-05-27', '2021-04-23', '2021-04-30', 5, 4),
(2, 'Test task 1', 'Test task 1 description', 2, 2, '2021-06-01', '2021-04-23', NULL, 4, 2),
(3, 'index.html', 'Fix navigation bar', 3, 4, '2021-04-25', '2021-04-24', NULL, 3, 14),
(4, 'enhancement2.html', 'Add a new html page called enhancement2', 4, 4, '2021-05-01', '2021-04-24', NULL, 3, 14),
(5, 'enquiry.html', 'Use JavaScript to verify the form', 5, 4, '2021-04-30', '2021-04-24', NULL, 5, 13),
(6, 'Task 1', 'Task 1 Description', 6, 5, '2021-04-27', '2021-04-24', NULL, 3, 9),
(7, 'Getting started', 'please start', 7, 6, '2021-04-30', '2021-04-25', '2021-04-28', 1, 1),
(8, 'Counter announcement', 'Do it now', 8, 7, '2021-04-30', '2021-04-25', NULL, 1, 3),
(9, 'Time to withdraw', 'It\'s not too late', 9, 8, '2021-05-01', '2021-04-25', NULL, 2, 15),
(10, 'testing', 'first test', 10, 9, '2021-04-29', '2021-04-28', NULL, 5, 1),
(11, 'complete gear train', 'gear arrangement', 11, 11, '2021-04-29', '2021-04-28', NULL, 2, 21),
(12, 'UML ', 'Doing The UML diagram ', 12, 12, '2021-04-30', '2021-04-28', NULL, 3, 0),
(14, 'UCD', 'Do  your part', 13, 12, '2021-05-01', '2021-04-28', NULL, 1, 24),
(15, 'qwe', 'aaa', 14, 14, '2021-04-30', '2021-04-29', NULL, 4, 1),
(16, 'tset', 'test', 15, 15, '2021-04-30', '2021-04-29', '2021-04-29', 2, 26),
(17, 'Cleaning', 'Clean Room', 16, 16, '2021-04-30', '2021-04-29', NULL, 1, 1),
(18, 'Wirting', 'Writing the introduction', 17, 19, '2021-05-30', '2021-04-29', NULL, 2, 1),
(19, '1', '1', 18, 21, '2021-05-26', '2021-05-01', NULL, 2, 31),
(20, 'Task 1', 'Task 1', 19, 22, '2021-05-12', '2021-05-02', NULL, 1, 1),
(21, 'z', 'z', 20, 1, '2021-06-06', '2021-05-05', NULL, 1, 5),
(22, 'Sprint Planning', 'To plan out the UI component', 21, 26, '2021-05-06', '2021-05-05', NULL, 2, 2),
(23, 'Design wireframe', 'Prepare the wireframe for Home Page and Admin Page', 22, 26, '2021-05-14', '2021-05-05', NULL, 1, 36),
(24, 'Designing Database', 'Identify the tables needed', 23, 27, '2021-05-06', '2021-05-05', NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_assignees`
--

CREATE TABLE `task_assignees` (
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_assignees`
--

INSERT INTO `task_assignees` (`assignment_id`, `user_id`, `task_id`) VALUES
(21, 4, 1),
(22, 2, 2),
(23, 1, 2),
(24, 14, 3),
(25, 14, 4),
(26, 13, 5),
(27, 9, 6),
(28, 1, 7),
(29, 2, 7),
(30, 3, 8),
(31, 15, 9),
(32, 1, 10),
(33, 21, 11),
(34, 0, 12),
(36, 24, 14),
(37, 1, 15),
(38, 26, 16),
(39, 1, 17),
(40, 2, 17),
(41, 1, 18),
(42, 31, 19),
(43, 1, 20),
(44, 5, 21),
(45, 2, 22),
(46, 36, 23),
(47, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'project member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `age`, `occupation`, `city`, `country`, `email`, `password`, `photo`, `unique_id`, `status`, `role`) VALUES
(1, 'Dummy1', ' e', 20, 'Studente', 'Kuching', 'Malaysia', 'dummy1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 1332808358, 'Online', 'project manager'),
(2, 'Dummy2', ' ', 20, 'Student', 'Tawau', 'Malaysia', 'dummy2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 966478505, 'Online', 'project member'),
(3, 'Dummy3', ' ', 20, 'Student', 'Kuching', 'Malaysia', 'dummy3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 655539570, 'Offline', 'project manager'),
(4, 'Cheyenne', 'Tan', 21, 'Student', 'Kuching', 'Malaysia', '101209756@students.swinburne.edu.my', 'e19d5cd5af0378da05f63f891c7467af', 'user2-160x160.jpg', 440472704, 'Online', 'project manager'),
(5, 'Bryan', 'Hon', 22, 'Student', 'Kuching', 'Malaysia', 'bhsc1998@gmail.com', 'f30aa7a662c728b7407c54ae6bfd27d1', 'chilled.jpg', 456593959, 'Online', 'project manager'),
(6, 'Gabriel Kong', 'Hao', 23, 'Student', 'Lawas', 'Malaysia', 'gbkong98@gmail.com', 'ef73781effc5774100f87fe2f437a435', 'user2-160x160.jpg', 880908217, 'Online', 'project manager'),
(7, 'Wilson', 'Mah', 20, 'Student', 'Kuching', 'Malaysia', '101208368@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 917304012, 'Online', 'project manager'),
(8, 'Yan ', 'Ting', 22, 'Student', 'Kuching', 'Malaysia', '101209183@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', 'test.jpg', 1535558152, 'Offline', 'project manager'),
(9, 'Jason', 'Goh', 23, 'Student', 'Kuching', 'Malaysia', 'jasongohbl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fettness-–-Post-681.jpg', 1337482885, 'Online', 'project manager'),
(10, 'Mandy', 'Chai', 23, 'Support', 'Kuching ', 'Sarawak ', 'mandyhy11@gmail.com', 'b38e02fff46e2914149f12d386ccdaee', 'user2-160x160.jpg', 244377177, 'Online', 'project member'),
(11, 'Ahmed', 'Tarek', 25, 'Student', 'Kuching', 'Malaysia', 'ahmedtarek5656@gmail.com', 'be845fa49fbfd6d9dd74ab90dec88a1e', '0000.jpeg', 642543410, 'Online', 'project member'),
(12, 'Chin', 'Jackie', 23, 'Student', 'Tawau', 'Malaysia', 'jackiechin9875@gmail.com', '844edd14f992b4311258147cfc7a7a92', 'user2-160x160.jpg', 1497620153, 'Offline', 'project member'),
(13, 'Xavier', 'Lee', 18, 'Student', 'Kota Kinabalu', 'Malaysia', 'xavierljw336@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'xavier.jpg', 1377370132, 'Online', 'project manager'),
(14, 'Jia Wei', 'Lee', 18, 'Student', 'Tawau', 'Malaysia', '101230277@students.swinburne.edu.my', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'user2-160x160.jpg', 1103249274, 'Online', 'project member'),
(15, 'Kev', 'Tan', 33, 'Lecturer', 'Kuching', 'Malaysia', 'ktan@swinburne.edu.my', '706cc5677cbed6b0a7bc13a344ffaf72', 'user2-160x160.jpg', 221001602, 'Offline', 'project manager'),
(16, 'Henry', 'Voon', 23, 'Student', 'Tawau', 'Malaysia', 'limhenry419@yahoo.com', '4628c3fa608c1fd9abe2e813a095a01c', 'user2-160x160.jpg', 769990041, 'Online', 'project member'),
(17, 'Simon', 'Lu', 24, 'student', 'Kuching', 'Malaysia', 'simonlu_97@hotmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'user2-160x160.jpg', 886198901, 'Online', 'project manager'),
(18, 'bryan', 'Teo', 24, 'student', 'kuching', 'malaysia', 'iamtrollking997@gmail.com', '1db3506604508697112009b0a7b95e44', 'user2-160x160.jpg', 636061308, 'Online', 'project manager'),
(19, 'Stephen', 'Lee', 22, 'Student', 'Kota Kinabalu', 'Malaysia', 'stephen822@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 588922165, 'Offline', 'project manager'),
(20, 'Jennifer', 'Lim', 20, 'Student', 'Kota Kinabalu', 'Malaysia', 'jenniferlim12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1149656979, 'Online', 'project member'),
(21, 'Sze Chi', 'Bong', 21, 'Student', 'Kuching', 'Malaysia', 'bongschi0115@gmail.com', '1ba9bc0f7aa5d30b69f9d89d786faf42', 'user2-160x160.jpg', 1252244014, 'Online', 'project manager'),
(22, 'Ibrahim', 'Al-hadhrami', 21, 'Student', 'Kuching', 'Malaysia', 'Ibrahim@Al-hadhrami.com', 'd0970714757783e6cf17b26fb8e2298f', 'user2-160x160.jpg', 376594978, 'Online', 'project manager'),
(23, 'Joel', 'Goh', 21, 'Student', 'Kuching', 'Malaysia', 'joelgohbb@yahoo.com', 'a1cf9305c2d7b09d92f3fd7c7f1fb245', 'user2-160x160.jpg', 304388967, 'Online', 'project manager'),
(24, 'Thulani', 'Madonko', 22, 'Student', 'Kuching ', 'Malaysia', 'madonkothulani@gmail.com', '9dc9835e01af8a41927b1303bf0515ba', 'user2-160x160.jpg', 1399316764, 'Online', 'project member'),
(25, 'Gillian ', 'Tan ', 22, 'Student', 'Kuching', 'Malaysia', '101210020@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', 'tumblr_0c584e2aa592141723b7bc121da72766_38035737_640.jpg', 1091264958, 'Online', 'project manager'),
(26, 'Test11', 'Test22', 1001, 'Test33', 'Test44', 'Test55', 'bloh@swinburne.edu.my', '5f4dcc3b5aa765d61d8327deb882cf99', 'user2-160x160.jpg', 350729646, 'Offline', 'project manager'),
(27, 'Kenneth', 'Lo', 23, 'Student', 'Kuching', 'Sarawak', 'kennethlojinchan@live.com', 'b62892ca71dee9d079b64ea696a87a4a', 'user2-160x160.jpg', 1334448860, 'Online', 'project manager'),
(28, 'Ahmed ', 'Elsafty', 24, 'Student', 'Kuching', 'Malaysia', 'ahmedsafty96@gmail.com', 'ce9146c2642bff6100c57a819bff9058', 'user2-160x160.jpg', 257395361, 'Online', 'project manager'),
(29, 'Ricky Yong How', 'SU', 23, 'none', 'Kuching', 'sarawak', 'rickysu98@hotmail.com', 'da8e12bf415f1089e6f27833e36a27ae', 'user2-160x160.jpg', 1557682363, 'Online', 'project member'),
(30, 'Abdullah-Al-Kafi', 'Abdullah-Al-Kafi', 22, 'Student ', 'Dhaka', 'Bangladesh', 'kafi.bracu@gmail.com', 'a030615cfe3fd90fb28e19bd6580feda', 'user2-160x160.jpg', 1092189259, 'Online', 'project member'),
(31, 'Lai', 'Peng Hung', 22, 'Student', 'Kuching', 'Malaysia', '101208371@students.swinburne.edu.my', '85c2f0b4cb58fccf8b0c91aecc5b316e', 'user2-160x160.jpg', 729712912, 'Online', 'project manager'),
(32, 'Tay', 'Yuan Long', 21, '96800', 'Kapit', 'Malaysia', '101219946@students.swinburne.edu.my', 'dae1010ebb2797a1558c410049a2a5b0', 'Fire Force (2).jpg', 1500107397, 'Offline', 'project manager'),
(33, 'Min Hui', 'Phang', 30, 'System Manager', 'Kuching', 'Malaysia', 'minhui@karunasarawak.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1160003630, 'Online', 'project manager'),
(34, 'Jia Jun', 'Lee', 23, 'Student', 'Tawau', 'Malaysia', '101210855@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1192056129, 'Offline', 'project member'),
(35, 'Amirul', 'Aron', 29, 'Programmer', 'Kuching', 'Malaysia', 'amirul@karunasarawak.com', 'da9e02b3a221a8428905aeef3c10edfe', 'user2-160x160.jpg', 1587952541, 'Offline', 'project member'),
(36, 'Peter', 'Lim', 28, 'Project Manager', 'Kuching', 'Malaysia', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 989429769, 'Offline', 'project manager');

-- --------------------------------------------------------

--
-- Table structure for table `user_created_project`
--

CREATE TABLE `user_created_project` (
  `created_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_created_project`
--

INSERT INTO `user_created_project` (`created_proj_id`, `user_id`, `project_id`, `creation_date`) VALUES
(3, 5, 5, '2021-04-23 12:30:06'),
(4, 1, 12, '2021-04-23 13:20:25'),
(5, 7, 14, '2021-04-23 13:33:32'),
(6, 8, 18, '2021-04-23 17:22:43'),
(7, 13, 19, '2021-04-24 14:08:01'),
(8, 9, 24, '2021-04-24 15:45:06'),
(9, 15, 26, '2021-04-25 04:11:24'),
(10, 15, 29, '2021-04-25 04:19:42'),
(11, 17, 31, '2021-04-27 20:32:27'),
(12, 18, 32, '2021-04-28 07:47:43'),
(13, 19, 37, '2021-04-28 10:34:43'),
(14, 21, 38, '2021-04-28 14:28:02'),
(15, 22, 39, '2021-04-28 16:42:10'),
(16, 23, 43, '2021-04-28 17:26:41'),
(17, 2, 50, '2021-04-29 01:20:19'),
(18, 25, 54, '2021-04-29 01:23:15'),
(19, 26, 56, '2021-04-29 04:50:53'),
(20, 27, 60, '2021-04-29 06:03:28'),
(21, 3, 64, '2021-04-29 13:22:59'),
(22, 10, 65, '2021-04-29 13:26:46'),
(23, 28, 67, '2021-04-29 20:42:54'),
(24, 1, 71, '2021-04-30 05:44:11'),
(25, 31, 73, '2021-05-01 10:31:24'),
(26, 32, 77, '2021-05-02 08:03:10'),
(27, 33, 81, '2021-05-05 00:40:41'),
(28, 36, 83, '2021-05-05 15:11:27'),
(29, 36, 85, '2021-05-05 15:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `user_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`user_proj_id`, `user_id`, `project_id`) VALUES
(2, 5, 2),
(3, 1, 2),
(5, 5, 3),
(6, 1, 3),
(7, 2, 3),
(8, 3, 3),
(11, 4, 3),
(12, 6, 4),
(13, 1, 4),
(14, 7, 5),
(15, 1, 5),
(16, 2, 5),
(17, 3, 5),
(18, 8, 6),
(19, 13, 7),
(20, 1, 7),
(21, 2, 7),
(22, 3, 7),
(23, 14, 7),
(24, 9, 8),
(25, 10, 8),
(26, 15, 9),
(27, 1, 9),
(28, 2, 9),
(29, 15, 10),
(30, 3, 10),
(31, 17, 11),
(32, 18, 12),
(34, 1, 12),
(35, 2, 12),
(36, 3, 12),
(37, 19, 13),
(38, 21, 14),
(39, 22, 15),
(40, 0, 15),
(41, 0, 15),
(42, 0, 15),
(43, 23, 16),
(44, 1, 16),
(45, 2, 16),
(46, 3, 16),
(47, 0, 15),
(48, 1, 15),
(49, 24, 15),
(50, 25, 17),
(51, 2, 17),
(52, 1, 17),
(53, 3, 17),
(54, 25, 18),
(55, 1, 18),
(56, 26, 19),
(57, 1, 19),
(58, 2, 19),
(59, 3, 19),
(60, 27, 20),
(61, 1, 20),
(62, 2, 20),
(63, 3, 20),
(64, 3, 21),
(65, 3, 22),
(66, 10, 22),
(67, 28, 23),
(68, 1, 23),
(69, 3, 23),
(70, 2, 23),
(71, 1, 24),
(72, 2, 24),
(73, 31, 25),
(74, 1, 25),
(75, 2, 25),
(76, 3, 25),
(77, 32, 26),
(78, 1, 26),
(79, 2, 26),
(80, 3, 26),
(81, 33, 27),
(82, 35, 27),
(83, 36, 28),
(84, 2, 28),
(85, 36, 29),
(86, 3, 29),
(87, 1, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `bug_report`
--
ALTER TABLE `bug_report`
  ADD PRIMARY KEY (`bug_id`);

--
-- Indexes for table `comment_task`
--
ALTER TABLE `comment_task`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contactusform`
--
ALTER TABLE `contactusform`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `custom_draft`
--
ALTER TABLE `custom_draft`
  ADD PRIMARY KEY (`custom_draft_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `file_storage`
--
ALTER TABLE `file_storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `meeting_agenda_draft`
--
ALTER TABLE `meeting_agenda_draft`
  ADD PRIMARY KEY (`meeting_agenda_draft_id`);

--
-- Indexes for table `meeting_minutes_draft`
--
ALTER TABLE `meeting_minutes_draft`
  ADD PRIMARY KEY (`meeting_minutes_draft_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `report_issue`
--
ALTER TABLE `report_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `sdd_draft`
--
ALTER TABLE `sdd_draft`
  ADD PRIMARY KEY (`sdd_id`);

--
-- Indexes for table `srs_draft`
--
ALTER TABLE `srs_draft`
  ADD PRIMARY KEY (`srs_id`);

--
-- Indexes for table `std_draft`
--
ALTER TABLE `std_draft`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_assignees`
--
ALTER TABLE `task_assignees`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_created_project`
--
ALTER TABLE `user_created_project`
  ADD PRIMARY KEY (`created_proj_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`user_proj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contactusform`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom_draft`
--
ALTER TABLE `custom_draft`
  MODIFY `custom_draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meeting_agenda_draft`
--
ALTER TABLE `meeting_agenda_draft`
  MODIFY `meeting_agenda_draft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_minutes_draft`
--
ALTER TABLE `meeting_minutes_draft`
  MODIFY `meeting_minutes_draft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sdd_draft`
--
ALTER TABLE `sdd_draft`
  MODIFY `sdd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `srs_draft`
--
ALTER TABLE `srs_draft`
  MODIFY `srs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_draft`
--
ALTER TABLE `std_draft`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
