/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.4.11-MariaDB : Database - project_db
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

/*Table structure for table `admin_account_table` */

DROP TABLE IF EXISTS `admin_account_table`;

CREATE TABLE `admin_account_table` (
  `adminID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin_account_table` */

insert  into `admin_account_table`(`adminID`,`username`,`password`) values (3,'admin','admin'),(4,'admins','ss'),(5,'awawa//\'\'','123');

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

/*Table structure for table `admincouncil_announcement_isread_table` */

DROP TABLE IF EXISTS `admincouncil_announcement_isread_table`;

CREATE TABLE `admincouncil_announcement_isread_table` (
  `admincouncilReadID` int(6) NOT NULL AUTO_INCREMENT,
  `adminID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`admincouncilReadID`),
  KEY `FK_admincouncil_announcement_isread_table` (`council_announcementID`),
  CONSTRAINT `FK_admincouncil_announcement_isread_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admincouncil_announcement_isread_table` */

insert  into `admincouncil_announcement_isread_table`(`admincouncilReadID`,`adminID`,`council_announcementID`) values (1,3,2);

/*Table structure for table `admincsc_announcement_isread_table` */

DROP TABLE IF EXISTS `admincsc_announcement_isread_table`;

CREATE TABLE `admincsc_announcement_isread_table` (
  `admincsc_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `adminID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`admincsc_announcementID`),
  KEY `FK_admincsc_announcement_isread_table` (`csc_announcementID`),
  CONSTRAINT `FK_admincsc_announcement_isread_table` FOREIGN KEY (`csc_announcementID`) REFERENCES `csc_announcement_table` (`csc_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `admincsc_announcement_isread_table` */

insert  into `admincsc_announcement_isread_table`(`admincsc_announcementID`,`adminID`,`csc_announcementID`) values (8,3,9);

/*Table structure for table `admindepartment_announcement_isread_table` */

DROP TABLE IF EXISTS `admindepartment_announcement_isread_table`;

CREATE TABLE `admindepartment_announcement_isread_table` (
  `admindepartmentReadId` int(6) NOT NULL AUTO_INCREMENT,
  `adminID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`admindepartmentReadId`),
  KEY `FK_admindepartment_announcement_isread_table` (`DannouncementID`),
  CONSTRAINT `FK_admindepartment_announcement_isread_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `admindepartment_announcement_isread_table` */

insert  into `admindepartment_announcement_isread_table`(`admindepartmentReadId`,`adminID`,`DannouncementID`) values (2,3,5),(3,3,6),(4,3,7);

/*Table structure for table `adminsocial_announcement_isread_table` */

DROP TABLE IF EXISTS `adminsocial_announcement_isread_table`;

CREATE TABLE `adminsocial_announcement_isread_table` (
  `adminsocial_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `adminID` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL,
  PRIMARY KEY (`adminsocial_announcementID`),
  KEY `FK_adminsocial_announcement_isread_table` (`social_announcementID`),
  CONSTRAINT `FK_adminsocial_announcement_isread_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adminsocial_announcement_isread_table` */

/*Table structure for table `buttontoggle_table` */

DROP TABLE IF EXISTS `buttontoggle_table`;

CREATE TABLE `buttontoggle_table` (
  `showID` int(6) NOT NULL AUTO_INCREMENT,
  `toggleonoroff` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`showID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `buttontoggle_table` */

insert  into `buttontoggle_table`(`showID`,`toggleonoroff`) values (1,'ON');

/*Table structure for table `calendar_table` */

DROP TABLE IF EXISTS `calendar_table`;

CREATE TABLE `calendar_table` (
  `calendarID` int(6) NOT NULL AUTO_INCREMENT,
  `calendarIMGname` text DEFAULT NULL,
  PRIMARY KEY (`calendarID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_table` */

insert  into `calendar_table`(`calendarID`,`calendarIMGname`) values (1,'img/b9ff71daaf8c5db2304ec5adcb52e9d6calendar.png');

/*Table structure for table `club_position_table` */

DROP TABLE IF EXISTS `club_position_table`;

CREATE TABLE `club_position_table` (
  `positionID` int(11) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `club_position_table` */

insert  into `club_position_table`(`positionID`,`positionName`) values (1,'President'),(2,'Vice President'),(3,'Secretary'),(4,'Asst.Secretary'),(5,'Treasurer'),(6,'Auditor'),(7,'Business Manager'),(8,'P.R.O'),(9,'P.C.O'),(10,'1st Year REP'),(11,'2nd Year REP'),(12,'3rd Year REP'),(13,'4th Year REP'),(14,'5th year REP'),(15,'Mayor'),(16,'Vice Mayor'),(17,'Historian'),(18,'V-PRES.for Academics'),(19,'V-PRES.for Non-Acad'),(20,'General Secretary'),(21,'V-PRES.for Finance'),(22,'V-PRES.for Membership'),(23,'V-PRES.for Communication'),(24,'V-PRES.for Graphics & Pub'),(25,'Regional Representative'),(26,'Chairperson'),(27,'Vice Chairperson for Church involvement'),(28,'Vice Chairperson for Formation'),(29,'Vice Chairperson for Social Apostolate'),(30,'Executive Assistant'),(31,'Finance Officer'),(32,'Com.Officer'),(33,'Operations Manager'),(34,'Ambassador'),(35,'Editor in Chief'),(36,'Associate Editor'),(37,'Managing Editor'),(38,'Cartoonist'),(39,'Lay-out Artist');

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
  `message` text DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text DEFAULT NULL,
  PRIMARY KEY (`council_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `council_announcement_table` */

insert  into `council_announcement_table`(`council_announcementID`,`dateSubmit`,`toWhom`,`message`,`CounID`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`,`annreason`) values (2,'2020-02-28 06:31:31','test3','test3',3,'Yes','2020-02-29 10:30:00','2020-02-29 11:30:00','test3',8,NULL);

/*Table structure for table `council_officers_table` */

DROP TABLE IF EXISTS `council_officers_table`;

CREATE TABLE `council_officers_table` (
  `councilID` int(6) NOT NULL AUTO_INCREMENT,
  `CounID` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `positionIDcouncil` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`councilID`),
  KEY `FK_council_officers_table` (`CounID`),
  KEY `FK_council_officers_tables` (`stprofID`),
  KEY `FK_council_officers_tablesd` (`positionIDcouncil`),
  CONSTRAINT `FK_council_officers_table` FOREIGN KEY (`CounID`) REFERENCES `council_table` (`CounID`),
  CONSTRAINT `FK_council_officers_tables` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  CONSTRAINT `FK_council_officers_tablesd` FOREIGN KEY (`positionIDcouncil`) REFERENCES `council_position_table` (`positionIDcouncil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `council_officers_table` */

insert  into `council_officers_table`(`councilID`,`CounID`,`stprofID`,`positionIDcouncil`,`perpost`) values (1,3,3,1,'Yes');

/*Table structure for table `council_position_table` */

DROP TABLE IF EXISTS `council_position_table`;

CREATE TABLE `council_position_table` (
  `positionIDcouncil` int(6) NOT NULL AUTO_INCREMENT,
  `positionNamecouncil` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`positionIDcouncil`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `council_position_table` */

insert  into `council_position_table`(`positionIDcouncil`,`positionNamecouncil`) values (1,'Mayor'),(2,'Vice Mayor'),(3,'Ass.Sec'),(4,'Treasurer'),(5,'Auditor'),(6,'Bus.Mngr'),(7,'P.R.O'),(8,'P.C.O.S');

/*Table structure for table `council_table` */

DROP TABLE IF EXISTS `council_table`;

CREATE TABLE `council_table` (
  `CounID` int(6) NOT NULL AUTO_INCREMENT,
  `CounName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`CounID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `council_table` */

insert  into `council_table`(`CounID`,`CounName`) values (1,'CAS-ED Council'),(2,'CBTV Council'),(3,'Nursing Council');

/*Table structure for table `councilreject_announcement_table` */

DROP TABLE IF EXISTS `councilreject_announcement_table`;

CREATE TABLE `councilreject_announcement_table` (
  `council_rejectID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`council_rejectID`),
  KEY `FK_councilreject_announcement_table` (`council_announcementID`),
  CONSTRAINT `FK_councilreject_announcement_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `councilreject_announcement_table` */

/*Table structure for table `course_table` */

DROP TABLE IF EXISTS `course_table`;

CREATE TABLE `course_table` (
  `CourseID` int(6) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(60) DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `coursecode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `FK_course_tables` (`CounID`),
  KEY `FK_course_table` (`departmentClubId`),
  CONSTRAINT `FK_course_table` FOREIGN KEY (`departmentClubId`) REFERENCES `departmental_club_table` (`departmentClubId`) ON DELETE SET NULL,
  CONSTRAINT `FK_course_tables` FOREIGN KEY (`CounID`) REFERENCES `council_table` (`CounID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `course_table` */

insert  into `course_table`(`CourseID`,`CourseName`,`departmentClubId`,`CounID`,`coursecode`) values (1,'Bachelor of Science in Computer Science',1,1,'BSCS'),(4,'Bachelor of Science  in Nursing',7,3,'BSN'),(6,'Bachelor of Science in Hospitality Management',4,2,'BSHM'),(7,'Bachelor of Science in Computer Engineering',2,1,'BSCPE');

/*Table structure for table `credential_table` */

DROP TABLE IF EXISTS `credential_table`;

CREATE TABLE `credential_table` (
  `credentialId` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`credentialId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `credential_table` */

insert  into `credential_table`(`credentialId`,`username`,`password`) values (1,'admin','admin'),(2,'testing','adminako');

/*Table structure for table `csc_announcement_click_table` */

DROP TABLE IF EXISTS `csc_announcement_click_table`;

CREATE TABLE `csc_announcement_click_table` (
  `csc_annClickID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `clicked` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`csc_annClickID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_click_table` */

/*Table structure for table `csc_announcement_isread_table` */

DROP TABLE IF EXISTS `csc_announcement_isread_table`;

CREATE TABLE `csc_announcement_isread_table` (
  `csc_announcementReadID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`csc_announcementReadID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_isread_table` */

insert  into `csc_announcement_isread_table`(`csc_announcementReadID`,`stprofID`,`csc_announcementID`,`isApproved`) values (1,1,9,'Yes'),(2,3,9,'Yes'),(3,2,9,'Yes');

/*Table structure for table `csc_announcement_table` */

DROP TABLE IF EXISTS `csc_announcement_table`;

CREATE TABLE `csc_announcement_table` (
  `csc_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text DEFAULT NULL,
  PRIMARY KEY (`csc_announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `csc_announcement_table` */

insert  into `csc_announcement_table`(`csc_announcementID`,`dateSubmit`,`toWhom`,`message`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`,`annreason`) values (9,'2020-02-28 06:17:38','test','test','Yes','2020-02-28 19:00:00','2020-02-28 20:00:00','test',8,NULL);

/*Table structure for table `csc_members_table` */

DROP TABLE IF EXISTS `csc_members_table`;

CREATE TABLE `csc_members_table` (
  `cscmemID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `positionIDcsc` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cscmemID`),
  KEY `FK_csc_members_table` (`stprofID`),
  KEY `FK_csc_members_tableds` (`positionIDcsc`),
  CONSTRAINT `FK_csc_members_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  CONSTRAINT `FK_csc_members_tableds` FOREIGN KEY (`positionIDcsc`) REFERENCES `csc_position_table` (`positionIDcsc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `csc_members_table` */

insert  into `csc_members_table`(`cscmemID`,`stprofID`,`positionIDcsc`,`perpost`) values (1,1,1,'Yes');

/*Table structure for table `csc_position_table` */

DROP TABLE IF EXISTS `csc_position_table`;

CREATE TABLE `csc_position_table` (
  `positionIDcsc` int(6) NOT NULL AUTO_INCREMENT,
  `positionNamecsc` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`positionIDcsc`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `csc_position_table` */

insert  into `csc_position_table`(`positionIDcsc`,`positionNamecsc`) values (1,'President'),(2,'Vice President'),(3,'Secretary'),(4,'Asst. Secretary'),(5,'Treasurer'),(6,'Auditor'),(7,'Bus.Mngr'),(8,'P.R.O'),(9,'P.C.O');

/*Table structure for table `cscannouncement_read_table` */

DROP TABLE IF EXISTS `cscannouncement_read_table`;

CREATE TABLE `cscannouncement_read_table` (
  `cscreadID` int(10) NOT NULL AUTO_INCREMENT,
  `csc_announcementID` int(10) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  `stprofID` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cscreadID`),
  KEY `FK_cscannouncement_read_table` (`stprofID`),
  KEY `FK_cscannouncement_read_tablexs` (`csc_announcementID`),
  CONSTRAINT `FK_cscannouncement_read_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  CONSTRAINT `FK_cscannouncement_read_tablexs` FOREIGN KEY (`csc_announcementID`) REFERENCES `csc_announcement_table` (`csc_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cscannouncement_read_table` */

/*Table structure for table `cscreject_announcement_table` */

DROP TABLE IF EXISTS `cscreject_announcement_table`;

CREATE TABLE `cscreject_announcement_table` (
  `csc_rejectID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`csc_rejectID`),
  KEY `FK_cscreject_announcement_table` (`stprofID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `cscreject_announcement_table` */

insert  into `cscreject_announcement_table`(`csc_rejectID`,`stprofID`,`csc_announcementID`,`isApproved`) values (1,1,8,'Reject');

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
  `message` text DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text DEFAULT NULL,
  PRIMARY KEY (`DannouncementID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `department_announcement_table` */

insert  into `department_announcement_table`(`DannouncementID`,`dateSubmit`,`toWhom`,`message`,`departmentClubId`,`isApproved`,`timeStart`,`timeEnd`,`subjectann`,`venueID`,`annreason`) values (5,'2020-02-28 06:18:36','test2','test2',1,'No','2020-02-28 19:00:00','2020-02-28 20:00:00','test2',8,NULL),(6,'2020-02-28 06:32:29','test4','test4',7,'Yes','2020-02-29 10:30:00','2020-02-29 11:30:00','test4',9,NULL),(7,'2020-02-28 06:33:22','test5','test5',2,'No','2020-02-29 10:30:00','2020-02-29 11:30:00','test5',8,NULL);

/*Table structure for table `departmental_club_table` */

DROP TABLE IF EXISTS `departmental_club_table`;

CREATE TABLE `departmental_club_table` (
  `departmentClubId` int(6) NOT NULL AUTO_INCREMENT,
  `departmentClubName` varchar(60) DEFAULT NULL,
  `departmentcode` varbinary(20) DEFAULT NULL,
  PRIMARY KEY (`departmentClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_club_table` */

insert  into `departmental_club_table`(`departmentClubId`,`departmentClubName`,`departmentcode`) values (1,'Philippine Society of Information Technology Students','PSITS'),(2,'Institute of Computer Engineers of the Philippines S.E','ICEP.se'),(4,'Junior Hoteliers and Restaurateurs Association','JHRA'),(6,' Mathematics Club ',' MC '),(7,' Philippine Nursing Student Association ',' PNSA ');

/*Table structure for table `departmental_officersandmembers_table` */

DROP TABLE IF EXISTS `departmental_officersandmembers_table`;

CREATE TABLE `departmental_officersandmembers_table` (
  `departmentmemID` int(6) NOT NULL AUTO_INCREMENT,
  `departmentClubId` int(6) DEFAULT NULL,
  `positionIDdepartmental` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`departmentmemID`),
  KEY `FK_departmental_officersandmembers_table` (`departmentClubId`),
  KEY `FK_departmental_officersandmembers_tablex` (`stprofID`),
  KEY `FK_departmental_officersandmembers_tabledp` (`positionIDdepartmental`),
  CONSTRAINT `FK_departmental_officersandmembers_table` FOREIGN KEY (`departmentClubId`) REFERENCES `departmental_club_table` (`departmentClubId`),
  CONSTRAINT `FK_departmental_officersandmembers_tabledp` FOREIGN KEY (`positionIDdepartmental`) REFERENCES `departmental_position_table` (`positionIDdepartmental`),
  CONSTRAINT `FK_departmental_officersandmembers_tablex` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_officersandmembers_table` */

insert  into `departmental_officersandmembers_table`(`departmentmemID`,`departmentClubId`,`positionIDdepartmental`,`stprofID`,`perpost`) values (1,1,1,1,'Yes'),(2,2,1,2,'Yes'),(3,7,1,3,'Yes');

/*Table structure for table `departmental_position_table` */

DROP TABLE IF EXISTS `departmental_position_table`;

CREATE TABLE `departmental_position_table` (
  `positionIDdepartmental` int(6) NOT NULL AUTO_INCREMENT,
  `positionNameDP` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`positionIDdepartmental`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `departmental_position_table` */

insert  into `departmental_position_table`(`positionIDdepartmental`,`positionNameDP`) values (1,'Mayor'),(2,'Vice Mayor'),(3,'Secretary'),(4,'Asst.Sec'),(5,'Treasurer'),(6,'Auditor'),(7,'P.R.O'),(8,'Bus.Mngr'),(9,'P.C.O.S'),(10,'1st Year Rep'),(11,'3rd Year Rep'),(12,'4th Year Rep'),(13,'Historian'),(14,'President'),(15,'V-President. For Academics'),(16,'V-Pres. For Non-Acad.'),(17,'General Secretary'),(18,'V-Pres. For Finance'),(19,'V-Pres. For Membership'),(20,'V-Pres. For Communication'),(21,'VI-Pres. For Graphics & Pub.'),(22,'Regional Rep');

/*Table structure for table `departmentreject_announcement_table` */

DROP TABLE IF EXISTS `departmentreject_announcement_table`;

CREATE TABLE `departmentreject_announcement_table` (
  `Dannouncement_rejectID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  `departmentClubID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Dannouncement_rejectID`),
  KEY `FK_departmentreject_announcement_table` (`DannouncementID`),
  CONSTRAINT `FK_departmentreject_announcement_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `departmentreject_announcement_table` */

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
  `message` text DEFAULT NULL,
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `isApproved` varchar(3) DEFAULT 'Yes',
  `venueID` int(6) DEFAULT NULL,
  PRIMARY KEY (`dsaAnnouncementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dsa_announcement_table` */

/*Table structure for table `membershiptoggle_table` */

DROP TABLE IF EXISTS `membershiptoggle_table`;

CREATE TABLE `membershiptoggle_table` (
  `membershipID` int(6) NOT NULL AUTO_INCREMENT,
  `toggleonoroff` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`membershipID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `membershiptoggle_table` */

insert  into `membershiptoggle_table`(`membershipID`,`toggleonoroff`) values (1,'OFF');

/*Table structure for table `notif` */

DROP TABLE IF EXISTS `notif`;

CREATE TABLE `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_msg` text DEFAULT NULL,
  `notif_time` datetime DEFAULT NULL,
  `notif_repeat` int(11) DEFAULT 1 COMMENT 'schedule in minute',
  `notif_loop` int(11) DEFAULT 1,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_isread_table` */

/*Table structure for table `social_announcement_table` */

DROP TABLE IF EXISTS `social_announcement_table`;

CREATE TABLE `social_announcement_table` (
  `social_announcementID` int(6) NOT NULL AUTO_INCREMENT,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `annreason` text DEFAULT NULL,
  PRIMARY KEY (`social_announcementID`),
  KEY `FK_social_announcement_table` (`socialClubId`),
  KEY `FK_social_announcement_tablesd` (`venueID`),
  CONSTRAINT `FK_social_announcement_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  CONSTRAINT `FK_social_announcement_tablesd` FOREIGN KEY (`venueID`) REFERENCES `venue_table` (`venueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_announcement_table` */

/*Table structure for table `social_club_table` */

DROP TABLE IF EXISTS `social_club_table`;

CREATE TABLE `social_club_table` (
  `socialClubId` int(6) NOT NULL AUTO_INCREMENT,
  `socialClubName` varchar(60) DEFAULT NULL,
  `socialClubcode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`socialClubId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `social_club_table` */

insert  into `social_club_table`(`socialClubId`,`socialClubName`,`socialClubcode`) values (4,'Youth Servant Leaders Clubs','YSLC'),(5,'Kristiyanong Kabataan para sa Bayan','KKB'),(6,'Catechetical Guild','CG'),(7,'Muslim Students Organization','MSO'),(8,'Association of Student Personnel Assistants','ASPA'),(10,'Cantores et Sesyonistas','CES'),(11,'Junior Ecologist Movement','JEM'),(12,'Sports Club','SP'),(13,'Karate-do Club','KDC'),(14,'Peer Counselors Club','PCC');

/*Table structure for table `social_officerandmembers_table` */

DROP TABLE IF EXISTS `social_officerandmembers_table`;

CREATE TABLE `social_officerandmembers_table` (
  `socialoffID` int(6) NOT NULL AUTO_INCREMENT,
  `socialClubId` int(6) DEFAULT NULL,
  `positionIDsocial` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`socialoffID`),
  KEY `FK_social_officerandmembers_table` (`socialClubId`),
  KEY `FK_social_officerandmembers_tablex` (`stprofID`),
  KEY `FK_social_officerandmembers_tablesocial` (`positionIDsocial`),
  CONSTRAINT `FK_social_officerandmembers_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  CONSTRAINT `FK_social_officerandmembers_tablesocial` FOREIGN KEY (`positionIDsocial`) REFERENCES `social_position_table` (`positionIDsocial`),
  CONSTRAINT `FK_social_officerandmembers_tablex` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `social_officerandmembers_table` */

/*Table structure for table `social_position_table` */

DROP TABLE IF EXISTS `social_position_table`;

CREATE TABLE `social_position_table` (
  `positionIDsocial` int(6) NOT NULL AUTO_INCREMENT,
  `positionNameSocial` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`positionIDsocial`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `social_position_table` */

insert  into `social_position_table`(`positionIDsocial`,`positionNameSocial`) values (1,'Mayor'),(2,'Vice Mayor'),(3,'Secretary'),(4,'Asst.Sec'),(5,'Treasurer'),(6,'Auditor'),(7,'P.R.O'),(8,'Bus.Mngr'),(9,'P.C.O'),(10,'P.C.O.S'),(11,'Chairperson'),(12,'Vice Chairperson for Church Involement'),(13,'Vice Chairperson for Formation'),(14,'Vice Chairperson for social Apostolate'),(15,'Executive Assistant '),(16,'Finance Officer'),(17,'Operations Mngr'),(18,'Ambassador');

/*Table structure for table `socialreject_announcement_table` */

DROP TABLE IF EXISTS `socialreject_announcement_table`;

CREATE TABLE `socialreject_announcement_table` (
  `socialrejectID` int(6) NOT NULL AUTO_INCREMENT,
  `stprofID` int(6) DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`socialrejectID`),
  KEY `FK_socialreject_announcement_table` (`social_announcementID`),
  CONSTRAINT `FK_socialreject_announcement_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `socialreject_announcement_table` */

/*Table structure for table `student_account_table` */

DROP TABLE IF EXISTS `student_account_table`;

CREATE TABLE `student_account_table` (
  `accID` int(6) NOT NULL AUTO_INCREMENT,
  `StudentID` int(10) DEFAULT NULL,
  `StudentPassword` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `student_account_table` */

insert  into `student_account_table`(`accID`,`StudentID`,`StudentPassword`,`isDeleted`) values (46,1,'1',0),(47,2,'1',0),(48,3,'1',0),(49,4,'123',0);

/*Table structure for table `student_portfolio_table` */

DROP TABLE IF EXISTS `student_portfolio_table`;

CREATE TABLE `student_portfolio_table` (
  `stportfolioID` int(10) NOT NULL AUTO_INCREMENT,
  `stprofID` int(10) DEFAULT NULL,
  `styear` varchar(60) DEFAULT NULL,
  `sem` varchar(60) DEFAULT NULL,
  `schoolyr` varchar(60) DEFAULT NULL,
  `act1` varchar(150) DEFAULT NULL,
  `rank1` varchar(20) DEFAULT NULL,
  `act2` varchar(150) DEFAULT NULL,
  `rank2` varchar(20) DEFAULT NULL,
  `act3` varchar(150) DEFAULT NULL,
  `rank3` varchar(20) DEFAULT NULL,
  `act4` varchar(150) DEFAULT NULL,
  `rank4` varchar(20) DEFAULT NULL,
  `comm1` varchar(150) DEFAULT NULL,
  `comm2` varchar(150) DEFAULT NULL,
  `comm3` varchar(150) DEFAULT NULL,
  `comm4` varchar(150) DEFAULT NULL,
  `seminar1` varchar(150) DEFAULT NULL,
  `seminar2` varchar(150) DEFAULT NULL,
  `seminar3` varchar(150) DEFAULT NULL,
  `seminar4` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`stportfolioID`),
  KEY `FK_student_portfolio_table` (`stprofID`),
  CONSTRAINT `FK_student_portfolio_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_portfolio_table` */

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
  `picture` text DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `student_social_table` */

insert  into `student_social_table`(`stdsocialID`,`stprofID`,`socialClubId`) values (1,1,5),(2,2,8),(3,3,7);

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
  `IMG` text DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `studentprofile_table` */

insert  into `studentprofile_table`(`stprofID`,`fname`,`address`,`CourseID`,`accID`,`email`,`contactnum`,`birthday`,`gender`,`IMG`,`mname`,`lname`,`religion`,`tribe`,`pandg`) values (1,'jude jeremy','broadway st. new isabela',1,46,'jude@yahoo.com','0987654321','1997-02-18','Male','img/859900f3f0333a582e2319abac894de4megumin_by_drawingshit-dbaazft.png','sajor','bilgera','catholic','t\'boli','papot style'),(2,'john mark','rosal new isabela',7,47,'rosal@yahoo.com','0987654321','1998-02-21','Male','img/8be61f5c677cc7f6587d6246de827a72nakano-azusa with twintails.png','anderson','rosal','catholic','t\'boli','jude'),(3,'fahad','datu paglas',4,48,'fahad@yahoo.com','0987654321','1997-02-19','Male','img/dc9770270edeca2f1847f0f3d35a75501493574220529.png','akhmad','tudon','muslim','Maguindanao','hyder');

/*Table structure for table `testingtbl` */

DROP TABLE IF EXISTS `testingtbl`;

CREATE TABLE `testingtbl` (
  `testID` int(5) NOT NULL AUTO_INCREMENT,
  `name` int(5) DEFAULT NULL,
  `isSend` int(5) DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `venue_table` */

insert  into `venue_table`(`venueID`,`venueName`) values (8,'s-204'),(9,'s-205');

/*Table structure for table `admin_account_view` */

DROP TABLE IF EXISTS `admin_account_view`;

/*!50001 DROP VIEW IF EXISTS `admin_account_view` */;
/*!50001 DROP TABLE IF EXISTS `admin_account_view` */;

/*!50001 CREATE TABLE  `admin_account_view`(
 `adminID` int(10) ,
 `username` varchar(60) ,
 `password` varchar(60) 
)*/;

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

/*Table structure for table `all_social_report_view` */

DROP TABLE IF EXISTS `all_social_report_view`;

/*!50001 DROP VIEW IF EXISTS `all_social_report_view` */;
/*!50001 DROP TABLE IF EXISTS `all_social_report_view` */;

/*!50001 CREATE TABLE  `all_social_report_view`(
 `stdsocialID` int(6) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `socialClubcode` varchar(20) 
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
 `venueName` varchar(60) ,
 `annreason` text 
)*/;

/*Table structure for table `council_report_view` */

DROP TABLE IF EXISTS `council_report_view`;

/*!50001 DROP VIEW IF EXISTS `council_report_view` */;
/*!50001 DROP TABLE IF EXISTS `council_report_view` */;

/*!50001 CREATE TABLE  `council_report_view`(
 `councilID` int(6) ,
 `CounID` int(6) ,
 `CounName` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) ,
 `positionIDcouncil` int(6) ,
 `positionNamecouncil` varchar(60) 
)*/;

/*Table structure for table `council_view` */

DROP TABLE IF EXISTS `council_view`;

/*!50001 DROP VIEW IF EXISTS `council_view` */;
/*!50001 DROP TABLE IF EXISTS `council_view` */;

/*!50001 CREATE TABLE  `council_view`(
 `councilID` int(6) ,
 `CounID` int(6) ,
 `CounName` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `positionIDcouncil` int(6) ,
 `positionNamecouncil` varchar(60) ,
 `perpost` varchar(10) 
)*/;

/*Table structure for table `course_view` */

DROP TABLE IF EXISTS `course_view`;

/*!50001 DROP VIEW IF EXISTS `course_view` */;
/*!50001 DROP TABLE IF EXISTS `course_view` */;

/*!50001 CREATE TABLE  `course_view`(
 `CourseID` int(6) ,
 `CourseName` varchar(60) ,
 `coursecode` varchar(20) ,
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
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `positionIDcsc` int(6) ,
 `positionNamecsc` varchar(60) ,
 `perpost` varchar(10) 
)*/;

/*Table structure for table `csc_officers_view` */

DROP TABLE IF EXISTS `csc_officers_view`;

/*!50001 DROP VIEW IF EXISTS `csc_officers_view` */;
/*!50001 DROP TABLE IF EXISTS `csc_officers_view` */;

/*!50001 CREATE TABLE  `csc_officers_view`(
 `cscmemID` int(6) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) ,
 `positionIDcsc` int(6) ,
 `positionNamecsc` varchar(60) 
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
 `departmentClubName` varchar(60) ,
 `departmentcode` varbinary(20) 
)*/;

/*Table structure for table `departmental_officersandmembers_view` */

DROP TABLE IF EXISTS `departmental_officersandmembers_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_officersandmembers_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_officersandmembers_view` */;

/*!50001 CREATE TABLE  `departmental_officersandmembers_view`(
 `departmentmemID` int(6) ,
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) ,
 `positionIDdepartmental` int(6) ,
 `positionNameDP` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `perpost` varchar(10) 
)*/;

/*Table structure for table `departmental_report_view` */

DROP TABLE IF EXISTS `departmental_report_view`;

/*!50001 DROP VIEW IF EXISTS `departmental_report_view` */;
/*!50001 DROP TABLE IF EXISTS `departmental_report_view` */;

/*!50001 CREATE TABLE  `departmental_report_view`(
 `departmentmemID` int(6) ,
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) ,
 `positionIDdepartmental` int(6) ,
 `positionNameDP` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) 
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
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `CourseID` int(6) ,
 `CourseName` varchar(60) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) 
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
 `departmentClubName` varchar(60) ,
 `departmentcode` varbinary(20) ,
 `fullName` varchar(182) 
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
 `venueID` int(6) ,
 `venueName` varchar(60) ,
 `subjectann` varchar(100) ,
 `annreason` text 
)*/;

/*Table structure for table `social_club_view` */

DROP TABLE IF EXISTS `social_club_view`;

/*!50001 DROP VIEW IF EXISTS `social_club_view` */;
/*!50001 DROP TABLE IF EXISTS `social_club_view` */;

/*!50001 CREATE TABLE  `social_club_view`(
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `socialClubcode` varchar(20) 
)*/;

/*Table structure for table `social_officerandmembers_view` */

DROP TABLE IF EXISTS `social_officerandmembers_view`;

/*!50001 DROP VIEW IF EXISTS `social_officerandmembers_view` */;
/*!50001 DROP TABLE IF EXISTS `social_officerandmembers_view` */;

/*!50001 CREATE TABLE  `social_officerandmembers_view`(
 `socialoffID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `positionIDsocial` int(6) ,
 `positionNameSocial` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `perpost` varchar(10) 
)*/;

/*Table structure for table `social_reports_all_view` */

DROP TABLE IF EXISTS `social_reports_all_view`;

/*!50001 DROP VIEW IF EXISTS `social_reports_all_view` */;
/*!50001 DROP TABLE IF EXISTS `social_reports_all_view` */;

/*!50001 CREATE TABLE  `social_reports_all_view`(
 `socialoffID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `socialClubcode` varchar(20) ,
 `positionIDsocial` int(6) ,
 `positionNameSocial` varchar(60) ,
 `stdsocialID` int(6) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) 
)*/;

/*Table structure for table `social_reports_view` */

DROP TABLE IF EXISTS `social_reports_view`;

/*!50001 DROP VIEW IF EXISTS `social_reports_view` */;
/*!50001 DROP TABLE IF EXISTS `social_reports_view` */;

/*!50001 CREATE TABLE  `social_reports_view`(
 `socialoffID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `socialClubcode` varchar(20) ,
 `positionIDsocial` int(6) ,
 `positionNameSocial` varchar(60) ,
 `stprofID` int(6) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `accID` int(6) ,
 `StudentID` int(10) 
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

/*Table structure for table `student_portfolio_view` */

DROP TABLE IF EXISTS `student_portfolio_view`;

/*!50001 DROP VIEW IF EXISTS `student_portfolio_view` */;
/*!50001 DROP TABLE IF EXISTS `student_portfolio_view` */;

/*!50001 CREATE TABLE  `student_portfolio_view`(
 `stportfolioID` int(10) ,
 `stprofID` int(10) ,
 `fname` varchar(60) ,
 `mname` varchar(60) ,
 `lname` varchar(60) ,
 `CourseID` int(6) ,
 `CourseName` varchar(60) ,
 `departmentClubId` int(6) ,
 `departmentClubName` varchar(60) ,
 `CounID` int(6) ,
 `CounName` varchar(60) ,
 `styear` varchar(60) ,
 `sem` varchar(60) ,
 `schoolyr` varchar(60) ,
 `act1` varchar(150) ,
 `rank1` varchar(20) ,
 `act2` varchar(150) ,
 `rank2` varchar(20) ,
 `act3` varchar(150) ,
 `rank3` varchar(20) ,
 `act4` varchar(150) ,
 `rank4` varchar(20) ,
 `comm1` varchar(150) ,
 `comm2` varchar(150) ,
 `comm3` varchar(150) ,
 `comm4` varchar(150) ,
 `seminar1` varchar(150) ,
 `seminar2` varchar(150) ,
 `seminar3` varchar(150) ,
 `seminar4` varchar(150) 
)*/;

/*Table structure for table `student_social_club_view` */

DROP TABLE IF EXISTS `student_social_club_view`;

/*!50001 DROP VIEW IF EXISTS `student_social_club_view` */;
/*!50001 DROP TABLE IF EXISTS `student_social_club_view` */;

/*!50001 CREATE TABLE  `student_social_club_view`(
 `stdsocialID` int(6) ,
 `stprofID` int(6) ,
 `socialClubId` int(6) ,
 `socialClubName` varchar(60) ,
 `socialClubcode` varchar(20) 
)*/;

/*View structure for view admin_account_view */

/*!50001 DROP TABLE IF EXISTS `admin_account_view` */;
/*!50001 DROP VIEW IF EXISTS `admin_account_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_account_view` AS select `admin_account_table`.`adminID` AS `adminID`,`admin_account_table`.`username` AS `username`,`admin_account_table`.`password` AS `password` from `admin_account_table` */;

/*View structure for view admin_view */

/*!50001 DROP TABLE IF EXISTS `admin_view` */;
/*!50001 DROP VIEW IF EXISTS `admin_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view` AS select `admin_table`.`adminId` AS `adminId`,`admin_table`.`credentialId` AS `credentialId`,`credential_table`.`username` AS `username`,`credential_table`.`password` AS `password` from (`admin_table` join `credential_table` on(`admin_table`.`credentialId` = `credential_table`.`credentialId`)) */;

/*View structure for view all_social_report_view */

/*!50001 DROP TABLE IF EXISTS `all_social_report_view` */;
/*!50001 DROP VIEW IF EXISTS `all_social_report_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_social_report_view` AS select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from (((`student_social_table` join `studentprofile_table` on(`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_club_table` on(`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`)) join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) */;

/*View structure for view council_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `council_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `council_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_club_announcement_view` AS select `council_announcement_table`.`council_announcementID` AS `council_announcementID`,`council_announcement_table`.`dateSubmit` AS `dateSubmit`,`council_announcement_table`.`toWhom` AS `toWhom`,`council_announcement_table`.`message` AS `message`,`council_announcement_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_announcement_table`.`isApproved` AS `isApproved`,`council_announcement_table`.`timeStart` AS `timeStart`,`council_announcement_table`.`timeEnd` AS `timeEnd`,`council_announcement_table`.`subjectann` AS `subjectann`,`council_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName`,`council_announcement_table`.`annreason` AS `annreason` from ((`council_announcement_table` join `venue_table` on(`council_announcement_table`.`venueID` = `venue_table`.`venueID`)) join `council_table` on(`council_announcement_table`.`CounID` = `council_table`.`CounID`)) */;

/*View structure for view council_report_view */

/*!50001 DROP TABLE IF EXISTS `council_report_view` */;
/*!50001 DROP VIEW IF EXISTS `council_report_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_report_view` AS select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_officers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`council_officers_table`.`positionIDcouncil` AS `positionIDcouncil`,`council_position_table`.`positionNamecouncil` AS `positionNamecouncil` from ((((`council_officers_table` join `studentprofile_table` on(`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) join `council_table` on(`council_officers_table`.`CounID` = `council_table`.`CounID`)) join `council_position_table` on(`council_officers_table`.`positionIDcouncil` = `council_position_table`.`positionIDcouncil`)) */;

/*View structure for view council_view */

/*!50001 DROP TABLE IF EXISTS `council_view` */;
/*!50001 DROP VIEW IF EXISTS `council_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_view` AS select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_officers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`council_officers_table`.`positionIDcouncil` AS `positionIDcouncil`,`council_position_table`.`positionNamecouncil` AS `positionNamecouncil`,`council_officers_table`.`perpost` AS `perpost` from (((`council_officers_table` join `council_position_table` on(`council_officers_table`.`positionIDcouncil` = `council_position_table`.`positionIDcouncil`)) join `council_table` on(`council_officers_table`.`CounID` = `council_table`.`CounID`)) join `studentprofile_table` on(`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) */;

/*View structure for view course_view */

/*!50001 DROP TABLE IF EXISTS `course_view` */;
/*!50001 DROP VIEW IF EXISTS `course_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view` AS select `course_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`coursecode` AS `coursecode`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`council_table`.`CounName` AS `CounName` from ((`course_table` join `council_table` on(`course_table`.`CounID` = `council_table`.`CounID`)) join `departmental_club_table` on(`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) */;

/*View structure for view csc_announcement_view */

/*!50001 DROP TABLE IF EXISTS `csc_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_announcement_view` AS select `csc_announcement_table`.`csc_announcementID` AS `csc_announcementID`,`csc_announcement_table`.`dateSubmit` AS `dateSubmit`,`csc_announcement_table`.`toWhom` AS `toWhom`,`csc_announcement_table`.`message` AS `message`,`csc_announcement_table`.`isApproved` AS `isApproved`,`csc_announcement_table`.`timeStart` AS `timeStart`,`csc_announcement_table`.`timeEnd` AS `timeEnd`,`csc_announcement_table`.`subjectann` AS `subjectann`,`venue_table`.`venueName` AS `venueName`,`venue_table`.`venueID` AS `venueID` from (`csc_announcement_table` join `venue_table` on(`csc_announcement_table`.`venueID` = `venue_table`.`venueID`)) */;

/*View structure for view csc_mem_view */

/*!50001 DROP TABLE IF EXISTS `csc_mem_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_mem_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_mem_view` AS select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`csc_members_table`.`positionIDcsc` AS `positionIDcsc`,`csc_position_table`.`positionNamecsc` AS `positionNamecsc`,`csc_members_table`.`perpost` AS `perpost` from ((`csc_members_table` join `csc_position_table` on(`csc_members_table`.`positionIDcsc` = `csc_position_table`.`positionIDcsc`)) join `studentprofile_table` on(`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`)) */;

/*View structure for view csc_officers_view */

/*!50001 DROP TABLE IF EXISTS `csc_officers_view` */;
/*!50001 DROP VIEW IF EXISTS `csc_officers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_officers_view` AS select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`csc_members_table`.`positionIDcsc` AS `positionIDcsc`,`csc_position_table`.`positionNamecsc` AS `positionNamecsc` from (((`csc_members_table` join `csc_position_table` on(`csc_members_table`.`positionIDcsc` = `csc_position_table`.`positionIDcsc`)) join `studentprofile_table` on(`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) */;

/*View structure for view departmental_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_announcement_view` AS select `department_announcement_table`.`DannouncementID` AS `DannouncementID`,`department_announcement_table`.`dateSubmit` AS `dateSubmit`,`department_announcement_table`.`toWhom` AS `toWhom`,`department_announcement_table`.`message` AS `message`,`department_announcement_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`department_announcement_table`.`isApproved` AS `isApproved`,`department_announcement_table`.`timeStart` AS `timeStart`,`department_announcement_table`.`timeEnd` AS `timeEnd`,`department_announcement_table`.`subjectann` AS `subjectann`,`department_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from ((`department_announcement_table` join `venue_table` on(`department_announcement_table`.`venueID` = `venue_table`.`venueID`)) join `departmental_club_table` on(`department_announcement_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) */;

/*View structure for view departmental_club_view */

/*!50001 DROP TABLE IF EXISTS `departmental_club_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_view` AS select `departmental_club_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_club_table`.`departmentcode` AS `departmentcode` from `departmental_club_table` */;

/*View structure for view departmental_officersandmembers_view */

/*!50001 DROP TABLE IF EXISTS `departmental_officersandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_officersandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_officersandmembers_view` AS select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_officersandmembers_table`.`positionIDdepartmental` AS `positionIDdepartmental`,`departmental_position_table`.`positionNameDP` AS `positionNameDP`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`departmental_officersandmembers_table`.`perpost` AS `perpost` from (((`departmental_officersandmembers_table` join `departmental_club_table` on(`departmental_officersandmembers_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) join `departmental_position_table` on(`departmental_officersandmembers_table`.`positionIDdepartmental` = `departmental_position_table`.`positionIDdepartmental`)) join `studentprofile_table` on(`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) */;

/*View structure for view departmental_report_view */

/*!50001 DROP TABLE IF EXISTS `departmental_report_view` */;
/*!50001 DROP VIEW IF EXISTS `departmental_report_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_report_view` AS select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_officersandmembers_table`.`positionIDdepartmental` AS `positionIDdepartmental`,`departmental_position_table`.`positionNameDP` AS `positionNameDP`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from ((((`studentprofile_table` join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) join `departmental_officersandmembers_table` on(`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `departmental_club_table` on(`departmental_officersandmembers_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) join `departmental_position_table` on(`departmental_officersandmembers_table`.`positionIDdepartmental` = `departmental_position_table`.`positionIDdepartmental`)) */;

/*View structure for view dsa_announcement_view */

/*!50001 DROP TABLE IF EXISTS `dsa_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `dsa_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsa_announcement_view` AS select `dsa_announcement_table`.`dsaAnnouncementID` AS `dsaAnnouncementID`,`dsa_announcement_table`.`dateSubmit` AS `dateSubmit`,`dsa_announcement_table`.`toWhom` AS `toWhom`,`dsa_announcement_table`.`message` AS `message`,`dsa_announcement_table`.`timeStart` AS `timeStart`,`dsa_announcement_table`.`timeEnd` AS `timeEnd`,`dsa_announcement_table`.`subjectann` AS `subjectann`,`dsa_announcement_table`.`isApproved` AS `isApproved`,`dsa_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from (`dsa_announcement_table` join `venue_table` on(`dsa_announcement_table`.`venueID` = `venue_table`.`venueID`)) */;

/*View structure for view list_social_club_view */

/*!50001 DROP TABLE IF EXISTS `list_social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `list_social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_social_club_view` AS select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from (((`studentprofile_table` join `course_table` on(`studentprofile_table`.`CourseID` = `course_table`.`CourseID`)) join `student_social_table` on(`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_club_table` on(`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`)) */;

/*View structure for view list_student_view */

/*!50001 DROP TABLE IF EXISTS `list_student_view` */;
/*!50001 DROP VIEW IF EXISTS `list_student_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_student_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`studentprofile_table`.`email` AS `email`,`studentprofile_table`.`pandg` AS `pandg`,`studentprofile_table`.`contactnum` AS `contactnum`,`studentprofile_table`.`religion` AS `religion`,`studentprofile_table`.`tribe` AS `tribe`,`studentprofile_table`.`birthday` AS `birthday`,`studentprofile_table`.`gender` AS `gender`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted`,`council_table`.`CounName` AS `CounName`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_club_table`.`departmentcode` AS `departmentcode`,concat(`studentprofile_table`.`lname`,' ',`studentprofile_table`.`fname`,' ',`studentprofile_table`.`mname`) AS `fullName` from ((((`course_table` join `council_table` on(`course_table`.`CounID` = `council_table`.`CounID`)) join `departmental_club_table` on(`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) join `studentprofile_table` on(`studentprofile_table`.`CourseID` = `course_table`.`CourseID`)) join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) where `student_account_table`.`isDeleted` = 0 */;

/*View structure for view social_club_announcement_view */

/*!50001 DROP TABLE IF EXISTS `social_club_announcement_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_announcement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_announcement_view` AS select `social_announcement_table`.`social_announcementID` AS `social_announcementID`,`social_announcement_table`.`dateSubmit` AS `dateSubmit`,`social_announcement_table`.`toWhom` AS `toWhom`,`social_announcement_table`.`message` AS `message`,`social_announcement_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_announcement_table`.`isApproved` AS `isApproved`,`social_announcement_table`.`timeStart` AS `timeStart`,`social_announcement_table`.`timeEnd` AS `timeEnd`,`social_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName`,`social_announcement_table`.`subjectann` AS `subjectann`,`social_announcement_table`.`annreason` AS `annreason` from ((`social_announcement_table` join `venue_table` on(`social_announcement_table`.`venueID` = `venue_table`.`venueID`)) join `social_club_table` on(`social_announcement_table`.`socialClubId` = `social_club_table`.`socialClubId`)) */;

/*View structure for view social_club_view */

/*!50001 DROP TABLE IF EXISTS `social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_view` AS select `social_club_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from `social_club_table` */;

/*View structure for view social_officerandmembers_view */

/*!50001 DROP TABLE IF EXISTS `social_officerandmembers_view` */;
/*!50001 DROP VIEW IF EXISTS `social_officerandmembers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_officerandmembers_view` AS select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`social_officerandmembers_table`.`perpost` AS `perpost` from (((`social_officerandmembers_table` join `studentprofile_table` on(`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_position_table` on(`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`)) join `social_club_table` on(`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId`)) */;

/*View structure for view social_reports_all_view */

/*!50001 DROP TABLE IF EXISTS `social_reports_all_view` */;
/*!50001 DROP VIEW IF EXISTS `social_reports_all_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_reports_all_view` AS select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from (((((`student_social_table` join `studentprofile_table` on(`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_club_table` on(`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`)) join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) join `social_officerandmembers_table` on(`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId` and `social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_position_table` on(`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`)) */;

/*View structure for view social_reports_view */

/*!50001 DROP TABLE IF EXISTS `social_reports_view` */;
/*!50001 DROP VIEW IF EXISTS `social_reports_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_reports_view` AS select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from ((((`studentprofile_table` join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) join `social_officerandmembers_table` on(`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `social_position_table` on(`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`)) join `social_club_table` on(`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId`)) */;

/*View structure for view std_prof_view */

/*!50001 DROP TABLE IF EXISTS `std_prof_view` */;
/*!50001 DROP VIEW IF EXISTS `std_prof_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `std_prof_view` AS select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from (`studentprofile_table` join `student_account_table` on(`studentprofile_table`.`accID` = `student_account_table`.`accID`)) */;

/*View structure for view student_account_view */

/*!50001 DROP TABLE IF EXISTS `student_account_view` */;
/*!50001 DROP VIEW IF EXISTS `student_account_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_account_view` AS select `student_account_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from `student_account_table` */;

/*View structure for view student_portfolio_view */

/*!50001 DROP TABLE IF EXISTS `student_portfolio_view` */;
/*!50001 DROP VIEW IF EXISTS `student_portfolio_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_portfolio_view` AS select `student_portfolio_table`.`stportfolioID` AS `stportfolioID`,`student_portfolio_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`course_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`student_portfolio_table`.`styear` AS `styear`,`student_portfolio_table`.`sem` AS `sem`,`student_portfolio_table`.`schoolyr` AS `schoolyr`,`student_portfolio_table`.`act1` AS `act1`,`student_portfolio_table`.`rank1` AS `rank1`,`student_portfolio_table`.`act2` AS `act2`,`student_portfolio_table`.`rank2` AS `rank2`,`student_portfolio_table`.`act3` AS `act3`,`student_portfolio_table`.`rank3` AS `rank3`,`student_portfolio_table`.`act4` AS `act4`,`student_portfolio_table`.`rank4` AS `rank4`,`student_portfolio_table`.`comm1` AS `comm1`,`student_portfolio_table`.`comm2` AS `comm2`,`student_portfolio_table`.`comm3` AS `comm3`,`student_portfolio_table`.`comm4` AS `comm4`,`student_portfolio_table`.`seminar1` AS `seminar1`,`student_portfolio_table`.`seminar2` AS `seminar2`,`student_portfolio_table`.`seminar3` AS `seminar3`,`student_portfolio_table`.`seminar4` AS `seminar4` from ((((`studentprofile_table` join `course_table` on(`studentprofile_table`.`CourseID` = `course_table`.`CourseID`)) join `departmental_club_table` on(`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`)) join `student_portfolio_table` on(`student_portfolio_table`.`stprofID` = `studentprofile_table`.`stprofID`)) join `council_table` on(`course_table`.`CounID` = `council_table`.`CounID`)) */;

/*View structure for view student_social_club_view */

/*!50001 DROP TABLE IF EXISTS `student_social_club_view` */;
/*!50001 DROP VIEW IF EXISTS `student_social_club_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_social_club_view` AS select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from (`student_social_table` join `social_club_table` on(`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
