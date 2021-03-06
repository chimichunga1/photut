/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 5.7.21-log : Database - pstut_dbase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pstut_dbase` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pstut_dbase`;

/*Table structure for table `question_table` */

DROP TABLE IF EXISTS `question_table`;

CREATE TABLE `question_table` (
  `question_id` int(255) NOT NULL AUTO_INCREMENT,
  `quiz_id` varchar(255) NOT NULL,
  `main_question` varchar(255) NOT NULL,
  `question_answer` varchar(255) NOT NULL,
  `choicea` varchar(255) NOT NULL,
  `choiceb` varchar(255) NOT NULL,
  `choicec` varchar(255) NOT NULL,
  `choiced` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `question_table` */

/*Table structure for table `quiz_table` */

DROP TABLE IF EXISTS `quiz_table`;

CREATE TABLE `quiz_table` (
  `quiz_id` int(255) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `quiz_table` */

/*Table structure for table `result_table` */

DROP TABLE IF EXISTS `result_table`;

CREATE TABLE `result_table` (
  `Result_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(11) DEFAULT NULL,
  `Section_ID` int(11) DEFAULT NULL,
  `Quiz_ID` int(11) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Over` int(11) DEFAULT NULL,
  `date_taken` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Result_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `result_table` */

/*Table structure for table `section_table` */

DROP TABLE IF EXISTS `section_table`;

CREATE TABLE `section_table` (
  `section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `user_professor_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `section_table` */

/*Table structure for table `student_section_enroll` */

DROP TABLE IF EXISTS `student_section_enroll`;

CREATE TABLE `student_section_enroll` (
  `student_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `student_status` varchar(255) NOT NULL,
  `isFinished` int(255) NOT NULL DEFAULT '0',
  `data_taken` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student_section_enroll` */

/*Table structure for table `student_table` */

DROP TABLE IF EXISTS `student_table`;

CREATE TABLE `student_table` (
  `user_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student_table` */

/*Table structure for table `tag_prof_section_table` */

DROP TABLE IF EXISTS `tag_prof_section_table`;

CREATE TABLE `tag_prof_section_table` (
  `prof_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_id` varchar(255) NOT NULL,
  `prof_id` varchar(255) NOT NULL,
  PRIMARY KEY (`prof_section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tag_prof_section_table` */

/*Table structure for table `teacher_table` */

DROP TABLE IF EXISTS `teacher_table`;

CREATE TABLE `teacher_table` (
  `teacher_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `isAssigned` varchar(255) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `teacher_table` */

/*Table structure for table `user_accounts` */

DROP TABLE IF EXISTS `user_accounts`;

CREATE TABLE `user_accounts` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isDeleted` varchar(255) NOT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `avatar_img` varchar(255) NOT NULL,
  `AccessRight` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user_accounts` */

insert  into `user_accounts`(`user_id`,`user_fname`,`user_lname`,`username`,`password`,`isDeleted`,`isActive`,`avatar_img`,`AccessRight`) values 
(1,'ADMIN','ADMIN','ADMIN','ADMIN','0','0','assets/admin.png','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
