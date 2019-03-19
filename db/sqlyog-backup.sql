/*
SQLyog Ultimate v8.53 
MySQL - 5.7.12 : Database - project_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `project_db`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `adminId` int(6) NOT NULL AUTO_INCREMENT,
  `credentialId` int(6) DEFAULT NULL,
  PRIMARY KEY (`adminId`),
  KEY `FK_admin_table` (`credentialId`),
  CONSTRAINT `FK_admin_table` FOREIGN KEY (`credentialId`) REFERENCES `credential_table` (`credentialId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminId`,`credentialId`) values (1,1);

/*Table structure for table `calendar_table` */

DROP TABLE IF EXISTS `calendar_table`;

CREATE TABLE `calendar_table` (
  `calendarID` int(6) NOT NULL AUTO_INCREMENT,
  `calendarIMGname` text,
  PRIMARY KEY (`calendarID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_table` */

insert  into `calendar_table`(`calendarID`,`calendarIMGname`) values (1,'img/4f033e804334fccc170efce74cc6803d46501146_3804273596266269_4535892155029258240_n.jpg');

/*Table structure for table `council_table` */

DROP TABLE IF EXISTS `council_table`;

CREATE TABLE `council_table` (
  `CounID` int(6) NOT NULL AUTO_INCREMENT,
  `CounName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`CounID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `council_table` */

insert  into `council_table`(`CounID`,`CounName`) values (1,'CAS-ED Council'),(2,'CBTV Council'),(3,'Nursing Council');

/*Table structure for table `course_table` */

DROP TABLE IF EXISTS `course_table`;

CREATE TABLE `course_table` (
  `CourseID` int(6) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(60) DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `FK_course_table` (`departmentClubId`),
  KEY `FK_course_tables` (`CounID`),
  CONSTRAINT `FK_course_table` FOREIGN KEY (`departmentClubId`) REFERENCES `departmental_club_table` (`departmentClubId`),
  CONSTRAINT `FK_course_tables` FOREIGN KEY (`CounID`) REFERENCES `council_table` (`CounID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `course_table` */

insert  into `course_table`(`CourseID`,`CourseName`,`departmentClubId`,`CounID`) values (1,'Bachelor of Science in Computer Science',1,1);

/*Table structure for table `credential_table` */

DROP TABLE IF EXISTS `credential_table`;

CREATE TABLE `credential_table` (
  `credentialId` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`credentialId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `credential_table` */

insert  into `credential_table`(`credentialId`,`username`,`password`) values (1,'admin','admin');

/*Table structure for table `departmental_club_table` */

DROP TABLE IF EXISTS `departmental_club_table`;

CREATE TABLE `departmental_club_table` (
  `departmentClubId` int(6) NOT NULL AUTO_INCREMENT,
  `departmentClubName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`departmentClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_club_table` */

insert  into `departmental_club_table`(`departmentClubId`,`departmentClubName`) values (1,'Philippine Society of Information Technology Students'),(2,'Institute of Computer Engineers of the Philippines S.E'),(3,'Philippine Nursing Student Association'),(4,'Junior Hoteliers and Restaurateurs Association'),(5,' Mathematics Club ');

/*Table structure for table `social_club_table` */

DROP TABLE IF EXISTS `social_club_table`;

CREATE TABLE `social_club_table` (
  `socialClubId` int(6) NOT NULL AUTO_INCREMENT,
  `socialClubName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`socialClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `social_club_table` */

insert  into `social_club_table`(`socialClubId`,`socialClubName`) values (4,'Youth Servant Leaders Clubs'),(5,'Kristiyanong Kabataan para sa Bayan'),(6,'Catechetical Guild'),(7,'Muslim Students Organization'),(8,'Association of Student Personnel Assistants'),(9,'Peer Counselors Club'),(10,'Cantores et Sesyonistas'),(11,'Junior Ecologist Movement'),(12,'Sports Club'),(13,'Karate-do Club');

/*Table structure for table `student_account_table` */

DROP TABLE IF EXISTS `student_account_table`;

CREATE TABLE `student_account_table` (
  `accID` int(6) NOT NULL AUTO_INCREMENT,
  `StudentID` int(10) DEFAULT NULL,
  `StudentPassword` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `student_account_table` */

insert  into `student_account_table`(`accID`,`StudentID`,`StudentPassword`,`isDeleted`) values (7,35181,'7sanjuan',0);

/*Table structure for table `student_social_table` */

DROP TABLE IF EXISTS `student_social_table`;

CREATE TABLE `student_social_table` (
  `stdsocialID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  PRIMARY KEY (`stdsocialID`),
  KEY `FK_student_social_table` (`socialClubId`),
  KEY `FK_student_sociasl_table` (`stprofID`),
  CONSTRAINT `FK_student_social_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  CONSTRAINT `FK_student_sociasl_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `student_social_table` */

insert  into `student_social_table`(`stdsocialID`,`stprofID`,`socialClubId`) values (6,10,5);

/*Table structure for table `studentprofile_table` */

DROP TABLE IF EXISTS `studentprofile_table`;

CREATE TABLE `studentprofile_table` (
  `stprofID` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `CourseID` int(6) DEFAULT NULL,
  `accID` int(6) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contactnum` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `IMG` text,
  PRIMARY KEY (`stprofID`),
  KEY `FK_studentprofileS_table` (`accID`),
  KEY `FK_studentprofile_table` (`CourseID`),
  CONSTRAINT `FK_studentprofileS_table` FOREIGN KEY (`accID`) REFERENCES `student_account_table` (`accID`) ON DELETE SET NULL,
  CONSTRAINT `FK_studentprofile_table` FOREIGN KEY (`CourseID`) REFERENCES `course_table` (`CourseID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `studentprofile_table` */

insert  into `studentprofile_table`(`stprofID`,`fname`,`address`,`CourseID`,`accID`,`email`,`contactnum`,`birthday`,`gender`,`IMG`) values (10,'Bilgera Jude Jeremy Sajor','waling waling broadway st. New Isabela',1,7,'judasjeremy@yahoo.com','09667387018','1997-10-24','Male','img/6c0b0cc5b57a7b43b81d6d70610c73cdjudebilgera.jpg');

/*Table structure for table `admin_view` */

DROP TABLE IF EXISTS `admin_view`;

/*!50001 DROP VIEW IF EXISTS `admin_view` */;
/*!50001 DROP TABLE IF EXISTS `admin_view` */;

/*!50001 CREATE TABLE  `admin_view`(
 `adminId` int(6) ,
 `credentialId` int(6) ,
 `username` varchar(60) ,
 `password` varchar(60) 
)*/;

/*Table structure for table `course_view` */

DROP TABLE IF EXISTS `course_view`;

/*!50001 DROP VIEW IF EXISTS `course_view` */;
/*!50001 DROP TABLE IF EXISTS `course_view` */;

/*!50001 CREATE TABLE  `course_view`(
 `CourseID` int(6) ,
 `CourseName` varchar(60) ,
 `departmentClubId` int(6) ,
 `CounID` int(6) ,
 `departmentClubName` varchar(60) ,
 `CounName` varchar(60) 
)*/;

/*Table structure for table `departmental_club_view` */

DROP TABLE IF EXISTS `departmental_club_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;

/*!50001 CREATE TABLE  `departmental_club_view`(
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) 
)*/;

/*Table structure for table `list_student_view` */

DROP TABLE IF EXISTS `list_student_view`;

/*!50001 DROP VIEW IF EXISTS `list_student_view` */;
/*!50001 DROP TABLE IF EXISTS `list_student_view` */;

/*!50001 CREATE TABLE  `list_student_view`(
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `address` varchar(60) ,
 `CourseID` int(6) ,
 `accID` int(6) ,
 `email` varchar(60) ,
 `contactnum` varchar(60) ,
 `birthday` date ,
 `gender` varchar(60) ,
 `CourseName` varchar(60) ,
 `departmentClubId` int(6) ,
 `CounID` int(6) ,
 `StudentID` int(10) ,
 `StudentPassword` varchar(50) ,
 `isDeleted` tinyint(4) ,
 `CounName` varchar(60) ,
 `departmentClubName` varchar(60) 
)*/;

/*Table structure for table `social_club_view` */

DROP TABLE IF EXISTS `social_club_view`;

/*!50001 DROP VIEW IF EXISTS `social_club_view` */;
/*!50001 DROP TABLE IF EXISTS `social_club_view` */;

/*!50001 CREATE TABLE  `social_club_view`(
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) 
)*/;

/*Table structure for table `std_prof_view` */

DROP TABLE IF EXISTS `std_prof_view`;

/*!50001 DROP VIEW IF EXISTS `std_prof_view` */;
/*!50001 DROP TABLE IF EXISTS `std_prof_view` */;

/*!50001 CREATE TABLE  `std_prof_view`(
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `address` varchar(60) ,
 `CourseID` int(6) ,
 `accID` int(6) ,
 `StudentID` int(10) ,
 `StudentPassword` varchar(50) ,
 `isDeleted` tinyint(4) 
)*/;

/*Table structure for table `student_account_view` */

DROP TABLE IF EXISTS `student_account_view`;

/*!50001 DROP VIEW IF EXISTS `student_account_view` */;
/*!50001 DROP TABLE IF EXISTS `student_account_view` */;

/*!50001 CREATE TABLE  `student_account_view`(
 `accID` int(6) ,
 `StudentID` int(10) ,
 `StudentPassword` varchar(50) ,
 `isDeleted` tinyint(4) 
)*/;

/*Table structure for table `student_social_club_view` */

DROP TABLE IF EXISTS `student_social_club_view`;

/*!50001 DROP VIEW IF EXISTS `student_social_club_view` */;
/*!50001 DROP TABLE IF EXISTS `student_social_club_view` */;

/*!50001 CREATE TABLE  `student_social_club_view`(
 `stdsocialID` int(6) ,
 `stprofID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) 
)*/;

/*View structure for view admin_view */

/*!50001 DROP TABLE IF EXISTS `admin_view` */;
/*!50001 DROP VIEW IF EXISTS `admin_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view` AS select `admin_table`.`adminId` AS `adminId`,`admin_table`.`credentialId` AS `credentialId`,`credential_table`.`username` AS `username`,`credential_table`.`password` AS `password` from (`admin_table` join `credential_table` on((`admin_table`.`credentialId` = `credential_table`.`credentialId`))) */;

/*View structure for view course_view */

/*!50001 DROP TABLE IF EXISTS `course_view` */;
/*!50001 DROP VIEW IF EXISTS `course_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view` AS select `course_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`council_table`.`CounName` AS `CounName` from ((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) */;

/*View structure for view departmental_club_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_view` AS select `departmental_club_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from `departmental_club_table` */;

/*View structure for view list_student_view */

/*!50001 DROP TABLE IF EXISTS `list_student_view` */;
/*!50001 DROP VIEW IF EXISTS `list_student_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_student_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`studentprofile_table`.`email` AS `email`,`studentprofile_table`.`contactnum` AS `contactnum`,`studentprofile_table`.`birthday` AS `birthday`,`studentprofile_table`.`gender` AS `gender`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted`,`council_table`.`CounName` AS `CounName`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from ((((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `studentprofile_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) where (`student_account_table`.`isDeleted` = 0) */;

/*View structure for view social_club_view */

/*!50001 DROP TABLE IF EXISTS `social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_view` AS select `social_club_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from `social_club_table` */;

/*View structure for view std_prof_view */

/*!50001 DROP TABLE IF EXISTS `std_prof_view` */;
/*!50001 DROP VIEW IF EXISTS `std_prof_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `std_prof_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from (`studentprofile_table` join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) */;

/*View structure for view student_account_view */

/*!50001 DROP TABLE IF EXISTS `student_account_view` */;
/*!50001 DROP VIEW IF EXISTS `student_account_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_account_view` AS select `student_account_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from `student_account_table` */;

/*View structure for view student_social_club_view */

/*!50001 DROP TABLE IF EXISTS `student_social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `student_social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_social_club_view` AS select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from (`student_social_table` join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
