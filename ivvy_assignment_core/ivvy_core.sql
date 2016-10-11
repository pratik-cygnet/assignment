-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.42 - Source distribution
-- Server OS:                    osx10.6
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ivvy_assignment
CREATE DATABASE IF NOT EXISTS `ivvy_assignment` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ivvy_assignment`;

-- Dumping structure for table ivvy_assignment.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ivvy_assignment.users: ~76 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `gender`, `created_at`, `updated_at`) VALUES
	(52, 'Urban', 'Kerluke', '1974-03-26', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(53, 'Guido', 'Hartmann', '2006-04-20', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(54, 'Sanford', 'Heathcote', '2005-06-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(55, 'Jamar', 'Lind', '1936-09-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(56, 'Johnathon', 'Gulgowski', '2000-03-14', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(57, 'Orin', 'Kunze', '1996-08-19', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(58, 'Alexandro', 'Schimmel', '1984-04-30', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(59, 'Dexter', 'Schmidt', '1917-02-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(60, 'Carlos', 'Wunsch', '1937-01-28', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(61, 'Laverne', 'Prohaska', '1950-03-24', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(62, 'Ismael', 'Quigley', '1967-04-27', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(63, 'Jairo', 'Stokes', '2004-05-12', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(64, 'Clifton', 'Leannon', '1981-12-16', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(65, 'Christian', 'Farrell', '1960-02-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(66, 'Donnell', 'Luettgen', '2002-07-04', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(67, 'Durward', 'Hettinger', '1967-02-08', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(68, 'Rocio', 'Bogan', '1978-11-21', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(69, 'Mateo', 'Gorczany', '1920-05-27', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(70, 'Karl', 'Fritsch', '1973-05-20', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(71, 'Kameron', 'Harris', '1994-05-11', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(72, 'Reese', 'Balistreri', '1962-05-02', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(73, 'Candido', 'Krajcik', '1993-01-11', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(74, 'Jon', 'Runolfsson', '1925-07-18', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(75, 'Mortimer', 'West', '1932-11-24', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(76, 'Edmund', 'Altenwerth', '2009-05-11', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(77, 'Terry', 'Welch', '1940-11-23', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(78, 'Bernhard', 'Kuhlman', '1939-01-16', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(79, 'Arnoldo', 'Boyer', '2011-09-19', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(80, 'Torrey', 'Padberg', '1974-09-06', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(81, 'Josue', 'Altenwerth', '1921-12-13', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(82, 'Uriah', 'Braun', '1947-01-25', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(83, 'Rogers', 'Powlowski', '1967-04-04', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(84, 'Marty', 'Price', '1942-03-22', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(85, 'Stanford', 'D\'Amore', '1922-02-16', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(86, 'Americo', 'Luettgen', '1939-07-14', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(87, 'Sofia', 'Senger', '1937-06-20', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(88, 'Payton', 'Fay', '2006-11-02', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(89, 'Carmelo', 'Brekke', '1980-09-21', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(90, 'Jovani', 'Farrell', '1948-04-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(91, 'Walter', 'Greenholt', '1980-11-23', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(92, 'Brooks', 'Dare', '1944-02-24', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(93, 'Jalon', 'Sauer', '1952-03-23', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(94, 'Mason', 'Runolfsdottir', '1966-02-07', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(95, 'Lucious', 'Grady', '1917-08-12', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(96, 'Arely', 'Shields', '2010-10-08', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(97, 'Nash', 'Nader', '1961-07-03', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(98, 'Price', 'Oberbrunner', '1937-09-12', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(99, 'Santiago', 'Aufderhar', '1995-08-03', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(100, 'Louisa', 'Schmitt', '1966-07-09', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52'),
	(101, 'Johnathan', 'Kozey', '1997-09-20', 'male', '2016-10-10 11:59:52', '2016-10-10 11:59:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table ivvy_assignment.user_files
CREATE TABLE IF NOT EXISTS `user_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_files_user_id_foreign` (`user_id`),
  CONSTRAINT `user_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ivvy_assignment.user_files: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_files` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
