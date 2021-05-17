-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 01:33 PM
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
(1, 5, 4, 5, 'Supervisor Progress Review', 'Reminder that we will be having a progress review with the supervisor this coming thursday 11 a.m. Please be ready to show whatever you had done in the past few days.', '2021-05-17 19:07:10'),
(2, 5, 4, 6, 'Supervisor Progress Review', 'Reminder that we will be having a progress review with the supervisor this coming thursday 11 a.m. Please be ready to show whatever you had done in the past few days.', '2021-05-17 19:07:10'),
(3, 5, 4, 7, 'Supervisor Progress Review', 'Reminder that we will be having a progress review with the supervisor this coming thursday 11 a.m. Please be ready to show whatever you had done in the past few days.', '2021-05-17 19:07:10'),
(4, 5, 4, 8, 'Supervisor Progress Review', 'Reminder that we will be having a progress review with the supervisor this coming thursday 11 a.m. Please be ready to show whatever you had done in the past few days.', '2021-05-17 19:07:10'),
(5, 5, 4, 5, 'Team Meeting', 'We will be having a team meeting to finalize our documentation this coming Saturday 22nd May.', '2021-05-17 19:08:31'),
(6, 5, 4, 6, 'Team Meeting', 'We will be having a team meeting to finalize our documentation this coming Saturday 22nd May.', '2021-05-17 19:08:31'),
(7, 5, 4, 7, 'Team Meeting', 'We will be having a team meeting to finalize our documentation this coming Saturday 22nd May.', '2021-05-17 19:08:31'),
(8, 5, 4, 8, 'Team Meeting', 'We will be having a team meeting to finalize our documentation this coming Saturday 22nd May.', '2021-05-17 19:08:31');

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
(1, 1, 'Board', '2021-05-10 21:58:10'),
(2, 4, 'Board 1', '2021-05-17 18:42:39'),
(3, 4, 'Board 2', '2021-05-17 18:42:52');

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
(1, 'Calendar Date Validation', 'There are no date validation for calendar', 5, 4, 7, 'Medium', 'Open', '2021-05-17 19:13:51', '2021-05-26', '2021-05-17'),
(2, 'Dashboard Not Fluid', 'Some part in dashboard are not fluid', 5, 4, 5, 'Low', 'Open', '2021-05-17 19:15:39', '2021-05-26', '2021-05-17');

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
(1, 5, 'Email Invitation', '2021-05-18 00:00:00', '2021-05-18 00:00:00', '#FF0000', '#ffffff'),
(2, 5, 'Project Details Back Button', '2021-05-21 00:00:00', '2021-05-21 00:00:00', '#FF0000', '#ffffff'),
(3, 5, 'Flowchart/Pageflow Image Downloadable', '2021-05-19 00:00:00', '2021-05-19 00:00:00', '#FF0000', '#ffffff'),
(4, 5, 'Loading Animation', '2021-05-21 00:00:00', '2021-05-21 00:00:00', '#FF0000', '#ffffff'),
(5, 5, 'Project Image Clickable', '2021-05-27 00:00:00', '2021-05-27 00:00:00', '#FF0000', '#ffffff'),
(6, 7, 'Live Chat', '2021-05-21 00:00:00', '2021-05-21 00:00:00', '#FF0000', '#ffffff'),
(7, 7, 'Change Personal Information', '2021-05-29 00:00:00', '2021-05-29 00:00:00', '#FF0000', '#ffffff'),
(8, 7, 'Edit Project Details', '2021-05-22 00:00:00', '2021-05-22 00:00:00', '#FF0000', '#ffffff'),
(9, 7, 'Document Generator Database Table', '2021-05-20 00:00:00', '2021-05-20 00:00:00', '#FF0000', '#ffffff'),
(10, 7, 'Notification/Announcement Feature', '2021-05-21 00:00:00', '2021-05-21 00:00:00', '#FF0000', '#ffffff'),
(11, 8, 'Change Calendar Layout', '2021-05-20 00:00:00', '2021-05-20 00:00:00', '#FF0000', '#ffffff'),
(12, 8, 'Scroll Bar UI', '2021-05-20 00:00:00', '2021-05-20 00:00:00', '#FF0000', '#ffffff'),
(13, 8, 'Upload Page Fixes', '2021-05-20 00:00:00', '2021-05-20 00:00:00', '#FF0000', '#ffffff'),
(14, 8, 'Admin Panel', '2021-05-26 00:00:00', '2021-05-26 00:00:00', '#FF0000', '#ffffff'),
(15, 8, 'User Interface', '2021-05-19 00:00:00', '2021-05-19 00:00:00', '#FF0000', '#ffffff'),
(16, 6, 'New message indicator', '2021-05-19 00:00:00', '2021-05-19 00:00:00', '#FF0000', '#ffffff'),
(17, 6, 'TimeTracker Sub-form', '2021-05-30 00:00:00', '2021-05-30 00:00:00', '#FF0000', '#ffffff'),
(18, 6, 'Docs Generator UI', '2021-05-19 00:00:00', '2021-05-19 00:00:00', '#FF0000', '#ffffff'),
(19, 6, 'Auto Language Translator', '2021-05-18 00:00:00', '2021-05-18 00:00:00', '#FF0000', '#ffffff'),
(20, 6, 'GitHub Page UI', '2021-05-22 00:00:00', '2021-05-22 00:00:00', '#FF0000', '#ffffff'),
(21, 7, 'Error/Missing Page', '2021-07-09 00:00:00', '2021-07-09 00:00:00', '#FF0000', '#ffffff'),
(22, 5, 'Icon Redirect to Live Chat', '2021-06-03 00:00:00', '2021-06-03 00:00:00', '#FF0000', '#ffffff'),
(23, 6, 'Base64 encryption for ID numbers', '2021-06-05 00:00:00', '2021-06-05 00:00:00', '#FF0000', '#ffffff'),
(24, 8, 'Reset Password Via Email', '2021-06-05 00:00:00', '2021-06-05 00:00:00', '#FF0000', '#ffffff'),
(25, 5, 'Task 1', '2021-06-18 00:00:00', '2021-06-18 00:00:00', '#FF0000', '#ffffff'),
(26, 7, 'Task 2', '2021-06-02 00:00:00', '2021-06-02 00:00:00', '#FF0000', '#ffffff');

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
  `like_most` longtext DEFAULT NULL,
  `like_least` longtext DEFAULT NULL,
  `improve` longtext DEFAULT NULL,
  `new_feature` longtext DEFAULT NULL,
  `bugs` longtext DEFAULT NULL,
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
(1, 'Test Plan', 'Agile Master - User Testing Guidelines.pdf', '17-05-2021', 'Testing', 4, 5);

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
  `created_at` datetime DEFAULT current_timestamp(),
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 6, 'Project Manager added you into FYP B project', '2021-05-17 12:32:34'),
(2, 7, 'Project Manager added you into FYP B project', '2021-05-17 18:42:06'),
(3, 8, 'Project Manager added you into FYP B project', '2021-05-17 18:42:14'),
(4, 5, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:39'),
(5, 6, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:39'),
(6, 7, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:39'),
(7, 8, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:39'),
(8, 5, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:52'),
(9, 6, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:52'),
(10, 7, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:52'),
(11, 8, 'Project Manager added new board in FYP B project', '2021-05-17 18:42:52'),
(12, 5, 'Jia Jun Lee assigned Email Invitation task in Board board', '2021-05-17 18:44:04'),
(13, 5, 'Jia Jun Lee assigned Project Details Back Button task in Board board', '2021-05-17 18:44:39'),
(14, 5, 'Jia Jun Lee assigned Flowchart/Pageflow Image Downloadable task in Board board', '2021-05-17 18:45:21'),
(15, 5, 'Jia Jun Lee assigned Loading Animation task in Board board', '2021-05-17 18:45:55'),
(16, 5, 'Jia Jun Lee assigned Project Image Clickable task in Board board', '2021-05-17 18:46:32'),
(17, 7, 'Jia Jun Lee assigned Live Chat task in Board board', '2021-05-17 18:47:06'),
(18, 7, 'Jia Jun Lee assigned Change Personal Information task in Board board', '2021-05-17 18:47:39'),
(19, 7, 'Jia Jun Lee assigned Edit Project Details task in Board board', '2021-05-17 18:48:19'),
(20, 7, 'Jia Jun Lee assigned Document Generator Database Table task in Board board', '2021-05-17 18:48:59'),
(21, 7, 'Jia Jun Lee assigned Notification/Announcement Feature task in Board board', '2021-05-17 18:49:34'),
(22, 8, 'Jia Jun Lee assigned Change Calendar Layout task in Board board', '2021-05-17 18:50:11'),
(23, 8, 'Jia Jun Lee assigned Scroll Bar UI task in Board board', '2021-05-17 18:50:44'),
(24, 8, 'Jia Jun Lee assigned Upload Page Fixes task in Board board', '2021-05-17 18:51:36'),
(25, 8, 'Jia Jun Lee assigned Admin Panel task in Board board', '2021-05-17 18:52:05'),
(26, 8, 'Jia Jun Lee assigned User Interface task in Board board', '2021-05-17 18:52:44'),
(27, 6, 'Jia Jun Lee assigned New message indicator task in Board board', '2021-05-17 18:53:19'),
(28, 6, 'Jia Jun Lee assigned TimeTracker Sub-form task in Board board', '2021-05-17 18:53:53'),
(29, 6, 'Jia Jun Lee assigned Docs Generator UI task in Board board', '2021-05-17 18:54:18'),
(30, 6, 'Jia Jun Lee assigned Auto Language Translator task in Board board', '2021-05-17 18:55:05'),
(31, 6, 'Jia Jun Lee assigned GitHub Page UI task in Board board', '2021-05-17 18:55:28'),
(32, 7, 'Jia Jun Lee assigned Error/Missing Page task in Board board', '2021-05-17 19:03:35'),
(33, 5, 'Jia Jun Lee assigned Icon Redirect to Live Chat task in Board board', '2021-05-17 19:04:16'),
(34, 6, 'Jia Jun Lee assigned Base64 encryption for ID numbers task in Board board', '2021-05-17 19:05:02'),
(35, 8, 'Jia Jun Lee assigned Reset Password Via Email task in Board board', '2021-05-17 19:05:41'),
(36, 7, 'Project Manager added you into Project 1 project', '2021-05-17 19:09:06'),
(37, 5, 'Jia Jun Lee assigned Task 1 task in Board board', '2021-05-17 19:10:26'),
(38, 7, 'Jia Jun Lee assigned Task 2 task in Board board', '2021-05-17 19:10:40'),
(39, 7, 'Jia Jun swithed role with you in Project 1 project', '2021-05-17 19:10:54'),
(40, 5, 'Jia Jun Lee uploaded new file in FYP B project', '2021-05-17 19:12:49'),
(41, 7, 'Jia Jun Lee uploaded new file in FYP B project', '2021-05-17 19:12:49'),
(42, 7, 'Jia Jun Lee assigned bug to you (Calendar Date Validation) in FYP B project', '2021-05-17 19:13:51'),
(43, 5, 'Jia Jun Lee assigned bug to you (Dashboard Not Fluid) in FYP B project', '2021-05-17 19:15:39');

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
(1, 'Project 1', 'Project 1 Description', 'Active'),
(2, 'Project 2', 'Project 2 Description', 'Active'),
(3, 'Project 3', 'Project 3 Description', 'Active'),
(4, 'FYP B', 'Agile Software Project Management System', 'Active');

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
(1, 'Email Invitation', 'Allow user to invite new user via email', 1, 2, '2021-05-18', '2021-05-12', '2021-05-17', 5, 5),
(2, 'Project Details Back Button', 'Allow user to go back previous page.', 2, 2, '2021-05-21', '2021-05-17', NULL, 3, 5),
(3, 'Flowchart/Pageflow Image Downloadable', 'Allow user to download image in flowchart or pageflow.', 3, 2, '2021-05-19', '2021-05-17', NULL, 4, 5),
(4, 'Loading Animation', 'Add loading animation.', 4, 2, '2021-05-21', '2021-05-17', '2021-05-17', 5, 5),
(5, 'Project Image Clickable', 'Allow project image to be clickable in project page.', 5, 2, '2021-05-27', '2021-05-17', NULL, 3, 5),
(6, 'Live Chat', 'Build a live chat funtion in the system.', 6, 2, '2021-05-21', '2021-05-17', NULL, 2, 7),
(7, 'Change Personal Information', 'Allow user to change personal information.', 7, 2, '2021-05-29', '2021-05-17', NULL, 4, 7),
(8, 'Edit Project Details', 'Allow user to edit project details in project page.', 8, 2, '2021-05-22', '2021-05-17', NULL, 5, 7),
(9, 'Document Generator Database Table', 'Allow user to save documents created to database.', 9, 2, '2021-05-20', '2021-05-17', NULL, 3, 7),
(10, 'Notification/Announcement Feature', 'Allow user to view notification and features in dashboard', 10, 2, '2021-05-21', '2021-05-17', NULL, 3, 7),
(11, 'Change Calendar Layout', 'Change the Layout of calendar to a new one.', 11, 2, '2021-05-20', '2021-05-17', NULL, 2, 8),
(12, 'Scroll Bar UI', 'change the scroll bar UI of the system.', 12, 2, '2021-05-20', '2021-05-17', NULL, 4, 8),
(13, 'Upload Page Fixes', 'Some of the functions are not working properly.', 13, 2, '2021-05-20', '2021-05-17', NULL, 5, 8),
(14, 'Admin Panel', 'Update all admin panel', 14, 2, '2021-05-26', '2021-05-17', '2021-05-27', 5, 8),
(15, 'User Interface', 'Update all UI of the system to new one.', 15, 2, '2021-05-19', '2021-05-17', NULL, 4, 8),
(16, 'New message indicator', 'Add a indicator when new message is received.', 16, 2, '2021-05-19', '2021-05-17', NULL, 2, 6),
(17, 'TimeTracker Sub-form', 'Create sub-forms for the timetracker page.', 17, 2, '2021-05-30', '2021-05-17', NULL, 2, 6),
(18, 'Docs Generator UI', 'Improve the document generator UI.', 18, 2, '2021-05-19', '2021-05-17', NULL, 1, 6),
(19, 'Auto Language Translator', 'Add an auto language translator in the system.', 19, 2, '2021-05-18', '2021-05-17', NULL, 1, 6),
(20, 'GitHub Page UI', 'Improve the UI of the github pages.', 20, 2, '2021-05-22', '2021-05-17', NULL, 1, 6),
(21, 'Error/Missing Page', 'Add an error page showing to user when the page is missing.', 21, 3, '2021-07-09', '2021-06-01', NULL, 4, 7),
(22, 'Icon Redirect to Live Chat', 'Icon on top bar redirecting to live chat.', 22, 3, '2021-06-03', '2021-06-01', NULL, 5, 5),
(23, 'Base64 encryption for ID numbers', 'Use base 64 encryption method to encrypt the id numbers in URL', 23, 3, '2021-06-05', '2021-06-02', NULL, 3, 6),
(24, 'Reset Password Via Email', 'Allow user to reset email via link sent in their email.', 24, 3, '2021-06-05', '2021-06-02', NULL, 5, 8),
(25, 'Task 1', 'Task 1 Desc', 25, 1, '2021-06-18', '2021-05-17', NULL, 1, 5),
(26, 'Task 2', 'Task 2 Desc', 26, 1, '2021-06-02', '2021-05-17', NULL, 1, 7);

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
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 5, 4),
(5, 5, 5),
(6, 7, 6),
(7, 7, 7),
(8, 7, 8),
(9, 7, 9),
(10, 7, 10),
(11, 8, 11),
(12, 8, 12),
(13, 8, 13),
(14, 8, 14),
(15, 8, 15),
(16, 6, 16),
(17, 6, 17),
(18, 6, 18),
(19, 6, 19),
(20, 6, 20),
(21, 7, 21),
(22, 5, 22),
(23, 6, 23),
(24, 8, 24),
(25, 5, 25),
(26, 7, 26);

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
(1, 'Dummy1', ' ', 20, 'Student', 'Kuching', 'Malaysia', 'dummy1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 1332808358, 'Offline', 'project manager'),
(2, 'Dummy2', ' ', 20, 'Student', 'Tawau', 'Malaysia', 'dummy2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 966478505, 'Offline', 'project member'),
(3, 'Dummy3', ' ', 20, 'Student', 'Kuching', 'Malaysia', 'dummy3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'bot.jpeg', 655539570, 'Offline', 'project member'),
(5, 'Jia Jun', 'Lee', 23, 'Student', 'Tawau', 'Malaysia', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 295759495, 'Offline', 'project manager'),
(6, 'Jason', 'Goh', 23, 'Student', 'Tawau', 'Malaysia', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1303623465, 'Offline', 'project member'),
(7, 'Ahmed', 'Tarek', 23, 'Student', 'Kuching', 'Malaysia', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 353703268, '', 'project member'),
(8, 'Siaw Zhen', 'Bong', 23, 'Student', 'Kuching', 'Malaysia', 'bong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 1150063468, 'Offline', 'project member');

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
(1, 7, 1, '2021-05-17 12:27:05'),
(2, 5, 2, '2021-05-17 12:28:20'),
(3, 5, 3, '2021-05-17 12:28:33'),
(4, 5, 4, '2021-05-17 12:28:49');

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
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 5, 4),
(5, 6, 4),
(6, 7, 4),
(7, 8, 4),
(8, 7, 1);

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
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
