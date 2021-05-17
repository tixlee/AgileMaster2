-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 04:18 PM
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
(1, 1, '1', '2021-03-18 11:37:58'),
(20, 3, 'tfghfgjyt', '2021-03-19 15:49:42');

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
(1, 'Tasukh', 'iuuhiuhuih', 1, 1, 2, 'Medium', 'Open', '2021-03-20 20:25:39', '2021-03-26', '2021-03-20'),
(2, 'iuj', 'kniu', 1, 1, 1, 'High', 'In Progress', '2021-03-20 20:26:08', '2021-03-21', '2021-03-20');

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
(1, 4, 1, 'TEST COMMENT FEATURE', '2021-03-19 14:46:10');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `text_color` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `color`, `text_color`) VALUES
(1, 'Testing', '2021-04-29 00:00:00', '2021-04-30 00:00:00', '#44e64d', '#ffffff');


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
(20, 398467177, 297093685, 'hi'),
(21, 297093685, 398467177, 'hello'),
(22, 599275412, 398467177, 'hi');

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
(1, 'FYP B', 'Semester 1, 2021', 'Active'),
(2, 'Jason', 'testing', 'Active'),
(3, 'Jason 2', 'Testing 2', 'Active'),
(4, 'Test Drag Function', 'TESTING\r\n', 'Active'),
(5, 'TEST Bug Report', 'kuhuihuiuh', 'Active');

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
(10, 4, 7);

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
(3, 'Lee', 'Jia  Jun', 25, 'Student', 'Kota Kinabalu', 'Malaysia', 'lee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 678452995, 'Offline', 'project member'),
(4, 'Jason', 'Goh', 23, 'Student', 'Kuching', 'Malaysia', 'jason@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 841443533, 'Offline', 'project manager'),
(5, 'Brain', 'John', 24, 'Student', 'Kuching', 'Malaysia', 'brain@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'testimonials-1.jpg', 398467177, 'Offline', 'project member'),
(6, 'Tarek', 'ABdelRaouf', 23, 'Student', 'Kuching', 'Malaysia', 'tarekabdelraouf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 599275412, 'Offline', 'project member'),
(7, 'Ziad', 'Tarek', 20, 'Student', 'Alexandria', 'Egypt', 'ziad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 821755372, 'Offline', 'project member'),
(8, 'John', 'Smith', 23, 'Engineer', 'Kuala Lampur', 'Malaysia', 'johnsmith@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2-160x160.jpg', 828240262, 'Online', 'project member');

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
(5, 1, 8, '2021-03-20 20:06:40');

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
(7, 2, 1),
(8, 1, 5),
(9, 3, 5),
(10, 2, 5),
(11, 5, 5);

--
-- Dumping data for table `srs_draft`
--

CREATE TABLE `srs_draft` (
  `srs_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
-- Dumping data for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

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
-- Indexes for table `srs_draft`
--
ALTER TABLE `srs_draft`
  ADD PRIMARY KEY (`srs_id`);
  
--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

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
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bug_report`
--
ALTER TABLE `bug_report`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_task`
--
ALTER TABLE `comment_task`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactusform`
--
ALTER TABLE `contactusform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report_issue`
--
ALTER TABLE `report_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_assignees`
--
ALTER TABLE `task_assignees`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_created_project`
--
ALTER TABLE `user_created_project`
  MODIFY `created_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `user_proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `srs_draft`
--
ALTER TABLE `srs_draft`
  MODIFY `srs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
