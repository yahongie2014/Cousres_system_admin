-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 08:20 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark` tinyint(4) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `title`, `question`, `start_date`, `end_date`, `file`, `mark`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'assignment 1', 'q1', '2015-02-10', '2016-03-11', 'uploads/files/18129_image-slider-1.jpg', 5, '1', '2016-02-16 03:24:06', '2016-02-29 00:50:44'),
(2, 13, 'First Assignment ', 'what is climate change? ', '2016-03-21', '2016-03-26', 'uploads/files/49736_alamal-2.png', 10, '1', '2016-03-10 21:39:50', '2016-03-10 21:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_answer`
--

CREATE TABLE `assignment_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment_answer`
--

INSERT INTO `assignment_answer` (`id`, `user_id`, `assignment_id`, `answer`, `file`, `mark`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'asd', 'uploads/images/90073_WIN_20151214_15_26_06_Pro.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `question_mark` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice` text COLLATE utf8_unicode_ci NOT NULL,
  `is_correct` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choice`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'asd', '1', '2016-02-29 00:46:28', '2016-02-29 00:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'noooooooooooo', 2, '2016-02-20 03:00:03', '2016-02-20 03:00:03'),
(2, 1, '', 2, '2016-02-20 03:05:34', '2016-02-20 03:05:34'),
(3, 1, '', 2, '2016-02-20 03:07:55', '2016-02-20 03:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `learn` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `module_id`, `title`, `description`, `learn`, `start_date`, `end_date`, `img`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 'course of engineering', '<p>asfasfasf</p>\r\n', '<p>asfasdfasfasfasfas</p>\r\n', '2015-02-22', '2015-03-11', 'uploads/images/68740_image-slider-1.jpg', '1', '2016-02-16 00:14:05', '2016-02-29 00:52:01'),
(12, 2, 'course of math', '<p>alkslasmcf</p>\r\n', '<p>a;slcm;l</p>\r\n', '2015-02-10', '2015-03-22', 'uploads/images/21549_image-slider-5.jpg', '1', '2016-02-16 00:15:01', '2016-02-16 00:15:01'),
(13, 3, 'Our Earth: Its Climate, History, and Processes', '<p>This course focuses on a basic science understanding that demonstrates how the processes on Earth (including biological processes) lead to natural climate changes that have shaped the planet and the path of evolution. Students are challenged to think of the Earth as an integrated system made up of water, air, ice, land, and life.&nbsp;&nbsp;</p>\r\n\r\n<p>For example, students learn that the rise of oxygen in the atmosphere 2.5 billion years ago produced massive extinctions of life on Earth that forever altered the dominant types of single-celled life. &nbsp;Students are exposed to how new scientific discoveries are made through the observations that led to plate tectonics, how the Moon formed, and why dinosaurs went extinct.</p>\r\n', '<p><strong>1.&nbsp; Building blocks of the Earth&#39;s climate</strong></p>\r\n\r\n<ul>\r\n	<li>How science works</li>\r\n	<li>How Earth&#39;s climate works</li>\r\n	<li>What is geologic time?</li>\r\n	<li>Rocks and minerals</li>\r\n	<li>How old is the Earth?</li>\r\n</ul>\r\n\r\n<p><strong>2. Formation, evolution, and processes of the solid Earth</strong></p>\r\n\r\n<ul>\r\n	<li>Formation of the Earth</li>\r\n	<li>Formation of the Moon</li>\r\n	<li>Plate tectonics</li>\r\n	<li>The first continents</li>\r\n	<li>Earth&#39;s magnetic field</li>\r\n	<li>Mid-ocean ridges and subduction zones</li>\r\n	<li>Supercontinents</li>\r\n	<li>Continent&ndash;continent collisions (Example: the Himalaya)</li>\r\n</ul>\r\n\r\n<p><strong>3. Water in the Earth&#39;s climate system: Oceans, atmosphere, and cryosphere</strong></p>\r\n\r\n<ul>\r\n	<li>The oceans: How they regulate the Earth&#39;s climate</li>\r\n	<li>The cryosphere: Ice on our planet</li>\r\n	<li>The atmosphere: Our protective layer and weather-maker</li>\r\n</ul>\r\n\r\n<p><strong>4. Life, and its effect on the Earth&#39;s climate system</strong></p>\r\n\r\n<ul>\r\n	<li>Evolution of the atmosphere</li>\r\n	<li>Single cells and hard shells</li>\r\n	<li>Life on land</li>\r\n	<li>Death from above (and below): Mass extinctions</li>\r\n</ul>\r\n', '2016-04-10', '2016-05-10', 'uploads/images/50492_alamal-1.jpg', '1', '2016-03-10 20:11:39', '2016-03-10 20:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `scq_count` int(11) NOT NULL,
  `mcq_count` int(11) NOT NULL,
  `essay_count` int(11) NOT NULL,
  `scq_mark` int(11) NOT NULL,
  `mcq_mark` int(11) NOT NULL,
  `essay_mark` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `module_id`, `title`, `duration`, `scq_count`, `mcq_count`, `essay_count`, `scq_mark`, `mcq_mark`, `essay_mark`, `created_at`, `updated_at`) VALUES
(2, 1, 'exam of engineering', 5, 5, 5, 5, 5, 5, 5, '2016-02-16 02:00:43', '2016-02-16 02:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `exam_dates`
--

CREATE TABLE `exam_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_dates`
--

INSERT INTO `exam_dates` (`id`, `exam_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 2, '2015-02-10 02:00:00', '2015-03-11 02:00:00', '2016-02-16 03:49:20', '2016-02-16 03:49:20'),
(2, 2, '2016-01-31 04:20:55', '2016-02-20 04:20:55', '2016-02-29 00:31:30', '2016-02-29 00:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `exam_invites`
--

CREATE TABLE `exam_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `essay_answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `essay_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_answered` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dir` enum('ltr','rtl') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ltr',
  `flag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_default` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('file','link') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'link',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `session_id`, `title`, `url`, `type`, `created_at`, `updated_at`) VALUES
(3, 4, 'link', 'https://www.youtube.com/watch?v=u6-jMaBOB9o', 'link', '2016-02-16 01:47:39', '2016-02-16 01:47:39'),
(4, 4, 'file', 'uploads/files/37359_001 FINAL Architectural & MEP BoQ 04-04-2015.pdf', 'file', '2016-02-19 23:28:58', '2016-02-19 23:28:58'),
(5, 6, 'Single cells and hard shells', 'https://www.coursera.org/course/ourearth', 'link', '2016-03-10 21:25:14', '2016-03-10 21:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_13_071850_create_pages_table', 1),
('2016_01_13_071904_create_page_descriptions_table', 1),
('2016_01_13_071918_create_sliders_table', 1),
('2014_10_12_000000_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 2),
('2016_01_10_220322_entrust_setup_tables', 2),
('2016_01_13_071759_create_languages_table', 2),
('2016_01_18_071759_create_modules_table', 2),
('2016_01_18_091759_create_courses_table', 2),
('2016_01_18_092759_create_sessions_table', 2),
('2016_01_18_093759_create_attendances_table', 2),
('2016_01_18_094759_create_assignments_table', 2),
('2016_01_27_172220_create_module_instractors_table', 2),
('2016_01_27_172452_create_session_assignment_table', 2),
('2016_01_27_172530_create_exams_table', 2),
('2016_01_27_172632_create_questions_table', 2),
('2016_01_27_172724_create_choices_table', 2),
('2016_01_27_182900_create_materials_table', 2),
('2016_01_27_184225_create_assignment_answer_table', 2),
('2016_01_31_141947_create_exam_dates_table', 2),
('2016_01_31_173801_create_exam_questions_table', 2),
('2016_01_31_194520_create_placements_table', 2),
('2016_02_03_190140_create_university_table', 2),
('2016_02_05_163537_create_student_exam_table', 2),
('2016_02_06_124252_CreatePost', 2),
('2016_02_06_145518_create_question_invites_table', 2),
('2016_02_06_145534_create_exam_invites_table', 2),
('2016_02_06_164650_CreateComment', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` tinyint(4) NOT NULL,
  `assignment` tinyint(4) NOT NULL,
  `exam` tinyint(4) NOT NULL,
  `pass` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `attendance`, `assignment`, `exam`, `pass`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'engineering', 20, 30, 50, 70, '<p>Lorem ipsum dolor sit amet, ornare sagittis, consectetuer wisi nec porttitor, nec risus lacinia felis felis sed morbi. Ac conubia sit tincidunt in sit, ut mauris senectus massa nam nec. Velit vivamus odio porta quae id morbi, suspendisse libero interdum amet sed, lacus elit convallis mauris. Magna arcu rutrum vitae quis ipsum metus. Vel leo et elit. Tristique sem posuere integer luctus tortor. In ante metus erat quam, sed vulputate. Urna ornare nunc ut augue, magna nunc orci ultricies maecenas malesuada, odio est convallis posuere, erat velit tristique lectus quisque quis, lorem aliquet lectus felis. Ridiculus sociosqu ipsum, doloremque wisi mi, at mattis condimentum integer ipsum mauris. Integer tellus, tortor ligula nulla eget sit, dui et morbi tellus massa aliquam ornare, porta neque sit curae. Vestibulum urna sem, eget magna porttitor nulla, quis risus, leo congue donec. Vel sed, ac vestibulum velit, nulla leo turpis, mauris vivamus accumsan, erat scelerisque elit etiam.</p>\r\n', '2016-02-07', '2016-04-07', '1', '2016-02-08 00:24:24', '2016-02-08 00:24:24'),
(2, 'math', 25, 25, 50, 40, '<p>adfsdfsdfsd</p>\r\n', '1245-11-11', '1245-11-11', '1', '2016-02-09 00:23:50', '2016-02-09 00:23:50'),
(3, 'Cycle A ', 20, 20, 60, 50, '<p>This is the first module at Al Amal Program, generation 7 in 2016&nbsp;</p>\r\n', '2016-04-01', '2016-07-01', '1', '2016-03-10 18:09:29', '2016-03-10 18:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `module_instractors`
--

CREATE TABLE `module_instractors` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_instractors`
--

INSERT INTO `module_instractors` (`id`, `module_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 24, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 25, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 20, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 30, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 20, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 24, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 25, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2016-02-20 19:49:01', '2016-02-20 19:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `page_descriptions`
--

CREATE TABLE `page_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrange` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_descriptions`
--

INSERT INTO `page_descriptions` (`id`, `page_id`, `img`, `arrange`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, '1', '2016-02-20 19:53:56', '2016-02-20 19:53:56'),
(2, 1, NULL, 2, '1', '2016-02-20 19:55:47', '2016-02-20 19:55:47'),
(3, 1, NULL, 3, '1', '2016-02-20 19:56:20', '2016-02-20 19:56:20'),
(4, 1, NULL, 4, '1', '2016-02-20 19:57:05', '2016-02-20 19:57:05'),
(5, 1, 'uploads/images/36692_apply.png', 5, '1', '2016-02-20 19:58:04', '2016-02-20 20:01:28'),
(6, 1, 'uploads/images/49246_exam.png', 6, '1', '2016-02-20 19:58:38', '2016-02-20 20:01:13'),
(7, 1, 'uploads/images/69779_learn.png', 7, '1', '2016-02-20 19:59:03', '2016-02-20 20:01:00'),
(8, 1, 'uploads/images/36524_graduate.png', 8, '1', '2016-02-20 20:00:12', '2016-02-20 20:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `page_description_translations`
--

CREATE TABLE `page_description_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_desc_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_description_translations`
--

INSERT INTO `page_description_translations` (`id`, `page_desc_id`, `title`, `description`, `locale`) VALUES
(1, 1, 'Al Amal Program', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'en'),
(2, 1, 'Al Amal Program', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'ar'),
(3, 2, '2015-2016 Module Starts Soon. ', '<p>2015-2016 Module Starts Soon.<br />\r\nApplications Deadline 30th, December, 2015</p>\r\n', 'en'),
(4, 2, '2015-2016 Module Starts Soon. ', '<p>2015-2016 Module Starts Soon.<br />\r\nApplications Deadline 30th, December, 2015</p>\r\n', 'ar'),
(5, 3, 'Who should Register', '<ul>\r\n	<li>Phasellus sit amet velit auctor turpis rhoncus.</li>\r\n	<li>Phasellus sed dolor sodales, eleifend ipsum eu.</li>\r\n	<li>Nullam id dolor in ex eleifend tempus.</li>\r\n	<li>Etiam id lorem vel neque faucibus fermentum.</li>\r\n	<li>Nunc tincidunt augue in enim sollicitudin feugiat.</li>\r\n</ul>\r\n', 'en'),
(6, 3, 'Who should Register', '<ul>\r\n	<li>Phasellus sit amet velit auctor turpis rhoncus.</li>\r\n	<li>Phasellus sed dolor sodales, eleifend ipsum eu.</li>\r\n	<li>Nullam id dolor in ex eleifend tempus.</li>\r\n	<li>Etiam id lorem vel neque faucibus fermentum.</li>\r\n	<li>Nunc tincidunt augue in enim sollicitudin feugiat.</li>\r\n</ul>\r\n', 'ar'),
(7, 4, 'Al Amal Program', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua at vero. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor empor invidunt ut labore et dolore.</p>\r\n\r\n<p>Etiam sit amet fringilla lacus. Pellentesque dolor sit amet, elit Vitae gravida nibh. Morbi suscipit ante at ullamcorper pulvinar neque porttitor.</p>\r\n', 'en'),
(8, 4, 'Al Amal Program', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua at vero. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor empor invidunt ut labore et dolore.</p>\r\n\r\n<p>Etiam sit amet fringilla lacus. Pellentesque dolor sit amet, elit Vitae gravida nibh. Morbi suscipit ante at ullamcorper pulvinar neque porttitor.</p>\r\n', 'ar'),
(9, 5, 'Register', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'en'),
(10, 5, 'Register', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'ar'),
(11, 6, 'Exam', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'en'),
(12, 6, 'Exam', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'ar'),
(13, 7, 'Learn', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'en'),
(14, 7, 'Learn', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'ar'),
(15, 8, 'Graduate', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'en'),
(16, 8, 'Graduate', '<p>Lorem ipsum dolor sit amet, magnis nunc arcu porttitor ligula mauris ut. Eleifend sit nascetur eu lectus vitae sed</p>\r\n', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `title`, `meta_title`, `meta_keyword`, `meta_description`, `locale`) VALUES
(1, 1, 'Home', 'home', 'alamal, geophysicist, geology, education, ', 'home', 'en'),
(2, 1, 'الرئيسية', 'الرئيسية', 'الرئيسية', 'الرئيسية', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'question', 'question', 'question', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'exam', 'exam', 'exam', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` int(10) UNSIGNED NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `place`, `date`, `time`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Mosharafa Building, Faculty of Science, Cairo University', '2016-03-30', '4:00 PM ', 'You will Have to pass the placement test in order to join Al Amal Program. Please do not forget your college ID. See you there. ', '0000-00-00 00:00:00', '2016-03-10 18:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent_type` enum('module','course','session') COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `parent_id`, `parent_type`, `post`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'module', 'asdasdzcxzxcqewqwe', 'qweqweqwe', 2, '2016-02-16 02:55:15', '2016-02-16 02:55:15'),
(2, 1, 'module', '<p>aaaaaaaa</p>\r\n', 'abc', 22, '2016-03-07 21:21:43', '2016-03-07 21:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `question_type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_answer` text COLLATE utf8_unicode_ci,
  `file_answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `question_type`, `file`, `question_answer`, `file_answer`, `created_at`, `updated_at`) VALUES
(1, 2, 'qwe', '1', NULL, NULL, NULL, '2016-02-29 00:46:28', '2016-02-29 00:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `question_invites`
--

CREATE TABLE `question_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'administrator can access admin panel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'instructor', 'Instructor', 'instructor can not access admin panel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'student', 'Student', 'student can not access admin panel', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(19, 1),
(20, 2),
(21, 3),
(24, 2),
(25, 2),
(26, 1),
(27, 3),
(29, 1),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8_unicode_ci NOT NULL,
  `video_stop` time NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `choice1` text COLLATE utf8_unicode_ci NOT NULL,
  `choice2` text COLLATE utf8_unicode_ci NOT NULL,
  `choice3` text COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `course_id`, `title`, `description`, `start_date`, `img`, `video`, `video_stop`, `question`, `choice1`, `choice2`, `choice3`, `correct_answer`, `status`, `created_at`, `updated_at`) VALUES
(4, 11, 'sission of engineering', '<p>Lorem ipsum dolor sit amet, sit nostra hendrerit hac habitasse lacus, quisque egestas lorem leo hymenaeos molestie. Pharetra wisi ut velit massa nisl, sed nulla tristique aliquam suscipit risus, enim at praesent elit lobortis neque accumsan, convallis ridiculus orci nunc non sapien risus. Mollis phasellus a. Venenatis integer, aliquet vel vitae vivamus.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, sit nostra hendrerit hac habitasse lacus, quisque egestas lorem leo hymenaeos molestie. Pharetra wisi ut velit massa nisl, sed nulla tristique aliquam suscipit risus, enim at praesent elit lobortis neque accumsan, convallis ridiculus orci nunc non sapien risus. Mollis phasellus a. Venenatis integer, aliquet vel vitae vivamus.</p>\r\n', '2015-02-10', 'uploads/images/99316_image-slider-1.jpg', 'https://www.youtube.com/watch?v=Tf6w5PL6wAs', '00:10:20', 'QUESTION ', 'answer 1 ', 'answer 2 ', 'answer 3 ', '1', '1', '2016-02-16 00:30:27', '2016-03-07 21:08:18'),
(5, 12, 'sission of math', '<p>.m;l;lk;lk;lk;l</p>\r\n', '2015-02-10', 'uploads/images/36867_image-slider-2.jpg', 'https://www.youtube.com/watch?v=u6-jMaBOB9o', '00:00:20', 'q1', 'c1', 'c2', 'c3', '2', '1', '2016-02-16 01:46:22', '2016-03-14 03:30:37'),
(6, 13, 'Evolution of the atmosphere', '<p>In addition to video lecture segments 5&ndash;15 minutes at a time, the students will be taken on video geologic field trips across the world and tours within the Manchester Museum&rsquo;s collections (both on display and behind-the-scenes) where course content will be brought to life.&nbsp;&nbsp;</p>\r\n\r\n<p>Another highlight of the course will be an interactive web game that will allow the students to build their own Earth.&nbsp; The students will pick the locations of continents and other parameters (e.g., axial tilt, solar input), and a simplified climate model simulation will produce the resulting atmospheric and oceanic circulation, as well as ice sheets.&nbsp; Students can explore how different configurations of continents and mountain ranges changes the global circulation and extent of polar ice caps.</p>\r\n', '2016-04-15', 'uploads/images/53272_alamal-2.png', 'https://www.youtube.com/watch?v=1iCJXLMdxhY', '00:45:00', 'How science works', 'works great', 'works fine ', 'works okay', '2', '1', '2016-03-10 20:26:59', '2016-03-10 20:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `session_assignment`
--

CREATE TABLE `session_assignment` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `arrange` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`id`, `user_id`, `exam_id`, `date_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_modules`
--

CREATE TABLE `student_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arrange` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `arrange`, `created_at`, `updated_at`) VALUES
(1, 'cairo', 1, '2016-02-06 19:17:08', '2016-02-06 19:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `university_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `academic_year` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '3',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `university_id`, `name`, `email`, `password`, `fullname`, `birth_date`, `phone`, `address`, `major`, `academic_year`, `bio`, `img`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'admin@example.com', '$2y$10$KIRNVOiTNfCvpL5HeyRMGuPvMXJdMWAB5TqjmMuNb7mNtHczYBen6', 'Mohamed Saad Abdallah', '0000-00-00', '', '', '', '1', '', NULL, '1', '1', 'ukRORA6ajXMBbBUEW1GKNVyqORP5oUvahcOTnZURhLOfy77VCPy3IGMUndNs', '0000-00-00 00:00:00', '2016-03-14 02:17:08'),
(2, 1, 'student', 'student@example.com', '$2y$10$mzytqsY65.2K26f3xNt8I.EzwWqhbcpz/savd3K1ifGUSegvMP2w.', 'student', '2006-03-22', '234342', 'sasd safdwq ', 'qweqw', '3', '', NULL, '3', '1', '3G3h8PXesF2SqNUatn5rnEFV4i8rXBMH8tOvH2T9Apn2ItKkhdqpv4r87kY7', '2016-02-06 19:17:51', '2016-03-14 03:15:46'),
(3, 1, 'mohamed_saad', 'm.saad@oryxlab.com', '$2y$10$FAG9be.6E9KgWHV.S9lHmOuJbV1ZMvb2WcAYrdLPKiAohFN/r2efi', 'Mohamed Saad Abdallah', '1988-01-23', '+201113518786', '6 El game''a St, from El Omda St, El Maryoutteya, Haram', 'engineering', '1', '', NULL, '3', '1', NULL, '2016-02-08 00:07:57', '2016-02-08 00:14:31'),
(5, 0, 'khaledxe', 'khaledxe@gmail.com', '$2y$10$gl5/Ix41S7SGNsysFsSs6eIES1NZrb5j6yMoiQmvBhyZptiJoNBnK', 'dummy', '1888-07-14', '010000000', '45 city', 'engineering', '', '', NULL, '3', '1', NULL, '2016-02-08 18:52:39', '2016-02-08 22:49:56'),
(14, 1, 'm_saad', 'eng.mohammedsaad@gmail.com', '$2y$10$Taos3qp5smSya269PA8Ldu3y4uot3ZJuxZGA/WcbkewfqQAEfnn..', 'Mohamed Saad Abdallah', '1996-06-23', '+201113518786', 'Building 4, Othman Towers, Maadi Corniche, Cairo, Egypt', 'Engineering', '4', '', NULL, '3', '1', NULL, '2016-02-17 08:04:55', '2016-02-21 06:40:33'),
(18, 1, 'alashry', 'mohamedalashry12@gmail.com', '$2y$10$c.eHqt9GcGa4zlFg9JHXve/PbE9hpdUJTgADMLJh45dC8dsCyxn6y', 'alashry', '02/22/2016', '3241123', 'asdf wqdfq  wd', 'qweqw', '', '', NULL, '3', '1', NULL, '2016-02-19 21:35:51', '2016-02-27 00:22:02'),
(19, 0, 'mohamed.saad', 'info@oryxlab.com', '$2y$10$bav0AcvV48Yc6gI7ElG.fuIaTveOI8oq9mGQ0ynpk7ZlcKCjX.bma', 'Mohamed Saad Abdallah', '', '', '', '', '1', '<p>Lorem ipsum dolor sit amet, id nec, ante mattis mauris metus, tortor ultrices sit mi. Risus imperdiet lorem donec, litora auctor erat, nullam eros ac ut nulla sollicitudin sint, rutrum consectetuer dui varius accumsan. Inceptos praesent enim suscipit nec quis quam. Dignissim scelerisque nec dui. Amet quis id et eros pellentesque arcu, fusce sapien vestibulum vehicula, pede morbi sed mollis, pretium nascetur. Ipsum at eget, fusce aliquam, lacus et turpis arcu, nulla et viverra pede risus id fusce, in elit. Pulvinar risus, vulputate pulvinar ea, vehicula justo, cras cursus aliquam duis, nonummy nam harum amet neque cupidatat. Commodo eleifend quisque tellus pharetra, in ante ligula sed pharetra cras turpis. Praesent massa integer, diam ligula maiores diam lacinia, elit blandit aenean mauris ipsum eros, aliquam pretium turpis, nibh varius velit sed vulputate. Fusce gravida ut, rutrum commodo lectus quam id et</p>\r\n', 'uploads/images/49451_Oryx Logo (Medium).jpg', '1', '1', 'V6k300I63v6xaDEciR0pw7NXxvygABzHJWr0O5xPsutQ7jiLV7SWxZZWoEKw', '2016-02-21 06:23:49', '2016-02-21 06:26:58'),
(20, 0, 'hossam.ossama', 'hossam@oryxlab.com', '$2y$10$HPEy0xZ51tBMjIFbgNYQJelkVWLxwX46h/nzqdBH7EqeGFO1Src6a', 'Hossam Ossama', '', '', '', '', '1', '<p>Hossam Ossama - Al Amal instructor</p>\r\n', 'uploads/images/70791_shutterstock_89767336.jpg', '2', '1', NULL, '2016-02-21 06:36:11', '2016-03-10 17:38:18'),
(21, 0, 'student2', 'student2@example.com', '$2y$10$qsY2kBLrRkhqDddBJJyM4uq/Adoam07e9bdm6NWlxqw1bXIa40A/m', 'student2', '', '', '', '', '1', '', NULL, '3', '1', NULL, '2016-02-27 00:56:15', '2016-02-27 00:56:15'),
(22, 1, 'hossamossama', 'hossam.ossama@gmail.com', '$2y$10$XBhc6dEUddEqDRoKIq82YuYVdcBsu9QIxioqC30Glb9dhQ7oJ4NeK', 'Hossam Ossama', '03/01/1990', '+201123264444', 'abc ', 'geology', '3', '', NULL, '3', '1', 'vGIGwOvOwLB2rIPXtZDSHSyDZc67KJwo9NeQUdiqiWzKDi9tWDX28CLAOTpW', '2016-03-07 20:49:55', '2016-03-10 17:25:38'),
(23, 1, 'mohamed.saad', 'talents@oryxlab.com', '$2y$10$I7N2HMe.Vr8FIAKdfW09jesELvfdH6v.H6ap55B3.JnSvFxAKU2pW', 'Mohamed Saad Abdallah', '01/23/1988', '0123456897', '2 moharam st, Maleka Road, Faisal', 'Engineering', '3', '', NULL, '3', '0', NULL, '2016-03-07 20:54:42', '2016-03-07 20:54:42'),
(24, 0, 'ahmed.abdelhamid', 'ahmed@example.com', '$2y$10$cDfMm6eL38T6fgL13WdG0.jBa1V6CQw3O7mqWHrcguNhczGZdYev6', 'Ahmed AbdelHamid', '', '', '', '', '1', '<p>Ahmed Abdelhamid - Al Amal Instructor</p>\r\n', 'uploads/images/93312_shutterstock_89767336.jpg', '2', '1', NULL, '2016-03-10 17:38:06', '2016-03-10 17:38:06'),
(25, 0, 'shehab', 'shehab@example.com', '$2y$10$x6PJC9zaOCNAtRiuF/CX..qBVWpmwmCRpORkPD9KCl8jQIjjNaigG', 'Shehab El Ghazaly', '', '', '', '', '1', '<p>Shehab El Ghazaly - Al Amal Board</p>\r\n', 'uploads/images/83270_shutterstock_89767336.jpg', '2', '1', NULL, '2016-03-10 17:39:33', '2016-03-10 17:39:33'),
(26, 0, 'hossam.ossama', 'hossam@example.com', '$2y$10$HXWA1o8sXrx0jCHsBP1jp.PyEkpgI6TgUWt9mL4dJHcqajD3n.bEm', 'Hossam Ossama', '', '', '', '', '1', '<p>Hossam Ossama - Al Amal admin</p>\r\n', 'uploads/images/58550_shutterstock_77234428.jpg', '1', '1', NULL, '2016-03-10 17:42:28', '2016-03-10 17:42:28'),
(27, 0, 'ahmed.elsayed', 'ahmed@abc.com', '$2y$10$5oTFeWwOFwpV24hTfLEQ.uE93/e6e.6lvvyhjnxTN4uDM/97KXHoK', 'Ahmed ElSayed', '', '', '', '', '1', '<p>Ahmed El Sayed - Al Amal Student</p>\r\n', 'uploads/images/91159_shutterstock_89767336.jpg', '3', '1', NULL, '2016-03-10 17:44:28', '2016-03-10 17:44:28'),
(28, 1, 'khashabawy', 'info@khashabawy.com', '$2y$10$YCzKE4z/k7M.627tR7froudpCb5RYj9fZJQ0WsbXdVf00BAdSkvQ6', 'AbdAllah Usama Khashaba', '03/19/2016', '00201118871733', 'aa', 'communication Engineering', '', '', NULL, '3', '0', NULL, '2016-03-12 08:45:43', '2016-03-12 08:45:43'),
(29, 0, 'emad', 'emad.f.z@gmail.com', '$2y$10$lvBEN4kVSF6ypuiHA04VLOxBtiOm4ezCCifq6qvBFIw0UOb9oIbCm', 'Emad Zaki', '', '', '', '', '1', '<p>kkk</p>\r\n', NULL, '1', '1', NULL, '2016-03-14 02:08:33', '2016-03-14 02:08:33'),
(30, 0, 'emad', 'emad@emad.com', '$2y$10$pQ8mYr5g4sb4/uOiWDXLGut.STwOBNruytzFnJTiJ5wvdJWsluSMe', 'emad zaki', '', '', '', '', '1', '', NULL, '2', '1', 'fLmQ8KYLhjmiwkrslXg7vutcYiOobyL9HvcROdIUB4QocimRfWPy3ULLFJ3j', '2016-03-14 02:15:19', '2016-03-14 02:18:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_answer`
--
ALTER TABLE `assignment_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_dates`
--
ALTER TABLE `exam_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_invites`
--
ALTER TABLE `exam_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_instractors`
--
ALTER TABLE `module_instractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_descriptions`
--
ALTER TABLE `page_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_description_translations`
--
ALTER TABLE `page_description_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_invites`
--
ALTER TABLE `question_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_assignment`
--
ALTER TABLE `session_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assignment_answer`
--
ALTER TABLE `assignment_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_dates`
--
ALTER TABLE `exam_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_invites`
--
ALTER TABLE `exam_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `module_instractors`
--
ALTER TABLE `module_instractors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `page_descriptions`
--
ALTER TABLE `page_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `page_description_translations`
--
ALTER TABLE `page_description_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question_invites`
--
ALTER TABLE `question_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `session_assignment`
--
ALTER TABLE `session_assignment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_modules`
--
ALTER TABLE `student_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
