
--
-- Database: `db_sample`
--
CREATE DATABASE IF NOT EXISTS `db_sample` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sample`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UNAME` varchar(150) NOT NULL,
  `UPASS` varchar(150) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `UNAME`, `UPASS`) VALUES
(1, 'Mani', '123');

