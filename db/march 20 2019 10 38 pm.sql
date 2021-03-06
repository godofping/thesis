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

/*Table structure for table `council_announcement_isread_table` */

DROP TABLE IF EXISTS `council_announcement_isread_table`;

CREATE TABLE `council_announcement_isread_table` (
  `council_announcementReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`council_announcementReadID`),
  KEY `FK_council_announcement_isread_table` (`council_announcementID`),
  CONSTRAINT `FK_council_announcement_isread_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `council_announcement_isread_table` */

/*Table structure for table `council_announcement_table` */

DROP TABLE IF EXISTS `council_announcement_table`;

CREATE TABLE `council_announcement_table` (
  `council_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateAnnounced` varchar(20) DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`council_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `council_announcement_table` */

/*Table structure for table `council_officers_table` */

DROP TABLE IF EXISTS `council_officers_table`;

CREATE TABLE `council_officers_table` (
  `councilID` int(6) NOT NULL AUTO_INCREMENT,
  `CounID` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `schoolYR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`councilID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `council_officers_table` */

insert  into `council_officers_table`(`councilID`,`CounID`,`position`,`stprofID`,`schoolYR`) values (1,1,'Mayor',12,NULL);

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

insert  into `course_table`(`CourseID`,`CourseName`,`departmentClubId`,`CounID`) values (1,'Bachelor of Science in Computer Science',1,1),(4,'Nursing',3,3),(6,'HRM',4,2);

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

/*Table structure for table `csc_announcement_isread_table` */

DROP TABLE IF EXISTS `csc_announcement_isread_table`;

CREATE TABLE `csc_announcement_isread_table` (
  `csc_announcementReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`csc_announcementReadID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_isread_table` */

insert  into `csc_announcement_isread_table`(`csc_announcementReadID`,`stprofID`,`csc_announcementID`) values (2,10,6);

/*Table structure for table `csc_announcement_table` */

DROP TABLE IF EXISTS `csc_announcement_table`;

CREATE TABLE `csc_announcement_table` (
  `csc_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateAnnounced` varchar(20) DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `isApproved` varchar(10) DEFAULT 'No',
  PRIMARY KEY (`csc_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_table` */

insert  into `csc_announcement_table`(`csc_announcementID`,`dateAnnounced`,`toWhom`,`message`,`isApproved`) values (4,'2019-03-21','hi','hi','No'),(6,'2019-03-21','dd','asaa','Yes');

/*Table structure for table `csc_members_table` */

DROP TABLE IF EXISTS `csc_members_table`;

CREATE TABLE `csc_members_table` (
  `cscmemID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `schoolYR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cscmemID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `csc_members_table` */

insert  into `csc_members_table`(`cscmemID`,`stprofID`,`position`,`schoolYR`) values (1,10,'Mayor',NULL),(2,11,'Vice Mayor',NULL);

/*Table structure for table `department_announcement_isread_table` */

DROP TABLE IF EXISTS `department_announcement_isread_table`;

CREATE TABLE `department_announcement_isread_table` (
  `dpannouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`dpannouncementIsReadID`),
  KEY `FK_department_announcement_isread_table` (`DannouncementID`),
  CONSTRAINT `FK_department_announcement_isread_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `department_announcement_isread_table` */

/*Table structure for table `department_announcement_table` */

DROP TABLE IF EXISTS `department_announcement_table`;

CREATE TABLE `department_announcement_table` (
  `DannouncementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateAnnounced` varchar(20) DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`DannouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `department_announcement_table` */

/*Table structure for table `departmental_club_table` */

DROP TABLE IF EXISTS `departmental_club_table`;

CREATE TABLE `departmental_club_table` (
  `departmentClubId` int(6) NOT NULL AUTO_INCREMENT,
  `departmentClubName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`departmentClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_club_table` */

insert  into `departmental_club_table`(`departmentClubId`,`departmentClubName`) values (1,'Philippine Society of Information Technology Students'),(2,'Institute of Computer Engineers of the Philippines S.E'),(3,'Philippine Nursing Student Association'),(4,'Junior Hoteliers and Restaurateurs Association'),(5,' Mathematics Club ');

/*Table structure for table `departmental_officersandmembers_table` */

DROP TABLE IF EXISTS `departmental_officersandmembers_table`;

CREATE TABLE `departmental_officersandmembers_table` (
  `departmentmemID` int(6) NOT NULL AUTO_INCREMENT,
  `departmentClubId` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `stprofID` varchar(60) DEFAULT NULL,
  `schoolYR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`departmentmemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `departmental_officersandmembers_table` */

/*Table structure for table `dsa_announcement_isread_table` */

DROP TABLE IF EXISTS `dsa_announcement_isread_table`;

CREATE TABLE `dsa_announcement_isread_table` (
  `dsaAnnouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `dsaAnnouncementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`dsaAnnouncementIsReadID`),
  KEY `FK_dsa_announcement_isread_table` (`dsaAnnouncementID`),
  CONSTRAINT `FK_dsa_announcement_isread_table` FOREIGN KEY (`dsaAnnouncementID`) REFERENCES `dsa_announcement_table` (`dsaAnnouncementID`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;

/*Data for the table `dsa_announcement_isread_table` */

insert  into `dsa_announcement_isread_table`(`dsaAnnouncementIsReadID`,`stprofID`,`dsaAnnouncementID`) values (76,10,1),(77,10,2),(78,10,3),(79,10,5),(80,10,6),(81,10,7),(82,10,8),(83,10,9),(84,10,10),(85,10,11),(86,10,12),(87,10,13),(88,10,14),(89,10,15),(90,10,16),(91,10,17),(92,10,18),(93,10,19),(94,10,20),(95,10,21),(96,11,1),(97,11,2),(98,11,3),(99,11,5),(100,11,6),(101,11,7),(102,11,8),(103,11,9),(104,11,10),(105,11,11),(106,11,12),(107,11,13),(108,11,14),(109,11,15),(110,11,16),(111,11,17),(112,11,18),(113,11,19),(114,11,20),(115,11,21),(116,11,22),(117,11,23),(118,12,1),(119,12,2),(120,12,3),(121,12,5),(122,12,6),(123,12,7),(124,12,8),(125,12,9),(126,12,10),(127,12,11),(128,12,12),(129,12,13),(130,12,14),(131,12,15),(132,12,16),(133,12,17),(134,12,18),(135,12,19),(136,12,20),(137,12,21),(138,12,22),(139,12,23),(140,14,1),(141,14,2),(142,14,3),(143,14,5),(144,14,6),(145,14,7),(146,14,8),(147,14,9),(148,14,10),(149,14,11),(150,14,12),(151,14,13),(152,14,14),(153,14,15),(154,14,16),(155,14,17),(156,14,18),(157,14,19),(158,14,20),(159,14,21),(160,14,22),(161,14,23),(162,10,22),(163,10,23),(164,12,24),(165,14,24),(166,10,24),(167,10,1),(168,10,1),(169,10,1),(170,10,1),(171,10,1),(172,10,1);

/*Table structure for table `dsa_announcement_table` */

DROP TABLE IF EXISTS `dsa_announcement_table`;

CREATE TABLE `dsa_announcement_table` (
  `dsaAnnouncementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateAnnounced` varchar(20) DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`dsaAnnouncementID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `dsa_announcement_table` */

insert  into `dsa_announcement_table`(`dsaAnnouncementID`,`dateAnnounced`,`toWhom`,`message`) values (1,'2019-03-19','aww','hey'),(2,'2019-03-18','asdad','asdadaaaa'),(3,'2019-03-19','to all collge student','hi there'),(5,'2019-03-20','to all ngongo','hi there'),(6,'','hello to all college','hi '),(7,'2019-03-20','hi','hi'),(8,'2019-03-05','w3w','w33'),(9,'','hellow','hi there salik'),(10,'2019-03-20','hi ','awa'),(11,'2019-03-21','hi','mam kath'),(12,'2019-03-21','hi','ganda mo mam'),(13,'2019-03-21','hello','there'),(14,'2019-03-04','123','321213'),(15,'2019-03-21','A','A'),(16,'2019-03-21','h','h'),(17,'2019-03-21','as','as'),(18,'2019-03-12','dasasdasd','asd'),(19,'2019-03-21','fd','df'),(20,'2019-03-21','a','ffff'),(21,'2019-03-20','a','vv'),(22,'2019-03-21','hello','there'),(23,'2019-03-21','hi','aaaa'),(24,'2019-03-21','hi','awhah');

/*Table structure for table `notif` */

DROP TABLE IF EXISTS `notif`;

CREATE TABLE `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_msg` text,
  `notif_time` datetime DEFAULT NULL,
  `notif_repeat` int(11) DEFAULT '1' COMMENT 'schedule in minute',
  `notif_loop` int(11) DEFAULT '1',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `notif` */

insert  into `notif`(`id`,`notif_msg`,`notif_time`,`notif_repeat`,`notif_loop`,`publish_date`,`username`) values (1,'hello, this is sample web push notification, you will redirect to seegatesite.com after click this notify','2017-02-08 08:48:54',1,0,'2017-02-08 08:47:54','ronaldo'),(2,'hello, this is sample web push notification, you will redirect to seegatesite.com after click this notify','2017-02-08 09:17:11',1,2,'2017-02-08 09:16:11','donald');

/*Table structure for table `social_announcement_isread_table` */

DROP TABLE IF EXISTS `social_announcement_isread_table`;

CREATE TABLE `social_announcement_isread_table` (
  `social_announcement_isread_table` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`social_announcement_isread_table`),
  KEY `FK_social_announcement_isread_table` (`social_announcementID`),
  CONSTRAINT `FK_social_announcement_isread_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_isread_table` */

/*Table structure for table `social_announcement_table` */

DROP TABLE IF EXISTS `social_announcement_table`;

CREATE TABLE `social_announcement_table` (
  `social_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateAnnounced` varchar(20) DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`social_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_table` */

/*Table structure for table `social_club_table` */

DROP TABLE IF EXISTS `social_club_table`;

CREATE TABLE `social_club_table` (
  `socialClubId` int(6) NOT NULL AUTO_INCREMENT,
  `socialClubName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`socialClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `social_club_table` */

insert  into `social_club_table`(`socialClubId`,`socialClubName`) values (4,'Youth Servant Leaders Clubs'),(5,'Kristiyanong Kabataan para sa Bayan'),(6,'Catechetical Guild'),(7,'Muslim Students Organization'),(8,'Association of Student Personnel Assistants'),(9,'Peer Counselors Club'),(10,'Cantores et Sesyonistas'),(11,'Junior Ecologist Movement'),(12,'Sports Club'),(13,'Karate-do Club');

/*Table structure for table `social_officerandmembers_table` */

DROP TABLE IF EXISTS `social_officerandmembers_table`;

CREATE TABLE `social_officerandmembers_table` (
  `socialoffID` int(6) NOT NULL AUTO_INCREMENT,
  `socialClubId` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  PRIMARY KEY (`socialoffID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_officerandmembers_table` */

/*Table structure for table `student_account_table` */

DROP TABLE IF EXISTS `student_account_table`;

CREATE TABLE `student_account_table` (
  `accID` int(6) NOT NULL AUTO_INCREMENT,
  `StudentID` int(10) DEFAULT NULL,
  `StudentPassword` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `student_account_table` */

insert  into `student_account_table`(`accID`,`StudentID`,`StudentPassword`,`isDeleted`) values (7,35181,'7sanjuan',0),(8,48019,'hey',0),(9,47889,'12345',0),(10,47809,'12345',0),(11,524,'hey',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `student_social_table` */

insert  into `student_social_table`(`stdsocialID`,`stprofID`,`socialClubId`) values (6,10,5),(7,11,7),(8,12,11),(9,13,4),(10,13,11),(11,14,8),(12,14,10),(13,14,6);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `studentprofile_table` */

insert  into `studentprofile_table`(`stprofID`,`fname`,`address`,`CourseID`,`accID`,`email`,`contactnum`,`birthday`,`gender`,`IMG`) values (10,'Bilgera Jude Jeremy Sajor','waling waling broadway st. New Isabela',1,7,'judasjeremy@yahoo.com','09667387018','1997-10-24','Male','img/6c0b0cc5b57a7b43b81d6d70610c73cdjudebilgera.jpg'),(11,'Salik Hyder Usman','malvar st. ',1,8,'hydersalik8@gmail.com','09995077705','1998-04-01','Male','img/66988e94270d421e038dc6168edca10f1493831483_1440647541027.gif'),(12,'Bedia Reydick Evander A.','waawa',1,9,'wawa@yahoo.com','1234567891011','1995-01-21','Male','img/91cfd02876e12c0a986cc1a6e060286d4331556d54b53bf60c00eeecb6d4f39297d7d084_full.jpg'),(13,'Sinoy Christian Jed L.','water dtr.',1,10,'sinoyjed@yahoo.com','099999999','1996-01-05','Male','img/4394650af6844ff3d668781a379f794b37710051_907582949433595_5763966224287399936_n.jpg'),(14,'Landero Alvin Rey I.','2nd block tacea village New Isabela tac. city',1,11,'landeroraril@gmail.com','0975198906','1995-02-28','Male','img/a3760b3cd7ff8adea92bf429d83aa24619989216_1935955916682280_7214936610542869307_n.jpg');

/*Table structure for table `testingtbl` */

DROP TABLE IF EXISTS `testingtbl`;

CREATE TABLE `testingtbl` (
  `testID` int(5) NOT NULL AUTO_INCREMENT,
  `name` int(5) DEFAULT NULL,
  `isSend` int(5) DEFAULT '0',
  PRIMARY KEY (`testID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `testingtbl` */

insert  into `testingtbl`(`testID`,`name`,`isSend`) values (10,1,1),(11,22,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`) values ('admin','123'),('donald','123'),('ronaldo','123'),('messi','123');

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

/*Table structure for table `council_view` */

DROP TABLE IF EXISTS `council_view`;

/*!50001 DROP VIEW IF EXISTS `council_view` */;
/*!50001 DROP TABLE IF EXISTS `council_view` */;

/*!50001 CREATE TABLE  `council_view`(
 `councilID` int(6) ,
 `CounID` int(6) ,
 `position` varchar(60) ,
 `stprofID` int(6) ,
 `CounName` varchar(60) ,
 `fname` varchar(60) 
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

/*Table structure for table `csc_mem_view` */

DROP TABLE IF EXISTS `csc_mem_view`;

/*!50001 DROP VIEW IF EXISTS `csc_mem_view` */;
/*!50001 DROP TABLE IF EXISTS `csc_mem_view` */;

/*!50001 CREATE TABLE  `csc_mem_view`(
 `cscmemID` int(6) ,
 `position` varchar(60) ,
 `fname` varchar(60) ,
 `stprofID` int(6) 
)*/;

/*Table structure for table `departmental_club_view` */

DROP TABLE IF EXISTS `departmental_club_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;

/*!50001 CREATE TABLE  `departmental_club_view`(
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) 
)*/;

/*Table structure for table `departmental_officersandmembers_view` */

DROP TABLE IF EXISTS `departmental_officersandmembers_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_officersandmembers_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_officersandmembers_view` */;

/*!50001 CREATE TABLE  `departmental_officersandmembers_view`(
 `departmentmemID` int(6) ,
 `departmentClubId` int(6) ,
 `position` varchar(60) ,
 `stprofID` varchar(60) ,
 `schoolYR` varchar(20) ,
 `fname` varchar(60) 
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

/*Table structure for table `social_officerandmembers_view` */

DROP TABLE IF EXISTS `social_officerandmembers_view`;

/*!50001 DROP VIEW IF EXISTS `social_officerandmembers_view` */;
/*!50001 DROP TABLE IF EXISTS `social_officerandmembers_view` */;

/*!50001 CREATE TABLE  `social_officerandmembers_view`(
 `socialoffID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `position` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) 
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

/*View structure for view council_view */

/*!50001 DROP TABLE IF EXISTS `council_view` */;
/*!50001 DROP VIEW IF EXISTS `council_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_view` AS select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_officers_table`.`position` AS `position`,`council_officers_table`.`stprofID` AS `stprofID`,`council_table`.`CounName` AS `CounName`,`studentprofile_table`.`fname` AS `fname` from ((`council_officers_table` join `council_table` on((`council_officers_table`.`CounID` = `council_table`.`CounID`))) join `studentprofile_table` on((`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view course_view */

/*!50001 DROP TABLE IF EXISTS `course_view` */;
/*!50001 DROP VIEW IF EXISTS `course_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view` AS select `course_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`council_table`.`CounName` AS `CounName` from ((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) */;

/*View structure for view csc_mem_view */

/*!50001 DROP TABLE IF EXISTS `csc_mem_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_mem_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_mem_view` AS select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`position` AS `position`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`stprofID` AS `stprofID` from (`csc_members_table` join `studentprofile_table` on((`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view departmental_club_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_view` AS select `departmental_club_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from `departmental_club_table` */;

/*View structure for view departmental_officersandmembers_view */

/*!50001 DROP TABLE IF EXISTS `departmental_officersandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_officersandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_officersandmembers_view` AS select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_officersandmembers_table`.`position` AS `position`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`departmental_officersandmembers_table`.`schoolYR` AS `schoolYR`,`studentprofile_table`.`fname` AS `fname` from (`departmental_officersandmembers_table` join `studentprofile_table` on((`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view list_student_view */

/*!50001 DROP TABLE IF EXISTS `list_student_view` */;
/*!50001 DROP VIEW IF EXISTS `list_student_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_student_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`studentprofile_table`.`email` AS `email`,`studentprofile_table`.`contactnum` AS `contactnum`,`studentprofile_table`.`birthday` AS `birthday`,`studentprofile_table`.`gender` AS `gender`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted`,`council_table`.`CounName` AS `CounName`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from ((((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `studentprofile_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) where (`student_account_table`.`isDeleted` = 0) */;

/*View structure for view social_club_view */

/*!50001 DROP TABLE IF EXISTS `social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_view` AS select `social_club_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from `social_club_table` */;

/*View structure for view social_officerandmembers_view */

/*!50001 DROP TABLE IF EXISTS `social_officerandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `social_officerandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_officerandmembers_view` AS select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_officerandmembers_table`.`position` AS `position`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname` from ((`social_officerandmembers_table` join `social_club_table`) join `studentprofile_table`) */;

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
