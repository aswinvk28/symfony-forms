-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table symfony_forms.queue
CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `salutation` varchar(50) NOT NULL DEFAULT '',
  `service` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `organisation` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table symfony_forms.queue: 6 rows
/*!40000 ALTER TABLE `queue` DISABLE KEYS */;
INSERT INTO `queue` (`id`, `first_name`, `last_name`, `type`, `salutation`, `service`, `created`, `organisation`) VALUES
	(1, 'Anonymous', 'Anonymous Last', 'Anonymous', 'Mr.', 'Service', '2016-10-25 15:54:03', 'Organisation'),
	(2, 'Anonymous 2', 'Anonymous Last', 'Anonymous', 'Mr.', 'Service', '2016-10-25 15:54:03', 'Organisation'),
	(3, 'Anonymous 3', 'Anonymous Last', 'Anonymous', 'Mrs.', 'Service', '2016-10-25 15:54:03', 'Organisation'),
	(4, 'aswin', 'Vijayakumar', 'Citizen', 'Mr.', 'Housing', '2016-10-25 16:53:49', ''),
	(5, '', '', 'Citizen', 'Mr.', 'Council Tax', '2016-10-25 16:54:03', 'Organisation'),
	(6, '', '', 'Citizen', 'Mr.', 'Council Tax', '2016-10-25 16:58:22', 'Organisation');
/*!40000 ALTER TABLE `queue` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
