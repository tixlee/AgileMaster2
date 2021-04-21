-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 09:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `user_id`, `project_id`, `recipient_id`, `title`, `description`, `date_time`) VALUES
(1, 10, 17, 10, 'General Meeting', 'A kindly reminder that we will be having a general meeting tomorrow 20/4/2021 at 9p.m. night. Please be prepared for the agenda. Thanks.', '2021-04-19 02:23:17'),
(2, 10, 17, 1, 'General Meeting', 'A kindly reminder that we will be having a general meeting tomorrow 20/4/2021 at 9p.m. night. Please be prepared for the agenda. Thanks.', '2021-04-19 02:23:17'),
(3, 10, 17, 4, 'General Meeting', 'A kindly reminder that we will be having a general meeting tomorrow 20/4/2021 at 9p.m. night. Please be prepared for the agenda. Thanks.', '2021-04-19 02:23:17'),
(4, 10, 17, 10, 'Supervisor System Review', 'Be prepared and never late for the incoming supervisor system review on this coming Thursday 11a.m. ', '2021-04-19 02:27:25'),
(5, 10, 17, 1, 'Supervisor System Review', 'Be prepared and never late for the incoming supervisor system review on this coming Thursday 11a.m. ', '2021-04-19 02:27:25'),
(6, 10, 17, 4, 'Supervisor System Review', 'Be prepared and never late for the incoming supervisor system review on this coming Thursday 11a.m. ', '2021-04-19 02:27:25'),
(7, 10, 18, 10, 'Announcement 1', 'Announcement 1 Description', '2021-04-19 09:18:33'),
(8, 10, 18, 4, 'Announcement 1', 'Announcement 1 Description', '2021-04-19 09:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `project_id`, `board_name`, `date_time`) VALUES
(20, 3, 'tfghfgjyt', '2021-03-19 15:49:42'),
(30, 1, 'Board 1', '2021-04-05 00:45:38'),
(31, 6, 'Board TEST', '2021-04-06 01:12:07'),
(32, 6, 'Board 2', '2021-04-06 14:24:52'),
(33, 10, 'Board Proj1', '2021-04-19 01:19:03'),
(34, 11, 'Board ss', '2021-04-19 01:26:32'),
(35, 12, 'Board 1', '2021-04-19 02:10:40'),
(36, 15, 'Board 1', '2021-04-19 02:18:09'),
(37, 17, 'Board 1', '2021-04-19 02:19:41'),
(38, 17, 'Board 2', '2021-04-19 02:19:48'),
(39, 14, 'Board 1', '2021-04-19 02:20:58'),
(40, 13, 'Proj2Board1', '2021-04-19 02:46:44'),
(41, 16, 'Proj5Board1', '2021-04-19 02:47:06'),
(42, 18, 'Board 1', '2021-04-19 09:18:59');

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
  `creation_date` datetime DEFAULT current_timestamp(),
  `due_date` date DEFAULT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bug_report`
--

INSERT INTO `bug_report` (`bug_id`, `bug_name`, `bug_desc`, `created_by`, `project_id`, `assignee`, `priority`, `state`, `creation_date`, `due_date`, `start_date`) VALUES
(9, 'AZAQZQ', 'esthrdht', 3, 1, 1, 'High', 'Closed', '2021-04-11 19:40:54', '2021-04-12', '2021-04-11'),
(10, 'REWTY', 'fdshterss', 1, 5, 3, 'Medium', 'Closed', '2021-04-11 20:06:18', '2021-04-13', '2021-04-11'),
(11, 'FYPB Bug1', 'Bug 1 Description', 10, 17, 10, 'Low', 'Closed', '2021-04-19 02:59:47', '2021-04-23', '2021-04-18'),
(12, 'FYPB Bug2', 'Bug 2 Description', 10, 17, 10, 'Medium', 'Closed', '2021-04-19 03:00:29', '2021-04-30', '2021-04-18'),
(13, 'FYPB Bug3', 'Bug 3 Description', 10, 17, 10, 'High', 'In Progress', '2021-04-19 03:01:02', '2021-05-06', '2021-04-18'),
(14, 'FYPB Bug4', 'Bug 4 Description', 1, 17, 10, 'Medium', 'In Progress', '2021-04-19 03:01:57', '2021-05-04', '2021-04-18'),
(15, 'Bug Test ', 'Bug Test Description', 10, 18, 10, 'Medium', 'Open', '2021-04-19 09:25:34', '2021-04-20', '2021-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `comment_task`
--

CREATE TABLE `comment_task` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_task`
--

INSERT INTO `comment_task` (`comment_id`, `user_id`, `task_id`, `comment`, `creation_date`) VALUES
(1, 4, 1, 'TEST COMMENT FEATURE', '2021-03-19 14:46:10'),
(2, 9, 14, 'Test', '2021-04-06 10:13:32'),
(3, 9, 14, 'Test 2', '2021-04-06 10:15:01'),
(4, 9, 14, 'jhvbkjgyukyg', '2021-04-06 13:34:09'),
(5, 9, 14, 'htdfht5rdtty', '2021-04-06 13:34:52'),
(6, 9, 14, 'hrtdxfs', '2021-04-06 13:42:23'),
(7, 9, 14, 'rgersgrtseryresyery\r\n', '2021-04-06 14:03:53'),
(8, 9, 14, ';l,p[', '2021-04-06 14:04:14'),
(9, 9, 14, 'oiughuilghkh', '2021-04-06 14:05:34'),
(10, 9, 14, 'kjyjgkjgjk', '2021-04-06 14:06:17'),
(11, 9, 14, 'kjgyjkuvhkjguykk', '2021-04-06 14:07:03'),
(12, 9, 14, 'kbjjhvjkgvo', '2021-04-06 14:14:37'),
(13, 9, 14, 'fdxvczsd', '2021-04-06 14:15:16'),
(14, 9, 14, 'bvcvnbcvnv', '2021-04-06 14:16:20'),
(15, 9, 14, '4325424254', '2021-04-06 14:18:18'),
(16, 9, 14, 'ghghh', '2021-04-06 14:21:10'),
(17, 9, 15, 'TEST COMMENT FUNCTION', '2021-04-06 15:42:00'),
(18, 10, 36, 'I had completed this task.', '2021-04-19 02:38:43');

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

-- --------------------------------------------------------

--
-- Table structure for table `custom_draft`
--

CREATE TABLE `custom_draft` (
  `custom_draft_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(225) NOT NULL,
  `custom` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_draft`
--

INSERT INTO `custom_draft` (`custom_draft_id`, `user_id`, `document_name`, `custom`) VALUES
(1, 10, 'Custom 1', '<p>Custom</p>'),
(2, 10, 'Test', '<p style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management System developed in Software Engineering Project A. 3 different roles will get different improvement on their functionalities and UI of the system. The improvements will be added to all user roles includes live chat function, converting tables in progress page into other form of charts, layout of the Calendar page and the security of the system. The system will also improve features that are accessible by project manager and project members such as improving the Document Generator to give user to customize their own version of document and to save documents in database so that they are editable before generating the documents. Besides, users can click on the notification that will redirect to live chat function and a drop-down menu will be implemented for time tracker function. In Progress page, users can click the whole card instead of just the word only and have an improved GitHub repository search UI to improve user experience while interacting with the system. On the other hand, in Member&rsquo;s page, users can send message to other users add view user status as either online or offline. Apart from that, users can upload their own profile picture, change their personal information and also display their profile picture in Member&rsquo;s page. Lastly, for Project Managers only, they will be able to create charts to evaluate efficiency of each project member based on the charts generated so that the manager will know which member is more productive to be assigned with harder tasks and they can make announcement regarding projects to other project members.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `text_color` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `start_event`, `end_event`, `color`, `text_color`) VALUES
(2, 1, 'fge', '2021-04-13 11:00:00', '2021-04-14 16:00:00', '#6453e9', '#ffffff'),
(3, 1, ' bn ', '2021-04-13 03:00:00', '2021-04-13 22:58:00', '#6453e9', '#ffffff'),
(4, 3, 're4ed', '2021-04-13 02:00:00', '2021-04-13 20:00:00', '#6453e9', '#ffffff'),
(5, 5, 'weqaew', '2021-04-16 05:00:00', '2021-04-17 19:00:00', '#6453e9', '#ffffff'),
(6, 3, 'Task 1', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(7, 4, 'Task 2', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(8, 4, 'Task 3', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(9, 3, 'Task 4', '2021-04-22 00:00:00', '2021-04-22 00:00:00', '#FF0000', '#ffffff'),
(10, 3, 'Task 6', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(11, 3, 'Task 8', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(12, 1, 'T1', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(13, 3, 'T2', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(14, 1, 'T3', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(15, 1, 'T5', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(16, 11, 'Proj1Task1', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(17, 10, 'Proj1Task2', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(18, 10, 'Proj1Task3', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(19, 10, 'Proj1Task4', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(20, 10, 'Task 5', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(21, 11, 'Task 6', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(22, 11, 'Proj1Task5', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(23, 11, 'Proj1Task6', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(24, 10, 'Proj1Task7', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(25, 11, 'Proj4Task1', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(26, 10, 'FYPB Task 1', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(27, 10, 'FYPB Task 2', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(28, 10, 'FYPB Task 3', '2021-04-22 00:00:00', '2021-04-22 00:00:00', '#FF0000', '#ffffff'),
(29, 10, 'FYPB Task 4', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(30, 1, 'FYPB Task 5', '2021-04-30 00:00:00', '2021-04-30 00:00:00', '#FF0000', '#ffffff'),
(31, 1, 'FYPB Task 6', '2021-04-23 00:00:00', '2021-04-23 00:00:00', '#FF0000', '#ffffff'),
(32, 1, 'FYPB Task 7', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(33, 1, 'FYPB Task 8', '2021-04-28 00:00:00', '2021-04-28 00:00:00', '#FF0000', '#ffffff'),
(34, 4, 'FYPB Task 9', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(35, 4, 'FYPB Task 10', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(36, 4, 'FYPB Task 11', '2021-04-28 00:00:00', '2021-04-28 00:00:00', '#FF0000', '#ffffff'),
(37, 4, 'FYPB Task 12', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(38, 10, 'Task 1', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(39, 10, 'Task 2', '2021-04-19 00:00:00', '2021-04-19 00:00:00', '#FF0000', '#ffffff'),
(40, 1, 'Task 3', '2021-04-20 00:00:00', '2021-04-20 00:00:00', '#FF0000', '#ffffff'),
(41, 1, 'Task 4', '2021-04-21 00:00:00', '2021-04-21 00:00:00', '#FF0000', '#ffffff'),
(42, 4, 'Task 5', '2021-04-23 00:00:00', '2021-04-23 00:00:00', '#FF0000', '#ffffff'),
(43, 4, 'Task 5', '2021-04-22 00:00:00', '2021-04-22 00:00:00', '#FF0000', '#ffffff'),
(44, 10, 'Supervisor Meeting', '2021-04-22 11:00:00', '2021-04-22 12:30:00', '#6453e9', '#ffffff'),
(45, 10, 'Video Recording', '2021-04-28 11:00:00', '2021-04-29 12:30:00', '#6453e9', '#ffffff'),
(46, 10, 'User Testing', '2021-04-19 11:00:00', '2021-04-23 12:30:00', '#6453e9', '#ffffff'),
(47, 10, 'Lecture', '2021-04-27 00:00:00', '2021-04-28 00:00:00', '#6453e9', '#ffffff');

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
  `like_most` varchar(225) DEFAULT NULL,
  `like_least` varchar(225) DEFAULT NULL,
  `improve` varchar(225) DEFAULT NULL,
  `new_feature` varchar(225) DEFAULT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Test', 'index.php', '04-04-2021', 'Implementation', 1, 1),
(3, 'poij', 'user2-160x160.jpg', '04-04-2021', 'Design', 2, 1),
(4, 'tevbhg b', 'resume 19 H2 Sarawak - Miri Admin Page v2.pdf', '04-04-2021', 'Reports', 5, 5),
(5, '342hgghd', 'README.md', '04-04-2021', 'Implementation', 5, 1),
(6, 'UPLOAD NEW FILE', 'Man-Silhouette.jpg', '06-04-2021', 'Design', 1, 9),
(8, 'Project1 Uploads', 'homepage-1.png', '19-04-2021', 'Others', 12, 10),
(9, 'Project2 Uploads', 'homepage-feature4.PNG', '19-04-2021', 'Design', 13, 10),
(10, 'Project Plan', 'Project Plan (updated - 18.3.2021)-Copy.pdf', '19-04-2021', 'Reports', 17, 10),
(11, 'SRS Docs', 'Software Requirement Specification (updated - 18.3.2021)-Copy.pdf', '19-04-2021', 'Reports', 17, 10),
(12, 'Project3 Upload', 'clickbuttonaddrow.html', '19-04-2021', 'Implementation', 14, 11),
(13, 'Test', 'Agile Master - User Testing Guidelines.pdf', '19-04-2021', 'Reports', 18, 10);

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
  `agenda_items` varchar(255) NOT NULL,
  `action_items_from_previous_meeting` varchar(255) NOT NULL,
  `new_action_items` varchar(255) NOT NULL,
  `notes_info` varchar(255) NOT NULL
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
  `agenda_items` varchar(255) NOT NULL,
  `decisions` varchar(255) NOT NULL,
  `new_action_items` varchar(255) NOT NULL,
  `notes_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting_minutes_draft`
--

INSERT INTO `meeting_minutes_draft` (`meeting_minutes_draft_id`, `user_id`, `document_name`, `title`, `objective`, `date`, `time`, `location`, `called_by`, `note_taker`, `time_keeper`, `attendees`, `agenda_items`, `decisions`, `new_action_items`, `notes_info`) VALUES
(1, 10, 'Meeting Minutes 2 with Client (Agile Software Project Management System)', '<p>Meeting Minutes 2 with Client (Agile Software Project Management System)</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 1px; top: 38.3333px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Having a meeting with client to have a project review.</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -18px; top: -12px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>6/4/2021</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -16px; top: -12px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>3.30pm</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -4px; top: -12px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>Microsoft Team Online</p>', '<p>Lee Jia Jun</p>', '<p>Jason Goh</p>\r\n<p>Bong Siaw Zhen</p>', '<p>Ahmed Tarek</p>', '<p>Ms. Phang</p>\r\n<p>Mr. Kalu</p>\r\n<p>Mr. Amirul</p>', '<p>- General Discussion</p>\r\n<p>- QnA session</p>\r\n<p>- Discuss Improvement</p>', '<p>- The team continue to do testing on the system.</p>\r\n<p>- The team are to continue fixing the problem that are faced.</p>', '<p>- User Testing could be completed within one week time</p>', '<p>- Some bugs found during progress review, the team have to fix them and show to</p>\r\n<p>client again.</p>');

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
(1, 1244444423, 297093685, 'hi'),
(2, 297093685, 1244444423, 'how ar you?'),
(3, 297093685, 1244444423, 'hello?'),
(4, 1244444423, 297093685, 'I\'m fine'),
(5, 1244444423, 297093685, 'what are you doing?'),
(6, 297093685, 1244444423, 'just resting'),
(7, 1244444423, 297093685, 'iuhnjou'),
(8, 1244444423, 297093685, ';uihuioh'),
(9, 1244444423, 297093685, 'iuhgi'),
(10, 1244444423, 297093685, 'iuh'),
(11, 678452995, 297093685, 'hi'),
(12, 297093685, 678452995, 'hi'),
(13, 678452995, 297093685, 'hello'),
(14, 297093685, 678452995, 'hi'),
(15, 1244444423, 678452995, 'hi'),
(16, 678452995, 297093685, 'gyu'),
(17, 297093685, 678452995, 'hi'),
(18, 297093685, 841443533, 'hello'),
(19, 1244444423, 841443533, 'helli'),
(31, 841443533, 1109918803, 'Hello'),
(32, 1109918803, 841443533, '你好'),
(33, 841443533, 1109918803, 'Are you free later at 3p.m.'),
(34, 1109918803, 841443533, '是的');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `recipient_id`, `activity`, `date_time`) VALUES
(1, 7, 'Ahmed added you into FYP B project', '2021-04-04 20:28:50'),
(2, 5, 'Ahmed added you into FYP B project', '2021-04-04 20:31:37'),
(3, 1, 'Ahmed added Board 2 board into FYP B project', '2021-04-04 21:50:15'),
(4, 7, 'Ahmed added you into FYP B project', '2021-04-04 21:51:12'),
(13, 7, 'Ahmed swithed role with you in FYP B project', '2021-04-04 22:26:34'),
(14, 1, 'Ziad swithed role with you in FYP B project', '2021-04-04 22:27:04'),
(15, 9, 'Ahmed added you into FYP B project', '2021-04-05 09:16:53'),
(16, 9, 'Ahmed swithed role with you in FYP B project', '2021-04-05 10:40:52'),
(17, 1, 'Ahmed swithed role with you in FYP B project', '2021-04-05 11:33:15'),
(34, 9, 'Ahmed added comment in Task 1234 task', '2021-04-06 14:21:10'),
(35, 3, 'Ahmed added comment in Task 1234 task', '2021-04-06 14:21:10'),
(36, 2, 'Ahmed added comment in Task 1234 task', '2021-04-06 14:21:10'),
(37, 9, 'Ahmed added new board in Ahmed Project', '2021-04-06 14:24:52'),
(38, 3, 'Ahmed added new board in Ahmed Project', '2021-04-06 14:24:52'),
(39, 2, 'Ahmed added new board in Ahmed Project', '2021-04-06 14:24:52'),
(82, 5, 'Project Manger added you into Ahmed Project project', '2021-04-06 15:39:48'),
(83, 3, 'Ahmed swithed role with you in Ahmed Project project', '2021-04-06 15:40:17'),
(84, 5, 'Ahmed assigned TArsk 1 task to you', '2021-04-06 15:41:45'),
(85, 9, 'Ahmed added comment in TArsk 1 task', '2021-04-06 15:42:00'),
(86, 3, 'Ahmed added comment in TArsk 1 task', '2021-04-06 15:42:00'),
(87, 2, 'Ahmed added comment in TArsk 1 task', '2021-04-06 15:42:00'),
(88, 5, 'Ahmed added comment in TArsk 1 task', '2021-04-06 15:42:00'),
(89, 5, 'Project Manger added you into FYP project', '2021-04-10 23:34:46'),
(90, 5, 'Ahmed swithed role with you in FYP project', '2021-04-10 23:34:58'),
(91, 1, 'Brain swithed role with you in FYP project', '2021-04-10 23:35:22'),
(92, 3, 'Project Manger added you into FYP project', '2021-04-11 19:40:26'),
(93, 4, 'Project Manager added you into Proj 1 project', '2021-04-19 01:18:40'),
(94, 9, 'Project Manager added you into Proj 1 project', '2021-04-19 01:18:48'),
(95, 3, 'Project Manager added new board in Proj 1 project', '2021-04-19 01:19:03'),
(96, 4, 'Project Manager added new board in Proj 1 project', '2021-04-19 01:19:03'),
(97, 9, 'Project Manager added new board in Proj 1 project', '2021-04-19 01:19:03'),
(98, 3, 'Lee Jia  Jun assigned Task 1 task in Board 1 board', '2021-04-19 01:19:17'),
(99, 4, 'Lee Jia  Jun assigned Task 2 task in Board 1 board', '2021-04-19 01:19:27'),
(100, 4, 'Lee Jia  Jun assigned Task 3 task in Board 1 board', '2021-04-19 01:20:00'),
(101, 3, 'Lee Jia  Jun assigned Task 4 task in Board 1 board', '2021-04-19 01:20:10'),
(102, 3, 'Lee Jia  Jun assigned Task 6 task in Board 1 board', '2021-04-19 01:20:21'),
(103, 3, 'Lee Jia  Jun assigned Task 8 task in Board 1 board', '2021-04-19 01:20:31'),
(104, 3, 'Project Manager added you into TestProj project', '2021-04-19 01:26:16'),
(105, 4, 'Project Manager added you into TestProj project', '2021-04-19 01:26:23'),
(106, 1, 'Project Manager added new board in TestProj project', '2021-04-19 01:26:32'),
(107, 3, 'Project Manager added new board in TestProj project', '2021-04-19 01:26:32'),
(108, 4, 'Project Manager added new board in TestProj project', '2021-04-19 01:26:32'),
(109, 1, 'Ahmed Tarek assigned T1 task in Board 1 board', '2021-04-19 01:26:49'),
(110, 3, 'Ahmed Tarek assigned T2 task in Board 1 board', '2021-04-19 01:27:00'),
(111, 1, 'Ahmed Tarek assigned T3 task in Board 1 board', '2021-04-19 01:27:11'),
(112, 1, 'Ahmed Tarek assigned T5 task in Board 1 board', '2021-04-19 01:27:21'),
(113, 11, 'Project Manager added you into Project 1 project', '2021-04-19 02:10:25'),
(114, 10, 'Project Manager added new board in Project 1 project', '2021-04-19 02:10:40'),
(115, 11, 'Project Manager added new board in Project 1 project', '2021-04-19 02:10:40'),
(116, 11, 'Dummy 1 assigned Proj1Task1 task in Board 1 board', '2021-04-19 02:13:13'),
(117, 10, 'Dummy 1 assigned Proj1Task2 task in Board 1 board', '2021-04-19 02:13:34'),
(118, 10, 'Dummy 1 assigned Proj1Task3 task in Board 1 board', '2021-04-19 02:13:54'),
(119, 10, 'Dummy 1 assigned Proj1Task4 task in Board 1 board', '2021-04-19 02:14:27'),
(120, 10, 'Dummy 1 assigned Task 5 task in Board 1 board', '2021-04-19 02:14:49'),
(121, 11, 'Dummy 1 assigned Task 6 task in Board 1 board', '2021-04-19 02:15:14'),
(122, 11, 'Dummy 1 assigned Proj1Task5 task in Board 1 board', '2021-04-19 02:15:41'),
(123, 11, 'Dummy 1 assigned Proj1Task6 task in Board 1 board', '2021-04-19 02:16:04'),
(124, 10, 'Dummy 1 assigned Proj1Task7 task in Board 1 board', '2021-04-19 02:16:50'),
(125, 11, 'Project Manager added you into Project 4 project', '2021-04-19 02:17:55'),
(126, 10, 'Project Manager added new board in Project 4 project', '2021-04-19 02:18:09'),
(127, 11, 'Project Manager added new board in Project 4 project', '2021-04-19 02:18:09'),
(128, 11, 'Jia Jun Lee assigned Proj4Task1 task in Board 1 board', '2021-04-19 02:18:43'),
(129, 1, 'Project Manager added you into FYP B project', '2021-04-19 02:19:17'),
(130, 4, 'Project Manager added you into FYP B project', '2021-04-19 02:19:26'),
(131, 10, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:41'),
(132, 1, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:41'),
(133, 4, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:41'),
(134, 10, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:48'),
(135, 1, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:48'),
(136, 4, 'Project Manager added new board in FYP B project', '2021-04-19 02:19:48'),
(137, 11, 'Project Manager added you into Project 3 project', '2021-04-19 02:20:49'),
(138, 10, 'Project Manager added new board in Project 3 project', '2021-04-19 02:20:58'),
(139, 11, 'Project Manager added new board in Project 3 project', '2021-04-19 02:20:58'),
(140, 11, 'Jia Jun swithed role with you in Project 3 project', '2021-04-19 02:21:02'),
(141, 10, 'Jia Jun Lee assigned FYPB Task 1 task in Board 1 board', '2021-04-19 02:30:27'),
(142, 10, 'Jia Jun Lee assigned FYPB Task 2 task in Board 1 board', '2021-04-19 02:30:48'),
(143, 10, 'Jia Jun Lee assigned FYPB Task 3 task in Board 1 board', '2021-04-19 02:31:06'),
(144, 10, 'Jia Jun Lee assigned FYPB Task 4 task in Board 1 board', '2021-04-19 02:31:23'),
(145, 1, 'Jia Jun Lee assigned FYPB Task 5 task in Board 1 board', '2021-04-19 02:31:42'),
(146, 1, 'Jia Jun Lee assigned FYPB Task 6 task in Board 1 board', '2021-04-19 02:32:06'),
(147, 1, 'Jia Jun Lee assigned FYPB Task 7 task in Board 1 board', '2021-04-19 02:32:23'),
(148, 1, 'Jia Jun Lee assigned FYPB Task 8 task in Board 1 board', '2021-04-19 02:32:40'),
(149, 4, 'Jia Jun Lee assigned FYPB Task 9 task in Board 1 board', '2021-04-19 02:32:58'),
(150, 4, 'Jia Jun Lee assigned FYPB Task 10 task in Board 1 board', '2021-04-19 02:33:18'),
(151, 4, 'Jia Jun Lee assigned FYPB Task 11 task in Board 1 board', '2021-04-19 02:33:47'),
(152, 4, 'Jia Jun Lee assigned FYPB Task 12 task in Board 1 board', '2021-04-19 02:34:06'),
(153, 10, 'Jia Jun Lee assigned Task 1 task in Board 1 board', '2021-04-19 02:38:04'),
(154, 1, 'Jia Jun Lee added new Comment in FYPB Task 1 task in Board 1 board', '2021-04-19 02:38:43'),
(155, 7, 'Jia Jun Lee added new Comment in FYPB Task 1 task in Board 1 board', '2021-04-19 02:38:43'),
(156, 5, 'Jia Jun Lee added new Comment in FYPB Task 1 task in Board 1 board', '2021-04-19 02:38:43'),
(157, 3, 'Jia Jun Lee added new Comment in FYPB Task 1 task in Board 1 board', '2021-04-19 02:38:43'),
(158, 10, 'Jia Jun Lee assigned Task 2 task in Board 1 board', '2021-04-19 02:39:26'),
(159, 1, 'Jia Jun Lee assigned Task 3 task in Board 1 board', '2021-04-19 02:39:41'),
(160, 1, 'Jia Jun Lee assigned Task 4 task in Board 1 board', '2021-04-19 02:39:57'),
(161, 4, 'Jia Jun Lee assigned Task 5 task in Board 1 board', '2021-04-19 02:40:13'),
(162, 4, 'Jia Jun Lee assigned Task 5 task in Board 1 board', '2021-04-19 02:40:29'),
(163, 10, 'Project Manager added new board in Project 2 project', '2021-04-19 02:46:44'),
(164, 10, 'Project Manager added new board in Project 5 project', '2021-04-19 02:47:06'),
(165, 2, 'Project Manager added you into Project 1 project', '2021-04-19 02:47:36'),
(166, 12, 'Project Manager added you into FYP B project', '2021-04-19 02:50:41'),
(167, 7, 'Project Manager added you into Project 2 project', '2021-04-19 02:51:41'),
(168, 8, 'Project Manager added you into Project 2 project', '2021-04-19 02:51:47'),
(169, 8, 'Project Manager added you into Project 5 project', '2021-04-19 02:52:15'),
(170, 1, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:54:33'),
(171, 7, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:54:33'),
(172, 5, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:54:33'),
(173, 3, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:54:33'),
(174, 1, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:55:05'),
(175, 7, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:55:05'),
(176, 5, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:55:05'),
(177, 3, 'Jia Jun Lee uploaded new file in Project 1 project', '2021-04-19 02:55:05'),
(178, 1, 'Jia Jun Lee uploaded new file in Project 2 project', '2021-04-19 02:56:00'),
(179, 7, 'Jia Jun Lee uploaded new file in Project 2 project', '2021-04-19 02:56:00'),
(180, 5, 'Jia Jun Lee uploaded new file in Project 2 project', '2021-04-19 02:56:00'),
(181, 3, 'Jia Jun Lee uploaded new file in Project 2 project', '2021-04-19 02:56:00'),
(182, 1, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:56:45'),
(183, 7, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:56:45'),
(184, 5, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:56:45'),
(185, 3, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:56:45'),
(186, 1, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:57:11'),
(187, 7, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:57:11'),
(188, 5, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:57:11'),
(189, 3, 'Jia Jun Lee uploaded new file in FYP B project', '2021-04-19 02:57:11'),
(190, 1, 'Dummy 1 uploaded new file in Project 3 project', '2021-04-19 02:57:57'),
(191, 7, 'Dummy 1 uploaded new file in Project 3 project', '2021-04-19 02:57:57'),
(192, 5, 'Dummy 1 uploaded new file in Project 3 project', '2021-04-19 02:57:57'),
(193, 3, 'Dummy 1 uploaded new file in Project 3 project', '2021-04-19 02:57:57'),
(194, 10, 'Jia Jun Lee assigned bug to you (FYPB Bug1) in FYP B project', '2021-04-19 02:59:47'),
(195, 10, 'Jia Jun Lee assigned bug to you (FYPB Bug2) in FYP B project', '2021-04-19 03:00:29'),
(196, 10, 'Jia Jun Lee assigned bug to you (FYPB Bug3) in FYP B project', '2021-04-19 03:01:02'),
(197, 10, 'Ahmed Tarek assigned bug to you (FYPB Bug4) in FYP B project', '2021-04-19 03:01:57'),
(198, 4, 'Project Manager added you into Test Project project', '2021-04-19 09:18:05'),
(199, 10, 'Project Manager added new board in Test Project project', '2021-04-19 09:18:59'),
(200, 4, 'Project Manager added new board in Test Project project', '2021-04-19 09:18:59'),
(201, 1, 'Jia Jun Lee uploaded new file in Test Project project', '2021-04-19 09:24:29'),
(202, 7, 'Jia Jun Lee uploaded new file in Test Project project', '2021-04-19 09:24:29'),
(203, 5, 'Jia Jun Lee uploaded new file in Test Project project', '2021-04-19 09:24:29'),
(204, 3, 'Jia Jun Lee uploaded new file in Test Project project', '2021-04-19 09:24:29'),
(205, 10, 'Jia Jun Lee assigned bug to you (Bug Test ) in Test Project project', '2021-04-19 09:25:34'),
(206, 4, 'Jia Jun swithed role with you in FYP B project', '2021-04-19 09:38:13'),
(207, 10, 'Project Manager added new board in Project 1. project', '2021-04-21 15:53:03'),
(208, 11, 'Project Manager added new board in Project 1. project', '2021-04-21 15:53:03'),
(209, 2, 'Project Manager added new board in Project 1. project', '2021-04-21 15:53:03');

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
(1, 'FYP', 'Semester 1, 2021', 'Active'),
(2, 'Jason', 'testing', 'Active'),
(3, 'Jason 2', 'Testing 2', 'Active'),
(4, 'Test Drag Function', 'TESTING\r\n', 'Active'),
(5, 'Project 1', 'kuhuihuiuh', 'Active'),
(6, 'Ahmed Project', 'Test 1', 'Active'),
(7, 'TEST EDIT PROJECT', 'TESTING', 'Active'),
(8, 'Test 234', 'TEST', 'Active'),
(9, 'hrtf', 'yrdrt', 'Active'),
(10, 'Proj 1', 'aa', 'Active'),
(11, 'TestProj', '1', 'Active'),
(12, 'Project 1.', 'Project 1 Description', 'Active'),
(13, 'Project 2', 'Project 2 Description', 'Active'),
(14, 'Project 3', 'Project 3 Description', 'Active'),
(15, 'Project 4', 'Project 4 Description', 'Archive'),
(16, 'Project 5', 'Project 5 Description', 'Archive'),
(17, 'FYP B', 'Agile Project Management System', 'Active'),
(18, 'Test Project', 'Project Description', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `report_issue`
--

CREATE TABLE `report_issue` (
  `issue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `desc` varchar(225) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `purpose` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `overview` varchar(255) NOT NULL,
  `reference_material` varchar(255) NOT NULL,
  `definitions_acronyms_abbreviations` varchar(255) NOT NULL,
  `system_overview` varchar(255) NOT NULL,
  `system_architecture` varchar(255) NOT NULL,
  `data_description` varchar(255) NOT NULL,
  `data_dictionary` varchar(255) NOT NULL,
  `component_design` varchar(255) NOT NULL,
  `overview_of_user_interface` varchar(255) NOT NULL,
  `screen_objects_and_actions` varchar(255) NOT NULL,
  `requirement_matrix` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdd_draft`
--

INSERT INTO `sdd_draft` (`sdd_id`, `user_id`, `document_name`, `project`, `team_name`, `team_member`, `purpose`, `scope`, `overview`, `reference_material`, `definitions_acronyms_abbreviations`, `system_overview`, `system_architecture`, `data_description`, `data_dictionary`, `component_design`, `overview_of_user_interface`, `screen_objects_and_actions`, `requirement_matrix`) VALUES
(1, 10, '', '', '', '', '', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get&nbsp;</span><span styl', '', '', '', '', '');

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
  `purpose` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `definitions_acronyms_abbreviations` varchar(255) NOT NULL,
  `business_rules` varchar(255) NOT NULL,
  `system_specification` varchar(255) NOT NULL,
  `system_features` varchar(255) NOT NULL,
  `user_classes_characteristics` varchar(255) NOT NULL,
  `design_implementation_constraints` varchar(255) NOT NULL,
  `assumptions` varchar(255) NOT NULL,
  `operating_environment` varchar(255) NOT NULL,
  `use_case` varchar(255) NOT NULL,
  `external_interface_requirements_user_interfaces` varchar(255) NOT NULL,
  `external_interface_requirements_software_interface` varchar(255) NOT NULL,
  `external_interface_requirements_communication_interface` varchar(255) NOT NULL,
  `non_functional_requirements_usability` varchar(255) NOT NULL,
  `non_functional_requirements_reliability` varchar(255) NOT NULL,
  `non_functional_requirements_security` varchar(255) NOT NULL,
  `non_functional_requirements_portability` varchar(255) NOT NULL,
  `non_functional_requirements_maintainability` varchar(255) NOT NULL,
  `non_functional_requirements_availability` varchar(255) NOT NULL,
  `management_process` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `srs_draft`
--

INSERT INTO `srs_draft` (`srs_id`, `user_id`, `document_name`, `project_name`, `team_name`, `team_member`, `purpose`, `scope`, `definitions_acronyms_abbreviations`, `business_rules`, `system_specification`, `system_features`, `user_classes_characteristics`, `design_implementation_constraints`, `assumptions`, `operating_environment`, `use_case`, `external_interface_requirements_user_interfaces`, `external_interface_requirements_software_interface`, `external_interface_requirements_communication_interface`, `non_functional_requirements_usability`, `non_functional_requirements_reliability`, `non_functional_requirements_security`, `non_functional_requirements_portability`, `non_functional_requirements_maintainability`, `non_functional_requirements_availability`, `management_process`) VALUES
(1, 10, 'SRS Document', '<p>Agile Software Project Management System</p>', '<p>Team Coca Cola</p>', '<p>Lee Jia Jun</p>\r\n<p>Jason Goh</p>\r\n<p>Ahmed Tarek</p>\r\n<p>Bong Siaw Zhen</p>', '<p style=\"text-align: justify;\">The purpose of this document is to provide the software requirement specifications of the Agile Software Project Management System. The creation of the system includes various functionality improvements.</p>', '<p style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management System developed in Software Engineering Project A. 3 different roles will get different improvement on their functionalities and UI of the system. The im', '<p><span style=\"text-align: justify;\">The scope of the project is to improve the Agile Software Management&nbsp;</span><span style=\"text-align: justify;\">System developed in Software Engineering Project A. 3 different roles will get</span></p>', '', '', '', '', '', '', '<p>Agile Software Project Management System</p>', '', '', '', '', '', '', '', '', '', '', '');

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
  `purpose` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `alpha_testing` varchar(255) NOT NULL,
  `system_and_integration_testing` varchar(255) NOT NULL,
  `performance_and_stress_testing` varchar(255) NOT NULL,
  `user_acceptance_testing` varchar(255) NOT NULL,
  `batch_testing` varchar(255) NOT NULL,
  `automated_regression_testing` varchar(255) NOT NULL,
  `beta_testing` varchar(255) NOT NULL,
  `hardware_requirement` varchar(255) NOT NULL,
  `main_frame` varchar(255) NOT NULL,
  `workstation` varchar(255) NOT NULL,
  `test_schedule` varchar(255) NOT NULL,
  `control_procedures` varchar(255) NOT NULL,
  `features_to_be_tested` varchar(255) NOT NULL,
  `features_not_to_be_tested` varchar(255) NOT NULL,
  `resources_roles_responsibility` varchar(255) NOT NULL,
  `schedules` varchar(255) NOT NULL,
  `significantly_impacted_departments` varchar(255) NOT NULL,
  `dependencies` varchar(255) NOT NULL,
  `risk_assumptions` varchar(255) NOT NULL,
  `tools` varchar(255) NOT NULL
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
  `board_id` int(11) NOT NULL DEFAULT 0,
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
(12, 'Task 1', 'Test task function', 1, 30, '2021-04-06', '2021-04-04', NULL, 2, 1),
(13, 'Task 2', 'test task function 2', 2, 30, '2021-04-07', '2021-04-05', NULL, 1, 1),
(14, 'Task 1234', 'oliljoilj', 3, 31, '2021-04-09', '2021-04-07', NULL, 1, 9),
(15, 'TArsk 1', 'tst', 4, 32, '2021-04-07', '2021-04-06', '2021-04-08', 2, 9),
(16, 'Task 1', '1', 5, 33, '2021-04-20', '2021-04-18', NULL, 2, 3),
(17, 'Task 2', 't', 6, 33, '2021-04-20', '2021-04-18', NULL, 1, 4),
(18, 'Task 3', '3', 7, 33, '2021-04-20', '2021-04-18', NULL, 1, 4),
(19, 'Task 4', 'a', 8, 33, '2021-04-22', '2021-04-18', NULL, 3, 3),
(20, 'Task 6', '6', 9, 33, '2021-04-21', '2021-04-18', NULL, 5, 3),
(21, 'Task 8', '8', 10, 33, '2021-04-20', '2021-04-18', NULL, 5, 3),
(22, 'T1', '1', 11, 34, '2021-04-19', '2021-04-18', NULL, 3, 1),
(23, 'T2', '2', 12, 34, '2021-04-19', '2021-04-18', NULL, 3, 3),
(24, 'T3', '3', 13, 34, '2021-04-20', '2021-04-18', NULL, 5, 1),
(25, 'T5', '5', 14, 34, '2021-04-19', '2021-04-18', NULL, 5, 1),
(26, 'Proj1Task1', 'Task 1 Description', 15, 35, '2021-04-20', '2021-04-18', NULL, 4, 11),
(27, 'Proj1Task2', 'Task 2 Description', 16, 35, '2021-04-19', '2021-04-18', NULL, 5, 10),
(28, 'Proj1Task3', 'Task 3 Description', 17, 35, '2021-04-19', '2021-04-18', NULL, 5, 10),
(29, 'Proj1Task4', 'Task 4 Description', 18, 35, '2021-04-19', '2021-04-18', NULL, 4, 10),
(32, 'Proj1Task5', 'Task 5 Description', 19, 35, '2021-04-19', '2021-04-18', NULL, 3, 11),
(33, 'Proj1Task6', 'Task 6 Description', 20, 35, '2021-04-21', '2021-04-18', NULL, 2, 11),
(35, 'Proj4Task1', 'Task 1 Description', 22, 36, '2021-04-19', '2021-04-18', NULL, 1, 11),
(36, 'FYPB Task 1', 'Task 1 Description', 23, 37, '2021-04-21', '2021-04-18', '2021-04-19', 5, 10),
(37, 'FYPB Task 2', 'Task 2 Description', 24, 37, '2021-04-20', '2021-04-18', NULL, 4, 10),
(38, 'FYPB Task 3', 'Task 3 Description', 25, 37, '2021-04-22', '2021-04-18', NULL, 5, 10),
(39, 'FYPB Task 4', 'Task 4 Description', 26, 37, '2021-04-21', '2021-04-18', NULL, 2, 10),
(40, 'FYPB Task 5', 'Task 5 Description', 27, 37, '2021-04-30', '2021-04-18', '2021-05-01', 5, 1),
(41, 'FYPB Task 6', 'Task 6 Description ', 28, 37, '2021-04-23', '2021-04-18', NULL, 5, 1),
(42, 'FYPB Task 7', 'Task 7 Description', 29, 37, '2021-04-21', '2021-04-18', NULL, 3, 1),
(43, 'FYPB Task 8', 'Task 8 Description', 30, 37, '2021-04-28', '2021-04-18', NULL, 4, 1),
(44, 'FYPB Task 9', 'Task 9 Description', 31, 37, '2021-04-21', '2021-04-18', NULL, 1, 4),
(45, 'FYPB Task 10', 'Task 10 Description', 32, 37, '2021-04-20', '2021-04-18', NULL, 2, 4),
(46, 'FYPB Task 11', 'Task 11 Description', 33, 37, '2021-04-28', '2021-04-18', NULL, 4, 4),
(47, 'FYPB Task 12', 'Task 12 Description', 34, 37, '2021-04-19', '2021-04-18', '2021-04-20', 5, 4),
(48, 'Task 1', 'Task 1 Description', 35, 38, '2021-04-19', '2021-04-18', NULL, 5, 10),
(49, 'Task 2', 'Task 2 Description', 36, 38, '2021-04-19', '2021-04-18', NULL, 5, 10),
(50, 'Task 3', 'Task 3 Description', 37, 38, '2021-04-20', '2021-04-18', NULL, 3, 1),
(51, 'Task 4', 'Task 4 Description', 38, 38, '2021-04-21', '2021-04-18', NULL, 2, 1),
(52, 'Task 5', 'Task 5 Description', 39, 38, '2021-04-23', '2021-04-18', NULL, 5, 4),
(53, 'Task 5', 'Task 5 Description', 40, 38, '2021-04-22', '2021-04-18', NULL, 2, 4);

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
(10, 4, 7),
(15, 7, 12),
(16, 1, 13),
(17, 9, 14),
(18, 3, 14),
(19, 3, 15),
(20, 5, 15),
(21, 3, 16),
(22, 4, 17),
(23, 4, 18),
(24, 3, 19),
(25, 3, 20),
(26, 3, 21),
(27, 1, 22),
(28, 3, 23),
(29, 1, 24),
(30, 1, 25),
(31, 11, 26),
(32, 10, 27),
(33, 10, 28),
(34, 10, 29),
(37, 11, 32),
(38, 11, 33),
(40, 11, 35),
(41, 10, 36),
(42, 10, 37),
(43, 10, 38),
(44, 10, 39),
(45, 1, 40),
(46, 1, 41),
(47, 1, 42),
(48, 1, 43),
(49, 4, 44),
(50, 4, 45),
(51, 4, 46),
(52, 4, 47),
(53, 10, 48),
(54, 10, 49),
(55, 1, 50),
(56, 1, 51),
(57, 4, 52),
(58, 4, 53);

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
(1, 'Ahmed', 'Tarek', 25, 'Student', 'Alexandria', 'Egypt', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000.jpeg', 297093685, 'Offline', 'project manager'),
(2, 'Mohamed', 'Ali', 26, 'Accountant', 'Alexandria', 'Egypt', 'mohamed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1244444423, 'Offline', 'project member'),
(3, 'Lee', 'Jia', 25, 'Student', 'Kota Kinabalu', 'Malaysia', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 678452995, 'Online', 'project manager'),
(4, 'Jason', 'Goh', 23, 'Student', 'Kuching', 'Malaysia', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'jason.jpeg', 841443533, 'Offline', 'project manager'),
(5, 'Brain', 'John', 24, 'Student', 'Kuching', 'Malaysia', 'brain@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'testimonials-1.jpg', 398467177, 'Online', 'project manager'),
(6, 'Tarek', 'ABdelRaouf', 23, 'Student', 'Kuching', 'Malaysia', 'tarekabdelraouf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 599275412, 'Offline', 'project member'),
(7, 'Ziad', 'Tarek', 20, 'Student', 'Alexandria', 'Egypt', 'ziad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 821755372, 'Online', 'project member'),
(8, 'John', 'Smith', 23, 'Engineer', 'Kuala Lampur', 'Malaysia', 'johnsmith@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 828240262, 'Online', 'project member'),
(9, 'Ahmed', 'AbdelRaouf', 25, 'STUDENT', 'kUCHING', 'MALAYSIA', '100089038@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', '46dae512e375bee2664a025507da8795.jpg', 977431543, 'Offline', 'project manager'),
(10, 'Jia Jun', 'Lee', 23, 'Student', 'Tawau', 'Malaysia', 'leejiajun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lee.jpeg', 1109918803, 'Online', 'project manager'),
(11, 'Dummy', '1', 30, 'Student', 'Kuching', 'Malaysia', 'dummy1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 1419367844, 'Offline', 'project member'),
(12, 'Bong', 'Siaw Zhen', 23, 'Student', 'Kuching', 'Malaysia', 'bong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bong.jpeg', 737099960, 'Offline', 'project member');

-- --------------------------------------------------------

--
-- Table structure for table `user_created_project`
--

CREATE TABLE `user_created_project` (
  `created_proj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_created_project`
--

INSERT INTO `user_created_project` (`created_proj_id`, `user_id`, `project_id`, `creation_date`) VALUES
(1, 1, 1, '2021-03-18 10:37:32'),
(2, 4, 2, '2021-03-18 13:06:52'),
(3, 4, 3, '2021-03-18 13:11:24'),
(4, 4, 4, '2021-03-19 14:10:52'),
(5, 1, 8, '2021-03-20 20:06:40'),
(6, 3, 17, '2021-04-05 10:41:17'),
(9, 5, 24, '2021-04-10 23:36:13'),
(10, 3, 26, '2021-04-19 01:18:29'),
(11, 1, 29, '2021-04-19 01:26:05'),
(12, 10, 32, '2021-04-19 02:05:45'),
(13, 10, 33, '2021-04-19 02:05:58'),
(15, 10, 35, '2021-04-19 02:06:31'),
(16, 10, 36, '2021-04-19 02:06:44'),
(17, 4, 37, '2021-04-19 02:07:21'),
(18, 10, 48, '2021-04-19 09:17:24');

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
(1, 1, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 1, 2),
(6, 3, 2),
(8, 1, 5),
(9, 3, 5),
(15, 7, 1),
(19, 3, 6),
(20, 2, 6),
(22, 5, 6),
(23, 5, 1),
(24, 5, 9),
(25, 3, 1),
(26, 3, 10),
(27, 4, 10),
(28, 9, 10),
(29, 1, 11),
(30, 3, 11),
(31, 4, 11),
(32, 10, 12),
(33, 10, 13),
(34, 10, 14),
(35, 10, 15),
(36, 10, 16),
(37, 10, 17),
(40, 1, 17),
(41, 4, 17),
(43, 2, 12),
(44, 12, 17),
(45, 7, 13),
(46, 8, 13),
(47, 8, 16),
(48, 10, 18),
(49, 4, 18);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contactusform`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_draft`
--
ALTER TABLE `custom_draft`
  MODIFY `custom_draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meeting_agenda_draft`
--
ALTER TABLE `meeting_agenda_draft`
  MODIFY `meeting_agenda_draft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_minutes_draft`
--
ALTER TABLE `meeting_minutes_draft`
  MODIFY `meeting_minutes_draft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdd_draft`
--
ALTER TABLE `sdd_draft`
  MODIFY `sdd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `srs_draft`
--
ALTER TABLE `srs_draft`
  MODIFY `srs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_draft`
--
ALTER TABLE `std_draft`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
