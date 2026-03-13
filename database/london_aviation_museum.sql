-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2026 at 04:05 AM
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
-- Database: `london_aviation_museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password_hash`, `role`, `created_at`, `last_login`) VALUES
(1, 'admin', 'admin@londonaviation.com', '$2y$10$OzEqjntsC3rGc4U6Mm2OOOEi3P/ijSbWShi5EDOO.FXpelUTas4NC', 'admin', '2026-03-02 05:01:10', '2026-03-02 05:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `bor_pilots`
--

CREATE TABLE `bor_pilots` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `initials` varchar(30) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `in_book` enum('Yes','No','Kind Of','Maybe','Additional') DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bor_pilots`
--

INSERT INTO `bor_pilots` (`id`, `last_name`, `initials`, `full_name`, `in_book`, `notes`, `photo_path`, `created_at`) VALUES
(1, 'Anderson', 'J. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(2, 'Andrewes', 'E. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(3, 'Arnold', 'B. L.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(4, 'Astles', 'J. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(5, 'Astles', 'W. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(6, 'Bartlett', 'R. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(7, 'Beatty', 'W. S.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(8, 'Belecky', 'J. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(9, 'Beveridge', 'J. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(10, 'Blair', 'J. S.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(11, 'Blake', 'V. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(12, 'Boles', 'W. R. K.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(13, 'Bonder', 'H.', NULL, 'Kind Of', 'Pg. 40; (Hyman Bonder)', NULL, '2026-03-13 03:03:51'),
(14, 'Bridgman', 'W. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(15, 'Brook', 'C. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(16, 'Brown', 'J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(17, 'Burston', 'F. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(18, 'Burston', 'G. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(19, 'Cameron', 'D. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(20, 'Cameron', 'R. E. H.', NULL, 'Kind Of', 'Pg. 112; (Robert Edgar Hall Cameron)', NULL, '2026-03-13 03:03:51'),
(21, 'Campbell', 'F. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(22, 'Campbell-Rogers', 'L. H.', NULL, 'Kind Of', 'Pg. 112; (Leonard Hercules Campbell-Rogers)', NULL, '2026-03-13 03:03:51'),
(23, 'Casselman', 'J. H.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(24, 'Caton', 'A. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(25, 'Chapman', 'K. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(26, 'Clegg', 'F. P.', NULL, 'Kind Of', 'Pg. 112; (Frank Peter Clegg)', NULL, '2026-03-13 03:03:51'),
(27, 'Coates', 'G. K.', NULL, 'Maybe', 'Book has him as K. G. Coates. Assuming typo.', NULL, '2026-03-13 03:03:51'),
(28, 'Colley', 'R.', NULL, 'Kind Of', 'Pg. 112; (Ronald Colley)', NULL, '2026-03-13 03:03:51'),
(29, 'Collins', 'K. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(30, 'Cook', 'A. F.', NULL, 'Kind Of', 'Pg. 112; (Alexander Fisher Cook)', NULL, '2026-03-13 03:03:51'),
(31, 'Cowing', 'G. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(32, 'Crawley', 'F. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(33, 'Crone', 'R. D.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(34, 'Cronyn', 'P. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(35, 'Davey', 'E. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(36, 'Deane', 'K. I. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(37, 'Dewar', 'J. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(38, 'Dibb', 'T. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(39, 'Dickson', 'H. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(40, 'Dimock', 'H. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(41, 'Dissing', 'J. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(42, 'Dixon', 'M. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(43, 'Dobson', 'W. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(44, 'Dorey', 'A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(45, 'Douglas', 'G. T.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(46, 'Doupe', 'R. V.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(47, 'Drake', 'F. D.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(48, 'Drew', 'T. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(49, 'Drynan', 'G. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(50, 'Duggan', 'J. P.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(51, 'Edwards', 'W. E.', NULL, 'Maybe', 'According to earlier notes in the files, Edmonds should be Edwards', NULL, '2026-03-13 03:03:51'),
(52, 'Elliot', 'D. M.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(53, 'Evans', 'N. G.', NULL, 'Kind Of', 'Pg. 113; (Norman Garfield Evans)', NULL, '2026-03-13 03:03:51'),
(54, 'Fenwick', 'V. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(55, 'Fletcher', 'A. G.', NULL, 'Maybe', 'Just listed as Gordon Fletcher; no A.', NULL, '2026-03-13 03:03:51'),
(56, 'Fraser', 'J. M. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(57, 'Gale', 'W. T.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(58, 'Garnet', 'A. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(59, 'Gartside', 'W. M.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(60, 'Garwood', 'H. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(61, 'Goodfellow', 'J. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(62, 'Granger', 'F. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(63, 'Gregory', 'H. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(64, 'Griffin', 'L. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(65, 'Gunn', 'S. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(66, 'Hair', 'G. M.', NULL, 'No', 'No mention at all in the books of this person.', NULL, '2026-03-13 03:03:51'),
(67, 'Hall', 'G. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(68, 'Hanley', 'J. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(69, 'Hardy', 'R. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(70, 'Hargreaves', 'M. H.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(71, 'Hartry', 'W. J. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(72, 'Harvey', 'J. H. C.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(73, 'Haycock', 'R. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(74, 'Healy', 'H. H.', NULL, 'Yes', 'In the book this is Healey.', NULL, '2026-03-13 03:03:51'),
(75, 'Hexter', 'R. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(76, 'Hill', 'G. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(77, 'Hill', 'R. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(78, 'Holmes', 'J. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(79, 'Holtze', 'J.', NULL, 'Yes', 'Full name given is Jack Adolph Holtze.', NULL, '2026-03-13 03:03:51'),
(80, 'Hone', 'D.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(81, 'Hooper', 'H. D.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(82, 'Howarth', 'H. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(83, 'Hunter', 'R. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(84, 'Hutchinson', 'G. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(85, 'James', 'J. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(86, 'Jordan', 'J. A.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(87, 'Kearns', 'W. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(88, 'Kee', 'R. J.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(89, 'Kennedy', 'J. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(90, 'Kent', 'S. M.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(91, 'Kristensen', 'F. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(92, 'Lavoie', 'N. T.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(93, 'Lawless', 'J. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(94, 'Lawrence', 'D. E. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(95, 'Lee', 'C. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(96, 'Lee', 'J. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(97, 'Lee', 'J. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(98, 'Lee', 'R. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(99, 'Leigh', 'C. H.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(100, 'Little', 'A. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(101, 'Little', 'K. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(102, 'Loft', 'C. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(103, 'Lott', 'W. W.', NULL, 'Maybe', 'Listed in book as William Lesley Lott.', NULL, '2026-03-13 03:03:51'),
(104, 'Lynas', 'J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(105, 'MacDonald', 'F. M.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(106, 'Mann', 'W. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(107, 'Marshall', 'J. G. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(108, 'Marshall', 'N.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(109, 'Mason', 'P. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(110, 'May', 'G. A.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(111, 'McAlpine', 'D. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(112, 'McCallum', 'D. F.', NULL, 'Kind Of', 'Pg. 114; (Dugald Forbes McCallum)', NULL, '2026-03-13 03:03:51'),
(113, 'McDermott', 'E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(114, 'McDonald', 'H. W.', NULL, 'Kind Of', 'Pg. 114; (Howard William McDonald)', NULL, '2026-03-13 03:03:51'),
(115, 'McGill', 'J. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(116, 'McKinstry', 'K.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(117, 'McMehen', 'R. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(118, 'McMillan', 'H. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(119, 'Millman', 'R. B.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(120, 'Mitchell', 'C. W.', NULL, 'Kind Of', 'Pg. 114; (Charles William Mitchell)', NULL, '2026-03-13 03:03:51'),
(121, 'Moffitt', 'S. B.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(122, 'Mosley', 'W. B.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(123, 'Murdie', 'R. T.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(124, 'Murdie', 'W. D.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(125, 'Navin', 'D. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(126, 'Norfolk', 'K. W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(127, 'Nutter', 'R. E.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(128, 'Parkinson', 'J. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(129, 'Parsons', 'F. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(130, 'Penalagan', 'R. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(131, 'Pensa', 'A.', NULL, 'Maybe', 'Listed as Anthony Vincent Pensa', NULL, '2026-03-13 03:03:51'),
(132, 'Perera', 'K. F.', NULL, 'Kind Of', 'Pg. 114; (Kenneth Frederick Perera)', NULL, '2026-03-13 03:03:51'),
(133, 'Pierce', 'J. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(134, 'Piercy', 'H. S.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(135, 'Pitt', 'H. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(136, 'Purser', 'J. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(137, 'Quilter', 'R. T.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(138, 'Ramsay', 'M. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(139, 'Reilley', 'H. J.', NULL, 'Maybe', 'Listed as Hugh William John Reilley', NULL, '2026-03-13 03:03:51'),
(140, 'Richards', 'W.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(141, 'Rider', 'W. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(142, 'Robertson', 'J. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(143, 'Roulston', 'J. C.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(144, 'Rowed', 'S. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(145, 'Rutledge', 'A. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(146, 'Ryckman', 'G. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(147, 'Sage', 'K. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(148, 'Sanderson', 'S. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(149, 'Schott', 'R. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(150, 'Scourfield', 'L. R.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(151, 'Shannon', 'G. R. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(152, 'Shaw', 'G. K.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(153, 'Shepherd', 'A.', NULL, 'Maybe', 'Listed as Austin Shepherd in the air force list (Pg. 115); listed as Austin Jack Shepherd in the profile.', NULL, '2026-03-13 03:03:51'),
(154, 'Sheridan', 'J. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(155, 'Sims', 'F. L.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(156, 'Sinclair', 'A. J. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(157, 'Smillie', 'W. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(158, 'Smith', 'E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(159, 'Smither', 'R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(160, 'Smither', 'S. F.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(161, 'Sommervile', 'W.M.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(162, 'Soper', 'S. J. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(163, 'Southcott', 'W. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(164, 'Spry', 'L.M.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(165, 'Steels', 'A. D.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(166, 'Steels', 'F. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(167, 'Stephens', 'F. V.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(168, 'Stewart', 'G. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(169, 'Stock', 'L. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(170, 'Tillman', 'W. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(171, 'Tite', 'J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(172, 'Tripp', 'H. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(173, 'Tucker', 'T.E. J.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(174, 'Turner', 'H. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(175, 'Tyson', 'S. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(176, 'Ulens', 'R. W. T.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(177, 'Uyen', 'W.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(178, 'Vail', 'D.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(179, 'Walker', 'W. V.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(180, 'Walsh', 'A. P.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(181, 'Ward', 'W. G.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(182, 'Ware', 'G.N.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(183, 'Warner', 'J. W.', NULL, 'Yes', 'He is just listed as Jack Warner; no W.', NULL, '2026-03-13 03:03:51'),
(184, 'Whale', 'R. G. E.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(185, 'Whitcomb', 'A. J.', NULL, 'Kind Of', 'Pg. 116; (Alfred John Whitcomb)', NULL, '2026-03-13 03:03:51'),
(186, 'Whiteside', 'R. R.', NULL, 'No', 'There are 67 individuals not found in the books. This was one of them.', NULL, '2026-03-13 03:03:51'),
(187, 'Whitlock', 'L. I.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(188, 'Wickham', 'W. R.', NULL, 'Yes', 'He is just listed as Walter Wickham; no R.', NULL, '2026-03-13 03:03:51'),
(189, 'Wilde', 'A. R.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(190, 'Wright', 'H. S.', NULL, 'No', 'No mention at all in the books of this person.', NULL, '2026-03-13 03:03:51'),
(191, 'Wyatt', 'W. H.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(192, 'Yearsley', 'G. A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(193, 'Zubic', 'F. J.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(194, 'Zurbrigg', 'R. M. D’A.', NULL, 'Yes', '', NULL, '2026-03-13 03:03:51'),
(195, 'Ballingall', 'Donald Leslie', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(196, 'Baxter', 'Robert Leroy', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(197, 'Bowery', 'Edwin Maurice', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(198, 'Brayford', 'Lloyd Willis', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(199, 'Buchanan', 'Robert Munro', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(200, 'Crowe', 'Eric Arthur', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(201, 'Curtis', 'Kenneth George', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(202, 'Dymond', 'Charles Vernon', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(203, 'Hawkey', 'John W.', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(204, 'Lewis', 'Harvey Daniel', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(205, 'MacKenzie', 'Jan', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(206, 'McWade', 'John Robert', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(207, 'Standfield', 'Donald Arthur', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(208, 'Smith', 'Frederick John', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(209, 'Sparling', 'John Lewis', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(210, 'Cockaday', 'Cecil William', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(211, 'Conway', 'Arnold Francis', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(212, 'Doan', 'William Cecil', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(213, 'Elgie', 'Wallace Stewart', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(214, 'Forbes', 'Roy Bruce', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(215, 'Gillespie', 'Edward Bruce', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(216, 'Grimes', 'Donald Leonard', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(217, 'Hogg', 'Donald Allan', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(218, 'Hogg', 'John Douglas', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(219, 'Jones', 'Donald Gray', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(220, 'Jones', 'Edmund Geoffrey Charles', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(221, 'Law', 'Raymond Ingham', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(222, 'Martin', 'Stanley Douglas', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(223, 'McGoun', 'Kenneth Beverly', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(224, 'McMartin', 'John Saunders', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(225, 'Meek', 'Robert Alexander', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(226, 'Merrick', 'Peter William', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(227, 'Morgan', 'Franklin Benedict', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(228, 'Paisley', 'John Robert', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(229, 'Pittaway', 'Harold Edward', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(230, 'Pocock', 'James Jerome', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(231, 'Pudney', 'Guy Landford', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(232, 'Smith', 'Wilfred James', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(233, 'Stanley', 'James Kent', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(234, 'Stokes', 'John Ridley', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(235, 'Teevin', 'Russell Donald', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(236, 'Thomson', 'Scott Tudhope Calder', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(237, 'Ward', 'Gordon Lewis', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51'),
(238, 'Watters', 'William John', NULL, 'Additional', '', NULL, '2026-03-13 03:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `first_name`, `last_name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Ajay', 'Ajay', 'a_antonyraj@fanshaweonline.ca', 'Test 1', '2026-02-25 02:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','unsubscribed') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `subscribed_at`, `status`) VALUES
(1, 'ajay ajay', 'ajay@gmail.com', '2026-02-25 02:44:20', 'active'),
(3, 'ajay', 'ajayajay@gmail.com', '2026-03-02 05:06:12', 'active'),
(4, 'ajay ajay', 'asdasdas@gmail.com', '2026-03-02 05:15:03', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bor_pilots`
--
ALTER TABLE `bor_pilots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bor_pilots`
--
ALTER TABLE `bor_pilots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
