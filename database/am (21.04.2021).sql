-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 08:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
(32, 6, 'Board 2', '2021-04-06 14:24:52');

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
(10, 'REWTY', 'fdshterss', 1, 5, 3, 'Medium', 'Closed', '2021-04-11 20:06:18', '2021-04-13', '2021-04-11');

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
(17, 9, 15, 'TEST COMMENT FUNCTION', '2021-04-06 15:42:00');

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
(5, 5, 'weqaew', '2021-04-16 05:00:00', '2021-04-17 19:00:00', '#6453e9', '#ffffff');

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
(6, 'UPLOAD NEW FILE', 'Man-Silhouette.jpg', '06-04-2021', 'Design', 1, 9);

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
  `agenda_items` longtext DEFAULT NULL,
  `action_items_from_previous_meeting` longtext DEFAULT NULL,
  `new_action_items` longtext DEFAULT NULL,
  `notes_info` longtext DEFAULT NULL
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
  `agenda_items` longtext DEFAULT NULL,
  `decisions` longtext DEFAULT NULL,
  `new_action_items` longtext DEFAULT NULL,
  `notes_info` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `read_status` int(1) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`,`read_status`, `msg`) VALUES
(1, 1244444423, 297093685,0, 'hi'),
(2, 297093685, 1244444423,0, 'how ar you?'),
(3, 297093685, 1244444423,0, 'hello?'),
(4, 1244444423, 297093685,0, 'I\'m fine'),
(5, 1244444423, 297093685,0, 'what are you doing?'),
(6, 297093685, 1244444423,0, 'just resting'),
(7, 1244444423, 297093685,0, 'iuhnjou'),
(8, 1244444423, 297093685,0, ';uihuioh'),
(9, 1244444423, 297093685,0, 'iuhgi'),
(10, 1244444423, 297093685,0, 'iuh'),
(11, 678452995, 297093685,0, 'hi'),
(12, 297093685, 678452995,0, 'hi'),
(13, 678452995, 297093685,0, 'hello'),
(14, 297093685, 678452995,0, 'hi'),
(15, 1244444423, 678452995,0, 'hi'),
(16, 678452995, 297093685,0, 'gyu'),
(17, 297093685, 678452995,0, 'hi'),
(18, 297093685, 841443533,0, 'hello'),
(19, 1244444423, 841443533,0, 'helli'),
(20, 398467177, 297093685,0, 'hi'),
(21, 297093685, 398467177,0, 'hello'),
(22, 599275412, 398467177,0, 'hi'),
(23, 678452995, 977431543,0, 'hello'),
(24, 977431543, 678452995,0, 'hi'),
(25, 977431543, 678452995,0, 'how are you?');

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
(92, 3, 'Project Manger added you into FYP project', '2021-04-11 19:40:26');

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
(9, 'hrtf', 'yrdrt', 'Active');

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
  `purpose` longtext DEFAULT NULL,
  `scope` longtext DEFAULT NULL,
  `overview` longtext DEFAULT NULL,
  `reference_material` longtext DEFAULT NULL,
  `definitions_acronyms_abbreviations` longtext DEFAULT NULL,
  `system_overview` longtext DEFAULT NULL,
  `system_architecture` longtext DEFAULT NULL,
  `data_description` longtext DEFAULT NULL,
  `data_dictionary` longtext DEFAULT NULL,
  `component_design` longtext DEFAULT NULL,
  `overview_of_user_interface` longtext DEFAULT NULL,
  `screen_objects_and_actions` longtext DEFAULT NULL,
  `requirement_matrix` longtext DEFAULT NULL
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
  `purpose` longtext DEFAULT NULL,
  `scope` longtext DEFAULT NULL,
  `definitions_acronyms_abbreviations` longtext DEFAULT NULL,
  `business_rules` longtext DEFAULT NULL,
  `system_specification` longtext DEFAULT NULL,
  `system_features` longtext DEFAULT NULL,
  `user_classes_characteristics` longtext DEFAULT NULL,
  `design_implementation_constraints` longtext DEFAULT NULL,
  `assumptions` longtext DEFAULT NULL,
  `operating_environment` longtext DEFAULT NULL,
  `use_case` longtext DEFAULT NULL,
  `external_interface_requirements_user_interfaces` longtext DEFAULT NULL,
  `external_interface_requirements_software_interface` longtext DEFAULT NULL,
  `external_interface_requirements_communication_interface` longtext DEFAULT NULL,
  `non_functional_requirements_usability` longtext DEFAULT NULL,
  `non_functional_requirements_reliability` longtext DEFAULT NULL,
  `non_functional_requirements_security` longtext DEFAULT NULL,
  `non_functional_requirements_portability` longtext DEFAULT NULL,
  `non_functional_requirements_maintainability` longtext DEFAULT NULL,
  `non_functional_requirements_availability` longtext DEFAULT NULL,
  `management_process` longtext DEFAULT NULL
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
  `purpose` longtext DEFAULT NULL,
  `scope` longtext DEFAULT NULL,
  `alpha_testing` longtext DEFAULT NULL,
  `system_and_integration_testing` longtext DEFAULT NULL,
  `performance_and_stress_testing` longtext DEFAULT NULL,
  `user_acceptance_testing` longtext DEFAULT NULL,
  `batch_testing` longtext DEFAULT NULL,
  `automated_regression_testing` longtext DEFAULT NULL,
  `beta_testing` longtext DEFAULT NULL,
  `hardware_requirement` longtext DEFAULT NULL,
  `main_frame` longtext DEFAULT NULL,
  `workstation` longtext DEFAULT NULL,
  `test_schedule` longtext DEFAULT NULL,
  `control_procedures` longtext DEFAULT NULL,
  `features_to_be_tested` longtext DEFAULT NULL,
  `features_not_to_be_tested` longtext DEFAULT NULL,
  `resources_roles_responsibility` longtext DEFAULT NULL,
  `schedules` longtext DEFAULT NULL,
  `significantly_impacted_departments` longtext DEFAULT NULL,
  `dependencies` longtext DEFAULT NULL,
  `risk_assumptions` longtext DEFAULT NULL,
  `tools` longtext DEFAULT NULL
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
(15, 'TArsk 1', 'tst', 4, 32, '2021-04-07', '2021-04-06', '2021-04-08', 2, 9);

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
(20, 5, 15);

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
(1, 'Ahmed', 'Tarek', 25, 'Student', 'Alexandria', 'Egypt', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000.jpeg', 297093685, 'Online', 'project manager'),
(2, 'Mohamed', 'Ali', 26, 'Accountant', 'Alexandria', 'Egypt', 'mohamed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1244444423, 'Offline', 'project member'),
(3, 'Lee', 'Jia  Jun', 25, 'Student', 'Kota Kinabalu', 'Malaysia', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 678452995, 'Online', 'project member'),
(4, 'Jason', 'Goh', 23, 'Student', 'Kuching', 'Malaysia', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 841443533, 'Offline', 'project manager'),
(5, 'Brain', 'John', 24, 'Student', 'Kuching', 'Malaysia', 'brain@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'testimonials-1.jpg', 398467177, 'Online', 'project manager'),
(6, 'Tarek', 'ABdelRaouf', 23, 'Student', 'Kuching', 'Malaysia', 'tarekabdelraouf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 599275412, 'Offline', 'project member'),
(7, 'Ziad', 'Tarek', 20, 'Student', 'Alexandria', 'Egypt', 'ziad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 821755372, 'Online', 'project member'),
(8, 'John', 'Smith', 23, 'Engineer', 'Kuala Lampur', 'Malaysia', 'johnsmith@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 828240262, 'Online', 'project member'),
(9, 'Ahmed', 'AbdelRaouf', 25, 'STUDENT', 'kUCHING', 'MALAYSIA', '100089038@students.swinburne.edu.my', 'e10adc3949ba59abbe56e057f20f883e', '46dae512e375bee2664a025507da8795.jpg', 977431543, 'Offline', 'project manager');

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
(9, 5, 24, '2021-04-10 23:36:13');

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
(25, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contactusform`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_draft`
--
ALTER TABLE `custom_draft`
  MODIFY `custom_draft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
  
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
