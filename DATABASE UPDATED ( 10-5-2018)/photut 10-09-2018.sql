/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `pstut_dbase`;
CREATE DATABASE IF NOT EXISTS `pstut_dbase` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pstut_dbase`;

DROP TABLE IF EXISTS `question_table`;
CREATE TABLE IF NOT EXISTS `question_table` (
  `question_id` int(255) NOT NULL AUTO_INCREMENT,
  `quiz_id` varchar(255) NOT NULL,
  `main_question` varchar(255) NOT NULL,
  `question_answer` varchar(255) NOT NULL,
  `choicea` varchar(255) NOT NULL,
  `choiceb` varchar(255) NOT NULL,
  `choicec` varchar(255) NOT NULL,
  `choiced` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DELETE FROM `question_table`;
/*!40000 ALTER TABLE `question_table` DISABLE KEYS */;
INSERT INTO `question_table` (`question_id`, `quiz_id`, `main_question`, `question_answer`, `choicea`, `choiceb`, `choicec`, `choiced`) VALUES
	(1, '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia atque, at suscipit beatae quam, libero non officiis tenetur nihil sapiente magni! Saepe molestias nam praesentium blanditiis voluptatibus, veritatis quod?', 'b', 'a', 'b', 'c', 'd'),
	(2, '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit mollitia atque, at suscipit beatae quam, libero non officiis tenetur nihil sapiente magni! Saepe molestias nam praesentium blanditiis voluptatibus, veritatis quod?', '1', '1', '2', '3', '4'),
	(3, '4', 'sample', 'a', 'a', 'b', 'c', 'd'),
	(4, '4', '2nd sample', 'z', 'z', 'x', 'c', 'v');
/*!40000 ALTER TABLE `question_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `quiz_table`;
CREATE TABLE IF NOT EXISTS `quiz_table` (
  `quiz_id` int(255) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DELETE FROM `quiz_table`;
/*!40000 ALTER TABLE `quiz_table` DISABLE KEYS */;
INSERT INTO `quiz_table` (`quiz_id`, `quiz_name`, `section_id`) VALUES
	(2, 'test1', '9'),
	(4, 'sample', '9');
/*!40000 ALTER TABLE `quiz_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `result_table`;
CREATE TABLE IF NOT EXISTS `result_table` (
  `Result_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(11) DEFAULT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `Quiz_ID` int(11) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Over` int(11) DEFAULT NULL,
  PRIMARY KEY (`Result_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

DELETE FROM `result_table`;
/*!40000 ALTER TABLE `result_table` DISABLE KEYS */;
INSERT INTO `result_table` (`Result_ID`, `Student_ID`, `Section_ID`, `Quiz_ID`, `Score`, `Over`) VALUES
	(1, 3, 9, 4, 2, 3),
	(2, 3, 9, 2, 0, 1);
/*!40000 ALTER TABLE `result_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `section_table`;
CREATE TABLE IF NOT EXISTS `section_table` (
  `section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `user_professor_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

DELETE FROM `section_table`;
/*!40000 ALTER TABLE `section_table` DISABLE KEYS */;
INSERT INTO `section_table` (`section_id`, `section_name`, `user_professor_name`, `user_id`) VALUES
	(9, 'CEIT101A', 'teacher', '4'),
	(10, 'ceat123', 'N/A', '0');
/*!40000 ALTER TABLE `section_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `student_section_enroll`;
CREATE TABLE IF NOT EXISTS `student_section_enroll` (
  `student_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `student_status` varchar(255) NOT NULL,
  `isFinished` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`student_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

DELETE FROM `student_section_enroll`;
/*!40000 ALTER TABLE `student_section_enroll` DISABLE KEYS */;
INSERT INTO `student_section_enroll` (`student_section_id`, `student_id`, `section_id`, `student_status`, `isFinished`) VALUES
	(1, '3', '10', '0', 0),
	(2, '3', '9', '0', 1),
	(10, '15', '9', '0', 0),
	(11, '15', '10', '0', 0);
/*!40000 ALTER TABLE `student_section_enroll` ENABLE KEYS */;

DROP TABLE IF EXISTS `student_table`;
CREATE TABLE IF NOT EXISTS `student_table` (
  `user_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELETE FROM `student_table`;
/*!40000 ALTER TABLE `student_table` DISABLE KEYS */;
INSERT INTO `student_table` (`user_id`, `section_id`) VALUES
	('3', '1'),
	('12', '0'),
	('13', '0'),
	('15', '0');
/*!40000 ALTER TABLE `student_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `tag_prof_section_table`;
CREATE TABLE IF NOT EXISTS `tag_prof_section_table` (
  `prof_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_id` varchar(255) NOT NULL,
  `prof_id` varchar(255) NOT NULL,
  PRIMARY KEY (`prof_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DELETE FROM `tag_prof_section_table`;
/*!40000 ALTER TABLE `tag_prof_section_table` DISABLE KEYS */;
INSERT INTO `tag_prof_section_table` (`prof_section_id`, `section_id`, `prof_id`) VALUES
	(1, '9', '11'),
	(3, '9', '4'),
	(4, '10', '4'),
	(5, '10', '11');
/*!40000 ALTER TABLE `tag_prof_section_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `teacher_table`;
CREATE TABLE IF NOT EXISTS `teacher_table` (
  `teacher_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `isAssigned` varchar(255) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

DELETE FROM `teacher_table`;
/*!40000 ALTER TABLE `teacher_table` DISABLE KEYS */;
INSERT INTO `teacher_table` (`teacher_id`, `user_id`, `isAssigned`) VALUES
	(1, '4', '0'),
	(2, '6', '1'),
	(6, '11', '0'),
	(7, '14', '0');
/*!40000 ALTER TABLE `teacher_table` ENABLE KEYS */;

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isDeleted` varchar(255) NOT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `AccessRight` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

DELETE FROM `user_accounts`;
/*!40000 ALTER TABLE `user_accounts` DISABLE KEYS */;
INSERT INTO `user_accounts` (`user_id`, `user_fname`, `user_lname`, `username`, `password`, `isDeleted`, `isActive`, `AccessRight`) VALUES
	(1, 'admin', 'admina', 'admin', 'admin', '0', NULL, '1'),
	(3, '1', '2', 'user', 'user', '0', '0', '3'),
	(4, 'asd', 'asd', 'teacher', 'teacher', '0', '0', '2'),
	(11, 'test', 'test', 'newteacher', '123', '0', '0', '2'),
	(14, 'KC', 'Ondevilla', 'Kc', 'Kc', '0', '0', '2'),
	(15, '123', '123', '123', '123', '0', '0', '3');
/*!40000 ALTER TABLE `user_accounts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
