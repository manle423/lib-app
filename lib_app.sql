-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 09:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ms. Clare Streich DVM', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(2, 'Alena Lubowitz DVM', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(3, 'Verlie Lemke', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(4, 'Prof. Leda Lindgren', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(5, 'Miss Eleonore Kris', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(6, 'Mr. Elijah Donnelly', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(7, 'Dr. Rick Dare', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(8, 'Prof. Elisabeth Bernier II', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(9, 'Jarrod Schaden', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(10, 'Miss Margaretta Waters I', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(11, 'Shirley Padberg', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(12, 'Prof. Leilani Haley IV', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(13, 'Vada Hintz', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(14, 'Clovis Hammes', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(15, 'Dr. Wilford Senger', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(16, 'Lester Hayes', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(17, 'Evan Maggio MD', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(18, 'Evelyn Robel', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(19, 'Miss Mireya Bogisich III', '2024-07-21 23:58:32', '2024-07-21 23:58:32'),
(20, 'Constance Grimes', '2024-07-21 23:58:32', '2024-07-21 23:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publisher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `published_year` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `short_description`, `description`, `ISBN`, `image`, `publisher_id`, `published_year`, `category_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 'Simple Way Of Piece Life', 3, NULL, NULL, 'B-01', 'uploads/books/1721720952.jpg', 3, 2000, 1, 50, '2024-07-23 00:49:12', '2024-07-23 00:49:12'),
(7, 'Great Travel At Desert', 4, NULL, NULL, 'B-02', 'uploads/books/1721721059.jpg', 1, 2001, 2, 50, '2024-07-23 00:50:59', '2024-07-23 00:50:59'),
(8, 'The Lady Beauty Scarlett', 18, NULL, NULL, 'B-03', 'uploads/books/1721721091.jpg', 5, 2005, 4, 50, '2024-07-23 00:51:31', '2024-07-23 00:51:31'),
(9, 'Once Upon A Time', 19, NULL, NULL, 'B-04', 'uploads/books/1721721122.jpg', 17, 2005, 1, 50, '2024-07-23 00:52:02', '2024-07-23 00:52:02'),
(10, 'Peaceful Enlightment', 5, NULL, NULL, 'B-05', 'uploads/books/1721721154.jpg', 5, 2005, 1, 50, '2024-07-23 00:52:34', '2024-07-23 00:52:34'),
(11, 'Great Travel At Desert', 5, NULL, NULL, 'B-06', 'uploads/books/1721721347.jpg', 4, 2002, 4, 50, '2024-07-23 00:55:47', '2024-07-23 00:55:47'),
(12, 'Life Among The Pirates', 4, NULL, NULL, 'B-07', 'uploads/books/1721721372.jpg', 2, 2002, 4, 50, '2024-07-23 00:56:12', '2024-07-23 00:56:12'),
(13, 'Simple Way Of Piece Life', 1, NULL, NULL, 'B-08', 'uploads/books/1721721394.jpg', 7, 2002, 6, 50, '2024-07-23 00:56:34', '2024-07-23 00:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `borrower_email` varchar(255) NOT NULL,
  `borrower_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `loan_id`, `borrower_name`, `borrower_email`, `borrower_phone`, `created_at`, `updated_at`) VALUES
(1, 4, 'test1', 'test2@gmail.com', '0794651157', '2024-07-24 01:45:09', '2024-07-24 01:45:09'),
(2, 5, 'test1', 'test2@gmail.com', '0794651157', '2024-07-24 02:51:43', '2024-07-24 02:51:43'),
(3, 6, 'test1', 'test2@gmail.com', '0794651157', '2024-07-24 02:52:00', '2024-07-24 02:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:3;', 1721719642),
('admin@gmail.com|127.0.0.1:timer', 'i:1721719642;', 1721719642),
('test1@gmail.com|127.0.0.1', 'i:1;', 1721809963),
('test1@gmail.com|127.0.0.1:timer', 'i:1721809963;', 1721809963);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Romantic', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(2, 'Education', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(4, 'Legend', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(5, 'Fairy', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(6, 'Fable', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(7, 'Comics', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(8, 'Detective', '2024-07-21 19:19:34', '2024-07-21 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `due_date`, `return_date`, `created_at`, `updated_at`) VALUES
(4, 3, 13, '2024-07-24', '2024-07-25', NULL, '2024-07-24 01:45:09', '2024-07-24 01:45:09'),
(5, 3, 12, '2024-07-24', '2024-07-25', NULL, '2024-07-24 02:51:43', '2024-07-24 02:51:43'),
(6, 3, 8, '2024-07-24', '2024-07-25', NULL, '2024-07-24 02:52:00', '2024-07-24 02:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '0001_01_01_000000_create_users_table', 1),
(16, '0001_01_01_000001_create_cache_table', 1),
(17, '0001_01_01_000002_create_jobs_table', 1),
(18, '2024_07_19_041535_create_books_table', 1),
(19, '2024_07_19_042241_create_publishers_table', 1),
(20, '2024_07_19_042601_create_categories_table', 1),
(21, '2024_07_19_082833_create_loans_table', 1),
(22, '2024_07_21_192341_add_foreign_keys_to_loans_table', 1),
(23, '2024_07_21_192412_add_foreign_keys_to_books_table', 1),
(24, '2024_07_21_192523_update_loans_table', 1),
(25, '2024_07_22_022755_add_image_to_books_table', 2),
(26, '2024_07_22_030752_update_books_table', 3),
(27, '2024_07_22_030654_create_authors_table', 4),
(28, '2024_07_24_035850_create_borrowers_table', 5),
(29, '2024_07_24_070839_add_column_phone_to_users', 5),
(30, '2024_07_25_032413_add_column_description_to_books', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Trystan Dickens Jr.', '36836 Queen Parks Apt. 752\nNitzscheshire, MS 97068-3093', '(346) 758-7815', 'shemar.shanahan@yahoo.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(2, 'Aimee Ondricka', '6623 Mann Extension\nNew Maiyafort, AZ 23455-7674', '+1.765.321.0961', 'pgoldner@upton.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(3, 'Erna Leffler', '961 Schoen Loop Apt. 682\nLake Amayaberg, NJ 66352-9187', '+1-231-742-2429', 'clara87@jacobi.net', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(4, 'Elisa Morissette', '9610 Felton Prairie Apt. 697\nSmithambury, NJ 41418', '916.422.7060', 'judge.hyatt@hotmail.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(5, 'Rodger Aufderhar', '880 Flo Bypass Suite 076\nWest Dallasmouth, AZ 16143-6988', '+1-956-531-6642', 'ljacobi@ortiz.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(6, 'Erling Olson PhD', '7075 Madisyn Mills Suite 512\nNew Trudieview, ID 73066', '651-725-8213', 'afriesen@oconnell.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(7, 'Mireille Von', '4752 Erwin Heights Apt. 996\nMathiasberg, WI 03822-7532', '1-213-542-0903', 'urban.brown@yahoo.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(8, 'Craig Keeling I', '826 Schumm Via\nWest Vernie, NH 94191', '602.561.8299', 'willy.crooks@gmail.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(9, 'Gus VonRueden', '69825 Evalyn Point Suite 592\nSouth Elnaland, MO 15493-6477', '(434) 544-1041', 'pturcotte@yahoo.com', '2024-07-21 19:17:33', '2024-07-21 19:17:33'),
(10, 'Tia O\'Connell', '678 Urban Brooks Apt. 188\nJaquelinefurt, MI 64045', '1-831-599-0586', 'burnice18@gmail.com', '2024-07-21 19:17:34', '2024-07-21 19:17:34'),
(11, 'Marietta Gleichner', '3142 Darren Trail Suite 358\nArtview, AK 11667', '1-878-710-0287', 'tcruickshank@armstrong.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(12, 'Jada Buckridge', '55679 Elliott Union\nNew Clydefort, RI 22280', '1-689-810-4379', 'stefan.windler@hotmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(13, 'Dr. Zachariah Altenwerth Sr.', '64264 Von Path Suite 291\nPort Terencetown, CA 04565-0165', '+1 (571) 608-3265', 'blaze.schroeder@hotmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(14, 'Noemi Nolan', '6935 Beer Fords\nLemketon, NH 91533', '+1.949.805.5644', 'letha.mayert@bruen.info', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(15, 'Tyreek Bruen Sr.', '7937 Orpha Pine Apt. 971\nEveretttown, MO 10459', '+13154531194', 'ruthie10@gmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(16, 'Lonzo Champlin', '87192 Earlene River Apt. 335\nUptonville, NY 97643-5745', '(872) 316-1229', 'uemard@hotmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(17, 'Shanelle Block', '36865 Kuphal Inlet Suite 010\nNorth Sibyl, VT 41241', '+1-878-281-2066', 'magnus.price@hotmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(18, 'Carlee Hudson', '74396 Frami Meadows\nWest Marshallshire, SC 08068-6902', '+1.341.549.1937', 'luigi.wisozk@hotmail.com', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(19, 'Brent Schimmel', '2394 Laury Village\nTremblayfort, MD 22894-4144', '+13206357473', 'myrtis.bechtelar@ortiz.net', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(20, 'Ada Bode', '37259 Willms Plains Apt. 447\nWest Mariefurt, MN 54712', '(870) 365-5860', 'shanelle38@considine.org', '2024-07-21 19:19:33', '2024-07-21 19:19:33'),
(21, 'Florence Jacobson V', '903 Connelly Vista Suite 093\nEast Taratown, IN 21500', '(786) 672-6771', 'yadira.oberbrunner@becker.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(22, 'Gregg Weissnat', '863 Jamison Common\nAngelofurt, WA 34735', '(612) 837-5650', 'eleanore.rolfson@pfeffer.biz', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(23, 'Lydia Wolf', '70813 Euna Trace Apt. 095\nAnnamarieside, GA 74761-7941', '(763) 366-6408', 'bernier.oren@eichmann.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(24, 'Ephraim Roob', '6694 Casper Light Apt. 824\nNew Noble, NE 82754', '(463) 950-3265', 'nikko.kerluke@quigley.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(25, 'Eli Lindgren DDS', '81953 Mathias Falls Apt. 505\nProhaskamouth, WI 23335', '+14454497729', 'vito58@schuster.net', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(26, 'Alfred Schultz', '654 Herman Meadow Apt. 447\nNew Chelsieland, CT 21710-6552', '410-490-3230', 'ipagac@hotmail.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(27, 'Jerel Swaniawski', '185 Sanford Bypass\nEast Aurelie, WI 59681', '+1-828-462-7545', 'ldenesik@hotmail.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(28, 'Dr. D\'angelo Conroy', '74117 Heaney Pines Suite 450\nNorth Agustinaborough, RI 85296-0684', '1-332-800-3555', 'benedict72@hotmail.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(29, 'Garret Ziemann', '138 Mervin Spurs Apt. 002\nXzavierburgh, SC 94299-1006', '+1-920-423-0536', 'kali85@friesen.info', '2024-07-21 23:58:12', '2024-07-21 23:58:12'),
(30, 'Luz Gusikowski DVM', '66079 Hane Point Apt. 359\nAlexismouth, SD 39196-4467', '1-754-621-7959', 'mann.andreane@steuber.com', '2024-07-21 23:58:12', '2024-07-21 23:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1fPEgc5tBcUm4cWdot9eI8e8qZlJ7FmRZX0DDNjg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSll0dm5reWZabkZFSXptaU9ITWJuWlQxUU1tRVNWOUF4bE1rdnJpMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO319', 1721892923),
('tsLa04zFJtga0xjrWQkrXVoeQfiP7znegSr7exqR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic3l3M1Z0OWJlamR1bFg0YzFqRGx6VkNFdE1lNDFEVkYzRlB5UkE4ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaGlzdG9yeSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1721882645);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Thuý Ngân', NULL, 'vuhuyhoang310199@gmail.com', NULL, '$2y$12$B3GLIGzASESl2mGpbZqrKuYsH3QInlr.4qy71wX43G33ZVJJYvC6a', 0, 'ZB9a3Gy7dEL78SG98759vlEihiIXFeplFB3DPEKhOHhCUILvvtwlCq0YGj1x', '2024-07-21 19:18:05', '2024-07-21 19:18:05'),
(2, 'test', NULL, 'test@gmail.com', NULL, '$2y$12$t22Y3n7yr0/SeRXBzF/vkefPxNgEIujddkEhD0u3oahoSAb/qrAte', 1, NULL, '2024-07-22 19:36:52', '2024-07-22 19:36:52'),
(3, 'test1', '0794651157', 'test2@gmail.com', NULL, '$2y$12$N/6ODaSPv4ZPnyqKCjvY4.E98YCtwsGiDroNNRWPLobHx7w7mKDYm', 0, NULL, '2024-07-24 01:03:09', '2024-07-24 01:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowers_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_book_id_foreign` (`book_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `borrowers_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
