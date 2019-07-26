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

insert  into `calendar_table`(`calendarID`,`calendarIMGname`) values (1,'img/b9ff71daaf8c5db2304ec5adcb52e9d6calendar.png');

/*Table structure for table `council_announcement_isread_table` */

DROP TABLE IF EXISTS `council_announcement_isread_table`;

CREATE TABLE `council_announcement_isread_table` (
  `council_announcementReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`council_announcementReadID`),
  KEY `FK_council_announcement_isread_table` (`council_announcementID`),
  CONSTRAINT `FK_council_announcement_isread_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `council_announcement_isread_table` */

/*Table structure for table `council_announcement_table` */

DROP TABLE IF EXISTS `council_announcement_table`;

CREATE TABLE `council_announcement_table` (
  `council_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  PRIMARY KEY (`council_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `council_announcement_table` */

insert  into `council_announcement_table`(`council_announcementID`,`dateSubmit`,`toWhom`,`message`,`CounID`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`) values (4,'2019-03-26 12:08:16','testing','hi all grammarian',1,'No','2019-03-26 01:30:00','2019-03-26 02:30:00','testing',8),(5,'2019-03-27 12:51:12','all gwapo','meeting\r\nfrom the president',3,'No','2019-03-27 12:49:00','2019-03-27 12:49:00','meeting',7);

/*Table structure for table `council_officers_table` */

DROP TABLE IF EXISTS `council_officers_table`;

CREATE TABLE `council_officers_table` (
  `councilID` int(6) NOT NULL AUTO_INCREMENT,
  `CounID` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `schoolYR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`councilID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `council_officers_table` */

insert  into `council_officers_table`(`councilID`,`CounID`,`position`,`stprofID`,`schoolYR`) values (1,1,'Mayor',1,NULL),(2,1,'Vice Mayor',3,NULL),(6,3,'Business Manager',2,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `course_table` */

insert  into `course_table`(`CourseID`,`CourseName`,`departmentClubId`,`CounID`) values (1,'Bachelor of Science in Computer Science',1,1),(4,'Nursing',3,3),(6,'HRM',4,2),(7,'Bachelor of Science in Computer Engineering',2,1);

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
  `isApproved` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`csc_announcementReadID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_isread_table` */

/*Table structure for table `csc_announcement_table` */

DROP TABLE IF EXISTS `csc_announcement_table`;

CREATE TABLE `csc_announcement_table` (
  `csc_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  PRIMARY KEY (`csc_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_table` */

insert  into `csc_announcement_table`(`csc_announcementID`,`dateSubmit`,`toWhom`,`message`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`) values (1,'2019-04-04 06:59:38','testing','testing for the sake of you','No','2019-04-04 01:20:00','2019-04-04 02:20:00','testing',7);

/*Table structure for table `csc_members_table` */

DROP TABLE IF EXISTS `csc_members_table`;

CREATE TABLE `csc_members_table` (
  `cscmemID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `schoolYR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cscmemID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `csc_members_table` */

insert  into `csc_members_table`(`cscmemID`,`stprofID`,`position`,`schoolYR`) values (1,1,'Mayor',NULL),(2,3,'Secrectary',NULL),(3,2,'Vice Mayor',NULL),(4,12,'Mayor',NULL);

/*Table structure for table `department_announcement_isread_table` */

DROP TABLE IF EXISTS `department_announcement_isread_table`;

CREATE TABLE `department_announcement_isread_table` (
  `dpannouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  PRIMARY KEY (`dpannouncementIsReadID`),
  KEY `FK_department_announcement_isread_table` (`DannouncementID`),
  CONSTRAINT `FK_department_announcement_isread_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `department_announcement_isread_table` */

/*Table structure for table `department_announcement_table` */

DROP TABLE IF EXISTS `department_announcement_table`;

CREATE TABLE `department_announcement_table` (
  `DannouncementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `departmentClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text,
  PRIMARY KEY (`DannouncementID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `department_announcement_table` */

insert  into `department_announcement_table`(`DannouncementID`,`dateSubmit`,`toWhom`,`message`,`departmentClubId`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`,`annreason`) values (1,'2019-04-04 08:01:29','testing','tesing for the sake of you',1,'Reject','2019-04-04 01:30:00','2019-04-04 02:30:00','testing',8,'aw'),(2,'2019-07-26 07:28:25','test','awwww',1,'No','2019-07-26 02:30:00','2019-07-26 03:30:00','test',7,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_officersandmembers_table` */

insert  into `departmental_officersandmembers_table`(`departmentmemID`,`departmentClubId`,`position`,`stprofID`,`schoolYR`) values (1,1,'Mayor','1',NULL),(2,1,'Vice Mayor','',NULL),(3,1,'Treasurer','',NULL),(4,1,'Secrectary','',NULL),(5,3,'Mayor','',NULL),(6,3,'Vice Mayor','2',NULL),(7,3,'Treasurer','',NULL),(8,3,'Secrectary','',NULL),(9,2,'Mayor','',NULL),(10,2,'Vice Mayor','',NULL),(11,2,'Treasurer','3',NULL),(12,1,'Mayor','12',NULL),(13,1,'Vice Mayor','',NULL),(14,1,'Treasurer','',NULL),(15,1,'Secrectary','',NULL),(16,2,'Mayor','15',NULL),(17,2,'Vice Mayor','',NULL),(18,2,'Treasurer','',NULL),(19,2,'Secrectary','',NULL);

/*Table structure for table `dsa_announcement_isread_table` */

DROP TABLE IF EXISTS `dsa_announcement_isread_table`;

CREATE TABLE `dsa_announcement_isread_table` (
  `dsaAnnouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `dsaAnnouncementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`dsaAnnouncementIsReadID`),
  KEY `FK_dsa_announcement_isread_table` (`dsaAnnouncementID`),
  CONSTRAINT `FK_dsa_announcement_isread_table` FOREIGN KEY (`dsaAnnouncementID`) REFERENCES `dsa_announcement_table` (`dsaAnnouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dsa_announcement_isread_table` */

/*Table structure for table `dsa_announcement_table` */

DROP TABLE IF EXISTS `dsa_announcement_table`;

CREATE TABLE `dsa_announcement_table` (
  `dsaAnnouncementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `isApproved` varchar(3) DEFAULT 'Yes',
  `venueID` int(6) DEFAULT NULL,
  PRIMARY KEY (`dsaAnnouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dsa_announcement_table` */

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
  `socialClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`social_announcement_isread_table`),
  KEY `FK_social_announcement_isread_table` (`social_announcementID`),
  CONSTRAINT `FK_social_announcement_isread_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_isread_table` */

insert  into `social_announcement_isread_table`(`social_announcement_isread_table`,`stprofID`,`social_announcementID`,`socialClubId`,`isApproved`) values (1,1,1,8,'Yes'),(2,11,1,8,'Yes'),(3,12,1,8,'Yes'),(4,14,1,8,'Yes'),(5,16,1,8,'Yes');

/*Table structure for table `social_announcement_table` */

DROP TABLE IF EXISTS `social_announcement_table`;

CREATE TABLE `social_announcement_table` (
  `social_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `socialClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `venueID` varchar(6) DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`social_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_table` */

insert  into `social_announcement_table`(`social_announcementID`,`dateSubmit`,`toWhom`,`message`,`socialClubId`,`isApproved`,`timeStart`,`timeEnd`,`venueID`,`subjectann`) values (1,'2019-04-04 08:05:38','testing','testing for the sake of you',8,'Yes','2019-04-04 01:20:00','2019-04-04 02:20:00','8','testing'),(2,'2019-04-04 08:05:38','testing','aw',10,'Yes','2019-04-04 01:20:00','2019-04-04 02:20:00','8','tes');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `social_officerandmembers_table` */

insert  into `social_officerandmembers_table`(`socialoffID`,`socialClubId`,`position`,`stprofID`) values (1,8,'Mayor',1),(2,7,'Mayor',2),(3,7,'Secrectary',3),(4,10,'Mayor',16);

/*Table structure for table `student_account_table` */

DROP TABLE IF EXISTS `student_account_table`;

CREATE TABLE `student_account_table` (
  `accID` int(6) NOT NULL AUTO_INCREMENT,
  `StudentID` int(10) DEFAULT NULL,
  `StudentPassword` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `student_account_table` */

insert  into `student_account_table`(`accID`,`StudentID`,`StudentPassword`,`isDeleted`) values (16,1,'12',0),(17,2,'2',0),(18,3,'12',0),(19,12,'1',0),(23,4,'123',0);

/*Table structure for table `student_profile_table` */

DROP TABLE IF EXISTS `student_profile_table`;

CREATE TABLE `student_profile_table` (
  `studentprofID` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `CourseID` int(6) DEFAULT NULL,
  `accID` int(6) DEFAULT NULL,
  `contactnum` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `picture` text,
  PRIMARY KEY (`studentprofID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_profile_table` */

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `student_social_table` */

insert  into `student_social_table`(`stdsocialID`,`stprofID`,`socialClubId`) values (12,12,8),(14,14,8),(15,15,10),(16,16,8),(17,16,10);

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
  `mname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `religion` varchar(60) DEFAULT NULL,
  `tribe` varchar(60) DEFAULT NULL,
  `pandg` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`stprofID`),
  KEY `FK_studentprofileS_table` (`accID`),
  KEY `FK_studentprofile_table` (`CourseID`),
  CONSTRAINT `FK_studentprofileS_table` FOREIGN KEY (`accID`) REFERENCES `student_account_table` (`accID`) ON DELETE SET NULL,
  CONSTRAINT `FK_studentprofile_table` FOREIGN KEY (`CourseID`) REFERENCES `course_table` (`CourseID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `studentprofile_table` */

insert  into `studentprofile_table`(`stprofID`,`fname`,`address`,`CourseID`,`accID`,`email`,`contactnum`,`birthday`,`gender`,`IMG`,`mname`,`lname`,`religion`,`tribe`,`pandg`) values (12,'Jude Jeremy','new tacurong city',1,16,'1@gmail.com','1','0001-01-01','Male','img/80bb47059ac1f9cc4b1733be76d9c8268-1280x640.png','Sajor','Bilgera','Roman Catholic','Ilocanno','Papot style'),(14,'3','3',4,18,'3@yahoo.com','3','0003-03-31','Male','img/8782da00d36340883acbff43a128a6cbanime-clipart-thumbs-up-838919-1472937.png','3','3','3','3','3'),(15,'aw','aw',7,17,'aw@yahoo.com','aw','0002-02-22','Male','img/efc1b7e703b00979a8b9e019d67a0f81cute_anime_girl_render_by_hyori_sama-d8v4bsq.png','aw','aw','aw','aw','aw'),(16,'john','purok waling waling',7,19,'johnmark@yahoo.com','12','0012-12-12','','img/411e2f3c9bfd3c488c282d16b243f28666422510_2070729719887419_1279927832193007616_n.jpg','mark','rosal','Catholic','12','tisay rosal');

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

/*Table structure for table `venue_table` */

DROP TABLE IF EXISTS `venue_table`;

CREATE TABLE `venue_table` (
  `venueID` int(6) NOT NULL AUTO_INCREMENT,
  `venueName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `venue_table` */

insert  into `venue_table`(`venueID`,`venueName`) values (7,'s-205'),(8,'s-204');

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

/*Table structure for table `council_club_announcement_view` */

DROP TABLE IF EXISTS `council_club_announcement_view`;

/*!50001 DROP VIEW IF EXISTS `council_club_announcement_view` */;
/*!50001 DROP TABLE IF EXISTS `council_club_announcement_view` */;

/*!50001 CREATE TABLE  `council_club_announcement_view`(
 `council_announcementID` int(6) ,
 `dateSubmit` datetime ,
 `toWhom` varchar(100) ,
 `message` text ,
 `CounID` int(6) ,
 `CounName` varchar(60) ,
 `isApproved` varchar(10) ,
 `timeStart` datetime ,
 `timeEnd` datetime ,
 `subjectann` varchar(100) ,
 `venueID` int(6) ,
 `venueName` varchar(60) 
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

/*Table structure for table `csc_announcement_view` */

DROP TABLE IF EXISTS `csc_announcement_view`;

/*!50001 DROP VIEW IF EXISTS `csc_announcement_view` */;
/*!50001 DROP TABLE IF EXISTS `csc_announcement_view` */;

/*!50001 CREATE TABLE  `csc_announcement_view`(
 `csc_announcementID` int(6) ,
 `dateSubmit` datetime ,
 `toWhom` varchar(100) ,
 `message` text ,
 `isApproved` varchar(10) ,
 `timeStart` datetime ,
 `timeEnd` datetime ,
 `subjectann` varchar(100) ,
 `venueName` varchar(60) ,
 `venueID` int(6) 
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

/*Table structure for table `departmental_club_announcement_view` */

DROP TABLE IF EXISTS `departmental_club_announcement_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_club_announcement_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_club_announcement_view` */;

/*!50001 CREATE TABLE  `departmental_club_announcement_view`(
 `DannouncementID` int(6) ,
 `dateSubmit` datetime ,
 `toWhom` varchar(100) ,
 `message` text ,
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) ,
 `isApproved` varchar(10) ,
 `timeStart` datetime ,
 `timeEnd` datetime ,
 `subjectann` varchar(100) ,
 `venueID` int(6) ,
 `venueName` varchar(60) 
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

/*Table structure for table `dsa_announcement_view` */

DROP TABLE IF EXISTS `dsa_announcement_view`;

/*!50001 DROP VIEW IF EXISTS `dsa_announcement_view` */;
/*!50001 DROP TABLE IF EXISTS `dsa_announcement_view` */;

/*!50001 CREATE TABLE  `dsa_announcement_view`(
 `dsaAnnouncementID` int(6) ,
 `dateSubmit` datetime ,
 `toWhom` varchar(100) ,
 `message` text ,
 `timeStart` datetime ,
 `timeEnd` datetime ,
 `subjectann` varchar(100) ,
 `isApproved` varchar(3) ,
 `venueID` int(6) ,
 `venueName` varchar(60) 
)*/;

/*Table structure for table `list_social_club_view` */

DROP TABLE IF EXISTS `list_social_club_view`;

/*!50001 DROP VIEW IF EXISTS `list_social_club_view` */;
/*!50001 DROP TABLE IF EXISTS `list_social_club_view` */;

/*!50001 CREATE TABLE  `list_social_club_view`(
 `stdsocialID` int(6) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `socialClubId` int(6) 
)*/;

/*Table structure for table `list_student_view` */

DROP TABLE IF EXISTS `list_student_view`;

/*!50001 DROP VIEW IF EXISTS `list_student_view` */;
/*!50001 DROP TABLE IF EXISTS `list_student_view` */;

/*!50001 CREATE TABLE  `list_student_view`(
 `stprofID` int(6) ,
 `lname` varchar(60) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `address` varchar(60) ,
 `CourseID` int(6) ,
 `accID` int(6) ,
 `email` varchar(60) ,
 `pandg` varchar(60) ,
 `contactnum` varchar(60) ,
 `religion` varchar(60) ,
 `tribe` varchar(60) ,
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

/*Table structure for table `social_club_announcement_view` */

DROP TABLE IF EXISTS `social_club_announcement_view`;

/*!50001 DROP VIEW IF EXISTS `social_club_announcement_view` */;
/*!50001 DROP TABLE IF EXISTS `social_club_announcement_view` */;

/*!50001 CREATE TABLE  `social_club_announcement_view`(
 `social_announcementID` int(6) ,
 `dateSubmit` datetime ,
 `toWhom` varchar(100) ,
 `message` text ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `isApproved` varchar(10) ,
 `timeStart` datetime ,
 `timeEnd` datetime ,
 `subjectann` varchar(100) ,
 `venueID` varchar(6) ,
 `venueName` varchar(60) 
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
 `position` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `address` varchar(60) 
)*/;

/*Table structure for table `std_prof_view` */

DROP TABLE IF EXISTS `std_prof_view`;

/*!50001 DROP VIEW IF EXISTS `std_prof_view` */;
/*!50001 DROP TABLE IF EXISTS `std_prof_view` */;

/*!50001 CREATE TABLE  `std_prof_view`(
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
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

/*View structure for view council_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `council_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `council_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_club_announcement_view` AS select `council_announcement_table`.`council_announcementID` AS `council_announcementID`,`council_announcement_table`.`dateSubmit` AS `dateSubmit`,`council_announcement_table`.`toWhom` AS `toWhom`,`council_announcement_table`.`message` AS `message`,`council_announcement_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_announcement_table`.`isApproved` AS `isApproved`,`council_announcement_table`.`timeStart` AS `timeStart`,`council_announcement_table`.`timeEnd` AS `timeEnd`,`council_announcement_table`.`subjectann` AS `subjectann`,`council_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from ((`council_announcement_table` join `venue_table` on((`council_announcement_table`.`venueID` = `venue_table`.`venueID`))) join `council_table` on((`council_announcement_table`.`CounID` = `council_table`.`CounID`))) */;

/*View structure for view council_view */

/*!50001 DROP TABLE IF EXISTS `council_view` */;
/*!50001 DROP VIEW IF EXISTS `council_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_view` AS select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_officers_table`.`position` AS `position`,`council_officers_table`.`stprofID` AS `stprofID`,`council_table`.`CounName` AS `CounName`,`studentprofile_table`.`fname` AS `fname` from ((`council_officers_table` join `council_table` on((`council_officers_table`.`CounID` = `council_table`.`CounID`))) join `studentprofile_table` on((`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view course_view */

/*!50001 DROP TABLE IF EXISTS `course_view` */;
/*!50001 DROP VIEW IF EXISTS `course_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view` AS select `course_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`council_table`.`CounName` AS `CounName` from ((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) */;

/*View structure for view csc_announcement_view */

/*!50001 DROP TABLE IF EXISTS `csc_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_announcement_view` AS select `csc_announcement_table`.`csc_announcementID` AS `csc_announcementID`,`csc_announcement_table`.`dateSubmit` AS `dateSubmit`,`csc_announcement_table`.`toWhom` AS `toWhom`,`csc_announcement_table`.`message` AS `message`,`csc_announcement_table`.`isApproved` AS `isApproved`,`csc_announcement_table`.`timeStart` AS `timeStart`,`csc_announcement_table`.`timeEnd` AS `timeEnd`,`csc_announcement_table`.`subjectann` AS `subjectann`,`venue_table`.`venueName` AS `venueName`,`venue_table`.`venueID` AS `venueID` from (`csc_announcement_table` join `venue_table` on((`csc_announcement_table`.`venueID` = `venue_table`.`venueID`))) */;

/*View structure for view csc_mem_view */

/*!50001 DROP TABLE IF EXISTS `csc_mem_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_mem_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_mem_view` AS select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`position` AS `position`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`stprofID` AS `stprofID` from (`csc_members_table` join `studentprofile_table` on((`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view departmental_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_announcement_view` AS select `department_announcement_table`.`DannouncementID` AS `DannouncementID`,`department_announcement_table`.`dateSubmit` AS `dateSubmit`,`department_announcement_table`.`toWhom` AS `toWhom`,`department_announcement_table`.`message` AS `message`,`department_announcement_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`department_announcement_table`.`isApproved` AS `isApproved`,`department_announcement_table`.`timeStart` AS `timeStart`,`department_announcement_table`.`timeEnd` AS `timeEnd`,`department_announcement_table`.`subjectann` AS `subjectann`,`department_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from ((`department_announcement_table` join `venue_table` on((`department_announcement_table`.`venueID` = `venue_table`.`venueID`))) join `departmental_club_table` on((`department_announcement_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) */;

/*View structure for view departmental_club_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_view` AS select `departmental_club_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from `departmental_club_table` */;

/*View structure for view departmental_officersandmembers_view */

/*!50001 DROP TABLE IF EXISTS `departmental_officersandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_officersandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_officersandmembers_view` AS select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_officersandmembers_table`.`position` AS `position`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`departmental_officersandmembers_table`.`schoolYR` AS `schoolYR`,`studentprofile_table`.`fname` AS `fname` from (`departmental_officersandmembers_table` join `studentprofile_table` on((`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view dsa_announcement_view */

/*!50001 DROP TABLE IF EXISTS `dsa_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `dsa_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsa_announcement_view` AS select `dsa_announcement_table`.`dsaAnnouncementID` AS `dsaAnnouncementID`,`dsa_announcement_table`.`dateSubmit` AS `dateSubmit`,`dsa_announcement_table`.`toWhom` AS `toWhom`,`dsa_announcement_table`.`message` AS `message`,`dsa_announcement_table`.`timeStart` AS `timeStart`,`dsa_announcement_table`.`timeEnd` AS `timeEnd`,`dsa_announcement_table`.`subjectann` AS `subjectann`,`dsa_announcement_table`.`isApproved` AS `isApproved`,`dsa_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from (`dsa_announcement_table` join `venue_table` on((`dsa_announcement_table`.`venueID` = `venue_table`.`venueID`))) */;

/*View structure for view list_social_club_view */

/*!50001 DROP TABLE IF EXISTS `list_social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `list_social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_social_club_view` AS select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`student_social_table`.`socialClubId` AS `socialClubId` from (`student_social_table` join `studentprofile_table` on((`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view list_student_view */

/*!50001 DROP TABLE IF EXISTS `list_student_view` */;
/*!50001 DROP VIEW IF EXISTS `list_student_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_student_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`studentprofile_table`.`email` AS `email`,`studentprofile_table`.`pandg` AS `pandg`,`studentprofile_table`.`contactnum` AS `contactnum`,`studentprofile_table`.`religion` AS `religion`,`studentprofile_table`.`tribe` AS `tribe`,`studentprofile_table`.`birthday` AS `birthday`,`studentprofile_table`.`gender` AS `gender`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted`,`council_table`.`CounName` AS `CounName`,`departmental_club_table`.`departmentClubName` AS `departmentClubName` from ((((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `studentprofile_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) where (`student_account_table`.`isDeleted` = 0) */;

/*View structure for view social_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `social_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_announcement_view` AS select `social_announcement_table`.`social_announcementID` AS `social_announcementID`,`social_announcement_table`.`dateSubmit` AS `dateSubmit`,`social_announcement_table`.`toWhom` AS `toWhom`,`social_announcement_table`.`message` AS `message`,`social_announcement_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_announcement_table`.`isApproved` AS `isApproved`,`social_announcement_table`.`timeStart` AS `timeStart`,`social_announcement_table`.`timeEnd` AS `timeEnd`,`social_announcement_table`.`subjectann` AS `subjectann`,`social_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from ((`student_social_table` join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) join (`venue_table` join `social_announcement_table` on((`venue_table`.`venueID` = `social_announcement_table`.`venueID`)))) */;

/*View structure for view social_club_view */

/*!50001 DROP TABLE IF EXISTS `social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_view` AS select `social_club_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from `social_club_table` */;

/*View structure for view social_officerandmembers_view */

/*!50001 DROP TABLE IF EXISTS `social_officerandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `social_officerandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_officerandmembers_view` AS select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_officerandmembers_table`.`position` AS `position`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`address` AS `address` from (`social_officerandmembers_table` join `studentprofile_table` on((`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) */;

/*View structure for view std_prof_view */

/*!50001 DROP TABLE IF EXISTS `std_prof_view` */;
/*!50001 DROP VIEW IF EXISTS `std_prof_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `std_prof_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from (`studentprofile_table` join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) */;

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
