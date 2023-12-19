-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 02:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfair`
--

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `district` varchar(191) NOT NULL,
  `mobile_number` varchar(191) NOT NULL,
  `website` varchar(191) NOT NULL,
  `sort_description` text NOT NULL,
  `person_name` varchar(191) NOT NULL,
  `person_designation` varchar(191) NOT NULL,
  `person_mobile_number` varchar(191) NOT NULL,
  `person_job_department` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `user_id`, `name`, `email`, `password`, `address`, `district`, `mobile_number`, `website`, `sort_description`, `person_name`, `person_designation`, `person_mobile_number`, `person_job_department`, `status`, `created_at`) VALUES
(1, 'rvc8jqn5', 'IT TECH', 'mohatamim0haque@gmail.com', '18611131', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', 'https://freelancernasir.info', 'Lorem Ipsum', 'Mohatamim Haque', 'Co-founder', '+8801718611131', 'Web', 0, '2022-07-26'),
(2, 'K7zF78Es', 'IT Solution', 'mohatamimhaque10@gmail.com', '18611131', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', 'https://freelancernasir.info', 'Lorem Ipsum', 'Mohatamim Haque', 'CFO', '+8801718611131', 'Web', 0, '2022-07-27'),
(3, 'aAoaf1df', 'VS', 'moh0tamimhaque@gmail.com', '18611131', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', 'https://mohatamimhaque.github.io/mohatamim/', 'Lorem Ipsum', 'Mohatamim Haque', 'CFO', '+8801718611131', 'Graphics', 0, '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `id` int(11) NOT NULL,
  `jobpost_id` varchar(191) NOT NULL,
  `corporate_id` varchar(191) NOT NULL,
  `post_name` varchar(191) NOT NULL,
  `post_category` varchar(191) NOT NULL,
  `post_number` varchar(191) NOT NULL,
  `salary` varchar(191) NOT NULL,
  `job_location` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `application_start` date NOT NULL,
  `application_deadline` date NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`id`, `jobpost_id`, `corporate_id`, `post_name`, `post_category`, `post_number`, `salary`, `job_location`, `file`, `application_start`, `application_deadline`, `description`, `status`, `created_at`) VALUES
(1, '9RQ5J4aD', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658873012.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 1, '2022-07-27'),
(2, 'jZpOGle4', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658873029.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 1, '2022-07-27'),
(3, 'PqJljzWQ', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658873149.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(4, '2mhG6842', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658874123.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(5, 'oFzRPCLR', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658874171.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(6, 'XX0KU3kB', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658874246.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(7, 'Jzfa8T6D', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658874263.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(8, 'gTXnPlZ1', 'rvc8jqn5', 'Web Developer', 'Web Development', '2', '30000', 'Dinajpur', '1658874384.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(9, 'reju9h5T', 'rvc8jqn5', 'Python', 'Software Development', '2', '30000', 'Dinajpur', '1658874447.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 0, '2022-07-27'),
(10, 'Nbrk2Pks', 'rvc8jqn5', 'Python', 'Software Development', '2', '30000', 'Dinajpur', '1658874555.pdf', '2022-07-27', '2022-08-27', '<blockquote>lorem ipsom</blockquote>', 1, '2022-07-27'),
(11, '3OhOor6l', 'K7zF78Es', 'Java', 'Software Development', '2', '30000', 'Dhaka', '1658876214.png', '2022-07-27', '2022-08-27', '<p>csdcsdccscsa<br></p>', 0, '2022-07-27'),
(12, 'LET0FDvC', 'K7zF78Es', 'Web Developer', 'Cyber Security', '2', '30000', 'Feni', '1658935767.pdf', '2022-07-27', '2022-07-27', '<p>loremm</p>', 0, '2022-07-27'),
(13, 'VItBN7lc', 'K7zF78Es', 'Web Developer', 'Cyber Security', '2', '30000', 'Feni', '', '2022-07-27', '2022-07-27', '<p>loremm</p>', 0, '2022-07-27'),
(14, 'W3eMDrHz', 'K7zF78Es', 'Web Developer', 'Cyber Security', '2', '30000', 'Feni', '', '2022-07-27', '2022-07-27', '<p>loremm</p>', 0, '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `fathers_name` varchar(191) NOT NULL,
  `mothers_name` varchar(191) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(191) NOT NULL,
  `education_status` varchar(191) NOT NULL,
  `gpa` varchar(191) NOT NULL,
  `expert_on` varchar(191) NOT NULL,
  `category` varchar(191) NOT NULL,
  `skill` varchar(191) NOT NULL,
  `cv` varchar(191) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(191) NOT NULL,
  `mobile_number` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `notification_list` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `user_id`, `name`, `email`, `password`, `photo`, `fathers_name`, `mothers_name`, `birthday`, `gender`, `education_status`, `gpa`, `expert_on`, `category`, `skill`, `cv`, `address`, `district`, `mobile_number`, `description`, `notification_list`, `status`, `created_at`) VALUES
(6, 'OSxaQ1n9', 'Mohatamim', 'mohatamim0haque@gmail.com', '18611131', '1658861140.jpg', 'Rafiqul Islam', 'Mafruja Begum', '2002-03-02', 'male', '7th Semester', '3.84', 'web', 'Web Development', '0', '1658861343.pdf', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', 'I am a web developer', 'XX0KU3kB-0,Jzfa8T6D-0,gTXnPlZ1-0', 0, '2022-07-26'),
(7, 'H6FFvnAu', 'Mohatamim Haque', 'mohotamimhaque@gmail.com', '18611131', '1658861767.jpg', 'Rafiqul Islam', 'Mafruja Begum', '2002-03-02', 'male', '5th Semester', '3.93', 'Python', 'Software Development', '1', '1658862167.pdf', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', 'Lorem Ipsum', 'reju9h5T-0,Nbrk2Pks-0,3OhOor6l-0', 0, '2022-07-27'),
(8, 'ThTRC14G', 'Mohatamim Haque', 'mohatamimhaque10@gmail.com', '18611131', '1658936064.jpg', 'Rafiqul Islam', 'Mafruja Begum', '2001-01-29', 'male', '4th Semester', '3.89', 'Web', 'Web Development', '1', '1658936064.pdf', 'Fulbari Bus Stand', 'Dinajpur', '+8801718611131', '', 'gTXnPlZ1-0', 0, '2022-07-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
