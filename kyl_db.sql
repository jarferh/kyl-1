-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2025 at 05:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$12$Ao2N/UkZmQrSIRsT6LMqUu6rAjt/ZgDioQDlIn7Vsot1DRjkKsBmS', '2025-07-25 21:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `application_start` datetime NOT NULL,
  `application_end` datetime NOT NULL,
  `status` enum('pending','open','closed') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `description`, `application_start`, `application_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Malam Zaki Fellowship 3.0', 'Malam Zaki Fellowship 3.0', '2025-07-27 11:06:00', '2025-07-31 11:06:00', 'closed', '2025-07-27 11:06:41', '2025-09-07 14:45:41'),
(2, 'Ali Guy', 'Laboriosam ut quide', '2025-09-25 12:27:00', '2026-03-04 19:00:00', 'closed', '2025-07-27 15:57:45', '2025-07-28 23:34:00'),
(3, 'Gage Hunt', 'Sit suscipit et vol', '2025-07-28 08:18:00', '2025-07-31 23:49:00', 'closed', '2025-07-28 23:29:13', '2025-07-28 23:30:42'),
(4, 'Risa Adkins', 'Aliquam voluptatem s', '2025-09-09 04:58:00', '2026-08-08 20:57:00', 'open', '2025-09-07 14:45:25', '2025-09-07 14:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `status` enum('active','cancelled','completed') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `location`, `status`, `created_at`) VALUES
(2, 'Dolore autem veritat', 'Omnis ut id in est s', '2025-09-12', 'Ipsum culpa earum ', 'active', '2025-09-05 21:24:20'),
(3, 'Exercitationem dolor', 'Id possimus id qui', '1986-07-02', 'Consequat Amet sun', 'active', '2025-09-07 13:51:35'),
(4, 'Consequatur quo dolo', 'Eum maiores ex nulla', '2010-07-27', 'Laboris eligendi nob', 'active', '2025-09-07 15:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `fellowship_applications`
--

CREATE TABLE `fellowship_applications` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `local_government` varchar(50) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `residential_address` text NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `course_of_study` varchar(255) NOT NULL,
  `graduation_year` int(11) DEFAULT NULL,
  `current_occupation` varchar(255) DEFAULT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `volunteer_experience` text NOT NULL,
  `skills_competencies` text NOT NULL,
  `leadership_roles` text NOT NULL,
  `why_fellowship` text NOT NULL,
  `challenge_description` text NOT NULL,
  `fellowship_goals` text NOT NULL,
  `skills_application` text NOT NULL,
  `can_accommodate` varchar(10) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `passport_photo_path` varchar(255) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fellowship_applications`
--

INSERT INTO `fellowship_applications` (`id`, `full_name`, `birth_date`, `gender`, `state`, `local_government`, `ward`, `phone`, `email`, `residential_address`, `education_level`, `institution_name`, `course_of_study`, `graduation_year`, `current_occupation`, `employer_name`, `work_experience`, `volunteer_experience`, `skills_competencies`, `leadership_roles`, `why_fellowship`, `challenge_description`, `fellowship_goals`, `skills_application`, `can_accommodate`, `video_path`, `passport_photo_path`, `batch_id`, `status`, `created_at`) VALUES
(2, 'Lucian Roy', '2006-06-25', 'Female', 'Bauchi', 'Toro', 'Possimus blanditiis', '+1 (527) 428-6444', 'zekekojos@mailinator.com', 'Cillum vel et fugit', 'ND', 'Medge Allison', 'Esse elit harum do', 2018, 'Modi aliquip proiden', 'Davis Thomas', 'Maiores enim corpori', 'Sit nihil proident', 'Quia dolor velit at', 'Ut adipisicing molli', 'Vitae magni ea est dolorem consequuntur enim ad', 'Ad quis exercitationem nobis asperiores dolore ullamco in consequatur aut illo suscipit vel nihil', 'Qui id neque amet perferendis qui saepe quis reprehenderit', 'Culpa anim sit eiusmod laborum sed eaque praesentium libero qui', 'Maybe', 'debug_video.mp4', 'debug_photo.jpg', 0, 'pending', '2025-07-28 21:59:31'),
(3, 'Shaine Noel', '2000-12-23', 'Female', 'Bauchi', 'Darazo', 'Id esse eveniet ve', '07037033032', 'byty@mailinator.com', 'Harum rerum et conse', 'NCE', 'Blaine Henson', 'Ipsum est dolor qu', 2018, 'Similique quam dolor', 'Ursula Zamora', 'Eaque exercitation u', 'Sequi praesentium ma', 'Duis expedita unde a', 'Architecto explicabo', 'Reprehenderit sit sunt quod similique inventore ut libero dolorem', 'Quaerat dolorem ipsum culpa et enim qui assumenda molestiae', 'Velit possimus irure numquam aspernatur recusandae Perferendis aperiam tenetur ex rem ullamco in eum quidem ullamco voluptatibus', 'Ipsum cupidatat debitis qui ex quos deleniti nobis delectus voluptatibus et dolorem consequatur nihil neque', 'Maybe', 'video_6887f3f82ef40.mp4', 'photo_6887f3f82ef43.jpeg', 0, 'pending', '2025-07-28 22:04:40'),
(4, 'Adrienne Jordan', '1995-07-19', 'Female', 'Bauchi', 'Zaki', 'Anim sint esse por', '07069402052', 'binaripohu@mailinator.com', 'Ut cupidatat nesciun', 'SSCE', 'Chase Cruz', 'Tenetur vitae conseq', 2005, 'Placeat consectetur', 'Lacota Suarez', 'Ea quis molestiae ma', 'Doloribus ipsum ali', 'Commodi ad sed omnis', 'Dolor ab perferendis', 'Sunt non sunt modi ut sequi vitae', 'Numquam ut esse omnis temporibus iure', 'Maiores suscipit commodi proident rerum nisi omnis ab enim porro cillum sed ut quo provident do non', 'Deleniti anim provident voluptates sunt velit distinctio Nihil', 'Maybe', 'video_6887f45a505ba.mp4', 'photo_6887f45a505bd.jpeg', 0, 'pending', '2025-07-28 22:06:18'),
(5, 'Fitzgerald Noel', '2000-09-22', 'Female', 'Bauchi', 'Misau', 'Ut velit consequatur', '07037033032', 'tomisopuc@mailinator.com', 'Voluptatem hic quae', 'SSCE', 'Eagan Rosa', 'Repellendus Omnis s', 2013, 'A lorem et dicta lab', 'Shana Lee', 'Est incididunt ipsu', 'Consectetur similiqu', 'Doloribus odit volup', 'Sequi dignissimos in', 'Odit quam doloribus sed sapiente deleniti dolor quisquam ut accusamus voluptate tempore voluptatem omnis ut beatae', 'Omnis dolores omnis in dolores eos dolore iusto excepteur et molestiae sit', 'Nostrum possimus dolorem vel odio minus', 'Tempor aut ex esse rerum voluptate ut voluptatem nulla pariatur Deleniti eius commodo deserunt', 'Maybe', 'video_6887f4feed814.mp4', 'photo_6887f4feed817.jpeg', 0, 'pending', '2025-07-28 22:09:02'),
(6, 'Odessa Humphrey', '2000-01-20', 'Female', 'Bauchi', 'Ganjuwa', 'Sint quaerat rerum a', '07069402060', 'cawa@mailinator.com', 'Laudantium eligendi', 'HND', 'Vernon Crosby', 'Ex qui ullam Nam vol', 1996, 'Commodi et et provid', 'Noah Moody', 'Laborum quibusdam re', 'Proident consectetu', 'Optio est labore do', 'Delectus at enim ut', 'Quis suscipit veniam in perferendis illum sit eveniet enim aut quia provident quia omnis laboriosam aliqua Alias et doloremque et', 'Molestias incidunt at et tempor praesentium in cum id et ut excepturi', 'Autem ex minim aut asperiores ut ipsam ab ut quibusdam dolorem rerum dolore commodi accusamus id ut', 'Asperiores assumenda illum assumenda sunt consequat Atque ullam adipisicing et ad perspiciatis eaque eiusmod lorem quia', 'No', 'video_6887f98f639f1.mp4', 'photo_6887f98f639f4.jpeg', 1, 'approved', '2025-07-28 22:28:31'),
(7, 'Rylee Rivera', '2000-06-26', 'Female', 'Bauchi', 'Tafawa Balewa', 'Minim alias dolor te', '07069402060', 'bygalah@mailinator.com', 'Necessitatibus labor', 'SSCE', 'Meredith Mckee', 'Iure aspernatur dolo', 2015, 'Qui magna architecto', 'Brian Page', 'Ea eaque cupiditate', 'Blanditiis beatae eu', 'Elit veniam odio e', 'Expedita obcaecati c', 'Iusto aliquid minus in magna laboriosam iusto consequatur proident ipsum debitis quos ut vitae sapiente elit laboriosam illo', 'Nesciunt pariatur Veniam dolor mollit nesciunt sunt veritatis ullamco ut praesentium voluptatibus corrupti distinctio', 'Distinctio Recusandae Perferendis voluptate ut error similique qui voluptas facilis aliqua Quos eligendi officia voluptatem Est libero modi', 'Nulla obcaecati veritatis in in ullamco id et aut non aut velit pariatur', 'Yes', 'video_6887fa00e08a7.mp4', 'photo_6887fa00e08a8.jpeg', 3, 'rejected', '2025-07-28 22:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `timers`
--

CREATE TABLE `timers` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `event_datetime` datetime NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timers`
--

INSERT INTO `timers` (`id`, `title`, `event_datetime`, `status`, `created_at`) VALUES
(1, 'Katagum Colloquium 3.0', '2025-08-02 00:00:00', 'inactive', '2025-07-25 22:24:25'),
(2, 'new', '2025-08-14 13:42:00', 'inactive', '2025-07-27 09:39:46'),
(3, 'Duis repellendus Am', '1976-06-07 12:54:00', 'inactive', '2025-09-07 13:51:47'),
(4, 'Consequatur quo dolo', '2025-09-30 21:14:00', 'active', '2025-09-07 15:27:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fellowship_applications`
--
ALTER TABLE `fellowship_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timers`
--
ALTER TABLE `timers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fellowship_applications`
--
ALTER TABLE `fellowship_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timers`
--
ALTER TABLE `timers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
