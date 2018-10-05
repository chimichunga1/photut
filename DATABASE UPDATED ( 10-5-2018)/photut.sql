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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `question_table` */

insert  into `question_table`(`question_id`,`quiz_id`,`main_question`,`question_answer`,`choicea`,`choiceb`,`choicec`,`choiced`) values 
(1,'2','test1','b','a','b','c','d');

/*Table structure for table `quiz_table` */

DROP TABLE IF EXISTS `quiz_table`;

CREATE TABLE `quiz_table` (
  `quiz_id` int(255) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `quiz_table` */

insert  into `quiz_table`(`quiz_id`,`quiz_name`,`section_id`) values 
(2,'test1','9');

/*Table structure for table `section_table` */

DROP TABLE IF EXISTS `section_table`;

CREATE TABLE `section_table` (
  `section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `user_professor_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `section_table` */

insert  into `section_table`(`section_id`,`section_name`,`user_professor_name`,`user_id`) values 
(9,'CEIT101A','teacher','4'),
(10,'ceat123','N/A','0');

/*Table structure for table `student_section_enroll` */

DROP TABLE IF EXISTS `student_section_enroll`;

CREATE TABLE `student_section_enroll` (
  `student_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `student_status` varchar(255) NOT NULL,
  PRIMARY KEY (`student_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `student_section_enroll` */

insert  into `student_section_enroll`(`student_section_id`,`student_id`,`section_id`,`student_status`) values 
(1,'3','10','1');

/*Table structure for table `student_table` */

DROP TABLE IF EXISTS `student_table`;

CREATE TABLE `student_table` (
  `user_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student_table` */

insert  into `student_table`(`user_id`,`section_id`) values 
('3','1'),
('12','0'),
('13','0');

/*Table structure for table `tag_prof_section_table` */

DROP TABLE IF EXISTS `tag_prof_section_table`;

CREATE TABLE `tag_prof_section_table` (
  `prof_section_id` int(255) NOT NULL AUTO_INCREMENT,
  `section_id` varchar(255) NOT NULL,
  `prof_id` varchar(255) NOT NULL,
  PRIMARY KEY (`prof_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tag_prof_section_table` */

insert  into `tag_prof_section_table`(`prof_section_id`,`section_id`,`prof_id`) values 
(1,'9','11'),
(3,'9','4'),
(4,'10','4'),
(5,'10','11');

/*Table structure for table `teacher_table` */

DROP TABLE IF EXISTS `teacher_table`;

CREATE TABLE `teacher_table` (
  `teacher_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `isAssigned` varchar(255) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `teacher_table` */

insert  into `teacher_table`(`teacher_id`,`user_id`,`isAssigned`) values 
(1,'4','0'),
(2,'6','1'),
(6,'11','0');

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
  `AccessRight` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `user_accounts` */

insert  into `user_accounts`(`user_id`,`user_fname`,`user_lname`,`username`,`password`,`isDeleted`,`isActive`,`AccessRight`) values 
(1,'admin','admina','admin','admin','0',NULL,'1'),
(3,'1','2','user','user','0','0','3'),
(4,'asd','asd','teacher','teacher','0','0','2'),
(11,'test','test','newteacher','123','0','0','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
